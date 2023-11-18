-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Sep 22, 2023 at 08:55 PM
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
  `DebitAndCreditDetails` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '{"transactions": [{"type":"debit", "amount":0, "bankbalance":0, "date":"2023-08-17", "time":"10:30 AM", "method":"no", "Payment_To":"self" } ]}' CHECK (json_valid(`DebitAndCreditDetails`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountdebitcreditdetails`
--

INSERT INTO `accountdebitcreditdetails` (`accountNumber`, `accountBalance`, `DebitAndCreditDetails`) VALUES
(1157566390, '0.00', '{\"transactions\": [{\"type\":\"debit\", \"amount\":0, \"bankbalance\":0, \"date\":\"2023-08-17\", \"time\":\"10:30 AM\", \"method\":\"no\", \"Payment_To\":\"self\" } ]}'),
(13176571843, '0.00', '{\"transactions\": [{\"type\":\"debit\", \"amount\":0, \"bankbalance\":0, \"date\":\"2023-08-17\", \"time\":\"10:30 AM\", \"method\":\"no\", \"Payment_To\":\"self\" } ]}'),
(64562115729, '5000.00', '{\"transactions\":[{\"type\":\"debit\",\"amount\":0,\"bankbalance\":0,\"date\":\"2023-08-17\",\"time\":\"10:30 AM\",\"method\":\"no\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"15000\",\"bankbalance\":15000,\"date\":\"2023-09-15\",\"time\":\"00:12:27\",\"method\":\"Cash\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"10000\",\"bankbalance\":5000,\"date\":\"2023-09-15\",\"time\":\"00:13:14\",\"method\":\"Debit Card\",\"Payment_To\":\"Other Person\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `EmpID` mediumint(6) NOT NULL,
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
(543485, 'Ram  sharma', 'Tharachand shar', 'santi', 'sita12333', '2001-12-25', 'ram@gmail.com', 1234567892, 'Male', 'bhankrota', 'jaipur', 'Rajasthan', 205101, '123', 123455464633, '4p6huk423j', '543485_AdminPersonalPhoto.jpg', '543485_AdminAadharcardFront.jpg', '543485_AdminAadharcardBack.jpg', '543485_AdminPencardFront.jpg', '543485_AdminPencardBack.jpg', '2023-09-21 00:35:39', '2023-09-21 00:35:39'),
(498172, 'sita  Devi', 'father', 'mother', 'rahul2111', '1995-01-15', 'rahul123@email.com', 9602353233, 'Female', 'bhankrota jaipur', 'jaipur', 'Jharkhand', 302526, '345', 451455464654, 'sf6565f5s5', '498172_AdminPersonalPhoto.png', '498172_AdminAadharcardFront.jpg', '498172_AdminAadharcardBack.jpg', '498172_AdminPencardFront.jpg', '498172_AdminPencardBack.jpeg', '2023-09-18 02:24:13', '2023-09-21 23:08:23');

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

INSERT INTO `bankcustmordetails` (`firstname`, `middlename`, `lastname`, `fathername`, `mothername`, `mobilenumber`, `emailid`, `username`, `userpassword`, `temparyaddress`, `premananetaddress`, `city`, `pincode`, `statee`, `DOB`, `country`, `caste`, `gender`, `aadharcardnumber`, `pencardnumber`, `accountNumber`, `personal_Image`, `class10Marksheet`, `birth_certificate`, `Aadharcard_Front`, `Aadharcard_Back`, `Pencard_Front`, `Pencard_Back`, `dateToCreateAccount`, `updateAccount`) VALUES
('sita', '', 'Devi', ' father', 'mother', 9608524633, 'sita123@email.com', 'sita12333', '123', 'bhankrota', 'ajmer road jaipur', 'jaipur', 302026, 'Jharkhand', '1985-01-24', 'India', 'General', 'Female', 122865464654, '486huk423j', 1157566390, '1157566390_PersonalPhoto.png', '1157566390_class10Marksheet.png', '1157566390_birthCertificate.png', '1157566390_AadharcardFront.png', '1157566390_AadharcardBack.png', '1157566390_PencardFront.jpg', '1157566390_PencardBack.jpg', '2023-09-21 00:35:39', '2023-09-21 05:35:39'),
('babu', 'lal', 'Jat', ' Tharachand sharma', 'santi', 9876543210, 'ram2111@gmail.com', 'Babu@258', '123', 'bhankrota jaipur', 'ajmer road jaipur', 'jaipur', 302026, 'Haryana', '1992-08-12', 'India', 'General', 'Male', 123466664654, '852rgf789f', 13176571843, '13176571843_PersonalPhoto.png', '13176571843_class10Marksheet.jpg', '13176571843_birthCertificate.jpg', '13176571843_AadharcardFront.jpg', '13176571843_AadharcardBack.gif', '13176571843_PencardFront.png', '13176571843_PencardBack.jpg', '2023-09-21 00:35:39', '2023-09-21 00:35:39'),
('Rahul', 'rs', 'Sharma', ' Babu lal sharma', 'Fuli devi', 9051753456, 'rahul123@email.com', 'Rahul@2111', '123', 'Jaipur', 'ajmer road jaipur', 'jaipur', 302026, 'Andhra Pradesh', '2023-09-17', 'India', 'SC', 'Female', 123455464654, '258asd456s', 64562115729, '64562115729_PersonalPhoto.png', '64562115729_class10Marksheet.png', '64562115729_birthCertificate.jpg', '64562115729_AadharcardFront.jpg', '64562115729_AadharcardBack.jpg', '64562115729_PencardFront.jpg', '64562115729_PencardBack.jpg', '2023-09-21 00:35:39', '2023-09-21 00:35:39');

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
(159);

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
