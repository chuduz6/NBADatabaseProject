-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2012 at 09:16 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nbagames`
--

-- --------------------------------------------------------

--
-- Table structure for table `SEASON`
--

CREATE TABLE `SEASON` (
  `SEASON` varchar(256) NOT NULL DEFAULT '',
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  PRIMARY KEY (`SEASON`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SEASON`
--

INSERT INTO `SEASON` VALUES('1974', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1975', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1976', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1977', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1978', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1979', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1980', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1981', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1982', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1983', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1984', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1985', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1986', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1987', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1988', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1989', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1990', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('1991', '1991-11-01', '1992-04-19');
INSERT INTO `SEASON` VALUES('1992', '1992-11-06', '1993-04-25');
INSERT INTO `SEASON` VALUES('1993', '1993-11-04', '1994-04-24');
INSERT INTO `SEASON` VALUES('1994', '1994-11-04', '1995-04-23');
INSERT INTO `SEASON` VALUES('1995', '1995-11-03', '1996-04-21');
INSERT INTO `SEASON` VALUES('1996', '1996-11-01', '1997-04-20');
INSERT INTO `SEASON` VALUES('1997', '1997-10-31', '1998-04-19');
INSERT INTO `SEASON` VALUES('1998', '1999-02-05', '1999-05-05');
INSERT INTO `SEASON` VALUES('1999', '1999-11-02', '2000-04-19');
INSERT INTO `SEASON` VALUES('2000', '2000-10-31', '2001-04-18');
INSERT INTO `SEASON` VALUES('2001', '2001-10-30', '2002-04-17');
INSERT INTO `SEASON` VALUES('2002', '2002-10-29', '2003-04-16');
INSERT INTO `SEASON` VALUES('2003', '2003-10-28', '2004-04-14');
INSERT INTO `SEASON` VALUES('2004', '2004-11-02', '2005-04-20');
INSERT INTO `SEASON` VALUES('2005', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('2006', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('2007', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('2008', '0000-00-00', '0000-00-00');
INSERT INTO `SEASON` VALUES('2009', '0000-00-00', '0000-00-00');
