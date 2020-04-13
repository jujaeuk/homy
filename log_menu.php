<?
echo "</div>\n";
if(is_mobile()) echo "<div id=menum>\n";
else echo "<div id=menu>\n";
echo "<ul>\n";
echo "<li><a href=log_backup.php>backup</a></li>\n".
  "<li><a href=log_category_edit.php>edit category</a></li>\n".
  "<li><a href=log_stat.php>stat</a></li></ul>\n";
?>
