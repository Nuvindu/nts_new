-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 01:07 PM
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
-- Table structure for table `timeTable`
--

CREATE TABLE `timeTable` (
  `Date` date,
  `Time` time ,
  `Place` varchar(50) NOT NULL,
  `Module_code` varchar(100) NOT NULL,
  `Module_name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeTable`
--
INSERT INTO `timeTable` (`Date`, `Time`, `Place`, `Module_code`, `Module_name`, `is_deleted`) VALUES
('02/03/2020', '12:30', 'Assembly hall', '1022', 'Emergency nursing',  0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timeTable`
--
ALTER TABLE `timeTable`
  ADD PRIMARY KEY (`Module_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timeTable`
--
-- ALTER TABLE `timeTable`
--  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
