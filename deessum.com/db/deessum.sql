-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2019 at 09:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deessum`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_notation`
--

CREATE TABLE `access_notation` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL,
  `type` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_notation`
--

INSERT INTO `access_notation` (`id`, `name`, `description`, `type`, `flag`, `c_dt`) VALUES
(7, 'Universal Access', 'Universal Access', 0, 0, '2018-12-19 07:14:18'),
(10, 'Dashboard Access', 'Access to View Dashboard', 1, 1, '2019-01-18 05:55:27'),
(11, 'Academic Year CUL', 'Permissions to create, update and list academic Year', 2, 1, '2019-01-18 06:12:01'),
(12, 'ACADEMIC YEAR DELETE', 'PERMISSION TO DELETE ACADEMIC YEAR', 4, 1, '2019-01-18 11:49:54'),
(13, 'ACADEMI SESSION CUL', 'ACCESS TO CREATE UPDATE AND LIST ACADEMIC SESSION', 0, 1, '2019-01-18 12:00:48'),
(14, 'ACADEMIC SESSION DELETE', 'ACCESS TO DELETE ACADEMIC SESSION', 4, 1, '2019-01-18 12:13:49'),
(15, 'COURSE CUL', 'ACCESS TO CREATE, UPDATE AND DELETE COURSES', 5, 1, '2019-01-18 12:59:08'),
(16, 'COURSE DELETE', 'ACCESS TO DELETE COURSE', 4, 1, '2019-01-18 13:09:20'),
(17, 'SUBJECT CUL', 'ACCESS TO CREATE UPDATE AND LIST SUBJECTS', 5, 1, '2019-01-18 13:10:30'),
(18, 'SUBJECT DELETE', 'ACCESS TO DELETE SUBJECT', 4, 1, '2019-01-18 13:13:16'),
(19, 'TIME SLOT CUL', 'ACCESS TO CREATE UPDATE AND LIST TIME SLOTE', 5, 1, '2019-01-18 13:14:19'),
(20, 'TIME SLOT DELETE', 'ACCESS TO DELETE TIME SLOTE', 4, 1, '2019-01-18 13:17:25'),
(21, 'ACCOUNT CUL', 'ACCESS TO CREATE, UPDATE AND LIST ACCOUNT', 5, 1, '2019-01-18 13:19:42'),
(22, 'ACCOUNT DELETE', 'ACCESS TO DELETE ACCOUNT', 4, 1, '2019-01-18 13:20:27'),
(23, 'REFERENCE CUL', 'ACCESS TO CREATE, UPDATE AND LIST REFRENCE', 5, 1, '2019-01-18 13:22:33'),
(24, 'REFRENCE DELETE', 'ACCESS TO DELETE REFERENCE', 4, 1, '2019-01-18 13:23:12'),
(25, 'STUDENT INQUIRY ALL MENU CUL', 'ACCESS TO CREATE, UPDATE AND LIST STUDENT INQUIRY', 5, 1, '2019-01-18 13:27:07'),
(26, 'STUDENT INQUIRY DELETE', 'ACCESS TO DELETE STUDENT INQUIRY', 4, 1, '2019-01-18 13:27:38'),
(27, 'STUDENT ADMISSION CL', 'ACCESS TO CREATE, UPDATE AND LIST STUDENT ADMISSION', 5, 1, '2019-01-18 13:34:10'),
(28, 'STUDENT ADMISSION DELETE', 'ACCESS TO DELETE STUDENT ADMISSION', 4, 1, '2019-01-18 13:34:44'),
(29, 'SATAFF INQUIRY CUL', 'ACCESS TO CREATE, UPDATE AND LIST SATAFF INQUIRY', 5, 1, '2019-01-18 13:52:54'),
(30, 'STAFF INQUIRY DELETE', 'ACCESS TO DELETE SATAFF INQUIRY', 4, 1, '2019-01-18 13:53:28'),
(31, 'STAFF JOINING CL', 'ACCESS TO CREATE, AND LIST STAFF JOINING', 5, 1, '2019-01-18 13:57:19'),
(32, 'STAFF JOINING DELETE PERMISSION', 'ACCESS TO DELETE STAFF JOINING', 4, 1, '2019-01-18 13:58:03'),
(33, 'BOOK RECORD PERMISSION CUL', 'ACCESS TO ALL BOOK RECORD SUB MENUS, AND ACCESS TO CREATE, UPDATE AND LIST OF BOOK RECORD', 5, 1, '2019-01-18 14:06:02'),
(34, 'BOOK RECORD DELETE', 'ACCESS TO DELETE ALL SUB MENU EXPENDITURE CONTENT', 4, 1, '2019-01-18 14:07:05'),
(35, 'EXPENDITURE PERMISSION CUL', 'ALL EXPENDITURE SUB MENUS ACCESS TO CREATE, UPDATE AND LIST', 5, 1, '2019-01-18 14:14:58'),
(36, 'EXPENDITURE DELETE', 'ALL EXPENDITURE DELETE ACCESS', 4, 1, '2019-01-18 14:15:20'),
(37, 'TRANSECTION PERMISSION CUL', 'ACCESS TO ALL SUB MENUS OF TRANSECTION TO CREATE, UPDATE AND LIST', 5, 1, '2019-01-18 14:22:02'),
(38, 'TRANSECTION DELETE', 'ACCESS TO DELETE ALL TRANSECTIONS', 4, 1, '2019-01-18 14:22:33'),
(39, 'REPORT PERMISSION CUL', 'ACCESS REPORT LISTING', 5, 1, '2019-01-18 14:27:13'),
(40, 'REPORT DELETE', 'ACCESS ALL REPORT DELETE PERMISSION', 4, 1, '2019-01-18 14:28:21'),
(41, 'MEMOS PERMISSION CUL', 'ACCESEES TO CREATE UPDATE AND DELETE MEMO', 5, 1, '2019-01-18 15:23:27'),
(42, 'MEMO DELETE', 'ACCESS TO DELETE MEMO', 4, 1, '2019-01-18 15:24:48'),
(43, 'EDIT STUDENT DETAIL', 'PERMISSION TO EDIT STUDENT DETAILS', 3, 1, '2019-01-23 13:55:54'),
(44, 'EDIT STAFF DETAIL', 'PERMISSION TO UPDATE STAFF DETAILS', 3, 1, '2019-01-23 13:58:10'),
(45, 'DELETE STAFF SALARY', 'PERMISSION TO DELETE STAFF SALARY', 4, 1, '2019-01-24 15:44:20'),
(46, 'DELETE STUDENT FEE', 'PERMISSION TO DELETE STUDENT FEE', 4, 1, '2019-01-24 16:13:08'),
(47, 'DELETE DISTRIBUTOR PAYMENT', 'PERMISSION TO DELETE DISTRIBUTOR PAYMENT', 4, 1, '2019-01-24 16:18:06'),
(48, 'EDIT BOOK DISTRIBUTION', 'PERMISSION TO EDIT BOOK DISTRIBUTION', 3, 1, '2019-01-30 12:36:23'),
(49, 'EDIT TRANSECTION', 'PERMISSION TO EDIT TRANSECTION', 3, 1, '2019-01-30 12:40:04'),
(50, 'EDIT EXPENDITURE', 'PERMISSION TO EDIT EXPENDITURES', 3, 1, '2019-01-30 12:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `discount_percentage`, `flag`, `c_dt`) VALUES
(1, 'GUGGI', 20, 1, '2019-05-11 04:52:19'),
(2, 'Gucci', 2, 1, '2019-05-11 05:00:21'),
(3, 'Buffelo', 5, 1, '2019-09-30 14:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `login_id` varchar(128) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `login_id`, `product_id`, `qty`) VALUES
(588, 'vir.indraa@gmail.co', 86, 1),
(587, 'vir.indraa@gmail.co', 72, 1),
(593, 'sahuadarsh0@gmail.com', 79, 8);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `flag`, `c_dt`) VALUES
(6, 'Baby Care', 1, '2018-03-22 17:22:12'),
(7, 'Personal Care', 1, '2018-03-22 17:22:21'),
(8, 'Grocery', 1, '2018-03-22 17:27:23'),
(11, 'Household', 1, '2019-05-06 19:00:00'),
(12, 'Women', 1, '2019-05-06 19:00:18'),
(13, 'Men', 1, '2019-05-06 19:00:23'),
(14, 'New one', 0, '2019-09-29 17:21:02'),
(15, 'DING DONG', 0, '2019-09-30 14:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(150) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `flag`, `c_dt`) VALUES
(14, 'BILASPUR', 1, '2019-05-12 07:16:22'),
(15, 'RAIPUR', 1, '2019-05-11 22:38:04'),
(16, 'Bilaspur', 0, '2019-09-30 14:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `flag`, `c_dt`) VALUES
(2, 'Virendra Pratap Singh', 'vir.indra@yahoo.in', '7747917744', 'Test 123', 'Message to be tested', 1, '2019-10-09 15:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `city` int(11) NOT NULL,
  `locality` int(11) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `otp` varchar(8) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `mobile`, `city`, `locality`, `address`, `password`, `status`, `otp`, `flag`, `c_dt`) VALUES
(15461, 'Virendra Pratap', 'vir.indraa@gmail.co', '7747917744', 14, 32, 'HN 117, Timbakt00', '123', 'ACTIVE', '178725', 1, '2018-04-05 16:42:22'),
(15462, 'adarsh', 'sahuadarsh0@gmail.com', '8817259080', 14, 32, 'koni', 'm', 'ACTIVE', '', 1, '2019-09-27 05:41:46'),
(15463, 'Virendra Pratap', 'vir.indraa@gmail.com', '7456325689', 14, 32, 'Tikrapara', '123', 'ACTIVE', '', 1, '2019-09-27 10:35:13'),
(15464, 'Ashish', 'ashish@gmail.com', '5896325645', 14, 32, 'Ahilop', '1234', 'ACTIVE', '', 1, '2019-09-28 08:36:59'),
(15465, 'Virendra Pratap', 'vir.indra@yahoo.in', '7747917744', 14, 32, 'DING DONG', '1234', 'ACTIVE', '', 1, '2019-10-04 15:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `customer_logins`
--

CREATE TABLE `customer_logins` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `l_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_logins`
--

INSERT INTO `customer_logins` (`id`, `customer_id`, `ip`, `l_dt`) VALUES
(1, 15461, '::1', '2019-10-03 07:32:09'),
(2, 15461, '::1', '2019-10-03 07:37:59'),
(3, 15461, '::1', '2019-10-03 07:39:29'),
(4, 15461, '::1', '2019-10-03 07:47:36'),
(5, 15465, '::1', '2019-10-03 16:41:34'),
(6, 15465, '::1', '2019-10-03 18:33:29'),
(7, 15465, '::1', '2019-10-03 18:34:02'),
(8, 15465, '::1', '2019-10-03 18:36:59'),
(9, 15465, '::1', '2019-10-03 18:42:52'),
(10, 15465, '::1', '2019-10-03 19:01:41'),
(11, 15465, '::1', '2019-10-03 19:02:00'),
(12, 15465, '::1', '2019-10-03 19:18:46'),
(13, 15465, '::1', '2019-10-03 19:48:06'),
(14, 15465, '::1', '2019-10-03 19:55:08'),
(15, 15465, '::1', '2019-10-03 19:57:52'),
(16, 15461, '::1', '2019-10-03 20:59:11'),
(17, 15465, '::1', '2019-10-04 18:37:45'),
(18, 15465, '::1', '2019-10-04 20:21:05'),
(19, 15465, '::1', '2019-10-05 21:16:53'),
(20, 15465, '::1', '2019-10-05 21:25:39'),
(21, 15465, '::1', '2019-10-05 21:52:32'),
(22, 15465, '::1', '2019-10-05 22:02:25'),
(23, 15465, '::1', '2019-10-07 02:22:56'),
(24, 15465, '::1', '2019-10-09 11:28:38'),
(25, 15465, '::1', '2019-10-09 18:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `firebase_tokens`
--

CREATE TABLE `firebase_tokens` (
  `member_id` int(11) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `firebase_tokens`
--

INSERT INTO `firebase_tokens` (`member_id`, `token`) VALUES
(11742, 'f8zWqrKwPyc:APA91bGgoHOXFpOKxaWHaLXJGhUQlmS7C0W2zN4Iwfhb9eCol7BnSNPUxa1F9QunKhDzwQgeA0bBv2mW-97PZ-uUqRRoEsv2RL9DYvpvZp461DfxB88raBJUNNTsYxqlwlaWGxpebkIW');

-- --------------------------------------------------------

--
-- Table structure for table `locality`
--

CREATE TABLE `locality` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `locality` varchar(150) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locality`
--

