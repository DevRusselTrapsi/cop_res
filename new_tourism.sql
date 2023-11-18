-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 04:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`id`, `page_name`, `view_count`) VALUES
(1, '/cop_res/travel/home.php', 7),
(2, '/cop_res/travel/about.php', 7),
(3, '/cop_res/travel/destinations.php', 9),
(4, '/cop_res/travel/contact.php', 5),
(5, '/cop_res/travel/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accommodation`
--

CREATE TABLE `tbl_accommodation` (
  `accom_id` int(11) NOT NULL,
  `resort_id` int(11) NOT NULL,
  `type_of_room` varchar(200) NOT NULL,
  `no_accom_units` int(100) NOT NULL,
  `accom_capacity` int(100) NOT NULL,
  `accom_rates` double NOT NULL,
  `acom_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accommodation`
--

INSERT INTO `tbl_accommodation` (`accom_id`, `resort_id`, `type_of_room`, `no_accom_units`, `accom_capacity`, `accom_rates`, `acom_url`) VALUES
(21, 22, 'bedroom', 2, 2, 1500, 'accom_img/Screenshot 2023-09-29 221639.png'),
(22, 22, 'queen bed', 1, 2, 1600, 'accom_img/Screenshot 2023-09-29 221639.png'),
(23, 22, 'king bed', 1, 1, 1700, 'accom_img/Screenshot 2023-09-29 221532.png'),
(24, 23, 'double deck bed', 2, 2, 1500, 'accom_img/Screenshot 2023-09-29 221532.png'),
(25, 24, 'queen bed', 1, 2, 1500, 'accom_img/Screenshot (78).png'),
(26, 24, 'king bed', 1, 2, 5000, 'accom_img/Screenshot 2023-09-29 221532.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `status`, `admin_pass`) VALUES
(1, 'mark@gmail.com', 'admin', '$2y$10$3.0Nczcn.4xQJ/zTHCa7FeYsiKXbQLT210Kkt9a4va1vlqhio0e.C'),
(2, 'marky@gmail.com', 'admin', '$2y$10$fs7tUwxduqH2NwWERbEj8uwdzJ1vCZn4K.9oUGo7aKcQVTXCXsePG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facility`
--

CREATE TABLE `tbl_facility` (
  `faci_id` int(11) NOT NULL,
  `resort_id` int(11) NOT NULL,
  `type_of_facility` varchar(200) NOT NULL,
  `faci_capacity` int(50) NOT NULL,
  `no_faci_units` int(50) NOT NULL,
  `faci_rates` double NOT NULL,
  `faci_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_facility`
--

INSERT INTO `tbl_facility` (`faci_id`, `resort_id`, `type_of_facility`, `faci_capacity`, `no_faci_units`, `faci_rates`, `faci_url`) VALUES
(23, 22, 'basketball', 10, 1, 50, 'faci_img/Screenshot 2023-09-29 222139.png'),
(24, 23, 'swimming pool', 10, 1, 1500, 'faci_img/Screenshot 2023-09-29 222115.png'),
(25, 24, 'swimming pool', 10, 2, 100, 'faci_img/Screenshot 2023-09-29 221941.png');

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
  `verification` varchar(50) NOT NULL,
  `permit_url` varchar(200) NOT NULL,
  `resort_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_resort`
--

INSERT INTO `tbl_resort` (`resort_id`, `user_id`, `resort_name`, `owner_name`, `owner_address`, `owner_contact`, `resort_office`, `resort_contact`, `manager_contact`, `resort_url`, `verification`, `permit_url`, `resort_address`) VALUES
(22, 7, 'Sundowners', 'russel trapsi', 'porac botolan', 9762499708, 9762499708, 9762499708, 9762499708, 'estab_img/Screenshot 2023-09-29 215511.png', 'verified', 'permit_img/Screenshot 2023-09-29 215511.png', 'Danacbunga'),
(23, 8, 'Haya', 'russel trapsi', 'porac zambales', 9762499708, 9762499708, 9762499708, 9762499708, 'estab_img/Screenshot 2023-10-11 123246.png', 'verified', 'estab_img/Screenshot 2023-10-11 123246.png', 'Panan Botolan zambales'),
(24, 9, 'C & J', 'luis edano', 'porac botolan zambales', 9762499708, 9762499708, 9762499708, 9762499708, 'estab_img/Screenshot 2023-09-29 221639.png', 'verified', 'permit_img/Screenshot 2023-09-30 002858.png', 'Binuclutan Zambales');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `resort_id` int(11) NOT NULL,
  `type_of_service` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `service_rates` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `resort_id`, `type_of_service`, `description`, `service_rates`) VALUES
(23, 22, 'laundry', 'all clothes will be wash', 150),
(24, 23, 'transportation', 'point to point service', 1500),
(25, 24, 'transportation', 'point to point', 1500);

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
(7, 'fei mar elle', 'trapsi', 'fei@gmail.com', 9762499708, 'porac botolan zambales', '$2y$10$PMrVRiyfvaUJux9nufEqpOAcAHMr.2bNt7UndamT8K2eZXPat7JlO'),
(8, 'mark russel', 'trapsi', 'russel@gmail.com', 9762499708, 'porac botolan zambales', '$2y$10$tJfMcMfAkLb4xZbpn4lw7./ep..8UmGBesOOmsTZlSk40ltjLWuwO'),
(9, 'Luis Sebastian', 'edano', 'luis@gmail.com', 9762499708, 'Porac Botolan Zambales', '$2y$10$TEMKUt2oReoqKcNGJZBZIuabiPN2rZx9aA1yDheI64yaKf5WgAfh2');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `verify_id` int(11) NOT NULL,
  `resort_id` int(11) NOT NULL,
  `verified` varchar(20) NOT NULL,
  `business_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accommodation`
--
ALTER TABLE `tbl_accommodation`
  ADD PRIMARY KEY (`accom_id`),
  ADD KEY `resort_id` (`resort_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  ADD PRIMARY KEY (`faci_id`),
  ADD KEY `resort_id` (`resort_id`);

--
-- Indexes for table `tbl_resort`
--
ALTER TABLE `tbl_resort`
  ADD PRIMARY KEY (`resort_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `resort_id` (`resort_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`verify_id`),
  ADD KEY `resort_id` (`resort_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_accommodation`
--
ALTER TABLE `tbl_accommodation`
  MODIFY `accom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  MODIFY `faci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_resort`
--
ALTER TABLE `tbl_resort`
  MODIFY `resort_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `verify_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_accommodation`
--
ALTER TABLE `tbl_accommodation`
  ADD CONSTRAINT `tbl_accommodation_ibfk_1` FOREIGN KEY (`resort_id`) REFERENCES `tbl_resort` (`resort_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  ADD CONSTRAINT `tbl_facility_ibfk_1` FOREIGN KEY (`resort_id`) REFERENCES `tbl_resort` (`resort_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_resort`
--
ALTER TABLE `tbl_resort`
  ADD CONSTRAINT `tbl_resort_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD CONSTRAINT `tbl_service_ibfk_1` FOREIGN KEY (`resort_id`) REFERENCES `tbl_resort` (`resort_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verification`
--
ALTER TABLE `verification`
  ADD CONSTRAINT `verification_ibfk_1` FOREIGN KEY (`resort_id`) REFERENCES `tbl_resort` (`resort_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
