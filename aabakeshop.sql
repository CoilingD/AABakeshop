-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 03:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aabakeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `description` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `email`, `username`, `password`, `phone_number`, `role`, `description`) VALUES
(16, 'mark angelo', 'antang', 'markangeloabaigar.antang@bicol-u.edu.ph', 'mark', '$2y$10$Rus6SFqCM0I2cXfKg42MbunLW2KjOSBKBxSuSk0p9vGMgy3nzhj0.', 0, 'admin', 0),
(17, 'Girlie', 'Bo', 'girlie@gmail.com', 'Girlie', '$2y$10$Edov7w0fZ/IQz25Ulba93uYVgRZfkYnT5TlYwapuLftT2IggtiPmm', 0, 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `price`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(255) NOT NULL,
  `Category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `Category_name`) VALUES
(1, 'Cakes');

-- --------------------------------------------------------

--
-- Table structure for table `flavors`
--

CREATE TABLE `flavors` (
  `Flavor_id` int(255) NOT NULL,
  `Flavor_name` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flavors`
--

INSERT INTO `flavors` (`Flavor_id`, `Flavor_name`, `Status`) VALUES
(1, 'chocolate', 'A'),
(2, 'Vanilla', 'A'),
(3, 'Strawberry', 'A'),
(4, 'Mocha', 'A'),
(5, 'cheese', 'A'),
(6, 'Yema', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(255) NOT NULL,
  `usages` varchar(255) NOT NULL,
  `stock` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `ingredient_name`, `usages`, `stock`) VALUES
(1, 'Flour', '210g', '1890g'),
(2, 'Sugar', '200g', '1800'),
(3, 'Butter', '60g', '600g '),
(4, 'Eggs', '6pcs', '60pcs'),
(5, 'Milk', '200ml', '2000ml'),
(6, 'Baking Powder', '10g', '90g'),
(7, 'Vanilla Extract', '5ml', '50ml'),
(8, 'Cocoa Powder', '75g', '750g');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tracking_number` varchar(16) NOT NULL,
  `subtotal` int(255) NOT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `payment_amount` int(255) NOT NULL,
  `gcash_name` varchar(255) NOT NULL,
  `gcash_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `session_id`, `product_id`, `product_name`, `quantity`, `price`, `order_date`, `tracking_number`, `subtotal`, `status`, `payment_amount`, `gcash_name`, `gcash_number`) VALUES
