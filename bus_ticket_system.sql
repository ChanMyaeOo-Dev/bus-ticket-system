-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2024 at 01:41 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_ticket_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gate_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_name`, `password`, `gate_id`) VALUES
(1, 'maubin@gmail.com', '123', 0),
(2, 'boc@gmail.com', '123', 1),
(3, 'dala@gmail.com', '123', 2),
(4, 'pyapon@gmail.com', '123', 3),
(5, 'pathein@gmail.com', '123', 5),
(6, 'hinthada@gmail.com', '123', 4);

-- --------------------------------------------------------

--
-- Table structure for table `booking_cancels`
--

CREATE TABLE `booking_cancels` (
  `invoice_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `route_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_from` int(11) NOT NULL,
  `route_to` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `customer_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_qty` int(12) NOT NULL,
  `seat_numbers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refund_completed` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_a` int(11) NOT NULL,
  `route_b` int(11) NOT NULL,
  `has_driver` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_model`, `car_number`, `route_a`, `route_b`, `has_driver`, `created_at`) VALUES
(1, 'TOTOTA 2000', '1B-2000', 0, 1, '1', '2023-02-07 06:53:30'),
(2, 'TOTOTA 2001', '1B-2001', 0, 2, '1', '2023-02-07 06:53:52'),
(3, 'TOTOTA 2002', '2E-2002', 0, 3, '1', '2023-02-07 06:54:10'),
(4, 'TOTOTA 2003', '4D-2003', 0, 4, '1', '2023-02-07 06:54:26'),
(5, 'TOTOTA 2004', '7W-2004', 0, 5, '1', '2023-02-07 06:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `phone`, `location`, `nrc`, `created_at`) VALUES
('cus_63e5435d87faf', 'Chan Myae Oo', '09123123123', 'GTI', '12/Lathaya(N)119477', '2023-02-09 19:03:26'),
('cus_63e543e49d740', 'Chan Myae Aung', '09123123123', 'GTI', '12/Lathaya(N)119477', '2023-02-09 19:05:14'),
('cus_63e5440f8a824', 'Min Thein Kyaw', '09758445926', 'GTI', '12/Lathaya(N)119477', '2023-02-09 19:06:17'),
('cus_63e544c03ba6f', 'Cho Thinzar Kyaw', '09795875124', 'GTI', '12/LaThaYa(N)119277', '2023-02-09 19:09:22'),
('cus_63e5a458eca3b', 'Cho Thinzar Kyaw', '09779866151', 'GTI', '12/Lathaya(N)119477', '2023-02-10 01:57:53'),
('cus_63e5a592be2fd', 'Min Thein Kyaw', '09779866151', 'GTI', '12/lathaya(N)119477', '2023-02-10 02:02:57'),
('cus_63e5a5dd1d785', 'Hih', '09676929976', 'GTI', '12mmmm', '2023-02-10 02:04:15'),
('cus_63e5aae28bdec', 'Zun', '09740948272', '', '14/ wkm123456', '2023-02-10 02:25:28'),
('cus_63e5bd59a49cc', 'chanmyaeoo', '09779866151', 'GTI', '14/ wkm123456', '2023-02-10 03:44:16'),
('cus_63e5bf3950398', 'Ko Htet', '09986277498', 'GTI', '12/ggg', '2023-02-10 03:52:09'),
('cus_63e5bf3d4f650', 'chanmyaeoo', '09795875124', 'GTI', '14/ wkm123456', '2023-02-10 03:52:59'),
('cus_63e5c1176a969', 'Mm', '09778845258', 'GTI', '1234', '2023-02-10 03:59:58'),
('cus_63e5c26295203', 'Phyoe linn htet', '09662417932', 'GTI', '12mmmm', '2023-02-10 04:05:42'),
('cus_63e5c3b143013', 'Phyoe linn htet', '09661014644', 'GTI', '14/ wkm123456', '2023-02-10 04:10:53'),
('cus_63e5c383b1da3', 'Chan Myae Oo', '+959795875124', 'GATE', '12/Lathaya(N)119477', '2023-02-10 04:11:07'),
('cus_63e5c45271856', 'Zin Thawdar Phyoe', '09683848046', 'GTI', '14/ wkm123456', '2023-02-10 04:13:56'),
('cus_63e5c6133ffe5', 'Min', '09795875124', 'GTI', '14/ wkm123456', '2023-02-10 04:21:36'),
('cus_63e5c7abb14c1', 'Min', '09795875124', 'GTI', '14/ wkm123456', '2023-02-10 04:28:41'),
('cus_63e5c9202f3c0', 'Khin Phoo', '09767796568', 'GTI', '12/Lathaya(N)119477', '2023-02-10 04:34:50'),
('cus_63e5c9468224f', 'Min', '09795875124', 'GTI', '14/ wkm123456', '2023-02-10 04:35:44'),
('cus_63e5ca897adbc', 'Aye Myat Mon', '09667385071', 'GTI', '14/ wkm123456', '2023-02-10 04:40:51'),
('cus_63e5caec6f87a', 'Chan Myae Aung', '09663290823', 'GTI', '12/Lathaya(N)119477', '2023-02-10 04:42:30'),
('cus_63e5cb9d2de39', 'Min Thein Kyaw', '09750501223', 'GTI', '13?,7!:8$:', '2023-02-10 04:45:41'),
('cus_63e5cbc61e076', 'Kyi Pyar Moe', '09776172357', 'GTI', '14/ wkm123456', '2023-02-10 04:45:59'),
('cus_63e5ce004602a', 'Naing Linn Htet', '09677337610', 'GTI', 'Gugg', '2023-02-10 04:55:26'),
('cus_63e5ce1f9b41f', 'Chan Myae Oo', '09687012784', 'Pagoda Street', '12/Lathaya(N)119477', '2023-02-10 04:56:16'),
('cus_63e5cf078aa4f', 'Khaing Win Hlaing', '09680133290', 'GTI', '14/ wkm123456', '2023-02-10 04:59:56'),
('cus_63e5d07725b03', 'Min', '09795875124', 'GTI', '1wsrt', '2023-02-10 05:06:05'),
('cus_63e5d0dd4b7a5', 'chz', '09682704060', 'GTI', '12/Lathaya(N)119477', '2023-02-10 05:08:10'),
('cus_63e5d2b6b524c', 'Han Thar Htut', '09661276351', 'GTI', 'Rthh', '2023-02-10 05:15:30'),
('cus_63e5d77ab7138', 'Gfatt', '09766300235', 'GTI', 'Ghuj', '2023-02-10 05:36:07'),
('cus_63f5b5499630b', 'Jonny English', '09795875124', '', '12/Lathaya(N)119477', '2023-02-22 06:26:11'),
('cus_63f5c81f09a47', 'Chan Myae Oo', '09795875124', 'GTI', '12/Lathaya(N)119477', '2023-02-22 07:47:10'),
('cus_63fc540864f1e', 'Chan Myae Oo', '09779866151', 'GTI', '12/Lathaya(N)119477', '2023-02-27 07:00:29'),
('cus_654a477f26266', 'Chan Myae Oo', '09779866151', '', '12/LaThaYa(N)007007', '2023-11-07 14:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(11) NOT NULL,
  `profile_picture` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `profile_picture`, `name`, `birthday`, `nrc`, `address`, `phone`, `car_id`, `created_at`) VALUES
(1, 'store/63e20b726e3c4_user_1.svg', 'U Chan', '2000-12-06', '12/LATHAYA(N)119477', 'Yangon', '09779866151', '1', '2023-02-07 08:27:30'),
(2, 'store/63e20ba8a2b7d_user_2.svg', 'U Min', '1999-02-10', '12/LATHAYA(N)119477', 'Maubin', '09779866151', '2', '2023-02-07 08:28:24'),
(3, 'store/63e20bcc3e6f2_user_3.svg', 'U Aung', '1994-12-13', '12/LATHAYA(N)119477', 'Yangon', '09779866151', '3', '2023-02-07 08:29:00'),
(4, 'store/63e20bf08a6d7_user_4.svg', 'U Myae', '1991-02-06', '12/LATHAYA(N)119477', 'Yangon', '09779866151', '4', '2023-02-07 08:29:36'),
(5, 'store/63e20c159e709_user_5.svg', 'U Thein', '1990-01-10', '12/LATHAYA(N)119477', 'Yangon', '09779866151', '5', '2023-02-07 08:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `gates`
--

CREATE TABLE `gates` (
  `gate_id` int(20) NOT NULL,
  `gate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gates`
--

INSERT INTO `gates` (`gate_id`, `gate_name`, `created_at`) VALUES
(0, 'Maubin', '2023-02-02 16:32:27'),
(1, 'BOC', '2023-02-02 16:32:27'),
(2, 'Dala', '2023-02-02 16:33:19'),
(3, 'Pyapon', '2023-02-02 16:33:19'),
(4, 'Hinthada', '2023-02-02 16:33:51'),
(5, 'Pathein', '2023-02-02 16:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `route_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_from` int(11) NOT NULL,
  `route_to` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `customer_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_qty` int(12) NOT NULL,
  `seat_numbers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `date`, `route_number`, `route_from`, `route_to`, `car_id`, `customer_id`, `person_qty`, `seat_numbers`, `price_total`, `payment`, `qr_code`) VALUES
(6, '2023-02-10 02:02:57', 'R3', 0, 3, 1, 'cus_63e5a592be2fd', 1, '3', '5000', 'online_payment', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5a592be2fd'),
(8, '2023-02-10 02:25:28', 'R3', 5, 0, 1, 'cus_63e5aae28bdec', 2, '2,3', '13000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5aae28bdec'),
(10, '2023-02-10 03:52:09', 'R4', 0, 2, 1, 'cus_63e5bf3950398', 2, '2,4', '11000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5bf3950398'),
(11, '2023-02-10 03:52:59', 'R4', 0, 5, 1, 'cus_63e5bf3d4f650', 2, '3,4', '14000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5bf3d4f650'),
(12, '2023-02-10 03:59:58', 'R4', 0, 2, 1, 'cus_63e5c1176a969', 1, '6', '5000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5c1176a969'),
(13, '2023-02-10 04:05:42', 'R4', 0, 2, 1, 'cus_63e5c26295203', 2, '7,8', '10000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5c26295203'),
(14, '2023-02-10 04:10:53', 'R4', 0, 5, 1, 'cus_63e5c3b143013', 3, '6,7,8', '21000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5c3b143013'),
(18, '2023-02-10 04:28:41', 'R4', 0, 1, 1, 'cus_63e5c7abb14c1', 2, '2,5', '13000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5c7abb14c1'),
(19, '2023-02-10 04:34:50', 'R5', 0, 2, 1, 'cus_63e5c9202f3c0', 1, '3', '5000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5c9202f3c0'),
(20, '2023-02-10 04:35:44', 'R4', 0, 1, 1, 'cus_63e5c9468224f', 1, '3', '6000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5c9468224f'),
(21, '2023-02-10 04:40:51', 'R4', 0, 3, 1, 'cus_63e5ca897adbc', 2, '1,2', '12000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5ca897adbc'),
(22, '2023-02-10 04:42:30', 'R5', 0, 1, 1, 'cus_63e5caec6f87a', 3, '3,4,5', '18000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5caec6f87a'),
(23, '2023-02-10 04:45:41', 'R5', 0, 5, 1, 'cus_63e5cb9d2de39', 2, '1,2', '16000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5cb9d2de39'),
(24, '2023-02-10 04:45:59', 'R4', 0, 5, 1, 'cus_63e5cbc61e076', 2, '1,2', '16000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5cbc61e076'),
(25, '2023-02-10 04:55:26', 'R4', 0, 1, 1, 'cus_63e5ce004602a', 2, '6,7', '12000', 'online_payment', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5ce004602a'),
(26, '2023-02-10 04:56:16', 'R6', 0, 1, 1, 'cus_63e5ce1f9b41f', 4, '3,4,5,6', '24000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5ce1f9b41f'),
(27, '2023-02-10 04:59:56', 'R4', 0, 2, 1, 'cus_63e5cf078aa4f', 2, '3,5', '10000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5cf078aa4f'),
(28, '2023-02-10 05:06:05', 'R4', 0, 1, 1, 'cus_63e5d07725b03', 2, '9,10', '12000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5d07725b03'),
(29, '2023-02-10 05:08:10', 'R6', 0, 1, 1, 'cus_63e5d0dd4b7a5', 2, '7,8', '12000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5d0dd4b7a5'),
(30, '2023-02-10 05:15:30', 'R4', 0, 3, 1, 'cus_63e5d2b6b524c', 1, '3', '5000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5d2b6b524c'),
(31, '2023-02-10 05:36:07', 'R5', 0, 3, 1, 'cus_63e5d77ab7138', 1, '3', '5000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5d77ab7138'),
(32, '2023-02-22 06:26:11', 'R5', 3, 0, 1, 'cus_63f5b5499630b', 2, '3,4', '12000', 'online_payment', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63f5b5499630b'),
(33, '2023-02-22 07:47:10', 'R6', 0, 2, 1, 'cus_63f5c81f09a47', 5, '3,4,5,6,7', '25000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63f5c81f09a47'),
(34, '2023-02-27 07:00:29', 'R5', 0, 1, 1, 'cus_63fc540864f1e', 2, '6,7', '12000', 'online_payment', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63fc540864f1e'),
(35, '2023-11-07 14:20:23', 'R3', 1, 0, 1, 'cus_654a477f26266', 3, '3,4,5', '18000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_654a477f26266');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_history`
--

CREATE TABLE `invoice_history` (
  `invoice_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `route_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_from` int(11) NOT NULL,
  `route_to` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `customer_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_qty` int(12) NOT NULL,
  `seat_numbers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_history`
--

INSERT INTO `invoice_history` (`invoice_id`, `date`, `route_number`, `route_from`, `route_to`, `car_id`, `customer_id`, `person_qty`, `seat_numbers`, `price_total`, `payment`, `qr_code`) VALUES
(1, '2023-02-09 19:06:37', 'R1', 0, 1, 1, 'cus_63e5435d87faf', 3, '1,2,3', '20000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5435d87faf'),
(2, '2023-02-09 19:06:37', 'R1', 0, 1, 1, 'cus_63e543e49d740', 3, '4,5,6', '18000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e543e49d740'),
(3, '2023-02-09 19:06:37', 'R1', 0, 1, 1, 'cus_63e5440f8a824', 3, '7,8,9', '18000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5440f8a824'),
(4, '2023-02-10 04:24:31', 'R4', 0, 1, 1, 'cus_63e5bd59a49cc', 2, '1,2', '14000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5bd59a49cc'),
(5, '2023-02-10 04:24:31', 'R4', 0, 1, 1, 'cus_63e5c383b1da3', 2, '4,5', '12000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5c383b1da3'),
(6, '2023-02-10 04:24:31', 'R4', 0, 1, 1, 'cus_63e5c45271856', 2, '6,7', '12000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5c45271856'),
(7, '2023-02-10 04:24:31', 'R4', 0, 1, 1, 'cus_63e5c6133ffe5', 2, '3,8', '12000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5c6133ffe5'),
(8, '2023-02-10 04:24:34', 'R1', 0, 2, 1, 'cus_63e544c03ba6f', 3, '3,4,5', '15000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e544c03ba6f'),
(9, '2023-02-10 04:24:36', 'R3', 0, 2, 1, 'cus_63e5a458eca3b', 1, '1', '6000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5a458eca3b'),
(10, '2023-02-10 04:24:38', 'R5', 0, 2, 1, 'cus_63e5a5dd1d785', 1, '8', '5000', 'pay_on_ride', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5a5dd1d785');

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE `price_list` (
  `price_id` int(11) NOT NULL,
  `route_a` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_b` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `front_seat_price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `back_seat_price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`price_id`, `route_a`, `route_b`, `front_seat_price`, `back_seat_price`) VALUES
(1, '0', '1', '7000', '6000'),
(2, '0', '2', '6000', '5000'),
(3, '0', '3', '6000', '5000'),
(4, '0', '4', '6000', '5000'),
(5, '0', '5', '8000', '7000');

-- --------------------------------------------------------

--
-- Table structure for table `temp_customers`
--

CREATE TABLE `temp_customers` (
  `customer_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_customers`
--

INSERT INTO `temp_customers` (`customer_id`, `name`, `phone`, `location`, `nrc`, `created_at`) VALUES
('cus_63e544f54cb1e', 'Min Thein Kyaw', '09779866151', 'GTI', '12/asana(N)627283', '2023-02-09 19:10:03'),
('cus_63e5cd2469b7d', 'Naing Linn Htet', '09677337610', 'GTI', '14/ wkm123456', '2023-02-10 04:51:41'),
('cus_63e5d5c55b69b', 'Nay Oo Hlaing', '09765147468', 'GATE', '12356789', '2023-02-10 05:28:19'),
('cus_63edb84e0adc3', 'Chan Myae Oo', '09779866151', 'Pagoda Street', '12/Lathaya(N)119477', '2023-02-16 05:00:15'),
('cus_643bb0830423c', 'Chan Myae Oo', '09779866151', 'GTI', '12/Lathaya(N)119477', '2023-04-16 08:23:40'),
('cus_643bb0c828a71', 'Chan Myae Oo', '09779866151', 'GATE', '12/Lathaya(N)119477', '2023-04-16 08:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `temp_invoices`
--

CREATE TABLE `temp_invoices` (
  `invoice_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `route_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_from` int(11) NOT NULL,
  `route_to` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `customer_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_qty` int(12) NOT NULL,
  `seat_numbers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_invoices`
--

INSERT INTO `temp_invoices` (`invoice_id`, `date`, `route_number`, `route_from`, `route_to`, `car_id`, `customer_id`, `person_qty`, `seat_numbers`, `price_total`, `payment`, `qr_code`) VALUES
(1, '2023-02-09 19:10:03', 'R2', 0, 1, 1, 'cus_63e544f54cb1e', 2, '1,2', '14000', 'online_payment', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e544f54cb1e'),
(3, '2023-02-10 04:51:41', 'R4', 0, 1, 1, 'cus_63e5cd2469b7d', 2, '6,7', '12000', 'online_payment', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5cd2469b7d'),
(5, '2023-02-10 05:28:19', 'R5', 0, 2, 1, 'cus_63e5d5c55b69b', 3, '1,5,7', '16000', 'online_payment', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63e5d5c55b69b'),
(6, '2023-02-16 05:00:15', 'R4', 0, 2, 1, 'cus_63edb84e0adc3', 2, '9,10', '10000', 'online_payment', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_63edb84e0adc3'),
(7, '2023-04-16 08:23:40', 'R6', 0, 3, 1, 'cus_643bb0830423c', 4, '3,4,5,6', '20000', 'online_payment', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_643bb0830423c'),
(8, '2023-04-16 08:24:44', 'R6', 0, 1, 1, 'cus_643bb0c828a71', 1, '9', '6000', 'online_payment', 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=192.168.178.57:8888/Php_WorkSpace/Bus_Ticket_System/UserPanel/ticket_checker.php?cus_id=cus_643bb0c828a71');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_cancels`
--
ALTER TABLE `booking_cancels`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `gates`
--
ALTER TABLE `gates`
  ADD PRIMARY KEY (`gate_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_history`
--
ALTER TABLE `invoice_history`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `temp_invoices`
--
ALTER TABLE `temp_invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking_cancels`
--
ALTER TABLE `booking_cancels`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gates`
--
ALTER TABLE `gates`
  MODIFY `gate_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `invoice_history`
--
ALTER TABLE `invoice_history`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `temp_invoices`
--
ALTER TABLE `temp_invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
