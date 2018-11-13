<?
include "lib.php";
include "data/db_access.php";
include "head.php";
echo "<article>\n";
echo "<form method=post action=start.php>\n";
echo "<table>\n";
echo "<tr><td>category</td><td><select name=category>\n";
echo "<option value=>---</option>\n";
$que="select * from ju_log_category order by name";
$result=mysqli_query($connect,$que);
while(@$check=mysqli_fetch_object($result)){
	if($check->mom) echo "<option value=$check->no>$check->name</option>\n";
}
echo "</select> (<a href=log_category.php>edit</a>)</td></tr>\n";

echo "<tr><td>location</td><td><select name=location>\n";
echo "<option value=>---</option>\n";
$que="select * from ju_log_location order by name";
$result=mysqli_query($connect,$que);
while(@$check=mysqli_fetch_object($result)){
	if($check->mom==0) echo "<option value=$check->no>$check->name</option>\n";
}
echo "</select> (<a href=log_location.php>edit</a>)</td></tr>\n";

echo "<tr><td>book</td><td><select name=book>\n";
echo "<option value=>---</option>\n";
$que="select * from ju_book where end=0 order by name";
$result=mysqli_query($connect,$que);
while(@$check=mysqli_fetch_object($result)){
	echo "<option value='$check->no'>$check->name</option>\n";
}
echo "</select> (<a href=log_book.php>edit</a>)</td></tr></table>\n";
echo "content <input type=text class=log name=content>\n";
echo "<input type=submit value=start>\n";
echo "</form>\n";

// list
$rownum=15;

if(!isset($_GET['page'])) $page=1;
else $page=$_GET['page'];
if(($_POST['category_filter'])||($_GET['category_filter'])){
	if($_POST['category_filter']) $category_filter=$_POST['category_filter'];
	elseif($_GET['category_filter']) $category_filter=$_GET['category_filter'];
	$que="select * from ju_log_category where no=".$category_filter;
	$check=mysqli_fetch_object(mysqli_query($connect,$que));
	echo "list - category: $check->name<br>\n";
	$que="select * from ju_log where category=".$category_filter." order by start desc limit ".($rownum*$page);
}
else{
	echo "list - category: all<br>\n";
	$que="select * from ju_log order by start desc limit ".($rownum*$page);
}
$result=mysqli_query($connect,$que);
$i=0;
while(@$check=mysqli_fetch_object($result)){
	$i++;
	if($i>$rownum*($page-1)){
	echo date("ymd H:i - ",$check->start);
	if($check->end) echo date("H:i ",$check->end);
	else echo "<a href=end.php?no=$check->no>end</a>\n";
	if($check->loss) echo " [-$check->loss]\n";
	$que="select * from ju_log_category where no=$check->category";
	$result_category=mysqli_query($connect,$que);
	$check_category=mysqli_fetch_object($result_category);
	$que="select * from ju_log_location where no=$check->location";
	$result_location=mysqli_query($connect,$que);
	$check_location=mysqli_fetch_object($result_location);
	echo "($check_category->name,$check_location->name) $check->content (<a href=log_edit.php?no=$check->no>edit</a>)\n";
	if($check->book){
		$que="select * from ju_book where no=$check->book";
		$check_book=mysqli_fetch_object(mysqli_query($connect,$que));
		echo $check_book->name;
		$que="select * from ju_book_log where log=$check->no";
		$result_book_log=mysqli_query($connect,$que);
		if(@$check_book_log=mysqli_fetch_object($result_book_log)){
			echo " pp.$check_book_log->start-$check_book_log->end\n";
		}
		echo " (<a href=log_book_record.php?log=$check->no&book=$check->book>edit</a>)\n";
	}
	echo "<br>\n";
	}
}
$next=$page+1;
$prev=$page-1;
if($category_filter){
	$que="select * from ju_log where category=$category_filter order by start desc limit ".($rownum*$prev);
	if(mysqli_num_rows(mysqli_query($connect,$que)))
		echo "<a href=$PHP_SELF?page=$prev&category_filter=$category_filter>prev</a>\n";
	else echo "prev\n";
	$que="select * from ju_log where category=$category_filter order by start desc limit ".($rownum*$next);
	if(mysqli_num_rows(mysqli_query($connect,$que))>$rownum*($next-1))
		echo "<a href=$PHP_SELF?page=$next&category_filter=$category_filter>next</a>\n";
	else echo "next\n";
}
else{
	$que="select * from ju_log order by start desc limit ".($rownum*$prev);
	if(mysqli_num_rows(mysqli_query($connect,$que)))
		echo "<a href=$PHP_SELF?page=$prev>prev</a>\n";
	else echo "prev\n";
	$que="select * from ju_log order by start desc limit ".($rownum*$next);
	if(mysqli_num_rows(mysqli_query($connect,$que))>$rownum*($next-1))
		echo "<a href=$PHP_SELF?page=$next>next</a>\n";
	else echo "next\n";
}
echo "<form name=frm_filter method=post action=".$_SERVER['PHP_SELF'].">\n";
echo "category filter: <select name=category_filter onChange=\"JavaScript:document.frm_filter.submit();\">\n";
echo "<option value=>---</option>\n";
$que="select * from ju_log_category order by name";
$result=mysqli_query($connect,$que);
while(@$check=mysqli_fetch_object($result)){
	echo "<option value=$check->no>$check->name</option>\n";
}
echo "</select></form>\n";
echo "</article>\n";
?>
</div></div>
</body></html>

