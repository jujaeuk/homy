<?
$connect=mysqli_connect($_POST['host'],$_POST['user'],$_POST['password'],$_POST['db']) or die("DB connection error");
include "lib.php";
include "head_join.php";
?>
<div id=container <? if(!is_mobile()) echo "style=\"display: flex;\"";?>>
<div id=main>
<?
if((mysqli_num_rows(mysqli_query($connect,"show tables like '".$_POST['homename']."_users'"))==0)&&($_POST['install']=="skin")){
  echo "ERROR: home does not exist<br><a href=install.php>back</a>\n";
}
else{
  mkdir("files");
  mkdir("data");
  $fp=fopen("data/homename.txt","w");
  fwrite($fp,$_POST['homename']."\n");
  fclose($fp);
  
  $fp=fopen("data/db_access.php","w");
  fwrite($fp, "<?\n\$host=\"".$_POST['host']."\";\n\$user=\"".$_POST['user']."\";\n\$password=\"".$_POST['password'].
         "\";\n\$db=\"".$_POST['db']."\";\n");
  fwrite($fp, "\$connect=mysqli_connect(\$host,\$user,\$password,\$db) or die(\"DB connection error\");\n?>\n");
  fclose($fp);
  if($_POST['install']=="table"){
    $que="create table ".$_POST['homename']."_users(
      no int not null auto_increment,
      unique(no),
      primary key(no),
      name char(32),
      password char(32))";
    mysqli_query($connect,$que);
    $que="create table ".$_POST['homename']."_board(
      no int not null auto_increment,
      unique(no),
      primary key(no),
      title char(128),
      time int,
      writer char(32),
      content text,
      upper int,
      order_lower char(16) default 'time')";
    mysqli_query($connect,$que);
    $que="create table ".$_POST['homename']."_log(
      no int not null auto_increment,
      unique(no),
      primary key(no),
      start int,
      end int,
      loss int default 0,
      category char(32),
      content char(128))";
    mysqli_query($connect,$que);
    $que="create table ".$_POST['homename']."_files(
      no int not null auto_increment,
      unique(no),
      primary key(no),
      boardno int,
      filename char(128))";
    mysqli_query($connect,$que);
  }
  include "data/db_access.php";
  echo "home ".$_POST['homename']." created<br><a href=.>home</a>\n";
}
?>
</div></div>
</body></html>
