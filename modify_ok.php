<?
include "lib.php";
include "data/db_access.php";
$que="update ".$homename."_board set title='".$_POST['title']."', content='".$_POST['content']."', upper=".$_POST['upper']." where no=".$_POST['no'];
mysqli_query($connect,$que);
echo "<meta http-equiv=\"refresh\" content=\"0;url=read.php?no=".$_POST['no']."\">\n";
?>
