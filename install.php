<?
include "lib.php";
include "head_join.php";
?>
<div id=container><div id=main>
<h2>install</h2>
<form method=post action=install_ok.php>
<table>
<tr><td colspan=2><input type=radio name=install value='table'>full(table)
<input type=radio name=install value='skin' checked>skin only</td><tr>
<tr><td>home name</td><td><input type=text name=homename></td></tr>
<tr><td>host</td><td><input type=text name=host></td></tr>
<tr><td>user</td><td><input type=text name=user></td></tr>
<tr><td>password</td><td><input type=password name=password></td></tr>
<tr><td>db</td><td><input type=text name=db></td></tr>
<tr><td colspan=2 align=center><input type=submit value=install></td><tr>
</table>
</form>
</div><div id=menu></div>
</body>
</html>
