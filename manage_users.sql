-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2020 at 11:03 AM
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
  `del_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`, `note`, `del_status`, `created_at`, `updated_at`) VALUES
(3, 'Kế toán', 'Phòng kế toán', 'Deleted', '2020-07-20 13:20:59', '2020-07-24 15:39:52'),
(8, 'Developer', 'Nhân viên lập trình', 'Deleted', '2020-07-21 10:37:21', '2020-07-24 15:39:35'),
(9, 'You will destroy', 'you will destroy', 'Deleted', '2020-07-21 11:56:07', '2020-07-21 11:58:53'),
(10, 'Cao Thanh Dang', '..0', 'Deleted', '2020-07-21 17:27:20', '2020-07-21 17:27:24'),
(11, 'Department 1', 'abc', 'Deleted', '2020-07-22 13:36:33', '2020-07-22 13:39:54'),
(12, 'Cao Thanh Dang', 'abc', 'Deleted', '2020-07-22 13:39:46', '2020-07-22 13:39:51'),
(13, 'Lập trình', 'Lập trình viên', 'Deleted', '2020-07-24 15:42:00', '2020-07-27 12:50:56'),
(14, 'Kinh doanh 1', 'Phòng kinh doanh', 'Deleted', '2020-07-24 16:03:00', '2020-07-24 16:14:31'),
(15, 'Kế toán nè', 'Phòng kế toán', 'Deleted', '2020-07-24 16:09:33', '2020-07-24 16:10:31'),
(16, 'Phòng marketing', 'Phòng marketing', 'Deleted', '2020-07-24 16:10:05', '2020-07-24 16:10:29'),
(17, 'Phòng marketing', 'Hello', 'Deleted', '2020-07-24 16:12:02', '2020-07-24 16:12:07'),
(18, 'Phòng marketing', 'Phòng marketing', 'Deleted', '2020-07-24 16:16:38', '2020-07-24 16:16:59'),
(19, 'Phòng marketing', 'phòng marketing', 'Deleted', '2020-07-24 16:17:23', '2020-07-24 16:18:23'),
(20, 'Phòng kinh doanh', 'phòng kinh doanh', 'Deleted', '2020-07-24 16:19:23', '2020-07-24 16:19:42'),
(21, 'Phòng kinh doanh', 'phòng kinh doanh', 'Deleted', '2020-07-24 16:22:00', '2020-07-24 16:22:04'),
(22, 'Kinh doanh', 'phòng kinh doanh', 'Deleted', '2020-07-24 16:23:38', '2020-07-24 16:23:43'),
(23, 'Kinh doanh', 'phòng kinh doanh', 'Deleted', '2020-07-24 16:24:28', '2020-07-24 16:24:35'),
(24, 'Kinh doanh', 'Phòng kinh doanh', 'Deleted', '2020-07-24 16:26:55', '2020-07-24 17:19:03'),
(25, 'Kinh doanh', 'Phòng kinh doanh nè', 'Deleted', '2020-07-27 09:31:03', '2020-07-27 12:50:58'),
(26, 'Marketing', 'Đây là phòng marketing', 'Deleted', '2020-07-27 12:44:06', '2020-07-27 12:51:01'),
(27, 'Kinh doanh', 'Đây là phòng ban kinh doanh', NULL, '2020-07-27 12:52:09', '2020-07-27 12:52:09'),
(28, 'Marketing', ' đây là phòng marketing', NULL, '2020-07-27 12:56:57', '2020-07-27 12:56:57');

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
(128, 167, 27),
(129, 167, 28),
(130, 168, 27),
(131, 168, 28),
(132, 165, 27),
(133, 169, 27),
(134, 169, 28),
(135, 170, 27),
(136, 170, 28);

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
  `del_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `name`, `email`, `phone`, `image`, `note`, `del_status`, `created_at`, `updated_at`) VALUES
(16, 'Cao Thanh Dang', 'typhoom1709@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/dae4d42c10a4b7df92247e628f52e02d.png', 'asdfsfd', 'Deleted', '2020-07-20 18:23:12', '2020-07-24 17:38:00'),
(24, 'Lê Khôi Nguyên abc', 'lekhoinguyen@gmail.com', '0339888777', 'http://localhost/employee-management/assets/images/d937d617edc93e10722127c2d988a7e5.png', 'Developer', 'Deleted', '2020-07-21 11:03:26', '2020-07-24 17:20:59'),
(37, 'Cao Thanh Dang', 'thanhdang.ag@gmail.coma', '0339888746', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', '1', 'Deleted', '2020-07-21 12:58:56', '2020-07-22 10:50:50'),
(43, 'Cao Thanh Dang', 'typhoom17109@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/319d9376c47138f427f17661558e8b59.jpg', '', 'Deleted', '2020-07-21 13:20:44', '2020-07-21 14:38:46'),
(44, 'Cao Thanh Dang', 'typhoom17019@gmail.com', '0339881146', 'http://localhost/employee-management/assets/images/87a39e4bff9c40ae2a5a4eb9bcc7f474.jpg', '[removed]alert&#40;\'hello\'&#41;;[removed]', 'Deleted', '2020-07-21 13:22:37', '2020-07-21 14:38:38'),
(45, 'Cao Thanh Dang', 'typhoom111@gmail.com', '0346088222', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'abc', 'Deleted', '2020-07-21 16:06:48', '2020-07-24 17:42:55'),
(46, 'Cao Thanh Dang', 'typhoom170911@gmail.com', '0339888741', 'http://localhost/employee-management/assets/images/ff3a1fb2b8f618506a44ad1d3c5c53b6.jpg', 'abc', 'Deleted', '2020-07-21 16:45:04', '2020-07-24 17:43:57'),
(47, 'Cao Thanh Dang 2', 'typhoom17092@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/4460df8b4f1c6cd6d1c00ca558ae3d2a.jpg', 'ab ', 'Deleted', '2020-07-21 16:45:21', '2020-07-22 10:50:41'),
(48, 'Cao Thanh Dang', 'typhoom17111@gmail.com', '0339888711', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'abc', 'Deleted', '2020-07-21 17:22:11', '2020-07-24 17:44:05'),
(49, 'Cao Thanh Dang', 'typhoom1709111111@gmail.com', '0339881111', 'http://localhost/employee-management/assets/images/5650691e48559f9b39f44e1a62191d8f.jpg', 'abc', 'Deleted', '2020-07-21 17:22:30', '2020-07-27 08:38:38'),
(50, 'adsfsfdsa', 'typhoom170912312@gmail.com', '2342342342', 'http://localhost/employee-management/assets/images/aa34c01293f13bb6c05e9f649bed43f8.jpg', '234234213', 'Deleted', '2020-07-21 17:22:45', '2020-07-27 08:39:08'),
(51, '234234234', '23421342@gmail.com', '1234213423', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', '1234213423', 'Deleted', '2020-07-21 17:23:03', '2020-07-22 10:03:48'),
(52, 'Cao Thanh Dang sấd', 'typhoom1709123234@gmail.com', '0339888234', 'http://localhost/employee-management/assets/images/830f96455781e865134f82c7e7ba62f0.jpg', 'abcd', 'Deleted', '2020-07-21 17:23:24', '2020-07-22 10:06:46'),
(53, 'Cao Thanh Dang', 'typhoom@gmail.com', '0339888222', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'abc', 'Deleted', '2020-07-22 10:03:43', '2020-07-22 10:07:41'),
(54, 'Cao Thanh Dang', 'typhoom12312@gmail.com', '0339888234', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'abc', 'Deleted', '2020-07-22 10:08:44', '2020-07-22 10:11:53'),
(55, 'Cao Thanh Dang', 'typhoom43534@gmail.com', '0339888546', 'http://localhost/employee-management/assets/images/e0967c3e2982d52d2aca3aba5b9ea064.jpg', 'abc', 'Deleted', '2020-07-22 10:10:22', '2020-07-27 12:57:58'),
(56, 'Cao Thanh Dang', 'thanhdang.ag123412@gmail.com', '0339888123', 'http://localhost/employee-management/assets/images/55d3387c5ad8e78e4c71bb762dba20e5.jpg', 'abc', 'Deleted', '2020-07-22 10:12:06', '2020-07-27 14:06:36'),
(57, 'Cao Thanh Dang', 'admin@example.com', '0339888324', 'http://localhost/employee-management/assets/images/d1652d5819938431e01d8d1699634eb6.jpg', 'abc', 'Deleted', '2020-07-22 10:12:28', '2020-07-27 14:06:38'),
(58, 'Department 1', '23423423@gmail.com', '0339883243', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'ac', 'Deleted', '2020-07-22 10:12:59', '2020-07-24 17:44:14'),
(59, 'Cao Thanh Dang', 'abc@gmail.com', '0339888234', 'http://localhost/employee-management/assets/images/b8fd61752052550a4190fde8b4ea3bba.jpg', 'abc23432', 'Deleted', '2020-07-22 12:04:38', '2020-07-24 17:42:49'),
(60, 'Cao Thanh Dang', 'typhoom1709@gmail.co', '0339888742', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'sdfsad', 'Deleted', '2020-07-22 17:14:35', '2020-07-22 17:14:44'),
(61, 'Cao Thanh Dang', 'typhoom1709@gmail.coc', '0339888749', 'http://localhost/employee-management/assets/images/46de6dcba10dda1c3718aa0ec9b7bf99.jpg', 'aw34324', 'Deleted', '2020-07-22 17:15:05', '2020-07-22 18:02:25'),
(62, 'this is department 2', 'admin@gmail.com', '0339888733', 'http://localhost/employee-management/assets/images/88ea64f4138413dabc465a945b1fa5eb.jpg', 'abc11', 'Deleted', '2020-07-24 18:38:08', '2020-07-27 14:06:41'),
(63, 'Cao Thanh Dang', 'typhoom12222@gmail.com', '0339888333', 'http://localhost/employee-management/assets/images/e9f605ed391e27fa5b415e2503ae95bd.jpg', 'abcac', 'Deleted', '2020-07-24 18:58:28', '2020-07-27 14:06:43'),
(64, 'Cao Thanh Dang', 'thanhdang.a32432234g@gmail.coma', '0346088274', 'http://localhost/employee-management/assets/images/4326468d6809c51de3c6a9c6be3cd242.jpg', '32432423', 'Deleted', '2020-07-24 19:24:25', '2020-07-27 13:55:27'),
(65, 'thanhdang111', 'thanhdang@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/68242278b4f948d6ff1a311f3bce1d4b.jpg', 'description', 'Deleted', '2020-07-24 20:00:19', '2020-07-27 12:58:19'),
(67, 'thanhdang', 'thanhdang11@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/d3980f7d2c42bdab83ce6a783e9fe774.jpg', 'description', 'Deleted', '2020-07-27 09:59:58', '2020-07-27 10:02:18'),
(77, 'thanhdang', 'thanhdang1111@gmail.com', '0339888746', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'description', 'Deleted', '2020-07-27 10:19:00', '2020-07-27 12:58:19'),
(86, 'thanhdang', 'thanhdang21321321@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/4c535915524c1c833c3dc468f7e27337.jpg', 'description', 'Deleted', '2020-07-27 10:26:51', '2020-07-27 12:58:19'),
(87, 'thanhdang', 'thanhdang21321234321@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/2ad25ad0be36ab482803dabd769a6a91.jpg', 'description', 'Deleted', '2020-07-27 10:26:55', '2020-07-27 12:58:19'),
(89, 'thanhdang', 'thanhdang23423432@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/782770ca0db3b23798f4233405654197.jpg', 'description', 'Deleted', '2020-07-27 10:29:02', '2020-07-27 12:58:19'),
(98, 'thanhdang', 'thanhdan32423432g@gmail.com', '0339888746', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'description', 'Deleted', '2020-07-27 10:35:56', '2020-07-27 11:54:21'),
(101, 'thanhdang', 'thanhdan234g@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/81100a0f473b324055f2f9ff4d4c8829.jpg', 'description', 'Deleted', '2020-07-27 10:37:05', '2020-07-27 11:54:19'),
(102, 'thanhdang', 'thanhdan213g@gmail.com', '0339888746', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'description', 'Deleted', '2020-07-27 10:38:06', '2020-07-27 12:58:19'),
(105, 'thanhdang', 'thanhdang2343243@gmail.com', '0339888746', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'description', 'Deleted', '2020-07-27 10:38:46', '2020-07-27 11:54:17'),
(106, 'thanhdang', 'thanhdang22@gmail.com', '0339888746', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'description', 'Deleted', '2020-07-27 10:38:59', '2020-07-27 11:54:15'),
(107, 'Cao Thanh Dang', 'thanhdang.ag@gmail.com', '0339888746', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'description', 'Deleted', '2020-07-27 11:08:39', '2020-07-27 11:53:44'),
(108, 'thanhdang.ag', 'thanhdang.ag1@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/8cc6d74120b5420fbcc5b8f96734779b.jpg', 'description', 'Deleted', '2020-07-27 11:10:52', '2020-07-27 11:53:35'),
(109, 'ádfsadfsa', 'thanhdang.ag324234@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/f01180b78fd3b5375d955adcf9e2313d.jpg', 'description23432', 'Deleted', '2020-07-27 11:14:17', '2020-07-27 11:53:25'),
(117, 'ádfsadfsa', 'thanhdang.ag11@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/d49a4b0a5be2a96f6e9d717aa96e1b69.jpg', 'description23432', 'Deleted', '2020-07-27 11:14:58', '2020-07-27 12:58:19'),
(118, 'ádfsadfsa', 'thanhdang.ag111@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/15adbccc5a68399341d7681188b9c296.jpg', 'description', 'Deleted', '2020-07-27 11:16:32', '2020-07-27 12:58:19'),
(120, 'cao thanh dang', 'thanhdang.ag12@gmail.com', '0339888746', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'description', 'Deleted', '2020-07-27 11:25:01', '2020-07-27 12:58:19'),
(121, '23423423423', '2983749823@gmail.com', '2234324324', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'description', 'Deleted', '2020-07-27 11:25:55', '2020-07-27 12:58:31'),
(122, 'Cao Thanh Dang', '23423@gmail.com', '0339888746', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'description', 'Deleted', '2020-07-27 11:27:17', '2020-07-27 12:58:19'),
(123, 'Cao Thanh Dang', '2342323432@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/772512cc379ba349c2e2dc7c6045df06.jpg', 'description23432', 'Deleted', '2020-07-27 11:29:12', '2020-07-27 12:58:19'),
(125, 'Cao Thanh Dang', '23423234234@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/4a61cb5c49001955f277b5f073d595b2.jpg', 'description23432', 'Deleted', '2020-07-27 11:31:53', '2020-07-27 12:58:19'),
(126, 'thanhdang.ag', 'thanhdang213212343211@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/43ea247263ea1bfdda8d54963221edb2.jpg', 'description', 'Deleted', '2020-07-27 11:33:18', '2020-07-27 12:58:19'),
(127, 'thanhdang.ag', 'thanhdan234g1@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/530a9ed056010317ae640844c714d3c3.jpg', 'description', 'Deleted', '2020-07-27 11:33:51', '2020-07-27 12:58:19'),
(128, 'thanhdang.ag 2324', 'thanhdang.agee@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/b5d9eaad99ff5cee8dc73464a91d2a21.jpg', 'description', 'Deleted', '2020-07-27 11:34:33', '2020-07-27 12:58:19'),
(130, 'thanhdang.ag 2324', 'thanhdang11ee@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/9a718237d74240fe29541ef3946a4b5a.jpg', 'description', 'Deleted', '2020-07-27 11:36:17', '2020-07-27 12:58:19'),
(131, 'thanhdang.ag3423', 'lksjdiouriwe@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/814e755c69e86055b7cfcfb1ef2b793b.jpg', 'description', 'Deleted', '2020-07-27 11:37:34', '2020-07-27 12:58:19'),
(132, 'thanhdang.ag 2324', 'thanhdang1111rtretre@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/b4bafbd074a3f4a6150900865bd3a33a.jpg', 'description', 'Deleted', '2020-07-27 11:38:19', '2020-07-27 12:58:19'),
(133, 'thanhdang.ag 2324', 'thanhdang11eee@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/24f8e0fd71bf10240fe9f90610682bd2.jpg', 'description', 'Deleted', '2020-07-27 11:40:10', '2020-07-27 12:58:19'),
(136, 'thanhdang.ag 2324', 'thanhdang.ag11e@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/4acd232e64b0d6436824e4dc6a916e5a.jpg', 'description', 'Deleted', '2020-07-27 11:45:47', '2020-07-27 12:58:19'),
(137, 'thanhdang.ag', 'thanhdang11eeef@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/b742aa0e3928cc62b41fefadbefc4585.jpg', 'description', 'Deleted', '2020-07-27 11:47:22', '2020-07-27 12:58:19'),
(138, 'thanhdang.ag', 'thanhdang11cz@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/cd3ea31b3ac91f4bfa41aa032b91a59a.jpg', 'description', 'Deleted', '2020-07-27 11:48:16', '2020-07-27 12:57:24'),
(139, '3242323423', 'thanhdang.agcc@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/654c3d11506fd1efdea5b6f1459f0c1b.jpg', 'description', 'Deleted', '2020-07-27 11:49:13', '2020-07-27 12:57:22'),
(140, 'thanhdang.ag', 'thanhdang.agzc@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/a926f9f95cbee1c34460ea3415bb34bf.jpg', 'description', 'Deleted', '2020-07-27 11:49:34', '2020-07-27 12:57:17'),
(141, 'thanhdang.ag 2324', 'thanhdang.agfdgdfg@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/f3c3f34207cf0afb5443af1c59e66965.jpg', 'descriptiond', 'Deleted', '2020-07-27 11:50:23', '2020-07-27 12:57:16'),
(144, 'thanhdang.ag', 'thanhdang11eez@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/4278e8f36b84f7163eff66fef78b2554.jpg', 'description', 'Deleted', '2020-07-27 11:55:57', '2020-07-27 12:57:14'),
(145, 'Kieu Trinh', 'thanhdang.agzz@gmail.com', '0339888764', 'http://localhost/employee-management/assets/images/e3bb40c6417189e387855a1af512cc86.jpg', 'description', 'Deleted', '2020-07-27 11:57:12', '2020-07-27 12:43:12'),
(146, 'Nguyễn Văn Tèo', '0339888764@gmail.com', '0339888746', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'description', 'Deleted', '2020-07-27 11:59:35', '2020-07-27 12:43:11'),
(158, '0339888746', 'thanhdang.agz@gmail.com', '0339888746', 'http://localhost/employee-management/assets/images/5937293b61cde4fafddf7fb2f10a342f.jpg', 'Hello world', 'Deleted', '2020-07-27 12:02:55', '2020-07-27 12:43:09'),
(159, 'Nguyễn Văn Tèo', '0339888764z@gmail.com', '0339888747', 'http://localhost/employee-management/assets/images/ed890d2ff53838b3948c9395a2695d15.jpg', 'đây là mô tả nè', 'Deleted', '2020-07-27 12:35:33', '2020-07-27 12:43:07'),
(160, 'Nguyễn Văn Tèo ', 'nguyenvanteoe@gmail.com', '0339888744', 'http://localhost/employee-management/assets/images/2587c73dd354bd0e72a116f1030f70bb.jpg', 'Đây là mô tả nè', 'Deleted', '2020-07-27 12:38:18', '2020-07-27 12:43:05'),
(161, 'Nguyễn Văn Tủng', 'thanhdang.ag222a@gmail.com', '0339888999', 'http://localhost/employee-management/assets/images/42f04ce6a95f59047d9d23d6aa4d93fc.jpg', 'hello world', 'Deleted', '2020-07-27 12:40:33', '2020-07-27 12:57:12'),
(162, 'Nguyen Văn Tèo', 'nguyenvanteo@gmail.com', '0339828749', 'http://localhost/employee-management/assets/images/b7d002f581cde2a069340ea321a4d27e.jpg', 'Hello world', 'Deleted', '2020-07-27 12:45:05', '2020-07-27 12:57:10'),
(163, 'Nguyễn Văn Tèo', '0339888764e@gmail.com', '0339888743', 'http://localhost/employee-management/assets/images/479067cb461e8057d4da5bf9d9d668cf.jpg', 'Hello world', 'Deleted', '2020-07-27 12:50:50', '2020-07-27 12:57:08'),
(164, 'Nguyễn Văn Tèo', 'thanhdang.eff@gmail.com', '0339888167', 'http://localhost/employee-management/assets/images/95beceb6b0d23509a5fa20c48b37f6c0.jpg', 'Đây là nhân viên kinh doanh 2', 'Deleted', '2020-07-27 12:53:03', '2020-07-27 14:00:53'),
(165, 'Nguyễn Văn Tèo 2', 'thanhdang.ag123@gmail.com', '0339888213', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png', 'Hello world 2', NULL, '2020-07-27 12:59:30', '2020-07-27 14:06:54'),
(166, 'Nguyễn Phú Trọng', 'thanhdang.ag1a@gmail.com', '0339823123', 'http://localhost/employee-management/assets/images/11716e76f1aeb116c097d9e63a215765.jpg', 'Hello world', 'Deleted', '2020-07-27 13:57:32', '2020-07-27 19:13:07'),
(167, 'Nguyễn Xuân Phúc', 'nguyenxuanphuc@gmail.com', '0393843323', 'http://localhost/employee-management/assets/images/5c9ddd4ed3a729b849cfedd44053d62e.jpg', 'Hello world', NULL, '2020-07-27 13:58:59', '2020-07-27 13:58:59'),
(168, 'Nguyễn Tấn Dũng', 'nguyentandung@gmail.com', '0339696123', 'http://localhost/employee-management/assets/images/494fd269cf49f3072043796821f0dd9f.jpg', 'Hello worlds', NULL, '2020-07-27 14:01:46', '2020-07-27 14:01:46'),
(169, 'Nguyễn Văn Teo', 'thanhdang234098723@gmail.com', '0323849832', 'http://localhost/employee-management/assets/images/b904b02491d4bacf38cc2d5243c60390.png', 'Hello worlds', NULL, '2020-07-27 16:02:00', '2020-07-27 16:02:00'),
(170, 'Hello Worlds', 'thanhdan23423@gmail.com', '2342342333', 'http://localhost/employee-management/assets/images/83a03715f86c62faea3a51763f2f0715.png', 'hello worlds', NULL, '2020-07-27 16:02:33', '2020-07-27 16:02:33');

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
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456', 1, 1, '2020-07-21 00:00:00', '2020-07-21 00:00:00');

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
  ADD PRIMARY KEY (`id`) USING HASH,
  ADD UNIQUE KEY `email` (`email`,`phone`),
  ADD UNIQUE KEY `id` (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_department_users`
--
ALTER TABLE `tbl_department_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
