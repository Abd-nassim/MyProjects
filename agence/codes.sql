-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 26 Novembre 2017 à 13:44
-- Version du serveur :  5.5.51-38.2
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `magdi90_Test`
--

-- --------------------------------------------------------

--
-- Structure de la table `codes`
--

CREATE TABLE IF NOT EXISTS `codes` (
  `id` int(11) NOT NULL,
  `User` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Code` text COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(11) NOT NULL,
  `IsUsed` int(1) NOT NULL,
  `UsedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AddDate` datetime DEFAULT NULL,
  `CardType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CardName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `codes`
--

INSERT INTO `codes` (`id`, `User`, `Code`, `Amount`, `IsUsed`, `UsedDate`, `AddDate`, `CardType`, `CardName`) VALUES
(1, 'walidwalid@gmail.com', '1', -10000000, 1, '2017-11-26 18:42:08', '2017-11-02 00:00:00', '', 'Cashu'),
(2, 'walidwalid@gmail.com', '55444558877', 500, 1, '2017-11-25 22:49:21', '2017-11-22 00:00:00', NULL, 'Cashu'),
(3, 'walidwalid@gmail.com', '7578587587578', 500, 1, '2017-11-25 22:49:25', '2017-11-22 00:00:00', NULL, 'Cashu'),
(4, 'walidwalid@gmail.com', '7578587587572', 500, 1, '2017-11-25 22:51:36', '2017-11-22 00:00:00', NULL, 'Cashu'),
(5, 'walidwalid@gmail.com', '7578587587578', 500, 1, '2017-11-26 16:02:49', '2017-11-22 00:00:00', NULL, 'Cashu'),
(6, 'walidwalid@gmail.com', '7578587587578', 500, 1, '2017-11-26 16:04:15', '2017-11-22 00:00:00', NULL, 'Cashu'),
(7, 'walidwalid@gmail.com', '7578587587578', 500, 0, '2017-11-26 17:53:35', '2017-11-22 00:00:00', NULL, 'Cashu'),
(8, 'walidwalid@gmail.com', '7578587587578', 22, 1, '2017-11-26 17:53:57', '2017-11-22 00:00:00', NULL, 'Cashu'),
(9, 'walidwalid@gmail.com', '7578587587578', 22, 0, '2017-11-26 17:48:35', '2017-11-22 00:00:00', NULL, 'Cashu'),
(10, 'walidwalid@gmail.com', '7578587587578', 22, 0, '2017-11-26 17:48:40', '2017-11-22 00:00:00', NULL, 'Cashu'),
(11, 'walidwalid@gmail.com', '7578587587578', 22, 0, '2017-11-26 17:48:45', '2017-11-22 00:00:00', NULL, 'Cashu');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
