<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>TypoCoder</title>
		<link rel = "stylesheet" type = "text/css" href = "Style/leaderboard.css" />
		<link rel = "stylesheet" type = "text/css" href = "Style/all_pages.css" />
		<link rel = "stylesheet" type = "text/css" href = "Style/display_source.css" />
		<link rel = "icon" href = "Images/logo.png" />
		<link href="Style/shCoreEclipse.css" rel="stylesheet" type="text/css" />
  		<link href="Style/shThemeEclipse.css" rel="stylesheet" type="text/css" />
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
					if(!isset($_GET["cid"]) || !isset($_GET["sub_id"])) {
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
					$sub_id = $_GET["sub_id"];
					$practice = "no";
					if(isset($_GET["practice"])) {
						$practice = $_GET["practice"];
					}
					$sql = "SELECT COUNT(*) FROM contests WHERE cid = $cid and CURRENT_TIMESTAMP <= end_time;";
					$result = mysqli_query($conn, $sql);
					if(!$result) {
						mysqli_close($conn);
						header("Location: index.php");
						exit(0);
					}
					$row = mysqli_fetch_array($result);
					$before_contest = $row[0];
					settype($before_contest, "integer");
					$sql = "SELECT user_name FROM submissions WHERE sub_id = $sub_id;";
					$uu = "";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)) {
						$row = mysqli_fetch_assoc($result);
						$uu = $row['user_name'];
					}
					if(!admin($user_name)) {
						$prev = "javascript:history.go(-1)";
	    				if (isset($_SERVER["HTTP_REFERER"])) {
        					$prev = $_SERVER["HTTP_REFERER"];
    					}
						if($uu != $user_name && $before_contest) {
							header("Location: $prev");
						}
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
				if($practice == "yes") {
					printf("<h3 class = 'dashboard'><a href = 'leaderboard_practice.php?cid=$cid'>&lt; Practice Leaderboard</a></h3>");
				} else if ($practice == "no") {
					printf("<h3 class = 'dashboard'><a href = 'leaderboard.php?cid=$cid'>&lt; Leaderboard</a></h3>");
				} else {
					printf("<h3 class = 'dashboard'><a href = 'index.php'>&lt; Main Page</a></h3>");
				}
				echo "<h3 class = 'dashboard'><a href = '$contest_url'> Dashboard</a></h3>";
				printf("<div class = 'source'> <pre class = 'brush: cpp'>");
				printf("%s", htmlspecialchars(file_get_contents("Solutions/$sub_id.cpp")));
				printf("</pre> </div>");
			?>
			<script src="Scripts/shCore.js"></script>
  			<script src="Scripts/shBrushCpp.js"></script>
  			<script>
    			SyntaxHighlighter.all()
  			</script>
		</div>
		<div class = "footer">
			TypoCoder 2015 - <span id = "cur_year"></span> Developed by <b>Raghavendra M Dani</b><br />
			Current Time: <span id = "date_time">null</span><br />
		</div>
		<script src = "Scripts/update_date.js"></script>
	</body>
</html>
