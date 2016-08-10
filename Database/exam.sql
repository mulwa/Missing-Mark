-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2016 at 02:25 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL,
  `regNo` varchar(50) NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `year` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `regNo`, `courseCode`, `year`) VALUES
(24, '', '25', 4.1),
(25, '', '25', 4.1),
(23, 'BIT-001-4185-2015', '25', 4.1);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE IF NOT EXISTS `complain` (
  `id` int(11) NOT NULL,
  `regNo` varchar(50) NOT NULL,
  `complainDescription` text NOT NULL,
  `unit` text NOT NULL,
  `datePosted` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `regNo`, `complainDescription`, `unit`, `datePosted`, `status`) VALUES
(1, '[object HTMLInputElement]', 'compalin 1', 'software eng', '2016-08-09', 'Solved'),
(2, 'BIT-001-4185-2014', 'musinnn', 'java', '2016-08-09', 'Solved'),
(3, 'BIT-001-4185-2014', 'complain 2', 'all', '2016-08-09', 'Solved');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseCode` varchar(10) NOT NULL,
  `courseName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseCode`, `courseName`) VALUES
('025', 'Diploma of Business and Information Technology '),
('25', 'Bachelor of Business and Information Technology ');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `id` int(11) NOT NULL,
  `regNo` varchar(20) NOT NULL,
  `softwareEng` int(11) NOT NULL,
  `webDevelopment` int(11) NOT NULL,
  `oop` int(11) NOT NULL,
  `economics` int(11) NOT NULL,
  `statistics` int(11) NOT NULL,
  `databaseManagement` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `regNo`, `softwareEng`, `webDevelopment`, `oop`, `economics`, `statistics`, `databaseManagement`) VALUES
(3, 'BIT-001-4185-2014', 50, 62, 0, 0, 45, 20),
(4, 'BIT-001-7801-2012', 10, 25, 52, 0, 15, 69);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `lecId` varchar(50) NOT NULL,
  `lecName` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecId`, `lecName`, `mobile`, `username`, `password`) VALUES
('oo', 'oo', 'oo', 'mulwatech@gmail.com', 'mm'),
('12', 'mulwa', '0707200314', 'mulwatech@gmail.com', '22');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `registrationNumber` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`registrationNumber`, `surname`, `firstname`, `courseCode`, `mobile`, `email`, `password`) VALUES
('BIT-001-4185-2014', 'MULWA', 'IRENE', '25', '0707-200-3', 'irene@gmail.com', '10'),
('BIT-001-7801-2012', 'joseph', 'mwangi', '25', '0714-569-301', 'mul@gmail.com', '12');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unitCode` varchar(30) NOT NULL,
  `unitName` varchar(50) NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `year` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unitCode`, `unitName`, `courseCode`, `year`) VALUES
('01', 'Software Engineering ', '25', 4.1),
('02', 'Web Development', '25', 4.1),
('03', 'Object Oriented Programing', '25', 4.1),
('04', 'Economics', '25', 4.1),
('05', 'Statisctics', '25', 4.1),
('06', 'Database Management', '25', 4.1);

-- --------------------------------------------------------

--
-- Table structure for table `yearfourone`
--

CREATE TABLE IF NOT EXISTS `yearfourone` (
  `id` int(6) unsigned NOT NULL,
  `regNo` varchar(30) DEFAULT NULL,
  `courseCode` varchar(30) DEFAULT NULL,
  `year` float DEFAULT NULL,
  `SoftwareEngineering` int(2) NOT NULL,
  `WebDevelopment` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yearfourone`
--

INSERT INTO `yearfourone` (`id`, `regNo`, `courseCode`, `year`, `SoftwareEngineering`, `WebDevelopment`) VALUES
(1, 'BIT-001-4185-2015', '25', 4.1, 50, 80),
(2, '', '25', 4.1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`), ADD KEY `regNo` (`regNo`,`courseCode`,`year`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`registrationNumber`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitCode`), ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `yearfourone`
--
ALTER TABLE `yearfourone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `yearfourone`
--
ALTER TABLE `yearfourone`
  MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
