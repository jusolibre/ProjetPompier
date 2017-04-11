-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2017 at 04:24 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pompier`
--

-- --------------------------------------------------------

--
-- Table structure for table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `matricule` text NOT NULL,
  `date_presence` datetime DEFAULT NULL,
  `date_intervention` datetime NOT NULL,
  `date_reponse` datetime NOT NULL,
  `date_fin_dinter` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `intervention`
--

CREATE TABLE `intervention` (
  `id` int(11) NOT NULL,
  `id_pompier` int(11) NOT NULL,
  `id_intervention` int(11) NOT NULL,
  `matricule` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_reponse` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_presence` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pompier`
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

--
-- Dumping data for table `pompier`
--

INSERT INTO `pompier` (`id`, `nom`, `prenom`, `matricule`, `competence1`, `competence2`, `competence3`, `competence4`, `competence5`, `disponibilite`) VALUES
(1, 'Jean', 'Jacques', 'ABCDEF12345', 0, 1, 1, 0, 1, -1),
(2, 'nom', 'prenom', 'ABCDEF123456', 1, 0, 1, 0, 1, -1),
(3, 'ecran', 'cassé', 'ABCDEF1234567', 1, 1, 1, 0, 1, -1),
(4, 'sansmajuscule', 'prenom', '01234567890', 0, 0, 0, 0, 0, -1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `nom_inter` text NOT NULL,
  `heure_depard` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicule` text NOT NULL,
  `nombre_requis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pompier`
--
ALTER TABLE `pompier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pompier`
--
ALTER TABLE `pompier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
