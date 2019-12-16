-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2019 at 03:51 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `cash_paids`;
CREATE TABLE IF NOT EXISTS `cash_paids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_amount` varchar(255) NOT NULL,
  `tl_amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cash_paids`
--

INSERT INTO `cash_paids` (`id`, `customer_id`, `user_id`, `pay_amount`, `tl_amount`, `created_at`, `updated_at`) VALUES
(1, 9, 1, '0', '150000', '2019-12-08 07:14:12', NULL),
(2, 10, 1, '36750', '600000', '2019-12-08 06:06:37', NULL),
(3, 11, 1, '0', '10000', '2019-11-24 07:03:48', NULL),
(4, 12, 1, '0', '0', '2019-11-24 06:57:20', NULL),
(5, 13, 1, '0', '1300', '2019-11-24 07:53:15', NULL),
(6, 14, 1, '8100', '60000', '2019-11-26 05:47:11', NULL),
(7, 15, 1, '0', '31000', '2019-12-01 11:12:11', NULL),
(8, 16, 1, '0', '41300', '2019-12-12 16:47:48', NULL),
(9, 17, 1, '0', '4000', '2019-12-11 11:16:42', NULL),
(10, 18, 1, '0', '2000', '2019-12-12 20:24:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cash_payments`
--

DROP TABLE IF EXISTS `cash_payments`;
CREATE TABLE IF NOT EXISTS `cash_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `pay_amount` varchar(255) NOT NULL,
  `tl_amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `serail_number` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cash_payments`
--

INSERT INTO `cash_payments` (`id`, `customer_id`, `pay_amount`, `tl_amount`, `date`, `user_id`, `serail_number`, `created_at`, `updated_at`) VALUES
(1, 10, '73400', '673400', '2019-11-24', 1, '490', '2019-11-24 05:29:01', NULL),
(2, 14, '20000', '58100', '2019-11-24', 1, '00', '2019-11-24 08:47:15', NULL),
(3, 14, '10000', '38100', '2019-11-12', 1, '260', '2019-11-25 07:14:10', NULL),
(4, 14, '8100', '68100', '2019-11-08', 1, '840', '2019-11-26 05:47:11', NULL),
(5, 10, '36750', '636750', '2019-12-08', 1, '810', '2019-12-08 06:06:37', NULL),
(6, 9, '900', '900', '2019-12-08', 1, '980', '2019-12-08 07:03:11', NULL),
(7, 16, '20000', '40000', '2019-12-10', 1, '130', '2019-12-10 07:53:51', NULL),
(8, 16, '4000', '34000', '2019-12-10', 1, '330', '2019-12-10 08:03:49', NULL),
(9, 16, '10000', '30000', '2019-12-11', 1, '980', '2019-12-11 07:33:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cash_receives`
--

DROP TABLE IF EXISTS `cash_receives`;
CREATE TABLE IF NOT EXISTS `cash_receives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `pay_amount` varchar(255) NOT NULL,
  `tl_amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `serail_number` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cash_receives`
--

INSERT INTO `cash_receives` (`id`, `customer_id`, `pay_amount`, `tl_amount`, `date`, `user_id`, `serail_number`, `created_at`, `updated_at`) VALUES
(1, 9, '50000', '561200', '2019-11-20', 1, '490', '2019-11-24 05:27:09', NULL),
(2, 15, '20000', '40000', '2019-11-26', 1, '570', '2019-11-26 05:40:08', NULL),
(3, 15, '5000', '20000', '2019-11-26', 1, '680', '2019-11-26 05:40:59', NULL),
(4, 15, '10000', '15000', '2019-12-01', 1, '570', '2019-12-01 11:11:16', NULL),
(5, 15, '3000', '5000', '2019-12-01', 1, '560', '2019-12-01 11:18:41', NULL),
(6, 15, '5000', '27550', '2019-12-02', 1, '940', '2019-12-02 10:55:15', NULL),
(7, 10, '2000', '12000', '2019-12-08', 1, '300', '2019-12-08 06:39:04', NULL),
(8, 16, '3000', '6000', '2019-12-10', 1, '710', '2019-12-10 07:53:13', NULL),
(9, 16, '5000', '7000', '2019-12-12', 1, '850', '2019-12-10 07:57:43', NULL),
(10, 16, '2000', '2000', '2019-12-11', 1, '310', '2019-12-11 07:33:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `p_contact`, `l_amount`, `p_amount`, `tin`, `lic`, `reg`, `created_at`, `updated_at`) VALUES
(2, 'ilyas', 'jalalabad', '32323', '12323', '40000', '5059228', 'adfa', 'fdasf', 'fdasf', '2019-12-12 20:18:16', '2019-11-17 17:43:04'),
(9, 'AWCC', 'darlaman', '0787878988', 'Ahmad', '513950', '53656', '9997', '0809', '79878', '2019-12-02 10:24:48', '2019-11-23 07:10:06'),
(10, 'Kabul Motors', 'qowai markaz', '0787878988', 'Fahim', '10000', '2000', '798', '97', '89789', '2019-12-08 06:39:04', '2019-11-23 07:10:37'),
(11, 'khalid', 'quwa-e-markaz', '+9734682', 'omid', '27750', '0', '156', '987456', '456123', '2019-11-24 07:20:46', '2019-11-24 16:26:25'),
(12, 'omid', 'shar-e-naw', '+9785465', 'asad', '0', '52100', '', '', '', '2019-11-24 07:21:02', '2019-11-24 16:27:20'),
(13, 'Kabul Dubai Auto Parts', 'quwa-e-markaz', '0202212635', 'Khalid', '0', '0', '', '', '', '2019-11-24 17:17:40', '2019-11-24 17:17:40'),
(14, 'Waheed Hamidi LTD', 'quwa-e-markaz', '0202207464', 'Khalid', '6300', '0', '', '', '', '2019-11-24 08:27:05', '2019-11-24 17:18:17'),
(15, 'Lodin Auto Parts', 'quwa-e-markaz', '0202202222', 'Khalid', '22550', '43000', '', '', '', '2019-12-02 10:55:15', '2019-11-24 17:18:53'),
(16, 'Masih', 'kh', 'gdq', 'gd', '4000', '10000', 'gd', 'gd', 'fdf', '2019-12-12 17:03:34', '2019-12-01 20:08:11'),
(17, 'Test', 'adsfk', 'asdkfj', 'asdkfj', '1500', '0', 'asldfj', 'lsdkfj', 'sdklfj', '2019-12-11 12:22:49', '2019-12-11 11:12:50'),
(18, 'Hikmat', 'adkj', 'aksdj', 'kajf', '16000', '0', 'kjasdkj', 'ksjd', 'kjasdk', '2019-12-12 20:25:51', '2019-12-12 20:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `daily_ledger`
--

DROP TABLE IF EXISTS `daily_ledger`;
CREATE TABLE IF NOT EXISTS `daily_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL COMMENT 'customer/vendor id',
  `paid_amount` float DEFAULT NULL,
  `debit` tinyint(1) NOT NULL DEFAULT '0',
  `credit` tinyint(1) NOT NULL DEFAULT '0',
  `paid_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_ledger`
--

INSERT INTO `daily_ledger` (`id`, `customer_id`, `paid_amount`, `debit`, `credit`, `paid_date`) VALUES
(8, 9, 500, 0, 1, '2019-12-12 23:31:01'),
(2, 10, 1000, 0, 1, '2019-12-12 23:31:01'),
(1, 2, 16000, 1, 0, '2019-09-12 23:31:01'),
(9, 16, 250, 1, 0, '2019-12-12 23:46:27'),
(10, 2, 180, 0, 1, '2019-12-12 23:49:52'),
(11, 2, 120, 0, 1, '2019-12-12 23:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `finance_expenses`
--

DROP TABLE IF EXISTS `finance_expenses`;
CREATE TABLE IF NOT EXISTS `finance_expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expenses_type` int(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `remark` varchar(3000) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `giveback` varchar(10) NOT NULL DEFAULT 'false',
  `currencytype` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expenses_type` (`expenses_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(1000) NOT NULL,
  `product_s` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_s`, `created_at`, `updated_at`) VALUES
(7, 'Item_1', '908098', '2019-11-23 07:12:38', '2019-11-23 07:12:38'),
(8, 'Item_2', '32423', '2019-11-23 07:12:47', '2019-11-23 07:12:47'),
(9, 'Item3', '234324', '2019-11-23 07:12:56', '2019-11-23 07:12:56'),
(10, 'New Item', '23423', '2019-11-23 10:17:45', '2019-11-23 10:17:45'),
(11, 'breakpad', '04465-60280', '2019-11-24 16:28:44', '2019-11-24 16:28:44'),
(12, 'oilfilter', '98754-fsda-45', '2019-11-24 16:29:00', '2019-11-24 16:29:00'),
(13, 'HUB Stud', '90942-02083', '2019-11-24 17:19:48', '2019-11-24 17:19:48'),
(14, 'NUT HUB', '90942-01103', '2019-11-24 17:20:22', '2019-11-24 17:20:22'),
(15, 'Dumper Assy, Steering', 'SD59-825', '2019-11-24 17:26:44', '2019-11-24 17:26:44'),
(16, 'END Assy TIE Rod RH', '45046-69236', '2019-11-24 17:31:54', '2019-11-24 17:31:54'),
(17, 'ldfsjl', '42343', '2019-11-25 07:40:12', '2019-11-23 12:13:22'),
(18, 'SHOE ASSY PARKING BRAKE RH NO.2', '46530-34010', '2019-11-24 17:33:02', '2019-11-24 17:33:02'),
(19, 'ABSORBER SHOCK FRONT', 'GS59-690', '2019-11-24 17:33:26', '2019-11-24 17:33:26'),
(20, 'ABSORBER SHOCK RR', 'GS59-741', '2019-11-24 17:35:54', '2019-11-24 17:35:54'),
(21, 'myproduct', '87676', '2019-12-01 06:08:16', '2019-12-01 15:38:16'),
(22, 'Test', '002', '2019-12-12 16:45:24', '2019-12-12 16:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

DROP TABLE IF EXISTS `quotations`;
CREATE TABLE IF NOT EXISTS `quotations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `sales_price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `customer_id`, `product_id`, `quantity`, `bene`, `date`, `one_name`, `one_phone`, `created_at`, `updated_at`, `discount`, `sales_price`) VALUES
(1, 9, 8, 46, 1, '2019-11-23', 'Name', 'Phone', '2019-12-01 06:02:08', '2019-12-01 15:32:08', NULL, 3443),
(2, 9, 8, 450, 1, '2019-11-23', 'Name', 'Phone', '2019-11-22 22:15:05', '2019-11-22 22:15:05', NULL, 200),
(3, 9, 8, 200, 2, '2019-11-23', 'Name', 'Phone', '2019-11-23 04:25:34', '2019-11-23 04:25:34', NULL, 200),
(4, 9, 8, 2343, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:17:44', '2019-11-23 05:17:44', NULL, 34),
(5, 9, 9, 234234, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:17:53', '2019-11-23 05:17:53', NULL, 433),
(6, 9, 10, 33, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:18:03', '2019-11-23 05:18:03', NULL, 2343),
(7, 9, 9, 97987, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:18:14', '2019-11-23 05:18:14', NULL, 78),
(8, 9, 10, 234, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:18:23', '2019-11-23 05:18:23', NULL, 2343),
(9, 9, 10, 34, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:18:38', '2019-11-23 05:18:38', NULL, 3423),
(10, 9, 9, 3423, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:18:46', '2019-11-23 05:18:46', NULL, 3432),
(11, 9, 7, 324, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:18:54', '2019-11-23 05:18:54', NULL, 24),
(12, 9, 9, 345, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:19:01', '2019-11-23 05:19:01', NULL, 2321),
(13, 9, 10, 2343, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:19:09', '2019-11-23 05:19:09', NULL, 34324),
(14, 9, 10, 345, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:19:16', '2019-11-23 05:19:16', NULL, 4324),
(15, 9, 10, 342, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:19:25', '2019-11-23 05:19:25', NULL, 2312),
(16, 9, 10, 345, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:19:33', '2019-11-23 05:19:33', NULL, 2343),
(17, 9, 7, 3454, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:19:41', '2019-11-23 05:19:41', NULL, 23423),
(18, 9, 9, 345, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:19:48', '2019-11-23 05:19:48', NULL, 234),
(19, 9, 9, 3454, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:19:55', '2019-11-23 05:19:55', NULL, 23432),
(20, 9, 9, 345, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:20:02', '2019-11-23 05:20:02', NULL, 23423),
(21, 9, 9, 345, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:20:14', '2019-11-23 05:20:14', NULL, 234),
(22, 9, 9, 234, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:20:22', '2019-11-23 05:20:22', NULL, 2343),
(23, 9, 10, 54, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:20:29', '2019-11-23 05:20:29', NULL, 2343),
(24, 9, 9, 234, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:20:37', '2019-11-23 05:20:37', NULL, 343),
(25, 9, 9, 234, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:20:44', '2019-11-23 05:20:44', NULL, 23423),
(26, 9, 10, 342, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:20:51', '2019-11-23 05:20:51', NULL, 234),
(27, 9, 7, 2343, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:20:59', '2019-11-23 05:20:59', NULL, 2324),
(28, 9, 8, 3454, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:21:07', '2019-11-23 05:21:07', NULL, 2343),
(29, 9, 9, 234, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:21:14', '2019-11-23 05:21:14', NULL, 234),
(30, 9, 9, 234, 3, '2019-11-23', 'Name', 'Phone', '2019-11-23 05:21:21', '2019-11-23 05:21:21', NULL, 2343),
(31, 9, 9, 509, 4, '2019-11-24', 'Name', 'Phone', '2019-12-01 06:04:40', '2019-12-01 15:34:40', NULL, 500),
(32, 9, 11, 50, 4, '2019-11-24', 'Name', 'Phone', '2019-11-24 16:58:53', '2019-11-24 16:58:53', NULL, 400),
(33, 9, 8, 10, 5, '2019-12-01', 'Name', 'Phone', '2019-12-01 14:58:27', '2019-12-01 14:58:27', NULL, 200),
(34, 2, 8, 78, 6, '2019-12-01', 'Name', 'Phone', '2019-12-01 08:01:23', '2019-12-01 08:01:23', NULL, 45),
(35, 9, 10, 23, 7, '2019-12-12', 'Name', 'Phone', '2019-12-12 01:57:29', '2019-12-12 01:57:29', NULL, 200);

-- --------------------------------------------------------

--
-- Table structure for table `remainings`
--

DROP TABLE IF EXISTS `remainings`;
CREATE TABLE IF NOT EXISTS `remainings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `total_debt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `sales_price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `total_price`, `quantity`, `sales_type`, `created_at`, `updated_at`, `mid`, `bene`, `paybill`, `giveback`, `remin`, `one_name`, `one_phone`, `date`, `return_p`, `discount`, `sales_price`) VALUES
(1, 7, 9, NULL, 100, '5', '2019-11-23 07:20:21', '2019-11-23 07:18:56', NULL, 1, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 240),
(2, 8, 9, NULL, 200, '5', '2019-11-23 07:20:21', '2019-11-23 07:19:22', NULL, 1, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 370),
(3, 9, 9, NULL, 500, '5', '2019-11-23 07:20:21', '2019-11-23 07:19:37', NULL, 1, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 500),
(4, 7, 75101, NULL, 400, '5', '2019-11-23 08:41:05', '2019-11-22 20:31:08', NULL, 2, NULL, 'true', 0, 'Ahmad', '0080988', '2019-11-23', 0, NULL, 280),
(5, 8, 9, NULL, 400, '5', '2019-11-23 10:12:50', '2019-11-22 22:12:33', NULL, 3, NULL, 'true', 0, 'Name', 'Phone', '2019-11-24', 0, NULL, 233),
(6, 9, 9, NULL, 400, '5', '2019-11-23 11:01:47', '2019-11-22 22:17:23', NULL, 4, NULL, 'true', 0, 'Name', 'Phone', '2019-11-30', 0, NULL, 300),
(7, 9, 2, NULL, 5, '1', '2019-11-23 11:05:30', '2019-11-22 23:02:25', NULL, 5, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 600),
(8, 7, 2, NULL, 5, '1', '2019-11-23 11:08:30', '2019-11-22 23:03:17', NULL, 6, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 200),
(9, 8, 2, NULL, 3, '1', '2019-11-23 11:08:30', '2019-11-23 11:07:03', NULL, 6, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 300),
(10, 9, 2, NULL, 30, '1', '2019-11-23 11:08:30', '2019-11-23 11:07:40', NULL, 6, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 600),
(11, 7, 9, NULL, 34, '1', '2019-11-24 07:20:38', '2019-11-23 03:54:02', NULL, 7, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 34),
(12, 7, 11, NULL, 10, '5', '2019-11-24 07:20:46', '2019-11-24 16:38:42', NULL, 8, NULL, 'true', 0, 'Name', 'Phone', '2019-11-24', 0, NULL, 280),
(13, 9, 11, NULL, 15, '5', '2019-11-24 07:20:46', '2019-11-24 16:39:06', NULL, 8, NULL, 'true', 0, 'Name', 'Phone', '2019-11-24', 0, NULL, 330),
(14, 10, 11, NULL, 100, '5', '2019-11-24 07:20:46', '2019-11-24 16:40:08', NULL, 8, NULL, 'true', 0, 'Name', 'Phone', '2019-11-24', 0, NULL, 200),
(15, 7, 12, NULL, 66, '1', '2019-11-24 07:21:02', '2019-11-24 16:46:33', NULL, 9, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 350),
(16, 8, 12, NULL, 50, '1', '2019-11-24 07:21:02', '2019-11-24 16:47:02', NULL, 9, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 580),
(17, 13, 14, NULL, 1, '5', '2019-11-24 08:24:02', '2019-11-24 17:53:32', NULL, 10, NULL, 'true', 0, 'Name', 'Phone', '2019-11-24', 0, NULL, 500),
(18, 7, 14, NULL, 6, '5', '2019-11-24 08:27:05', '2019-11-24 17:55:53', NULL, 11, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 300),
(19, 8, 14, NULL, 2, '5', '2019-11-24 08:27:05', '2019-11-24 17:56:17', NULL, 11, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 650),
(20, 16, 14, NULL, 1, '5', '2019-11-24 08:27:05', '2019-11-24 17:56:47', NULL, 11, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 2700),
(21, 8, 9, NULL, 5, '1', '2019-12-02 10:24:48', '2019-11-24 06:08:44', NULL, 12, NULL, 'true', 0, 'Name', 'Phone', '2019-11-23', 0, NULL, 500),
(22, 7, 2, NULL, 99, '1', '2019-12-02 10:24:56', '2019-11-24 11:17:13', NULL, 13, NULL, 'true', 0, 'Name', 'Phone', '2019-11-08', 0, NULL, 76),
(23, 10, 2, NULL, 55, '1', '2019-12-02 10:24:56', '2019-11-24 11:17:31', NULL, 13, NULL, 'true', 0, 'Name', 'Phone', '2019-11-08', 0, NULL, 48),
(24, 9, 2, NULL, 858, '1', '2019-12-02 10:24:56', '2019-11-24 11:17:44', NULL, 13, NULL, 'true', 0, 'Name', 'Phone', '2019-11-08', 0, NULL, 5858),
(25, 9, 15, NULL, 100, '5', '2019-11-26 05:39:16', '2019-11-26 15:08:40', NULL, 14, NULL, 'true', 0, 'Name', 'Phone', '2019-11-26', 0, NULL, 400),
(26, 9, 15, NULL, 50, '5', '2019-12-02 10:24:42', '2019-12-01 08:38:28', NULL, 15, NULL, 'true', 0, 'Name', 'Phone', '2019-12-01', 0, NULL, 300),
(27, 10, 15, NULL, 3, '5', '2019-12-02 10:24:42', '2019-12-01 08:38:48', NULL, 15, NULL, 'true', 0, 'Name', 'Phone', '2019-12-01', 0, NULL, 350),
(28, 18, 15, NULL, 1, '5', '2019-12-02 10:24:42', '2019-12-01 08:39:09', NULL, 15, NULL, 'true', 0, 'Name', 'Phone', '2019-12-01', 0, NULL, 5000),
(29, 7, 15, NULL, 10, '5', '2019-12-01 11:26:06', '2019-12-01 08:54:12', NULL, 16, NULL, 'true', 0, 'Name', 'Phone', '2019-12-01', 0, NULL, 300),
(30, 9, 15, NULL, 5, '5', '2019-12-01 11:26:06', '2019-12-01 08:54:44', NULL, 16, NULL, 'true', 0, 'Name', 'Phone', '2019-12-01', 0, NULL, 300),
(31, 8, 9, NULL, 5, '5', '2019-12-02 10:24:34', '2019-12-01 09:17:08', NULL, 17, NULL, 'true', 0, 'Name', 'Phone', '2019-12-01', 0, NULL, 300),
(32, 9, 9, NULL, 5, '5', '2019-12-02 10:24:34', '2019-12-01 09:17:34', NULL, 17, NULL, 'true', 0, 'Name', 'Phone', '2019-12-01', 0, NULL, 250),
(33, 7, 28101, NULL, 1, '1', '2019-12-02 10:40:39', '2019-12-02 08:08:34', NULL, 18, NULL, 'true', 0, 'ahmad', '+9875623', '2019-12-02', 0, NULL, 350),
(34, 11, 10, NULL, 100, '5', '2019-12-08 06:37:16', '2019-12-08 16:06:45', NULL, 19, NULL, 'true', 0, 'Name', 'Phone', '2019-12-08', 0, NULL, 120),
(35, 8, 16, NULL, 20, '5', '2019-12-10 07:52:22', '2019-12-10 19:22:15', NULL, 20, NULL, 'true', 0, 'Name', 'Phone', '2019-12-10', 0, NULL, 300),
(36, 10, 16, NULL, 10, '5', '2019-12-10 07:57:05', '2019-12-10 19:27:00', NULL, 21, NULL, 'true', 0, 'Name', 'Phone', '2019-12-11', 0, NULL, 400),
(37, 10, 16, NULL, 10, '5', '2019-12-11 11:52:26', '2019-12-11 07:37:43', NULL, 22, NULL, 'true', 0, 'Name', 'Phone', '2019-12-11', 0, NULL, 400),
(38, 9, 16, NULL, 24, '1', '2019-12-11 10:49:54', '2019-12-11 10:49:54', NULL, 23, NULL, 'false', 0, 'Name', 'Phone', '2019-12-11', 0, NULL, 34),
(39, 11, 17, NULL, 10, '5', '2019-12-11 12:22:49', '2019-12-10 23:15:44', NULL, 24, NULL, 'true', 0, 'Name', 'Phone', '2019-12-11', 0, NULL, 150),
(40, 7, 16, NULL, 30, '5', '2019-12-12 17:03:34', '2019-12-12 05:00:28', NULL, 25, NULL, 'false', 0, 'Name', 'Phone', '2019-12-13', 0, NULL, 400),
(41, 8, 16, NULL, 20, '5', '2019-12-12 17:03:34', '2019-12-12 05:01:11', NULL, 25, NULL, 'false', 0, 'Name', 'Phone', '2019-12-13', 0, NULL, 400),
(42, 8, 2, NULL, 100, '5', '2019-12-12 20:18:16', '2019-12-13 08:18:07', NULL, 26, NULL, 'true', 0, 'Name', 'Phone', '2019-12-13', 0, NULL, 400),
(43, 7, 18, NULL, 40, '5', '2019-12-12 20:25:51', '2019-12-13 08:25:27', NULL, 27, NULL, 'true', 0, 'Name', 'Phone', '2019-12-13', 0, NULL, 400);

-- --------------------------------------------------------

--
-- Table structure for table `setting_expenses`
--

DROP TABLE IF EXISTS `setting_expenses`;
CREATE TABLE IF NOT EXISTS `setting_expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expensesna` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `expensesna` (`expensesna`),
  UNIQUE KEY `expensesna_2` (`expensesna`),
  UNIQUE KEY `expensesna_3` (`expensesna`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `net_price` int(11) NOT NULL,
  `sales_price` int(11) NOT NULL,
  `pay_amount` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_benefit` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remins` int(11) NOT NULL,
  `quantity_sales` int(11) NOT NULL,
  `sales_type` int(11) NOT NULL,
  `paybill` int(11) NOT NULL DEFAULT '0',
  `customer_id` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `bill` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `net_price`, `sales_price`, `pay_amount`, `quantity`, `total_benefit`, `user_id`, `created_at`, `updated_at`, `remins`, `quantity_sales`, `sales_type`, `paybill`, `customer_id`, `date`, `bill`) VALUES
(1, 7, 200, 230, '', -271, '15000', 1, '2019-12-12 20:25:51', '2019-12-12 20:25:51', 500, 771, 0, 0, '10', '2019-11-23', NULL),
(2, 8, 300, 350, '', -285, '25000', 1, '2019-12-12 20:18:16', '2019-12-12 20:18:16', 500, 785, 0, 0, '10', '2019-11-23', NULL),
(3, 9, 400, 450, '', -968, '50000', 1, '2019-12-02 10:24:56', '2019-12-02 19:54:56', 1000, 1968, 0, 0, '10', '2019-11-23', NULL),
(4, 8, 234, 234, '', 100, '0', 1, '2019-11-23 10:20:17', '2019-11-23 10:20:17', 100, 0, 0, 0, '10', '2019-11-23', NULL),
(5, 9, 200, 250, '', 50, '2500', 1, '2019-11-23 10:53:23', '2019-11-23 10:53:23', 50, 0, 1, 0, '10', '2019-11-23', NULL),
(6, 7, 100, 150, '', 100, '5000', 1, '2019-11-23 10:53:42', '2019-11-23 10:53:42', 100, 0, 1, 0, '10', '2019-11-23', NULL),
(7, 9, 400, 450, '', 70, '3500', 1, '2019-11-23 10:53:57', '2019-11-23 10:53:57', 70, 0, 1, 0, '10', '2019-11-23', NULL),
(8, 9, 500, 550, '', 80, '4000', 1, '2019-11-23 10:54:14', '2019-11-23 10:54:14', 80, 0, 1, 0, '10', '2019-11-23', NULL),
(9, 10, 100, 150, '', -118, '3000', 1, '2019-12-11 11:52:26', '2019-12-11 11:52:26', 60, 178, 1, 0, '10', '2019-11-23', NULL),
(10, 7, 23, 233, '', 21, '4410', 1, '2019-11-24 04:04:51', '2019-11-24 04:04:51', 21, 0, 1, 0, '10', '2019-11-24', '345245'),
(11, 8, 555, 600, '', 50, '2250', 1, '2019-11-24 15:05:30', '2019-11-24 15:05:30', 50, 0, 0, 0, '10', '2019-11-24', '12345'),
(12, 9, 300, 350, '', 100, '5000', 1, '2019-11-24 16:30:39', '2019-11-24 16:30:39', 100, 0, 1, 0, '10', '2019-11-24', '1564'),
(13, 12, 200, 250, '', 30, '1500', 1, '2019-11-24 16:30:53', '2019-11-24 16:30:53', 30, 0, 1, 0, '10', '2019-11-24', '1564'),
(14, 7, 200, 300, '', 50, '5000', 1, '2019-11-24 16:33:48', '2019-11-24 16:33:48', 50, 0, 0, 0, '11', '2019-11-24', '4875'),
(15, 11, 150, 200, '', -10, '5000', 1, '2019-12-11 12:22:49', '2019-12-11 12:22:49', 100, 110, 1, 0, '12', '2019-11-24', '1542'),
(16, 11, 200, 300, '', 50, '5000', 1, '2019-11-24 16:36:47', '2019-11-24 16:36:47', 50, 0, 1, 0, '12', '2019-11-24', '1542'),
(17, 10, 300, 350, '', 3, '150', 1, '2019-11-24 16:52:27', '2019-11-24 16:52:27', 3, 0, 1, 0, '12', '2019-11-24', '1245'),
(18, 14, 250, 300, '', 2, '100', 1, '2019-11-24 17:22:35', '2019-11-24 17:22:35', 2, 0, 0, 0, '13', '2019-11-24', 'KDT42974'),
(19, 13, 400, 500, '', 1, '200', 1, '2019-11-24 08:24:02', '2019-11-24 17:54:02', 2, 1, 0, 0, '13', '2019-11-24', 'KDT42974'),
(20, 15, 11000, 11200, '', 1, '200', 1, '2019-11-24 17:29:57', '2019-11-24 17:29:57', 1, 0, 0, 0, '15', '2019-11-24', 'S121182'),
(21, 16, 2300, 2500, '', 0, '200', 1, '2019-11-24 08:27:05', '2019-11-24 17:57:05', 1, 1, 0, 0, '14', '2019-11-24', '21650'),
(22, 17, 2300, 2500, '', 1, '200', 1, '2019-11-24 17:38:32', '2019-11-24 17:38:32', 1, 0, 0, 0, '14', '2019-11-24', '21650'),
(23, 18, 4500, 4700, '', 0, '200', 1, '2019-12-02 10:24:42', '2019-12-02 19:54:42', 1, 1, 0, 0, '14', '2019-11-24', '21650'),
(24, 19, 9500, 9700, '', 2, '400', 1, '2019-11-24 17:39:08', '2019-11-24 17:39:08', 2, 0, 0, 0, '14', '2019-11-24', '21650'),
(25, 20, 15000, 15200, '', 2, '400', 1, '2019-11-24 17:42:20', '2019-11-24 17:42:20', 2, 0, 0, 0, '14', '2019-11-24', '21650'),
(26, 11, 100, 110, '', 100, '1000', 1, '2019-11-26 15:06:40', '2019-11-26 15:06:40', 100, 0, 0, 0, '15', '2019-11-26', '345245'),
(27, 9, 200, 250, '', 200, '10000', 1, '2019-11-26 15:16:22', '2019-11-26 15:16:22', 200, 0, 0, 0, '14', '2019-11-26', '345245'),
(28, 8, 200, 250, '', 50, '2500', 1, '2019-12-01 20:42:11', '2019-12-01 20:42:11', 50, 0, 0, 0, '15', '2019-12-01', '1457'),
(29, 10, 300, 350, '', 30, '1500', 1, '2019-12-01 20:43:01', '2019-12-01 20:43:01', 30, 0, 0, 0, '10', '2019-12-01', '1458'),
(30, 9, 90, 100, '', 10, '100', 1, '2019-12-08 06:43:38', '2019-12-08 16:13:38', 10, 0, 0, 0, '10', '2019-12-08', '345245'),
(31, 11, 100, 120, '', 100, '2000', 1, '2019-12-08 16:34:40', '2019-12-08 16:34:40', 100, 0, 0, 0, '9', '2019-12-08', '345245'),
(32, 8, 90, 100, '', 200, '2000', 1, '2019-12-08 07:26:25', '2019-12-08 16:56:25', 200, 0, 0, 0, '9', '2019-12-08', '34'),
(33, 8, 200, 300, '', 200, '20000', 1, '2019-12-10 19:20:33', '2019-12-10 19:20:33', 200, 0, 0, 0, '16', '2019-12-10', 'lsdjflk'),
(34, 9, 200, 30, '', 20, '-3400', 1, '2019-12-10 19:24:39', '2019-12-10 19:24:39', 20, 0, 0, 0, '16', '2019-12-10', '345245'),
(35, 9, 100, 200, '', 100, '10000', 1, '2019-12-10 19:26:03', '2019-12-10 19:26:03', 100, 0, 0, 0, '16', '2019-12-10', '345245'),
(38, 11, 200, 300, '', 20, '2000', 1, '2019-12-11 11:16:42', '2019-12-11 11:16:42', 20, 0, 0, 0, '17', '2019-12-11', '345245'),
(39, 22, 20, 30, '', 20, '200', 1, '2019-12-12 16:46:27', '2019-12-12 16:46:27', 20, 0, 0, 0, '16', '2019-12-12', '345245'),
(40, 22, 30, 35, '', 30, '150', 1, '2019-12-12 16:47:48', '2019-12-12 16:47:48', 30, 0, 0, 0, '16', '2019-12-12', 'asfs234'),
(41, 9, 100, 200, '', 20, '2000', 1, '2019-12-12 20:19:07', '2019-12-12 20:19:07', 20, 0, 0, 0, '2', '2019-12-13', 'asd'),
(42, 9, 100, 200, '', 20, '2000', 1, '2019-12-12 20:21:51', '2019-12-12 20:21:51', 20, 0, 0, 0, '2', '2019-12-13', '223'),
(43, 9, 100, 200, '', 20, '2000', 1, '2019-12-12 20:24:23', '2019-12-12 20:24:23', 20, 0, 0, 0, '18', '2019-12-13', '123');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL COMMENT 'customer/vendor id',
  `quantity` int(11) NOT NULL,
  `item_price` float NOT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `final_rate` float NOT NULL COMMENT 'sale/purchase rate',
  `est_sale_rate` float DEFAULT NULL COMMENT 'Estimated Sale Rate',
  `payment_type` int(11) NOT NULL DEFAULT '0' COMMENT '0:credit, 1:cash',
  `transaction_type` int(11) NOT NULL COMMENT '1: sale, 2:purchase',
  `transaction_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `item_id`, `customer_id`, `quantity`, `item_price`, `discount`, `final_rate`, `est_sale_rate`, `payment_type`, `transaction_type`, `transaction_date`) VALUES
(1, 7, 2, 200, 80, 0, 80, 100, 1, 2, '2019-11-12 23:30:29'),
(2, 7, 9, 5, 100, 0, 100, NULL, 1, 1, '2019-12-12 23:30:29'),
(3, 7, 10, 10, 100, 0, 100, 100, 1, 1, '2019-12-13 23:30:29'),
(4, 14, 16, 5, 50, 0, 50, 60, 1, 2, '2019-12-12 23:45:45'),
(5, 14, 2, 3, 60, 0, 60, NULL, 1, 1, '2019-12-12 23:48:09'),
(6, 14, 2, 2, 60, 0, 60, NULL, 1, 1, '2019-12-12 23:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `state` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `photo`, `email`, `password`, `state`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Hamid', 'Lemar', '1574530283.png', 'admin@hamidlemar.com', '$2y$10$a.imwUdNmF.1XFvPSdKwTu3HAci0wz1wydKxK8CF.LeeMeIACBwXu', 0, '2019-11-23 17:31:23', '2019-11-23 17:31:23', '1'),
(4, 'masih', 'karimi', '1573643029.jpg', 'ma@gmail.com', '$2y$10$0EliUA0Rg2x3MMozoxUbLOfspsXbjQTI1amkaqvsfUn7zkBMuL9.2', 0, '2019-11-13 11:03:49', '2019-11-13 11:03:49', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
