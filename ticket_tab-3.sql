
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
-- Table structure for table `ticket_tab`
--

CREATE TABLE IF NOT EXISTS `ticket_tab` (
  `ticketID` int(7) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `studentid` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `categoryID` int(2) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Open','Pending','Resolved') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Open',
  PRIMARY KEY (`ticketID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1019 ;

--
-- Dumping data for table `ticket_tab`
--

INSERT INTO `ticket_tab` (`ticketID`, `title`, `firstname`, `lastname`, `studentid`, `categoryID`, `comment`, `date`, `status`) VALUES
(1003, 'Testing 2', 'Sheldon', 'Cooper', 'GR005029', 1, 'Hellorrrrr', '2017-10-21 00:21:24', 'Open'),
(1001, 'Testing 1', 'Vivek', 'Manu', 'GR006789', 1, 'Test1', '2017-10-16 19:51:30', 'Resolved'),
(1000, 'Testing 1', 'Vivek', 'Mandava', 'GR005024', 2, 'Applying for OPT', '2017-10-21 00:31:45', 'Pending'),
(1002, 'Testing 1', 'Dwight', 'Shroot', 'GR009989', 1, 'Hello1234567890', '2017-10-21 00:35:25', 'Open'),
(1004, 'Testing 1', 'Ron', 'Swanson', 'GR009099', 6, 'Testing!', '2017-10-16 19:51:55', 'Pending'),
(1005, 'Testing 1', 'April', 'Ludgate', 'GR009007', 2, 'Testing!!!', '2017-10-16 19:52:02', 'Open'),
(1006, 'Testing 1', 'Charlie', 'Day', 'GR004577', 3, 'Test1', '2017-10-22 17:18:41', 'Pending'),
(1007, 'test', 'Don ', 'Draper', 'GR006789', 5, 'Test', '2017-10-16 20:12:28', 'Open'),
(1008, 'Testing 1', 'Lesley', 'Knope', 'GR909090', 4, 'Test', '2017-10-16 19:52:27', 'Resolved'),
(1009, 'testing', 'Mike', 'Scott', 'GR808090', 1, 'Testing', '2017-10-16 20:12:36', 'Pending'),
(1010, 'check opt', 'Bhargav ', 'Prasad', 'GR009999', 4, 'Hello', '2017-10-22 00:21:31', 'Pending'),
(1011, 'Testing 1', 'nikhil', 'videm', 'gr004557', 3, 'hi', '2017-10-16 19:52:10', 'Pending'),
(1012, 'Testing 2', 'Bhargav ', 'Prasad', 'GR009999', 2, 'Hello testing change log', '2017-10-20 21:34:22', 'Pending'),
(1013, '', '', '', '', 4, '', '2017-10-20 19:41:35', 'Resolved'),
(1014, 'CPT application', 'Dhanram', 'Eelaprolu', 'GR005009', 5, 'Student is applying for CPT, Meghan look after it. sdfjhgef', '2017-10-21 00:33:01', 'Pending'),
(1015, '', '', '', '', 4, '', '2017-10-20 20:06:53', 'Resolved'),
(1016, 'CPT', 'Naveen', 'Reddy', 'GR00234', 3, 'looking to apply CPT', '2017-10-22 18:01:27', 'Resolved'),
(1017, 'Gradeing', 'Preetham', 'Dammai', 'GR005428', 6, 'need appointment on grade issue', '2017-10-23 18:00:41', 'Open'),
(1018, 'Abc', 'Xyz', '', 'GR3434', 2, 'wesdfewdf', '2017-10-26 20:25:46', 'Pending');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
