-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 26, 2014 at 07:14 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cartelera`
--

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `ID` int(11) NOT NULL,
  `HORARIO` time NOT NULL,
  PRIMARY KEY (`HORARIO`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`ID`, `HORARIO`) VALUES
(1, '14:00:00'),
(1, '16:00:00'),
(1, '18:00:00'),
(2, '13:00:00'),
(2, '15:00:00'),
(3, '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE IF NOT EXISTS `peliculas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(40) COLLATE utf8_bin NOT NULL,
  `PAIS` varchar(30) COLLATE utf8_bin NOT NULL,
  `ANO` year(4) NOT NULL,
  `DURATION` int(11) NOT NULL,
  `CLASIFICACION` varchar(4) COLLATE utf8_bin NOT NULL,
  `IMGPATH` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT 'img/default.png',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TITLE` (`TITLE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `peliculas`
--

INSERT INTO `peliculas` (`ID`, `TITLE`, `PAIS`, `ANO`, `DURATION`, `CLASIFICACION`, `IMGPATH`) VALUES
(1, 'Guardianes de la Galaxia', 'EUA', 2014, 121, 'B', 'img/GuardiansoftheGalaxy.jpg'),
(2, 'El Planeta de los Simios', 'EUA', 2014, 130, 'B', 'img/dawn_of_apes_teaser_poster.jpg'),
(3, ' Sin City: A Dame to Kill For', 'EUA', 2014, 125, 'B15', 'http://ia.media-imdb.com/images/M/MV5BMjA5ODYwNjgxMF5BMl5BanBnXkFtZTgwMTcwNzAyMjE@._V1_SY317_CR0,0,214,317_AL_.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `peliculas` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
