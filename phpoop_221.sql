-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 03:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpoop_221`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthday` date NOT NULL DEFAULT current_timestamp(),
  `sex` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user`, `pass`, `firstname`, `lastname`, `birthday`, `sex`, `email`, `user_profile_picture`) VALUES
(23, 'jolo', '$2y$10$lTdYLg7/ShZWRss2AdmbNOvpeDw/EvJPRCZMhQQJuAkCAMSUZxoJy', 'Jolo', 'Sambili', '2024-05-03', 'Male', 'jolo@gmail.com', 'uploads/unnamed_1716169263.jpg'),
(24, 'tripleh', '$2y$10$n6QXh137G9BH3HTUXNrLMOT5/joMY/uFZMIApvB.tsEGBE7qMDsjC', 'Triple', 'H', '1999-09-29', 'Male', 'tripleh@gmail.com', 'uploads/OIP (1)_1716169732.jpg'),
(25, 'hbk', '$2y$10$MRF7BHf1/4S0TCk0g4pff.t6tn1mm6qvvPRZCWtJUqeswZOwsib46', 'Heart Break', 'Kid', '1858-02-05', 'Male', 'hbk@gmail.com', 'uploads/OIP (2)_1716170319.jpg'),
(26, 'diwata', '$2y$10$a3RwmFKb86eibRNnrq2v5eR/Z0UVC95K/xdSbZl3xpInso.6Krj9q', 'Diwata', 'Pares', '1998-03-28', 'Bading', 'diwata@gmail.com', 'uploads/OIP_1716424487.jpg'),
(27, 'sijolo', '$2y$10$L/ZvWoCdX2rselRv07esaeia7wUmi8uKFd0MIVEHSKJ.Wg/uVmNwG', 'Jolo', 'Bang', '2003-09-28', 'Male', 'sijolo@gmail.com', 'uploads/377502530_290256053742906_3867780739867437285_n.jpg'),
(29, 'mia', '$2y$10$iQrVo8a7iCvDLr/SFGwHU.D.hkmBDATLWYqyWiqtMPm.shdKF9O2q', 'Mia', 'Khalifa', '1994-12-02', 'Female', 'mia@gmail.com', 'uploads/OIP (1)_1716427259.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `user_address_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_street` varchar(255) DEFAULT NULL,
  `user_barangay` varchar(255) DEFAULT NULL,
  `user_city` varchar(255) DEFAULT NULL,
  `user_province` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`user_address_id`, `user_id`, `user_street`, `user_barangay`, `user_city`, `user_province`) VALUES
(12, 23, 'Marichi', 'Barangay 4 (Pob.)', 'Sariaya', 'Region IV-A (CALABARZON)'),
(13, 24, 'Samar', 'Barangay 652', 'Port Area', 'National Capital Region (NCR)'),
(14, 25, 'South', 'Little Baguio', 'City Of San Juan', 'National Capital Region (NCR)'),
(15, 26, 'Taguig', 'Bagumbayan', 'Taguig City', 'National Capital Region (NCR)'),
(16, 27, 'Marichi', 'Barangay 4 (Pob.)', 'Sariaya', 'Region IV-A (CALABARZON)'),
(18, 29, 'Bataan', 'San Vicente (Pob.)', 'Orion', 'Region III (Central Luzon)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`user_address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `user_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
