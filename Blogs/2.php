<!DOCTYPE html>
				<html lang = "en">
				<head>
				<meta charset = "utf-8" />
				<title>TypoCoder</title>
				<link rel = "stylesheet" type = "text/css" href = "../Style/index_page.css" />
				<link rel = "stylesheet" type = "text/css" href = "../Style/all_pages.css" />
				<link rel = "stylesheet" type = "text/css" href = "../Style/blog.css" />
				</head>
				<body>
				<div class = "header">
				<a href = "../index.php"><img src="../Images/logo.png" /></a>
				<span class = "logout">
				<a href = "../logout.php"><button class = "btn">LogOut</button></a>
				</span>
				<span class = "welcome">
				<?php
					function display_user_name ($user, $tagb = "<b>", $tage = "</b>", $tag1b = "<b style = 'color: green;'>"
						        , $tag1e = "</b>", $tag2b = "<b style = 'color: red;'>", $tag2e = "</b>") {
						//$conn = mysqli_connect("localhost", "root", "", "typocoder");
						include("../Util/Connect_db.php");
						if(!$conn) {
							return $tagb.$user.$tage;
						}
						$sql = "SELECT COUNT(*) FROM admins WHERE user_name = '$user';";
						$result = mysqli_query($conn, $sql);
						if(!$result) {
							mysqli_close($conn);
							return $tag2b.$user.$tag2e;
						} 
						$row = mysqli_fetch_array($result);
						$cnt = $row[0];
						settype($cnt, "integer");
						if($cnt > 0) {
							mysqli_close($conn);
							return $tagb.$user.$tage;
						}
						// not an admin
						if($conn) {
							$sql = "SELECT max(login_id) FROM logins WHERE user_name = '$user';";
							$result = mysqli_query($conn, $sql);
							if($result) {
								$row = mysqli_fetch_array($result);
								$login_id = $row[0];
								settype($login_id, "integer");
								$sql = "SELECT COUNT(*) FROM logins WHERE login_id = $login_id and login_time = logout_time;";
								$result = mysqli_query($conn, $sql);
								if(!$result) {
									mysqli_close($conn);
									return $tag2b.$user.$tag2e;
								}
								$row = mysqli_fetch_array($result);
								$cnt = $row[0];
								settype($cnt, "integer");
								if($cnt > 0) {
									mysqli_close($conn);
									return $tag1b.$user.$tag1e;
								} else {
									mysqli_close($conn);
									return $tag2b.$user.$tag2e;
								}
							} else {
								mysqli_close($conn);
								return $tag2b.$user.$tag2e;
							}
						} else {
							mysqli_close($conn);
							return $tag2b.$user.$tag2e;
						}
						mysqli_close($conn);
					}
					session_start();
					$user_name = "";
					$blogid = 2;
					if(isset($_SESSION["logged_in_user_name"])) {
						$user_name = $_SESSION["logged_in_user_name"];
					} else if(isset($_POST["user_name"])) {
						$user_name = $_POST["user_name"];
					} else if(isset($_COOKIE["typocoder_user_name"])) {
						$user_name = $_COOKIE["typocoder_user_name"];
					} else {
						header("Location: ../login.html");
						exit(0);
					}
					printf("<h3>Welcome %s!</h3>", display_user_name($user_name));
					if($user_name == "") {
						header("Location: ../login.html");
						exit(0);
					}
					//$conn = mysqli_connect("localhost", "root", "", "typocoder");
					include("../Util/Connect_db.php");
					$err = '<h1>Something is wrong. We are fixing it now.</h1></div>
				<div class = "footer">
				TypoCoder &copy; 2015 - <span id = "cur_year"></span> <b>Raghavendra M Dani</b><br />
				Current Time: <span id = "date_time">null</span><br />
				</div>
				<script src = "../Scripts/update_date.js"></script>
				</body>
				</html>';

					if(!$conn) {
						die($err);
					}
					$sql = "SELECT COUNT(*) FROM approved_blogs WHERE blog_id = $blogid;";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array($result);
					$cnt = $row[0];
					settype($cnt, "integer");
					if($cnt == 0) {
						header("Location: ../index.php");
						exit(0);
					}
					$sql = "SELECT COUNT(user_name) FROM user_blog_read WHERE blog_id = $blogid and user_name = '$user_name';";
					$result = mysqli_query($conn, $sql);
					if(!$result) {
						mysqli_close($conn);
						die($err);
					}

					$row = mysqli_fetch_array($result);
					$cnt = $row[0];
					settype($cnt, "integer");
					if($cnt == 0) {
						$sql = "INSERT INTO user_blog_read (user_name, blog_id) VALUES('$user_name', $blogid);";
						$result = mysqli_query($conn, $sql);
						if(!$result) {
							mysqli_close($conn);
							die($err);
						}
						$sql = "UPDATE blogs SET downloads = downloads + 1 WHERE blog_id = $blogid;";
						$result = mysqli_query($conn, $sql);
						if(!$result) {
							mysqli_close($conn);
							die($err);
						}
					}

				?>
				</span>
				</div>
			<div class = "main_container"><h3 style = 'text-align: center;'><a href = '../index.php'>&lt; Main Page</a></h3><div class = 'blogdata'><h1>Color codes used in this platform.</h1>
<h3>Username of admins will be always "black".</h3>
<h3>Username of some user (non admins) will be "<b style = "color: red;">Red</b>" when he/she is offline.</h3>
<h3>Username of some user (non admins) will be "<b style = "color: green;">Green</b>" when he/she is online.</h3>
<h3>Some helpful tips:</h3>
<h5>Always click "Logout" button in the top right corner before closing the browser.</h5>
<h5>Don't use "back" button. Use "TypoCoder" logo to go to home page instead.</h5>
<h3> Happy Coding :)</h3></div></div>
		<div class = "footer">
			TypoCoder 2015 - <span id = "cur_year"></span> Developed by <b>Raghavendra M Dani</b><br />
			Current Time: <span id = "date_time">null</span><br />
		</div>
		<script src = "../Scripts/update_date.js"></script>
	</body>
</html>