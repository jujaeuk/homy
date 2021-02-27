<?
include "lib.php";
if($_POST['category']=="직접 입력"){
  include "head.php";
  echo "<div id=container";
  if(!is_mobile()) echo " style=\"display: flex\"";
  echo "><div id=main>\n";
  echo "<h2>new category</h2>\n";
  echo "<form method=post action=$PHP_SELF>\n";
  echo "category <input type=text name=category>\n";
  echo "<input type=hidden name=content value='".$_POST['content']."'>\n";
  echo "<input type=submit value=start></form>\n";
  echo "</div></div>\n";
  echo "</body></html>\n";
}
else{
  include "data/db_access.php";
  $start=time();
  $due=mktime($_POST['due_hour'],$_POST['due_min'],0,$_POST['due_month'],$_POST['due_day'],$_POST['due_year']);
  $que="insert into ".$homename."_log (category,content,up, due) values ('".$_POST['category']."','".htmlentities($_POST['content'],ENT_QUOTES)."',".$_POST['up'].",$due)";
  if($_POST['category']) mysqli_query($connect,$que);
  echo "<meta http-equiv=\"refresh\" content=\"0;url=plan.php\">\n";
} 
