<?
include "lib.php";
include "data/db_access.php";
$files=glob("data/*");
foreach($files as $file)
  if(is_file($file)) unlink($file);
rmdir("data");
$files=glob("files/*");
foreach($files as $file)
  if(is_file($file)) unlink($file);
rmdir("files");
if($_POST['uninstall']=="table"){
  $que="drop table ".$homename."_users";
  mysqli_query($connect,$que);
  $que="drop table ".$homename."_board";
  mysqli_query($connect,$que);
  $que="drop table ".$homename."_log";
  mysqli_query($connect,$que);
}
  setcookie("user", $_COOKIE['user'],time()-3600,".");
  echo "<meta http-equiv=\"refresh\" content=\"0;url=index.html\">\n";
?>
