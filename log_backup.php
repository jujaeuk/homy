<?
include "lib.php";
include "data/db_access.php";
$now=time();
$fpc=fopen("data/log.csv","w");
$fpt=fopen("data/log.txt","w");
fwrite($fpc,"no,start,end,category,content\n");
$que="select * from ".$homename."_log order by start";
$result=mysqli_query($connect,$que);
$i=0;
while(@$check=mysqli_fetch_object($result)){
  fwrite($fpc, $check->no.",".date("Y-m-d H:i:s",$check->start).",".date("Y-m-d H:i:s",$check->end).",\"".$check->category."\",\"".$check->content."\"\n");
  if($date!=date("Ymd",$check->start)){
    if($i!=0) fwrite($fpt,"\n");
    fwrite($fpt,date("Ymd.D",$check->start)."\n");
  }
  fwrite($fpt,date("Hi",$check->start)."-".date("Hi",$check->end)." (".$check->category.") ".$check->content."\n");
  $i++;
  $date=date("Ymd",$check->start);
}
fclose($fpc);
fclose($fpt);

include "head.php";
echo "<article>\n";
echo "<a href=data/log.csv>log.csv</a> <a href=data/log.txt>log.txt</a>\n";
echo "</article></div></div></body></html>\n";
?>
