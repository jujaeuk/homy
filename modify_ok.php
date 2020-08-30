<?
include "lib.php";
include "data/db_access.php";
if($_POST['fdel']=="ok"){
  $que="select * from ".$homename."_board where no=".$_POST['no'];
  $check=mysqli_fetch_object(mysqli_query($connect,$que));
  unlink("files/".$check->file);
  $que="update ".$homename."_board set file='' where no=".$_POST['no'];
  mysqli_query($connect,$que);
}
if(isset($_FILES)){
  copy($_FILES['file']['tmp_name'],"files/".$_FILES['file']['name']);
  $que="update ".$homename."_board set file='".$_FILES['file']['name']."' where no=".$_POST['no'];
  mysqli_query($connect,$que);
}
 
if(!$_POST['title']) $_POST['title']="무제";
$que="update ".$homename."_board set title='".htmlentities($_POST['title'],ENT_QUOTES)."', content='".htmlentities($_POST['content'],ENT_QUOTES)."', upper=".$_POST['upper'].", order_lower='".$_POST['order_lower']."'  where no=".$_POST['no'];

mysqli_query($connect,$que);
echo "<meta http-equiv=\"refresh\" content=\"0;url=read.php?no=".$_POST['no']."\">\n";
?>
