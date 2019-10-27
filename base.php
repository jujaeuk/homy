<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(!file_exists('data')) echo "<article>not installed <a href=install.php>install</a><article>\n";
elseif(!isset($_COOKIE['user'])) include "login.php";
else{
  echo "user: ".$_COOKIE['user']." (<a href=logout.php>logout</a>)\n";
  echo "<article>\n";
  echo "<h3>title</h3>\n";
  echo "</article>\n";
}
?>
</div></div>
</body>
</html>
