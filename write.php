<?
include "lib.php";
include "data/db_access.php";
include "head.php";
include "login.php";
?>
<div id=container <? if(!is_mobile()) echo "style=\"display: flex;\"";?>>
<div id=main>
<?
echo "<h2>write</h2>\n";
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
?>
</div></div>
</body>
</html>
