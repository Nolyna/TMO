-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 15 oct. 2017 à 11:30
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tmobase`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `iduser` int(11) NOT NULL,
  `idfood` int(11) NOT NULL,
  `dateCreer` date NOT NULL,
  `textComment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `iduser` int(11) NOT NULL,
  `idfood` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

CREATE TABLE `food` (
  `idfood` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `Description` text,
  `price` varchar(15) DEFAULT NULL,
  `image` text,
  `type` varchar(50) DEFAULT NULL,
  `datedispo` varchar(20) DEFAULT NULL,
  `hbegin` varchar(11) DEFAULT NULL,
  `hend` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`idfood`, `name`, `Description`, `price`, `image`, `type`, `datedispo`, `hbegin`, `hend`) VALUES
(1, 'Pan Seared Salmon W/ Spanish and Dill', '\"Crafted with love , passion and appreciation to all the wonders\r\nof the sea. This dish was made with a highlight on subduing the strong flavor of the salmon but not silencing it. The dill adds some punch to the fresh lemon squeezed juices, and adds and extra\r\npunch. If the flavors make you excited, I can’t wait to prepare this dish for you”', '15', '../assets/foodimg/salmonfood.jpeg', 'European', '2017-10-31', '8:00 pm', '10:00pm'),
(2, 'Potatoes milk', '\"Crafted with love , passion and appreciation to all the wonders\r\nof the sea. This dish was made with a highlight on subduing the strong flavor of the salmon but not silencing it. The dill adds some punch to the fresh lemon squeezed juices, and adds and extra\r\npunch. If the flavors make you excited, I can’t wait to prepare this dish for you”', '15', '../assets/foodimg/salmonfood.jpeg', 'European', '2017-10-31', '8:00 pm', '10:00pm'),
(4, 'Mac & cheess', 'Macaroni and cheese parmesa', '', '../assets/foodimg/gwde3cnhb8.jpg', NULL, '', '', ''),
(5, 'Plantain', 'Fries plaintain form Brasil', '$12', '../assets/noimage.png', 'African', 'everyday', '3pm', '4pm');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `iduser` int(11) NOT NULL,
  `idfood` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `iduser` int(11) NOT NULL,
  `idfood` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `iduser` int(11) NOT NULL,
  `idfood` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`iduser`, `idfood`) VALUES
(2, 4),
(2, 5),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `about` text,
  `creer` date DEFAULT NULL,
  `lastin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `name`, `email`, `password`, `about`, `creer`, `lastin`) VALUES
(2, 'test me', 'test@me.com', 'test', NULL, NULL, '0000-00-00 00:00:00'),
(3, 'Amy Jean', 'amy@gmail.net', 'xxx', 'I am a native of New Hampshire and a recent \r\ngraduate from Dartmouth University.\r\n  I majored\r\nin Environmental Studies and minored in \r\nCeramics. I currently live<br> in Atlanta.\r\nI love pan searing fish as much as I \r\nlove Corgis.', NULL, '0000-00-00 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idfood` (`idfood`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idfood` (`idfood`);

--
-- Index pour la table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`idfood`),
  ADD KEY `type` (`type`),
  ADD KEY `price` (`price`),
  ADD KEY `name` (`name`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idfood` (`idfood`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idfood` (`idfood`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idfood` (`idfood`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `food`
--
ALTER TABLE `food`
  MODIFY `idfood` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
