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
				<h1 class = "question_name">29. Message Passing</h1><h2>Statement</h2>

<p>ThunderCracker&nbsp;has recently learned about the&nbsp;<a href="https://en.wikipedia.org/wiki/Leader_election">leader election algorithm</a>&nbsp;in distributed systems. To understand the algorithm in a better way, he has decided to simulate it along with his friends.</p>

<p><strong>N</strong> friends stand in a circle. Each one of them is assigned a unique ID <strong>(<em>1 &lt;= ID &lt;= N</em>)</strong>. Each friend writes his/her ID on a piece of paper and passes it to the person on his/her right.</p>

<p>On receiving a paper from the person to the left, each friend compares the ID written on that paper with his/her own ID. If the ID on the paper is greater than the person&#39;s own ID, he/she passes it on to the right. Otherwise the paper is thrown away. It can be noticed, that at the end, all the papers will be thrown away.</p>

<p>ThunderCracker wonders, before the last piece of paper is thrown away, what is the total number of times that the papers were passed? (See sample example for details.)</p>

<h2>Input format</h2>

<p>The first line of the input consists of a single integer <strong>N</strong> denoting the number of friends. The second line consists of <strong>N</strong> space separated integers, denoting the IDs of the friends. The <strong>i</strong>&#39;th friend has the <strong>(i+1)</strong>&#39;th friend as the person standing to his/her right (<em><strong>1 &le; i &le; N - 1</strong></em>), while the person to the right of the <strong>N</strong>&#39;th friend is the first one.</p>

<h2>Output format</h2>

<p>Output a single integer that denotes the total number of times the papers were passed.</p>

<h2>Constraints</h2>

<p><strong>2 &le; N &le; 10<sup>5</sup></strong></p>

<p>It is guaranteed that all the IDs are unique integers from the range <strong>[1, N]</strong>.</p>

<h2>Sample Input 1</h2>

<p>4</p>

<p>1 4 2 3</p>

<h2>Sample Output 1</h2>

<p>8</p>

<h2>Explanation</h2>

<p>Let us look at each of the papers separately.</p>

<p>Friend 1 : Writes his ID ( = 1) on his paper. Passes it to friend 2. Friend 2 throws it away (1 &lt; 4). Number of times paper was passed = 1.</p>

<p>Friend 2 : Writes his ID ( = 4) on his paper. The message is passed from 2 -&gt; 3 -&gt; 4 -&gt; 1 -&gt; 2. Friend 2 throws it away. Number of times paper was passed = 4.</p>

<p>Friend 3 : Writes his ID ( = 2) on his paper. The message is passed from 3 -&gt; 4. Friend 4 throws it away. Number of times paper was passed = 1.</p>

<p>Friend 4 : Writes his ID ( = 3) on his paper. The message is passed from 4 -&gt; 1 -&gt; 2. Friend 2 throws it away. Number of times paper was passed = 2.</p>

<p>Total number of times the papers were passed = 1 + 4 + 1 + 2 = 8.</p>

<h2>Sample Input 2</h2>

<p>5</p>

<p>5 4 3 2 1</p>

<h2>Sample Output 2</h2>

<p>15</p>

<h2>Explanation</h2>

<p>Total number of times the papers were passed = 5 + 4 + 3 + 2 + 1 = 15.</p>

				<h4>Time Limit: 1s <br />Memory Limit: 1024 MB</h4>
				<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS-->
			</div>

			<div class = "submit_answer">
				<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'>
					<fieldset class = "acc-info"><!-- Write QID HERE -->
						<input type = "hidden" name = "time_limit" value = "1" />
						<input type = "hidden" name = "qid" value =  "29" />
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
