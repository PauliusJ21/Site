-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 09:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computers`
--

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `ID` int(11) NOT NULL,
  `CPU` text NOT NULL,
  `GPU` text NOT NULL,
  `RAM` int(11) NOT NULL,
  `SSD` int(11) NOT NULL,
  `PSU` text NOT NULL,
  `Case` text NOT NULL,
  `Type` text NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`ID`, `CPU`, `GPU`, `RAM`, `SSD`, `PSU`, `Case`, `Type`, `Price`) VALUES
(1, 'AMD Ryzen 5 2600', 'NVIDIA Geforce RTX 2060', 16, 512, 'Corsair RM750x (2021)', 'Cooler Master Cosmos C700P', 'Gaming', 800),
(2, 'Intel i5 2400', 'NVIDIA Geforce GTX 1660ti', 16, 512, 'Seasonic Prime Titanium TX-1000', 'Corsair Carbide 275R', 'Work', 700);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
