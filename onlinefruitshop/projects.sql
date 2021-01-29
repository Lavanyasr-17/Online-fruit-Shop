-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 07:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(40) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `pass`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerid` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `city` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `zip_code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `mail` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `city`, `zip_code`, `country`, `mail`, `phone`) VALUES
(1, 'a', 'a', 'a', 'a', 'a', NULL, NULL),
(2, 'b', 'b', 'b', 'b', 'b', NULL, NULL),
(3, 'test', '123 test', '12121', 'test', 'test', NULL, NULL),
(4, 'Lavanya S R', 'home', 'mangaluru', '575006', 'India', NULL, NULL),
(5, 'lala', 'a', 'o', '123', 'pp', NULL, NULL),
(6, 'pp', 'u', 'j', '52', 'p', NULL, NULL),
(7, 'g', 'hh', 'k', '56', 'lo', NULL, NULL),
(8, 'a', 'h', 'o', '12', 'p', NULL, NULL),
(0, 'akka', 'pp', 'h', '78', 'p', NULL, NULL),
(0, 'kk', 'kk', 'gh', '12', 'j', '', ''),
(0, 'pp', 'ui', 'sds', '232', 'gdf', 'q', '213'),
(0, 'q', 'bh', 'er', '85', 'po', 'p0', '45678'),
(0, 'qq', 'fsffs', 'ooo', '4545', 'bjn', 'sq2', '097'),
(0, 'ww', 'jkj', 'drd', '78', 'pl', 'ry', '89'),
(0, 'we', 'jhjkhkjh', 'hjhjh', '5656', 'bjh', 'lkjj', '9606619577'),
(0, 'pp', 'ihh', 'ok', '44', 'hh', 'qq', '15555'),
(0, 'ss', 'ds', 'dd', '213', 'dd', 'edwd', '2134'),
(0, 'as', 'sdfs', 'dsd', '45645', 'dsd', 'dd', '213'),
(0, 'jj', 'gh', 'yuu', '44', 'hhh', 'w3w3w', '5454'),
(0, 'uiyiy', 'fsfd', 'dsd', '64', 'wqw', 'wq', '234'),
(0, 'p', 'bjbh', 'nnb', '565', 'bhbh', 'hjjb', '2655'),
(0, 'aa', 'fgf', '6565', '56656', 'fgfgf', 'ghgf', '4554'),
(0, 'qq', 'nnn', 'kk', '54', 'jkj', 'sjqh', '1234'),
(0, 'jgj', 'jbjhb', 'bhbh', '46', 'nl', 'r@gmail', '12348'),
(0, 'jgj', 'jbjhb', 'bhbh', '462315', 'Netherlands', 'r@gmail', '1234869584');

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `fid` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `fname` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `prod` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `_image` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `_descr` text COLLATE latin1_general_ci DEFAULT NULL,
  `_price` decimal(6,2) DEFAULT NULL,
  `publisherid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`fid`, `fname`, `prod`, `_image`, `_descr`, `_price`, `publisherid`) VALUES
('10', 'Pomegranate', 'India', 'pomogranate.jpg', 'The pomegranate is a fruit-bearing deciduous shrub in the family Lythraceae, subfamily Punicoideae, that grows between 5 and 10 m tall. The pomegranate originated in the region extending from Iran to northern India, and has been cultivated since ancient times throughout the Mediterranean region. ', '12.00', 4),
('11', 'Green Grapes', 'India', 'greengrapes.jpg', ' The green grape is a sweet fruit that grows in bunches. The fruit makes a popular snack, both because of its sweet flavor and because you can one whole without making a mess. But green grapes are more than just a convenient snack. They\'re also packed with vitamins and minerals that help keep your body strong.\r\n ', '12.00', 4),
('2', 'cherry', 'australia', 'cherry.jpg', 'A cherry is the fruit of many plants of the genus Prunus, and is a fleshy drupe (stone fruit). Commercial cherries are obtained from cultivars of several species, such as the sweet Prunus avium and the sour Prunus cerasus.', '16.75', 2),
('3', 'Lychee', 'China', 'lichi.jpg', 'Lychee is the sole member of the genus Litchi in the soapberry family, Sapindaceae. It is a tropical tree native to the Guangdong and Fujian provinces of southeastern China, where cultivation is documented from the 11th century.', '19.50', 6),
('4', 'Mango', 'India', 'mango.jpg', 'A mango is a stone fruit produced from numerous species of tropical trees belonging to the flowering plant genus Mangifera, cultivated mostly for their edible fruit. Most of these species are found in nature as wild mangoes. The genus belongs to the cashew family Anacardiaceae.', '12.00', 4),
('5', 'Banana', 'India', 'banana.jpg', 'A banana is an elongated, edible fruit – botanically a berry – produced by several kinds of large herbaceous flowering plants in the genus Musa. In some countries, bananas used for cooking may be called \"plantains\", distinguishing them from dessert bananas.', '12.50', 4),
('6', 'apricot', 'new zealand', 'apricot.jpg', 'Apricots are a great source of many antioxidants, including beta carotene and vitamins A, C, and E. What is more, they are high in a group of polyphenol antioxidants called flavonoid.', '24.00', 1),
('7', 'Orange', 'Australia', 'orange.jpg', 'The orange is the fruit of various citrus species in the family Rutaceae; it primarily refers to Citrus × sinensis, which is also called sweet orange, to distinguish it from the related Citrus × aurantium, referred to as bitter orange.', '19.50', 2),
('8', 'Straw Berry', 'France', 'strawberry.jfif', 'The garden strawberry is a widely grown hybrid species of the genus Fragaria, collectively known as the strawberries, which are cultivated worldwide for their fruit. The fruit is widely appreciated for its characteristic aroma, bright red color, juicy texture, and sweetness.', '12.00', 5),
('9', 'Pears', 'Germany', 'pear.jpg', 'Pears are fruits produced and consumed around the world, growing on a tree and harvested in late Summer into October. The pear tree and shrub are a species of genus Pyrus, in the family Rosaceae, bearing the pomaceous fruit of the same name.', '18.00', 3),
('12', 'Blackgrapes', 'britain', 'black.jpg', 'The health benefits of black grapes have been studied extensively. The chemicals they contain can give you healthier hair and skin, improve your heart health, and even protect your cells against cancer. Some varieties of black grapes are much higher in antioxidants than green or red grapes', '16.75', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ship_name` char(60) COLLATE latin1_general_ci NOT NULL,
  `ship_address` char(80) COLLATE latin1_general_ci NOT NULL,
  `ship_city` char(30) COLLATE latin1_general_ci NOT NULL,
  `ship_zip_code` char(10) COLLATE latin1_general_ci NOT NULL,
  `ship_country` char(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `date`, `ship_name`, `ship_address`, `ship_city`, `ship_zip_code`, `ship_country`) VALUES
