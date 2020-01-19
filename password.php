<?
include "lib.php";
include "data/db_access.php";
include "head.php";
include "login.php";
?>
<div id=container <? if(!is_mobile()) echo "style=\"display: flex;\"";?>>
<div id=main>
<?
echo "<h2>password</h2>\n";
echo "<form method=post action=password_ok.php>\n";
echo "<table><tr><td>current password</td><td><input type=password name=pass_c></td></tr>\n";
echo "<tr><td>new password</td><td><input type=password name=pass_n1></td></tr>\n";
echo "<tr><td>retype new password</td><td><input type=password name=pass_n2></td></tr>\n";
echo "<tr><td colspan=2 align=center><input type=submit value=change></td></tr></table>\n";
echo "</form>\n";
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
