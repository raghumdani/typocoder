<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<title>TypoCoder</title>
		<link rel = "stylesheet" type = "text/css" href = "Style/verdict.css" />
		<link rel = "stylesheet" type = "text/css" href = "Style/all_pages.css" />
		<link rel = "icon" href = "Images/logo.png" />
		<!--<link rel = "stylesheet" type = "text/css" href = "Style/css/bootstrap.css" />
		<script type="text/javascript" src = "Style/js/bootstrap.js"></script> -->
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
					//$conn = mysqli_connect("localhost", "root", "", "typocoder");
					include("Util/Connect_db.php");
					if(!$conn) {
						header("Location: index.php");
						exit(0);
					}
					if(!isset($_POST["cid"])) {
						mysqli_close($conn);
						header("Location: index.php");
						exit(0);
					}
					$cid = $_POST["cid"];
					/* You can request for rejudge only after the contest is over */
					$sql = "SELECT COUNT(*) FROM contests WHERE cid = $cid and CURRENT_TIMESTAMP >= end_time;";
					$result = mysqli_query($conn, $sql);
					if(!$result) {
						mysqli_close($conn);
						header("Location: index.php");
						exit(0);
					}
					$row = mysqli_fetch_array($result);
					$cnt = $row[0];
					if(!admin($user_name) || $cnt == 0) {
						mysqli_close($conn);
						header("Location: index.php");
						exit(0);
					}
					mysqli_close($conn);
				?>
			</span>
		</div>
		<?php
			printf("<h3 class = 'dashboard'><a href = 'contest_page.php?cid=$cid'>&lt; Dashboard</a></h3>");
		?>
		<div class = "main-container">
			<?php
				//This program takes the input as binary executable of the checker program 
				//its arguments and the input. The return 0- AC, 1-RJ, 2-RE, other - (Unknown Err)
	
				//Lets write the function
				function run_checker($checker_file, $arguments) {
					$output = "";
					$return_status = "";
					exec("./$checker_file $arguments", $output, $return_status);
					settype($return_status, "integer");
					if($return_status == 0) {
						return "Accepted";
					} else {
						return "Rejected";
					}
				}

				function print_the_verdict($user_name, $qid, $verdict, $time_taken, $compilation_output = "Unknown Error") {
					if($verdict == 'Accepted') {
						$verdict = "<b style = 'color: green;'>Accepted</b>";
					} else if($verdict == 'Rejected') {
						$verdict = "<b style = 'color: red;'>Rejected</b>";
					} else {
						$verdict = "<b> $compilation_output </b>";
					}
					printf("<tr><td>%s</td><td>%d</td><td> %.3lf </td><td>%s</td></tr>", $user_name, $qid, $time_taken, $verdict);
				}

				function microtime_float() {
    				list($usec, $sec) = explode(" ", microtime());
    				return ((float)$usec + (float)$sec);
				}
				function get_verdict($target, $input, $output, $sub_id, $time_limit) {
					//ini_set('max_execution_time', 300);
					global $qid;
					//exec("g++ -std=c++11 $target -o Solutions/$sub_id.exe");
					$compilation_output = array(); 
					$return_status = 0;
					if(!file_exists("Solutions/$sub_id.out")) {
						exec("g++ -std=c++11 $target -o Solutions/$sub_id.out 2>&1", $compilation_output, $return_status);
					}
					$res = array();
					if(!file_exists("Solutions/$sub_id.out")) {
						$res['verdict'] = "Compilation Error";
						$res['compilation_output'] = "";
						foreach($compilation_output as $line) {
							$res['compilation_output'] = $res['compilation_output'].$line."<br />";
						}
						return $res;
					}
					//$myf = fopen("Solutions/$sub_id.bat", "w");
					$ip = file_get_contents("Solutions/".$output); 

					$sub_id_out = $sub_id."_out.txt";

					//fwrite($myf, "C:\\cygwin64\\bin\\timeout $time_limit Solutions\\$sub_id.exe < Solutions\\$input > Solutions\\$sub_id_out\n");
					//fwrite($myf, "timeout /t $time_limit\n");
					//fwrite($myf, "taskkill /im Solutions\\$sub_id.exe /f\n");

					//fclose($myf);

					$st = microtime_float();
					//exec("C:\\xampp\htdocs\\TypoCoder\\Solutions\\$sub_id.bat");
					//exec("C:\\cygwin64\\bin\\timeout $time_limit Solutions\\$sub_id.exe < Solutions\\$input > Solutions\\$sub_id_out");
					exec("timeout $time_limit Solutions/$sub_id.out < Solutions/$input > Solutions/$sub_id_out");
					//shell_exec("Solutions/$sub_id.bat"); 
					$end = microtime_float() - $st;

					exec("rm Solutions/$sub_id.out");
					
					$res['time_taken'] = $end;
					if(!file_exists("Solutions/$sub_id_out")) {
						$res['verdict'] = "Rejected";
						return $res;
					}
					//printf("Solutions/$output Solutions/$sub_id_out $qid");
					if(file_exists("Solutions/$qid"."_"."checker.cpp")) {
						//printf("Solutions/$qid"."_"."checker.out "."$output $sub_id_out");
						if(!file_exists("Solutions/$qid"."_"."checker.out")) {
							exec("g++ -std=c++11 Solutions/$qid"."_"."checker.cpp -o Solutions/$qid"."_"."checker.out");
						}
						if(!file_exists("Solutions/$qid"."_"."checker.out")) {
							$res['verdict'] = "Compilation Error";
						}
						$res['verdict'] = run_checker("Solutions/$qid"."_"."checker.out", "Solutions/$output Solutions/$sub_id_out Solutions/$input");
						//make sure you delete executable before closing
						//exec("rm Solutions/$"."_"."checker.out");
						exec("rm Solutions/$sub_id_out");
						return $res;
					}
					$out = file_get_contents("Solutions/$sub_id_out");
					$ip = trim($ip);
					$out = trim($out);
					
					//Delete the output file to save space
					exec("rm Solutions/$sub_id_out");

					if($out == $ip) {
						$res['verdict'] = "Accepted";
						return $res;
					}
					$res['verdict'] = "Rejected";
					return $res;
				}

				$language = $_POST["language"];
				$target_dir = "Solutions/";
				//$conn = mysqli_connect("localhost", "root", "", "typocoder");
				include("Util/Connect_db.php");
				if(!$conn) {
					header("Location: index.php");
					exit(0);
				}
				
				$sql = "SELECT * FROM submissions WHERE cid = $cid and practice = 'no' and verdict = 'Submitted';";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					mysqli_close($conn);
					header("Location: index.php");
					exit(0);
				}
				
				printf("<div class = 'ver-box'><table><tr><th>UserName</th><th>Problem</th><th>Time Taken</th><th>Verdict</th></tr>");
				while ($row = mysqli_fetch_assoc($result)) {
				  $sub_id = $row['sub_id'];
				  $qid = $row['qid'];
				  $user_name = $row['user_name'];
				  $time_limit = $row['time_limit'];
				  if ($time_limit <= 0.1) $time_limit = 1;
			    $target = $target_dir."$sub_id".".cpp";
			    $input = "$qid"."_input.txt";
			    $output = "$qid"."_output.txt";
          
          $res = array();
          $tim = 0.0;
				  $cnt = 1;
				  
				  $res = get_verdict($target, $input, $output, "$sub_id", $time_limit);
				  while($res['verdict'] == "Accepted" && file_exists("Solutions/$qid"."_input"."$cnt.txt")) {
					  $ans = get_verdict($target, "$qid"."_input"."$cnt.txt", "$qid"."_output"."$cnt.txt", "$sub_id", $time_limit);
					  if($ans['verdict'] != "Accepted") {
						  $res['verdict'] = $ans['verdict'];
						  break;
					  }
					  if($res['time_taken'] < $ans['time_taken']) {
						  $res['time_taken'] = $ans['time_taken'];
					  }
					  $cnt = $cnt + 1;
				  }
			    if(isset($res['time_taken'])) {
				    $tim = $res['time_taken'];
			    }
			    $verdict = isset($res['verdict']) ? $res['verdict'] : "Submitted";
			    $sql = "UPDATE submissions SET verdict = '$verdict', time_taken = $tim WHERE sub_id = $sub_id;";
			    $rcc = mysqli_query($conn, $sql);
			    if(!$rcc) {
				    printf("CANNOT UPDATE SUBMISSIONS.");
			    }
			    if(!$rcc) {
				    printf("$Rerr");
				    exit(0);
			    }
			    print_the_verdict($user_name, $qid, $verdict, $tim, $res['compilation_output']);
			  }
			  printf("</table></div>");
			    
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

