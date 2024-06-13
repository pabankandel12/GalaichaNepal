-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 07:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galaichanepal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `u_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`u_id`, `username`, `password`, `role`) VALUES
(1, 'GalaichaNepal', 'Galaicha@#2059', 'admin'),
(3, 'himal ', '1234', 'editor');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `image_title` varchar(100) NOT NULL,
  `feature_image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `image_title`, `feature_image`) VALUES
(1, '', 0x43617074757265332e504e47);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `massage` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `address`, `massage`) VALUES
(1, 'paban kandel', 'basantapur,kathamandu', 'your services i like it.'),
(2, 'paban kandel', 'basantapur,kathamandu', 'your services i like it.'),
(3, 'paban kandel', 'basantapur,kathamandu', 'here'),
(7, 'paban kandel', 'basantapur,kathamandu', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `dis` text NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(30) NOT NULL,
  `image` longblob NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `dis`, `price`, `color`, `image`, `category_id`) VALUES
(2, 'Handknotted/Handmade', 'value=\"This exquisite Nepali hand-knotted carpet is a true masterpiece of Tibetan weaving technique. Skilled local artisans have carefully crafted this carpet using a mix of high-quality New Zealand, and Tibetan wool to ensure its durability and longevity. \"', 130000, 'Black', 0x426c75652050686f746f20436c65616e202620436f72706f72617465205765622044657369676e2053657276696365732046616365626f6f6b20506f73742e6a7067, 5),
(3, 'Handmade Carpet/ Nep', 'The attention to detail and fine workmanship guarantee the highest quality, making it a perfect addition to any home decor. The environmentally friendly dyeing method used in its production ensures that the colors are vibrant and long-lasting', 100000, 'Black', 0x736f6661352e6a7067, 4),
(4, 'Handknotted/Sofa Set', 'Handmade\r\nTraditional Craftsmanship\r\nUnique Design\r\nPure Wool\r\nLife long Durability\r\nLuxury\r\nAttractive\r\n60 Knot (202*306)\r\nKassito Carpet', 50000, 'BLack', 0x736f6661352e6a7067, 5),
(5, 'Handmade Carpet/thre', 'This is a Royal Printed Embroidered Super Soft Bed Floor Carpet, measuring 7 feet by 5 feet. It is a perfect addition to your home decor, specifically for your bedroom or living room. The carpet is made of high-quality materials, ensuring its durability and longevity', 0, 'Black', 0x67616c6169636861322e6a7067, 4),
(6, 'HomeMade/Nepali/Gala', 'this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. ', 133000, 'Bulue', 0x53746f7265203344206564697461626c652074657874206566666563742e6a7067, 7),
(7, 'Handknotted/Handmade', 'This is the handmade Galaicha. in this product can take the much more special offer.Like can take the gift .', 50000, 'Black', 0x6c61702e6a7067, 5);

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `c_id` int(11) NOT NULL,
  `c_name` char(30) NOT NULL,
  `c_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`c_id`, `c_name`, `c_desc`) VALUES
(4, 'Sofa Set', ''),
(5, 'Carpet', ''),
(7, 'Nepali Galaicha', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_order`
--

CREATE TABLE `p_order` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` double NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `pname` varchar(30) DEFAULT NULL,
  `totalam` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_order`
--

INSERT INTO `p_order` (`id`, `name`, `phone`, `email`, `address`, `pname`, `totalam`) VALUES
(4, 'paban kandel', 9808837046, '40@gmail.com', 'basantapur', 'check for admin', 4000),
(5, 'paban kandel', 9808837046, '40@gmail.com', 'basantapur', 'check for admin', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, ' paban kandel', 'pabankandel2@gmail.com', '9808837046', '123'),
(2, ' paban kandel', '', '9808837046', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `p_order`
--
ALTER TABLE `p_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `p_order`
--
ALTER TABLE `p_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
