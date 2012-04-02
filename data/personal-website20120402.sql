-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2012 at 04:47 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.6-13ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogak`
--

CREATE TABLE IF NOT EXISTS `blogak` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `erabiltzailea_id` int(8) NOT NULL,
  `izenburua` varchar(255) NOT NULL,
  `edukia` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blogak`
--

INSERT INTO `blogak` (`id`, `erabiltzailea_id`, `izenburua`, `edukia`) VALUES
(1, 1, 'auzolan taldeak non nahi!', 'auzolan taldeak non nahi!auzolan taldeak non nahi! auzolan taldeak non nahi!'),
(2, 1, 'gureak egin du! ', 'gureak egin du! gureak egin du! gureak egin du! gureak egin du! gureak egin du! gureak egin du! gureak egin du! '),
(3, 2, 'mola mola ! ', 'mola mola ! mola mola ! mola mola ! mola mola ! mola mola ! mola mola ! mola mola ! mola mola ! '),
(4, 2, 'gora gu! ', 'gora gu! gora gu! gora gu! gora gu! gora gu! gora gu! ');

-- --------------------------------------------------------

--
-- Table structure for table `blogak_etiketak`
--

CREATE TABLE IF NOT EXISTS `blogak_etiketak` (
  `bloga_id` int(11) NOT NULL,
  `etiketa_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogak_etiketak`
--

INSERT INTO `blogak_etiketak` (`bloga_id`, `etiketa_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `erabiltzaileak`
--

CREATE TABLE IF NOT EXISTS `erabiltzaileak` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `izena` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pasahitza` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `erabiltzaileak`
--

INSERT INTO `erabiltzaileak` (`id`, `izena`, `email`, `pasahitza`) VALUES
(1, 'manolo', 'manolo@manolo.com', '12cdb9b24211557ef1802bf5a875fd2c'),
(2, 'ana', 'ana@ana.com', 'ana');

-- --------------------------------------------------------

--
-- Table structure for table `etiketak`
--

CREATE TABLE IF NOT EXISTS `etiketak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `izena` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `etiketak`
--

INSERT INTO `etiketak` (`id`, `izena`) VALUES
(1, 'ekonomia'),
(2, 'elikadura subiranotasuna'),
(3, 'desazkundea'),
(4, 'agroekologia');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
