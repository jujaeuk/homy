<?
include "lib.php";
include "data/db_access.php";
$que="delete from ".$homename."_log where no=".$_GET['no'];
mysqli_query($connect,$que);
?>
<meta http-equiv="refresh" content="0;url=log.php">
