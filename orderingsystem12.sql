-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2019 at 02:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderingsystem12`
--

-- --------------------------------------------------------

--
-- Table structure for table `myitems`
--
CREATE database if not exists orderingsystem12;
use orderingsystem12;

CREATE TABLE `myitems` (
  `productId` int(11) NOT NULL,
  `productName` varchar(128) NOT NULL,
  `productType` varchar(32) NOT NULL,
  `productPrice` double NOT NULL,
  `itemDescription` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactiontable`
--

CREATE TABLE `transactiontable` (
  `transactionId` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `fullname` varchar(192) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactnumber` int(11) NOT NULL,
  `modeofpayment` varchar(32) NOT NULL,
  `productName` varchar(128) NOT NULL,
  `productPrice` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `orderDate` varchar(32) NOT NULL,
  `paidStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactiontable`
--

INSERT INTO `transactiontable` (`transactionId`, `username`, `fullname`, `address`, `contactnumber`, `modeofpayment`, `productName`, `productPrice`, `quantity`, `total`, `orderDate`, `paidStatus`) VALUES
(4000, 'bgemry', 'gemry bulante', 'asdas', 2147483647, 'Cash On Delivery', 'Dhs Long 5', 3500, 2, 7000, '10/16/18', 1),
(4000, 'bgemry', 'gemry bulante', 'asdas', 2147483647, 'Cash On Delivery', 'DHS NEO Hurricane 3', 960, 2, 1920, '10/16/18', 1),
(4002, 'bgemry', 'asdasf', 'asdf', 123123, 'Bank Deposit', 'DHS NEO Hurricane 3', 960, 4, 3840, '10/16/18', 0),
(4002, 'bgemry', 'asdasf', 'asdf', 123123, 'Bank Deposit', 'Stiga Emerald Vps 5', 3200, 2, 6400, '10/16/18', 0),
(4002, 'bgemry', 'asdasf', 'asdf', 123123, 'Bank Deposit', 'Stiga Offensive Wood NCT', 2600, 2, 5200, '10/16/18', 0),
(4005, ' ', 'Gemry', 'caloocan city', 22332232, 'Bank Deposit', 'Stiga Carbonado 190', 6900, 1, 6900, '10/17/19', 0),
(4006, 'cherry02', 'cerry', 'sdfsd', 123123333, 'Bank Deposit', 'Galaxy T-11 ', 3400, 1, 3400, '10/18/19', 0),
(4006, 'cherry02', 'cerry', 'sdfsd', 123123333, 'Bank Deposit', 'Stiga Infinity VPS V Diamond Touch', 3100, 1, 3100, '10/18/19', 0),
(4008, 'cherry02', 'cherry', 'jkdaj', 23920902, 'Bank Deposit', 'Stiga Carbonado 145', 6000, 1, 6000, '10/18/19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `userType` varchar(12) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`userType`, `username`, `password`, `firstname`, `lastname`) VALUES
('user', ' ', ' ', ' ', ' '),
('user', 'bgemry', '123123', 'gemry', 'bulante'),
('admin', 'bgemry1412', '123456', 'gemry', 'bulante'),
('user', 'cherry02', '123123', 'cherry', 'juan'),
('user', 'cherry123', '12123', 'cherry', 'cruz'),
('user', 'jojo', '123123', 'jojo', 'jojo'),
('admin', 'myadmin', 'myadmin', 'myadmin', 'myadmin'),
('user', 'mytest', '123123', 'gemry', 'kjdfajkfs'),
('user', 'usertest', 'usertest', 'usertest', 'usertest'),
('user', 'usertest2', '123', 'gemnry', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `userorderlist`
--

CREATE TABLE `userorderlist` (
  `orderid` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userorderlist`
--

INSERT INTO `userorderlist` (`orderid`, `username`, `productId`, `productName`, `productImage`, `productPrice`, `quantity`, `total`) VALUES
(6, 'usertest2', 2, 'Stiga Emerald Vps 5', 'http://www.cespedtopgarden.es/image/cache/data/category_17/stiga-emerald-vps-v-master-grip-table-tennis-blade-wood-one-size-b01llgbw9o-4797-400x400_0.jpg', 3200, 1, 3200),
(8, ' ', 4, 'Stiga Carbonado 190', 'https://www.picclickimg.com/d/l400/pict/253516481260_/Stiga-Carbonado-190-Table-Tennis-Blade-Free-Dhl.jpg', 6900, 1, 6900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myitems`
--
ALTER TABLE `myitems`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `userorderlist`
--
ALTER TABLE `userorderlist`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `productId` (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myitems`
--
ALTER TABLE `myitems`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userorderlist`
--
ALTER TABLE `userorderlist`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
