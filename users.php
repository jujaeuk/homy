<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(!file_exists('data')) echo "<article>not installed <a href=install.php>install</a><article>\n";
elseif(!isset($_COOKIE['user'])) include "login.php";
else{
  echo "user: ".$_COOKIE['user']." (<a href=logout.php>logout</a>)\n";
  echo "<article>\n";
  echo "<h3>users</h3>\n";
  $que="select * from ".$homename."_users order by name";
  $result=mysqli_query($connect,$que);
  echo "<ul>\n";
  while(@$check=mysqli_fetch_object($result)){
    echo "<li>".$check->name."</li>\n";
  }
  echo "</ul>\n";
  echo "</article>\n";
}
?>
</div></div>
</body>
</html>
