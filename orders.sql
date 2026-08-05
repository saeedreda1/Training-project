-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2026 at 08:53 PM
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
-- Database: `sigma`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `firstname`, `lastname`, `address`, `city`, `zipcode`, `phone`, `email`, `payment_method`, `total`, `created_at`) VALUES
(1, 'saeed', 'taha', 'محافظة القليوبية مدينة طوخ شارع المدارس أمام مدرسة الجلاء', 'طوخ', '120121', '01205372354', 'saeedt920@gmail.com', 'bank_transfer', 560.00, '2026-08-05 17:55:40'),
(2, 'saeed', 'taha', 'محافظة القليوبية مدينة طوخ شارع المدارس أمام مدرسة الجلاء', 'طوخ', '120121', '01205372354', 'saeedt920@gmail.com', 'bank_transfer', 560.00, '2026-08-05 17:56:18'),
(3, 'saeed', 'reda', 'شارع العيد ', 'toukh', '120121', '01281246812', 'afrotoafroto23@gmail.com', 'bank_transfer', 800.00, '2026-08-05 18:21:27'),
(4, 'saeed', 'reda', 'محافظة القليوبية مدينة طوخ شارع المدارس أمام مدرسة الجلاء', 'طوخ', '120121', '01281246812', 'saeedt920@gmail.com', 'check_payment', 160.00, '2026-08-05 18:47:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
