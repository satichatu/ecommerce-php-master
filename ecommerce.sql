-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 10:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `p_id` varchar(252) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `qty` varchar(250) NOT NULL,
  `ip` varchar(250) NOT NULL,
  `date` varchar(100) NOT NULL,
  `total` varchar(200) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `stock` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `p_name`, `price`, `qty`, `ip`, `date`, `total`, `user_id`, `stock`) VALUES
(212, '7', 'czx', '200', '1', '::1', '15-08-2020', '200', '1', 'Yes'),
(213, '9', 'vssfsfd', '2000', '1', '::1', '15-08-2020', '2000', '1', 'Yes'),
(214, '11', 'New 1', '400', '1', '::1', '15-08-2020', '400', '1', 'Yes'),
(215, '5', 'New 2', '500', '1', '::1', '15-08-2020', '500', '1', 'Yes'),
(216, '6', 'czx', '200', '1', '::1', '15-08-2020', '200', '1', 'Yes'),
(252, '10', 'sidzhfv ', '2000', '1', '::1', '17-03-2021', '2000', '2', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'abdul aziz', 'abdulazizsiddiqui01@gmail.com', 'ctrc', 'tyug');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(20) NOT NULL,
  `couponcode` varchar(250) NOT NULL,
  `discount` varchar(250) NOT NULL,
  `min_val` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `couponcode`, `discount`, `min_val`) VALUES
(4, 'azeezNew', '1000', '500'),
(5, 'azeez', '500', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `forgetpassword`
--

CREATE TABLE `forgetpassword` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgetpassword`
--

INSERT INTO `forgetpassword` (`id`, `email`, `otp`) VALUES
(1, 'abdulazizsiddiqui01@gmail.com', '351930');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `last_status_date` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `transaction_id` text NOT NULL,
  `order_unique_id` varchar(255) NOT NULL,
  `return_last_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `user_id`, `product_id`, `last_status_date`, `amount`, `status`, `payment`, `transaction_id`, `order_unique_id`, `return_last_date`) VALUES
