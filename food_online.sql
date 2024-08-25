-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2024 at 11:57 AM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

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
  `cate_menu_id` int(11) NOT NULL,
  `cate_menu_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cate_menu`
--

INSERT INTO `cate_menu` (`cate_menu_id`, `cate_menu_name`) VALUES
(1, 'Water'),
(2, 'Food'),
(3, 'Salad');

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
(8, 'Food');

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
(1, 'new', 20),
(4, 'old', 10);

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
(1, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '0627157551', 'Restaurant_Näsinneula.jpg', '', 'admin', 'enable'),
(2, 'user', 'user', 'User', 'User', 'hanaseed191@gmail.com', '0627157551', '2024-08-20_21-50-18.png', '                        SKNTC                    ', 'user', 'enable'),
(3, 'rider', 'rider', 'phattarapon', 'samerpak', 'hanaseed191@gmail.com', '0627157551', 'Restaurant_Näsinneula.jpg', 'SKNTC', 'rider', 'enable'),
(4, 'rest', 'rest', 'phattarapon', 'samerpak2', '', '', 'S__10592259.jpg', '', 'rest', 'enable');

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
(1, 1, 3, 'Sandwich', 100, 'green-salad.jpg'),
(2, 1, 3, 'Sandwich', 200, 'green-salad.jpg'),
(10, 1, 2, 'Sandwich', 100, 'green-salad.jpg'),
(11, 1, 2, 'Sandwich', 300, 'green-salad.jpg'),
(18, 1, 1, 'Sandwich', 200, 'green-salad.jpg'),
(19, 1, 3, 'Sandwich', 200, 'green-salad.jpg'),
(20, 1, 3, 'Sandwich', 100, 'green-salad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `order_qty` int(10) NOT NULL,
  `order_price` float NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'in_process',
  `order_date` date NOT NULL,
  `order_success` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mem_status` varchar(10) DEFAULT NULL,
  `order_group` int(11) DEFAULT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `mem_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `res_id`, `mem_id`, `order_qty`, `order_price`, `order_status`, `order_date`, `order_success`, `mem_status`, `order_group`, `order_address`, `mem_note`) VALUES
