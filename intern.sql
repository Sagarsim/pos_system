-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2018 at 03:18 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `erp_code` varchar(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `payment_type` enum('0','1') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`customer_id`, `name`, `erp_code`, `description`, `email`, `address`, `contact_number`, `company_name`, `payment_type`, `status`) VALUES
(1, 'Sagar', '   12123123', '   asdssasdsdadasdadad', 'sagar199785@gmail.com', '   adasdasdadasdasaadasd', '   90001000', '   a', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `erp_code` varchar(11) NOT NULL,
  `uom` varchar(11) NOT NULL,
  `item_price` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`item_id`, `item_name`, `description`, `erp_code`, `uom`, `item_price`, `status`) VALUES
(4, 'Book', 'Artificial Intelligence', '12122', 'ctn', 1200, '1'),
(5, 'Pepsi', 'Soft drink', '12122', 'ctn', 20, '1'),
(6, 'Pendrive', 'data storage device', '12122', 'pcs', 1000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_stock`
--

CREATE TABLE `tbl_item_stock` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `employee_uname` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `recorded_quantity` int(11) NOT NULL,
  `daily_sell_quantity` int(11) NOT NULL,
  `available_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item_stock`
--

INSERT INTO `tbl_item_stock` (`id`, `item_id`, `item_name`, `employee_uname`, `date_time`, `recorded_quantity`, `daily_sell_quantity`, `available_quantity`) VALUES
(6, 4, 'Book', 'sagar1234', '2018-07-19 13:09:41', 20, 0, 11),
(7, 5, 'Pepsi', 'sagar1234', '2018-07-19 13:13:19', 50, 0, 20),
(8, 6, 'Pendrive', 'sagar1234', '2018-07-19 13:13:19', 15, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transation_detail`
--

CREATE TABLE `tbl_transation_detail` (
  `id` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `total_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transation_detail`
--

INSERT INTO `tbl_transation_detail` (`id`, `invoice`, `item_id`, `purchase_quantity`, `total_amt`) VALUES
(40, 33, '4', 5, 11100),
(41, 33, '5', 5, 11100),
(42, 33, '6', 5, 11100),
(43, 34, '4', 1, 2600),
(44, 34, '5', 20, 2600),
(45, 34, '6', 1, 2600),
(46, 35, '4', 2, 3700),
(47, 35, '5', 15, 3700),
(48, 35, '6', 1, 3700),
(49, 36, '4', 1, 1300),
(50, 36, '5', 5, 1300),
(51, 37, '5', 10, 4200),
(52, 37, '6', 4, 4200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transation_header`
--

CREATE TABLE `tbl_transation_header` (
  `invoice` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `employee_uname` varchar(50) NOT NULL,
  `total_amt` float NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transation_header`
--

INSERT INTO `tbl_transation_header` (`invoice`, `customer_name`, `employee_uname`, `total_amt`, `date_time`) VALUES
(33, 'Sagar', 'sagar1234', 11100, '2018-07-19 13:04:07'),
(34, 'Sagar', 'sagar1234', 2600, '2018-07-19 13:06:33'),
(35, 'Sagar', 'sagar1234', 3700, '2018-07-19 13:07:25'),
(36, 'Sagar', 'sagar1234', 1300, '2018-07-19 13:09:41'),
(37, 'Sagar', 'sagar1234', 4200, '2018-07-19 13:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `upass` varchar(60) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fname`, `lname`, `uname`, `upass`, `status`, `datetime`, `type`) VALUES
(25, 'Pratik', 'Ponkiya', 'pratik123', '$2y$10$NQE6tRaFwANbv.VMFGY4COVXLRCpATLpUAk66RviheFlwgKzrC/7K', '1', '2018-06-26 16:27:19', 1),
(26, 'Pinkesh', 'Patel', 'pinkesh123', '$2y$10$9PZD.sk6upI0mCVrsmzex.Ld1P5nvQcSFMLQFADtiOoNSGte97S2O', '1', '2018-06-26 16:27:42', 1),
(27, 'Mihir', 'Patel', 'mihir4x', '$2y$10$JagJTZsPG/RwC7t72hSJUu8ugkx7K95TwagLPLFHZCzgB1G5M76A.', '1', '2018-06-27 16:24:11', 1),
(28, 'Sagar', 'Gujarati', 'sagar1234', '$2y$10$JvkYgL8vyQcCw6uqocmGB.aE1/AT6bJYOHv9LVaLxqiyWrabr4Ad6', '1', '2018-06-27 16:30:29', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_item_stock`
--
ALTER TABLE `tbl_item_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_item_stock_ibfk_1` (`item_id`);

--
-- Indexes for table `tbl_transation_detail`
--
ALTER TABLE `tbl_transation_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_transation_detail_ibfk_1` (`invoice`);

--
-- Indexes for table `tbl_transation_header`
--
ALTER TABLE `tbl_transation_header`
  ADD PRIMARY KEY (`invoice`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_item_stock`
--
ALTER TABLE `tbl_item_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_transation_detail`
--
ALTER TABLE `tbl_transation_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_transation_header`
--
ALTER TABLE `tbl_transation_header`
  MODIFY `invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_item_stock`
--
ALTER TABLE `tbl_item_stock`
  ADD CONSTRAINT `tbl_item_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tbl_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transation_detail`
--
ALTER TABLE `tbl_transation_detail`
  ADD CONSTRAINT `tbl_transation_detail_ibfk_1` FOREIGN KEY (`invoice`) REFERENCES `tbl_transation_header` (`invoice`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
