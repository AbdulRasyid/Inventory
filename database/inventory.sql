-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2012 at 01:06 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `lastname` char(50) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `name`, `lastname`, `username`, `password`) VALUES
(1, 'Ryan', 'Dingle', 'ryandingle09', '4222012f01debed5f81ab2126e178683822d560e'),
(5, 'Eeron', 'Temporal', 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33'),
(6, 'jolo', 'garceniego', 'admin3', '33aab3c7f01620cade108f488cfd285c0e62c1ec'),
(7, 'marg', 'caco', 'admin4', 'ea053d11a8aad1ccf8c18f9241baeb9ec47e5d64'),
(11, 'angela', 'francisco', 'admin6', '16b4d433eeef71946e93341822786a196549c2c5');

-- --------------------------------------------------------

--
-- Table structure for table `anounced`
--

CREATE TABLE IF NOT EXISTS `anounced` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `by_admin` int(11) NOT NULL,
  `anounced` text NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE IF NOT EXISTS `avatar` (
  `avatar_id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar_user_id` int(11) NOT NULL,
  `avatar_name` varchar(255) NOT NULL,
  PRIMARY KEY (`avatar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `by_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `by` int(11) NOT NULL,
  `body` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ordinary_user`
--

CREATE TABLE IF NOT EXISTS `ordinary_user` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_firstname` varchar(50) NOT NULL,
  `o_lastname` varchar(50) NOT NULL,
  `o_email` varchar(50) NOT NULL,
  `o_mobile` int(20) NOT NULL,
  `o_occupation` text NOT NULL,
  `o_username` varchar(255) NOT NULL,
  `o_password` varchar(255) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ordinary_user`
--

INSERT INTO `ordinary_user` (`o_id`, `o_firstname`, `o_lastname`, `o_email`, `o_mobile`, `o_occupation`, `o_username`, `o_password`) VALUES
(2, 'visitor1', 'visitor', 'visitor1@yahoo.com', 2147483647, 'programmer', 'visitor1', 'bc2feca480365e4f84cf98b7ead4ee1c66f58cfc'),
(3, 'visitor3', 'visitor3', 'visitor3@yahoo.com', 123456, 'visitor3', 'visitor3', 'de94990f80f7def89189c26bf57862d1ee842868');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `by_user` int(11) NOT NULL,
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_model` varchar(255) NOT NULL,
  `product_stocks` int(11) NOT NULL,
  `product_serial` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `replay`
--

CREATE TABLE IF NOT EXISTS `replay` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_f_id` int(11) NOT NULL,
  `r_m_id` int(11) NOT NULL,
  `replay` text NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(50) NOT NULL,
  `last_name` char(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`, `email_address`, `date`) VALUES
(13, 'arvie', 'abagon', 'encoder2', 'b55aaa0879b4e19c41b6c12b212b454ecb905db8', 'encoder2@yahoo.com', '2012-03-08 21:37:04'),
(14, 'denmark', 'nonan', 'encoder3', '9dcee492208431d74d9169a071db4471c53ff3d0', 'nonan@gmail.com', '2012-03-08 21:37:40'),
(15, 'keith', 'ilagan', 'encoder4', '27ae8b27bc18d9416c413c6a1525f01faef41df3', 'ilagan@yahoo.com', '2012-03-08 21:39:44'),
(17, 'angela', 'francisco', 'encoder6', '37fb925948f5ad4ea91ce052046e73adf4b73b58', 'angela@yahoo.com', '2012-03-08 21:40:54'),
(18, 'marvin', 'franciso', 'enoder7', '56aae397a220af8d5a18e8efbadb5e436536c3aa', 'marvin@yahoo.com', '2012-03-08 21:41:32'),
(19, 'kristina', 'junio', 'encoder8', '047b1483da8bc5aa3147bfc857d3e7a27ae741b4', 'chariss@yahoo.com', '2012-03-08 21:42:28'),
(20, 'king', 'amador', 'encoder9', '38e07d7841601841542d2913c85e286888421b08', 'amador@yahoo.com', '2012-03-08 21:43:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
