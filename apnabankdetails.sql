-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 02, 2023 at 06:15 AM
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
(1157566390, '43500.00', '{\"transactions\":[{\"type\":\"debit\",\"amount\":0,\"bankbalance\":0,\"date\":\"2023-08-17\",\"time\":\"10:30 AM\",\"method\":\"no\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"45000\",\"bankbalance\":45000,\"date\":\"2023-09-26\",\"time\":\"18:00:29\",\"method\":\"Cash\",\"Payment_To\":\"self\"},{\"type\":\"Credit\",\"amount\":\"1500\",\"bankbalance\":43500,\"date\":\"2023-09-26\",\"time\":\"18:00:44\",\"method\":\"Account\",\"Payment_To\":\"4566784548\"},{\"type\":\"Credit\",\"amount\":\"1500\",\"bankbalance\":42000,\"date\":\"2023-09-26\",\"time\":\"18:01:08\",\"method\":\"Credit Card\",\"Payment_To\":\"Other Person\"},{\"type\":\"Debit\",\"amount\":\"15000\",\"bankbalance\":57000,\"date\":\"2023-09-27\",\"time\":\"22:26:25\",\"method\":\"Check\",\"Payment_To\":\"self\"},{\"type\":\"Credit\",\"amount\":\"5000\",\"bankbalance\":52000,\"date\":\"2023-09-27\",\"time\":\"22:26:43\",\"method\":\"Account\",\"Payment_To\":\"4566784548\"},{\"type\":\"Debit\",\"amount\":\"8500\",\"bankbalance\":43500,\"date\":\"2023-09-27\",\"time\":\"22:27:30\",\"method\":\"Debit Card\",\"Payment_To\":\"Other Person\"}]}'),
(8441605862, '1711.00', '{\"transactions\":[{\"type\":\"debit\",\"amount\":0,\"bankbalance\":0,\"date\":\"2023-08-17\",\"time\":\"10:30 AM\",\"method\":\"no\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"17\",\"bankbalance\":33,\"date\":\"2023-12-01\",\"time\":\"12:50:11\",\"method\":\"Account\",\"Payment_To\":\"64562115729\"},{\"type\":\"Debit\",\"amount\":\"33\",\"bankbalance\":66,\"date\":\"2023-12-01\",\"time\":\"12:51:14\",\"method\":\"Account\",\"Payment_To\":\"64562115729\"},{\"type\":\"Debit\",\"amount\":\"25000\",\"bankbalance\":25066,\"date\":\"2023-12-01\",\"time\":\"12:52:31\",\"method\":\"Check\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"2200\",\"bankbalance\":27266,\"date\":\"2023-12-01\",\"time\":\"12:52:57\",\"method\":\"Account\",\"Payment_To\":\"64562115729\"},{\"type\":\"Credit\",\"amount\":\"250\",\"bankbalance\":27016,\"date\":\"2023-12-01\",\"time\":\"12:55:07\",\"method\":\"Credit Card\",\"Payment_To\":\"Other Person\"},{\"type\":\"Debit\",\"amount\":\"305\",\"bankbalance\":26711,\"date\":\"2023-12-01\",\"time\":\"12:55:29\",\"method\":\"Debit Card\",\"Payment_To\":\"Other Person\"},{\"type\":\"Credit\",\"amount\":\"25000\",\"bankbalance\":1711,\"date\":\"2023-12-01\",\"time\":\"12:56:38\",\"method\":\"Account\",\"Payment_To\":\"64562115729\"}]}'),
(13176571843, '29750.00', '{\"transactions\":[{\"type\":\"debit\",\"amount\":0,\"bankbalance\":0,\"date\":\"2023-08-17\",\"time\":\"10:30 AM\",\"method\":\"no\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"45000\",\"bankbalance\":45000,\"date\":\"2023-10-07\",\"time\":\"17:56:10\",\"method\":\"Cash\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"15250\",\"bankbalance\":29750,\"date\":\"2023-10-07\",\"time\":\"17:56:52\",\"method\":\"Debit Card\",\"Payment_To\":\"Other Person\"}]}'),
(16251703119, '0.00', '\'{\"transactions\": [{\"type\":\"debit\", \"amount\":0, \"bankbalance\":0, \"date\":\"2023-08-17\", \"time\":\"10:30 AM\", \"method\":\"no\", \"Payment_To\":\"self\" } ]}\''),
(64562115729, '56526.00', '{\"transactions\":[{\"type\":\"debit\",\"amount\":0,\"bankbalance\":0,\"date\":\"2023-08-17\",\"time\":\"10:30 AM\",\"method\":\"no\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"15000\",\"bankbalance\":15000,\"date\":\"2023-09-15\",\"time\":\"00:12:27\",\"method\":\"Cash\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"10000\",\"bankbalance\":5000,\"date\":\"2023-09-15\",\"time\":\"00:13:14\",\"method\":\"Debit Card\",\"Payment_To\":\"Other Person\"},{\"type\":\"Debit\",\"amount\":\"3050\",\"bankbalance\":1950,\"date\":\"2023-10-09\",\"time\":\"16:41:14\",\"method\":\"Debit Card\",\"Payment_To\":\"Other Person\"},{\"type\":\"Debit\",\"amount\":\"40000\",\"bankbalance\":41950,\"date\":\"2023-10-09\",\"time\":\"17:11:20\",\"method\":\"Cash\",\"Payment_To\":\"self\"},{\"type\":\"Credit\",\"amount\":\"3500\",\"bankbalance\":38450,\"date\":\"2023-10-11\",\"time\":\"16:48:12\",\"method\":\"Account\",\"Payment_To\":\"4566784548\"},{\"type\":\"Credit\",\"amount\":\"2500\",\"bankbalance\":35950,\"date\":\"2023-10-13\",\"time\":\"16:12:26\",\"method\":\"UPI/Online\",\"Payment_To\":\"4655913755@icibank\"},{\"type\":\"Credit\",\"amount\":\"4850\",\"bankbalance\":31100,\"date\":\"2023-10-13\",\"time\":\"16:12:40\",\"method\":\"Account\",\"Payment_To\":\"4566784548\"},{\"type\":\"Debit\",\"amount\":\"10000\",\"bankbalance\":21100,\"date\":\"2023-10-13\",\"time\":\"17:00:00\",\"method\":\"Debit Card\",\"Payment_To\":\"Other Person\"},{\"type\":\"Debit\",\"amount\":\"5000\",\"bankbalance\":26100,\"date\":\"2023-10-13\",\"time\":\"17:00:22\",\"method\":\"Check\",\"Payment_To\":\"self\"},{\"type\":\"Credit\",\"amount\":\"8523\",\"bankbalance\":17577,\"date\":\"2023-10-13\",\"time\":\"17:00:41\",\"method\":\"Account\",\"Payment_To\":\"45667845485\"},{\"type\":\"Debit\",\"amount\":\"17500\",\"bankbalance\":35077,\"date\":\"2023-12-01\",\"time\":\"11:17:15\",\"method\":\"Cash\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"100\",\"bankbalance\":34977,\"date\":\"2023-12-01\",\"time\":\"11:17:55\",\"method\":\"Debit Card\",\"Payment_To\":\"Other Person\"},{\"type\":\"Credit\",\"amount\":\"33\",\"bankbalance\":34944,\"date\":\"2023-12-01\",\"time\":\"11:19:40\",\"method\":\"UPI/Online\",\"Payment_To\":\"8974821682@apnabank\"},{\"type\":\"Credit\",\"amount\":\"44\",\"bankbalance\":34900,\"date\":\"2023-12-01\",\"time\":\"11:20:36\",\"method\":\"Credit Card\",\"Payment_To\":\"Other Person\"},{\"type\":\"Credit\",\"amount\":\"200\",\"bankbalance\":34700,\"date\":\"2023-12-01\",\"time\":\"11:33:41\",\"method\":\"Account\",\"Payment_To\":\"64562445729\"},{\"type\":\"Credit\",\"amount\":\"50\",\"bankbalance\":34650,\"date\":\"2023-12-01\",\"time\":\"11:37:34\",\"method\":\"Account\",\"Payment_To\":\"13176571843\"},{\"type\":\"Credit\",\"amount\":\"50\",\"bankbalance\":34600,\"date\":\"2023-12-01\",\"time\":\"11:47:00\",\"method\":\"Account\",\"Payment_To\":\"13176571843\"},{\"type\":\"Credit\",\"amount\":\"150\",\"bankbalance\":34450,\"date\":\"2023-12-01\",\"time\":\"11:48:41\",\"method\":\"Account\",\"Payment_To\":\"94482914484\"},{\"type\":\"Credit\",\"amount\":\"50\",\"bankbalance\":34400,\"date\":\"2023-12-01\",\"time\":\"11:52:32\",\"method\":\"Account\",\"Payment_To\":\"94482914484\"},{\"type\":\"Credit\",\"amount\":\"20\",\"bankbalance\":34380,\"date\":\"2023-12-01\",\"time\":\"11:52:46\",\"method\":\"Account\",\"Payment_To\":\"94482914484\"},{\"type\":\"Credit\",\"amount\":\"40\",\"bankbalance\":34340,\"date\":\"2023-12-01\",\"time\":\"11:58:14\",\"method\":\"Account\",\"Payment_To\":\"94482914484\"},{\"type\":\"Credit\",\"amount\":\"45\",\"bankbalance\":34250,\"date\":\"2023-12-01\",\"time\":\"12:03:59\",\"method\":\"Account\",\"Payment_To\":\"99345546333\"},{\"type\":\"Credit\",\"amount\":\"45\",\"bankbalance\":34205,\"date\":\"2023-12-01\",\"time\":\"12:04:29\",\"method\":\"Account\",\"Payment_To\":\"99345546333\"},{\"type\":\"Credit\",\"amount\":\"20\",\"bankbalance\":34185,\"date\":\"2023-12-01\",\"time\":\"12:04:53\",\"method\":\"Account\",\"Payment_To\":\"99345546333\"},{\"type\":\"Credit\",\"amount\":\"105\",\"bankbalance\":34080,\"date\":\"2023-12-01\",\"time\":\"12:20:47\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"105\",\"bankbalance\":33975,\"date\":\"2023-12-01\",\"time\":\"12:21:28\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"105\",\"bankbalance\":33870,\"date\":\"2023-12-01\",\"time\":\"12:23:27\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"12\",\"bankbalance\":33858,\"date\":\"2023-12-01\",\"time\":\"12:27:47\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"12\",\"bankbalance\":33846,\"date\":\"2023-12-01\",\"time\":\"12:30:42\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"12\",\"bankbalance\":33834,\"date\":\"2023-12-01\",\"time\":\"12:31:46\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"13\",\"bankbalance\":33821,\"date\":\"2023-12-01\",\"time\":\"12:35:27\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"13\",\"bankbalance\":33808,\"date\":\"2023-12-01\",\"time\":\"12:37:14\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"16\",\"bankbalance\":33792,\"date\":\"2023-12-01\",\"time\":\"12:37:52\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"16\",\"bankbalance\":33776,\"date\":\"2023-12-01\",\"time\":\"12:45:36\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"17\",\"bankbalance\":33759,\"date\":\"2023-12-01\",\"time\":\"12:50:11\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"33\",\"bankbalance\":33726,\"date\":\"2023-12-01\",\"time\":\"12:51:14\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Credit\",\"amount\":\"2200\",\"bankbalance\":31526,\"date\":\"2023-12-01\",\"time\":\"12:52:57\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"},{\"type\":\"Debit\",\"amount\":\"25000\",\"bankbalance\":56526,\"date\":\"2023-12-01\",\"time\":\"12:56:38\",\"method\":\"Account\",\"Payment_To\":\"8441605862\"}]}'),
(94482914484, '42655.00', '{\"transactions\":[{\"type\":\"Debit\",\"amount\":\"45000\",\"bankbalance\":45000,\"date\":\"2023-10-11\",\"time\":\"17:00:43\",\"method\":\"Cash\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"2345\",\"bankbalance\":42655,\"date\":\"2023-10-11\",\"time\":\"17:01:13\",\"method\":\"Debit Card\",\"Payment_To\":\"Other Person\"}]}'),
(99345546333, '10000.00', '{\"transactions\":[{\"type\":\"debit\",\"amount\":0,\"bankbalance\":0,\"date\":\"2023-08-17\",\"time\":\"10:30 AM\",\"method\":\"no\",\"Payment_To\":\"self\"},{\"type\":\"Debit\",\"amount\":\"10000\",\"bankbalance\":10000,\"date\":\"2023-09-27\",\"time\":\"22:59:46\",\"method\":\"Cash\",\"Payment_To\":\"self\"}]}');

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
('182279', 'Ram  sharma', 'bhagaw dave', 'mother', 'Apna2111@', '2023-08-11', 'apnabank2111@gmail.com', 1234567458, 'Male', 'bhankrota', 'jaipur', 'Rajasthan', 205101, 'Apna2111@', 123455464333, '412d6huk4ht6', '182279_AdminPersonalPhoto.jpg', '182279_AdminAadharcardFront.jpg', '182279_AdminAadharcardBack.jpg', '182279_AdminPencardFront.gif', '182279_AdminPencardBack.jpg', '2023-12-01 13:45:39', '2023-12-01 13:51:33'),
('543485', 'Ram  sharma', 'Tharachand shar', 'santi', 'sita12333', '2001-12-25', 'ram@gmail.com', 1234567892, 'Male', 'bhankrota', 'jaipur', 'Rajasthan', 205101, '123', 123455464633, '4p6huk423j', '543485_AdminPersonalPhoto.jpg', '543485_AdminAadharcardFront.jpg', '543485_AdminAadharcardBack.jpg', '543485_AdminPencardFront.png', '543485_AdminPencardBack.jpg', '2023-09-21 00:35:39', '2023-10-07 17:48:28'),
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
('sita', '', 'Devi', ' father', 'mother', 9608524633, 'sita123@email.com', 'sita12333', '123', 'bhankrota', 'ajmer road jaipur', 'jaipur', 302026, 'Jharkhand', '1985-01-24', 'India', 'General', 'Female', 122865464654, '486huk423j', NULL, 1157566390, '1157566390_PersonalPhoto.png', '1157566390_class10Marksheet.png', '1157566390_birthCertificate.png', '1157566390_AadharcardFront.png', '1157566390_AadharcardBack.png', '1157566390_PencardFront.jpg', '1157566390_PencardBack.jpg', '2023-09-21 00:35:39', '2023-09-21 05:35:39'),
('Laxman', '', 'dave', ' bhagaw dave', 'mother', 9602353212, 'laxman123@gmail.com', 'Laxman@123', 'Laxman@123', 'bhankrota jaipur', 'ajmer road jaipur', 'jaipur', 302026, 'Manipur', '2001-12-25', 'India', 'General', 'Male', 123255464654, '2l8u7asd45', NULL, 8441605862, '08441605862_PersonalPhoto.jpg', '08441605862_class10Marksheet.gif', '08441605862_birthCertificate.gif', '08441605862_AadharcardFront.jpg', '08441605862_AadharcardBack.gif', '08441605862_PencardFront.jpg', '08441605862_PencardBack.jpg', '2023-10-11 17:48:06', '2023-10-11 17:48:06'),
('babu', 'lal', 'Jat', ' Tharachand sharma', 'santi', 9602353233, 'ram2111@gmail.com', 'Babu@258', '123', 'bhankrota jaipur', 'ajmer road jaipur', 'jaipur', 302026, 'Haryana', '1992-08-12', 'India', 'General', 'Male', 123466664654, '852rgf789f', NULL, 13176571843, '13176571843_PersonalPhoto.png', '13176571843_class10Marksheet.jpg', '13176571843_birthCertificate.jpg', '13176571843_AadharcardFront.jpg', '13176571843_AadharcardBack.gif', '13176571843_PencardFront.png', '13176571843_PencardBack.jpg', '2023-09-21 00:35:39', '2023-09-21 00:35:39'),
('apna', 'rs', 'bank', ' Babu lal sharma', 'Fuli devi', 9602353225, 'apnaBank2111@gmail.com', 'apnaBank@2111', '123', 'bhankrota jaipur', 'ajmer road jaipur', 'jaipur', 302027, 'Gujarat', '2006-06-15', 'India', 'General', 'Male', 123455465872, 'as14sd4r5d', ' ', 16251703119, '16251703119_PersonalPhoto.gif', '16251703119_class10Marksheet.gif', '16251703119_birthCertificate.jpg', '16251703119_AadharcardFront.jpg', '16251703119_AadharcardBack.jpg', '16251703119_PencardFront.gif', '16251703119_PencardBack.jpg', '2023-12-01 13:18:30', '2023-12-01 13:18:30'),
('Rahul', 'rs', 'Sharma', ' Babu lal sharma', 'Fuli devi', 9602353233, 'rahul123@email.com', 'Rahul@2111', '123', 'Jaipur', 'ajmer road jaipur', 'Jaipur', 302024, 'Haryana', '2023-09-17', 'India', 'General', 'Other', 123455464654, '258asd456s', NULL, 64562115729, '64562115729_PersonalPhoto.png', '64562115729_class10Marksheet.png', '64562115729_birthCertificate.gif', '64562115729_AadharcardFront.jpg', '64562115729_AadharcardBack.jpg', '64562115729_PencardFront.jpg', '64562115729_PencardBack.jpeg', '2023-09-21 00:35:39', '2023-10-13 17:55:34'),
('Roshan', '', 'Sharma', ' Babu lal sharma', 'mother', 9602353233, 'krishan123@email.com', 'Rahul@2101', 'Rahul@2101', 'bhankrota jaipur', 'ajmer road jaipur', 'jaipur', 302026, 'Rajasthan', '1998-04-15', 'India', 'SC', 'Other', 123483657654, '8k28gf789f', NULL, 94482914484, '94482914484_PersonalPhoto.gif', '94482914484_class10Marksheet.gif', '94482914484_birthCertificate.gif', '94482914484_AadharcardFront.jpg', '94482914484_AadharcardBack.jpg', '94482914484_PencardFront.gif', '94482914484_PencardBack.png', '2023-10-08 00:41:14', '2023-10-08 00:41:14'),
('sohan', '', 'jatt', ' jat father', 'mother', 9456354533, 'jat123@email.com', 'Jat@1234', '123', 'bhankrota jaipur', 'ajmer road jaipur', 'jaipur', 302026, 'Haryana', '2014-06-19', 'India', 'OBC', 'Male', 128494464654, 'ghfgg45549', NULL, 99345546333, '99345546333_PersonalPhoto.png', '99345546333_class10Marksheet.jpg', '99345546333_birthCertificate.png', '99345546333_AadharcardFront.jpg', '99345546333_AadharcardBack.jpg', '99345546333_PencardFront.jpg', '99345546333_PencardBack.jpg', '2023-09-27 22:36:05', '2023-09-27 22:36:05');

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
(344);

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