(32, '2', '9', '21-09-2020', '2000', 'Product Delivered', 'cash', 'ytoxTm3KGiCUFjq8', 'ExIYQtZ0VNu7arc8', '21-10-2020'),
(33, '2', '9', '22-09-2020', '2000', 'Return Complete', 'cash', 'ytoxTm3KGiCUFjq8', 'N9sodLz1q4Im7aTt', '21-10-2020'),
(34, '2', '9', '18-09-2020', '2000', 'Cancel Order', 'cash', 'ytoxTm3KGiCUFjq8', 'ks14Unbgtm6OAGpZ', ''),
(35, '2', '11', '18-09-2020', '400', 'Product Dispatched', 'cash', 'ytoxTm3KGiCUFjq8', 'fpCT3uIWGgLzEbtv', ''),
(36, '2', '7', '18-09-2020', '200', 'Product Delivered', 'cash', 'jt2UOksYQuiDP7JW', 'blY4rc6RDjvmwIyF', '18-10-2020'),
(37, '2', '9', '21-09-2020', '2000', 'Cancel Order', 'cash', 'LhC1Fc3ARqz92dQV', 'fF8PhmHQU4rD95Tv', ''),
(38, '2', '11', '07-02-2021', '1200', 'Order pending', 'cash', '07a9SE6HmMXgRFub', 'dvWPLX6h7FbSyz92', ''),
(39, '2', '31', '07-02-2021', '200', 'Return Request', 'cash', '07a9SE6HmMXgRFub', 'b3RYIoDMSVa2mkFO', '09-03-2021');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` varchar(200) NOT NULL,
  `stock` varchar(200) NOT NULL,
  `descreption` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `stock`, `descreption`, `image`) VALUES
(5, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(6, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(7, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(8, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(9, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(10, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(11, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(12, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(13, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(14, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(15, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(16, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(17, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(18, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(19, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(20, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(21, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(22, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(23, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(24, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(25, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(26, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(27, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(28, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(29, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(30, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(31, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(32, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(33, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(34, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(35, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(36, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(37, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(38, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(39, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(40, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(41, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(42, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(43, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(44, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(45, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(46, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(47, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(48, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(49, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(50, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(51, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(52, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(53, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(54, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(55, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(56, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(57, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(58, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(59, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(60, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(61, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(62, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(63, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(64, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(65, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(66, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(67, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(68, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(69, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(70, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(71, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(72, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(73, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(74, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(75, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(76, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(77, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(78, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(79, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(80, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(81, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(82, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(83, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(84, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(85, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(86, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(87, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(88, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(89, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(90, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(91, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(92, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(93, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(94, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(95, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(96, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(97, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(98, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(99, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(100, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(101, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(102, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(103, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(104, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(105, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(106, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(107, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(108, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(109, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(110, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(111, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(112, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(113, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(114, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(115, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(116, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(117, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(118, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(119, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(120, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(121, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(122, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(123, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(124, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(125, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(126, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(127, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(128, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(129, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(130, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(131, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(132, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(133, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(134, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(135, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(136, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(137, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(138, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(139, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(140, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(141, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(142, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(143, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(144, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(145, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(146, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(147, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(148, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(149, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(150, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(151, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(152, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(153, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(154, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(155, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(156, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(157, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(158, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(159, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(160, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(161, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(162, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(163, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(164, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(165, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(166, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(167, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(168, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(169, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(170, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(171, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(172, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(173, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(174, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(175, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(176, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(177, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(178, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(179, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(180, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(181, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(182, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(183, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(184, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(185, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(186, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(187, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(188, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(189, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(190, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(191, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(192, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(193, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(194, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(195, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(196, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(197, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(198, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(199, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(200, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(201, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(202, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(203, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(204, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(205, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(206, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(207, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(208, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(209, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(210, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(211, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(212, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(213, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(214, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(215, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(216, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(217, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(218, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(219, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(220, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(221, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(222, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(223, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(224, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(225, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(226, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(227, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(228, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(229, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(230, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(231, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(232, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(233, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(234, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(235, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(236, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(237, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(238, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(239, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(240, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(241, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(242, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(243, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(244, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(245, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(246, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(247, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(248, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(249, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(250, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(251, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(252, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(253, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(254, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(255, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(256, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(257, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(258, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(259, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(260, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(261, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(262, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(263, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(264, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(265, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(266, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(267, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(268, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(269, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(270, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(271, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(272, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(273, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(274, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(275, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(276, 'New 1', '400', 'Yes', 'sggtf', 'WhatsApp Image 2020-05-19 at 5.31.44 AM.jpeg'),
(277, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(278, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(279, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg'),
(280, 'sidzhfv ', '200', 'Yes', 'vsfvssfvfsvsfvs', 'WhatsApp Image 2020-05-19 at 5.31.43 AM (1).jpeg'),
(281, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(282, 'vssfsfd', '2000', 'Yes', 'vaddadavdd', 'WhatsApp Image 2020-05-19 at 5.31.43 AM.jpeg'),
(283, 'sidzhfv ', '2000', 'Yes', 'vdsvdsvdvdvds', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(284, 'New 2', '500', 'Yes', 'faf', 'WhatsApp Image 2020-05-19 at 5.31.45 AM.jpeg'),
(285, 'czx', '200', 'Yes', 'vffvsfvfssfvsfvfs', 'WhatsApp Image 2020-05-19 at 5.31.42 AM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `product_custoumer_details`
--

CREATE TABLE `product_custoumer_details` (
  `id` int(10) NOT NULL,
  `transaction_id` longtext NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `custoumer_name` varchar(250) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` longtext NOT NULL,
  `country` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `zip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_custoumer_details`
--

