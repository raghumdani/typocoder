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
<h1 class = "question_name">Meghana and Cutie Queries </h1><h2>Statement</h2> 

<p>Tihor gifted an array of positive integers of n elements to Meghana and asked her to calculate the &ldquo;cuteness&rdquo; of q queries.<br /> 
Each query is defined by two integers l and r ( 1&lt;= l &lt;= r &lt;= n) .<br /> 
Cuteness of a query is defined as product of distinct elements in the range l to r(both inclusive) mod 1000000007.<br /> 
Since Meghana is new to programming , you have to help her out !!</p> 

<h2>Input format</h2> 

<p>The first line of input contains n , the number of elements in the array.<br /> 
The second line of input contains n positive integers a[1],a[2],&hellip;a[n] the array elements.<br /> 
The third line of input contains q, the number of queries.<br /> 
Each of the next q lines contain two integers l and r , the endpoints of the query.</p> 

<h2>Output format</h2> 

<p>For every query output the cuteness of the query in a new line.</p> 

<h2>Constraints</h2> 

<p>1 &lt;= n &lt;= 1000000<br /> 
1 &lt;= a[i] &lt;= 1000000<br /> 
1 &lt;= q &lt;= 1000000<br /> 
1 &lt;= l &lt;= r &lt;= n</p> 

<h2>Sample Input</h2> 

<p>5<br /> 
1 2 4 1 2<br /> 
3<br /> 
1 5<br /> 
1 1<br /> 
4 5</p> 

<h2>Sample Output</h2> 

<p>8<br /> 
1<br /> 
2</p> 

<h2>Explanation</h2> 

<p>For first query l=1 and r=5<br /> 
The distinct elements in this range are 1,2,4. The product of 1,2,4 is 8<br /> 
Therefore cuteness is 8%1000000007 = 8.<br /> 
For second query l=1 and r=1<br /> 
The distinct elements in this range are 1. The product of 1 is 1.<br /> 
Therefore cuteness is 1%1000000007 = 1.<br /> 
For third query l=4 and r=5<br /> 
The distinct elements in this range are 1,2. The product is 2.<br /> 
Therefore cuteness is 2%1000000007 = 2.</p> 

<h4>Time Limit: 8s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "8" /> 
<input type = "hidden" name = "qid" value = "23" /> 
<input type = "hidden" name = "cid" value = "5" /> 
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
