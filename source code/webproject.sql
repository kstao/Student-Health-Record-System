-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 01:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `student_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `message`, `date`, `status`, `student_id`, `doctor_id`) VALUES
(1, 'test123\r\n', '2023-01-21', 'sent', 2, 3),
(18, 'urgent', '2023-01-25', 'sent', 9, 3),
(19, '', '2023-01-25', 'sent', 2, 3),
(20, '', '2023-01-25', 'approve', 2, 3),
(21, '', '2023-01-26', 'reject', 2, 3),
(22, '123', '2023-01-27', 'approve', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `med_cert`
--

CREATE TABLE `med_cert` (
  `medcert_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `filepath` varchar(50) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `med_cert`
--

INSERT INTO `med_cert` (`medcert_id`, `status`, `filepath`, `student_id`, `teacher_id`, `doctor_id`, `start_date`, `duration`) VALUES
(5, 'approve', 'B032020017_BITI.pdf', 2, 1, NULL, NULL, NULL),
(9, 'reject', 'Lecture 3 - CSS.pdf', 2, 1, NULL, NULL, NULL),
(14, 'sent', NULL, 2, NULL, 3, '2023-01-23', 3),
(15, 'approve', NULL, 2, NULL, 3, '2023-01-23', 0),
(16, 'approve', NULL, 2, NULL, 3, '2023-01-23', 7),
(17, 'reject', 'Lecture 4 - HTML5.pdf', 2, 1, NULL, NULL, NULL),
(18, 'sent', '02 TEXT PROCESSING.pdf', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `illness` varchar(50) NOT NULL,
  `treatment` varchar(50) NOT NULL,
  `temperature` int(11) NOT NULL,
  `bloodpressure` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`record_id`, `date`, `illness`, `treatment`, `temperature`, `bloodpressure`, `height`, `weight`, `comment`, `student_id`, `doctor_id`) VALUES
(1, '2023-01-22', '', '', 0, 0, 0, 0, '', 2, 3),
(6, '2023-01-22', '', '', 0, 0, 0, 0, '', 2, 3),
(7, '2023-01-22', 'sad', 'asd', 0, 0, 0, 0, 'sd', 2, 3),
(8, '2023-01-22', 'asd', 'cvcv', 0, 0, 0, 0, 'dafe e', 2, 3),
(9, '2023-01-22', 'dfefadf', 'dsfsdf e', 0, 0, 0, 0, 'scerwrcrrv', 2, 3),
(10, '2023-01-25', '123', '123', 123, 123, 12, 123, '', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'teacher'),
(2, 'student'),
(3, 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `password`, `role_id`, `gender`, `age`, `email`, `contact`) VALUES
(1, 'teacher', 'teacher', '8d788385431273d11e8b43bb78f3aa41', 1, '', 0, '', ''),
(2, 'student', 'student', 'cd73502828457d15655bbd7a63fb0bc8', 2, 'male', 16, 'student@gmail.com', '0123456789'),
(3, 'doctor', 'doctor', 'f9f16d97c90d8c6f2cab37bb6d1f1992', 3, '', 0, '', ''),
(9, 'soo', 'soo', '202cb962ac59075b964b07152d234b70', 2, 'male', 23, 'sookt9@gmail.com', '01159976008'),
(11, 'q', '123', '202cb962ac59075b964b07152d234b70', 2, 'male', 1, 'lipyang0413@turnitin.com', '123'),
(12, 'soo', 'soo123', '202cb962ac59075b964b07152d234b70', 1, 'male', 12, 'lipyang0413@turnitin.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `med_cert`
--
ALTER TABLE `med_cert`
  ADD PRIMARY KEY (`medcert_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `med_cert`
--
ALTER TABLE `med_cert`
  MODIFY `medcert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `med_cert`
--
ALTER TABLE `med_cert`
  ADD CONSTRAINT `med_cert_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `med_cert_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `med_cert_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
