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
<h1 class = "question_name">Subset Partition</h1><h2>Statement</h2> 

<p>Mike has a multiset <b>S</b>. He wants to form <b>M</b> submultisets <b>S<sub>1</sub>, S<sub>2</sub>, .. S<sub>M</sub></b> such that below properties are true :</p> 

<ul> 
<li>Each element in <b>S</b> must be present in exactly one <b>S<sub>i</sub></b> where <b>i &isin; [1, M]</b></li> 
<li>Let <b>X</b> and <b>Y</b> be any two elements in <b>S<sub>i</sub></b> for <b> i &isin; [1, M]</b>, then X &amp; Y &ne; Y <b>and</b> X &amp; Y &ne; X.</li> 
</ul> 

<p>Your task is to tell Mike, what is the minimum value of <b>M</b> that can be achieved. Will you help him?</p> 

<h2>Input format</h2> 

<p>The first line contains <b>T</b>, the number of test cases.</p> 

<p>The first line of each test case contains the number of integers in the given multiset <b>N</b>.</p> 

<p>Second line of each test case contains <b>N</b> space separated integers denoting the elements of multiset.</p> 

<h2>Output format</h2> 

<p>For each test case, print the required answer in a single line.</p> 

<h2>Constraints</h2> 

<p>1 &le; <b>T</b> &le; 10</p> 

<p>1 &le; <b>N</b> &le; 2000</p> 

<p>0 &le; <b>element of multiset</b> &le; 10<sup>9</sup></p> 

<h2>Sample Input</h2> 

<p>2</p> 

<p>6</p> 

<p>4 2 1 9 6 5</p> 

<p>6</p> 

<p>5 7 7 0 0 6</p> 

<h2>Sample Output</h2> 

<p>2</p> 

<p>5</p> 

<h2>Sample Explaination</h2> 

<p>For the first case, the optimal solution is S<sub>1</sub> = {4, 2, 1} and S<sub>2</sub> = {9, 6, 5}. You can verify that both S<sub>1</sub> and S<sub>2</sub> satisfy the given condition.</p> 
<p> Take the first multiset, <br />1 &amp; 2 != 1 or 2. <br />2 &amp; 4 != 2 or 4 <br /> 1 &amp; 4 != 1 or 4. <br />Similarly second multiset also satisfies the condition. 

<p>For the second case, the optimal solution is S<sub>1</sub> = {0}, S<sub>2</sub> = {0}, S<sub>3</sub> = {7}, S<sub>4</sub> = {7}, S<sub>5</sub> = {5, 6}. So 5 is the minimum value of M we can achieve.</p> 

<h4>Time Limit: 5s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "5" /> 
<input type = "hidden" name = "qid" value = "21" /> 
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
<!-- <!-- <label> 
Or choose a file 
<input type = "file" name = "source" /> 
</label> --> 
--> </fieldset> 
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
