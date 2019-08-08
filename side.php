<?
if(!isset($_COOKIE['user'])){
  echo "<form method=post action=login_ok.php>\n";
  echo "<table><tr><td>user</td><td><input class=login type=text name=username></td></tr>\n";
  echo "<tr><td>password</td><td><input class=login type=password name=password></td></tr>\n";
  echo "<tr><td colspan=2><input type=submit value=login> <a href=join.php>join</a></td></tr></table>\n";
  echo "</form>\n";
}
else{
  $que="select * from ".$homename."_users where name='".$_COOKIE['user']."'";
  $check=mysqli_fetch_object(mysqli_query($connect,$que));
  if($check->no==1) $admin="yes";

  echo "user: ".$_COOKIE['user']."\n";
  echo "<a href=logout.php>logout</a>\n";
  echo "<ul>\n";
  echo "<li class=menu><a href=.>home</a></li>\n";
  echo "<li class=menu><a href=tree.php>tree</a></li>\n";
  echo "<li class=menu><a href=list.php>list</a></li>\n";
  echo "<li class=menu><a href=write.php>write</a></li>\n";
  if($admin=="yes"){
    echo "<li class=menu><a href=board_backup.php>board backup</a></li>\n";
    echo "<li class=menu><a href=board_reset.php>board reset</a></li>\n";
    echo "<li class=menu><a href=log.php>log</a></li>\n";
    echo "<li class=menu><a href=log_stat.php>log stat</a></li>\n";
    echo "<li class=menu><a href=users.php>users</a></li>\n";
  }
  echo "</ul>\n";
}
?>
