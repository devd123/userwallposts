-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2015 at 04:11 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `UserId` int(10) NOT NULL,
  `Title` varchar(55) NOT NULL,
  `Desc` text NOT NULL,
  `Status` varchar(55) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Id`, `UserId`, `Title`, `Desc`, `Status`) VALUES
(5, 5, 'John Smith', 'john smith is a hero of the next comming movie of the bhubuwali series.', 'publish'),
(6, 5, 'Test case ', 'hello this is test case', 'publish'),
(7, 3, 'Hello Rohity', 'hi this is rohit from mnit , i am going to introduce myself  here............. ', 'publish'),
(8, 3, 'Say Thanks !', 'thanks', 'publish'),
(9, 1, 'Hello Dev', 'Hi , this is dev sharma ', 'publish'),
(10, 2, 'Karan Joher', 'my name is karan ............ joher is my sir name hehehee', 'publish');

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
