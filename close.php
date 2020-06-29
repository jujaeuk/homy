<?
include "lib.php";
include "data/db_access.php";
$que="update ".$homename."_board set showlist=0 where no=".$_GET['no'];
mysqli_query($connect,$que);
?>
<meta http-equiv="refresh" content="0;url=index.html?upper=<?echo $_GET['upper'];?>">
