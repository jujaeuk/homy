<?
include "data/db_access.php";
include "lib.php";
$que="drop table ".$homename."_users";
mysqli_query($connect,$que);
$que="drop table ".$homename."_board";
mysqli_query($connect,$que);
unlink("data/homename.txt");
unlink("data/db_access.php");
rmdir("data");
include "head.php";
echo "<article>$homename uninstalled</article>\n";
?>
</div></div>
</body></html>
