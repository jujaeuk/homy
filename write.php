<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(is_mobile()) echo "<div id=containerm><div id=mainm>";
else echo "<div id=container><div id=main>\n";
echo "<h2>write</h2>\n";
echo "<form method=post enctype=\"multipart/form-data\" action=write_ok.php>\n";
echo "<table><tr><td>title</td><td><input type=text name=title class=title></td></tr>\n";
echo "<tr><td>order of lower</td><td><select name=order_lower>\n";
echo "<option value='time' selected>time ascending</option>\n";
echo "<option value='time desc'>time descending</option>\n";
echo "<option value='title'>title ascending</option>\n";
echo "</select></td></tr>\n";
echo "<tr><td>content</td><td><textarea name=content\n";
if(is_mobile()) echo "cols=40 rows=10";
else echo "cols=60 rows=20";
echo "></textarea></td></tr>\n";
echo "<tr><td>file</td><td><input type=file name=file></td></tr>\n";
echo "<tr><td colspan=2 align=center><input type=submit value=save></td></tr>\n";
echo "</table>\n";
echo "<input type=hidden name=upper value=".$_GET['upper'].">\n";
echo "<input type=hidden name=writer value='".$_COOKIE['user']."'>\n";
echo "</form>\n";
?>
</div></div>
</body>
</html>
