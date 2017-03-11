<?php
session_start();
$user_name = "";
$password = "";
$logged_in = 0;
if(!isset($_POST["user_name"])) {
	if(!isset($_COOKIE["typocoder_user_name"])) {
		if(isset($_SESSION['logged_in_user_name'])) {
			$user_name = $_SESSION['logged_in_user_name'];
			$password = $_SESSION['logged_in_password'];
		} else {
			mysqli_close($conn);
			header("Location: login.html");
			exit(0);
		}
	} else {
			$user_name = $_COOKIE["typocoder_user_name"];
			$password = $_COOKIE["typocoder_password"];
			$logged_in = 1;
	}
} else if(isset($_POST["user_name"])) {
	$user_name = $_POST['user_name'];
	if(isset($_POST['password'])) {
		$password = $_POST['password'];
	}
	$logged_in = 1;
}
if($user_name == "") {
	header("Location: login.html");
	exit(0);
}
printf("<h3>Welcome <b id = 'user_name'>%s</b>!</h3>", display_user_name($user_name));
?>