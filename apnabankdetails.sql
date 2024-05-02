-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 02, 2024 at 08:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apnabankdetails`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountdebitcreditdetails`
--

CREATE TABLE `accountdebitcreditdetails` (
  `accountNumber` bigint(15) NOT NULL,
  `accountBalance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `DebitAndCreditDetails` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '\'{"transactions": [{"type":"debit", "amount":0, "bankbalance":0, "date":"2023-08-17", "time":"10:30 AM", "method":"no", "Payment_To":"self" } ]}\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountdebitcreditdetails`
--

INSERT INTO `accountdebitcreditdetails` (`accountNumber`, `accountBalance`, `DebitAndCreditDetails`) VALUES
(8441605862, '1711.00', '{\"transactions\":[{\"type\":\"debit\",\"amount\":0,\"bankbalance\":0,\"date\":\"2023-08-17\",\"time\":\"10:30 AM\",\"method\":\"no\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"17\",\"bankbalance\":33,\"date\":\"2023-12-01\",\"time\":\"12:50:11\",\"method\":\"Account\",\"Payment_To\":\"64562115729\"},{\"type\":\"Debit\",\"amount\":\"33\",\"bankbalance\":66,\"date\":\"2023-12-01\",\"time\":\"12:51:14\",\"method\":\"Account\",\"Payment_To\":\"64562115729\"},{\"type\":\"Debit\",\"amount\":\"25000\",\"bankbalance\":25066,\"date\":\"2023-12-01\",\"time\":\"12:52:31\",\"method\":\"Check\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"2200\",\"bankbalance\":27266,\"date\":\"2023-12-01\",\"time\":\"12:52:57\",\"method\":\"Account\",\"Payment_To\":\"64562115729\"},{\"type\":\"Credit\",\"amount\":\"250\",\"bankbalance\":27016,\"date\":\"2023-12-01\",\"time\":\"12:55:07\",\"method\":\"Credit Card\",\"Payment_To\":\"Other Person\"},{\"type\":\"Debit\",\"amount\":\"305\",\"bankbalance\":26711,\"date\":\"2023-12-01\",\"time\":\"12:55:29\",\"method\":\"Debit Card\",\"Payment_To\":\"Other Person\"},{\"type\":\"Credit\",\"amount\":\"25000\",\"bankbalance\":1711,\"date\":\"2023-12-01\",\"time\":\"12:56:38\",\"method\":\"Account\",\"Payment_To\":\"64562115729\"}]}'),
(58581931923, '25000.00', '{\"transactions\":[{\"type\":\"Debit\",\"amount\":\"25000\",\"bankbalance\":25000,\"date\":\"2024-02-28\",\"time\":\"10:52:41\",\"method\":\"Cash\",\"Payment_To\":\"self\"}]}'),
(85689151267, '0.00', '\'{\"transactions\": [{\"type\":\"debit\", \"amount\":0, \"bankbalance\":0, \"date\":\"2023-08-17\", \"time\":\"10:30 AM\", \"method\":\"no\", \"Payment_To\":\"self\" } ]}\'');

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `EmpID` varchar(25) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminFatherName` char(15) NOT NULL,
  `adminMotherName` char(15) NOT NULL,
  `adminUsername` varchar(50) NOT NULL,
  `adminDOB` date NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminMobileNumber` bigint(10) NOT NULL,
  `adminGender` char(6) NOT NULL,
  `adminAddress` varchar(255) NOT NULL,
  `adminCity` char(20) NOT NULL,
  `adminState` char(20) NOT NULL,
  `adminPincode` mediumint(6) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  `adminAadharCardNumber` bigint(12) NOT NULL,
  `adminPenCardNumber` varchar(15) NOT NULL,
  `adminPhoto` varchar(255) NOT NULL,
  `adminAadharCardFront` varchar(255) NOT NULL,
  `adminAadharCardBack` varchar(255) NOT NULL,
  `adminPenCardFront` varchar(255) NOT NULL,
  `adminPenCardBack` varchar(255) NOT NULL,
  `DateToCreateAminAccount` datetime NOT NULL,
  `adminUpdateAccount` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`EmpID`, `adminName`, `adminFatherName`, `adminMotherName`, `adminUsername`, `adminDOB`, `adminEmail`, `adminMobileNumber`, `adminGender`, `adminAddress`, `adminCity`, `adminState`, `adminPincode`, `adminPassword`, `adminAadharCardNumber`, `adminPenCardNumber`, `adminPhoto`, `adminAadharCardFront`, `adminAadharCardBack`, `adminPenCardFront`, `adminPenCardBack`, `DateToCreateAminAccount`, `adminUpdateAccount`) VALUES
