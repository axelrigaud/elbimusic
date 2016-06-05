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
	if($_POST['Submit'])
	{
		if(!empty($_POST['txtAuthor']) && !empty($_POST['txtContent']))
		{
			include ('./includes/class.news.php');

			$news = new PhpMyNews();
			
			$news->addNews($_POST['txtAuthor'], $_POST['txtContent']);
			
			echo 'News ajout&eacute;e avec succ&egrave;s';
		}
		else 
		{
			echo "Compl&eacute;tez le formulaire svp.";
		}
	}
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link href="./css/style.css" rel="stylesheet" type="text/css" />
		<title>Ajouter une news</title>
	</head>

	<body>
	<h3>Ajouter une news</h3>
	<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
	<table width="100%" border="0" cellspacing="2" cellpadding="2">
	  <tr>
	    <td>Date</td>
	    <td><input type="text" name="txtAuthor" size="25" maxlength="15" /></td>
	  </tr>
	  <tr>
	    <td>News</td>
	    <td><textarea name="txtContent" cols="100" rows="15"></textarea></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td><input type="submit" name="Submit" value="Ajouter" /></td>
	  </tr>
	</table>
	</form>
    <?php echo CODE;
			echo $db_hote ;		
			echo $db_nom ;
			echo $db_utilisateur ;
			echo $db_passe ;
			echo $db_table ;
	
	?>
	</body>
	</html>
<?php
}
else
{
	echo 'Vous ne pouvez pas afficher cette page';
	exit();
}
?>