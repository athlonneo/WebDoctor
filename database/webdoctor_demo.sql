-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2019 at 06:13 AM
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

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`idC`, `name`) VALUES
(1, 'Banda Aceh'),
(2, 'Denpasar'),
(3, 'Serang'),
(4, 'Bengkulu'),
(5, 'Yogyakarta'),
(6, 'Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Bandung'),
(10, 'Semarang'),
(11, 'Surabaya'),
(12, 'Pontianak'),
(13, 'Banjarmasin'),
(14, 'Palangkaraya'),
(15, 'Samarinda'),
(16, 'Tanjung Selor'),
(17, 'Pangkalpinang'),
(18, 'Tanjungpinang'),
(19, 'Bandar Lampung'),
(20, 'Ambon'),
(21, 'Sofifi'),
(22, 'Mataram'),
(23, 'Kupang'),
(24, 'Jayapura'),
(25, 'Manokwari'),
(26, 'Pekanbaru'),
(27, 'Mamuju'),
(28, 'Makassar'),
(29, 'Palu'),
(30, 'Kendari'),
(31, 'Manado'),
(32, 'Padang'),
(33, 'Palembang'),
(34, 'Medan');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `idD` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`idD`, `name`) VALUES
(1, 'Faringitis'),
(2, 'Influenza'),
(3, 'Asthma'),
(4, 'Anemia'),
(5, 'Dengue Fever'),
(6, 'Dyspepsia'),
(7, 'Malaria'),
(8, 'Tuberculosis'),
(9, 'Kidney illness'),
(10, 'Pneumonia');

-- --------------------------------------------------------

--
-- Table structure for table `disease_symptom`
--

CREATE TABLE `disease_symptom` (
  `idD` int(11) NOT NULL,
  `idS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease_symptom`
--

INSERT INTO `disease_symptom` (`idD`, `idS`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 3),
(2, 2),
(3, 5),
(3, 7),
(3, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 2),
(5, 3),
(5, 2),
(5, 13),
(5, 14),
(6, 15),
(6, 14),
(6, 16),
(7, 3),
(7, 4),
(7, 2),
(6, 13),
(7, 14),
(7, 20),
(8, 3),
(8, 9),
(8, 12),
(8, 17),
(9, 14),
(9, 17),
(9, 9),
(9, 18),
(9, 8),
(10, 12),
(10, 1),
(10, 3),
(10, 14),
(10, 19);

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--

CREATE TABLE `symptom` (
  `idS` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptom`
--

INSERT INTO `symptom` (`idS`, `name`) VALUES
(1, 'Sore Throat'),
(2, 'Headache'),
(3, 'Fever'),
(4, 'Chills'),
(5, 'Cough'),
(6, 'Nasal congestion'),
(7, 'Difficulty breathing'),
(8, 'Chest tightness'),
(9, 'Limp'),
(10, 'Pale skin'),
(11, 'Short breath'),
(12, 'Chest pain'),
(13, 'Muscle ache'),
(14, 'Nausea'),
(15, 'Bloated'),
(16, 'Stomachache'),
(17, 'No appetite'),
(18, 'Sleep disorder'),
(19, 'Shivering'),
(20, 'Diarrhea');

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

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idU`, `username`, `password`, `name`, `birth_date`, `idC`, `isAdmin`, `image`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '1990-01-01', 9, 1, 'placeholder.png'),
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', 'Test User', '1999-05-01', 6, 0, 'placeholder.png'),
(3, 'test2', '098f6bcd4621d373cade4e832627b4f6', 'Test User Two', '1985-04-01', 9, 0, 'placeholder.png'),
(4, 'test3', '098f6bcd4621d373cade4e832627b4f6', 'Test User Three', '1979-01-17', 5, 0, 'placeholder.png');

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
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `symptom`
--
ALTER TABLE `symptom`
  MODIFY `idS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
