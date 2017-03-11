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
		?>
		<form action = "rejudge.php" method = "post">
			<fieldset id = "fields" class = 'acc-info'> 
				<label>
					Contest ID
				<input type = 'number' name = 'cid' required />
				</label>
			</fieldset>
			<fieldset class = 'acc-action'>
				<input class = 'btn' type = 'submit' value = 'Submit' />
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
