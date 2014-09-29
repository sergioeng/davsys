-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2013 at 10:28 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE IF NOT EXISTS `guests` (
  `gstID` int(11) NOT NULL AUTO_INCREMENT,
  `gstTotalScore` int(11) NOT NULL,
  `gstGamesPlayed` int(11) NOT NULL,
  `gstInsertDate` date NOT NULL,
  PRIMARY KEY (`gstID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`gstID`, `gstTotalScore`, `gstGamesPlayed`, `gstInsertDate`) VALUES
(2, 0, 0, '2013-12-02'),
(3, 0, 0, '2013-12-02'),
(4, 0, 0, '2013-12-02'),
(5, 0, 0, '2013-12-02'),
(6, 0, 0, '2013-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `questioncount`
--

CREATE TABLE IF NOT EXISTS `questioncount` (
  `qcID` int(11) NOT NULL AUTO_INCREMENT,
  `qcUserID` int(11) NOT NULL,
  `qcTriviaID` int(11) NOT NULL,
  `qcCount` int(11) NOT NULL,
  PRIMARY KEY (`qcID`),
  KEY `qcUserID` (`qcUserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `questioncount`
--

INSERT INTO `questioncount` (`qcID`, `qcUserID`, `qcTriviaID`, `qcCount`) VALUES
(	1	,	51	,	1	,	25	),
(	2	,	51	,	2	,	25	),
(	3	,	51	,	3	,	25	),
(	4	,	51	,	4	,	25	),
(	5	,	51	,	5	,	25	),
(	6	,	51	,	6	,	25	),
(	7	,	51	,	7	,	25	),
(	8	,	51	,	8	,	25	),
(	9	,	51	,	9	,	25	),
(	10	,	51	,	10	,	25	),
(	11	,	51	,	11	,	25	),
(	12	,	51	,	12	,	25	),
(	13	,	51	,	13	,	25	),
(	14	,	51	,	14	,	25	),
(	15	,	51	,	15	,	25	),
(	16	,	51	,	16	,	25	),
(	17	,	51	,	17	,	25	),
(	18	,	51	,	18	,	25	),
(	19	,	51	,	19	,	25	),
(	20	,	51	,	20	,	25	),
(	21	,	51	,	21	,	25	),
(	22	,	51	,	22	,	25	),
(	23	,	51	,	23	,	25	),
(	24	,	51	,	24	,	25	),
(	25	,	51	,	25	,	25	),
(	26	,	51	,	26	,	25	),
(	27	,	51	,	27	,	25	),
(	28	,	51	,	28	,	25	),
(	29	,	51	,	29	,	25	),
(	30	,	51	,	30	,	25	);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_email` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`session`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session`, `user_id`, `user_email`) VALUES
('ekjkl0ok1uoi2pofrij4cuakc0', 5, 'Guest5'),
('j6tj8cu77h0lej9glpvo6j0dq0', 6, 'Guest6'),
('e2hvg81jolc47edj6hau8mirm2', 51, 'tsmith');

-- --------------------------------------------------------

--
-- Table structure for table `tbltrivia`
--

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
(1, 'Question " # 1', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference1', 1, 1, 1, 4, 0, 0),
(2, 'Question ''# 2', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference2', 1, 1, 1, 4, 1, 1),
(3, 'Question # 3', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference3', 1, 2, 1, 2, 2, 0),
(4, 'Question # 4', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference4', 1, 1, 1, 1, 2, 1),
(5, 'Question # 5', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference5', 1, 0, 1, 1, 0, 0),
(6, 'Question # 6', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference6', 1, 2, 1, 3, 0, 0),
(7, 'Question # 7', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference7', 1, 5, 1, 1, 2, 1),
(8, 'Question # 8', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference8', 1, 3, 1, 3, 0, 1),
(9, 'Question # 9', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference9', 1, 2, 1, 1, 1, 1),
(10, 'Question # 10', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference10', 1, 2, 1, 0, 1, 1),
(11, 'Question # 11', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference11', 1, 3, 1, 2, 0, 1),
(12, 'Question # 12', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference12', 1, 2, 1, 4, 0, 0),
(13, 'Question # 13', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference13', 1, 2, 1, 4, 0, 1),
(14, 'Question # 14', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference14', 1, 1, 1, 4, 1, 3),
(15, 'Question # 15', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference15', 1, 3, 1, 2, 1, 0),
(16, 'Question # 16', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference16', 1, 3, 1, 0, 2, 1),
(17, 'Question # 17', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference17', 1, 2, 1, 3, 1, 0),
(18, 'Question # 18', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference18', 1, 2, 1, 0, 1, 0),
(19, 'Question # 19', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference19', 1, 5, 1, 1, 1, 0),
(20, 'Question # 20', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference20', 1, 2, 2, 1, 1, 2),
(21, 'Question # 21', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference21', 1, 3, 2, 1, 0, 0),
(22, 'Question # 22', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference22', 1, 2, 2, 3, 1, 0),
(23, 'Question # 23', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference23', 1, 3, 2, 2, 0, 0),
(24, 'Question # 24', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference24', 1, 2, 2, 1, 0, 0),
(25, 'Question # 25', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference25', 1, 4, 2, 1, 0, 2),
(26, 'Question # 26', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference26', 1, 2, 2, 1, 2, 1),
(27, 'Question # 27', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference27', 1, 2, 2, 4, 0, 0),
(28, 'Question # 28', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference28', 1, 1, 2, 4, 0, 1),
(29, 'Question # 29', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference29', 1, 0, 2, 3, 0, 0),
(30, 'Question # 30', 'Correct', 'Wrong1', 'Wrong2', 'Wrong3', 'Reference30', 1, 5, 2, 2, 0, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `trvusr`
--
CREATE TABLE IF NOT EXISTS `trvusr` (
`triviaID` int(11)
,`userID` int(11)
,`level` int(11)
,`count` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `btIndex` int(11) NOT NULL AUTO_INCREMENT,
  `btUser` varchar(20) NOT NULL,
  `btPass` varchar(20) NOT NULL,
  `btAge` int(4) NOT NULL,
  `btCountry` varchar(30) NOT NULL,
  `btGamesPlayed` int(11) NOT NULL,
  `btTotalScore` int(11) NOT NULL,
  `btappVersion` int(11) DEFAULT NULL,
  `btos` varchar(30) NOT NULL,
  `btTotalScoreWeb` int(11) DEFAULT NULL,
  `btGamesPlayedWeb` int(11) DEFAULT NULL,
  UNIQUE KEY `btIndex` (`btIndex`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33505 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`btIndex`, `btUser`, `btPass`, `btAge`, `btCountry`, `btGamesPlayed`, `btTotalScore`, `btappVersion`, `btos`, `btTotalScoreWeb`, `btGamesPlayedWeb`) VALUES
(51, 'tsmith', 'restore', 2004, 'United%20States', 25, 12100, NULL, '', 1900, 11),
(1043, 'Pouchie5683', 'lo6973rd', 1950, 'United%20States', 107, 76650, 0, '', NULL, NULL),
(1044, 'gphenry', 'malakapalli', 1982, 'India', 96, 71400, NULL, '', NULL, NULL),
(1045, 'darwarren04', '091804sd', 1975, 'United%20States', 6, 2900, NULL, '', NULL, NULL),
(1046, 'LASHON', 'JADEN321', 1976, 'United%20States', 12, 5400, NULL, '', NULL, NULL),
(1047, 'jrslive', 'rev2320', 1976, 'United%20States', 2, 800, NULL, '', NULL, NULL),
(1048, 'blackqueen', 'monica12', 1969, 'United%20States', 28, 14400, NULL, '', NULL, NULL),
(1049, 'weekkee', 'boldman', 1969, 'Philippines', 1, 500, NULL, '', NULL, NULL),
(1050, 'Mikerobinson', 'mns122211', 1980, 'United%20States', 3, 800, NULL, '', NULL, NULL),
(1051, 'yarbrough@aol.com', '0202557', 1955, 'United%20States', 12, 4900, NULL, '', NULL, NULL),
(1052, 'Larry_Roscoe', '54Forfun', 1957, 'United%20States', 2, 800, NULL, '', NULL, NULL),
(1053, 'clrobinson22', 'danny', 1968, 'United%20States', 1, 600, NULL, '', NULL, NULL),
(1054, 'lnoble', 'miamicah01', 1985, 'United%20States', 1, 400, NULL, '', NULL, NULL),
(1055, 'HunniBunches', 'purplekisses', 1987, 'United%20States', 1, 300, NULL, '', NULL, NULL),
(1056, 'emilomonatonso', 'emilomona1', 2004, 'Nigeria', 0, 0, NULL, '', NULL, NULL),
(1057, 'jsfinken', 'Homeschool1', 1964, 'United%20States', 0, 0, NULL, '', NULL, NULL),
(1058, 'Kellyjo39', 'dade199blur647', 1974, 'United%20States', 2, 500, NULL, '', NULL, NULL),
(1059, 'Zizka', 'obinna08', 1979, 'United%20States', 1, 300, NULL, '', NULL, NULL),
(1060, 'jajooy', 'timothy', 1966, 'United%20States', 1, 500, NULL, '', NULL, NULL),
(1061, 'ikecarpz', '040173', 2004, 'United%20States', 2, 1200, NULL, '', NULL, NULL),
(1062, 'bobbie1974', 'eterbug', 1974, 'United%20States', 105, 66800, NULL, '', NULL, NULL),
(1063, 'Kmtrans', 'morgan1', 1972, 'United%20States', 4, 2100, NULL, '', NULL, NULL),
(1064, 'tjlove', '12heaven', 2004, 'United%20States', 3, 1500, NULL, '', NULL, NULL),
(1065, 'Annette', 'family', 1980, 'United%20States', 11, 5500, 0, '', NULL, NULL),
(1066, 'Richard johnson', 'loverubies2198', 2004, 'United%20States', 2, 1000, NULL, '', NULL, NULL),
(1067, 'JoshuaF', 'longbeach', 1983, 'United%20States', 2, 1000, NULL, '', NULL, NULL),
(1068, 'danacarmax@yahoo.com', 'joshua', 1975, 'United%20States', 2, 400, NULL, '', NULL, NULL),
(1069, 'Claracbell', '1god1man', 1978, 'United%20States', 12, 7000, NULL, '', NULL, NULL),
(1070, 'redrozebud', 'thebible', 1969, 'United%20States', 1, 400, NULL, '', NULL, NULL),
(1071, 'Amo111', 'peanut', 1981, 'United%20States', 2, 800, NULL, '', NULL, NULL),
(51, 'sro.eng@gmail.com', 'worp33', 1961, 'United%20States', 1, 400, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `trvusr`
--
DROP TABLE IF EXISTS `trvusr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trvusr` AS select `t`.`triviaID` AS `triviaID`,`q`.`qcUserID` AS `userID`,`t`.`triviaLevel` AS `level`,`q`.`qcCount` AS `count` from (`tbltrivia` `t` join `questioncount` `q` on((`t`.`triviaID` = `q`.`qcTriviaID`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
