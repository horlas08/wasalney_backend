-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 11:41 AM
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
-- Database: `db_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `remember_token`, `username`, `level`, `created_at`, `updated_at`) VALUES
(1, 'DunCode', '$2y$10$UQ2gUBGb7AjdCt3Yqfv1e.C/7wSRyQttjExZA717nFvVo7M5RZrce', NULL, 'admin', 1, '2022-01-12 05:04:08', '2022-01-12 05:04:08'),
(2, 'yhgjugh', '$2y$10$fELA3oZBZJ5x7XOtvKDkVOgt.vlePQhm/.VkmmOGzH4Krtqrm/AMG', NULL, 'ghjghj', 2, '2023-11-05 05:37:58', '2023-11-05 05:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `admin_accesses`
--

CREATE TABLE `admin_accesses` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `show` tinyint(4) NOT NULL DEFAULT 1,
  `store` tinyint(4) NOT NULL DEFAULT 1,
  `edit` tinyint(4) NOT NULL DEFAULT 1,
  `delete` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_accesses`
--

INSERT INTO `admin_accesses` (`id`, `admin_id`, `name`, `category_id`, `show`, `store`, `edit`, `delete`, `created_at`, `updated_at`) VALUES
(1, 0, 'setting', NULL, 1, 0, 1, 0, '2022-09-24 06:27:52', '2022-09-24 06:27:52'),
(2, 0, 'admin', NULL, 1, 0, 0, 1, '2022-09-24 06:27:52', '2022-10-08 05:39:46'),
(3, 0, 'file', NULL, 1, 0, 0, 0, '2022-09-24 06:27:52', '2022-10-08 05:39:57'),
(4, 0, 'record', 1, 1, 1, 0, 1, '2022-09-24 06:27:52', '2022-10-08 05:39:59'),
(5, 0, 'record', 2, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-10-08 05:40:01'),
(6, 0, 'record', 3, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-10-08 05:40:04'),
(7, 0, 'record', 4, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-10-08 05:40:05'),
(8, 0, 'record', 5, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-09-24 06:27:52'),
(9, 0, 'record', 6, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-10-08 05:40:09'),
(10, 0, 'record', 7, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-09-24 06:27:52'),
(11, 0, 'record', 8, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-09-24 06:27:52'),
(12, 0, 'record', 9, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-09-24 06:27:52'),
(13, 0, 'record', 10, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-09-24 06:27:52'),
(14, 0, 'record', 11, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-09-24 06:27:52'),
(15, 0, 'record', 12, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-09-24 06:27:52'),
(16, 0, 'record', 13, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-09-24 06:27:52'),
(17, 0, 'record', 14, 1, 1, 1, 1, '2022-09-24 06:27:52', '2022-09-24 06:27:52'),
(18, 2, 'setting', NULL, 1, 0, 1, 0, '2023-11-05 05:37:58', '2023-11-05 05:37:58'),
(19, 2, 'admin', NULL, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(20, 2, 'file', NULL, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(21, 2, 'record', 3, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(22, 2, 'record', 4, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(23, 2, 'record', 5, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(24, 2, 'record', 7, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(25, 2, 'record', 8, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(26, 2, 'record', 9, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(27, 2, 'record', 10, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(28, 2, 'record', 11, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(29, 2, 'record', 12, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(30, 2, 'record', 24, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(31, 2, 'record', 25, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(32, 2, 'record', 26, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(33, 2, 'record', 27, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(34, 2, 'record', 28, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(35, 2, 'record', 30, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(36, 2, 'record', 31, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(37, 2, 'record', 35, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(38, 2, 'record', 39, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(39, 2, 'record', 41, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(40, 2, 'record', 42, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(41, 2, 'record', 44, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(42, 2, 'record', 45, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(43, 2, 'record', 46, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(44, 2, 'record', 47, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(45, 2, 'record', 48, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(46, 2, 'record', 49, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(47, 2, 'record', 50, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(48, 2, 'record', 51, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(49, 2, 'record', 53, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(50, 2, 'record', 54, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(51, 2, 'record', 55, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(52, 2, 'record', 56, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(53, 2, 'record', 59, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(54, 2, 'record', 60, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(55, 2, 'record', 61, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(56, 2, 'record', 62, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(57, 2, 'record', 63, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(58, 2, 'record', 64, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(59, 2, 'record', 68, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59'),
(60, 2, 'record', 69, 1, 1, 1, 1, '2023-11-05 05:37:59', '2023-11-05 05:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `is_menu` tinyint(1) NOT NULL DEFAULT 0,
  `parent_id` varchar(255) DEFAULT NULL,
  `sort` int(45) NOT NULL,
  `logic_delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `title`, `icon`, `is_menu`, `parent_id`, `sort`, `logic_delete`, `created_at`, `updated_at`) VALUES
(2, 'about', 'About us', NULL, 1, '0', 1697690424, 0, '2023-10-16 04:09:02', '2023-10-30 02:44:44'),
(3, 'about_service', 'Service category', NULL, 0, '2', 1697454447, 0, '2023-10-16 07:32:51', '2023-10-17 03:13:53'),
(4, 'biography', 'Biography', NULL, 0, '2', 1697455370, 0, '2023-10-16 07:37:27', '2023-10-17 03:13:50'),
(5, 'talk', 'Let\'s talk', NULL, 0, '2', 1697454171, 0, '2023-10-16 07:52:50', '2023-10-17 03:13:53'),
(6, 'pages', 'Main page', NULL, 1, '0', 1698467005, 0, '2023-10-16 08:00:40', '2023-11-01 04:34:07'),
(7, 'features', 'Features', NULL, 0, '6', 1697611158, 0, '2023-10-16 08:01:17', '2023-10-18 08:17:25'),
(8, 'welcome', 'Welcome', NULL, 0, '6', 1697609413, 0, '2023-10-16 08:02:51', '2023-10-18 08:17:48'),
(9, 'statistics', 'Page statistics', NULL, 0, '6', 1697457683, 0, '2023-10-16 08:03:44', '2023-10-18 08:18:04'),
(10, 'create_account', 'Create account', NULL, 0, '6', 1697456078, 0, '2023-10-16 08:04:38', '2023-10-18 08:18:30'),
(11, 'brands', 'Brands', NULL, 0, '6', 1697456024, 0, '2023-10-16 08:06:29', '2023-10-18 08:18:35'),
(12, 'feedback', 'Feedback', NULL, 0, '6', 1697455877, 0, '2023-10-16 08:31:23', '2023-10-16 08:32:35'),
(16, 'header', 'Header', NULL, 1, '0', 1698646193, 0, '2023-10-17 04:45:32', '2023-10-30 02:44:29'),
(24, 'menu', 'List item headers', NULL, 0, '16', 1697600969, 0, '2023-10-18 00:19:29', '2023-10-18 08:20:50'),
(25, 'general_header', 'General header items', NULL, 0, '16', 1697607087, 0, '2023-10-18 02:01:27', '2023-10-18 02:01:27'),
(26, 'general_site', 'General items', NULL, 0, '6', 1697612796, 0, '2023-10-18 02:14:48', '2023-10-18 08:17:12'),
(27, 'general_about', 'General items', NULL, 0, '2', 1697607942, 0, '2023-10-18 02:15:42', '2023-10-18 02:15:42'),
(28, 'top_categories', 'Top Categories', NULL, 0, '6', 1697607888, 0, '2023-10-18 02:40:13', '2023-10-18 08:17:52'),
(30, 'our_top_course', 'Our Top Course', NULL, 0, '6', 1697456189, 0, '2023-10-18 03:09:18', '2023-10-18 08:18:08'),
(31, 'lastest_new', 'Lastest new course', NULL, 0, '6', 1697455971, 0, '2023-10-18 03:36:36', '2023-10-28 07:18:49'),
(33, 'footer', 'Footer', NULL, 1, '0', 1697441942, 0, '2023-10-18 03:57:59', '2023-10-18 06:07:43'),
(35, 'footer_categories', 'Footer categories', NULL, 0, '33', 1697614157, 0, '2023-10-18 03:59:17', '2023-10-18 04:27:46'),
(39, 'new_subcribe', 'Subcribe new letters', NULL, 0, '33', 1697619652, 0, '2023-10-18 05:30:52', '2023-10-18 05:31:34'),
(40, 'contact', 'Contact', NULL, 1, '0', 1697629187, 0, '2023-10-18 06:06:58', '2023-10-30 02:44:48'),
(41, 'info_contact', 'information contact', NULL, 0, '40', 1697621913, 0, '2023-10-18 06:08:33', '2023-10-18 06:08:33'),
(42, 'teacher', 'Teacher', NULL, 0, NULL, 1697614079, 0, '2023-10-18 08:09:47', '2023-10-19 03:13:37'),
(43, 'course', 'Courses', NULL, 1, '0', 1698121533, 0, '2023-10-19 01:10:24', '2023-10-30 02:44:36'),
(44, 'film_category', 'Film category', NULL, 0, NULL, 1697691564, 0, '2023-10-19 01:29:24', '2023-10-19 02:55:47'),
(45, 'film', 'Film', NULL, 0, NULL, 1697692250, 0, '2023-10-19 01:40:50', '2023-10-19 01:40:50'),
(46, 'quiz', 'Quiz', NULL, 0, NULL, 1697692816, 0, '2023-10-19 01:50:16', '2023-10-19 01:50:16'),
(47, 'course_categories', 'Course categories', NULL, 0, '43', 1697884791, 0, '2023-10-19 02:09:42', '2023-10-31 01:39:00'),
(48, 'courses', 'Courses', NULL, 0, NULL, 1697695658, 0, '2023-10-19 02:37:38', '2023-10-19 02:37:38'),
(49, 'course_features', 'Course features', NULL, 0, NULL, 1697697028, 0, '2023-10-19 03:00:28', '2023-10-19 03:00:28'),
(50, 'general_items', 'General course items', NULL, 0, '43', 1698494534, 0, '2023-10-21 03:06:01', '2023-10-31 01:38:58'),
(51, 'site_introduction', 'Site introduction', NULL, 0, '43', 1697870161, 0, '2023-10-21 07:09:51', '2023-10-31 01:39:04'),
(53, 'form_countact', 'Form countact us', NULL, 0, '40', 1698132614, 0, '2023-10-24 04:00:14', '2023-10-24 04:00:14'),
(54, 'contact_us', 'Contact us', NULL, 0, '40', 1698136206, 0, '2023-10-24 05:00:06', '2023-10-24 05:00:06'),
(55, 'general_contact', 'General items', NULL, 0, '40', 1698144122, 0, '2023-10-24 07:12:02', '2023-10-24 07:12:02'),
(56, 'item_contact', 'Item contact', NULL, 0, NULL, 1698145118, 0, '2023-10-24 07:28:38', '2023-10-24 07:28:38'),
(57, 'blog', 'Blog', NULL, 1, '0', 1697621818, 0, '2023-10-28 00:53:25', '2023-10-30 02:44:53'),
(59, 'general_blogs', 'General items', NULL, 0, '57', 1698469820, 0, '2023-10-28 01:25:08', '2023-10-28 01:46:01'),
(60, 'tags', 'Tags', NULL, 0, '57', 1698469711, 0, '2023-10-28 01:38:31', '2023-10-28 01:38:31'),
(61, 'blogs', 'Blogs', NULL, 0, '57', 1698468908, 0, '2023-10-28 01:40:20', '2023-10-28 01:46:01'),
(62, 'latest_blog', 'Latest post blog', NULL, 0, '6', 1698490248, 0, '2023-10-28 07:20:48', '2023-10-28 07:20:48'),
(63, 'general_course', 'General course item', NULL, 0, '43', 1698728846, 0, '2023-10-28 08:32:14', '2023-10-31 01:38:55'),
(64, 'users', 'Users', NULL, 0, '0', 1697530121, 0, '2023-10-30 02:39:53', '2023-10-30 02:44:53'),
(68, 'orders', 'Orders', NULL, 0, '43', 1697693982, 0, '2023-10-31 01:37:26', '2023-10-31 01:39:04'),
(69, 'state_users', 'State users', NULL, 0, NULL, 1698752383, 0, '2023-10-31 08:09:43', '2023-10-31 08:09:43'),
(71, 'test', 'test', NULL, 1, '0', 1699698034, 0, '2023-11-11 06:50:34', '2023-11-11 06:50:34'),
(72, 'test2', 'test2', NULL, 1, '71', 1699698060, 0, '2023-11-11 06:51:00', '2023-11-11 06:51:00'),
(73, 'test3', 'test3', NULL, 1, '71', 1699698094, 0, '2023-11-11 06:51:34', '2023-11-11 06:51:34'),
(74, 'test4', 'test4', NULL, 0, '71', 1699698119, 0, '2023-11-11 06:51:59', '2023-11-11 06:51:59'),
(75, 'test5', 'test5', NULL, 1, '73', 1699698138, 0, '2023-11-11 06:52:18', '2023-11-11 06:52:18'),
(76, 'test6', 'test6', NULL, 1, '73', 1699698166, 0, '2023-11-11 06:52:46', '2023-11-11 06:52:46'),
(77, 'test7', 'test7', NULL, 0, '73', 1699698203, 0, '2023-11-11 06:53:23', '2023-11-11 06:53:23'),
(78, 'test8', 'test8', NULL, 1, '76', 1699698226, 0, '2023-11-11 06:53:46', '2023-11-11 06:53:46'),
(79, 'test9', 'test9', NULL, 0, '76', 1699698238, 0, '2023-11-11 06:53:58', '2023-11-11 06:53:58'),
(80, 'test10', 'test10', NULL, 0, '78', 1699698264, 0, '2023-11-11 06:54:24', '2023-11-11 06:54:24'),
(81, 'test11', 'test11', NULL, 0, '78', 1699698280, 0, '2023-11-11 06:54:40', '2023-11-11 06:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `edits`
--

CREATE TABLE `edits` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` longtext DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `sort` int(45) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `edit_langs`
--

CREATE TABLE `edit_langs` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `lang_abbr` varchar(5) NOT NULL,
  `value` longtext DEFAULT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_a`
--

CREATE TABLE `en_a` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `select` varchar(255) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `en_a`
--

INSERT INTO `en_a` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `file`, `route`, `select`, `upload`) VALUES
(54, NULL, NULL, 1696747762, 259, '2023-10-08 06:49:22', '2023-10-08 07:06:14', NULL, 'test/sadsaf', NULL, NULL),
(55, NULL, NULL, 1696748141, 260, '2023-10-08 06:55:41', '2023-10-08 07:06:14', 3, 'test/dfgdfg', NULL, NULL),
(56, NULL, NULL, 1696748174, 261, '2023-10-08 06:56:14', '2023-10-08 06:56:14', 3, 'test/aa', '19', NULL),
(57, NULL, NULL, 1696748218, 262, '2023-10-08 06:56:58', '2023-10-08 07:06:14', NULL, 'test/asdafsdfsdsgf', NULL, NULL),
(58, NULL, NULL, 1696748279, 263, '2023-10-08 06:57:59', '2023-10-08 07:06:14', NULL, 'test/asdasdaf', NULL, NULL),
(59, NULL, NULL, 1696748291, 264, '2023-10-08 06:58:11', '2023-10-08 06:58:11', NULL, NULL, '17', NULL),
(60, NULL, 0, 1696852927, 269, '2023-10-09 12:02:07', '2023-10-09 12:02:07', 1, 'test/dsgfsdgfdfsg', '16', NULL),
(63, NULL, NULL, 1697019282, 273, '2023-10-11 10:14:42', '2023-10-11 10:14:42', NULL, NULL, '21', NULL),
(64, NULL, NULL, 1697019874, 276, '2023-10-11 10:24:34', '2023-10-11 10:24:34', NULL, NULL, '21', NULL),
(65, NULL, NULL, 1697020114, 277, '2023-10-11 10:28:34', '2023-10-11 10:28:34', NULL, NULL, '21', 'a/upload/1697020114.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `en_about_service`
--

CREATE TABLE `en_about_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_about_service`
--

INSERT INTO `en_about_service` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `icon`, `title`, `description`) VALUES
(1, NULL, NULL, 1697959956, 429, '2023-10-22 04:02:36', '2023-10-22 04:02:36', NULL, 'SELF LEARNING', 'So many academic goals that we expect you to achieve.');

-- --------------------------------------------------------

--
-- Table structure for table `en_a_multi_b`
--

CREATE TABLE `en_a_multi_b` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_id` bigint(20) NOT NULL,
  `b_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `en_a_multi_b`
--

INSERT INTO `en_a_multi_b` (`id`, `a_id`, `b_id`, `created_at`, `updated_at`) VALUES
(45, 54, 19, '2023-10-08 06:49:22', '2023-10-08 06:49:22'),
(46, 54, 18, '2023-10-08 06:49:22', '2023-10-08 06:49:22'),
(47, 55, 14, '2023-10-08 06:55:41', '2023-10-08 06:55:41'),
(48, 55, 13, '2023-10-08 06:55:41', '2023-10-08 06:55:41'),
(49, 59, 15, '2023-10-08 06:58:11', '2023-10-08 06:58:11'),
(50, 59, 14, '2023-10-08 06:58:11', '2023-10-08 06:58:11'),
(51, 60, 19, '2023-10-09 12:02:07', '2023-10-09 12:02:07'),
(52, 60, 16, '2023-10-09 12:02:07', '2023-10-09 12:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `en_b`
--

CREATE TABLE `en_b` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text` varchar(255) DEFAULT NULL,
  `html` longtext DEFAULT NULL,
  `check` tinyint(4) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `num` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `en_b`
--

INSERT INTO `en_b` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `text`, `html`, `check`, `link`, `color`, `code`, `num`) VALUES
(11, NULL, NULL, 1696153415, 159, '2023-10-01 09:43:35', '2023-10-01 09:43:35', 'xzczxc', '<p>xzczxc</p>', 1, 'https://www.google.com/', '#941e1e', '1696153415', NULL),
(12, NULL, NULL, 1696154797, 165, '2023-10-01 10:06:37', '2023-10-01 10:06:37', 'bvmnvb', '<p>bvmbvmbvm</p>', 1, '/ddd/aaa', '#0d750b', '1696154797', NULL),
(13, NULL, NULL, 1696155640, 166, '2023-10-01 10:20:40', '2023-10-01 10:20:40', 'dsfdsf', '<p>dsfsdf</p>', 1, '/aaa/fff', '#000000', '1696155640', NULL),
(15, NULL, NULL, 1696405225, 225, '2023-10-04 07:40:25', '2023-10-04 07:40:25', NULL, NULL, 1, NULL, '#000000', '1696405225', 1.111111111111111e29),
(16, NULL, NULL, 1696405258, 226, '2023-10-04 07:40:58', '2023-10-04 07:40:58', NULL, NULL, 1, NULL, '#000000', '1696405258', 4524.456546),
(17, NULL, NULL, 1696491072, 242, '2023-10-05 07:31:12', '2023-10-05 07:31:12', NULL, NULL, 1, '/asdasd', '#000000', '1696491072', 1111111111),
(18, 'a', 43, 1696494554, 244, '2023-10-05 08:29:14', '2023-10-05 08:29:14', 'cvbhcvbncvn', '<p>cvncvncvn</p>', 1, NULL, '#000000', '1696494554', 52325),
(19, NULL, NULL, 1696665508, 247, '2023-10-07 07:58:28', '2023-10-07 07:58:28', 'سشیسبششسب', '<p>یسبسیسبسیبیسب</p>', 1, '/سیبسیب/سیبسیب', '#cb2020', '1696665508', 12312),
(21, NULL, 0, 1696754552, 267, '2023-10-08 08:42:32', '2023-10-08 08:42:32', 'asd', '<p>asd</p>', 1, NULL, '#000000', '1696754552', 23433);

-- --------------------------------------------------------

--
-- Table structure for table `en_biography`
--

CREATE TABLE `en_biography` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_biography`
--

INSERT INTO `en_biography` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `image`, `title`, `heading`, `description`) VALUES
(1, NULL, NULL, 1697959039, 424, '2023-10-22 03:47:19', '2023-10-22 03:47:19', 'biography/image/1697959039.webp', 'Our Story', 'It is a long established fact that a reade.', NULL),
(2, NULL, NULL, 1697959219, 426, '2023-10-22 03:50:19', '2023-10-22 03:50:19', 'biography/image/1697959219.webp', 'Our Values', 'It is a long established fact that a reade.', '<p><span style=\"color: #e8eaed; font-family: consolas, \'lucida console\', \'courier new\', monospace; font-size: 12px; text-align: left; white-space-collapse: preserve;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam,voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia,consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.,Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, adipisci velit, sed quia non numquam eius modi tempora</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `en_blogs`
--

CREATE TABLE `en_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_blogs`
--

INSERT INTO `en_blogs` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `image`, `title`, `description`, `link`, `description_image`) VALUES
(1, NULL, NULL, 1698471545, 489, '2023-10-28 02:09:05', '2023-10-28 02:09:05', 'blogs/image/1698471545.jpg', 'The Java Spring Tutorial: Learn Java’s Popular Web Framework 3', '<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #888888; font-family: Roboto; font-size: 16px; letter-spacing: 0.3px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #888888; font-family: Roboto; font-size: 16px; letter-spacing: 0.3px;\">But first thing first, what is a hosting? Well, basically it is a space that contains all the data related to your website such as your source codes, uploaded contents (images, sounds and other media) and your database. Imagine your site is a mixture of juices and a jar can be considered a hosting.</p>', NULL, NULL),
(2, NULL, NULL, 1698476809, 492, '2023-10-28 03:36:49', '2023-10-28 03:36:49', NULL, 'Tips to Succeed in an Online Course', '<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">But first thing first, what is a hosting? Well, basically it is a space that contains all the data related to your website such as your source codes, uploaded contents (images, sounds and other media) and your database. Imagine your site is a mixture of juices and a jar can be considered a hosting.</p>\r\n<blockquote style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 11px 0px 26px 58px; color: var(--thim-font_title-color); font-style: italic; font-family: \'times new roman\'; font-size: 24px; line-height: 34px; letter-spacing: 0.5px; position: relative;\">\r\n<p style=\"box-sizing: inherit; margin: 0px; padding: 0px; line-height: 34px;\">I&rsquo;m a Copywriter in a Digital Agency, I was searching for courses that&rsquo;ll help me broaden my skill set. Before signing up for Rob&rsquo;s course I tried many web development courses, but no course comes.</p>\r\n</blockquote>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">But first thing first, what is a hosting? Well, basically it is a space that contains all the data related to your website such as your source codes, uploaded contents (images, sounds and other media) and your database. Imagine your site is a mixture of juices and a jar can be considered a hosting.</p>\r\n<h3 style=\"box-sizing: inherit; margin: 0px 0px 0.5rem; padding: 0px; font-family: var(--thim-font_title-font-family); font-weight: var(--thim-font_title-variant); line-height: var(--thim-font_h3-line-height); color: var(--thim-font_title-color); font-size: var(--thim-font_h3-font-size);\">Modal Pop-Ups</h3>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>\r\n<p>&nbsp;</p>', NULL, NULL),
(3, NULL, NULL, 1698480463, 1, '2023-10-28 04:37:43', '2023-10-29 10:47:50', 'blogs/image/1698480463.jpg', 'Body Language for Entrepreneurs 2', '<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">But first thing first, what is a hosting? Well, basically it is a space that contains all the data related to your website such as your source codes, uploaded contents (images, sounds and other media) and your database. Imagine your site is a mixture of juices and a jar can be considered a hosting.</p>\r\n<blockquote style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 11px 0px 26px 58px; color: var(--thim-font_title-color); font-style: italic; font-family: \'times new roman\'; font-size: 24px; line-height: 34px; letter-spacing: 0.5px; position: relative;\">\r\n<p style=\"box-sizing: inherit; margin: 0px; padding: 0px; line-height: 34px;\">I&rsquo;m a Copywriter in a Digital Agency, I was searching for courses that&rsquo;ll help me broaden my skill set. Before signing up for Rob&rsquo;s course I tried many web development courses, but no course comes.</p>\r\n</blockquote>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>', 'blogDetail/body-language', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_blogs_tags_tags`
--

CREATE TABLE `en_blogs_tags_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogs_id` bigint(20) NOT NULL,
  `tags_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_blogs_tags_tags`
--

INSERT INTO `en_blogs_tags_tags` (`id`, `blogs_id`, `tags_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2023-10-28 08:07:43', '2023-10-28 08:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `en_brands`
--

CREATE TABLE `en_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_brands`
--

INSERT INTO `en_brands` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `image`) VALUES
(12, NULL, NULL, 1697533063, 340, '2023-10-17 05:27:43', '2023-10-17 05:27:43', 'brands/Images/1697533063.jpg'),
(15, NULL, NULL, 1697533635, 343, '2023-10-17 05:37:15', '2023-10-17 05:37:15', 'brands/image/1697533635.jpg'),
(16, NULL, NULL, 1697539152, 346, '2023-10-17 07:09:12', '2023-10-17 07:09:12', 'brands/image/1697539152.png'),
(17, NULL, NULL, 1697539168, 347, '2023-10-17 07:09:28', '2023-10-17 07:09:28', 'brands/image/1697539168.png'),
(18, NULL, NULL, 1697539184, 348, '2023-10-17 07:09:44', '2023-10-17 07:09:44', 'brands/image/1697539184.png'),
(19, NULL, NULL, 1697539190, 349, '2023-10-17 07:09:50', '2023-10-17 07:09:50', 'brands/image/1697539190.png');

-- --------------------------------------------------------

--
-- Table structure for table `en_contact_us`
--

CREATE TABLE `en_contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_contact_us`
--

INSERT INTO `en_contact_us` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `name`, `email`, `subject`, `message`) VALUES
(1, NULL, NULL, 1698136447, 472, '2023-10-24 05:04:07', '2023-10-24 05:04:07', 'test', 'mazizian02@gmail.com', 'sdf', 'sssssssssssssfg'),
(2, NULL, NULL, 1698149341, 485, '2023-10-24 08:39:01', '2023-10-24 08:39:01', 'test', 'mazizian02@gmail.com', 'xfd', 'dgg'),
(3, NULL, NULL, 1698579845, 1, '2023-10-29 08:14:06', '2023-10-29 08:14:06', 'test', 'mazizian02@gmail.com', 'sss', 'fggggggjhj'),
(4, NULL, NULL, 1698580781, 1, '2023-10-29 08:29:41', '2023-10-29 08:29:41', 'test', 'mazizian02@gmail.com', 'sss', 'sdgddgaf'),
(5, NULL, NULL, 1698582356, 1, '2023-10-29 08:55:56', '2023-10-29 08:55:56', 'test', 'mazizian02@gmail.com', 'sdf', 'ytjy'),
(6, NULL, NULL, 1698582370, 1, '2023-10-29 08:56:10', '2023-10-29 08:56:10', 'hh', 'mazizian02@gmail.com', 'sss', 'h'),
(7, NULL, NULL, 1698641382, 1, '2023-10-30 01:19:42', '2023-10-30 01:19:42', 'test.txt', 'mazizian02@gmail.com', 'sss', 'gjv'),
(8, NULL, NULL, 1698641564, 1, '2023-10-30 01:22:44', '2023-10-30 01:22:44', 'laravel', 'mazizian02@gmail.com', 'sdf', 'khkhhhlio'),
(9, NULL, NULL, 1698642707, 1, '2023-10-30 01:41:47', '2023-10-30 01:41:47', 'test', 'mazizian02@gmail.com', 'g', 'gkgkj'),
(10, NULL, NULL, 1698642893, 1, '2023-10-30 01:44:53', '2023-10-30 01:44:53', 'Maryam Azizian', 'mazizian02@gmail.com', 'sss', 'ihi'),
(11, NULL, NULL, 1698642973, 1, '2023-10-30 01:46:13', '2023-10-30 01:46:13', 'Maryam Azizian', 'mazizian02@gmail.com', 'xfd', 'hhhh'),
(12, NULL, NULL, 1698643180, 1, '2023-10-30 01:49:40', '2023-10-30 01:49:40', 'test', 'mazizian02@gmail.com', 'sdf', 'l\',;'),
(13, NULL, NULL, 1698643368, 1, '2023-10-30 01:52:48', '2023-10-30 01:52:48', 'test', 'mazizian02@gmail.com', 'sdf', 'iuhih'),
(14, NULL, NULL, 1698656267, 1, '2023-10-30 05:27:47', '2023-10-30 05:27:47', 'test', 'mazizian02@gmail.com', 'sdf', 'gfjgh gfjffg'),
(15, NULL, NULL, 1698661398, 1, '2023-10-30 06:53:18', '2023-10-30 06:53:18', 'Maryam Azizian', 'mazizian02@gmail.com', 'xfd', 'gd');

-- --------------------------------------------------------

--
-- Table structure for table `en_courses`
--

CREATE TABLE `en_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_courses`
--

INSERT INTO `en_courses` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `price`, `type`, `image`, `link`, `short_description`, `description`) VALUES
(1, 'course_categories', 2, 1697697260, 396, '2023-10-19 03:04:20', '2023-10-19 03:04:20', 'LearnPress Master Web Design in Photoshop', '22.00$', 'online', NULL, NULL, NULL, NULL),
(2, 'course_categories', 2, 1697866579, 405, '2023-10-21 02:06:20', '2023-10-21 02:06:20', 'The Ultimate Ethical Hacking', 'free', 'online', 'courses/image/1697866580.webp', NULL, NULL, NULL),
(3, 'course_categories', 1, 1697871591, 409, '2023-10-21 03:29:51', '2023-10-21 03:29:51', 'LearnPress Master Web Design in Photoshop', '30.00$', 'online', 'courses/image/1697871591.webp', NULL, NULL, NULL),
(4, 'course_categories', 2, 1697952054, 422, '2023-10-22 01:50:54', '2023-10-22 01:50:54', 'Affiliate Marketing – A Beginner’s Guide', '33.00$', 'online', 'courses/image/1697952054.jpg', 'course/affiliate-marketing', 'affiliate-marketing', NULL),
(5, 'course_categories', 1, 1698662283, 1, '2023-10-30 07:08:03', '2023-10-30 07:08:03', 'AWS Certified Solutions Architect – Associate 2017', '55.00$', 'online', 'courses/image/1698662283.jpg', 'course/aws-certified', 'LearnPress is the best WordPress Learning Management System and it comes with many great features. This is the best WPLMS theme available in the market.', '<p><span style=\"color: #848484; font-family: \'Open Sans\'; font-size: 18px; letter-spacing: 0.4px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `en_course_categories`
--

CREATE TABLE `en_course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_course_categories`
--

INSERT INTO `en_course_categories` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `image`, `link`, `color`) VALUES
(1, NULL, NULL, 1697694958, 393, '2023-10-19 02:25:58', '2023-10-19 02:25:58', 'Certification Exam', '<p>des</p>', 'course_categories/image/1697694958.webp', NULL, NULL),
(2, NULL, NULL, 1697694982, 394, '2023-10-19 02:26:22', '2023-10-19 02:26:22', 'Be Your Own Boss', '<p>des</p>', 'course_categories/image/1697694982.webp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_course_features`
--

CREATE TABLE `en_course_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `duration` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `assessments` varchar(255) DEFAULT NULL,
  `lectures` double DEFAULT NULL,
  `skill_level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_course_features`
--

INSERT INTO `en_course_features` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `duration`, `language`, `assessments`, `lectures`, `skill_level`) VALUES
(1, 'courses', 1, 1697697505, 397, '2023-10-19 03:08:26', '2023-10-19 03:08:26', 'week 10', 'English', 'Yes', 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_create_account`
--

CREATE TABLE `en_create_account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_create_account`
--

INSERT INTO `en_create_account` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `button_title`, `link`, `image`) VALUES
(1, NULL, NULL, 1697611712, 366, '2023-10-18 03:18:32', '2023-10-18 03:18:32', 'Create Your Free Account', '<h4 style=\"padding: 0px; margin: 0px; box-sizing: border-box; background: transparent; font-size: 15px; line-height: 25px; font-weight: 400; font-family: \'Open Sans\';\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</h4>', 'CREATE NOW', '/createAccount', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_features`
--

CREATE TABLE `en_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_features`
--

INSERT INTO `en_features` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `icon`) VALUES
(1, NULL, NULL, 1697516760, 282, '2023-10-17 00:56:00', '2023-10-17 00:56:00', 'Learn From The Experts', 'Lorem ipsum dolor amet elit, sed do eiusmod tempor doincididunt lorem adipisicing eiusmod ipsum.', NULL),
(2, NULL, NULL, 1697519185, 283, '2023-10-17 01:36:25', '2023-10-17 01:36:25', 'Learn From The Experts', 'Lorem ipsum dolor amet elit, sed do eiusmod tempor doincididunt lorem adipisicing eiusmod ipsum.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_feedback`
--

CREATE TABLE `en_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_feedback`
--

INSERT INTO `en_feedback` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(1, NULL, NULL, 1697612166, 368, '2023-10-18 03:26:06', '2023-10-18 03:26:06', 'Clients Feedback', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_film`
--

CREATE TABLE `en_film` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `video` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_film`
--

INSERT INTO `en_film` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `video`, `title`) VALUES
(1, 'film_category', 2, 1697890301, 421, '2023-10-21 08:41:41', '2023-10-21 08:41:41', NULL, 'A Note On Asking For Help'),
(2, 'film_category', 3, 1698576141, 1, '2023-10-29 07:12:21', '2023-10-29 07:12:21', NULL, 'A Note On Asking For Help'),
(4, 'film_category', 4, 1698752147, 1, '2023-10-31 08:05:47', '2023-10-31 08:05:47', NULL, 'Lighting is important'),
(5, 'film_category', 4, 1698752155, 1, '2023-10-31 08:05:55', '2023-10-31 08:05:55', NULL, 'Background editing'),
(6, 'film_category', 2, 1698752276, 1, '2023-10-31 08:07:56', '2023-10-31 08:07:56', NULL, 'Basic lesson 1');

-- --------------------------------------------------------

--
-- Table structure for table `en_film_category`
--

CREATE TABLE `en_film_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_film_category`
--

INSERT INTO `en_film_category` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(1, NULL, NULL, 1697692425, 392, '2023-10-19 01:43:45', '2023-10-19 01:43:45', 'Be Your Own Boss', NULL),
(2, 'courses', 1, 1697697613, 399, '2023-10-19 03:10:13', '2023-10-19 03:10:13', 'Course introduction', NULL),
(3, 'courses', 2, 1698576127, 1, '2023-10-29 07:12:07', '2023-10-29 07:12:07', 'Section 1', 'Perfect Inelasticity And Perfect'),
(4, 'courses', 1, 1698752102, 1, '2023-10-31 08:05:02', '2023-10-31 08:05:02', 'Section 2', 'Perfect Inelasticity');

-- --------------------------------------------------------

--
-- Table structure for table `en_footer_categories`
--

CREATE TABLE `en_footer_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_footer_categories`
--

INSERT INTO `en_footer_categories` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `link`) VALUES
(2, NULL, NULL, 1697615678, 372, '2023-10-18 04:24:38', '2023-10-18 04:24:38', 'CATEGORIES', NULL),
(3, NULL, NULL, 1697615687, 373, '2023-10-18 04:24:47', '2023-10-18 04:24:47', 'SUBCRIBE NEW LETTERS', NULL),
(4, 'footer_categories', 3, 1697615956, 374, '2023-10-18 04:29:16', '2023-10-18 04:29:16', 'About us', '/about'),
(5, 'footer_categories', 3, 1697615964, 375, '2023-10-18 04:29:24', '2023-10-18 04:29:24', 'Blog', '/blog'),
(6, 'footer_categories', 3, 1697615984, 376, '2023-10-18 04:29:44', '2023-10-18 04:29:44', 'Buddy profile', '/buddyProfile'),
(7, 'footer_categories', 3, 1697615999, 377, '2023-10-18 04:29:59', '2023-10-18 04:29:59', 'Become an instructor', '/instructor'),
(8, 'footer_categories', 3, 1697616019, 378, '2023-10-18 04:30:19', '2023-10-18 04:30:19', 'Membership', '/membership'),
(9, 'footer_categories', 2, 1697616090, 379, '2023-10-18 04:31:30', '2023-10-18 04:31:30', 'Technology', '/technology'),
(10, 'footer_categories', 2, 1697616102, 380, '2023-10-18 04:31:42', '2023-10-18 04:31:42', 'Photography', '/photography'),
(11, 'footer_categories', 2, 1697616113, 381, '2023-10-18 04:31:53', '2023-10-18 04:31:53', 'Business', '/business'),
(12, 'footer_categories', 2, 1697616121, 382, '2023-10-18 04:32:01', '2023-10-18 04:32:01', 'Design', '/design'),
(13, 'footer_categories', 2, 1697616223, 383, '2023-10-18 04:33:43', '2023-10-18 04:33:43', 'Web Development', '/webDevelopment');

-- --------------------------------------------------------

--
-- Table structure for table `en_form_countact`
--

CREATE TABLE `en_form_countact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_form_countact`
--

INSERT INTO `en_form_countact` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `name`, `email`, `subject`, `message`, `button_title`) VALUES
(1, NULL, NULL, 1698134077, 471, '2023-10-24 04:24:37', '2023-10-24 04:24:37', 'Name', 'Email', 'Subject', 'Message', 'send your message');

-- --------------------------------------------------------

--
-- Table structure for table `en_general_about`
--

CREATE TABLE `en_general_about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `background_about` varchar(255) DEFAULT NULL,
  `background_info` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `service_title` varchar(255) DEFAULT NULL,
  `service_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_general_about`
--

INSERT INTO `en_general_about` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `background_about`, `background_info`, `title`, `description`, `service_title`, `service_description`) VALUES
(1, NULL, NULL, 1697959313, 427, '2023-10-22 03:51:53', '2023-10-22 03:51:53', NULL, NULL, 'ABOUT US', '<p>THE BEST DEMO EDUCATION It is a long established fact that a reade</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_general_blogs`
--

CREATE TABLE `en_general_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `background_image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_general_blogs`
--

INSERT INTO `en_general_blogs` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `background_image`, `title`, `description`) VALUES
(1, NULL, NULL, 1698470807, 488, '2023-10-28 01:56:48', '2023-10-28 01:56:48', NULL, 'Blog', 'THE BEST DEMO EDUCATION                     It is a long established fact that a reade.');

-- --------------------------------------------------------

--
-- Table structure for table `en_general_contact`
--

CREATE TABLE `en_general_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `message_title` varchar(255) DEFAULT NULL,
  `message_description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `success_message` varchar(255) DEFAULT NULL,
  `message_failed` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_general_contact`
--

INSERT INTO `en_general_contact` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `message_title`, `message_description`, `image`, `success_message`, `message_failed`) VALUES
(1, NULL, NULL, 1698144682, 474, '2023-10-24 07:21:22', '2023-10-24 07:21:22', 'established fact that a reade.', 'THE BEST DEMO EDUCATION It is a long established fact that a reade.', 'Leave a Message', 'Your email address will not be published. Required fields are marked.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_general_course`
--

CREATE TABLE `en_general_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `secound_title` varchar(255) DEFAULT NULL,
  `second_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_general_course`
--

INSERT INTO `en_general_course` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `background_image`, `secound_title`, `second_description`) VALUES
(1, NULL, NULL, 1698494656, 1, '2023-10-28 08:34:16', '2023-10-28 08:34:16', 'Courses', 'THE BEST DEMO EDUCATION Be successful with Course Builder theme.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_general_header`
--

CREATE TABLE `en_general_header` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logo` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link_button` varchar(255) DEFAULT NULL,
  `login_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_general_header`
--

INSERT INTO `en_general_header` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `logo`, `button_title`, `link_button`, `login_link`) VALUES
(1, NULL, NULL, 1697622723, 391, '2023-10-18 06:22:03', '2023-10-18 06:22:03', 'general_header/logo/1697622723.webp', 'BUY COURS', '/buy', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_general_site`
--

CREATE TABLE `en_general_site` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `background` varchar(255) DEFAULT NULL,
  `title_search` varchar(255) DEFAULT NULL,
  `link_search` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_info_contact`
--

CREATE TABLE `en_info_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `font_awesome` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_info_contact`
--

INSERT INTO `en_info_contact` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `font_awesome`, `title`) VALUES
(1, NULL, NULL, 1698145277, 476, '2023-10-24 07:31:17', '2023-10-24 07:31:17', '<i class=\"fa-solid fa-location-dot\"></i>', 'OUR LOCATION'),
(2, NULL, NULL, 1698145299, 477, '2023-10-24 07:31:39', '2023-10-24 07:31:39', '<i class=\"fa-solid fa-phone\"></i>', 'CONTACT US'),
(3, NULL, NULL, 1698145317, 478, '2023-10-24 07:31:57', '2023-10-24 07:31:57', '<i class=\"fa-regular fa-paper-plane\"></i>', 'WRITE SOME WORDS');

-- --------------------------------------------------------

--
-- Table structure for table `en_item_contact`
--

CREATE TABLE `en_item_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_item_contact`
--

INSERT INTO `en_item_contact` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(1, 'info_contact', 3, 1698145361, 479, '2023-10-24 07:32:41', '2023-10-24 07:32:41', NULL, 'PO Box 97845 Baker st. 567, Los Angeles,California, US.'),
(2, 'info_contact', 2, 1698145390, 480, '2023-10-24 07:33:10', '2023-10-24 07:33:10', 'Mobile', '(+0123) 465 789'),
(3, 'info_contact', 2, 1698145395, 481, '2023-10-24 07:33:15', '2023-10-24 07:33:15', 'Fax', '(+0123) 465 789'),
(4, 'info_contact', 1, 1698145527, 482, '2023-10-24 07:35:27', '2023-10-24 07:35:27', NULL, 'Info@thimpress.com'),
(5, 'info_contact', 1, 1698145530, 483, '2023-10-24 07:35:30', '2023-10-24 07:35:30', NULL, 'Support247@thimpress.com');

-- --------------------------------------------------------

--
-- Table structure for table `en_lastest_new`
--

CREATE TABLE `en_lastest_new` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_lastest_new`
--

INSERT INTO `en_lastest_new` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `button_title`, `link`) VALUES
(1, NULL, NULL, 1697612937, 370, '2023-10-18 03:38:57', '2023-10-18 03:38:57', 'Lastest New', '<p><span style=\"font-family: \'Open Sans\'; font-size: 15px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</span></p>', 'VIEW MORE', '/newCourses');

-- --------------------------------------------------------

--
-- Table structure for table `en_lastest_new_courses_courses`
--

CREATE TABLE `en_lastest_new_courses_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lastest_new_id` bigint(20) NOT NULL,
  `courses_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_latest_blog`
--

CREATE TABLE `en_latest_blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_latest_blog`
--

INSERT INTO `en_latest_blog` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1698490574, 1, '2023-10-28 07:26:14', '2023-10-28 07:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `en_latest_blog_blogs_blogs`
--

CREATE TABLE `en_latest_blog_blogs_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latest_blog_id` bigint(20) NOT NULL,
  `blogs_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_latest_blog_blogs_blogs`
--

INSERT INTO `en_latest_blog_blogs_blogs` (`id`, `latest_blog_id`, `blogs_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2023-10-28 10:56:14', '2023-10-28 10:56:14'),
(2, 1, 2, '2023-10-28 10:56:14', '2023-10-28 10:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `en_menu`
--

CREATE TABLE `en_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_menu`
--

INSERT INTO `en_menu` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `link`) VALUES
(1, NULL, NULL, 1697601191, 353, '2023-10-18 00:23:11', '2023-10-18 00:23:11', 'Demos', '/demos'),
(2, NULL, NULL, 1697601349, 354, '2023-10-18 00:25:49', '2023-10-18 00:25:49', 'About', '/about'),
(3, NULL, NULL, 1697602767, 355, '2023-10-18 00:49:27', '2023-10-18 00:49:27', 'Pages', '/pages'),
(4, 'menu', 1, 1697602881, 356, '2023-10-18 00:51:21', '2023-10-18 00:51:21', 'Demu Kit Builder', '/kitBuilder'),
(5, 'menu', 3, 1697602912, 357, '2023-10-18 00:51:52', '2023-10-18 00:51:52', 'Blog', '/blog'),
(6, NULL, NULL, 1697603345, 358, '2023-10-18 00:59:05', '2023-10-18 00:59:05', 'Contact', '/contact'),
(7, NULL, NULL, 1697864561, 404, '2023-10-21 01:32:41', '2023-10-21 01:32:41', 'Course', '/course');

-- --------------------------------------------------------

--
-- Table structure for table `en_new_subcribe`
--

CREATE TABLE `en_new_subcribe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `placeholder` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_new_subcribe`
--

INSERT INTO `en_new_subcribe` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `button_title`, `link`, `placeholder`, `description`) VALUES
(1, NULL, NULL, 1697619969, 388, '2023-10-18 05:36:09', '2023-10-18 05:36:09', 'SUBCRIBE NEW LETTERS', 'SUBCRIBE', '/subcribe', 'Enter email address', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_orders`
--

CREATE TABLE `en_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `course` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_our_top_course`
--

CREATE TABLE `en_our_top_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_our_top_course`
--

INSERT INTO `en_our_top_course` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `button_title`, `link`) VALUES
(1, NULL, NULL, 1697611255, 365, '2023-10-18 03:10:55', '2023-10-18 03:10:55', 'Our Top Course', '<p><span style=\"font-family: \'Open Sans\'; font-size: 15px; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit,do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span></p>', 'VIEW ALL COURSES', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_our_top_course_courses_courses`
--

CREATE TABLE `en_our_top_course_courses_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `our_top_course_id` bigint(20) NOT NULL,
  `courses_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_quiz`
--

CREATE TABLE `en_quiz` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `question` longtext DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_site_introduction`
--

CREATE TABLE `en_site_introduction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_site_introduction`
--

INSERT INTO `en_site_introduction` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `image`, `title`, `description`, `button_title`, `link`) VALUES
(1, NULL, NULL, 1697885057, 414, '2023-10-21 07:14:18', '2023-10-21 07:14:18', 'site_introduction/image/1697885058.webp', 'TRUSTED BY OVER 6000+ STUDENTS', 'Join our community of students around the world helping you succeed.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_state_users`
--

CREATE TABLE `en_state_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(255) DEFAULT NULL,
  `film` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_statistics`
--

CREATE TABLE `en_statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_statistics`
--

INSERT INTO `en_statistics` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `icon`, `title`, `description`, `heading`) VALUES
(1, NULL, NULL, 1697521092, 287, '2023-10-17 02:08:12', '2023-10-17 02:08:12', NULL, 'welcome to CourseBuider Kit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Adipisicing elit, sed do eiusmod', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_tags`
--

CREATE TABLE `en_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_tags`
--

INSERT INTO `en_tags` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `link`) VALUES
(1, NULL, NULL, 1698470297, 486, '2023-10-28 01:48:17', '2023-10-28 01:48:17', 'learnpress', NULL),
(2, NULL, NULL, 1698470307, 487, '2023-10-28 01:48:27', '2023-10-28 01:48:27', 'thimpress', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_talk`
--

CREATE TABLE `en_talk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `twitter_account` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_talk`
--

INSERT INTO `en_talk` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `twitter_account`, `email`, `phone_number`, `button_title`, `button_link`) VALUES
(2, NULL, NULL, 1697971346, 435, '2023-10-22 07:12:26', '2023-10-22 07:12:26', 'Contact Twitter', 'info@thimpress.com', '+(0123) 456 789', 'LETS TALK', '/talk');

-- --------------------------------------------------------

--
-- Table structure for table `en_teacher`
--

CREATE TABLE `en_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `introduction` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_teacher`
--

INSERT INTO `en_teacher` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `name`, `education`, `image`, `introduction`) VALUES
(1, 'courses', 1, 1697698039, 400, '2023-10-19 03:17:19', '2023-10-19 03:17:19', 'Keny White', 'Professor', 'teacher/image/1697698039.PNG', NULL),
(2, 'courses', 2, 1697970200, 432, '2023-10-22 06:53:20', '2023-10-22 06:53:20', 'Dr Eastey', 'Dr', 'teacher/image/1697970200.PNG', 'Pellentesque venenatis, libero vel euismod lobortis, mi metus luctus augue, eget dapibus elit nisi eu massa. Phasellus sollicitudin nisl posuere nibh ultricies, et fringilla dui gravida. Donec iaculis adipiscing neque, non congue massa euismod quis.');

-- --------------------------------------------------------

--
-- Table structure for table `en_test4`
--

CREATE TABLE `en_test4` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_test7`
--

CREATE TABLE `en_test7` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_test9`
--

CREATE TABLE `en_test9` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_test10`
--

CREATE TABLE `en_test10` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_test11`
--

CREATE TABLE `en_test11` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_top_categories`
--

CREATE TABLE `en_top_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_top_categories`
--

INSERT INTO `en_top_categories` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(1, NULL, NULL, 1697609879, 362, '2023-10-18 02:47:59', '2023-10-18 02:47:59', 'Top Categories', '<p><span style=\"font-family: \'Open Sans\'; font-size: 15px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `en_top_categories_course_category_course_categories`
--

CREATE TABLE `en_top_categories_course_category_course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `top_categories_id` bigint(20) NOT NULL,
  `course_categories_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_users`
--

CREATE TABLE `en_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_users`
--

INSERT INTO `en_users` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `username`, `email`) VALUES
(2, NULL, NULL, 1698648755, 1, '2023-10-30 03:22:35', '2023-10-30 03:22:35', 'maryam azizian', 'mazizian02@gmail.com'),
(3, NULL, NULL, 1698732367, 1, '2023-10-31 02:36:07', '2023-10-31 02:36:07', 'maryam', 'mazizian03@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `en_welcome`
--

CREATE TABLE `en_welcome` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `en_welcome`
--

INSERT INTO `en_welcome` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `image`, `heading`, `title`, `description`, `button_title`, `link`) VALUES
(1, NULL, NULL, 1697609111, 359, '2023-10-18 02:35:11', '2023-10-18 02:35:11', 'welcome/image/1697609111.PNG', 'welcome to', 'CourseBuider Kit', '<p><span style=\"font-family: \'Open Sans\'; font-size: 15px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Adipisicing elit, sed do eiusmod tempor incididunt.</span></p>', 'View All', '/courseBuider');

-- --------------------------------------------------------

--
-- Table structure for table `fa_a`
--

CREATE TABLE `fa_a` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `select` varchar(255) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fa_a`
--

INSERT INTO `fa_a` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `file`, `route`, `select`, `upload`) VALUES
(54, NULL, NULL, 1696747762, 259, '2023-10-08 06:49:22', '2023-10-08 07:06:14', NULL, 'test/sadsaf', NULL, NULL),
(55, NULL, NULL, 1696748141, 260, '2023-10-08 06:55:41', '2023-10-08 07:06:14', 3, 'test/dfgdfg', NULL, NULL),
(56, NULL, NULL, 1696748218, 261, '2023-10-08 06:56:14', '2023-10-08 07:03:29', 3, 'test/aa', '19', NULL),
(57, NULL, NULL, 1696748174, 262, '2023-10-08 06:56:58', '2023-10-08 07:06:14', NULL, 'test/asdafsdfsdsgf', NULL, NULL),
(58, NULL, NULL, 1696748279, 263, '2023-10-08 06:57:59', '2023-10-08 07:06:14', NULL, 'test/asdasdaf', '14', NULL),
(59, NULL, NULL, 1696748291, 264, '2023-10-08 06:58:11', '2023-10-08 06:58:11', NULL, NULL, '17', NULL),
(60, NULL, NULL, 1696852927, 269, '2023-10-09 12:02:07', '2023-10-09 12:04:44', 1, 'test/dsgfsdgfdfsg', '16', NULL),
(63, NULL, NULL, 1697019282, 273, '2023-10-11 10:14:42', '2023-10-11 10:14:42', NULL, NULL, '21', NULL),
(64, NULL, NULL, 1697019874, 276, '2023-10-11 10:24:34', '2023-10-11 10:24:34', NULL, NULL, '21', NULL),
(65, NULL, NULL, 1697020114, 277, '2023-10-11 10:28:34', '2023-10-11 10:28:34', NULL, NULL, '21', 'a/upload/1697020114.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fa_about_service`
--

CREATE TABLE `fa_about_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_about_service`
--

INSERT INTO `fa_about_service` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `icon`, `title`, `description`) VALUES
(1, NULL, NULL, 1697959956, 429, '2023-10-22 04:02:36', '2023-10-22 04:02:36', NULL, 'SELF LEARNING', 'So many academic goals that we expect you to achieve.');

-- --------------------------------------------------------

--
-- Table structure for table `fa_a_multi_b`
--

CREATE TABLE `fa_a_multi_b` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_id` bigint(20) NOT NULL,
  `b_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fa_a_multi_b`
--

INSERT INTO `fa_a_multi_b` (`id`, `a_id`, `b_id`, `created_at`, `updated_at`) VALUES
(53, 54, 19, '2023-10-08 06:49:22', '2023-10-08 06:49:22'),
(54, 54, 18, '2023-10-08 06:49:22', '2023-10-08 06:49:22'),
(55, 55, 14, '2023-10-08 06:55:41', '2023-10-08 06:55:41'),
(56, 55, 13, '2023-10-08 06:55:41', '2023-10-08 06:55:41'),
(57, 59, 15, '2023-10-08 06:58:11', '2023-10-08 06:58:11'),
(58, 59, 14, '2023-10-08 06:58:11', '2023-10-08 06:58:11'),
(62, 56, 16, '2023-10-09 11:02:07', '2023-10-09 11:02:07'),
(63, 56, 11, '2023-10-09 11:02:07', '2023-10-09 11:02:07'),
(64, 56, 13, '2023-10-09 11:02:07', '2023-10-09 11:02:07'),
(65, 60, 19, '2023-10-09 12:02:07', '2023-10-09 12:02:07'),
(66, 60, 16, '2023-10-09 12:02:07', '2023-10-09 12:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `fa_b`
--

CREATE TABLE `fa_b` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text` varchar(255) DEFAULT NULL,
  `html` longtext DEFAULT NULL,
  `check` tinyint(4) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `num` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fa_b`
--

INSERT INTO `fa_b` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `text`, `html`, `check`, `link`, `color`, `code`, `num`) VALUES
(11, NULL, NULL, 1696155640, 159, '2023-10-01 09:43:35', '2023-10-08 10:32:33', 'xzczxc', '<p>xzczxc</p>', 0, 'https://www.google.com/', '#941e1e', '1696153415', NULL),
(12, NULL, NULL, 1696401551, 165, '2023-10-01 10:06:37', '2023-10-08 10:32:34', NULL, NULL, 0, NULL, '#0d750b', '1696154797', 423434.345),
(13, NULL, NULL, 1696153415, 166, '2023-10-01 10:20:40', '2023-10-08 10:32:32', 'dsfdsf', '<p>dsfsdf</p>', 0, '/aaa/fff', '#000000', '1696155640', NULL),
(15, NULL, NULL, 1696405225, 225, '2023-10-04 07:40:25', '2023-10-04 07:40:25', NULL, NULL, 1, NULL, '#000000', '1696405225', 1.111111111111111e29),
(16, NULL, NULL, 1696405258, 226, '2023-10-04 07:40:58', '2023-10-08 10:32:41', 'asfadsgfdasgsdgsdgdsg', '<p>dsgdsgdsgdgsdgsdgsdgsds</p>', 0, 'https://www.google.com/', '#be0909', '1696405258', 4524.456546),
(17, NULL, NULL, 1696491072, 242, '2023-10-05 07:31:12', '2023-10-08 10:32:39', NULL, NULL, 0, NULL, '#000000', '1696491072', 123123),
(18, 'a', 43, 1696494554, 244, '2023-10-05 08:29:14', '2023-10-05 08:29:14', 'cvbhcvbncvn', '<p>cvncvncvn</p>', 1, NULL, '#000000', '1696494554', 52325),
(19, NULL, NULL, 1696665508, 247, '2023-10-07 07:58:28', '2023-10-08 10:32:40', 'asdasfafsafsfas', '<p>dsfsdfsdfsdf</p>', 0, '/sdfsdf/sdfsdf', '#204acb', '1696665508', 12312),
(21, NULL, 0, 1696754552, 267, '2023-10-08 08:42:32', '2023-10-08 08:42:32', 'asd', '<p>asd</p>', 1, NULL, '#000000', '1696754552', 23433);

-- --------------------------------------------------------

--
-- Table structure for table `fa_biography`
--

CREATE TABLE `fa_biography` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_biography`
--

INSERT INTO `fa_biography` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `image`, `title`, `heading`, `description`) VALUES
(1, NULL, NULL, 1697959219, 424, '2023-10-22 03:47:19', '2023-10-22 07:20:27', 'biography/image/1697959039.webp', 'Our Story', 'It is a long established fact that a reade.', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium,totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam,voluptatem quia voluptas sit</p>'),
(2, NULL, NULL, 1697959039, 426, '2023-10-22 03:50:19', '2023-10-22 07:20:27', 'biography/image/1697959219.webp', 'Our Values', 'It is a long established fact that a reade.', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium,totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam,voluptatem quia voluptas sit</p>');

-- --------------------------------------------------------

--
-- Table structure for table `fa_blogs`
--

CREATE TABLE `fa_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_blogs`
--

INSERT INTO `fa_blogs` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `image`, `title`, `description`, `link`, `description_image`) VALUES
(1, NULL, NULL, 1698471545, 489, '2023-10-28 02:09:05', '2023-10-29 10:47:50', 'blogs/image/1698471545.jpg', 'The Java Spring Tutorial: Learn Java’s Popular Web Framework', '<p class=\"part\" style=\"padding: 0px 0px 50px; margin: 0px; box-sizing: border-box; font-family: \'Open Sans\'; font-size: 15px; color: var(--main-paragragh-color-text); text-align: left;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process isoften .overloo&nbsp;ked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as wel.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #888888; font-family: Roboto; font-size: 16px; letter-spacing: 0.3px;\"><span style=\"letter-spacing: 0.3px;\">Modal Pop-Ups</span></p>\r\n<p class=\"part\" style=\"padding: 0px 0px 50px; margin: 0px; box-sizing: border-box; font-family: \'Open Sans\'; font-size: 15px; color: var(--main-paragragh-color-text);\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process isoften overloo ked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #888888; font-family: Roboto; font-size: 16px; letter-spacing: 0.3px;\"><img src=\"/files/main/blogs/description_image/1698566035.jpg\" alt=\"\" width=\"571\" height=\"381\" /></p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #888888; font-family: Roboto; font-size: 16px; letter-spacing: 0.3px;\"><span style=\"color: #939393; font-family: \'Open Sans\'; font-size: 15px; letter-spacing: normal;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</span></p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #888888; font-family: Roboto; font-size: 16px; letter-spacing: 0.3px;\">&nbsp;</p>', 'blogDetail/java-spring-tutorial', 'blogs/description_image/1698566035.jpg'),
(2, NULL, NULL, 1698476809, 492, '2023-10-28 03:36:49', '2023-10-29 10:47:50', 'blogs/image/1698476821.jpg', 'Tips to Succeed in an Online Course', '<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">But first thing first, what is a hosting? Well, basically it is a space that contains all the data related to your website such as your source codes, uploaded contents (images, sounds and other media) and your database. Imagine your site is a mixture of juices and a jar can be considered a hosting.</p>\r\n<blockquote style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 11px 0px 26px 58px; color: var(--thim-font_title-color); font-style: italic; font-family: \'times new roman\'; font-size: 24px; line-height: 34px; letter-spacing: 0.5px; position: relative;\">\r\n<p style=\"box-sizing: inherit; margin: 0px; padding: 0px; line-height: 34px;\">I&rsquo;m a Copywriter in a Digital Agency, I was searching for courses that&rsquo;ll help me broaden my skill set. Before signing up for Rob&rsquo;s course I tried many web development courses, but no course comes.</p>\r\n</blockquote>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">But first thing first, what is a hosting? Well, basically it is a space that contains all the data related to your website such as your source codes, uploaded contents (images, sounds and other media) and your database. Imagine your site is a mixture of juices and a jar can be considered a hosting.</p>\r\n<h3 style=\"box-sizing: inherit; margin: 0px 0px 0.5rem; padding: 0px; font-family: var(--thim-font_title-font-family); font-weight: var(--thim-font_title-variant); line-height: var(--thim-font_h3-line-height); color: var(--thim-font_title-color); font-size: var(--thim-font_h3-font-size);\">Modal Pop-Ups</h3>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>\r\n<p>&nbsp;</p>', 'blogDetail/online-course', NULL),
(3, NULL, NULL, 1698480463, 1, '2023-10-28 04:37:43', '2023-10-29 10:47:50', 'blogs/image/1698480463.jpg', 'Body Language for Entrepreneurs', '<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">But first thing first, what is a hosting? Well, basically it is a space that contains all the data related to your website such as your source codes, uploaded contents (images, sounds and other media) and your database. Imagine your site is a mixture of juices and a jar can be considered a hosting.</p>\r\n<blockquote style=\"box-sizing: inherit; margin: 0px 0px 1rem; padding: 11px 0px 26px 58px; color: var(--thim-font_title-color); font-style: italic; font-family: \'times new roman\'; font-size: 24px; line-height: 34px; letter-spacing: 0.5px; position: relative;\">\r\n<p style=\"box-sizing: inherit; margin: 0px; padding: 0px; line-height: 34px;\">I&rsquo;m a Copywriter in a Digital Agency, I was searching for courses that&rsquo;ll help me broaden my skill set. Before signing up for Rob&rsquo;s course I tried many web development courses, but no course comes.</p>\r\n</blockquote>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 30px; padding: 0px; color: #848484; font-family: \'Open Sans\'; font-size: 15px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</p>', 'blogDetail/body-language', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fa_blogs_tags_tags`
--

CREATE TABLE `fa_blogs_tags_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogs_id` bigint(20) NOT NULL,
  `tags_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_blogs_tags_tags`
--

INSERT INTO `fa_blogs_tags_tags` (`id`, `blogs_id`, `tags_id`, `created_at`, `updated_at`) VALUES
(7, 2, 2, '2023-10-28 08:29:36', '2023-10-28 08:29:36'),
(8, 2, 1, '2023-10-28 08:29:36', '2023-10-28 08:29:36'),
(11, 3, 2, '2023-10-28 09:08:41', '2023-10-28 09:08:41'),
(12, 3, 1, '2023-10-28 09:08:41', '2023-10-28 09:08:41'),
(18, 1, 2, '2023-10-29 11:32:52', '2023-10-29 11:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `fa_brands`
--

CREATE TABLE `fa_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_brands`
--

INSERT INTO `fa_brands` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `image`) VALUES
(14, NULL, NULL, 1697533314, 342, '2023-10-17 05:31:56', '2023-10-17 05:31:56', 'brands/image/1697539128.png'),
(15, NULL, NULL, 1697533635, 343, '2023-10-17 05:37:15', '2023-10-17 05:37:15', 'brands/image/1697539115.png'),
(16, NULL, NULL, 1697539152, 346, '2023-10-17 07:09:12', '2023-10-17 07:09:12', 'brands/image/1697539152.png'),
(17, NULL, NULL, 1697539168, 347, '2023-10-17 07:09:28', '2023-10-17 07:09:28', 'brands/image/1697539168.png'),
(18, NULL, NULL, 1697539184, 348, '2023-10-17 07:09:44', '2023-10-17 07:09:44', 'brands/image/1697539184.png'),
(19, NULL, NULL, 1697539190, 349, '2023-10-17 07:09:50', '2023-10-17 07:09:50', 'brands/image/1697539190.png');

-- --------------------------------------------------------

--
-- Table structure for table `fa_contact_us`
--

CREATE TABLE `fa_contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_contact_us`
--

INSERT INTO `fa_contact_us` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `name`, `email`, `subject`, `message`) VALUES
(1, NULL, NULL, 1698136447, 472, '2023-10-24 05:04:07', '2023-10-24 05:04:07', 'test', 'mazizian02@gmail.com', 'sdf', 'sssssssssssssfg'),
(2, NULL, NULL, 1698149341, 485, '2023-10-24 08:39:01', '2023-10-24 08:39:01', 'test', 'mazizian02@gmail.com', 'xfd', 'dgg'),
(3, NULL, NULL, 1698579845, 1, '2023-10-29 08:14:06', '2023-10-29 08:14:06', 'test', 'mazizian02@gmail.com', 'sss', 'fggggggjhj'),
(4, NULL, NULL, 1698580781, 1, '2023-10-29 08:29:41', '2023-10-29 08:29:41', 'test', 'mazizian02@gmail.com', 'sss', 'sdgddgaf'),
(5, NULL, NULL, 1698582356, 1, '2023-10-29 08:55:56', '2023-10-29 08:55:56', 'test', 'mazizian02@gmail.com', 'sdf', 'ytjy'),
(6, NULL, NULL, 1698582370, 1, '2023-10-29 08:56:10', '2023-10-29 08:56:10', 'hh', 'mazizian02@gmail.com', 'sss', 'h'),
(7, NULL, NULL, 1698641382, 1, '2023-10-30 01:19:42', '2023-10-30 01:19:42', 'test.txt', 'mazizian02@gmail.com', 'sss', 'gjv'),
(8, NULL, NULL, 1698641564, 1, '2023-10-30 01:22:44', '2023-10-30 01:22:44', 'laravel', 'mazizian02@gmail.com', 'sdf', 'khkhhhlio'),
(9, NULL, NULL, 1698642707, 1, '2023-10-30 01:41:47', '2023-10-30 01:41:47', 'test', 'mazizian02@gmail.com', 'g', 'gkgkj'),
(10, NULL, NULL, 1698642893, 1, '2023-10-30 01:44:53', '2023-10-30 01:44:53', 'Maryam Azizian', 'mazizian02@gmail.com', 'sss', 'ihi'),
(11, NULL, NULL, 1698642973, 1, '2023-10-30 01:46:13', '2023-10-30 01:46:13', 'Maryam Azizian', 'mazizian02@gmail.com', 'xfd', 'hhhh'),
(12, NULL, NULL, 1698643180, 1, '2023-10-30 01:49:40', '2023-10-30 01:49:40', 'test', 'mazizian02@gmail.com', 'sdf', 'l\',;'),
(13, NULL, NULL, 1698643368, 1, '2023-10-30 01:52:48', '2023-10-30 01:52:48', 'test', 'mazizian02@gmail.com', 'sdf', 'iuhih'),
(14, NULL, NULL, 1698656267, 1, '2023-10-30 05:27:47', '2023-10-30 05:27:47', 'test', 'mazizian02@gmail.com', 'sdf', 'gfjgh gfjffg'),
(15, NULL, NULL, 1698661398, 1, '2023-10-30 06:53:18', '2023-10-30 06:53:18', 'Maryam Azizian', 'mazizian02@gmail.com', 'xfd', 'gd');

-- --------------------------------------------------------

--
-- Table structure for table `fa_courses`
--

CREATE TABLE `fa_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_courses`
--

INSERT INTO `fa_courses` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `price`, `type`, `image`, `link`, `short_description`, `description`) VALUES
(1, 'course_categories', 2, 1697697260, 396, '2023-10-19 03:04:20', '2023-10-19 03:04:20', 'LearnPress Master Web Design in Photoshop', '22.00$', 'online', 'courses/image/1698124274.jpg', 'course/master-web-design-in-photoshop', 'LearnPress is the best WordPress Learning Management System and it comes with many great features. This is the best WPLMS theme available in the market.', '<p><span style=\"color: #848484; font-family: \'Open Sans\'; font-size: 18px; font-weight: 600; letter-spacing: 0.4px; text-align: left;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</span></p>'),
(2, 'course_categories', 2, 1697866579, 405, '2023-10-21 02:06:20', '2023-10-21 02:06:20', 'The Ultimate Ethical Hacking', 'free', 'online', 'courses/image/1698124171.webp', 'course/the-ultimate-ethical-hacking', NULL, '<p><span style=\"color: #848484; font-family: \'Open Sans\'; font-size: 18px; font-weight: 600; letter-spacing: 0.4px; text-align: left;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</span></p>'),
(3, 'course_categories', 1, 1697871591, 409, '2023-10-21 03:29:51', '2023-10-21 03:29:51', 'LearnPress Learning jQuery Mobile for Beginners', '30.00$', 'online', 'courses/image/1698124190.jpg', 'course/photoshop', 'photoshop', '<p>photoshop</p>'),
(4, 'course_categories', 2, 1697952054, 422, '2023-10-22 01:50:54', '2023-10-22 01:50:54', 'Affiliate Marketing – A Beginner’s Guide', '33.00$', 'online', 'courses/image/1697952054.jpg', 'course/affiliate-marketing', 'affiliate-marketing', '<p><span style=\"color: #848484; font-family: \'Open Sans\'; font-size: 18px; font-weight: 600; letter-spacing: 0.4px; text-align: left;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</span></p>'),
(5, 'course_categories', 1, 1698662283, 1, '2023-10-30 07:08:03', '2023-10-30 07:08:03', 'AWS Certified Solutions Architect – Associate 2017', '55.00$', 'online', 'courses/image/1698662283.jpg', 'course/aws-certified', 'LearnPress is the best WordPress Learning Management System and it comes with many great features. This is the best WPLMS theme available in the market.', '<p><span style=\"color: #848484; font-family: \'Open Sans\'; font-size: 18px; letter-spacing: 0.4px;\">If you are a newbie to managing a WordPress website, then congratulations! You are here at the right track with us because we are going to introduce you one of the most basic knowledge when owning a WordPress page: how to find your site the best WordPress Hosting service. This process is often overlooked by most of the website owners. But it can be considered the most important key point to bring your site to stand out of the crowd. A great hosting service could help you to improve SEO and increase sales as well.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `fa_course_categories`
--

CREATE TABLE `fa_course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_course_categories`
--

INSERT INTO `fa_course_categories` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `image`, `link`, `color`) VALUES
(1, NULL, NULL, 1697694958, 393, '2023-10-19 02:25:58', '2023-10-19 02:25:58', 'Certification Exam', '<p>des</p>', 'course_categories/image/1697694958.webp', 'category-courses/certification-exam', '#eaccd8'),
(2, NULL, NULL, 1697694982, 394, '2023-10-19 02:26:22', '2023-10-19 02:26:22', 'Business', '<p>des</p>', 'course_categories/image/1697694982.webp', 'category-courses/business', '#94d1e6');

-- --------------------------------------------------------

--
-- Table structure for table `fa_course_features`
--

CREATE TABLE `fa_course_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `duration` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `assessments` varchar(255) DEFAULT NULL,
  `lectures` double DEFAULT NULL,
  `skill_level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_course_features`
--

INSERT INTO `fa_course_features` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `duration`, `language`, `assessments`, `lectures`, `skill_level`) VALUES
(1, 'courses', 1, 1697697505, 397, '2023-10-19 03:08:26', '2023-10-19 03:08:26', 'week 10', 'English', 'Yes', 14, 'All levels');

-- --------------------------------------------------------

--
-- Table structure for table `fa_create_account`
--

CREATE TABLE `fa_create_account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_create_account`
--

INSERT INTO `fa_create_account` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `button_title`, `link`, `image`) VALUES
(1, NULL, NULL, 1697611712, 366, '2023-10-18 03:18:32', '2023-10-18 03:18:32', 'Create Your Free Account', '<h4 style=\"padding: 0px; margin: 0px; box-sizing: border-box; background: transparent; font-size: 15px; line-height: 25px; font-weight: 400; font-family: \'Open Sans\';\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</h4>', 'CREATE NOW', '/createAccount', 'create_account/image/1697611841.webp');

-- --------------------------------------------------------

--
-- Table structure for table `fa_features`
--

CREATE TABLE `fa_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_features`
--

INSERT INTO `fa_features` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `icon`) VALUES
(1, NULL, NULL, 1697516760, 282, '2023-10-17 00:56:00', '2023-10-17 00:56:00', 'Learn From The Experts', 'Lorem ipsum dolor amet elit, sed do eiusmod tempor doincididunt lorem adipisicing eiusmod ipsum.', '<i class=\"fa-solid fa-book-open\" style=\"color: #ffffff;\"></i>'),
(2, NULL, NULL, 1697519185, 283, '2023-10-17 01:36:25', '2023-10-17 01:36:25', 'Learn From The Experts', 'Lorem ipsum dolor amet elit, sed do eiusmod tempor doincididunt lorem adipisicing eiusmod ipsum.', '<i class=\"fa-sharp fa-solid fa-graduation-cap\" style=\"color: #ffffff;\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `fa_feedback`
--

CREATE TABLE `fa_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_feedback`
--

INSERT INTO `fa_feedback` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(1, NULL, NULL, 1697612166, 368, '2023-10-18 03:26:06', '2023-10-18 03:26:06', 'Clients Feedback', '<h4 style=\"padding: 0px; margin: 0px; box-sizing: border-box; background: transparent; font-size: 15px; line-height: 25px; font-weight: 400; font-family: \'Open Sans\';\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</h4>');

-- --------------------------------------------------------

--
-- Table structure for table `fa_film`
--

CREATE TABLE `fa_film` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `video` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_film`
--

INSERT INTO `fa_film` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `video`, `title`) VALUES
(1, 'film_category', 2, 1697890301, 421, '2023-10-21 08:41:41', '2023-10-21 08:41:41', NULL, 'A Note On Asking For Help'),
(2, 'film_category', 3, 1698576141, 1, '2023-10-29 07:12:21', '2023-10-29 07:12:21', NULL, 'A Note On Asking For Help'),
(4, 'film_category', 4, 1698752147, 1, '2023-10-31 08:05:47', '2023-10-31 08:05:47', NULL, 'Lighting is important'),
(5, 'film_category', 4, 1698752155, 1, '2023-10-31 08:05:55', '2023-10-31 08:05:55', NULL, 'Background editing'),
(6, 'film_category', 2, 1698752276, 1, '2023-10-31 08:07:56', '2023-10-31 08:07:56', NULL, 'Basic lesson');

-- --------------------------------------------------------

--
-- Table structure for table `fa_film_category`
--

CREATE TABLE `fa_film_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_film_category`
--

INSERT INTO `fa_film_category` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(1, NULL, NULL, 1697692425, 392, '2023-10-19 01:43:45', '2023-10-19 01:43:45', 'Be Your Own Boss', NULL),
(2, 'courses', 1, 1697697613, 399, '2023-10-19 03:10:13', '2023-10-19 03:10:13', 'Section 1', 'Perfect Inelasticity And Perfect'),
(3, 'courses', 2, 1698576127, 1, '2023-10-29 07:12:07', '2023-10-29 07:12:07', 'Section 1', 'Perfect Inelasticity And Perfect'),
(4, 'courses', 1, 1698752102, 1, '2023-10-31 08:05:02', '2023-10-31 08:05:02', 'Section 2', 'Perfect Inelasticity');

-- --------------------------------------------------------

--
-- Table structure for table `fa_footer_categories`
--

CREATE TABLE `fa_footer_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_footer_categories`
--

INSERT INTO `fa_footer_categories` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `link`) VALUES
(2, NULL, NULL, 1697615687, 372, '2023-10-18 04:24:38', '2023-10-18 09:12:38', 'CATEGORIES', NULL),
(3, NULL, NULL, 1697615678, 373, '2023-10-18 04:24:47', '2023-10-18 09:12:38', 'USEFUL LINKS', NULL),
(4, 'footer_categories', 3, 1697615956, 374, '2023-10-18 04:29:16', '2023-10-18 04:29:16', 'About us', '/about'),
(5, 'footer_categories', 3, 1697615964, 375, '2023-10-18 04:29:24', '2023-10-18 04:29:24', 'Blog', '/blog'),
(6, 'footer_categories', 3, 1697615984, 376, '2023-10-18 04:29:44', '2023-10-18 04:29:44', 'Buddy profile', '/buddyProfile'),
(7, 'footer_categories', 3, 1697615999, 377, '2023-10-18 04:29:59', '2023-10-18 04:29:59', 'Become an instructor', '/instructor'),
(8, 'footer_categories', 3, 1697616019, 378, '2023-10-18 04:30:19', '2023-10-18 04:30:19', 'Membership', '/membership'),
(9, 'footer_categories', 2, 1697616090, 379, '2023-10-18 04:31:30', '2023-10-18 04:31:30', 'Technology', '/technology'),
(10, 'footer_categories', 2, 1697616102, 380, '2023-10-18 04:31:42', '2023-10-18 04:31:42', 'Photography', '/photography'),
(11, 'footer_categories', 2, 1697616113, 381, '2023-10-18 04:31:53', '2023-10-18 04:31:53', 'Business', '/business'),
(12, 'footer_categories', 2, 1697616121, 382, '2023-10-18 04:32:01', '2023-10-18 04:32:01', 'Design', '/design'),
(13, 'footer_categories', 2, 1697616223, 383, '2023-10-18 04:33:43', '2023-10-18 04:33:43', 'Web Development', '/webDevelopment');

-- --------------------------------------------------------

--
-- Table structure for table `fa_form_countact`
--

CREATE TABLE `fa_form_countact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_form_countact`
--

INSERT INTO `fa_form_countact` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `name`, `email`, `subject`, `message`, `button_title`) VALUES
(1, NULL, NULL, 1698134077, 471, '2023-10-24 04:24:37', '2023-10-24 04:24:37', 'Name', 'Email', 'Subject', 'Message', 'send your message');

-- --------------------------------------------------------

--
-- Table structure for table `fa_general_about`
--

CREATE TABLE `fa_general_about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `background_about` varchar(255) DEFAULT NULL,
  `background_info` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `service_title` varchar(255) DEFAULT NULL,
  `service_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_general_about`
--

INSERT INTO `fa_general_about` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `background_about`, `background_info`, `title`, `description`, `service_title`, `service_description`) VALUES
(1, NULL, NULL, 1697959313, 427, '2023-10-22 03:51:53', '2023-10-22 03:51:53', NULL, NULL, 'ABOUT US', '<p>THE BEST DEMO EDUCATION It is a long established fact that a reade</p>', 'Our Service Categories', 'So many academic goals that we expect you to achieve.');

-- --------------------------------------------------------

--
-- Table structure for table `fa_general_blogs`
--

CREATE TABLE `fa_general_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `background_image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_general_blogs`
--

INSERT INTO `fa_general_blogs` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `background_image`, `title`, `description`) VALUES
(1, NULL, NULL, 1698470807, 488, '2023-10-28 01:56:48', '2023-10-28 01:56:48', NULL, 'Blog', 'THE BEST DEMO EDUCATION                     It is a long established fact that a reade.');

-- --------------------------------------------------------

--
-- Table structure for table `fa_general_contact`
--

CREATE TABLE `fa_general_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `message_title` varchar(255) DEFAULT NULL,
  `message_description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `success_message` varchar(255) DEFAULT NULL,
  `message_failed` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_general_contact`
--

INSERT INTO `fa_general_contact` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `message_title`, `message_description`, `image`, `success_message`, `message_failed`) VALUES
(1, NULL, NULL, 1698144682, 474, '2023-10-24 07:21:22', '2023-10-24 07:21:22', 'Contact', 'THE BEST DEMO EDUCATION It is a long established fact that a reade.', 'Leave a Message', 'Your email address will not be published. Required fields are marked.', 'general_contact/image/1698148844.png', 'Your message has been successfully sent.', 'Your message was not sent.');

-- --------------------------------------------------------

--
-- Table structure for table `fa_general_course`
--

CREATE TABLE `fa_general_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `secound_title` varchar(255) DEFAULT NULL,
  `second_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_general_course`
--

INSERT INTO `fa_general_course` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `background_image`, `secound_title`, `second_description`) VALUES
(1, NULL, NULL, 1698494656, 1, '2023-10-28 08:34:16', '2023-10-28 08:34:16', 'Courses', 'THE BEST DEMO EDUCATION Be successful with Course Builder theme.', NULL, 'Popular Courses', 'Learn to develop Android and iOS applications and Web Development within six weeks from a teacher with real-world experience. Get a 75% discount if you buy it here!');

-- --------------------------------------------------------

--
-- Table structure for table `fa_general_header`
--

CREATE TABLE `fa_general_header` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logo` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link_button` varchar(255) DEFAULT NULL,
  `login_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_general_header`
--

INSERT INTO `fa_general_header` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `logo`, `button_title`, `link_button`, `login_link`) VALUES
(1, NULL, NULL, 1697622723, 391, '2023-10-18 06:22:03', '2023-10-18 06:22:03', 'general_header/logo/1697622723.webp', 'BUY COURS', '/buy', '/login');

-- --------------------------------------------------------

--
-- Table structure for table `fa_general_site`
--

CREATE TABLE `fa_general_site` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `background` varchar(255) DEFAULT NULL,
  `title_search` varchar(255) DEFAULT NULL,
  `link_search` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fa_info_contact`
--

CREATE TABLE `fa_info_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `font_awesome` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_info_contact`
--

INSERT INTO `fa_info_contact` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `font_awesome`, `title`) VALUES
(1, NULL, NULL, 1698145277, 476, '2023-10-24 07:31:17', '2023-10-24 07:31:17', '<i class=\"fa-solid fa-location-dot\"></i>', 'OUR LOCATION'),
(2, NULL, NULL, 1698145299, 477, '2023-10-24 07:31:39', '2023-10-24 07:31:39', '<i class=\"fa-solid fa-phone\"></i>', 'CONTACT US'),
(3, NULL, NULL, 1698145317, 478, '2023-10-24 07:31:57', '2023-10-24 07:31:57', '<i class=\"fa-regular fa-paper-plane\"></i>', 'WRITE SOME WORDS');

-- --------------------------------------------------------

--
-- Table structure for table `fa_item_contact`
--

CREATE TABLE `fa_item_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_item_contact`
--

INSERT INTO `fa_item_contact` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(1, 'info_contact', 3, 1698145361, 479, '2023-10-24 07:32:41', '2023-10-24 07:32:41', NULL, 'PO Box 97845 Baker st. 567, Los Angeles,California, US.'),
(2, 'info_contact', 2, 1698145390, 480, '2023-10-24 07:33:10', '2023-10-24 07:33:10', 'Mobile', '(+0123) 465 789'),
(3, 'info_contact', 2, 1698145395, 481, '2023-10-24 07:33:15', '2023-10-24 07:33:15', 'Fax', '(+0123) 465 789'),
(4, 'info_contact', 1, 1698145527, 482, '2023-10-24 07:35:27', '2023-10-24 07:35:27', NULL, 'Info@thimpress.com'),
(5, 'info_contact', 1, 1698145530, 483, '2023-10-24 07:35:30', '2023-10-24 07:35:30', NULL, 'Support247@thimpress.com');

-- --------------------------------------------------------

--
-- Table structure for table `fa_lastest_new`
--

CREATE TABLE `fa_lastest_new` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_lastest_new`
--

INSERT INTO `fa_lastest_new` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `button_title`, `link`) VALUES
(1, NULL, NULL, 1697612937, 370, '2023-10-18 03:38:57', '2023-10-18 03:38:57', 'Lastest New', '<p><span style=\"font-family: \'Open Sans\'; font-size: 15px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</span></p>', 'VIEW MORE', '/courses');

-- --------------------------------------------------------

--
-- Table structure for table `fa_lastest_new_courses_courses`
--

CREATE TABLE `fa_lastest_new_courses_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lastest_new_id` bigint(20) NOT NULL,
  `courses_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_lastest_new_courses_courses`
--

INSERT INTO `fa_lastest_new_courses_courses` (`id`, `lastest_new_id`, `courses_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2023-10-23 05:47:15', '2023-10-23 05:47:15'),
(2, 1, 3, '2023-10-23 05:47:15', '2023-10-23 05:47:15'),
(3, 1, 2, '2023-10-23 05:47:15', '2023-10-23 05:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `fa_latest_blog`
--

CREATE TABLE `fa_latest_blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_latest_blog`
--

INSERT INTO `fa_latest_blog` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1698490574, 1, '2023-10-28 07:26:14', '2023-10-28 07:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `fa_latest_blog_blogs_blogs`
--

CREATE TABLE `fa_latest_blog_blogs_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latest_blog_id` bigint(20) NOT NULL,
  `blogs_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_latest_blog_blogs_blogs`
--

INSERT INTO `fa_latest_blog_blogs_blogs` (`id`, `latest_blog_id`, `blogs_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2023-10-28 10:56:14', '2023-10-28 10:56:14'),
(2, 1, 2, '2023-10-28 10:56:14', '2023-10-28 10:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `fa_menu`
--

CREATE TABLE `fa_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_menu`
--

INSERT INTO `fa_menu` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `link`) VALUES
(1, NULL, NULL, 1697601191, 353, '2023-10-18 00:23:11', '2023-10-18 00:23:11', 'Demos', '/demos'),
(2, NULL, NULL, 1697601349, 354, '2023-10-18 00:25:49', '2023-10-18 00:25:49', 'About', '/about-us'),
(3, NULL, NULL, 1697602767, 355, '2023-10-18 00:49:27', '2023-10-18 00:49:27', 'Pages', '/blog'),
(4, 'menu', 1, 1697602881, 356, '2023-10-18 00:51:21', '2023-10-18 00:51:21', 'Demu Kit Builder', '/kitBuilder'),
(5, 'menu', 3, 1697602912, 357, '2023-10-18 00:51:52', '2023-10-18 00:51:52', 'Blog', '/blog'),
(6, NULL, NULL, 1697603345, 358, '2023-10-18 00:59:05', '2023-10-18 00:59:05', 'Contact', '/contact'),
(7, NULL, NULL, 1697864561, 404, '2023-10-21 01:32:41', '2023-10-21 01:32:41', 'Course', '/courses');

-- --------------------------------------------------------

--
-- Table structure for table `fa_new_subcribe`
--

CREATE TABLE `fa_new_subcribe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `placeholder` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_new_subcribe`
--

INSERT INTO `fa_new_subcribe` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `button_title`, `link`, `placeholder`, `description`) VALUES
(1, NULL, NULL, 1697619969, 388, '2023-10-18 05:36:09', '2023-10-18 05:36:09', 'SUBCRIBE NEW LETTERS', 'SUBCRIBE', '/subcribe', 'Enter email address', 'Enter your email and we’ll send you more information.');

-- --------------------------------------------------------

--
-- Table structure for table `fa_orders`
--

CREATE TABLE `fa_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `course` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_orders`
--

INSERT INTO `fa_orders` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `course`, `user`, `certificate`, `level`) VALUES
(30, NULL, NULL, 1698823216, 1, '2023-11-01 03:50:16', '2023-11-01 03:50:16', '1', '2', NULL, '0'),
(31, NULL, NULL, 1698823534, 1, '2023-11-01 03:55:34', '2023-11-01 03:55:34', '3', '2', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `fa_our_top_course`
--

CREATE TABLE `fa_our_top_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_our_top_course`
--

INSERT INTO `fa_our_top_course` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`, `button_title`, `link`) VALUES
(1, NULL, NULL, 1697611255, 365, '2023-10-18 03:10:55', '2023-10-18 03:10:55', 'Our Top Course', '<p><span style=\"font-family: \'Open Sans\'; font-size: 15px; text-align: center;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit,do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span></p>', 'VIEW ALL COURSES', '/courses');

-- --------------------------------------------------------

--
-- Table structure for table `fa_our_top_course_courses_courses`
--

CREATE TABLE `fa_our_top_course_courses_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `our_top_course_id` bigint(20) NOT NULL,
  `courses_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_our_top_course_courses_courses`
--

INSERT INTO `fa_our_top_course_courses_courses` (`id`, `our_top_course_id`, `courses_id`, `created_at`, `updated_at`) VALUES
(3, 1, 3, '2023-10-23 11:19:01', '2023-10-23 11:19:01'),
(4, 1, 1, '2023-10-23 11:19:01', '2023-10-23 11:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `fa_quiz`
--

CREATE TABLE `fa_quiz` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `question` longtext DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fa_site_introduction`
--

CREATE TABLE `fa_site_introduction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_site_introduction`
--

INSERT INTO `fa_site_introduction` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `image`, `title`, `description`, `button_title`, `link`) VALUES
(1, NULL, NULL, 1697885057, 414, '2023-10-21 07:14:18', '2023-10-21 07:14:18', 'site_introduction/image/1697885058.webp', 'TRUSTED BY OVER 6000+ STUDENTS', 'Join our community of students around the world helping you succeed.', 'GET STARTED', 'start/');

-- --------------------------------------------------------

--
-- Table structure for table `fa_state_users`
--

CREATE TABLE `fa_state_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(255) DEFAULT NULL,
  `film` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fa_statistics`
--

CREATE TABLE `fa_statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_statistics`
--

INSERT INTO `fa_statistics` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `icon`, `title`, `description`, `heading`) VALUES
(1, NULL, NULL, 1697521092, 287, '2023-10-17 02:08:12', '2023-10-17 02:08:12', 'statistics/icon/1698038640.webp', 'Trusted by thousands of Educators in the World', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Adipisicing elit, sed do eiusmod', 'Trusted by thousands');

-- --------------------------------------------------------

--
-- Table structure for table `fa_tags`
--

CREATE TABLE `fa_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_tags`
--

INSERT INTO `fa_tags` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `link`) VALUES
(1, NULL, NULL, 1698470297, 486, '2023-10-28 01:48:17', '2023-10-28 01:48:17', 'learnpress', 'tag/learnpress'),
(2, NULL, NULL, 1698470307, 487, '2023-10-28 01:48:27', '2023-10-28 01:48:27', 'thimpress', 'tag/thimpress');

-- --------------------------------------------------------

--
-- Table structure for table `fa_talk`
--

CREATE TABLE `fa_talk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `twitter_account` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_talk`
--

INSERT INTO `fa_talk` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `twitter_account`, `email`, `phone_number`, `button_title`, `button_link`) VALUES
(2, NULL, NULL, 1697971346, 435, '2023-10-22 07:12:26', '2023-10-22 07:12:26', 'Contact Twitter', 'info@thess.com', '+(0123) 456 789', 'LETS TALK', '/talk');

-- --------------------------------------------------------

--
-- Table structure for table `fa_teacher`
--

CREATE TABLE `fa_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `introduction` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_teacher`
--

INSERT INTO `fa_teacher` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `name`, `education`, `image`, `introduction`) VALUES
(1, 'courses', 1, 1697698039, 400, '2023-10-19 03:17:19', '2023-10-19 03:17:19', 'Keny White', 'Professor', 'teacher/image/1697698039.PNG', 'Pellentesque venenatis, libero vel euismod lobortis, mi metus luctus augue, eget dapibus elit nisi eu massa. Phasellus sollicitudin nisl posuere nibh ultricies, et fringilla dui gravida. Donec iaculis adipiscing neque, non congue massa euismod quis.'),
(2, 'courses', 2, 1697970200, 432, '2023-10-22 06:53:20', '2023-10-22 06:53:20', 'Dr Eastey', 'Dr', 'teacher/image/1698137674.png', 'Pellentesque venenatis, libero vel euismod lobortis, mi metus luctus augue, eget dapibus elit nisi eu massa. Phasellus sollicitudin nisl posuere nibh ultricies, et fringilla dui gravida. Donec iaculis adipiscing neque, non congue massa euismod quis.');

-- --------------------------------------------------------

--
-- Table structure for table `fa_test4`
--

CREATE TABLE `fa_test4` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fa_test7`
--

CREATE TABLE `fa_test7` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fa_test9`
--

CREATE TABLE `fa_test9` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fa_test10`
--

CREATE TABLE `fa_test10` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fa_test11`
--

CREATE TABLE `fa_test11` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fa_top_categories`
--

CREATE TABLE `fa_top_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_top_categories`
--

INSERT INTO `fa_top_categories` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(1, NULL, NULL, 1697609879, 362, '2023-10-18 02:47:59', '2023-10-18 02:47:59', 'Top Categories', '<p><span style=\"font-family: \'Open Sans\'; font-size: 15px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `fa_top_categories_course_category_course_categories`
--

CREATE TABLE `fa_top_categories_course_category_course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `top_categories_id` bigint(20) NOT NULL,
  `course_categories_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_top_categories_course_category_course_categories`
--

INSERT INTO `fa_top_categories_course_category_course_categories` (`id`, `top_categories_id`, `course_categories_id`, `created_at`, `updated_at`) VALUES
(4, 1, 2, '2023-10-28 07:48:58', '2023-10-28 07:48:58'),
(5, 1, 1, '2023-10-28 07:48:58', '2023-10-28 07:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `fa_users`
--

CREATE TABLE `fa_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_users`
--

INSERT INTO `fa_users` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `username`, `email`) VALUES
(2, NULL, NULL, 1698648755, 1, '2023-10-30 03:22:35', '2023-10-30 03:22:35', 'maryam azizian', 'mazizian02@gmail.com'),
(3, NULL, NULL, 1698732367, 1, '2023-10-31 02:36:07', '2023-10-31 02:36:07', 'maryam', 'mazizian03@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `fa_welcome`
--

CREATE TABLE `fa_welcome` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fa_welcome`
--

INSERT INTO `fa_welcome` (`id`, `parent_slug`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`, `image`, `heading`, `title`, `description`, `button_title`, `link`) VALUES
(1, NULL, NULL, 1697609111, 359, '2023-10-18 02:35:11', '2023-10-18 02:35:11', 'welcome/image/1697609111.PNG', 'welcome to', 'CourseBuider Kit', '<p><span style=\"font-family: \'Open Sans\'; font-size: 15px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. Adipisicing elit, sed do eiusmod tempor incididunt.</span></p>', 'View All', '/courseBuider');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(11) NOT NULL,
  `category_slug` varchar(45) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `validation` varchar(255) DEFAULT NULL,
  `panel_show` tinyint(1) NOT NULL DEFAULT 1,
  `excel_show` tinyint(1) NOT NULL DEFAULT 1,
  `options_cat_slug` varchar(45) DEFAULT NULL,
  `options_str_sample` varchar(255) DEFAULT NULL,
  `file_private` tinyint(1) DEFAULT NULL,
  `sort` int(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `category_slug`, `title`, `name`, `type`, `validation`, `panel_show`, `excel_show`, `options_cat_slug`, `options_str_sample`, `file_private`, `sort`, `created_at`, `updated_at`) VALUES
(120, 'about_service', 'Icon', 'icon', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697454270, '2023-10-16 07:34:30', '2023-10-16 07:34:30'),
(121, 'about_service', 'title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697454287, '2023-10-16 07:34:47', '2023-10-16 07:34:47'),
(122, 'about_service', 'description', 'description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697454300, '2023-10-16 07:35:00', '2023-10-16 07:35:00'),
(123, 'biography', 'Image', 'image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697454492, '2023-10-16 07:38:12', '2023-10-16 07:38:12'),
(124, 'biography', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697454526, '2023-10-16 07:38:46', '2023-10-22 03:43:03'),
(129, 'features', 'title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697456541, '2023-10-16 08:12:21', '2023-10-16 08:12:21'),
(130, 'features', 'description', 'description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697456550, '2023-10-16 08:12:30', '2023-10-16 08:12:30'),
(134, 'statistics', 'Icon', 'icon', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697456832, '2023-10-16 08:17:12', '2023-10-16 08:17:12'),
(135, 'statistics', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697456841, '2023-10-16 08:17:21', '2023-10-18 03:04:34'),
(136, 'statistics', 'Description', 'description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697456849, '2023-10-16 08:17:29', '2023-10-18 03:04:23'),
(138, 'feedback', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697457708, '2023-10-16 08:31:48', '2023-10-18 03:25:18'),
(141, 'brands', 'image', 'image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697523945, '2023-10-17 02:55:47', '2023-10-17 02:55:47'),
(152, 'menu', 'Title', 'title', 'text', 'required', 1, 1, NULL, NULL, NULL, 1697601005, '2023-10-18 00:20:05', '2023-10-23 02:37:49'),
(153, 'menu', 'Link', 'link', 'url', 'required', 1, 1, NULL, NULL, NULL, 1697601024, '2023-10-18 00:20:25', '2023-10-23 02:38:09'),
(154, 'general_header', 'Logo', 'logo', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697607171, '2023-10-18 02:02:51', '2023-10-18 02:02:51'),
(155, 'general_header', 'Buy button title', 'button_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697607519, '2023-10-18 02:08:39', '2023-10-30 02:49:14'),
(156, 'general_header', 'Buy Link button', 'link_button', 'url', NULL, 1, 1, NULL, NULL, NULL, 1697607563, '2023-10-18 02:09:23', '2023-10-30 02:49:34'),
(157, 'general_site', 'Background', 'background', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697608111, '2023-10-18 02:18:31', '2023-10-18 02:18:31'),
(158, 'general_site', 'Title search button', 'title_search', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697608179, '2023-10-18 02:19:39', '2023-10-18 02:19:39'),
(159, 'general_site', 'Link  button search', 'link_search', 'url', NULL, 1, 1, NULL, NULL, NULL, 1697608228, '2023-10-18 02:20:28', '2023-10-18 02:20:28'),
(160, 'general_site', 'Heading', 'heading', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697608565, '2023-10-18 02:26:05', '2023-10-18 02:26:05'),
(161, 'general_site', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697608585, '2023-10-18 02:26:25', '2023-10-18 02:26:25'),
(162, 'welcome', 'Image', 'image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697608975, '2023-10-18 02:27:24', '2023-10-18 02:33:27'),
(163, 'welcome', 'Heading', 'heading', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697608947, '2023-10-18 02:27:40', '2023-10-18 02:33:27'),
(164, 'welcome', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697608695, '2023-10-18 02:27:53', '2023-10-18 02:33:24'),
(165, 'welcome', 'Description', 'description', 'html', NULL, 1, 1, NULL, NULL, NULL, 1697608673, '2023-10-18 02:28:15', '2023-10-18 02:33:30'),
(166, 'welcome', 'Button title', 'button_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697608660, '2023-10-18 02:32:27', '2023-10-18 02:33:33'),
(167, 'welcome', 'Link button', 'link', 'url', NULL, 1, 1, NULL, NULL, NULL, 1697608644, '2023-10-18 02:32:55', '2023-10-18 02:33:33'),
(168, 'top_categories', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697609453, '2023-10-18 02:40:53', '2023-10-18 02:40:53'),
(169, 'top_categories', 'Description', 'description', 'html', NULL, 1, 1, NULL, NULL, NULL, 1697609471, '2023-10-18 02:41:11', '2023-10-18 02:41:11'),
(173, 'statistics', 'Heading', 'heading', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697610892, '2023-10-18 03:04:52', '2023-10-18 03:04:52'),
(177, 'our_top_course', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697611179, '2023-10-18 03:09:39', '2023-10-18 03:09:39'),
(178, 'our_top_course', 'Description', 'description', 'html', NULL, 1, 1, NULL, NULL, NULL, 1697611193, '2023-10-18 03:09:53', '2023-10-18 03:09:53'),
(179, 'our_top_course', 'Button title', 'button_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697611212, '2023-10-18 03:10:12', '2023-10-18 03:10:12'),
(181, 'create_account', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697611556, '2023-10-18 03:15:57', '2023-10-18 03:15:57'),
(182, 'create_account', 'Descritpion', 'description', 'html', NULL, 1, 1, NULL, NULL, NULL, 1697611578, '2023-10-18 03:16:18', '2023-10-18 03:16:18'),
(183, 'create_account', 'Button title', 'button_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697611658, '2023-10-18 03:17:38', '2023-10-18 03:17:38'),
(184, 'create_account', 'Button link', 'link', 'url', NULL, 1, 1, NULL, NULL, NULL, 1697611673, '2023-10-18 03:17:53', '2023-10-18 03:17:53'),
(185, 'create_account', 'Image', 'image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697611805, '2023-10-18 03:20:05', '2023-10-18 03:20:05'),
(186, 'feedback', 'Description', 'description', 'html', NULL, 1, 1, NULL, NULL, NULL, 1697612347, '2023-10-18 03:29:07', '2023-10-18 03:29:07'),
(187, 'lastest_new', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697612828, '2023-10-18 03:37:08', '2023-10-18 03:37:08'),
(188, 'lastest_new', 'Description', 'description', 'html', NULL, 1, 1, NULL, NULL, NULL, 1697612843, '2023-10-18 03:37:23', '2023-10-18 03:37:23'),
(189, 'lastest_new', 'button title', 'button_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697612872, '2023-10-18 03:37:52', '2023-10-18 03:37:52'),
(190, 'lastest_new', 'Button link', 'link', 'url', NULL, 1, 1, NULL, NULL, NULL, 1697612888, '2023-10-18 03:38:08', '2023-10-18 03:38:08'),
(191, 'footer_categories', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697615543, '2023-10-18 04:22:23', '2023-10-18 04:22:23'),
(192, 'footer_categories', 'Link', 'link', 'url', NULL, 1, 1, NULL, NULL, NULL, 1697615601, '2023-10-18 04:23:21', '2023-10-18 04:23:21'),
(197, 'new_subcribe', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697619710, '2023-10-18 05:31:50', '2023-10-18 05:31:50'),
(199, 'new_subcribe', 'Button title', 'button_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697619763, '2023-10-18 05:32:43', '2023-10-18 05:32:43'),
(200, 'new_subcribe', 'Button link', 'link', 'url', NULL, 1, 1, NULL, NULL, NULL, 1697619782, '2023-10-18 05:33:02', '2023-10-18 05:33:02'),
(201, 'new_subcribe', 'Placeholder', 'placeholder', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697619851, '2023-10-18 05:34:11', '2023-10-18 05:34:11'),
(203, 'new_subcribe', 'Description', 'description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697621317, '2023-10-18 05:58:37', '2023-10-18 05:58:37'),
(204, 'teacher', 'name', 'name', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697629219, '2023-10-18 08:10:19', '2023-10-18 08:10:19'),
(205, 'teacher', 'Level of education', 'education', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697629292, '2023-10-18 08:11:32', '2023-10-18 08:11:32'),
(206, 'film_category', 'Title', 'title', 'text', 'required', 1, 1, NULL, NULL, NULL, 1697691908, '2023-10-19 01:35:08', '2023-10-21 08:40:13'),
(207, 'film', 'Video', 'video', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697692608, '2023-10-19 01:46:16', '2023-10-19 01:46:53'),
(208, 'film', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697692576, '2023-10-19 01:46:48', '2023-10-19 01:46:53'),
(209, 'quiz', 'Question', 'question', 'html', NULL, 1, 1, NULL, NULL, NULL, 1697693098, '2023-10-19 01:52:05', '2023-10-19 01:55:03'),
(211, 'quiz', 'Score', 'score', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697692925, '2023-10-19 01:54:58', '2023-10-19 01:55:03'),
(216, 'course_categories', 'Title', 'title', 'text', 'required', 1, 1, NULL, NULL, NULL, 1697694696, '2023-10-19 02:21:36', '2023-10-21 05:40:32'),
(217, 'course_categories', 'Description', 'description', 'html', NULL, 1, 1, NULL, NULL, NULL, 1697694708, '2023-10-19 02:21:48', '2023-10-19 02:21:48'),
(218, 'course_categories', 'Image', 'image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697694767, '2023-10-19 02:22:47', '2023-10-19 02:22:47'),
(219, 'top_categories', 'Course category', 'course_category', 'multiselect', NULL, 1, 1, 'course_categories', '{#title#}', NULL, 1697695157, '2023-10-19 02:29:17', '2023-10-19 02:29:17'),
(220, 'courses', 'Title', 'title', 'text', 'required', 1, 1, NULL, NULL, NULL, 1698041042, '2023-10-19 02:40:11', '2023-10-23 02:35:56'),
(222, 'courses', 'Price', 'price', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697695838, '2023-10-19 02:40:38', '2023-10-19 02:40:38'),
(223, 'courses', 'Type', 'type', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697696919, '2023-10-19 02:58:39', '2023-10-19 02:58:39'),
(224, 'course_features', 'Duration', 'duration', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697697143, '2023-10-19 03:02:23', '2023-10-19 03:02:23'),
(225, 'course_features', 'Language', 'language', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697697149, '2023-10-19 03:02:29', '2023-10-19 03:02:29'),
(227, 'course_features', 'Assessments', 'assessments', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697697376, '2023-10-19 03:06:16', '2023-10-19 03:06:16'),
(228, 'course_features', 'Lectures', 'lectures', 'number', NULL, 1, 1, NULL, NULL, NULL, 1697697413, '2023-10-19 03:06:53', '2023-10-19 03:06:53'),
(229, 'course_features', 'Skill level', 'skill_level', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697697530, '2023-10-19 03:08:50', '2023-10-19 03:08:50'),
(231, 'teacher', 'Image', 'image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697697926, '2023-10-19 03:15:26', '2023-10-19 03:15:26'),
(232, 'our_top_course', 'Courses', 'courses', 'multiselect', NULL, 1, 1, 'courses', '{#title#} ({#price#})', NULL, 1697698624, '2023-10-19 03:27:04', '2023-10-19 03:27:04'),
(233, 'courses', 'Image', 'image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697698675, '2023-10-19 03:27:55', '2023-10-19 03:27:55'),
(234, 'our_top_course', 'Link', 'link', 'url', NULL, 1, 1, NULL, NULL, NULL, 1697699333, '2023-10-19 03:38:53', '2023-10-19 03:38:53'),
(243, 'site_introduction', 'Image', 'image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697884815, '2023-10-21 07:10:15', '2023-10-21 07:10:15'),
(244, 'site_introduction', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697884827, '2023-10-21 07:10:27', '2023-10-21 07:10:27'),
(245, 'site_introduction', 'Description', 'description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697884854, '2023-10-21 07:10:54', '2023-10-21 07:10:54'),
(246, 'site_introduction', 'Title button', 'button_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697885124, '2023-10-21 07:15:24', '2023-10-21 07:15:24'),
(247, 'site_introduction', 'Link', 'link', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697885139, '2023-10-21 07:15:39', '2023-10-21 07:15:39'),
(248, 'courses', 'Link', 'link', 'route', 'required', 1, 1, NULL, NULL, NULL, 1697695811, '2023-10-21 07:24:23', '2023-10-23 02:36:25'),
(249, 'courses', 'Short description', 'short_description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697885662, '2023-10-21 08:10:25', '2023-10-23 02:27:08'),
(251, 'general_about', 'Background about', 'background_about', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697958496, '2023-10-22 03:38:16', '2023-10-22 03:38:16'),
(252, 'general_about', 'Background info', 'background_info', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1697958575, '2023-10-22 03:39:35', '2023-10-22 03:39:35'),
(253, 'general_about', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697958609, '2023-10-22 03:40:09', '2023-10-22 03:40:09'),
(254, 'general_about', 'Description', 'description', 'html', NULL, 1, 1, NULL, NULL, NULL, 1697958623, '2023-10-22 03:40:23', '2023-10-22 03:40:23'),
(255, 'biography', 'Heading', 'heading', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697958800, '2023-10-22 03:43:20', '2023-10-22 03:43:20'),
(256, 'biography', 'Description', 'description', 'html', NULL, 1, 1, NULL, NULL, NULL, 1697959070, '2023-10-22 03:47:50', '2023-10-22 03:47:50'),
(257, 'general_about', 'Service title', 'service_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697960204, '2023-10-22 04:06:44', '2023-10-22 04:06:44'),
(258, 'general_about', 'Service description', 'service_description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697960237, '2023-10-22 04:07:17', '2023-10-22 04:07:17'),
(259, 'teacher', 'Introduction', 'introduction', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697970012, '2023-10-22 06:50:12', '2023-10-22 06:50:12'),
(261, 'talk', 'Twitter account', 'twitter_account', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697970944, '2023-10-22 07:05:44', '2023-10-22 07:05:44'),
(262, 'talk', 'Email', 'email', 'text', 'email', 1, 1, NULL, NULL, NULL, 1697970969, '2023-10-22 07:06:09', '2023-10-23 02:38:52'),
(263, 'talk', 'Phone number', 'phone_number', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697971004, '2023-10-22 07:06:44', '2023-10-22 07:06:44'),
(264, 'talk', 'Button title', 'button_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1697971031, '2023-10-22 07:07:11', '2023-10-22 07:07:11'),
(265, 'talk', 'Button link', 'button_link', 'url', NULL, 1, 1, NULL, NULL, NULL, 1697971053, '2023-10-22 07:07:34', '2023-10-22 07:07:34'),
(266, 'course_categories', 'Link', 'link', 'route', NULL, 1, 1, NULL, NULL, NULL, 1697975738, '2023-10-22 08:25:39', '2023-10-22 08:25:39'),
(267, 'features', 'Font awesome icon', 'icon', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698035807, '2023-10-23 01:06:47', '2023-10-23 01:06:47'),
(268, 'lastest_new', 'Courses', 'courses', 'multiselect', NULL, 1, 1, 'courses', '{#title#} ({#price#})', NULL, 1698040013, '2023-10-23 02:16:53', '2023-10-23 02:16:53'),
(270, 'courses', 'Description', 'description', 'html', 'required', 1, 1, NULL, NULL, NULL, 1698040558, '2023-10-23 02:34:02', '2023-10-23 02:36:46'),
(271, 'film_category', 'Description', 'description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698052197, '2023-10-23 05:39:57', '2023-10-23 05:39:57'),
(272, 'course_categories', 'Color', 'color', 'color', NULL, 1, 1, NULL, NULL, NULL, 1698052774, '2023-10-23 05:49:34', '2023-10-23 05:49:34'),
(276, 'form_countact', 'Name', 'name', 'text', 'required', 1, 1, NULL, NULL, NULL, 1698132731, '2023-10-24 04:02:11', '2023-10-24 04:03:34'),
(277, 'form_countact', 'Email', 'email', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698132748, '2023-10-24 04:02:28', '2023-10-24 04:22:50'),
(278, 'form_countact', 'Subject', 'subject', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698132763, '2023-10-24 04:02:43', '2023-10-24 04:02:43'),
(280, 'form_countact', 'Message', 'message', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698133999, '2023-10-24 04:23:19', '2023-10-24 04:23:19'),
(281, 'form_countact', 'Button title', 'button_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698134031, '2023-10-24 04:23:51', '2023-10-24 04:23:51'),
(282, 'contact_us', 'Name', 'name', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698136263, '2023-10-24 05:01:03', '2023-10-24 05:01:03'),
(283, 'contact_us', 'Email', 'email', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698136273, '2023-10-24 05:01:13', '2023-10-24 05:01:13'),
(284, 'contact_us', 'Subject', 'subject', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698136286, '2023-10-24 05:01:26', '2023-10-24 05:01:26'),
(285, 'contact_us', 'Message', 'message', 'html', NULL, 1, 1, NULL, NULL, NULL, 1698136299, '2023-10-24 05:01:39', '2023-10-24 05:01:39'),
(290, 'general_contact', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698144236, '2023-10-24 07:13:56', '2023-10-24 07:13:56'),
(291, 'general_contact', 'Description', 'description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698144252, '2023-10-24 07:14:12', '2023-10-24 07:14:12'),
(292, 'general_contact', 'Message title', 'message_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698144288, '2023-10-24 07:14:48', '2023-10-24 07:14:48'),
(293, 'general_contact', 'Message description', 'message_description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698144299, '2023-10-24 07:14:59', '2023-10-24 07:14:59'),
(294, 'info_contact', 'Font awesome icon', 'font_awesome', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698145029, '2023-10-24 07:27:09', '2023-10-24 07:27:09'),
(295, 'info_contact', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698145038, '2023-10-24 07:27:18', '2023-10-24 07:27:18'),
(296, 'item_contact', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698145150, '2023-10-24 07:29:10', '2023-10-24 07:29:10'),
(297, 'item_contact', 'Description', 'description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698145163, '2023-10-24 07:29:23', '2023-10-24 07:29:23'),
(298, 'general_contact', 'Image', 'image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1698148689, '2023-10-24 08:28:09', '2023-10-24 08:28:09'),
(299, 'general_blogs', 'Background image', 'background_image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1698468975, '2023-10-28 01:26:15', '2023-10-28 01:26:15'),
(300, 'general_blogs', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698468987, '2023-10-28 01:26:29', '2023-10-28 01:26:29'),
(301, 'general_blogs', 'Description', 'description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698469007, '2023-10-28 01:26:47', '2023-10-28 01:26:47'),
(302, 'tags', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698469778, '2023-10-28 01:39:38', '2023-10-28 01:39:38'),
(303, 'blogs', 'Image', 'image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1698478150, '2023-10-28 01:44:05', '2023-10-29 04:23:00'),
(304, 'blogs', 'Title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698565962, '2023-10-28 01:44:23', '2023-10-29 04:22:50'),
(305, 'blogs', 'Description', 'description', 'html', NULL, 1, 1, NULL, NULL, NULL, 1698479629, '2023-10-28 01:44:50', '2023-10-29 04:22:53'),
(309, 'blogs', 'Link', 'link', 'route', NULL, 1, 1, NULL, NULL, NULL, 1698470090, '2023-10-28 03:59:10', '2023-10-29 04:22:57'),
(310, 'blogs', 'Tags', 'tags', 'multiselect', NULL, 1, 1, 'tags', '{#title#}', NULL, 1698470210, '2023-10-28 04:23:49', '2023-10-29 04:23:10'),
(311, 'latest_blog', 'Blogs', 'blogs', 'multiselect', NULL, 1, 1, 'blogs', '{#title#}', NULL, 1698490436, '2023-10-28 07:23:56', '2023-10-28 07:23:56'),
(313, 'tags', 'Link', 'link', 'route', NULL, 1, 1, NULL, NULL, NULL, 1698491989, '2023-10-28 07:49:49', '2023-10-28 07:49:49'),
(314, 'general_course', 'First title', 'title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698562388, '2023-10-28 08:33:04', '2023-10-29 03:24:19'),
(315, 'general_course', 'First description', 'description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698494614, '2023-10-28 08:33:15', '2023-10-29 03:24:22'),
(316, 'general_course', 'Background image', 'background_image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1698562442, '2023-10-28 08:33:34', '2023-10-29 03:24:09'),
(317, 'general_course', 'Secound title', 'secound_title', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698494595, '2023-10-29 03:23:08', '2023-10-29 03:24:22'),
(318, 'general_course', 'Second description', 'second_description', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698494584, '2023-10-29 03:24:02', '2023-10-29 03:24:16'),
(319, 'blogs', 'Description image', 'description_image', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1698471722, '2023-10-29 04:22:43', '2023-10-29 04:23:10'),
(322, 'general_contact', 'Success message', 'success_message', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698580623, '2023-10-29 08:27:03', '2023-10-29 08:27:03'),
(323, 'general_contact', 'Message failed', 'message_failed', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698580636, '2023-10-29 08:27:16', '2023-10-29 08:27:16'),
(324, 'users', 'Username', 'username', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698646406, '2023-10-30 02:43:26', '2023-10-30 02:43:26'),
(325, 'users', 'E-mail Address', 'email', 'text', 'email', 1, 1, NULL, NULL, NULL, 1698646432, '2023-10-30 02:43:52', '2023-10-30 02:44:16'),
(327, 'general_header', 'Login link', 'login_link', 'url', NULL, 1, 1, NULL, NULL, NULL, 1698646889, '2023-10-30 02:51:29', '2023-10-30 02:51:29'),
(335, 'orders', 'Course', 'course', 'select', NULL, 1, 1, 'courses', '{#title#} ({#price#})', NULL, 1698732018, '2023-10-31 01:38:44', '2023-10-31 02:30:25'),
(338, 'orders', 'User', 'user', 'select', NULL, 1, 1, 'users', '{#username#} ({#email#})', NULL, 1698731188, '2023-10-31 02:30:18', '2023-10-31 02:30:25'),
(341, 'orders', 'Certificate', 'certificate', 'upload', NULL, 1, 1, NULL, NULL, NULL, 1698814526, '2023-10-31 04:15:29', '2023-11-01 01:25:30'),
(342, 'state_users', 'User', 'user', 'select', NULL, 1, 1, 'users', '{#username#}', NULL, 1698752414, '2023-10-31 08:10:14', '2023-10-31 08:10:14'),
(343, 'state_users', 'Film', 'film', 'select', NULL, 1, 1, 'film', '{#title#}', NULL, 1698752441, '2023-10-31 08:10:42', '2023-10-31 08:10:42'),
(344, 'state_users', 'Course', 'course', 'select', NULL, 1, 1, 'courses', '{#title#}', NULL, 1698753542, '2023-10-31 08:29:02', '2023-10-31 08:29:02'),
(345, 'orders', 'Level', 'level', 'text', NULL, 1, 1, NULL, NULL, NULL, 1698738329, '2023-11-01 01:25:26', '2023-11-01 01:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `mime` varchar(45) NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `category_id`, `title`, `path`, `mime`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 'قهوه', 'product/1653503246.png', 'png', '18949', '2022-05-25 18:27:26', '2022-05-25 18:27:26'),
(2, 1, 'قهوه2', 'product/21653503282.png', 'png', '12128', '2022-05-25 18:28:03', '2022-05-25 18:28:03'),
(3, 1, 'قهوه 3', 'product/31653503553.png', 'png', '19080', '2022-05-25 18:32:33', '2022-05-25 18:32:33'),
(4, 1, 'قهوه 43', 'product/431653504608.png', 'png', '17719', '2022-05-25 18:50:08', '2022-05-25 18:50:08'),
(5, 1, 'قهوه 5', 'product/51653504619.png', 'png', '14136', '2022-05-25 18:50:19', '2022-05-25 18:50:19'),
(6, 1, 'قهوه 6', 'product/61653504625.png', 'png', '16452', '2022-05-25 18:50:25', '2022-05-25 18:50:25'),
(7, 1, 'آیکون', 'product/1659191455.png', 'png', '23642', '2022-07-30 14:31:00', '2022-07-30 14:31:00'),
(8, 1, 'آیکون2', 'product/21659191468.png', 'png', '26774', '2022-07-30 14:31:08', '2022-07-30 14:31:08'),
(9, 1, 'll', 'product/ll1664001298.jpg', 'jpg', '185524', '2022-09-24 06:34:58', '2022-09-24 06:34:58'),
(10, 1, 'drfgh', 'product/drfgh1696494401.jpg', 'jpg', '7324', '2023-10-05 08:26:41', '2023-10-05 08:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `file_categories`
--

CREATE TABLE `file_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `file_categories`
--

INSERT INTO `file_categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'product', '2022-05-25 18:27:12', '2022-09-11 13:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `direction` varchar(5) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `abbr`, `direction`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'فارسی', 'fa', 'rtl', 1, '2022-05-25 16:22:07', '2023-11-06 08:00:27'),
(2, 'انگلیسی', 'en', 'ltr', 0, '2022-10-25 12:30:08', '2023-11-06 08:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` longtext DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `sort` int(45) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record_langs`
--

CREATE TABLE `record_langs` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `lang_abbr` varchar(5) NOT NULL,
  `value` longtext DEFAULT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src_cat_slug` varchar(45) NOT NULL,
  `sub_cat_slug` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `title`, `src_cat_slug`, `sub_cat_slug`, `created_at`, `updated_at`) VALUES
(15, 'Submenu', 'menu', 'menu', '2023-10-18 00:24:36', '2023-10-18 00:24:36'),
(17, 'Sub categories', 'footer_categories', 'footer_categories', '2023-10-18 04:28:19', '2023-10-18 04:28:19'),
(18, 'Films', 'film_category', 'film', '2023-10-19 01:45:21', '2023-10-19 01:45:21'),
(19, 'Quiz', 'film_category', 'quiz', '2023-10-19 01:50:43', '2023-10-19 01:50:43'),
(20, 'Courses', 'course_categories', 'courses', '2023-10-19 02:39:38', '2023-10-19 02:39:38'),
(21, 'Film categories', 'courses', 'film_category', '2023-10-19 02:56:23', '2023-10-19 02:56:23'),
(22, 'Course features', 'courses', 'course_features', '2023-10-19 03:01:09', '2023-10-19 03:01:09'),
(23, 'Teacher', 'courses', 'teacher', '2023-10-19 03:14:54', '2023-10-19 03:14:54'),
(24, 'Items', 'info_contact', 'item_contact', '2023-10-24 07:30:26', '2023-10-24 07:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `relation_conditions`
--

CREATE TABLE `relation_conditions` (
  `id` int(11) NOT NULL,
  `relation_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `lang_abbr` varchar(2) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `field_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `type`, `lang_abbr`, `parent_id`, `category_id`, `field_id`, `field_value`, `created_at`, `updated_at`) VALUES
(1, 1, 'delete', NULL, NULL, 13, 29, '6327f6add5916', '2022-10-18 09:24:19', '2022-10-18 09:24:19'),
(2, 1, 'delete', NULL, 0, 13, 29, '628e76487f70f', '2022-10-19 14:14:26', '2022-10-19 14:14:26'),
(3, 1, 'delete', NULL, 0, 9, 22, 'عکس', '2022-10-19 14:14:26', '2022-10-19 14:14:26'),
(4, 1, 'store', 'fa', NULL, 13, 29, '628e7a77e2f65', '2022-10-19 14:15:16', '2022-10-19 14:15:16'),
(5, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:31:24', '2022-11-06 12:31:24'),
(6, 1, 'store', NULL, NULL, 23, 37, NULL, '2022-11-06 12:33:50', '2022-11-06 12:33:50'),
(7, 1, 'store', NULL, NULL, 23, 37, NULL, '2022-11-06 12:34:08', '2022-11-06 12:34:08'),
(8, 1, 'store', NULL, NULL, 23, 37, NULL, '2022-11-06 12:35:00', '2022-11-06 12:35:00'),
(9, 1, 'store', NULL, NULL, 23, 37, NULL, '2022-11-06 12:35:04', '2022-11-06 12:35:04'),
(10, 1, 'store', NULL, NULL, 23, 37, NULL, '2022-11-06 12:36:38', '2022-11-06 12:36:38'),
(11, 1, 'store', NULL, NULL, 23, 37, NULL, '2022-11-06 12:37:08', '2022-11-06 12:37:08'),
(12, 1, 'store', NULL, NULL, 23, 37, NULL, '2022-11-06 12:38:17', '2022-11-06 12:38:17'),
(13, 1, 'store', NULL, NULL, 23, 37, NULL, '2022-11-06 12:39:39', '2022-11-06 12:39:39'),
(14, 1, 'store', NULL, NULL, 23, 37, NULL, '2022-11-06 12:40:12', '2022-11-06 12:40:12'),
(15, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:42:17', '2022-11-06 12:42:17'),
(16, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:42:51', '2022-11-06 12:42:51'),
(17, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:43:04', '2022-11-06 12:43:04'),
(18, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:44:06', '2022-11-06 12:44:06'),
(19, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:44:16', '2022-11-06 12:44:16'),
(20, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:44:25', '2022-11-06 12:44:25'),
(21, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:45:48', '2022-11-06 12:45:48'),
(22, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:46:02', '2022-11-06 12:46:02'),
(23, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:46:24', '2022-11-06 12:46:24'),
(24, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:46:43', '2022-11-06 12:46:43'),
(25, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:46:53', '2022-11-06 12:46:53'),
(26, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:48:00', '2022-11-06 12:48:00'),
(27, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:48:22', '2022-11-06 12:48:22'),
(28, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:48:51', '2022-11-06 12:48:51'),
(29, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:49:03', '2022-11-06 12:49:03'),
(30, 1, 'store', NULL, NULL, 23, 37, 'a', '2022-11-06 12:49:56', '2022-11-06 12:49:56'),
(31, 1, 'store', NULL, NULL, 27, 56, 'salam', '2022-11-10 07:49:18', '2022-11-10 07:49:18'),
(32, 1, 'store', NULL, NULL, 27, 56, 'salam', '2022-11-10 07:50:08', '2022-11-10 07:50:08'),
(33, 1, 'store', NULL, NULL, 27, 56, 'dsf', '2022-11-10 07:50:18', '2022-11-10 07:50:18'),
(34, 1, 'store', NULL, NULL, 27, 56, 'tgfhdfgh', '2022-11-10 07:53:02', '2022-11-10 07:53:02'),
(35, 1, 'update', 'fa', 31, 27, 56, '123salam', '2022-11-10 08:03:13', '2022-11-10 08:03:13'),
(36, 1, 'update', 'fa', 31, 27, 56, '123salam', '2022-11-10 08:04:20', '2022-11-10 08:04:20'),
(37, 1, 'update', 'fa', 31, 27, 56, '123salam', '2022-11-10 08:04:45', '2022-11-10 08:04:45'),
(38, 1, 'update', 'fa', 31, 27, 56, '123salam', '2022-11-10 08:06:36', '2022-11-10 08:06:36'),
(39, 1, 'store', NULL, NULL, 29, 58, 'asda', '2022-11-10 09:28:39', '2022-11-10 09:28:39'),
(40, 1, 'store', NULL, NULL, 29, 58, 'asdasd', '2022-11-10 09:28:41', '2022-11-10 09:28:41'),
(41, 1, 'update', 'fa', 40, 29, 58, 'hbjmkhj', '2022-11-10 09:28:51', '2022-11-10 09:28:51'),
(42, 1, 'store', NULL, NULL, 29, 58, 'aDSA', '2022-11-10 09:30:50', '2022-11-10 09:30:50'),
(43, 1, 'update', 'fa', 42, 29, 58, 'aDSA', '2022-11-10 09:32:39', '2022-11-10 09:32:39'),
(44, 1, 'store', NULL, NULL, 29, 58, 'FF', '2022-11-10 09:32:53', '2022-11-10 09:32:53'),
(45, 1, 'store', NULL, NULL, 29, 58, 'DSFS', '2022-11-10 09:34:14', '2022-11-10 09:34:14'),
(46, 1, 'update', 'fa', 44, 29, 58, 'FF', '2022-11-10 09:34:28', '2022-11-10 09:34:28'),
(47, 1, 'update', 'fa', 40, 29, 58, 'hbjmkhj', '2022-11-10 11:02:28', '2022-11-10 11:02:28'),
(48, 1, 'store', NULL, NULL, 29, 58, 'asd', '2022-11-10 11:04:20', '2022-11-10 11:04:20'),
(49, 1, 'update', 'fa', 48, 29, 58, 'asd', '2022-11-10 11:10:36', '2022-11-10 11:10:36'),
(50, 1, 'update', 'fa', 48, 29, 58, 'asd', '2022-11-10 11:18:59', '2022-11-10 11:18:59'),
(51, 1, 'store', NULL, NULL, 29, 58, 'aa', '2022-11-10 11:19:10', '2022-11-10 11:19:10'),
(52, 1, 'update', 'fa', 51, 29, 58, 'aa', '2022-11-10 11:20:48', '2022-11-10 11:20:48'),
(53, 1, 'store', NULL, NULL, 29, 58, NULL, '2022-11-10 11:24:14', '2022-11-10 11:24:14'),
(54, 1, 'update', 'fa', 53, 29, 58, NULL, '2022-11-10 11:25:37', '2022-11-10 11:25:37'),
(55, 1, 'update', 'fa', 53, 29, 58, NULL, '2022-11-10 11:26:30', '2022-11-10 11:26:30'),
(56, 1, 'update', 'en', 53, 29, 58, NULL, '2022-11-10 11:27:01', '2022-11-10 11:27:01'),
(57, 1, 'store', NULL, NULL, 29, 58, 'aaddddd', '2022-11-10 11:34:33', '2022-11-10 11:34:33'),
(58, 1, 'update', 'en', 57, 29, 58, 'aaddddd', '2022-11-10 11:56:32', '2022-11-10 11:56:32'),
(59, 1, 'update', 'en', 51, 29, 58, 'aa', '2022-11-10 11:56:40', '2022-11-10 11:56:40'),
(60, 1, 'store', NULL, NULL, 29, 58, NULL, '2022-11-10 11:56:52', '2022-11-10 11:56:52'),
(61, 1, 'update', 'en', 60, 29, 58, NULL, '2022-11-10 11:57:42', '2022-11-10 11:57:42'),
(62, 1, 'store', NULL, NULL, 29, 58, NULL, '2022-11-10 11:57:58', '2022-11-10 11:57:58'),
(63, 1, 'update', 'en', 60, 29, 58, NULL, '2022-11-10 11:59:59', '2022-11-10 11:59:59'),
(64, 1, 'update', 'en', 60, 29, 58, NULL, '2022-11-10 12:02:07', '2022-11-10 12:02:07'),
(65, 1, 'update', 'en', 60, 29, 58, NULL, '2022-11-10 12:02:20', '2022-11-10 12:02:20'),
(66, 1, 'store', NULL, NULL, 30, 69, 'asdads', '2022-11-10 12:18:24', '2022-11-10 12:18:24'),
(67, 1, 'store', NULL, NULL, 30, 69, 'fhdjgjgfj', '2022-11-10 12:18:26', '2022-11-10 12:18:26'),
(68, 1, 'store', NULL, NULL, 30, 69, 'klhjlhjl', '2022-11-10 12:18:28', '2022-11-10 12:18:28'),
(69, 1, 'store', NULL, NULL, 29, 58, NULL, '2022-11-10 12:28:02', '2022-11-10 12:28:02'),
(70, 1, 'update', 'en', 62, 29, 58, NULL, '2022-11-10 12:28:16', '2022-11-10 12:28:16'),
(71, 1, 'update', 'fa', 60, 29, 58, NULL, '2022-11-13 05:40:38', '2022-11-13 05:40:38'),
(74, 1, 'store', NULL, NULL, 29, 58, NULL, '2022-11-13 05:44:33', '2022-11-13 05:44:33'),
(75, 1, 'store', NULL, NULL, 29, 58, NULL, '2022-11-13 05:45:00', '2022-11-13 05:45:00'),
(76, 1, 'store', NULL, NULL, 29, 58, NULL, '2022-11-13 05:46:03', '2022-11-13 05:46:03'),
(77, 1, 'store', NULL, NULL, 29, 58, NULL, '2022-11-13 05:47:20', '2022-11-13 05:47:20'),
(79, 1, 'store', NULL, NULL, 34, 72, 'asd', '2022-11-13 05:58:35', '2022-11-13 05:58:35'),
(80, 1, 'store', NULL, NULL, 34, 72, 'das', '2022-11-13 05:58:43', '2022-11-13 05:58:43'),
(84, 1, 'store', NULL, NULL, 33, 73, '2', '2022-11-13 06:02:54', '2022-11-13 06:02:54'),
(85, 1, 'store', NULL, NULL, 33, 73, '2', '2022-11-13 06:04:05', '2022-11-13 06:04:05'),
(86, 1, 'store', NULL, NULL, 33, 73, '2', '2022-11-13 06:04:47', '2022-11-13 06:04:47'),
(87, 1, 'store', NULL, NULL, 36, 75, 'asda', '2022-11-13 06:13:58', '2022-11-13 06:13:58'),
(88, 1, 'store', NULL, NULL, 36, 75, 'dfh', '2022-11-13 06:13:59', '2022-11-13 06:13:59'),
(89, 1, 'store', NULL, NULL, 35, 76, '2', '2022-11-13 06:14:08', '2022-11-13 06:14:08'),
(90, 1, 'store', NULL, NULL, 35, 76, '1', '2022-11-13 06:15:10', '2022-11-13 06:15:10'),
(91, 1, 'store', NULL, NULL, 35, 76, '2', '2022-11-13 06:19:06', '2022-11-13 06:19:06'),
(92, 1, 'store', NULL, NULL, 35, 76, '2', '2022-11-13 06:25:24', '2022-11-13 06:25:24'),
(93, 1, 'store', NULL, NULL, 35, 76, '2', '2022-11-15 05:09:01', '2022-11-15 05:09:01'),
(94, 1, 'update', 'fa', 93, 35, 76, '2', '2022-11-15 05:09:30', '2022-11-15 05:09:30'),
(95, 1, 'update', 'fa', 93, 35, 76, '2', '2022-11-15 05:13:37', '2022-11-15 05:13:37'),
(96, 1, 'update', 'fa', 93, 35, 76, '2', '2022-11-15 05:14:33', '2022-11-15 05:14:33'),
(97, 1, 'update', 'fa', 93, 35, 76, '2', '2022-11-15 05:15:13', '2022-11-15 05:15:13'),
(98, 1, 'update', 'fa', 93, 35, 76, '2', '2022-11-15 05:16:36', '2022-11-15 05:16:36'),
(99, 1, 'update', 'fa', 93, 35, 76, '1', '2022-11-15 05:16:59', '2022-11-15 05:16:59'),
(100, 1, 'update', 'fa', 93, 35, 76, '1', '2022-11-15 05:17:10', '2022-11-15 05:17:10'),
(101, 1, 'update', 'fa', 93, 35, 76, '1', '2022-11-15 05:18:36', '2022-11-15 05:18:36'),
(102, 1, 'update', 'fa', 93, 35, 76, '1', '2022-11-15 05:19:57', '2022-11-15 05:19:57'),
(103, 1, 'update', 'fa', 93, 35, 76, '1', '2022-11-15 05:20:18', '2022-11-15 05:20:18'),
(104, 1, 'update', 'fa', 93, 35, 76, '1', '2022-11-15 05:21:25', '2022-11-15 05:21:25'),
(105, 1, 'update', 'fa', 93, 35, 76, '1', '2022-11-15 05:22:09', '2022-11-15 05:22:09'),
(106, 1, 'update', 'fa', 93, 35, 76, '1', '2022-11-15 05:23:34', '2022-11-15 05:23:34'),
(107, 1, 'update', 'fa', 93, 35, 76, '1', '2022-11-15 05:25:23', '2022-11-15 05:25:23'),
(108, 1, 'store', NULL, NULL, 35, 76, '2', '2022-11-15 05:38:52', '2022-11-15 05:38:52'),
(109, 1, 'update', 'en', 108, 35, 76, '2', '2022-11-15 05:40:27', '2022-11-15 05:40:27'),
(110, 1, 'store', NULL, NULL, 39, 78, 'asdasdf', '2022-11-24 08:44:59', '2022-11-24 08:44:59'),
(111, 1, 'update', 'en', 110, 39, 78, 'aa', '2022-11-24 08:46:21', '2022-11-24 08:46:21'),
(112, 1, 'update', 'en', 110, 39, 78, 'aa', '2022-11-24 08:47:44', '2022-11-24 08:47:44'),
(113, 1, 'store', NULL, NULL, 39, 78, 'aaaa', '2022-11-24 09:02:50', '2022-11-24 09:02:50'),
(114, 1, 'update', 'fa', 113, 39, 78, 'ااااا', '2022-11-24 09:03:40', '2022-11-24 09:03:40'),
(115, 1, 'store', NULL, NULL, 39, 78, 'dhffhdfdhfdh', '2022-11-24 09:14:28', '2022-11-24 09:14:28'),
(116, 1, 'store', NULL, NULL, 38, 88, '2', '2022-11-27 05:32:21', '2022-11-27 05:32:21'),
(117, 1, 'store', NULL, NULL, 38, 88, '3', '2022-11-27 05:33:05', '2022-11-27 05:33:05'),
(118, 1, 'store', NULL, NULL, 38, 88, '3', '2022-11-27 05:33:25', '2022-11-27 05:33:25'),
(119, 1, 'store', NULL, NULL, 38, 88, '2', '2022-11-27 05:33:48', '2022-11-27 05:33:48'),
(120, 1, 'store', NULL, NULL, 38, 88, '2', '2022-11-27 05:45:33', '2022-11-27 05:45:33'),
(121, 1, 'store', NULL, NULL, 38, 88, '3', '2022-11-27 05:46:20', '2022-11-27 05:46:20'),
(122, 1, 'store', NULL, NULL, 38, 88, '2', '2022-11-27 05:46:33', '2022-11-27 05:46:33'),
(123, 1, 'update', 'fa', 116, 38, 88, '2', '2022-11-27 05:47:35', '2022-11-27 05:47:35'),
(124, 1, 'update', 'fa', 122, 38, 88, '2', '2022-11-27 05:47:53', '2022-11-27 05:47:53'),
(130, 1, 'store', NULL, NULL, 38, 88, '2', '2022-12-04 05:43:39', '2022-12-04 05:43:39'),
(131, 1, 'store', NULL, NULL, 38, 88, '2', '2022-12-04 05:44:07', '2022-12-04 05:44:07'),
(132, 1, 'update', 'fa', 131, 38, 88, '2', '2022-12-04 05:46:04', '2022-12-04 05:46:04'),
(133, 1, 'update', 'fa', 130, 38, 88, '2', '2022-12-04 05:46:23', '2022-12-04 05:46:23'),
(134, 1, 'store', NULL, NULL, 39, 78, 'dfsghdfhdhfdfh', '2022-12-04 05:55:43', '2022-12-04 05:55:43'),
(135, 1, 'store', NULL, NULL, 39, 78, 'yukhklhjlhl', '2022-12-04 05:56:12', '2022-12-04 05:56:12'),
(136, 1, 'update', 'fa', 122, 38, 88, '5', '2022-12-04 05:58:22', '2022-12-04 05:58:22'),
(137, 1, 'store', NULL, NULL, 38, 88, '5', '2022-12-06 05:47:53', '2022-12-06 05:47:53'),
(138, 1, 'store', 'fa', NULL, 39, 78, NULL, '2023-01-26 12:21:21', '2023-01-26 12:21:21'),
(139, 1, 'store', 'fa', NULL, 39, 78, NULL, '2023-01-26 12:22:35', '2023-01-26 12:22:35'),
(140, 1, 'store', 'fa', NULL, 39, 78, NULL, '2023-01-26 12:23:28', '2023-01-26 12:23:28'),
(141, 1, 'update', 'en', 139, 39, 78, NULL, '2023-01-26 12:33:44', '2023-01-26 12:33:44'),
(142, 1, 'store', 'fa', NULL, 38, 88, '5', '2023-08-28 12:58:43', '2023-08-28 12:58:43'),
(143, 1, 'store', 'fa', NULL, 38, 88, '5', '2023-08-28 12:58:51', '2023-08-28 12:58:51'),
(145, 1, 'store', 'fa', NULL, 39, 78, 'dfg', '2023-08-28 13:04:37', '2023-08-28 13:04:37'),
(146, 1, 'store', 'fa', NULL, 39, 78, 'dfg', '2023-08-28 13:04:42', '2023-08-28 13:04:42'),
(147, 1, 'store', 'en', NULL, 38, 88, '9', '2023-09-30 09:15:22', '2023-09-30 09:15:22'),
(148, 1, 'store', 'fa', NULL, 45, 94, 'aaa', '2023-10-01 08:41:59', '2023-10-01 08:41:59'),
(149, 1, 'store', 'fa', NULL, 45, 94, 'aa', '2023-10-01 08:58:46', '2023-10-01 08:58:46'),
(150, 1, 'store', 'fa', NULL, 45, 94, 'xzczxc', '2023-10-01 09:01:32', '2023-10-01 09:01:32'),
(151, 1, 'store', 'fa', NULL, 45, 94, 'xzczxc', '2023-10-01 09:01:39', '2023-10-01 09:01:39'),
(152, 1, 'store', 'fa', NULL, 45, 94, 'xzczxc', '2023-10-01 09:02:07', '2023-10-01 09:02:07'),
(153, 1, 'store', 'fa', NULL, 45, 94, 'xzczxc', '2023-10-01 09:08:49', '2023-10-01 09:08:49'),
(154, 1, 'store', 'fa', NULL, 45, 94, 'xzczxc', '2023-10-01 09:10:25', '2023-10-01 09:10:25'),
(155, 1, 'store', 'fa', NULL, 45, 94, 'xzczxc', '2023-10-01 09:11:14', '2023-10-01 09:11:14'),
(158, 1, 'store', 'fa', NULL, 45, 94, 'xzczxc', '2023-10-01 09:36:52', '2023-10-01 09:36:52'),
(159, 1, 'store', 'fa', NULL, 45, 94, 'xzczxc', '2023-10-01 09:43:35', '2023-10-01 09:43:35'),
(160, 1, 'store', 'fa', NULL, 45, 94, 'asd', '2023-10-01 09:45:23', '2023-10-01 09:45:23'),
(161, 1, 'store', 'fa', NULL, 45, 94, 'asd', '2023-10-01 09:45:35', '2023-10-01 09:45:35'),
(162, 1, 'store', 'fa', NULL, 45, 94, 'asd', '2023-10-01 09:46:23', '2023-10-01 09:46:23'),
(163, 1, 'store', 'fa', NULL, 45, 94, 'asd', '2023-10-01 09:46:44', '2023-10-01 09:46:44'),
(164, 1, 'store', 'fa', NULL, 45, 94, 'asd', '2023-10-01 09:48:22', '2023-10-01 09:48:22'),
(165, 1, 'store', 'fa', NULL, 45, 94, 'bvmnvb', '2023-10-01 10:06:37', '2023-10-01 10:06:37'),
(166, 1, 'store', 'fa', NULL, 45, 94, 'dsfdsf', '2023-10-01 10:20:40', '2023-10-01 10:20:40'),
(167, 1, 'store', 'fa', NULL, 44, 106, '4', '2023-10-02 07:14:05', '2023-10-02 07:14:05'),
(168, 1, 'store', 'fa', NULL, 44, 106, '4', '2023-10-02 07:14:11', '2023-10-02 07:14:11'),
(169, 1, 'store', 'fa', NULL, 44, 106, '4', '2023-10-02 07:15:44', '2023-10-02 07:15:44'),
(170, 1, 'store', 'fa', NULL, 44, 110, '1', '2023-10-02 07:20:49', '2023-10-02 07:20:49'),
(171, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 07:21:52', '2023-10-02 07:21:52'),
(172, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 07:21:54', '2023-10-02 07:21:54'),
(173, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 07:25:18', '2023-10-02 07:25:18'),
(174, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 07:25:38', '2023-10-02 07:25:38'),
(175, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 07:29:50', '2023-10-02 07:29:50'),
(176, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 07:29:52', '2023-10-02 07:29:52'),
(177, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 07:32:18', '2023-10-02 07:32:18'),
(178, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:06:40', '2023-10-02 08:06:40'),
(179, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:07:08', '2023-10-02 08:07:08'),
(180, 1, 'store', 'fa', NULL, 44, 110, '5', '2023-10-02 08:07:28', '2023-10-02 08:07:28'),
(181, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:28:11', '2023-10-02 08:28:11'),
(182, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:28:13', '2023-10-02 08:28:13'),
(183, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:30:47', '2023-10-02 08:30:47'),
(184, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:31:16', '2023-10-02 08:31:16'),
(185, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:34:03', '2023-10-02 08:34:03'),
(186, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:35:40', '2023-10-02 08:35:40'),
(187, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:35:46', '2023-10-02 08:35:46'),
(188, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:35:55', '2023-10-02 08:35:55'),
(189, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:36:21', '2023-10-02 08:36:21'),
(190, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:36:35', '2023-10-02 08:36:35'),
(191, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:36:43', '2023-10-02 08:36:43'),
(192, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:37:52', '2023-10-02 08:37:52'),
(193, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 08:43:10', '2023-10-02 08:43:10'),
(194, 1, 'store', 'fa', NULL, 44, 110, '5', '2023-10-02 08:44:36', '2023-10-02 08:44:36'),
(195, 1, 'store', 'fa', NULL, 44, 110, '5', '2023-10-02 08:44:47', '2023-10-02 08:44:47'),
(196, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:27:41', '2023-10-02 09:27:41'),
(197, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:28:00', '2023-10-02 09:28:00'),
(198, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:38:19', '2023-10-02 09:38:19'),
(199, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:38:22', '2023-10-02 09:38:22'),
(200, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:40:40', '2023-10-02 09:40:40'),
(201, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:40:53', '2023-10-02 09:40:53'),
(202, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:41:22', '2023-10-02 09:41:22'),
(203, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:41:42', '2023-10-02 09:41:42'),
(204, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:41:56', '2023-10-02 09:41:56'),
(205, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:42:03', '2023-10-02 09:42:03'),
(206, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:42:41', '2023-10-02 09:42:41'),
(207, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:47:30', '2023-10-02 09:47:30'),
(208, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:58:35', '2023-10-02 09:58:35'),
(209, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 09:59:22', '2023-10-02 09:59:22'),
(210, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 10:01:28', '2023-10-02 10:01:28'),
(211, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 10:03:37', '2023-10-02 10:03:37'),
(212, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 10:04:09', '2023-10-02 10:04:09'),
(213, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 10:04:44', '2023-10-02 10:04:44'),
(214, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 10:06:14', '2023-10-02 10:06:14'),
(215, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 10:07:13', '2023-10-02 10:07:13'),
(216, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 10:11:17', '2023-10-02 10:11:17'),
(217, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 10:24:32', '2023-10-02 10:24:32'),
(218, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-02 10:24:55', '2023-10-02 10:24:55'),
(219, 1, 'store', 'fa', NULL, 44, 110, '1', '2023-10-02 11:05:35', '2023-10-02 11:05:35'),
(220, 1, 'store', 'fa', NULL, 45, 95, NULL, '2023-10-04 06:39:11', '2023-10-04 06:39:11'),
(221, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-04 06:40:34', '2023-10-04 06:40:34'),
(222, 1, 'update', 'fa', 220, 45, 95, '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', '2023-10-04 07:33:05', '2023-10-04 07:33:05'),
(223, 1, 'update', 'fa', 220, 45, 95, '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', '2023-10-04 07:33:27', '2023-10-04 07:33:27'),
(224, 1, 'update', 'fa', 220, 45, 95, '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', '2023-10-04 07:33:44', '2023-10-04 07:33:44'),
(225, 1, 'store', 'fa', NULL, 45, 95, NULL, '2023-10-04 07:40:25', '2023-10-04 07:40:25'),
(226, 1, 'store', 'fa', NULL, 45, 95, NULL, '2023-10-04 07:40:58', '2023-10-04 07:40:58'),
(227, 1, 'update', 'fa', 165, 45, 95, NULL, '2023-10-04 08:33:28', '2023-10-04 08:33:28'),
(228, 1, 'store', 'fa', NULL, 44, 110, '3', '2023-10-04 08:41:01', '2023-10-04 08:41:01'),
(229, 1, 'update', 'fa', 228, 44, 110, '6', '2023-10-04 08:44:53', '2023-10-04 08:44:53'),
(230, 1, 'update', 'fa', 228, 44, 110, '6', '2023-10-04 09:10:17', '2023-10-04 09:10:17'),
(231, 1, 'update', 'fa', 221, 44, 110, '9', '2023-10-04 09:10:57', '2023-10-04 09:10:57'),
(232, 1, 'update', 'fa', 207, 44, 110, '5', '2023-10-05 05:56:51', '2023-10-05 05:56:51'),
(233, 1, 'update', 'fa', 226, 45, 95, '<p>dsgdsgdsgdgsdgsdgsdgsds</p>', '2023-10-05 05:57:29', '2023-10-05 05:57:29'),
(234, 1, 'update', 'fa', 219, 44, 110, '1', '2023-10-05 07:23:49', '2023-10-05 07:23:49'),
(235, 1, 'update', 'fa', 219, 44, 110, '1', '2023-10-05 07:24:36', '2023-10-05 07:24:36'),
(236, 1, 'update', 'fa', 219, 44, 110, '1', '2023-10-05 07:25:23', '2023-10-05 07:25:23'),
(237, 1, 'update', 'fa', 219, 44, 110, '1', '2023-10-05 07:26:15', '2023-10-05 07:26:15'),
(238, 1, 'update', 'fa', 219, 44, 110, '1', '2023-10-05 07:26:45', '2023-10-05 07:26:45'),
(239, 1, 'update', 'fa', 219, 44, 110, '1', '2023-10-05 07:26:56', '2023-10-05 07:26:56'),
(240, 1, 'update', 'fa', 219, 44, 110, '1', '2023-10-05 07:27:12', '2023-10-05 07:27:12'),
(241, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-05 07:27:30', '2023-10-05 07:27:30'),
(242, 1, 'store', 'fa', NULL, 45, 95, NULL, '2023-10-05 07:31:12', '2023-10-05 07:31:12'),
(243, 1, 'update', 'fa', 242, 45, 95, NULL, '2023-10-05 08:03:35', '2023-10-05 08:03:35'),
(244, 1, 'store', 'fa', NULL, 45, 95, '<p>cvncvncvn</p>', '2023-10-05 08:29:14', '2023-10-05 08:29:14'),
(245, 1, 'store', 'fa', NULL, 44, 110, '5', '2023-10-05 08:30:31', '2023-10-05 08:30:31'),
(246, 1, 'update', 'fa', 245, 44, 110, '5', '2023-10-05 08:38:39', '2023-10-05 08:38:39'),
(247, 1, 'store', 'fa', NULL, 45, 95, '<p>یسبسیسبسیبیسب</p>', '2023-10-07 07:58:28', '2023-10-07 07:58:28'),
(248, 1, 'update', 'fa', 247, 45, 95, '<p>dsfsdfsdfsdf</p>', '2023-10-07 07:59:29', '2023-10-07 07:59:29'),
(249, 1, 'store', 'fa', NULL, 45, 95, '<p>شسیشسیشسی</p>', '2023-10-07 08:00:50', '2023-10-07 08:00:50'),
(250, 1, 'update', 'en', 249, 45, 95, '<p>asdasdasdasd</p>', '2023-10-07 08:01:33', '2023-10-07 08:01:33'),
(251, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-07 11:57:35', '2023-10-07 11:57:35'),
(252, 1, 'store', 'fa', NULL, 44, 110, '1', '2023-10-08 06:16:32', '2023-10-08 06:16:32'),
(253, 1, 'store', 'fa', NULL, 44, 110, '5', '2023-10-08 06:21:51', '2023-10-08 06:21:51'),
(254, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-08 06:22:49', '2023-10-08 06:22:49'),
(255, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-08 06:22:52', '2023-10-08 06:22:52'),
(256, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-08 06:23:10', '2023-10-08 06:23:10'),
(257, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-08 06:23:12', '2023-10-08 06:23:12'),
(258, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-08 06:23:14', '2023-10-08 06:23:14'),
(259, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-08 06:49:22', '2023-10-08 06:49:22'),
(260, 1, 'store', 'fa', NULL, 44, 110, '3', '2023-10-08 06:55:41', '2023-10-08 06:55:41'),
(261, 1, 'store', 'fa', NULL, 44, 110, '3', '2023-10-08 06:56:14', '2023-10-08 06:56:14'),
(262, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-08 06:56:58', '2023-10-08 06:56:58'),
(263, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-08 06:57:59', '2023-10-08 06:57:59'),
(264, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-08 06:58:11', '2023-10-08 06:58:11'),
(265, 1, 'update', 'fa', 263, 44, 110, NULL, '2023-10-08 07:08:00', '2023-10-08 07:08:00'),
(266, 1, 'update', 'fa', 261, 44, 110, '3', '2023-10-08 07:21:20', '2023-10-08 07:21:20'),
(267, 1, 'store', 'fa', NULL, 45, 95, '<p>asd</p>', '2023-10-08 08:42:32', '2023-10-08 08:42:32'),
(268, 1, 'update', 'fa', 261, 44, 110, '3', '2023-10-09 11:02:07', '2023-10-09 11:02:07'),
(269, 1, 'store', 'fa', NULL, 44, 110, '1', '2023-10-09 12:02:07', '2023-10-09 12:02:07'),
(270, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-11 06:58:42', '2023-10-11 06:58:42'),
(271, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-11 09:27:43', '2023-10-11 09:27:43'),
(272, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-11 10:13:56', '2023-10-11 10:13:56'),
(273, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-11 10:14:42', '2023-10-11 10:14:42'),
(274, 1, 'store', 'fa', NULL, 44, 110, NULL, '2023-10-11 10:15:07', '2023-10-11 10:15:07'),
(275, 1, 'store', 'fa', NULL, 44, 115, NULL, '2023-10-11 10:23:36', '2023-10-11 10:23:36'),
(276, 1, 'store', 'fa', NULL, 44, 115, 'chesh to chesh2.png', '2023-10-11 10:24:34', '2023-10-11 10:24:34'),
(277, 1, 'store', 'fa', NULL, 44, 115, NULL, '2023-10-11 10:28:34', '2023-10-11 10:28:34'),
(278, 1, 'store', 'fa', NULL, 1, 116, 'pexels-photo-40120-e1500018015404-1-342x252.jpg', '2023-10-16 05:36:42', '2023-10-16 05:36:42'),
(279, 1, 'update', 'fa', 278, 1, 116, NULL, '2023-10-16 05:45:11', '2023-10-16 05:45:11'),
(280, 1, 'store', 'fa', NULL, 1, 116, 'pexels-photo-40120-e1500018015404-1-342x252.jpg', '2023-10-16 05:56:06', '2023-10-16 05:56:06'),
(281, 1, 'store', 'fa', NULL, 1, 116, 'pexels-photo-40120-e1500018015404-1-342x252.jpg', '2023-10-16 06:57:37', '2023-10-16 06:57:37'),
(282, 1, 'store', 'fa', NULL, 7, 128, 'client-1.png', '2023-10-17 00:56:00', '2023-10-17 00:56:00'),
(283, 1, 'store', 'fa', NULL, 7, 128, 'client-3.png', '2023-10-17 01:36:25', '2023-10-17 01:36:25'),
(284, 1, 'store', 'fa', NULL, 8, 131, 'client-1.png', '2023-10-17 02:01:08', '2023-10-17 02:01:08'),
(285, 1, 'store', 'fa', NULL, 8, 131, NULL, '2023-10-17 02:01:32', '2023-10-17 02:01:32'),
(286, 1, 'store', 'fa', NULL, 8, 131, 'client-1.png', '2023-10-17 02:01:44', '2023-10-17 02:01:44'),
(287, 1, 'store', 'fa', NULL, 9, 134, 'client-5.png', '2023-10-17 02:08:12', '2023-10-17 02:08:12'),
(288, 1, 'update', 'fa', 287, 9, 134, NULL, '2023-10-17 02:10:01', '2023-10-17 02:10:01'),
(289, 1, 'store', 'fa', NULL, 11, 137, 'client-1.png', '2023-10-17 02:47:05', '2023-10-17 02:47:05'),
(290, 1, 'store', 'fa', NULL, 11, 141, 'client-1.png', '2023-10-17 02:56:26', '2023-10-17 02:56:26'),
(291, 1, 'store', 'fa', NULL, 11, 141, 'client-1.png', '2023-10-17 03:10:08', '2023-10-17 03:10:08'),
(292, 1, 'store', 'fa', NULL, 11, 141, 'client-5.png', '2023-10-17 03:14:47', '2023-10-17 03:14:47'),
(293, 1, 'store', 'fa', NULL, 11, 141, 'client-5.png', '2023-10-17 03:15:22', '2023-10-17 03:15:22'),
(294, 1, 'store', 'fa', NULL, 11, 141, 'client-4.png', '2023-10-17 03:20:02', '2023-10-17 03:20:02'),
(295, 1, 'store', 'fa', NULL, 11, 141, 'client-4.png', '2023-10-17 03:20:51', '2023-10-17 03:20:51'),
(296, 1, 'store', 'fa', NULL, 11, 141, 'client-4.png', '2023-10-17 03:21:03', '2023-10-17 03:21:03'),
(297, 1, 'store', 'fa', NULL, 11, 141, 'client-2.png', '2023-10-17 03:21:32', '2023-10-17 03:21:32'),
(298, 1, 'store', 'fa', NULL, 11, 141, 'client-3.png', '2023-10-17 03:22:43', '2023-10-17 03:22:43'),
(299, 1, 'store', 'fa', NULL, 11, 141, 'client-2.png', '2023-10-17 03:23:06', '2023-10-17 03:23:06'),
(300, 1, 'store', 'fa', NULL, 11, 141, 'client-4.png', '2023-10-17 03:26:27', '2023-10-17 03:26:27'),
(301, 1, 'store', 'fa', NULL, 11, 141, 'client-4.png', '2023-10-17 03:26:44', '2023-10-17 03:26:44'),
(302, 1, 'store', 'fa', NULL, 11, 141, 'client-3.png', '2023-10-17 03:26:59', '2023-10-17 03:26:59'),
(303, 1, 'store', 'fa', NULL, 11, 141, 'client-3.png', '2023-10-17 03:27:30', '2023-10-17 03:27:30'),
(304, 1, 'store', 'fa', NULL, 11, 141, 'client-1.png', '2023-10-17 03:36:44', '2023-10-17 03:36:44'),
(305, 1, 'store', 'fa', NULL, 11, 141, 'client-5.png', '2023-10-17 03:39:53', '2023-10-17 03:39:53'),
(306, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 03:44:58', '2023-10-17 03:44:58'),
(307, 1, 'store', 'fa', NULL, 11, 141, 'back.jpg', '2023-10-17 03:45:02', '2023-10-17 03:45:02'),
(308, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 03:46:50', '2023-10-17 03:46:50'),
(309, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 03:47:01', '2023-10-17 03:47:01'),
(310, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 03:47:24', '2023-10-17 03:47:24'),
(311, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 03:47:30', '2023-10-17 03:47:30'),
(312, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 03:51:02', '2023-10-17 03:51:02'),
(313, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 03:51:35', '2023-10-17 03:51:35'),
(314, 1, 'update', 'fa', 283, 7, 128, NULL, '2023-10-17 03:52:06', '2023-10-17 03:52:06'),
(315, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 03:52:46', '2023-10-17 03:52:46'),
(316, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 03:56:10', '2023-10-17 03:56:10'),
(317, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 03:57:37', '2023-10-17 03:57:37'),
(318, 1, 'update', 'fa', 283, 7, 128, NULL, '2023-10-17 04:00:00', '2023-10-17 04:00:00'),
(319, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:02:56', '2023-10-17 04:02:56'),
(320, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:03:06', '2023-10-17 04:03:06'),
(321, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:03:33', '2023-10-17 04:03:33'),
(322, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:05:53', '2023-10-17 04:05:53'),
(323, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:06:15', '2023-10-17 04:06:15'),
(324, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:07:30', '2023-10-17 04:07:30'),
(325, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:07:56', '2023-10-17 04:07:56'),
(326, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:08:08', '2023-10-17 04:08:08'),
(327, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:08:34', '2023-10-17 04:08:34'),
(328, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:08:59', '2023-10-17 04:08:59'),
(329, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:09:18', '2023-10-17 04:09:18'),
(330, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:12:04', '2023-10-17 04:12:04'),
(331, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:14:26', '2023-10-17 04:14:26'),
(332, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:17:05', '2023-10-17 04:17:05'),
(333, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:19:10', '2023-10-17 04:19:10'),
(334, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:21:15', '2023-10-17 04:21:15'),
(335, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:21:31', '2023-10-17 04:21:31'),
(336, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:22:43', '2023-10-17 04:22:43'),
(337, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:40:41', '2023-10-17 04:40:41'),
(338, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:40:46', '2023-10-17 04:40:46'),
(339, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 04:41:24', '2023-10-17 04:41:24'),
(340, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 05:27:43', '2023-10-17 05:27:43'),
(341, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 05:29:29', '2023-10-17 05:29:29'),
(342, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 05:31:55', '2023-10-17 05:31:55'),
(343, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 05:37:15', '2023-10-17 05:37:15'),
(344, 1, 'update', 'fa', 343, 11, 141, NULL, '2023-10-17 07:08:35', '2023-10-17 07:08:35'),
(345, 1, 'update', 'fa', 342, 11, 141, NULL, '2023-10-17 07:08:48', '2023-10-17 07:08:48'),
(346, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 07:09:12', '2023-10-17 07:09:12'),
(347, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 07:09:28', '2023-10-17 07:09:28'),
(348, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 07:09:44', '2023-10-17 07:09:44'),
(349, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 07:09:50', '2023-10-17 07:09:50'),
(350, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 07:35:54', '2023-10-17 07:35:54'),
(351, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 08:58:26', '2023-10-17 08:58:26'),
(352, 1, 'store', 'fa', NULL, 11, 141, NULL, '2023-10-17 08:58:50', '2023-10-17 08:58:50'),
(353, 1, 'store', 'fa', NULL, 24, 152, 'Demos', '2023-10-18 00:23:11', '2023-10-18 00:23:11'),
(354, 1, 'store', 'fa', NULL, 24, 152, 'About', '2023-10-18 00:25:49', '2023-10-18 00:25:49'),
(355, 1, 'store', 'fa', NULL, 24, 152, 'Pages', '2023-10-18 00:49:27', '2023-10-18 00:49:27'),
(356, 1, 'store', 'fa', NULL, 24, 152, 'Demu Kit Builder', '2023-10-18 00:51:21', '2023-10-18 00:51:21'),
(357, 1, 'store', 'fa', NULL, 24, 152, 'Blog', '2023-10-18 00:51:52', '2023-10-18 00:51:52'),
(358, 1, 'store', 'fa', NULL, 24, 152, 'Contact', '2023-10-18 00:59:05', '2023-10-18 00:59:05'),
(359, 1, 'store', 'fa', NULL, 8, 167, '/courseBuider', '2023-10-18 02:35:11', '2023-10-18 02:35:11'),
(360, 1, 'store', 'fa', NULL, 15, 145, NULL, '2023-10-18 02:46:30', '2023-10-18 02:46:30'),
(361, 1, 'store', 'fa', NULL, 15, 145, NULL, '2023-10-18 02:47:19', '2023-10-18 02:47:19'),
(362, 1, 'store', 'fa', NULL, 28, 168, 'Top Categories', '2023-10-18 02:47:59', '2023-10-18 02:47:59'),
(363, 1, 'update', 'fa', 362, 28, 168, 'Top Categories', '2023-10-18 02:52:27', '2023-10-18 02:52:27'),
(364, 1, 'update', 'fa', 287, 9, 134, NULL, '2023-10-18 03:05:16', '2023-10-18 03:05:16'),
(365, 1, 'store', 'fa', NULL, 30, 177, 'Our Top Course', '2023-10-18 03:10:55', '2023-10-18 03:10:55'),
(366, 1, 'store', 'fa', NULL, 10, 180, NULL, '2023-10-18 03:18:32', '2023-10-18 03:18:32'),
(367, 1, 'update', 'fa', 366, 10, 181, 'Create Your Free Account', '2023-10-18 03:20:41', '2023-10-18 03:20:41'),
(368, 1, 'store', 'fa', NULL, 12, 138, 'Clients Feedback', '2023-10-18 03:26:06', '2023-10-18 03:26:06'),
(369, 1, 'update', 'fa', 368, 12, 138, 'Clients Feedback', '2023-10-18 03:29:29', '2023-10-18 03:29:29'),
(370, 1, 'store', 'fa', NULL, 31, 187, 'Lastest New', '2023-10-18 03:38:57', '2023-10-18 03:38:57'),
(371, 1, 'store', 'fa', NULL, 35, 191, 'USEFUL LINKS', '2023-10-18 04:24:23', '2023-10-18 04:24:23'),
(372, 1, 'store', 'fa', NULL, 35, 191, 'CATEGORIES', '2023-10-18 04:24:38', '2023-10-18 04:24:38'),
(373, 1, 'store', 'fa', NULL, 35, 191, 'SUBCRIBE NEW LETTERS', '2023-10-18 04:24:47', '2023-10-18 04:24:47'),
(374, 1, 'store', 'fa', NULL, 35, 191, 'About us', '2023-10-18 04:29:16', '2023-10-18 04:29:16'),
(375, 1, 'store', 'fa', NULL, 35, 191, 'Blog', '2023-10-18 04:29:24', '2023-10-18 04:29:24'),
(376, 1, 'store', 'fa', NULL, 35, 191, 'Buddy profile', '2023-10-18 04:29:44', '2023-10-18 04:29:44'),
(377, 1, 'store', 'fa', NULL, 35, 191, 'Become an instructor', '2023-10-18 04:29:59', '2023-10-18 04:29:59'),
(378, 1, 'store', 'fa', NULL, 35, 191, 'Membership', '2023-10-18 04:30:19', '2023-10-18 04:30:19'),
(379, 1, 'store', 'fa', NULL, 35, 191, 'Technology', '2023-10-18 04:31:30', '2023-10-18 04:31:30'),
(380, 1, 'store', 'fa', NULL, 35, 191, 'Photography', '2023-10-18 04:31:42', '2023-10-18 04:31:42'),
(381, 1, 'store', 'fa', NULL, 35, 191, 'Business', '2023-10-18 04:31:53', '2023-10-18 04:31:53'),
(382, 1, 'store', 'fa', NULL, 35, 191, 'Design', '2023-10-18 04:32:01', '2023-10-18 04:32:01'),
(383, 1, 'store', 'fa', NULL, 35, 191, 'Web Development', '2023-10-18 04:33:43', '2023-10-18 04:33:43'),
(384, 1, 'update', 'fa', 373, 35, 191, 'USEFUL LINKS', '2023-10-18 04:34:21', '2023-10-18 04:34:21'),
(385, 1, 'update', 'fa', 371, 35, 191, 'SUBCRIBE NEW LETTERS', '2023-10-18 04:34:35', '2023-10-18 04:34:35'),
(386, 1, 'store', 'fa', NULL, 35, 191, 'Enter your email and we’ll send you more information.', '2023-10-18 04:35:00', '2023-10-18 04:35:00'),
(387, 1, 'store', 'fa', NULL, 38, 194, 'Enter email address', '2023-10-18 04:59:45', '2023-10-18 04:59:45'),
(388, 1, 'store', 'fa', NULL, 39, 197, 'SUBCRIBE NEW LETTERS', '2023-10-18 05:36:09', '2023-10-18 05:36:09'),
(389, 1, 'update', 'fa', 388, 39, 197, 'SUBCRIBE NEW LETTERS', '2023-10-18 05:57:28', '2023-10-18 05:57:28'),
(390, 1, 'update', 'fa', 388, 39, 197, 'SUBCRIBE NEW LETTERS', '2023-10-18 05:58:53', '2023-10-18 05:58:53'),
(391, 1, 'store', 'fa', NULL, 25, 154, NULL, '2023-10-18 06:22:03', '2023-10-18 06:22:03'),
(392, 1, 'store', 'fa', NULL, 44, 206, 'Be Your Own Boss', '2023-10-19 01:43:45', '2023-10-19 01:43:45'),
(393, 1, 'store', 'fa', NULL, 47, 216, 'Certification Exam', '2023-10-19 02:25:58', '2023-10-19 02:25:58'),
(394, 1, 'store', 'fa', NULL, 47, 216, 'Be Your Own Boss', '2023-10-19 02:26:22', '2023-10-19 02:26:22'),
(395, 1, 'update', 'fa', 362, 28, 168, 'Top Categories', '2023-10-19 02:29:34', '2023-10-19 02:29:34'),
(396, 1, 'store', 'fa', NULL, 48, 220, 'LearnPress Master Web Design in Photoshop', '2023-10-19 03:04:20', '2023-10-19 03:04:20'),
(397, 1, 'store', 'fa', NULL, 49, 224, 'week 10', '2023-10-19 03:08:26', '2023-10-19 03:08:26'),
(398, 1, 'update', 'fa', 397, 49, 224, 'week 10', '2023-10-19 03:09:26', '2023-10-19 03:09:26'),
(399, 1, 'store', 'fa', NULL, 44, 206, 'Course introduction', '2023-10-19 03:10:13', '2023-10-19 03:10:13'),
(400, 1, 'store', 'fa', NULL, 42, 204, 'Keny White', '2023-10-19 03:17:19', '2023-10-19 03:17:19'),
(401, 1, 'update', 'fa', 365, 30, 177, 'Our Top Course', '2023-10-19 03:27:25', '2023-10-19 03:27:25'),
(402, 1, 'update', 'fa', 394, 47, 216, 'Business', '2023-10-19 03:28:41', '2023-10-19 03:28:41'),
(403, 1, 'update', 'fa', 396, 48, 220, 'LearnPress Master Web Design in Photoshop', '2023-10-19 03:29:46', '2023-10-19 03:29:46'),
(404, 1, 'store', 'fa', NULL, 24, 152, 'Course', '2023-10-21 01:32:41', '2023-10-21 01:32:41'),
(405, 1, 'store', 'fa', NULL, 48, 220, 'The Ultimate Ethical Hacking', '2023-10-21 02:06:20', '2023-10-21 02:06:20'),
(406, 1, 'update', 'fa', 396, 48, 220, 'LearnPress Master Web Design in Photoshop', '2023-10-21 02:06:49', '2023-10-21 02:06:49'),
(407, 1, 'update', 'fa', 404, 24, 152, 'Course', '2023-10-21 02:22:24', '2023-10-21 02:22:24'),
(408, 1, 'store', 'fa', NULL, 50, 237, '<p>&nbsp;THE BEST DEMO EDUCATION Be successful with Course Builder theme.</p>', '2023-10-21 03:13:46', '2023-10-21 03:13:46'),
(409, 1, 'store', 'fa', NULL, 48, 220, 'LearnPress Master Web Design in Photoshop', '2023-10-21 03:29:51', '2023-10-21 03:29:51'),
(410, 1, 'update', 'fa', 408, 50, 236, 'Courses', '2023-10-21 03:38:40', '2023-10-21 03:38:40'),
(411, 1, 'update', 'fa', 394, 47, 216, 'Business', '2023-10-21 06:52:38', '2023-10-21 06:52:38'),
(412, 1, 'update', 'fa', 394, 47, 216, 'Business', '2023-10-21 06:57:15', '2023-10-21 06:57:15'),
(413, 1, 'update', 'fa', 393, 47, 216, 'Certification Exam', '2023-10-21 06:57:48', '2023-10-21 06:57:48'),
(414, 1, 'store', 'fa', NULL, 51, 243, NULL, '2023-10-21 07:14:18', '2023-10-21 07:14:18'),
(415, 1, 'update', 'fa', 414, 51, 243, NULL, '2023-10-21 07:16:21', '2023-10-21 07:16:21'),
(416, 1, 'update', 'fa', 405, 48, 220, 'The Ultimate Ethical Hacking', '2023-10-21 07:25:34', '2023-10-21 07:25:34'),
(417, 1, 'update', 'fa', 396, 48, 220, 'LearnPress Master Web Design in Photoshop', '2023-10-21 07:26:01', '2023-10-21 07:26:01'),
(418, 1, 'update', 'fa', 396, 48, 220, 'LearnPress Master Web Design in Photoshop', '2023-10-21 08:07:21', '2023-10-21 08:07:21'),
(419, 1, 'update', 'fa', 396, 48, 220, 'LearnPress Master Web Design in Photoshop', '2023-10-21 08:10:51', '2023-10-21 08:10:51'),
(420, 1, 'update', 'fa', 399, 44, 206, 'Course introduction', '2023-10-21 08:38:47', '2023-10-21 08:38:47'),
(421, 1, 'store', 'fa', NULL, 45, 208, 'A Note On Asking For Help', '2023-10-21 08:41:41', '2023-10-21 08:41:41'),
(422, 1, 'store', 'fa', NULL, 48, 220, 'Affiliate Marketing – A Beginner’s Guide', '2023-10-22 01:50:54', '2023-10-22 01:50:54'),
(423, 1, 'update', 'fa', 354, 24, 152, 'About', '2023-10-22 03:10:04', '2023-10-22 03:10:04'),
(424, 1, 'store', 'fa', NULL, 4, 123, NULL, '2023-10-22 03:47:19', '2023-10-22 03:47:19'),
(425, 1, 'update', 'fa', 424, 4, 123, NULL, '2023-10-22 03:48:53', '2023-10-22 03:48:53'),
(426, 1, 'store', 'fa', NULL, 4, 123, NULL, '2023-10-22 03:50:19', '2023-10-22 03:50:19'),
(427, 1, 'store', 'fa', NULL, 27, 251, NULL, '2023-10-22 03:51:53', '2023-10-22 03:51:53'),
(428, 1, 'update', 'fa', 426, 4, 123, NULL, '2023-10-22 03:58:32', '2023-10-22 03:58:32'),
(429, 1, 'store', 'fa', NULL, 3, 120, NULL, '2023-10-22 04:02:36', '2023-10-22 04:02:36'),
(430, 1, 'update', 'fa', 427, 27, 251, NULL, '2023-10-22 04:07:53', '2023-10-22 04:07:53'),
(431, 1, 'update', 'fa', 400, 42, 204, 'Keny White', '2023-10-22 06:06:53', '2023-10-22 06:06:53'),
(432, 1, 'store', 'fa', NULL, 42, 204, 'Dr Eastey', '2023-10-22 06:53:20', '2023-10-22 06:53:20'),
(433, 1, 'update', 'fa', 400, 42, 204, 'Keny White', '2023-10-22 06:54:49', '2023-10-22 06:54:49'),
(434, 1, 'store', 'fa', NULL, 5, 261, 'Contact Twitter', '2023-10-22 07:08:27', '2023-10-22 07:08:27'),
(435, 1, 'store', 'fa', NULL, 5, 261, 'Contact Twitter', '2023-10-22 07:12:26', '2023-10-22 07:12:26'),
(436, 1, 'update', 'fa', 435, 5, 261, 'Contact Twitter', '2023-10-22 07:24:05', '2023-10-22 07:24:05'),
(437, 1, 'update', 'fa', 435, 5, 261, 'Contact Twitter', '2023-10-22 08:22:28', '2023-10-22 08:22:28'),
(438, 1, 'update', 'fa', 394, 47, 216, 'Business', '2023-10-22 08:25:51', '2023-10-22 08:25:51'),
(439, 1, 'update', 'fa', 393, 47, 216, 'Certification Exam', '2023-10-22 08:26:06', '2023-10-22 08:26:06'),
(440, 1, 'update', 'fa', 365, 30, 177, 'Our Top Course', '2023-10-22 08:33:01', '2023-10-22 08:33:01'),
(441, 1, 'update', 'fa', 370, 31, 187, 'Lastest New', '2023-10-22 08:43:21', '2023-10-22 08:43:21'),
(442, 1, 'update', 'fa', 283, 7, 129, 'Learn From The Experts', '2023-10-23 01:07:12', '2023-10-23 01:07:12'),
(443, 1, 'update', 'fa', 282, 7, 129, 'Learn From The Experts', '2023-10-23 01:10:09', '2023-10-23 01:10:09'),
(444, 1, 'update', 'fa', 282, 7, 129, 'Learn From The Experts', '2023-10-23 01:26:54', '2023-10-23 01:26:54'),
(445, 1, 'update', 'fa', 282, 7, 129, 'Learn From The Experts', '2023-10-23 01:27:34', '2023-10-23 01:27:34'),
(446, 1, 'update', 'fa', 287, 9, 134, NULL, '2023-10-23 01:54:00', '2023-10-23 01:54:00'),
(447, 1, 'update', 'fa', 370, 31, 187, 'Lastest New', '2023-10-23 02:17:15', '2023-10-23 02:17:15'),
(448, 1, 'update', 'fa', 422, 48, 248, 'course/affiliate-marketing', '2023-10-23 02:27:42', '2023-10-23 02:27:42'),
(449, 1, 'update', 'fa', 422, 48, 248, 'course/affiliate-marketing', '2023-10-23 02:28:38', '2023-10-23 02:28:38'),
(450, 1, 'update', 'fa', 422, 48, 248, 'course/affiliate-marketing', '2023-10-23 02:30:09', '2023-10-23 02:30:09'),
(451, 1, 'update', 'fa', 422, 48, 248, 'course/affiliate-marketing', '2023-10-23 02:30:17', '2023-10-23 02:30:17'),
(452, 1, 'update', 'fa', 422, 48, 248, 'course/affiliate-marketing', '2023-10-23 02:34:47', '2023-10-23 02:34:47'),
(453, 1, 'update', 'fa', 405, 48, 248, 'course/the-ultimate-ethical-hacking', '2023-10-23 02:34:58', '2023-10-23 02:34:58'),
(454, 1, 'update', 'fa', 405, 48, 248, 'course/the-ultimate-ethical-hacking', '2023-10-23 02:35:22', '2023-10-23 02:35:22'),
(455, 1, 'update', 'fa', 396, 48, 248, 'course/master-web-design-in-photoshop', '2023-10-23 02:35:30', '2023-10-23 02:35:30'),
(456, 1, 'update', 'fa', 399, 44, 206, 'Course introduction', '2023-10-23 05:40:23', '2023-10-23 05:40:23'),
(457, 1, 'update', 'fa', 394, 47, 216, 'Business', '2023-10-23 05:53:12', '2023-10-23 05:53:12'),
(458, 1, 'update', 'fa', 393, 47, 216, 'Certification Exam', '2023-10-23 05:53:35', '2023-10-23 05:53:35'),
(459, 1, 'update', 'fa', 365, 30, 177, 'Our Top Course', '2023-10-23 07:49:01', '2023-10-23 07:49:01'),
(460, 1, 'update', 'fa', 409, 48, 248, 'course/photoshop', '2023-10-23 08:47:45', '2023-10-23 08:47:45'),
(461, 1, 'update', 'fa', 409, 48, 248, 'course/photoshop', '2023-10-24 00:33:21', '2023-10-24 00:33:21'),
(462, 1, 'update', 'fa', 409, 48, 248, 'course/photoshop', '2023-10-24 00:34:57', '2023-10-24 00:34:57'),
(463, 1, 'update', 'fa', 405, 48, 248, 'course/the-ultimate-ethical-hacking', '2023-10-24 01:38:48', '2023-10-24 01:38:48'),
(464, 1, 'update', 'fa', 405, 48, 248, 'course/the-ultimate-ethical-hacking', '2023-10-24 01:39:31', '2023-10-24 01:39:31'),
(465, 1, 'update', 'fa', 409, 48, 248, 'course/photoshop', '2023-10-24 01:39:50', '2023-10-24 01:39:50'),
(466, 1, 'update', 'fa', 396, 48, 248, 'course/master-web-design-in-photoshop', '2023-10-24 01:41:14', '2023-10-24 01:41:14'),
(467, 1, 'store', 'fa', NULL, 52, 273, '<i class=\"fa-brands fa-pinterest\"></i>', '2023-10-24 02:46:03', '2023-10-24 02:46:03'),
(468, 1, 'store', 'fa', NULL, 52, 273, '<i class=\"fa-brands fa-facebook\"></i>', '2023-10-24 02:46:24', '2023-10-24 02:46:24'),
(469, 1, 'store', 'fa', NULL, 52, 273, '<i class=\"fa-brands fa-x-twitter\"></i>', '2023-10-24 02:47:32', '2023-10-24 02:47:32'),
(470, 1, 'store', 'fa', NULL, 52, 273, '<i class=\"fa-brands fa-linkedin\"></i>', '2023-10-24 02:48:11', '2023-10-24 02:48:11'),
(471, 1, 'store', 'fa', NULL, 53, 276, 'Name', '2023-10-24 04:24:37', '2023-10-24 04:24:37'),
(472, 1, 'store', 'fa', NULL, 54, 282, 'test', '2023-10-24 05:04:07', '2023-10-24 05:04:07'),
(473, 1, 'update', 'fa', 432, 42, 204, 'Dr Eastey', '2023-10-24 05:24:34', '2023-10-24 05:24:34'),
(474, 1, 'store', 'fa', NULL, 55, 290, 'established fact that a reade.', '2023-10-24 07:21:22', '2023-10-24 07:21:22'),
(475, 1, 'update', 'fa', 474, 55, 290, 'Contact', '2023-10-24 07:24:52', '2023-10-24 07:24:52'),
(476, 1, 'store', 'fa', NULL, 41, 294, '<i class=\"fa-solid fa-location-dot\"></i>', '2023-10-24 07:31:17', '2023-10-24 07:31:17'),
(477, 1, 'store', 'fa', NULL, 41, 294, '<i class=\"fa-solid fa-phone\"></i>', '2023-10-24 07:31:39', '2023-10-24 07:31:39'),
(478, 1, 'store', 'fa', NULL, 41, 294, '<i class=\"fa-regular fa-paper-plane\"></i>', '2023-10-24 07:31:57', '2023-10-24 07:31:57'),
(479, 1, 'store', 'fa', NULL, 56, 296, NULL, '2023-10-24 07:32:41', '2023-10-24 07:32:41'),
(480, 1, 'store', 'fa', NULL, 56, 296, 'Mobile', '2023-10-24 07:33:10', '2023-10-24 07:33:10'),
(481, 1, 'store', 'fa', NULL, 56, 296, 'Fax', '2023-10-24 07:33:15', '2023-10-24 07:33:15'),
(482, 1, 'store', 'fa', NULL, 56, 296, NULL, '2023-10-24 07:35:27', '2023-10-24 07:35:27'),
(483, 1, 'store', 'fa', NULL, 56, 296, NULL, '2023-10-24 07:35:30', '2023-10-24 07:35:30'),
(484, 1, 'update', 'fa', 474, 55, 290, 'Contact', '2023-10-24 08:30:44', '2023-10-24 08:30:44'),
(485, 1, 'store', 'fa', NULL, 54, 282, 'test', '2023-10-24 08:39:01', '2023-10-24 08:39:01'),
(486, 1, 'store', 'fa', NULL, 60, 302, 'learnpress', '2023-10-28 01:48:17', '2023-10-28 01:48:17'),
(487, 1, 'store', 'fa', NULL, 60, 302, 'thimpress', '2023-10-28 01:48:27', '2023-10-28 01:48:27'),
(488, 1, 'store', 'fa', NULL, 59, 299, NULL, '2023-10-28 01:56:48', '2023-10-28 01:56:48'),
(489, 1, 'store', 'fa', NULL, 61, 307, NULL, '2023-10-28 02:09:05', '2023-10-28 02:09:05'),
(490, 1, 'update', 'fa', 489, 61, 307, NULL, '2023-10-28 02:09:45', '2023-10-28 02:09:45'),
(491, 1, 'update', 'fa', 489, 61, 308, '/java-spring-tutorial', '2023-10-28 02:51:52', '2023-10-28 02:51:52'),
(492, 1, 'store', 'fa', NULL, 61, 308, '/ Online-Course', '2023-10-28 03:36:49', '2023-10-28 03:36:49'),
(493, 1, 'update', 'fa', 492, 61, 308, '/ Online-Course', '2023-10-28 03:37:01', '2023-10-28 03:37:01'),
(494, 1, 'update', 'fa', 492, 61, 307, NULL, '2023-10-28 03:59:57', '2023-10-28 03:59:57'),
(495, 1, 'update', 'fa', 489, 61, 307, NULL, '2023-10-28 04:00:24', '2023-10-28 04:00:24'),
(496, 1, 'update', 'fa', 362, 28, 168, 'Top Categories', '2023-10-28 04:18:53', '2023-10-28 04:18:53'),
(497, 1, 'update', 'fa', 362, 28, 168, 'Top Categories', '2023-10-28 04:18:58', '2023-10-28 04:18:58'),
(498, 1, 'store', 'en', NULL, 68, 338, '3', '2023-11-01 07:51:15', '2023-11-01 07:51:15'),
(499, 1, 'store', 'en', NULL, 68, 338, '3', '2023-11-01 07:52:25', '2023-11-01 07:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `field_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `view` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `field_id`, `role_id`, `title`, `address`, `view`, `created_at`, `updated_at`) VALUES
(10, 248, NULL, 'course detail', 'course', 'course.courseDetail', '2023-10-21 02:03:04', '2023-11-06 08:48:26'),
(13, NULL, NULL, 'courses', 'courses', 'course.courses', '2023-10-21 02:47:16', '2023-11-06 08:48:26'),
(14, NULL, NULL, 'About', 'about-us', 'main.about', '2023-10-22 03:09:37', '2023-10-28 04:05:51'),
(15, 266, NULL, 'category courses', 'category-courses', 'course.categoryCourse', '2023-10-22 08:24:24', '2023-10-29 07:03:20'),
(16, NULL, NULL, 'Contact', 'contact', 'main.contact', '2023-10-24 03:55:58', '2023-11-06 08:48:26'),
(17, 309, NULL, 'blog detail', 'blogDetail', 'blog.blogDetail', '2023-10-28 02:50:58', '2023-10-29 07:17:50'),
(18, 313, NULL, 'Tag', 'tag', 'blog.tags', '2023-10-28 07:45:25', '2023-10-28 07:49:49'),
(19, NULL, NULL, 'blog', 'blog', 'blog.blog', '2023-10-29 07:19:11', '2023-10-29 07:19:11'),
(20, NULL, NULL, 'login', 'login', 'user.login', '2023-10-30 02:46:09', '2023-10-30 02:51:09'),
(21, NULL, 8, 'profile', 'profile', 'user.profile', '2023-10-31 03:51:59', '2023-10-31 03:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `background_color` varchar(255) NOT NULL,
  `theme_color` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `lang_abbr` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `short_name`, `background_color`, `theme_color`, `description`, `keywords`, `favicon`, `lang_abbr`, `created_at`, `updated_at`) VALUES
(1, 'کافه دریم', 'کافه دریم', '#ab7838', '#ab7838', 'ارایه کننده بهترین محصولات قهوه', 'قهوه', 'icon1699182932.png', 'fa', '2022-05-25 16:24:43', '2023-11-05 07:45:33'),
(2, 'asdasd', 'asdasd', '#b12020', '#7a1f1f', 'asdasddas', 'asdads', 'icon1699181375.png', 'en', '2023-11-05 07:19:36', '2023-11-05 07:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `trashes`
--

CREATE TABLE `trashes` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` longtext DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `sort` int(45) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `trashes`
--

INSERT INTO `trashes` (`id`, `record_id`, `category_id`, `group_id`, `field_id`, `value`, `parent_id`, `sort`, `report_id`, `created_at`, `updated_at`) VALUES
(127, 127, 13, '6327f6c7282b3', 29, '6327f6add5916', NULL, 1663563463, 1, '2022-09-19 05:57:43', '2022-10-18 09:24:19'),
(128, 110, 9, '631eb229e2698', 22, 'عکس', '631eb14fdf915', 1662956073, 3, '2022-09-12 04:14:33', '2022-10-19 14:14:26'),
(129, 111, 9, '631eb229e2698', 23, '6', '631eb14fdf915', 1662956073, 3, '2022-09-12 04:14:33', '2022-10-19 14:14:26'),
(130, 109, 13, '631eb14fdf915', 29, '628e76487f70f', NULL, 1662955855, 2, '2022-09-12 04:10:55', '2022-10-19 14:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `trash_langs`
--

CREATE TABLE `trash_langs` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `lang_abbr` varchar(5) NOT NULL,
  `value` longtext DEFAULT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `trash_langs`
--

INSERT INTO `trash_langs` (`id`, `record_id`, `lang_abbr`, `value`, `report_id`, `created_at`, `updated_at`) VALUES
(98, 110, 'fa', 'عکس', 3, '2022-09-12 04:14:33', '2022-10-19 14:14:26'),
(99, 111, 'fa', '6', 3, '2022-09-12 04:14:33', '2022-10-19 14:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `record_id`, `created_at`, `updated_at`) VALUES
(13, 'maryam azizian', '$2y$10$L4LnU5II6hRiChTS/RK.1u64SutL1GdneSA0SjK8X4eJ/TT.LBhoy', 8, 2, '2023-10-30 03:22:35', '2023-10-30 03:22:35'),
(14, 'maryam', '$2y$10$wONubnXY5AlNLmwCaV6ry.7XjDbBj4XRZpVBQ6iIlVtDsgdgdm7NW', 8, 3, '2023-10-31 02:36:07', '2023-10-31 02:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `category_slug` varchar(45) NOT NULL,
  `login_route_id` int(11) NOT NULL,
  `landing_route_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `title`, `category_slug`, `login_route_id`, `landing_route_id`, `created_at`, `updated_at`) VALUES
(8, 'User', 'users', 20, 13, '2023-10-30 03:21:25', '2023-10-30 03:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(45) NOT NULL,
  `route_id` int(11) DEFAULT NULL,
  `record_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `platform` varchar(45) DEFAULT NULL,
  `os` varchar(45) DEFAULT NULL,
  `browser` varchar(45) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `ip`, `route_id`, `record_id`, `user_id`, `platform`, `os`, `browser`, `date`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-04', '2022-04-24 13:39:04', '2022-04-24 13:39:04'),
(2, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-04', '2022-04-24 17:01:58', '2022-04-24 17:01:58'),
(3, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-09', '2022-04-29 08:27:43', '2022-04-29 08:27:43'),
(4, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-09', '2022-04-29 08:35:57', '2022-04-29 08:35:57'),
(5, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-15', '2022-05-05 08:22:23', '2022-05-05 08:22:23'),
(6, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-15', '2022-05-05 16:51:40', '2022-05-05 16:51:40'),
(7, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-16', '2022-05-06 06:50:19', '2022-05-06 06:50:19'),
(8, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-16', '2022-05-06 11:20:17', '2022-05-06 11:20:17'),
(9, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-16', '2022-05-06 11:20:50', '2022-05-06 11:20:50'),
(10, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-16', '2022-05-06 11:30:25', '2022-05-06 11:30:25'),
(11, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-16', '2022-05-06 11:30:41', '2022-05-06 11:30:41'),
(12, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-16', '2022-05-06 11:30:47', '2022-05-06 11:30:47'),
(13, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 09:25:38', '2022-05-13 09:25:38'),
(14, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 09:52:50', '2022-05-13 09:52:50'),
(15, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 09:53:22', '2022-05-13 09:53:22'),
(16, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 09:54:44', '2022-05-13 09:54:44'),
(17, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 10:26:44', '2022-05-13 10:26:44'),
(18, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 15:54:19', '2022-05-13 15:54:19'),
(19, '127.0.0.1', 3, NULL, 2, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 16:11:58', '2022-05-13 16:11:58'),
(20, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 19:27:43', '2022-05-13 19:27:43'),
(21, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 19:28:23', '2022-05-13 19:28:23'),
(22, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 19:28:26', '2022-05-13 19:28:26'),
(23, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 19:28:29', '2022-05-13 19:28:29'),
(24, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-23', '2022-05-13 19:28:32', '2022-05-13 19:28:32'),
(25, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:35:26', '2022-05-13 19:35:26'),
(26, '127.0.0.1', 3, NULL, 2, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:35:31', '2022-05-13 19:35:31'),
(27, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:36:04', '2022-05-13 19:36:04'),
(28, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:40:33', '2022-05-13 19:40:33'),
(29, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:40:40', '2022-05-13 19:40:40'),
(30, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:40:51', '2022-05-13 19:40:51'),
(31, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:40:55', '2022-05-13 19:40:55'),
(32, '127.0.0.1', 3, NULL, 2, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:41:09', '2022-05-13 19:41:09'),
(33, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:41:12', '2022-05-13 19:41:12'),
(34, '127.0.0.1', 1, NULL, 2, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:53:34', '2022-05-13 19:53:34'),
(35, '127.0.0.1', 3, NULL, 2, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:53:42', '2022-05-13 19:53:42'),
(36, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:53:45', '2022-05-13 19:53:45'),
(37, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:53:53', '2022-05-13 19:53:53'),
(38, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:53:56', '2022-05-13 19:53:56'),
(39, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-13 19:54:02', '2022-05-13 19:54:02'),
(40, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:00:12', '2022-05-14 16:00:12'),
(41, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:00:22', '2022-05-14 16:00:22'),
(42, '127.0.0.1', 3, NULL, 2, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:01:13', '2022-05-14 16:01:13'),
(43, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:01:39', '2022-05-14 16:01:39'),
(44, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:01:44', '2022-05-14 16:01:44'),
(45, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:01:54', '2022-05-14 16:01:54'),
(46, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:07:47', '2022-05-14 16:07:47'),
(47, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:07:59', '2022-05-14 16:07:59'),
(48, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:11:44', '2022-05-14 16:11:44'),
(49, '127.0.0.1', 3, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:12:51', '2022-05-14 16:12:51'),
(50, '127.0.0.1', 3, NULL, 2, 'Desktop', 'Windows', 'Chrome', '1401-02-24', '2022-05-14 16:18:29', '2022-05-14 16:18:29'),
(51, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 15:08:21', '2022-05-25 15:08:21'),
(52, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 15:44:52', '2022-05-25 15:44:52'),
(53, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 15:45:44', '2022-05-25 15:45:44'),
(54, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 15:45:53', '2022-05-25 15:45:53'),
(55, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 15:47:14', '2022-05-25 15:47:14'),
(56, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 15:47:46', '2022-05-25 15:47:46'),
(57, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:20:07', '2022-05-25 16:20:07'),
(58, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:24:48', '2022-05-25 16:24:48'),
(59, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:27:42', '2022-05-25 16:27:42'),
(60, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:28:39', '2022-05-25 16:28:39'),
(61, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:29:53', '2022-05-25 16:29:53'),
(62, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:30:41', '2022-05-25 16:30:41'),
(63, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:31:31', '2022-05-25 16:31:31'),
(64, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:32:31', '2022-05-25 16:32:31'),
(65, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:33:57', '2022-05-25 16:33:57'),
(66, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:36:01', '2022-05-25 16:36:01'),
(67, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:36:34', '2022-05-25 16:36:34'),
(68, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:37:26', '2022-05-25 16:37:26'),
(69, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:37:58', '2022-05-25 16:37:58'),
(70, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:39:04', '2022-05-25 16:39:04'),
(71, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:39:37', '2022-05-25 16:39:37'),
(72, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:41:02', '2022-05-25 16:41:02'),
(73, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:56:56', '2022-05-25 16:56:56'),
(74, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:59:21', '2022-05-25 16:59:21'),
(75, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:59:42', '2022-05-25 16:59:42'),
(76, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 16:59:59', '2022-05-25 16:59:59'),
(77, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 17:09:32', '2022-05-25 17:09:32'),
(78, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:14:28', '2022-05-25 18:14:28'),
(79, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:30:00', '2022-05-25 18:30:00'),
(80, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:30:35', '2022-05-25 18:30:35'),
(81, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:30:44', '2022-05-25 18:30:44'),
(82, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:32:43', '2022-05-25 18:32:43'),
(83, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:34:01', '2022-05-25 18:34:01'),
(84, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:34:44', '2022-05-25 18:34:44'),
(85, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:38:31', '2022-05-25 18:38:31'),
(86, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:39:10', '2022-05-25 18:39:10'),
(87, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:42:13', '2022-05-25 18:42:13'),
(88, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:42:33', '2022-05-25 18:42:33'),
(89, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:43:34', '2022-05-25 18:43:34'),
(90, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:44:22', '2022-05-25 18:44:22'),
(91, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:45:28', '2022-05-25 18:45:28'),
(92, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:47:59', '2022-05-25 18:47:59'),
(93, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:48:39', '2022-05-25 18:48:39'),
(94, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 18:51:10', '2022-05-25 18:51:10'),
(95, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-04', '2022-05-25 19:29:15', '2022-05-25 19:29:15'),
(96, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-25 19:31:15', '2022-05-25 19:31:15'),
(97, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 10:26:00', '2022-05-26 10:26:00'),
(98, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 10:26:21', '2022-05-26 10:26:21'),
(99, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 10:27:16', '2022-05-26 10:27:16'),
(100, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 10:28:28', '2022-05-26 10:28:28'),
(101, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 10:49:47', '2022-05-26 10:49:47'),
(102, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 10:50:01', '2022-05-26 10:50:01'),
(103, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 10:51:24', '2022-05-26 10:51:24'),
(104, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 10:52:43', '2022-05-26 10:52:43'),
(105, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 11:14:59', '2022-05-26 11:14:59'),
(106, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 11:15:27', '2022-05-26 11:15:27'),
(107, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 11:16:03', '2022-05-26 11:16:03'),
(108, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 11:16:11', '2022-05-26 11:16:11'),
(109, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 11:16:38', '2022-05-26 11:16:38'),
(110, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 11:18:12', '2022-05-26 11:18:12'),
(111, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 11:18:36', '2022-05-26 11:18:36'),
(112, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 11:18:51', '2022-05-26 11:18:51'),
(113, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 11:18:57', '2022-05-26 11:18:57'),
(114, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-05', '2022-05-26 16:06:16', '2022-05-26 16:06:16'),
(115, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-10', '2022-05-31 14:00:09', '2022-05-31 14:00:09'),
(116, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-11', '2022-06-01 14:45:33', '2022-06-01 14:45:33'),
(117, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:42:16', '2022-06-02 14:42:16'),
(118, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:45:35', '2022-06-02 14:45:35'),
(119, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:48:58', '2022-06-02 14:48:58'),
(120, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:49:20', '2022-06-02 14:49:20'),
(121, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:53:20', '2022-06-02 14:53:20'),
(122, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:54:40', '2022-06-02 14:54:40'),
(123, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:57:11', '2022-06-02 14:57:11'),
(124, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:57:38', '2022-06-02 14:57:38'),
(125, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:58:08', '2022-06-02 14:58:08'),
(126, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:58:09', '2022-06-02 14:58:09'),
(127, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:58:13', '2022-06-02 14:58:13'),
(128, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:59:15', '2022-06-02 14:59:15'),
(129, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 14:59:31', '2022-06-02 14:59:31'),
(130, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:00:49', '2022-06-02 15:00:49'),
(131, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:01:03', '2022-06-02 15:01:03'),
(132, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:02:59', '2022-06-02 15:02:59'),
(133, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:03:30', '2022-06-02 15:03:30'),
(134, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:04:22', '2022-06-02 15:04:22'),
(135, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:06:14', '2022-06-02 15:06:14'),
(136, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:06:22', '2022-06-02 15:06:22'),
(137, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:06:30', '2022-06-02 15:06:30'),
(138, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:10:11', '2022-06-02 15:10:11'),
(139, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:10:13', '2022-06-02 15:10:13'),
(140, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:10:17', '2022-06-02 15:10:17'),
(141, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:10:19', '2022-06-02 15:10:19'),
(142, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:11:29', '2022-06-02 15:11:29'),
(143, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:17:04', '2022-06-02 15:17:04'),
(144, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:17:34', '2022-06-02 15:17:34'),
(145, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:18:23', '2022-06-02 15:18:23'),
(146, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:19:31', '2022-06-02 15:19:31'),
(147, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:20:48', '2022-06-02 15:20:48'),
(148, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:20:54', '2022-06-02 15:20:54'),
(149, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:21:21', '2022-06-02 15:21:21'),
(150, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:26:17', '2022-06-02 15:26:17'),
(151, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:26:28', '2022-06-02 15:26:28'),
(152, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:28:25', '2022-06-02 15:28:25'),
(153, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:28:50', '2022-06-02 15:28:50'),
(154, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:30:13', '2022-06-02 15:30:13'),
(155, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:30:37', '2022-06-02 15:30:37'),
(156, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:30:48', '2022-06-02 15:30:48'),
(157, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:31:20', '2022-06-02 15:31:20'),
(158, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:31:28', '2022-06-02 15:31:28'),
(159, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:32:10', '2022-06-02 15:32:10'),
(160, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:32:12', '2022-06-02 15:32:12'),
(161, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:32:42', '2022-06-02 15:32:42'),
(162, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:34:22', '2022-06-02 15:34:22'),
(163, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:34:50', '2022-06-02 15:34:50'),
(164, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:38:39', '2022-06-02 15:38:39'),
(165, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:39:25', '2022-06-02 15:39:25'),
(166, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:39:57', '2022-06-02 15:39:57'),
(167, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:40:39', '2022-06-02 15:40:39'),
(168, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:42:13', '2022-06-02 15:42:13'),
(169, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 15:43:24', '2022-06-02 15:43:24'),
(170, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:01:50', '2022-06-02 16:01:50'),
(171, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:01:59', '2022-06-02 16:01:59'),
(172, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:02:07', '2022-06-02 16:02:07'),
(173, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:07:50', '2022-06-02 16:07:50'),
(174, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:07:57', '2022-06-02 16:07:57'),
(175, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:08:04', '2022-06-02 16:08:04'),
(176, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:09:10', '2022-06-02 16:09:10'),
(177, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:09:52', '2022-06-02 16:09:52'),
(178, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:11:48', '2022-06-02 16:11:48'),
(179, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:12:07', '2022-06-02 16:12:07'),
(180, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:31:14', '2022-06-02 16:31:14'),
(181, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:31:34', '2022-06-02 16:31:34'),
(182, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:31:47', '2022-06-02 16:31:47'),
(183, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:41:58', '2022-06-02 16:41:58'),
(184, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:53:58', '2022-06-02 16:53:58'),
(185, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:54:06', '2022-06-02 16:54:06'),
(186, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 16:55:35', '2022-06-02 16:55:35'),
(187, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:04:52', '2022-06-02 19:04:52'),
(188, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:06:16', '2022-06-02 19:06:16'),
(189, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:07:01', '2022-06-02 19:07:01'),
(190, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:07:53', '2022-06-02 19:07:53'),
(191, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:08:41', '2022-06-02 19:08:41'),
(192, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:23:16', '2022-06-02 19:23:16'),
(193, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:23:19', '2022-06-02 19:23:19'),
(194, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:24:36', '2022-06-02 19:24:36'),
(195, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:25:09', '2022-06-02 19:25:09'),
(196, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:25:54', '2022-06-02 19:25:54'),
(197, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:27:03', '2022-06-02 19:27:03'),
(198, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:27:31', '2022-06-02 19:27:31'),
(199, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-12', '2022-06-02 19:27:49', '2022-06-02 19:27:49'),
(200, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-02 19:30:45', '2022-06-02 19:30:45'),
(201, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-02 19:33:09', '2022-06-02 19:33:09'),
(202, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-02 19:34:08', '2022-06-02 19:34:08'),
(203, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-02 19:34:16', '2022-06-02 19:34:16'),
(204, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-02 19:34:28', '2022-06-02 19:34:28'),
(205, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-02 19:34:31', '2022-06-02 19:34:31'),
(206, '127.0.0.1', 5, 628, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-02 19:35:14', '2022-06-02 19:35:14'),
(207, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-02 20:01:53', '2022-06-02 20:01:53'),
(208, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-02 20:02:03', '2022-06-02 20:02:03'),
(209, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-03 05:22:38', '2022-06-03 05:22:38'),
(210, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-03 05:22:47', '2022-06-03 05:22:47'),
(211, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-03 05:58:38', '2022-06-03 05:58:38'),
(212, '127.0.0.1', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-13', '2022-06-03 05:58:41', '2022-06-03 05:58:41'),
(213, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-03-16', '2022-06-06 14:14:34', '2022-06-06 14:14:34'),
(214, '5.219.176.144', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-05-07', '2022-07-29 16:21:43', '2022-07-29 16:21:43'),
(215, '5.219.176.144', 6, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '1401-05-07', '2022-07-29 16:27:45', '2022-07-29 16:27:45'),
(216, '42.236.10.110', NULL, NULL, NULL, 'Tablet', 'Android', 'MIUI Browser', '1401-05-08', '2022-07-29 23:32:05', '2022-07-29 23:32:05'),
(217, '180.163.220.68', NULL, NULL, NULL, 'Tablet', 'Android', 'MIUI Browser', '1401-05-08', '2022-07-29 23:35:52', '2022-07-29 23:35:52'),
(218, '211.176.125.70', NULL, NULL, NULL, 'Desktop', 'Windows', 'Internet Explorer', '1401-05-08', '2022-07-30 15:53:14', '2022-07-30 15:53:14'),
(219, '18.206.55.48', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-05-09', '2022-07-31 14:07:16', '2022-07-31 14:07:16'),
(220, '18.206.55.48', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-05-09', '2022-07-31 14:07:17', '2022-07-31 14:07:17'),
(221, '222.237.120.205', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-05-09', '2022-07-31 14:07:36', '2022-07-31 14:07:36'),
(222, '27.115.124.101', NULL, NULL, NULL, 'Tablet', 'Android', 'MIUI Browser', '1401-05-10', '2022-08-01 14:52:08', '2022-08-01 14:52:08'),
(223, '44.200.211.167', NULL, NULL, NULL, 'Desktop', 'Windows', 'Safari', '1401-05-14', '2022-08-05 00:49:57', '2022-08-05 00:49:57'),
(224, '65.154.226.171', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-05-14', '2022-08-05 14:24:44', '2022-08-05 14:24:44'),
(225, '65.154.226.171', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-05-14', '2022-08-05 14:24:44', '2022-08-05 14:24:44'),
(226, '65.154.226.170', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-05-15', '2022-08-06 02:07:49', '2022-08-06 02:07:49'),
(227, '205.169.39.35', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-05-15', '2022-08-06 02:50:21', '2022-08-06 02:50:21'),
(228, '205.185.116.25', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-05-19', '2022-08-10 01:33:58', '2022-08-10 01:33:58'),
(229, '205.185.116.89', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-05-19', '2022-08-10 01:38:53', '2022-08-10 01:38:53'),
(230, '8.31.2.47', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-05-19', '2022-08-10 03:02:31', '2022-08-10 03:02:31'),
(231, '209.141.36.231', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-05-19', '2022-08-10 06:14:46', '2022-08-10 06:14:46'),
(232, '205.185.122.184', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-05-19', '2022-08-10 06:56:39', '2022-08-10 06:56:39'),
(233, '205.185.122.184', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-05-19', '2022-08-10 13:58:29', '2022-08-10 13:58:29'),
(234, '180.163.220.5', NULL, NULL, NULL, 'Tablet', 'Android', 'MIUI Browser', '1401-05-19', '2022-08-10 17:31:20', '2022-08-10 17:31:20'),
(235, '44.205.5.130', NULL, NULL, NULL, 'Desktop', 'Windows', 'Safari', '1401-05-21', '2022-08-12 03:20:13', '2022-08-12 03:20:13'),
(236, '42.236.10.93', NULL, NULL, NULL, 'Tablet', 'Android', 'MIUI Browser', '1401-05-24', '2022-08-15 09:49:37', '2022-08-15 09:49:37'),
(237, '42.236.10.93', NULL, NULL, NULL, 'Tablet', 'Android', 'MIUI Browser', '1401-05-24', '2022-08-15 09:49:46', '2022-08-15 09:49:46'),
(238, '180.163.220.3', NULL, NULL, NULL, 'Tablet', 'Android', 'MIUI Browser', '1401-05-27', '2022-08-18 13:28:29', '2022-08-18 13:28:29'),
(239, '44.200.238.234', NULL, NULL, NULL, 'Desktop', 'Windows', 'Safari', '1401-05-29', '2022-08-20 05:54:34', '2022-08-20 05:54:34'),
(240, '44.200.238.234', NULL, NULL, NULL, 'Desktop', 'Windows', 'Safari', '1401-05-29', '2022-08-20 05:54:36', '2022-08-20 05:54:36'),
(241, '180.163.220.4', NULL, NULL, NULL, 'Tablet', 'Android', 'MIUI Browser', '1401-05-31', '2022-08-21 21:15:41', '2022-08-21 21:15:41'),
(242, '42.236.10.75', NULL, NULL, NULL, 'Tablet', 'Android', 'MIUI Browser', '1401-05-31', '2022-08-21 21:16:25', '2022-08-21 21:16:25'),
(243, '3.235.132.24', NULL, NULL, NULL, 'Desktop', 'Windows', 'Safari', '1401-06-02', '2022-08-24 03:39:35', '2022-08-24 03:39:35'),
(244, '54.236.55.173', NULL, NULL, NULL, 'Desktop', 'Windows', 'Safari', '1401-06-07', '2022-08-28 20:26:43', '2022-08-28 20:26:43'),
(245, '27.115.124.109', NULL, NULL, NULL, 'Tablet', 'Android', 'MIUI Browser', '1401-06-08', '2022-08-29 22:03:56', '2022-08-29 22:03:56'),
(246, '209.141.35.128', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-11', '2022-09-02 07:55:02', '2022-09-02 07:55:02'),
(247, '209.141.49.169', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-11', '2022-09-02 12:18:18', '2022-09-02 12:18:18'),
(248, '209.141.36.231', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-11', '2022-09-02 16:55:28', '2022-09-02 16:55:28'),
(249, '205.185.116.89', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-11', '2022-09-02 16:58:58', '2022-09-02 16:58:58'),
(250, '209.141.36.112', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-12', '2022-09-03 13:58:34', '2022-09-03 13:58:34'),
(251, '209.141.41.193', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-12', '2022-09-03 14:00:28', '2022-09-03 14:00:28'),
(252, '205.185.116.25', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-12', '2022-09-03 14:16:41', '2022-09-03 14:16:41'),
(253, '209.141.41.193', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-12', '2022-09-03 14:17:33', '2022-09-03 14:17:33'),
(254, '44.211.88.18', NULL, NULL, NULL, 'Desktop', 'Windows', 'Safari', '1401-06-13', '2022-09-04 09:02:10', '2022-09-04 09:02:10'),
(255, '209.141.36.112', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-13', '2022-09-04 09:56:12', '2022-09-04 09:56:12'),
(256, '205.185.121.69', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-13', '2022-09-04 09:57:30', '2022-09-04 09:57:30'),
(257, '209.141.34.187', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-13', '2022-09-04 11:05:07', '2022-09-04 11:05:07'),
(258, '209.141.55.120', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-13', '2022-09-04 11:06:49', '2022-09-04 11:06:49'),
(259, '209.141.36.231', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-13', '2022-09-04 17:03:37', '2022-09-04 17:03:37'),
(260, '205.185.116.25', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-13', '2022-09-04 17:05:56', '2022-09-04 17:05:56'),
(261, '8.45.47.67', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-15', '2022-09-06 03:10:13', '2022-09-06 03:10:13'),
(262, '209.141.35.128', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-16', '2022-09-07 03:02:51', '2022-09-07 03:02:51'),
(263, '209.141.34.187', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-16', '2022-09-07 11:38:22', '2022-09-07 11:38:22'),
(264, '205.185.116.89', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-16', '2022-09-07 11:42:33', '2022-09-07 11:42:33'),
(265, '205.185.116.89', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-17', '2022-09-08 03:49:13', '2022-09-08 03:49:13'),
(266, '209.141.49.169', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '1401-06-17', '2022-09-08 10:54:44', '2022-09-08 10:54:44'),
(267, '3.226.252.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Safari', '1401-06-20', '2022-09-10 20:04:54', '2022-09-10 20:04:54'),
(268, '37.254.235.154', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-06-20', '2022-09-11 14:02:47', '2022-09-11 14:02:47'),
(269, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-06-23', '2022-09-14 05:52:04', '2022-09-14 05:52:04'),
(270, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-06-23', '2022-09-14 05:52:51', '2022-09-14 05:52:51'),
(271, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-06-24', '2022-09-15 04:53:05', '2022-09-15 04:53:05'),
(272, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-06-28', '2022-09-19 05:15:21', '2022-09-19 05:15:21'),
(273, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-06-29', '2022-09-20 05:34:40', '2022-09-20 05:34:40'),
(274, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-06-31', '2022-09-22 05:29:37', '2022-09-22 05:29:37'),
(275, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-02', '2022-09-24 05:44:52', '2022-09-24 05:44:52'),
(276, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-10', '2022-10-02 14:15:36', '2022-10-02 14:15:36'),
(277, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-11', '2022-10-03 05:13:16', '2022-10-03 05:13:16'),
(278, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-14', '2022-10-06 10:56:55', '2022-10-06 10:56:55'),
(279, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-16', '2022-10-08 05:31:53', '2022-10-08 05:31:53'),
(280, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-16', '2022-10-08 05:32:04', '2022-10-08 05:32:04'),
(281, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-19', '2022-10-11 13:20:41', '2022-10-11 13:20:41'),
(282, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-20', '2022-10-12 05:47:50', '2022-10-12 05:47:50'),
(283, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-21', '2022-10-13 12:21:40', '2022-10-13 12:21:40'),
(284, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-23', '2022-10-15 06:53:33', '2022-10-15 06:53:33'),
(285, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-26', '2022-10-18 07:27:23', '2022-10-18 07:27:23'),
(286, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-27', '2022-10-19 09:57:17', '2022-10-19 09:57:17'),
(287, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-27', '2022-10-19 14:10:02', '2022-10-19 14:10:02'),
(288, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-07-28', '2022-10-20 06:47:26', '2022-10-20 06:47:26'),
(289, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-08-01', '2022-10-23 05:30:52', '2022-10-23 05:30:52'),
(290, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-08-03', '2022-10-25 12:28:08', '2022-10-25 12:28:08'),
(291, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-08-05', '2022-10-27 13:17:34', '2022-10-27 13:17:34'),
(292, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-08-14', '2022-11-05 13:49:56', '2022-11-05 13:49:56'),
(293, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '1401-08-15', '2022-11-06 07:09:43', '2022-11-06 07:09:43'),
(294, '127.0.0.1', 7, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-07', '2023-10-07 11:52:35', '2023-10-07 11:52:35'),
(295, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-07', '2023-10-07 11:52:49', '2023-10-07 11:52:49'),
(296, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-07', '2023-10-07 11:52:55', '2023-10-07 11:52:55'),
(297, '127.0.0.1', 7, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-07', '2023-10-07 11:53:23', '2023-10-07 11:53:23'),
(298, '127.0.0.1', 7, 46, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-07', '2023-10-07 11:58:42', '2023-10-07 11:58:42'),
(299, '127.0.0.1', 7, 46, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-07', '2023-10-07 11:59:04', '2023-10-07 11:59:04'),
(300, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 05:31:44', '2023-10-08 05:31:44'),
(301, '127.0.0.1', 7, 46, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 06:17:12', '2023-10-08 06:17:12'),
(302, '127.0.0.1', 7, 47, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 06:18:04', '2023-10-08 06:18:04'),
(303, '127.0.0.1', 7, 58, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 07:18:00', '2023-10-08 07:18:00'),
(304, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 07:19:37', '2023-10-08 07:19:37'),
(305, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 07:21:27', '2023-10-08 07:21:27'),
(306, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 09:40:15', '2023-10-08 09:40:15'),
(307, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 09:41:32', '2023-10-08 09:41:32'),
(308, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 10:57:50', '2023-10-08 10:57:50'),
(309, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 10:58:01', '2023-10-08 10:58:01'),
(310, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 10:58:49', '2023-10-08 10:58:49'),
(311, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:00:01', '2023-10-08 11:00:01'),
(312, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:00:12', '2023-10-08 11:00:12'),
(313, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:00:41', '2023-10-08 11:00:41'),
(314, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:00:53', '2023-10-08 11:00:53'),
(315, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:00:58', '2023-10-08 11:00:58'),
(316, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:01:03', '2023-10-08 11:01:03'),
(317, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:01:10', '2023-10-08 11:01:10'),
(318, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:02:09', '2023-10-08 11:02:09'),
(319, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:02:13', '2023-10-08 11:02:13'),
(320, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:02:15', '2023-10-08 11:02:15'),
(321, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:02:16', '2023-10-08 11:02:16'),
(322, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:02:18', '2023-10-08 11:02:18'),
(323, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:02:20', '2023-10-08 11:02:20'),
(324, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:03:10', '2023-10-08 11:03:10'),
(325, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:03:21', '2023-10-08 11:03:21'),
(326, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:03:23', '2023-10-08 11:03:23'),
(327, '127.0.0.1', 7, 56, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-08', '2023-10-08 11:06:01', '2023-10-08 11:06:01'),
(328, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 11:02:47', '2023-10-09 11:02:47'),
(329, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 11:03:09', '2023-10-09 11:03:09'),
(330, '127.0.0.1', 9, NULL, 5, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 11:03:16', '2023-10-09 11:03:16'),
(331, '127.0.0.1', 9, NULL, 5, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 11:03:39', '2023-10-09 11:03:39'),
(332, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 11:03:41', '2023-10-09 11:03:41'),
(333, '127.0.0.1', 9, NULL, 5, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 11:05:03', '2023-10-09 11:05:03'),
(334, '127.0.0.1', 9, NULL, 5, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 11:30:54', '2023-10-09 11:30:54'),
(335, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 11:58:38', '2023-10-09 11:58:38'),
(336, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 11:58:42', '2023-10-09 11:58:42'),
(337, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:00:41', '2023-10-09 12:00:41'),
(338, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:00:47', '2023-10-09 12:00:47'),
(339, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:02:17', '2023-10-09 12:02:17'),
(340, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:02:45', '2023-10-09 12:02:45'),
(341, '127.0.0.1', 7, 60, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:04:52', '2023-10-09 12:04:52'),
(342, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:05:08', '2023-10-09 12:05:08'),
(343, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:05:11', '2023-10-09 12:05:11'),
(344, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:05:19', '2023-10-09 12:05:19'),
(345, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:12:04', '2023-10-09 12:12:04'),
(346, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:13:11', '2023-10-09 12:13:11'),
(347, '127.0.0.1', NULL, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:17:16', '2023-10-09 12:17:16'),
(348, '127.0.0.1', 7, 60, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:19:32', '2023-10-09 12:19:32'),
(349, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:19:39', '2023-10-09 12:19:39'),
(350, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:20:53', '2023-10-09 12:20:53'),
(351, '127.0.0.1', 8, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:21:00', '2023-10-09 12:21:00'),
(352, '127.0.0.1', 7, 60, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:21:35', '2023-10-09 12:21:35'),
(353, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:21:42', '2023-10-09 12:21:42'),
(354, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:21:50', '2023-10-09 12:21:50'),
(355, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:24:34', '2023-10-09 12:24:34'),
(356, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:24:43', '2023-10-09 12:24:43'),
(357, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:24:53', '2023-10-09 12:24:53'),
(358, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:28:43', '2023-10-09 12:28:43'),
(359, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:28:48', '2023-10-09 12:28:48'),
(360, '127.0.0.1', 7, 60, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:28:52', '2023-10-09 12:28:52'),
(361, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:28:56', '2023-10-09 12:28:56'),
(362, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-09', '2023-10-09 12:28:59', '2023-10-09 12:28:59'),
(363, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:05:36', '2023-10-10 06:05:36'),
(364, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:10:33', '2023-10-10 06:10:33'),
(365, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:16:14', '2023-10-10 06:16:14'),
(366, '127.0.0.1', 7, 60, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:16:21', '2023-10-10 06:16:21'),
(367, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:16:51', '2023-10-10 06:16:51'),
(368, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:16:55', '2023-10-10 06:16:55'),
(369, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:16:59', '2023-10-10 06:16:59'),
(370, '127.0.0.1', 7, 56, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:17:04', '2023-10-10 06:17:04'),
(371, '127.0.0.1', 8, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:17:55', '2023-10-10 06:17:55'),
(372, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:18:00', '2023-10-10 06:18:00'),
(373, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:18:02', '2023-10-10 06:18:02'),
(374, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:18:11', '2023-10-10 06:18:11'),
(375, '127.0.0.1', 7, 54, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:18:15', '2023-10-10 06:18:15'),
(376, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:28:53', '2023-10-10 06:28:53'),
(377, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:28:59', '2023-10-10 06:28:59'),
(378, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:29:01', '2023-10-10 06:29:01'),
(379, '127.0.0.1', 7, 54, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:29:07', '2023-10-10 06:29:07'),
(380, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:29:15', '2023-10-10 06:29:15'),
(381, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:29:18', '2023-10-10 06:29:18'),
(382, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:31:05', '2023-10-10 06:31:05'),
(383, '127.0.0.1', 7, 56, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:31:11', '2023-10-10 06:31:11'),
(384, '127.0.0.1', 7, 58, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:31:33', '2023-10-10 06:31:33'),
(385, '127.0.0.1', 9, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:31:40', '2023-10-10 06:31:40'),
(386, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:31:42', '2023-10-10 06:31:42'),
(387, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:31:47', '2023-10-10 06:31:47'),
(388, '127.0.0.1', 7, 58, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:31:52', '2023-10-10 06:31:52'),
(389, '127.0.0.1', 8, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 06:41:01', '2023-10-10 06:41:01'),
(390, '127.0.0.1', 7, 58, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 07:11:01', '2023-10-10 07:11:01'),
(391, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 11:50:54', '2023-10-10 11:50:54'),
(392, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 13:22:07', '2023-10-10 13:22:07'),
(393, '127.0.0.1', 8, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-10', '2023-10-10 13:22:08', '2023-10-10 13:22:08'),
(394, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-11', '2023-10-11 06:36:08', '2023-10-11 06:36:08');
INSERT INTO `visits` (`id`, `ip`, `route_id`, `record_id`, `user_id`, `platform`, `os`, `browser`, `date`, `created_at`, `updated_at`) VALUES
(395, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-16', '2023-10-16 03:51:59', '2023-10-16 03:51:59'),
(396, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-16', '2023-10-16 03:53:00', '2023-10-16 03:53:00'),
(397, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-16', '2023-10-16 03:53:18', '2023-10-16 03:53:18'),
(398, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-16', '2023-10-16 03:56:23', '2023-10-16 03:56:23'),
(399, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-16', '2023-10-16 03:58:32', '2023-10-16 03:58:32'),
(400, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-16', '2023-10-16 04:01:02', '2023-10-16 04:01:02'),
(401, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-16', '2023-10-16 04:06:28', '2023-10-16 04:06:28'),
(402, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-16', '2023-10-16 04:07:29', '2023-10-16 04:07:29'),
(403, '87.236.176.36', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-16', '2023-10-16 05:27:33', '2023-10-16 05:27:33'),
(404, '43.201.44.165', NULL, NULL, NULL, 'Tablet', 'Android', 'Microsoft Edge', '2023-10-16', '2023-10-16 11:25:53', '2023-10-16 11:25:53'),
(405, '43.201.44.165', NULL, NULL, NULL, 'Desktop', 'GNU/Linux', 'Chrome', '2023-10-16', '2023-10-16 11:25:53', '2023-10-16 11:25:53'),
(406, '43.201.44.165', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '2023-10-16', '2023-10-16 11:25:54', '2023-10-16 11:25:54'),
(407, '43.201.44.165', NULL, NULL, NULL, 'Mobile', 'Symbian OS', 'Safari', '2023-10-16', '2023-10-16 11:25:56', '2023-10-16 11:25:56'),
(408, '45.146.89.9', NULL, NULL, NULL, 'Desktop', 'GNU/Linux', 'Firefox', '2023-10-16', '2023-10-16 13:03:47', '2023-10-16 13:03:47'),
(409, '87.236.176.227', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-16', '2023-10-16 16:34:43', '2023-10-16 16:34:43'),
(410, '165.22.212.49', NULL, NULL, NULL, 'Desktop', 'GNU/Linux', 'Chrome', '2023-10-17', '2023-10-16 22:38:54', '2023-10-16 22:38:54'),
(411, '165.22.212.49', NULL, NULL, NULL, 'Desktop', 'GNU/Linux', 'Chrome', '2023-10-17', '2023-10-16 22:38:56', '2023-10-16 22:38:56'),
(412, '87.236.176.96', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-17', '2023-10-16 22:52:02', '2023-10-16 22:52:02'),
(413, '87.236.176.238', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-17', '2023-10-16 22:56:18', '2023-10-16 22:56:18'),
(414, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-17', '2023-10-17 02:02:54', '2023-10-17 02:02:54'),
(415, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-17', '2023-10-17 02:05:44', '2023-10-17 02:05:44'),
(416, '185.237.87.250', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-17', '2023-10-17 02:07:28', '2023-10-17 02:07:28'),
(417, '139.162.8.154', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '2023-10-17', '2023-10-17 03:23:33', '2023-10-17 03:23:33'),
(418, '139.162.8.154', NULL, NULL, NULL, 'Desktop', 'Mac', 'Chrome', '2023-10-17', '2023-10-17 03:25:39', '2023-10-17 03:25:39'),
(419, '185.237.84.84', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-17', '2023-10-17 03:42:11', '2023-10-17 03:42:11'),
(420, '183.129.153.157', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-17', '2023-10-17 04:31:42', '2023-10-17 04:31:42'),
(421, '5.75.210.207', NULL, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '2023-10-17', '2023-10-17 04:59:42', '2023-10-17 04:59:42'),
(422, '87.236.176.26', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-17', '2023-10-17 06:19:54', '2023-10-17 06:19:54'),
(423, '183.129.153.157', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-17', '2023-10-17 06:51:15', '2023-10-17 06:51:15'),
(424, '45.12.3.13', NULL, NULL, NULL, 'Desktop', 'Solaris', 'Unknown', '2023-10-17', '2023-10-17 09:55:05', '2023-10-17 09:55:05'),
(425, '87.236.176.142', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-17', '2023-10-17 12:48:18', '2023-10-17 12:48:18'),
(426, '87.236.176.185', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-17', '2023-10-17 19:53:54', '2023-10-17 19:53:54'),
(427, '87.236.176.138', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-18', '2023-10-17 23:58:24', '2023-10-17 23:58:24'),
(428, '45.12.3.13', NULL, NULL, NULL, 'Mobile', 'Android', 'WeChat', '2023-10-19', '2023-10-18 22:28:13', '2023-10-18 22:28:13'),
(429, '142.93.191.98', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-19', '2023-10-19 19:37:33', '2023-10-19 19:37:33'),
(430, '87.236.176.189', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-21', '2023-10-21 00:12:02', '2023-10-21 00:12:02'),
(431, '87.236.176.13', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-21', '2023-10-21 04:46:51', '2023-10-21 04:46:51'),
(432, '87.236.176.195', NULL, NULL, NULL, 'Desktop', 'Unknown', 'Unknown', '2023-10-21', '2023-10-21 11:10:32', '2023-10-21 11:10:32'),
(433, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:11:29', '2023-10-22 01:11:29'),
(434, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:12:19', '2023-10-22 01:12:19'),
(435, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:12:24', '2023-10-22 01:12:24'),
(436, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:12:59', '2023-10-22 01:12:59'),
(437, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:13:45', '2023-10-22 01:13:45'),
(438, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:13:54', '2023-10-22 01:13:54'),
(439, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:14:23', '2023-10-22 01:14:23'),
(440, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:16:32', '2023-10-22 01:16:32'),
(441, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:16:39', '2023-10-22 01:16:39'),
(442, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:17:52', '2023-10-22 01:17:52'),
(443, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:17:56', '2023-10-22 01:17:56'),
(444, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:17:58', '2023-10-22 01:17:58'),
(445, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:18:33', '2023-10-22 01:18:33'),
(446, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:18:36', '2023-10-22 01:18:36'),
(447, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:22:40', '2023-10-22 01:22:40'),
(448, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:23:53', '2023-10-22 01:23:53'),
(449, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:26:08', '2023-10-22 01:26:08'),
(450, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:26:10', '2023-10-22 01:26:10'),
(451, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:26:12', '2023-10-22 01:26:12'),
(452, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:26:13', '2023-10-22 01:26:13'),
(453, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:28:03', '2023-10-22 01:28:03'),
(454, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:28:06', '2023-10-22 01:28:06'),
(455, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:28:07', '2023-10-22 01:28:07'),
(456, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:29:32', '2023-10-22 01:29:32'),
(457, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:32:04', '2023-10-22 01:32:04'),
(458, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:32:35', '2023-10-22 01:32:35'),
(459, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:35:43', '2023-10-22 01:35:43'),
(460, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:37:34', '2023-10-22 01:37:34'),
(461, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:37:37', '2023-10-22 01:37:37'),
(462, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:37:44', '2023-10-22 01:37:44'),
(463, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:38:57', '2023-10-22 01:38:57'),
(464, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:39:16', '2023-10-22 01:39:16'),
(465, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:51:18', '2023-10-22 01:51:18'),
(466, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:53:59', '2023-10-22 01:53:59'),
(467, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:54:27', '2023-10-22 01:54:27'),
(468, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:57:49', '2023-10-22 01:57:49'),
(469, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:57:56', '2023-10-22 01:57:56'),
(470, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:58:09', '2023-10-22 01:58:09'),
(471, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:58:13', '2023-10-22 01:58:13'),
(472, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:58:20', '2023-10-22 01:58:20'),
(473, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 01:59:54', '2023-10-22 01:59:54'),
(474, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:01:34', '2023-10-22 02:01:34'),
(475, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:02:27', '2023-10-22 02:02:27'),
(476, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:02:43', '2023-10-22 02:02:43'),
(477, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:03:58', '2023-10-22 02:03:58'),
(478, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:04:02', '2023-10-22 02:04:02'),
(479, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:04:20', '2023-10-22 02:04:20'),
(480, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:04:37', '2023-10-22 02:04:37'),
(481, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:04:47', '2023-10-22 02:04:47'),
(482, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:07:18', '2023-10-22 02:07:18'),
(483, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:12:00', '2023-10-22 02:12:00'),
(484, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:18:17', '2023-10-22 02:18:17'),
(485, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:24:30', '2023-10-22 02:24:30'),
(486, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:35:39', '2023-10-22 02:35:39'),
(487, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:35:47', '2023-10-22 02:35:47'),
(488, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:35:58', '2023-10-22 02:35:58'),
(489, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:36:02', '2023-10-22 02:36:02'),
(490, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:38:05', '2023-10-22 02:38:05'),
(491, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:51:23', '2023-10-22 02:51:23'),
(492, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:51:32', '2023-10-22 02:51:32'),
(493, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:53:35', '2023-10-22 02:53:35'),
(494, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:53:53', '2023-10-22 02:53:53'),
(495, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:53:59', '2023-10-22 02:53:59'),
(496, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:54:18', '2023-10-22 02:54:18'),
(497, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:54:21', '2023-10-22 02:54:21'),
(498, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:54:45', '2023-10-22 02:54:45'),
(499, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:55:41', '2023-10-22 02:55:41'),
(500, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:56:02', '2023-10-22 02:56:02'),
(501, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:57:13', '2023-10-22 02:57:13'),
(502, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:57:15', '2023-10-22 02:57:15'),
(503, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 02:58:40', '2023-10-22 02:58:40'),
(504, '185.237.84.81', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 03:00:29', '2023-10-22 03:00:29'),
(505, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 03:00:45', '2023-10-22 03:00:45'),
(506, '185.237.84.81', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 03:10:19', '2023-10-22 03:10:19'),
(507, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 03:10:22', '2023-10-22 03:10:22'),
(508, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 03:35:38', '2023-10-22 03:35:38'),
(509, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 03:37:06', '2023-10-22 03:37:06'),
(510, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 03:44:28', '2023-10-22 03:44:28'),
(511, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 03:55:45', '2023-10-22 03:55:45'),
(512, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 03:58:35', '2023-10-22 03:58:35'),
(513, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 04:01:02', '2023-10-22 04:01:02'),
(514, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 04:01:15', '2023-10-22 04:01:15'),
(515, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 04:09:41', '2023-10-22 04:09:41'),
(516, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 04:10:42', '2023-10-22 04:10:42'),
(517, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 04:10:47', '2023-10-22 04:10:47'),
(518, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:37:50', '2023-10-22 05:37:50'),
(519, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:37:50', '2023-10-22 05:37:50'),
(520, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:38:20', '2023-10-22 05:38:20'),
(521, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:39:00', '2023-10-22 05:39:00'),
(522, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:39:06', '2023-10-22 05:39:06'),
(523, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:44:32', '2023-10-22 05:44:32'),
(524, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:44:36', '2023-10-22 05:44:36'),
(525, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:47:27', '2023-10-22 05:47:27'),
(526, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:48:04', '2023-10-22 05:48:04'),
(527, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:50:13', '2023-10-22 05:50:13'),
(528, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:50:17', '2023-10-22 05:50:17'),
(529, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:50:24', '2023-10-22 05:50:24'),
(530, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:51:02', '2023-10-22 05:51:02'),
(531, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:51:53', '2023-10-22 05:51:53'),
(532, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:52:31', '2023-10-22 05:52:31'),
(533, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:52:33', '2023-10-22 05:52:33'),
(534, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:52:55', '2023-10-22 05:52:55'),
(535, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:55:28', '2023-10-22 05:55:28'),
(536, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:55:37', '2023-10-22 05:55:37'),
(537, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:56:50', '2023-10-22 05:56:50'),
(538, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:57:30', '2023-10-22 05:57:30'),
(539, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:57:45', '2023-10-22 05:57:45'),
(540, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 05:58:36', '2023-10-22 05:58:36'),
(541, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:01:13', '2023-10-22 06:01:13'),
(542, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:01:15', '2023-10-22 06:01:15'),
(543, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:03:44', '2023-10-22 06:03:44'),
(544, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:04:18', '2023-10-22 06:04:18'),
(545, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:06:15', '2023-10-22 06:06:15'),
(546, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:06:56', '2023-10-22 06:06:56'),
(547, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:07:23', '2023-10-22 06:07:23'),
(548, '185.237.84.81', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:07:27', '2023-10-22 06:07:27'),
(549, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:42:08', '2023-10-22 06:42:08'),
(550, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:42:15', '2023-10-22 06:42:15'),
(551, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:42:46', '2023-10-22 06:42:46'),
(552, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:43:00', '2023-10-22 06:43:00'),
(553, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:43:11', '2023-10-22 06:43:11'),
(554, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:44:58', '2023-10-22 06:44:58'),
(555, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:46:00', '2023-10-22 06:46:00'),
(556, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:46:36', '2023-10-22 06:46:36'),
(557, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:47:58', '2023-10-22 06:47:58'),
(558, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:48:03', '2023-10-22 06:48:03'),
(559, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:48:33', '2023-10-22 06:48:33'),
(560, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:53:47', '2023-10-22 06:53:47'),
(561, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:53:52', '2023-10-22 06:53:52'),
(562, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 06:54:53', '2023-10-22 06:54:53'),
(563, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 07:01:41', '2023-10-22 07:01:41'),
(564, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 07:23:45', '2023-10-22 07:23:45'),
(565, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 07:23:50', '2023-10-22 07:23:50'),
(566, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 07:24:07', '2023-10-22 07:24:07'),
(567, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 08:26:27', '2023-10-22 08:26:27'),
(568, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-22', '2023-10-22 08:26:32', '2023-10-22 08:26:32'),
(569, '44.200.3.125', NULL, NULL, NULL, 'Desktop', 'Windows', 'Safari', '2023-10-23', '2023-10-22 22:59:18', '2023-10-22 22:59:18'),
(570, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 02:20:40', '2023-10-23 02:20:40'),
(571, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 02:20:57', '2023-10-23 02:20:57'),
(572, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 02:21:26', '2023-10-23 02:21:26'),
(573, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 02:21:32', '2023-10-23 02:21:32'),
(574, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 02:24:29', '2023-10-23 02:24:29'),
(575, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 02:41:59', '2023-10-23 02:41:59'),
(576, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 02:42:30', '2023-10-23 02:42:30'),
(577, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 02:42:34', '2023-10-23 02:42:34'),
(578, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:15:23', '2023-10-23 05:15:23'),
(579, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:16:42', '2023-10-23 05:16:42'),
(580, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:23:51', '2023-10-23 05:23:51'),
(581, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:24:02', '2023-10-23 05:24:02'),
(582, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:24:09', '2023-10-23 05:24:09'),
(583, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:27:02', '2023-10-23 05:27:02'),
(584, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:31:19', '2023-10-23 05:31:19'),
(585, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:31:38', '2023-10-23 05:31:38'),
(586, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:34:10', '2023-10-23 05:34:10'),
(587, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:34:54', '2023-10-23 05:34:54'),
(588, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:40:46', '2023-10-23 05:40:46'),
(589, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 05:58:31', '2023-10-23 05:58:31'),
(590, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 06:45:15', '2023-10-23 06:45:15'),
(591, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 06:45:42', '2023-10-23 06:45:42'),
(592, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 06:46:20', '2023-10-23 06:46:20'),
(593, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 06:46:58', '2023-10-23 06:46:58'),
(594, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 06:47:51', '2023-10-23 06:47:51'),
(595, '188.165.87.98', NULL, NULL, NULL, 'Desktop', 'Ubuntu', 'Firefox', '2023-10-23', '2023-10-23 07:21:16', '2023-10-23 07:21:16'),
(596, '188.165.87.102', NULL, NULL, NULL, 'Desktop', 'Ubuntu', 'Firefox', '2023-10-23', '2023-10-23 07:27:49', '2023-10-23 07:27:49'),
(597, '188.165.87.104', NULL, NULL, NULL, 'Desktop', 'Ubuntu', 'Firefox', '2023-10-23', '2023-10-23 07:31:31', '2023-10-23 07:31:31'),
(598, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:03:10', '2023-10-23 08:03:10'),
(599, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:03:22', '2023-10-23 08:03:22'),
(600, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:05:20', '2023-10-23 08:05:20'),
(601, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:05:34', '2023-10-23 08:05:34'),
(602, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:05:54', '2023-10-23 08:05:54'),
(603, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Ubuntu', 'Firefox', '2023-10-23', '2023-10-23 08:09:57', '2023-10-23 08:09:57'),
(604, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Ubuntu', 'Firefox', '2023-10-23', '2023-10-23 08:10:36', '2023-10-23 08:10:36'),
(605, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:17:26', '2023-10-23 08:17:26'),
(606, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:17:34', '2023-10-23 08:17:34'),
(607, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:17:38', '2023-10-23 08:17:38'),
(608, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:17:42', '2023-10-23 08:17:42'),
(609, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:23:40', '2023-10-23 08:23:40'),
(610, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:24:19', '2023-10-23 08:24:19'),
(611, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:24:24', '2023-10-23 08:24:24'),
(612, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:29:16', '2023-10-23 08:29:16'),
(613, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:29:26', '2023-10-23 08:29:26'),
(614, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:29:31', '2023-10-23 08:29:31'),
(615, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:30:37', '2023-10-23 08:30:37'),
(616, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:36:43', '2023-10-23 08:36:43'),
(617, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 08:38:58', '2023-10-23 08:38:58'),
(618, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-23', '2023-10-23 09:01:18', '2023-10-23 09:01:18'),
(619, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Ubuntu', 'Firefox', '2023-10-23', '2023-10-23 09:37:14', '2023-10-23 09:37:14'),
(620, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Ubuntu', 'Firefox', '2023-10-23', '2023-10-23 09:38:58', '2023-10-23 09:38:58'),
(621, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:41:14', '2023-10-24 00:41:14'),
(622, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:42:17', '2023-10-24 00:42:17'),
(623, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:42:20', '2023-10-24 00:42:20'),
(624, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:44:17', '2023-10-24 00:44:17'),
(625, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:46:10', '2023-10-24 00:46:10'),
(626, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:46:28', '2023-10-24 00:46:28'),
(627, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:46:31', '2023-10-24 00:46:31'),
(628, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:46:47', '2023-10-24 00:46:47'),
(629, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:46:49', '2023-10-24 00:46:49'),
(630, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:47:22', '2023-10-24 00:47:22'),
(631, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:50:25', '2023-10-24 00:50:25'),
(632, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 00:50:51', '2023-10-24 00:50:51'),
(633, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:23:56', '2023-10-24 01:23:56'),
(634, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:28:54', '2023-10-24 01:28:54'),
(635, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:31:42', '2023-10-24 01:31:42'),
(636, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:31:55', '2023-10-24 01:31:55'),
(637, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:36:48', '2023-10-24 01:36:48'),
(638, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:36:54', '2023-10-24 01:36:54'),
(639, '185.237.87.250', 10, NULL, NULL, 'Mobile', 'Android', 'Chrome Mobile', '2023-10-24', '2023-10-24 01:38:35', '2023-10-24 01:38:35'),
(640, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:40:01', '2023-10-24 01:40:01'),
(641, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:40:07', '2023-10-24 01:40:07'),
(642, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:40:14', '2023-10-24 01:40:14'),
(643, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:40:21', '2023-10-24 01:40:21'),
(644, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:41:19', '2023-10-24 01:41:19'),
(645, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 01:51:18', '2023-10-24 01:51:18'),
(646, '185.237.87.250', 10, NULL, NULL, 'Mobile', 'Android', 'Chrome Mobile', '2023-10-24', '2023-10-24 01:55:27', '2023-10-24 01:55:27'),
(647, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:01:06', '2023-10-24 02:01:06'),
(648, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:02:24', '2023-10-24 02:02:24'),
(649, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:02:36', '2023-10-24 02:02:36'),
(650, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:03:40', '2023-10-24 02:03:40'),
(651, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:03:50', '2023-10-24 02:03:50'),
(652, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:06:11', '2023-10-24 02:06:11'),
(653, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:06:46', '2023-10-24 02:06:46'),
(654, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:06:59', '2023-10-24 02:06:59'),
(655, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:07:02', '2023-10-24 02:07:02'),
(656, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:08:06', '2023-10-24 02:08:06'),
(657, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:38:34', '2023-10-24 02:38:34'),
(658, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:38:45', '2023-10-24 02:38:45'),
(659, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:39:38', '2023-10-24 02:39:38'),
(660, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:39:48', '2023-10-24 02:39:48'),
(661, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:44:27', '2023-10-24 02:44:27'),
(662, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:44:36', '2023-10-24 02:44:36'),
(663, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:44:40', '2023-10-24 02:44:40'),
(664, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:49:35', '2023-10-24 02:49:35'),
(665, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 02:49:39', '2023-10-24 02:49:39'),
(666, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 03:03:15', '2023-10-24 03:03:15'),
(667, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 03:12:40', '2023-10-24 03:12:40'),
(668, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 04:16:52', '2023-10-24 04:16:52'),
(669, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 04:18:20', '2023-10-24 04:18:20'),
(670, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 04:18:38', '2023-10-24 04:18:38'),
(671, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 05:24:43', '2023-10-24 05:24:43'),
(672, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 06:46:27', '2023-10-24 06:46:27'),
(673, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 06:49:19', '2023-10-24 06:49:19'),
(674, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 06:49:22', '2023-10-24 06:49:22'),
(675, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 07:24:22', '2023-10-24 07:24:22'),
(676, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 07:24:27', '2023-10-24 07:24:27'),
(677, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 07:24:56', '2023-10-24 07:24:56'),
(678, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 07:38:43', '2023-10-24 07:38:43'),
(679, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 08:27:17', '2023-10-24 08:27:17'),
(680, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 08:31:16', '2023-10-24 08:31:16'),
(681, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 08:34:52', '2023-10-24 08:34:52'),
(682, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 08:35:33', '2023-10-24 08:35:33'),
(683, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 08:37:06', '2023-10-24 08:37:06'),
(684, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 08:38:40', '2023-10-24 08:38:40'),
(685, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 08:38:48', '2023-10-24 08:38:48'),
(686, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-24', '2023-10-24 08:39:01', '2023-10-24 08:39:01'),
(687, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-25', '2023-10-25 02:06:07', '2023-10-25 02:06:07'),
(688, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-25', '2023-10-25 03:35:14', '2023-10-25 03:35:14'),
(689, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-25', '2023-10-25 03:35:25', '2023-10-25 03:35:25'),
(690, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-25', '2023-10-25 03:35:32', '2023-10-25 03:35:32'),
(691, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-25', '2023-10-25 05:11:39', '2023-10-25 05:11:39'),
(692, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-25', '2023-10-25 05:12:34', '2023-10-25 05:12:34'),
(693, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-25', '2023-10-25 08:53:54', '2023-10-25 08:53:54'),
(694, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 01:14:47', '2023-10-28 01:14:47'),
(695, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 01:17:58', '2023-10-28 01:17:58'),
(696, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 01:21:48', '2023-10-28 01:21:48'),
(697, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:06:21', '2023-10-28 04:06:21'),
(698, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:10:12', '2023-10-28 04:10:12'),
(699, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:12:13', '2023-10-28 04:12:13'),
(700, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:38:07', '2023-10-28 04:38:07'),
(701, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:38:44', '2023-10-28 04:38:44'),
(702, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:39:33', '2023-10-28 04:39:33'),
(703, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:41:55', '2023-10-28 04:41:55'),
(704, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:42:14', '2023-10-28 04:42:14'),
(705, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:42:16', '2023-10-28 04:42:16'),
(706, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:42:30', '2023-10-28 04:42:30'),
(707, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:46:59', '2023-10-28 04:46:59'),
(708, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:47:12', '2023-10-28 04:47:12'),
(709, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:47:26', '2023-10-28 04:47:26'),
(710, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:50:25', '2023-10-28 04:50:25'),
(711, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:56:10', '2023-10-28 04:56:10'),
(712, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:57:03', '2023-10-28 04:57:03'),
(713, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:57:40', '2023-10-28 04:57:40'),
(714, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:58:17', '2023-10-28 04:58:17'),
(715, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:58:37', '2023-10-28 04:58:37'),
(716, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:59:14', '2023-10-28 04:59:14'),
(717, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 04:59:46', '2023-10-28 04:59:46'),
(718, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:00:35', '2023-10-28 05:00:35'),
(719, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:00:43', '2023-10-28 05:00:43'),
(720, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:00:49', '2023-10-28 05:00:49'),
(721, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:00:56', '2023-10-28 05:00:56'),
(722, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:01:14', '2023-10-28 05:01:14'),
(723, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:05:39', '2023-10-28 05:05:39'),
(724, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:05:43', '2023-10-28 05:05:43'),
(725, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:06:44', '2023-10-28 05:06:44'),
(726, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:06:47', '2023-10-28 05:06:47'),
(727, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:07:05', '2023-10-28 05:07:05'),
(728, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:07:18', '2023-10-28 05:07:18'),
(729, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:07:26', '2023-10-28 05:07:26'),
(730, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:07:33', '2023-10-28 05:07:33'),
(731, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:08:33', '2023-10-28 05:08:33'),
(732, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:09:16', '2023-10-28 05:09:16'),
(733, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:10:34', '2023-10-28 05:10:34'),
(734, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:15:40', '2023-10-28 05:15:40'),
(735, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:15:44', '2023-10-28 05:15:44'),
(736, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:15:53', '2023-10-28 05:15:53'),
(737, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:16:02', '2023-10-28 05:16:02'),
(738, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:16:07', '2023-10-28 05:16:07'),
(739, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:16:16', '2023-10-28 05:16:16'),
(740, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:19:06', '2023-10-28 05:19:06'),
(741, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:20:46', '2023-10-28 05:20:46'),
(742, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:20:49', '2023-10-28 05:20:49'),
(743, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:21:33', '2023-10-28 05:21:33'),
(744, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:21:36', '2023-10-28 05:21:36'),
(745, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:21:49', '2023-10-28 05:21:49'),
(746, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:22:29', '2023-10-28 05:22:29'),
(747, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:23:08', '2023-10-28 05:23:08'),
(748, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:23:39', '2023-10-28 05:23:39'),
(749, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:27:36', '2023-10-28 05:27:36'),
(750, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:32:43', '2023-10-28 05:32:43'),
(751, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:33:44', '2023-10-28 05:33:44'),
(752, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:33:56', '2023-10-28 05:33:56'),
(753, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:34:01', '2023-10-28 05:34:01'),
(754, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:35:26', '2023-10-28 05:35:26'),
(755, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:35:41', '2023-10-28 05:35:41'),
(756, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:37:14', '2023-10-28 05:37:14'),
(757, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:37:43', '2023-10-28 05:37:43'),
(758, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:37:50', '2023-10-28 05:37:50'),
(759, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:38:11', '2023-10-28 05:38:11'),
(760, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:38:24', '2023-10-28 05:38:24'),
(761, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:38:45', '2023-10-28 05:38:45'),
(762, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:40:07', '2023-10-28 05:40:07'),
(763, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:40:28', '2023-10-28 05:40:28'),
(764, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:40:59', '2023-10-28 05:40:59'),
(765, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:41:10', '2023-10-28 05:41:10'),
(766, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:50:00', '2023-10-28 05:50:00'),
(767, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:50:32', '2023-10-28 05:50:32'),
(768, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:52:53', '2023-10-28 05:52:53'),
(769, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:53:10', '2023-10-28 05:53:10'),
(770, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:53:22', '2023-10-28 05:53:22'),
(771, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:54:20', '2023-10-28 05:54:20'),
(772, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 05:54:32', '2023-10-28 05:54:32'),
(773, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 06:47:43', '2023-10-28 06:47:43'),
(774, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 06:54:19', '2023-10-28 06:54:19');
INSERT INTO `visits` (`id`, `ip`, `route_id`, `record_id`, `user_id`, `platform`, `os`, `browser`, `date`, `created_at`, `updated_at`) VALUES
(775, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 06:54:32', '2023-10-28 06:54:32'),
(776, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 06:55:05', '2023-10-28 06:55:05'),
(777, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 06:55:25', '2023-10-28 06:55:25'),
(778, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 06:55:58', '2023-10-28 06:55:58'),
(779, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 06:57:06', '2023-10-28 06:57:06'),
(780, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 07:13:09', '2023-10-28 07:13:09'),
(781, '185.237.87.250', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 07:57:34', '2023-10-28 07:57:34'),
(782, '185.237.87.250', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 07:57:56', '2023-10-28 07:57:56'),
(783, '185.237.87.250', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 07:58:18', '2023-10-28 07:58:18'),
(784, '185.237.87.250', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 07:59:08', '2023-10-28 07:59:08'),
(785, '185.237.87.250', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 07:59:14', '2023-10-28 07:59:14'),
(786, '185.237.87.250', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:00:08', '2023-10-28 08:00:08'),
(787, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:01:34', '2023-10-28 08:01:34'),
(788, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:01:55', '2023-10-28 08:01:55'),
(789, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:02:16', '2023-10-28 08:02:16'),
(790, '185.237.87.250', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:02:19', '2023-10-28 08:02:19'),
(791, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:03:20', '2023-10-28 08:03:20'),
(792, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:03:30', '2023-10-28 08:03:30'),
(793, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:05:02', '2023-10-28 08:05:02'),
(794, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:05:04', '2023-10-28 08:05:04'),
(795, '185.237.87.250', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:05:23', '2023-10-28 08:05:23'),
(796, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:06:04', '2023-10-28 08:06:04'),
(797, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:07:24', '2023-10-28 08:07:24'),
(798, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:08:10', '2023-10-28 08:08:10'),
(799, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:09:50', '2023-10-28 08:09:50'),
(800, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:11:12', '2023-10-28 08:11:12'),
(801, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:11:17', '2023-10-28 08:11:17'),
(802, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:11:53', '2023-10-28 08:11:53'),
(803, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:11:53', '2023-10-28 08:11:53'),
(804, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:12:25', '2023-10-28 08:12:25'),
(805, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:12:49', '2023-10-28 08:12:49'),
(806, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:12:56', '2023-10-28 08:12:56'),
(807, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:14:16', '2023-10-28 08:14:16'),
(808, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:14:28', '2023-10-28 08:14:28'),
(809, '185.237.87.250', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:27:18', '2023-10-28 08:27:18'),
(810, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:27:24', '2023-10-28 08:27:24'),
(811, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:35:02', '2023-10-28 08:35:02'),
(812, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:35:07', '2023-10-28 08:35:07'),
(813, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:39:47', '2023-10-28 08:39:47'),
(814, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:40:02', '2023-10-28 08:40:02'),
(815, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:40:06', '2023-10-28 08:40:06'),
(816, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:43:28', '2023-10-28 08:43:28'),
(817, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:43:39', '2023-10-28 08:43:39'),
(818, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:43:42', '2023-10-28 08:43:42'),
(819, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:49:06', '2023-10-28 08:49:06'),
(820, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:51:50', '2023-10-28 08:51:50'),
(821, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:52:26', '2023-10-28 08:52:26'),
(822, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:53:44', '2023-10-28 08:53:44'),
(823, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:55:43', '2023-10-28 08:55:43'),
(824, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:55:49', '2023-10-28 08:55:49'),
(825, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:57:33', '2023-10-28 08:57:33'),
(826, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 08:58:39', '2023-10-28 08:58:39'),
(827, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 09:01:18', '2023-10-28 09:01:18'),
(828, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 09:02:38', '2023-10-28 09:02:38'),
(829, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 09:02:42', '2023-10-28 09:02:42'),
(830, '188.209.128.249', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 09:04:31', '2023-10-28 09:04:31'),
(831, '188.209.128.249', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 09:10:38', '2023-10-28 09:10:38'),
(832, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Ubuntu', 'Firefox', '2023-10-28', '2023-10-28 09:12:33', '2023-10-28 09:12:33'),
(833, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 09:17:08', '2023-10-28 09:17:08'),
(834, '188.209.128.249', 13, NULL, NULL, 'Desktop', 'Ubuntu', 'Firefox', '2023-10-28', '2023-10-28 09:18:05', '2023-10-28 09:18:05'),
(835, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Ubuntu', 'Firefox', '2023-10-28', '2023-10-28 09:18:10', '2023-10-28 09:18:10'),
(836, '5.75.37.173', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 12:59:51', '2023-10-28 12:59:51'),
(837, '5.75.37.173', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 13:00:06', '2023-10-28 13:00:06'),
(838, '5.209.144.196', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 13:03:57', '2023-10-28 13:03:57'),
(839, '5.209.144.196', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 13:27:28', '2023-10-28 13:27:28'),
(840, '5.209.144.196', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 13:27:36', '2023-10-28 13:27:36'),
(841, '5.209.144.196', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 13:28:48', '2023-10-28 13:28:48'),
(842, '5.209.144.196', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 13:28:53', '2023-10-28 13:28:53'),
(843, '5.209.144.196', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 13:28:57', '2023-10-28 13:28:57'),
(844, '5.209.144.196', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-28', '2023-10-28 13:29:02', '2023-10-28 13:29:02'),
(845, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 00:42:08', '2023-10-29 00:42:08'),
(846, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 00:42:11', '2023-10-29 00:42:11'),
(847, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 01:31:38', '2023-10-29 01:31:38'),
(848, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 01:35:34', '2023-10-29 01:35:34'),
(849, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 01:36:09', '2023-10-29 01:36:09'),
(850, '188.209.128.249', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 01:43:08', '2023-10-29 01:43:08'),
(851, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:01:06', '2023-10-29 02:01:06'),
(852, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:01:37', '2023-10-29 02:01:37'),
(853, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:04:50', '2023-10-29 02:04:50'),
(854, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:15:25', '2023-10-29 02:15:25'),
(855, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:15:39', '2023-10-29 02:15:39'),
(856, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:16:13', '2023-10-29 02:16:13'),
(857, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:16:20', '2023-10-29 02:16:20'),
(858, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:21:31', '2023-10-29 02:21:31'),
(859, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:22:13', '2023-10-29 02:22:13'),
(860, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:24:20', '2023-10-29 02:24:20'),
(861, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:26:26', '2023-10-29 02:26:26'),
(862, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:33:31', '2023-10-29 02:33:31'),
(863, '54.37.178.223', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:36:52', '2023-10-29 02:36:52'),
(864, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:38:12', '2023-10-29 02:38:12'),
(865, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:55:48', '2023-10-29 02:55:48'),
(866, '54.37.178.223', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:58:09', '2023-10-29 02:58:09'),
(867, '54.37.178.223', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 02:58:14', '2023-10-29 02:58:14'),
(868, '54.37.178.223', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:02:52', '2023-10-29 03:02:52'),
(869, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:03:00', '2023-10-29 03:03:00'),
(870, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:03:02', '2023-10-29 03:03:02'),
(871, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:11:44', '2023-10-29 03:11:44'),
(872, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:11:51', '2023-10-29 03:11:51'),
(873, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:11:53', '2023-10-29 03:11:53'),
(874, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:11:57', '2023-10-29 03:11:57'),
(875, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:16:09', '2023-10-29 03:16:09'),
(876, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:26:35', '2023-10-29 03:26:35'),
(877, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:27:59', '2023-10-29 03:27:59'),
(878, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:32:59', '2023-10-29 03:32:59'),
(879, '185.237.87.250', 14, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:33:00', '2023-10-29 03:33:00'),
(880, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:33:46', '2023-10-29 03:33:46'),
(881, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:33:50', '2023-10-29 03:33:50'),
(882, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:34:29', '2023-10-29 03:34:29'),
(883, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:34:36', '2023-10-29 03:34:36'),
(884, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:35:16', '2023-10-29 03:35:16'),
(885, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:35:32', '2023-10-29 03:35:32'),
(886, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:35:59', '2023-10-29 03:35:59'),
(887, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:36:11', '2023-10-29 03:36:11'),
(888, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:36:23', '2023-10-29 03:36:23'),
(889, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:37:14', '2023-10-29 03:37:14'),
(890, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:38:09', '2023-10-29 03:38:09'),
(891, '185.237.87.250', 15, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:38:12', '2023-10-29 03:38:12'),
(892, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:38:14', '2023-10-29 03:38:14'),
(893, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:38:46', '2023-10-29 03:38:46'),
(894, '185.237.87.250', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:38:47', '2023-10-29 03:38:47'),
(895, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 03:42:13', '2023-10-29 03:42:13'),
(896, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 04:27:33', '2023-10-29 04:27:33'),
(897, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:00:05', '2023-10-29 05:00:05'),
(898, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:04:00', '2023-10-29 05:04:00'),
(899, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:05:01', '2023-10-29 05:05:01'),
(900, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:05:24', '2023-10-29 05:05:24'),
(901, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:16:48', '2023-10-29 05:16:48'),
(902, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:17:21', '2023-10-29 05:17:21'),
(903, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:17:27', '2023-10-29 05:17:27'),
(904, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:18:09', '2023-10-29 05:18:09'),
(905, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:18:36', '2023-10-29 05:18:36'),
(906, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:19:10', '2023-10-29 05:19:10'),
(907, '185.237.87.250', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:20:27', '2023-10-29 05:20:27'),
(908, '185.237.87.250', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 05:21:25', '2023-10-29 05:21:25'),
(909, '188.209.128.249', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:03:33', '2023-10-29 07:03:33'),
(910, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:03:36', '2023-10-29 07:03:36'),
(911, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:09:44', '2023-10-29 07:09:44'),
(912, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:09:51', '2023-10-29 07:09:51'),
(913, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:10:00', '2023-10-29 07:10:00'),
(914, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:12:24', '2023-10-29 07:12:24'),
(915, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:12:31', '2023-10-29 07:12:31'),
(916, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:12:53', '2023-10-29 07:12:53'),
(917, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:17:56', '2023-10-29 07:17:56'),
(918, '188.209.128.249', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:19:15', '2023-10-29 07:19:15'),
(919, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:19:18', '2023-10-29 07:19:18'),
(920, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:19:46', '2023-10-29 07:19:46'),
(921, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:19:48', '2023-10-29 07:19:48'),
(922, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:19:55', '2023-10-29 07:19:55'),
(923, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:26:52', '2023-10-29 07:26:52'),
(924, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:26:56', '2023-10-29 07:26:56'),
(925, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:27:35', '2023-10-29 07:27:35'),
(926, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:27:37', '2023-10-29 07:27:37'),
(927, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:31:41', '2023-10-29 07:31:41'),
(928, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:32:34', '2023-10-29 07:32:34'),
(929, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:33:28', '2023-10-29 07:33:28'),
(930, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:34:59', '2023-10-29 07:34:59'),
(931, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:36:32', '2023-10-29 07:36:32'),
(932, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:36:56', '2023-10-29 07:36:56'),
(933, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:36:59', '2023-10-29 07:36:59'),
(934, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:37:01', '2023-10-29 07:37:01'),
(935, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:37:27', '2023-10-29 07:37:27'),
(936, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:39:13', '2023-10-29 07:39:13'),
(937, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:39:15', '2023-10-29 07:39:15'),
(938, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:39:38', '2023-10-29 07:39:38'),
(939, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:41:02', '2023-10-29 07:41:02'),
(940, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:41:04', '2023-10-29 07:41:04'),
(941, '188.209.128.249', 19, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:41:36', '2023-10-29 07:41:36'),
(942, '188.209.128.249', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:41:48', '2023-10-29 07:41:48'),
(943, '188.209.128.249', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:41:55', '2023-10-29 07:41:55'),
(944, '188.209.128.249', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:42:33', '2023-10-29 07:42:33'),
(945, '188.209.128.249', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:42:59', '2023-10-29 07:42:59'),
(946, '188.209.128.249', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:43:03', '2023-10-29 07:43:03'),
(947, '188.209.128.249', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:44:01', '2023-10-29 07:44:01'),
(948, '188.209.128.249', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:55:18', '2023-10-29 07:55:18'),
(949, '188.209.128.249', 18, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:56:29', '2023-10-29 07:56:29'),
(950, '188.209.128.249', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:57:07', '2023-10-29 07:57:07'),
(951, '188.209.128.249', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:57:11', '2023-10-29 07:57:11'),
(952, '188.209.128.249', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:58:47', '2023-10-29 07:58:47'),
(953, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:58:49', '2023-10-29 07:58:49'),
(954, '188.209.128.249', 17, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 07:58:52', '2023-10-29 07:58:52'),
(955, '188.209.128.249', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:10:38', '2023-10-29 08:10:38'),
(956, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:13:54', '2023-10-29 08:13:54'),
(957, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:14:06', '2023-10-29 08:14:06'),
(958, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:29:33', '2023-10-29 08:29:33'),
(959, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:29:41', '2023-10-29 08:29:41'),
(960, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:30:17', '2023-10-29 08:30:17'),
(961, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:40:00', '2023-10-29 08:40:00'),
(962, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:55:48', '2023-10-29 08:55:48'),
(963, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:55:56', '2023-10-29 08:55:56'),
(964, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:56:10', '2023-10-29 08:56:10'),
(965, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-29', '2023-10-29 08:57:45', '2023-10-29 08:57:45'),
(966, '188.209.128.249', 13, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '2023-10-30', '2023-10-30 01:05:27', '2023-10-30 01:05:27'),
(967, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '2023-10-30', '2023-10-30 01:05:36', '2023-10-30 01:05:36'),
(968, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '2023-10-30', '2023-10-30 01:15:34', '2023-10-30 01:15:34'),
(969, '188.209.128.249', 10, NULL, NULL, 'Desktop', 'Windows', 'Firefox', '2023-10-30', '2023-10-30 01:15:34', '2023-10-30 01:15:34'),
(970, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:19:27', '2023-10-30 01:19:27'),
(971, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:19:42', '2023-10-30 01:19:42'),
(972, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:22:05', '2023-10-30 01:22:05'),
(973, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:22:45', '2023-10-30 01:22:45'),
(974, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:41:34', '2023-10-30 01:41:34'),
(975, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:41:47', '2023-10-30 01:41:47'),
(976, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:44:08', '2023-10-30 01:44:08'),
(977, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:44:26', '2023-10-30 01:44:26'),
(978, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:44:44', '2023-10-30 01:44:44'),
(979, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:44:53', '2023-10-30 01:44:53'),
(980, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:46:03', '2023-10-30 01:46:03'),
(981, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:46:14', '2023-10-30 01:46:14'),
(982, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:49:21', '2023-10-30 01:49:21'),
(983, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:49:41', '2023-10-30 01:49:41'),
(984, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:52:39', '2023-10-30 01:52:39'),
(985, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 01:52:48', '2023-10-30 01:52:48'),
(986, '188.209.128.249', 16, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 02:02:02', '2023-10-30 02:02:02'),
(987, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 02:55:03', '2023-10-30 02:55:03'),
(988, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 02:55:09', '2023-10-30 02:55:09'),
(989, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 02:55:19', '2023-10-30 02:55:19'),
(990, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 02:55:54', '2023-10-30 02:55:54'),
(991, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 02:56:01', '2023-10-30 02:56:01'),
(992, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 02:57:17', '2023-10-30 02:57:17'),
(993, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 02:57:24', '2023-10-30 02:57:24'),
(994, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:02:57', '2023-10-30 03:02:57'),
(995, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:03:01', '2023-10-30 03:03:01'),
(996, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:03:07', '2023-10-30 03:03:07'),
(997, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:03:19', '2023-10-30 03:03:19'),
(998, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:04:11', '2023-10-30 03:04:11'),
(999, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:04:17', '2023-10-30 03:04:17'),
(1000, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:05:09', '2023-10-30 03:05:09'),
(1001, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:05:56', '2023-10-30 03:05:56'),
(1002, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:06:01', '2023-10-30 03:06:01'),
(1003, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:06:43', '2023-10-30 03:06:43'),
(1004, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:06:46', '2023-10-30 03:06:46'),
(1005, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:07:08', '2023-10-30 03:07:08'),
(1006, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:07:42', '2023-10-30 03:07:42'),
(1007, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:07:45', '2023-10-30 03:07:45'),
(1008, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:08:08', '2023-10-30 03:08:08'),
(1009, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:08:24', '2023-10-30 03:08:24'),
(1010, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:08:26', '2023-10-30 03:08:26'),
(1011, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:08:59', '2023-10-30 03:08:59'),
(1012, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:13:32', '2023-10-30 03:13:32'),
(1013, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:14:10', '2023-10-30 03:14:10'),
(1014, '188.209.128.249', 20, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:14:15', '2023-10-30 03:14:15'),
(1015, '188.209.128.249', 20, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:16:46', '2023-10-30 03:16:46'),
(1016, '188.209.128.249', 20, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:18:18', '2023-10-30 03:18:18'),
(1017, '188.209.128.249', 20, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:19:19', '2023-10-30 03:19:19'),
(1018, '188.209.128.249', 20, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:19:22', '2023-10-30 03:19:22'),
(1019, '188.209.128.249', 20, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:23:20', '2023-10-30 03:23:20'),
(1020, '188.209.128.249', 20, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:26:17', '2023-10-30 03:26:17'),
(1021, '188.209.128.249', 20, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:26:59', '2023-10-30 03:26:59'),
(1022, '188.209.128.249', 20, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:27:19', '2023-10-30 03:27:19'),
(1023, '188.209.128.249', 20, NULL, 6, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:27:20', '2023-10-30 03:27:20'),
(1024, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:28:05', '2023-10-30 03:28:05'),
(1025, '188.209.128.249', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:28:20', '2023-10-30 03:28:20'),
(1026, '188.209.128.249', 20, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:28:52', '2023-10-30 03:28:52'),
(1027, '188.209.128.249', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:28:59', '2023-10-30 03:28:59'),
(1028, '188.209.128.249', 20, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:31:17', '2023-10-30 03:31:17'),
(1029, '188.209.128.249', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:31:19', '2023-10-30 03:31:19'),
(1030, '188.209.128.249', 19, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:31:27', '2023-10-30 03:31:27'),
(1031, '188.209.128.249', 19, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:34:01', '2023-10-30 03:34:01'),
(1032, '188.209.128.249', 19, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:34:03', '2023-10-30 03:34:03'),
(1033, '188.209.128.249', 19, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:35:25', '2023-10-30 03:35:25'),
(1034, '188.209.128.249', 19, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:35:28', '2023-10-30 03:35:28'),
(1035, '188.209.128.249', 19, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:35:43', '2023-10-30 03:35:43'),
(1036, '188.209.128.249', 19, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:35:55', '2023-10-30 03:35:55'),
(1037, '188.209.128.249', 17, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:36:13', '2023-10-30 03:36:13'),
(1038, '188.209.128.249', 17, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:36:44', '2023-10-30 03:36:44'),
(1039, '188.209.128.249', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:38:33', '2023-10-30 03:38:33'),
(1040, '188.209.128.249', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:38:34', '2023-10-30 03:38:34'),
(1041, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:38:42', '2023-10-30 03:38:42'),
(1042, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:39:32', '2023-10-30 03:39:32'),
(1043, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:39:35', '2023-10-30 03:39:35'),
(1044, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:40:04', '2023-10-30 03:40:04'),
(1045, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:40:12', '2023-10-30 03:40:12'),
(1046, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:48:38', '2023-10-30 03:48:38'),
(1047, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:48:54', '2023-10-30 03:48:54'),
(1048, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:49:51', '2023-10-30 03:49:51'),
(1049, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 03:49:58', '2023-10-30 03:49:58'),
(1050, '188.209.128.249', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 04:06:26', '2023-10-30 04:06:26'),
(1051, '188.209.128.249', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 04:06:29', '2023-10-30 04:06:29'),
(1052, '188.209.128.249', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 04:07:18', '2023-10-30 04:07:18'),
(1053, '188.209.128.249', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 04:07:20', '2023-10-30 04:07:20'),
(1054, '188.209.128.249', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 04:07:28', '2023-10-30 04:07:28'),
(1055, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 04:07:33', '2023-10-30 04:07:33'),
(1056, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 04:07:37', '2023-10-30 04:07:37'),
(1057, '188.209.128.249', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 04:21:15', '2023-10-30 04:21:15'),
(1058, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:02:18', '2023-10-30 05:02:18'),
(1059, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:26:54', '2023-10-30 05:26:54'),
(1060, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:26:57', '2023-10-30 05:26:57'),
(1061, '188.209.128.241', 16, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:27:32', '2023-10-30 05:27:32'),
(1062, '188.209.128.241', 16, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:27:47', '2023-10-30 05:27:47'),
(1063, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:28:44', '2023-10-30 05:28:44'),
(1064, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:28:49', '2023-10-30 05:28:49'),
(1065, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:28:54', '2023-10-30 05:28:54'),
(1066, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:30:03', '2023-10-30 05:30:03'),
(1067, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:30:58', '2023-10-30 05:30:58'),
(1068, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:31:01', '2023-10-30 05:31:01'),
(1069, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:34:17', '2023-10-30 05:34:17'),
(1070, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:34:21', '2023-10-30 05:34:21'),
(1071, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:44:40', '2023-10-30 05:44:40'),
(1072, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:44:42', '2023-10-30 05:44:42'),
(1073, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 05:53:45', '2023-10-30 05:53:45'),
(1074, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 06:00:58', '2023-10-30 06:00:58'),
(1075, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 06:01:00', '2023-10-30 06:01:00'),
(1076, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 06:53:04', '2023-10-30 06:53:04'),
(1077, '188.209.128.241', 16, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 06:53:06', '2023-10-30 06:53:06'),
(1078, '188.209.128.241', 16, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 06:53:19', '2023-10-30 06:53:19'),
(1079, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 06:54:48', '2023-10-30 06:54:48'),
(1080, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 06:54:53', '2023-10-30 06:54:53'),
(1081, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 06:54:59', '2023-10-30 06:54:59'),
(1082, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:02:56', '2023-10-30 07:02:56'),
(1083, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:02:58', '2023-10-30 07:02:58'),
(1084, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:03:04', '2023-10-30 07:03:04'),
(1085, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:03:08', '2023-10-30 07:03:08'),
(1086, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:03:39', '2023-10-30 07:03:39'),
(1087, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:03:43', '2023-10-30 07:03:43'),
(1088, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:03:45', '2023-10-30 07:03:45'),
(1089, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:04:04', '2023-10-30 07:04:04'),
(1090, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:04:13', '2023-10-30 07:04:13'),
(1091, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:04:15', '2023-10-30 07:04:15'),
(1092, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:05:38', '2023-10-30 07:05:38'),
(1093, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:05:50', '2023-10-30 07:05:50'),
(1094, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:05:54', '2023-10-30 07:05:54'),
(1095, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:08:13', '2023-10-30 07:08:13'),
(1096, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:08:19', '2023-10-30 07:08:19'),
(1097, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:08:52', '2023-10-30 07:08:52'),
(1098, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:09:18', '2023-10-30 07:09:18'),
(1099, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:09:23', '2023-10-30 07:09:23'),
(1100, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:10:56', '2023-10-30 07:10:56'),
(1101, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:11:18', '2023-10-30 07:11:18'),
(1102, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:11:32', '2023-10-30 07:11:32'),
(1103, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:11:34', '2023-10-30 07:11:34'),
(1104, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:11:56', '2023-10-30 07:11:56'),
(1105, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:11:59', '2023-10-30 07:11:59'),
(1106, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:12:32', '2023-10-30 07:12:32'),
(1107, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:12:36', '2023-10-30 07:12:36'),
(1108, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:12:36', '2023-10-30 07:12:36'),
(1109, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:12:37', '2023-10-30 07:12:37'),
(1110, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:13:07', '2023-10-30 07:13:07'),
(1111, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:13:29', '2023-10-30 07:13:29'),
(1112, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:13:57', '2023-10-30 07:13:57'),
(1113, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:14:31', '2023-10-30 07:14:31'),
(1114, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:14:45', '2023-10-30 07:14:45'),
(1115, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:14:49', '2023-10-30 07:14:49'),
(1116, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:14:50', '2023-10-30 07:14:50'),
(1117, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:24:28', '2023-10-30 07:24:28'),
(1118, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:26:41', '2023-10-30 07:26:41'),
(1119, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:26:46', '2023-10-30 07:26:46'),
(1120, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:26:57', '2023-10-30 07:26:57'),
(1121, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:27:34', '2023-10-30 07:27:34'),
(1122, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:28:15', '2023-10-30 07:28:15'),
(1123, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 07:28:40', '2023-10-30 07:28:40'),
(1124, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 08:15:59', '2023-10-30 08:15:59'),
(1125, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 08:16:03', '2023-10-30 08:16:03'),
(1126, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 08:17:03', '2023-10-30 08:17:03'),
(1127, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 08:17:44', '2023-10-30 08:17:44'),
(1128, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-30', '2023-10-30 08:27:44', '2023-10-30 08:27:44'),
(1129, '188.209.128.241', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:21:45', '2023-10-31 01:21:45'),
(1130, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:21:50', '2023-10-31 01:21:50'),
(1131, '188.209.128.241', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:23:14', '2023-10-31 01:23:14'),
(1132, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:23:18', '2023-10-31 01:23:18'),
(1133, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:23:21', '2023-10-31 01:23:21'),
(1134, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:23:26', '2023-10-31 01:23:26'),
(1135, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:24:16', '2023-10-31 01:24:16'),
(1136, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:25:35', '2023-10-31 01:25:35'),
(1137, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:25:39', '2023-10-31 01:25:39'),
(1138, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:25:44', '2023-10-31 01:25:44'),
(1139, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:32:50', '2023-10-31 01:32:50'),
(1140, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:32:55', '2023-10-31 01:32:55'),
(1141, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:33:00', '2023-10-31 01:33:00'),
(1142, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:33:03', '2023-10-31 01:33:03'),
(1143, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:33:06', '2023-10-31 01:33:06'),
(1144, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:36:06', '2023-10-31 01:36:06'),
(1145, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:39:26', '2023-10-31 01:39:26'),
(1146, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:39:28', '2023-10-31 01:39:28'),
(1147, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:39:34', '2023-10-31 01:39:34'),
(1148, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:39:37', '2023-10-31 01:39:37'),
(1149, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:40:48', '2023-10-31 01:40:48'),
(1150, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:41:22', '2023-10-31 01:41:22'),
(1151, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:41:59', '2023-10-31 01:41:59'),
(1152, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:42:23', '2023-10-31 01:42:23'),
(1153, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:43:05', '2023-10-31 01:43:05');
INSERT INTO `visits` (`id`, `ip`, `route_id`, `record_id`, `user_id`, `platform`, `os`, `browser`, `date`, `created_at`, `updated_at`) VALUES
(1154, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:43:59', '2023-10-31 01:43:59'),
(1155, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:49:39', '2023-10-31 01:49:39'),
(1156, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:49:54', '2023-10-31 01:49:54'),
(1157, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:53:06', '2023-10-31 01:53:06'),
(1158, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:54:36', '2023-10-31 01:54:36'),
(1159, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:54:54', '2023-10-31 01:54:54'),
(1160, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:57:07', '2023-10-31 01:57:07'),
(1161, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 01:57:12', '2023-10-31 01:57:12'),
(1162, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:03:49', '2023-10-31 02:03:49'),
(1163, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:03:54', '2023-10-31 02:03:54'),
(1164, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:07:05', '2023-10-31 02:07:05'),
(1165, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:07:10', '2023-10-31 02:07:10'),
(1166, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:07:50', '2023-10-31 02:07:50'),
(1167, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:08:04', '2023-10-31 02:08:04'),
(1168, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:08:06', '2023-10-31 02:08:06'),
(1169, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:08:58', '2023-10-31 02:08:58'),
(1170, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:09:27', '2023-10-31 02:09:27'),
(1171, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:09:54', '2023-10-31 02:09:54'),
(1172, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:10:00', '2023-10-31 02:10:00'),
(1173, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:10:05', '2023-10-31 02:10:05'),
(1174, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:18:16', '2023-10-31 02:18:16'),
(1175, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:18:22', '2023-10-31 02:18:22'),
(1176, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:19:17', '2023-10-31 02:19:17'),
(1177, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:19:45', '2023-10-31 02:19:45'),
(1178, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:19:54', '2023-10-31 02:19:54'),
(1179, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:30:43', '2023-10-31 02:30:43'),
(1180, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:39:08', '2023-10-31 02:39:08'),
(1181, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:39:09', '2023-10-31 02:39:09'),
(1182, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:39:42', '2023-10-31 02:39:42'),
(1183, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:41:05', '2023-10-31 02:41:05'),
(1184, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:41:12', '2023-10-31 02:41:12'),
(1185, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:42:58', '2023-10-31 02:42:58'),
(1186, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:43:20', '2023-10-31 02:43:20'),
(1187, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:43:21', '2023-10-31 02:43:21'),
(1188, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:43:38', '2023-10-31 02:43:38'),
(1189, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:44:32', '2023-10-31 02:44:32'),
(1190, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:44:35', '2023-10-31 02:44:35'),
(1191, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:44:46', '2023-10-31 02:44:46'),
(1192, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:44:57', '2023-10-31 02:44:57'),
(1193, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:45:19', '2023-10-31 02:45:19'),
(1194, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:45:33', '2023-10-31 02:45:33'),
(1195, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:45:39', '2023-10-31 02:45:39'),
(1196, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:55:04', '2023-10-31 02:55:04'),
(1197, '188.209.128.241', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:56:47', '2023-10-31 02:56:47'),
(1198, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:56:50', '2023-10-31 02:56:50'),
(1199, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:58:59', '2023-10-31 02:58:59'),
(1200, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 02:59:51', '2023-10-31 02:59:51'),
(1201, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:00:07', '2023-10-31 03:00:07'),
(1202, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:06:07', '2023-10-31 03:06:07'),
(1203, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:07:50', '2023-10-31 03:07:50'),
(1204, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:08:02', '2023-10-31 03:08:02'),
(1205, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:08:21', '2023-10-31 03:08:21'),
(1206, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:08:54', '2023-10-31 03:08:54'),
(1207, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:15:34', '2023-10-31 03:15:34'),
(1208, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:15:59', '2023-10-31 03:15:59'),
(1209, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:17:16', '2023-10-31 03:17:16'),
(1210, '188.209.128.241', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:17:41', '2023-10-31 03:17:41'),
(1211, '188.209.128.241', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:17:50', '2023-10-31 03:17:50'),
(1212, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:17:54', '2023-10-31 03:17:54'),
(1213, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:18:02', '2023-10-31 03:18:02'),
(1214, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:18:06', '2023-10-31 03:18:06'),
(1215, '188.209.128.241', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:18:33', '2023-10-31 03:18:33'),
(1216, '54.37.178.223', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 03:50:31', '2023-10-31 03:50:31'),
(1217, '54.37.178.223', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 04:02:54', '2023-10-31 04:02:54'),
(1218, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 04:25:12', '2023-10-31 04:25:12'),
(1219, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 06:02:35', '2023-10-31 06:02:35'),
(1220, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:05:39', '2023-10-31 07:05:39'),
(1221, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:20:47', '2023-10-31 07:20:47'),
(1222, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:21:38', '2023-10-31 07:21:38'),
(1223, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:22:32', '2023-10-31 07:22:32'),
(1224, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:22:35', '2023-10-31 07:22:35'),
(1225, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:24:13', '2023-10-31 07:24:13'),
(1226, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:24:59', '2023-10-31 07:24:59'),
(1227, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:25:11', '2023-10-31 07:25:11'),
(1228, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:25:32', '2023-10-31 07:25:32'),
(1229, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:26:17', '2023-10-31 07:26:17'),
(1230, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:26:52', '2023-10-31 07:26:52'),
(1231, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:27:24', '2023-10-31 07:27:24'),
(1232, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:27:49', '2023-10-31 07:27:49'),
(1233, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:28:28', '2023-10-31 07:28:28'),
(1234, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:29:13', '2023-10-31 07:29:13'),
(1235, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:29:42', '2023-10-31 07:29:42'),
(1236, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:29:47', '2023-10-31 07:29:47'),
(1237, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:29:49', '2023-10-31 07:29:49'),
(1238, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:34:38', '2023-10-31 07:34:38'),
(1239, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:35:11', '2023-10-31 07:35:11'),
(1240, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:46:06', '2023-10-31 07:46:06'),
(1241, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:46:23', '2023-10-31 07:46:23'),
(1242, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:47:07', '2023-10-31 07:47:07'),
(1243, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:48:40', '2023-10-31 07:48:40'),
(1244, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:49:40', '2023-10-31 07:49:40'),
(1245, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:49:54', '2023-10-31 07:49:54'),
(1246, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:50:52', '2023-10-31 07:50:52'),
(1247, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:50:55', '2023-10-31 07:50:55'),
(1248, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:51:30', '2023-10-31 07:51:30'),
(1249, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:52:07', '2023-10-31 07:52:07'),
(1250, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:52:13', '2023-10-31 07:52:13'),
(1251, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:52:28', '2023-10-31 07:52:28'),
(1252, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:53:29', '2023-10-31 07:53:29'),
(1253, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:54:01', '2023-10-31 07:54:01'),
(1254, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:54:09', '2023-10-31 07:54:09'),
(1255, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 07:54:37', '2023-10-31 07:54:37'),
(1256, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 08:05:59', '2023-10-31 08:05:59'),
(1257, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 08:06:01', '2023-10-31 08:06:01'),
(1258, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 08:06:43', '2023-10-31 08:06:43'),
(1259, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 08:07:18', '2023-10-31 08:07:18'),
(1260, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 08:08:02', '2023-10-31 08:08:02'),
(1261, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-10-31', '2023-10-31 08:08:41', '2023-10-31 08:08:41'),
(1262, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:03:51', '2023-11-01 01:03:51'),
(1263, '185.237.87.250', 13, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:04:54', '2023-11-01 01:04:54'),
(1264, '185.237.87.250', 20, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:05:21', '2023-11-01 01:05:21'),
(1265, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:05:25', '2023-11-01 01:05:25'),
(1266, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:05:50', '2023-11-01 01:05:50'),
(1267, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:07:33', '2023-11-01 01:07:33'),
(1268, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:12:57', '2023-11-01 01:12:57'),
(1269, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:17:16', '2023-11-01 01:17:16'),
(1270, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:17:52', '2023-11-01 01:17:52'),
(1271, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:20:23', '2023-11-01 01:20:23'),
(1272, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:20:43', '2023-11-01 01:20:43'),
(1273, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:56:33', '2023-11-01 01:56:33'),
(1274, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:56:36', '2023-11-01 01:56:36'),
(1275, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 01:56:49', '2023-11-01 01:56:49'),
(1276, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:00:28', '2023-11-01 02:00:28'),
(1277, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:02:21', '2023-11-01 02:02:21'),
(1278, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:07:24', '2023-11-01 02:07:24'),
(1279, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:08:26', '2023-11-01 02:08:26'),
(1280, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:09:06', '2023-11-01 02:09:06'),
(1281, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:09:27', '2023-11-01 02:09:27'),
(1282, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:10:15', '2023-11-01 02:10:15'),
(1283, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:18:24', '2023-11-01 02:18:24'),
(1284, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:21:07', '2023-11-01 02:21:07'),
(1285, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:21:21', '2023-11-01 02:21:21'),
(1286, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:21:34', '2023-11-01 02:21:34'),
(1287, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:29:23', '2023-11-01 02:29:23'),
(1288, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:29:30', '2023-11-01 02:29:30'),
(1289, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:29:41', '2023-11-01 02:29:41'),
(1290, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:29:55', '2023-11-01 02:29:55'),
(1291, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:34:28', '2023-11-01 02:34:28'),
(1292, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:34:54', '2023-11-01 02:34:54'),
(1293, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:37:21', '2023-11-01 02:37:21'),
(1294, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:37:37', '2023-11-01 02:37:37'),
(1295, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:38:14', '2023-11-01 02:38:14'),
(1296, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:38:51', '2023-11-01 02:38:51'),
(1297, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:39:09', '2023-11-01 02:39:09'),
(1298, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:40:02', '2023-11-01 02:40:02'),
(1299, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:40:14', '2023-11-01 02:40:14'),
(1300, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:40:23', '2023-11-01 02:40:23'),
(1301, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:42:07', '2023-11-01 02:42:07'),
(1302, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:43:22', '2023-11-01 02:43:22'),
(1303, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:43:31', '2023-11-01 02:43:31'),
(1304, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:43:52', '2023-11-01 02:43:52'),
(1305, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:44:16', '2023-11-01 02:44:16'),
(1306, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:44:33', '2023-11-01 02:44:33'),
(1307, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:44:56', '2023-11-01 02:44:56'),
(1308, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:45:00', '2023-11-01 02:45:00'),
(1309, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:45:42', '2023-11-01 02:45:42'),
(1310, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:46:56', '2023-11-01 02:46:56'),
(1311, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:47:03', '2023-11-01 02:47:03'),
(1312, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:47:39', '2023-11-01 02:47:39'),
(1313, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:56:34', '2023-11-01 02:56:34'),
(1314, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:58:11', '2023-11-01 02:58:11'),
(1315, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:58:52', '2023-11-01 02:58:52'),
(1316, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 02:59:19', '2023-11-01 02:59:19'),
(1317, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:00:20', '2023-11-01 03:00:20'),
(1318, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:00:37', '2023-11-01 03:00:37'),
(1319, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:04:56', '2023-11-01 03:04:56'),
(1320, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:14:11', '2023-11-01 03:14:11'),
(1321, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:14:53', '2023-11-01 03:14:53'),
(1322, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:14:54', '2023-11-01 03:14:54'),
(1323, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:15:41', '2023-11-01 03:15:41'),
(1324, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:16:13', '2023-11-01 03:16:13'),
(1325, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:16:48', '2023-11-01 03:16:48'),
(1326, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:16:52', '2023-11-01 03:16:52'),
(1327, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:17:20', '2023-11-01 03:17:20'),
(1328, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:18:23', '2023-11-01 03:18:23'),
(1329, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:18:30', '2023-11-01 03:18:30'),
(1330, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:21:29', '2023-11-01 03:21:29'),
(1331, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:21:32', '2023-11-01 03:21:32'),
(1332, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:22:00', '2023-11-01 03:22:00'),
(1333, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:26:16', '2023-11-01 03:26:16'),
(1334, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:26:45', '2023-11-01 03:26:45'),
(1335, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:28:19', '2023-11-01 03:28:19'),
(1336, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:34:41', '2023-11-01 03:34:41'),
(1337, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:34:53', '2023-11-01 03:34:53'),
(1338, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:35:26', '2023-11-01 03:35:26'),
(1339, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:35:30', '2023-11-01 03:35:30'),
(1340, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:35:54', '2023-11-01 03:35:54'),
(1341, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:37:08', '2023-11-01 03:37:08'),
(1342, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:39:53', '2023-11-01 03:39:53'),
(1343, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:39:55', '2023-11-01 03:39:55'),
(1344, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:40:59', '2023-11-01 03:40:59'),
(1345, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:41:15', '2023-11-01 03:41:15'),
(1346, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:41:36', '2023-11-01 03:41:36'),
(1347, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:42:41', '2023-11-01 03:42:41'),
(1348, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:43:05', '2023-11-01 03:43:05'),
(1349, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:43:10', '2023-11-01 03:43:10'),
(1350, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:43:57', '2023-11-01 03:43:57'),
(1351, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:44:19', '2023-11-01 03:44:19'),
(1352, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:44:23', '2023-11-01 03:44:23'),
(1353, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:49:54', '2023-11-01 03:49:54'),
(1354, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:50:09', '2023-11-01 03:50:09'),
(1355, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:52:30', '2023-11-01 03:52:30'),
(1356, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:53:21', '2023-11-01 03:53:21'),
(1357, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:54:29', '2023-11-01 03:54:29'),
(1358, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:54:31', '2023-11-01 03:54:31'),
(1359, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:54:35', '2023-11-01 03:54:35'),
(1360, '185.237.87.250', 10, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:55:11', '2023-11-01 03:55:11'),
(1361, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:55:21', '2023-11-01 03:55:21'),
(1362, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:55:24', '2023-11-01 03:55:24'),
(1363, '185.237.87.250', 10, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 03:55:28', '2023-11-01 03:55:28'),
(1364, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 04:09:50', '2023-11-01 04:09:50'),
(1365, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 04:10:56', '2023-11-01 04:10:56'),
(1366, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 04:11:44', '2023-11-01 04:11:44'),
(1367, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 04:12:21', '2023-11-01 04:12:21'),
(1368, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 04:13:52', '2023-11-01 04:13:52'),
(1369, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 04:14:44', '2023-11-01 04:14:44'),
(1370, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 04:16:42', '2023-11-01 04:16:42'),
(1371, '185.237.87.250', 13, NULL, 13, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 04:16:45', '2023-11-01 04:16:45'),
(1372, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-01', '2023-11-01 05:35:28', '2023-11-01 05:35:28'),
(1373, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-04', '2023-11-04 07:12:25', '2023-11-04 07:12:25'),
(1374, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-05', '2023-11-05 02:19:01', '2023-11-05 02:19:01'),
(1375, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-06', '2023-11-06 03:01:51', '2023-11-06 03:01:51'),
(1376, '127.0.0.1', NULL, NULL, NULL, 'Desktop', 'Windows', 'Chrome', '2023-11-11', '2023-11-11 03:07:19', '2023-11-11 03:07:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_accesses`
--
ALTER TABLE `admin_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_a`
--
ALTER TABLE `en_a`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `en_a_route_unique` (`route`);

--
-- Indexes for table `en_about_service`
--
ALTER TABLE `en_about_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_a_multi_b`
--
ALTER TABLE `en_a_multi_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_b`
--
ALTER TABLE `en_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_biography`
--
ALTER TABLE `en_biography`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_blogs`
--
ALTER TABLE `en_blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `en_blogs_link_unique` (`link`);

--
-- Indexes for table `en_blogs_tags_tags`
--
ALTER TABLE `en_blogs_tags_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_brands`
--
ALTER TABLE `en_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_contact_us`
--
ALTER TABLE `en_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_courses`
--
ALTER TABLE `en_courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `en_courses_link_unique` (`link`);

--
-- Indexes for table `en_course_categories`
--
ALTER TABLE `en_course_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `en_course_categories_link_unique` (`link`);

--
-- Indexes for table `en_course_features`
--
ALTER TABLE `en_course_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_create_account`
--
ALTER TABLE `en_create_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_features`
--
ALTER TABLE `en_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_feedback`
--
ALTER TABLE `en_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_film`
--
ALTER TABLE `en_film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_film_category`
--
ALTER TABLE `en_film_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_footer_categories`
--
ALTER TABLE `en_footer_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_form_countact`
--
ALTER TABLE `en_form_countact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_general_about`
--
ALTER TABLE `en_general_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_general_blogs`
--
ALTER TABLE `en_general_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_general_contact`
--
ALTER TABLE `en_general_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_general_course`
--
ALTER TABLE `en_general_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_general_header`
--
ALTER TABLE `en_general_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_general_site`
--
ALTER TABLE `en_general_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_info_contact`
--
ALTER TABLE `en_info_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_item_contact`
--
ALTER TABLE `en_item_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_lastest_new`
--
ALTER TABLE `en_lastest_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_lastest_new_courses_courses`
--
ALTER TABLE `en_lastest_new_courses_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_latest_blog`
--
ALTER TABLE `en_latest_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_latest_blog_blogs_blogs`
--
ALTER TABLE `en_latest_blog_blogs_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_menu`
--
ALTER TABLE `en_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_new_subcribe`
--
ALTER TABLE `en_new_subcribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_orders`
--
ALTER TABLE `en_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_our_top_course`
--
ALTER TABLE `en_our_top_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_our_top_course_courses_courses`
--
ALTER TABLE `en_our_top_course_courses_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_quiz`
--
ALTER TABLE `en_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_site_introduction`
--
ALTER TABLE `en_site_introduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_state_users`
--
ALTER TABLE `en_state_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_statistics`
--
ALTER TABLE `en_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_tags`
--
ALTER TABLE `en_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `en_tags_link_unique` (`link`);

--
-- Indexes for table `en_talk`
--
ALTER TABLE `en_talk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_teacher`
--
ALTER TABLE `en_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_test4`
--
ALTER TABLE `en_test4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_test7`
--
ALTER TABLE `en_test7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_test9`
--
ALTER TABLE `en_test9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_test10`
--
ALTER TABLE `en_test10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_test11`
--
ALTER TABLE `en_test11`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_top_categories`
--
ALTER TABLE `en_top_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_top_categories_course_category_course_categories`
--
ALTER TABLE `en_top_categories_course_category_course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_users`
--
ALTER TABLE `en_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_welcome`
--
ALTER TABLE `en_welcome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_a`
--
ALTER TABLE `fa_a`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fa_a_route_unique` (`route`);

--
-- Indexes for table `fa_about_service`
--
ALTER TABLE `fa_about_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_a_multi_b`
--
ALTER TABLE `fa_a_multi_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_b`
--
ALTER TABLE `fa_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_biography`
--
ALTER TABLE `fa_biography`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_blogs`
--
ALTER TABLE `fa_blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fa_blogs_link_unique` (`link`);

--
-- Indexes for table `fa_blogs_tags_tags`
--
ALTER TABLE `fa_blogs_tags_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_brands`
--
ALTER TABLE `fa_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_contact_us`
--
ALTER TABLE `fa_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_courses`
--
ALTER TABLE `fa_courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fa_courses_link_unique` (`link`);

--
-- Indexes for table `fa_course_categories`
--
ALTER TABLE `fa_course_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fa_course_categories_link_unique` (`link`);

--
-- Indexes for table `fa_course_features`
--
ALTER TABLE `fa_course_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_create_account`
--
ALTER TABLE `fa_create_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_features`
--
ALTER TABLE `fa_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_feedback`
--
ALTER TABLE `fa_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_film`
--
ALTER TABLE `fa_film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_film_category`
--
ALTER TABLE `fa_film_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_footer_categories`
--
ALTER TABLE `fa_footer_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_form_countact`
--
ALTER TABLE `fa_form_countact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_general_about`
--
ALTER TABLE `fa_general_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_general_blogs`
--
ALTER TABLE `fa_general_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_general_contact`
--
ALTER TABLE `fa_general_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_general_course`
--
ALTER TABLE `fa_general_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_general_header`
--
ALTER TABLE `fa_general_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_general_site`
--
ALTER TABLE `fa_general_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_info_contact`
--
ALTER TABLE `fa_info_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_item_contact`
--
ALTER TABLE `fa_item_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_lastest_new`
--
ALTER TABLE `fa_lastest_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_lastest_new_courses_courses`
--
ALTER TABLE `fa_lastest_new_courses_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_latest_blog`
--
ALTER TABLE `fa_latest_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_latest_blog_blogs_blogs`
--
ALTER TABLE `fa_latest_blog_blogs_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_menu`
--
ALTER TABLE `fa_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_new_subcribe`
--
ALTER TABLE `fa_new_subcribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_orders`
--
ALTER TABLE `fa_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_our_top_course`
--
ALTER TABLE `fa_our_top_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_our_top_course_courses_courses`
--
ALTER TABLE `fa_our_top_course_courses_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_quiz`
--
ALTER TABLE `fa_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_site_introduction`
--
ALTER TABLE `fa_site_introduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_state_users`
--
ALTER TABLE `fa_state_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_statistics`
--
ALTER TABLE `fa_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_tags`
--
ALTER TABLE `fa_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fa_tags_link_unique` (`link`);

--
-- Indexes for table `fa_talk`
--
ALTER TABLE `fa_talk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_teacher`
--
ALTER TABLE `fa_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_test4`
--
ALTER TABLE `fa_test4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_test7`
--
ALTER TABLE `fa_test7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_test9`
--
ALTER TABLE `fa_test9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_test10`
--
ALTER TABLE `fa_test10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_test11`
--
ALTER TABLE `fa_test11`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_top_categories`
--
ALTER TABLE `fa_top_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_top_categories_course_category_course_categories`
--
ALTER TABLE `fa_top_categories_course_category_course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_users`
--
ALTER TABLE `fa_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_welcome`
--
ALTER TABLE `fa_welcome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_categories`
--
ALTER TABLE `file_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record_langs`
--
ALTER TABLE `record_langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relation_conditions`
--
ALTER TABLE `relation_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trashes`
--
ALTER TABLE `trashes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trash_langs`
--
ALTER TABLE `trash_langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_accesses`
--
ALTER TABLE `admin_accesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `en_a`
--
ALTER TABLE `en_a`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `en_about_service`
--
ALTER TABLE `en_about_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_a_multi_b`
--
ALTER TABLE `en_a_multi_b`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `en_b`
--
ALTER TABLE `en_b`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `en_biography`
--
ALTER TABLE `en_biography`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `en_blogs`
--
ALTER TABLE `en_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `en_blogs_tags_tags`
--
ALTER TABLE `en_blogs_tags_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_brands`
--
ALTER TABLE `en_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `en_contact_us`
--
ALTER TABLE `en_contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `en_courses`
--
ALTER TABLE `en_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `en_course_categories`
--
ALTER TABLE `en_course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `en_course_features`
--
ALTER TABLE `en_course_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_create_account`
--
ALTER TABLE `en_create_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_features`
--
ALTER TABLE `en_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `en_feedback`
--
ALTER TABLE `en_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_film`
--
ALTER TABLE `en_film`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `en_film_category`
--
ALTER TABLE `en_film_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `en_footer_categories`
--
ALTER TABLE `en_footer_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `en_form_countact`
--
ALTER TABLE `en_form_countact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_general_about`
--
ALTER TABLE `en_general_about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_general_blogs`
--
ALTER TABLE `en_general_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_general_contact`
--
ALTER TABLE `en_general_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_general_course`
--
ALTER TABLE `en_general_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_general_header`
--
ALTER TABLE `en_general_header`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_general_site`
--
ALTER TABLE `en_general_site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_info_contact`
--
ALTER TABLE `en_info_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `en_item_contact`
--
ALTER TABLE `en_item_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `en_lastest_new`
--
ALTER TABLE `en_lastest_new`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_lastest_new_courses_courses`
--
ALTER TABLE `en_lastest_new_courses_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_latest_blog`
--
ALTER TABLE `en_latest_blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_latest_blog_blogs_blogs`
--
ALTER TABLE `en_latest_blog_blogs_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `en_menu`
--
ALTER TABLE `en_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `en_new_subcribe`
--
ALTER TABLE `en_new_subcribe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_orders`
--
ALTER TABLE `en_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `en_our_top_course`
--
ALTER TABLE `en_our_top_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_our_top_course_courses_courses`
--
ALTER TABLE `en_our_top_course_courses_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_quiz`
--
ALTER TABLE `en_quiz`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_site_introduction`
--
ALTER TABLE `en_site_introduction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_state_users`
--
ALTER TABLE `en_state_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_statistics`
--
ALTER TABLE `en_statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_tags`
--
ALTER TABLE `en_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `en_talk`
--
ALTER TABLE `en_talk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `en_teacher`
--
ALTER TABLE `en_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `en_test4`
--
ALTER TABLE `en_test4`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_test7`
--
ALTER TABLE `en_test7`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_test9`
--
ALTER TABLE `en_test9`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_test10`
--
ALTER TABLE `en_test10`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_test11`
--
ALTER TABLE `en_test11`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_top_categories`
--
ALTER TABLE `en_top_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `en_top_categories_course_category_course_categories`
--
ALTER TABLE `en_top_categories_course_category_course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_users`
--
ALTER TABLE `en_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `en_welcome`
--
ALTER TABLE `en_welcome`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_a`
--
ALTER TABLE `fa_a`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `fa_about_service`
--
ALTER TABLE `fa_about_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_a_multi_b`
--
ALTER TABLE `fa_a_multi_b`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `fa_b`
--
ALTER TABLE `fa_b`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fa_biography`
--
ALTER TABLE `fa_biography`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fa_blogs`
--
ALTER TABLE `fa_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fa_blogs_tags_tags`
--
ALTER TABLE `fa_blogs_tags_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fa_brands`
--
ALTER TABLE `fa_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fa_contact_us`
--
ALTER TABLE `fa_contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fa_courses`
--
ALTER TABLE `fa_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fa_course_categories`
--
ALTER TABLE `fa_course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fa_course_features`
--
ALTER TABLE `fa_course_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_create_account`
--
ALTER TABLE `fa_create_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_features`
--
ALTER TABLE `fa_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fa_feedback`
--
ALTER TABLE `fa_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_film`
--
ALTER TABLE `fa_film`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fa_film_category`
--
ALTER TABLE `fa_film_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fa_footer_categories`
--
ALTER TABLE `fa_footer_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fa_form_countact`
--
ALTER TABLE `fa_form_countact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_general_about`
--
ALTER TABLE `fa_general_about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_general_blogs`
--
ALTER TABLE `fa_general_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_general_contact`
--
ALTER TABLE `fa_general_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_general_course`
--
ALTER TABLE `fa_general_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_general_header`
--
ALTER TABLE `fa_general_header`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_general_site`
--
ALTER TABLE `fa_general_site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa_info_contact`
--
ALTER TABLE `fa_info_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fa_item_contact`
--
ALTER TABLE `fa_item_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fa_lastest_new`
--
ALTER TABLE `fa_lastest_new`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_lastest_new_courses_courses`
--
ALTER TABLE `fa_lastest_new_courses_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fa_latest_blog`
--
ALTER TABLE `fa_latest_blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_latest_blog_blogs_blogs`
--
ALTER TABLE `fa_latest_blog_blogs_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fa_menu`
--
ALTER TABLE `fa_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fa_new_subcribe`
--
ALTER TABLE `fa_new_subcribe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_orders`
--
ALTER TABLE `fa_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `fa_our_top_course`
--
ALTER TABLE `fa_our_top_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_our_top_course_courses_courses`
--
ALTER TABLE `fa_our_top_course_courses_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fa_quiz`
--
ALTER TABLE `fa_quiz`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa_site_introduction`
--
ALTER TABLE `fa_site_introduction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_state_users`
--
ALTER TABLE `fa_state_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa_statistics`
--
ALTER TABLE `fa_statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_tags`
--
ALTER TABLE `fa_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fa_talk`
--
ALTER TABLE `fa_talk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fa_teacher`
--
ALTER TABLE `fa_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fa_test4`
--
ALTER TABLE `fa_test4`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa_test7`
--
ALTER TABLE `fa_test7`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa_test9`
--
ALTER TABLE `fa_test9`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa_test10`
--
ALTER TABLE `fa_test10`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa_test11`
--
ALTER TABLE `fa_test11`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa_top_categories`
--
ALTER TABLE `fa_top_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa_top_categories_course_category_course_categories`
--
ALTER TABLE `fa_top_categories_course_category_course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fa_users`
--
ALTER TABLE `fa_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fa_welcome`
--
ALTER TABLE `fa_welcome`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `file_categories`
--
ALTER TABLE `file_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `record_langs`
--
ALTER TABLE `record_langs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `relation_conditions`
--
ALTER TABLE `relation_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trashes`
--
ALTER TABLE `trashes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `trash_langs`
--
ALTER TABLE `trash_langs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1377;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
