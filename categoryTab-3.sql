
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2017 at 08:41 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u996219413_vivek`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoryTab`
--

CREATE TABLE IF NOT EXISTS `categoryTab` (
  `category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(26) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`category_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categoryTab`
--

INSERT INTO `categoryTab` (`category_ID`, `categoryName`) VALUES
(1, 'I-20'),
(2, 'OPT'),
(3, 'CPT'),
(4, 'Course Registration'),
(5, 'Leave of Absence '),
(6, 'Others');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
