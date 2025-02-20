-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 06:16 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UserType` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`) VALUES
(2, 'Admin', 'admin', 1234596321, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-04-19 18:30:00', 1),
(3, 'Anuj kumar', 'akr305', 1234567891, 'ak@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-06-18 12:52:23', 0),
(7, 'Rahul Pandey', 'admin1', 7896541236, 'rahul@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-11-09 13:04:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblapplication`
--

CREATE TABLE `tblapplication` (
  `ID` int(5) NOT NULL,
  `UserID` int(5) DEFAULT NULL,
  `ColdStorageID` int(5) DEFAULT NULL,
  `ApplicationNumber` varchar(200) DEFAULT NULL,
  `Type` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblapplication`
--

INSERT INTO `tblapplication` (`ID`, `UserID`, `ColdStorageID`, `ApplicationNumber`, `Type`, `FromDate`, `ToDate`, `ApplyDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, 2, 2, '682238648', 'Grains', '2021-11-21', '2021-11-28', '2021-11-16 04:54:46', '', 'Accepted', '2021-11-17 06:51:47'),
(2, 2, 4, '122238655', 'Vegetables', '2021-11-19', '2021-11-30', '2021-11-16 04:59:58', NULL, NULL, NULL),
(3, 1, 3, '682238655', 'Pulses', '2021-12-05', '2021-12-19', '2021-11-16 05:07:19', '', 'Accepted', '2021-11-17 07:37:39'),
(4, 1, 2, '616514152', 'Fruits', '2021-11-17', '2021-12-12', '2021-11-16 05:17:33', '', 'Rejected', '2021-11-17 06:53:49'),
(5, 3, 2, '647122754', 'Fruits', '2021-12-01', '2022-01-08', '2021-11-29 16:08:12', '', 'Accepted', '2021-11-29 16:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'Contact Us', '#890 CFG Apartment, Mayur Vihar, Delhi-India.', NULL, NULL, '2021-11-29 16:14:40'),
(2, 'contactus', 'Contact Us', '#890 CFG Apartment, Mayur Vihar, Delhi-India.', 'abc@gmail.com', 1234567890, '2021-11-29 16:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblstorage`
--

CREATE TABLE `tblstorage` (
  `ID` int(5) NOT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `Location` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Cost` decimal(10,0) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstorage`
--

INSERT INTO `tblstorage` (`ID`, `Title`, `Location`, `Image`, `Cost`, `CreationDate`) VALUES
(2, 'Gurgaon Cold Storage', 'Gurgaon', '3e325007bcc574c0fa7d52d705354a581637037583.jpg', '120', '2021-11-16 04:39:43'),
(3, 'Faridabad Cold Storage', 'Faridabad', '2a639bab19da3c50b031b2e714db47591637037635.jpg', '152', '2021-11-16 04:40:35'),
(4, 'Delhi Vent', 'New Delhi', 'c007760fd281ce7b7ff15436b4852dbb1637037696.jpg', '163', '2021-11-16 04:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(5) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Palkinson', 'Desouza', 7897897897, 'john@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-11-12 12:20:03'),
(2, 'Kouusalo', 'Ronaldo', 7879874657, 'kou@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-11-12 12:20:55'),
(3, 'Anujk', 'Kumar', 9999999999, 'ak@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-11-29 16:06:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblapplication`
--
ALTER TABLE `tblapplication`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstorage`
--
ALTER TABLE `tblstorage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblapplication`
--
ALTER TABLE `tblapplication`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstorage`
--
ALTER TABLE `tblstorage`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
