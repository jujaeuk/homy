<?
include "lib.php";
include "data/db_access.php";
$que="delete from ".$homename."_board where no=".$_GET['no'];
mysqli_query($connect,$que);
if($_GET['upper']==0) echo "<meta http-equiv=\"refresh\" content=\"0;url=index.html\">\n";
else echo "<meta http-equiv=\"refresh\" content=\"0;url=read.php?no=".$_GET['upper']."\">\n";
?>
