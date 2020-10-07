<?php

require '../connection.php';
require '../config/constant.php';

session_start();

$connection = new connection();
$connect = $connection->connect();

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['admin'])) {
	$location = 'admin';
	$query = "SELECT * FROM user WHERE user_username='".$username."' AND user_password='".$password."' AND user_status = 'Active'";
} else {
	$location = 'athlete';
	$query = "SELECT * FROM athlete WHERE athlete_username='".$username."' AND athlete_password='".$password."' AND athlete_status='Active'";
}

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($result)) {
	$_SESSION['login_error'] = "";
	$_SESSION['user'] = $result;
	$_SESSION['is_logged_in'] = true;
	header('Location: ' . BASE_URL . $location);
} else {	
	$_SESSION['login_error'] = "Invalid username/password!";
	header('Location: ' . BASE_URL);
}