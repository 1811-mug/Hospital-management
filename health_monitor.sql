-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 05:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_monitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(10) NOT NULL,
  `registration_no` int(11) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `d_contact` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `registration_no`, `doctor_name`, `gender`, `d_contact`) VALUES
(1, 225565, 'Dr. Mandar Pawar', 'Male', 9966332255),
(2, 214420, 'Dr. Hemant Shah', 'Male', 9865327410),
(3, 205394, 'Dr. Vijay Goswami', 'Male', 7865412305),
(4, 254670, 'Dr. Shraddha Deshpande', 'Female', 7854693210),
(5, 370051, 'Dr. Bharati Nirali', 'Female', 8546327103),
(11, 332211, 'Mr. Akash Khaire', 'Male', 9875566441);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `d_id` int(10) NOT NULL,
  `n_id` int(10) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `d_id`, `n_id`, `pwd`, `user`) VALUES
(1, 2, 0, 'xyz987', 'Shah'),
(7, 5, 0, 'abc123', 'Nirali'),
(8, 0, 7, '123654', 'Kate'),
(9, 0, 0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `n_id` int(10) NOT NULL,
  `n_name` varchar(50) NOT NULL,
  `n_gender` varchar(15) NOT NULL,
  `n_age` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`n_id`, `n_name`, `n_gender`, `n_age`) VALUES
(5, 'Mr. Anish Khatri', 'Male', '28'),
(6, 'Mr. Gaurav Agarwal', 'Male', '43'),
(7, 'Mrs. Ujwala Kate', 'Female', '43'),
(8, 'Miss. Anuja Sharma', 'Female', '32'),
(9, 'Mrs. Kamal Bajaj', 'Female', '38'),
(10, 'Mr. Sonu Gatte', 'Male', '34'),
(11, 'Mr. Manik Malla', 'Male', '45'),
(12, 'Mr. Manik Rao', 'Male', '44'),
(13, 'Mr. Mannu Rao', 'Male', '41'),
(14, 'Miss Moni Roy', 'Female', '33');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_gender` varchar(15) NOT NULL,
  `p_age` smallint(3) NOT NULL,
  `covid_report` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `d_id`, `p_name`, `p_gender`, `p_age`, `covid_report`) VALUES
(1, 3, 'Mr. Jack Root', 'Male', 32, 'Positive'),
(2, 4, 'Miss. Gauri Deshmukh', 'Female', 29, 'Positive'),
(3, 5, 'Mrs. Srivalli Singh', 'Female', 42, 'Negative'),
(4, 2, 'Mrs. Arati Nayak', 'Female', 32, 'Positive'),
(5, 1, 'Mr. Arun Modi', 'Male', 23, 'Positive'),
(6, 4, 'Mr. Prakash Shethi', 'Male', 57, 'Positive'),
(7, 1, 'Miss. Mamta Pandit', 'Female', 16, 'Positive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `d_id` (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `n_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
