-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 11:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artofcakes`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_admin_registrations`
--

CREATE TABLE `cake_shop_admin_registrations` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake_shop_admin_registrations`
--

INSERT INTO `cake_shop_admin_registrations` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'ad@cake.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_category`
--

CREATE TABLE `cake_shop_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake_shop_category`
--

INSERT INTO `cake_shop_category` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Cakes', '200731042405.jpg'),
(2, 'Pastries', '200731042031.jpeg'),
(3, 'Desserts', '200731042306.jpg'),
(4, 'Cookies', '200731042457.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_orders`
--

CREATE TABLE `cake_shop_orders` (
  `orders_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake_shop_orders`
--

INSERT INTO `cake_shop_orders` (`orders_id`, `users_id`, `delivery_date`, `payment_method`, `total_amount`) VALUES
(34, 5, '2022-08-28', 'Cash', '400'),
(35, 5, '2022-08-27', 'Card', '101');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_orders_detail`
--

CREATE TABLE `cake_shop_orders_detail` (
  `orders_detail_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake_shop_orders_detail`
--

INSERT INTO `cake_shop_orders_detail` (`orders_detail_id`, `orders_id`, `product_name`, `quantity`) VALUES
(7, 4, 'Butterscotch', 1),
(8, 5, 'Chocolate', 1),
(9, 5, 'Vanilla', 1),
(10, 6, 'Black forest', 1),
(11, 6, 'Choco chips', 1),
(12, 7, 'Oreo', 1),
(13, 7, 'Choco chips', 1),
(14, 8, 'Red velvet', 1),
(15, 8, 'Butterscotch', 1),
(16, 8, 'Vanilla', 1),
(17, 9, 'Butterscotch', 1),
(18, 9, 'Strawberry', 1),
(19, 10, 'Butterscotch', 1),
(20, 11, 'Red velvet', 1),
(21, 11, 'Black forest', 1),
(22, 12, 'Red velvet', 1),
(23, 12, 'Butterscotch', 1),
(24, 13, 'Butterscotch', 1),
(25, 14, 'Vanilla', 1),
(26, 14, 'Strawberry', 1),
(27, 15, 'Strawberry', 1),
(28, 16, 'Red velvet', 1),
(29, 16, 'Black forest', 1),
(30, 17, 'Red velvet', 1),
(31, 18, 'Red velvet', 1),
(32, 18, 'Oreo', 1),
(33, 19, 'Red velvet', 1),
(34, 19, 'Black forest', 1),
(35, 20, 'Black forest', 1),
(36, 20, 'Oreo', 1),
(37, 21, 'Black forest', 1),
(38, 21, 'Oreo', 1),
(39, 22, 'Butterscotch', 1),
(40, 23, 'Black forest', 1),
(41, 23, 'Oreo', 1),
(42, 24, 'Vanilla', 1),
(43, 24, 'Choco chips', 1),
(45, 26, 'Black forest', 1),
(46, 27, 'Black forest', 1),
(47, 28, 'Choco chips', 1),
(48, 29, 'Choco chips', 1),
(50, 30, 'Red velvet', 3),
(51, 31, 'Choco chips', 1),
(52, 31, 'Black forest', 1),
(53, 32, 'Red velvet', 1),
(54, 32, 'choco', 1),
(55, 33, 'Choco chips', 1),
(56, 34, 'choco', 1),
(57, 35, 'Black forest', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_product`
--

CREATE TABLE `cake_shop_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_type` varchar(100) DEFAULT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  `product_trend` tinyint(4) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake_shop_product`
--

INSERT INTO `cake_shop_product` (`product_id`, `product_name`, `product_category`, `product_type`, `product_price`, `product_status`, `product_trend`, `product_description`, `product_image`) VALUES
(1, 'Black choco', 1, 'Non-Veg', '850', 1, 0, 'This is cake made of pure chocolate and 1/2kg of this cake is Rs.430', '2007310437280.jpg, 2007310437281.jpg, 2007310437282.jpg'),
(2, 'Red velvet', 1, 'Veg', '980', 0, 1, 'This cake is inspired by red velvet and 1/2kg of this cake is Rs.490', '2007310439020.jpg, 2007310439021.jpg, 2007310439022.jpg'),
(3, 'Black forest', 1, 'Non-Veg', '101', 0, 1, 'It is a simple black forest cake and 1/2kg of this cake is Rs.510', '2208200448190.jpg'),
(4, 'Oreo', 1, 'Veg', '112', 0, 0, 'Made out of oreo biscuits and chocolate cream, 1/2kg of this cake is Rs.560', '2007310441020.jpg, 2007310441021.jpg, 2007310441022.jpg'),
(5, 'Black Choco', 2, 'Veg', '135', 0, 0, 'This is a black chocolate.', '2007310442250.jpg'),
(6, 'Strawberry', 2, 'Veg', '120', 0, 0, 'This is a strawberry.', '2007310443190.jpg'),
(7, 'Butterscotch', 2, 'Non-Veg', '110', 0, 0, 'This is a butterscotch.', '2007310444030.jpg'),
(8, 'Choco chips', 4, 'Veg', '407', 0, 1, 'This a chocolate chip cookie.', '2007310445280.jpg'),
(9, 'Chocolate', 3, 'Veg', '078', 0, 0, 'Chocolate flavoured dessert.', '2007310446340.jpg'),
(10, 'Vanilla', 3, 'Veg', '40_', 0, 0, 'Vanilla flavoured dessert.', '2007310448270.jpg'),
(12, 'choco', 1, 'Veg', '400', 0, 1, 'very nice cake', '2208160633560.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cake_shop_users_registrations`
--

CREATE TABLE `cake_shop_users_registrations` (
  `users_id` int(11) NOT NULL,
  `users_username` varchar(100) NOT NULL,
  `users_email` varchar(150) NOT NULL,
  `users_password` varchar(100) NOT NULL,
  `users_mobile` varchar(50) NOT NULL,
  `users_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake_shop_users_registrations`
--

INSERT INTO `cake_shop_users_registrations` (`users_id`, `users_username`, `users_email`, `users_password`, `users_mobile`, `users_address`) VALUES
(5, 'kavz', 'kavzz@hh.com', '1234', '8431395996', 'kulai'),
(7, 'vignesh', 'vigneshdevadiga012@gmail.com', '1234', '8197674709', 'ccxvcx df fv sgghgf'),
(9, 'aaa', 'hfdhs@112.com', '1234', '8769876789', 'kulai'),
(13, 'vigneh', 'dffs@gmail.com', '123', '5656565656', 'fhjdv dbdfhj');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `suggestions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `name`, `email`, `phone`, `feedback`, `suggestions`) VALUES
(22, 'H Vignesh ', 'vigneshdevadiga012@gmail.com', 2147483647, 'excellent', 'it was nice experience '),
(23, 'H Vignesh ', 'vigneshdevadiga012@gmail.com', 2147483647, 'excellent', 'njbjbj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake_shop_admin_registrations`
--
ALTER TABLE `cake_shop_admin_registrations`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cake_shop_category`
--
ALTER TABLE `cake_shop_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cake_shop_orders`
--
ALTER TABLE `cake_shop_orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `cake_shop_orders_detail`
--
ALTER TABLE `cake_shop_orders_detail`
  ADD PRIMARY KEY (`orders_detail_id`);

--
-- Indexes for table `cake_shop_product`
--
ALTER TABLE `cake_shop_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `cake_shop_users_registrations`
--
ALTER TABLE `cake_shop_users_registrations`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cake_shop_admin_registrations`
--
ALTER TABLE `cake_shop_admin_registrations`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cake_shop_category`
--
ALTER TABLE `cake_shop_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cake_shop_orders`
--
ALTER TABLE `cake_shop_orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cake_shop_orders_detail`
--
ALTER TABLE `cake_shop_orders_detail`
  MODIFY `orders_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `cake_shop_product`
--
ALTER TABLE `cake_shop_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cake_shop_users_registrations`
--
ALTER TABLE `cake_shop_users_registrations`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
