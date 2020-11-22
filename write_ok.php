<?
include "lib.php";
include "data/db_access.php";
if(isset($_FILES)) copy($_FILES['file']['tmp_name'],"files/".$_FILES['file']['name']);
$que="insert into ".$homename."_board (title,time,writer,content,upper,order_lower,file) values('".htmlentities($_POST['title'],ENT_QUOTES)."',".time().",'".$_POST['writer']."','".htmlentities($_POST['content'],ENT_QUOTES)."',".$_POST['upper'].",'".$_POST['order_lower']."','".$_FILES['file']['name']."')";
mysqli_query($connect,$que);

if($_POST['upper']!=0) echo "<meta http-equiv=\"refresh\" content=\"0;url=read.php?no=".$_POST['upper']."\">\n";
else echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">\n";
?>
