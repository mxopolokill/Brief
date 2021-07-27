-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 27 juil. 2021 à 14:50
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bookmark`
--
CREATE DATABASE IF NOT EXISTS `bookmark` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bookmark`;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `Fav_Name`, `Link_Data`, `Label`) VALUES
(1, 'Youtube', 'https://www.youtube.com/', 'commentaire');

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

DROP TABLE IF EXISTS `catégorie`;
CREATE TABLE IF NOT EXISTS `catégorie` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Categ_Name` varchar(255) NOT NULL DEFAULT 'marque page Favoris 1',
  `bookmarks` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bookmarks` (`bookmarks`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`),
  KEY `bookmarks` (`bookmarks`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `catégorie`
--
ALTER TABLE `catégorie`
  ADD CONSTRAINT `catégorie_ibfk_1` FOREIGN KEY (`bookmarks`) REFERENCES `bookmarks` (`id`);

--
-- Contraintes pour la table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`bookmarks`) REFERENCES `catégorie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
