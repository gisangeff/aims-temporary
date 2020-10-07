<?php
session_start();

require 'application/config/constant.php';

if(isset($_SESSION['is_logged_in'])) {
	header('Location: ' . BASE_URL . 'admin');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login - AIMS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<div class="company-logo">
			<a class="logo" href="index.php">
				<img src="images/um-logo.png">
				<h3>Athlete Information Management System</h3>
			</a>      
		</div>
		<div class="navigation-top">
			<ul>
				<li><a href="" hidden="">Login</a></li>
				<li><a href="" hidden="">Sign Up</a></li>
			</ul>  
		</div>
	</header>
	<section>
		<form action="application/controllers/login.php" method="post">
			<div class="login-form-avatar">
				<img class="avatar" src="images/default.png">
				<h3>Login here</h3>
			</div>
			<div class="input">
				<input type="text" name="username" placeholder="username">
				<input type="password" name="password" placeholder="password">
				<input type="submit" name="login" value="Sign in">  
			</div>
			<div class="forgot-password">
				<a href="#forgot" hidden="">Forgot Password?</a>
				<input type="checkbox" name="admin"> Login as admin
				<p><?php echo @$_SESSION['login_error']; ?></p>
			</div>
		</form>
	</section>
</body>
</html>
