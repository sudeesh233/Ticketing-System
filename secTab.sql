
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
-- Table structure for table `secTab`
--

CREATE TABLE IF NOT EXISTS `secTab` (
  `secID` int(10) NOT NULL AUTO_INCREMENT,
  `secUser` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `secPass` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `secLevel` enum('a','s') COLLATE utf8_unicode_ci NOT NULL,
  `secFirstName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `secLastName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `secEmail` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `secNote` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`secID`),
  UNIQUE KEY `secUser` (`secUser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `secTab`
--

INSERT INTO `secTab` (`secID`, `secUser`, `secPass`, `secLevel`, `secFirstName`, `secLastName`, `secEmail`, `secNote`) VALUES
(1, 'mandava9', 'P@ssw0rd', 's', 'vivek', 'mandava', 'manu.vivek@yahoo.com', ''),
(2, 'admin', 'P@ssw0rd', 'a', 'Vivek', 'Mandava', 'manu.vivek@yahoo.com', 'Hi'),
(3, 'manu.vivek', 'Passw0rd', 's', 'Vivek', 'Mandava', 'manu.vivek@yahoo.com', ''),
(4, 'admin1', 'P@ssw0rd', 'a', 'Vivek', 'Mandava', 'manu.vivek@yahoo.com', ''),
(5, 'dhanram', 'P@ssw0rd', 's', 'Dhanram', 'Ellaprolu', 'dfgksdfg@gmail.com', 'Test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
