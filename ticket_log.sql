
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
-- Table structure for table `ticket_log`
--

CREATE TABLE IF NOT EXISTS `ticket_log` (
  `logID` int(6) NOT NULL AUTO_INCREMENT,
  `ticketID` int(7) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `studentid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `categoryID` int(10) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `changedate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `secUser` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`logID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `ticket_log`
--

INSERT INTO `ticket_log` (`logID`, `ticketID`, `title`, `firstname`, `lastname`, `studentid`, `categoryID`, `comment`, `changedate`, `status`, `secUser`) VALUES
(28, 0, 'Abc', 'Xyz', '', 'GR3434', 2, 'wesdfewdf', '2017-10-26 20:25:46', 'Pending', 'admin'),
(27, 1017, 'Gradeing', 'Preetham', 'Dammai', 'GR005428', 6, 'need appointment on grade issue', '2017-10-23 18:03:58', 'Open', 'admin'),
(26, 1017, 'Garding', 'Preetham', 'Dammai', 'GR005428', 6, 'need appointment on grade issue', '2017-10-23 18:03:37', 'Open', 'admin'),
(25, 1017, 'Garding', 'Preetham', 'Dammi', 'GR005428', 6, 'need appointment on grade issue', '2017-10-23 18:03:07', 'Open', 'admin'),
(24, 1016, 'CPT', 'Naveen', 'Reddy', 'GR00234', 3, 'looking to apply CPT', '2017-10-22 18:04:43', 'Resolved', 'dhanram'),
(23, 1006, 'Testing 1', 'Charlie', 'Day', 'GR004577', 3, 'Test1', '2017-10-22 17:21:57', 'Pending', 'admin'),
(21, 1002, 'Testing 1', 'Dwight', 'Shroot', 'GR009989', 1, 'Hello1234567890', '2017-10-21 00:38:39', 'Open', 'mandava9'),
(22, 1010, 'check opt', 'Bhargav ', 'Prasad', 'GR009999', 4, 'Hello', '2017-10-21 02:43:29', 'Open', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
