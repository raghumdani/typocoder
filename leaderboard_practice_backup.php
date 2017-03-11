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
				printf("<div class = 'towrap'>");
				printf("<table class = 'table-leader'>");
				printf("<tr>");
				printf("<th>Rank</th>");
				printf("<th>Username</th>");
				$sql = "SELECT * FROM questions WHERE cid = $cid ORDER BY qid ASC;";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					mysqli_close($conn);
					header("Location: index.php");
					exit(0);
				}
				while ($row = mysqli_fetch_assoc($result)) {
					printf("<th><a href = 'Questions/%d.php?cid=%d' title = 'go to problem' style = 'color: black;'>%s <br />(QID %d)</th>", 
						 $row["qid"], $cid, $row["name"], $row["qid"]);
				}
				printf("<th>Total</th><th>All</th>");
				printf("</tr>");
				$sql = "SELECT DISTINCT user_name FROM submissions WHERE cid = $cid and practice = 'yes';";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					header("Location: index.php");
					exit(0);
				}
				//THE MOST IMPORTANT PART OF PROJECT
				class User {
					public $sub_idAC;
					public $sub_idRJ;
					public $user;
					public $que;
					public $quen;
					public $ltime;
					public $RJcnt;
					public $RJsum;

					function __construct() {
						$ltime = "";
					}
				}
				$ranklist = array();
				while($row = mysqli_fetch_assoc($result)) {
					$uu = $row["user_name"];
					$sql = "SELECT * FROM submissions WHERE user_name = '$uu' and cid = $cid and practice = 'yes';";
					$obj = new User();
					$obj->user = $uu;
					$obj->que = array();
					$obj->quen = array();
					$obj->sub_idAC = array();
					$obj->sub_idRJ = array();
					$obj->RJcnt = array();
					$obj->RJsum = 0;
					$res = mysqli_query($conn, $sql);
					if($res) {
						while($rcc = mysqli_fetch_assoc($res)) {
							$qq = $rcc["qid"];
							if($rcc["verdict"] == "Accepted") {
								if(!isset($obj->que[$qq])) {
									$obj->que[$qq] = $rcc['time_taken'];
									$obj->sub_idAC[$qq] = $rcc['sub_id'];
								} else {
									$obj->que[$qq] = $rcc['time_taken'];
									$obj->sub_idAC[$qq] = $rcc['sub_id'];
								}
							} else {
								if(!isset($obj->quen[$qq])) {
									$obj->quen[$qq] = $rcc['time_taken'];
									$obj->sub_idRJ[$qq] = $rcc['sub_id'];
								}
								if(!isset($obj->RJcnt[$qq])) {
									$obj->RJcnt[$qq] = 0;
								}
								$obj->RJcnt[$qq]++;
								$obj->RJsum++;
							}
							if(strcmp($obj->ltime, $rcc["submitted_time"]) < 0) {
								$obj->ltime = $rcc["submitted_time"];
							}
						}
					}
					array_push($ranklist, $obj);
				}
				function cmp ($a, $b) {
					if(count($a->que) != count($b->que)) {
						return (count($a->que) > count($b->que))? -1 : 1;
					}
					if($a->RJsum != $b->RJsum) {
						return ($a->RJsum < $b->RJsum)? -1 : 1;
					}
					return (strcmp($a->ltime, $b->ltime) < 0)? -1 : 1;
				}

				usort($ranklist, "cmp");
				// NOW OVER JUST PRINT THE VALUES HAIL PHP'
				$rank = 0;
				foreach($ranklist as $a) {
					printf("<tr>");
					printf("<td>%d</td>", ++$rank);
					printf("<td>%s</td>", display_user_name($a->user));
					$tot_solved = 0;
					$sql = "SELECT * FROM questions WHERE cid = $cid ORDER BY qid ASC;";
					$result = mysqli_query($conn, $sql);
					if(!$result) {
						mysqli_close($conn);
						header("Location: index.php");
						exit(0);
					}
					while($row = mysqli_fetch_assoc($result)) {
						$time_taken = 0.0;
						$message = "<b>Unattempted</b>";
						$qq = $row['qid'];
						if(isset($a->quen[$qq])) {
							$sub_id = $a->sub_idRJ[$qq];
							$time_taken = $a->quen[$qq];
							$message = "<b><a style = 'color: red;' href = 'display_source.php?cid=$cid&sub_id=$sub_id&practice=yes' title = 'View source' target = '_blank'>Rejected</a></b>";
						}
						if(isset($a->que[$qq])) {
							$sub_id = $a->sub_idAC[$qq];
							$time_taken = $a->que[$qq];
							$message = "<b><a style = 'color: green;' href = 'display_source.php?cid=$cid&sub_id=$sub_id&practice=yes' title = 'View source' target = '_blank'>Accepted</a></b>";
						}
						if($message == "<b>Unattempted</b>") {
							printf("<td>%s</td>", $message);
						} else {
							printf("<td>%s (<span style = 'text-align: center; color: red;'>%d</span>)<br /><b style = 'font-size: 11px;'>(%.3lf)</b></td>", $message, $a->RJcnt[$qq], $time_taken);
						}
					}
					printf("<td>%d</td>", count($a->que));
					printf("<td><a href = 'user_submissions.php?cid=$cid&user=$a->user&practice=yes' title = 'View all submissions'>View</a></td>");
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
