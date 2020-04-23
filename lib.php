<?
$fp=fopen("data/homename.txt","r");
$homename=trim(fgets($fp));
fclose($fp);

function get_platform(){
  if(preg_match('/iPhone/i',$_SERVER['HTTP_USER_AGENT'])) return "iPhone";
  elseif(preg_match('/Android/i',$_SERVER['HTTP_USER_AGENT'])) return "Android";
  else if(preg_match('/Windows/i',$_SERVER['HTTP_USER_AGENT'])) return "Windows";
  else return "rest";
}
function is_mobile(){
  if(preg_match('/(iPhone|Android)/i',$_SERVER['HTTP_USER_AGENT'])) return true;
  else return false;
}

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
      if($check_sub){
        if($check->showlist==0) echo "<a href=open.php?no=$check->no>(open)</a>\n";
        else echo "<a href=close.php?no=$check->no>(close)</a>\n";
      }
      echo "<a href=write.php?upper=$check->no>+</a>\n";
      if($check->showlist==1) subcontents($connect,$homename,$check->no,$level);
      echo "</li>\n";
    }
    echo "</ul>\n";
  }
}
?>
