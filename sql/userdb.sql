-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 08:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_code` int(10) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `department_head` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_code`, `department_name`, `department_head`) VALUES
(1, 'Fundamentals of Nursing', '1234'),
(2, 'Medical Nursing', '0002'),
(3, 'Surgical Nursing', '0003'),
(4, 'Maternal & Child Care Nursing', '0004'),
(5, 'Management & Research', '0005');

-- --------------------------------------------------------

--
-- Table structure for table `english`
--

CREATE TABLE `english` (
  `date` date DEFAULT NULL,
  `fileUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `english`
--

INSERT INTO `english` (`date`, `fileUrl`) VALUES
('2020-08-25', 'DIgital_Electronics_Assignment (2).pdf'),
('2020-08-25', 'creational design patterns II.pptx');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `folder_name` varchar(100) NOT NULL,
  `clicks` int(100) NOT NULL,
  `imageID` varchar(199) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`name`, `description`, `folder_name`, `clicks`, `imageID`, `time_stamp`) VALUES
('Ythara 99', 'yathra - symphony of the wind next level', 'Ythara 99', 1002, 'Ythara 99/n4.jpg', '2020-09-10 06:12:12'),
('New Gallery', 'Newest Gallery', 'New Gallery', 2, 'New Gallery/bg-999.jpg', '2020-09-13 18:14:54'),
('Ythara 999', 'yathra - symphony of the wind \" the next next level - ft . ts\"', 'Ythara 999', 8901, 'Ythara 999/new.jpg', '2020-09-21 05:39:45'),
('Piritha', 'yathra - symphony of the wind', 'Pirith', 1011, 'Pirith/IMG_2439.jpg', '2020-09-21 05:40:00'),
('Yathra 9999', 'The next next level - ft jorsi', 'Yathra 9999', 10008, 'Yathra 9999/85.jpg', '2020-09-23 11:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `index_no` varchar(10) NOT NULL,
  `department` int(2) NOT NULL,
  `post` varchar(50) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `title` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`index_no`, `department`, `post`, `degree`, `title`) VALUES
('0001', 1, 'The Principal', 'Bsc. Nursing', 'Mr'),
('0002', 2, 'Senior Lecturer', 'Bsc. Nursing', 'Mrs'),
('0003', 3, 'Senior Lecturer', 'Bsc. Nursing', 'Mrs'),
('0004', 4, 'Senior Lecturer', 'Bsc. Nursing', 'Ms'),
('0005', 5, 'Senior Lecturer', 'Bsc. Nursing', 'Ms'),
('0006', 1, 'Lecturer', 'Bsc. Nursing', 'Mr'),
('0007', 2, 'Lecturer', 'Bsc. Nursing', 'Mrs'),
('0008', 3, 'Assistant Lecturer', 'Bsc. Nursing', 'Mr'),
('0009', 4, 'Assistant Lecturer', 'Bsc. Nursing', 'Mr'),
('1234', 1, 'Senior Lecturer', 'Bsc. Nursing(Hons)', 'Mr'),
('1700', 5, 'Assistant Lecturer', 'Bsc. Nursing', 'Mrs');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_code` int(5) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `year` int(2) NOT NULL,
  `department` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_code`, `module_name`, `year`, `department`) VALUES
(11, 'English', 1, 5),
(12, 'Psychology', 1, 3),
(13, 'Sociology', 1, 3),
(211, 'Anatomy & Physiology', 1, 2),
(212, 'Microbiology', 1, 2),
(213, 'Pathology', 1, 2),
(214, 'Pharmacology I', 1, 1),
(215, 'Pharmacology II', 1, 1),
(216, 'Nutrition', 1, 1),
(217, 'IT', 1, 5),
(223, 'First Aid', 1, 1),
(224, 'First Aid Practice', 2, 1),
(225, 'Fundamental of Nursing', 1, 1),
(226, 'Fundamental of Nursing Practice', 1, 1),
(227, 'Gynecological Nursing & Gynecology', 2, 4),
(228, 'Gynecological Nursing Practice', 2, 4),
(229, 'History of Nursing', 1, 3),
(2210, 'Medical Nursing & Medicine', 1, 2),
(2211, 'Medical Nursing Practice', 2, 2),
(2212, 'Mental Health & Psychiatric Nursing', 3, 1),
(2213, 'Mental Health & Psychiatric Nursing Practice', 3, 1),
(2214, 'Obstetric Nursing & Obstetric', 2, 4),
(2215, 'Obstetric Nursing Practice', 2, 4),
(2216, 'Paediatric Nursing & Paediatric', 2, 4),
(2217, 'Paediatric Practice', 2, 4),
(2218, 'Ethics and Professional Adjustment', 1, 5),
(2219, 'Ward Management', 3, 5),
(2220, 'Ward Management Practice', 3, 5),
(2221, 'Research in Nursing', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `index_no` varchar(10) NOT NULL,
  `notification` varchar(1000) NOT NULL,
  `seen` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`index_no`, `notification`, `seen`) VALUES
('0001', 'a:3:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:14:\"789           \";}}', '0'),
('0002', 'a:3:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:14:\"789           \";}}', '3'),
('0003', 'a:3:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:14:\"789           \";}}', '3'),
('0004', 'a:3:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:14:\"789           \";}}', '3'),
('0005', 'a:3:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:14:\"789           \";}}', '3'),
('0006', 'a:3:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:14:\"789           \";}}', '3'),
('0007', 'a:3:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:14:\"789           \";}}', '3'),
('0008', 'a:3:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:14:\"789           \";}}', '3'),
('0009', 'a:3:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:14:\"789           \";}}', '3'),
('1234', 'a:2:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}}', '0'),
('1700', 'a:3:{i:0;a:2:{s:7:\"Subject\";s:8:\"Checking\";s:7:\"Message\";s:14:\"123           \";}i:1;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:14:\"456           \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:14:\"789           \";}}', '3'),
('18A0004', 'a:4:{i:1;a:2:{s:7:\"Subject\";s:7:\"Check 2\";s:7:\"Message\";s:10:\"qwerty    \";}i:0;a:2:{s:7:\"Subject\";s:7:\"Check 1\";s:7:\"Message\";s:9:\"11111    \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:7:\"456    \";}i:3;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:7:\"789    \";}}', '2'),
('19A0001', 'a:2:{i:3;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:7:\"789    \";}i:1;a:2:{s:7:\"Subject\";s:7:\"Check 2\";s:7:\"Message\";s:10:\"qwerty    \";}}', '0'),
('20B0001', 'a:4:{i:0;a:2:{s:7:\"Subject\";s:7:\"Check 1\";s:7:\"Message\";s:9:\"11111    \";}i:1;a:2:{s:7:\"Subject\";s:7:\"Check 2\";s:7:\"Message\";s:10:\"qwerty    \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:7:\"456    \";}i:3;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:7:\"789    \";}}', '4'),
('21A0001', 'a:4:{i:0;a:2:{s:7:\"Subject\";s:7:\"Check 1\";s:7:\"Message\";s:9:\"11111    \";}i:1;a:2:{s:7:\"Subject\";s:7:\"Check 2\";s:7:\"Message\";s:10:\"qwerty    \";}i:2;a:2:{s:7:\"Subject\";s:9:\"Checking2\";s:7:\"Message\";s:7:\"456    \";}i:3;a:2:{s:7:\"Subject\";s:9:\"Checking3\";s:7:\"Message\";s:7:\"789    \";}}', '4');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacologyi`
--

CREATE TABLE `pharmacologyi` (
  `date` date DEFAULT NULL,
  `fileUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacologyi`
--

INSERT INTO `pharmacologyi` (`date`, `fileUrl`) VALUES
('2020-09-23', 'Basic-routing-online (1).docx'),
('2020-09-23', 'Basic-routing-online (1).docx');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `index_no` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `batch` varchar(7) NOT NULL,
  `1Y01` varchar(4) NOT NULL,
  `1Y02` varchar(4) NOT NULL,
  `1Y03` varchar(4) NOT NULL,
  `1Y04` varchar(4) NOT NULL,
  `1Y05` varchar(4) NOT NULL,
  `1Y06` varchar(4) NOT NULL,
  `1Y07` varchar(4) NOT NULL,
  `2Y01` varchar(4) NOT NULL,
  `2Y02` varchar(4) NOT NULL,
  `3Y01` varchar(4) NOT NULL,
  `3Y02` varchar(4) NOT NULL,
  `3Y03` varchar(4) NOT NULL,
  `3Y04` varchar(4) NOT NULL,
  `3Y05` varchar(4) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`index_no`, `first_name`, `last_name`, `batch`, `1Y01`, `1Y02`, `1Y03`, `1Y04`, `1Y05`, `1Y06`, `1Y07`, `2Y01`, `2Y02`, `3Y01`, `3Y02`, `3Y03`, `3Y04`, `3Y05`, `is_deleted`) VALUES
('19A0001', 'Student 1', 'NTS', '2019A', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0),
('19B0002', 'Student 2', 'NTS', '2019B', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0),
('20A0001', 'Student 3', 'NTS', '2020A', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0),
('20B0002', 'Student 4', 'NTS', '2020B', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0),
('21A0001', 'Student 5', 'NTS', '2021A', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0),
('21B0002', 'Student 6', 'NTS', '2021B', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `index_no` varchar(10) NOT NULL,
  `year` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`index_no`, `year`) VALUES
('19A0001', 1),
('19B0002', 1),
('20A0001', 2),
('20B0002', 2),
('21A0001', 3),
('21B0002', 3);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Place` varchar(50) NOT NULL,
  `Module_name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`Date`, `Time`, `Place`, `Module_name`, `is_deleted`) VALUES
