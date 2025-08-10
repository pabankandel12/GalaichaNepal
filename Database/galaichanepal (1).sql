-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2025 at 04:44 PM
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
(6, 'Aman ', 'amanraj@#908', 'editor');

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
(2, 'Image ', 0x696d6167652e6a7067),
(3, 'Image Two', 0x696d616765322e6a7067);

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
(2, 'Gopal Paudel', 'basantapur,kathamandu', 'your services i like it.'),
(3, 'Ganga Bhatta', 'basantapur,kathamandu', 'it is best website'),
(7, 'Urmila Adhikari', 'basantapur,kathamandu', 'nice');

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
(2, 'Handknotted/Handmade', 'This exquisite Nepali hand-knotted carpet is a true masterpiece of Tibetan weaving technique. Skilled local artisans have carefully crafted this carpet using a mix of high-quality New Zealand, and Tibetan wool to ensure its durability and longevity. \"', 130000, 'Black', 0x67616c6169636861332e6a7067, 5),
(3, 'Handmade Carpet/ Nep', 'The attention to detail and fine workmanship guarantee the highest quality, making it a perfect addition to any home decor. The environmentally friendly dyeing method used in its production ensures that the colors are vibrant and long-lasting', 100000, 'Black', 0x736f6661352e6a7067, 4),
(4, 'Handknotted/Sofa Set', 'Handmade\r\nTraditional Craftsmanship\r\nUnique Design\r\nPure Wool\r\nLife long Durability\r\nLuxury\r\nAttractive\r\n60 Knot (202*306)\r\nKassito Carpet', 50000, 'Black', 0x47616c616963686170686f746f312e6a7067, 5),
(5, 'Handmade Carpet/thre', 'This is a Royal Printed Embroidered Super Soft Bed Floor Carpet, measuring 7 feet by 5 feet. It is a perfect addition to your home decor, specifically for your bedroom or living room. The carpet is made of high-quality materials, ensuring its durability and longevity', 50000, 'Black', 0x67616c6169636861312e6a7067, 4),
(6, 'HomeMade/Nepali/Gala', 'this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. this is the most expensive Galaicha product. ', 133000, 'Black', 0x736f6661342e6a7067, 7),
(7, 'Handknotted/Handmade', 'This is the handmade Galaicha. in this product can take the much more special offer.Like can take the gift .', 50000, 'Black', 0x47616c616963686170686f746f2e6a7067, 5),
(8, 'home Light Red Polye', 'Material: Polyester\r\nType: Carpet\r\nSize: 5 ft x 3 ft\r\nShape: Rectangle\r\nThe attention to detail and fine workmanship guarantee the highest quality, making it a perfect addition to any home decor. The environmentally friend', 19999, 'Red', 0x47616c616963686170686f746f65646974322e6a7067, 7),
(9, 'New Horizon Nepali G', 'Since it is establishment, the company has been running it is business in the field of manufacture and export of Nepalese Carpets.\r\n\r\nBalaju\r\nKathmandu, Nepal', 55000, 'Red', 0x47616c616963686170686f746f656469742e6a7067, 7),
(10, 'Living Room Sofa Set', '2 Piece Living Room Sofa Set, Sectional Sofa Couches for Living Room, Modern Button Tufted Couch Furniture, Loveseat and 3-Seat Sofa for Living Room, Small Space, Gray', 4000, 'Red', 0x67616c6169636861322e6a7067, 4);

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
  `address` varchar(40) NOT NULL,
  `pname` varchar(30) DEFAULT NULL,
  `totalam` int(10) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `p_status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_order`
--

INSERT INTO `p_order` (`id`, `name`, `phone`, `email`, `address`, `pname`, `totalam`, `username`, `order_date`, `p_status`) VALUES
(4, 'Asok mainali', 9808837046, '40@gmail.com', 'skt', 'check for admin', 4000, NULL, '2024-06-11 21:57:04', 'Pending'),
(5, 'Rekha\nSharma', 9808837046, '40@gmail.com', 'ktm', 'check for admin', 4000, NULL, '2024-05-02 21:57:16', 'Pending'),
(6, 'paban kandel', 9808837046, 'ram@gmail.com', 'kalaiki', 'Handmade Carpet/ Nep', 200000, 'pabankandel2@gmail.com', '2024-05-05 08:18:18', 'Pending'),
(7, 'Ram Thapa', 98765322, '40@gmail.com', 'surkhet', 'Handmade Carpet/ Nep', 250000, 'dhaniramjoshi13@gmail.com', '2024-07-10 21:57:39', 'Pending'),
(8, 'kamala kandel', 980876698, 'kamala@gmail.com', 'Basbari', 'Handknotted/Sofa Set', 200000, 'dhaniramjoshi13@gmail.com', '2024-07-19 21:57:48', 'Delivery'),
(9, 'Yubraj ghimire', 9843235578, 'yubrajghimire@gmail.com', 'Charapath,ktm', 'Handmade Carpet/ Nep', 200000, 'thapa13@gmail.com', '2024-06-28 10:01:15', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `pro_image` longblob DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `phone`, `password`, `pro_image`, `address`) VALUES
(3, ' Aman Raj Bhattarai', 'Bhattarai', 'amanraj34@gmail.com', '9804567834', '1234', '', 'Bagbazzer'),
(4, ' Himal TImilsena', 'himal345', 'himal23@gmail.com', '9804567834', '1111', '', 'Bagbazzer'),
(5, 'Bimala Dhakal', 'GalaichaNepal', 'dhaniramjoshi13@gmail.com', '9804567834', '3333', 0x6c6f676f2e706e67, 'Bagbazzer'),
(6, 'Ramesh Thapa', 'ramesh@#', 'thapa13@gmail.com', '9800543276', '4444', 0x46425f494d475f313731303938373831323637342e6a7067, 'Birdiya'),
(7, 'paban kandel', 'pabank', 'pabankandel2@gmail.com', '9808837046', 'paban1234', 0x3230313231373632345f3333333437313935383132353331365f373832373731303335383139353235363039385f6e2e6a7067, 'Basantapur');

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
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `p_order`
--
ALTER TABLE `p_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
