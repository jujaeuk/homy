<?
include "lib.php";
include "data/db_access.php";
$que="insert into ".$homename."_board (title,time,writer,content,upper) values('".$_POST['title']."',".time().",'".$_POST['writer']."','".htmlentities($_POST['content'],ENT_QUOTES)."',".$_POST['upper'].")";
mysqli_query($connect,$que);
echo "<meta http-equiv=\"refresh\" content=\"0;url=.\">\n";
?>
