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
<h1 class = "question_name">Divisibility By 3</h1><h2>Statement</h2> 

<p>Given a string S of length n, where each character ranges from &lsquo;0&rsquo; to &lsquo;9&rsquo;. Perform two types queries:<br /> 
Type 1: Given a, b and v, we need to add v to characters from from index a to b (a and b inclusive).&nbsp;If suppose the sum S[i]+v&gt;9, for a&lt;=i&lt;=b, then S[i]=(S[i]+v)%10.<br /> 
Type 2: Given a and b, output whether the sub-string from index a to b (a and b inclusive) is divisible by 3. Print &ldquo;Yes&rdquo; or &ldquo;No&rdquo;.</p> 

<h2>Input format</h2> 

<p>First line of the input consists of a string S. Second line consists of an integer Q, denoting the number of queries. Q lines&nbsp;follow. Query of the type 1 consists of four space separated integers x, a, b, v&nbsp;in a single line. x denoting the query type (1), a, b and v as per the problem statement. Query of the type 2 consists of three space separated integers x, a and b.</p> 

<h2>Output format</h2> 

<p>For each of the query of type 2, print &quot;Yes&quot; if the substring [a, b] is divisible by 3, else&nbsp;&quot;No&quot; in a new line. &nbsp;</p> 

<h2>Constraints</h2> 

<p>0 &lt;= S<sub>i</sub>&nbsp;&lt;= 9</p> 

<p>1 &lt;= size of string &lt;= 10<sup>5</sup></p> 

<p>1 &lt;= Q &lt;= 10<sup>5</sup>&nbsp;</p> 

<p>x = 1 or 2</p> 

<p>1 &lt;= a, b &lt;= size of string</p> 

<p>1 &lt;= v &lt;= 10</p> 

<h2>Sample Input</h2> 

<p>1233</p> 

<p>2</p> 

<p>1 1 2 4</p> 

<p>2 2 3&nbsp;</p> 

<h2>Sample Output</h2> 

<p>Yes</p> 

<h4>Time Limit: 3s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "3" /> 
<input type = "hidden" name = "qid" value = "20" /> 
<input type = "hidden" name = "cid" value = "3" /> 
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