(45, 1, 2, 1, 720, 'cancle', '2024-08-24', NULL, 'rider', 834, ' Name : User  User Address : SKNTC Tel : 0627157551', ''),
(46, 1, 2, 1, 240, 'cancle', '2024-08-24', NULL, NULL, 397, ' Name : User  User Address : SKNTC Tel : 0627157551', ''),
(47, 1, 2, 3, 240, 'success', '2024-07-25', NULL, 'rider', 322, ' Name : User  User Address : SKNTC Tel : 0627157551', '123'),
(48, 1, 2, 3, 240, 'success', '2023-07-25', NULL, 'rider', 322, ' Name : User  User Address : SKNTC Tel : 0627157551', '123'),
(49, 1, 2, 4, 960, 'in_process', '2024-08-25', NULL, NULL, 880, ' Name : User  User Address : SKNTC Tel : 0627157551', '');

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
(1, 2, 'MAHACHAI', '$1@gmail.com', '0627157554', '08:00:00', '20:00:00', 'mon-wed', 'SKNTC$3', '2024-08-20_21-50-18.png', 4),
(2, 2, 'Sweet', '$1@gmail.com', '0627157554', '08:00:00', '20:00:00', 'mon-wed', 'SKNTC$3', '2024-08-20_21-50-18.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `detail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `res_name`, `mem_id`, `detail`) VALUES
(10, 'MAHACHAI', 2, 'Restaurant Good !!\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sum`
--

CREATE TABLE `sum` (
  `sum_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sum`
--

INSERT INTO `sum` (`sum_id`, `mem_id`, `menu_id`, `res_id`, `menu_name`, `menu_price`, `order_qty`, `order_group`) VALUES
(59, 2, 18, 1, 'Sandwich', 3, 1, 21),
(60, 2, 22, 1, 'Sandwich', 3, 1, 21),
(67, 2, 22, 1, 'Sandwich', 3, 1, 656),
(68, 2, 11, 1, 'Sandwich', 300, 1, 656),
(69, 2, 18, 1, 'Sandwich', 3, 1, 685),
(78, 2, 10, 1, 'Sandwich', 100, 1, 685),
(79, 2, 22, 1, 'Sandwich', 3, 1, 685),
(82, 2, 10, 1, 'Sandwich', 100, 1, 685),
(83, 2, 18, 1, 'Sandwich', 3, 1, 65),
(84, 2, 22, 1, 'Sandwich', 3, 1, 65),
(85, 2, 11, 1, 'Sandwich', 300, 1, 65),
(86, 2, 22, 1, 'Sandwich', 3, 1, 158),
(87, 2, 11, 1, 'Sandwich', 300, 1, 158),
(88, 2, 11, 1, 'Sandwich', 300, 1, 270),
(89, 2, 10, 1, 'Sandwich', 100, 1, 494),
(90, 2, 11, 1, 'Sandwich', 300, 1, 307),
(91, 2, 21, 1, 'Sandwich', 300, 1, 255),
(92, 2, 21, 1, 'Sandwich', 300, 1, 944),
(93, 2, 21, 1, 'Sandwich', 300, 5, 944),
(94, 2, 18, 1, 'Sandwich', 3, 1, 231),
(95, 2, 11, 1, 'Sandwich', 300, 1, 863),
(96, 2, 1, 1, 'Sandwich', 100, 1, 468),
(97, 2, 1, 1, 'Sandwich', 100, 5, 317),
(98, 2, 1, 1, 'Sandwich', 100, 1, 317),
(99, 2, 22, 1, 'Sandwich', 3, 1, 251),
(100, 2, 18, 1, 'Sandwich', 3, 1, 251),
(103, 2, 20, 1, 'Sandwich', 100, 1, 925),
(104, 2, 20, 1, 'Sandwich', 100, 1, 925),
(105, 2, 20, 1, 'Sandwich', 100, 2, 960),
(106, 2, 20, 1, 'Sandwich', 100, 1, 960),
(107, 2, 20, 1, 'Sandwich', 100, 1, 927),
(108, 2, 20, 1, 'Sandwich', 100, 1, 240),
(109, 2, 20, 1, 'Sandwich', 100, 1, 409),
(110, 2, 20, 1, 'Sandwich', 100, 1, 719),
(111, 2, 20, 1, 'Sandwich', 100, 1, 98),
(112, 2, 20, 1, 'Sandwich', 100, 1, 426),
(113, 2, 20, 1, 'Sandwich', 100, 1, 552),
(114, 2, 20, 1, 'Sandwich', 100, 1, 140),
(115, 2, 20, 1, 'Sandwich', 100, 1, 708),
(116, 2, 20, 1, 'Sandwich', 100, 1, 597),
(117, 2, 20, 1, 'Sandwich', 100, 1, 624),
(118, 2, 20, 1, 'Sandwich', 100, 1, 638),
(119, 2, 20, 1, 'Sandwich', 100, 1, 813),
(120, 2, 20, 1, 'Sandwich', 100, 1, 198),
(121, 2, 20, 1, 'Sandwich', 100, 10, 599),
(122, 2, 20, 1, 'Sandwich', 100, 1, 133),
(123, 2, 20, 1, 'Sandwich', 100, 1, 133),
(125, 2, 20, 1, 'Sandwich', 100, 1, 539),
(126, 2, 20, 1, 'Sandwich', 100, 6, 834),
(127, 2, 21, 1, 'Sandwich', 300, 1, 834),
(128, 2, 21, 1, 'Sandwich', 300, 1, 397),
(129, 2, 10, 1, 'Sandwich', 100, 3, 322),
(130, 2, 11, 1, 'Sandwich', 300, 4, 880);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cate_menu`
--
ALTER TABLE `cate_menu`
  ADD PRIMARY KEY (`cate_menu_id`);

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
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sum`
--
ALTER TABLE `sum`
  ADD PRIMARY KEY (`sum_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cate_menu`
--
ALTER TABLE `cate_menu`
  MODIFY `cate_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cate_res`
--
ALTER TABLE `cate_res`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sum`
--
ALTER TABLE `sum`
  MODIFY `sum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
