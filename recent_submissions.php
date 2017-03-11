<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>TypoCoder</title>
		<link rel = "stylesheet" type = "text/css" href = "Style/leaderboard.css" />
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
					//$conn = mysqli_connect("localhost", "root", "", "typocoder");
					include("Util/Connect_db.php");
					if(!$conn) {
						header("Location: index.php");
						exit(0);
					}
				?>
			</span>
		</div>
		<div class = "main_container">
			<?php 
			  include ("Util/all_colors.php");
				printf("<h3 class = 'dashboard'><a href = 'index.php'>&lt; Main Page</a></h3>");
				printf("<h3 class = 'dashboard'>recent 50 submissions</h3>");
				printf("<div class = 'towrap'>");
				printf("<table class = 'table-leader'>");
				printf("<tr>");
				printf("<th>User</th>");
				printf("<th>QID</th>");
				printf("<th>Problem</th>");
				printf("<th>Submitted Time</th>");
				printf("<th>Verdict</th>");
				printf("</tr>");

				$sql = "SELECT * FROM submissions ORDER BY submitted_time DESC LIMIT 50;";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					mysqli_close($conn);
					header("Location: index.php");
					exit(0);
				}

				while ($row = mysqli_fetch_assoc($result)) {
					$qq = $row["qid"];
					$sql = "SELECT name FROM questions WHERE qid = $qq";
					$res = mysqli_query($conn, $sql);
					if (!$res) {
						continue;
					}
					$qname_assoc = mysqli_fetch_assoc($res);

					printf("<tr>");
					printf("<td>%s</td>", $row["user_name"]);
					printf("<td>%d</td>", $row["qid"]);
					printf("<td><a href = 'Questions/%d.php?cid=%d' style = 'color: black' title = 'display problem'>%s</a></td>", $qq, $row["cid"], $qname_assoc["name"]);
					printf("<td>%s</td>", get_relative_time($row["submitted_time"]));
					
					$time_taken = $row["time_taken"];
					$sub_id = $row["sub_id"];
					$cid = $row["cid"];
					$verdict = $row['verdict'];
					$message = "<b><a style = 'color: ".color_of_verdict($verdict).";' href = 'display_source.php?cid=$cid&sub_id=$sub_id&practice=$practice' title = 'View source' target = '_blank'>".$verdict."</a></b>";
					printf("<td>%s", $message);
					if ($verdict == 'Accepted' || $verdict == 'Rejected') 
					  printf("<br /><b style = 'font-size: 11px;'>(%.3lf)</b>", $time_taken);
					printf("</td></tr>");
				}
				printf("</table>");
				printf("</div>");
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
