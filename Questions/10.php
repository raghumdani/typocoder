<!DOCTYPE html> 
<html lang = "en"> 
<head> 
<meta charset = "utf-8" /> 
<title>TypoCoder</title> 
<link rel = "stylesheet" type = "text/css" href = "../Style/question_page.css" /> 
<link rel = "stylesheet" type = "text/css" href = "../Style/all_pages.css" /> 
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
<h1 class = "question_name">BomberMan </h1><h2>Statement</h2> 

<p>There are n bombs located at distinct positions on a number line. The i-th bomb has position ai and power level bi. When the i-th bomb is activated, it destroys all bombs to its left (direction of decreasing coordinates) within distance bi inclusive. The bomb itself is not destroyed however. Saitama will activate the bomb one at a time from right to left. If a bomb is destroyed, it cannot be activated.</p> 

<p>BomberMan wants You to add a bomb strictly to the right of all the existing bomb, with any position and any power level, such that the least possible number of bombs are destroyed. Note that your placement of the bomb means it will be the first bomb activated. Find the minimum number of bombs that could be destroyed.</p> 

<h2>Input format</h2> 

<p>The first line of input contains a single integer n (1&thinsp;&le;&thinsp;n&thinsp;&le;&thinsp;100&thinsp;000) &mdash; the initial number of bombs.</p> 

<p>The i-th of next n lines contains two integers ai and bi (0&thinsp;&le;&thinsp;ai&thinsp;&le;&thinsp;1&thinsp;000&thinsp;000, 1&thinsp;&le;&thinsp;bi&thinsp;&le;&thinsp;1&thinsp;000&thinsp;000) &mdash; the position and power level of the i-th bomb&nbsp;respectively. No two bombs&nbsp;will have the same position, so ai&thinsp;&ne;&thinsp;aj if i&thinsp;&ne;&thinsp;j.</p> 

<h2>Output format</h2> 

<p>Print a single integer &mdash; the minimum number of bombs&nbsp;that could be destroyed if exactly one bomb&nbsp;is added.</p> 

<h2>Sample Input</h2> 

<p>4</p> 

<p>1 9</p> 

<p>3 1</p> 

<p>6 1</p> 

<p>7 4</p> 

<h2>Sample Output</h2> 

<p>1</p> 

<h4>Time Limit: 1s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "1" /> 
<input type = "hidden" name = "qid" value = "10" /> 
<input type = "hidden" name = "cid" value = "4" /> 
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
<!-- <label> 
Or choose a file 
<input type = "file" name = "source" /> 
</label> --> 
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
