<?
include "lib.php";
include "data/db_access.php";
$que="select * from ".$homename."_board where no=".$_GET['no'];
$check=mysqli_fetch_object(mysqli_query($connect,$que));
$que="select * from ".$homename."_board where upper=".$_GET['no']." order by time";
$result_sub=mysqli_query($connect,$que);
$i=1;
while(@$check_sub=mysqli_fetch_object($result_sub)){
	$que="update ".$homename."_board set subno=$i where no=".$check_sub->no;
	mysqli_query($connect,$que);
	$i++;
}
echo "<meta http-equiv=\"refresh\" content=\"0;url=read.php?no=".$_GET['no']."\">\n";
?>