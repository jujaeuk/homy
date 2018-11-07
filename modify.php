<?
include "lib.php";
include "data/db_access.php";
include "head.php";
$que="select * from ".$homename."_board where no=".$_GET['no'];
@$check=mysqli_fetch_object(mysqli_query($connect,$que));
echo "<article>\n";
echo "<form method=post action=modify_ok.php>\n";
echo "<table><tr><td>title</td><td><input type=text class=writetitle name=title value='$check->title'></td></tr>\n";
echo "<tr><td>upper</td><td><input type=text name=upper value=$check->upper></td></tr>\n";
echo "<tr><td>content</td><td><textarea name=content rows=15>$check->content</textarea></td></tr>\n";
echo "<tr><td colspan=2 align=center><input type=submit value=save></td></tr>\n";
echo "<input type=hidden name=no value=".$_GET['no'].">\n";
echo "</form></table>\n"; 
?>
</article></div></div></body></html>
