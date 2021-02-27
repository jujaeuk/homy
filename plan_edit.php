<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(is_mobile()) echo "<div id=containerm><div id=mainm>";
else echo "<div id=container><div id=main>\n";
echo "<h2>plan edit</h2>\n";
$que="select * from ".$homename."_log where no=".$_GET['no'];
$check=mysqli_fetch_object(mysqli_query($connect,$que));

echo "<form method=post action=plan_edit_ok.php>\n";
echo "<table>\n";
echo "<tr><td>category</td><td>\n";
echo "<select name=category>\n";
$que="select * from ".$homename."_log order by category";
$result_category=mysqli_query($connect,$que);
$temp="";
while(@$check_category=mysqli_fetch_object($result_category)){
  if($temp!=$check_category->category) $category[]=$check_category->category;
  $temp=$check_category->category;
}
for($i=0;$i<sizeof($category);$i++){
  echo "<option value='".$category[$i]."'";
  if($category[$i]==$check->category) echo " selected";
  echo ">".$category[$i]."</option>\n";
}
echo "<option value='직접 입력'>직접 입력</option>\n";
echo "</select>\n";
echo "up <input type=text name=up value=\"$check->up\">"; 
echo "</td></tr>\n";
echo "<tr><td>content</td><td>\n";
echo "<input type=text name=content value=\"$check->content\">";
echo "</td></tr>\n";
echo "<tr><td>due</td><td>\n";
$check_year=date("Y",$check->due);
$check_month=date("m",$check->due);
$check_day=date("d",$check->due);
$check_hour=date("H",$check->due);
$check_min=date("i",$check->due);

echo "<select name=due_year>\n";
for($i=0;$i<30;$i++){
  echo "<option value=".($check_year-$i);
  if($i==0) echo " selected";
  echo ">".($check_year-$i)."</option>\n";
}
echo "</select>\n";
echo "<select name=due_month>\n";
for($i=1;$i<=12;$i++){
  echo "<option value=$i";
  if($check_month==$i) echo " selected";
  echo ">$i</option>\n";
}
echo "</select>\n";
echo "<select name=due_day>\n";
for($i=1;$i<=31;$i++){
  echo "<option value=$i";
  if($check_day==$i) echo " selected";
  echo ">$i</option>\n";
}
echo "</select>\n";
echo "<select name=due_hour>\n";
for($i=0;$i<=23;$i++){
  echo "<option value=$i";
  if($check_hour==$i) echo " selected";
  echo ">$i</option>\n";
}
echo "</select>\n";
echo "<select name=due_min>\n";
for($i=0;$i<=59;$i++){
  echo "<option value=$i";
  if($check_min==$i) echo " selected";
  echo ">$i</option>\n";
}
echo "</select>\n";
echo "</td></tr>\n";
echo "<input type=hidden name=no value=".$_GET['no'].">\n";
echo "<tr><td colspan=2 align=center><input type=submit value=save>\n";
echo "<a href=plan_del.php?no=".$_GET['no'].">delete</a></td></tr>\n";
echo "</table>\n";
echo "</form>\n";
include "log_menu.php";
?>
</div></div>
</body></html>