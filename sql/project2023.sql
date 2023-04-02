-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 10:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpId` int(50) NOT NULL,
  `EmpFirstName` varchar(50) NOT NULL,
  `EmpLastName` varchar(50) NOT NULL,
  `EmpNIC` varchar(50) NOT NULL,
  `EmpPhone` int(20) NOT NULL,
  `EmpAddress` varchar(50) NOT NULL,
  `UserId` int(50) NOT NULL,
  `RoleId` int(20) NOT NULL,
  `EmpInsertDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpId`, `EmpFirstName`, `EmpLastName`, `EmpNIC`, `EmpPhone`, `EmpAddress`, `UserId`, `RoleId`, `EmpInsertDate`) VALUES
(1, 'kamal', 'kamal', '921862776V', 777777777, 'no 5 , kandy', 1, 1, '2023-03-12 13:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `emprole`
--

CREATE TABLE `emprole` (
  `RoleId` int(50) NOT NULL,
  `RoleName` varchar(20) NOT NULL,
  `RoleInsertDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emprole`
--

INSERT INTO `emprole` (`RoleId`, `RoleName`, `RoleInsertDate`) VALUES
(1, 'admin', '2023-02-26 18:43:08'),
(2, 'manager', '2023-02-26 18:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(50) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `UserPassword` varchar(300) NOT NULL,
  `UserType` int(20) NOT NULL,
  `UserStatus` enum('true','false') NOT NULL,
  `UserInsertDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `UserEmail`, `UserPassword`, `UserType`, `UserStatus`, `UserInsertDate`) VALUES
(1, 'kamal@gmail.com', '$2y$10$WvsksCcPbEJulh0Ind74Oe.RmupRY3jzQDY.4y6z2jiWr3b507mY.', 1, 'true', '2023-03-12 13:19:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpId`),
  ADD KEY `user-employee` (`UserId`),
  ADD KEY `emp-role` (`RoleId`);

--
-- Indexes for table `emprole`
--
ALTER TABLE `emprole`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmpId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emprole`
--
ALTER TABLE `emprole`
  MODIFY `RoleId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
