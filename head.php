<!doctype html>
<html>
<head>
<title>homy</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header><div id=head><a href=.><img src=homy_logo.png align=left></a>
<?
if(!isset($_COOKIE['user'])){
  echo "<form method=post action=login_ok.php>\n";
  if(is_mobile()){
    if(get_platform()=="Android"){
      echo "user <input type=text name=username class=login size=10>\n";
      echo "password <input type=password name=password class=login size=10>\n";
      echo "<input type=submit value=login>\n";
      echo "</form></div></header></body></html>\n";
    }
    else{
      echo "<table><tr><td>user</td><td><input type=text name=username class=login></td></tr>\n";
      echo "<tr><td>password</td><td><input type=password name=password class=login></td></tr>\n";
  echo "<tr><td colspan=2 align=center><input type=submit value=login><td></tr></table>\n";
  echo "</form></div></header></body></html>\n";
    } 
  }
  else{
    echo "user <input type=text name=username class=login>\n";
    echo "password <input type=password name=password class=login>\n";
    echo "<input type=submit value=login>\n";
    echo "</form></div></header></body></html>\n";
  }
  exit;
}
else{
  if(get_platform()=="iPhone"){
    echo "<table><tr><td>user: ".$_COOKIE['user']."</td></tr>\n";
    echo "<tr><td>(<a href=password.php class=header>password</a> <a href=logout.php class=header>logout</a>) <a href=log.php class=header>log</a></td></tr></table>";
  }
  else echo "user: ".$_COOKIE['user']." (<a href=password.php class=header>password</a> <a href=logout.php class=header>logout</a>) <a href=log.php class=header>log</a>";
}
?>
</div>
<div id=topmenu>
<?
$que="select * from ".$homename."_board where upper=0";
$result=mysqli_query($connect,$que);
echo "&nbsp;&nbsp;<a href=board.php class=header>board</a>\n";
while($check=mysqli_fetch_object($result)){
  echo "| <a class=header href=board.php?upper=$check->no>$check->title</a>\n";
  $count++;
} 
?>
</div></header>
