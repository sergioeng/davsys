-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2014 at 04:54 
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dermavance`
--

-- --------------------------------------------------------

--
-- Table structure for table `colaboradores`
--

CREATE TABLE IF NOT EXISTS `colaboradores` (
  `colaborador_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `tipo` varchar(1) NOT NULL DEFAULT 'F',
  `eh_medico` varchar(1) NOT NULL DEFAULT 'N',
  `endereco` varchar(40) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `tel_fix` varchar(15) NOT NULL,
  `tel_cel` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `data_nas` date NOT NULL,
  `data_alt` date NOT NULL,
  PRIMARY KEY (`colaborador_id`),
  UNIQUE KEY `colaborador_id` (`colaborador_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `colaboradores`
--

INSERT INTO `colaboradores` (`colaborador_id`, `username`, `password`, `nome`, `tipo`, `eh_medico`, `endereco`, `cidade`, `estado`, `cep`, `tel_fix`, `tel_cel`, `email`, `data_nas`, `data_alt`) VALUES
(1, 'sergio', 'xxxx', 'Sergio Ricardo de Oliveira Eng', 'S', 'N', 'Rua Gilberto Cardoso, 230 ap 904', 'Rio de Janeiro', 'RJ', '22430-070', '111111111111', '21 99603-0963', 'sro.eng@gmail.com', '1961-10-09', '2014-08-13'),
(7, 'sandra', 'duraes', 'Sandra Maria Barbosa Duraes', 'S', 'S', 'Rua Gilberto Cardoso, 230 ap 904', 'Rio de Janeiro', 'RJ', '22430070', '2111111111111', '222222222222222', 'duraesandra@gmail.com', '1962-03-01', '2014-08-13'),
(14, 'xanadu', '', '', '0', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session` varchar(32) NOT NULL,
  `colaborador_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session`, `colaborador_id`, `username`) VALUES
('g8e6bf5j1hotmfj4fuum7igh11', 1, 'sergio');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
