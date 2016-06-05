<?php
/*
PhpMyNews
Auteur : Raphael PRENCIPE
Email : raphaelp@live.be
Cr�ation : 3/11/2009
*/

session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin'] == CODE)
{
	include('./includes/class.news.php');

	$news = new PhpMyNews();
	
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>News (d&eacute;mo)</title>
	   	<link href="./css/style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>';

	$news->displayGestion();
	
	echo '</body></html>';
}
else
{
	echo 'Vous ne pouvez pas afficher cette page !';
	exit();
}
?>
<?php /*?> <?php echo CODE;
			echo $db_hote ;		
			echo $db_nom ;
			echo $db_utilisateur ;
			echo $db_passe ;
			echo $db_table ;
	
	?>
<?php */?>