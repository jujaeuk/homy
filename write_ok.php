<?
include "lib.php";
$que="insert into ju_board (title,time,content,upper) values('".$_POST['title']."',".time().",'".$_POST['content']."',".$_POST['upper'].")";
mysqli_query($connect,$que);
echo "<meta http-equiv=\"refresh\" content=\"0;url=.\">\n";
?>
