<?
include "lib.php";
include "data/db_access.php";
include "head.php";
function subcontents($connect,$upper){
  $que="select * from ju_board2 where upper=$upper order by title";
  $result=mysqli_query($connect,$que);
  echo "<a href=write.php?upper=$upper>+</a>\n";
  if(mysqli_num_rows($result)){
    echo "<ul>\n";
    while(@$check=mysqli_fetch_object($result)){
      echo "<li><a href=read.php?no=$check->no>$check->title</a>\n";
      subcontents($connect,$check->no);
      echo "</li>\n";
    }
    echo "</ul>\n";
  }
}
echo "<article>\n";
subcontents($connect,0);
echo "</article>\n";
?>
</div></div>
</body></html>
