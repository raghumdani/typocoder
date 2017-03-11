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
<h3 class = "dashboard"><a href = <?php printf("../contest_page.php?cid=$cid"); ?> >Dashboard</a></h3> 
<div class = "question"> 
<!-- Write Question Here. Use HTML markup for writing formulas and beautify content --> 
<!-- Write question ID --> 
<h1 class = "question_name"> 
Mike and Maze 
</h1> 
<h2>Statement</h2> 
Mike was studying a problem last night. Unfortunately, the dragon has kidnapped him and put him in a mysterious maze. As himself being a programmer, he decided to crack the route to the exit. 
<br /><br /> The maze is a <b>N x M</b> (<b>N</b> rows and <b>M</b> columns) grid, where each cell is either <b style = "font-size: 18px;">'*'</b>, <b style = "font-size: 18px;">'.'</b>, <b>'U'</b> or <b>'E'</b> without the quotes. <b style = "font-size: 18px;">'*'</b> means he cannot step onto that cell, where as <b style = "font-size: 18px;">'.'</b> means he can step on to that cell. 
His initial position is marked with <b>'U'</b> and exit is marked with <b>'E'</b>. Now he can move to any adjacent cell if its possible for him to step on it. Two cells are adjacent if they share an edge. 
<br /><br /> As he is very tired, he want to go to exit in minimum number of moves. If it's impossible for him to exit, print -1. 

<h3>Input format</h3> 

First line contains <b>T</b>, the number of test cases. <br /> 
First line of each test case contains two space separated integers <b>N</b> and <b>M</b>. <br /> 
Next <b>N</b> lines contain exactly <b>M</b> characters where each character is either '.', '*', 'U', 'E' without quotes. 

<h3>Output format</h3> 

For each test case print in a single line, the minimum number of moves to get to exit. <br /> 
If it's impossible to exit, print -1. 

<h3>Constraints</h3> 

<b>1 &le; T &le; 1000 </b> <br /> 
<b>1 &le; N, M &le; 50 </b> <br /> 
<b>There is exactly one cell marked with 'U'</b> <br /> 
<b>0 &le; Number of cells marked with 'E' &lt; N * M </b> 

<h4>Sample Input</h4> 
5 <br /> 
1 1 <br /> 
U <br /> 
1 2 <br /> 
UE <br /> 
3 3 <br /> 
U.. <br /> 
... <br /> 
..E <br /> 
3 3 <br /> 
U*E <br /> 
... <br /> 
.E. <br /> 
4 4 <br /> 
.U.. <br /> 
.**. <br /> 
EEEE <br /> 
EEEE 

<h4>Sample Output</h4> 
-1 <br /> 
1 <br /> 
4 <br /> 
3 <br /> 
3 <br /> 

<h3>Sample Explaination</h3> 
For the first test case, there is no exit cell. So he can't escape. <br /> 
For the second test case, only in one move, he can jump to exit. So required number of moves is 1. 

<h4>Time Limit: 3s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "3" /> 
<input type = "hidden" name = "qid" value = "4" /> 
<input type = "hidden" name = "cid" value = <?php printf("'$cid'"); ?> /> 
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
<input class = "btn" type = "submit" value = "Submit" onclick = "doit()"/> 
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
