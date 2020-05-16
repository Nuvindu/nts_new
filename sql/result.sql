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
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
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
-- Dumping data for table `user`
--

INSERT INTO `result` (`id`, `index_no`, `first_name`, `last_name`, `batch`,`1T1100`,`1T1200`,`1T1300`,`1T2110`,`1T2120`,`1T2250`,`1T2260`,`1T2290`,`2T1100`,`2T2110`,`2T2140`,`2T2160`,`2T2170`,`2T2250`,`2T2260`,`2T2218`,`3T2130`,`3T2150`,`3T2160`,`3T2230`,`3T2250`,`3T2260`,`3T2210`,`4T2240`,`4T2260`,`4T2270`,`4T2210`,`4T2211`,`4T2217`,`5T2280`,`5T2210`,`5T2211`,`5T2214`,`5T2216`,`5T2217`,`6T2310`,`6T2211`,`6T2215`,`6T2217`,`7T2320`,`7T2211`,`7T2212`,`7T2213`,`7T2217`,`8T2211`,`8T2217`,`8T2219`,`9T2211`,`9T2219`,`9T2220`, `is_deleted`) VALUES
(2, '190001', 'Mahesh', 'Madushan', 2019,'Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
-- ALTER TABLE `user`
--  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
