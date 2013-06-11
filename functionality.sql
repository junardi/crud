-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2013 at 12:17 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `functionality`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(75) NOT NULL,
  `last_name` varchar(75) NOT NULL,
  `middle_name` varchar(75) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(75) NOT NULL,
  `role` varchar(75) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date_registered` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `middle_name`, `gender`, `email`, `role`, `username`, `password`, `date_registered`) VALUES
(41, 'ssdsdsd', 'sdsds', 'sdsd', 'male', 'sdsd@yahoo.com', 'admin', 'dsdsd', 'c9e1144e1961dcab3458068f12ef2038b8ae29f6', '2013-06-08'),
(42, 'aadsd', 'sdsdsd', 'sdsd', 'female', 'ssdsdsdsd@gmail.com', 'user', 'sdsdsdsdsmd', '7196bf296ec4cb8c56bb16ca11f00f57d7758692', '2013-06-08'),
(50, 'mark', 'boribor', 'babon', 'male', 'mark.boribor73@gmail.com', 'user', 'markie', '82379017a05706e4f8b0ea9a4f000825675b4a65', '2013-06-10'),
(51, 'asasasmasm', 'asmmsdmsd', 'sdmsmdm', 'male', 'sdhshdhsdh@yahoo.com', 'user', 'asnasnansnasnnas', '82379017a05706e4f8b0ea9a4f000825675b4a65', '2013-06-10'),
(52, 'asasjasjajs', 'sdjdsjkkask', 'asdsdj', 'male', 'dsndnsdn@symbianize.com', 'user', 'asdnnsdnsdn', 'c9e1144e1961dcab3458068f12ef2038b8ae29f6', '2013-06-10'),
(53, 'assaasnansnasnsdns', 'sdmsdmsd', 'sdsd', 'male', 'mmmmmm@yahoo.com', 'user', 'sdsdmsdmsmd', '973bb03516f5d8f1160e1586b41c34abc7fda887', '2013-06-10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
