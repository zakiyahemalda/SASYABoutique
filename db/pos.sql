-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2019 at 04:41 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` double NOT NULL,
  `size` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `userid`, `productid`, `qty`, `size`) VALUES
(2, 2, 30, 1, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `category_name`) VALUES
(1, 'Kurung'),
(2, 'Jubah'),
(3, 'Hijab');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `userid` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `address1` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`userid`, `customer_name`, `address1`, `address`, `contact`, `longitude`, `latitude`) VALUES
(2, 'Nuratiyah Nabihah', 'Taman Desa Jaya 4', 'Bukit Baru, Malacca, Malaysia', '0196561975', 102.277, 2.21485),
(12, 'Nabil Ilham', 'Taman Maju Jaya 3', 'Masjid Tanah, Malacca, Malaysia', '0197751706', 102.109, 2.35228),
(17, 'Hanis Safiyah', 'No.15. Jalan Desa Jaya ', 'Bukit Katil, Malacca, Malaysia', '0196561975', 102.298, 2.22801),
(18, 'Najlaa Asyura', 'No.21, Jalan Paya Jaras', 'Selandar, Malacca, Malaysia', '0196573568', 102.378, 2.38936),
(20, 'Nur Atiqah Amir', 'Jalan Seri Emas 58', 'Taman Seri Telok Emas, Malacca, Malaysia', '0172548965', 102.322, 2.16295),
(21, 'Nur Athirah Anuar', 'No.12, Jalan Paya Mas', 'Bukit Katil, Malacca, Malaysia', '0196561945', 102.298, 2.22801);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `inventory_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `userid`, `action`, `productid`, `quantity`, `inventory_date`) VALUES
(11, 2, 'Purchase', 4, 2, '2019-05-01 13:21:27'),
(12, 1, 'Add Product', 28, 3, '2019-05-01 13:24:10'),
(13, 2, 'Purchase', 28, 3, '2019-05-01 13:36:48'),
(14, 2, 'Purchase', 2, 2, '2019-05-01 13:36:49'),
(15, 1, 'Add Product', 29, 3, '2019-05-02 19:22:29'),
(16, 1, 'Add Product', 30, 3, '2019-05-02 22:27:37'),
(17, 1, 'Add Product', 31, 10, '2019-05-02 22:47:22'),
(18, 1, 'Add Product', 32, 10, '2019-05-02 22:47:55'),
(20, 1, 'Update Quantity', 28, 10, '2019-05-02 23:01:41'),
(21, 1, 'Update Quantity', 30, 10, '2019-05-02 23:01:50'),
(22, 1, 'Add Product', 33, 10, '2019-05-02 23:17:06'),
(23, 1, 'Add Product', 34, 10, '2019-05-03 01:44:12'),
(24, 1, 'Add Product', 35, 10, '2019-05-03 01:46:37'),
(25, 1, 'Add Product', 36, 10, '2019-05-03 01:48:12'),
(26, 1, 'Add Product', 37, 10, '2019-05-03 01:49:07'),
(28, 1, 'Add Product', 39, 10, '2019-05-03 01:51:10'),
(29, 1, 'Add Product', 40, 10, '2019-05-03 01:52:02'),
(30, 1, 'Add Product', 41, 10, '2019-05-03 01:53:39'),
(31, 2, 'Purchase', 28, 1, '2019-05-03 02:38:54'),
(32, 2, 'Purchase', 37, 3, '2019-05-03 02:51:48'),
(33, 2, 'Purchase', 40, 2, '2019-05-03 02:58:16'),
(34, 2, 'Purchase', 36, 2, '2019-05-03 03:00:01'),
(35, 2, 'Purchase', 28, 2, '2019-05-03 03:04:31'),
(36, 2, 'Purchase', 28, 1, '2019-05-03 03:08:41'),
(37, 2, 'Purchase', 34, 1, '2019-05-03 03:12:26'),
(38, 2, 'Purchase', 41, 2, '2019-05-03 03:12:26'),
(39, 2, 'Purchase', 33, 1, '2019-05-03 03:12:26'),
(40, 2, 'Purchase', 31, 2, '2019-05-03 12:26:49'),
(41, 2, 'Purchase', 34, 1, '2019-05-09 12:15:34'),
(42, 2, 'Purchase', 28, 1, '2019-05-09 12:15:34'),
(43, 2, 'Purchase', 28, 1, '2019-05-10 16:21:46'),
(44, 2, 'Purchase', 28, 1, '2019-05-12 14:42:36'),
(45, 1, 'Add Product', 42, 10, '2019-05-12 23:19:24'),
(46, 1, 'Add Product', 43, 10, '2019-05-12 23:20:34'),
(47, 2, 'Purchase', 31, 1, '2019-05-13 00:42:09'),
(48, 12, 'Purchase', 34, 1, '2019-05-13 00:44:22'),
(49, 12, 'Purchase', 35, 1, '2019-05-13 00:47:27'),
(50, 12, 'Purchase', 40, 1, '2019-05-13 00:51:47'),
(51, 12, 'Purchase', 33, 1, '2019-05-13 00:53:46'),
(52, 12, 'Purchase', 36, 1, '2019-05-13 01:10:49'),
(53, 12, 'Purchase', 30, 1, '2019-05-13 01:10:49'),
(54, 12, 'Purchase', 40, 1, '2019-05-13 01:17:45'),
(55, 12, 'Purchase', 43, 1, '2019-05-13 02:33:57'),
(56, 12, 'Purchase', 36, 2, '2019-05-15 14:52:42'),
(57, 12, 'Purchase', 40, 1, '2019-05-15 14:52:42'),
(58, 1, 'Update Quantity', 28, 10, '2019-05-16 02:05:25'),
(59, 7, 'Purchase', 32, 1, '2019-05-16 11:55:11'),
(60, 7, 'Purchase', 34, 1, '2019-05-16 11:55:11'),
(61, 4, 'Purchase', 43, 1, '2019-05-17 15:13:50'),
(62, 4, 'Purchase', 31, 2, '2019-05-17 15:13:50'),
(63, 4, 'Purchase', 32, 1, '2019-05-17 15:13:50'),
(64, 2, 'Purchase', 28, 1, '2019-05-18 16:35:06'),
(65, 2, 'Purchase', 35, 2, '2019-05-18 16:35:06'),
(66, 4, 'Purchase', 28, 1, '2019-05-18 16:45:01'),
(67, 4, 'Purchase', 35, 2, '2019-05-18 16:45:01'),
(68, 1, 'Purchase', 28, 2, '2019-05-23 06:28:05'),
(69, 1, 'Purchase', 32, 1, '2019-05-23 07:18:09'),
(70, 1, 'Purchase', 32, 1, '2019-05-23 07:47:07'),
(71, 1, 'Purchase', 28, 1, '2019-05-23 07:47:07'),
(72, 1, 'Purchase', 28, 1, '2019-05-23 07:49:03'),
(73, 1, 'Update Quantity', 37, 15, '2019-05-23 08:25:05'),
(74, 1, 'Update Quantity', 41, 15, '2019-05-23 08:25:16'),
(75, 1, 'Update Quantity', 34, 15, '2019-05-23 08:25:25'),
(76, 1, 'Update Quantity', 35, 10, '2019-05-23 08:25:34'),
(77, 1, 'Update Quantity', 28, 15, '2019-05-23 08:25:44'),
(78, 1, 'Update Quantity', 32, 10, '2019-05-23 08:25:52'),
(79, 1, 'Update Quantity', 30, 15, '2019-05-23 08:26:02'),
(80, 1, 'Purchase', 33, 1, '2019-05-23 15:44:34'),
(81, 1, 'Purchase', 32, 2, '2019-05-23 15:44:34'),
(82, 2, 'Purchase', 42, 1, '2019-05-23 15:52:05'),
(83, 2, 'Purchase', 43, 1, '2019-05-23 15:52:05'),
(84, 1, 'Update Quantity', 36, 1, '2019-05-25 02:20:54'),
(85, 1, 'Update Quantity', 40, 6, '2019-05-25 15:13:04'),
(86, 1, 'Update Quantity', 36, 15, '2019-05-27 22:20:55'),
(87, 1, 'Update Quantity', 33, 15, '2019-05-27 22:21:15'),
(88, 1, 'Add Product', 44, 20, '2019-05-27 22:22:08'),
(89, 1, 'Add Product', 45, 20, '2019-05-27 22:40:42'),
(90, 1, 'Update Quantity', 39, 1, '2019-05-28 09:44:19'),
(91, 1, 'Update Quantity', 39, 0, '2019-05-28 09:44:36'),
(92, 1, 'Add Product', 46, 15, '2019-05-28 10:27:02'),
(93, 21, 'Purchase', 44, 1, '2019-05-28 11:31:27'),
(94, 21, 'Purchase', 41, 1, '2019-05-28 11:31:28'),
(95, 1, 'Update Quantity', 39, 11, '2019-05-28 11:35:13'),
(96, 1, 'Purchase', 33, 2, '2019-05-28 11:36:24'),
(97, 1, 'Purchase', 40, 1, '2019-05-28 11:36:24'),
(98, 1, 'Update Quantity', 43, 2, '2019-05-28 11:41:13'),
(99, 1, 'Purchase', 43, 3, '2019-05-28 11:42:56'),
(100, 2, 'Purchase', 37, 1, '2019-08-05 01:03:48'),
(101, 1, 'Purchase', 28, 2, '2019-08-06 00:00:44'),
(102, 1, 'Update Quantity', 28, 0, '2019-08-06 00:36:05'),
(103, 1, 'Update Quantity', 43, 0, '2019-08-06 02:37:06'),
(104, 1, 'Purchase', 45, 3, '2019-08-06 02:40:22'),
(105, 2, 'Purchase', 30, 1, '2019-08-06 02:52:14'),
(106, 2, 'Purchase', 41, 1, '2019-08-06 15:27:59'),
(107, 2, 'Purchase', 45, 1, '2019-08-06 15:30:01'),
(108, 2, 'Purchase', 46, 1, '2019-08-08 03:49:24'),
(109, 2, 'Purchase', 46, 1, '2019-08-09 03:37:28'),
(110, 2, 'Purchase', 41, 1, '2019-08-09 03:37:29'),
(111, 1, 'Update Quantity', 40, 6, '2019-08-10 00:46:56'),
(112, 1, 'Purchase', 40, 1, '2019-08-10 01:44:17'),
(113, 1, 'Purchase', 32, 2, '2019-08-10 01:46:10'),
(114, 2, 'Purchase', 44, 1, '2019-08-10 02:20:56'),
(115, 2, 'Purchase', 39, 2, '2019-08-10 02:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `oprice` double NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `product_name`, `oprice`, `product_price`, `product_qty`, `photo`, `details`) VALUES
(28, 1, 'Felysia Kurung In Apple Green', 99, 150, 0, 'upload/1_1557943539.png', 'Felysia Kurung is designed with como crepe materials specially for someone who loves simplicity and minimalist style. Modest and versatile, Bella Kurung Modern will make you look ladylike and elegant on any occasion.'),
(30, 1, 'Felysia Kurung In Dark Purple', 99, 150, 14, 'upload/3_1557943640.png', 'Felysia Kurung is designed with como crepe materials specially for someone who loves simplicity and minimalist style. Modest and versatile, Bella Kurung Modern will make you look ladylike and elegant on any occasion.'),
(32, 1, 'Felysia Kurung In Dusty Purple', 99, 150, 6, 'upload/4_1557943891.png', 'Felysia Kurung is designed with como crepe materials specially for someone who loves simplicity and minimalist style. Modest and versatile, Bella Kurung Modern will make you look ladylike and elegant on any occasion.'),
(33, 1, 'Felysia Kurung In White', 99, 150, 13, 'upload/6_1557943937.png', 'Felysia Kurung is designed with como crepe materials specially for someone who loves simplicity and minimalist style. Modest and versatile, Bella Kurung Modern will make you look ladylike and elegant on any occasion.'),
(34, 2, 'Baimonds Jubah In Rosewood', 80, 110, 15, 'upload/b_1556819835.png', 'Baimonds Jubah was designed with custom made luxury glitter cotton lycra. A-Cut jubah cutting with flowy width enhances your femininity.'),
(35, 2, 'Baimonds Jubah In Teal', 80, 110, 0, 'upload/e_1556819197.png', 'Baimonds Jubah was designed with custom made luxury glitter cotton lycra. A-Cut jubah cutting with flowy width enhances your femininity.'),
(36, 2, 'Baimonds Jubah In Dusty Pink', 80, 110, 15, 'upload/c_1556819292.png', 'Baimonds Jubah was designed with custom made luxury glitter cotton lycra. A-Cut jubah cutting with flowy width enhances your femininity.'),
(37, 3, 'Kyrana Bawal In Grey', 15, 20, 14, 'upload/k1_1557943179.png', 'Comfortable cotton voile square scarf with diamonds and eyelash hemming detailing'),
(39, 3, 'Kyrana Bawal In Rosewood', 15, 20, 9, 'upload/k2_1557943221.png', 'Comfortable cotton voile square scarf with diamonds and eyelash hemming detailing'),
(40, 3, 'Kyrana Bawal In Peach', 15, 20, 5, 'upload/k3_1557943265.png', 'Comfortable cotton voile square scarf with diamonds and eyelash hemming detailing'),
(41, 3, 'Kyrana Bawal In Mocha', 15, 20, 12, 'upload/k4_1557943302.png', 'Comfortable cotton voile square scarf with diamonds and eyelash hemming detailing'),
(42, 1, 'Felysia Kurung In Ocean Blue', 99, 150, 9, 'upload/5_1557944027.png', 'Felysia Kurung is designed with como crepe materials specially for someone who loves simplicity and minimalist style. Modest and versatile, Bella Kurung Modern will make you look ladylike and elegant on any occasion.'),
(43, 1, 'Felysia Kurung In Baby Blue', 99, 150, 0, 'upload/2_1557674434.png', 'Felysia Kurung is designed with como crepe materials specially for someone who loves simplicity and minimalist style. Modest and versatile, Bella Kurung Modern will make you look ladylike and elegant on any occasion.'),
(44, 2, 'Baimonds Jubah In Rusty Red', 80, 110, 18, 'upload/f_1558966928.png', 'Baimonds Jubah was designed with custom made luxury glitter cotton lycra. A-Cut jubah cutting with flowy width enhances your femininity.'),
(45, 3, 'Kyrana Bawal In Soft Brown', 15, 20, 16, 'upload/k9_1558968042.png', 'Comfortable cotton voile square scarf with diamonds and eyelash hemming detailing'),
(46, 2, 'Baimonds Jubah In Black', 80, 110, 13, 'upload/a_1559010422.png', 'Baimonds Jubah was designed with custom made luxury glitter cotton lycra. A-Cut jubah cutting with flowy width enhances your femininity.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `access` int(11) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`access`, `role`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sales_total` double NOT NULL,
  `sales_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `statuscust` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `userid`, `sales_total`, `sales_date`, `status`, `statuscust`) VALUES
(18, 2, 138, '2019-02-03 03:04:31', 'Item have been shipped', 'Order Complete'),
(19, 2, 69, '2019-02-03 03:08:41', 'Item have been shipped', 'Order Complete'),
(20, 2, 266, '2019-02-03 03:12:26', 'Item have been shipped', 'Order Complete'),
(21, 2, 198, '2019-03-03 12:26:49', 'Item have been shipped', 'Order Complete'),
(22, 2, 168, '2019-04-09 12:15:34', 'Item have been shipped', 'Order Complete'),
(23, 2, 69, '2019-04-10 16:21:46', 'Item have been shipped', 'Order Complete'),
(24, 2, 69, '2019-05-12 14:42:35', 'Item have been shipped', 'Order Complete'),
(25, 2, 99, '2019-05-13 00:42:08', 'Item have been shipped', 'Order Complete'),
(26, 12, 99, '2019-05-13 00:44:21', 'Item have been shipped', 'Order Complete'),
(27, 12, 99, '2019-05-13 00:47:27', 'Item have been shipped', 'Order Complete'),
(28, 12, 49, '2019-05-13 00:51:46', 'Item have been shipped', 'Order Complete'),
(29, 12, 69, '2019-05-13 00:53:46', 'Item have been shipped', 'Order Complete'),
(31, 12, 49, '2018-01-13 01:17:45', 'Item have been shipped', 'Order Complete'),
(32, 12, 69, '2018-08-13 02:33:57', 'Item have been shipped', 'Order Complete'),
(33, 12, 247, '2018-08-15 14:52:42', 'Item have been shipped', 'Order Complete'),
(34, 7, 260, '2018-03-16 11:55:10', 'Item have been shipped', 'Order Complete'),
(35, 4, 520, '2018-08-17 15:13:50', 'Walk In', 'Order Complete'),
(36, 2, 370, '2019-05-18 16:35:06', 'New Order', 'In Process'),
(37, 4, 370, '2019-05-18 16:45:00', 'Item have been shipped', 'Order Complete'),
(38, 1, 300, '2019-06-23 06:28:05', 'Walk In', 'Order Complete'),
(39, 1, 150, '2019-05-23 07:18:09', 'Walk In', 'Order Complete'),
(40, 1, 300, '2018-05-23 07:47:06', 'Walk In', 'Order Complete'),
(41, 1, 150, '2018-05-23 07:49:03', 'Walk In', 'Order Complete'),
(42, 1, 450, '2019-05-23 15:44:34', 'Walk In', 'Order Complete'),
(43, 2, 300, '2019-05-23 15:52:05', 'Item have been shipped', 'Order Complete'),
(44, 21, 130, '2019-05-28 11:31:27', 'Item have been shipped', 'Order Complete'),
(45, 1, 320, '2019-05-28 11:36:24', 'Walk In', 'Order Complete'),
(46, 1, 450, '2019-05-28 11:42:56', 'Walk In', 'Order Complete'),
(47, 2, 20, '2019-08-05 01:03:48', 'Item have been shipped', 'Order Complete'),
(48, 1, 300, '2019-08-06 00:00:44', 'Walk In', 'Order Complete'),
(49, 1, 60, '2019-08-06 02:40:21', 'Walk In', 'Order Complete'),
(50, 2, 150, '2019-08-06 02:52:14', 'Item have been shipped', 'Order Complete'),
(51, 2, 20, '2019-08-06 15:27:59', 'Item have been shipped', 'Order Complete'),
(52, 2, 20, '2019-08-06 15:30:01', 'Item have been shipped', 'Order Complete'),
(53, 2, 110, '2019-08-08 03:49:23', 'New Order', 'In Process'),
(54, 2, 130, '2019-08-09 03:37:28', 'New Order', 'In Process'),
(55, 1, 20, '2019-08-10 01:44:17', 'Walk In', 'Order Complete'),
(56, 1, 300, '2019-08-10 01:46:10', 'Walk In', 'Order Complete'),
(57, 2, 150, '2019-08-10 02:20:56', 'New Order', 'In Process');

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `sales_detailid` int(11) NOT NULL,
  `salesid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `size` char(10) NOT NULL,
  `sales_qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_detail`
--

INSERT INTO `sales_detail` (`sales_detailid`, `salesid`, `productid`, `size`, `sales_qty`) VALUES
(27, 18, 28, '', 2),
(28, 19, 28, '', 1),
(29, 20, 34, '', 1),
(30, 20, 41, '', 2),
(31, 20, 33, '', 1),
(32, 21, 31, '', 2),
(33, 22, 34, '', 1),
(34, 22, 28, '', 1),
(35, 23, 28, '', 1),
(36, 24, 28, '', 1),
(37, 25, 31, '', 1),
(38, 26, 34, '', 1),
(39, 27, 35, '', 1),
(40, 28, 40, '', 1),
(41, 29, 33, '', 1),
(42, 30, 36, '', 1),
(43, 30, 30, '', 1),
(44, 31, 40, '', 1),
(45, 32, 43, '', 1),
(46, 33, 36, 'XS', 2),
(47, 33, 40, '--', 1),
(48, 34, 32, 'XS', 1),
(49, 34, 34, 'M', 1),
(50, 35, 43, 'XS', 1),
(51, 35, 31, '', 2),
(52, 35, 32, 'XS', 1),
(53, 36, 28, '', 1),
(54, 36, 35, '', 2),
(55, 37, 28, '', 1),
(56, 37, 35, '', 2),
(57, 38, 28, '', 2),
(58, 39, 32, '', 1),
(59, 40, 32, '', 1),
(60, 40, 28, '', 1),
(61, 41, 28, '', 1),
(62, 42, 33, '', 1),
(63, 42, 32, '', 2),
(64, 43, 42, 'XS', 1),
(65, 43, 43, 'S', 1),
(66, 44, 44, 'XS', 1),
(67, 44, 41, '--', 1),
(68, 45, 33, '', 2),
(69, 45, 40, '', 1),
(70, 46, 43, '', 3),
(71, 47, 37, '--', 1),
(72, 48, 28, '', 2),
(73, 49, 45, '--', 3),
(74, 50, 30, 'S', 1),
(75, 51, 41, '--', 1),
(76, 52, 45, '--', 1),
(77, 53, 46, 'M', 1),
(78, 54, 46, 'XS', 1),
(79, 54, 41, '--', 1),
(80, 55, 40, '', 1),
(81, 56, 32, '', 2),
(82, 57, 44, 'XS', 1),
(83, 57, 39, '--', 2);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `sizeid` int(11) NOT NULL,
  `sizename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`sizeid`, `sizename`) VALUES
(1, '--'),
(2, 'XS'),
(3, 'S'),
(4, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `latitude`, `longitude`, `address`) VALUES
(1, 2.35442, 102.105, 'No. SU 940, Jalan Bandar Baru 6, Taman Bandar Baru Masjid Tanah, Melaka, 78300 Masjid Tanah'),
(3, 2.31237, 102.282, 'Durian Tunggal');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `userid` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`userid`, `company_name`, `company_address`, `contact`) VALUES
(4, 'Ainul Mardhiah Yusuf', 'Taman Cahaya Mas, Masjid Tanah, 78300, Melaka', '0197751706'),
(19, 'Farah Asyikin Razak', 'Taman Masjid Tanah Ria, Masjid Tanah, Melaka', '0175862397');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `access`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'atiyah@gmail.com', '838e8a9c0ff982c8e051827b2ffe43c2', 2),
(4, 'ainul@gmail.com', '0b83fcce61fe1aa3147a0617aee63489', 3),
(12, 'test@gmail.com', 'fb469d7ef430b0baf0cab6c436e70375', 2),
(17, 'safiyah@gmail.com', '122e21b703094dc5eea86dcca63fcddb', 2),
(18, 'najla@yahoo.com', 'c06e2fdedb0de9017a14186b39496985', 2),
(19, 'farah@gmail.com', 'f304afd3b7261235c1cf3992f0965e69', 3),
(20, 'atiqah@yahoo.com', '5913e612d3c4c24a75fb80b5b44b2e24', 2),
(21, 'athirah@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`access`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`sales_detailid`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeid`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sales_detail`
--
ALTER TABLE `sales_detail`
  MODIFY `sales_detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `sizeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
