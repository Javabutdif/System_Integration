-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 04:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccs_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `lab_524`
--

CREATE TABLE `lab_524` (
  `id_number` int(11) NOT NULL,
  `sit_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_524`
--

INSERT INTO `lab_524` (`id_number`, `sit_in`) VALUES
(200, 1),
(19835644, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lab_526`
--

CREATE TABLE `lab_526` (
  `id_number` int(11) NOT NULL,
  `sit_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_528`
--

CREATE TABLE `lab_528` (
  `id_number` int(11) NOT NULL,
  `sit_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_530`
--

CREATE TABLE `lab_530` (
  `id_number` int(11) NOT NULL,
  `sit_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_542`
--

CREATE TABLE `lab_542` (
  `id_number` int(11) NOT NULL,
  `sit_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_mac`
--

CREATE TABLE `lab_mac` (
  `id_number` int(11) NOT NULL,
  `sit_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_mac`
--

INSERT INTO `lab_mac` (`id_number`, `sit_in`) VALUES
(19835644, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id_number` int(11) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `yearLevel` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `course` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_number`, `lastName`, `firstName`, `middleName`, `yearLevel`, `password`, `course`, `email`, `address`, `status`) VALUES
(1, 'Genabio', 'Anton James', 'J', 1, '123', 'BSIT', 'jamesgenabio@yahoo.com', 'dadwawd', 'TRUE'),
(3, 'dad', 'dwad', 'dawd', 1, '123', 'BSIT', 'jamesgenabio@yahoo.com', 'dawd', 'FALSE'),
(4, 'Genabio', 'Anton James', 'J', 1, '123', 'BSIT', 'jamesgenabio@yahoo.com', 'dadwawd', 'TRUE'),
(12, 'Genabio', 'Anton James', 'J', 3, '123', 'BSIT', 'jamesgenabio@yahoo.com', 'San Isidro Talisay', 'FALSE'),
(123, 'Aguilarrr', 'Jermaine', 'J', 3, '123', 'BSIT', 'jermaine@gmail.com', 'dawdad', 'FALSE'),
(200, 'Sandalooo', 'Jude Jefferson', 'S.', 3, '123', 'BSIT', 'judejefferson@gmail.com', 'Lorega', 'TRUE'),
(900, 'dawd', 'dawd', 'dawd', 1, '123', 'BSIT', 'jamesgenabio@yahoo.com', 'dawdadw', 'TRUE'),
(19835644, 'Genabio', 'Anton James', 'J', 3, '123', 'BSIT', 'jamesgenabio31@gmail.com', 'San Isidro', 'TRUE'),
(31313123, 'Nipaya', 'Dione Louis', 'Louis', 3, '123', 'BSCS', 'dionelouis@gmail.com', 'balamban', 'FALSE'),
(1983564413, 'Genabio', 'Anton James', 'dawd', 1, '123', 'BSIT', 'jamesgenabio@yahoo.com', 'dawd', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `student_session`
--

CREATE TABLE `student_session` (
  `id_number` int(11) NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_session`
--

INSERT INTO `student_session` (`id_number`, `session`) VALUES
(1, 23),
(3, 30),
(4, 30),
(12, 30),
(123, 28),
(200, 27),
(900, 30),
(19835644, 27),
(31313123, 30),
(1983564413, 30);

-- --------------------------------------------------------

--
-- Table structure for table `student_sit_in`
--

CREATE TABLE `student_sit_in` (
  `sit_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `sit_purpose` varchar(50) NOT NULL,
  `sit_lab` varchar(20) NOT NULL,
  `sit_login` date NOT NULL,
  `sit_logout` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_sit_in`
--

INSERT INTO `student_sit_in` (`sit_id`, `id_number`, `sit_purpose`, `sit_lab`, `sit_login`, `sit_logout`, `status`) VALUES
(384301, 19835644, 'C Programming', '524', '2024-03-21', '2024-03-21', 'Finished'),
(544098, 19835644, 'C Programming', '524', '2024-03-21', '2024-03-21', 'Finished'),
(889785, 200, 'C Programming', '524', '2024-03-21', '2024-03-21', 'Finished'),
(971392, 19835644, 'C# Programming', 'Mac', '2024-03-21', '2024-03-21', 'Finished');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab_524`
--
ALTER TABLE `lab_524`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `lab_526`
--
ALTER TABLE `lab_526`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `lab_528`
--
ALTER TABLE `lab_528`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `lab_530`
--
ALTER TABLE `lab_530`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `lab_542`
--
ALTER TABLE `lab_542`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `lab_mac`
--
ALTER TABLE `lab_mac`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `student_session`
--
ALTER TABLE `student_session`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `student_sit_in`
--
ALTER TABLE `student_sit_in`
  ADD PRIMARY KEY (`sit_id`),
  ADD UNIQUE KEY `sit_id` (`sit_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
