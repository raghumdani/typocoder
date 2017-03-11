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
Merge and Sort 
</h1> 
<h2>Statement</h2> 
Mike hates disorderliness. He has <b>N</b> arrays of positive integers, the <b>i</b><sup>th</sup> of which has size <b>K<sub>i</sub></b>. He wants to form A SINGLE SORTED array out of them. However, he is only allowed to perform 2 kinds of operations : 
<br /><br /> 
<ul> 
<li>Break an array at any point. (This will divide the array into 2 parts).</li> 
<li>Concatenate 2 of the arrays. (i.e., choose 2 arrays, and place one of them after another.)</li> 
</ul> 
<br /> 
Each of these operations will cost Mike 1 minute. Naturally, he wishes to finish the task as soon as possible. Help him find the minimum amount of time (in minutes) that will be required. 


<h3>Input format</h3> 
The first line of the input consists of a single integer <b>T</b>, denoting the number of test cases. <br /> 
Each of the test cases begins with a positive integer <b>N</b>, that denotes the number of arrays that Mike has. <b>N</b> lines follow.<br /> 
The first integer in each of the <b>N</b> lines is <b>K<sub>i</sub></b>, i.e the size of the <b>i<sup>th</sup></b> array, and is followed by <b>K<sub>i</sub></b> space separated integers that represent the <b>i<sup>th</sup></b> array. 

<h3>Output format</h3> 

For each test case, print on a new line, a single integer, that corresponds to the minimum time taken by Mike. 

<h3>Constraints</h3> 

<b>1 &le; T &le; 15 <br /> 
1 &le; N, K<sub>i</sub> &le; 10<sup>5</sup> <br /></b> 
All the numbers in each of the arrays are integers in the range [1, 10^9]. <br /> 
It is guaranteed that the sum of <b>K<sub>i</sub></b> in a single test case will not exceed 10<sup>5</sup>. <br /> 
It is also guaranteed that all the numbers in all of the arrays are distinct. 


<h4>Sample Input</h4> 

3 <br /> 
2 <br /> 
2 1 3 <br /> 
1 2 <br /> 
1 <br /> 
3 3 2 1 <br /> 
1 <br /> 
3 11 7 9 

<h4>Sample Output</h4> 

3 <br /> 
4 <br /> 
2 
<h3>Sample Explaination</h3> 

For the first test case, the operations performed will be : <br /> 
[1 3], [2] -> Break the first array -> [1], [3], [2]. <br /> 
[1], [3], [2] -> Concatenate the first and third arrays -> [1 2], [3]. <br /> 
[1 2], [3] -> Concatenate -> [1 2 3]. <br /> <br /> 

For the second case, <br /> 
[3 2 1] -> Break the array at index 1 -> [3], [2 1] <br /> 
[3], [2 1] -> Break the second array -> [3], [2], [1] <br /> 
[3], [2], [1] -> Concatenate the second array after the third one -> [3], [1 2] <br /> 
[3], [1 2] -> Concatenate -> [1 2 3]. <br /> 
<h4>Time Limit: 3s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "3" /> 
<input type = "hidden" name = "qid" value = "6" /> 
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
<div id = 'editor' name = 'txtsource'>#include &lt;stdio.h&gt; 

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
