-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 01:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '123'),
(2, 'bipin', 'bipin29', 'bipin29@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `p_id`, `product_name`, `product_image`, `product_price`, `quantity`) VALUES
(3, 39, 'Black jacket', 'IMG-649a457d3d8027.83735302.jpg', 1255, 1),
(4, 39, 'Black jacket', 'IMG-649a457d3d8027.83735302.jpg', 1255, 1),
(5, 39, 'Black jacket', 'IMG-649a457d3d8027.83735302.jpg', 1255, 1),
(6, 39, 'Black jacket', 'IMG-649a457d3d8027.83735302.jpg', 1255, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `c_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`c_id`, `name`, `username`, `email`, `password`, `created_at`) VALUES
(2, 'bipin', 'bipin29', 'sthabipin27@gmail.com', '123', '2023-06-15'),
(3, 'Asuna', 'Asuna1', 'asuna@gmail.com', '123', '2023-06-15'),
(4, 'hell', 'hell1', 'hell@gmail.com', '123', '2023-06-15'),
(12, 'Niraj', 'niraj1', 'niraj@gmail.com', '$2y$10$7OfWSfmYNsumgxLGD32T6Of4eHbXFcLzOWc0RR0OwPb/JvuAWz1TG', '2023-06-19'),
(13, 'kiran bhatta', 'kiran1', 'kiran@gmail.com', '$2y$10$VWGLBXWyQAFhsdiobAj/xel7WuX6OlrAbM8OX3SFk3V9haL2kCBGO', '2023-06-19'),
(14, 'Bipin', 'bipin', 'test1@gmail.com', '$2y$10$AXub5XRmh6G7I9ypcx3F4udvD6ZafXGBVtPArwb86ksdYw/hXKYxS', '2023-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `M_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`M_id`, `name`, `email`, `message`) VALUES
(10, 'bipin', 'test@gmail.com', 'Tech Wear\'s headquarters are located at 2701 N Ogden Rd, Mesa, Arizona, 85215, United States What is Tech Wear\'s phone number? Tech Wear\'s phone number is (480) 968-6171 What is Tech Wear\'s official website? Tech Wear\'s official website is www.techwear.co');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `o_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`o_id`, `name`, `email`, `pid`) VALUES
(1, 'tees', 'test@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `p_id` int(11) NOT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `productcategory` varchar(255) NOT NULL,
  `productimage` varchar(255) DEFAULT NULL,
  `productdetails` varchar(255) DEFAULT NULL,
  `size` varchar(255) NOT NULL,
  `productprice` bigint(255) DEFAULT NULL,
  `productquantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`p_id`, `productname`, `productcategory`, `productimage`, `productdetails`, `size`, `productprice`, `productquantity`) VALUES
(38, 'Techwear puffer jacket', 'jacket', 'IMG-649a44f35b7c27.54277082.jpg', 'Techwear puffer jacket', 'L', 2500, 20),
(39, 'Black jacket', 'jacket', 'IMG-649a457d3d8027.83735302.jpg', 'Black techwear jacket', 'M', 1255, 10),
(40, 'White Jacket', 'jacket', 'IMG-649a45aca25fe5.52850787.jpg', 'White techwear jacket', 'L', 5000, 20),
(41, 'White tees', 'tees', 'IMG-649a45dd155b79.22911216.jpg', 'White techwear jacket', 'XL', 2500, 5),
(42, 'tees', 'tees', 'IMG-649a45fd868838.19476710.jpg', 'Black techwear jacket', 'S', 1500, 20),
(43, 'Pants', 'pants', 'IMG-649a4659620b43.35163529.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam alias minima inventore repellat consequatur ratione doloribus, veritatis ea deleniti repudiandae nostrum molestiae accusamus tempora aut eveniet voluptate ut. Nesciunt, iusto.\r\n', 'L', 2225, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `ship_id` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`M_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `M_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `o_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
