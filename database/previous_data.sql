-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 09:01 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `previous_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(255) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_start` date DEFAULT NULL,
  `admin_end` date NOT NULL,
  `admin_status` text NOT NULL,
  `admin_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_start`, `admin_end`, `admin_status`, `admin_img`) VALUES
(1, 'MD RAHATUL RABBI', 'rahatul.ice.09.pust@gmail.com', '2022-12-10', '2022-12-10', 'Admin Officer', 'rahatul_admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `residential_info`
--

CREATE TABLE `residential_info` (
  `non_r_id` int(255) NOT NULL,
  `non_r_name` text NOT NULL,
  `non_r_roll` int(255) NOT NULL,
  `non_r_reg` int(255) NOT NULL,
  `non_r_session` int(255) NOT NULL,
  `non_r_dept` text NOT NULL,
  `non_r_rm` int(255) NOT NULL,
  `non_r_hall_id` int(255) NOT NULL,
  `non_r_fname` text NOT NULL,
  `non_r_mname` text NOT NULL,
  `non_r_email` varchar(50) NOT NULL,
  `non_r_birth` date DEFAULT NULL,
  `non_r_pre_address` varchar(255) NOT NULL,
  `non_r_per_address` varchar(255) NOT NULL,
  `non_r_mob` text NOT NULL,
  `non_r_fee` int(100) NOT NULL,
  `non_r_start` date NOT NULL,
  `non_r_end` date NOT NULL,
  `non_r_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `residential_info`
--

INSERT INTO `residential_info` (`non_r_id`, `non_r_name`, `non_r_roll`, `non_r_reg`, `non_r_session`, `non_r_dept`, `non_r_rm`, `non_r_hall_id`, `non_r_fname`, `non_r_mname`, `non_r_email`, `non_r_birth`, `non_r_pre_address`, `non_r_per_address`, `non_r_mob`, `non_r_fee`, `non_r_start`, `non_r_end`, `non_r_img`) VALUES
(1, 'MD RAKIBUZZAMAN', 180226, 1065335, 2017, 'EEE', 0, 741852, 'Nazmul Hossain', 'Rahima Begum', 'shadhin@gmail.com', '2020-06-10', 'N/A', 'Kushtia, Pabna', '01521539767', 1250, '2022-12-10', '2022-12-11', 'man1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `residential_info`
--
ALTER TABLE `residential_info`
  ADD PRIMARY KEY (`non_r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `residential_info`
--
ALTER TABLE `residential_info`
  MODIFY `non_r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
