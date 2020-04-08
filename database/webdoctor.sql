-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 02:18 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `idC` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `idD` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disease_symptom`
--

CREATE TABLE `disease_symptom` (
  `idD` int(11) NOT NULL,
  `idS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--

CREATE TABLE `symptom` (
  `idS` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idU` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `idC` int(11) NOT NULL,
  `isAdmin` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_disease`
--

CREATE TABLE `user_disease` (
  `idU` int(11) NOT NULL,
  `idD` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_symptom`
--

CREATE TABLE `user_symptom` (
  `idU` int(11) NOT NULL,
  `idS` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`idC`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`idD`);

--
-- Indexes for table `disease_symptom`
--
ALTER TABLE `disease_symptom`
  ADD KEY `disease_FK` (`idD`),
  ADD KEY `symptom_FK` (`idS`);

--
-- Indexes for table `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`idS`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idU`),
  ADD KEY `city_FK` (`idC`);

--
-- Indexes for table `user_disease`
--
ALTER TABLE `user_disease`
  ADD KEY `diseaseU_FK` (`idD`),
  ADD KEY `userD_FK` (`idU`);

--
-- Indexes for table `user_symptom`
--
ALTER TABLE `user_symptom`
  ADD KEY `symptomU_FK` (`idS`),
  ADD KEY `userS_FK` (`idU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `symptom`
--
ALTER TABLE `symptom`
  MODIFY `idS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disease_symptom`
--
ALTER TABLE `disease_symptom`
  ADD CONSTRAINT `disease_FK` FOREIGN KEY (`idD`) REFERENCES `disease` (`idD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `symptom_FK` FOREIGN KEY (`idS`) REFERENCES `symptom` (`idS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `city_FK` FOREIGN KEY (`idC`) REFERENCES `city` (`idC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_disease`
--
ALTER TABLE `user_disease`
  ADD CONSTRAINT `diseaseU_FK` FOREIGN KEY (`idD`) REFERENCES `disease` (`idD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userD_FK` FOREIGN KEY (`idU`) REFERENCES `user` (`idU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_symptom`
--
ALTER TABLE `user_symptom`
  ADD CONSTRAINT `symptomU_FK` FOREIGN KEY (`idS`) REFERENCES `symptom` (`idS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userS_FK` FOREIGN KEY (`idU`) REFERENCES `user` (`idU`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
