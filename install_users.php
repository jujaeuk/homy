<?
include "db_access.php";
$que="create table ju_users(
        no int not null auto_increment,
        unique(no),
        primary key(no),
        name char(32),
        password char(32))";
mysqli_query($connect,$que);
include "head.php";
echo "table users created\n";
?>
</body></html>
