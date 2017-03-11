<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>TypoCoder</title>
		<link rel = "stylesheet" type = "text/css" href = "Style/index_page.css" />
		<link rel = "stylesheet" type = "text/css" href = "Style/all_pages.css" />
		<!--<link rel = "stylesheet" type = "text/css" href = "Style/css/bootstrap.css" />
		<script type="text/javascript" src = "Style/js/bootstrap.js"></script> -->
		<script type = "text/javascript" src = "ckeditor/ckeditor.js"></script>
		<link rel = "icon" href = "Images/logo.png" />
	</head>
	<body>
		<div class = "header">
			<a href = "index.php"><img src="Images/logo.png" /></a>
			<span class = "logout">
				<a href = "logout.php"><button class = "btn">LogOut</button></a>
			</span>
			<div><a href = "recent_submissions.php"><button class = "btn">Recent Submissions</button></a></div>
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
			include("Util/get_row_color.php");
			if(!$conn) {
				die($Rerr);
			}

			$sql = "SELECT * FROM users WHERE user_name = '$user_name';";
			$result = mysqli_query($conn, $sql);
			if(!$result) {
				echo $err;
				mysqli_close($conn);
				die($Rerr);
			}
			$row = mysqli_fetch_assoc($result);
			$mdpassword = md5($password);
			if(!isset($row['password']) or ($row['password'] != $password && $row['password'] != $mdpassword)) {
				printf("<h1>It seems your username/password is incorrect. Please <a href = 'login.html'>click here</a> to enter again</h1>");
				mysqli_close($conn);
				die($err);
			}
			/* Create the damn  cookies */
			if(isset($_POST["check_val"])) {
				setcookie("typocoder_user_name", $user_name, time() + 24 * 60 * 60 * 30);
				setcookie("typocoder_password", $password, time() + 24 * 60 * 60 * 30);
			}
			if($logged_in == 1) {
				$sql = "SELECT COUNT(*) FROM logins WHERE user_name = '$user_name';";
				$result = mysqli_query($conn, $sql);
				if($result) {
					$row = mysqli_fetch_array($result);
					$cnt = $row[0];
					settype($cnt, "integer");
					if($cnt == 0) {
						$sql = "INSERT INTO logins (user_name, login_time) VALUES('$user_name', CURRENT_TIMESTAMP);";
						$result = mysqli_query($conn, $sql);
						if(!$result) {
							mysqli_close($conn);
							die($Rerr);
						}
					} else {
						$sql = "UPDATE logins SET login_time = CURRENT_TIMESTAMP, logout_time = CURRENT_TIMESTAMP WHERE user_name = '$user_name';";
						$result = mysqli_query($conn, $sql);
						if(!$result) {
						
							die($Rerr.mysqli_error($conn));
						}
					}
				} else {
					mysqli_close($conn);
					die($Rerr);
				}
			}
			//User Logged IN
			$_SESSION['logged_in_password'] = $password;
			$_SESSION['logged_in_user_name'] = $user_name;
			/* Do from here */
			printf("<div class = 'contests'>");
			$sql = "SELECT * FROM contests ORDER BY start_time DESC, cid DESC;";
			$result = mysqli_query($conn, $sql);

			if(!$result) {
				printf("<h3>No Contests Yet</h3>");
				printf("</div>");
				mysqli_close($conn);
				die($Rerr);
			}
			printf("<h2 style = 'text-align: center;'>Contests</h2>");
			printf("<table class = 'contests_table'>
					<tr>
				    	<th>ID</th>
				    	<th>Name</th>
				    	<th>Start Time</th>
				    	<th>End Time</th>
				    	<th>Link</th>
				    	<th>Submissions</th>
				    </tr>");
			while($row = mysqli_fetch_assoc($result)) {
				printf("<tr %s>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
							<td><a href = '%s'>Enter</a></td>
							<td>%s</td>
						</tr>", get_row_color($row['start_time'], $row['end_time']), $row['cid'], $row['name'], $row['start_time'], $row["end_time"], $row['url'], $row["submissions"]);
			}
			printf("</table>");
			printf("</div>"); //END OF CONTESTS DIV
			printf("<div class = 'discuss'>");
			$sql = "SELECT * FROM blogs ORDER BY upload_time DESC;";
			$result = mysqli_query($conn, $sql);
			if(!$result) {
				printf("<h3>No Blogs Yet</h3>");
				printf("</div>");
				mysqli_close($conn);
				die($Rerr);
			}
			printf("<h2 style = 'text-align: center;'>Thoughts/Blogs</h2>");
			printf("	<table class = 'blog_post'>
							<tr>
								<th>SLNo</th>
								<th>Status</th>
								<th>Subject</th>
								<th>Upload Time</th>
								<th>Link</th>
								<th>Uploaded By</th>
								<th>Views</th>
<!-- Viewed by is  an optional feature								<th>Viewed By</th> -->
							</tr>");
			while($row = mysqli_fetch_assoc($result)) {
				$blogid = $row['blog_id'];
				settype($blogid, "integer");
				$sql = "SELECT COUNT(user_name) FROM user_blog_read WHERE blog_id = $blogid and user_name = '$user_name';";
				$res = mysqli_query($conn, $sql);
				if(!$res) {
					mysqli_close($conn);
					die($Rerr);
				}
				$rcc = mysqli_fetch_array($res);
				$cnt = $rcc[0];
				$status = "Seen";
				settype($cnt, "integer");
				if($cnt == 0) {
					$status = "<b>New</b>";
				}
				printf("<tr>
							<td>%d</td>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
							<td><a href = %s>View</a></td>
							<td>%s</td>
							<td>%d</td>
<!-- If you see this page, you can view who viewed also							<td><a href = %s>Click</a></td> -->
						</tr>", $row['blog_id'], $status, $row['subject'], $row['upload_time'], $row['url'], 
						        display_user_name($row['uploaded_by']), $row['downloads'], 
						        "viewed_by.php?blogid=$blogid");
			}
			printf("</table></div>"); //END OF DIV discuss
			printf("<div class = 'upload_blog'>");
			printf("<form action = 'upload_blog.php' method = 'post' enctype = 'multipart/form-data'>
						<input type = 'hidden' name = 'user_name' value = '$user_name'/>
						<fieldset class = 'acc-info'>
							<label>
								Subject of your blog!
								<input type = 'text' name = 'subject' required />
							</label>
							<label>
							<textarea rows = '20' cols = '200' id = 'txtblog' name = 'txtblog'>
								Whats on your mind?
							</textarea>
							</label>
							<script type = 'text/javascript'>
								CKEDITOR.replace('txtblog');
							</script>
							<label>
								Or choose a file
								<input type = 'file' name = 'blog' />
							</label>
						</fieldset>
						<fieldset class = 'acc-action'>
							<input class = 'btn' type = 'submit' value = 'Upload' />
						</fieldset>
					</form>
					</div>"); //END OF DIV upload_blog
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
