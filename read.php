<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(is_mobile()) echo "<div id=containerm><div id=mainm>";
else echo "<div id=container><div id=main>\n";
if(isset($_GET['no'])) $que="select * from ".$homename."_board where no=".$_GET['no'];
else $que="select * from ".$homename."_board order by time desc limit 1";
@$check=mysqli_fetch_object(mysqli_query($connect,$que));
echo "<article>\n";
echo "<h4>".$check->title."</h4>\n";
echo "<p>by ".$check->writer." ".date("Y-m-d H:i",$check->time)." <a href=write.php?upper=$check->no>아랫글쓰기</a>";
if($_COOKIE['user']==$check->writer) echo " <a href=modify.php?no=$check->no>수정</a> <a href=delete.php?no=$check->no&upper=$check->upper>삭제</a>";
echo "</p>\n";
echo "<p>".nl2br($check->content)."</p>\n";

$i=0;
$que="select * from ".$homename."_files where boardno=".$check->no;
$result_file=mysqli_query($connect,$que);
while(@$check_file=mysqli_fetch_object($result_file)){
	if($i==0) echo "<p>file:<br>\n";
	$temp=explode(".",$check_file->filename);
	$ext=end($temp);
	if($ext=="py"||$ext=="txt"){
		$fp=fopen("files/".$check_file->filename,"r");
    	echo "<pre class=code>\n";
    	while(!feof($fp)) echo fgets($fp);
    	echo "</pre>\n";
    	fclose($fp);
	}
	$pic_ext=["JPG","jpg","PNG","png","JPEG","jpeg"];
   	if(in_array($ext,$pic_ext)) echo "<img src=files/".$check_file->filename." width=100%>\n";
	echo "<a href=\"files/".$check_file->filename."\">".$check_file->filename."</a><br>\n";
	$i++;
}
if($i>0) echo "</p>\n";

echo "<h4>목차</h4>\n";
$que="select * from ".$homename."_board where upper=".$check->no." order by $check->order_lower";
$result=mysqli_query($connect,$que);
$i=0;
while(@$check_sub=mysqli_fetch_object($result)){
  if($i==0) echo "<ul>\n";
  echo "<li><a href=read.php?no=$check_sub->no>$check_sub->title</a>\n";
  if($check_sub->subno>1) echo "<a href=subup.php?no=$check->no&sub=$check_sub->no&subno=$check_sub->subno>^</a>\n";
  echo "</li>\n";
  $i++;
}
if($i>0) echo "</ul>\n";

echo "</article>\n";
echo "</div>\n";

if(is_mobile()) echo "<div id=menum>\n";
else echo "<div id=menu>\n";
if($check->upper!=0){ 
  echo "<h4>윗글</h4>\n";
  $que="select * from ".$homename."_board where no=$check->upper";
  @$check_upper=mysqli_fetch_object(mysqli_query($connect,$que));
  echo "<ul><li><a href=read.php?no=$check->upper>$check_upper->title</a></li></ul>\n";
}
echo "<h4>옆글</h4>\n";
$que="select * from ".$homename."_board where no=$check->upper";
$check_upper=mysqli_fetch_object(mysqli_query($connect,$que));
if(!$check_upper->order_lower) $order_lower="subno";
else $order_lower=$check_upper->order_lower;
$que="select * from ".$homename."_board where upper=$check->upper order by $order_lower";
$result_peer=mysqli_query($connect,$que);
$i=0;
while(@$check_peer=mysqli_fetch_object($result_peer)){
  if($i==0) echo "<ul>\n";
  if($check_peer->no==$check->no) echo "<li>$check_peer->title</li>\n";
  else echo "<li><a href=read.php?no=$check_peer->no>$check_peer->title</a></li>\n";
  $i++;
}
if($i>0) echo "</ul>\n";
?>
</div></div>
</body>
</html>
