-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 08:23 PM
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
-- Database: `checklistofcoursesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `firstyear_firstsem`
--

CREATE TABLE `firstyear_firstsem` (
  `firstyear_firstsem_id` int(11) NOT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `course_title` varchar(100) DEFAULT NULL,
  `credit_unit_lecture` int(11) DEFAULT NULL,
  `credit_unit_laboratory` int(11) DEFAULT NULL,
  `pre_requisite` varchar(100) DEFAULT NULL,
  `prof_instructor` varchar(50) DEFAULT NULL,
  `final_grade` varchar(50) DEFAULT NULL,
  `student_info_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `firstyear_firstsem`
--

INSERT INTO `firstyear_firstsem` (`firstyear_firstsem_id`, `course_code`, `course_title`, `credit_unit_lecture`, `credit_unit_laboratory`, `pre_requisite`, `prof_instructor`, `final_grade`, `student_info_id`) VALUES
(1, 'GNED 02', 'Ethics', 3, 0, '', 'Agunad', '1.25', 1),
(2, 'GNED 05', 'Purposive Communication', 3, 0, '', 'Turres', '2.00', 1),
(3, 'GNED 011', 'Kontesktwalisadong Komunikasyon sa Filipino', 3, 0, '', 'Castillo', '1.25', 1),
(4, 'COSC 50', 'Discrete Structure I', 3, 0, '', 'Porson', '2.25', 1),
(5, 'DCIT 21', 'Introduction to Computing', 2, 1, '', 'Rutal', '2.50', 1),
(6, 'DCIT 22', 'Computer Programming 1', 1, 2, '', 'Relgica', '2.25', 1),
(7, 'FITT 1', 'Movement Enchancement', 1, 0, '', 'Jamito', '1.75', 1),
(8, 'NSTP 1', 'National Service Training Program 1', 3, 0, '', 'Valdeponia', '1.75', 1),
(9, 'CvSU 101', 'Institutional Orientation', 1, 0, '', 'Rodrigez', '1.25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `firstyear_secondsem`
--

CREATE TABLE `firstyear_secondsem` (
  `firstyear_secondsem_id` int(11) NOT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `course_title` varchar(100) DEFAULT NULL,
  `credit_unit_lecture` int(11) DEFAULT NULL,
  `credit_unit_laboratory` int(11) DEFAULT NULL,
  `pre_requisite` varchar(100) DEFAULT NULL,
  `prof_instructor` varchar(50) DEFAULT NULL,
  `final_grade` varchar(50) DEFAULT NULL,
  `student_info_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `firstyear_secondsem`
--

INSERT INTO `firstyear_secondsem` (`firstyear_secondsem_id`, `course_code`, `course_title`, `credit_unit_lecture`, `credit_unit_laboratory`, `pre_requisite`, `prof_instructor`, `final_grade`, `student_info_id`) VALUES
(1, 'GNED 01', 'Art Appreciation', 3, 0, '', 'Peraldo', '2.00', 1),
(2, 'GNED 03', 'Mathematics In the Modern World', 3, 0, '', '', '2.25', 1),
(3, 'GNED 06', 'Science, Technology and Society', 3, 0, '', '', '1.75', 1),
(4, 'GNED 12', 'Dalumat Ng/Sa Filipino', 3, 0, 'GNED 11', 'Castillo', '1.25', 1),
(5, 'DCIT 23', 'Computer Programming II', 1, 2, 'DCIT 22', 'Roy', '2.25', 1),
(6, 'ITEC 50', 'Web Systems and Technologies', 2, 1, 'DCIT 21', '', '1.17', 1),
(7, 'FITT 2', 'Fitness Exercises', 2, 0, 'FIT 1', 'Tatad', '1.50', 1),
(8, 'NSTP 2', 'National Service Training Program 2', 3, 0, 'NSTP 1', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `secondyear_firstsem`
--

CREATE TABLE `secondyear_firstsem` (
  `secondyear_firstsem_id` int(11) NOT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `course_title` varchar(100) DEFAULT NULL,
  `credit_unit_lecture` int(11) DEFAULT NULL,
  `credit_unit_laboratory` int(11) DEFAULT NULL,
  `pre_requisite` varchar(100) DEFAULT NULL,
  `prof_instructor` varchar(50) DEFAULT NULL,
  `final_grade` varchar(50) DEFAULT NULL,
  `student_info_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `secondyear_firstsem`
--

INSERT INTO `secondyear_firstsem` (`secondyear_firstsem_id`, `course_code`, `course_title`, `credit_unit_lecture`, `credit_unit_laboratory`, `pre_requisite`, `prof_instructor`, `final_grade`, `student_info_id`) VALUES
(1, 'GNED 04', 'Mga Babasahin Hinggil sa Kasaysayan ng Pilipinas', 3, 0, '', 'Ms.Sambrano', '2.00', 1),
(2, 'MATH 1', 'Analytic Geometry', 3, 0, 'GNED 03', 'Ms.Castillo', '2.25', 1),
(3, 'COSC 55', 'Discrete Structures II', 3, 0, 'COSC 50', 'Ms.Mariozo', '2.75', 1),
(4, 'COSC 60', 'Digital Logic Design', 2, 0, 'COSC 50, DOT 23', 'Ms.Nati', '1.75', 1),
(5, 'DCIT 50', 'Object Oriented Programming', 2, 0, 'DCIT 23', 'Mr.Belgica', '3.00', 1),
(6, 'DCIT 24', 'Information Management', 2, 0, 'DCIT 23', 'Mr.Deciputo', '3.00', 1),
(7, 'INSY 50', 'Fundamentals of Information Systems', 3, 0, 'DCIT 21', 'Mr.Resete', '2.00', 1),
(8, 'FIIT 3', 'Physical Activities towards Health and Fitness 1', 2, 0, 'FITT 1', 'Mr.Janito', '1.75', 1);

-- --------------------------------------------------------

--
-- Table structure for table `secondyear_secondsem`
--

CREATE TABLE `secondyear_secondsem` (
  `secondyear_secondsem_id` int(11) NOT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `course_title` varchar(100) DEFAULT NULL,
  `credit_unit_lecture` int(11) DEFAULT NULL,
  `credit_unit_laboratory` int(11) DEFAULT NULL,
  `pre_requisite` varchar(100) DEFAULT NULL,
  `prof_instructor` varchar(50) DEFAULT NULL,
  `final_grade` varchar(50) DEFAULT NULL,
  `student_info_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `secondyear_secondsem`
--

INSERT INTO `secondyear_secondsem` (`secondyear_secondsem_id`, `course_code`, `course_title`, `credit_unit_lecture`, `credit_unit_laboratory`, `pre_requisite`, `prof_instructor`, `final_grade`, `student_info_id`) VALUES
(1, 'GNED 08', 'Understanding The Self', 3, 0, '', '', '', 1),
(2, 'GNED 14', 'Panitikang Panlipunan', 3, 0, '', '', '', 1),
(3, 'MATH 2', 'Calculus', 3, 0, 'MATH 1', '', '', 1),
(4, 'COSC 65', 'Architecture and Organization', 2, 1, 'COSC 60', '', '', 1),
(5, 'COSC 70', 'Software Engineering I', 3, 0, 'DCIT 50 & 24', '', '', 1),
(6, 'DCIT 25', 'Data Structures and Algorithms', 2, 1, 'DCIT 23', '', '', 1),
(7, 'DCIT 55', 'Advance Datbase Management System', 2, 1, 'DCIT 24', '', '', 1),
(8, 'FITT 4', 'Physical Activities towards Health and Fitness 2', 0, 0, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `student_info_id` int(11) NOT NULL,
  `student_number` varchar(20) DEFAULT NULL,
  `name_of_student` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `date_of_admission` date DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `name_of_adviser` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`student_info_id`, `student_number`, `name_of_student`, `address`, `date_of_admission`, `contact_number`, `name_of_adviser`) VALUES
(1, '202211857', 'Trisha Joy C. Tachagon', 'UKNOWN', '0000-00-00', '09474129890', 'UNKNOWN');

-- --------------------------------------------------------

--
-- Table structure for table `thirdyear_firstsem`
--

CREATE TABLE `thirdyear_firstsem` (
  `thirdyear_firstsem_id` int(11) NOT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `course_title` varchar(100) DEFAULT NULL,
  `credit_unit_lecture` int(11) DEFAULT NULL,
  `credit_unit_laboratory` int(11) DEFAULT NULL,
  `pre_requisite` varchar(100) DEFAULT NULL,
  `prof_instructor` varchar(50) DEFAULT NULL,
  `final_grade` varchar(50) DEFAULT NULL,
  `student_info_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thirdyear_firstsem`
--

INSERT INTO `thirdyear_firstsem` (`thirdyear_firstsem_id`, `course_code`, `course_title`, `credit_unit_lecture`, `credit_unit_laboratory`, `pre_requisite`, `prof_instructor`, `final_grade`, `student_info_id`) VALUES
(1, 'MATH 3', 'Linear Algebra', 3, 0, 'MATH 2', '', '', 1),
(2, 'COSC 75', 'Software Engineering II', 2, 0, 'COSC 70', '', '', 1),
(3, 'COSC 80', 'Operating System', 2, 1, 'DCIT 25', '', '', 1),
(4, 'COSC 85', 'Network and Communication', 2, 1, 'ITEC 50', '', '', 1),
(5, 'COSC 101', 'CS Elective 1 (Computer Graphics and Visual Computing)', 2, 1, 'DCIT 23', '', '', 1),
(6, 'DCIT 26', 'Application Devt and Emerging Technologies', 2, 1, 'ITEC 50', '', '', 1),
(7, 'DCIT 65', 'Social and Professional Issues', 3, 0, '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `firstyear_firstsem`
--
ALTER TABLE `firstyear_firstsem`
  ADD PRIMARY KEY (`firstyear_firstsem_id`),
  ADD KEY `student_info_id` (`student_info_id`);

--
-- Indexes for table `firstyear_secondsem`
--
ALTER TABLE `firstyear_secondsem`
  ADD PRIMARY KEY (`firstyear_secondsem_id`),
  ADD KEY `student_info_id` (`student_info_id`);

--
-- Indexes for table `secondyear_firstsem`
--
ALTER TABLE `secondyear_firstsem`
  ADD PRIMARY KEY (`secondyear_firstsem_id`),
  ADD KEY `student_info_id` (`student_info_id`);

--
-- Indexes for table `secondyear_secondsem`
--
ALTER TABLE `secondyear_secondsem`
  ADD PRIMARY KEY (`secondyear_secondsem_id`),
  ADD KEY `student_info_id` (`student_info_id`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`student_info_id`);

--
-- Indexes for table `thirdyear_firstsem`
--
ALTER TABLE `thirdyear_firstsem`
  ADD PRIMARY KEY (`thirdyear_firstsem_id`),
  ADD KEY `student_info_id` (`student_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `firstyear_firstsem`
--
ALTER TABLE `firstyear_firstsem`
  MODIFY `firstyear_firstsem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `firstyear_secondsem`
--
ALTER TABLE `firstyear_secondsem`
  MODIFY `firstyear_secondsem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `secondyear_firstsem`
--
ALTER TABLE `secondyear_firstsem`
  MODIFY `secondyear_firstsem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `secondyear_secondsem`
--
ALTER TABLE `secondyear_secondsem`
  MODIFY `secondyear_secondsem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `student_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thirdyear_firstsem`
--
ALTER TABLE `thirdyear_firstsem`
  MODIFY `thirdyear_firstsem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `firstyear_firstsem`
--
ALTER TABLE `firstyear_firstsem`
  ADD CONSTRAINT `firstyear_firstsem_ibfk_1` FOREIGN KEY (`student_info_id`) REFERENCES `student_information` (`student_info_id`);

--
-- Constraints for table `firstyear_secondsem`
--
ALTER TABLE `firstyear_secondsem`
  ADD CONSTRAINT `firstyear_secondsem_ibfk_1` FOREIGN KEY (`student_info_id`) REFERENCES `student_information` (`student_info_id`);

--
-- Constraints for table `secondyear_firstsem`
--
ALTER TABLE `secondyear_firstsem`
  ADD CONSTRAINT `secondyear_firstsem_ibfk_1` FOREIGN KEY (`student_info_id`) REFERENCES `student_information` (`student_info_id`);

--
-- Constraints for table `secondyear_secondsem`
--
ALTER TABLE `secondyear_secondsem`
  ADD CONSTRAINT `secondyear_secondsem_ibfk_1` FOREIGN KEY (`student_info_id`) REFERENCES `student_information` (`student_info_id`);

--
-- Constraints for table `thirdyear_firstsem`
--
ALTER TABLE `thirdyear_firstsem`
  ADD CONSTRAINT `thirdyear_firstsem_ibfk_1` FOREIGN KEY (`student_info_id`) REFERENCES `student_information` (`student_info_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
