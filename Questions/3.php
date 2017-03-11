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
Hamming Distance 
</h1> 
<h2>Statement</h2> 
Hamming distance between two strings <b>A</b> and <b>B</b> of equal length <b>N</b> is defined as summation of <b>|A[i] - B[i]|</b> for <b>i = 0 to N - 1</b>. 
<br />This is the first problem in this platform. So here, you just have to calculate the hamming distance for a pair of given strings. 

<br /><br /><b>Note</b>: Here <b>|A[i] - B[i]|</b> is the absolute difference between the ASCII values of <b>i<sup>th</sup></b> character of strings A and B. 

<h3>Input format</h3> 

First line contains <b>T</b>, the number of test cases. <br /> 
Every test case consists of two space separated strings of length <b>N</b>. 

<h3>Output format</h3> 

For each test case print in a single line, the required answer. 

<h3>Constraints</h3> 

<b>1 &le; N, T &le; 2000</b> <br /> 
<b>Strings contain only lower case latin characters.</b><br /> 

<h4>Sample Input</h4> 
3<br /> 
ababa ababa<br /> 
aaaaa bbbbb <br /> 
c a <br /> 

<h4>Sample Output</h4> 
0<br /> 
5<br /> 
2<br /> 
<h3>Sample Explaination</h3> 
For the first case, two strings are equal. So the hamming distance is 0. <br /> 
For the third case hamming distance is |ord('c') - ord('a')| = 2 where ord(ch) returns ASCII value of character 'ch'. 

<h4>Time Limit: 3s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "3" /> 
<input type = "hidden" name = "qid" value = "3" /> 
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
