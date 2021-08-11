-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 juil. 2021 à 14:27
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `Fav_Name`, `Link_Data`, `Label`) VALUES
(6, 'stumbleuponn', 'stumbleupon.com', 'ryryt'),
(7, 'delicio', ' delicious.com', 'delicious'),
(8, 'digg', 'digg.com', 'digg'),
(9, 'reddit', ' reddit.com', 'reddit'),
(10, 'linkedin', 'linkedin.com', 'linkedin'),
(23, 'test', 'test', 'test'),
(26, 'TEST3', 'TEST3', 'TEST3'),
(27, 'TEST3', 'TEST3', 'TEST3');

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

DROP TABLE IF EXISTS `catégorie`;
CREATE TABLE IF NOT EXISTS `catégorie` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Categ_Name` varchar(255) NOT NULL DEFAULT 'marque page Favoris 1',
  `bookmarks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `catégorie`
--

INSERT INTO `catégorie` (`id`, `Categ_Name`, `bookmarks`) VALUES
(1, 'marque page Favoris 1', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`id`, `bookmarks`, `catégorie`) VALUES
(10, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(30) NOT NULL DEFAULT '',
  `Passwordd` varchar(20) DEFAULT '',
  `Datenaiss` date DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `codepostal` char(5) NOT NULL,
  `bookmarks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
