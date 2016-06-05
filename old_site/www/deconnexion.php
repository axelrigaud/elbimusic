<?php
/*
PhpMyNews
Auteur : Raphael PRENCIPE
Email : raphaelp@live.be
Création : 3/11/2009
*/
session_start();

$_SESSION = array();
session_destroy();

echo 'Vous êtes d&eacute;connect&eacute;, <a href="index.php">Retourner &agrave; la liste des news</a>';
?>
