<?
include "lib.php";
$que="select * from ".$homename."_board where upper=".$_GET['no'];
$result=mysqli_query($connect,$que);
if(mysqli_num_rows($result)){
	include "head.php";
	echo "<article>\n";
	echo "ERROR: related posts exist\n";
	echo "<a href=read.php?no=".$_GET['no'].">back</a>\n";
	echo "</article></div></div></body></html>\n";
}
else{
	$que="delete from ".$homename."_board where no=".$_GET['no'];
	mysqli_query($connect,$que);
	echo "<meta http-equiv=\"refresh\" content=\"0;url=.\">\n";
}
?>
