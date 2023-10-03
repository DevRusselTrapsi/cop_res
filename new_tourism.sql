-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 11:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accommodation`
--

CREATE TABLE `tbl_accommodation` (
  `accom_id` int(11) NOT NULL,
  `type_of_room` varchar(200) NOT NULL,
  `no_accom_units` int(100) NOT NULL,
  `accom_capacity` int(100) NOT NULL,
  `accom_rates` double NOT NULL,
  `acom_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accommodation`
--

INSERT INTO `tbl_accommodation` (`accom_id`, `type_of_room`, `no_accom_units`, `accom_capacity`, `accom_rates`, `acom_url`) VALUES
(7, 'queen bed size', 1, 2, 15000, 'C:xampp	mpphp47B5.tmp'),
(8, 'queen bed size', 1, 2, 5000, 'C:xampp	mpphp8675.tmp'),
(9, 'queen bed size', 1, 2, 5000, 'accom_img/Screenshot (73).png'),
(10, 'queen bed size', 1, 2, 5000, 'accom_img/Screenshot (73).png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `name`, `email`, `admin_pass`) VALUES
(1, 'mark russel trapsi', 'mark@gmail.com', '$2y$10$3.0Nczcn.4xQJ/zTHCa7FeYsiKXbQLT210Kkt9a4va1vlqhio0e.C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facility`
--

CREATE TABLE `tbl_facility` (
  `faci_id` int(11) NOT NULL,
  `type_of_facility` varchar(200) NOT NULL,
  `faci_capacity` int(50) NOT NULL,
  `no_faci_units` int(50) NOT NULL,
  `faci_rates` double NOT NULL,
  `faci_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_facility`
--

INSERT INTO `tbl_facility` (`faci_id`, `type_of_facility`, `faci_capacity`, `no_faci_units`, `faci_rates`, `faci_url`) VALUES
(6, 'basketball', 10, 1, 150, 'Array'),
(7, 'basketball', 10, 1, 150, 'Array'),
(8, 'basketball', 10, 1, 150, 'Array'),
(9, 'basketball', 10, 1, 150, 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resort`
--

CREATE TABLE `tbl_resort` (
  `resort_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resort_name` varchar(100) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `owner_address` varchar(100) NOT NULL,
  `owner_contact` bigint(12) NOT NULL,
  `resort_office` bigint(12) NOT NULL,
  `resort_contact` bigint(12) NOT NULL,
  `manager_contact` bigint(12) NOT NULL,
  `resort_url` varchar(200) NOT NULL,
  `resort_address` varchar(100) NOT NULL,
  `accom_id` int(11) NOT NULL,
  `faci_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_resort`
--

INSERT INTO `tbl_resort` (`resort_id`, `user_id`, `resort_name`, `owner_name`, `owner_address`, `owner_contact`, `resort_office`, `resort_contact`, `manager_contact`, `resort_url`, `resort_address`, `accom_id`, `faci_id`, `service_id`) VALUES
(20, 1, 'Kainomayan', 'Bing Maniquiz', 'Iba Zambales', 9762499708, 9762499708, 9762499708, 9762499708, 'C:xampp	mpphp47A4.tmp', 'San Juan, Botolan Zambales', 7, 6, 6),
(21, 5, 'kainomayan', 'marion', 'porac', 9762499708, 9762499708, 9762499708, 9762499708, 'C:xampp	mpphp8664.tmp', 'san juan', 8, 7, 7),
(22, 5, 'kainomayan', 'marion', 'porac', 9762499708, 9762499708, 9762499708, 9762499708, 'C:xampp	mpphp3B80.tmp', 'san juan', 9, 8, 8),
(23, 5, 'kainomayan', 'marion', 'porac', 9762499708, 9762499708, 9762499708, 9762499708, 'C:xampp	mpphp2EB.tmp', 'san juan', 10, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `type_of_service` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `service_rates` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `type_of_service`, `description`, `service_rates`) VALUES
(6, 'laundry', 'laundry service for a one week', 500),
(7, 'laundry', 'awdwa', 140),
(8, 'laundry', 'awdwa', 140),
(9, 'laundry', 'awdwa', 140);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `fname`, `lname`, `email`, `contact`, `user_address`, `user_pass`) VALUES
(1, 'mark russel', 'trapsi', 'mark@gmail.com', 9762499708, 'porac,botolan, zambales', '$2y$10$2U8CSdaDYaDe5rKm5LNwQ.mvBDMvQQ2GG1Znxd49IxhWsnOKY6Dbq'),
(4, 'aljay', 'Devillas', 'Aljay@gmail.com', 97624997708, 'Taugtog', '$2y$10$8KBFywJa9av7EXB1ctGOquVZxZWzxojJ.brnCGGj8j7QOF8lwKlkK'),
(5, 'marion', 'barroga', 'marion@gmail.com', 9762499708, 'porac', '$2y$10$ENAf.MQC0gkABQX.TasznOD7.4DAIX/sdGXGfkpN72jqhBjGO0O9G');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `verify_id` int(11) NOT NULL,
  `resort_id` int(11) NOT NULL,
  `business_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accommodation`
--
ALTER TABLE `tbl_accommodation`
  ADD PRIMARY KEY (`accom_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  ADD PRIMARY KEY (`faci_id`);

--
-- Indexes for table `tbl_resort`
--
ALTER TABLE `tbl_resort`
  ADD PRIMARY KEY (`resort_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `faci_id` (`faci_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `accom_id` (`accom_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`verify_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accommodation`
--
ALTER TABLE `tbl_accommodation`
  MODIFY `accom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  MODIFY `faci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_resort`
--
ALTER TABLE `tbl_resort`
  MODIFY `resort_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `verify_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_resort`
--
ALTER TABLE `tbl_resort`
  ADD CONSTRAINT `tbl_resort_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_resort_ibfk_2` FOREIGN KEY (`faci_id`) REFERENCES `tbl_facility` (`faci_id`),
  ADD CONSTRAINT `tbl_resort_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`service_id`),
  ADD CONSTRAINT `tbl_resort_ibfk_4` FOREIGN KEY (`accom_id`) REFERENCES `tbl_accommodation` (`accom_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
