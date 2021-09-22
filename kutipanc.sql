-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2021 at 09:36 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kutipanc`
--

-- --------------------------------------------------------

--
-- Table structure for table `kutipan_letters`
--

DROP TABLE IF EXISTS `kutipan_letters`;
CREATE TABLE IF NOT EXISTS `kutipan_letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kutipan_nomor` varchar(255) NOT NULL,
  `riwayat` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kutipan_letters`
--

INSERT INTO `kutipan_letters` (`id`, `kutipan_nomor`, `riwayat`, `picture`, `address`, `created_at`, `updated_at`) VALUES
(10, '1', '- 21 Julu 1997 Dibeli Bapak Budi\r\n- 21 September 2003 diwariskan ke Bapak Andi', 'avatars/xRjkxPZG07UnmKSAf1eRyTQyMgz96LD9qPZzFham.jpeg', 'Jl. Kenanga 18', '2021-07-24 09:15:27', '2021-09-21 18:31:42'),
(11, '126', '- 21 Juni 2008 tanah dijual ke Bapak Rudi', 'avatars/VatI2twtc003WBuXXrnPsQ4ewsySPU0dFQuiTmdL.jpeg', 'Jl. Edelweiss 88', '2021-08-04 17:39:50', '2021-09-21 18:31:54'),
(12, '982', '- 29 Juli 2000 Pembelian oleh Bapak Watson\r\n- 06 Juli 2001 Diwariskan ke Ibu Sarah\r\n- 09 November 2009 Dihibahkan ke Yayasan ABCD', 'avatars/p3wocNrUiqibunkEA6Plfa3r1PaVnbmf3tVrcnWX.jpeg', 'Jl. Pemuda 18', '2021-08-04 17:44:35', '2021-09-21 18:32:14'),
(13, '123', '- 21 September 1980 dibeli Bapak Lawson\r\n- 22 April 2018 diwariskan ke Bapak Smith', 'avatars/FTweaIO9HNwaDjTvbktkZib59fYHAnRu9tFgWIUd.jpeg', 'Jl. Merdeka 12', '2021-08-09 20:05:03', '2021-09-21 18:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

DROP TABLE IF EXISTS `log_activity`;
CREATE TABLE IF NOT EXISTS `log_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `activity` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `nip`, `name`, `date`, `time`, `activity`) VALUES
(1, '2101675445', 'Josh Soeryono', '2021-08-04', '16:56:58', 'Login'),
(2, '2101675445', 'Josh Soeryono', '2021-08-04', '16:57:50', 'Update Profile'),
(3, '2101675445', 'Josh Soeryono', '2021-08-04', '17:10:36', 'Logout'),
(4, '1234', 'Lurah Test', '2021-08-04', '17:10:42', 'Login'),
(5, '1234', 'Lurah Test', '2021-08-04', '17:11:07', 'Logout'),
(6, '2101675445', 'Josh Soeryono', '2021-08-04', '17:12:44', 'Login'),
(7, '2101675445', 'Josh Soeryono', '2021-08-04', '17:38:26', 'Update Kutipan Letter C Nomor : 1'),
(8, '2101675445', 'Josh Soeryono', '2021-08-04', '17:39:50', 'Tambah Kutipan Letter C Nomor : 126'),
(25, '2101675445', 'Josh Soeryono', '2021-08-04', '17:44:35', 'Tambah Kutipan Letter C Nomor : 982'),
(26, '2101675445', 'Josh Soeryono', '2021-08-05', '00:08:45', 'Login'),
(27, '2101675445', 'Josh Soeryono', '2021-08-07', '14:16:12', 'Login'),
(28, '2101675445', 'Josh Soeryono', '2021-08-07', '14:23:45', 'Logout'),
(29, '2101675445', 'Josh Soeryono', '2021-08-07', '14:23:55', 'Login'),
(30, '123456', 'Admin Test', '2021-08-07', '14:25:16', 'Login'),
(31, '123456', 'Admin Test', '2021-08-07', '14:25:46', 'Update Kutipan Letter C Nomor : 126'),
(32, '123456', 'Admin Test', '2021-08-07', '21:50:59', 'Login'),
(33, '123456', 'Admin Test', '2021-08-07', '22:08:02', 'Update Profile'),
(34, '123456', 'Admin Test', '2021-08-07', '22:15:56', 'Update User'),
(35, '123456', 'Admin Test', '2021-08-07', '22:25:01', 'Logout'),
(36, '1122', 'Staf Lurah Test', '2021-08-07', '22:25:10', 'Login'),
(37, '1122', 'Staf Lurah Test', '2021-08-07', '22:30:18', 'Update Profile'),
(38, '123456', 'Admin Test', '2021-08-08', '23:02:15', 'Login'),
(39, '123456', 'Admin Test', '2021-08-08', '23:20:49', 'Update Profile'),
(40, '123456', 'Admin Test', '2021-08-08', '23:22:09', 'Update Profile'),
(41, '123456', 'Admin Test', '2021-08-09', '01:20:44', 'Update Profile'),
(42, '123456', 'Admin Test', '2021-08-09', '03:39:36', 'Login'),
(43, '123456', 'Admin Test', '2021-08-09', '19:57:50', 'Login'),
(44, '123456', 'Admin Test', '2021-08-09', '19:59:11', 'Update Profile'),
(45, '123456', 'Admin Test', '2021-08-09', '20:05:03', 'Tambah Kutipan Letter C Nomor : 123'),
(46, '123456', 'Admin Test', '2021-08-09', '20:08:36', 'Update Kutipan Letter C Nomor : 123'),
(47, '123456', 'Admin Test', '2021-08-09', '20:09:18', 'Update Kutipan Letter C Nomor : 123'),
(48, '123456', 'Admin Test', '2021-08-09', '20:21:56', 'Update User'),
(49, '123456', 'Admin Test', '2021-08-09', '20:24:26', 'Logout'),
(50, '1122', 'Staf Lurah Test', '2021-08-09', '20:24:36', 'Login'),
(51, '1122', 'Staf Lurah Test', '2021-08-09', '20:27:55', 'Update Profile'),
(52, '1122', 'Staf Lurah Test', '2021-08-09', '20:28:12', 'Update Profile'),
(53, '1122', 'Staf Lurah Test', '2021-08-09', '20:28:20', 'Update Profile'),
(54, '1122', 'Staf Lurah Test', '2021-08-09', '20:28:42', 'Logout'),
(55, '123456', 'Admin Test', '2021-08-09', '20:28:52', 'Login'),
(56, '123456', 'Admin Test', '2021-08-09', '20:33:29', 'Update User'),
(57, '123456', 'Admin Test', '2021-08-10', '14:08:19', 'Login'),
(58, '123456', 'Admin Test', '2021-08-10', '14:09:53', 'Update Kutipan Letter C Nomor : 1'),
(59, '123456', 'Admin Test', '2021-08-10', '14:09:59', 'Update Kutipan Letter C Nomor : 1'),
(60, '123456', 'Admin Test', '2021-08-10', '14:11:40', 'Update User'),
(61, '123456', 'Admin Test', '2021-08-10', '14:12:12', 'Update User'),
(62, '123456', 'Admin Test', '2021-08-10', '14:12:18', 'Logout'),
(63, '070', 'Testing lagi', '2021-08-10', '14:12:29', 'Login'),
(64, '070', 'Testing lagi', '2021-08-10', '14:12:50', 'Update Profile'),
(65, '070', 'Testing lagi', '2021-08-10', '14:14:21', 'Logout'),
(66, '123456', 'Admin Test', '2021-08-10', '14:14:27', 'Login'),
(67, '123456', 'Admin Test', '2021-08-11', '09:26:12', 'Login'),
(68, '123456', 'Admin Test', '2021-08-11', '17:33:27', 'Login'),
(69, '123456', 'Admin Test', '2021-08-11', '17:33:35', 'Logout'),
(70, '070', 'Testing lagi', '2021-08-11', '17:33:39', 'Login'),
(71, '123456', 'Admin Test', '2021-08-12', '19:26:26', 'Login'),
(72, '123456', 'Admin Test', '2021-08-13', '05:52:11', 'Login'),
(73, '123456', 'Admin Test', '2021-08-13', '05:52:31', 'Logout'),
(74, '123456', 'Admin Test', '2021-08-13', '08:22:34', 'Login'),
(75, '123456', 'Admin Test', '2021-08-13', '12:12:12', 'Login'),
(76, '123456', 'Admin Test', '2021-08-13', '14:52:38', 'Login'),
(77, '123456', 'Admin Test', '2021-08-13', '14:55:37', 'Logout'),
(78, '1234', 'Lurah Test', '2021-08-13', '14:55:43', 'Login'),
(79, '1234', 'Lurah Test', '2021-08-13', '14:57:33', 'Update Profile'),
(80, '123456', 'Admin Test', '2021-08-18', '11:42:08', 'Login'),
(81, '123456', 'Admin Test', '2021-08-18', '11:42:22', 'Logout'),
(82, '123456', 'Admin Test', '2021-08-18', '19:26:43', 'Login'),
(83, '123456', 'Admin Test', '2021-08-18', '19:27:18', 'Update Kutipan Letter C Nomor : 1'),
(84, '123456', 'Admin Test', '2021-08-18', '19:28:32', 'Update Kutipan Letter C Nomor : 1'),
(85, '123456', 'Admin Test', '2021-08-18', '19:29:44', 'Update Kutipan Letter C Nomor : 126'),
(86, '123456', 'Admin Test', '2021-08-18', '19:31:19', 'Update Kutipan Letter C Nomor : 982'),
(87, '123456', 'Admin Test', '2021-08-18', '19:32:44', 'Update Kutipan Letter C Nomor : 123'),
(88, '123456', 'Admin Test', '2021-08-19', '05:10:10', 'Login'),
(89, '123456', 'Admin Test', '2021-08-19', '05:10:38', 'Update Kutipan Letter C Nomor : 982'),
(90, '123456', 'Admin Test', '2021-08-19', '05:11:15', 'Update Kutipan Letter C Nomor : 982'),
(91, '123456', 'Admin Test', '2021-08-19', '05:31:40', 'Logout'),
(92, '123456', 'Admin Test', '2021-08-19', '05:32:09', 'Login'),
(93, '123456', 'Admin Test', '2021-08-19', '05:33:13', 'Logout'),
(94, '123456', 'Admin Test', '2021-08-19', '05:33:39', 'Login'),
(95, '123456', 'Admin Test', '2021-08-19', '05:57:16', 'Tambah Kutipan Letter C Nomor : 181'),
(96, '123456', 'Admin Test', '2021-08-19', '06:26:44', 'Update Kutipan Letter C Nomor : 1'),
(97, '123456', 'Admin Test', '2021-08-19', '06:32:38', 'Hapus Kutipan Letter C Nomor : 181'),
(98, '123456', 'Admin Test', '2021-08-19', '06:48:18', 'Update Profile'),
(99, '123456', 'Admin Test', '2021-08-19', '07:09:16', 'Update User'),
(100, '123456', 'Admin Test', '2021-08-19', '07:18:24', 'Logout'),
(101, '123456', 'Admin Test', '2021-09-13', '02:10:57', 'Login'),
(102, '123456', 'Admin Test', '2021-09-20', '03:52:18', 'Login'),
(103, '123456', 'Admin Test', '2021-09-21', '18:24:59', 'Login'),
(104, '123456', 'Admin Test', '2021-09-21', '18:31:42', 'Update Kutipan Letter C Nomor : 1'),
(105, '123456', 'Admin Test', '2021-09-21', '18:31:54', 'Update Kutipan Letter C Nomor : 126'),
(106, '123456', 'Admin Test', '2021-09-21', '18:32:14', 'Update Kutipan Letter C Nomor : 982'),
(107, '123456', 'Admin Test', '2021-09-21', '18:32:34', 'Update Kutipan Letter C Nomor : 123'),
(108, '123456', 'Admin Test', '2021-09-22', '08:53:27', 'Login');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2017_03_17_163141_create_employees_table', 1),
(11, '2017_03_18_001905_create_employee_salary_table', 1),
(12, '2017_03_18_003431_create_department_table', 1),
(13, '2017_03_18_004142_create_division_table', 1),
(14, '2017_03_18_004326_create_country_table', 1),
(15, '2017_03_18_005005_create_state_table', 1),
(16, '2017_03_18_005241_create_city_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Lurah'),
(3, 'Camat'),
(4, 'Staf Lurah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `awal_jabatan` date DEFAULT NULL,
  `akhir_jabatan` date DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `email`, `password`, `fullname`, `role_id`, `remember_token`, `address`, `awal_jabatan`, `akhir_jabatan`, `profile_picture`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '123456', 'admin@admin.com', '$2y$10$DByPUDPwlXFI.3edm4ROGuJtaug7Y/fdy.panuhud/EtuoatteZPm', 'Admin Test', 1, 'YdFJ3T9jijAQqRQjZ7A8EnpAC35Fn0K0aJpOaXDResul8ztLtUWtBAXwTzUq', 'WInter Rd. 17344', '2021-08-02', '2021-08-03', 'avatars/a5s8oQBwPitT6tR8VnjTG2ekyHYXpIiXEmf4RXa3.jpeg', NULL, '2021-06-21 01:07:04', '2021-08-18 23:48:18'),
(2, '1234', 'lurah@test.com', '$2y$10$1a3TfIzNjyZcK9F0s9pSouyDzpC6AWB3d6visLVm9Ku6ZY17X/06O', 'Lurah Test', 2, 'gjSSE4iY0W75AaS78lKxGVX7352AuvB6rxDy8NsLEJupIMVg5CQ73ttHAQLQ', 'Jl. Kenanga 18', '2021-08-18', '2021-08-19', 'avatars/EDhs36aLAXkf4N9ryvvhav1CXuEyNwjudqSDGIFb.jpeg', NULL, '2021-07-22 13:35:58', '2021-08-13 07:57:33'),
(10, '1122', 'staf.lurah@test.com', '$2y$10$sgnr5a5GG.6cCIMarFObEOkBRPR5rhD9KFGYp3g9TiWc7rGsWYHoK', 'Staf Lurah Test', 4, 'e7JubSqcRNYGCn61rna2Z1OlpC7GarIzKBldIflYucCH4zsEkFZgQpvlvN07', 'Jl.', '2021-08-08', '2021-08-10', 'avatars/Yf9GqksCYbnBodGfJc6dZFIqmP52PciEUFlMNigf.jpeg', NULL, '2021-08-07 15:14:38', '2021-08-09 13:28:20'),
(11, '070', 'asdfgh@mm.com', '$2y$10$CTZdFK7L18s7BuLROOwp7uCbWFVydYWvdg3.XF7uh3KZzMjWAkBdm', 'Testing lagi', 3, 'kMV2yqOH91Tevw3I6AUIXODLN93ZUy5MYEi9sevQw4PyGnygZp7zaOUcA6sW', 'Jl. Merdeka 12', '2021-03-01', '2021-08-18', 'avatars/yd5vfo3eIGsZ9vzDRG6XivVaTbyCBfDbLyVYaMwt.png', NULL, '2021-08-10 07:11:02', '2021-08-10 07:12:50'),
(12, '11112222', 'testing@add.user', '$2y$10$7J2RtK/Vx/v7M79DAd6U6OzYqbbV9FZPdW3UhOiqMSonQK3SFUZCy', 'Testing Add User', 3, NULL, 'Jl. Surabaya 123', '2021-08-01', '2021-08-31', NULL, NULL, '2021-08-19 00:00:37', '2021-08-19 00:09:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
