-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2015 at 12:30 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `userwallposts`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Comment` text NOT NULL,
  `Status` text,
  `submitted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PostId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Id`, `Comment`, `Status`, `submitted_at`, `PostId`, `UserId`) VALUES
(1, 'hi there ', 'publish', '2015-07-25 09:25:31', 12, 1),
(2, 'i am good ', 'publish', '2015-07-25 12:43:15', 12, 5),
(3, 'hegheee', 'publish', '2015-07-25 14:00:18', 13, 1),
(4, 'hrhrhrhrrhh', 'publish', '2015-07-25 14:00:51', 12, 4),
(5, 'me to :) ', 'publish', '2015-07-26 16:53:36', 12, 5),
(6, 'goo very good', 'publish', '2015-07-26 16:57:36', 18, 5),
(7, 'greattttttttt yar', 'publish', '2015-07-26 17:01:00', 13, 5),
(8, 'good ................', 'publish', '2015-07-26 17:01:16', 23, 5),
(9, 'koi to bolo........', 'publish', '2015-07-26 17:01:36', 18, 5);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `UserId` int(10) NOT NULL,
  `Description` text NOT NULL,
  `Status` varchar(55) NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes_count` int(11) NOT NULL,
  `comments_count` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Id`, `UserId`, `Description`, `Status`, `submitted_at`, `likes_count`, `comments_count`) VALUES
(12, 1, 'hi guy''s what''s up ..................?', 'publish', '2015-07-25 06:18:33', 0, 0),
(13, 1, 'hello i am good what about you men ............', 'publish', '2015-07-25 06:19:31', 0, 0),
(14, 4, 'Hi this is riahama malik , getting bore where are you guys .........', 'publish', '2015-07-25 06:21:22', 0, 0),
(15, 4, 'hahhaahahhaha', 'publish', '2015-07-25 06:21:33', 0, 0),
(16, 5, 'virat is here dosto chale kya ?', 'publish', '2015-07-25 06:22:13', 0, 0),
(17, 5, 'kya yar masts dfdfl;sfflfdsfdsf;d', 'publish', '2015-07-25 06:22:26', 0, 0),
(18, 2, 'hello i am karana , not kikikiiiranannnnnnn .', 'publish', '2015-07-25 06:24:02', 0, 0),
(19, 2, 'Mastt tha na , heheehehehehe...................', 'publish', '2015-07-25 06:24:18', 0, 0),
(20, 3, 'Rohit name hai mera , kyta karu pitaji ko aur koi name nahi mila ..........', 'publish', '2015-07-25 06:25:22', 0, 0),
(21, 3, 'Awesom hu yar ....................', 'publish', '2015-07-25 06:25:39', 0, 0),
(22, 3, 'I am done', 'publish', '2015-07-25 08:01:39', 0, 0),
(23, 1, 'hi guy''s what''s up ..................?', 'publish', '2015-07-25 08:09:55', 0, 0),
(24, 4, 'hello i am good what about you men ............', 'publish', '2015-07-25 19:55:44', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(55) NOT NULL,
  `UserName` varchar(55) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Name`, `UserName`, `Password`, `Email`) VALUES
(1, 'dev sharma', 'devd', 'dev@123', 'dev@gmail.com'),
(2, 'karan sharma', 'karan', 'dev@123', 'karan@gmail.com'),
(3, 'rohit sharma', 'rohit', 'dev@123', 'rohit@gmail.com'),
(4, 'rihana jolly', 'rihana', 'dev@123', 'rihana@gamil.com'),
(5, 'virat kohli', 'virat', 'dev@123', 'virat@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
