-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2016 at 11:44 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_97`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` tinyint(4) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Electronics'),
(1, 'Frozen'),
(3, 'Fruits'),
(4, 'Jewellery'),
(6, 'pure dimond');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` smallint(6) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `countryid` smallint(6) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `countryid` (`countryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `countryid`) VALUES
(1, 'Satkhira', 1),
(2, 'Dhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL auto_increment,
  `productid` int(11) NOT NULL,
  `customerid` smallint(6) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `productid` (`productid`),
  KEY `customerid` (`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comment`
--


-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` smallint(6) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` smallint(6) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `cityid` smallint(6) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `type` varchar(1) NOT NULL,
  `status` varchar(16) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `cityid` (`cityid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `cityid`, `contact`, `gender`, `type`, `status`) VALUES
(1, 'Sk Hasan', 'hasancse016@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '01674086310', 'm', 'c', ''),
(2, 'Frozen', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '01420420420', 'm', 'a', '');

-- --------------------------------------------------------

--
-- Table structure for table `newproduct`
--

CREATE TABLE `newproduct` (
  `id` int(11) NOT NULL auto_increment,
  `productid` int(11) NOT NULL,
  `stock` varchar(10) NOT NULL,
  `date` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `productid` (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `newproduct`
--

INSERT INTO `newproduct` (`id`, `productid`, `stock`, `date`) VALUES
(1, 9, '13', '2016-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(30) NOT NULL,
  `price` float(8,2) NOT NULL,
  `size` varchar(30) NOT NULL,
  `subcategoryid` smallint(6) NOT NULL,
  `vat` float(5,2) NOT NULL,
  `discount` float(4,2) NOT NULL,
  `stock` smallint(6) NOT NULL,
  `unitid` tinyint(4) NOT NULL,
  `picture` varchar(4) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `subcategoryid` (`subcategoryid`),
  KEY `unitid` (`unitid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `size`, `subcategoryid`, `vat`, `discount`, `stock`, `unitid`, `picture`) VALUES
(1, 'Rajshahi Mango', 100.00, 'Large, Medium, Small', 2, 55.00, 10.00, 90, 2, 'jpg'),
(2, 'laptop', 200.00, '100', 10, 1.00, 2.00, 50, 1, 'png'),
(4, 'Acer Aspire Intel Dual Core HD', 100.00, 'Large, Medium, Small', 4, 5.00, 10.00, 90, 4, 'jpg'),
(8, 'Acer-laptop', 35000.00, 'medium', 10, 5.00, 20.00, 20, 1, 'png'),
(9, 'iphone6', 65000.00, 'small', 11, 2.00, 25.00, 200, 1, 'jpg'),
(10, 'monitor', 12000.00, 'large', 13, 20.00, 5.00, 10, 1, 'jpg'),
(11, 'refregeretor', 40000.00, 'medium', 14, 5.00, 50.00, 100, 1, 'jpg'),
(12, 'samsung mobile', 20000.00, 'large', 12, 5.00, 2.00, 5, 1, 'jpg'),
(13, 'toshiba', 50000.00, 'large', 4, 5.00, 45.00, 1, 1, 'jpg'),
(14, 'gold-fish', 500.00, 'small', 3, 20.00, 5.00, 2000, 3, 'jpg'),
(15, 'blue-fish', 100.00, 'small', 16, 5.00, 2.00, 20, 4, 'png'),
(16, 'yellow-fish', 400.00, 'small', 15, 5.00, 5.00, 20, 3, 'jpg'),
(17, 'apple', 100.00, 'medium', 17, 2.00, 5.00, 200, 2, 'jpg'),
(18, 'Mango', 120.00, 'small', 2, 2.00, 5.00, 200, 2, 'jpg'),
(19, 'orange', 150.00, 'large', 20, 5.00, 5.00, 100, 2, 'jpg'),
(20, 'pepe', 180.00, 'large', 19, 2.00, 50.00, 100, 1, 'jpg'),
(21, 'stewberry', 120.00, 'small', 18, 5.00, 2.00, 50, 2, 'jpg'),
(24, 'gold ring', 4000.00, 'small,large', 22, 2.00, 5.00, 100, 1, 'jpg'),
(25, 'locket', 4000.00, 'large', 25, 5.00, 50.00, 20, 1, 'jpg'),
(26, 'nupur', 500.00, 'small,large,medium', 24, 10.00, 5.00, 10, 1, 'jpg'),
(27, 'black diaamond', 100000.00, 'large', 26, 50.00, 2.00, 5, 1, 'jpg'),
(28, 'white diamond', 50000.00, 'small', 27, 9.00, 4.00, 20, 1, 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL auto_increment,
  `datetime` datetime NOT NULL,
  `customerid` smallint(6) NOT NULL,
  `shippingid` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `customerid` (`customerid`),
  KEY `shippingid` (`shippingid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `datetime`, `customerid`, `shippingid`) VALUES
(1, '2016-03-10 15:19:18', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `saledetails`
--

CREATE TABLE `saledetails` (
  `id` int(11) NOT NULL auto_increment,
  `productid` int(11) NOT NULL,
  `saleid` int(11) NOT NULL,
  `vat` float(4,2) NOT NULL,
  `discount` float(4,2) NOT NULL,
  `qty` smallint(6) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `productid` (`productid`),
  KEY `saleid` (`saleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `saledetails`
--

INSERT INTO `saledetails` (`id`, `productid`, `saleid`, `vat`, `discount`, `qty`) VALUES
(1, 9, 1, 6.00, 6.00, 14);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL auto_increment,
  `area` varchar(20) NOT NULL,
  `amount` float(8,2) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `area` (`area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `area`, `amount`) VALUES
(1, 'By Train', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` smallint(6) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `categoryid` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`,`categoryid`),
  KEY `categoryid` (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `categoryid`) VALUES
(10, 'Acer laptop', 2),
(17, 'Apple', 3),
(26, 'Black daimond', 6),
(16, 'Blue fish', 1),
(3, 'Gold fish', 1),
(22, 'gold ring', 4),
(23, 'Gold-har', 4),
(11, 'iphone6', 2),
(25, 'Locket', 4),
(2, 'Mango', 3),
(13, 'monitor', 2),
(24, 'nupur', 4),
(20, 'Orange', 3),
(19, 'Pepe', 3),
(14, 'refreigerator', 2),
(21, 'ring', 4),
(12, 'samsung mobile', 2),
(18, 'Stewberry', 3),
(4, 'Tosiba', 2),
(27, 'White-diamond', 6),
(15, 'Yellow fish', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` tinyint(4) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(3, 'GM'),
(2, 'KG'),
(4, 'Liter'),
(1, 'Piece');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `country` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`cityid`) REFERENCES `city` (`id`);

--
-- Constraints for table `newproduct`
--
ALTER TABLE `newproduct`
  ADD CONSTRAINT `newproduct_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`subcategoryid`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`unitid`) REFERENCES `unit` (`id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`shippingid`) REFERENCES `shipping` (`id`);

--
-- Constraints for table `saledetails`
--
ALTER TABLE `saledetails`
  ADD CONSTRAINT `saledetails_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `saledetails_ibfk_2` FOREIGN KEY (`saleid`) REFERENCES `sale` (`id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`);
