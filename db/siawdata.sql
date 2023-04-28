-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 01:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
  `address` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `post_code` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `add_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_id`, `user_id`, `address`, `company`, `room`, `post_code`, `city`, `region`, `add_date`) VALUES
(1, 1, 'test', NULL, NULL, 1234, 'test', 'test', '2023-03-22 16:06:13'),
(2, 1, 'test2', 'test22', 'test2', 1234, 'test2', 'test2', '2023-03-22 16:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_level` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `cr_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_level`, `name`, `email`, `password`, `contact`, `cr_date`) VALUES
(1, 'new_trend', 'Andre Paul N. Sta. Clara', 'andrepaul.staclara67@gmail.com', '$2y$10$k3HnMwBvYei6PyivFU92UeZSpDFeI2rT/fiRR/GsiLpeswxJu7Po6', '09298410728', '2023-03-24 10:53:55');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'Shirt'),
(2, 'Lanyard'),
(3, 'Pins'),
(4, 'Jacket'),
(5, 'SOFI'),
(6, 'Casual Shirts'),
(7, 'T-Shirts & Shirts'),
(8, 'Men Basketball Clothing'),
(9, 'Foldable & Drawstring bags'),
(10, 'Jersey'),
(11, 'Men\'s Hoodies & Sweatshirts'),
(12, 'Face Masks'),
(13, 'Women\'s T-Shirts'),
(14, 'Men\'s Sleeves'),
(15, 'School Sets'),
(16, 'Men\'s Jackets'),
(17, 'Fabric & Material');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color`) VALUES
(1, 'Red'),
(2, 'Blue'),
(3, 'Green'),
(4, 'Yellow'),
(5, 'Purple');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mess_id` int(11) NOT NULL,
  `mess_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mess_id`, `mess_name`, `email`, `message`, `date_sent`) VALUES
