<?
include "lib.php";
include "data/db_access.php";
$que="delete from ".$homename."_board where no=".$_GET['no'];
mysqli_query($connect,$que);
echo "<meta http-equiv=\"refresh\" content=\"0;url=board.php\">\n";
?>
