<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(!file_exists('data')) echo "<article>not installed <a href=install.php>install</a></article>\n";
elseif(!isset($_COOKIE['user'])) include "login.php";
else{
  $now=time();
  $fpc=fopen("data/log.csv","w");
  $fpt=fopen("data/log.txt","w");
  fwrite($fpc,"no,start,end,loss,category,content\n");
  $que="select * from ".$homename."_log order by start";
  $result=mysqli_query($connect,$que);
  $i=0;
  while(@$check=mysqli_fetch_object($result)){
    fwrite($fpc, $check->no.",".date("Y-m-d H:i:s",$check->start).",".date("Y-m-d H:i:s",$check->end).",".$check->loss.",\"".$check->category."\",\"".html_entity_decode($check->content,ENT_QUOTES)."\"\n");
    if($date!=date("Ymd",$check->start)){
      if($i!=0) fwrite($fpt,"\n");
      fwrite($fpt,date("Ymd.D",$check->start)."\n");
    }
    fwrite($fpt,date("Hi",$check->start));
    if($check->end>0){
      fwrite($fpt,"-".date("Hi",$check->end));
      if($check->loss>0) fwrite($fpt, " (-:$check->loss)");
    }
    fwrite($fpt," (".$check->category.") ".html_entity_decode($check->content,ENT_QUOTES)."\n");
    $i++;
    $date=date("Ymd",$check->start);
  }
  fclose($fpc);
  fclose($fpt);

  echo "<article>\n";
  echo "<a href=data/log.csv>log.csv</a> <a href=data/log.txt>log.txt</a>\n";
  echo "</article>\n";
  include "log_aside.php";
}
?>
</div></div>
</body>
</html>
