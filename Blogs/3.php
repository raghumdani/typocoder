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
					$blogid = 3;
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
				<div class = "main_container"><h3 style = 'text-align: center;'><a href = '../index.php'>&lt; Main Page</a></h3><div class = "blogdata"><h2>8. Prime or Not Prime</h2>

<p>As you can see it is enough to check if there are any factors which are less than sqrt(n). Complexity would be O(n * sqrt(n)).&nbsp;<a href="http://10.50.45.61/TypoCoder/display_source.php?cid=4&amp;sub_id=240">Solution</a></p>

<h2>9. Legen-Waitforit-dary</h2>

<p>It is straight forward combinatorics probem which also asks you to calculate number of non co primes. Its n - totient(n) for second task and for first task its n - 1 C k - 1.&nbsp;</p>

<h2>10. BomberMan</h2>

<p>Here, you just have to know about last bomb which exploded. You can iterate on all last bombs and use prefix sums to calculate answer and binary search can be used to search for the bomb which is out of the range.</p>

<p>Here is solution:&nbsp;<a href="http://10.50.45.61/TypoCoder/display_source.php?cid=4&amp;sub_id=245">Solution</a></p>

<h2>11. Prime Game</h2>

<p>Straightforward seive.&nbsp;<a href="http://10.50.45.61/TypoCoder/display_source.php?cid=4&amp;sub_id=248">Solution</a></p>

<h2>12. Ricky and GCD</h2>

<p>Here you have to iterate on all the GCD possible. It is 1 to N. So you can check for every GCD, can that be achieved. So in O(nlogn) we can do it.&nbsp;</p>

<p><a href="http://10.50.45.61/TypoCoder/display_source.php?cid=4&amp;sub_id=249">Solution</a></p>

<h2>13. Superpowers</h2>

<p>Read this.&nbsp;<a href="http://stackoverflow.com/questions/4223313/finding-abc-mod-m">https://stackoverflow.com/questions/4223313/finding-abc-mod-m</a></p>

<p>Solution here:&nbsp;<a href="http://10.50.45.61/TypoCoder/display_source.php?cid=4&amp;sub_id=244">Solution</a></p>

<p>Further doubts will be clarified in sessions.</p>
</div></div>
						<div class = "footer">
					TypoCoder &copy; 2015 - <span id = "cur_year"></span> <b>Raghavendra M Dani</b><br />
					Current Time: <span id = "date_time">null</span><br />
					</div>
					<script src = "../Scripts/update_date.js"></script>
					</body>
					</html>