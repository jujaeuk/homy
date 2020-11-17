<?
if(file_exists("data/homename.txt")){
  $fp=fopen("data/homename.txt","r");
  $homename=trim(fgets($fp));
  fclose($fp);
}

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
?>
