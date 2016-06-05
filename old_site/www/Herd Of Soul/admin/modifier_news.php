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
	require('./includes/config.php');
	require('./includes/class.news.php');

	if(isset($_POST['Submit']))
	{
		$news = new PhpMyNews();
		
		if($news->updateNews($_GET['id'], $_POST['txtAuthor'], $_POST['txtContent']))
		{
			echo "Mise &agrave; jour effectu&eacute;e avec succ&egrave;s!";
		}
		else
		{
			echo "Erreur lors de la mise &agrave; jour!";
			exit();
		}
	}
	else
	{
		if(isset($_GET['id']) && !empty($_GET['id']))
		{
			$connexion = mysql_connect($db_hote, $db_utilisateur, $db_passe) 
			or die("Impossible de se connecter au serveur");

			mysql_select_db($db_nom, $connexion) or die("Impossible de sélectionner la base de données!");
			$id = intval($_GET['id']);
		
			$result = mysql_query("SELECT * FROM ".$db_table." WHERE id = '".$id."' LIMIT 1");
			$row = mysql_fetch_assoc($result);
				
			$author = $row['author'];
			$content = $row['content'];
		
			mysql_close($connexion);
		}
		else
		{	
			echo "Id vide!";
		}
	}
	
	function showId()
	{
		global $id;
		echo 'value="'.$id.'"';
	}

	function showAuthor()
	{
		global $author;
		echo 'value="'.utf8_encode($author).'"';
	}

	function showContent()
	{
		global $content;
		echo utf8_encode($content);
	}
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link href="./css/style.css" rel="stylesheet" type="text/css" />
		<title>Modifier la news</title>
	</head>

	<body>
	<h3>Modifier une news</h3>
	<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
	<table width="100%" border="0" cellspacing="2" cellpadding="2">
		<tr>
	    <td>id</td>
			<td><input type="text" name="txtId" size="4" disabled="disabled" <?php showId();?> /></td>
	  </tr>
	  <tr>
	    <td>Auteur</td>
	    <td><input type="text" name="txtAuthor" size="20" maxlength="15" <?php showAuthor();?> /></td>
	  </tr>
	  <tr>
	    <td>News</td>
	    <td><textarea name="txtContent" cols="100" rows="15"><?php showContent();?></textarea></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><input type="submit" name="Submit" value="Modifier" /></td>
	  </tr>
	</table>
	</form>
	</body>
	</html>
<?php
}
else
{
	echo 'Vous ne pouvez pas afficher cette page !';
	exit();
}
?>