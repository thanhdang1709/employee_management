-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2020 at 10:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`, `note`, `created_at`, `updated_at`) VALUES
(3, 'this is department', 'this is description department', '2020-07-20 13:20:59', '2020-07-20 13:20:59'),
(4, 'this is department 2', 'this is description 2', '2020-07-20 13:23:51', '2020-07-20 13:23:51'),
(7, 'Department 1', 'This is description department 1', '2020-07-20 13:55:34', '2020-07-20 13:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department_users`
--

CREATE TABLE `tbl_department_users` (
  `id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_department_users`
--

INSERT INTO `tbl_department_users` (`id`, `staff_id`, `department_id`) VALUES
(1, 6, 3),
(2, 6, 4),
(3, 6, 7),
(4, 7, 3),
(5, 7, 4),
(6, 7, 7),
(7, 10, 3),
(8, 10, 4),
(9, 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `name`, `email`, `phone`, `image`, `note`, `created_at`, `updated_at`) VALUES
(6, 'Cao Thanh Dang', 'typhoom1709@gmail.com', '0339888746', 'https://google.com', 'asdfsfd', '2020-07-20 14:28:33', '2020-07-20 14:28:33'),
(7, 'Cao Thanh Dang', 'typhoom1709@gmail.com', '0339888746', 'https://google.com', 'asdfsfd', '2020-07-20 14:29:02', '2020-07-20 14:29:02'),
(8, 'Cao Thanh Dang', 'typhoom1709@gmail.com', '0339888746', 'https://google.com', 'asdfsfd hello', '2020-07-20 15:43:02', '2020-07-20 15:43:02'),
(9, 'Cao Thanh Dang', 'typhoom1709@gmail.com', '0339888746', 'https://google.com', 'asdfsfd hello 2', '2020-07-20 15:44:24', '2020-07-20 15:44:24'),
(10, 'Nguyen van a', 'thanhdang.ag@gmail.com', '0346088274', 'https://vnn-imgs-a1.vgcloud.vn/cdn.24h.com.vn/upload/1-2020/images/2020-03-16/1584324285-90-anh-2-1584088794-width650height867.jpg', 'Staff 1', '2020-07-20 16:26:50', '2020-07-20 16:26:50'),
(11, 'Cao Thanh Dang', 'typhoom1709@gmail.com', '0346088274', 'https://vnn-imgs-a1.vgcloud.vn/cdn.24h.com.vn/upload/1-2020/images/2020-03-16/1584324285-90-anh-2-1584088794-width650height867.jpg', 'abc', '2020-07-20 16:47:23', '2020-07-20 16:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`) USING HASH;

--
-- Indexes for table `tbl_department_users`
--
ALTER TABLE `tbl_department_users`
  ADD PRIMARY KEY (`id`) USING HASH;

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id`) USING HASH;

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_department_users`
--
ALTER TABLE `tbl_department_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
