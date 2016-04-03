-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2016 at 10:06 PM
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
(2, 'cairo', 'description description description description description ', 'cat2.jpeg', 90, 0, 0, 1),
(3, 'alex', 'description description description description description description description description description description ', 'cat3.jpeg', 80, 0, 0, 1),
(6, 'tanta', 'description description description description description description description description description description description description description description description ', NULL, 3, 12, 23, 7),
(7, 'damanhor', 'description description description description description description description description description description description description ', '/uploads/countries/damanhor.jpeg', 2, 11, 22, 6),
(8, 'matrouh', 'description', '/uploads/countries/matrouh.jpeg', 4, 77, 678, 5),
(9, 'asyot', 'description description description ', '/uploads/countries/asyot.jpeg', 4, 11, 44, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `rate`, `image`) VALUES
(1, 'egypt', 100, 'nature1.jpeg'),
(2, 'india', 50, 'nature3.jpeg'),
(3, 'south america', 30, 'nature2.jpeg'),
(4, 'brazil', 40, 'nature4.jpeg'),
(5, 'africa', 70, 'cat1.jpeg'),
(6, 'frane', 80, 'cat2.jpeg'),
(7, 'almania', 90, 'cat3.jpeg'),
(8, 'london', 3, '/uploads/cities/london.jpeg');

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
(2, 'helton', 2),
(3, 'sheraton', 2),
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `description`, `city_id`) VALUES
(1, 'camp shezarr', 'description description description ', 3),
(3, 'mhatet masr', 'description description description description description ', 3),
(4, 'san stifano', 'description description description description description description ', 2),
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
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `type` enum('1','0') NOT NULL DEFAULT '0',
  `is_active` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `gender`, `type`, `is_active`) VALUES
(1, 'manar', 'manar@yahoo.com', '123', '', '1', '1'),
(2, 'aya', 'aya@yahoo.com', '123', '', '0', '1'),
(5, 'mema', 'manar@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'female', '1', '1'),
(7, 'aya', 'aya@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '0', '1'),
(8, 'esraa', 'esraa@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '1', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
