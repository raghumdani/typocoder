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
					if(!isset($_GET["cid"])) {
						header("Location: index.php");
						exit(0);
					}
					//$conn = mysqli_connect("localhost", "root", "", "typocoder");
					include("Util/Connect_db.php");
					if(!$conn) {
						header("Location: index.php");
						exit(0);
					}
					$cid = $_GET["cid"];
					$practice = "no";
					if ($_GET["practice"]) {
						$practice = $_GET["practice"];
					}
					$selected_user = $_GET["user"];

					$sql = "SELECT COUNT(*) FROM contests WHERE cid = $cid and CURRENT_TIMESTAMP >= start_time;";
					$result = mysqli_query($conn, $sql);
					if(!$result) {
						mysqli_close($conn);
						header("Location: index.php");
						exit(0);
					}
					$row = mysqli_fetch_array($result);
					$cnt = $row[0];
					if(!admin($user_name) && $cnt == 0) {
						mysqli_close($conn);
						header("Location: index.php");
						exit(0);
					}
					$sql = "SELECT url FROM contests WHERE cid = $cid;";
					$result = mysqli_query($conn, $sql);
					if  (!$result) {
						mysqli_close($conn);
						header("Location: index.php");
						exit(0);
					}
					$contest_url = mysqli_fetch_array($result)[0];
	
				?>
			</span>
		</div>
		<div class = "main_container">
			<?php 
				echo "<h3 class = 'dashboard'><a href = '$contest_url'>&lt; Dashboard</a></h3>";
				printf("<h3 class = 'dashboard'>$selected_user 's submissions</h3>");
				printf("<div class = 'towrap'>");
				printf("<table class = 'table-leader'>");
				printf("<tr>");
				printf("<th>QID</th>");
				printf("<th>Problem</th>");
				printf("<th>Submitted Time</th>");
				printf("<th>Verdict</th>");
				printf("</tr>");

				$sql = "SELECT * FROM submissions WHERE cid = $cid and user_name = '$selected_user' and practice = '$practice' ORDER BY submitted_time DESC;";
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
					printf("<td>%d</td>", $row["qid"]);
					printf("<td><a href = 'Questions/%d.php?cid=%d' style = 'color: black' title = 'display problem'>%s</a></td>", $qq, $row["cid"], $qname_assoc["name"]);
					printf("<td>%s</td>", get_relative_time($row["submitted_time"]));
					
					$time_taken = $row["time_taken"];
					$sub_id = $row["sub_id"];
					$message = "<b><a style = 'color: black;' href = 'display_source.php?cid=$cid&sub_id=$sub_id&practice=$practice' title = 'View source' target = '_blank'>Compilation Error</a></b>";

					if($row["verdict"] == "Rejected") {
						$message = "<b><a style = 'color: red;' href = 'display_source.php?cid=$cid&sub_id=$sub_id&practice=$practice' title = 'View source' target = '_blank'>Rejected</a></b>";
					}
					else if($row["verdict"] == "Accepted") {
						$message = "<b><a style = 'color: green;' href = 'display_source.php?cid=$cid&sub_id=$sub_id&practice=$practice' title = 'View source' target = '_blank'>Accepted</a></b>";
					}
					printf("<td>%s<br /><b style = 'font-size: 11px;'>(%.3lf)</b></td>", $message, $time_taken);
					printf("</tr>");
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
