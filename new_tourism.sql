-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 05:50 AM
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
  `acom_url` varchar(200) NOT NULL,
  `archive` set('delete','show') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accommodation`
--

INSERT INTO `tbl_accommodation` (`accom_id`, `resort_id`, `type_of_room`, `no_accom_units`, `accom_capacity`, `accom_rates`, `acom_url`, `archive`) VALUES
(21, 22, 'bedroom', 4, 3, 1505, 'accom_img/Screenshot 2023-09-29 221639.png', 'show'),
(22, 22, 'queen bed', 2, 2, 1600, 'accom_img/Screenshot 2023-09-29 221639.png', 'show'),
(23, 22, 'king bed', 2, 2, 1700, 'accom_img/Screenshot 2023-09-29 221532.png', 'show'),
(24, 23, 'double deck bed', 2, 2, 1500, 'accom_img/Screenshot 2023-09-29 221532.png', 'show'),
(25, 24, 'queen bed', 1, 2, 1500, 'accom_img/Screenshot (78).png', 'show'),
(26, 24, 'king bed', 1, 2, 5000, 'accom_img/Screenshot 2023-09-29 221532.png', 'show'),
(27, 25, 'Queen bed', 1, 2, 1500, 'accom_img/Screenshot 2023-09-29 221802.png', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `name`, `email`, `status`, `admin_pass`) VALUES
(1, 'trapsi', 'mark@gmail.com', 'admin', '$2y$10$3.0Nczcn.4xQJ/zTHCa7FeYsiKXbQLT210Kkt9a4va1vlqhio0e.C'),
(2, 'sandoval', 'marky@gmail.com', 'admin', '$2y$10$fs7tUwxduqH2NwWERbEj8uwdzJ1vCZn4K.9oUGo7aKcQVTXCXsePG');

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
  `faci_url` varchar(200) NOT NULL,
  `archive` set('delete','show') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_facility`
--

INSERT INTO `tbl_facility` (`faci_id`, `resort_id`, `type_of_facility`, `faci_capacity`, `no_faci_units`, `faci_rates`, `faci_url`, `archive`) VALUES
(23, 22, 'bar', 10, 2, 1500, 'faci_img/Screenshot 2023-09-29 222139.png', 'show'),
(24, 23, 'swimming pool', 10, 2, 500, 'faci_img/Screenshot 2023-09-29 222115.png', 'show'),
(25, 24, 'swimming pool', 10, 2, 100, 'faci_img/Screenshot 2023-09-29 221941.png', 'show'),
(26, 25, 'swimming pool', 10, 1, 1500, 'faci_img/Screenshot 2023-09-29 221532.png', 'show'),
(27, 25, 'basketball', 10, 1, 50, 'faci_img/Screenshot 2023-09-29 222139.png', 'show');

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
  `verification` set('verified','not_verified',' pending') NOT NULL,
  `permit_url` varchar(200) NOT NULL,
  `resort_address` varchar(100) NOT NULL,
  `archive` set('delete','show') NOT NULL,
  `event_date` datetime DEFAULT NULL,
  `verifiedby` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_resort`
--

INSERT INTO `tbl_resort` (`resort_id`, `user_id`, `resort_name`, `owner_name`, `owner_address`, `owner_contact`, `resort_office`, `resort_contact`, `manager_contact`, `resort_url`, `verification`, `permit_url`, `resort_address`, `archive`, `event_date`, `verifiedby`, `comment`) VALUES
(22, 7, 'Sundownerssss', 'mark russel trapsi', 'porac botolan', 123456789, 9762499708, 9762499708, 9762499790, 'estab_img/Screenshot 2023-09-29 215511.png', ' pending', 'no_permit', 'porac botolan', 'show', '2023-11-21 00:00:00', 'trapsi', ''),
(23, 8, 'Haya', 'mark Russel Trapsi', 'porac zambales', 1234567879, 1234567879, 9762499708, 9762499708, 'estab_img/Screenshot 2023-10-11 123246.png', 'verified', 'permit_img/1.png', 'porac zambales', 'show', '2023-11-21 00:00:00', 'sandoval', ''),
(24, 9, 'C & J', 'luis edano', 'porac botolan zambales', 9762499708, 9762499708, 9762499708, 9762499708, 'estab_img/Screenshot 2023-09-29 221639.png', ' pending', 'no_permit', 'Binuclutan Zambales', 'show', NULL, '', ''),
(25, 10, 'Rama', 'Juvy Parohinog', 'Beneg, Botolan Zambales', 9762499708, 9762499708, 9762499708, 9762499708, 'estab_img/Screenshot 2023-09-29 221802.png', ' pending', 'no_permit', 'Binuclutan', 'show', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `resort_id` int(11) NOT NULL,
  `type_of_service` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `service_rates` double NOT NULL,
  `archive` set('delete','show') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `resort_id`, `type_of_service`, `description`, `service_rates`, `archive`) VALUES
(23, 22, 'laundry', 'all clothes are washed, dried and folded ready to pickup', 260, 'show'),
(24, 23, 'laundry', 'all clothes are washed, dried and folded', 250, 'show'),
(25, 24, 'transportation', 'point to point', 1500, 'show'),
(26, 25, 'Transportation', 'point to pointadwadawdaw', 1500, 'show');

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
(9, 'Luis Sebastian', 'edano', 'luis@gmail.com', 9762499708, 'Porac Botolan Zambales', '$2y$10$TEMKUt2oReoqKcNGJZBZIuabiPN2rZx9aA1yDheI64yaKf5WgAfh2'),
(10, 'aljay', 'Devillas', 'aljay@gmail.com', 9762499708, 'Phase 2,  botolan zambales', '$2y$10$yKajTfDxJbcpsbBleqoyyucvVZmmSKyiQoqK8EopinGqm6sfX2Ufm'),
(11, 'ela', 'trapsi', 'ela@gmail.com', 9762499708, 'porac', '$2y$10$l9a9XfeTZHbicIJEszcB.eou4xSqVKoCDaG/PIWFbrUmHre1LML2C');

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
  MODIFY `accom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  MODIFY `faci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_resort`
--
ALTER TABLE `tbl_resort`
  MODIFY `resort_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
