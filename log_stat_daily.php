<?
function time_num($date){
  $time_num = new \ stdClass();
  $time_num->year=date("Y",$date);
  $time_num->month=date("m",$date);
  $time_num->day=date("d",$date);
  $time_num->hour=date("H",$date);
  $time_num->min=date("i",$date);
  return $time_num;
}
function stat_day($day,$homename,$connect,$cate_list){
  echo "<td style=\"vertical-align: top;border-right: 1px grey dotted;\">\n";
  $today=time()-$day*24*60*60;
  $time_num=time_num($today);
  $the_day=mktime(0,0,0,$time_num->month,$time_num->day,$time_num->year);
  $que="select * from ".$homename."_log where end is not null and start >= $the_day and start < $the_day+24*60*60 order by start";
  $result=mysqli_query($connect,$que);
  while($check=mysqli_fetch_object($result)){
    $islist=0;
    $time=round(($check->end-$check->start)/60)-$check->loss;
    if(is_array($cate_list)||is_object($cate_list)){
      for($i=0;$i<sizeof($cate_list);$i++){
        if($cate_list[$i]==$check->category){
          $islist=1;
          $time_list[$i]+=$time;
        }
      }
    }
    if($islist==0){
      if(is_array($cate_list)||is_object($cate_list)) $new=sizeof($cate_list);
      $cate_list[$new]=$check->category;
      $time_list[$new]=$time; 
    }
  }
  echo "<table>\n";
  echo "<tr><td colspan=2>".date("m/d", $the_day)."</td></tr>\n";
  for($i=0;$i<sizeof($cate_list);$i++){
    if($cate_list[$i]!="기록") echo "<tr><td>".$cate_list[$i]."</td><td align=right>".$time_list[$i]."</td></tr>\n";
  }
  echo "</table>\n";
  echo "</td>\n";
  return $cate_list;
}
include "lib.php";
include "data/db_access.php";
include "head.php";
if(is_mobile()) echo "<div id=containerm><div id=mainm>";
else echo "<div id=container><div id=main>\n";
echo "<h2>log stat daily</h2>\n";
echo "<table><tr>\n";
for($i=0;$i<6;$i++){
  if((!is_mobile())||$i<4) $cate_list=stat_day($i,$homename,$connect,$cate_list);
}
echo "</tr></table>\n";
include "log_menu.php";
?>
</div></div>
</body>
</html>
