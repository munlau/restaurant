<?php
include_once ("classes/user.class.php");
session_start();
$_SESSION['loggedin']=FALSE;

$feedback="";
if (isset($_POST['btnregister'])) {
	try{
	$user = new User();
	$user -> Username = $_POST['username'];
	$user -> Voornaam = $_POST['voornaam'];
	$user -> Achternaam = $_POST['achternaam'];
	$user -> Telefoon = $_POST['telefoon'];
	$user -> Email = $_POST['email'];
	$user -> Password = $_POST['password'];
	$user -> Functie = $_POST['functie'];
	$user -> Save();
	}catch (Exception $e)
	{
		$feedback=$e->getMessage();
	}


	}

if (isset($_POST['btnlogin'])) {
	try{
	$user = new User();
	$user -> Username = $_POST['loginname'];
	$user -> Password = $_POST['loginpassword'];
	$user -> Functie = $_POST['functie'];
	$user -> canLogin();
	}catch (Exception $e)
	{
		$error=$e->getMessage();
	}

	
}




?>