(1, 1, '60.00', '2015-12-03 13:30:12', 'a', 'a', 'a', 'a', 'a'),
(2, 2, '60.00', '2015-12-03 13:31:12', 'b', 'b', 'b', 'b', 'b'),
(3, 3, '20.00', '2015-12-03 19:34:21', 'test', '123 test', '12121', 'test', 'test'),
(4, 1, '20.00', '2015-12-04 10:19:14', 'a', 'a', 'a', 'a', 'a'),
(5, 4, '365.00', '2020-12-19 09:56:42', 'Lavanya S R', 'home', 'mangaluru', '575006', 'India'),
(6, 5, '200.00', '2020-12-19 10:16:42', 'lala', 'a', 'o', '123', 'pp'),
(7, 6, '320.00', '2020-12-19 10:19:07', 'pp', 'u', 'j', '52', 'p'),
(8, 7, '120.00', '2020-12-19 10:34:09', 'g', 'hh', 'k', '56', 'lo'),
(9, 8, '200.00', '2020-12-20 00:47:03', 'a', 'h', 'o', '12', 'p'),
(0, 0, '175.00', '2020-12-21 05:00:24', 'akka', 'pp', 'h', '78', 'p'),
(0, 0, '56.50', '2020-12-21 06:17:20', 'kk', 'kk', 'gh', '12', 'j'),
(0, 0, '12.00', '2020-12-21 06:24:34', 'pp', 'ui', 'sds', '232', 'gdf'),
(0, 0, '12.00', '2020-12-21 06:32:48', 'q', 'bh', 'er', '85', 'po'),
(0, 0, '19.50', '2020-12-21 06:34:01', 'qq', 'fsffs', 'ooo', '4545', 'bjn'),
(0, 0, '19.50', '2020-12-21 06:39:59', 'ww', 'jkj', 'drd', '78', 'pl'),
(0, 0, '18.50', '2020-12-21 06:41:31', 'we', 'jhjkhkjh', 'hjhjh', '5656', 'bjh'),
(0, 0, '150.00', '2020-12-24 04:42:05', 'pp', 'ihh', 'ok', '44', 'hh'),
(0, 0, '12.00', '2020-12-24 10:24:10', 'ss', 'ds', 'dd', '213', 'dd'),
(0, 0, '12.00', '2020-12-25 01:43:40', 'as', 'sdfs', 'dsd', '45645', 'dsd'),
(0, 0, '56.50', '2020-12-25 01:52:39', 'jj', 'gh', 'yuu', '44', 'hhh'),
(0, 0, '96.00', '2021-01-04 06:22:35', 'uiyiy', 'fsfd', 'dsd', '64', 'wqw'),
(0, 0, '12.00', '2021-01-08 19:28:08', 'p', 'bjbh', 'nnb', '565', 'bhbh'),
(0, 0, '39.00', '2021-01-09 00:37:55', 'aa', 'fgf', '6565', '56656', 'fgfgf'),
(0, 0, '33.50', '2021-01-09 01:24:35', 'qq', 'nnn', 'kk', '54', 'jkj'),
(0, 0, '19.50', '2021-01-18 08:04:09', 'jgj', 'jbjhb', 'bhbh', '46', 'nl'),
(0, 0, '12.50', '2021-01-27 02:19:33', 'jgj', 'jbjhb', 'bhbh', '462315', 'Netherlands');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `book_isbn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `item_price` decimal(6,2) NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderid`, `book_isbn`, `item_price`, `quantity`) VALUES
(1, '978-1-118-94924-5', '20.00', 1),
(1, '978-1-44937-019-0', '20.00', 1),
(1, '978-1-49192-706-9', '20.00', 1),
(2, '978-1-118-94924-5', '20.00', 1),
(2, '978-1-44937-019-0', '20.00', 1),
(2, '978-1-49192-706-9', '20.00', 1),
(3, '978-0-321-94786-4', '20.00', 1),
(1, '978-1-49192-706-9', '20.00', 1),
(5, '10', '175.00', 1),
(5, '7', '190.00', 1),
(6, '1', '200.00', 1),
(7, '11', '160.00', 2),
(8, '4', '120.00', 1),
(9, '1', '200.00', 1),
(0, '10', '175.00', 1),
(0, '7', '19.50', 1),
(0, '9', '18.50', 2),
(0, '8', '12.00', 1),
(0, '8', '12.00', 1),
(0, '7', '19.50', 1),
(0, '7', '19.50', 1),
(0, '9', '18.50', 1),
(0, '2', '150.00', 1),
(0, '11', '12.00', 1),
(0, '10', '12.00', 1),
(0, '11', '12.00', 1),
(0, '3', '19.50', 1),
(0, '5', '12.50', 2),
(0, '11', '12.00', 7),
(0, '10', '12.00', 1),
(0, '11', '12.00', 1),
(0, '3', '19.50', 2),
(0, '2', '16.75', 2),
(0, '7', '19.50', 1),
(0, '5', '12.50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisherid` int(10) UNSIGNED NOT NULL,
  `publisher_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `picture` varchar(40) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisherid`, `publisher_name`, `picture`) VALUES
(1, 'New Zealand', 'newzealan.png'),
(2, 'Australia', 'australia.jpg'),
(3, 'Germany', 'german.jpg'),
(4, 'India', 'flag-india.jpg'),
(5, 'France', 'france.jpg'),
(6, 'China', 'chi.jpg'),
(7, 'britain', 'brit.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
