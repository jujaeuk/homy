<?
include "lib.php";
include "data/db_access.php";
include "head.php";
function subcontents_backup($connect,$homename,$upper,$fp){
  $que="select * from ".$homename."_board where upper=$upper order by title";
  $result=mysqli_query($connect,$que);
  while(@$check=mysqli_fetch_object($result)){
    fwrite($fp, "no. ".$check->no." ".$check->title." (".date("Y-m-d H:i",$check->time).")\n".html_entity_decode($check->content,ENT_QUOTES)."\n\n");
    subcontents_backup($connect,$homename,$check->no,$fp);
  }
}
include "login.php";
?>
<div id=container <? if(!is_mobile()) echo "style=\"display: flex;\"";?>>
<div id=main>
<?
echo "<h2>board backup</h2>\n";
$fp=fopen("data/board_backup.txt","w");
subcontents_backup($connect,$homename,0,$fp);
fclose($fp);
echo "<a href=data/board_backup.txt>board_backup.txt</a>\n";
?>
</div></div>
</body>
</html>
