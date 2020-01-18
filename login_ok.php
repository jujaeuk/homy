<?
include "lib.php";
include "data/db_access.php";
$que="select * from ".$homename."_users where name='".$_POST['username']."'";
$result=mysqli_query($connect,$que);
if(mysqli_num_rows($result)==0) $error_message="user name doesn't exist";
else{
  $check=mysqli_fetch_object($result);
  if(crypt($_POST['password'],"onlyone")==$check->password){
    setcookie("user",$check->name,0,"/");
    echo "<meta http-equiv=\"refresh\" content=\"0;url=.\">\n";
  }
  else $error_message="password incorrect";
}
if($error_message){
  include "head.php";
  echo "ERROR: ".$error_message;
  echo "</div></div></body></html>\n";
}
?>
