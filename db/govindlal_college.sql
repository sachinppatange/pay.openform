-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 03:58 PM
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
-- Database: `govindlal_college`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) DEFAULT NULL,
  `addmission_year` varchar(30) DEFAULT NULL,
  `acadamic_year` varchar(30) DEFAULT NULL,
  `SL` varchar(30) DEFAULT NULL,
  `Medium` varchar(30) DEFAULT NULL,
  `enrolment_no` varchar(50) DEFAULT NULL,
  `stud_name` varchar(100) DEFAULT NULL,
  `fathers_full_name` varchar(100) DEFAULT NULL,
  `mothers_name` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `place_of_birth` varchar(50) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `DOB` varchar(20) DEFAULT NULL,
  `caste` varchar(20) DEFAULT NULL,
  `subcaste` varchar(20) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `blood_group` varchar(20) DEFAULT NULL,
  `physically_challenged` varchar(20) DEFAULT NULL,
  `blind` varchar(20) DEFAULT NULL,
  `fathers_occupation` varchar(30) DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `parents_mobile` varchar(30) DEFAULT NULL,
  `correspondence_address` text DEFAULT NULL,
  `have_voter_id` varchar(20) DEFAULT NULL,
  `stud_whatsapp` varchar(30) DEFAULT NULL,
  `stud_aadhar` varchar(50) DEFAULT NULL,
  `stud_email` varchar(50) DEFAULT NULL,
  `ABC_id` varchar(30) DEFAULT NULL,
  `name_of_exam` varchar(20) DEFAULT NULL,
  `name_of_board` varchar(20) DEFAULT NULL,
  `passing_year` varchar(20) DEFAULT NULL,
  `marks_obtained` varchar(30) DEFAULT NULL,
  `total_marks` varchar(30) DEFAULT NULL,
  `percentage` varchar(30) DEFAULT NULL,
  `Leaving_Certificate` varchar(30) DEFAULT NULL,
  `Previous_Marks_Memo` varchar(30) DEFAULT NULL,
  `Caste_Certificate` varchar(30) DEFAULT NULL,
  `NonCreamy_layer` varchar(30) DEFAULT NULL,
  `Gap_Certificate` varchar(30) DEFAULT NULL,
  `Aadhar_Card` varchar(30) DEFAULT NULL,
  `Bank_PassBook` varchar(30) DEFAULT NULL,
  `Bonafied_Certificate` varchar(30) DEFAULT NULL,
  `Income_Certificate` varchar(30) DEFAULT NULL,
  `Domacile_Certificate` varchar(30) DEFAULT NULL,
  `createdon` datetime NOT NULL,
  PRIMARY KEY(`stud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `course_name`, `addmission_year`, `acadamic_year`, `SL`, `Medium`, `enrolment_no`, `stud_name`, `fathers_full_name`, `mothers_name`, `gender`, `place_of_birth`, `photo`, `marital_status`, `DOB`, `caste`, `subcaste`, `nationality`, `religion`, `blood_group`, `physically_challenged`, `blind`, `fathers_occupation`, `permanent_address`, `parents_mobile`, `correspondence_address`, `have_voter_id`, `stud_whatsapp`, `stud_aadhar`, `stud_email`, `ABC_id`, `name_of_exam`, `name_of_board`, `passing_year`, `marks_obtained`, `total_marks`, `percentage`, `Leaving_Certificate`, `Previous_Marks_Memo`, `Caste_Certificate`, `NonCreamy_layer`, `Gap_Certificate`, `Aadhar_Card`, `Bank_PassBook`, `Bonafied_Certificate`, `Income_Certificate`, `Domacile_Certificate`, `createdon`) VALUES
(1, 'bca', 'sy', '2024', '[\"marathi\",\"hindi\"]', 'marathi', '2324324123', 'amol', 'sampat kanawade', 'meera', 'male', 'lingdev', 'WP20240606125037.jpeg', 'single', '1997-01-11', 'open', 'maratha', 'india', 'hindu', 'b+', 'no', 'no', 'service', 'pune', '8888888', 'pune', 'yes', '78543332131', '54653211', 'kanawadeamol2015@gmail.com', '4546132', '[\"10th\",\"12th\",\"U.G.', '[\"pune\",\"pune\",\"pune', '[\"2017\",\"2019\",\"2021', '0', '0', '0', '[\"Leaving Certificate original', '[\"Previous Marks Memo xerox\"]', '[\"Caste Certificate original\"]', '[\"Non-Creamy layer xerox\"]', '[\"Gap Certificate original\"]', '[\"Aadhar Card original\"]', '[\"Bank Pass-Book original\"]', '[\"Bonafied Certificate xerox\"]', '[\"Income Certificate xerox\"]', '[\"Domacile Certificate origina', '2024-06-06 12:50:37'),
(2, '1', 'fy', '2', '[\"marathi\"]', 'marathi', '3', '4', '5', '6', 'male', '7', 'WP20240606143955.png', 'single', '2024-06-08', 'obc', '10', '11', '', '', 'yes', 'yes', 'father', '13', '12', '14', 'yes', '16', '17', '18', '19', '[\"10th\",\"12th\",\"U.G.', '[\"R\",\"R\",\"R\",\"R\",\"R\"', '[\"TETE\",\"TETE\",\"TETE', '0', '0', '0', '[\"Leaving Certificate original', '[\"Previous Marks Memo original', '[\"Caste Certificate original\",', 'null', '[\"Gap Certificate original\"]', '[\"Aadhar Card original\"]', '[\"Bank Pass-Book original\"]', '[\"Bonafied Certificate origina', '[\"Income Certificate xerox\"]', '[\"Domacile Certificate xerox\"]', '2024-06-06 14:39:55'),
(3, 'Bsc', 'sy', '2024', '[\"marathi\",\"sanskrit\"]', 'marathi', '2324324125', 'Sanket kanawade', 'Bhausaheb kanawade', 'Surekha', 'male', 'Dhamangaon', 'WP20240606150143.jpeg', 'single', '1997-02-06', 'obc', 'maratha', 'india', 'hindu', 'b+', 'no', 'no', 'service', 'saNGAMNER', '987546123', 'sangamner', 'yes', '78543332135', '54653211654', 'demouse5150@gmail.com', '45461324653', '[\"10th\",\"12th\",\"U.G.', '[\"pune\",\"pune\",\"pune', '[\"2017\",\"2019\",\"2017', '0', '0', '0', '[\"Leaving Certificate original', '[\"Previous Marks Memo xerox\"]', '[\"Caste Certificate xerox\"]', '[\"Non-Creamy layer xerox\"]', '[\"Gap Certificate xerox\"]', '[\"Aadhar Card original\"]', '[\"Bank Pass-Book original\"]', '[\"Bonafied Certificate origina', '[\"Income Certificate original\"', '[\"Domacile Certificate origina', '2024-06-06 15:01:43'),
(4, 'Bsc', 'sy', '2024', '[\"marathi\",\"sanskrit\"]', 'marathi', '2324324125', 'Sanket kanawade', 'Bhausaheb kanawade', 'Surekha', 'male', 'Dhamangaon', 'WP20240606150220.jpeg', 'single', '1997-02-06', 'obc', 'maratha', 'india', 'hindu', 'b+', 'no', 'no', 'service', 'saNGAMNER', '987546123', 'sangamner', 'yes', '78543332135', '54653211654', 'demouse5150@gmail.com', '45461324653', '[\"10th\",\"12th\",\"U.G.', '[\"pune\",\"pune\",\"pune', '[\"2017\",\"2019\",\"2017', '0', '0', '0', '[\"Leaving Certificate original', '[\"Previous Marks Memo xerox\"]', '[\"Caste Certificate xerox\"]', '[\"Non-Creamy layer xerox\"]', '[\"Gap Certificate xerox\"]', '[\"Aadhar Card original\"]', '[\"Bank Pass-Book original\"]', '[\"Bonafied Certificate origina', '[\"Income Certificate original\"', '[\"Domacile Certificate origina', '2024-06-06 15:02:20'),
(5, 'Bsc', 'sy', '2024', '[\"marathi\",\"sanskrit\"]', 'marathi', '2324324125', 'Sanket kanawade', 'Bhausaheb kanawade', 'Surekha', 'male', 'Dhamangaon', 'WP20240606150322.jpeg', 'single', '1997-02-06', 'obc', 'maratha', 'india', 'hindu', 'b+', 'no', 'no', 'service', 'saNGAMNER', '987546123', 'sangamner', 'yes', '78543332135', '54653211654', 'demouse5150@gmail.com', '45461324653', '[\"10th\",\"12th\",\"U.G.', '[\"pune\",\"pune\",\"pune', '[\"2017\",\"2019\",\"2017', '0', '0', '0', '[\"Leaving Certificate original', '[\"Previous Marks Memo xerox\"]', '[\"Caste Certificate xerox\"]', '[\"Non-Creamy layer xerox\"]', '[\"Gap Certificate xerox\"]', '[\"Aadhar Card original\"]', '[\"Bank Pass-Book original\"]', '[\"Bonafied Certificate origina', '[\"Income Certificate original\"', '[\"Domacile Certificate origina', '2024-06-06 15:03:22'),
(6, 'Bsc', 'sy', '2024', '[\"marathi\",\"sanskrit\"]', 'marathi', '2324324125', 'Arvind', 'Bhausaheb kanawade', 'Surekha', 'male', 'Dhamangaon', 'WP20240606153528.jpeg', 'single', '1997-02-06', 'obc', 'maratha', 'india', 'hindu', 'b+', 'no', 'no', 'service', 'saNGAMNER', '987546123', 'sangamner', 'yes', '78543332135', '54653211654', 'demouse5150@gmail.com', '45461324653', '[\"10th\",\"12th\",\"U.G.', '[\"pune\",\"pune\",\"pune', '[\"2017\",\"2019\",\"2017', '0', '0', '0', '[\"Leaving Certificate original', '[\"Previous Marks Memo xerox\"]', '[\"Caste Certificate xerox\"]', '[\"Non-Creamy layer xerox\"]', '[\"Gap Certificate xerox\"]', '[\"Aadhar Card original\"]', '[\"Bank Pass-Book original\"]', '[\"Bonafied Certificate origina', '[\"Income Certificate original\"', '[\"Domacile Certificate origina', '2024-06-06 15:35:28'),
(7, 'Bsc', 'sy', '2024', '[\"marathi\",\"sanskrit\"]', 'marathi', '2324324125', 'Arvind', 'Bhausaheb kanawade', 'Surekha', 'male', 'Dhamangaon', 'WP20240606153935.jpeg', 'single', '1997-02-06', 'obc', 'maratha', 'india', 'hindu', 'b+', 'no', 'no', 'service', 'saNGAMNER', '987546123', 'sangamner', 'yes', '78543332135', '54653211654', 'demouse5150@gmail.com', '45461324653', '[\"10th\",\"12th\",\"U.G.', '[\"pune\",\"pune\",\"pune', '[\"2017\",\"2019\",\"2017', '0', '0', '0', '[\"Leaving Certificate original', '[\"Previous Marks Memo xerox\"]', '[\"Caste Certificate xerox\"]', '[\"Non-Creamy layer xerox\"]', '[\"Gap Certificate xerox\"]', '[\"Aadhar Card original\"]', '[\"Bank Pass-Book original\"]', '[\"Bonafied Certificate origina', '[\"Income Certificate original\"', '[\"Domacile Certificate origina', '2024-06-06 15:39:35'),
(8, 'BA', 'ty', '2024', '[\"marathi\",\"hindi\",\"sanskrit\"]', 'marathi', '23243241234', 'Abhi', 'Dattatray', 'sangita', 'male', 'sangamner', 'WP20240606154339.jpeg', 'single', '2024-05-29', 'sebc', 'maratha', 'india', 'hindu', 'b+', 'no', 'no', 'labour', 'sangamner', '888888845665', 'sangamner', 'yes', '78543332131', '54653211', 'nayan@gmail.com', '45461324532', '[\"10th\",\"12th\",\"U.G.', '[\"pune\",\"pune\",\"pune', '[\"2017\",\"2019\",\"2021', '0', '0', '0', '[\"Leaving Certificate original', '[\"Previous Marks Memo original', '[\"Caste Certificate original\"]', '[\"Non-Creamy layer original\"]', '[\"Gap Certificate original\"]', '[\"Aadhar Card xerox\"]', '[\"Bank Pass-Book xerox\"]', '[\"Bonafied Certificate xerox\"]', '[\"Income Certificate original\"', '[\"Domacile Certificate origina', '2024-06-06 15:43:39'),
(9, 'BA', 'ty', '2024', '[\"marathi\",\"hindi\",\"sanskrit\"]', 'marathi', '23243241234', 'Abhi', 'Dattatray', 'sangita', 'male', 'sangamner', 'WP20240606155033.jpeg', 'single', '2024-05-29', 'sebc', 'maratha', 'india', 'hindu', 'b+', 'no', 'no', 'labour', 'sangamner', '888888845665', 'sangamner', 'yes', '78543332131', '54653211', 'nayan@gmail.com', '45461324532', '[\"10th\",\"12th\",\"U.G.', '[\"pune\",\"pune\",\"pune', '[\"2017\",\"2019\",\"2021', '[\"500\",\"500\",\"400\",\"\",\"\",\"\"]', '[\"700\",\"700\",\"500\",\"\",\"\",\"\"]', '[\"80\",\"80\",\"90\",\"\",\"\",\"\"]', '[\"Leaving Certificate original', '[\"Previous Marks Memo original', '[\"Caste Certificate original\"]', '[\"Non-Creamy layer original\"]', '[\"Gap Certificate original\"]', '[\"Aadhar Card xerox\"]', '[\"Bank Pass-Book xerox\"]', '[\"Bonafied Certificate xerox\"]', '[\"Income Certificate original\"', '[\"Domacile Certificate origina', '2024-06-06 15:50:33'),
(10, '1', 'sy', '', '[\"marathi\"]', 'marathi', '3', '4', 'Shyam r TETE', '6', 'male', '7', 'WP20240606155422.jpg', 'single', '2024-06-01', 'vjnt', 'a', '11', 'b', 'c', 'yes', 'yes', 'father', 'Sinhagad Road Pune', '12', 'a', 'yes', '16', '', 'grtete99@yahoo.co.in', '19', '[\"10th\",\"12th\",\"U.G.', '[\"R\",\"R\",\"R\",\"R\",\"R\"', '[\"TETE\",\"TETE\",\"TETE', '[\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"\",\"\",\"\",\"\",\"\",\"\"]', '[\"Leaving Certificate original', '[\"Previous Marks Memo xerox\"]', '[\"Caste Certificate xerox\"]', '[\"Non-Creamy layer original\"]', '[\"Gap Certificate original\"]', 'null', '[\"Bank Pass-Book xerox\"]', '[\"Bonafied Certificate origina', '[\"Income Certificate xerox\"]', '[\"Domacile Certificate origina', '2024-06-06 15:54:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
