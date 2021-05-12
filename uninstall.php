<?
include "lib.php";
include "data/db_access.php";
include "head.php";
$que="select * from ".$homename."_users where name='".$_COOKIE['user']."'";
@$check=mysqli_fetch_object(mysqli_query($connect,$que));
echo "<div id=container><div id=main>\n";
if($check->no==1){
  echo "are you sure? <a href=uninstall_ok.hp>yes</a> <a href=.>no</a>\n";
}
else{
  echo "<article>you don't have the right</article>\n";
}
?>
</div><div id=menu></div></div>
</body>
</html>
