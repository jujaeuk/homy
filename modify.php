<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(is_mobile()) echo "<div id=containerm><div id=mainm>";
else echo "<div id=container><div id=main>\n";
echo "<h2>modify</h2>\n";
$que="select * from ".$homename."_board where no=".$_GET['no'];
@$check=mysqli_fetch_object(mysqli_query($connect,$que));
echo "<form method=post enctype=\"multipart/form-data\" action=modify_ok.php>\n";
echo "<table><tr><td>title</td><td><input type=text name=title class=title value='".$check->title."'></td></tr>\n";
echo "<tr><td>upper</td><td><input type=text name=upper value=$check->upper>\n";
echo "<tr><td>order of lower</td><td><select name=order_lower>\n";
echo "<option value='time'";
if($check->order_lower=="time") echo " selected";
echo ">time ascending</option>\n";
echo "<option value='time desc'";
if($check->order_lower=="time desc") echo " selected";
echo ">time descending</option>\n";
echo "<option value='title'";
if($check->order_lower=="title") echo " selected";
echo ">title ascending</option>\n";
echo "</select></td></tr>\n";
echo "<tr><td>content</td><td><textarea name=content\n";
if(is_mobile()) echo "cols=40 rows=10";
else echo "cols=60 rows=20";
echo ">".$check->content."</textarea></td></tr>\n";

echo "<tr><td>file</td><td>\n";
$que="select * from ".$homename."_files where boardno=$check->no";
$result_file=mysqli_query($connect,$que);
$i=0;
while(@$check_file=mysqli_fetch_object($result_file)){
	if($i==0) echo "파일을 삭제하려면 체크:<br>\n";
	echo "<input type=checkbox name=fdel[] value=$check_file->no>$check_file->filename<br>\n";
	$i++;
}
echo "새로 추가할 파일:<br>\n";
echo "<input type=file name=file></td></tr>\n";
echo "<tr><td colspan=2 align=center><input type=submit value=save></td></tr>\n";
echo "</table>\n";
echo "<input type=hidden name=writer value='".$_COOKIE['user']."'>\n";
echo "<input type=hidden name=no value=$check->no>\n";
echo "</form>\n";
?>
</div></div>
</body>
</html>
