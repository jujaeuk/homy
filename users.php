<?
include "lib.php";
include "data/db_access.php";
include "head.php";
echo "<article>\n";
$que="select * from ".$homename."_users order by name";
$result=mysqli_query($connect,$que);
while(@$check=mysqli_fetch_object($result)){
  echo $check->name."<br>\n";
}
echo "</article>\n";
?>
</div></div>
</body></html>
