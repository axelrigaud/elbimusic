<?php
/*
PhpMyNews
Auteur : Raphael PRENCIPE
Email : raphaelp@live.be
Création : 3/11/2009
*/
session_start();

/* 
CODE est la valeur a placer dans l'url pour accéder à la gestion des news 
exemple : 
http://www.domaine.com/admin.php?admin=VOTRECODE&action=gestion_news
*/
// ATTENTION :  NE PAS UTILISER CE SYTEME D'AUTHENTIFICATION EN PRODUCTION, UTILISEZ PLUTÔT UN SCRIPT DE CONNEXION. AVEC LOGIN ET MOT  DE PASSE

define('CODE', 1999); // Vous pouvez modifier ce code

$_SESSION['admin'] = CODE;

if(isset($_GET['admin']) && $_GET['admin'] == CODE)
{
	if(isset($_SESSION['admin']) && $_SESSION['admin'] == CODE)
	{
		if(isset($_GET['action'])) $_GET['action'] = trim(strip_tags($_GET['action']));
		if(isset($_GET['id'])) $_GET['id'] = intval($_GET['id']);
		
		switch($_GET['action'])
		{
			case "ajouter_news":
				include('./admin/ajouter_news.php');
			break;
			
			case "modifier_news":
				include('./admin/modifier_news.php');
			break;
			
			case "supprimer_news":
				include('./admin/supprimer_news.php');
			break;
			
			case "gestion_news":
				include('./admin/gestion_news.php');
			break;
			
			default:
				echo 'Cette action est impossible';
				exit();
		}
	}
	else
	{
		echo ' Vous ne pouvez pas afficher cette page.';
		exit();
	}
}
else
{
	echo ' Vous ne pouvez pas afficher cette page.';
	exit();
}
?>