-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2011 at 09:53 AM
-- Server version: 5.5.8
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mypbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `batting`
--

DROP TABLE IF EXISTS `batting`;
CREATE TABLE IF NOT EXISTS `batting` (
  `id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `playerID` mediumint(5) DEFAULT NULL,
  `gameID` mediumint(5) DEFAULT NULL,
  `seasonID` mediumint(5) DEFAULT NULL,
  `pa` tinyint(8) DEFAULT NULL,
  `bb` tinyint(8) DEFAULT NULL,
  `sol` tinyint(8) DEFAULT NULL,
  `sos` tinyint(8) DEFAULT NULL,
  `runs` tinyint(8) DEFAULT NULL,
  `1b` tinyint(8) DEFAULT NULL,
  `2b` tinyint(8) DEFAULT NULL,
  `3b` tinyint(8) DEFAULT NULL,
  `hr` tinyint(8) DEFAULT NULL,
  `rbi` tinyint(8) DEFAULT NULL,
  `sac` tinyint(8) DEFAULT NULL,
  `hbp` tinyint(8) DEFAULT NULL,
  `obe` tinyint(8) DEFAULT NULL,
  `steals` tinyint(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `batting`
--


-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `gameID` mediumint(5) NOT NULL AUTO_INCREMENT,
  `seasonID` mediumint(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `team` varchar(25) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`gameID`),
  UNIQUE KEY `gameID` (`gameID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gameID`, `seasonID`, `date`, `team`) VALUES
(1, 1, '2011-05-14', 'FOTOBY');

-- --------------------------------------------------------

--
-- Table structure for table `pitching`
--

DROP TABLE IF EXISTS `pitching`;
CREATE TABLE IF NOT EXISTS `pitching` (
  `id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `playerID` mediumint(5) DEFAULT NULL,
  `gameID` mediumint(5) DEFAULT NULL,
  `seasonID` mediumint(5) DEFAULT NULL,
  `win` tinyint(5) DEFAULT NULL,
  `loss` tinyint(5) DEFAULT NULL,
  `save` tinyint(5) DEFAULT NULL,
  `nd` tinyint(5) DEFAULT NULL,
  `ip` float DEFAULT NULL,
  `runs` tinyint(5) DEFAULT NULL,
  `er` tinyint(5) DEFAULT NULL,
  `bb` tinyint(5) DEFAULT NULL,
  `sol` tinyint(5) DEFAULT NULL,
  `sos` tinyint(5) DEFAULT NULL,
  `batters` tinyint(5) DEFAULT NULL,
  `hits` tinyint(5) DEFAULT NULL,
  `hr` tinyint(5) DEFAULT NULL,
  `gs` tinyint(5) DEFAULT NULL,
  `hbp` tinyint(5) DEFAULT NULL,
  `shut` tinyint(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pitching`
--


-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `playerID` mediumint(5) NOT NULL AUTO_INCREMENT,
  `last` varchar(25) DEFAULT NULL,
  `first` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`playerID`),
  UNIQUE KEY `playerID` (`playerID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playerID`, `last`, `first`) VALUES
(13, 'ê°•', 'ê¹€'),
(12, 'ìŠ¹í‘œ', 'í™'),
(11, 'í˜¸ë™', 'ê³½'),
(14, 'ì‚¬ì´ëª¬', 'ìž„'),
(15, 'í˜•ì¤€', 'ì‹¬'),
(16, 'ê´‘í˜„', 'ê¹€'),
(17, 'ê´‘ì‹', 'ê¹€'),
(18, 'ìž¬í•™', 'ì´'),
(19, 'ì˜í˜¸', 'ê¹€'),
(20, 'ì¢…ì„œ', 'ì´'),
(21, 'ì¼ì„­', 'ì´'),
(22, 'ë…¸ì•„', 'ë°•'),
(23, 'ìží›ˆ', 'êµ¬'),
(24, 'í˜„ë•', 'ë¬¸');

-- --------------------------------------------------------

--
-- Table structure for table `playersinseason`
--

DROP TABLE IF EXISTS `playersinseason`;
CREATE TABLE IF NOT EXISTS `playersinseason` (
  `playerID` mediumint(5) NOT NULL DEFAULT '0',
  `seasonID` mediumint(5) NOT NULL DEFAULT '0',
  KEY `playerID` (`playerID`),
  KEY `seasonID` (`seasonID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `playersinseason`
--


-- --------------------------------------------------------

--
-- Table structure for table `season`
--

DROP TABLE IF EXISTS `season`;
CREATE TABLE IF NOT EXISTS `season` (
  `seasonID` mediumint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`seasonID`),
  UNIQUE KEY `seasonID` (`seasonID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`seasonID`, `name`) VALUES
(1, '2011');
