<?
include "lib.php";
include "data/db_access.php";

$que="drop table ".$homename."_board";
mysqli_query($connect,$que);

$que="create table ".$homename."_board(
  no int not null auto_increment,
  unique(no),
  primary key(no),
  title char(128),
  time int,
  writer char(32),
  content text,
  upper int)";
mysqli_query($connect,$que);
?>
<meta http-equiv="refresh" content="0;url=.">
