<?
include "lib.php";
include "data/db_access.php";
include "head.php";
echo "<article>\n";
if(isset($_GET['page'])) $page=$_GET['page'];
else $page=1;

$que="select * from ".$homename."_board";
$result=mysqli_query($connect,$que);
$size=mysqli_num_rows($result);
$rownum=15;
$que="select * from ".$homename."_board order by time desc limit ".($rownum*$page);
$result=mysqli_query($connect,$que);

echo "<table>\n";
$i=0;
while(@$check=mysqli_fetch_object($result)){
  $i++;
  if($i>$rownum*($page-1)) echo "<tr><td class=content><a href=read.php?no=$check->no>$check->title / $check->writer (".date("Y-m-d H:i",$check->time).")</a></td></tr>\n";
}
echo "<tr><td class=content>\n";
if($page>1) echo "<a href=list.php?page=".($page-1).">prev</a>\n";
else echo "prev\n";
if(($rownum*$page)<$size) echo "<a href=list.php?page=".($page+1).">next</a>\n";
else echo "next\n";
echo "</td></tr>\n";
echo "</table>\n";

echo "</article>\n";
?>
</div></div>
</body></html>
