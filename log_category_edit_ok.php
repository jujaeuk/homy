<?
include "lib.php";
include "data/db_access.php";
if(!file_exists('data')){
  include "head.php";
  echo "<article>not installed <a href=install.php>install</a><article>\n";
  echo "</div></div></body></html>\n";
}
elseif(!isset($_COOKIE['user'])){
  include "head.php";
  include "login.php";
  echo "</div></div></body></html>\n";
}
else{
  if($_POST['merge']=='직접입력'){
    include "head.php";
    echo "<article>\n";
    echo "<form method=post action=$PHP_SELF>\n";
    echo "new category name: <input type=text name=merge>\n";
    echo "<input type=submit value=save>\n";
    echo "<input type=hidden name=category value='".$_POST['category']."'>\n";
    echo "</form>\n";
    echo "</article>\n";
    echo "</div></div>\n";
    echo "</body></html>\n";
  }
  else{
    echo "category: ".$_POST['category']." merge: ".$_POST['merge']."<br>\n";
    $que="update ".$homename."_log set category='".$_POST['merge']."' where category='".$_POST['category']."'";
    mysqli_query($connect,$que);
    echo "<meta http-equiv=\"refresh\" content=\"0;url=log.php\">\n";
  }
}
?>
