-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2025 at 01:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sainikportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pre` varchar(10) NOT NULL,
  `company` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `open` varchar(50) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `pamount` int(11) NOT NULL,
  `bv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`, `pre`, `company`, `address`, `city`, `open`, `remark`, `pamount`, `bv`) VALUES
(1, 'admin', 'admin', '', 'STBSV', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `addmission_year` varchar(30) DEFAULT NULL,
  `acadamic_year` varchar(30) DEFAULT NULL,
  `Medium` varchar(30) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `fathername` varchar(100) DEFAULT NULL,
  `mothername` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `whatsappno` varchar(20) DEFAULT NULL,
  `alternateno` varchar(20) DEFAULT NULL,
  `aadhar` varchar(20) DEFAULT NULL,
  `course` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `schoolname` varchar(100) DEFAULT NULL,
  `previousstd` varchar(20) DEFAULT NULL,
  `grade` varchar(20) DEFAULT NULL,
  `board` varchar(100) DEFAULT NULL,
  `language` varchar(30) DEFAULT NULL,
  `centre` varchar(100) DEFAULT NULL,
  `studphoto` text DEFAULT NULL,
  `studaadhar` text DEFAULT NULL,
  `studsign` text DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `course_name`, `addmission_year`, `acadamic_year`, `Medium`, `surname`, `firstname`, `fathername`, `mothername`, `gender`, `email`, `whatsappno`, `alternateno`, `aadhar`, `course`, `dob`, `category`, `address`, `schoolname`, `previousstd`, `grade`, `board`, `language`, `centre`, `studphoto`, `studaadhar`, `studsign`, `amount`, `status`, `createdby`, `createdon`) VALUES
(4, 'BCom', 'fy', '2024-2025', 'marathi', '10006', 'Shinde Jay Atul', 'Atul shinde', 'Alka', 'male', 'Pune', 'WP20240703125022.jpg', 'single', '2002-05-17', 'obc', '0000-00-00', 'India', '', 'A+', 'no', 'no', 'Government', '7325658489', NULL, NULL, NULL, NULL, NULL, 'fail', 6, '2024-07-03 12:50:22'),
(5, 'DTL', 'fy', '2024-2025', 'marathi', '10007', 'Takik Mangesh Shridhar', 'Shridhar takik', 'Meera', 'male', 'Dhamangaon', 'WP20240703131944.png', 'single', '2024-07-02', 'open', '0000-00-00', 'India', '', 'A+', 'no', 'no', 'service', '8888888888', NULL, NULL, NULL, NULL, NULL, NULL, 7, '2024-07-03 13:19:44'),
(9, 'MCom', 'fy', '2024-2025', 'english', '10011', 'Kamble Vinod Chandrakant', 'Chandrakant Tippana Kamble', 'Mangalbai', 'male', 'Latur', 'WP20240705145944.jpe', 'married', '1987-12-18', 'sc', '0000-00-00', 'India', '', 'B+', 'no', 'no', 'businessman', '9834219325', NULL, NULL, NULL, NULL, NULL, NULL, 11, '2024-07-05 14:59:44'),
(10, 'MCom', 'fy', '2024-2025', 'marathi', '10012', 'Patange Sachin Padamakar', 'Padmakar Patange', 'Kalapna', 'male', 'Ausa', 'WP20240706044511.png', 'married', '1990-07-17', 'obc', '0000-00-00', 'India', '', 'A+', 'no', 'no', 'service', '9172400249', NULL, NULL, NULL, NULL, NULL, NULL, 12, '2024-07-06 04:45:11'),
(11, 'DTL', 'fy', '2024-2025', 'marathi', '10013', 'Kanawade Amol Sampat', 'Sampat Kanawade', 'Meera', 'male', 'Lingdev', 'WP20240706102120.web', 'single', '1997-01-01', 'open', '0000-00-00', 'India', '', 'B+', 'no', 'no', 'farmer', '8888888456', NULL, NULL, NULL, NULL, NULL, 'fail', 13, '2024-07-06 10:21:20'),
(12, 'BCom', 'fy', '2024-2025', 'marathi', '10015', 'S', 'S', 'S', 'male', 'M', 'WP20240708052250.jpg', 'single', '2024-07-08', 'sebc', '0000-00-00', 'India', '', '', 'yes', 'no', 'labour', '1111111111', NULL, NULL, NULL, NULL, NULL, 'fail', 15, '2024-07-08 05:22:50'),
(13, 'BCom', 'fy', '2024-2025', 'english', '10017', 'Kamble Vinod Chandrakant', 'Chandrakant Tippana Kamble', 'Mangalbai', 'male', 'Latur', 'WP20240711150644.jpe', 'married', '1987-12-18', 'sc', '0000-00-00', 'India', '', 'B+', 'no', 'no', 'farmer', '9834219325', NULL, NULL, NULL, NULL, NULL, 'success', 17, '2024-07-11 15:06:44'),
(14, 'BCom', 'fy', '2024-2025', 'marathi', '10010', 'Bora Vinayank Ramesh', 'Rajgopal Bora', 'Leela bora', 'male', 'Latur', 'WP20240927135606.png', 'single', '2007-08-02', 'open', '0000-00-00', 'India', '', 'A+', 'no', 'no', 'Private', '9422072245', NULL, NULL, NULL, NULL, NULL, NULL, 10, '2024-09-27 13:56:06'),
(17, NULL, NULL, NULL, 'marathi', 'TETE', 'Shyam', 'Raman', 'Nalini', 'male', 'grtete99@yahoo.co.in', '9226807651', '1234567890', '123412341234', '6th', '2015-12-05', 'general', ' Sinhagad Road Pune', 'Shivaji school', '6th', 'अ1.', 'maharashtra', 'english', 'dhule', '../uploads/photo_.png', '../uploads/aadhar_.png', '../uploads/sign_.png', 2.00, 'success', 19, '2025-03-01 13:26:12'),
(18, 'mca', '2023', 'fy', 'english', 'pallod', 'kaustubh', 'suresh', 'rachana', 'male', 'kp@gmail.com', '6655254785', '963214578', '302598746321', '6th', '2000-10-12', 'sc', '   pune ,hadapsar', 'sems', '5th', 'अ2', 'maharashtra', 'english', 'tuljapur', '../uploads/photo_.jpg', '../uploads/aadhar_.jpg', '../uploads/sign_.jpg', 0.00, 'success', 19, '2025-03-01 12:33:38'),
(19, NULL, '2025', 'fy', 'marathi', 'Sharma', 'Rohit', 'Suresh', 'Rachana', 'female', 'kp@gmail.com', '7519782255', '8855697414', '325621475469', '6th', '2015-12-18', 'sc', '         B12/5,Ganga Village , Handewadi Road , Hadapsar', 'Test', '6th', 'अ2', 'maharashtra', 'marathi', 'latur', '../uploads/photo_.png', '../uploads/aadhar_.png', '../uploads/sign_.png', 0.00, 'success', 19, '2025-03-01 13:32:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
