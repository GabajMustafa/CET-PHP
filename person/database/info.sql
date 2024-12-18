-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 08:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `person`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `studentid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `english` varchar(50) DEFAULT NULL,
  `math` varchar(50) DEFAULT NULL,
  `programming` varchar(50) DEFAULT NULL,
  `gender` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`studentid`, `name`, `english`, `math`, `programming`, `gender`) VALUES
(1010, 'Akrem G', 'Yes', 'No', 'Yes', 'M'),
(1012, 'Salma', 'No', 'No', 'No', 'F'),
(240001, 'Aiman', 'Yes', 'Yes', 'Yes', 'M'),
(240002, 'Salah', 'Yes', 'Yes', 'Yes', 'M'),
(240003, 'Asma', 'No', 'No', 'Yes', 'F'),
(240004, 'Marwa', 'Yes', 'No', 'No', 'F');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`studentid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
