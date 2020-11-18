-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2020 at 12:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Productlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `weight` varchar(16) DEFAULT NULL,
  `TypeID` int(6) DEFAULT NULL,
  `SkuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`weight`, `TypeID`, `SkuID`) VALUES
(' 45gm', 2, 33);

-- --------------------------------------------------------

--
-- Table structure for table `Disk`
--

CREATE TABLE `Disk` (
  `size` varchar(16) DEFAULT NULL,
  `TypeID` int(6) DEFAULT NULL,
  `SkuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Disk`
--

INSERT INTO `Disk` (`size`, `TypeID`, `SkuID`) VALUES
(' 2GB', 1, 76764);

-- --------------------------------------------------------

--
-- Table structure for table `Furniture`
--

CREATE TABLE `Furniture` (
  `height` varchar(26) DEFAULT NULL,
  `width` varchar(26) DEFAULT NULL,
  `Length` varchar(26) DEFAULT NULL,
  `TypeID` int(6) DEFAULT NULL,
  `SkuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `death` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `SkuID` int(11) NOT NULL,
  `Name` varchar(110) NOT NULL,
  `Price` varchar(110) NOT NULL,
  `TypeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`SkuID`, `Name`, `Price`, `TypeID`) VALUES
(33, ' table', ' 13$', 2),
(76764, ' table', ' ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ProductType`
--

CREATE TABLE `ProductType` (
  `ProdType` varchar(10) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ProductType`
--

INSERT INTO `ProductType` (`ProdType`, `ID`) VALUES
('Disk', 1),
('Books', 2),
('furniture', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`SkuID`),
  ADD KEY `TypeID` (`TypeID`);

--
-- Indexes for table `Disk`
--
ALTER TABLE `Disk`
  ADD PRIMARY KEY (`SkuID`),
  ADD KEY `TypeID` (`TypeID`);

--
-- Indexes for table `Furniture`
--
ALTER TABLE `Furniture`
  ADD PRIMARY KEY (`SkuID`),
  ADD KEY `TypeID` (`TypeID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`SkuID`);

--
-- Indexes for table `ProductType`
--
ALTER TABLE `ProductType`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Books`
--
ALTER TABLE `Books`
  ADD CONSTRAINT `Books_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `ProductType` (`ID`),
  ADD CONSTRAINT `Books_ibfk_2` FOREIGN KEY (`SkuID`) REFERENCES `Products` (`SkuID`);

--
-- Constraints for table `Disk`
--
ALTER TABLE `Disk`
  ADD CONSTRAINT `Disk_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `ProductType` (`ID`),
  ADD CONSTRAINT `Disk_ibfk_2` FOREIGN KEY (`SkuID`) REFERENCES `Products` (`SkuID`);

--
-- Constraints for table `Furniture`
--
ALTER TABLE `Furniture`
  ADD CONSTRAINT `Furniture_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `ProductType` (`ID`),
  ADD CONSTRAINT `Furniture_ibfk_2` FOREIGN KEY (`SkuID`) REFERENCES `Products` (`SkuID`);

--
-- Constraints for table `ProductType`
--
ALTER TABLE `ProductType`
  ADD CONSTRAINT `ProductType_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `products` (`TypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
