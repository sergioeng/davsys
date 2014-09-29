-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2013 at 06:36 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tbltrivia`
--
DROP TABLE tbltrivia;
CREATE TABLE IF NOT EXISTS `tbltrivia` (
  `triviaID` int(11) NOT NULL AUTO_INCREMENT,
  `triviaQuestion` text NOT NULL,
  `triviaCorrAnswer` text NOT NULL,
  `triviaWrong1` text NOT NULL,
  `triviaWrong2` text NOT NULL,
  `triviaWrong3` text NOT NULL,
  `triviaReference` text NOT NULL,
  `triviaGameType` int(11) NOT NULL,
  `triviaAnsCorr` int(11) NOT NULL,
  `triviaLevel` int(11) NOT NULL,
  `triviaAnsWr1` int(11) NOT NULL,
  `triviaAnsWr2` int(11) NOT NULL,
  `triviaAnsWr3` int(11) NOT NULL,
  UNIQUE KEY `triviaID` (`triviaID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=897 ;

--
-- Dumping data for table `tbltrivia`
--

INSERT INTO `tbltrivia` (`triviaID`, `triviaQuestion`, `triviaCorrAnswer`, `triviaWrong1`, `triviaWrong2`, `triviaWrong3`, `triviaReference`, `triviaGameType`, `triviaAnsCorr`, `triviaLevel`, `triviaAnsWr1`, `triviaAnsWr2`, `triviaAnsWr3`) VALUES
(1,  'Question # 1',  'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 1', 1, 0, 1, 0, 0, 0),
(2,  'Question # 2',  'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 2', 1, 0, 1, 0, 0, 0),
(3,  'Question # 3',  'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 3', 1, 0, 1, 0, 0, 0),
(4,  'Question # 4',  'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 4', 1, 0, 1, 0, 0, 0),
(5,  'Question # 5',  'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 5', 1, 0, 1, 0, 0, 0),
(6,  'Question # 6',  'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 6', 1, 0, 1, 0, 0, 0),
(7,  'Question # 7',  'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 7', 1, 0, 1, 0, 0, 0),
(8,  'Question # 8',  'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 8', 1, 0, 1, 0, 0, 0),
(9,  'Question # 9',  'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 9', 1, 0, 1, 0, 0, 0),
(10, 'Question # 10', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 10', 1, 0, 1, 0, 0, 0),
(11, 'Question # 11', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 11', 1, 0, 1, 0, 0, 0),
(12, 'Question # 12', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 12', 1, 0, 1, 0, 0, 0),
(13, 'Question # 13', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 13', 1, 0, 1, 0, 0, 0),
(14, 'Question # 14', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 14', 1, 0, 1, 0, 0, 0),
(15, 'Question # 15', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 15', 1, 0, 1, 0, 0, 0),
(16, 'Question # 16', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 16', 1, 0, 1, 0, 0, 0),
(17, 'Question # 17', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 17', 1, 0, 1, 0, 0, 0),
(18, 'Question # 18', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 18', 1, 0, 1, 0, 0, 0),
(19, 'Question # 19', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 19', 1, 0, 1, 0, 0, 0),
(20, 'Question # 20', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 20', 1, 0, 2, 0, 0, 0),
(21, 'Question # 21', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 21', 1, 0, 2, 0, 0, 0),
(22, 'Question # 22', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 22', 1, 0, 2, 0, 0, 0),
(23, 'Question # 23', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 23', 1, 0, 2, 0, 0, 0),
(24, 'Question # 24', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 24', 1, 0, 2, 0, 0, 0),
(25, 'Question # 25', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 25', 1, 0, 2, 0, 0, 0),
(26, 'Question # 26', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 26', 1, 0, 2, 0, 0, 0),
(27, 'Question # 27', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 27', 1, 0, 2, 0, 0, 0),
(28, 'Question # 28', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 28', 1, 0, 2, 0, 0, 0),
(29, 'Question # 29', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 29', 1, 0, 2, 0, 0, 0),
(30, 'Question # 30', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference 30', 1, 0, 2, 0, 0, 0);


-- --------------------------------------------------------

--
-- Table structure for table `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
