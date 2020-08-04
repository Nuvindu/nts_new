-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 06:37 AM
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
-- Table structure for table `anatomy`
--

CREATE TABLE `anatomy` (
  `date` date DEFAULT NULL,
  `fileUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anatomy`
--

INSERT INTO `anatomy` (`date`, `fileUrl`) VALUES
('2020-07-20', '14A IP Telephony.pptx'),
('2020-07-21', 'flyweight.docx');

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
('2020-07-19', 'Sustainable Design.pptx');

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
('0002', 2),
('0003', 3),
('0004', 4),
('0005', 5);

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
  `index_no` varchar(6) NOT NULL,
  `notification` varchar(1000) NOT NULL,
  `seen` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`index_no`, `notification`, `seen`) VALUES
('0001', 'a:1:{i:0;a:2:{s:7:\"Subject\";s:5:\"CHECK\";s:7:\"Message\";s:31:\"Hello World 0001 lec1@gmail.com\";}}', '0'),
('0002', 'a:1:{i:0;a:2:{s:7:\"Subject\";s:5:\"CHECK\";s:7:\"Message\";s:31:\"Hello World 0002 lec2@gmail.com\";}}', '0'),
('0003', 'a:1:{i:0;a:2:{s:7:\"Subject\";s:5:\"CHECK\";s:7:\"Message\";s:31:\"Hello World 0003 lec3@gmail.com\";}}', '0'),
('0004', 'a:1:{i:0;a:2:{s:7:\"Subject\";s:5:\"CHECK\";s:7:\"Message\";s:31:\"Hello World 0004 lec4@gmail.com\";}}', '0'),
('0005', 'a:1:{i:0;a:2:{s:7:\"Subject\";s:5:\"CHECK\";s:7:\"Message\";s:31:\"Hello World 0005 lec5@gmail.com\";}}', '0'),
('190001', 'a:4:{i:0;a:2:{s:7:\"Subject\";s:7:\"Check 1\";s:7:\"Message\";s:25:\"1 190001 mahesh@gmail.com\";}i:1;a:2:{s:7:\"Subject\";s:7:\"Check 2\";s:7:\"Message\";s:25:\"2 190001 mahesh@gmail.com\";}i:2;a:2:{s:7:\"Subject\";s:7:\"Check 3\";s:7:\"Message\";s:25:\"3 190001 mahesh@gmail.com\";}i:4;a:2:{s:7:\"Subject\";s:7:\"Check 5\";s:7:\"Message\";s:25:\"5 190001 mahesh@gmail.com\";}}', '0'),
('200001', 'a:6:{i:0;a:2:{s:7:\"Subject\";s:7:\"Check 1\";s:7:\"Message\";s:26:\"1 200001 kaveesh@gmail.com\";}i:1;a:2:{s:7:\"Subject\";s:7:\"Check 2\";s:7:\"Message\";s:26:\"2 200001 kaveesh@gmail.com\";}i:2;a:2:{s:7:\"Subject\";s:7:\"Check 3\";s:7:\"Message\";s:26:\"3 200001 kaveesh@gmail.com\";}i:3;a:2:{s:7:\"Subject\";s:7:\"Check 4\";s:7:\"Message\";s:26:\"4 200001 kaveesh@gmail.com\";}i:4;a:2:{s:7:\"Subject\";s:7:\"Check 5\";s:7:\"Message\";s:26:\"5 200001 kaveesh@gmail.com\";}i:5;a:2:{s:7:\"Subject\";s:7:\"Check 6\";s:7:\"Message\";s:24:\"6 200001 stude@gmail.com\";}}', '0'),
('210001', 'a:1:{i:0;a:2:{s:7:\"Subject\";s:7:\"Check 6\";s:7:\"Message\";s:25:\"6 210001 studen@gmail.com\";}}', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nutrition`
--

CREATE TABLE `nutrition` (
  `date` date DEFAULT NULL,
  `fileUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nutrition`
--

INSERT INTO `nutrition` (`date`, `fileUrl`) VALUES
('2020-07-25', '2016 A Exam List.docx');

-- --------------------------------------------------------

--
-- Table structure for table `obstetricpractice`
--

CREATE TABLE `obstetricpractice` (
  `date` date DEFAULT NULL,
  `fileUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('2020-07-21', 'creational design patterns (1).pptx');

-- --------------------------------------------------------

--
-- Table structure for table `psychology`
--

CREATE TABLE `psychology` (
  `date` date DEFAULT NULL,
  `fileUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psychology`
--

INSERT INTO `psychology` (`date`, `fileUrl`) VALUES
('2020-07-25', '09 Switching.pptx');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `index_no` varchar(6) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `batch` int(4) NOT NULL,
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
('190001', 'Student1', 'NTS', 2019, 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0),
('200001', 'Student2', 'NTS', 2020, 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0),
('210001', 'Student3', 'NTS', 2021, 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', 0);

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
('200001', 2),
('210001', 3);

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
  `password` varchar(200) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `profile_picture_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`index_no`, `type`, `first_name`, `last_name`, `NIC`, `batch`, `email`, `password`, `last_login`, `is_deleted`, `profile_picture_dir`) VALUES
('0001', 'Lecturer', 'Lecturer 1', 'NTS', '1111111117', 1111, 'lec1@gmail.com', '$2y$14$K5xzpsSAXWD1fVKBxMp0Ce6ur.ZzSYZ7O9DO7xZa5cpM7XtV9ohTO', '2020-08-04 09:52:22', 0, ''),
('0002', 'Lecturer', 'Lecturer2', 'NTS', '1111111118', 1111, 'lec2@gmail.com', '$2y$14$7LcM8k9IKizQDKmeJGScqejVIq.8UbdOmvFnVIaZ8ElXtHas9Jncq', '0000-00-00 00:00:00', 0, ''),
('0003', 'Lecturer', 'Lecturer3', 'NTS', '1111111119', 1111, 'lec3@gmail.com', '$2y$14$deocN.bXHGjlY2XAyixapekRO15J3V1le26WTQTbqwATZwEjed3Gu', '0000-00-00 00:00:00', 0, ''),
('0004', 'Lecturer', 'Lecturer4', 'NTS', '2222222223', 1111, 'lec4@gmail.com', '$2y$14$FjJV0ZwaicKlI8TMW0mpZu5jzAyoUrBje2BgiJgkhND9FjUsrshTS', '0000-00-00 00:00:00', 0, ''),
('0005', 'Lecturer', 'Lecturer5', 'NTS', '2222222224', 1111, 'lec5@gmail.com', '$2y$14$C90JgZP4VQuFAO1aaR6pROaVNykD1F4C/WZdwdU03IWOTloHdaPWW', '0000-00-00 00:00:00', 0, ''),
('01', 'Operator', 'Operator1', 'NTS', '1111111112', 1111, 'operator1@gmail.com', '$2y$14$YcjUxn9avfhZIcDrBfnUDuXdzKzhYUQ/K7JY8Ry/3XAYJNip8fqn2', '2020-08-04 00:02:28', 0, ''),
('02', 'Operator', 'Operator2', 'NTS', '1111111113', 1111, 'operator2@gmail.com', '$2y$14$1ACZKjKxCWkbinGLK0G1Gu2BdDWuu641NNw/80.K3cMVBvVl3fEk2', '2020-08-04 00:05:06', 0, ''),
('190001', 'Student', 'Student1', 'NTS', '1111111114', 1111, 'stud@gmail.com', '$2y$14$j2dAarrsKVNiybqm1YJaT.tfoNqiKbzwkwLT7p0joXUVrxtYQ5VTC', '2020-08-04 10:01:31', 0, ''),
('200001', 'Student', 'Student2', 'NTS', '1111111115', 1111, 'stude@gmail.com', '$2y$14$C8yMsKyXiqkQhojT3N/E/OKBZqQac60RnKWFJMGU2MAp2RwpnF576', '0000-00-00 00:00:00', 0, ''),
('210001', 'Student', 'Student3', 'NTS', '1111111116', 1111, 'studen@gmail.com', '$2y$14$n50xBSVdWKh25O5nDYmqb.ChSTgH7Lly3AGDrATrETYoWY4OAEfES', '2020-08-04 00:20:05', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `verifypassword`
--

CREATE TABLE `verifypassword` (
  `index_no` varchar(6) NOT NULL,
  `request_time` varchar(20) NOT NULL,
  `code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Indexes for table `verifypassword`
--
ALTER TABLE `verifypassword`
  ADD PRIMARY KEY (`index_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
