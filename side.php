<?
if(!isset($_COOKIE['user'])){
  echo "<form method=post action=login_ok.php>\n";
  echo "<table><tr><td>user</td><td><input class=login type=text name=username></td></tr>\n";
  echo "<tr><td>password</td><td><input class=login type=password name=password></td></tr>\n";
  echo "<tr><td colspan=2><input type=submit value=login><a href=join.php>join</a></td></tr></table>\n";
  echo "</form>\n";
}
else{
  echo "user: ".$_COOKIE['user']."<br>\n";
  echo "<a href=logout.php>logout</a>\n";
  echo "<ul>\n";
  echo "<li><a href=.>home</a></li>\n";
  echo "<li><a href=write.php>write</a></li>\n";
  echo "<li><a href=tree.php>tree</a></li>\n";
  echo "</ul>\n";
}
?>
