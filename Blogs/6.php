<!DOCTYPE html>
				<html lang = "en">
				<head>
				<meta charset = "utf-8" />
				<title>TypoCoder</title>
				<link rel = "stylesheet" type = "text/css" href = "../Style/index_page.css" />
				<link rel = "stylesheet" type = "text/css" href = "../Style/all_pages.css" />
				<link rel = "stylesheet" type = "text/css" href = "../Style/blog.css" />
		<!--<link rel = "stylesheet" type = "text/css" href = "../Style/css/bootstrap.css" />
		<script type="text/javascript" src = "../Style/js/bootstrap.js"></script> -->
				<link rel = "icon" href = "../Images/logo.png" />
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
					include("../Util/common.php");
					//$conn = mysqli_connect("localhost", "root", "", "typocoder");
					include("../Util/Connect_db.php");
					if(!$conn) {
						die($Rerr);
					}
					$blogid = 6;
					$sql = "SELECT COUNT(*) FROM approved_blogs WHERE blog_id = $blogid;";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array($result);
					$cnt = $row[0];
					settype($cnt, "integer");
					if($cnt == 0) {
						header("Location: ../index.php");
						exit(0);
					}
					$sql = "SELECT COUNT(user_name) FROM user_blog_read WHERE blog_id = $blogid and user_name = '$user_name';";
					$result = mysqli_query($conn, $sql);
					if(!$result) {
						mysqli_close($conn);
						die($err);
					}

					$row = mysqli_fetch_array($result);
					$cnt = $row[0];
					settype($cnt, "integer");
					if($cnt == 0) {
						$sql = "INSERT INTO user_blog_read (user_name, blog_id) VALUES('$user_name', $blogid);";
						$result = mysqli_query($conn, $sql);
						if(!$result) {
							mysqli_close($conn);
							die($err);
						}
						$sql = "UPDATE blogs SET downloads = downloads + 1 WHERE blog_id = $blogid;";
						$result = mysqli_query($conn, $sql);
						if(!$result) {
							mysqli_close($conn);
							die($err);
						}
					}

				?>
				</span>
				</div>
				<div class = "main_container"><h3 style = "text-align: center;"><a href = "../index.php">&lt; Main Page</a></h3><div class = "blogdata"><h1 style = "text-align: center;">Instructions on setting problems on TypoCoder</h1><p>In this blog, I&nbsp;will first describe&nbsp;a problem which uses simple IO and then I&nbsp;will describe how to set&nbsp;a problem which uses checker function.</p>

<p>QID: is the Question ID given to each problem on this&nbsp;site. This ID must be unique. So that being said, you cannot create two problems with same Question ID. Currently we have around 23 problems. So, it is better to choose Questions ID &gt; 23 for your problem. This value should be a natural number.</p>

<p>CID: is the Contest ID which is one of the attributes of a problem letting the server know where to place it. For example, Contest ID of &quot;ICPC 16 Practice #1&quot; is 5. As you can see above. This value should be a natural number.</p>

<p>Time Limit: It&#39;s better to choose time limit properly so that slow solutions to your problem don&#39;t pass. If your problem requires atmost&nbsp;3 * 10<sup>8</sup> to be performed, keep it 1s. Similarly 2s for 6 * 10<sup>8</sup> and so on. You can even keep TL as decimal value (ex 0.5s) but keep in mind&nbsp;that keeping&nbsp;decimal TL is often discouraged. Please don&#39;t keep TL more than 5s for better performace of website though maximum allowed is 300s. :)</p>

<p>Memory Limit will be same for all problems ie. 1024M. We are planning to implement it in future. You can add multiple test cases by a clicking on a button saying&nbsp;&quot;Add another Input&nbsp;file&quot;.</p>

<p>All you need to set a problem is : above values ( i.e. QID, CID, TL),&nbsp;input file(s) and correspinding correct output file(s). But you must be an admin to set a problem. Ask any current admins to make you an admin. Admins&nbsp;can enter future contests and &nbsp;submit solutions to those problems without appearing in the leaderboard. (Also activity done by admins on this site is completely anonymous).</p>

<p>Visit ./TypoCoder/create_problem.php page. You can see the form which asks for all the above&nbsp;values and an editor for you&nbsp;to create a problem statement. Just fill the form. If you notice an error like &quot;Please Enter a valid Contest ID&quot; etc etc. Keep in mind that you cannot add files more than 4 MB. (This limit is needed for&nbsp;better site&#39;s preformance).&nbsp;</p>

<h3>About Checkers</h3>

<p>Write a C++/C&nbsp;program whose main function should return 1 if participant&#39;s output&nbsp;doesn&#39;t pass the test case and return 0 if participant has the correct output. That program takes three arguments in order : Correct Output File (submitted by you), Participant&#39;s Output File (output obtained by participant for the corresponding input), Input File (submitted by you).</p>

<p>Here is a sample checker for the problem &quot;Easy Eh?&quot; whose CID = 3 (Training Round #4 - (Phase 1))&nbsp;and QID = 16.</p>

<pre>
<code>
#include &lt;bits/stdc++.h&gt;

using namespace std;

int cnt[26], cnt1[26];
char s[5000];

int main(int argc, char** argv) {
  FILE* fcorrect = fopen(argv[1], &quot;r&quot;); // argument 1 is correct output (setter&#39;s)
  FILE* fparticipant = fopen(argv[2], &quot;r&quot;); // argument 2 is participant&#39;s output for this input
  FILE* finput = fopen(argv[3], &quot;r&quot;); // argument 3 is the input file.
&nbsp; 
&nbsp; // now play with these files.
&nbsp; // remember, if your checker function fails, (segmentation fault or compilation error)
&nbsp; // Output file of participant is directly compared with output file submitted by you.
  if(fcorrect == 0 || fparticipant == 0) return 1; // check this to avoid SIGSEV
  int odd = 0, n = 0;
  for(int i = 0; i &lt; 26; ++i) {
    fscanf(fcorrect, &quot;%d&quot;, cnt + i);
    odd += (cnt[i] % 2);
    n += cnt[i];
  }
  if(fscanf(fparticipant, &quot;%s&quot;, s) == EOF) {
      fclose(fcorrect);
  fclose(fparticipant);
  return 1;
  }
  if(odd &gt; 1) {
    int to = atoi(s);
    if(to != -1) {
       fclose(fcorrect);
  fclose(fparticipant);

      return 1;
    } else {
        fclose(fcorrect);
  fclose(fparticipant);

      return 0;
    }
  }
  int i = 0, j = n - 1;
  while(i &lt;= j) {
    if(s[i] == s[j]) {
      cnt1[s[i] - &#39;a&#39;]++;
      if(i != j) cnt1[s[j] - &#39;a&#39;]++;
      i++; j--;
    } else {
     fclose(fcorrect);
     fclose(fparticipant);
     return 1;
    }
  }
  for(int i = 0; i &lt; 26; ++i) {
    if(cnt[i] != cnt1[i]) {
        fclose(fcorrect);
  fclose(fparticipant);
     return 1;
    }
  }

&nbsp; // Closing the files is really necessary.
  fclose(fcorrect);
  fclose(fparticipant);
&nbsp; 
&nbsp; // Return 0 if this output passes the test case.
  return 0;
}
</code></pre>
</div></div>
						<div class = "footer">
					TypoCoder &copy; 2015 - <span id = "cur_year"></span> <b>Raghavendra M Dani</b><br />
					Current Time: <span id = "date_time">null</span><br />
					</div>
					<script src = "../Scripts/update_date.js"></script>
					</body>
					</html>