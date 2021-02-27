<?
include "lib.php";
include "data/db_access.php";
$start=time();
$que="update ".$homename."_log set start=$start where no=".$_GET['no'];
echo $que;
mysqli_query($connect,$que);
echo "<meta http-equiv=\"refresh\" content=\"0;url=plan.php\">\n";
?>