<?php
  include_once("login_logica.php");
?><html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/stylesheet.css" type="text/css" /> 
</head>
<body>
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
  </form> 
  </div>

  <div class="Register">
  <h1>Get your account.</h1>
  <p>This will be an amazing experience</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="input">
      <div class="blockinput">
       <input type="text" placeholder="Username" name="username">
      </div>
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