-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220902.0b5d7b67cf
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2022 at 10:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trendzadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL DEFAULT 0,
  `shipstatus` varchar(250) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `itemid`, `userid`, `orderid`, `shipstatus`) VALUES
(7, 2, 1, 6, 'Processing'),
(13, 1, 1, 6, 'Shipped'),
(16, 1, 1, 0, 'pending'),
(17, 2, 1, 0, 'pending'),
(20, 1, 5, 8, 'Shipped'),
(21, 7, 5, 9, 'pending'),
(22, 16, 5, 9, 'Shipped'),
(23, 2, 5, 9, 'Shipped'),
(26, 15, 5, 0, 'pending'),
(28, 16, 5, 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `slogan` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `slogan`, `image`, `deleted`) VALUES
(1, 'Kids', 'Kids cloths item', '../uploads/kc.jpg', 0),
(2, 'Handicraft', 'some handicraft items', '../uploads/handii.jpg', 0),
(3, 'Women ', 'some ladies cloths', '../uploads/wc.jpg', 0),
(4, 'admintestcat', 'admin test cat', '../uploads/image_2022-09-01_122450819.png', 1),
(5, 'Men', 'Some men clothes', '../uploads/mc.jpg', 0),
(6, 'Fancy Items', 'Any fancy items', '../uploads/cf.jpg', 0),
(7, 'Bags ', 'Any ladies bags items', '../uploads/bc.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `number` varchar(250) NOT NULL,
  `msg` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `number`, `msg`) VALUES
(2, 'dsaa', 'sad@da.da', '213123213213', 'dsa'),
(3, 'user', 'user@gmail.com', '0711684905', 'This is very good products');

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `ordervalue` varchar(250) NOT NULL,
  `commission` varchar(250) NOT NULL,
  `sellervalue` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `earnings`
--

INSERT INTO `earnings` (`id`, `orderid`, `ordervalue`, `commission`, `sellervalue`) VALUES
(3, 6, '223', '22.3', '200.7'),
(4, 7, '123', '12.3', '110.7'),
(5, 8, '3100', '310', '2790'),
(6, 9, '8800', '880', '7920');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `catid` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `userid` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `image`, `catid`, `description`, `userid`, `deleted`) VALUES
(1, 'Long pane colour ladies frock', '3100', '../uploads/15.jpg', 3, 'Size = L', 2, 0),
(2, 'Design long frock', '3300', '../uploads/10.jpg', 3, 'Size = L', 2, 0),
(3, '  Design colour short frock', '2900', '../uploads/2s.jpg', 3, 'Size = L\r\n', 2, 0),
(4, 'solid  lipstick', '890', '../uploads/fa.jpg', 6, 'Pink colour', 2, 0),
(5, 'Black lether', '3500', '../uploads/bl.jpg', 7, 'black colour this design  only', 6, 1),
(6, 'Seione', '4000', '../uploads/bb.jpeg', 7, 'Blue color', 6, 1),
(7, 'Scione', '4000', '../uploads/r.jpg', 7, 'Red colour', 6, 0),
(8, 'Sets of bags', '45000', '../uploads/pin.jpg', 7, 'Pink colour only', 6, 0),
(9, 'Pane colour shirts men', '2000', '../uploads/aa.jpg', 5, 'Size = L\r\n', 6, 0),
(10, 'Sri Lanka jurcy men', '3800', '../uploads/a.jpg', 5, 'Size= M', 6, 0),
(11, 'Office shirt men', '2200', '../uploads/red1.jpg', 5, 'Size=L', 6, 0),
(12, 'Jurcy kids', '1800', '../uploads/kid.jpg', 1, 'Size= M', 2, 0),
(13, 'Night Kit kids', '750', '../uploads/84fe7c908be7c05eb2005cfe34f0a597.jpg', 1, 'free size', 2, 0),
(14, 'Hair band', '120', '../uploads/7b4c65fe4e26c99d8c9422704edbd9ea.jpg', 6, 'Black colour only', 2, 0),
(15, 'Bamboo Mug ', '1300', '../uploads/Sri-Lankan-Handmade-Bamboo-Wooden-Mug-Tea-Coffee.jpg', 2, '', 6, 0),
(16, 'Bamboo Net', '1500', '../uploads/images (1).jpg', 2, 'Food net', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `datetime` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `card` varchar(250) NOT NULL,
  `cardexp` varchar(250) NOT NULL,
  `ordersum` int(11) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `datetime`, `address`, `phone`, `payment`, `card`, `cardexp`, `ordersum`, `status`) VALUES
(6, 1, 'Wednesday 31st of August 2022 02:58:37 PM', 'ca', 'sa', 'Visa Card', '1212121212121212', '', 223, 'Approved'),
(7, 1, 'Wednesday 31st of August 2022 03:00:09 PM', 'qqq', 'ww', 'Visa Card', 'qw', '', 123, 'Approved'),
(8, 5, 'Tuesday 6th of September 2022 10:25:58 AM', 'krindiwela', '711526300', 'Visa Card', '2130', '', 3100, 'Approved'),
(9, 5, 'Tuesday 6th of September 2022 08:18:41 PM', 'krindiwela', '711526300', 'Master Card', '5230', '', 8800, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `passwordreset`
--

CREATE TABLE `passwordreset` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passwordreset`
--

INSERT INTO `passwordreset` (`id`, `email`, `code`) VALUES
(4, 'gayani.mankotte@gmail.com', '7Z2LcMKV'),
(5, 'gayani.mankotte@gmail.com', 'F8bAOKBP'),
(6, 'gayani.mankotte@gmail.com', 'krvwjAlM'),
(7, 'gayani.mankotte@gmail.com', 'ZM8IgN5L'),
(8, 'iit19037@std.uwu.ac.lk', 'kw6VNRHG'),
(9, 'iit19023@std.uwu.ac.lk', 'pTe1CE9o'),
(10, 'iit19023@std.uwu.ac.lk', 'Dt0En8Xf'),
(11, 'iit19023@std.uwu.ac.lk', 'UK0aHX8s'),
(12, 'gayani.mankotte@gmail.com', 'U0FmLXfs'),
(13, 'gayani.mankotte@gmail.com', 'VCkUpbq0');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `dtime` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `itemid`, `userid`, `comment`, `dtime`) VALUES
(2, 1, 1, 'test comment', '2022-09-02 14:20:30'),
(3, 2, 5, 'Its goods', '2022-09-06 20:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `active`) VALUES
(1, 'test', 'suthuras@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'buyer', 0),
(2, 'shop', 'shop@a.b', '5f4dcc3b5aa765d61d8327deb882cf99', 'seller', 1),
(3, 'test buyer', 'buyer@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'buyer', 0),
(4, 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 1),
(5, 'user', 'user@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', 'buyer', 1),
(6, 'seller02', 'seller02@gmail.com', '1e4970ada8c054474cda889490de3421', 'seller', 1),
(7, 'Tharushi', 'gayani.mankotte@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'buyer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `itemid`, `userid`) VALUES
(16, 2, 1),
(18, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `passwordreset`
--
ALTER TABLE `passwordreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