('543485', 'Ram  sharma', 'Tharachand shar', 'santi', 'sita12333', '2001-12-25', 'ram@gmail.com', 1234567892, 'Male', 'bhankrota', 'jaipur', 'Rajasthan', 205101, '123', 123455464633, '4p6huk423j', '543485_AdminPersonalPhoto.jpg', '543485_AdminAadharcardFront.jpg', '543485_AdminAadharcardBack.jpg', '543485_AdminPencardFront.png', '543485_AdminPencardBack.jpg', '2023-09-21 00:35:39', '2023-10-07 17:48:28'),
('458097', 'Mainsh  Sharma', 'father', 'santi', 'Rahul@02111', '2010-01-04', 'ram21101@gmail.com', 9235326000, 'Male', 'bhankrota jaipur', 'jaipur', 'Rajasthan', 302026, '123', 123997464654, 'dsf65bs56564', '458097_AdminPersonalPhoto.jpg', '458097_AdminAadharcardFront.png', '458097_AdminAadharcardBack.png', '458097_AdminPencardFront.jpg', '458097_AdminPencardBack.png', '2024-04-30 19:13:06', '2024-04-30 19:17:04'),
('498172', 'sita  Devi', 'father', 'mother', 'rahul2111', '1995-01-15', 'rahul123@email.com', 9602353233, 'Female', 'bhankrota jaipur', 'jaipur', 'Jharkhand', 302526, '345', 451455464654, 'sf6565f5s5', '498172_AdminPersonalPhoto.png', '498172_AdminAadharcardFront.jpg', '498172_AdminAadharcardBack.jpg', '498172_AdminPencardFront.jpg', '498172_AdminPencardBack.jpeg', '2023-09-18 02:24:13', '2023-09-21 23:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `bankcustmordetails`
--

CREATE TABLE `bankcustmordetails` (
  `firstname` tinytext NOT NULL,
  `middlename` tinytext DEFAULT NULL,
  `lastname` tinytext NOT NULL,
  `fathername` tinytext NOT NULL,
  `mothername` tinytext NOT NULL,
  `mobilenumber` bigint(10) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userpassword` varchar(20) NOT NULL,
  `temparyaddress` text DEFAULT NULL,
  `premananetaddress` text NOT NULL,
  `city` tinytext NOT NULL,
  `pincode` mediumint(6) NOT NULL,
  `statee` tinytext NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `country` tinytext NOT NULL,
  `caste` tinytext NOT NULL,
  `gender` char(6) NOT NULL,
  `aadharcardnumber` bigint(12) NOT NULL,
  `pencardnumber` varchar(10) NOT NULL,
  `UPI_Id` varchar(20) DEFAULT NULL,
  `accountNumber` bigint(15) NOT NULL,
  `personal_Image` varchar(255) NOT NULL,
  `class10Marksheet` varchar(255) NOT NULL,
  `birth_certificate` varchar(255) NOT NULL,
  `Aadharcard_Front` varchar(255) NOT NULL,
  `Aadharcard_Back` varchar(255) NOT NULL,
  `Pencard_Front` varchar(255) NOT NULL,
  `Pencard_Back` varchar(255) NOT NULL,
  `dateToCreateAccount` datetime NOT NULL,
  `updateAccount` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankcustmordetails`
--

INSERT INTO `bankcustmordetails` (`firstname`, `middlename`, `lastname`, `fathername`, `mothername`, `mobilenumber`, `emailid`, `username`, `userpassword`, `temparyaddress`, `premananetaddress`, `city`, `pincode`, `statee`, `DOB`, `country`, `caste`, `gender`, `aadharcardnumber`, `pencardnumber`, `UPI_Id`, `accountNumber`, `personal_Image`, `class10Marksheet`, `birth_certificate`, `Aadharcard_Front`, `Aadharcard_Back`, `Pencard_Front`, `Pencard_Back`, `dateToCreateAccount`, `updateAccount`) VALUES
('Laxman', '', 'dave', ' bhagaw dave', 'mother', 9602353212, 'laxman123@gmail.com', 'Laxman@123', 'Laxman@123', 'bhankrota jaipur', 'ajmer road jaipur', 'jaipur', 302026, 'Manipur', '2001-12-25', 'India', 'General', 'Male', 123255464654, '2l8u7asd45', NULL, 8441605862, '08441605862_PersonalPhoto.jpg', '08441605862_class10Marksheet.gif', '08441605862_birthCertificate.gif', '08441605862_AadharcardFront.jpg', '08441605862_AadharcardBack.gif', '08441605862_PencardFront.jpg', '08441605862_PencardBack.jpg', '2023-10-11 17:48:06', '2023-10-11 17:48:06'),
('Mainshaed', '', 'Sharma', ' father', 'mother', 9602383215, 'mainsh1223@email.com', 'As15@2111', '123', 'bhankrota jaipur', 'ajmer road jaipur', 'jaipur', 302026, 'Rajasthan', '2002-01-10', 'India', 'General', 'Male', 123456864654, 'dsf65fgg65', '', 58581931923, '58581931923_PersonalPhoto.png', '58581931923_class10Marksheet.gif', '58581931923_birthCertificate.gif', '58581931923_AadharcardFront.gif', '58581931923_AadharcardBack.jpg', '58581931923_PencardFront.jpeg', '58581931923_PencardBack.jpeg', '2024-02-28 10:37:25', '2024-02-28 10:48:14'),
('Rahul', '', 'Sharma', ' Babu lal sharma', 'mother', 9323602356, 'krishan12030@email.com', 'Rahul@021110', '123', 'bhankrota jaipur', 'ajmer road jaipur', 'jaipur', 302026, 'Rajasthan', '2002-01-25', 'India', 'General', 'Male', 465412345546, '2a58s45d6s', '', 85689151267, '85689151267_PersonalPhoto.gif', '85689151267_class10Marksheet.gif', '85689151267_birthCertificate.jpeg', '85689151267_AadharcardFront.png', '85689151267_AadharcardBack.png', '85689151267_PencardFront.png', '85689151267_PencardBack.jpg', '2024-05-02 23:13:19', '2024-05-02 23:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `page_counter`
--

CREATE TABLE `page_counter` (
  `count` mediumint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_counter`
--

INSERT INTO `page_counter` (`count`) VALUES
(367);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountdebitcreditdetails`
--
ALTER TABLE `accountdebitcreditdetails`
  ADD UNIQUE KEY `accountNumber` (`accountNumber`);

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD UNIQUE KEY `adminMobileNumber` (`adminMobileNumber`),
  ADD UNIQUE KEY `EmpID` (`EmpID`,`adminUsername`,`adminEmail`,`adminAadharCardNumber`,`adminPenCardNumber`);

--
-- Indexes for table `bankcustmordetails`
--
ALTER TABLE `bankcustmordetails`
  ADD PRIMARY KEY (`accountNumber`),
  ADD UNIQUE KEY `email id` (`emailid`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD UNIQUE KEY `accountNumber` (`accountNumber`),
  ADD KEY `mobilenumber` (`mobilenumber`) USING BTREE,
  ADD KEY `aadhar card number` (`aadharcardnumber`) USING BTREE,
  ADD KEY `pen card number` (`pencardnumber`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountdebitcreditdetails`
--
ALTER TABLE `accountdebitcreditdetails`
  ADD CONSTRAINT `accountdebitcreditdetails_ibfk_1` FOREIGN KEY (`accountNumber`) REFERENCES `bankcustmordetails` (`accountNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
