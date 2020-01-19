<?
include "lib.php";
include "data/db_access.php";
$que="select * from ".$homename."_users where name='".$_COOKIE['user']."'";
$result=mysqli_query($connect,$que);
$check=mysqli_fetch_object($result);
if(mysqli_num_rows($result)==0) $error_message="user name doesn't exist";
elseif(crypt($_POST['pass_c'],"onlyone")!=$check->password) $error_message="current password is wrong";
elseif(!($_POST['pass_n1'])) $error_message="new password missing";
elseif($_POST['pass_n1']!=$_POST['pass_n2']) $error_message="two passwords are different";
include "head.php";
include "login.php";
?>
<div id=container <? if(!is_mobile()) echo "style=\"display: flex;\"";?>>
<div id=main>
<?
echo "<h2>password</h2>\n";
if($error_message) echo "error : ".$error_message." <a href=password.php>back</a>\n";
else{
  $crypt_pass=crypt($_POST['pass_n1'],"onlyone");
  $que="update ".$homename."_users set password='".$crypt_pass."' where name='".$_COOKIE['user']."'";
  mysqli_query($connect,$que);
  echo "password changed <a href=.>home</a>";
}
?>
</div></div></body></html>
