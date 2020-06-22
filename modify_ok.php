<?
include "lib.php";
include "data/db_access.php";
if(!$_POST['title']) $_POST['title']="무제";
$que="update ".$homename."_board set title='".htmlentities($_POST['title'],ENT_QUOTES)."', content='".htmlentities($_POST['content'],ENT_QUOTES)."', upper=".$_POST['upper'].", order_lower='".$_POST['order_lower']."', timeline=".$_POST['timeline']." where no=".$_POST['no'];

mysqli_query($connect,$que);
echo "<meta http-equiv=\"refresh\" content=\"0;url=read.php?no=".$_POST['no']."\">\n";
?>
