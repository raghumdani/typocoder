<!DOCTYPE html>
			<html lang = "en">
			<head>
		<meta charset = "utf-8" />
		<title>TypoCoder</title>
		<link rel = "stylesheet" type = "text/css" href = "../Style/question_page.css" />
		<link rel = "stylesheet" type = "text/css" href = "../Style/all_pages.css" />
		<link rel = "icon" href = "../Images/logo.png" />
		<!--<link rel = "stylesheet" type = "text/css" href = "../Style/css/bootstrap.css" />
		<script type="text/javascript" src = "../Style/js/bootstrap.js"></script> -->

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
					if(!isset($_GET["cid"])) {
						header("Location: ../index.html");
						exit(0);
					}
					//$conn = mysqli_connect("localhost", "root", "", "typocoder");
					include("../Util/Connect_db.php");
					if(!$conn) {
						header("Location: ../index.php");
						exit(0);
					}
					$cid = $_GET["cid"];
					$sql = "SELECT COUNT(*) FROM contests WHERE cid = $cid and CURRENT_TIMESTAMP >= start_time;";
					$result = mysqli_query($conn, $sql);
					if(!$result) {
						mysqli_close($conn);
						header("Location: ../index.php");
						exit(0);
					}
					$row = mysqli_fetch_array($result);
					$cnt = $row[0];
					if(!admin($user_name) && $cnt == 0) {
						mysqli_close($conn);
						header("Location: ../index.php");
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
					mysqli_close($conn);
				?>
			</span>
		</div>
		<div class = "main_container">
			<h3 class = "dashboard"><a href = <?php echo "../$contest_url"; ?> >&lt;Dashboard</a></h3>
			<div class = "question">
				<?php 
					include("problem_headers.php");
				?>
				<!-- Write Question Here. Use HTML markup for writing formulas and beautify content -->
				<!-- Write question ID -->
				<h1 class = "question_name">25. Optimal ICPC Strategy</h1><h2>Statement</h2>

<p>Do you know how time penalties are calculated in ICPC styled contests?</p>

<p>&quot;The total time is the sum of the time consumed for each problem solved. The time consumed for a solved problem is the time elapsed from the beginning of the contest to the submittal of the first accepted run plus 20 penalty minutes for every previously rejected run for that problem.&quot;</p>

<p>In most of the ICPC styled contests, the questions are not arranged in their order of difficulty, and solving the problems in an optimal order can play a major role in deciding the final results.</p>

<p>Assume a contest consisting of <strong>N</strong> problems. You know beforehand the exact amount of time that you&#39;ll need to solve each of the <strong>i</strong>&nbsp;(<em>1 &lt;= i &lt;= N</em>) problems. (You&#39;re really good at problem solving and you&#39;ll get all the questions right in the very first attempt, i.e. no 20 minute penalty!)</p>

<p>Now, you wonder, what is the maximum time that you can save if you solve the problems in the most optimal order, instead of solving them in the given order?</p>

<h2>Input format</h2>

<p>The first line of the input consists of a single integer <strong>N&nbsp;</strong>denoting the number of problems in the contest. The second line consists of <strong>N</strong>&nbsp;space separated integers, the <strong>i</strong>&#39;th of which denotes the time required to solve the <strong>i</strong>&#39;th problem (in minutes).</p>

<h2>Output format</h2>

<p>A single integer, that denotes the maximum time saved if the questions are solved in an optimal order, instead of solving them in the given order.</p>

<h2>Constraints</h2>

<p>1 &lt;= N &lt;= 10<sup>5</sup></p>

<p>1 &lt;= Time required to solve a problem &lt;= 1000</p>

<h2>Sample Input 1</h2>

<p>3</p>

<p>1 1 2</p>

<h2>Sample Output 1</h2>

<p>0</p>

<h2>Sample Input 2</h2>

<p>2</p>

<p>5 1</p>

<h2>Sample Output 2</h2>

<p>4</p>

<h2>Explanation</h2>

<p>The most optimal way to solve the problems in the first case is to solve them in the given order. The total time required will be = .(1) + (1 + 1) + (1 + 1 + 2) = 7.</p>

<p>It is easy to notice that the total time will increase if the problems are solved in any other order.</p>

<p>For the second sample input, if we solve the questions in the given order, total time = (5) + (5+1) = 11.</p>

<p>If we solve the problems in the reverse order, total time = (1) + (1+5) = 7.</p>

<p>Thus, we can save atmost 4 minutes if we solve it this way.</p>

				<h4>Time Limit: 1s <br />Memory Limit: 1024 MB</h4>
				<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS-->
			</div>

			<div class = "submit_answer">
				<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'>
					<fieldset class = "acc-info"><!-- Write QID HERE -->
						<input type = "hidden" name = "time_limit" value = "1" />
						<input type = "hidden" name = "qid" value =  "25" />
						<input type = "hidden" name = "cid" value = "6" />
						<label>
							Language
							<select name = "language">
								<option value = "cpp">C++14</option>
								<option value = "c">C</option>
							</select>
						</label>
					<div class = 'editor-edit'>
						<textarea id = 'txtsource' name = "txtsource"> Hello </textarea>
						<div id = 'editor'>#include &lt;stdio.h&gt; 

int main() { 
	return(0);
}</div>
						<script type = "text/javascript" src = "../ace-builds-master/src/ace.js" > </script>
						<script type = 'text/javascript' >
var editor = ace.edit('editor');
editor.getSession().setMode('ace/mode/c_cpp');
document.getElementById("txtsource").style.display = "none";
function doit() {
	document.getElementById("txtsource").value = editor.getSession().getValue();
} 
</script>
    			</div>
						<?php
                                                   include("choose_file_option.php");
                                                ?>
					</fieldset>
					<fieldset class = "acc-action">
						<input class = "btn" type = "submit" value = "Submit" onclick = "doit()" />
					</fieldset>
				</form>
			</div>
		</div>
		<div class = "footer">
			TypoCoder 2015 - <span id = "cur_year"></span> Developed by <b>Raghavendra M Dani</b><br />
			Current Time: <span id = "date_time">null</span><br />
		</div>
		<script src = "../Scripts/update_date.js"></script>
	</body>
</html>