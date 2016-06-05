<?php
/*
PhpMyNews
Auteur : Raphael PRENCIPE
Email : raphaelp@live.be
Création : 3/11/2009
*/
class PhpMyNews
{
	public 	$maxLength;
	public	$limite;			
	public	$template_news;		
	public	$template_gestion_news;
	public	$db_nom;		
	public	$db_hote;
	public	$db_utilisateur;
	public	$db_passe;
	public	$db_table;
	public	$connexion;
	
	// Le constructeur
	function __construct()
	{
		require('config.php');
		
		$this->db_hote = $db_hote;
		$this->db_nom = $db_nom;
		$this->db_utilisateur = $db_utilisateur;
		$this->db_passe = $db_passe;
		$this->db_table = $db_table;
		$this->limite = $limite;
		$this->template = $template_news;
		$this->template_gestion = $template_gestion_news;
	}
	
	// Affichage des news
	function displayAll()
	{
		$this->connect();
		
		$result = mysql_query("SELECT * FROM ".$this->db_table." ORDER BY date DESC LIMIT 0, ".$this->limite);
		
		while($row = mysql_fetch_assoc($result))
		{
			$id = $row['id'];
			$author =  utf8_encode($row['author']);
			$content = $this->addSmiley(utf8_encode($row['content']));
			$date = $this->convertDate($row['date']);
			
			require($this->template);
		}
		$this->close();
	}
	
	// affichage de la gestion des news
	function displayGestion()
	{
		$this->connect();

		$result = mysql_query("SELECT * FROM ".$this->db_table." ORDER BY date DESC LIMIT 0, ".$this->limite);
					
		while($row = mysql_fetch_assoc($result))
		{
				$id = $row['id'];
				$author =  utf8_encode($row['author']);
				$content = $this->addSmiley(utf8_encode($row['content']));

				require($this->template_gestion);
		}
		echo "<div style=\"margin-left:20px;\"><a href=\"admin.php?admin=".CODE."&amp;action=ajouter_news\">Ajouter une news</a></div>";
		
		
		$this->close();
	}

	// On un seul objet par son ID
	function displayItem($id)
	{
		if(is_numeric($id))
		{
			$this->connect();
			
			$result = mysql_query("SELECT * FROM ".$this->db_table." WHERE id = '".$id."'");
			$row = mysql_fetch_assoc($result);
			
			$author =  $row['author'];
			$content = $row['content'];
			$date = $this->convertDate($row['date']);
			
			require($this->template);
			
			$this->close();
			return true;
		}
		else return false;
		
	}
	
	// On ajoute une news
	function addNews($author, $content)
	{
		$this->connect();
		
		$sql = sprintf("INSERT INTO ".$this->db_table." (author, content ,date) VALUES ('%s','%s',CURDATE())",
		$this->clean($author), $this->clean($content));
		
		$result = mysql_query($sql, $this->connexion);
		$this->close();
		
		if($result)
		{
			return true;
		}
		else return false;
		
	}
	
	
	
	// Connexion à la base
	function connect()
	{
		$this->connexion = mysql_connect($this->db_hote, $this->db_utilisateur, $this->db_passe) 
				or die("Impossible de se connecter au serveur");

		mysql_select_db($this->db_nom, $this->connexion) 
				or die("Impossible de s&eacute;lectionner la base de donn&eacute;es!");
		
		if(!$this->connexion)
		{
			return false;
		}
		else return true;
	}
	
	// Déconnexion de la base
	function close()
	{
		mysql_close($this->connexion);
	}
	
	// Conversion de la date en jj/mm/aaaa
	function convertDate($date)
	{
		$date_array = explode("-",$date); 

    return $date_array[2]."/".$date_array[1]."/".$date_array[0];
	}
	
	// Protection et nettoyage des données avant insertion
	function clean($str)
	{
		if(get_magic_quotes_gpc())
		{
			$str = stripslashes($str);
		}

		$str = mysql_real_escape_string(utf8_decode($str));
		
		return $str;
	}
	
	// Ajout de smileys
	function addSmiley($texte)
	{
		$texte = str_replace("^^",'<img src="./images/smileys/smiley1.png" alt="" />', $texte);
		$texte = str_replace(";)",'<img src="./images/smileys/smiley2.png" alt="" />', $texte);
		$texte = str_replace(":p",'<img src="./images/smileys/smiley3.png" alt="" />', $texte);
		$texte = str_replace(":-°",'<img src="./images/smileys/smiley4.png" alt="" />', $texte);
		$texte = str_replace(":gne:",'<img src="./images/smileys/smiley5.png" alt="" />', $texte);
		$texte = str_replace("x_x",'<img src="./images/smileys/smiley6.png" alt="" />', $texte);
		$texte = str_replace(":(",'<img src="./images/smileys/smiley7.png" alt="" />', $texte);
		return $texte; 
	}
}
?>