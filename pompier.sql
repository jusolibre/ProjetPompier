-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2017 at 02:20 PM
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
-- Table structure for table `pompier`
--

CREATE TABLE `pompier` (
  `id` int(10) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `matricule` text NOT NULL,
  `compétence1` tinyint(1) NOT NULL,
  `compétence2` tinyint(1) NOT NULL,
  `compétence3` tinyint(1) NOT NULL,
  `compétence4` tinyint(1) NOT NULL,
  `compétence5` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pompier`
--

INSERT INTO `pompier` (`id`, `nom`, `prenom`, `matricule`, `compétence1`, `compétence2`, `compétence3`, `compétence4`, `compétence5`) VALUES
(1, 'Jean', 'Jacques', 'ABCDEF12345', 0, 0, 1, 1, 1),
(2, 'nom', 'prenom', 'ABCDEF12345', 1, 1, 0, 0, 0),
(3, 'ecran', 'cassé', 'ABCDEF12345', 0, 1, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pompier`
--
ALTER TABLE `pompier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pompier`
--
ALTER TABLE `pompier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
