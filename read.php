<?
include "lib.php";
include "data/db_access.php";
include "head.php";
echo "<article>\n";
if(isset($_COOKIE['user'])){
  $que="select * from ".$homename."_board where no=".$_GET['no'];
  @$check=mysqli_fetch_object(mysqli_query($connect,$que));
  echo "<table>\n";
  echo "<tr><td class=read>title</td><td class=read>".$check->title.
    " (".$check->writer.", ".date("Y-m-d i:s",$check->time).") <a href=write.php?upper=$check->no>re</a>\n";
  if($_COOKIE['user']==$check->writer){
    echo "<a href=modify.php?no=$check->no>mo</a>\n";
    echo "<a href=delete.php?no=$check->no>del</a>\n";
  }
  echo "</td></tr>\n";
  echo "<tr><td class=read>content</td><td class=read>".nl2br($check->content)."</td></tr>\n";
  echo "<tr><td class=read>upper</td><td class=read>\n";
  if($check->upper!=0){
    $que="select * from ".$homename."_board where no=$check->upper";
    $check_upper=mysqli_fetch_object(mysqli_query($connect,$que));
    echo "<a href=read.php?no=$check_upper->no>$check_upper->title</a>\n";
  }
  echo "</td></tr>\n";
  echo "<tr><td class=readb>lower</td><td class=readb>\n";
  $que="select * from ".$homename."_board where upper=".$_GET['no'];
  $result_lower=mysqli_query($connect,$que);
  if(mysqli_num_rows($result_lower)>0){
    echo "<ul>\n";
    while($check_lower=mysqli_fetch_object($result_lower)){
      echo "<li><a href=read.php?no=$check_lower->no>$check_lower->title</a></li>\n";
    }
    echo "</ul>\n";
  }
  echo "</td></tr>\n";
  echo "</table>\n";
}
else echo "login necessary\n";
echo "</article>\n";
?>
</div></div></body></html>
