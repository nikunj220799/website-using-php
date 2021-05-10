-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 11:39 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_brand`, `product_price`, `product_image`, `product_quantity`, `product_status`) VALUES
(1, 'CARD DECK', 'PASHA', '149.00', 'image-1.jpg', 10, '1'),
(2, 'CHESS', 'FUNSKOOL', '450.00', 'image-2.jpg', 10, '1'),
(3, 'CHECKERS', 'FUNSKOOL', '650.00', 'image-3.jpg', 10, '1'),
(4, 'SCRABBLE', 'LEGO', '400.00', 'image-4.jpg', 10, '1'),
(5, 'CLUEDO', 'FUNSKOOL', '899.00', 'image-5.jpg', 10, '1'),
(6, 'GAME OF LIFE', 'HASBRO', '1200.00', 'image-6.jpg', 10, '1'),
(7, 'UNO CARDS', 'UNO', '220.00', 'image-7.jpg', 10, '1'),
(8, 'LEGO BLOCKS', 'LEGO', '450.00', 'image-8.jpg', 10, '1'),
(9, 'UNO RAPPER', 'UNO', '450.00', 'image-9.jpg', 10, '1'),
(10, 'UNO FLIP', 'UNO', '320.00', 'image-10.jpg', 10, '1'),
(11, 'BARBIE DOLL SET', 'BARBIE', '720.00', 'image-11.jpg', 10, '1'),
(12, 'CAR SET', 'HOT WHEELS', '749.00', 'image-12.jpg', 10, '1'),
(13, 'FISHER PRICE', 'HOT WHEELS', '120.00', 'image-13.jpg', 10, '1'),
(14, 'CHESS SET 2', 'FUNSKOOL', '50.00', 'image-14.jpg', 10, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
