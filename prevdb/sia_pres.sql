-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 07:24 AM
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
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `add_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `region` varchar(255) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house_no` varchar(11) NOT NULL,
  `postal_code` varchar(11) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `set` tinyint(2) DEFAULT 0,
  `add_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_id`, `user_id`, `region`, `province`, `city`, `barangay`, `street`, `house_no`, `postal_code`, `company`, `room`, `label`, `set`, `add_date`) VALUES
(3, 1, 'REGION IX (ZAMBOANGA PENINSULA)', 'ZAMBOANGA SIBUGAY', 'DIPLAHAN', '', 'test', '45', '4536', '', '', 'House', 0, '2023-04-28 22:24:06'),
(4, 1, 'NATIONAL CAPITAL REGION (NCR)', 'NCR, THIRD DISTRICT', 'CITY OF VALENZUELA', '137504003', 'senrosey', '12', '9089', '', '', 'Work', 0, '2023-04-28 22:27:04'),
(5, NULL, 'NATIONAL CAPITAL REGION (NCR)', 'NCR, SECOND DISTRICT', 'CITY OF PASIG', 'Caniogan', 'sanbartolue', '98', '9089', '', '', 'Work', 0, '2023-04-28 22:45:41'),
(6, NULL, 'REGION II (CAGAYAN VALLEY)', 'NUEVA VIZCAYA', 'BAMBANG', 'Almaguer North', 'nitang ', '76', '4536', '', '', 'Work', 0, '2023-04-28 22:48:45'),
(7, 1, 'REGION IV-A (CALABARZON)', 'LAGUNA', 'CALAUAN', 'Imok', 'test', '98', '4536', '', '', 'Work', 0, '2023-04-28 22:50:50'),
(8, 1, 'NATIONAL CAPITAL REGION (NCR)', 'NCR, FOURTH DISTRICT', 'CITY OF MAKATI', 'Forbes Park', 'mondi', '45', '9089', 'dddd', 'asd', 'School', 1, '2023-04-28 23:07:19'),
(9, 1, 'NATIONAL CAPITAL REGION (NCR)', 'NCR, FOURTH DISTRICT', 'CITY OF PARAÑAQUE', 'Vitalez', 'senrosey', '76', '9089', '', '', 'House', 0, '2023-04-29 13:39:34'),
(12, NULL, 'REGION II (CAGAYAN VALLEY)', 'NUEVA VIZCAYA', 'SANTA FE', 'Malico', 'test', '98', '1234', '', '', 'House', 1, '2023-05-06 12:07:46'),
(14, NULL, 'REGION VII (CENTRAL VISAYAS)', 'NEGROS ORIENTAL', 'JIMALALUD', 'Canlahao', 'test', '45', '9082', '', '', 'Work', 0, '2023-05-06 12:11:54'),
(17, 8, 'REGION III (CENTRAL LUZON)', 'TARLAC', 'CITY OF TARLAC (Capital)', 'Batang-batang', 'Nitang', '98', '1134', '', '', 'House', 1, '2023-05-12 11:38:06'),
(18, 9, 'NATIONAL CAPITAL REGION (NCR)', 'NCR, CITY OF MANILA, FIRST DISTRICT', 'TONDO I / II', 'Barangay 259', 'nitang ', '98', '1167', '', '', 'House', 0, '2023-05-12 13:16:05'),
(19, 9, 'REGION X (NORTHERN MINDANAO)', 'LANAO DEL NORTE', 'NUNUNGAN', 'Malaig', 'Cornelia', '89', '1118', '', '', 'Workplace', 1, '2023-05-12 13:23:36'),
(20, 9, 'REGION X (NORTHERN MINDANAO)', 'LANAO DEL NORTE', 'NUNUNGAN', 'Malaig', 'test edit', '89', '1118', '', '', '', 0, '2023-05-12 13:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_level` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `cr_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_level`, `name`, `email`, `username`, `password`, `contact`, `cr_date`) VALUES
(2, 'Admin', 'Andre Paul Sta. Clara', 'andrepaul.staclara67@gmail.com', 'admin', '$2y$10$2tdVnt3vvysEimr5d32vB.47vXLYXad8UJo3kB20EKaSuI3Nc2Olm', '09298410728', '2023-03-24 10:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `cart_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `stock_id`, `quantity`, `cart_date`) VALUES
(29, NULL, 44, 4, '2023-05-06 13:24:28'),
(62, 1, 49, 4, '2023-05-11 21:10:54'),
(75, 9, 49, 1, '2023-05-13 12:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(18, 'Lanyard'),
(19, 'Shirt Collection'),
(20, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color`) VALUES
(1, 'Red'),
(2, 'Blue'),
(3, 'Green'),
(4, 'Yellow'),
(5, 'Purple'),
(6, 'n/a');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mess_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mess_id`, `email`, `subject`, `message`, `date_sent`) VALUES
(1, 'test', 'test', 'test', '2023-03-22 16:12:18'),
(2, 'andre@gmail.com', 'andre', 'ako si andre', '2023-04-29 13:20:26'),
(3, 'bosselai@gmail.com', 'elaijha', 'ako si elai', '2023-04-29 13:23:40'),
(4, 'zekemapagmahal@gamail.com', 'zeke', 'ako si zeke\r\n', '2023-04-29 13:30:25'),
(5, 'RON@gmail.com', 'ron', 'try', '2023-04-29 13:49:13'),
(6, 'yuri@gmail.com', 'yuri', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-04-29 15:20:10'),
(7, 'rongodfreyultra@gmail.com', 'safety concern', 'makwentoakizkiz', '2023-05-01 14:12:20'),
(8, 'rongodfreyultra@gmail.com', 'axgg', 'saafafada', '2023-05-06 07:26:31'),
(9, 'jane@email.com', 'refund', 'anonabhie', '2023-05-13 05:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `oprod_id` int(11) NOT NULL,
  `ord_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`oprod_id`, `ord_id`, `stock_id`, `quantity`) VALUES
(1, 4, 41, 6),
(2, 4, 44, 3),
(3, 4, 46, 2),
(4, 5, 46, 1),
(5, 5, 41, 1),
(6, 6, 42, 5),
(7, 7, 41, 8),
(8, 8, 43, 16),
(9, 9, 44, 1),
(10, 9, 46, 5),
(11, 10, 41, 1),
(12, 11, 41, 5),
(13, 11, 42, 3),
(14, 12, 41, 1),
(15, 13, 41, 1),
(16, 13, 42, 3),
(17, 14, 46, 1),
(18, 15, 49, 2),
(19, 16, 42, 1),
(20, 17, 41, 1),
(21, 18, 50, 2),
(22, 19, 43, 1),
(23, 19, 41, 1),
(24, 20, 49, 1),
(25, 21, 41, 1),
(26, 22, 49, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `add_id` int(11) DEFAULT NULL,
  `full_name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `mod_` varchar(50) NOT NULL,
  `mop` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `total` decimal(9,2) NOT NULL,
  `ord_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `user_id`, `add_id`, `full_name`, `contact`, `mod_`, `mop`, `status`, `note`, `total`, `ord_date`) VALUES
(4, 1, 8, 'Bogart Pedring', '09123456789', '', '', 0, NULL, 9589.00, '2023-05-04 06:43:38'),
(5, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'Gcash', 3, 'testone', 1798.00, '2023-05-04 07:17:23'),
(6, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'Maya', 5, 'testneworders', 495.00, '2023-05-04 13:06:10'),
(7, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'Paypal', 6, 'checkoutyarn', 7192.00, '2023-05-05 10:18:11'),
(8, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'cod', 0, '', 1734.00, '2023-05-06 05:43:07'),
(9, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'cod', 0, '', 5444.00, '2023-05-06 06:22:05'),
(10, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'cod', 0, '', 1049.00, '2023-05-06 07:08:05'),
(11, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'onlinepayment', 0, 'test email', 4942.00, '2023-05-06 07:46:53'),
(12, NULL, 12, 'Ron Ultra', '09270360320', 'LBC', 'BankTransfer', 0, 'last test', 1049.00, '2023-05-06 13:21:25'),
(13, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'Maya', 0, '', 1346.00, '2023-05-10 14:22:04'),
(14, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'Maya', 1, '', 1049.00, '2023-05-10 15:13:52'),
(15, 8, 17, 'hash password', '09123456999', 'LBC', 'Maya', 0, 'test lang po if nagana', 1548.00, '2023-05-12 11:46:40'),
(16, 8, 17, 'hash password', '09123456999', 'LBC', 'Maya', 0, 'test kang ulit bhie', 249.00, '2023-05-12 11:55:40'),
(17, 8, 17, '', '', 'LBC', 'Maya', 0, '3rd try na bhie', 1049.00, '2023-05-12 12:13:46'),
(18, 9, 19, '', '', 'LBC', 'Maya', 6, '', 1748.00, '2023-05-12 13:26:45'),
(19, 9, 19, '', '', 'LBC', 'Gcash', 3, '', 1148.00, '2023-05-12 13:29:46'),
(20, 9, 19, '', '', 'LBC', 'Gcash', 0, '', 849.00, '2023-05-13 03:49:13'),
(21, 9, 19, 'Ron Ultra', '09270360320', 'LBC', 'Maya', 0, 'note', 1049.00, '2023-05-13 03:59:52'),
(22, 9, 19, 'Ron Ultra', '09270360320', 'LBC', 'Maya', 0, '', 849.00, '2023-05-13 05:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_price` double(7,2) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price`, `prod_desc`, `prod_img`) VALUES
(35, 'nami', 799.00, 'maganda', '35.png'),
(36, 'luffy', 899.00, 'deng', '36.png'),
(37, 'zoro', 899.00, 'maangas', '37.png'),
(38, 'yor pin', 99.00, 'bilog', '38.jpg'),
(39, 'Inazuma', 99.00, 'maangas ', '39.png'),
(41, 'nico robin', 899.00, 'maganda', '41.png'),
(42, 'anyayor', 699.00, 'anime pala to eh', '42.png');

-- --------------------------------------------------------

--
-- Table structure for table `proof`
--

CREATE TABLE `proof` (
  `proof_id` int(11) NOT NULL,
  `ord_id` int(11) DEFAULT NULL,
  `payment_img` varchar(255) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `pickup_img` varchar(255) DEFAULT NULL,
  `pickup_date` datetime DEFAULT NULL,
  `delivered_img` varchar(255) DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `remarks_img` varchar(255) DEFAULT NULL,
  `remarks_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, 'n/a');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `sales` int(11) NOT NULL DEFAULT 0,
  `barcode` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `category_id`, `prod_id`, `color_id`, `size_id`, `stock`, `sales`, `barcode`, `status`, `date_added`) VALUES
(41, 19, 36, 1, 4, 20, 0, NULL, 0, '2023-04-29 14:04:25'),
(42, 20, 38, 6, 6, 23, 0, NULL, 0, '2023-04-29 14:06:33'),
(43, 18, 39, 6, 6, 90, 0, NULL, 0, '2023-04-29 14:12:22'),
(44, 19, 35, 5, 1, 22, 0, NULL, 0, '2023-05-01 08:25:47'),
(46, 19, 37, 3, 4, 25, 2, NULL, 0, '2023-05-02 17:22:28'),
(49, 19, 42, 1, 3, 80, 1, NULL, 0, '2023-05-10 15:24:13'),
(50, 19, 35, 5, 3, 3, 4, NULL, 0, '2023-05-10 15:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `cr_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `password`, `email`, `contact`, `status`, `cr_date`) VALUES
(1, 'Bogart Pedring', 'bogart123', 'bogart123', 'bogart123@gmail.com', '09123456799', 0, '2023-03-22 15:53:37'),
(2, 'John Benedict', 'suntzaur', 'admin13', 'rongodfreyultra@gmail.com', '+639270360320', 0, '2023-04-17 14:23:31'),
(8, 'hash password', 'hashuser', '$2y$10$6L5m8uodizA3oG9N98pczeSBd3TFfH2wotsli3sI6hT2UtDJ2pQmy', 'ultrar.qcydoqcu@gmail.com', '09123456999', 0, '2023-05-12 07:10:52'),
(9, 'Ron Ultra', 'rultra', '$2y$10$PYQTaC7R1zc1.kFNW1ElROwRuEDB3Lj2UTyVaqH6XmDXr75w836bG', 'curseofjedi@gmail.com', '09270360320', 0, '2023-05-12 13:13:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`add_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mess_id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`oprod_id`),
  ADD KEY `ord_id` (`ord_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `add_id` (`add_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `proof`
--
ALTER TABLE `proof`
  ADD PRIMARY KEY (`proof_id`),
  ADD KEY `ord_id` (`ord_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `oprod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `proof`
--
ALTER TABLE `proof`
  MODIFY `proof_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD CONSTRAINT `ordered_products_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`ord_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ordered_products_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`add_id`) REFERENCES `address` (`add_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `proof`
--
ALTER TABLE `proof`
  ADD CONSTRAINT `proof_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`ord_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
