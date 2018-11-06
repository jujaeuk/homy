<?
include "lib.php";
include "data/db_access.php";
include "head.php";
echo "<article>\n";
if($_GET['upper']){
	$upper=$_GET['upper'];
	$que="select * from ".$homename."_board where no=$upper";
	@$check=mysqli_fetch_object(mysqli_query($connect,$que));
	echo "upper post: $check->title<br>\n";
}
else $upper=0;
echo "<table><form method=post action=write_ok.php>\n";
if(is_mobile()){
	echo "<tr><td>title <input type=text class=mobile name=title></td></tr>\n";
	echo "<tr><td>content<br><textarea class=mobile name=content rows=10></textarea></td></tr>\n";
	echo "<tr><td align=center><input type=submit value=save></td></tr>\n";
}
else{
	echo "<tr><td>title</td><td><input class=writetitle type=text name=title></td></tr>\n";
	echo "<tr><td>content</td><td><textarea name=content rows=30></textarea></td></tr>\n";
	echo "<tr><td colspan=2 align=center><input type=submit value=save></td></tr>\n";
}
echo "<input type=hidden name=upper value=$upper>\n";
echo "</form></table>\n";
echo "</article>\n";
?>
</div></div>
</body></html>
