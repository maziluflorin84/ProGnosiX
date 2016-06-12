-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2016 at 10:56 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prognosix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(5) NOT NULL,
  `first_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Florin', 'Mazilu', 'maziluflorin84@gmail.com', 'fd2c1dc3b51b086adcc4f1dffb710e8a');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(2) NOT NULL,
  `class_name` int(2) NOT NULL,
  `class_semi_year` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `class_year` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `class_semi_year`, `class_year`) VALUES
(1, 1, 'A', 2),
(2, 2, 'A', 2),
(3, 3, 'A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(5) NOT NULL,
  `course_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `year` int(2) NOT NULL,
  `semester` int(2) NOT NULL,
  `head_prof_id` int(5) NOT NULL,
  `assist_prof_ids` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `course_ev_no` int(2) NOT NULL,
  `seminar_ev_no` int(2) NOT NULL,
  `project_ev_no` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `year`, `semester`, `head_prof_id`, `assist_prof_ids`, `course_ev_no`, `seminar_ev_no`, `project_ev_no`) VALUES
(1, 'Tehnologii WEB', 2, 2, 3, '4;5', 1, 3, 1),
(2, 'Proiectarea Algoritmilor', 1, 2, 1, '4', 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `ID` int(5) NOT NULL,
  `course_id` int(5) NOT NULL,
  `prof_id` int(5) NOT NULL,
  `stud_id` int(5) NOT NULL,
  `evaluation_type` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT '"course_ev", "seminar_ev", "project_ev"',
  `evaluation_no` int(2) NOT NULL,
  `prof_grade` float NOT NULL,
  `student_grade` float NOT NULL,
  `final_grade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `ID` int(5) NOT NULL,
  `first_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `parent_init` varchar(2) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `course_classes` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`ID`, `first_name`, `parent_init`, `last_name`, `email`, `password`, `course_classes`, `confirmed`) VALUES
(1, 'Dorel', 'L', 'Lucanu', 'dorel.lucanu@info.uaic.ro', 'fd2c1dc3b51b086adcc4f1dffb710e8a', '1:A1-A2;2:2A3', 1),
(2, 'Cosmin', 'N', 'Varlan', 'c.varlan@info.uaic.ro', 'fd2c1dc3b51b086adcc4f1dffb710e8a', '', 0),
(3, 'Sabin-Corneliu', 'M', 'Buraga', 'busaco@info.uaic.ro', 'fd2c1dc3b51b086adcc4f1dffb710e8a', '', 1),
(4, 'Alexandru', 'A', 'Coman', 'coman.andrei@info.uaic.ro', 'fd2c1dc3b51b086adcc4f1dffb710e8a', '', 1),
(5, 'Andrei', 'C', 'Panu', 'panu.andrei@info.uaic.ro', 'fd2c1dc3b51b086adcc4f1dffb710e8a', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(5) NOT NULL,
  `class_id` int(2) NOT NULL,
  `first_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `parent_init` varchar(2) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `confirmed` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `class_id`, `first_name`, `parent_init`, `last_name`, `email`, `password`, `confirmed`) VALUES
(1, 1, 'Florin', 'L', 'Mazilu', 'florin.mazilu@info.uaic.ro', 'fd2c1dc3b51b086adcc4f1dffb710e8a', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
