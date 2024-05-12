-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 01:04 PM
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
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `announce_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`announce_id`, `admin_name`, `date`, `message`) VALUES
(7, 'CCS Admin', '2024-May-08', 'Important Announcement  We are excited to announce the launch of our new website! 🎉 Explore our latest products and services now!');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `id_number`, `date`, `message`) VALUES
(3, 19835644, '2024-May-08', 'Ang lab 524 kay bati');

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
(1, 'Alcarmen', 'Brandon', 'B.', 3, '123', 'BSIT', 'brandon@gmail.com', 'Lorega', 'FALSE'),
(2000, 'Sandalo', 'Jude Jefferson', 'L', 4, '123', 'BSIT', 'jude@gmail.com', 'Lorega', 'TRUE'),
(123123, 'Aguilar', 'Jermaine', 'J', 3, '123', 'BSIT', 'jermaine0@gmail.com', 'San Isidro Talisay', 'TRUE'),
(19835644, 'Genabio', 'Anton James', 'J', 3, '123', 'BSIT', 'jamesgenabio@yahoo.com', 'San Isidro Talisay', 'TRUE'),
(19835645, 'Lim', 'Kyle', 'L', 3, '123', 'BSCS', 'kyle@gmail.com', 'Lorega', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `student_pc`
--

CREATE TABLE `student_pc` (
  `pc_id` int(11) NOT NULL,
  `lab_524` int(11) NOT NULL,
  `lab_526` int(11) NOT NULL,
  `lab_528` int(11) NOT NULL,
  `lab_530` int(11) NOT NULL,
  `lab_542` int(11) NOT NULL,
  `lab_Mac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_pc`
--

INSERT INTO `student_pc` (`pc_id`, `lab_524`, `lab_526`, `lab_528`, `lab_530`, `lab_542`, `lab_Mac`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 1, 1),
(3, 1, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1, 1),
(6, 1, 1, 1, 1, 1, 1),
(7, 1, 1, 1, 1, 1, 1),
(8, 1, 1, 1, 1, 1, 1),
(9, 1, 1, 1, 1, 1, 1),
(10, 1, 1, 1, 1, 1, 1),
(11, 1, 1, 1, 1, 1, 1),
(12, 1, 1, 1, 1, 1, 1),
(13, 1, 1, 1, 1, 1, 1),
(14, 1, 1, 1, 1, 1, 1),
(15, 1, 1, 1, 1, 1, 1),
(16, 1, 1, 1, 1, 1, 1),
(17, 1, 1, 1, 1, 1, 1),
(18, 1, 1, 1, 1, 1, 1),
(19, 1, 1, 1, 1, 1, 1),
(20, 1, 1, 1, 1, 1, 1),
(21, 1, 1, 1, 1, 1, 1),
(22, 1, 1, 1, 1, 1, 1),
(23, 1, 1, 1, 1, 1, 1),
(24, 1, 1, 1, 1, 1, 1),
(25, 1, 1, 1, 1, 1, 1),
(26, 1, 1, 1, 1, 1, 1),
(27, 1, 1, 1, 1, 1, 1),
(28, 1, 1, 1, 1, 1, 1),
(29, 1, 1, 1, 1, 1, 1),
(30, 1, 1, 1, 1, 1, 1),
(31, 1, 1, 1, 1, 1, 1),
(32, 1, 1, 1, 1, 1, 1),
(33, 1, 1, 1, 1, 1, 1),
(34, 1, 1, 1, 1, 1, 1),
(35, 1, 1, 1, 1, 1, 1),
(36, 1, 1, 1, 1, 1, 1),
(37, 1, 1, 1, 1, 1, 1),
(38, 1, 1, 1, 1, 1, 1),
(39, 1, 1, 1, 1, 1, 1),
(40, 1, 1, 1, 1, 1, 1),
(41, 1, 1, 1, 1, 1, 1),
(42, 1, 1, 1, 1, 1, 1),
(43, 1, 1, 1, 1, 1, 1),
(44, 1, 1, 1, 1, 1, 1),
(45, 1, 1, 1, 1, 1, 1),
(46, 1, 1, 1, 1, 1, 1),
(47, 1, 1, 1, 1, 1, 1),
(48, 1, 1, 1, 1, 1, 1),
(49, 1, 1, 1, 1, 1, 1),
(50, 1, 1, 1, 1, 1, 1);

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
(1, 30),
(2000, 30),
(123123, 30),
(19835644, 27),
(19835645, 30);

-- --------------------------------------------------------

--
-- Table structure for table `student_sit_in`
--

CREATE TABLE `student_sit_in` (
  `sit_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `sit_purpose` varchar(50) NOT NULL,
  `sit_lab` varchar(20) NOT NULL,
  `sit_login` varchar(15) NOT NULL,
  `sit_logout` varchar(15) NOT NULL,
  `sit_date` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_sit_in`
--

INSERT INTO `student_sit_in` (`sit_id`, `id_number`, `sit_purpose`, `sit_lab`, `sit_login`, `sit_logout`, `sit_date`, `status`) VALUES
(6, 19835644, 'C Programming', '524', '06:04:19pm', '05:00:49pm', '2024-04-03', 'Finished'),
(7, 19835644, 'C# Programming', '526', '06:04:46pm', '05:00:49pm', '2024-04-03', 'Finished'),
(8, 19835644, 'C Programming', '526', '06:18:18pm', '05:00:49pm', '2024-04-03', 'Finished'),
(9, 123123, 'C Programming', '524', '06:32:06pm', '06:44:02pm', '2024-03-29', 'Finished'),
(10, 19835644, 'C Programming', '524', '06:46:52pm', '05:00:49pm', '2024-04-03', 'Finished'),
(11, 19835644, 'C Programming', '524', '06:47:57pm', '05:00:49pm', '2024-04-03', 'Finished'),
(13, 19835644, 'C Programming', '524', '05:00:45pm', '05:00:49pm', '2024-04-03', 'Finished'),
(14, 19835644, 'ASP.Net Programming', '528', '07:52:45pm', '07:57:55pm', '2024-04-15', 'Finished');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`announce_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `student_pc`
--
ALTER TABLE `student_pc`
  ADD PRIMARY KEY (`pc_id`);

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
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `announce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_sit_in`
--
ALTER TABLE `student_sit_in`
  MODIFY `sit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
