-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.infinityfree.com
-- Generation Time: Sep 23, 2025 at 11:19 AM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39529878_standard_crackers`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `customer_mobile` varchar(15) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `product_name`, `quantity`, `total_price`, `order_date`, `customer_mobile`, `customer_address`) VALUES
(9, 'mani', 'mani@gmail.com', 'SPARROW', 1, '30.00', '2025-07-21 21:33:06', '35256789', 'vellor ,gudiyatham'),
(10, 'mani', 'mani@gmail.com', 'FLOWERPOTS', 1, '60.00', '2025-07-21 21:33:06', '35256789', 'vellor ,gudiyatham'),
(11, 'thiru', 'thiruit302@gmail.com', 'BULLET BOMBS', 1, '90.00', '2025-07-29 22:40:13', '1254789637', 'vellore'),
(12, 'thiru', 'thiruit302@gmail.com', 'ZAMIN CHAKKARS', 1, '50.00', '2025-07-29 22:40:13', '1254789637', 'vellore'),
(13, 'mano', 'mani@gmail.com', 'FLOWERPOTS', 1, '60.00', '2025-07-29 22:42:44', '35256789', 'vellore\r\n'),
(14, 'mano', 'mani@gmail.com', 'BULLET BOMBS', 1, '90.00', '2025-07-29 22:42:44', '35256789', 'vellore\r\n'),
(15, 'lokey', 'lokey@gmail.com', 'BULLET BOMBS', 1, '90.00', '2025-08-07 02:24:37', '1254789637', 'vellore\r\n'),
(16, 'lokey', 'lokey@gmail.com', 'FLOWERPOTS', 11, '660.00', '2025-08-07 02:24:37', '1254789637', 'vellore\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`) VALUES
(1, 'BIJILI RED', NULL, '25.00', 45, 'https://www.standardcrackers.com/assets/uploads/product-featured-9.jpg'),
(2, 'SPARROW', NULL, '30.00', 38, 'https://www.standardcrackers.com/assets/uploads/product-featured-8.jpg'),
(3, 'FIRE PENCILS', NULL, '40.00', 30, 'https://www.standardcrackers.com/assets/uploads/product-featured-165.jpg'),
(4, 'ZAMIN CHAKKARS', NULL, '50.00', 34, 'https://www.standardcrackers.com/assets/uploads/product-featured-6.jpg'),
(5, 'FLOWERPOTS', NULL, '60.00', 11, 'https://www.standardcrackers.com/assets/uploads/product-featured-304.jpg'),
(6, 'GOLD SPARKLERS', NULL, '35.00', 60, 'https://www.standardcrackers.com/assets/uploads/product-featured-112.jpg'),
(7, 'BULLET BOMBS', NULL, '90.00', 41, 'https://www.standardcrackers.com/assets/uploads/product-featured-10.jpg'),
(8, 'ROCKETS', NULL, '70.00', 30, 'https://www.standardcrackers.com/assets/uploads/product-featured-189.jpg'),
(9, 'SKY SHOT', NULL, '120.00', 20, 'https://www.standardcrackers.com/assets/uploads/product-featured-106.jpg'),
(10, '100 WALA', NULL, '50.00', 100, 'https://www.standardcrackers.com/assets/uploads/product-featured-310.jpg'),
(11, '1000 WALA', NULL, '250.00', 89, 'https://www.standardcrackers.com/assets/uploads/product-featured-309.jpg'),
(12, '2000 WALA', NULL, '400.00', 70, 'https://www.standardcrackers.com/assets/uploads/product-featured-308.jpg'),
(13, '5000 WALA', NULL, '850.00', 50, 'https://www.standardcrackers.com/assets/uploads/product-featured-307.jpg'),
(14, '10000 WALA', NULL, '1500.00', 40, 'https://www.standardcrackers.com/assets/uploads/product-featured-306.jpg'),
(15, 'ROCKET BUNDLE', NULL, '300.00', 55, 'https://www.standardcrackers.com/assets/uploads/product-featured-192.jpg'),
(16, 'SEVEN SHOTS', NULL, '50.00', 20, 'https://www.standardcrackers.com/assets/uploads/product-featured-228.jpg'),
(17, 'BHOOT GUN', NULL, '150.00', 20, 'https://www.standardcrackers.com/assets/uploads/product-featured-274.jpg'),
(18, '24 DELUX', NULL, '72.00', 42, 'https://www.standardcrackers.com/assets/uploads/product-featured-328.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
