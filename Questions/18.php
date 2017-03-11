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
<h1 class = "question_name">Chaotic Queues</h1><h2>Statement</h2> 

<div>The ticket counter at the cinema hall hasn&#39;t opened yet, but there is already a long queue waiting for its turn. Something fishy is happening in the queue, and you decide to invent a game out of it.</div> 

<div>&nbsp;</div> 

<div>There are <strong>N</strong> people in the queue. They have unique IDs that are integers ranging from <strong>1</strong> to <strong>N</strong>, and which are given to you as an array <strong>A</strong>. A[1] is ID of a person standing right next to the counter and A[2] is ID of person standing next to person with ID A[1] away from the counter and so on. People in the queue are highly impatient, and they are even ready to bribe the person in front of them to get a position that is nearer to the counter. A person can exchange positions only with the person who is standing directly in front of him at that moment(The exchanges may happen any number of times). Whenever a person bribes the person in front of him, you award one point to the person receiving the bribe.</div> 

<div>&nbsp;</div> 

<div>Unfortunately, you had to receive an urgent phone call, and you couldn&#39;t watch the bribe-exchanges that occurred. However, you know the final positions of all the people in the queue which will be given to you as an array <strong>B</strong>. B[1] is the ID of a person standing right next to the counter after bribe-exchanges and B[2] is ID of person standing next to person having ID B[1] and away from counter and so on. Can you guess what is the minimum number of points each person could have deserved?</div> 

<h2>Input format</h2> 

<p>The first line of the input consists of a single integer <strong>N</strong>, denoting the number of people in the queue.</p> 

<p>The next line contains <strong>N</strong> space separated integers, denoting array <strong>A</strong>, that represents the initial queue. (A[1] is the ID of the person nearest to the counter, A[2] is for the one behind him, and so on.)</p> 

<p>The next line contains <strong>N</strong> space separated integers, denoting array <strong>B</strong>, that represents the final queue. (B[1] is the ID of person nearest to the counter, B[2] is for the one behind him, and so on. )</p> 

<h2>Output format</h2> 

<p>Print <strong>N</strong> space seperated integers. The <strong>i</strong>&#39;th integer (<strong>1</strong>&lt;=<strong>i</strong>&lt;=<strong>N</strong>) should represent the minimum number of points the person with <strong>ID = i</strong> could have deserved.</p> 

<h2>Constraints</h2> 

<p>1 &lt;= <strong>N</strong> &lt;= 10^5<br /> 
1 &lt;= <strong>A[i]</strong> &lt;= <strong>N</strong> (Every integer from <strong>1</strong> to <strong>N</strong> appears in <strong>A</strong> exactly once.)<br /> 
1 &lt;= <strong>B[i]</strong> &lt;= <strong>N</strong> (Every integer from <strong>1</strong> to <strong>N</strong> arrears in <strong>B</strong> exactly once.)</p> 

<h2>Sample Input 1</h2> 

<p>4<br /> 
1 2 3 4<br /> 
1 2 3 4</p> 

<h2>Sample Output 1</h2> 

<p>0 0 0 0</p> 

<h2>Sample Input 2</h2> 

<p>4<br /> 
1 2 3 4<br /> 
4 1 2 3</p> 

<h2>Sample Output 2</h2> 

<p>1 1 1 0</p> 

<h2>Sample Input 3</h2> 

<p>4<br /> 
4 3 2 1<br /> 
1 4 3 2</p> 

<h2>Sample Output 3</h2> 

<p>0 1&nbsp;1 1</p> 

<h4>Time Limit: 2s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "2" /> 
<input type = "hidden" name = "qid" value = "18" /> 
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
