<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(!file_exists('data')) echo "not installed <a href=install.php>install</a>\n";
elseif(!isset($_COOKIE['user'])) include "login.php";
else{
  echo "user: ".$_COOKIE['user']." (<a href=logout.php>logout</a>)\n";
  echo "<article>\n";
  echo "<h3>write</h3>\n";
  echo "<form method=post action=write_ok.php>\n";
  echo "<table><tr><td>title</td><td><input type=text name=title class=title></td></tr>\n";
  echo "<tr><td>content</td><td><textarea name=content\n";
  if(is_mobile()) echo "cols=40 rows=10";
  else echo "cols=60 rows=20";
  echo "></textarea></td></tr>\n";
  echo "<tr><td colspan=2 align=center><input type=submit value=save></td></tr>\n";
  echo "</table>\n";
  echo "<input type=hidden name=upper value=".$_GET['upper'].">\n";
  echo "<input type=hidden name=writer value='".$_COOKIE['user']."'>\n";
  echo "</form>\n";
  echo "</article>\n";
}
?>
</div></div>
</body>
</html>
