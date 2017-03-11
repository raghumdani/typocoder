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
<h1 class = "question_name">Longest Super-K Subsequences</h1><h2>Statement</h2> 

<p>Finding the &quot;Longest Increasing Subsequence&quot; of a sequence is a boring problem. Let&#39;s make it a bit more interesting. Given a sequence <strong>A</strong> of <strong>N</strong> integers (<strong>A<sub>1</sub></strong>, <strong>A<sub>2</sub></strong>,.., <strong>A<sub>N</sub></strong>), a super-<strong>K</strong>&nbsp;subsequence of length <strong>m</strong>, is defined as a sequence <strong>A<sub>k1</sub>, A<sub>k2</sub>,.., A<sub>km</sub></strong>, such that :</p> 

<p>(i) <strong>1</strong> &lt;= <strong>k<sub>1</sub></strong> &lt; <strong>k<sub>2</sub></strong> &lt; .. &lt; <strong>k<sub>m</sub></strong> &lt;= <strong>N</strong><br /> 
(ii) <strong>A<sub>k(i+1)</sub></strong> - <strong>A<sub>ki</sub></strong> &gt;= <strong>K</strong> for all 1&lt;=<strong>i</strong>&lt;<strong>m</strong></p> 

<p>Thus, super-<strong>0</strong> subsequences are just normal increasing subsequences, while super-<strong>1</strong> subsequences are the strictly increasing ones. Your task is : Given the sequence <strong>A</strong> and an integer <strong>K</strong>, find the length of the longest super-<strong>K</strong> subsequence.</p> 

<h2>Input format</h2> 

<p>The first line of the input consists of 2 space seperated integers <strong>N</strong> and <strong>K</strong>, denoting the size of <strong>A</strong>, and the integer &#39;<strong>K</strong>&#39; as described in the problem statement, respectively.<br /> 
The next line contains <strong>N</strong> space seperated integers, representing the sequence <strong>A</strong>.</p> 

<h2>Output format</h2> 

<p>Output a single integer, that is the length of the longest super-K subsequence.</p> 

<h2>Constraints</h2> 

<p>1 &lt;= <strong>N</strong> &lt;= 10<sup>5</sup><br /> 
1 &lt;= <strong>K, A<sub>i</sub></strong> &lt;= 10<sup>9</sup></p> 

<h2>Sample Input</h2> 

<p>10 2<br /> 
1 2 3 4 5 6 7 8 9 10</p> 

<h2>Sample Output</h2> 

<p>5</p> 

<h2>Explanation</h2> 

<p>{1, 3, 5, 7, 9} is one of the possible super-2 subsequences of length 5.</p> 

<h4>Time Limit: 2s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "2" /> 
<input type = "hidden" name = "qid" value = "19" /> 
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
