<?
include "lib.php";
include "head_join.php";
?>
<div id=container <? if(!is_mobile()) echo "style=\"display: flex;\"";?>>
<div id=main>
<h2>join</h2>
<form method=post action=join_ok.php>
<table>
<tr><td>username</td><td><input type=text name=username></td></tr>
<tr><td>password</td><td><input type=password name=password1></td></tr>
<tr><td>retype password</td><td><input type=password name=password2></td></tr>
<tr><td colspan=2 align=center><input type=submit value=join></td></tr>
</table>
</form>
</div></div>
</body></html>