INSERT INTO `locality` (`id`, `city_id`, `locality`, `flag`, `c_dt`) VALUES
(32, 14, 'KONI', 1, '2019-05-12 07:16:31'),
(33, 15, 'KAPIL NAGAR', 1, '2019-05-11 22:38:16'),
(34, 14, 'Vidyanagar', 1, '2019-09-30 14:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `l_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `member_id`, `ip`, `l_dt`) VALUES
(1, 11742, '47.247.181.164', '2019-02-06 07:45:12'),
(2, 11743, '47.247.181.164', '2019-02-06 07:45:44'),
(3, 11743, '47.247.200.44', '2019-02-06 07:54:33'),
(4, 11743, '47.247.168.125', '2019-02-06 16:36:37'),
(5, 11743, '47.247.168.125', '2019-02-06 16:47:45'),
(6, 11743, '47.247.217.121', '2019-02-06 17:29:32'),
(7, 11743, '157.34.99.33', '2019-02-07 08:30:48'),
(8, 11743, '47.247.44.97', '2019-02-11 05:17:48'),
(9, 11743, '47.247.248.175', '2019-02-12 05:25:48'),
(10, 11742, '157.34.118.147', '2019-02-12 06:26:59'),
(11, 11743, '47.247.192.232', '2019-02-12 06:53:19'),
(12, 11742, '47.247.146.225', '2019-02-12 12:06:33'),
(13, 11743, '47.247.208.140', '2019-02-13 05:53:40'),
(14, 11743, '117.248.248.250', '2019-02-13 06:17:16'),
(15, 11743, '117.248.248.250', '2019-02-13 06:31:00'),
(16, 11742, '157.34.105.17', '2019-02-13 07:26:40'),
(17, 11743, '47.247.241.54', '2019-02-13 15:02:25'),
(18, 11743, '47.247.107.61', '2019-02-14 05:33:24'),
(19, 11743, '47.247.78.60', '2019-02-14 05:36:23'),
(20, 11742, '157.34.82.4', '2019-02-14 05:42:56'),
(21, 11743, '47.247.81.115', '2019-02-14 11:35:30'),
(22, 11743, '157.34.101.86', '2019-02-16 09:48:56'),
(23, 11742, '47.247.236.154', '2019-02-17 10:59:20'),
(24, 11742, '47.247.236.154', '2019-02-18 04:42:53'),
(25, 11743, '47.247.233.56', '2019-02-20 08:05:17'),
(26, 11742, '47.247.46.82', '2019-02-20 09:32:12'),
(27, 11742, '157.34.69.166', '2019-02-20 09:49:54'),
(28, 11742, '157.34.69.166', '2019-02-20 10:17:37'),
(29, 11743, '47.247.236.201', '2019-02-20 10:35:49'),
(30, 11742, '157.34.102.1', '2019-02-20 11:05:00'),
(31, 11742, '::1', '2019-02-22 07:54:08'),
(32, 11742, '::1', '2019-02-24 19:04:24'),
(33, 11742, '::1', '2019-02-24 19:30:03'),
(34, 11742, '::1', '2019-02-25 03:29:46'),
(35, 11742, '::1', '2019-02-25 07:22:50'),
(36, 11742, '::1', '2019-02-26 04:30:36'),
(37, 11742, '::1', '2019-02-26 04:54:55'),
(38, 11742, '::1', '2019-02-26 19:08:06'),
(39, 11742, '::1', '2019-02-27 03:33:26'),
(40, 11742, '::1', '2019-02-27 04:45:16'),
(41, 11742, '::1', '2019-02-27 05:43:36'),
(42, 11742, '::1', '2019-02-27 16:10:17'),
(43, 11742, '::1', '2019-02-27 18:30:26'),
(44, 11742, '::1', '2019-02-27 19:13:18'),
(45, 11742, '::1', '2019-02-27 20:20:39'),
(46, 11742, '::1', '2019-02-28 17:43:45'),
(47, 11742, '::1', '2019-03-01 15:36:36'),
(48, 11742, '::1', '2019-03-03 12:45:30'),
(49, 11742, '::1', '2019-03-06 09:09:44'),
(50, 11742, '::1', '2019-03-07 17:40:06'),
(51, 11742, '::1', '2019-03-09 19:29:49'),
(52, 11742, '::1', '2019-03-10 04:35:13'),
(53, 11742, '::1', '2019-03-10 16:14:46'),
(54, 11742, '::1', '2019-03-10 19:36:12'),
(55, 11742, '::1', '2019-03-10 19:57:00'),
(56, 11742, '::1', '2019-03-11 06:49:22'),
(57, 11742, '::1', '2019-03-12 05:55:47'),
(58, 11742, '::1', '2019-03-12 08:20:41'),
(59, 11742, '::1', '2019-03-12 15:58:39'),
(60, 11742, '::1', '2019-03-12 16:21:07'),
(61, 11742, '::1', '2019-03-13 14:28:01'),
(62, 11742, '::1', '2019-03-13 16:26:43'),
(63, 11742, '::1', '2019-03-14 10:51:38'),
(64, 11742, '::1', '2019-03-14 15:49:18'),
(65, 11742, '::1', '2019-03-16 07:18:39'),
(66, 11742, '::1', '2019-03-16 08:09:58'),
(67, 11742, '::1', '2019-03-16 08:15:53'),
(68, 11742, '::1', '2019-03-16 08:19:21'),
(69, 11742, '::1', '2019-03-16 08:22:44'),
(70, 11742, '::1', '2019-03-16 08:25:54'),
(71, 11742, '::1', '2019-03-16 08:28:25'),
(72, 11742, '::1', '2019-03-16 08:37:46'),
(73, 11742, '::1', '2019-05-11 06:02:28'),
(74, 11742, '::1', '2019-05-11 06:03:28'),
(75, 11742, '::1', '2019-05-11 06:08:12'),
(76, 11742, '::1', '2019-05-11 06:24:25'),
(77, 11742, '::1', '2019-05-11 06:31:43'),
(78, 11742, '::1', '2019-05-11 12:03:48'),
(79, 11742, '::1', '2019-05-12 03:12:29'),
(80, 11742, '192.168.1.100', '2019-05-12 07:13:26'),
(81, 11742, '192.168.1.104', '2019-05-12 08:57:06'),
(82, 11742, '192.168.1.104', '2019-05-12 17:24:14'),
(83, 11742, '192.168.1.104', '2019-05-12 17:38:54'),
(84, 11742, '192.168.1.104', '2019-05-13 09:21:34'),
(85, 11742, '192.168.1.104', '2019-05-13 10:14:13'),
(86, 11742, '::1', '2019-09-03 19:26:18'),
(87, 11742, '::1', '2019-09-03 19:38:54'),
(88, 11742, '49.36.26.199', '2019-09-27 05:18:30'),
(89, 11742, '49.36.26.199', '2019-09-27 05:20:48'),
(90, 11742, '157.34.64.255', '2019-09-27 05:39:19'),
(91, 11742, '47.247.107.235', '2019-09-27 09:59:36'),
(92, 11742, '157.34.113.113', '2019-09-27 10:28:52'),
(93, 11742, '47.247.117.77', '2019-09-28 05:21:57'),
(94, 11742, '49.36.24.125', '2019-09-28 07:03:15'),
(95, 11742, '47.247.10.112', '2019-09-28 08:18:30'),
(96, 11742, '157.34.85.191', '2019-09-28 08:34:08'),
(97, 11742, '::1', '2019-09-28 13:24:13'),
(98, 11742, '::1', '2019-09-28 14:02:01'),
(99, 11742, '::1', '2019-09-29 19:29:14'),
(100, 11742, '::1', '2019-09-29 19:53:46'),
(101, 11742, '::1', '2019-09-29 20:28:34'),
(102, 11742, '::1', '2019-09-29 20:53:15'),
(103, 11742, '::1', '2019-09-30 03:48:59'),
(104, 11742, '::1', '2019-09-30 16:15:53'),
(105, 11742, '::1', '2019-09-30 17:13:20'),
(106, 11742, '::1', '2019-09-30 17:13:41'),
(107, 11742, '::1', '2019-10-01 14:05:26'),
(108, 11742, '::1', '2019-10-01 15:56:59'),
(109, 11742, '::1', '2019-10-01 17:02:54'),
(110, 11742, '::1', '2019-10-01 17:22:38'),
(111, 11742, '::1', '2019-10-01 17:26:00'),
(112, 11742, '::1', '2019-10-02 06:17:27'),
(113, 11742, '::1', '2019-10-02 14:55:55'),
(114, 11742, '::1', '2019-10-02 14:57:23'),
(115, 11742, '::1', '2019-10-03 20:59:55'),
(116, 11742, '::1', '2019-10-04 20:56:39'),
(117, 11742, '::1', '2019-10-04 21:21:37'),
(118, 11742, '::1', '2019-10-05 19:15:20'),
(119, 11742, '::1', '2019-10-05 21:46:56'),
(120, 11742, '::1', '2019-10-05 21:53:27'),
(121, 11742, '::1', '2019-10-05 22:04:17'),
(122, 11742, '::1', '2019-10-09 18:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(128) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `post` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `gendar` varchar(10) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'INACTIVE',
  `flag` int(11) NOT NULL DEFAULT 1,
  `login_flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `name`, `email`, `password`, `mobile`, `post`, `address`, `gendar`, `image`, `status`, `flag`, `login_flag`) VALUES
(11742, 'ADMIN', 'Virendra Pratap', 'vir.indra@yahoo.in', '123456', '7747917744', 'CEO &amp; Founder', 'HN 117, Timbaktu', 'MALE', 'profile.png', 'ACTIVE', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_access`
--

CREATE TABLE `member_access` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `access` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_access`
--

INSERT INTO `member_access` (`id`, `member_id`, `access`, `flag`) VALUES
(1, 11742, 7, 1),
(2, 11742, 8, 1),
(3, 11743, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `login_id` varchar(200) NOT NULL,
  `savings` decimal(10,2) NOT NULL,
  `payableamt` decimal(10,2) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'PENDING',
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `login_id`, `savings`, `payableamt`, `status`, `flag`, `c_dt`) VALUES
(1, 'vir.indra@yahoo.in', '1700.00', '48500.00', 'PENDING', 1, '2019-10-05 21:49:23'),
(2, 'vir.indra@yahoo.in', '3000.00', '21500.00', 'PENDING', 1, '2019-10-05 21:52:42'),
(3, 'vir.indra@yahoo.in', '0.00', '0.00', 'PENDING', 1, '2019-10-05 21:54:48'),
(4, 'vir.indra@yahoo.in', '0.00', '0.00', 'PENDING', 1, '2019-10-05 21:54:56'),
(5, 'vir.indra@yahoo.in', '0.00', '0.00', 'PENDING', 1, '2019-10-05 21:55:17'),
(6, 'vir.indra@yahoo.in', '0.00', '0.00', 'PENDING', 1, '2019-10-05 21:55:26'),
(7, 'vir.indra@yahoo.in', '9828.00', '14212.00', 'PENDING', 1, '2019-10-07 02:23:02'),
(8, 'vir.indra@yahoo.in', '0.00', '0.00', 'PENDING', 1, '2019-10-07 02:23:03'),
(9, 'vir.indra@yahoo.in', '0.00', '0.00', 'PENDING', 1, '2019-10-07 02:23:04'),
(10, 'vir.indra@yahoo.in', '3000.00', '24000.00', 'PENDING', 1, '2019-10-09 18:58:46'),
(11, 'vir.indra@yahoo.in', '0.00', '0.00', 'PENDING', 1, '2019-10-09 18:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `flag`, `qty`) VALUES
(1, 79, 60, 1, 1),
(2, 79, 64, 1, 1),
(3, 80, 60, 1, 1),
(4, 80, 64, 1, 1),
(5, 80, 61, 1, 1),
(6, 80, 87, 1, 1),
(7, 81, 69, 1, 1),
(8, 81, 60, 1, 1),
(9, 81, 61, 1, 1),
(10, 81, 72, 1, 1),
(11, 82, 49, 1, 1),
(12, 82, 71, 1, 1),
(13, 82, 25, 1, 1),
(14, 82, 61, 1, 1),
(15, 83, 72, 1, 1),
(16, 83, 87, 1, 1),
(17, 83, 61, 1, 1),
(18, 83, 64, 1, 1),
(19, 83, 60, 1, 1),
(20, 83, 63, 1, 1),
(21, 83, 69, 1, 1),
(22, 83, 49, 1, 1),
(23, 83, 86, 1, 4),
(24, 84, 49, 1, 1),
(25, 84, 87, 1, 2),
(26, 84, 86, 1, 1),
(27, 84, 72, 1, 3),
(28, 85, 72, 1, 3),
(29, 85, 86, 1, 2),
(30, 86, 49, 1, 1),
(31, 87, 38, 1, 3),
(32, 87, 86, 1, 3),
(33, 87, 49, 1, 1),
(34, 87, 79, 1, 3),
(35, 88, 60, 1, 1),
(36, 88, 69, 1, 1),
(37, 88, 80, 1, 5),
(38, 88, 63, 1, 1),
(39, 89, 87, 1, 1),
(40, 89, 86, 1, 1),
(41, 89, 72, 1, 1),
(42, 90, 87, 1, 2),
(43, 90, 81, 1, 2),
(44, 90, 72, 1, 2),
(45, 90, 68, 1, 2),
(46, 90, 60, 1, 2),
(47, 90, 55, 1, 2),
(48, 91, 5, 1, 3),
(49, 92, 5, 1, 7),
(50, 92, 25, 1, 1),
(51, 103, 6, 1, 1),
(52, 104, 1, 1, 2),
(53, 104, 7, 1, 3),
(54, 104, 3, 1, 4),
(55, 104, 5, 1, 1),
(56, 104, 4, 1, 6),
(57, 104, 2, 1, 1),
(58, 1, 2, 1, 2),
(59, 1, 4, 1, 3),
(60, 1, 8, 1, 2),
(61, 2, 2, 1, 1),
(62, 2, 4, 1, 2),
(63, 7, 1, 1, 3),
(64, 7, 3, 1, 2),
(65, 10, 1, 1, 2),
(66, 10, 4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `mrp` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `brand_id`, `category_id`, `sub_category_id`, `image`, `mrp`, `selling_price`, `retailer_id`, `description`, `flag`, `c_dt`) VALUES
(1, 'Sleve Top', 1, 6, 0, '5d99139777a95_05196259_zi_andover_heather.jpg', 5000, 4500, 0, '', 1, '2019-10-05 16:43:11'),
(2, 'Hot Impressive Black', 2, 6, 0, '5d9913b76642c_4417077343_3e74ba75e6_m.jpg', 7500, 6500, 0, '', 1, '2019-10-05 16:43:44'),
(3, 'Top Hot Black', 2, 7, 0, '5d98f27717881_3.jpg', 4520, 356, 0, '', 1, '2019-10-05 16:44:06'),
(4, 'Blck Lather Jacket', 3, 6, 0, '5d98f28dc7a51_4.jpg', 8500, 7500, 0, '', 1, '2019-10-05 16:44:33'),
(5, 'Ray Black Top', 1, 12, 0, '5d98f2c021c44_5.jpg', 8900, 6002, 0, '', 1, '2019-10-05 16:45:25'),
(6, 'White Craft', 1, 12, 0, '5d98f2dc8a0f6_6.jpg', 4450, 3500, 0, '', 1, '2019-10-05 16:45:48'),
(7, 'Black Top', 2, 12, 0, '5d98f301895d1_7.jpg', 7850, 6500, 0, '', 1, '2019-10-05 16:46:23'),
(8, 'White sky blue Skjui', 1, 12, 0, '5d98f31709f20_8.jpg', 4850, 6500, 0, '', 1, '2019-10-05 16:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `address` varchar(300) NOT NULL,
  `login_flag` tinyint(1) NOT NULL DEFAULT 1,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`id`, `name`, `mobile`, `email`, `username`, `password`, `address`, `login_flag`, `flag`, `c_dt`) VALUES
(1, 'Virendra Pratap', '+91 77479 77477', 'virendra@gmail.com', 'virendra@gmail.com', '1234', 'H 75 KRISHNA VIHAR KONI BILASPOUR', 1, 1, '2019-09-28 13:28:52'),
(2, 'Ashish Chaterjee', '7534569851', 'ashish@gmail.com', 'ashish@gmail.com', '1234', 'B-75, KRISHNA VIHAR KONI BILASPUR', 1, 1, '2019-09-28 11:24:21'),
(3, 'Nidhi Arora', '7531594562', 'nidhiarora@gmail.com', 'nidhiarora@gmail.com', '1234', 'B-75, KRISHNA VIHAR KONI BILASPUR', 1, 0, '2019-09-30 15:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_access`
--

CREATE TABLE `retailer_access` (
  `id` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `access` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retailer_access`
--

INSERT INTO `retailer_access` (`id`, `retailer_id`, `access`, `flag`) VALUES
(1, 1, 7, 1),
(2, 2, 7, 1),
(3, 3, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `retailer_login`
--

CREATE TABLE `retailer_login` (
  `id` int(11) NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `l_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer_login`
--

INSERT INTO `retailer_login` (`id`, `retailer_id`, `ip`, `l_dt`) VALUES
(1, 1, '::1', '2019-09-28 13:39:43'),
(2, 1, '::1', '2019-09-28 13:40:59'),
(3, 2, '::1', '2019-09-29 15:55:57'),
(4, 1, '::1', '2019-10-01 15:38:48'),
(5, 2, '::1', '2019-10-01 15:56:20'),
(6, 2, '::1', '2019-10-01 15:57:50'),
(7, 2, '::1', '2019-10-01 16:44:34'),
(8, 2, '::1', '2019-10-01 16:44:53'),
(9, 2, '::1', '2019-10-01 17:22:26'),
(10, 1, '::1', '2019-10-03 21:02:42'),
(11, 1, '::1', '2019-10-03 21:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `site_slider`
--

CREATE TABLE `site_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(350) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_slider`
--

INSERT INTO `site_slider` (`id`, `title`, `sub_title`, `description`, `image`, `flag`, `c_dt`) VALUES
(1, 'New Arrivals', 'denim jackets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', '5d98ef197cbfa_bg.jpg', 1, '2019-10-01 17:05:26'),
(2, 'New Arrivals', 'denim jackets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', '5d98ef3c1faf8_bg-2.jpg', 1, '2019-10-01 17:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `product_id` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `product_id`, `flag`, `c_dt`) VALUES
(3, 'front_image/5cd09e7a37f13_cs.jpg', 38, 1, '2019-05-06 20:52:23'),
(4, '5cd09ecb64843_maa.jpg', 38, 1, '2019-05-06 20:53:36'),
(5, '5cd09f14abaf2_ba.jpg', 78, 1, '2019-05-06 20:54:49'),
(6, '5cd0a07c528bc_npa.jpg', 80, 1, '2019-05-06 21:00:49'),
(7, '5cd0a0b59c30b_ps.jpg', 71, 1, '2019-05-06 21:01:45'),
(8, '5d924727b2474_180x120.jpg', 45, 1, '2019-09-30 15:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

CREATE TABLE `social_media_links` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media_links`
--

INSERT INTO `social_media_links` (`id`, `name`, `image`, `link`, `flag`, `c_dt`) VALUES
(1, 'Facebook', '5d93a2e046472_index.png', 'https://www.facebook.com/rudraxtwo/?modal=admin_todo_tour', 1, '2019-10-01 15:35:40'),
(2, 'Twitter', '5d93a01fe69e7_twitter.png', 'https://twitter.com/login', 1, '2019-10-01 15:51:19'),
(3, 'Instagram', '5d93a085ac417_instagram.jpg', 'http://www.instagram.com', 1, '2019-10-01 15:52:56'),
(4, 'Linked In', '5d93a0f4af61b_linkedin-logo.png', 'https://www.linked in', 1, '2019-10-01 15:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category` varchar(100) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `c_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category`, `flag`, `c_dt`) VALUES
(27, 7, 'Skin Care', 1, '2018-03-22 17:48:17'),
(28, 7, 'Hair Care', 1, '2018-03-22 17:48:27'),
(29, 7, 'Oral Care', 1, '2018-03-22 17:49:21'),
(30, 7, 'Bath, Face &amp; Hand Wash', 1, '2018-03-22 17:49:37'),
(35, 6, 'Baby Food', 1, '2018-03-22 17:55:07'),
(36, 6, 'Diapers &amp; Wipes', 1, '2018-03-22 17:55:25'),
(38, 6, 'Baby Accessories', 1, '2018-03-22 17:56:24'),
(51, 8, 'Cheese', 1, '2018-03-22 18:41:13'),
(52, 8, 'Cakes &amp; Toast', 1, '2018-03-22 18:42:01'),
(59, 11, 'Kitchen Appliances', 1, '2019-05-06 19:02:13'),
(60, 11, 'Vacuum and Floor care', 1, '2019-05-06 19:02:45'),
(63, 8, 'Beverages', 1, '2019-05-06 19:07:18'),
(64, 12, 'Jewellery', 1, '2019-05-06 19:07:31'),
(65, 12, 'Make-up', 1, '2019-05-06 19:07:47'),
(66, 12, 'Perfume', 1, '2019-05-06 19:07:56'),
(67, 13, 'Perfume', 1, '2019-05-06 19:08:05'),
(68, 13, 'Accessories', 1, '2019-05-06 19:08:27'),
(69, 8, 'Dal &amp; Pulses', 1, '2019-05-06 19:09:35'),
(70, 8, 'Rice', 1, '2019-05-06 19:12:13'),
(71, 6, 'Doctor Doom', 1, '2019-10-02 15:20:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_notation`
--
ALTER TABLE `access_notation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer_logins`
--
ALTER TABLE `customer_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firebase_tokens`
--
ALTER TABLE `firebase_tokens`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `locality`
--
ALTER TABLE `locality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `member_access`
--
ALTER TABLE `member_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer_access`
--
ALTER TABLE `retailer_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer_login`
--
ALTER TABLE `retailer_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_slider`
--
ALTER TABLE `site_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_links`
--
ALTER TABLE `social_media_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_notation`
--
ALTER TABLE `access_notation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15466;

--
-- AUTO_INCREMENT for table `customer_logins`
--
ALTER TABLE `customer_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `locality`
--
ALTER TABLE `locality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11743;

--
-- AUTO_INCREMENT for table `member_access`
--
ALTER TABLE `member_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `retailer_access`
--
ALTER TABLE `retailer_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `retailer_login`
--
ALTER TABLE `retailer_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `site_slider`
--
ALTER TABLE `site_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_media_links`
--
ALTER TABLE `social_media_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
