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
					$blogid = 1;
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
			<div class = "main_container"><h3 style = 'text-align: center;'><a href = '../index.php'>&lt; Main Page</a></h3><div class = 'blogdata'><h1>Hello everyone! We will be hosting programming competitions regularly.</h1>
<h1>TypoCoder is basically targetted towards improving programming skills of 1st, 2nd and 3rd year students of NITK</h1>
<b>Whenever problems are ready (new ideas), we will host a programming competition.</b> <br />
<br />
<br />
Here are simple steps you have to follow while using this platform. 
<ul>
	<li>Click 'TypoCoder' logo to go to home page. You may get 'Form Resubmission' error on pressing back. (this error will be fixed soon)</li>
	<li>You have to write your own thought/opinion/blog on a .txt file on your computer and then you can upload using upload box in the home page 
		so that it appears in the Thoughts/Blogs feed.</li>
	<li>You can use HTML markup for styling your opinion/thought/blog.</li>
	<li>Use modern web browsers like chrome/firefox for better experience of the website.</li>
	<li>Stay tuned as these Thoughts/Blogs will be used to notify you about upcoming contest.</li>
	<li>Please don't cheat/copy codes. Though we don't have plagarism tester, we will come to know if you do.</li>
	<li>You will love to know that these questions will definitely involve thinking and I can guarantee they will improve you skills.</li>
</ul>
<h3>IF YOU WANT TO SET PROBLEMS/HAVE ANY NEW IDEAS DO LET US KNOW.</h3>
<br />
<h3>Last but not the least, Happy Coding :)</h3></div></div>
		<div class = "footer">
			TypoCoder 2015 - <span id = "cur_year"></span> Developed by <b>Raghavendra M Dani</b><br />
			Current Time: <span id = "date_time">null</span><br />
		</div>
		<script src = "../Scripts/update_date.js"></script>
	</body>
</html>