<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>TypoCoder</title>
		<link rel = "stylesheet" type = "text/css" href = "Style/index_page.css" />
		<link rel = "stylesheet" type = "text/css" href = "Style/all_pages.css" />
		<script type = "text/javascript" src = "ckeditor/ckeditor.js" ></script>
		<script type="text/javascript" src = "Scripts/add_io_file.js"></script>
		<!--<link rel = "stylesheet" type = "text/css" href = "Style/css/bootstrap.css" />
		<script type="text/javascript" src = "Style/js/bootstrap.js"></script> -->
		<script type="text/javascript">
			cnt = 1;
		</script>
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
			//User Logged IN
			/* Do from here */
			if(!admin($user_name)) {
				header("Location: index.php");
				exit(0);
			} 
			include("Util/add_io_file.php")
		?>
		<form action = "upload_problem.php" method = "POST" enctype= "multipart/form-data" >
			<fieldset id = "fields" class = 'acc-info'>
				<input type="hidden" name="MAX_FILE_SIZE" value="41943040" /> 
				<label>
					Problem Name
					<input type = 'text' name = 'pname' required />
				</label>
				<label>
					Time Limit (sec)
					<input type = 'number' name = 'tlimit' required />
				</label>
				<label>
					Contest ID
					<input type = 'number' name = 'contestID' required />
				</label>
				<label>
					Question ID
					<input type = 'number' name = 'qid' required />
				</label>
				<label>
					Author
					<input type = 'text' name = 'author' required />
				</label>
				<label>
				 	Problem Statement 
					<textarea rows = '20' cols = '80' id = 'pstatement' name = 'pstatement'>
						<h2>Statement</h2> 
						<h2>Input format</h2> 
						<h2>Output format</h2>
						<h2>Constraints</h2> 
						<h2>Sample Input</h2>
						<h2>Sample Output</h2>
					</textarea>
					<script type = 'text/javascript'>
						CKEDITOR.replace('pstatement');
					</script>
				</label>
				<label id = "ip">
					Input file
					<input type = "file" name = "inputf" required />
				</label>
				<label id = "out">
					Output file (optional)
					<input type = "file" name = "outputf" />
				</label>
				<label>
					Checker (optional .cpp)
					<input type = "file" name = "checker_prog" />
				</label>
			</fieldset>
			<fieldset class = 'acc-action'>
				<input class = 'btn1' type = "button" onclick = "add_io_file()" value = "Add another testfile" />
				<input class = 'btn' type = 'submit' value = 'Upload' />
			</fieldset>
		</form>
		</div>
		<div class = "footer">
			TypoCoder 2015 - <span id = "cur_year"></span> Developed by <b>Raghavendra M Dani</b><br />
			Current Time: <span id = "date_time">null</span><br />
		</div>
		<script src = "Scripts/update_date.js"></script>
	</body>
</html>
