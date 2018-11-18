<?
include "lib.php";
include "data/db_access.php";
$now=time();
$fp=fopen("data/board.txt","w");
$que="select * from ".$homename."_board order by time";
$result=mysqli_query($connect,$que);
$i=0;
while(@$check=mysqli_fetch_object($result)){
  fwrite($fp,"no. ".$check->no." ".$check->title." (".$check->writer.", ".date("Y-m-d H:i",$check->time)."\n");
  fwrite($fp,$check->content."\n");
  $que="select * from ".$homename."_
}
fclose($fpc);
fclose($fpt);
include "head.php";
echo "<article>\n";
echo "<a href=data/log.csv>log.csv</a> <a href=data/log.txt>log.txt</a>\n";
echo "</article></div></div></body></html>\n";
?>
