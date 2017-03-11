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
				<h1 class = "question_name">28. All about Swaps</h1><h2>Statement</h2>

<p>You are given an integer <strong>N</strong> (without leading zeroes) containing <strong>M</strong> digits. In number 943, the 1st most significant digit (MSD)&nbsp;is 9, 2nd MSD&nbsp;is 4, and so on. In one operation, you can select any <strong>x<sub>th</sub></strong> MSD and <strong>y<sub>th</sub></strong> MSD and swap them (1 &le; x, y &le; M). You can perform this operation any number of times. Let us assume that you got a new integer <strong>K </strong>(can contain leading zero&#39;s)&nbsp;by performing above operations. Now you have to find, the value of below function,</p>

<p style="text-align:center"><img src="../Images/CodeCogsEqn.png" /></p>

<p>Your task is to find the maximum count of different <strong>K</strong>&#39;s possible all of whose value of <strong>S</strong> is same.</p>

<h2><strong>Input format</strong></h2>

<p>The first line contains <strong>T</strong>, the number of test cases.</p>

<p>Next <strong>T</strong> lines contains a single integer <strong>N</strong>.</p>

<h2><strong>Output format</strong></h2>

<p>For each test case, print the required answer in a new line.</p>

<h2><strong>Constraints</strong></h2>

<p>1 &le; T &le; 10</p>

<p>0 &le; N &le; 10<sup>9</sup></p>

<h2><strong>Sample Input</strong></h2>

<p>4</p>

<p>123</p>

<p>1000</p>

<p>123456789</p>

<p>1123</p>

<h2><strong>Sample Output</strong></h2>

<p>2</p>

<p>1</p>

<p>6697</p>

<p>2</p>

<h2>Explaination</h2>

<p>For the first test case, all different <strong>K</strong>&#39;s are</p>

<p>123 for which S = 1 * 1 + 2 * 2 + 3 * 3 = 14</p>

<p>132 for which S = 1 * 1 + 2 * 3 + 3 * 2 = 13</p>

<p>213 for which S = 1 * 2 + 2 * 1 + 3 * 3 = 13</p>

<p>231 for which S = 1 * 2 + 2 * 3 + 3 * 1 = 11</p>

<p>312 for which S = 1 * 3 + 2 * 1 + 3 * 2 = 11</p>

<p>321 for which S = 1 * 3 + 2 * 2 + 3 * 1 = 10</p>

<p>We can see the 14 appears 1 time, 13 appears 2 times, 11 appears 2 times, and 10 appears 1 time. So, the maximum count is 2.</p>

<p>For the second case, different <strong>K</strong>&#39;s possible are 0001, 0010, 0100, 1000 all of which have different value of <strong>S</strong>.</p>

				<h4>Time Limit: 1s <br />Memory Limit: 1024 MB</h4>
				<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS-->
			</div>

			<div class = "submit_answer">
				<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'>
					<fieldset class = "acc-info"><!-- Write QID HERE -->
						<input type = "hidden" name = "time_limit" value = "1" />
						<input type = "hidden" name = "qid" value =  "28" />
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