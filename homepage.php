<?php
  require 'vendor/autoload.php';
  $dbh = new PDO("mysql:host=localhost;dbname=phpauth", "root", "");
  $config = new PHPAuth\Config($dbh);
  $auth   = new PHPAuth\Auth($dbh, $config);
  if ($auth->isLogged()){
    header('Location: /dash.php');
    exit();
  }
  if(isset($_POST['login'])){
    $login = $auth->login($_POST['email'], $_POST['pass'], true);
    if($login['error']) {
        // Something went wrong, display error message
        echo '<h4 style="color: #26a69a;" ><div  align="center" class="error">' . $login['message'] . '</div></h4>';
    } else {
        // Logged in successfully, set cookie, display success message
       setcookie($config->cookie_name, $login['hash'], $login['expire'], $config->cookie_path, $config->cookie_domain, $config->cookie_secure, $config->cookie_http);
       header('Location: /dash.php');
    }
  }
?>


<html>
  <head><link rel="shortcut icon" href="images/DDULogo.jpg" type="image/jpg" /><title style="color: #26a69a;">
  DDUC || Online Certificates
</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.css" />
    <link rel="stylesheet" href="css/abc.css" />
    <script src="js/jquery.js"></script>
    <script src="js/materialize.js"></script>
    <style>
      #dashboard{
        margin-top: 10%;
        border: 4px solid #26a69a;
        padding: 40px;
      }
         
      #user{
        margin-top: -13%;
      }
      #user i{
        color: #26a69a;
      }
    body{
      background: #F5F5F5;
    }


}
</style>
  </head>
  <body background="">
    <form method="post" action="index.php">
      <div id = "dashboard" class="row container">
        <div id = "user" class="col s2 offset-s5">
          <i class="large material-icons">person_pin</i>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
              <input  name = "email" id="email" type="text">
              <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
              <input name = "pass" id="password" type="password">
              <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
          <button class="btn waves-effect waves-light col s2 offset-s5" type="submit" name="login">Amdin Login
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </form>
     <marquee> <h1 style="color: #26a69a;" align="center">Online certificate generating system of dduc</h1></marquee>
  </body>
</html>
