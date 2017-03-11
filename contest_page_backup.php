<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>TypoCoder</title>
		<link rel = "stylesheet" type = "text/css" href = "Style/contest_page.css" />
		<link rel = "stylesheet" type = "text/css" href = "Style/all_pages.css" />
		<!--<link rel = "stylesheet" type = "text/css" href = "Style/css/bootstrap.css" />
		<script type="text/javascript" src = "Style/js/bootstrap.js"></script> -->
		<link rel = "icon" href = "Images/logo.png" />

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
				$contest_name = $_GET['contest_name'];
				include("Util/common.php");
				//$conn = mysqli_connect("localhost", "root", "", "typocoder");
				include("Util/Connect_db.php");
				if(!$conn) {
					die($Rerr);
				}
				printf("<h3 style = 'text-align: center;'><a href = 'index.php'>&lt; Main Page</a></h3>");
				printf("<h2 style = 'text-align: center;'>%s</h2>", $contest_name);
				printf("<div class = 'question_display'>");
				printf("<table>");
				printf("<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Author</th>
							<th>Submissions</th>
							<th>Status</th>
						</tr>");
				if(!isset($_GET["cid"])) {
					header("Location: index.php");
					exit(0);
				}
				$cid = $_GET["cid"];
				$sql = "SELECT COUNT(*) FROM contests WHERE cid = $cid and CURRENT_TIMESTAMP >= start_time;";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					mysqli_close($conn);
					header("Location: index.php");
					exit(0);
				}
				$row = mysqli_fetch_array($result);
				$cnt = $row[0];
				settype($cnt, "integer");
				if(!admin($user_name) && $cnt == 0) {
					mysqli_close($conn);
					header("Location: index.php");
					exit(0);
				}
				$sql = "SELECT * FROM questions WHERE cid = $cid ORDER BY qid ASC;";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					printf("</table></div>");
					mysqli_close($conn);
					die($Rerr);
				}

				while($row = mysqli_fetch_assoc($result)) {
					$qid = $row["qid"];
					$sql = "SELECT * FROM submissions WHERE user_name = '$user_name' and verdict = 'Accepted' and qid = $qid ORDER BY submitted_time DESC;";
					$res = mysqli_query($conn, $sql);
					if(!$res) {
						mysqli_close($conn);
						header("Location: index.php");
						exit(0);
					}
					$status = "<b>Unattempted</b>";
					$time_taken = 0.0;
					if(mysqli_num_rows($res)) {
						$rcc = mysqli_fetch_assoc($res);
						$sub_id = $rcc['sub_id'];
						$time_taken = $rcc['time_taken'];
						$status = "<b><a style = 'color: green' href = 'display_source.php?cid=$cid&sub_id=$sub_id' title = 'View source code' target = '_blank'>Accepted</a></b>";
					} else {
						$sql = "SELECT * FROM submissions WHERE user_name = '$user_name' and verdict = 'Rejected' and qid = $qid ORDER BY submitted_time DESC;";
						$res = mysqli_query($conn, $sql);
						if(!$res) {
							mysqli_close($conn);
							header("Location: index.php");
							exit(0);
						}
						if(mysqli_num_rows($res)) {
							$rcc = mysqli_fetch_assoc($res);
							$sub_id = $rcc['sub_id'];
							$time_taken = $rcc['time_taken'];
							$status = "<b><a style = 'color: red' href = 'display_source.php?cid=$cid&sub_id=$sub_id' title = 'View source code' target = '_blank'>Rejected</a></b>";
						}
					}
					if($status == '<b>Unattempted</b>') {
							printf("<tr>
								<td>%d</td>
								<td><a href = '%s'>%s</a></td>
								<td>%s</td>
								<td>%d</td>
								<td>%s</td>
							</tr>", $qid, "Questions/"."$qid".".php?cid=$cid", $row["name"], 
								         display_user_name($row["author"]), $row["submissions"], $status);
					} else {
							printf("<tr>
								<td>%d</td>
								<td><a href = '%s'>%s</a></td>
								<td>%s</td>
								<td>%d</td>
								<td>%s <b style = 'font-size: 11px;'>(%.3lf)</b></td>
							</tr>", $qid, "Questions/"."$qid".".php?cid=$cid", $row["name"], 
								         display_user_name($row["author"]), $row["submissions"], $status, $time_taken);
					}
				}
				printf("</table></div>");
				printf("<h3 style = 'text-align: center;'><a href = 'leaderboard.php?cid=$cid'>Leaderboard</a></h3>");
				printf("<h3 style = 'text-align: center;'><a href = 'leaderboard_practice.php?cid=$cid'>Practice Leaderboard</a></h3>");
				printf("<div class = 'notification'>");
				$sql = "SELECT * FROM notifications WHERE cid = $cid ORDER BY updated_time DESC;";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					mysqli_close($conn);
					header("Location: index.php");
					exit(0);
				}
				printf("<h3 style = 'text-align: center;'>Announcements</h3>");
				printf("<table>");
				printf("<tr>
							<th>Time</th>
							<th>News</th>
						</tr>");
				while($row = mysqli_fetch_assoc($result)) {
					printf("<tr>
								<td>%s</td>
								<td>%s</td>
							</tr>", $row["updated_time"], $row["news"]);
				}
				printf("</table></div>");
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
