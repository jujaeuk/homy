<?
include "head.php";
if(mysqli_num_rows(mysqli_query($connect,"show tables like '".$_POST['homename']."_users'"))==1){
  echo "ERROR: home name alreay exists<br><a href=install.php>back</a>\n";
}
else{
  mkdir("data");
  $fp=fopen("data/homename.txt","w");
  fwrite($fp,$_POST['homename']);
  fclose($fp);
  
  $fp=fopen("data/db_access.php","w");
  fwrite($fp, "<?\n\$host=\"".$_POST['host']."\";\n\$user=\"".$_POST['user']."\";\n\$password=\"".$_POST['password'].
         "\";\n\$db=\"".$_POST['db']."\";\n");
  fwrite($fp, "\$connect=mysqli_connect(\$host,\$user,\$password,\$db) or die(\"DB connection error\");\n?>");
  fclose($fp);
  include "data/db_access.php";
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
