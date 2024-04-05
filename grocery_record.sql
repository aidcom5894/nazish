-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2024 at 03:08 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_reg`
--

CREATE TABLE `admin_reg` (
  `id` int NOT NULL,
  `username` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_reg`
--

INSERT INTO `admin_reg` (`id`, `username`, `email`, `password`, `contact`) VALUES
(1, 'kfjewj', 'nazishakhtar1998@gmail.com', '1234', '7645327647'),
(2, 'kfjewj', 'nazishakhtar1998@gmail.com', '1234', '7645327647'),
(3, 'kfjewj', 'nazishakhtar1998@gmail.com', 'asdf23', '2334234234234'),
(4, 'kfjewj', 'nazishakhtar1998@gmail.com', 'asdf23', '2334234234234'),
(5, 'kfjewj', 'nazishakhtar1998@gmail.com', '21231231', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `id` int NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `authentication_code` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `security_qns1` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `security_ans` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profile_status` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_picture` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `onboarding_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `username`, `email`, `password`, `contact`, `authentication_code`, `address`, `security_qns1`, `security_ans`, `profile_status`, `profile_picture`, `onboarding_date`) VALUES
(1, 'Nazish', 'nazishakhtar1998@gmail.com', '1234', '23234234', 'B7A980', 'to_be_updated', 'to_be_updated', 'to_be_updated', 'Pending', 'http://localhost/grocery_records/assets/avatar/avatar1.png', '2024-04-05 09:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `grocery_recor`
--

CREATE TABLE `grocery_recor` (
  `Id` int NOT NULL,
  `To_Date` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Name_of_member` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Grocery_items` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Grocery_quantity` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Grocery_unit` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `No_of_member` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Expenses` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Total` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Grand_Total_Today` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grocery_recor`
--

INSERT INTO `grocery_recor` (`Id`, `To_Date`, `Name_of_member`, `Grocery_items`, `Grocery_quantity`, `Grocery_unit`, `No_of_member`, `Expenses`, `Total`, `Grand_Total_Today`) VALUES
(3, '2024-03-12', 'Shreya', 'chocolate', '1', 'Piece', '1', '12', '12', '12'),
(4, '2024-03-12', 'Shweta', 'chocolate', '1', 'Piece', '1', '132', '132', '132'),
(5, '2024-03-12', 'Nazish', 'Nachos', '2', 'Piece', '2', '150', '150', '23'),
(7, '2024-03-12', 'abc', 'chocolate', '1', 'Piece', '12', '123', '31', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_reg`
--
ALTER TABLE `admin_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grocery_recor`
--
ALTER TABLE `grocery_recor`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_reg`
--
ALTER TABLE `admin_reg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grocery_recor`
--
ALTER TABLE `grocery_recor`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
