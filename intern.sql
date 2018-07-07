-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2018 at 10:36 AM
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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `erp_code` varchar(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `payment_type` enum('0','1') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`id`, `name`, `customer_id`, `erp_code`, `description`, `email`, `address`, `contact_number`, `company_name`, `payment_type`, `status`) VALUES
(0, 'Sagar', 12, '1212312323', 'asdssasdsdadasdadad', 'sagar199785', 'adasdasdadasdasaadasd', '9000100010', 'a', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `erp_code` varchar(11) NOT NULL,
  `uom` varchar(11) NOT NULL,
  `item_price` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `item_name`, `item_id`, `description`, `erp_code`, `uom`, `item_price`, `status`) VALUES
(1, 'Book', 0, 'Class 12 Physics', '54321', '0987654321', 800, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_stock`
--

CREATE TABLE `tbl_item_stock` (
  `id` int(11) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `recorded_quantity` int(11) NOT NULL,
  `daily_sell_quantity` int(11) NOT NULL,
  `available_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item_stock`
--

INSERT INTO `tbl_item_stock` (`id`, `item_id`, `item_name`, `employee_id`, `date_time`, `recorded_quantity`, `daily_sell_quantity`, `available_quantity`) VALUES
(1, '  1212121212', '  Book', '  10', '2018-07-07 04:33:38', 12, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transation_detail`
--

CREATE TABLE `tbl_transation_detail` (
  `id` int(11) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `purchase_quantity` int(11) NOT NULL,
  `total_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transation_header`
--

CREATE TABLE `tbl_transation_header` (
  `id` int(11) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `employee_id` int(50) NOT NULL,
  `total_amt` float NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item_stock`
--
ALTER TABLE `tbl_item_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transation_detail`
--
ALTER TABLE `tbl_transation_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transation_header`
--
ALTER TABLE `tbl_transation_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_item_stock`
--
ALTER TABLE `tbl_item_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transation_detail`
--
ALTER TABLE `tbl_transation_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transation_header`
--
ALTER TABLE `tbl_transation_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
