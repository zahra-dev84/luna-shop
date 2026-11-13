-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2026 at 06:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luna_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$BcFO4JUIhNWC0XznNJG3EeVu/E4SyliXuOvds9jjNdz3KVpXfSXJ6');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`) VALUES
(2, 'عروسک استیج', 500000, 'doll2.jpg', ' کوچک'),
(3, 'عروسک خرس سبز', 600000, 'doll3.jpg', 'متوسط'),
(5, 'عروسک خوک سفید', 390000, 'doll5.jpg', 'کوچک'),
(6, 'عروسک فیل', 550000, 'doll6.jpg', 'متوسط'),
(7, 'عروسک دایناسور سبز', 420000, 'doll7.jpg', 'بزرگ'),
(8, 'عروسک های کارتون بالا (up)', 470000, 'doll8.jpg', 'متوسط'),
(9, 'عروسک بیبلی', 650000, 'doll9.jpg', 'متوسط'),
(10, 'عروسک بیبلی', 520000, 'doll10.jpg', 'کوچک'),
(11, 'عروسک دایناسور سبز', 580000, 'doll11.jpg', 'کوچک'),
(12, 'عروسک موش سرآشپز', 430000, 'doll12.jpg', 'متوسط'),
(13, 'عروسک پگاسوس', 300000, 'doll13.jpg', 'بزرگ'),
(14, 'عروسک فیل', 350000, 'doll14.jpg', 'متوسط'),
(15, 'عروسک الاغ', 410000, 'doll15.jpg', 'بزرگ\r\n'),
(16, 'عروسک جوجه زرد', 250000, 'doll16.jpg', 'متوسط'),
(17, 'عروسک الاغ', 700000, 'doll17.jpg', 'متوسط'),
(18, 'عروسک مستر بین', 460000, 'doll18.jpg', 'کوچک'),
(19, 'عروسک خرس آبی', 540000, 'doll19.jpg', 'کوچک'),
(21, 'عروسک خوک صورتی', 490000, 'doll21.jpg', 'متوسط'),
(22, 'عروسک خوک صورتی', 420000, 'doll22.jpg', 'بزرگ'),
(23, 'عروسک کانگورو قهوه ای', 440000, 'doll23.jpg', 'متوسط'),
(24, 'عروسک مرد عنکبوتی', 510000, 'doll24.jpg', 'کوچک'),
(25, 'عروسک مایک', 390000, 'doll25.jpg', 'بزرگ'),
(26, 'عروسک موش سرآشپز', 620000, 'doll26.jpg', 'بزرگ'),
(27, 'عروسک اردک', 610000, 'doll27.jpg', 'متوسط'),
(28, 'عروسک پاندا', 680000, 'doll28.jpg', 'کوچک'),
(29, 'عروسک سالیوان', 530000, 'doll29.jpg', 'بزرگ'),
(30, 'عروسک شیر', 400000, 'doll30.jpg', 'متوسط'),
(31, 'عروسک اردک', 300000, 'doll31.jpg', 'متوسط');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password`, `photo`) VALUES
(1, 'یگانه رضایی', 'yalda1384234@gmail.com', 'yeganeh', '$2y$10$3AJdum8/uPWWJSY31APW4eoX9MttOmfdEYUDSiap2R306eYDcToMe', '12.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
-- (added for the shopping cart / checkout feature)
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT 'در حال بررسی',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
-- (added for the shopping cart / checkout feature)
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
