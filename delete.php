<?
include "lib.php";
include "data/db_access.php";
include "head.php";
echo "<div id=container";
if(!is_mobile()) echo " style=\"display: flex;\"";
echo "><div id=main>\n";

$que="select * from ".$homename."_board where upper=".$_GET['no'];
$result=mysqli_query($connect,$que);
if(mysqli_num_rows($result)){
  echo "ERROR: related posts exist\n";
  echo "<a href=read.php?no=".$_GET['no'].">back</a>\n";
  echo "</div></div></body></html>\n";
}
else{
  $que="select * from ".$homename."_board where no=".$_GET['no'];
  $check=mysqli_fetch_object(mysqli_query($connect,$que));
  echo "delete '".$check->title."' (".date("Ymd H:i",$check->time).") are you sure? <a href=delete_ok.php?no=".$_GET['no']."&upper=".$_GET['upper'].">yes</a> <a href=read.php?no=".$_GET['no'].">no</a>\n";
}
?>
