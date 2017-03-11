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
<h1 class = "question_name">Special Sum Path</h1><h2>Statement</h2> 

<p>By now you all know that Mike loves trees. So he wants you to work on a tree today. You are given a weighted tree with <strong>N</strong> vertices. Let <strong>wt(A - B)</strong> denote the weight of the edge from vertex <strong>A</strong> to <strong>B</strong>. Special Sum of a path from vertex <strong>A</strong>&nbsp;to <strong>B</strong> is defined as follows:</p> 

<p>Decompose the path into edges first. Let <strong>A<sub>1</sub>, A<sub>2</sub>, ... A<sub>m</sub></strong>&nbsp;are the vertices present on the path from <strong>A</strong> to <strong>B</strong>, <strong>A</strong><sub><strong>1</strong>&nbsp;</sub>being nearest to <strong>A</strong> and&nbsp;<strong>A</strong><sub><strong>m</strong>&nbsp;</sub>being nearest to <strong>B</strong>. Then Special Sum of a path from A to B is <strong>wt(A - A<sub>1</sub>) - wt(A<sub>1</sub> - A<sub>2</sub>) + wt(A<sub>2</sub> - A<sub>3</sub>) - .... + (-1)<sup>m + 1</sup>&nbsp;wt(A<sub>m</sub> - B)</strong>. Now your job is to find the value of Special Sum in every query.</p> 

<h2>Input format</h2> 

<p>First line contains <b>N</b>,&nbsp;&nbsp;the number of vertices in a tree.</p> 

<p>Next <strong>N - 1</strong>, lines contains<strong> A, B and C</strong> indicating there is an undirected edge from vertex <strong>A</strong> to <strong>B</strong> with weight <strong>C</strong>.</p> 

<p>Next line contain <strong>Q</strong>, the number of queries you have to process.</p> 

<p>Next&nbsp;<strong>Q</strong>&nbsp;lines contains two space separated integers <strong>U</strong> and <strong>V&nbsp;</strong>denoting the path from vertex <strong>U</strong> to <strong>V</strong>.</p> 

<h2>Output format</h2> 

<p>For each query, print the special sum of the path.</p> 

<h2>Constraints</h2> 

<p>1 &le; N, Q &le; 10<sup>5</sup></p> 

<p>1 &le; A, B, U, V &le; N</p> 

<p>1 &le; C &le; 10<sup>9</sup></p> 

<p>It is guaranteed that given graph is a tree</p> 

<h2>Sample Input</h2> 

<p>7</p> 

<p>1 2 1</p> 

<p>1 7 8</p> 

<p>7 6 9</p> 

<p>7 5 10</p> 

<p>2 4 6</p> 

<p>2 3 5</p> 

<p>5</p> 

<p>1 2</p> 

<p>2 1</p> 

<p>5 6</p> 

<p>6 5</p> 

<p>3 6</p> 

<h2>Sample Output</h2> 

<p>1</p> 

<p>1</p> 

<p>1</p> 

<p>-1</p> 

<p>3</p> 

<h2>Sample Explaination</h2> 

<p>The tree given in that sample is:</p> 

<p style="text-align:center"><img src = "../Images/15.png" /></p> 

<p>For last query the path can be decomposed into wt(3 - 2) - wt(2 - 1) + wt(1 - 7) - wt(7 - 6) = 5 - 1 + 8 - 9 = 3.</p> 

<h4>Time Limit: 2s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "2" /> 
<input type = "hidden" name = "qid" value = "15" /> 
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
