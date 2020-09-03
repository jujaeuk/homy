<?
include "lib.php";
include "head.php";
$que="select * from ".$homename."_users where name='".$_COOKIE['user']."'";
@$check=mysqli_fetch_object(mysqli_query($connect,$que));
echo "<div id=container><div id=main>\n";
if($check->no==1){
  echo "<form method=post action=uninstall_ok.php>\n";
  echo "<table>\n";
  echo "<tr><td><input type=radio name=uninstall value='table'>table\n";
  echo "<input type=radio name=uninstall value='skin' checked>skin</td><tr>\n";
  echo "<tr><td align=center><input type=submit value=uninstall></td><tr>\n";
  echo "</table>\n";
  echo "</form>\n";
}
else echo "<article>you don't have the right</article>\n";
?>
</div><div id=menu></div></div>
</body>
</html>
