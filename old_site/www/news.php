<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>News</title>
   	<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
error_reporting(0);

include('./includes/class.news.php');
include('/admin.php');

$news = new PhpMyNews();



$news->displayAll();

echo '<div style="text-align:center;"><a href="admin.php?admin=1999&amp;action=gestion_news">Gestion des news</a></div>';
echo '<br/>';
?>
</body>
</html>
