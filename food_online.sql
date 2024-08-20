-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 12:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `cate_menu`
--

CREATE TABLE `cate_menu` (
  `cate_menu_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cate_menu`
--

INSERT INTO `cate_menu` (`cate_menu_name`) VALUES
('Water'),
('Food');

-- --------------------------------------------------------

--
-- Table structure for table `cate_res`
--

CREATE TABLE `cate_res` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cate_res`
--

INSERT INTO `cate_res` (`cate_id`, `cate_name`) VALUES
(1, 'Default'),
(2, 'Water'),
(3, 'Salad'),
(4, 'Steak'),
(5, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(50) NOT NULL,
  `coupon_discount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_name`, `coupon_discount`) VALUES
(1, 'Discount 25%', 25);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL,
  `mem_user` varchar(50) NOT NULL,
  `mem_pass` varchar(50) NOT NULL,
  `mem_name` varchar(30) NOT NULL,
  `mem_last` varchar(30) NOT NULL,
  `mem_mail` varchar(50) NOT NULL,
  `mem_phone` varchar(10) NOT NULL,
  `mem_img` varchar(50) DEFAULT NULL,
  `mem_address` varchar(255) NOT NULL,
  `mem_status` varchar(10) NOT NULL,
  `mem_check` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_user`, `mem_pass`, `mem_name`, `mem_last`, `mem_mail`, `mem_phone`, `mem_img`, `mem_address`, `mem_status`, `mem_check`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '0627157551', '75179.jpg', 'SKNTC', 'admin', 'enable'),
(2, 'user', 'user', 'User', 'User', 'hanaseed191@gmail.com', '0627157551', '7.jpg', 'SKNTC', 'user', 'enable'),
(3, 'rider', 'rider', 'phattarapon', 'samerpak', 'hanaseed191@gmail.com', '0627157551', '123.jpg', 'SKNTC', 'rider', 'enable'),
(4, 'rest', 'rest', 'phattarapon', 'samerpak', 'hanaseed191@gmail.com', '0627157551', '10.jpg', 'SKNTC', 'rest', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `cate_menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_price` float NOT NULL,
  `m_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `res_id`, `cate_menu_id`, `menu_name`, `menu_price`, `m_img`) VALUES
(1, 1, 2, 'Sandwich', 100, '1.jpg'),
(2, 1, 1, 'Turkey Fajitas', 200, '2.jpg'),
(10, 1, 1, 'Pasta allArrabbiata', 100, '3.jpg'),
(11, 1, 1, 'Spaghetti Carbonara', 300, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `order_qty` int(10) NOT NULL,
  `order_price` float NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'in_process',
  `order_date` date NOT NULL,
  `order_success` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mem_status` varchar(10) DEFAULT NULL,
  `order_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `res_id`, `mem_id`, `menu_id`, `menu_name`, `order_qty`, `order_price`, `order_status`, `order_date`, `order_success`, `mem_status`, `order_group`) VALUES
(1, 1, 2, 2, 'Turkey Fajitas', 2, 400, 'success', '2022-10-28', '2022-11-14 02:35:02', 'rider', 1),
(2, 1, 4, 1, 'Sandwich', 2, 200, 'in_process', '2022-10-28', '2022-11-01 09:28:16', NULL, 1),
(3, 2, 2, 2, 'Turkey Fajitas', 2, 400, 'in_process', '2022-10-28', '2022-11-01 09:22:06', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `res_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `res_name` varchar(40) NOT NULL,
  `res_mail` varchar(50) NOT NULL,
  `res_phone` varchar(10) NOT NULL,
  `o_hr` time NOT NULL,
  `c_hr` time NOT NULL,
  `o_day` varchar(20) NOT NULL,
  `res_address` varchar(255) NOT NULL,
  `res_img` varchar(50) DEFAULT NULL,
  `mem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`res_id`, `cate_id`, `res_name`, `res_mail`, `res_phone`, `o_hr`, `c_hr`, `o_day`, `res_address`, `res_img`, `mem_id`) VALUES
(1, 3, 'MAHACHAI$', '$1@gmail.com', '0627157553', '08:00:00', '20:00:00', 'mon-mon', 'SKNTC$', 'rest1.jpg', 4),
(2, 1, 'SAKHON', '1@gmail.com', '0627157551', '11:35:38', '11:35:38', 'mon-mon', '1', 'rest3.jpg', 5),
(3, 1, '11', '11', '', '00:00:00', '00:00:00', '', '1', '', 25),
(6, 1, 'SAKHON', '1@gmail.com', '0627157551', '11:35:38', '11:35:38', 'mon-mon', '1', 'rest3.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cate_res`
--
ALTER TABLE `cate_res`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cate_res`
--
ALTER TABLE `cate_res`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
