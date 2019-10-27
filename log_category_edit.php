<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(!file_exists('data')) echo "<article>not installed <a href=install.php>install</a></article>\n";
elseif(!isset($_COOKIE['user'])) include "login.php";
else{
  echo "user: ".$_COOKIE['user']." (<a href=logout.php>logout</a>)\n";
  echo "<article>\n";
  echo "<form method=post action=log_category_edit_ok.php>\n";
  echo "<select name=category>\n";
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
  echo "</select>\n";
  echo "merge to:\n";
  echo "<select name=merge>\n";
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
  echo "<option value='직접입력'>직접입력</option>\n";
  echo "</select>\n";
  echo "<input type=submit value=edit>\n";
  echo "</form>\n";
  echo "</article>\n";
  include "log_aside.php";
}
?>
</div></div>
</body></html>
