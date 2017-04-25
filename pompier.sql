-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 21 Avril 2017 à 11:26
-- Version du serveur :  5.7.17-0ubuntu0.16.04.1
-- Version de PHP :  7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pompier`
--

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `matricule` text NOT NULL,
  `date_presence` datetime DEFAULT NULL,
  `date_intervention` datetime NOT NULL,
  `date_reponse` datetime NOT NULL,
  `date_fin_dinter` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicule` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE `intervention` (
  `id` int(11) NOT NULL,
  `heure_depart` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicule` text NOT NULL,
  `nombre_requis` int(11) DEFAULT NULL,
  `nombre_present` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pompier`
--

CREATE TABLE `pompier` (
  `id` int(10) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `matricule` text NOT NULL,
  `competence1` tinyint(1) DEFAULT '0',
  `competence2` tinyint(1) DEFAULT '0',
  `competence3` tinyint(1) NOT NULL DEFAULT '0',
  `competence4` tinyint(1) NOT NULL DEFAULT '0',
  `competence5` tinyint(1) NOT NULL DEFAULT '0',
  `disponibilite` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `id` int(11) NOT NULL,
  `id_pompier` int(11) NOT NULL,
  `id_intervention` int(11) NOT NULL,
  `matricule` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_reponse` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_presence` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `pompierstoken`
--

CREATE TABLE IF NOT EXISTS `pompierstoken` (
`id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


--
-- Index pour les tables exportées
--

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `pompier`
--
ALTER TABLE `pompier`
  ADD PRIMARY KEY (`id`);
  
--
-- Index pour la table `pompierstoken`
--
ALTER TABLE `pompierstoken`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pompier`
--
ALTER TABLE `pompier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
  
--
-- AUTO_INCREMENT pour la table `pompierstoken`
--
ALTER TABLE `pompierstoken`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
