-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2023 at 10:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int NOT NULL,
  `firstNameA` varchar(255) NOT NULL,
  `lastNameA` varchar(255) NOT NULL,
  `emailA` varchar(255) NOT NULL,
  `passwordA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `ticketId` int NOT NULL,
  `IsPaid` tinyint(1) NOT NULL,
  `CurrentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ExpirationDate` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Weight` int DEFAULT NULL,
  `Height` int DEFAULT NULL,
  `Age` date DEFAULT NULL,
  `BodyFat` int DEFAULT NULL,
  `Gender` tinyint(1) DEFAULT NULL,
  `Exercies` varchar(800) DEFAULT NULL,
  `image` mediumblob,
  `TicketID` int DEFAULT NULL,
  `neck` tinyint DEFAULT NULL,
  `waist` tinyint DEFAULT NULL,
  `hip` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `Email`, `Password`, `Phone`, `Weight`, `Height`, `Age`, `BodyFat`, `Gender`, `Exercies`, `image`, `TicketID`, `neck`, `waist`, `hip`) VALUES
(2, 'nada', 'nada@gmail.com', '$2y$10$swegv8.g23U/rARLJ91xhueYuqx/flw9FVaVmFm682FVLdFXy4EmS', '+3161129877', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'hvhbvg', 'bhbhj@gmail.com', '$2y$10$V8SPw168yhgiLkPHCCgJcekENUBaA92Bpcp14Y0wYh2xusdUC/FHK', 'fdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'hamza', 'hmz@gmail.com', '$2y$10$q5P.gkbdCPnTiBMt56kE7uJgbziQz/XR3nANsp4SRYO9/YV5fNiQC', 'dfz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '', '', '$2y$10$ziPnfmv/OmcDQDrzivh93euBzmHDnwfPhugETtwZ8y2BLn.G0WCLW', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'hbhj', 'hamzalachehabe@gmail.com', '$2y$10$sJmqbCbdTKhyMImWjzir8uyiGbJl6iKsXgYXkCRl3CwEDXyjqxU/W', '+212690012136', 87, 183, '2003-07-06', NULL, 0, '[3]', NULL, NULL, 33, 60, 53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`ticketId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `user_ibfk_1` (`TicketID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `ticketId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`TicketID`) REFERENCES `billing` (`ticketId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
