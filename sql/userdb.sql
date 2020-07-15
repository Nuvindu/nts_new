-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 04:29 PM
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
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_code`, `department_name`) VALUES
(1, 'Fundamentals of Nursing'),
(2, 'Medical Nursing'),
(3, 'Surgical Nursing'),
(4, 'Maternal & Child Care Nursing'),
(5, 'Management & Research');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `index_no` varchar(6) NOT NULL,
  `department` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`index_no`, `department`) VALUES
('0001', 1),
('0002', 2);

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
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `index_no` varchar(6) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `batch` int(4) NOT NULL,
  `1T1100` varchar(4) NOT NULL,
  `1T1200` varchar(4) NOT NULL,
  `1T1300` varchar(4) NOT NULL,
  `1T2110` varchar(4) NOT NULL,
  `1T2120` varchar(4) NOT NULL,
  `1T2250` varchar(4) NOT NULL,
  `1T2260` varchar(4) NOT NULL,
  `1T2290` varchar(4) NOT NULL,
  `2T1100` varchar(4) NOT NULL,
  `2T2110` varchar(4) NOT NULL,
  `2T2140` varchar(4) NOT NULL,
  `2T2160` varchar(4) NOT NULL,
  `2T2170` varchar(4) NOT NULL,
  `2T2250` varchar(4) NOT NULL,
  `2T2260` varchar(4) NOT NULL,
  `2T2218` varchar(4) NOT NULL,
  `3T2130` varchar(4) NOT NULL,
  `3T2150` varchar(4) NOT NULL,
  `3T2160` varchar(4) NOT NULL,
  `3T2230` varchar(4) NOT NULL,
  `3T2250` varchar(4) NOT NULL,
  `3T2260` varchar(4) NOT NULL,
  `3T2210` varchar(4) NOT NULL,
  `4T2240` varchar(4) NOT NULL,
  `4T2260` varchar(4) NOT NULL,
  `4T2270` varchar(4) NOT NULL,
  `4T2210` varchar(4) NOT NULL,
  `4T2211` varchar(4) NOT NULL,
  `4T2217` varchar(4) NOT NULL,
  `5T2280` varchar(4) NOT NULL,
  `5T2210` varchar(4) NOT NULL,
  `5T2211` varchar(4) NOT NULL,
  `5T2214` varchar(4) NOT NULL,
  `5T2216` varchar(4) NOT NULL,
  `5T2217` varchar(4) NOT NULL,
  `6T2310` varchar(4) NOT NULL,
  `6T2211` varchar(4) NOT NULL,
  `6T2215` varchar(4) NOT NULL,
  `6T2217` varchar(4) NOT NULL,
  `7T2320` varchar(4) NOT NULL,
  `7T2211` varchar(4) NOT NULL,
  `7T2212` varchar(4) NOT NULL,
  `7T2213` varchar(4) NOT NULL,
  `7T2217` varchar(4) NOT NULL,
  `8T2211` varchar(4) NOT NULL,
  `8T2217` varchar(4) NOT NULL,
  `8T2219` varchar(4) NOT NULL,
  `9T2211` varchar(4) NOT NULL,
  `9T2219` varchar(4) NOT NULL,
  `9T2220` varchar(4) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`index_no`, `first_name`, `last_name`, `batch`, `1T1100`, `1T1200`, `1T1300`, `1T2110`, `1T2120`, `1T2250`, `1T2260`, `1T2290`, `2T1100`, `2T2110`, `2T2140`, `2T2160`, `2T2170`, `2T2250`, `2T2260`, `2T2218`, `3T2130`, `3T2150`, `3T2160`, `3T2230`, `3T2250`, `3T2260`, `3T2210`, `4T2240`, `4T2260`, `4T2270`, `4T2210`, `4T2211`, `4T2217`, `5T2280`, `5T2210`, `5T2211`, `5T2214`, `5T2216`, `5T2217`, `6T2310`, `6T2211`, `6T2215`, `6T2217`, `7T2320`, `7T2211`, `7T2212`, `7T2213`, `7T2217`, `8T2211`, `8T2217`, `8T2219`, `9T2211`, `9T2219`, `9T2220`, `is_deleted`) VALUES
('190001', 'Mahesh', 'Madushan', 2019, 'B', 'Null', 'A', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'A+', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0),
('190029', 'Kaveesh', 'Charuka', 2019, 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0),
('190051', 'X', 'Y', 2019, 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `index_no` varchar(6) NOT NULL,
  `year` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`index_no`, `year`) VALUES
('190001', 1),
('190029', 3);

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
('2020-07-24', '09:15:00', 'Main Hall', 'Paediatric', 0),
('2020-07-14', '07:01:00', 'Classroom 1', 'Psychology', 0);

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `index_no` varchar(6) NOT NULL,
  `type` varchar(8) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `NIC` char(10) DEFAULT NULL,
  `batch` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `profile_picture_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`index_no`, `type`, `first_name`, `last_name`, `NIC`, `batch`, `email`, `password`, `last_login`, `is_deleted`, `profile_picture_dir`) VALUES
('0001', 'Lecturer', 'Kavinda', 'Pathirana', '1234567895', 1111, 'geeth@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-07-15 11:17:00', 0, '0001.png'),
('0002', 'Lecturer', 'Gowantha', 'Charithal', '0000002345', 1111, 'gowan@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0000-00-00 00:00:00', 0, ''),
('01', 'Operator', 'Nuvindu', 'Nirmana', '1234567890', 9999, 'nuvidu@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-06-26 16:29:24', 0, ''),
('02', 'Operator', 'Vinoja', 'Rathnayake', '1234567890', 9999, 'vinoja1@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-07-13 16:36:14', 0, ''),
('190001', 'Student', 'Mahesh', 'Madushan', '123456789', 2019, 'mahesh123@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-07-14 20:34:54', 0, '190001.png'),
('190029', 'Student', 'Kaveesh', 'Charuka', '8887779990', 1111, 'kaveesh@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-07-14 09:52:41', 0, ''),
('192890', 'Student', 'FF', 'SS', '7777777777', 1111, 'fhfoa@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0000-00-00 00:00:00', 1, ''),
('2345', 'Lecturer', 'CC', 'DD', '0000445987', 1111, 'oidhihd@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0000-00-00 00:00:00', 1, '');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `timetable2`
--
ALTER TABLE `timetable2`
  ADD PRIMARY KEY (`Module_name`);

--
-- Indexes for table `timetable3`
--
ALTER TABLE `timetable3`
  ADD PRIMARY KEY (`Module_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`index_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
