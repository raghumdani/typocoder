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
<h1 class = "question_name">Superpowers</h1><h2>Statement</h2> 

<p>Mike is very brilliant. He loves number theory. As you might guess, he also loves solving challenging problems. It is very difficult to find a challenging task than to solve it. You are far more brilliant than Mike and you have a lot of challenging tasks.&nbsp;</p> 

<p>One such task is to find the value of the below expression, given <strong>A</strong>, <strong>B</strong>, <strong>C</strong> and <strong>M</strong>.</p> 

<p style="text-align:center"><strong>A<sup>B<sup>C</sup></sup> mod M</strong></p> 

<h2>Input format</h2> 

<p>First line contains <strong>T</strong>, the number of test cases.</p> 

<p>Each of next <strong>T</strong> lines contains four space seperated integers <strong>A</strong>, <strong>B</strong>, <strong>C</strong> and <strong>M</strong>.</p> 

<h2>Output format</h2> 

<p>For every test case, print a single integer, the required answer.</p> 

<h2>Constraints</h2> 

<p>1 &le; <strong>T</strong> &le; 10000</p> 

<p>1 &le; <strong>A, B, C, M</strong> &le; 10<sup>9</sup></p> 

<p><strong>It is guaranteed that A and M are coprime</strong></p> 

<h2>Sample Input</h2> 

<p>3<br /> 
1 2 2 2<br /> 
5 5 1 1<br /> 
100 100 100 99</p> 

<h2>Sample Output</h2> 

<p>1</p> 

<p>0</p> 

<p>1</p> 

<h2>Sample Explaination</h2> 

<p>Test 1: 1<sup>2<sup>2</sup></sup> = 1 and (1 mod 2 = 1)</p> 

<h4>Time Limit: 2s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "2" /> 
<input type = "hidden" name = "qid" value = "13" /> 
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
