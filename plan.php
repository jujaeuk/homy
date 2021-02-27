<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(is_mobile()) echo "<div id=containerm><div id=mainm>";
else echo "<div id=container><div id=main>\n";
echo "<h2>plan</h2>\n";
echo "<form method=post action=plan_set.php>\n";
echo "<table>\n";
echo "<tr><td>category</td><td><select name=category>\n";
$que="select * from ".$homename."_log order by category";
$result=mysqli_query($connect,$que);
$temp="";
while(@$check=mysqli_fetch_object($result)){
  if($temp!=$check->category) $category[]=$check->category;
  $temp=$check->category;
}
echo "<option value=>---</option>\n";
for($i=0;$i<sizeof($category);$i++){
  echo "<option value='".$category[$i]."'>".$category[$i]."</option>\n";
}
echo "<option value='직접 입력'>직접 입력</option>\n";
echo "</select>\n";
if(!isset($_GET['up'])) $up=0;
else $up=$_GET['up'];
echo "up : $up";
echo "<input type=hidden name=up value=$up>\n";
echo "</td></tr>\n";
echo "<tr><td>content</td><td><input type=text class=log name=content>\n";
echo "</td></tr>\n";
echo "<tr><td>due</td><td>\n";
$now=time();
$now_year=date("Y",$now);
$now_month=date("m",$now);
$now_day=date("d",$now);
$now_hour=date("H",$now);
$now_min=date("i",$now);

echo "<select name=due_year>\n";
for($i=0;$i<30;$i++){
  echo "<option value=".($now_year-$i);
  if($i==0) echo " selected";
  echo ">".($now_year-$i)."</option>\n";
}
echo "</select>\n";
echo "<select name=due_month>\n";
for($i=1;$i<=12;$i++){
  echo "<option value=$i";
  if($now_month==$i) echo " selected";
  echo ">$i</option>\n";
}
echo "</select>\n";
echo "<select name=due_day>\n";
for($i=1;$i<=31;$i++){
  echo "<option value=$i";
  if($now_day==$i) echo " selected";
  echo ">$i</option>\n";
}
echo "</select>\n";
echo "<select name=due_hour>\n";
for($i=0;$i<=23;$i++){
  echo "<option value=$i";
  if($now_hour==$i) echo " selected";
  echo ">$i</option>\n";
}
echo "</select>\n";
echo "<select name=due_min>\n";
for($i=0;$i<=59;$i++){
  echo "<option value=$i";
  if($now_min==$i) echo " selected";
  echo ">$i</option>\n";
}
echo "</select>\n";
echo "<input type=submit value=set></td></tr>\n";
echo "</table></form>\n";

function subplan($homename,$connect,$up){
	$que="select * from ".$homename."_log where up=$up";
	$result=mysqli_query($connect,$que);
	$i=0;
	while(@$check=mysqli_fetch_object($result)){
		$i++;
		if($i==1) echo "<ul>\n";
		echo "<li>($check->category) $check->content (due: ".date("Ymd H:i",$check->due).")\n".
			"<a href=plan_start.php?no=$check->no>!</a> <a href=plan.php?up=$check->no>+</a>\n".
			"<a href=plan_edit.php?no=$check->no>e</a></li>\n";
		subplan($homename,$connect,$check->no);
	}
	if($i>0) echo "</ul>\n";
}
subplan($homename,$connect,0);
include "log_menu.php";
?>
</div></div>
</body>
</html>
