<?
include "lib.php";
if($_POST['category']=="직접 입력"){
  include "head.php";
  include "login.php";
  echo "<div id=container";
  if(!is_mobile()) echo " style=\"display: flex;\"";
  echo "><div id=main>\n";
  echo "<form method=post action=$PHP_SELF>\n";
  echo "category <input type=text name=category>\n";
  echo "<input type=hidden name=content value='".$_POST['content']."'>\n";
  echo "<input type=hidden name=no value=".$_POST['no'].">\n"; 
  echo "<input type=hidden name=up value=".$_POST['up'].">\n"; 
  echo "<input type=submit value=start></form>\n";
  include "log_menu.php";
  echo "</div></div>\n";
  echo "</body></html>\n";
}
else{
  include "data/db_access.php";
  $due=mktime($_POST['due_hour'],$_POST['due_min'],0,$_POST['due_month'],$_POST['due_day'],$_POST['due_year']);
  $que="update ".$homename."_log set due=$due, category='".$_POST['category']."', content='".htmlentities($_POST['content'],ENT_QUOTES)."', up=".$_POST['up'];
  $que=$que." where no=".$_POST['no'];
  mysqli_query($connect,$que);
  echo "<meta http-equiv=\"refresh\" content=\"0;url=plan.php\">\n";
}
?>
