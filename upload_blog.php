<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>TypoCoder</title>
		<link rel = "stylesheet" type = "text/css" href = "Style/index_page.css" />
		<link rel = "stylesheet" type = "text/css" href = "Style/all_pages.css" />
		<link rel = "icon" href = "Images/logo.png" />
		<!--<link rel = "stylesheet" type = "text/css" href = "Style/css/bootstrap.css" />
		<script type="text/javascript" src = "Style/js/bootstrap.js"></script> -->

	</head>
	<body>
		<div class = "header">
			<a href = "index.php"><img src="Images/logo.png" /></a>
			<span class = "logout">
				<a href = "logout.php"><button class = "btn">LogOut</button></a>
			</span>
			<span class = "welcome">
				<?php
					include("Util/display_user_name.php");
					include("Util/check_login_status.php");
				?>
			</span>
		</div>
		<div class = "main_container">
		<?php
			include("Util/common.php");
			//$conn = mysqli_connect("localhost", "root", "", "typocoder");
			include("Util/Connect_db.php");
			//User Logged IN
			/* Do from here */
			$target_dir = "Blogs/";
			$sql = "SELECT max(blog_id) from blogs;";
			$result = mysqli_query($conn, $sql);
			if(!$result) {
				mysqli_close($conn);
				die($Rerr);
			}

			$row = mysqli_fetch_array($result);
			$blogid = $row[0];
			settype($blogid, 'integer');
			$blogid = $blogid + 1;
			settype($blogid, 'string');
			$target = $target_dir.$blogid.'.php';
			$not_to_display = $_POST['subject'];
			$subject = "Pending for Approval";

			$sql = "INSERT INTO blogs (blog_id, url, uploaded_by, subject, not_to_display) VALUES($blogid, '#', '$user_name', '$subject', '$not_to_display');";

			$result = mysqli_query($conn, $sql);
			if(!$result) {
				printf(mysqli_error($conn));
				mysqli_close($conn);
				die($Rerr);
			}
			$fil = "";
			if(!move_uploaded_file($_FILES['blog']['tmp_name'], $target)) {
				$fil = $_POST['txtblog'];
			} else {
				$fil = file_get_contents($target);
			}
			$pref = '<!DOCTYPE html>
				<html lang = "en">
				<head>
				<meta charset = "utf-8" />
				<title>TypoCoder</title>
				<link rel = "stylesheet" type = "text/css" href = "../Style/index_page.css" />
				<link rel = "stylesheet" type = "text/css" href = "../Style/all_pages.css" />
				<link rel = "stylesheet" type = "text/css" href = "../Style/blog.css" />
		<!--<link rel = "stylesheet" type = "text/css" href = "../Style/css/bootstrap.css" />
		<script type="text/javascript" src = "../Style/js/bootstrap.js"></script> -->
				<link rel = "icon" href = "../Images/logo.png" />
				</head>
				<body>
				<div class = "header">
				<a href = "../index.php"><img src="../Images/logo.png" /></a>
				<span class = "logout">
				<a href = "../logout.php"><button class = "btn">LogOut</button></a>
				</span>
				<span class = "welcome">
				<?php
					include("../Util/display_user_name.php");
					include("../Util/check_login_status.php");
					include("../Util/common.php");
					//$conn = mysqli_connect("localhost", "root", "", "typocoder");
					include("../Util/Connect_db.php");
					if(!$conn) {
						die($Rerr);
					}
					$blogid = '.$blogid.';
					$sql = "SELECT COUNT(*) FROM approved_blogs WHERE blog_id = $blogid;";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array($result);
					$cnt = $row[0];
					settype($cnt, "integer");
					if($cnt == 0) {
						header("Location: ../index.php");
						exit(0);
					}
					$sql = "SELECT COUNT(user_name) FROM user_blog_read WHERE blog_id = $blogid and user_name = \'$user_name\';";
					$result = mysqli_query($conn, $sql);
					if(!$result) {
						mysqli_close($conn);
						die($err);
					}

					$row = mysqli_fetch_array($result);
					$cnt = $row[0];
					settype($cnt, "integer");
					if($cnt == 0) {
						$sql = "INSERT INTO user_blog_read (user_name, blog_id) VALUES(\'$user_name\', $blogid);";
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
				<div class = "main_container"><h3 style = "text-align: center;"><a href = "../index.php">&lt; Main Page</a></h3><div class = "blogdata">';

			$suff = 	'</div></div>
						<div class = "footer">
					TypoCoder &copy; 2015 - <span id = "cur_year"></span> <b>Raghavendra M Dani</b><br />
					Current Time: <span id = "date_time">null</span><br />
					</div>
					<script src = "../Scripts/update_date.js"></script>
					</body>
					</html>';
			$fil = $pref.'<h1 style = "text-align: center;">'.$not_to_display.'</h1>'.$fil.$suff;
			$myf = fopen($target, "w") or die($err);

			fwrite($myf, $fil);
			fclose($myf);
			/*File closed mo */
			printf("<h2>Your Thought has been uploaded Successfully. You may now <a href = 'index.php'>go back</a> and view it</h2>");
			for($i = 0; $i < 17; ++$i) {
				printf("<br />");
				//just for fun
			}
			mysqli_close($conn);
		?>
	</div>
		<div class = "footer">
			TypoCoder 2015 - <span id = "cur_year"></span> Developed by <b>Raghavendra M Dani</b><br />
			Current Time: <span id = "date_time">null</span><br />
		</div>
		<script src = "Scripts/update_date.js"></script>
	</body>
</html>
