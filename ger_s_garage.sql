-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 07:40 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ger_s_garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `vehicleLN` varchar(20) NOT NULL,
  `VehicleStatus` varchar(15) DEFAULT 'In Service',
  `partCost` double DEFAULT NULL,
  `repairCost` double DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `bookingType` varchar(20) NOT NULL,
  `vehicleLN` varchar(20) NOT NULL,
  `bookingDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `birthday` date DEFAULT NULL,
  `Mobile_Number` int(20) NOT NULL,
  `customer_Email` varchar(40) NOT NULL,
  `customer_Comment` varchar(200) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birthday`, `Mobile_Number`, `customer_Email`, `customer_Comment`, `username`, `password`, `created_at`) VALUES
(16, 'Gers', 'Gers', '2021-01-01', 2147483647, 'abc@gmail.com', 'No', 'admin', '$2y$10$vOkbmGzttfs55aZ3bRmi..hd/TF7mbQCbYQGieJtrPys4OxgWaxOO', '2021-01-09 18:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_booking`
--

CREATE TABLE `vehicle_booking` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `vehicleType` varchar(20) DEFAULT NULL,
  `vehicleLN` varchar(20) NOT NULL,
  `vehicleMake` varchar(15) DEFAULT NULL,
  `engineType` varchar(20) DEFAULT NULL,
  `bookingType` varchar(20) DEFAULT NULL,
  `bookingDate` date DEFAULT NULL,
  `anynote` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_parts`
--

CREATE TABLE `vehicle_parts` (
  `id` int(11) NOT NULL,
  `partName` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_parts`
--

INSERT INTO `vehicle_parts` (`id`, `partName`, `price`) VALUES
(1, 'A/C CLUTCH', 16.99),
(2, 'A/C DUAL+ LINE', 15.99),
(3, 'A/C SINGLE LINE', 10.99),
(4, 'AIR CLEANER LID', 6.99),
(5, 'AIR FILTER--ENGINE', 1.99),
(6, 'AIR FLOW METER', 24.99),
(7, 'AIR RIDE PUMP', 23.99),
(8, 'AIR RIDE-- AIR BAG', 29.99),
(9, 'ALTERNATOR', 22.99),
(10, 'ANTENNA/MANUAL', 3.99),
(11, 'ANTENNA/POWER', 15.99),
(12, 'ARM REST', 6.99),
(13, 'Ash_Tray', 5.99),
(14, 'AXLE 6-8 LUG', 43.99),
(15, 'AXLE SHAFT', 30.99),
(16, 'BACK GLASS- AS IS', 22.99),
(17, 'BALL JOINTS', 6.99),
(18, 'BATTERY (USED)', 31.99),
(19, 'BATTERY BOX', 6.99),
(20, 'BATTERY HOLD DOWNS', 2.99),
(21, 'BEARING (ANY)', 4.99),
(22, 'BEAUTY RINGS', 4.99),
(23, 'BED LINER', 38.99),
(24, 'BELLHOUSING ALUMINUM', 27.99),
(25, 'BELT TENSIONER', 14.99),
(26, 'BENCH SEAT', 29.99),
(27, 'BODY MOUNTS', 4.99),
(28, 'BRAKE ABS CONTROLLER', 56.99),
(29, 'BRAKE BACKNG PLATE', 12.99),
(30, 'BRAKE CALIPER', 14.99),
(31, 'BRAKE CALIPER BRACKET', 9.99),
(32, 'BRAKE DRUM', 10.99),
(33, 'BRAKE FLUID RESERVOIR', 11.99),
(34, 'BRAKE MASTER CYLINDER', 15.99),
(35, 'BRAKE POWER/HYDRO BOOSTER', 29.99),
(36, 'BRAKE PROPORTIONING VALVE (CAR)', 10.99),
(37, 'BRAKE ROTOR (NO HUB)', 10.99),
(38, 'COMPRESSOR', 30.99),
(39, 'CONDENSER', 29.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`,`user`,`vehicleLN`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vehicle_booking`
--
ALTER TABLE `vehicle_booking`
  ADD PRIMARY KEY (`id`,`user`,`vehicleLN`);

--
-- Indexes for table `vehicle_parts`
--
ALTER TABLE `vehicle_parts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `vehicle_booking`
--
ALTER TABLE `vehicle_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vehicle_parts`
--
ALTER TABLE `vehicle_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
