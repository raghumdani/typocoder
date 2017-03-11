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
					mysqli_close($conn);
				?>
			</span>
		</div>
		<div class = "main_container">
			<h3 class = "dashboard"><a href = <?php printf("../contest_page.php?cid=$cid"); ?> >&lt;Dashboard</a></h3>
			<div class = "question">
				<!-- Write Question Here. Use HTML markup for writing formulas and beautify content -->
				<!-- Write question ID -->
				<h1 class = "question_name">Strange Sequence</h1><h2>Statement</h2>

<p>You are given an array <strong>A</strong> of size <strong>N</strong>. Let us consider a sequence <strong>S</strong> = [a<sub>1</sub>, a<sub>2</sub>, .., a<sub>n</sub>]. We call it a strange&nbsp;sequence if all the below conditions are satisfied.</p>

<ul>
	<li><strong>S</strong> is a <a href="https://en.wikipedia.org/wiki/Subsequence">subsequence</a> of <strong>A</strong>.</li>
	<li>Either one of the following is true: [a<sub>1</sub> &lt; a<sub>2</sub> &gt; a<sub>3</sub> &lt; ...] or [a<sub>1</sub> &gt; a<sub>2</sub> &lt; a<sub>3</sub> &gt; ...] if N &gt; 2.</li>
</ul>

<p>You have to find longest strange sequence <strong>S</strong> which satisfies all the conditions above.</p>

<h2>Input format</h2>

<p>First line contains <strong>T</strong>, the number of test cases.</p>

<p>For each test case block, below format is followed:</p>

<p>First line contains <strong>N,&nbsp;</strong>length of the array <strong>A</strong>.</p>

<p>Next line contains <strong>N</strong> space separated integers, i<sub>th</sub> of which is equal to&nbsp;<strong>A[i]</strong>.</p>

<h2>Output format</h2>

<p>For each test case,</p>

<p>Print <strong>L</strong> in the first line, the length of the longest strange subsequence <strong>S</strong>.</p>

<p>Print <strong>L</strong> integers separated by white space or new lines, representing the subsequence of <strong>A</strong>.</p>

<p>If there are multiple answers, <em><strong>print any of them</strong></em>.</p>

<h2>Constraints</h2>

<p>1 &le; T &le; 10</p>

<p>1 &le; N &le; 2000</p>

<p>-10<sup>9</sup> &le; A[i] &le; 10<sup>9</sup></p>

<p>Elements of <strong>A</strong> are pairwise <strong>distinct</strong></p>

<h2>Sample Input</h2>

<p>4</p>

<p>5</p>

<p>-1 2 -3 4 6</p>

<p>1</p>

<p>1</p>

<p>5</p>

<p>1 2 3 -1 -5</p>

<p>10</p>

<p>1 -10 9 -9 -8 -7 -4 8 7 4</p>

<h2>Sample Output</h2>

<p>4</p>

<p>-1 2 -3 4</p>

<p>1</p>

<p>1</p>

<p>3</p>

<p>2 3 -1</p>

<p>6</p>

<p>1 -10 9 -4 8 7</p>

<p><strong>Note that there are other answers possible and printing them is also allowed.</strong></p>

				<h4>Time Limit: 1s <br />Memory Limit: 1024 MB</h4>
				<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS-->
			</div>

			<div class = "submit_answer">
				<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'>
					<fieldset class = "acc-info"><!-- Write QID HERE -->
						<input type = "hidden" name = "time_limit" value = "1" />
						<input type = "hidden" name = "qid" value =  "26" />
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