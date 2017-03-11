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
					$blogid = 7;
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
				<div class = "main_container"><h3 style = "text-align: center;"><a href = "../index.php">&lt; Main Page</a></h3><div class = "blogdata"><h1 style = "text-align: center;">Editorials for Cicada 3301 IV</h1><h2>24. Product of Digits</h2>

<p>In this problem, you can use division operation to get each digit. The easiest way is to get the input as a string and then multiply by iterating on digits.&nbsp; The overall time complexity is per test case is O(logN)</p>

<p><a href="../display_source.php?cid=6&amp;sub_id=511">AC Solution</a></p>

<h2>25. Optimal ICPC Strategy</h2>

<p>As, we know that time required to solve the problems are added. It is always optimal to first solve the problems which requires less time because prefix sum of number of added in every step and prefix sum is minimum, if we choose the numbers in ascending order. Time complexity will be O(N).</p>

<p><a href="../display_source.php?cid=6&amp;sub_id=512" target="_blank">AC Solution</a></p>

<h2>26. Strange Sequence</h2>

<p>The first part of this problem is to find Longest Zig-Zag subsequence. You can find it&#39;s solution <a href="http://www.geeksforgeeks.org/longest-zig-zag-subsequence/" target="_blank">here</a>. Now once you have found out the recurrence, you can again recurse through what the optimal value was and just add it into an array. See function g() for more details about its implementation.&nbsp; The overall time complexity per test case is O(N<sup>2</sup>)</p>

<p><a href="../display_source.php?cid=6&amp;sub_id=533" target="_blank">AC Solution</a></p>

<h2>27. Beautiful Game</h2>

<p>As usual, run a <a href="https://www.topcoder.com/community/data-science/data-science-tutorials/algorithm-games/" target="_blank">WL algorithm</a> to find the patterns. You can see that the pattern repeats after some f(x) intervals. For example, we get the pattern like this,</p>

<p>For X = 1 to 3 [Length = 3], Alice wins<br />
For X = 4 to 7 [Length = 4], Bob wins<br />
For X = 8 to 31 [Length = 24], Alice wins<br />
For X = 32 to 63 [Length = 32], Bob wins<br />
For X = 64 to 255 [Length = 192], Alice wins<br />
For X = 256 to 511 [Length = 256], Bob wins<br />
For X = 512 to 2047 [Length = 1536], Alice wins<br />
For X = 2048 to 4095 [Length = 2048], Bob wins<br />
For X = 4096 to 16383 [Length = 12288], Alice wins<br />
For X = 16384 to 32767 [Length = 16384], Bob wins<br />
For X = 32768 to 131071 [Length = 98304], Alice wins</p>

<p>Now, intresting thing to notice here is the length, If we derive the pattern which Length follows by plugging it into <a href="oeis.org">oeis.org</a>&nbsp;we will notice that it can be written as follows :</p>

<p>For X = 1 to 3 [Length = 3], Alice wins<br />
For X = 4 to 7 [Length = 4], Bob wins<br />
For X = 8 to 31 [Length = 3 * 8], Alice wins<br />
For X = 32 to 63 [Length = 4 * 8], Bob wins<br />
For X = 64 to 255 [Length = 3 * 8<sup>2</sup>], Alice wins<br />
For X = 256 to 511 [Length = 4 * 8<sup>2</sup>], Bob wins<br />
For X = 512 to 2047 [Length = 3 * 8<sup>3</sup>], Alice wins<br />
For X = 2048 to 4095 [Length = 4 * 8<sup>3</sup>], Bob wins<br />
For X = 4096 to 16383 [Length = 3 * 8<sup>4</sup>], Alice wins<br />
For X = 16384 to 32767 [Length = 4 * 8<sup>4</sup>], Bob wins<br />
For X = 32768 to 131071 [Length = 3 * 8<sup>5</sup>], Alice wins</p>

<p>and so on and on</p>

<p>Now, you can just compute the ranges, in which Alice wins. There are no more than log<sub>8</sub>X such ranges. For each test case, you can answer in O(logX) time. So total time complexity per test case is O(logX). During the contest, some people got a different solution/pattern. Please write a blog explain about it so that it is helpful for others.</p>

<p><a href="../display_source.php?cid=6&amp;sub_id=517" target="_blank">AC Solution</a></p>

<h2>28. All About Swaps</h2>

<p>You have to simulate the algorithm described in the problem statement. You can use next_permutation function from C++ STL to generate all the different permutations (different Ks). And you can use map / hashing to store the count of each value. Then return the maximum of these values. There are about 9! different permutations in the worst case. So for each test case, time complexity would be O(d!) where d is number of digits in N. Refer the AC Solution for implementation details.</p>

<p><a href="../display_source.php?cid=6&amp;sub_id=518" target="_blank">AC Solution</a></p>

<h2>29. Message Passing</h2>

<p>Here, the straightforward approach will be naively simulating the given problem. Now time complexity of that solution will be O(N<sup>2</sup>). Let us derive an approach to compute it faster. First we have to find for all friends, how many passes their ID goes. Now, we know that each pass is independent. Hence, we will first find the number of passes which ID N does. That will be N as all other numbers are less than N. To calculate answer for Friend N - 1, we have to check the position of Friend N and stop it until reaching it. Similarly, for lesser IDs of Friends. This can be obtained in&nbsp;O(logN) using set &lt;int&gt;::lower_bound or upper_bound. Hence, the total time complexity will be O(NlogN).</p>

<p><a href="../display_source.php?cid=6&amp;sub_id=519" target="_blank">AC Solution</a></p>

<h2>30. Ajinkya and Hatepur</h2>

<p>Let us represent two people who have contact with an edge. We can see that the network form simple graph. We can easily know that all people may belong to same country as it is given in the statement that people in same country <strong>may</strong>&nbsp;have contact with each other. If two people have contact with (edge) between them, then they should belong to same country. So, problem reduces to finding number of <a href="https://en.wikipedia.org/wiki/Connected_component_(graph_theory)" target="_blank">connected components</a>&nbsp;. This can be solved using <a href="https://en.wikipedia.org/wiki/Depth-first_search" target="_blank">DFS/BFS</a> (depth first search/Breadth first search) using O(N) algorithm.&nbsp;</p>

<p><a href="../display_source.php?cid=6&amp;sub_id=520" target="_blank">AC Solution</a></p>

<h2>31. Juicy Mangoes</h2>

<p>It is easy to see that if a person can harvest M mangoes by taking time T, he can harvest &gt;= M mangoes by taking time &gt;= T. So, we can <a href="https://en.wikipedia.org/wiki/Binary_search_algorithm" target="_blank">binary search</a> for the minimum time, he takes to harvest M mangoes. The predicate function is straight forward. See the check() function in the setter/setter&#39;s solution. The total complexity of such solution would be O(Q * logM * N).</p>

<p><a href="../display_source.php?cid=6&amp;sub_id=521" target="_blank">AC Solution</a></p>
</div></div>
						<div class = "footer">
					TypoCoder &copy; 2015 - <span id = "cur_year"></span> <b>Raghavendra M Dani</b><br />
					Current Time: <span id = "date_time">null</span><br />
					</div>
					<script src = "../Scripts/update_date.js"></script>
					</body>
					</html>