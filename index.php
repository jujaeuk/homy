<?
function subcontents($connect,$homename,$upper,$level){
  $que="select * from ".$homename."_board where no=$upper";
  $check_upper=mysqli_fetch_object(mysqli_query($connect,$que));
  if(!$check_upper->order_lower) $order_lower="title";
  else $order_lower=$check_upper->order_lower;
  $que="select * from ".$homename."_board where upper=$upper order by $order_lower";
  $result=mysqli_query($connect,$que);
  if(mysqli_num_rows($result)){
    echo "<ul>\n";
    while(@$check=mysqli_fetch_object($result)){
      echo "<li><a href=read.php?no=$check->no>$check->title</a>\n";
      $que="select * from ".$homename."_board where upper=$check->no";
      $check_sub=mysqli_fetch_object(mysqli_query($connect,$que));
      $que="select * from ".$homename."_users where name='".$_COOKIE['user']."'";
      @$check_user=mysqli_fetch_object(mysqli_query($connect,$que));
      if($check_user->no==1) echo "<a href=write.php?upper=$check->no>+</a>\n";
      if($level<1) subcontents($connect,$homename,$check->no,$level+1);
      echo "</li>\n";
    }
    echo "</ul>\n";
  }
}
include "lib.php";
include "data/db_access.php";
include "head.php";
if(is_mobile()) echo "<div id=containerm><div id=mainm>";
else echo "<div id=container><div id=main>\n";
echo "<h2>대문</h2>\n";
echo "<article>\n";
$que="select * from ".$homename."_board order by time desc limit 1";
$result=mysqli_query($connect,$que);
if(@$check=mysqli_fetch_object($result)){
  echo "<h3>새글: ".$check->title."</h3>\n";
  echo "<p>".date("Y-m-d H:i",$check->time)."\n";
  echo "</p>\n";
  echo "<p>\n";
  $que_file="select * from ".$homename."_files where boardno=".$check->no." limit 1";
  $result_file=mysqli_query($connect,$que_file);
  while(@$check_file=mysqli_fetch_object($result_file)){
    $fileinfo=pathinfo($check_file->filename);
    $ext=$fileinfo['extension'];
    $pic_ext=["JPG","jpg","PNG","png","JPEG","jpeg"];
    if(in_array($ext,$pic_ext)) echo "<img src=files/".$check_file->filename." width=100%>\n";
  }
  echo nl2br(iconv_substr($check->content,0,140,"utf-8"))."...<a href=read.php?no=$check->no>읽기로 이동</a></p>\n";
  $que_file="select * from ".$homename."_files where boardno=".$check->no;
  $result_file=mysqli_query($connect,$que_file);
}
echo "</article>\n";
echo "<h3>목차</h3>\n";
subcontents($connect,$homename,0,0);
echo "</div>\n";
if(is_mobile()) echo "<div id=menum>\n";
else echo "<div id=menu>\n";
$que="select * from ".$homename."_users where name='".$_COOKIE['user']."'";
@$check=mysqli_fetch_object(mysqli_query($connect,$que));
if($check->no==1){
  echo "<ul>\n";
  $que="show tables like '".$homename."_board'";
  $result=mysqli_query($connect,$que);
  if(mysqli_num_rows($result)>0){
    echo "<li><a href=write.php?upper=0>글쓰기</a></li>\n";
    echo "<li><a href=board_backup.php>게시판 백업</a></li>\n";
  }
  echo "<li><a href=users.php>사용자 목록</a></li>\n";
  echo "<li><a href=admin_table.php>테이블 관리</a></li>\n";
  echo "<li><a href=uninstall.php>홈페이지 삭제</a></li>\n";
}
echo "</ul>\n";
?>
</div></div>
</body>
</html>
