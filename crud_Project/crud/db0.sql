-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 06:27 AM
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
-- Database: `db0`
--

-- --------------------------------------------------------

--
-- Table structure for table `t0`
--

CREATE TABLE `t0` (
  `id` int(10) NOT NULL,
  `f0` char(30) DEFAULT NULL,
  `f1` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t0`
--

INSERT INTO `t0` (`id`, `f0`, `f1`) VALUES
(1, 'v00', 'new@gmail.com'),
(2, 'v10', 'who@gmail.com'),
(3, 'prottoy', 'email@email.com'),
(4, 'imam', 'sir@gmail.com'),
(5, 'Prottoy who', 'gorib@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `t1`
--

CREATE TABLE `t1` (
  `admin_id` int(10) NOT NULL,
  `a0` varchar(30) DEFAULT NULL,
  `a1` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t1`
--

INSERT INTO `t1` (`admin_id`, `a0`, `a1`) VALUES
(1, 'imam', '123');

-- --------------------------------------------------------

--
-- Table structure for table `t2`
--

CREATE TABLE `t2` (
  `user_id` int(10) NOT NULL,
  `u0` varchar(30) DEFAULT NULL,
  `u1` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t2`
--

INSERT INTO `t2` (`user_id`, `u0`, `u1`) VALUES
(1, 'gorib@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `t3`
--

CREATE TABLE `t3` (
  `file_id` int(10) NOT NULL,
  `f0` varchar(30) DEFAULT NULL,
  `f1` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t3`
--

INSERT INTO `t3` (`file_id`, `f0`, `f1`) VALUES
(3, 'name', 1),
(7, 'crud.zip', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t0`
--
ALTER TABLE `t0`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t1`
--
ALTER TABLE `t1`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `t2`
--
ALTER TABLE `t2`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `t3`
--
ALTER TABLE `t3`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `f1` (`f1`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t0`
--
ALTER TABLE `t0`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t1`
--
ALTER TABLE `t1`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t2`
--
ALTER TABLE `t2`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t3`
--
ALTER TABLE `t3`
  MODIFY `file_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t3`
--
ALTER TABLE `t3`
  ADD CONSTRAINT `t3_ibfk_1` FOREIGN KEY (`f1`) REFERENCES `t2` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
