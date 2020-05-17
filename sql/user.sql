-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 11:20 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `index_no` varchar(6) NOT NULL,
  `type` varchar(8) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `NIC` char(10) DEFAULT NULL,
  `batch` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `index_no`, `type`, `first_name`, `last_name`, `NIC`, `batch`, `email`, `password`, `last_login`, `is_deleted`) VALUES
(1, '01', 'Operator', 'Nuvindu', 'Nirmana', '1234567890', 9999, 'nuvidu@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-05-18 02:25:33', 0),
(2, '190001', 'Student', 'Mahesh', 'Madushan', '1234567890', 2019, 'mahesh@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-05-17 14:07:34', 0),
(3, '0001', 'Lecturer', 'Kavinda ', 'Pathirana', '1234567890', 1111, 'geeth@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-05-17 14:06:04', 0),
(4, '02', 'Operator', 'Vinoja', 'Rathnayake', '1234567890', 9999, 'vinoja@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2020-05-17 11:30:55', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
