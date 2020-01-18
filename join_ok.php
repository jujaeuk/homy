<?
include "data/db_access.php";
include "lib.php";
include "head.php";
$que="select * from ".$homename."_users where name='".$_POST['username']."'";
$result=mysqli_query($connect,$que);
if(mysqli_num_rows($result)>0) $error_message="user name already exists";
if($_POST['password1']=="") $error_messsage="no password";
if($_POST['password1']!=$_POST['password2']) $error_message="different passwords";
echo "<article>\n";
if($error_message){
  echo "ERROR: ".$error_message."<br>\n";
  echo "<a href=join.php>back</a>\n";
}
else{
  $crypt_pass=crypt($_POST['password1'],"onlyone");
  $que="insert into ".$homename."_users (name, password) values('".$_POST['username']."','".$crypt_pass."')";
  if($_POST['username']){
    mysqli_query($connect,$que);
    echo "user ".$_POST['username']." created<br><a href=.>home</a>\n";
  }
}
?>
</article>
</div></div>
</body></html>
