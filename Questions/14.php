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
<h1 class = "question_name">Odd Trees</h1><h2>Statement</h2> 

<p>Everyone loves trees. We even want them in our garden. The trees which we are going to consider in this problem are bit different. A tree is a connected graph having no cycles. Here connected means, there is atleast one path between any of the two vertices. We can also prove that number of edges in trees are <strong>N - 1&nbsp;</strong>for a tree having <strong>N&nbsp;</strong>vertices.&nbsp;</p> 

<p>Moreover each edge can have a weight assigned to it. The length of the path from say vertex <strong>A</strong> to <strong>B&nbsp;</strong>is sum of weights of all the edges on the path. Easy right? In this problem, you have to find number of Odd length paths in a tree.&nbsp;</p> 

<h2>Input format</h2> 

<p>The first line contains <strong>T</strong>, number of test cases.</p> 

<p>First line of each test contains <strong>N</strong>, number of vertices in a tree.</p> 

<p>Next <strong>N - 1</strong> lines of each test contains three space seperated integers <strong>A</strong>, <strong>B</strong> and <strong>C</strong> meaning there is an undirected edge between vertices <strong>A</strong> and <strong>B</strong> having weight <strong>C</strong>.&nbsp;</p> 

<h2>Output format</h2> 

<p>For each test case, print the number of odd length paths in a tree in a new line.</p> 

<h2>Constraints</h2> 

<p>1 &le; T &le; 10</p> 

<p>1 &le; N &le; 10<sup>5</sup></p> 

<p>1 &le; A, B &le; N</p> 

<p>1 &le; C &le; 10<sup>9</sup></p> 

<p>It is guaranteed that resulting graph is a tree without self loops and multiple edges.</p> 

<h2>Sample Input</h2> 

<p>1</p> 

<p>5</p> 

<p>1 2 1</p> 

<p>1 3 2</p> 

<p>1 4 1</p> 

<p>1 5 2</p> 

<h2>Sample Output</h2> 

<p>6</p> 

<h2>Sample Explaination</h2> 

<p>The tree given in the sample is:</p> 

<p style="text-align:center"><img src="../Images/img.png" /></p> 

<h4>Time Limit: 2s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "2" /> 
<input type = "hidden" name = "qid" value = "14" /> 
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
