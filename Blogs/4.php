<!DOCTYPE html>
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
					$blogid = 4;
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
				<div class = "main_container"><h3 style = 'text-align: center;'><a href = '../index.php'>&lt; Main Page</a></h3><div class = "blogdata"><h2>16. Easy Eh?&nbsp;<a href="http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=250">http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=250</a></h2>

<h2>17. Hermoine and Magic Brooms.&nbsp;<a href="http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=251">http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=251</a></h2>

<h2>18. Chaotic Queues.&nbsp;<a href="http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=253">http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=253</a></h2>

<h2>14. Odd Trees.&nbsp;<a href="http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=254">http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=254</a></h2>

<h2>15. Special Sum Path.&nbsp;<a href="http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=255">http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=255</a></h2>

<h2>19. Longest Super-K Subsequences.&nbsp;<a href="http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=256">http://10.50.45.61/TypoCoder/display_source.php?cid=3&amp;sub_id=256</a></h2>
</div></div>
						<div class = "footer">
					TypoCoder &copy; 2015 - <span id = "cur_year"></span> <b>Raghavendra M Dani</b><br />
					Current Time: <span id = "date_time">null</span><br />
					</div>
					<script src = "../Scripts/update_date.js"></script>
					</body>
					</html>