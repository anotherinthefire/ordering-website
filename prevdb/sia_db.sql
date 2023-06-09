-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 07:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
(9, 1, 'NATIONAL CAPITAL REGION (NCR)', 'NCR, FOURTH DISTRICT', 'CITY OF PARAÑAQUE', 'Vitalez', 'senrosey', '76', '9089', '', '', 'House', 0, '2023-04-29 13:39:34');

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
(16, 1, 42, 5, '2023-05-05 10:28:01'),
(17, 1, 44, 3, '2023-05-05 11:54:32'),
(18, 1, 46, 3, '2023-05-05 19:39:44');

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
(20, 'Accessories'),
(21, 'Bag'),
(22, 'Button Pin'),
(23, 'Banner'),
(24, 'Scarf'),
(25, 'Sleeves');

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
(1, 'Test0@gmail.com', 'Question', 'How to wash?', '2023-03-22 16:12:18'),
(2, 'andre@gmail.com', 'Change Size', 'ako si andre', '2023-04-29 13:20:26'),
(3, 'bosselai@gmail.com', 'Fix', 'Re Stitch', '2023-04-29 13:23:40'),
(4, 'zekemapagmahal@gamail.com', 'Damage', 'Right Side of the Shirt', '2023-04-29 13:30:25'),
(5, 'RON@gmail.com', 'Refund', 'try Refund', '2023-04-29 13:49:13'),
(6, 'yuri@gmail.com', 'Change Color', 'Color: Red', '2023-04-29 15:20:10'),
(7, 'rongodfreyultra@gmail.com', 'safety concern', '100% Cotton?', '2023-05-01 14:12:20'),
(8, 'Test1@gmail.com', 'Refund', '108 Pesos', '2023-05-13 00:46:22'),
(9, 'Test2@gmail.com', 'Warranty', 'Address: North Quezon City', '2023-05-13 00:46:32'),
(10, 'Test3@gmail.com', 'Refund', 'Returning', '2023-05-13 00:47:03'),
(11, 'Test4@gmail.com', 'Upgrade', '251 Pesos', '2023-05-13 00:47:16'),
(12, 'Test5@gmail.com', 'Refund', '310 Pesos', '2023-05-13 00:47:17'),
(13, 'Test6@gmail.com', 'Refund', 'Pa Refund po ', '2023-05-13 00:47:17'),
(14, 'Test7@gmail.com', 'Refund', 'Needed Help About the Product', '2023-05-13 00:47:20'),
(15, 'Test8@gmail.com', 'Fix', 'Help', '2023-05-13 00:48:30'),
(16, 'Test9@gmail.com', 'Refund', 'About Product', '2023-05-13 00:49:12'),
(17, 'Test10@gmail.com', 'Damage', 'Consult', '2023-05-13 00:50:10');

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
(7, 7, 41, 8);

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
(4, 1, 8, 'Bogart Pedring', '09123456789', '', '', 0, NULL, '9589.00', '2023-05-04 06:43:38'),
(5, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'Gcash', 3, 'testone', '1798.00', '2023-05-04 07:17:23'),
(6, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'Maya', 5, 'testneworders', '495.00', '2023-05-04 13:06:10'),
(7, 1, 8, 'Bogart Pedring', '09123456789', 'LBC', 'Paypal', 6, 'checkoutyarn', '7192.00', '2023-05-05 10:18:11');

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
(35, 'nami', 799.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', '35.png'),
(36, 'luffy', 899.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', '36.png'),
(37, 'zoro', 899.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', '37.png'),
(38, 'yor pin', 99.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', '38.jpg'),
(39, 'Inazuma', 99.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', '39.png'),
(41, 'nico robin', 899.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', '41.png'),
(42, 'Atler Ego', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Alter Ego.jpg'),
(43, 'Archer', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Archer.jpg'),
(44, 'Assassin', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Assassin.jpg'),
(45, 'Avenger', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Avenger.jpg'),
(46, 'Berserker', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Berserker.jpg'),
(47, 'Caster', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Caster.jpg'),
(48, 'Chaldea', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Chaldea.jpg'),
(49, 'Foreigner', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Foreigner.jpg'),
(50, 'Lancer', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Lancer.jpg'),
(51, 'Moon Cancer', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Moon Cancer.jpg'),
(52, 'Pretender', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Pretender.jpg'),
(53, 'Rider', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Rider.jpg'),
(54, 'Ruler', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Ruler.jpg'),
(55, 'Saber', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Saber.jpg'),
(56, 'Shielder', 310.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Shielder.jpg'),
(57, 'Alter Ego Tshirt', 1299.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Alter Ego Tshirt.jpg'),
(58, 'Archer Tshirt', 1299.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Archer Tshirt.jpg'),
(59, 'Assassin Tshirt', 1299.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Assassin Tshirt.jpg'),
(60, 'Avenger Tshirt', 1299.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Avenger Tshirt.jpg'),
(61, 'Berserker Tshirt', 1299.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Berserker Tshirt.jpg'),
(62, 'Caster Tshirt', 1299.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Caster Tshirt.jpg'),
(63, 'Chaldea Tshirt', 1299.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Chaldea Tshirt.jpg'),
(64, 'Foreigner Tshirt', 1299.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Foreigner Tshirt.jpg'),
(65, 'Lancer Tshirt', 1299.00, '✔️ A perfect merch for gamers and anime lovers to express their passion\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!\n', 'Lancer Tshirt.jpg');

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
(46, 19, 37, 3, 4, 25, 2, NULL, 0, '2023-05-02 17:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `cr_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `password`, `email`, `contact`, `cr_date`) VALUES
(1, 'Bogart Pedring', 'bogart123', 'bogart123', 'bogart123@gmail.com', '09123456789', '2023-03-22 15:53:37'),
(2, 'John Benedict', 'suntzaur', 'admin13', 'rongodfreyultra@gmail.com', '+639270360320', '2023-04-17 14:23:31');

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
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `oprod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
