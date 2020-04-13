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
  echo "user <input type=text name=username class=login";
  if(is_mobile()) echo " size=10";
  echo "> password <input type=password name=password class=login";
  if(is_mobile()) echo " size=10";
  echo "> <input type=submit value=login>\n";
  echo "</form></div></header></body></html>\n";
  exit;
}
else echo "user: ".$_COOKIE['user']." (<a href=password.php class=header>password</a> <a href=logout.php class=header>logout</a>) <a href=log.php class=header>log</a> | <a href=board.php class=header>board</a>";
?>
</div></header>
