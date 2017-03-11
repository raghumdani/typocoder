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
				<h1 class = "question_name">30. Ajinkya and  Hatepur</h1><h2>Statement</h2>

<p>The town of Hatepur is home for people from different countries. Two guys from different countries hate each other and are never in contact with each other. Two guys from same country <strong>maybe</strong> in contact with other. But a guy from one country <strong>can</strong> get in contact with another guy from the same country through his contacts or contacts of his contacts or ... you get the point. Now Ajinkya&nbsp;hates racism, he wants to solve this racist problem. But first he needs to know maximum number of different races which are living in the town. He&#39;s busy managing this contest so please help him out.</p>

<h2>Input format</h2>

<p>First line of input contains two numbers <b>N</b> (the number of people living in the town) and a number <b>M</b>.</p>

<p>Subsequent <b>M</b> lines contain two numbers <b>u</b> and <b>v</b>. This means that <b>u<sub>th</sub></b> person and <b>v<sub>th</sub></b> person are in contact with each other.</p>

<h2>Output format</h2>

<p>Output the number of races in the town.</p>

<h2>Constraints</h2>

<p>1 &le; N &le; 10<sup>5</sup></p>

<p>0 &le; M &le; min(10<sup>6</sup>, N<sup>2</sup>)</p>

<p>1 &le; u, v &le; N</p>

<h2>Sample Input</h2>

<p>5 3</p>

<p>1 2</p>

<p>2 4</p>

<p>3 5</p>

<h2>Sample Output</h2>

<p>2</p>

				<h4>Time Limit: 1s <br />Memory Limit: 1024 MB</h4>
				<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS-->
			</div>

			<div class = "submit_answer">
				<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'>
					<fieldset class = "acc-info"><!-- Write QID HERE -->
						<input type = "hidden" name = "time_limit" value = "1" />
						<input type = "hidden" name = "qid" value =  "30" />
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
