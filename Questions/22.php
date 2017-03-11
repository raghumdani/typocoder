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
<h1 class = "question_name">Level-Order Coloring</h1><h2>Statement</h2> 

<p>ThunderCracker has a complete binary tree, consisting of &#39;<strong>N</strong>&#39; nodes. But colorless trees are boring, so he has decided to paint it. He has &#39;<strong>K</strong>&#39; distinct colors. 2 nodes that lie on the <strong>same level</strong> (i.e. they have the same distance from the root node &#39;1&#39;) <strong>must be colored with the same color</strong>. Moreover, each of the &#39;K&#39; colors should be used <strong>at least once</strong>, and <strong>no node should remain colorless</strong>. In how many different ways can the coloring be done?</p> 

<p><strong>Note : </strong>Complete binary tree -<strong>&nbsp;</strong><a href="http://mathworld.wolfram.com/CompleteBinaryTree.html">http://mathworld.wolfram.com/CompleteBinaryTree.html</a></p> 

<h2>Input format</h2> 

<p>The first line of the input consists of a single integer &#39;<strong>T</strong>&#39;, denoting number of test cases. T lines follow.<br /> 
Each of the following lines contains 2 space separated integers &#39;<strong>N</strong>&#39; and &#39;<strong>K</strong>&#39;, as described in the problem statement.</p> 

<h2>Output format</h2> 

<p>Output a single integer, that represents the number of ways to color the tree given the constraints mentioned in the problem statement. As the answer can be very large, print it modulo 1000000007. (10<sup>9</sup>+7)</p> 

<h2>Constraints</h2> 

<p>1 &lt;= T &lt;= 100</p> 

<p>1 &lt;= N &lt;= 1000000000000000000 (10<sup>18</sup>)</p> 

<p>1 &lt;= K &lt;= 100</p> 

<h2>Sample Input</h2> 

<p>1</p> 

<p>3 2</p> 

<h2>Sample Output</h2> 

<p>2</p> 

<h2>Explanation</h2> 

<p>Let the nodes be {1, 2, 3}, such that 1 is the root node, and {2, 3} are the leaves. Also, let &#39;a&#39; and &#39;b&#39; be the distinct colors. The different colorings possible are : (a, b, b), (b, a, a). Note that (a, a, a) is not possible because both the colors are not used in this coloring. Also, (a, b, a) is not counted since nodes &#39;2&#39; and &#39;3&#39; cannot be painted in different colors as they lie on the same level.</p> 

<h4>Time Limit: 1s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "1" /> 
<input type = "hidden" name = "qid" value = "22" /> 
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
