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
echo "<tr><td>timeline</td><td><select name=timeline>\n";
echo "<option value=1";
if($check->timeline==1) echo " selected";
echo ">yes</option>\n";
echo "<option value=0";
if($check->timeline==0) echo " selected";
echo ">no</option>\n";
echo "</select></td></tr>\n";
echo "<tr><td>content</td><td><textarea name=content\n";
if(is_mobile()) echo "cols=40 rows=10";
else echo "cols=60 rows=20";
echo ">".$check->content."</textarea></td></tr>\n";
if($check->file) echo "<tr><td>file</td><td>".$check->file." <input type=checkbox name=fdel value=ok>delete</td></tr>\n";
else echo "<tr><td>file</td><td><input type=file name=file></td></tr>\n";
echo "<tr><td colspan=2 align=center><input type=submit value=save></td></tr>\n";
echo "</table>\n";
echo "<input type=hidden name=writer value='".$_COOKIE['user']."'>\n";
echo "<input type=hidden name=no value=$check->no>\n";
echo "</form>\n";
?>
</div></div>
</body>
</html>
