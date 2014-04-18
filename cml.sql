-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2014 at 12:36 PM
-- Server version: 5.5.35
-- PHP Version: 5.3.10-1ubuntu3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cml`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE IF NOT EXISTS `booked` (
  `booked_id` int(11) NOT NULL AUTO_INCREMENT,
  `booked_freetime` int(11) DEFAULT NULL,
  `booked_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`booked_id`),
  KEY `booked_freetime` (`booked_freetime`),
  KEY `booked_user` (`booked_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`booked_id`, `booked_freetime`, `booked_user`) VALUES
(1, 3, 2),
(3, 2, 26);

-- --------------------------------------------------------

--
-- Table structure for table `freetime`
--

CREATE TABLE IF NOT EXISTS `freetime` (
  `freetime_id` int(11) NOT NULL AUTO_INCREMENT,
  `freetime_user` int(11) DEFAULT NULL,
  `freetime_start` datetime NOT NULL,
  `freetime_end` datetime NOT NULL,
  `freetime_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`freetime_id`),
  KEY `freetime_user` (`freetime_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `freetime`
--

INSERT INTO `freetime` (`freetime_id`, `freetime_user`, `freetime_start`, `freetime_end`, `freetime_created`) VALUES
(1, 1, '2014-04-18 03:00:00', '2014-04-18 06:00:00', '0000-00-00 00:00:00'),
(2, 2, '2014-04-18 09:45:00', '2014-04-18 10:00:00', '0000-00-00 00:00:00'),
(3, 3, '2014-04-24 08:00:00', '2014-04-24 15:00:00', '0000-00-00 00:00:00'),
(4, 1, '2014-04-24 15:00:00', '2014-04-25 03:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_active` int(11) DEFAULT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_active`, `user_created`) VALUES
(1, 'Vienna Alessandra Marcelo', 'Vienna Alessandra Marcelo@gmail.com', 1, '2014-04-16 09:18:45'),
(2, 'Alessandra Marcelo', 'Alessandra Marcelo@gmail.com', 1, '2014-04-16 09:21:35'),
(3, 'kobe bryant', 'kobe@bryant.com', 1, '2014-04-17 04:10:43'),
(24, 'carmelo anthony', 'carmelo@anthony.com', 1, '2014-04-17 16:48:22'),
(25, 'dwayne wade', 'dwayne@wade.com', 1, '2014-04-17 16:49:19'),
(26, 'kevin love', 'kevin@love.com', 1, '2014-04-17 16:52:22'),
(27, 'kevin durant', 'kevin@durant.com', 1, '2014-04-17 16:53:18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked`
--
ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`booked_freetime`) REFERENCES `freetime` (`freetime_id`),
  ADD CONSTRAINT `booked_ibfk_2` FOREIGN KEY (`booked_user`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `freetime`
--
ALTER TABLE `freetime`
  ADD CONSTRAINT `freetime_ibfk_1` FOREIGN KEY (`freetime_user`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