(168, 12, 'l1380d7lch56tbjdsrh2195fcm', 1, 'Birthday Cake', 1, 300, '2024-05-02 15:48:26', '986556C1CC6BDF69', 300, 'received', 1500, 'mark angelo antang', '09483339433'),
(169, 12, 'l1380d7lch56tbjdsrh2195fcm', 2, 'Wedding Cake', 1, 300, '2024-06-02 15:48:28', 'A92CE58F827F562E', 300, 'received', 1500, 'mark angelo antang', '09483339433'),
(170, 12, 'l1380d7lch56tbjdsrh2195fcm', 4, 'Celebration Cake', 1, 300, '2024-06-02 15:48:28', '03DA9DB211DAC37D', 300, 'received', 1500, 'mark angelo antang', '09483339433'),
(171, 12, 'l1380d7lch56tbjdsrh2195fcm', 5, 'Valentines Cake', 1, 300, '2024-06-03 15:48:29', '898083D54382DB63', 300, 'received', 1500, 'mark angelo antang', '09483339433'),
(172, 12, 'l1380d7lch56tbjdsrh2195fcm', 6, 'Mini Cake', 1, 300, '2024-06-03 15:48:29', '41C290C00091478A', 300, 'received', 1500, 'mark angelo antang', '09483339433'),
(173, 17, 'l1380d7lch56tbjdsrh2195fcm', 23, 'Sheessh', 1, 1234, '2024-06-03 17:55:05', '57E131B620B930AB', 1234, 'received', 2434, 'mark angelo antang', '09483339433'),
(174, 17, 'l1380d7lch56tbjdsrh2195fcm', 8, 'Blueberry', 1, 300, '2024-06-03 17:55:06', '50DD75A83828CACB', 300, 'received', 2434, 'mark angelo antang', '09483339433'),
(175, 17, 'l1380d7lch56tbjdsrh2195fcm', 9, 'Yema Cake', 1, 300, '2024-06-03 17:55:06', 'D803C9C10E713F7A', 300, 'received', 2434, 'mark angelo antang', '09483339433'),
(176, 17, 'l1380d7lch56tbjdsrh2195fcm', 10, 'Round Cake', 1, 300, '2024-06-03 17:55:07', '3E6155C12691C248', 300, 'received', 2434, 'mark angelo antang', '09483339433'),
(177, 17, 'l1380d7lch56tbjdsrh2195fcm', 7, 'Monogram Cake', 1, 300, '2024-06-03 17:55:07', '306836FD608CCB8A', 300, 'received', 2434, 'mark angelo antang', '09483339433'),
(178, 22, 'l1380d7lch56tbjdsrh2195fcm', 4, 'Celebration Cake', 1, 300, '2024-06-04 23:57:47', '0EE19C7C1D74A094', 300, 'received', 300, 'Reymar Llagas', '09483339433'),
(179, 18, 'l1380d7lch56tbjdsrh2195fcm', 23, 'Sheessh', 1, 1234, '2024-06-03 17:09:21', '987E5B226AA147CE', 1234, 'received', 1234, 'mark angelo antang', '09483339433'),
(180, 20, 'l1380d7lch56tbjdsrh2195fcm', 1, 'Birthday Cake', 1, 300, '2024-06-03 17:29:13', '7AF0F4D845B81BDF', 300, 'received', 300, 'Reymar Llagas', '09483339433'),
(181, 12, 'l1380d7lch56tbjdsrh2195fcm', 23, 'Sheessh', 1, 1234, '2024-06-03 17:54:15', '51F7ADC7A4DE16F9', 1234, 'received', 1234, 'Reymar Llagas', '09483339433'),
(182, 12, 'l1380d7lch56tbjdsrh2195fcm', 10, 'Round Cake', 3, 300, '2024-06-03 17:54:15', 'D6210A7C7BC8A668', 900, 'received', 1800, 'Andrei Granario', '09483339433'),
(183, 12, 'l1380d7lch56tbjdsrh2195fcm', 9, 'Yema Cake', 3, 300, '2024-06-03 17:54:16', '320096CA7DF518E6', 900, 'received', 1800, 'Andrei Granario', '09483339433'),
(184, 12, '1c5hulv5u1cprtr0eakcsg8jhn', 6, 'Mini Cake', 1, 300, '2024-06-04 17:53:26', 'AF4D98337AAD997B', 300, 'received', 300, 'Reymar Llagas', '09483339433'),
(185, 19, 'b8f4kvd1gf9qfsjp8og48usu5u', 23, 'Sheessh', 1, 1234, '2024-06-04 12:01:35', 'AE1015DF6FE37072', 1234, 'pending', 1234, 'Andrei Granario', '09483339433'),
(186, 12, 'b8f4kvd1gf9qfsjp8og48usu5u', 4, 'Celebration Cake', 1, 300, '2024-06-04 17:53:27', 'F0140A645AAFF8F9', 300, 'received', 300, 'Andrei Granario', '09483339433'),
(187, 12, 'b8f4kvd1gf9qfsjp8og48usu5u', 6, 'Mini Cake', 1, 300, '2024-06-04 17:53:27', '5E68174AC63B39B9', 300, 'received', 300, 'Andrei Granario', '09483339433'),
(188, 23, 'pdbu3hn8be2f7ni13mh47pb0tl', 9, 'Yema Cake', 1, 300, '2024-06-04 23:55:21', 'A6232644F26D108E', 300, 'received', 300, 'Reymar Llagas', '09483339433'),
(189, 23, 'pdbu3hn8be2f7ni13mh47pb0tl', 25, 'apple', 1, 700, '2024-06-05 00:55:04', 'A6A479A017B133C5', 700, 'pending', 700, 'Reymar Llagas', '09483339433');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` int(255) NOT NULL,
  `flavor_id` int(255) NOT NULL,
  `size_id` int(255) NOT NULL,
  `Price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`price_id`, `flavor_id`, `size_id`, `Price`) VALUES
