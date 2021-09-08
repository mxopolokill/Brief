-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 11 août 2021 à 15:12
-- Version du serveur :  5.7.31
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bookmark2`
--

-- --------------------------------------------------------

--
-- Structure de la table `bookmarks`
--

DROP TABLE IF EXISTS `bookmarks`;
CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fav_Name` varchar(30) NOT NULL DEFAULT '',
  `Link_Data` varchar(200) NOT NULL DEFAULT '',
  `Label` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `catégorie` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6458 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `Fav_Name`, `Link_Data`, `Label`) VALUES
(6, 'stumbleuponn', 'stumbleupon.com', 'ryryt'),
(7, 'delicioqsd', ' deliciqsdous.com', 'deliciqsdous'),
(8, 'qsdqsd', 'qsdqsdqsdqsd', 'qsdqsdqsd'),
(9, 'reddit7', ' reddit.com', 'redditazd'),
(10, 'qsdqsd', 'qsdqsd', 'qsdqsd'),
(23, 'test', 'test', 'test'),
(26, 'TEST3qsd', 'TEST3qsdq', 'qsdqsd'),
(27, 'TEST3', 'TEST3', 'TEST3'),
(64, 'stumbleuponn', 'stumbleupon.com', 'ryryt'),
(67, 'stumbleuponn', 'stumbleupon.com', 'ryryt'),
(77, 'delicio', ' delicious.com', 'delicious'),
(78, 'digg', 'digg.com', 'digg'),
(84, 'digg', 'digg.com', 'digg'),
(96, 'reddit', ' reddit.com', 'reddit'),
(97, 'reddit', ' reddit.com', 'reddit'),
(160, 'linkedin', 'linkedin.com', 'linkedin'),
(247, 'TEST3', 'TEST3', 'TEST3'),
(273, 'test', 'test', 'test'),
(276, 'TEST3', 'TEST3', 'TEST3'),
(277, 'TEST3', 'TEST3', 'TEST3'),
(710, 'linkedin', 'linkedin.com', 'linkedin'),
(764, 'delicio', ' delicious.com', 'delicious'),
(2666, 'TEST3', 'TEST3', 'TEST3'),
(6447, 'retetetete', ' reddit.com', 'reddit'),
(6449, 'testertetet', 'etertet', 'test'),
(6453, 'eryeryery', 'eryreyr', 'eryeryery'),
(6455, 'zrerazrzer', 'razraezrar', 'ertetete'),
(6456, 'sdfqsfsdffsdfsdfsdf', 'sdfdsfdsfsdfsdfsfs', 'fsdfsdfsdfdsfdsfdsfs'),
(6457, 'tsest', 'tsest', 'tsest');

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

DROP TABLE IF EXISTS `catégorie`;
CREATE TABLE IF NOT EXISTS `catégorie` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Categ_Name` varchar(255) NOT NULL DEFAULT 'marque page Favoris 1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `catégorie`
--

INSERT INTO `catégorie` (`id`, `Categ_Name`) VALUES
(2, 'fav 2'),
(7, '1'),
(8, 'fav5'),
(10, 'fav6'),
(13, 'marque page Favoris 1'),
(14, 'NEW CAT2GORIE'),
(19, 'treretert'),
(20, 'laCatégorieTest'),
(21, 'TEST');

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

DROP TABLE IF EXISTS `liaison`;
CREATE TABLE IF NOT EXISTS `liaison` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `bookmarks` int(11) NOT NULL,
  `catégorie` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `liaison_ibfk_1` (`bookmarks`),
  KEY `liaison_ibfk_2` (`catégorie`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`id`, `bookmarks`, `catégorie`) VALUES
(25, 6, 20),
(26, 7, 2),
(27, 8, 8),
(28, 9, 8),
(29, 10, 10),
(30, 23, 13),
(31, 26, 14),
(32, 27, 19),
(33, 64, 20),
(34, 67, 21),
(35, 10, 2),
(37, 10, 10),
(38, 10, 10),
(42, 7, 13),
(43, 7, 10);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL DEFAULT '0',
  `last_name` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(7, 'test455', 'test455', 'test455@gmail.com', '$2y$04$rs6vXctytZqOIU6g2FZD3.hrMTMUsmZvCFvKHULT5Ylx6uPl3/N1.'),
(8, 'prenom', 'nom', 'nom@gmail.com', '$2y$04$eMhs9e8pcxjHATk/H7Q2jeYB/gWtkdh.ztsSZbTOFSeLmL2MWjzta'),
(9, 'aeeaeae', 'zazazea', 'zraz@gmail.com', '$2y$04$GEUg9hwMUERTK3rl5FJ7vuabIJNdt0uXRKDwQdlQuD4hbsfBR/l8y'),
(10, 'azazrzr', 'razeraezeraz', 'azazraezar@gmail.com', '$2y$04$lB6lE4PfnGam7C4EAIYtN.fRzGwFUGvfBSHIIs0TsO04EbQh32M6O'),
(11, 'zarzerazr', 'azrazrzar', 'zarerzer@gmail.com', '$2y$04$pdxAG0YM/GvdOyXSUSHXFOOal8N0/g84rR3UeWGY9EvlQu1Z7zwrS'),
(12, 'zarazrzrazr', 'zarazrazraz', 'zarzer@gmail.com', '$2y$04$kUsN0B6gCjQaF6T9YtTmY.hZWU28YMVwXeln24z3mjtQA8kvP2DNq'),
(13, 'qfdsfqsfsqf', 'sdffqsfsdfq', 'sdqfsfqsdf@gmail.Com', '$2y$04$OKIgbC1lVVbmFWbR7TmrHOPCHFMgvGVFgdOFdcZXMhOkofJ7tE9Jq'),
(14, 'dgsgs', 'dsfdsfds', 'fdsfds@gmail.com', '$2y$04$HAn9TGK25QFEQX1X4H.OBuDKIKdy83k4Z39j.mbMx6Dt5IqbRvrE2');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `liaison`
--
ALTER TABLE `liaison`
  ADD CONSTRAINT `liaison_ibfk_1` FOREIGN KEY (`bookmarks`) REFERENCES `bookmarks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liaison_ibfk_2` FOREIGN KEY (`catégorie`) REFERENCES `catégorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
