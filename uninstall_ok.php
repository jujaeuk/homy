<?
include "lib.php";
include "data/db_access.php";
$que="select * from ".$homename."_users where name='".$_COOKIE['user']."'";
@$check=mysqli_fetch_object(mysqli_query($connect,$que));
if($check->no==1){
  $files=glob("data/*");
  foreach($files as $file)
    if(is_file($file)) unlink($file);
  rmdir("data");
  if($_POST['uninstall']=="table"){
    $que="drop table ".$homename."_users";
    mysqli_query($connect,$que);
    $que="drop table ".$homename."_board";
    mysqli_query($connect,$que);
    $que="drop table ".$homename."_log";
    mysqli_query($connect,$que);
  }
  setcookie("user", $_COOKIE['user'],time()-3600);
  echo "<meta http-equiv=\"refresh\" content=\"0;url=index.html\">\n";
}
else{
  include "head.php";
  echo "<article>you don't have the right</article>\n";
}
?>
</div></div>
</body></html>
