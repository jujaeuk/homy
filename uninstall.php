<?
include "lib.php";
include "data/db_access.php";
$que="select * from ".$homename."_users where name='".$_COOKIE['user']."'";
@$check=mysqli_fetch_object(mysqli_query($connect,$que));
if($check->no==1){
  $que="drop table ".$homename."_users";
  mysqli_query($connect,$que);
  $que="drop table ".$homename."_board";
  mysqli_query($connect,$que);
  $que="drop table ".$homename."_log";
  mysqli_query($connect,$que);
  unlink("data/homename.txt");
  unlink("data/db_access.php");
  rmdir("data");
  setcookie("user", $_COOKIE['user'],time()-3600);
  include "lib.php";
  include "head.php";
  echo "<article>$homename uninstalled</article>\n";
}
else{
  include "lib.php";
  include "head.php";
  echo "<article>you don't have the right</article>\n";
}
?>
</div></div>
</body></html>
