-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2025 at 08:18 PM
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
(7, 'CCS Admin', '2024-May-08', 'Important Announcement  We are excited to announce the launch of our new website! 🎉 Explore our latest products and services now!'),
(9, 'CCS Admin', '2025-Feb-10', 'Hiiii');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `lab` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `id_number`, `lab`, `date`, `message`) VALUES
(3, 19835644, 0, '2024-May-08', 'Ang lab 524 kay bati'),
(4, 19835644, 524, '2024-May-15', 'Guba ang pc\r\n'),
(5, 19835644, 524, '2024-May-15', 'Okay tanan\r\n'),
(7, 19835644, 524, '2024-May-21', 'dadawd'),
(8, 19835644, 524, '2024-May-21', 'dadawd'),
(9, 19835644, 524, '2024-May-21', 'dawdawd'),
(10, 19835644, 524, '2024-May-21', 'dawdawd'),
(11, 19835644, 524, '2024-May-21', 'dawdawdawd'),
(12, 19835644, 524, '2024-May-21', 'dawd'),
(13, 19835644, 524, '2024-May-21', 'dawdawd'),
(14, 19835644, 524, '2024-May-21', 'dawdawd'),
(15, 19835644, 524, '2024-May-21', 'dawdawd'),
(16, 19835644, 524, '2024-May-21', 'dawdawd'),
(17, 19835644, 524, '2024-May-21', 'dawdadad'),
(18, 19835644, 524, '2024-May-21', 'dawdadawd');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `id_number`, `message`) VALUES
(1, 19835644, 'Reservation Confirmed!2024-05-28'),
(4, 19835644, 'Reservation Confirmed! | 2024-05-22\nYou have successfuly submitted a reservation'),
(6, 19835644, 'Reservation Confirmed! | 2024-05-23\nYou have successfuly submitted a reservation'),
(7, 19835644, 'Your Reservation has been Approve! 2024-05-21'),
(8, 19835644, 'Feedback Confirmed! | 2024-05-21\nYou have successfuly submitted a feedback'),
(9, 123, 'Reservation Confirmed! | 2024-05-23\nYou have successfuly submitted a reservation'),
(10, 123, 'Your Reservation has been Approve! 2024-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date` varchar(10) NOT NULL,
  `reservation_time` varchar(10) NOT NULL,
  `pc_number` int(11) NOT NULL,
  `lab` varchar(11) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `id_number` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_date`, `reservation_time`, `pc_number`, `lab`, `purpose`, `id_number`, `status`) VALUES
(20, '2024-05-30', '18:05', 40, '528', 'Php Programming', 19835644, 'Decline'),
(21, '2024-05-22', '14:35', 4, '526', 'C Programming', 19835644, 'Decline'),
(22, '2024-05-22', '12:38', 20, 'Mac', 'Php Programming', 19835644, 'Approve'),
(23, '2024-05-23', '14:40', 10, '524', 'Java Programming', 19835644, 'Approve'),
(24, '2024-05-21', '15:56', 10, '526', 'C# Programming', 19835644, 'Decline'),
(25, '2024-05-22', '18:16', 10, '528', 'C# Programming', 19835644, 'Approve'),
(26, '2024-05-24', '18:24', 16, 'Mac', 'Java Programming', 19835644, 'Approve'),
(27, '2024-05-29', '03:56', 8, '526', 'C# Programming', 19835644, 'Pending'),
(28, '', '03:59', 1, '524', 'C Programming', 19835644, 'Pending'),
(29, '2024-05-29', '', 0, '524', 'C Programming', 19835644, 'Pending'),
(30, '2024-05-28', '03:01', 15, '526', 'Java Programming', 19835644, 'Pending'),
(31, '2024-05-29', '03:02', 1, '530', 'C# Programming', 19835644, 'Pending'),
(32, '2024-06-06', '04:06', 1, '524', 'C Programming', 19835644, 'Pending'),
(33, '2024-06-06', '04:06', 1, '524', 'C Programming', 19835644, 'Pending'),
(34, '2024-05-22', '04:16', 19, '526', 'ASP.Net Programming', 19835644, 'Approve'),
(35, '2024-05-23', '04:24', 5, 'Mac', 'C# Programming', 19835644, 'Approve'),
(36, '2024-05-23', '11:27', 2, '524', 'Php Programming', 123, 'Approve');

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
(19835645, 'Lim', 'Kyle', 'L', 3, '123', 'BSCS', 'kyle@gmail.com', 'Lorega', 'TRUE'),
(123131231, 'Ypil', 'Cyril', 'k', 2, '123', 'BSIT', 'cyril@gmail.com', 'Dumlog', 'TRUE');

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
(1, 1, 1, 1, 1, 0, 1),
(2, 0, 1, 1, 1, 1, 1),
(3, 0, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1, 0),
(6, 1, 1, 1, 1, 1, 1),
(7, 1, 1, 1, 1, 1, 1),
(8, 1, 1, 1, 1, 1, 1),
(9, 1, 1, 1, 1, 1, 1),
(10, 0, 1, 0, 1, 1, 1),
(11, 0, 1, 1, 1, 1, 1),
(12, 0, 1, 1, 1, 1, 1),
(13, 0, 1, 1, 1, 1, 1),
(14, 0, 1, 1, 1, 1, 1),
(15, 0, 1, 1, 1, 1, 1),
(16, 0, 1, 1, 1, 1, 0),
(17, 0, 1, 1, 1, 1, 1),
(18, 0, 1, 1, 1, 1, 1),
(19, 0, 0, 1, 1, 1, 1),
(20, 0, 1, 1, 1, 1, 0),
(21, 0, 1, 1, 1, 1, 1),
(22, 0, 1, 1, 1, 1, 1),
(23, 0, 1, 1, 1, 1, 1),
(24, 0, 1, 1, 1, 1, 1),
(25, 0, 1, 1, 1, 1, 1),
(26, 0, 1, 1, 1, 1, 1),
(27, 0, 1, 1, 1, 1, 1),
(28, 0, 1, 1, 1, 1, 1),
(29, 0, 1, 1, 1, 1, 1),
(30, 0, 1, 1, 1, 1, 1),
(31, 0, 1, 1, 1, 1, 1),
(32, 0, 1, 1, 1, 1, 1),
(33, 0, 1, 1, 1, 1, 1),
(34, 0, 1, 1, 1, 1, 1),
(35, 0, 1, 1, 1, 1, 1),
(36, 0, 1, 1, 1, 1, 1),
(37, 0, 1, 1, 1, 1, 1),
(38, 0, 1, 1, 1, 1, 1),
(39, 0, 1, 1, 1, 1, 1),
(40, 0, 1, 0, 1, 1, 1),
(41, 0, 1, 1, 1, 1, 1),
(42, 0, 1, 1, 1, 1, 1),
(43, 0, 1, 1, 1, 1, 1),
(44, 0, 1, 1, 1, 1, 1),
(45, 0, 1, 1, 1, 1, 1),
(46, 0, 1, 1, 1, 1, 1),
(47, 0, 1, 1, 1, 1, 1),
(48, 0, 1, 1, 1, 1, 1),
(49, 0, 1, 1, 1, 1, 1),
(50, 0, 1, 1, 1, 1, 1);

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
(19835644, 30),
(19835645, 30),
(123131231, 30);

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
(14, 19835644, 'ASP.Net Programming', '528', '07:52:45pm', '07:57:55pm', '2024-04-15', 'Finished'),
(15, 2000, 'C-Programming', '524', '10:38:40am', '10:39:05am', '2024-05-20', 'Finished'),
(16, 123131231, 'Java Programming', '542', '02:38:24pm', '02:38:39pm', '2024-05-20', 'Finished'),
(17, 123131231, 'Java Programming', '526', '02:51:30pm', '02:51:47pm', '2024-05-20', 'Finished'),
(18, 123, 'Java Programming', '542', '11:23:27am', '11:23:32am', '2024-05-21', 'Finished'),
(19, 19835644, 'ASP.Net Programming', '526', '06:59:43pm', '06:59:55pm', '2025-02-10', 'Finished');

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

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
  MODIFY `announce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student_sit_in`
--
ALTER TABLE `student_sit_in`
  MODIFY `sit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_session`
--
ALTER TABLE `student_session`
  ADD CONSTRAINT `student_session_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `students` (`id_number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
