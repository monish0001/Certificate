<?php

  require 'vendor/autoload.php';

  $dbh = new PDO("mysql:host=localhost;dbname=phpauth", "root", "");

  $config = new PHPAuth\Config($dbh);
  $auth   = new PHPAuth\Auth($dbh, $config);

  $auth->logout($auth->getSessionHash());

  header('Location: /');

  /*
  make new user
  $return = $auth->register('webmaster@gmail.com', 'Webmaster@123', 'Webmaster@123');
  print_r($return);
  */

  /*
  login
  $login = $auth->login('webmaster@gmail.com', 'Webmaster@123', true);
  if($login['error']) {
      // Something went wrong, display error message
      echo '<div class="error">' . $login['message'] . '</div>';
  } else {
      // Logged in successfully, set cookie, display success message
     setcookie($config->cookie_name, $login['hash'], $login['expire'], $config->cookie_path, $config->cookie_domain, $config->cookie_secure, $config->cookie_http);
     echo '<div class="success">' . $login['message'] . '</div>';
  }*/

  /*
  check logged in
  $config = new PHPAuth\Config($dbh);
  $auth   = new PHPAuth\Auth($dbh, $config);
    if (!$auth->isLogged()) {
        echo "Forbidden";
        exit();
    }
  */

?>
