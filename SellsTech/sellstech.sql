-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2018 at 02:35 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sellstech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin      '),
(2, 'admin@gmail.com', 'a31a '),
(3, 'med@gmail.com', 'aze ');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `nom_article` varchar(255) NOT NULL,
  `prix_article` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `marque` varchar(255) NOT NULL,
  `vendus` int(11) DEFAULT NULL,
  `cart` varchar(10) DEFAULT NULL,
  `categ` varchar(55) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `nom_article`, `prix_article`, `rate`, `marque`, `vendus`, `cart`, `categ`, `image`, `id_client`, `etat`) VALUES
(148, 'laptop', 500, 4, 'ehrizehrizeru', 0, '1', 'nouveau  ', '3.jpg     ', 0, 0),
(149, 'pc', 2120, 4, 'sam', 0, NULL, 'nouveau', '4.jpg ', NULL, NULL),
(150, 'laptop', 500, 3, 'azuz', 0, NULL, 'new', '5.jpg', NULL, NULL),
(151, 'laptop', 500, NULL, 'lenovo', 0, NULL, 'old', '3.jpg ', NULL, NULL),
(152, 'laptop', 500, 4, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(153, 'laptop', 500, 5, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(154, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(155, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(156, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(157, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(158, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(159, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(160, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(161, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(162, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(163, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(164, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(165, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(166, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(167, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(168, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(169, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(170, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(171, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(172, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(173, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(174, 'laptop', 500, 2, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(175, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(176, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(177, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(178, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(179, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(180, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(181, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(182, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(183, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(184, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(185, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(186, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(187, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(188, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(189, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(190, 'laptop', 500, NULL, 'lenovo', 0, NULL, NULL, '3.jpg', NULL, NULL),
(191, 'daha', 0, NULL, 'mo3af', NULL, NULL, 'pd', 'daha 193.JPG', NULL, NULL),
(192, 'pc', 100, NULL, 'azuz', NULL, NULL, 'new', '5.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_facture`
--

CREATE TABLE `article_facture` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `nom_carte` varchar(255) NOT NULL,
  `numero_carte` varchar(255) NOT NULL,
  `solde` int(11) NOT NULL,
  `cvc` varchar(255) NOT NULL,
  `date_expiration` date NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `nom_carte`, `numero_carte`, `solde`, `cvc`, `date_expiration`, `id_client`) VALUES
(2, 'dahabia', '1', 10000, '1', '2018-08-16', 5),
(6, 'matercard', '8455854', 20032, '2', '2018-08-19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `etat` varchar(55) DEFAULT NULL,
  `prix` int(255) DEFAULT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nombre_article` int(255) DEFAULT NULL,
  `id_article` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `ratecart` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `etat`, `prix`, `date_ajout`, `date_update`, `nombre_article`, `id_article`, `id_client`, `ratecart`) VALUES
(108, '0', 1500, '2018-08-15 16:06:28', '2018-08-16 14:45:37', 3, 150, 5, 3),
(107, '1', 2000, '2018-08-15 13:51:25', '2018-08-15 16:46:08', 4, 148, 5, 3),
(106, '1', 2120, '2018-08-15 13:51:22', '2018-08-15 16:46:12', 1, 149, 5, 3),
(105, '1', 1500, '2018-08-15 13:51:16', '2018-08-16 14:45:37', 3, 150, 5, 3),
(103, '1', 500, '2018-08-13 13:55:37', '2018-08-15 13:46:22', 1, 148, 0, NULL),
(102, '1', 500, '2018-08-13 13:55:35', '2018-08-15 13:46:22', 1, 148, 0, NULL),
(109, '0', 500, '2018-08-15 17:27:56', '2018-08-16 14:45:34', 1, 174, 5, 2),
(122, '0', 4500, '2018-09-10 09:46:49', '2018-09-10 09:46:56', 9, 153, 0, NULL),
(112, '0', 500, '2018-08-16 14:55:36', '2018-08-16 14:55:47', 1, 152, 5, 2),
(113, '0', 500, '2018-08-16 14:55:38', '2018-08-16 14:55:38', 1, 151, 5, NULL),
(114, '0', 500, '2018-08-16 14:55:40', '2018-08-16 14:55:40', 1, 150, 5, NULL),
(115, '0', 500, '2018-08-16 15:38:38', '2018-08-16 15:38:38', 1, 151, 5, NULL),
(116, '0', 500, '2018-08-16 15:38:40', '2018-08-16 15:38:40', 1, 152, 5, NULL),
(121, '0', 500, '2018-09-10 09:46:46', '2018-09-10 09:46:46', 1, 152, 0, NULL),
(119, '0', 500, '2018-08-27 16:33:56', '2018-09-10 09:50:01', 1, 153, 123, 5);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `telephone` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `username`, `password`, `email`, `telephone`) VALUES
(118, 'med', 'med', 'a@a.com', '456456456'),
(119, 'aa', 'a', 'a@a.com', '456546456 '),
(120, 'b', 'b', 'b@b.com', '54545454'),
(121, 'r', 'b', 'b@b.com', 'r'),
(122, 'ert', 'b', 'b@b.com', 'et'),
(123, 'med', 'med', 'med@gmail.com', '5458874');

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `livraison` int(11) NOT NULL,
  `prix_total` int(255) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id`, `livraison`, `prix_total`, `id_client`, `date_ajout`) VALUES
(7, 0, 2220, 5, '2018-08-05 20:59:25'),
(8, 0, 5007, 5, '2018-08-05 21:00:43'),
(9, 0, 6514, 5, '2018-08-05 21:01:17'),
(10, 0, 500, 5, '2018-08-05 21:04:30'),
(11, 1, 500, 5, '2018-08-05 21:05:10'),
(12, 0, 1000, 5, '2018-08-05 21:12:16'),
(13, 0, 500, 5, '2018-08-07 18:31:07'),
(14, 0, 500, 5, '2018-08-07 18:34:56'),
(15, 0, 500, 5, '2018-08-07 18:36:36'),
(16, 0, 500, 5, '2018-08-07 18:40:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_facture`
--
ALTER TABLE `article_facture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `article_facture`
--
ALTER TABLE `article_facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
