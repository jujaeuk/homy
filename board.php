<?
include "lib.php";
include "data/db_access.php";
include "head.php";
if(is_mobile()) echo "<div id=containerm><div id=mainm>";
else echo "<div id=container><div id=main>\n";
echo "<h2>index</h2>\n";
subcontents($connect,$homename,0,0);
echo "</div>\n";
if(is_mobile()) echo "<div id=menum>\n";
else echo "<div id=menu>\n";
echo "<ul>\n";
echo "<li><a href=write.php?upper=0>write</a></li>\n";
echo "<li><a href=board_backup.php>board backup</a></li>\n";
echo "<li><a href=users.php>users</a></li>\n";
echo "</ul>\n";
?>
</div></div>
</body>
</html>