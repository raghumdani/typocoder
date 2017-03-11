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
					$blogid = 5;
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
				<div class = "main_container"><h3 style = "text-align: center;"><a href = "../index.php">&lt; Main Page</a></h3><div class = "blogdata"><h2>Subset Partition</h2>

<p>We better model this problem as a graph problem. Let there be an edge(directed) between X and Y iff X &amp; Y = Y. So we can verify that this graph is a DAG (Directed Acyclic Graph). So what we have to find is minimum no. of partitions, such that no two elements in the partition, has a path between them. (by transitive nature of the property). We use,<a href="https://en.wikipedia.org/wiki/Mirsky%27s_theorem">Mirsky&#39;s theorem&nbsp;</a> this is a straighfoward result, the answer is the longest path length in the graph..</p>

<h3>How to solve&nbsp;it if elements are repeated?</h3>

<p>We can reduce this problem to the previous version.&nbsp;In this case, we take the count i.e no of times, each element is visited. This can be done using map or hashmap in c++. Then we create DAG with each node having its count as weight. Then the result is longest weighted path in the DAG. Formation of graph is O(n^2). and finding longest path in a DAG is O(n) using dp. So the total complexity is O(n^2).</p>

<h2>Level Order Coloring</h2>

<p>You need number of levels ie, log2(n) + 1. So let the number of levels be n. We can reduce this problem to following problem,</p>

<p>You are given n and k. You have to count&nbsp;the no. of&nbsp;strings with k exactly distinct characters. This gives us an idea of dp. For each color lets choose some positions&nbsp;and add it to our colored set. Then for every choice we make, there are nn C x choices available. x is the no. of positions in a string with kth character.&nbsp;</p>

<p>To get the idea of the dp used, see authors/testers solution.&nbsp;</p>

<h2>Meghana and Queries</h2>

<p>This is a standard segment tree problem. But beware, if you use recursive implementation of segment it will TLE. So it is advisable to use iterative approach. To learn about it visit :&nbsp;<a href="https://www.google.co.in/url?sa=t&amp;rct=j&amp;q=&amp;esrc=s&amp;source=web&amp;cd=1&amp;cad=rja&amp;uact=8&amp;ved=0ahUKEwj3067su4fPAhUHOo8KHY4iAxIQFggbMAA&amp;url=http%3A%2F%2Fcodeforces.com%2Fblog%2Fentry%2F18051&amp;usg=AFQjCNEWT-sn2krH80Kq9WVQ1X31Xch3OA&amp;sig2=R0m5NrEjgbQkNI6eQwjBag&amp;bvm=bv.132479545,d.c2I">Easy and efficient segment trees</a>.&nbsp;</p>

<p>Now how to solve it using segment trees? As queries can be processed offline, we sort the queries using its r value, so we wont encounter the elements after r. Now, we update the value of farther repeated values to multiplicative identity (ie 1). and we can query for answer for any l, it will give the product of distinct elements, For example, see below</p>

<p>1 2 4 2 4</p>

<p>assume that we are at last 4,&nbsp;</p>

<p>our segment tree will be like this</p>

<p>1 1 1 2 4,</p>

<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;^</p>

<p>for any value of l, and r as 5, it gives product of distinct no. in the range. This can be done with simple update and query of a segment tree.</p>

<p>This problem can also solved using persistant segment trees online, solve this problem,<a href="http://www.spoj.com/problems/DQUERY/">DQUERY</a>&nbsp;&nbsp;</p>
</div></div>
						<div class = "footer">
					TypoCoder &copy; 2015 - <span id = "cur_year"></span> <b>Raghavendra M Dani</b><br />
					Current Time: <span id = "date_time">null</span><br />
					</div>
					<script src = "../Scripts/update_date.js"></script>
					</body>
					</html>