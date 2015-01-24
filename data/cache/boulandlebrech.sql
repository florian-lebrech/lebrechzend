-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Janvier 2015 à 09:28
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `boulandlebrech`
--
CREATE DATABASE IF NOT EXISTS `boulandlebrech` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `boulandlebrech`;

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--

CREATE TABLE IF NOT EXISTS `episode` (
  `idSerie` int(11) NOT NULL,
  `numSaison` int(11) NOT NULL,
  `numEpisode` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE IF NOT EXISTS `saison` (
  `idSerie` int(11) NOT NULL,
  `numSaison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `saison`
--

INSERT INTO `saison` (`idSerie`, `numSaison`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE IF NOT EXISTS `serie` (
`idSerie` int(11) NOT NULL,
  `nomSerie` text NOT NULL,
  `imageSerie` text NOT NULL,
  `descriptionSerie` text NOT NULL,
  `username` text NOT NULL,
  `saison` int(11) DEFAULT NULL,
  `episode` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `serie`
--

INSERT INTO `serie` (`idSerie`, `nomSerie`, `imageSerie`, `descriptionSerie`, `username`, `saison`, `episode`) VALUES
(2, 'Walking Dead', 'http://media.canal-plus.com.s0.frz.io/image/51/6/190516.jpg', 'Des morts qui bougent', 'admin', 6, 4),
(4, 'The Heirs', 'http://www.soompi.com/wp-content/uploads/2013/09/the-heirs-13.png', 'Un truc de filles', 'test', 0, 0),
(5, 'Vikings', 'http://streaming-series.org/wp-content/uploads/2013/05/VikingsSaison1.jpg', 'Des barbares font la guerre', 'test', 0, 0),
(6, 'Vikings', 'http://streaming-series.org/wp-content/uploads/2013/05/VikingsSaison1.jpg', 'Des barbares font la guerre', 'admin', 1, 4),
(7, 'The big bang theory', 'http://s20.postimg.org/b85d4n96l/TBBT_1.jpg', 'Des geeks', 'test', 2, 3),
(8, 'The big bang theory', 'http://s20.postimg.org/b85d4n96l/TBBT_1.jpg', 'Des geeks', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL DEFAULT '0',
`idUser` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`username`, `password`, `IsAdmin`, `idUser`) VALUES
('admin', 'admin', 1, 1),
('test', 'test', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `userserie`
--

CREATE TABLE IF NOT EXISTS `userserie` (
`idUserSerie` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `numEpisode` int(11) NOT NULL,
  `numSaison` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `userserie`
--

INSERT INTO `userserie` (`idUserSerie`, `idUser`, `idSerie`, `numEpisode`, `numSaison`) VALUES
(1, 1, 2, 10, 2),
(2, 2, 3, 2, 6);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `episode`
--
ALTER TABLE `episode`
 ADD PRIMARY KEY (`idSerie`,`numSaison`,`numEpisode`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
 ADD PRIMARY KEY (`idSerie`,`numSaison`);

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
 ADD PRIMARY KEY (`idSerie`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `userserie`
--
ALTER TABLE `userserie`
 ADD PRIMARY KEY (`idUserSerie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
MODIFY `idSerie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `userserie`
--
ALTER TABLE `userserie`
MODIFY `idUserSerie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
