<!DOCTYPE html> 
<html lang = "en"> 
<head> 
<meta charset = "utf-8" /> 
<title>TypoCoder</title> 
<link rel = "stylesheet" type = "text/css" href = "../Style/question_page.css" /> 
<link rel = "stylesheet" type = "text/css" href = "../Style/all_pages.css" /> 
<link rel = "stylesheet" type = "text/css" href = "Style/css/bootstrap.css" /> 
<script type="text/javascript" src = "Style/js/bootstrap.js"></script> 
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
<h1 class = "question_name">Legen-WaitForIt-dary</h1><h2>Statement</h2> 

<p>Barney Stinson is a super cool guy but none of his best friends knew what does he do for living. So they started asking him about his occupation. Barney likes challenges. His friends challenges him that they will solve any problem which barney tells them to solve.</p> 

<p>CHALLENGE ACCEPTED !!</p> 

<p>Ted accepts the challenge. So the Challenge is :</p> 

<p>Ted is allowed to pick <b>N</b> drinks and there are <b>K</b> different types of drinks present. Barney is damn Rich so assume that there are infinitely many Drinks of each type. Also Ted has to select atleast one from each type. So Barney wants to know in how many ways these <b>N</b> drinks can be selected.As the answer can be large for this task, print it mod 10<sup>9</sup> + 7</p> 

<p>Barney still feels that the challenge is not fit to be called Legendary. So he asks Ted to find the number of positive integers &le; N, which are not coprime with <b>N</b>. Now thats legendary.</p> 

<p>There will be <b>T</b> Test cases, Each containing two integers <b>N</b> and <b>K</b>. You need to Help ted to get the answers for both the tasks. You need to print them in a Newline separated with a space.</p> 

<h2>Input format</h2> 

<p>The first line contains <b>T</b>, the number of test cases.</p> 
<p>Next <b>T</b> lines contains two space seperated integers <b>N</b> and <b>K</b>. </p> 

<h2>Output format</h2> 

<p>Print Answer of the Task1 (modulo 10<sup>9</sup> + 7) and Task2 on a newline separated by a space.</p> 

<h2>Constraints</h2> 

<p> 1 &le; <b>T</b> &le; 100</p> 

<p>1 &le; <b>K</b> &le; <b>N</b> &le; 1000000</p> 

<h2>Sample Input</h2> 

<p>2</p> 

<p>10 10</p> 

<p>9 7</p> 

<h2>Sample Output</h2> 

<p>1 6</p> 

<p>28 3</p> 


<h4>Time Limit: 1s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "1" /> 
<input type = "hidden" name = "qid" value = "9" /> 
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
