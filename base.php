<?
include "lib.php";
include "data/db_access.php";
include "head.php";
include "login.php";
?>
<div id=container <? if(!is_mobile()) echo "style=\"display: flex;\"";?>>
<div id=main>
<?
echo "<h2>base</h2>\n";
echo "</div>\n";
echo "<div id=menu>\n";
echo "<ul>\n";
echo "<li>item 1</li>\n";
echo "<li>item 2</li>\n";
echo "</ul>\n";
?>
</div></div>
</body>
</html>
