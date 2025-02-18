-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 12:09 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_master`
--

CREATE TABLE `appointment_master` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `slot` int(11) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedBy` int(11) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `enabled` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_master`
--

INSERT INTO `appointment_master` (`id`, `uid`, `doctorId`, `appointmentDate`, `slot`, `status`, `createdBy`, `createdOn`, `updatedBy`, `updatedOn`, `enabled`) VALUES
(1, 1, 2, '2024-01-20', 1, '4', 1, '2024-01-18 21:14:21', 1, '2024-01-18 23:01:01', '1'),
(2, 1, 2, '2024-01-20', 2, '2', 1, '2024-01-18 22:48:16', 1, '2024-01-18 23:13:06', '1'),
(3, 1, 2, '2024-01-20', 4, '1', 1, '2024-01-18 22:49:14', 1, '2024-01-18 23:13:43', '1');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_master`
--

CREATE TABLE `feedback_master` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_master`
--

INSERT INTO `feedback_master` (`id`, `uid`, `doctorId`, `feedback`, `createdBy`, `createdOn`) VALUES
(1, 9, 2, 'Very good doctor', 9, '2024-02-20 21:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(11) NOT NULL,
  `category` enum('1','2') NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(121) NOT NULL,
  `password` varchar(100) NOT NULL,
  `addressLine1` varchar(255) NOT NULL,
  `addressLine2` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedBy` int(11) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `enabled` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `category`, `firstName`, `lastname`, `email`, `phoneNumber`, `password`, `addressLine1`, `addressLine2`, `city`, `pincode`, `createdBy`, `createdOn`, `updatedBy`, `updatedOn`, `enabled`) VALUES
(1, '2', 'Vaibhav', 'Mandlik', 'vaibhav@gmail.com', '8668723797', '123', 'Nashik', '', 'Nashik', '422003', 0, '2023-11-18 06:24:21', 0, '2024-01-18 21:11:51', '1'),
(2, '1', 'Hemant', 'Shukla', 'hemant@gmail.com', '1234567890', '123', 'Pune', '', 'Pune', '411057', 0, '2024-01-18 21:13:02', 0, '2024-01-18 21:13:02', '1'),
(3, '2', 'Jyoti', 'VIshwakarma', 'jyoti@health.com', '1234567890', '123', 'Pune', '', 'Pune', '422012', 0, '2024-02-20 21:14:00', 0, '2024-02-20 21:15:42', '0'),
(4, '2', 'Jyoti', 'VIshwakarma', 'jyoti@health.com', '1234567890', '123', 'Pune', '', 'Pune', '422012', 0, '2024-02-20 21:16:08', 0, '2024-02-20 21:16:42', '0'),
(5, '2', 'Jyoti', 'Vishwakarma', 'jyoti@health.com', '1234567890', '123', 'Pune', '', 'Pune', '422012', 0, '2024-02-20 21:19:08', 0, '2024-02-20 21:19:32', '0'),
(6, '2', 'Jyoti', 'Vishwakarma', 'jyoti@health.com', '1234567890', '123', 'Pune', '', 'Pune', '422012', 0, '2024-02-20 21:19:44', 0, '2024-02-20 21:21:11', '0'),
(7, '2', 'Jyoti', 'Vishwakarma', 'jyoti@health.com', '1234567890', '123', 'Pune', '', 'Pune', '422012', 0, '2024-02-20 21:22:02', 0, '2024-02-20 21:22:38', '0'),
(8, '2', 'Jyoti', 'Vishwakarma', 'jyoti@health.com', '1234567890', '123', 'Pune', '', 'Pune', '422012', 8, '2024-02-20 21:25:09', 8, '2024-02-20 21:26:14', '0'),
(9, '2', 'Jyoti', 'Vishwakarma', 'jyoti@health.com', '1234567890', '123', 'Pune', '', 'Pune', '422012', 9, '2024-02-20 21:26:53', 9, '2024-02-20 21:26:53', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_report_master`
--

CREATE TABLE `user_report_master` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `reportType` enum('1','2') DEFAULT NULL COMMENT '1=Preliminary, 2=Doctor',
  `reportPath` varchar(255) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedBy` int(11) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `enabled` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_report_master`
--

INSERT INTO `user_report_master` (`id`, `uid`, `reportType`, `reportPath`, `createdBy`, `createdOn`, `updatedBy`, `updatedOn`, `enabled`) VALUES
(1, 4, '1', './assets/uploads/Vaishnavi_Kulkarni_ResumeIC.pdf', 4, '2024-02-20 21:16:08', 4, '2024-02-20 21:16:49', '0'),
(2, 5, '1', './assets/uploads/Vaishnavi_Kulkarni_ResumeIC.pdf', 5, '2024-02-20 21:19:08', 5, '2024-02-20 21:19:26', '0'),
(3, 6, '1', './assets/uploads/Vaishnavi_Kulkarni_ResumeIC.pdf', 6, '2024-02-20 21:19:44', 6, '2024-02-20 21:21:21', '0'),
(4, 7, '1', './assets/uploads/Vaishnavi_Kulkarni_ResumeIC.pdf', 7, '2024-02-20 21:22:02', 7, '2024-02-20 21:22:46', '0'),
(5, 8, '1', './assets/uploads/Vaishnavi_Kulkarni_ResumeIC.pdf', 8, '2024-02-20 21:25:09', 8, '2024-02-20 21:26:07', '0'),
(6, 9, '1', './assets/uploads/Vaishnavi_Kulkarni_ResumeIC.pdf', 9, '2024-02-20 21:26:53', 9, '2024-02-20 21:26:53', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_master`
--
ALTER TABLE `appointment_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_master`
--
ALTER TABLE `feedback_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_report_master`
--
ALTER TABLE `user_report_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_master`
--
ALTER TABLE `appointment_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback_master`
--
ALTER TABLE `feedback_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_report_master`
--
ALTER TABLE `user_report_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
