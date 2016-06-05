<?php
/*
PhpMyNews
Auteur : Raphael PRENCIPE
Email : raphaelp@live.be
Création : 3/11/2009
*/
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin'] == CODE)
{
	require('./includes/class.news.php');

	if(is_numeric($_GET['id']))
	{
		$news = new PhpMyNews();
		
		if($news->deleteNews($_GET['id']))
		{
			echo "Suppression effectu&eacute;e avec succ&egrave;s: ".intval($_GET['id']);
		}
		else
		{
			echo "Erreur lors de la suppression!";
		}
	}
}
else
{
	echo 'Vous ne pouvez pas afficher cette page';
	exit();
}
?>

