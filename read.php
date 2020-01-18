<?
include "lib.php";
include "data/db_access.php";
include "head.php";
include "login.php";
?>
<div id=container <? if(!is_mobile()) echo "style=\"display: flex;\"";?>>
<div id=main>
<?
echo "<h2>read</h2>\n";
if(isset($_GET['no'])) $que="select * from ".$homename."_board where no=".$_GET['no'];
else $que="select * from ".$homename."_board order by time desc limit 1";
@$check=mysqli_fetch_object(mysqli_query($connect,$que));
echo "<article>\n";
echo "<h3>".$check->title."</h3>\n";
echo "<p>".date("Y-m-d H:i",$check->time)." <a href=write.php?upper=$check->no>sub</a> ".
  "<a href=modify.php?no=$check->no>mod</a> <a href=delete.php?no=$check->no>del</a></p>\n";
echo "<p>".nl2br($check->content)."</p>\n";
echo "</article>\n";
echo "</div>\n";
echo "<div id=menu>\n";
echo "<h4>하위글</h4>\n";
$que="select * from ".$homename."_board where upper=".$check->no." order by time desc";
$result=mysqli_query($connect,$que);
$i=0;
while(@$check_sub=mysqli_fetch_object($result)){
  if($i==0) echo "<ul>\n";
  echo "<li><a href=read.php?no=$check_sub->no>$check_sub->title</a></li>\n";
  $i++;
}
if($i>0) echo "</ul>\n";
echo "<h4>동위글</h4>\n";
$que="select * from ".$homename."_board where upper=$check->upper order by time desc";
$result_peer=mysqli_query($connect,$que);
$i=0;
while(@$check_peer=mysqli_fetch_object($result_peer)){
  if($i==0) echo "<ul>\n";
  if($check_peer->no==$check->no) echo "<li>$check_peer->title</li>\n";
  else echo "<li><a href=read.php?no=$check_peer->no>$check_peer->title</a></li>\n";
  $i++;
}
if($i>0) echo "</ul>\n";
if($check->upper!=0){ 
  echo "<h4>상위글</h4>\n";
  $que="select * from ".$homename."_board where no=$check->upper";
  @$check_upper=mysqli_fetch_object(mysqli_query($connect,$que));
  echo "<ul><li><a href=read.php?no=$check->upper>$check_upper->title</a></li></ul>\n";
}
?>
</div></div>
</body>
</html>
