<?php

  require 'vendor/autoload.php';

  $dbh = new PDO("mysql:host=localhost;dbname=phpauth", "root", "");

  $config = new PHPAuth\Config($dbh);
  $auth   = new PHPAuth\Auth($dbh, $config);

  if ($auth->isLogged()) {
    header('Location: /dash.php');
    exit();
  }

  
?>
<table align="center"></table>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>DDUC - CERTIFICATES  </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/logo.png"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

<style type="text/css">
	*{
		font-family: Poppins-Bold;
		    font-size: 24px;
	}
</style>
</head>
<body >
	
	<div class="limiter">
		<div  class="container-login100" style="background: #26a69a;">
			<?php 

			if(isset($_POST['login'])){
    $login = $auth->login($_POST['email'], $_POST['pass'], true);
    if($login['error']) {
        // Something went wrong, display error message
        echo '<h4 style="color: white;" ><div  align="center" class="error">' . $login['message'] . '</div></h4>';
    } else {
        // Logged in successfully, set cookie, display success message
       setcookie($config->cookie_name, $login['hash'], $login['expire'], $config->cookie_path, $config->cookie_domain, $config->cookie_secure, $config->cookie_http);
       header('Location: /dashHome.php');
    }
  }

			?>

			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/image.png" alt="IMG">
				</div>

				<form method="post"  class="login100-form validate-form">
					<span style="color:#26a69a; " class="login100-form-title">
						
						ONLINE CERTIFICATE GENERATING SYSTEM OF DEEN DAYAL UPADHYAYA COLLEGE (UNIVERSITY OF DELHI)
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: somemail@gmail.com">
						<input class="input100" type="email"  id="email"  name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" id="password" 
						placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input style="cursor: pointer;" class="login100-form-btn" type="submit" value=" Login" name="login">
						
					</div>

					<div class="text-center p-t-12">
					<!--	<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a> -->
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
						<!--	Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>-->
						</a>
					</div>

				</form>

			</div>

		</div>
	</div>
	
	

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>

</body>
</html>