-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2023 at 11:20 PM
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
  `passwordA` varchar(255) NOT NULL,
  `Is_confirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `firstNameA`, `lastNameA`, `emailA`, `passwordA`, `Is_confirmed`) VALUES
(1, 'hamza', 'lachehab', 'pifif13572@peogi.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', 1),
(2, 'nada', 'nada', 'hamzalachehabe@gmail.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', 0);

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int NOT NULL,
  `UserID` int NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TokenExpire` datetime NOT NULL
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
(2, 'nada', 'nada@gmail.com', '$2y$10$swegv8.g23U/rARLJ91xhueYuqx/flw9FVaVmFm682FVLdFXy4EmS', '+3161129877', 53, 163, '2002-10-11', NULL, 1, '[2,4,9,6,0,8]', NULL, NULL, 49, 53, 58),
(3, 'hvhbvg', 'bhbhj@gmail.com', '$2y$10$V8SPw168yhgiLkPHCCgJcekENUBaA92Bpcp14Y0wYh2xusdUC/FHK', '+111111111', NULL, NULL, '1993-10-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'hamza', 'hmz@gmail.com', '$2y$10$q5P.gkbdCPnTiBMt56kE7uJgbziQz/XR3nANsp4SRYO9/YV5fNiQC', '+3161129877', NULL, NULL, '1993-10-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Hamza Lachehab', 'hamzalachehabe@gmail.com', '$2y$10$clTtsvrNLgHTnG0PqvbVi.dQJG1M7tBgZNmvQhbjIrYeL9UWbCwl6', '+212690012136', 87, 183, '2003-07-06', NULL, 0, '[27,28,45,40,48,47,44]', NULL, NULL, 50, 96, 93),
(9, 'Tijs grashoff', 'pifif13572@peogi.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '0611298919', 93, 173, '2002-05-29', NULL, 0, '[6,0,4,1,8]', NULL, NULL, 44, 50, 48),
(14, 'John Doe', 'johndoe@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+123456789', 75, 180, '1990-05-15', NULL, 1, '[1, 2, 4]', NULL, NULL, 32, 34, 38),
(15, 'Jane Smith', 'janesmith@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+987654321', 62, 165, '1995-08-22', NULL, 0, '[2, 3]', NULL, NULL, 28, 26, 32),
(16, 'Michael Johnson', 'michaeljohnson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+555555555', 80, 190, '1985-03-10', NULL, 1, '[1, 2, 3, 4]', NULL, NULL, 36, 40, 42),
(17, 'Emily Wilson', 'emilywilson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+111111111', 55, 160, '1992-11-08', NULL, 0, '[3, 4]', NULL, NULL, 30, 28, 34),
(18, 'David Lee', 'davidlee@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+999999999', 70, 175, '1988-07-20', NULL, 1, '[2]', NULL, NULL, 34, 32, 36),
(19, 'Sarah Johnson', 'sarahjohnson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+444444444', 63, 165, '1994-09-18', NULL, 0, '[1, 3]', NULL, NULL, 30, 28, 33),
(20, 'Robert Davis', 'robertdavis@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+222222222', 78, 185, '1983-12-05', NULL, 1, '[1, 4]', NULL, NULL, 36, 38, 40),
(21, 'Jennifer Smith', 'jennifersmith@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+777777777', 55, 160, '1990-06-30', NULL, 0, '[2, 3]', NULL, NULL, 32, 30, 34),
(22, 'Daniel Brown', 'danielbrown@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+888888888', 85, 190, '1987-02-14', NULL, 1, '[4]', NULL, NULL, 38, 42, 44),
(23, 'Megan Wilson', 'meganwilson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+333333333', 60, 170, '1993-10-12', NULL, 0, '[3, 4]', NULL, NULL, 34, 32, 36),
(24, 'Christopher Taylor', 'christophertaylor@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+666666666', 75, 180, '1989-04-25', NULL, 1, '[1, 2, 4]', NULL, NULL, 36, 34, 38),
(25, 'Emma Johnson', 'emmajohnson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+999999999', 68, 175, '1992-08-01', NULL, 0, '[2]', NULL, NULL, 32, 30, 34),
(26, 'Matthew Wilson', 'matthewwilson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+555555555', 70, 180, '1986-11-14', NULL, 1, '[1, 3]', NULL, NULL, 34, 32, 36),
(27, 'Olivia Smith', 'oliviasmith@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+111111111', 58, 165, '1991-07-08', NULL, 0, '[2, 4]', NULL, NULL, 30, 28, 32),
(28, 'Alexander Davis', 'alexanderdavis@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+222222222', 80, 190, '1984-03-30', NULL, 1, '[1, 2]', NULL, NULL, 36, 34, 38),
(29, 'Sophia Johnson', 'sophiajohnson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+777777777', 62, 168, '1993-12-12', NULL, 0, '[3]', NULL, NULL, 32, 30, 34),
(30, 'William Wilson', 'williamwilson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+888888888', 77, 185, '1987-09-28', NULL, 1, '[2, 4]', NULL, NULL, 36, 38, 40),
(31, 'Ava Anderson', 'avaanderson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+333333333', 62, 165, '1994-11-25', NULL, 0, '[1, 3]', NULL, NULL, 30, 28, 33),
(32, 'James Johnson', 'jamesjohnson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+444444444', 80, 190, '1989-07-10', NULL, 1, '[1, 4]', NULL, NULL, 36, 38, 40),
(33, 'Charlotte Smith', 'charlottesmith@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+555555555', 58, 160, '1992-06-18', NULL, 0, '[2, 3]', NULL, NULL, 32, 30, 34),
(34, 'Noah Wilson', 'noahwilson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+666666666', 85, 190, '1987-02-14', NULL, 1, '[4]', NULL, NULL, 38, 42, 44),
(35, 'Grace Anderson', 'graceanderson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+777777777', 55, 160, '1990-09-30', NULL, 0, '[3, 4]', NULL, NULL, 30, 28, 34),
(36, 'Liam Taylor', 'liamtaylor@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+888888888', 70, 180, '1986-11-14', NULL, 1, '[1, 3]', NULL, NULL, 34, 32, 36),
(37, 'Isabella Smith', 'isabellasmith@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+111111111', 58, 165, '1991-07-08', NULL, 0, '[2, 4]', NULL, NULL, 30, 28, 32),
(38, 'Henry Davis', 'henrydavis@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+222222222', 80, 190, '1984-03-30', NULL, 1, '[1, 2]', NULL, NULL, 36, 34, 38),
(40, 'Oliver Wilson', 'oliverwilson@example.com', '$2y$10$hA7r2XYZmlnb53cpZB25GurFHHOzKDpMXxNKSx1uHdDk20tVnFjW2', '+888888888', 77, 185, '1987-09-28', NULL, 1, '[2, 4]', NULL, NULL, 36, 38, 40),
(41, 'Akbar 9awad f l3alam ', 'hatimnaim2020@gmail.com', '$2y$10$H1IkY8AIQU3LPkC0QP9zFuYR59ZQhvbxSVo6KnN0g1LoDqKzuEmFa', '0629900831', NULL, NULL, '2000-07-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `AdminID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `ticketId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`TicketID`) REFERENCES `billing` (`ticketId`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_expired_tokens_event` ON SCHEDULE EVERY 15 MINUTE STARTS '2023-06-15 15:55:18' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM password_resets
WHERE TokenExpire <= CURRENT_TIMESTAMP$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
