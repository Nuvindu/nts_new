-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 07:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
('Yathra 9999', 'The next next level - ft jorsi', 'Yathra 9999', 10002, 'Yathra 9999/logo-removebg-previewx - Copy.png', '2020-09-10 06:12:05'),
('Ythara 99', 'yathra - symphony of the wind next level', 'Ythara 99', 1002, 'Ythara 99/n4.jpg', '2020-09-10 06:12:12'),
('Yathra 99999', 'The next next level - ft jorsi', 'Yathra 99999', 9999, 'Yathra 99999/nts-crest - Copy.png', '2020-09-12 04:18:24'),
('Yathra 9999999', 'The next next level - joug', 'Yathra 9999999', 10000, 'Yathra 9999999/tele - Copy.ico', '2020-09-12 04:22:58'),
('Ythara', 'yathra - symphony of the wind', 'Ythara', 1004, 'Ythara/bg-999.jpg', '2020-09-12 04:34:50'),
('Ythara 999', 'yathra - symphony of the wind \" the next next level - ft . ts\"', 'Ythara 999', 8893, 'Ythara 999/new.jpg', '2020-09-13 05:20:33'),
('New Gallery', 'Newest Gallery', 'New Gallery', 0, 'New Gallery/bg-999.jpg', '2020-09-13 05:26:34');

--
-- Indexes for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
