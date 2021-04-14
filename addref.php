<?
include "lib.php";
include "data/db_access.php";
include "head.php";
?>
<div id=container <? if(!is_mobile()) echo "style=\"display: flex;\"";?>>
<div id=main>
<?
echo "<h2>참조 추가</h2>\n";
echo "<form method=post action=addref_ok.php>\n";
echo "origin : <input class=addref type=text name=origin value=".$_GET['no']."> / ref. : <input class=addref type=text name=ref>\n";
echo "<input type=submit value=add></form>\n";
echo "</div>\n";
echo "<div id=menu>\n";
?>
</div></div>
</body>
</html>
