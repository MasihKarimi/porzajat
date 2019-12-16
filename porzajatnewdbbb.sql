-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 01:55 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `porzajat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_paids`
--

CREATE TABLE `cash_paids` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_amount` varchar(255) NOT NULL,
  `tl_amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cash_payments`
--

CREATE TABLE `cash_payments` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pay_amount` varchar(255) NOT NULL,
  `tl_amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `serail_number` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cash_receives`
--

CREATE TABLE `cash_receives` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pay_amount` varchar(255) NOT NULL,
  `tl_amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `serail_number` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `p_contact` varchar(255) NOT NULL,
  `l_amount` varchar(255) DEFAULT '0',
  `p_amount` varchar(255) DEFAULT '0',
  `tin` varchar(255) DEFAULT NULL,
  `lic` varchar(255) DEFAULT NULL,
  `reg` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `p_contact`, `l_amount`, `p_amount`, `tin`, `lic`, `reg`, `created_at`, `updated_at`) VALUES
(1, 'Ansar', 'kabul', '04494949', '39494', '0', '0', NULL, NULL, NULL, '2019-11-21 12:54:22', '2019-11-11 20:54:20'),
(2, 'ilyas', 'jalalabad', '32323', '12323', '0', '0', 'adfa', 'fdasf', 'fdasf', '2019-11-21 12:54:25', '2019-11-17 17:43:04'),
(3, 'mashi', 'karmi', '02838383', '3232', '0', '0', '323', '213', '3232', '2019-11-17 17:41:58', '2019-11-17 17:41:58'),
(5, 'amjed', 'parwan', '03838383', 'mobile', '0', '0', '010', '023334', '040505', '2019-11-21 12:54:28', '2019-11-18 10:48:21'),
(6, 'naeem', 'jalalabad', '23329329', 'safa', '0', '0', 'fadsf', 'dfasf', 'fadf', '2019-11-18 10:54:05', '2019-11-18 10:54:05'),
(7, 'salaam', 'adfa', 'faf', 'afdf', '0', '0', '45', '33', '22', '2019-11-18 15:54:20', '2019-11-18 15:54:20'),
(8, 'jan', 'jan', 'jan', 'jan', '0', '0', 'jan', 'jan', 'jan', '2019-11-18 15:57:11', '2019-11-18 15:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `finance_expenses`
--

CREATE TABLE `finance_expenses` (
  `id` int(11) NOT NULL,
  `expenses_type` int(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `remark` varchar(3000) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `giveback` varchar(10) NOT NULL DEFAULT 'false',
  `currencytype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `product_s` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_s`, `created_at`, `updated_at`) VALUES
(1, 'Porza', '1203', '2019-11-06 13:03:10', '2019-11-06 13:03:10'),
(5, 'kee', '323323', '2019-11-07 06:07:20', '2019-11-07 06:07:20'),
(6, 'hjk', '5767', '2019-11-16 09:56:58', '2019-11-16 09:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bene` int(11) NOT NULL,
  `date` date NOT NULL,
  `one_name` varchar(255) NOT NULL,
  `one_phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount` varchar(255) DEFAULT NULL,
  `sales_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `remainings`
--

CREATE TABLE `remainings` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `total_debt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` varchar(1000) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `sales_type` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mid` int(11) DEFAULT NULL,
  `bene` int(11) NOT NULL,
  `paybill` varchar(1000) DEFAULT NULL,
  `giveback` varchar(1000) NOT NULL DEFAULT 'false',
  `remin` int(11) NOT NULL DEFAULT '0',
  `one_name` varchar(255) DEFAULT NULL,
  `one_phone` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `return_p` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) DEFAULT NULL,
  `sales_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting_expenses`
--

CREATE TABLE `setting_expenses` (
  `id` int(11) NOT NULL,
  `expensesna` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_expenses`
--

INSERT INTO `setting_expenses` (`id`, `expensesna`, `created_at`, `updated_at`) VALUES
(1, 'Shop Rent', '2019-11-08 22:51:22', '2019-11-08 22:51:22'),
(2, 'Employee Salary', '2019-11-08 22:51:36', '2019-11-08 22:51:36'),
(3, 'Car Oil', '2019-11-08 22:51:47', '2019-11-08 22:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `net_price` int(11) NOT NULL,
  `sales_price` int(11) NOT NULL,
  `pay_amount` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_benefit` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remins` int(11) NOT NULL,
  `quantity_sales` int(11) NOT NULL,
  `sales_type` int(11) NOT NULL,
  `paybill` int(11) NOT NULL DEFAULT '0',
  `customer_id` varchar(255) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `state` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `photo`, `email`, `password`, `state`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Mujib', 'Halimi', '1511958847.jpg', 'salimjan3008@gmail.com', '$2y$10$mbBmXVFLZ0z/6kKE3C8PfuWYnla3jieLSQU46XOwlxRzPRoDT0v6K', 0, '2019-11-12 21:14:58', '2017-11-29 12:34:07', '1'),
(4, 'masih', 'karimi', '1573643029.jpg', 'ma@gmail.com', '$2y$10$0EliUA0Rg2x3MMozoxUbLOfspsXbjQTI1amkaqvsfUn7zkBMuL9.2', 0, '2019-11-13 11:03:49', '2019-11-13 11:03:49', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_paids`
--
ALTER TABLE `cash_paids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_payments`
--
ALTER TABLE `cash_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_receives`
--
ALTER TABLE `cash_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_expenses`
--
ALTER TABLE `finance_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_type` (`expenses_type`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remainings`
--
ALTER TABLE `remainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `setting_expenses`
--
ALTER TABLE `setting_expenses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expensesna` (`expensesna`),
  ADD UNIQUE KEY `expensesna_2` (`expensesna`),
  ADD UNIQUE KEY `expensesna_3` (`expensesna`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
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
-- AUTO_INCREMENT for table `cash_paids`
--
ALTER TABLE `cash_paids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cash_payments`
--
ALTER TABLE `cash_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cash_receives`
--
ALTER TABLE `cash_receives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `finance_expenses`
--
ALTER TABLE `finance_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `remainings`
--
ALTER TABLE `remainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting_expenses`
--
ALTER TABLE `setting_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
