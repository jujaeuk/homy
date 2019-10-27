<?
function time_num($date){
  $time_num->year=date("Y",$date);
  $time_num->month=date("m",$date);
  $time_num->day=date("d",$date);
  $time_num->hour=date("H",$date);
  $time_num->min=date("i",$date);
  return $time_num;
}
function stat_week($start,$end,$homename,$connect,$cate_list){
  echo "<td style=\"vertical-align: top;border-right: 1px grey dotted;\">\n";
  $week_start=time_num(strtotime("-".($start)." days"));
  $week_end=time_num(strtotime("-".($end)." days"));
  $week_start_day=mktime(0,0,0,$week_start->month,$week_start->day,$week_start->year);
  $week_end_day=mktime(0,0,0,$week_end->month,$week_end->day,$week_end->year);
  $que="select * from ".$homename."_log where end is not null and start >= $week_start_day and start < $week_end_day order by start";
  $result=mysqli_query($connect,$que);
  while($check=mysqli_fetch_object($result)){
    $islist=0;
    $time=round(($check->end-$check->start)/60)-$check->loss;
    for($i=0;$i<sizeof($cate_list);$i++){
      if($cate_list[$i]==$check->category){
        $islist=1;
        $time_list[$i]+=$time;
      }
    }
    if($islist==0){
      $new=sizeof($cate_list);
      $cate_list[$new]=$check->category;
      $time_list[$new]=$time; 
    }
  }
  echo "<table>\n";
  echo "<tr><td colspan=2>".date("m/d", $week_start_day)." - ".date("m/d", $week_end_day-24*60*60)."</td></tr>\n";
  for($i=0;$i<sizeof($cate_list);$i++){
    echo "<tr><td>".$cate_list[$i]."</td><td align=right>".$time_list[$i]."</td></tr>\n";
  }
  echo "</table>\n";
  echo "</td>\n";
  return $cate_list;
}
include "lib.php";
include "data/db_access.php";
include "head.php";
if(!file_exists('data')) echo "<article>not installed <a href=install.php>install</a><article>\n";
elseif(!isset($_COOKIE['user'])) include "login.php";
else{
  echo "user: ".$_COOKIE['user']." (<a href=logout.php>logout</a>)\n";
  echo "<article>\n";
  echo "<h3>log stat</h3>\n";
  $today=time();
  $time_num=time_num($today);
  $weekday=date("w",$today);
  if($weekday==0) $weekday=7;
  echo "<table><tr>\n";
  $cate_list=stat_week($weekday-1,$weekday-8,$homename,$connect,$cate_list);
  $cate_list=stat_week($weekday+6,$weekday-1,$homename,$connect,$cate_list);
  $cate_list=stat_week($weekday+13,$weekday+6,$homename,$connect,$cate_list);
  if(!is_mobile()) stat_week($weekday+20,$weekday+13,$homename,$connect,$cate_list);
  echo "</tr></table>\n";
  echo "</article>\n";
  include "log_aside.php";
}
?>
</div></div>
</body>
</html>
