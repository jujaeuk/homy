<?
include "db_access.php";
include "lib.php";

$que="drop table ".$homename."_users";
mysqli_query($connect,$que);
unlink("homename.txt");
include "head.php";
echo "$homename uninstalled\n";
?>
</body></html>
