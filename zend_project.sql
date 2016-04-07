-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2016 at 05:24 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zend_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrequest`
--

CREATE TABLE IF NOT EXISTS `carrequest` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `date_from` varchar(200) NOT NULL,
  `date_to` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`user_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `rate` float NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `description`, `image`, `rate`, `latitude`, `longitude`, `country_id`) VALUES
(3, 'alexx', 'description description description description description description description description description description ', '/uploads/cities/alexx.jpeg', 80, 22, 44, 1),
(8, 'matrouh', 'description description description description description description description description ', '/uploads/cities/matrouh.jpeg', 4, 77, 678, 5),
(10, 'cairo', 'description description description description description description description description description description description description description description description description description description description description ', '/uploads/cities/cairo.jpeg', 90, 21, 22, 5);

-- --------------------------------------------------------

--
-- Table structure for table `city_rate`
--

CREATE TABLE IF NOT EXISTS `city_rate` (
  `user_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `value` float NOT NULL,
  KEY `user_id` (`user_id`,`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `experience_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`experience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `rate` float NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `rate`, `image`) VALUES
(1, 'egypt', 100, '/uploads/countries/egypt.jpeg'),
(4, 'brazil', 40, '/uploads/countries/brazil.jpeg'),
(5, 'Africa', 70, '/uploads/countries/Africa.jpeg'),
(11, 'londonn', 22, '/uploads/countries/londonn.jpeg'),
(12, 'southAmerica', 90, '/uploads/countries/southAmerica.jpeg'),
(13, 'almaniaa', 90, '/uploads/countries/almaniaa.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `country_rate`
--

CREATE TABLE IF NOT EXISTS `country_rate` (
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `value` float NOT NULL,
  KEY `user_id` (`user_id`,`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `city_id`) VALUES
(4, 'four seasons', 3),
(5, 'makka', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hotelreserve`
--

CREATE TABLE IF NOT EXISTS `hotelreserve` (
  `hotel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_from` varchar(200) NOT NULL,
  `date_to` varchar(200) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`),
  KEY `hotel_id` (`hotel_id`,`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `description`, `city_id`) VALUES
(1, 'camp shezarr', 'description description description ', 3),
(3, 'mhatet masr', 'description description description description description ', 3),
(5, 'ibrahmya', 'beside my home', 3);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `available` enum('1','0') NOT NULL,
  `bed_num` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT 'facebook',
  `password` varchar(300) NOT NULL,
  `gender` varchar(50) NOT NULL DEFAULT 'male',
  `type` enum('1','0') NOT NULL DEFAULT '0',
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `gender`, `type`, `is_active`) VALUES
(5, 'mema', 'manar@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'female', '1', '1'),
(7, 'aya', 'aya@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'female', '0', '1'),
(8, 'esraa', 'esraa@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'female', '1', '1'),
(9, 'Aya Aly Hassan', 'facebook', '0e3a092b376db649eb9f265439d274db', 'male', '0', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
