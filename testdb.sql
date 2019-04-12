-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 07:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--
CREATE DATABASE IF NOT EXISTS `testdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testdb`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(250) NOT NULL,
  `answer` varchar(250) DEFAULT NULL,
  `ans_id` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answer`, `ans_id`) VALUES
(1, 'Hypertext Markup Language', 1),
(2, 'Hometool Markup Language', 1),
(3, 'Hometask Markup Language', 1),
(4, 'Hypertext Makeup Language', 1),
(5, 'Cascading Style Sheets', 2),
(6, 'Collective Style Sheets', 2),
(7, 'Collaborative Style Sheets', 2),
(8, 'Cooperative Style Sheets', 2),
(9, 'Hyper Text Transfer Protocol', 3),
(10, 'Hyper Text Transmit Protocol', 3),
(11, 'Hyper Text Transmit Problem', 3),
(12, 'Hyper Text Transfer Program', 3),
(13, 'Domain Name System', 4),
(14, 'Domain Name Service', 4),
(15, 'Domestic Name Service', 4),
(16, 'Domain Name Space', 4),
(17, 'Reverse Address Resolution Protocol', 5),
(18, 'Reserve Address Resolution Protocol', 5),
(19, 'Reverse Address Receive Protocol', 5),
(20, 'Reserve Address Receive Protocol', 5),
(21, 'Dennis Ritchie', 6),
(22, 'Charles Babbage', 6),
(23, 'Charlie Babbage', 6),
(24, 'Ken Thompson', 6),
(25, 'Central Processing Unit', 7),
(26, 'Central Process Unit', 7),
(27, 'Central Programming Unit', 7),
(28, 'Central Processive Unit', 7),
(29, 'Electronic Erasable Read Only Memory', 8),
(30, 'Electrically Erasable Read Acces Memory', 8),
(31, 'Electrically Erasable Read Only Memory', 8),
(32, 'None of the above', 8),
(33, 'Synchronous Dynamic Random Access Memory', 9),
(34, 'Static Dynamic Random Access Memory', 9),
(35, 'Synchronous Dynamic Read Access Memory', 9),
(36, 'Special Dynamic Random Access Memory', 9),
(37, 'Transistors', 10),
(38, 'Vaccume Tubes', 10),
(39, 'LSI Chips', 10),
(40, 'ULSI Chips', 10),
(41, 'Optical Central Reader', 11),
(42, 'Optimized Character Reader', 11),
(43, 'Optical Character Reader', 11),
(44, 'Optical Character Response', 11),
(45, 'Scan Mails', 12),
(46, 'Scan Documents', 12),
(47, 'Scan Image', 12),
(48, 'Scan Answer Sheet', 12),
(49, 'An output device', 13),
(50, 'An online game', 13),
(51, 'An input device', 13),
(52, 'A memory unit', 13),
(53, 'OMR', 14),
(54, 'MICR', 14),
(55, 'OCR', 14),
(56, 'All of the above', 14),
(57, 'Sanner', 15),
(58, 'Touch screen monitor', 15),
(59, 'Speaker', 15),
(60, 'Digitizer', 15),
(61, 'OCR', 16),
(62, 'Dot matrix', 16),
(63, 'Daisy wheel', 16),
(64, 'Inkjet', 16),
(65, 'Scanner', 17),
(66, 'Keyboards', 17),
(67, 'Printers', 17),
(68, 'Monitors', 17),
(69, 'Byte', 18),
(70, 'Nibble', 18),
(71, 'Kilo Byte', 18),
(72, 'Micro Byte', 18),
(73, '4 Bits', 19),
(74, '2 Bits', 19),
(75, '8 Bits', 19),
(76, '16 Bits', 19),
(77, 'Unique Serial Bus', 20),
(78, 'Universal Synchronsed Bus', 20),
(79, 'Universal Serial Bus', 20),
(80, 'Universal Serial Buffer', 20);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `attemt` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `password`, `attemt`) VALUES
('arpan', 'arpan', 3),
('aaaaa', 'aaaaa', 1),
('ooooo', 'ooooo', 0),
('assss', 'assss', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(250) NOT NULL,
  `question` varchar(250) DEFAULT NULL,
  `ans_id` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question`, `ans_id`) VALUES
(1, 'What does HTML stand for?', 1),
(2, 'What does CSS stand for?', 5),
(3, 'What does HTTP stand for?', 9),
(4, 'What does DNS stand for?', 13),
(5, 'What does RARP stand for?', 17),
(6, 'Who is the Father of Computer?', 22),
(7, 'What is the full form of CPU?', 25),
(8, 'What is the full form of EEPROM?', 31),
(9, 'What is the full form of SDRAM?', 33),
(10, 'Which electronics component is used in first generation computers?', 38),
(11, 'What is the full form of OCR?', 43),
(12, 'Why OMR is used?', 48),
(13, 'Joystick is ---?', 51),
(14, 'Which input device is used to scan cheque in banks?', 54),
(15, 'Which can be the input and output devices both?', 58),
(16, 'Which is not a valid type of printer?', 61),
(17, 'Impact and Non Impact are related to?', 67),
(18, 'Which is the smallest memory measurement unit in given options?', 70),
(19, 'One Nibble has?', 73),
(20, ' What is the full form of USB?', 79);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `num_at` int(11) NOT NULL DEFAULT '0',
  `username` varchar(250) NOT NULL,
  `totalques` int(250) DEFAULT NULL,
  `answerscorrect` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`num_at`, `username`, `totalques`, `answerscorrect`) VALUES
(1, 'aaaaa', 1, 1),
(1, 'arpan', 1, 1),
(1, 'assss', 4, 0),
(2, 'arpan', 2, 2),
(3, 'arpan', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`num_at`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
