<?
include "db_access.php";
include "head.php";
if(mysqli_num_rows(mysqli_query("show tables like '".$_POST['homename']."_users'"))==1){
  echo "ERROR: home name alreay exists<br><a href=install.php>back</a>\n";
}
else{
  $fp=fopen("homename.txt","w");
  fwrite($fp,$_POST['homename']);
  fclose($fp);

  $que="create table ".$_POST['homename']."_users(
    no int not null auto_increment,
    unique(no),
    primary key(no),
    name char(32),
    password char(32))";
  mysqli_query($connect,$que);
  echo "home ".$_POST['homename']." created<br>\n";
}
?>
</body></html>
