<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>TypoCoder</title>
		<link rel = "stylesheet" type = "text/css" href = "Style/index_page.css" />
		<link rel = "stylesheet" type = "text/css" href = "Style/all_pages.css" />
		<!--<link rel = "stylesheet" type = "text/css" href = "Style/css/bootstrap.css" />
		<script type="text/javascript" src = "Style/js/bootstrap.js"></script> -->
		<link rel = "icon" href = "Images/logo.png" />

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
				?>
			</span>
		</div>
		<div class = "main_container">
		<?php
			//$conn = mysqli_connect("localhost", "root", "", "typocoder");
			//User Logged IN
			/* Do from here */
			if(!admin($user_name)) {
				header("Location: index.php");
				exit(0);
			}
			include("Util/common.php");
			include("Util/Connect_db.php");
			if(!$conn) {
				die($Rerr);
			}
			$contestID = $_POST["contestID"];
			$qid = $_POST["qid"];
			$tlimit = $_POST["tlimit"];
			$pname = $_POST["pname"];
			$author = $_POST["author"];
			$pstatement = $_POST["pstatement"];
			$sql = "SELECT COUNT(*) FROM contests WHERE cid = $contestID;";
			$result = mysqli_query($conn, $sql);
			$cnt = mysqli_fetch_array($result)[0];
			settype($cnt, "integer");
			if($cnt == 0) {
				printf("<h1>You have to Enter a valid contest ID. \nYou have entered CID = %d, QID = %d, PNAME = %d.</h1>".$err, $contestID, $qid, $pname);
				exit(0);
			}
			$sql = "SELECT COUNT(*) FROM questions WHERE qid = $qid;";
			$result = mysqli_query($conn, $sql);
			$cnt = mysqli_fetch_array($result)[0];
			if($cnt > 0) {
				printf("<h1>Please Enter Question ID which is not already used.</h1>".$err);
				exit(0);
			}
			settype($contestID, "string");
			settype($qid, "string");
			settype($tlimit, "string");
			$input = "Solutions/".$qid."_input.txt";
			$output = "Solutions/".$qid."_output.txt";
			$checker = "Solutions/".$qid."_checker.cpp";
			move_uploaded_file($_FILES["inputf"]["tmp_name"], $input);
			if(isset($_FILES["outputf"]["tmp_name"]))
				move_uploaded_file($_FILES["outputf"]["tmp_name"], $output);
			if(isset($_FILES["checker_prog"]["tmp_name"])) {
				move_uploaded_file($_FILES["checker_prog"]["tmp_name"], $checker);
			}
			$cnt = 1;
			while(isset($_FILES["inputf$cnt"]["tmp_name"])) {
				move_uploaded_file($_FILES["inputf$cnt"]["tmp_name"], "Solutions/".$qid."_input$cnt.txt");
				move_uploaded_file($_FILES["outputf$cnt"]["tmp_name"], "Solutions/".$qid."_output$cnt.txt");
				$cnt = $cnt + 1;
			}
			$towrite = '<!DOCTYPE html>
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
				<h1 class = "question_name">'.$qid.'. '.$pname.'</h1>'.$pstatement.'
				<h4>Time Limit: '.$tlimit.'s <br />Memory Limit: 1024 MB</h4>
				<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS-->
			</div>

			<div class = "submit_answer">
				<form action = "../verdict.php" method = "post" enctype = \'multipart/form-data\'>
					<fieldset class = "acc-info"><!-- Write QID HERE -->
						<input type = "hidden" name = "time_limit" value = "'.$tlimit.'" />
						<input type = "hidden" name = "qid" value =  "'.$qid.'" />
						<input type = "hidden" name = "cid" value = "'.$contestID.'" />
						<label>
							Language
							<select name = "language">
								<option value = "cpp">C++14</option>
								<option value = "c">C</option>
							</select>
						</label>
					<div class = \'editor-edit\'>
						<textarea id = \'txtsource\' name = "txtsource"> Hello </textarea>
						<div id = \'editor\'>#include &lt;stdio.h&gt; 

int main() { 
	return(0);
}</div>
						<script type = "text/javascript" src = "../ace-builds-master/src/ace.js" > </script>
						<script type = \'text/javascript\' >
var editor = ace.edit(\'editor\');
editor.getSession().setMode(\'ace/mode/c_cpp\');
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
</html>';
		$target = "Questions/".$qid.".php";
		$myf = fopen($target, "w");
		fwrite($myf, $towrite);
		fclose($myf);

		printf("<h1> Your problem is now uploaded. Please Test It. If There is some error, contact '@raghumdani'</h1>");
		$sql = "INSERT INTO questions(cid, qid, name, author, time_limit) VALUES($contestID, $qid, '$pname', '$author', $tlimit);";
		mysqli_query($conn, $sql);
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