(1, 'test', 'test', 'test', '2023-03-22 16:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `oprod_id` int(11) NOT NULL,
  `ord_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `user_id`, `add_id`, `full_name`, `contact`, `mod_`, `mop`, `status`, `note`, `total`, `ord_date`) VALUES
(1, 1, 1, 'test', 'test', 'LBC', 'GCash', 0, 'test', '1262.00', '2023-03-22 16:08:44');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price`, `prod_desc`, `prod_img`) VALUES
(1, 'AnyaXDamian', 19.99, '✔️ A perfect merch for gamers and anime lovers to express their passion\r\n✔️ AXGG collection is inspired by the playful spirit found in anime and video games while still fitting into any lifestyle.\r\n✔️ Activewear is one of the most functional garments, but it is also important to have a means of expressing your personality.\r\n✔️ It\'s 100% high-quality premium polyester fabric, so you can wear it with confidence knowing that it will keep you dry and comfortable in any situation.\r\n✔️ This T-shirt also comes with an absorption technology designed specifically to wick sweat away from your body and keep you comfortable throughout your next adventure!\r\n✔️ Using Ultra-High Quality EPSON Printing System ensures that the color of shirts will never fade away\r\n✔️ Our range of size are available from kids size to 3XL. We have the larger sizes for collectors who like to display their favorite characters proudly!\r\n✔️ You deserve the best and we promise to do everything we can to bring you high quality Anime Merchandise. If you are not satisfied with your orders or have any issues, please contact us and we will work with you to ensure that you are satisfied!', 'images/anyadamian.png'),
(2, 'White T-Shirt', 19.99, 'A simple white t-shirt made from soft cotton.', 'images/shirt-white.jpg'),
(3, 'Anime T-Shirt', 24.99, 'A colorful anime-themed t-shirt featuring popular characters.', 'images/shirt-anime.jpg'),
(4, 'Anime Hoodie', 39.99, 'A comfortable hoodie with an anime-inspired design.', 'images/hoodie-anime.jpg'),
(5, 'Denim Jacket', 69.99, 'A stylish and durable denim jacket for any occasion.', 'images/jacket-denim.jpg'),
(6, 'Bomber Jacket', 59.99, 'A trendy bomber jacket that is both stylish and comfortable.', 'images/jacket-bomber.jpg'),
(7, 'Lanyard with ID Holder', 9.99, 'A high-quality lanyard with a clear ID holder for work or school.', 'images/lanyard-id.jpg'),
(8, 'Lanyard with Keychain', 7.99, 'A simple lanyard with a keychain attachment for everyday use.', 'images/lanyard-key.jpg'),
(9, 'Anime Pins Set', 12.99, 'A set of anime-themed enamel pins for your backpack or jacket.', 'images/pins-anime.jpg'),
(10, 'Cat Pins Set', 9.99, 'A set of cute cat-themed enamel pins for your backpack or jacket.', 'images/pins-cat.jpg'),
(11, 'Black and White T-Shirt', 21.99, 'A classic black and white t-shirt made from soft cotton.', 'images/shirt-bw.jpg'),
(12, 'Striped T-Shirt', 18.99, 'A comfortable and stylish striped t-shirt for any occasion.', 'images/shirt-striped.jpg'),
(13, 'Hooded Sweatshirt', 34.99, 'A cozy hooded sweatshirt that is perfect for chilly days.', 'images/sweatshirt-hooded.jpg'),
(14, 'Zip-Up Sweatshirt', 29.99, 'A versatile and comfortable zip-up sweatshirt for everyday wear.', 'images/sweatshirt-zip.jpg'),
(15, 'Leather Jacket', 99.99, 'A sleek and stylish leather jacket that is perfect for any outfit.', 'images/jacket-leather.jpg'),
(16, 'Track Jacket', 49.99, 'A lightweight and sporty track jacket for your active lifestyle.', 'images/jacket-track.jpg'),
(17, 'Badge Lanyard', 8.99, 'A simple lanyard with a badge attachment for work or events.', 'images/lanyard-badge.jpg'),
(18, 'Phone Lanyard', 6.99, 'A handy lanyard with a phone attachment for hands-free convenience.', 'images/lanyard-phone.jpg'),
(19, 'Yor Pins Set', 11.99, 'A set of fun food-themed enamel pins for your backpack or jacket.', 'images/yor-pins.jpg'),
(20, 'Emoji Pins Set', 10.99, 'A set of expressive emoji-themed enamel pins for your backpack or jacket.', 'images/pins-emoji.jpg'),
(21, 'Anime Face T-Shirt', 24.99, 'A colorful t-shirt featuring anime-style facial expressions.', 'images/shirt-animeface.jpg'),
(22, 'Graphic T-Shirt', 21.99, 'A bold and eye-catching graphic t-shirt for a statement look.', 'images/shirt-graphic.jpg'),
(23, 'Naruto Casual Shirt', 19.99, 'A casual shirt featuring Naruto Uzumaki from the popular anime series Naruto.', 'naruto.jpg'),
(24, 'Attack on Titan Casual Shirt', 24.99, 'A casual shirt featuring Eren Yeager and the Scout Regiment from the popular anime series Attack on Titan.', 'attack_on_titan.jpg'),
(25, 'One Piece Casual Shirt', 21.99, 'A casual shirt featuring Monkey D. Luffy and his pirate crew from the popular anime series One Piece.', 'one_piece.jpg'),
(26, 'Dragon Ball Z Casual Shirt', 22.99, 'A casual shirt featuring Goku and other characters from the popular anime series Dragon Ball Z.', 'dragon_ball_z.jpg'),
(27, 'Death Note Casual Shirt', 20.99, 'A casual shirt featuring Light Yagami and Ryuk from the popular anime series Death Note.', 'death_note.jpg'),
(28, 'Fullmetal Alchemist Casual Shirt', 23.99, 'A casual shirt featuring Edward and Alphonse Elric from the popular anime series Fullmetal Alchemist.', 'fullmetal_alchemist.jpg'),
(29, 'Sailor Moon Casual Shirt', 18.99, 'A casual shirt featuring Sailor Moon and the Sailor Scouts from the popular anime series Sailor Moon.', 'sailor_moon.jpg'),
(30, 'Bleach Casual Shirt', 20.99, 'A casual shirt featuring Ichigo Kurosaki and other characters from the popular anime series Bleach.', 'bleach.jpg'),
(31, 'My Hero Academia Casual Shirt', 24.99, 'A casual shirt featuring Izuku Midoriya and other characters from the popular anime series My Hero Academia.', 'my_hero_academia.jpg'),
(32, 'Cowboy Bebop Casual Shirt', 22.99, 'A casual shirt featuring Spike Spiegel and other characters from the popular anime series Cowboy Bebop.', 'cowboy_bebop.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `category_id`, `prod_id`, `color_id`, `size_id`, `stock`, `sales`, `barcode`, `status`, `date_added`) VALUES
(1, 1, 1, 1, 2, 50, 10, 'images/barcode-0001.jpg', 0, '2023-04-07 19:48:39'),
(2, 2, 2, 2, 3, 100, 20, 'images/barcode-0002.jpg', 0, '2023-04-07 19:48:58'),
(3, 1, 3, 1, 1, 75, 5, 'images/barcode-0003.jpg', 0, '2023-04-07 19:48:58'),
(4, 3, 4, 3, 2, 25, 15, 'images/barcode-0004.jpg', 0, '2023-04-07 19:48:58'),
(5, 4, 5, 2, 4, 40, 0, 'images/barcode-0005.jpg', 0, '2023-04-07 19:48:58'),
(6, 2, 6, 1, 3, 60, 25, 'images/barcode-0006.jpg', 0, '2023-04-07 19:48:58'),
(7, 1, 7, 2, 2, 30, 10, 'images/barcode-0007.jpg', 0, '2023-04-07 19:48:58'),
(8, 3, 8, 4, 1, 10, 5, 'images/barcode-0008.jpg', 0, '2023-04-07 19:48:58'),
(9, 4, 9, 3, 4, 20, 0, 'images/barcode-0009.jpg', 0, '2023-04-07 19:48:58'),
(10, 2, 10, 2, 2, 50, 15, 'images/barcode-0010.jpg', 0, '2023-04-07 19:48:58'),
(11, 1, 11, 3, 3, 45, 10, 'images/barcode-0011.jpg', 0, '2023-04-07 19:48:58'),
(12, 3, 12, 1, 4, 30, 20, 'images/barcode-0012.jpg', 0, '2023-04-07 19:48:58'),
(13, 4, 13, 2, 1, 5, 0, 'images/barcode-0013.jpg', 0, '2023-04-07 19:48:58'),
(14, 2, 14, 4, 2, 15, 5, 'images/barcode-0014.jpg', 0, '2023-04-07 19:48:58'),
(15, 1, 15, 2, 3, 55, 30, 'images/barcode-0015.jpg', 0, '2023-04-07 19:48:58'),
(16, 3, 16, 3, 4, 35, 10, 'images/barcode-0016.jpg', 0, '2023-04-07 19:48:58'),
(17, 4, 17, 4, 1, 10, 0, 'images/barcode-0017.jpg', 0, '2023-04-07 19:48:58'),
(18, 2, 18, 1, 2, 20, 5, 'images/barcode-0018.jpg', 0, '2023-04-07 19:48:58'),
(19, 1, 19, 4, 3, 25, 15, 'images/barcode-0019.jpg', 0, '2023-04-07 19:48:58'),
(20, 3, 20, 2, 4, 30, 10, 'images/barcode-0020.jpg', 0, '2023-04-07 19:48:58'),
(21, 1, 1, 1, 1, 50, 10, 'images/barcode-0021.jpg', 0, '2023-04-07 19:49:16'),
(22, 2, 2, 2, 2, 75, 5, 'images/barcode-0022.jpg', 0, '2023-04-07 19:49:16'),
(23, 3, 3, 3, 3, 30, 20, 'images/barcode-0023.jpg', 0, '2023-04-07 19:49:16'),
(24, 4, 4, 4, 4, 20, 10, 'images/barcode-0024.jpg', 0, '2023-04-07 19:49:16'),
(25, 1, 5, 1, 2, 40, 15, 'images/barcode-0025.jpg', 0, '2023-04-07 19:49:16'),
(26, 2, 6, 2, 3, 65, 10, 'images/barcode-0026.jpg', 0, '2023-04-07 19:49:16'),
(27, 3, 7, 3, 4, 50, 25, 'images/barcode-0027.jpg', 0, '2023-04-07 19:49:16'),
(28, 4, 8, 4, 1, 15, 5, 'images/barcode-0028.jpg', 0, '2023-04-07 19:49:16'),
(29, 1, 9, 1, 3, 35, 10, 'images/barcode-0029.jpg', 0, '2023-04-07 19:49:16'),
(30, 2, 10, 2, 4, 50, 15, 'images/barcode-0030.jpg', 0, '2023-04-07 19:49:16'),
(31, 3, 11, 3, 1, 25, 10, 'images/barcode-0031.jpg', 0, '2023-04-07 19:49:16'),
(32, 4, 12, 4, 2, 30, 5, 'images/barcode-0032.jpg', 0, '2023-04-07 19:49:16'),
(33, 1, 13, 1, 4, 15, 0, 'images/barcode-0033.jpg', 0, '2023-04-07 19:49:16'),
(34, 2, 14, 2, 1, 60, 20, 'images/barcode-0034.jpg', 0, '2023-04-07 19:49:16'),
(35, 3, 15, 3, 2, 40, 10, 'images/barcode-0035.jpg', 0, '2023-04-07 19:49:16'),
(36, 4, 16, 4, 3, 10, 5, 'images/barcode-0036.jpg', 0, '2023-04-07 19:49:16'),
(37, 1, 17, 1, 1, 30, 10, 'images/barcode-0037.jpg', 0, '2023-04-07 19:49:16'),
(38, 2, 18, 2, 2, 45, 5, 'images/barcode-0038.jpg', 0, '2023-04-07 19:49:16'),
(39, 3, 19, 3, 3, 20, 15, 'images/barcode-0039.jpg', 0, '2023-04-07 19:49:16'),
(40, 4, 20, 4, 4, 25, 5, 'images/barcode-0040.jpg', 0, '2023-04-07 19:49:16');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `oprod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `proof`
--
ALTER TABLE `proof`
  MODIFY `proof_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
