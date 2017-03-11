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
<h1 class = "question_name">Hermione and Magic Brooms</h1><h2>Statement</h2> 

<p>Hermione has <strong>N</strong> Brooms. All the <strong>N</strong> Brooms are placed on table in row.&nbsp;<br /> 
All the Brooms have following magical properties.<br /> 
1. Each Broom is given a magical name(string of lowercase latin letters(a-z)).<br /> 
2. Each Broom bounces when mantra(a string of lowercase latin letters (a-z)) chanted by hermione, matches with the suffix of name of the Broom.<br /> 
You are sitting with Hermione. Hermione is chanting mantras with closed eyes so you will be helping her to count number of Brooms bounced on table for each mantra.&nbsp;</p> 

<h2>Input format</h2> 

<p>First line of the input contains single integer <strong>N</strong>, denoting number of Broom hermione has.<br /> 
Next <strong>N</strong> lines, each consist of name of the Broom.<br /> 
Next line consist of single integer <strong>Q</strong>, number of mantra&#39;s hermione is going to chant.<br /> 
Next <strong>Q</strong> lines, each consist of string of lower latin letters denoting the mantra spoke by hermione.&nbsp;</p> 

<h2>Output format</h2> 

<p>For each mantra, print the single integer on new denoting number of Brooms bounced.</p> 

<h2>Constraints</h2> 

<p>1 &le; <strong>max(Len_i) * N</strong> &le; 10<sup>6</sup> &nbsp;,where <strong>max(Len_i)</strong> is the maximum length of name of the Broom.<br /> 
1 &le; <strong>max(size_mantra_i) * Q</strong> &le; 10<sup>6</sup> , where <strong>max(size_mantra_i)</strong> is the maximum length of the mantra. &nbsp;</p> 

<h2>Sample Input</h2> 

<p>3<br /> 
vaibhav&nbsp;<br /> 
vishvesh<br /> 
anubhav&nbsp;<br /> 
3<br /> 
bhav<br /> 
vesh<br /> 
vv</p> 

<h2>Sample Output</h2> 

<p>2<br /> 
1<br /> 
0&nbsp;</p> 

<h2>Sample Explaination</h2> 

<p>First mantra , &quot;bhav&quot; matches with the suffix of the first (&quot;vaibhav&quot;)and third(&quot;anubhav&quot;) Broom&#39;s name, So output is 2.<br /> 
Second mantra, &quot;vesh&quot; matches with the suffix of the 2nd Broom&#39;s name(&quot;vihsvesh&quot;), So output is 1.<br /> 
Third mantra, &quot;vv&quot; there is no name of the Broom whose suffix matches with the mantra, So output &nbsp;is zero.</p> 

<h4>Time Limit: 2s <br />Memory Limit: 1024 MB</h4> 
<!-- END OF QUESTION IF YOU ARE VIEWING THIS SOURCE, KUDOS--> 
</div> 

<div class = "submit_answer"> 
<form action = "../verdict.php" method = "post" enctype = 'multipart/form-data'> 
<fieldset class = "acc-info"><!-- Write QID HERE --> 
<input type = "hidden" name = "time_limit" value = "2" /> 
<input type = "hidden" name = "qid" value = "17" /> 
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
