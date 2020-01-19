<?
if(!file_exists('data')){
  exit("not installed <a href=install.php>install</a></div></div></body></html>");
}
elseif(!isset($_COOKIE['user'])){
  echo "<div id=container";
  if(!is_mobile()) echo " style=\"display: flex;\"";
  echo "><div id=main>\n";
  echo "<form method=post action=login_ok.php>\n";
  echo "<table><tr><td>user</td><td><input type=text name=username></td></tr>".
    "<tr><td>password</td><td><input type=password name=password></td></tr>".
    "<tr><td colspan=2 align=center><input type=submit value=login></td></tr></table></form>\n";
  exit("</div></div></body></html>");
}
else echo "user: ".$_COOKIE['user']." (<a href=password.php>password</a> <a href=logout.php>logout</a>)\n";
?>