('2020-07-14', '07:01:00', 'Classroom 1', 'Psychology', 0),
('2020-08-20', '11:00:00', 'Main Hall', 'Sociology', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetable1b`
--

CREATE TABLE `timetable1b` (
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Place` varchar(50) NOT NULL,
  `Module_name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable1b`
--

INSERT INTO `timetable1b` (`Date`, `Time`, `Place`, `Module_name`, `is_deleted`) VALUES
('2020-07-14', '07:01:00', 'Classroom 1', 'Psycho', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetable2`
--

CREATE TABLE `timetable2` (
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Place` varchar(50) NOT NULL,
  `Module_name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable2`
--

INSERT INTO `timetable2` (`Date`, `Time`, `Place`, `Module_name`, `is_deleted`) VALUES
('2020-07-17', '07:01:00', 'Classroom 1', 'Health', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetable2b`
--

CREATE TABLE `timetable2b` (
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Place` varchar(50) NOT NULL,
  `Module_name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable2b`
--

INSERT INTO `timetable2b` (`Date`, `Time`, `Place`, `Module_name`, `is_deleted`) VALUES
('2020-07-17', '07:01:00', 'Classroom 1', 'Health 3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetable3`
--

CREATE TABLE `timetable3` (
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Place` varchar(50) NOT NULL,
  `Module_name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable3`
--

INSERT INTO `timetable3` (`Date`, `Time`, `Place`, `Module_name`, `is_deleted`) VALUES
('2020-07-14', '07:01:00', 'Classroom 2', 'Psychology 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetable3b`
--

CREATE TABLE `timetable3b` (
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Place` varchar(50) NOT NULL,
  `Module_name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable3b`
--

INSERT INTO `timetable3b` (`Date`, `Time`, `Place`, `Module_name`, `is_deleted`) VALUES
('2020-08-07', '14:31:00', 'Auditorium', 'Nutrition', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `index_no` varchar(10) NOT NULL,
  `type` varchar(8) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `NIC` char(10) DEFAULT NULL,
  `batch` varchar(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `profile_picture_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`index_no`, `type`, `first_name`, `last_name`, `NIC`, `batch`, `email`, `password`, `last_login`, `is_deleted`, `profile_picture_dir`) VALUES
('0001', 'Lecturer', 'Lecturer 1', 'NTS', '1111111117', '11111', 'lec1@gmail.com', '$2y$14$kJ/9QF4BHrYEf2jS8jxhgeb1ZfKm67Q/pAGWkkxHOzQpd.PcFJtTe', '2020-09-29 21:57:08', 0, '0001.png'),
('0002', 'Lecturer', 'Lecturer2', 'NTS', '1111111118', '11111', 'lec2@gmail.com', '$2y$14$7LcM8k9IKizQDKmeJGScqejVIq.8UbdOmvFnVIaZ8ElXtHas9Jncq', '2020-09-04 12:50:56', 0, ''),
('0003', 'Lecturer', 'Lecturer3', 'NTS', '1111111119', '11111', 'lec3@gmail.com', '$2y$14$deocN.bXHGjlY2XAyixapekRO15J3V1le26WTQTbqwATZwEjed3Gu', '2020-08-10 11:18:25', 0, ''),
('0004', 'Lecturer', 'Lecturer4', 'NTS', '2222222223', '11111', 'lec4@gmail.com', '$2y$14$FjJV0ZwaicKlI8TMW0mpZu5jzAyoUrBje2BgiJgkhND9FjUsrshTS', '2020-08-10 11:38:18', 0, ''),
('0005', 'Lecturer', 'Lecturer5', 'NTS', '2222222224', '11111', 'lec5@gmail.com', '$2y$14$C90JgZP4VQuFAO1aaR6pROaVNykD1F4C/WZdwdU03IWOTloHdaPWW', '2020-08-25 11:19:13', 0, ''),
('0006', 'Lecturer', 'Lecturer 6', 'NTS', '9998887776', '20000', 'klhfslfd@gmail.com', '$2y$14$38xjDR2ohlX9EEwEpSO.Bexn6PoWb0HKzNLaqQa/h3EVMEjJuOPRq', '2020-08-31 01:56:19', 0, ''),
('0007', 'Lecturer', 'Lecturer 7', 'NTS', '1234098767', '20000', 'idhisdgh@gmail.com', '$2y$14$DSzkPkqhD9WYMxm3p348MuKXf2ghO4TkSY5ULB..dYbHpxEYN0WRy', '2020-08-28 19:54:56', 0, '0007.png'),
('0008', 'Lecturer', 'Lecturer 7', 'NTS', '0009998886', '20000', 'jf@gmail.com', '$2y$14$sSV/UKD3.7k1tD8mpeqxYObVyN8mlEmIUDgdsaKNDXSeih8S/1d/2', '0000-00-00 00:00:00', 0, ''),
('0009', 'Lecturer', 'Lecturer 9', 'NTS', '1112228886', '20000', 'knl@gmail.com', '$2y$14$Xqm5oMfRBfevs6xryv8SGufIZiBSQUcSfCnSIqYPXzzr/IwYRUgnK', '0000-00-00 00:00:00', 0, ''),
('01', 'Operator', 'Operator1', 'NTS', '1111111112', '11111', 'operator1@gmail.com', '$2y$14$YcjUxn9avfhZIcDrBfnUDuXdzKzhYUQ/K7JY8Ry/3XAYJNip8fqn2', '2020-09-29 21:57:26', 0, ''),
('02', 'Operator', 'Operator2', 'NTS', '1111111113', '11111', 'operator2@gmail.com', '$2y$14$1ACZKjKxCWkbinGLK0G1Gu2BdDWuu641NNw/80.K3cMVBvVl3fEk2', '2020-09-20 12:06:46', 0, ''),
('03', 'Operator', 'Operator3', 'NTS', '4444444446', '20003', 'op3@gmail.com', '$2y$14$Lk4GVRMmlj7NRSWYJXhdp.vAwl4ZrNxnl5JWxZoq6/fpzTIZQl8P6', '0000-00-00 00:00:00', 0, ''),
('1234', 'Lecturer', 'Mahesh', 'Madushan', '2334509010', '20012', 'mahesh@gmail.com', '$2y$14$PaZDchMDqLa7A0dLxHeFYeFUGt25a57FDJVrqndWXy2FAsdarcLAO', '2020-09-04 01:57:33', 0, ''),
('1700', 'Lecturer', 'Lecturer6', 'NTS', '986699342V', '20017', 'vb@gmail.com', '$2y$14$4z4sc2mBp9h41YDDYAfx.eyICPqH16obGFFK6OEGiwGGGlCcnz462', '0000-00-00 00:00:00', 0, ''),
('19A0001', 'Student', 'Student 1', 'NTS', '987199388V', '2019A', 'student1@gmail.com', '$2y$14$1I2Tarprg84CtJxllmSuZe0Tr1a9JtLGih7xlEA2OEz7ciS80navu', '2020-09-29 21:56:54', 0, ''),
('19B0002', 'Student', 'Student 2', 'NTS', '987199389V', '2019B', 'student2@gmail.com', '$2y$14$qvZlaAcLychroNa5zXu85uQD4/dcjzlFDly5zqkURyleMFneOnzXC', '0000-00-00 00:00:00', 0, ''),
('20A0001', 'Student', 'Student 3', 'NTS', '987299388V', '2020A', 'student3@gmail.com', '$2y$14$DKZJveXntH2l.83wfm1C4OWdXAyAcMgzCoxiI3CeCYty/wXxqpQlK', '0000-00-00 00:00:00', 0, ''),
('20B0002', 'Student', 'Student 4', 'NTS', '987399388V', '2020B', 'student4@gmail.com', '$2y$14$f9jAg36o3QuvC8lDjlW6ke533JZCxkzvd3okpHqzKGnSFo1ti4GkK', '0000-00-00 00:00:00', 0, ''),
('21', 'Operator', 'Operator4', 'NTS', '566692380V', '20211', 'w@gmail.com', '$2y$14$NYSvKPLQq4A99PCkOyYI8e2IWSJqRYvUJKVGLR3ftqFA50mmAp1Qi', '0000-00-00 00:00:00', 0, ''),
('21A0001', 'Student', 'Student 5', 'NTS', '987499388V', '2021A', 'student5@gmail.com', '$2y$14$vlRiNMmjAYErCccat.cigeKnrsg3c/iG2ebzlp8TbE/DLkJeATBB6', '0000-00-00 00:00:00', 0, ''),
('21B0002', 'Student', 'Student 6', 'NTS', '987599388V', '2021B', 'student6@gmail.com', '$2y$14$yhdmq8mCMCKG.ZzWY4IuNOISDwPLbTwmlbQbYVfm.v/v5.y1knWPa', '0000-00-00 00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `verifypassword`
--

CREATE TABLE `verifypassword` (
  `index_no` varchar(7) NOT NULL,
  `request_time` varchar(20) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_code`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`time_stamp`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_3` (`name`),
  ADD UNIQUE KEY `time_stamp_2` (`time_stamp`),
  ADD KEY `time_stamp` (`time_stamp`),
  ADD KEY `name_2` (`name`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`index_no`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_code`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`index_no`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`index_no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`index_no`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`Module_name`);

--
-- Indexes for table `timetable1b`
--
ALTER TABLE `timetable1b`
  ADD PRIMARY KEY (`Module_name`);

--
-- Indexes for table `timetable2`
--
ALTER TABLE `timetable2`
  ADD PRIMARY KEY (`Module_name`);

--
-- Indexes for table `timetable2b`
--
ALTER TABLE `timetable2b`
  ADD PRIMARY KEY (`Module_name`);

--
-- Indexes for table `timetable3`
--
ALTER TABLE `timetable3`
  ADD PRIMARY KEY (`Module_name`);

--
-- Indexes for table `timetable3b`
--
ALTER TABLE `timetable3b`
  ADD PRIMARY KEY (`Module_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`index_no`);

--
-- Indexes for table `verifypassword`
--
ALTER TABLE `verifypassword`
  ADD PRIMARY KEY (`index_no`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `autodelete` ON SCHEDULE EVERY 1 MINUTE STARTS '2020-08-10 14:08:12' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM verifypassword WHERE request_time< now() - interval 10 MINUTE$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
