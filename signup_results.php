<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>Sign Up Results</title>
		<link rel = "stylesheet" type = "text/css" href = "Style/signup_results.css" />
		<link rel = "stylesheet" type = "text/css" href = "Style/all_pages.css" />
		<link rel = "icon" href = "Images/logo.png" />
		<!--<link rel = "stylesheet" type = "text/css" href = "Style/css/bootstrap.css" />
		<script type="text/javascript" src = "Style/js/bootstrap.js"></script> -->

	</head>
	<body>
		<div class = "header">
			<a href = "index.php"><img src="Images/logo.png" /></a>
		</div>
		
		<div class = "results">
			<?php
				include("Util/common.php");
				if(isset($_POST['name'])) {
					$name = $_POST['name'];
				} else {
					header("Location: signup.html");
					exit(0);
				}
				$dob = $_POST['dob'];
				$user_name = $_POST['user_name'];
				$password = $_POST['password'];
				$r_password = $_POST['r_password'];
				$inst = $_POST['inst'];
				$work = $_POST['work'];
				$batch = $_POST['batch'];
				$email = $_POST["email"];

				if($user_name == "") {
					header("Location: signup.html");
					exit(0);
				}
				
				if($password != $r_password) {
					printf("<h1>Passwords do not match.</h1>");
					printf("<a href = 'signup.html'>Click Here to Enter again</a>");
					die($err);
				}
				$mdpassword = md5($password);
				//$conn = mysqli_connect("localhost", "root", "", "typocoder");
				include("Util/Connect_db.php");
				if(!$conn) {
					die("MySQL Connection Failed. We are fixing it.".mysqli_error($conn).$err);
				}

				$sql = "INSERT INTO users(name, dob, user_name, password, inst, work, batch, email) VALUES('$name', '$dob', '$user_name', '$mdpassword', '$inst', '$work', $batch, '$email');";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					printf("<h1>Try some other username.");
					printf("<a href = 'signup.html'>Click Here to Enter again</a></h1>");
					mysqli_close($conn);
					die($err);
				}
				mysqli_close($conn);
			?>
			<h1>Your account have been successfully created. You may now <a href = "login.html">Login</a><h1>
		</div>
		<div class = "footer">
			TypoCoder 2015 - <span id = "cur_year"></span> Developed by <b>Raghavendra M Dani</b><br />
			Current Time: <span id = "date_time">null</span><br />
		</div>
		<script src = "Scripts/update_date.js"></script>
	</body>
</html>