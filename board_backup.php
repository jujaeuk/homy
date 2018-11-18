<?
include "lib.php";
include "data/db_access.php";
$fp=fopen("data/board.txt","w");
$que="select * from ".$homename."_board order by time";
$result=mysqli_query($connect,$que);
$i=0;
while(@$check=mysqli_fetch_object($result)){
  fwrite($fp,"no. ".$check->no." ".$check->title." (".$check->writer.", ".date("Y-m-d H:i",$check->time)."\n");
  fwrite($fp,$check->content.")\n");
  if($check->upper!=0){
    $que="select * from ".$homename."_board where no=$check->upper";
    $check_upper=mysqli_fetch_object(mysqli_query($connect,$que));
    fwrite($fp,"upper: no.".$check_upper->no." ".$check_upper->title."\n");
  }
  $que="select * from ".$homename."_board where upper=".$check->no;
  $result_lower=mysqli_query($connect,$que);
  if(mysqli_num_rows($result_lower)>0){
    fwrite($fp,"lower:\n");
    while($check_lower=mysqli_fetch_object($result_lower)){
      fwrite($fp,"no .".$check_lower->no." ".$check_lower->title."\n");
    }
  }
}
fclose($fp);
include "head.php";
echo "<article>\n";
echo "<a href=data/board.txt>board.txt</a>\n";
echo "</article></div></div></body></html>\n";
?>