(1, 1, 1, 300),
(2, 2, 1, 300),
(3, 3, 1, 300),
(4, 4, 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `size_id` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `properties` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `Description`, `category_id`, `size_id`, `stock`, `price`, `status`, `product_image`, `properties`) VALUES
(1, 'Birthday Cake', 'A delicious cake perfect for birthdays.', '1', 'S', '5', '700', 'A', '../assets/img/birthday-cake.png', ' Birthday cake, Birthday dessert, Kids birthday cake'),
(2, 'Wedding Cake', 'An elegant cake for weddings and special occasions', '1', 'S', '1', '700', 'A', '../assets/img/wedding-cake.png', ' Wedding cake, Wedding dessert, Multi-tiered cake'),
(4, 'Celebration Cake', 'A festive cake for celebration and parties', '1', 'S', '5', '700', 'A', '../assets/img/popular-img1.png', ' Celebration cake, Party cake, Congratulations cake'),
(5, 'Valentines Cake', 'A special cake made with love for valentine\'s day.', '1', 'S', '8', '700', 'A', '../assets/img/valentine.png', 'Valentine\'s cake, Heart-shaped cake, Romantic cake'),
(6, 'Mini Cake', 'Adorable mini cakes for individuals', '1', 'S', '6', '700', 'A', '../assets/img/popular-img2.png', 'Mini cake, Personal cake, Single-serve cake'),
(7, 'Monogram Cake', 'Personalize cake with monogram design', '1', 'S', '7', '700', 'A', '../assets/img/monogram.png', ' Monogram cake, Personalized cake, Initial cake'),
(8, 'Blueberry', 'A desser made with fresh soft cheese.', '1', 'S', '9', '700', 'A', '../assets/img/popular-img3.png', ' Blueberry cake, Blueberry dessert, Fruit cake'),
(9, 'Yema Cake', 'A classic yema flavored cake', '1', 'S', '2', '700', 'A', '../assets/img/slicecd.jpg', 'Yema cake, Leche flan cake'),
(10, 'Round Cake', 'A classic round mocha flavored cake', '1', 'S', '6', '700', 'A', '../assets/img/MOCHA.png', 'Round cake, Circle cake, Traditional cake'),
(24, 'M', 'Shessh', '', '', '', '700', '', '../uploads/M.jpg', ''),
(25, 'apple', 'Delicious', '', '', '-1', '700', '', '../uploads/Apple.jpg', 'fruit');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(255) NOT NULL,
  `cake_size` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `cake_size`, `status`) VALUES
(1, 'standard', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `role`, `last_login`) VALUES
(12, 'mark angelo', 'antang', 'marco', '$2y$10$MLkzew7S4C.HizUKDy5VFO2cbEgObhmGujhOdSAF1BijxxINz42au', 'kram@gmail.com', 'user', '2024-06-05 01:35:32'),
(13, 'Girlie', 'Bo', 'Girlie', '$2y$10$F0HekhY0KrNxPkwoWY4zj.EPiiPXoaGBDyYYxHjjKZ5IvmdqpxpHC', 'girlie@gmail.com', 'user', '2024-05-30 23:02:59'),
(16, 'Lance', 'Velasco', 'Lance', '$2y$10$K0BlOCB2h0I5gkHzKzycMuRxNboFRKkrpeVjMTit1C2y.Zd.UsVPm', 'Lance@gmail.com', 'user', '2024-05-31 13:05:38'),
(17, 'blood', 'rouge', 'blood', '$2y$10$xCS91h/4J35PpYgOUebM6OJECdjYiM5jNFaHsAsOQ2ilq8DQq/dum', 'blood@gmail.com', 'user', '2024-06-05 07:56:07'),
(18, 'kuroi', 'akuma', 'kuroi', '$2y$10$zVbAnKTTz63Q85zpxvWxQOcOto41gKknPnNITFN7vJrlBvPGH.iyK', 'akuma@gmail.com', 'user', '2024-06-04 01:08:58'),
(19, 'dragon', 'coiling', 'dragon', '$2y$10$Q2DMJ6ro1FOB7m2JJFO1ju9FrqjEjON1rbRXzyLZr0UA/XdYJ2Dmy', 'dragon@gmail.com', 'user', '2024-06-04 19:59:56'),
(20, 'reymar', 'llagas', 'reymar', '$2y$10$YC45Dv4aQ7vX5hzb35sOT.3kDgGZMvYsG5YxnWr4IRD2FoXHT8f8S', 'reymar@gmail.com', 'user', '2024-06-04 01:26:13'),
(21, 'Andrei', 'Granario', 'Andrei', '$2y$10$.xCyk7n7sJNg0e8DHjsC4.fW6s09k9DSfVG.OMD.bD.Xrz/3e5DPi', 'Andrei@gmail.com', 'user', '2024-06-03 23:20:32'),
(22, 'Ancestral', 'Dragon', 'Ancestral', '$2y$10$6bkjymP186OGF7Y6.PQd9.ifeumuVIDIUIr6O6Gc9NBi.SRq/NC5u', 'Ancestral@gmail.com', 'user', '2024-06-05 07:57:45'),
(23, 'Mark', 'antang', 'mark', '$2y$10$dmCiXOZIuCn3MDYJRg7UxOPpfAAkPeXHcfndSpVsJXSKxfwe6h/D.', 'mark@gmail.com', 'user', '2024-06-05 08:12:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `flavors`
--
ALTER TABLE `flavors`
  ADD PRIMARY KEY (`Flavor_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flavors`
--
ALTER TABLE `flavors`
  MODIFY `Flavor_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
