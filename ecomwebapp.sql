-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 06:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomwebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_10_16_171428_create_users_table', 1),
(3, '2023_10_17_034717_create_products_table', 2),
(4, '2023_10_17_053645_create_carts_table', 3),
(5, '2023_10_17_091212_create_orders_table', 4),
(6, '2023_10_17_091254_create_order_items_table', 4),
(7, '2023_10_21_055619_add_column_status_to_users', 5),
(8, '2023_10_21_060239_add_column_status_to_users', 6),
(9, '2023_10_21_062132_add_coloumn_status_too_users', 7),
(10, '2023_10_21_063002_add_column_status_to_users', 8),
(11, '2023_10_25_052844_add_column_keyword_to_products', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerId` int(11) NOT NULL,
  `bill` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerId`, `bill`, `status`, `address`, `fullname`, `phone`, `created_at`, `updated_at`) VALUES
(18, 2, 390.00, 'Delivered', 'Chauri Chaura, Ward No 6', 'Virat Jaiswal', '6393062659', '2023-10-19 23:35:22', '2023-10-22 12:55:40'),
(19, 2, 920.00, 'Delivered', 'parmal gali', 'ankit parmal', '7985458796', '2023-10-19 23:37:12', '2023-10-22 12:56:55'),
(20, 2, 2000.00, 'Delivered', 'Gorakhpur', 'raj jaiswal', '8745632145', '2023-10-19 23:38:15', '2023-10-22 12:57:04'),
(21, 1, 1500.00, 'Delivered', 'aewrrthy', 'jai', '4587452145', '2023-10-20 14:47:59', '2023-10-22 13:03:43'),
(22, 1, 460.00, 'Accepted', 'Mundera bazar chuari chaura gkp, Chauri chaura', 'sanjay', '06393062659', '2023-10-20 14:49:17', '2023-10-22 14:21:23'),
(23, 3, 33300.00, 'paid', 'lucknow', 'aditya singh', '9874589654', '2023-10-22 14:43:12', '2023-10-22 14:43:12'),
(24, 3, 150900.00, 'paid', 'Chauri Chaura, gorakhpur', 'Raj jaiswal', '7652458546', '2023-10-25 11:44:25', '2023-10-25 11:44:25'),
(25, 4, 150900.00, 'paid', 'parmal gali', 'ankit parmal', '6589325485', '2023-10-25 13:43:12', '2023-10-25 13:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `orderId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `productId`, `quantity`, `price`, `orderId`, `created_at`, `updated_at`) VALUES
(16, 2, 3, 130.00, 18, '2023-10-19 23:35:22', '2023-10-19 23:35:22'),
(17, 1, 4, 230.00, 19, '2023-10-19 23:37:12', '2023-10-19 23:37:12'),
(18, 3, 4, 500.00, 20, '2023-10-19 23:38:15', '2023-10-19 23:38:15'),
(19, 3, 3, 500.00, 21, '2023-10-20 14:48:00', '2023-10-20 14:48:00'),
(20, 1, 2, 230.00, 22, '2023-10-20 14:49:17', '2023-10-20 14:49:17'),
(21, 5, 3, 11100.00, 23, '2023-10-22 14:43:12', '2023-10-22 14:43:12'),
(22, 6, 1, 150900.00, 24, '2023-10-25 11:44:25', '2023-10-25 11:44:25'),
(23, 6, 1, 150900.00, 25, '2023-10-25 13:43:12', '2023-10-25 13:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `picture`, `description`, `price`, `quantity`, `category`, `type`, `created_at`, `updated_at`, `keywords`) VALUES
(1, 'Men\'s Bag', 'bag.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 235.00, 15, 'Accessories', 'new-arrivals', NULL, '2023-10-25 12:38:23', 'men\'s wear , bags ,men\'s , clothes'),
(2, 'Men\'s shirt', 'shirt.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 130.00, 34, 'clothes', 'new-arrivals', NULL, NULL, 'men\'s wear , bags ,men\'s , clothes'),
(3, 'Men\'s shoes 123', 'shoes.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 500.00, 35, 'shoes', 'sale', NULL, '2023-10-21 11:57:21', 'men\'s wear , bags ,men\'s , clothes'),
(5, 'phone', 'bagus-hernawan-A6JxK37IlPo-unsplash.jpg', 'iphone', 11100.00, 15, 'Accessories', 'Best Sellers', '2023-10-21 12:00:21', '2023-10-21 12:00:21', 'men\'s wear , bags ,men\'s , clothes'),
(6, 'I Phone 15 pro max', 'iphone.jpg', 'best phone', 150900.00, 41, 'Accessories', 'Best Sellers', '2023-10-25 11:41:23', '2023-10-25 11:41:23', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `picture`, `type`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Virat Jaiswal 138', 'admin@gmail.com', '123', 'Snapchat-1001350095.jpg', 'Admin', '2023-10-17 01:23:41', '2023-10-25 11:33:38', 'Active'),
(2, 'Kartavya jaiswal', 'user@gmail.com', '1234', '20230729_073208.jpg', 'Customer', '2023-10-17 10:21:17', '2023-10-21 23:52:03', 'Active'),
(3, 'raj jaiswal', 'raj@gmail.com', '321', 'Snapchat-300973009.jpg', 'Customer', '2023-10-22 14:41:18', '2023-10-22 14:41:18', 'Active'),
(4, 'ankit parmal', 'ankit@gmail.com', '321', 'DSC_0052_1.JPG', 'Customer', '2023-10-25 13:41:32', '2023-10-25 13:45:02', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
