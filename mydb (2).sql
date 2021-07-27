-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 11:25 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` bigint(20) unsigned NOT NULL,
  `login_admin` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `pass_admin` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `login_admin`, `pass_admin`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` bigint(20) unsigned NOT NULL,
  `userid_cart` int(5) NOT NULL,
  `prod_cart` int(5) NOT NULL,
  `qt_cart` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `userid_cart`, `prod_cart`, `qt_cart`) VALUES
(17, 2, 4, 1),
(19, 1, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_cat` bigint(20) unsigned NOT NULL,
  `name_cat` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cat`, `name_cat`) VALUES
(1, 'Jackets'),
(2, 'Shirts'),
(3, 'Tops'),
(4, 'Sweatshirts'),
(5, 'Pants'),
(6, 'T-Shirts'),
(7, 'Hats'),
(8, 'Bags'),
(9, 'Accessories'),
(10, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `item_ordered`
--

CREATE TABLE IF NOT EXISTS `item_ordered` (
  `ord_itmord` int(11) NOT NULL,
  `user_itmord` int(11) NOT NULL,
  `prod_itmord` int(11) NOT NULL,
  `qt_itmord` int(3) NOT NULL,
  `prodprice_itmord` float NOT NULL,
  `discount_itmord` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `item_ordered`
--

INSERT INTO `item_ordered` (`ord_itmord`, `user_itmord`, `prod_itmord`, `qt_itmord`, `prodprice_itmord`, `discount_itmord`) VALUES
(1, 1, 5, 2, 69.99, 0),
(1, 1, 4, 1, 19.99, 0),
(2, 1, 4, 1, 19.99, 0),
(3, 1, 3, 2, 29.99, 0),
(4, 1, 4, 1, 19.99, 0),
(5, 1, 4, 1, 19.99, 0),
(6, 1, 4, 1, 19.99, 0),
(7, 1, 2, 1, 29.99, 0),
(8, 1, 2, 6, 29.99, 0),
(8, 1, 3, 1, 29.99, 0),
(9, 1, 4, 1, 19.99, 0),
(9, 1, 2, 19, 29.99, 0),
(10, 1, 2, 80, 29.99, 0),
(11, 2, 3, 3, 29.99, 0),
(11, 2, 7, 1, 259.99, 0),
(12, 3, 3, 5, 29.99, 0),
(12, 3, 5, 1, 69.99, 0),
(13, 4, 4, 1, 19.99, 0),
(13, 4, 10, 1, 19.99, 0),
(13, 4, 3, 1, 29.99, 0),
(13, 4, 5, 1, 69.99, 0),
(13, 4, 7, 1, 259.99, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_ord` bigint(20) unsigned NOT NULL,
  `user_ord` int(20) NOT NULL,
  `date_ord` date NOT NULL,
  `prodcost_ord` float NOT NULL,
  `shipcost_ord` float NOT NULL,
  `totcost_ord` float NOT NULL,
  `ship_ord` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_ord`, `user_ord`, `date_ord`, `prodcost_ord`, `shipcost_ord`, `totcost_ord`, `ship_ord`) VALUES
(1, 1, '2019-04-05', 159.97, 10, 169.97, 1),
(2, 1, '2019-04-05', 19.99, 10, 29.99, 2),
(3, 1, '2019-04-05', 59.98, 10, 69.98, 1),
(4, 1, '2019-04-05', 19.99, 10, 29.99, 0),
(5, 1, '2019-04-05', 19.99, 10, 29.99, 0),
(6, 1, '2019-04-05', 19.99, 10, 29.99, 1),
(7, 1, '2019-04-05', 29.99, 10, 39.99, 1),
(8, 1, '2019-04-05', 209.93, 10, 219.93, 1),
(9, 1, '2019-04-08', 589.8, 10, 599.8, 1),
(10, 1, '2019-04-08', 2399.2, 10, 2409.2, 1),
(11, 2, '2019-04-08', 349.96, 10, 359.96, 4),
(12, 3, '2019-04-08', 219.94, 10, 229.94, 5),
(13, 4, '2019-04-09', 399.95, 10, 409.95, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_prod` bigint(20) unsigned NOT NULL,
  `name_prod` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `price_prod` float NOT NULL,
  `cat_prod` int(2) NOT NULL,
  `desc_prod` text COLLATE utf8_polish_ci NOT NULL,
  `color_prod` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `size_prod` int(1) NOT NULL,
  `stock_prod` int(9) NOT NULL,
  `img_prod` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `home_prod` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_prod`, `name_prod`, `price_prod`, `cat_prod`, `desc_prod`, `color_prod`, `size_prod`, `stock_prod`, `img_prod`, `home_prod`) VALUES
(2, 'Hoodie', 29.99, 4, 'Black hoodie wiht front pocket', 'Black', 3, 0, 'Penguins.jpg', 1),
(3, 'Hoodie', 29.99, 4, 'Black hoodie wiht front pocket', 'Black', 3, 90, 'Penguins.jpg', 1),
(4, 'PHP', 19.99, 9, 'Programing Language', 'Purple', 1, 23, 'PHP.jpg', 1),
(5, 'Medusa', 69.99, 6, 'Jellyfish', 'Transparen', 2, 9, 'Jellyfish.jpg', 1),
(6, 'Medusa', 69.99, 6, 'Jellyfish', 'Transparen', 2, 11, 'Jellyfish.jpg', 0),
(7, 'Koala', 259.99, 8, 'good boi', 'Grey', 0, 97, 'Koala.jpg', 1),
(8, 'Koala', 259.99, 8, 'Very good bear', 'Grey', 0, 99, 'Koala.jpg', 1),
(9, 'Faro', 1999.99, 2, 'example opis', 'Red', 2, 0, 'Lighthouse.jpg', 0),
(10, 'Jeans', 19.99, 5, 'Black Jeans', 'Black', 3, 19, 'Tulips.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `id_ship` bigint(20) unsigned NOT NULL,
  `user_ship` int(11) NOT NULL,
  `addressname_ship` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `name_ship` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `tel_ship` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `address1_ship` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `address2_ship` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `zip_ship` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `city_ship` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `country_ship` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `fav_ship` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id_ship`, `user_ship`, `addressname_ship`, `name_ship`, `tel_ship`, `address1_ship`, `address2_ship`, `zip_ship`, `city_ship`, `country_ship`, `fav_ship`) VALUES
(1, 1, 'afasfafas', 'afasdf', 'asdfasf', 'asdasd', '', 'afsas', 'fasf', 'fas', 0),
(2, 1, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 0),
(3, 1, 'test1', 'dfsas', 'dfasg', 'glglgkl', 'jlglkgkl', 'gkgkgk', 'gkgklgkl', 'gklglk', 1),
(4, 2, 'simona d''ambrosio', 'c/o sistema turismo', '054122248', 'via soardi 18', '', '47921', 'rimini', 'italy', 1),
(5, 3, 'dupaadres', 'dupaadres', 'dupaadres', 'dupaadres', '', 'dupaad', 'dupaadres', 'dupaadres', 0),
(6, 4, 'asdasd', 'asdasd', 'bjbj', 'bvj', 'jgh', 'vvj', 'vjvj', 'vjjv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` bigint(20) unsigned NOT NULL,
  `email_user` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `pass_user` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `first_user` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `last_user` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email_user`, `pass_user`, `first_user`, `last_user`) VALUES
(1, 'krzysztof@kozak.com', '$2y$10$4l6AIr4RRyoHDqHfGkL1uOccvD1WEfWSrBbKXC4Mi.z9b/RKK7CDW', 'Krzysztof', 'Kozlik'),
(2, 'tubba10@gmail.com', '$2y$10$EEtdUpPTPpxOopWnI9hQJOMXNCVh4j3m707ZJ.fkrKNoGTzcVxp8W', 'Simona', 'd''ambrosio'),
(3, 'liszka.jakub00@gmail.com', '$2y$10$5br/WT/gjBBwzKvT9IoWxOzaYq00kXix7FLuxH2qOdo4h1Na19AQ.', 'Jakub', 'Liszka'),
(4, 'janusz_nosacz@poldarmo.free', '$2y$10$DPbDjfb9a9KXLuQvd1UvZ.C7xEvtYg7UE6f6EK.YEt5WQPfLgm8Aa', 'rafcio', 'rafcio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD UNIQUE KEY `id_cart` (`id_cart`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`),
  ADD UNIQUE KEY `id_cat` (`id_cat`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_ord`),
  ADD UNIQUE KEY `id_ord` (`id_ord`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_prod`),
  ADD UNIQUE KEY `id_prod` (`id_prod`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD UNIQUE KEY `id_ship` (`id_ship`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_ord` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_prod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id_ship` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
