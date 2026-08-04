-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2026 at 09:27 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Saeed Reda', 'saeedreda842@gmail.com', '$2y$10$FnzyYAsVrEmUyNC1L3m93O0iXjPelFRe8sh8GRuBlgB9JNhVza1ma', '2026-08-03 23:57:37'),
(2, 'Saeed Reda', 'saeedreda84@gmail.com', '$2y$10$nlsZfYd0TWxML6sj8xcbu.ZD1CxYCZmBFlMd4XYgwXaiDF6En4Hii', '2026-08-04 00:00:05'),
(3, 'Saeed Reda', 'saeedreda2@gmail.com', '$2y$10$rj7gG9l5E7robYCSiXbkquF1Y2sbBCGM7wpCZgiqdgnR8iUyz0hQq', '2026-08-04 00:14:50'),
(4, 'Saeed Reda', 'saeedreda22@gmail.com', '$2y$10$v488Zj3icM8KTzxNPzrdBed0lNBSioA24sXbTVd5VrfB23BkKp5Hu', '2026-08-04 00:18:04'),
(5, 'Saeed Reda', 'saeedreda12@gmail.com', '$2y$10$A0fz.0t.IHp.Jva.SWqptucZ/5W7Lh8THoPdNm.rvqzn98JSbAkEC', '2026-08-04 00:31:23'),
(6, 'Saeed Reda', 'saeedreda42@gmail.com', '$2y$10$T5c1JTcQpIUyCGMLdYRIweR3QuwFwKr2vrTrPUELS5f1IUHrgCmSi', '2026-08-04 07:24:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
