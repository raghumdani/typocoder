<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>TypoCoder</title>
		<link rel = "stylesheet" type = "text/css" href = "Style/viewed_by_page.css" />
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
					include("Util/get_relative_time.php");
				?>
			</span>
		</div>
		<div class = "main_container">
		<?php
			include("Util/common.php");
			//$conn = mysqli_connect("localhost", "root", "", "typocoder");
			include("Util/Connect_db.php");
			if(!$conn) {
				die($Rerr);
			}
			//LOGGED IN
			$blogid = $_GET['blogid'];
			printf("<table class = 'viewed_by'>
						<tr>
							<th>Username</th>
							<th>Viewed at</th>
							<th>Institution</th>
						</tr>
					");

			$sql = "SELECT user_name, inst FROM users WHERE user_name IN (SELECT user_name FROM user_blog_read WHERE blog_id = $blogid);";
			$result = mysqli_query($conn, $sql);
			if(!$result) {
				mysqli_close($conn);
				printf("</table>");
				die($Rerr);
			}
			while($row = mysqli_fetch_assoc($result)) {
				$usr = $row['user_name'];
				$sql = "SELECT view_time FROM user_blog_read WHERE user_name = '$usr' AND blog_id = $blogid;";
				$res = mysqli_query($conn, $sql);
				if(!$res) {
					mysqli_close($conn);
					printf("</table>");
					die($Rerr);
				}
				$rcc = mysqli_fetch_array($res);
				printf("<tr>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
						</tr>", display_user_name($row['user_name']), get_relative_time($rcc[0]), $row['inst']);
			}
			printf("</table>");
			for($i = 0; $i < 8; ++$i) {
				printf("<br />");
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