<?php
include('classes/user.class.php');
include_once("login_logica.php");

  if(isset($_POST['submit']) && empty($_POST['username']))
  {
    $feedback = 'Je moet een username invullen!';
  }

  if(!empty($_POST['username']))
  {

    $user = new User();
    $user->Username = $_POST['username'];

    $available = $user->usernameAvailable();
    if($available == true)
    {

      $user->Save(); //INSERT USER INTO TABLE

      if(isset($user->errors) && !empty($user->errors))
      {
        if(isset($user->errors['errorCreate']))
        {
          $error = $user->errors['errorCreate'];
        }
      }
      else
      {
        $feedback = $user->feedbacks['Signedup'];
      }
    }
    else
    {
      if(isset($user->errors) && !empty($user->errors))
      {
        if(isset($user->errors['errorAvailable']))
        {
          $error = $user->errors['errorAvailable'];
        }
      }
    }

  }



include_once("config.php");

if(isset($_GET["logout"]) && $_GET["logout"]==1)
{
  //User clicked logout button, distroy all session variables.
  session_destroy();
  header('Location: '.$return_url);
}

?><html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
  <link href="css/buttonstyle.css" rel="stylesheet" type="text/css"> 
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    console.log('ready');
    $("#username").on("blur", function(e){
          //var clickedLink = $(this);
          var user = $("#username").val();
          console.log(user);
          $(".usernameFeedback").css("display","block");
          $.ajax({
            type: "POST",
            url: "ajax/check_username.php",
            data: { user: user }
          })
            .done(function(result) {
              console.log(result);
              if(result == 'true')
              {
                $(".usernameFeedback").html("<p id='available'>Yup :), username is available!</p>");                
              }
              else
              {
                $(".usernameFeedback").html("<p id='notavailable'>:( sorry, username is already taken!</p>");
              }
            });

          e.preventDefault();
        });

    $("#username").on("focus", function(e){
      $(".feedback").css("display","none");
      $(".error").css("display","none");
    });
  });
  </script>
</head>
<body><?php
if(!isset($_SESSION['logged_in']))
{
    echo '<div id="results">';
    echo '<!-- results will be placed here -->';
    echo '</div>';
    echo '<div id="LoginButton">';
    echo '</div>';


}
else
{
  echo 'Hi '. $_SESSION['user_name'].'! You are Logged in to facebook, <a href="?logout=1">Log Out</a>.';
}
?>

<div id="fb-root"></div>
<script type="text/javascript">
window.fbAsyncInit = function() {
  FB.init({
    appId: '<?php echo $appId; ?>',
    cookie: true,xfbml: true,
    channelUrl: '<?php echo $return_url; ?>channel.php',
    oauth: true
    });
  };
(function() {
  var e = document.createElement('script');
  e.async = true;e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
  document.getElementById('fb-root').appendChild(e);}());

function CallAfterLogin(){
  FB.login(function(response) {   
    if (response.status === "connected") 
    {
      LodingAnimate(); //Animate login
      FB.api('/me', function(data) {
        
        if(data.email == null)
        {
          //Facbeook user email is empty, you can check something like this.
          alert("You must allow us to access your email id!"); 
          ResetAnimate();

        }else{
          window.location = "index_bezoeker.php";
          
        }
        
      });
     }
  },
  {scope:'<?php echo $fbPermissions; ?>'});
}

//functions
function AjaxResponse()
{
 //Load data from the server and place the returned HTML into the matched element using jQuery Load().
   $(   "#results" ).load( "process_facebook.php" );

}

//Show loading Image
function LodingAnimate() 
{
  $("#LoginButton").hide(); //hide login button once user authorize the application
  $("#results").html('<img src="img/ajax-loader.gif" /> Please Wait Connecting...'); //show loading image while we process user
}

//Reset User button
function ResetAnimate() 
{
  $("#LoginButton").show(); //Show login button 
  $("#results").html(''); //reset element html
}

</script>
  <?php if (isset($feedback)): ?>
  <div class="feedback">
    <?php echo $feedback; ?>
  </div>
  <?php endif;?>
  <nav>
    <?php if(isset($_SESSION['loggedin'])): ?>
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </nav>
  <div class="login">
  <h1>Login here.</h1>
  <p>Control your digital restaurant</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="input">
      <div class="blockinput">
        <input type="text" placeholder="Username" name="loginname">
      </div>
      <div class="blockinput">
       <input type="password" placeholder="Password" name="loginpassword">
      </div>
      <div class="select">
          <select class="enlarge" name="functie" id="functie">
            <option value="houder">Restauranthouder</option>
            <option value="klant">Klant</option>
          </select>
      </div>
    </div>
    <input type="submit" name="btnlogin" id="btnlogin" value="login" />
    <br>
    <a href="" rel="nofollow" class="fblogin-button" onClick="javascript:CallAfterLogin();return false;"></a>
  </form> 
  </div>

  <div class="Register">
  <h1>Get your account.</h1>
  <p>This will be an amazing experience</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="input">
      <div class="blockinput">
       <input type="text" placeholder="Username"  id="username" name="username">
      </div>
      <div class="usernameFeedback"></div>
      <div class="blockinput">
       <input type="text" placeholder="voornaam" name="voornaam">
      </div>
      <div class="blockinput">
       <input type="text" placeholder="achternaam" name="achternaam">
      </div>
      <div class="blockinput">
       <input type="text" placeholder="telefoon" name="telefoon">
      </div>
         <div class="blockinput">
       <input type="text" placeholder="email" name="email">
      </div>
      <div class="blockinput">
        <input type="password" placeholder="Password" name="password">
      </div>
      <div class="select">
          <select class="enlarge" name="functie" id="functie">
            <option value="houder">Restauranthouder</option>
            <option value="klant">Klant</option>
          </select>
      </div>
    </div>
    <input type="submit" name="btnregister" id="btnregister" value="register" />
  </form> 
  </div>
</body>
</html>