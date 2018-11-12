<?
$fp=fopen("data/homename.txt","r");
$homename=trim(fgets($fp));
fclose($fp);

function is_mobile(){
	if(preg_match('/(iPhone|Android)/i',$_SERVER['HTTP_USER_AGENT'])) return true;
	else return false;
}
include "data/db_access.php";
?>
