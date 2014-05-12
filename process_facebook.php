<?php 
session_start(); 
include_once("config.php"); //Include configuration file.
require_once('inc/facebook.php' ); //include fb sdk

/* Detect HTTP_X_REQUESTED_WITH header sent by all recent browsers that support AJAX requests. */
if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
{		

	//initialize facebook sdk
	$facebook = new Facebook(array(
		'appId' => $appId,
		'secret' => $appSecret,
	));
	
	$fbuser = $facebook->getUser();
	
	if ($fbuser) {
		try {
			// Proceed knowing you have a logged in user who's authenticated.
			$me = $facebook->api('/me'); //user
			$uid = $facebook->getUser();
		}
		catch (FacebookApiException $e) 
		{
			//echo error_log($e);
			$fbuser = null;
		}
	}
	
	// redirect user to facebook login page if empty data or fresh login requires
	if (!$fbuser){
		$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$return_url, false));
		header('Location: '.$loginUrl);
	}
	
	//user details
	$fullname = $me['first_name'].' '.$me['last_name'];
	$email = $me['email'];
	$voornaam =   $me['first_name'];
	$achternaam =  $me['last_name'];
	$functie = 'klant';

	/* connect to mysql using mysqli */
	
	$mysqli = new mysqli($hostname, $db_username, $db_password,$db_name);
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	
	//Check user id in our database	
	$UserCount = $mysqli->query("SELECT COUNT(id) as usercount FROM tblusers WHERE us_id=$uid"); 
	
	if($UserCount)
	{	
		//User exist, Show welcome back message
		echo 'Ajax Response :<br /><strong>Welcome back '. $me['first_name'] . ' '. $me['last_name'].'!</strong> ( Facebook ID : '.$uid.') [<a href="'.$return_url.'?logout=1">Log Out</a>]';
		
		//print user facebook data


		//User is now connected, log him in
		login_user(true,$me['first_name'].' '.$me['last_name']);
		
	}
	else
	{
		header('Location: index_bezoeker.php');
		// Insert user into Database.
		$mysqli->query("INSERT INTO tblusers (us_id, us_username, us_voornaam, us_achternaam, us_email, us_password, us_functie) VALUES ($uid, '$fullname','$voornaam', '$achternaam', '$email', '', '$functie')");
				
	}
	
	$mysqli->close();
}

function login_user($loggedin,$user_name)
{
	/*
	function stores some session variables to imitate user login. 
	We will use these session variables to keep user logged in, until s/he clicks log-out link.
	*/
	$_SESSION['logged_in']=$loggedin;
	$_SESSION['user_name']=$user_name;
}
?>