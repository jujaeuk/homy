<!doctype html>
<html>
<head>
<title>Jaeuk Ju</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <h1>wonderful world, beautiful life</h1>
  </header>
<?
  if(!file_exists("data")){
    echo "<article>this home is not installed<br><a href=install.php>install</a></article>\n";
  }
?>
