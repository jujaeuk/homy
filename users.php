<?
include "lib.php";
include "data/db_access.php";
include "head.php";
include "login.php";
?>
<div id=container <? if(!is_mobile()) echo "style=\"display: flex;\"";?>>
<div id=main>
<?
echo "<h2>users</h2>\n";
$que="select * from ".$homename."_users order by name";
$result=mysqli_query($connect,$que);
echo "<ul>\n";
while(@$check=mysqli_fetch_object($result)){
  echo "<li>".$check->name."</li>\n";
}
echo "</ul>\n";
?>
</div></div>
</body>
</html>
