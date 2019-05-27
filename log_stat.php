<?
include "lib.php";
include "data/db_access.php";
include "head.php";
echo "<article>\n";
$today=time();
function time_num($date){
  $time_num->year=date("Y",$date);
  $time_num->month=date("m",$date);
  $time_num->day=date("d",$date);
  $time_num->hour=date("H",$date);
  $time_num->min=date("i",$date);
  return $time_num;
}
$time_num=time_num($today);
$weekday=date("w",$today);

echo "<table><tr>\n";
echo "<td class=log_stat>\n";
$week_start=time_num(strtotime("-".($weekday-1)." days"));
$week_end=time_num(strtotime("-".($weekday-8)." days"));
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
  echo "<tr><td>".$cate_list[$i]."</td><td class=log_stat_time>".$time_list[$i]."</td></tr>\n";
}
echo "</table>\n";
echo "</td>\n";

echo "<td class=log_stat>\n";
$week_start=time_num(strtotime("-".($weekday+6)." days"));
$week_end=time_num(strtotime("-".($weekday-1)." days"));
$week_start_day=mktime(0,0,0,$week_start->month,$week_start->day,$week_start->year);
$week_end_day=mktime(0,0,0,$week_end->month,$week_end->day,$week_end->year);
$que="select * from ".$homename."_log where end is not null and start >= $week_start_day and start < $week_end_day order by start";
$result=mysqli_query($connect,$que);

for($i=0;$i<sizeof($time_list);$i++){
  $time_list[$i]=0;
}

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
  echo "<tr><td>".$cate_list[$i]."</td><td class=log_stat_time>".$time_list[$i]."</td></tr>\n";
}
echo "</table>\n";
echo "</td>\n";

echo "<td class=log_stat>\n";
$week_start=time_num(strtotime("-".($weekday+13)." days"));
$week_end=time_num(strtotime("-".($weekday+6)." days"));
$week_start_day=mktime(0,0,0,$week_start->month,$week_start->day,$week_start->year);
$week_end_day=mktime(0,0,0,$week_end->month,$week_end->day,$week_end->year);
$que="select * from ".$homename."_log where end is not null and start >= $week_start_day and start < $week_end_day order by start";
$result=mysqli_query($connect,$que);

for($i=0;$i<sizeof($time_list);$i++){
  $time_list[$i]=0;
}

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
  echo "<tr><td>".$cate_list[$i]."</td><td class=log_stat_time>".$time_list[$i]."</td></tr>\n";
}
echo "</table>\n";
echo "</td>\n";

echo "<td class=log_stat>\n";
$week_start=time_num(strtotime("-".($weekday+20)." days"));
$week_end=time_num(strtotime("-".($weekday+13)." days"));
$week_start_day=mktime(0,0,0,$week_start->month,$week_start->day,$week_start->year);
$week_end_day=mktime(0,0,0,$week_end->month,$week_end->day,$week_end->year);
$que="select * from ".$homename."_log where end is not null and start >= $week_start_day and start < $week_end_day order by start";
$result=mysqli_query($connect,$que);

for($i=0;$i<sizeof($time_list);$i++){
  $time_list[$i]=0;
}

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
  echo "<tr><td>".$cate_list[$i]."</td><td class=log_stat_time>".$time_list[$i]."</td></tr>\n";
}
echo "</table>\n";
echo "</td>\n";

echo "</tr></table>\n";
echo "</article>\n";
?>
</div></div>
</body></html>
