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
Mike and the Strange Array 
</h1> 
<h2>Statement</h2> 

Recently, Mike came across a very strange array. Its strangeness lies in the fact, that it has an integer <b>K</b> associated with it, and you can perform only one kind of operation on it. <br /> <br /> 

This special operation is : Select any index, and add <b>K</b> to the element at that index. However, when you do so, all the numbers of the array, except the one at the chosen index, will decrease by <b>K</b>. 
<br /> <br /> 
Mike is allowed to perform this operation as many times as he wishes. But he wants the final array to contain as many equal elements as possible. Help him find the maximum value, that corresponds to the number of times any number can appear in the array. 
<h3>Input format</h3> 

The first line of the input consists of a single integer <b>T</b>, denoting the number of test cases. <br /> 
Each of the test cases begins with 2 space separated integers <b>N</b>, (denoting the size of the strange array <b>A</b>) and <b>K</b>, that is the number associated with the array as explained in the problem statement. 
<br />The next line contains <b>N</b> space separated numbers, that represent the array <b>A</b>. 

<h3>Output format</h3> 
For every test case, output the required answer in a new line. 

<h3>Constraints</h3> 

<b>1 &le; T &le; 20 <br /> 
1 &le; N &le; 10<sup>5</sup> <br /> 
0 &le; A<sub>i</sub>, K &le; 10<sup>5</sup> </b> 

<h4>Sample Input</h4> 

2 <br /> 
3 1 <br /> 
3 1 3 <br /> 
3 1 <br /> 
1 2 2 

<h4>Sample Output</h4> 

3 <br /> 
2 

<h3>Sample Explaination</h3> 

In the first test case, add <b>K</b> at index 2 (considering 1-based indexing). The array then becomes {2, 2, 2}. Thus, all numbers are now equal. Maximum number of similar elements is, therefore, 3. 
<br /> <br /> 
In the second test case, no matter how many times you perform the operation, you cannot make more than 2 of the elements same. 

<h4>Time Limit: 3s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "3" /> 
<input type = "hidden" name = "qid" value = "7" /> 
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
