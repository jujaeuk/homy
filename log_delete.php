<?
include "lib.php";
include "data/db_access.php";
if(!file_exists('data')){
  include "head.php";
  echo "<article>not installed <a href=install.php>install</a></article></div></div></body></html>\n";
}
elseif(!isset($_COOKIE['user'])) include "login.php";
else{
  $que="delete from ".$homename."_log where no=".$_GET['no'];
  mysqli_query($connect,$que);
  echo "<meta http-equiv=\"refresh\" content=\"0;url=log.php\">\n";
}
