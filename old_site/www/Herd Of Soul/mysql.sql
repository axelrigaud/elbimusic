/*
PhpMyNews
Auteur : Raphael PRENCIPE
Email : raphaelp@live.be
Création : 3/11/2009
*/
-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 25 Janvier 2009 à 21:56
-- Version du serveur: 5.1.30
-- Version de PHP: 5.2.8

--
-- Base de données: `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_news`
--

CREATE TABLE IF NOT EXISTS `tb_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tb_news`
--

INSERT INTO `tb_news` (`id`, `author`, `content`, `date`) VALUES
(1, 'Elsa', 'La culture est l''ensemble des connaissances, des habiletés et des usages acquis par l''expérience. Elle décrit et qualifie les mondes des organismes, des animaux et des humains en complément naturelle.\r\n\r\nParfois certains cherchent à l''approfondir. Alors, elle rassemble le savoir intellectuel, les croyances religieuses, les pratiques artistiques ou sportives, l''imaginaire visuel et idéologique de groupes de personnes, qu''ils constituent l''élite ou le peuple. La culture se définit ainsi comme la diffusion de tous ces savoirs et, mieux encore, la transmission du goût pour la connaissance.\r\n\r\nDans un contexte de mixité sociale, la culture devient la connaissance des structures et des manifestations qui font l''unité d''un groupe, d''une collectivité ou d''une société. En changeant de perspective, on peut envisager alors une culture de masse et un environnement culturel commun à une collectivité ou à toute une société gouvernée et diffusée au moyen de techniques industrielles. ;)', '2009-01-23'),
(2, 'Lucky', 'L''architecture est à la fois le métier et l''art de concevoir et réaliser des édifices, des villes, des villages mais aussi d''aménager l''espace avec les architectes paysagistes ou des navires avec les architectes navals.\r\n\r\nL''urbanisme est quant à lui un champ disciplinaire et professionnel recouvrant l''étude du phénomène urbain, l''action d''urbanisation et l''organisation de la ville et de ses territoires. Il a pour vocation d''organiser le cadre de vie dans un souci de respect de l''environnement des villes et du milieu rural qu''il cherche à aménager et à organiser pour obtenir un meilleur fonctionnement et améliorer les rapports sociaux. ^^', '2009-01-24'),
(3, 'Johnny', 'John Cassavetes (9 décembre 1929 à New York - 3 février 1989 à Los Angeles) est un acteur, scénariste et réalisateur américain. Il commence sa carrière comme comédien. Il endosse plusieurs rôles d''abord au théâtre puis à la télévision, dans des séries télévisées dont la plus connue est Johnny Staccato. Sa notoriété prend forme quand il passe au cinéma, notamment dans Face au crime (Crime in the streets) de Don Siegel. Mais c''est surtout derrière la caméra, en tant que cinéaste, que John Cassavetes va se distinguer. Il réalise en 1961, Shadows, avec une troupe amateur et avec ses propres moyens. Le film engage le réalisateur et le cinéma américain dans la voie de l''indépendance. En rupture avec l''industrie hollywoodienne avec laquelle il a une courte et décevante expérience, son cinéma évolue dans un style qui lui est propre. ^^', '2009-01-25');

