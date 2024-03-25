-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 04:57 PM
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
(1, 'Alcarmen', 'Brandon', 'B.', 3, '123', 'BSIT', 'brandon@gmail.com', 'Lorega', 'TRUE'),
(2000, 'Sandalo', 'Jude Jefferson', 'L', 4, '123', 'BSIT', 'jude@gmail.com', 'Lorega', 'TRUE'),
(123123, 'Aguilar', 'Jermaine', 'J', 3, '123', 'BSIT', 'jermaine0@gmail.com', 'San Isidro Talisay', 'TRUE'),
(19835644, 'Genabio', 'Anton James', 'J', 3, '123', 'BSIT', 'jamesgenabio@yahoo.com', 'San Isidro Talisay', 'TRUE'),
(19835645, 'Lim', 'Kyle', 'L', 3, '123', 'BSCS', 'kyle@gmail.com', 'Lorega', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `student_lab`
--

CREATE TABLE `student_lab` (
  `id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `lab` int(11) NOT NULL,
  `sit_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_lab`
--

INSERT INTO `student_lab` (`id`, `id_number`, `lab`, `sit_in`) VALUES
(1, 19835644, 526, 3),
(2, 19835644, 528, 3),
(3, 19835644, 524, 3),
(4, 19835644, 530, 3),
(5, 123123, 524, 1),
(6, 123123, 526, 1);

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
(1, 29),
(2000, 29),
(123123, 26),
(19835644, 16),
(19835645, 29);

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
(1, 19835644, 'C Programming', '524', '2024-03-22', '2024-03-22', 'Finished'),
(2, 123123, 'C Programming', '524', '2024-03-22', '2024-03-22', 'Finished'),
(3, 123123, 'C Programming', '526', '2024-03-22', '2024-03-22', 'Finished');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `student_lab`
--
ALTER TABLE `student_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_session`
--
ALTER TABLE `student_session`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `student_sit_in`
--
ALTER TABLE `student_sit_in`
  ADD PRIMARY KEY (`sit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_lab`
--
ALTER TABLE `student_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_sit_in`
--
ALTER TABLE `student_sit_in`
  MODIFY `sit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;