INSERT INTO `product_custoumer_details` (`id`, `transaction_id`, `user_id`, `custoumer_name`, `mobile_no`, `email`, `address`, `country`, `city`, `state`, `zip`) VALUES
(46, 'ytoxTm3KGiCUFjq8', '2', 'abdul aziz', '09118866166', 'abdulazizsiddiqui01@gmail.com', 'thakurgunj near hayat masjid', 'India', 'lucknow', 'Uttar Pradesh', '226003'),
(47, 'ytoxTm3KGiCUFjq8', '2', 'abdul aziz', '09118866166', 'abdulazizsiddiqui01@gmail.com', 'thakurgunj near hayat masjid', 'India', 'lucknow', 'Uttar Pradesh', '226003'),
(48, 'ytoxTm3KGiCUFjq8', '2', 'abdul aziz', '09118866166', 'abdulazizsiddiqui01@gmail.com', 'thakurgunj near hayat masjid', 'India', 'lucknow', 'Uttar Pradesh', '226003'),
(49, 'ytoxTm3KGiCUFjq8', '2', 'abdul aziz', '09118866166', 'abdulazizsiddiqui01@gmail.com', 'thakurgunj near hayat masjid', 'India', 'lucknow', 'Uttar Pradesh', '226003'),
(50, 'jt2UOksYQuiDP7JW', '2', 'abdul aziz', '09118866166', 'abdulazizsiddiqui01@gmail.com', 'thakurgunj near hayat masjid', 'India', 'lucknow', 'Uttar Pradesh', '226003'),
(51, 'LhC1Fc3ARqz92dQV', '2', 'abdul aziz', '09118866166', 'abdulazizsiddiqui01@gmail.com', 'thakurgunj near hayat masjid', 'India', 'lucknow', 'Uttar Pradesh', '226003'),
(52, '07a9SE6HmMXgRFub', '2', 'Abdul Aziz', '+917007863331', 'abdulazizsiddiqui01@gmail.com', '448/242 near hayat masjid Manju Tandon dhaal Thakurganj chowk', 'India', 'Lucknow', 'Uttar Pradesh', '226003'),
(53, '07a9SE6HmMXgRFub', '2', 'Abdul Aziz', '+917007863331', 'abdulazizsiddiqui01@gmail.com', '448/242 near hayat masjid Manju Tandon dhaal Thakurganj chowk', 'India', 'Lucknow', 'Uttar Pradesh', '226003');

-- --------------------------------------------------------

--
-- Table structure for table `product_order_details`
--

