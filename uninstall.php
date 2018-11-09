<?
include "lib.php";
include "data/db_access.php";
include "head.php";
$que="select * from ".$homename."_users where name='".$_COOKIE['user']."'";
@$check=mysqli_fetch_object(mysqli_query($connect,$que));
if($check->no==1){
  $que="drop table ".$homename."_users";
  mysqli_query($connect,$que);
  $que="drop table ".$homename."_board";
  mysqli_query($connect,$que);
  unlink("data/homename.txt");
  unlink("data/db_access.php");
  rmdir("data");
  echo "<article>$homename uninstalled</article>\n";
}
else echo "<article>you don't have the right</article>\n";
?>
</div></div>
</body></html>
