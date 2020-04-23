<?
include "lib.php";
include "data/db_access.php";
if(!$_POST['title']) $_POST['title']="무제";
$que="insert into ".$homename."_board (title,time,writer,content,upper,order_lower) values('".htmlentities($_POST['title'],ENT_QUOTES)."',".time().",'".$_POST['writer']."','".htmlentities($_POST['content'],ENT_QUOTES)."',".$_POST['upper'].",'".$_POST['order_lower']."')";
mysqli_query($connect,$que);
echo "<meta http-equiv=\"refresh\" content=\"0;url=board.php\">\n";
?>