CREATE TABLE `product_order_details` (
  `id` int(11) NOT NULL,
  `p_id` varchar(252) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `qty` varchar(250) NOT NULL,
  `date` varchar(100) NOT NULL,
  `total` varchar(200) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `transaction_id` varchar(300) NOT NULL,
  `payment_mode` varchar(250) NOT NULL,
  `order_unique_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order_details`
--

INSERT INTO `product_order_details` (`id`, `p_id`, `p_name`, `price`, `qty`, `date`, `total`, `user_id`, `transaction_id`, `payment_mode`, `order_unique_id`) VALUES
(68, '9', 'vssfsfd', '2000', '1', '18-09-2020', '2000', '2', 'ytoxTm3KGiCUFjq8', 'cash', 'ExIYQtZ0VNu7arc8'),
(69, '9', 'vssfsfd', '2000', '1', '18-09-2020', '2000', '2', 'ytoxTm3KGiCUFjq8', 'cash', 'N9sodLz1q4Im7aTt'),
(70, '9', 'vssfsfd', '2000', '1', '18-09-2020', '2000', '2', 'ytoxTm3KGiCUFjq8', 'cash', 'ks14Unbgtm6OAGpZ'),
(71, '11', 'New 1', '400', '1', '18-09-2020', '400', '2', 'ytoxTm3KGiCUFjq8', 'cash', 'fpCT3uIWGgLzEbtv'),
(72, '7', 'czx', '200', '1', '18-09-2020', '200', '2', 'jt2UOksYQuiDP7JW', 'cash', 'blY4rc6RDjvmwIyF'),
(73, '9', 'vssfsfd', '2000', '1', '18-09-2020', '2000', '2', 'LhC1Fc3ARqz92dQV', 'cash', 'fF8PhmHQU4rD95Tv'),
(74, '11', 'New 1', '400', '3', '07-02-2021', '1200', '2', '07a9SE6HmMXgRFub', 'cash', 'dvWPLX6h7FbSyz92'),
(75, '31', 'czx', '200', '1', '07-02-2021', '200', '2', '07a9SE6HmMXgRFub', 'cash', 'b3RYIoDMSVa2mkFO');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(255) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `review_comment` text NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `user_id`, `review_comment`, `date`) VALUES
(1, '6', '1', ' window.location.href = window.location.href = window.location.href = window.location.href = window.location.href = window.location.href =', '24-07-2020'),
(2, '6', '1', 'cccccccccccccccccccccccccccccccccccccc', '24-07-2020'),
(3, '9', '1', 'I am new review for this product', '25-07-2020'),
(4, '9', '1', 'I am new review for this product', '25-07-2020'),
(5, '9', '1', 'cccccccccccccccccccccccccccccccccccccccccccccccccccccc', '25-07-2020'),
(6, '9', '1', 'ddddddddddddddddddddddddddddddddddddddddddddd', '25-07-2020'),
(11, '5', '1', 'fffffffffffffffffffffffffffffffffffffffffffffffff', '25-07-2020'),
(12, '5', '1', 'sidzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', '25-07-2020'),
(13, '5', '1', 'sidzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', '25-07-2020'),
(14, '5', '1', 'sidzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', '25-07-2020'),
(15, '9', '1', '        $userNameQuery = $con-&gt;prepare(&quot;SELECT * FROM user_details WHERE user_email = :email&quot;);\n        $userNameQuery-&gt;bindParam(&quot;:email&quot;,$user_review_user_email);\n        $userNameQuery-&gt;execute();    \n        \n        $user_name_result = $userNameQuery-&gt;fetch();\n        //User first name\n        $user_review_name = $user_name_result[\'user_first_name\'];\n        //If first name is not availble so use user email to display in user name \n        $review_user_name = ($user_review_name == \'\') ? $user_review_user_email : $user_review_name;        $userNameQuery = $con-&gt;prepare(&quot;SELECT * FROM user_details WHERE user_email = :email&quot;);\n        $userNameQuery-&gt;bindParam(&quot;:email&quot;,$user_review_user_email);\n        $userNameQuery-&gt;execute();    \n        \n        $user_name_result = $userNameQuery-&gt;fetch();\n        //User first name\n        $user_review_name = $user_name_result[\'user_first_name\'];\n        //If first name is not availble so use user email to display in user name \n        $review_user_name = ($user_review_name == \'\') ? $user_review_user_email : $user_review_name;', '26-07-2020'),
(16, '10', '1', 'I am the new comment here I am the new comment here', '30-07-2020'),
(17, '10', '1', '$(&quot;#review_comment&quot;).val();$(&quot;#review_comment&quot;).val();$(&quot;#review_comment&quot;).val();', '30-07-2020');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `id` int(10) NOT NULL,
  `total` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`id`, `total`, `user_id`) VALUES
(0, '2000', '2'),
(5, '8000', '3'),
(6, '3300', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `ip`) VALUES
(1, 'sidra@gmail.com', '24571dc76cb7df8db5f91f55a165a7f5', ''),
(2, 'abdulazizsiddiqui01@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(100) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_first_name` varchar(200) NOT NULL,
  `user_last_name` varchar(200) NOT NULL,
  `user_phone` varchar(200) NOT NULL,
  `user_display_name` varchar(200) NOT NULL,
  `user_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_email`, `user_first_name`, `user_last_name`, `user_phone`, `user_display_name`, `user_address`) VALUES
(1, 'abdulazizsiddiqui01@gmail.com', 'abdul', 'azeez', '7007863331', 'sidz', '448/242 near hayat masjid manju tandon dhaal');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(112) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `user_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `user_id`) VALUES
(1, '18', '1'),
(2, '7', '1'),
(5, '7', '2'),
(6, '9', '2'),
(7, '11', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgetpassword`
--
ALTER TABLE `forgetpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_custoumer_details`
--
ALTER TABLE `product_custoumer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order_details`
--
ALTER TABLE `product_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forgetpassword`
--
ALTER TABLE `forgetpassword`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `product_custoumer_details`
--
ALTER TABLE `product_custoumer_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product_order_details`
--
ALTER TABLE `product_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(112) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
