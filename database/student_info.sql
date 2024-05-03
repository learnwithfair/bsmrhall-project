-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 09:00 PM
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
-- Database: `student_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(255) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_start` date DEFAULT NULL,
  `admin_status` text NOT NULL,
  `admin_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_start`, `admin_status`, `admin_img`) VALUES
(14, 'Dr. Md. Omar Faruk ', 'provost@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-07-20', 'Provost', 'omar faruk.jpg'),
(21, 'Dr. Md. Azizur Rahman', 'assistant4@gmail.com', 'a38cc9b862cd7122cf461890c4e3e2ac', '2022-07-28', 'Assistant Provost', 'Aziz.jpg'),
(22, 'Tarun Debnath', 'assistantprovost1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-07-28', 'Assistant Provost', 'tarun debnath.jpg'),
(23, 'S. M. Shahedul Alam', 'assistantprovost@gmail.com', 'a38cc9b862cd7122cf461890c4e3e2ac', '2022-07-28', 'Assistant Provost', 'Shahedul Alam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bdining_meal`
--

CREATE TABLE `bdining_meal` (
  `meal_id` int(255) NOT NULL,
  `meal_name` text NOT NULL,
  `meal_roll` int(50) NOT NULL,
  `meal_room` int(100) NOT NULL,
  `morning_meal` int(20) NOT NULL,
  `lunch` int(20) NOT NULL,
  `dinner` int(20) NOT NULL,
  `meal_total` int(20) NOT NULL,
  `meal_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bdining_meal`
--

INSERT INTO `bdining_meal` (`meal_id`, `meal_name`, `meal_roll`, `meal_room`, `morning_meal`, `lunch`, `dinner`, `meal_total`, `meal_date`) VALUES
(6, 'MD RAHATUL RABBI', 190609, 520, 3, 2, 1, 6, '2022-12-06'),
(7, 'MD AMIR HOSSAIN', 343, 35, 2, 3, 3, 8, '2022-12-07'),
(8, 'MD RAHATUL RABBI', 190609, 520, 3, 1, 3, 7, '2022-12-08'),
(9, 'MD RAHATUL RABBI', 190609, 505, 3, 3, 3, 9, '2022-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `dining_manager`
--

CREATE TABLE `dining_manager` (
  `manager_id` int(255) NOT NULL,
  `manager_email` varchar(255) NOT NULL,
  `manager_pass` varchar(255) NOT NULL,
  `manager_block` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dining_manager`
--

INSERT INTO `dining_manager` (`manager_id`, `manager_email`, `manager_pass`, `manager_block`) VALUES
(1, 'hallmanager1@gmail.com', '123456', 'A'),
(2, 'hallmanager2@gmail.com', '123456', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `dining_meal`
--

CREATE TABLE `dining_meal` (
  `meal_id` int(255) NOT NULL,
  `meal_name` text NOT NULL,
  `meal_roll` int(50) NOT NULL,
  `meal_room` int(100) NOT NULL,
  `morning_meal` int(20) NOT NULL,
  `lunch` int(20) NOT NULL,
  `dinner` int(20) NOT NULL,
  `meal_total` int(20) NOT NULL,
  `meal_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dining_meal`
--

INSERT INTO `dining_meal` (`meal_id`, `meal_name`, `meal_roll`, `meal_room`, `morning_meal`, `lunch`, `dinner`, `meal_total`, `meal_date`) VALUES
(5, 'MD RAHATUL RABBI', 190609, 504, 2, 3, 2, 7, '2022-12-07'),
(6, 'MD RAHATUL RABBI', 190610, 102, 3, 3, 3, 9, '2022-12-06'),
(7, 'MD AMIR HOSSAIN', 343, 35, 2, 1, 2, 5, '2022-12-07'),
(8, 'MD RAHATUL RABBI', 190609, 520, 2, 2, 2, 6, '2022-12-08'),
(9, 'MD RAHATUL RABBI', 190609, 505, 1, 2, 3, 6, '2022-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `hall_id`
--

CREATE TABLE `hall_id` (
  `check_r_id` int(255) NOT NULL,
  `check_r_roll` int(255) NOT NULL,
  `check_r_hall_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall_id`
--

INSERT INTO `hall_id` (`check_r_id`, `check_r_roll`, `check_r_hall_id`) VALUES
(1, 190609, 963258),
(2, 180226, 741852);

-- --------------------------------------------------------

--
-- Table structure for table `message_info`
--

CREATE TABLE `message_info` (
  `message_id` int(255) NOT NULL,
  `message_name` text NOT NULL,
  `message_roll` int(255) NOT NULL,
  `message_reg` int(255) NOT NULL,
  `message_hall_id` int(255) NOT NULL,
  `message_email` varchar(50) NOT NULL,
  `message_subject` varchar(250) NOT NULL,
  `message_content` varchar(1000) NOT NULL,
  `message_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_info`
--

INSERT INTO `message_info` (`message_id`, `message_name`, `message_roll`, `message_reg`, `message_hall_id`, `message_email`, `message_subject`, `message_content`, `message_date`) VALUES
(7, 'MD RAHATUL RABBI', 190609, 1065334, 963258, 'rahatul@gmail.com', 'This is Message Section', 'Phasellus ac leo ut dolor placerat dictum eget sodales ipsum. Mauris accumsan nisl sit amet est imperdiet, nec blandit sem maximus. Ut vestibulum consectetur risus sed lacinia. In sollicitudin a enim at dignissim. Donec id tincidunt massa. Donec tortor eros, faucibus vitae eleifend in, blandit vitae urna. Donec sed lacus imperdiet, laoreet nisl ut, pharetra nunc. Donec lacinia urna sed scelerisque pulvinar. Maecenas leo nunc, tristique ut dapibus id, porta ut neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam vel facilisis felis. Suspendisse enim libero, tempor id mattis sit amet, aliquet non urna. Vivamus vel turpis dignissim, sagittis urna sed, sollicitudin ex. Fusce auctor nisl id mi ultrices convallis. Duis sodales ut risus ut elementum. Done', '2022-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `nonresidential_info`
--

CREATE TABLE `nonresidential_info` (
  `non_r_id` int(255) NOT NULL,
  `non_r_name` text NOT NULL,
  `non_r_roll` int(255) NOT NULL,
  `non_r_reg` int(255) NOT NULL,
  `non_r_pass` varchar(100) NOT NULL,
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
  `book_num` int(255) NOT NULL,
  `non_r_receipt` int(255) NOT NULL,
  `non_r_fee` int(255) NOT NULL,
  `non_r_start` date NOT NULL,
  `non_r_img` varchar(100) NOT NULL,
  `non_r_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nonresidential_info`
--

INSERT INTO `nonresidential_info` (`non_r_id`, `non_r_name`, `non_r_roll`, `non_r_reg`, `non_r_pass`, `non_r_session`, `non_r_dept`, `non_r_rm`, `non_r_hall_id`, `non_r_fname`, `non_r_mname`, `non_r_email`, `non_r_birth`, `non_r_pre_address`, `non_r_per_address`, `non_r_mob`, `book_num`, `non_r_receipt`, `non_r_fee`, `non_r_start`, `non_r_img`, `non_r_status`) VALUES
(1, 'MD RAHATUL RABBI', 190609, 1065334, '123456', 2018, 'ICE', 505, 963258, 'Mohammad Ali', 'Sultana Raziya', 'rahatul@gmail.com', '1999-03-03', 'Pabna Sadar, Pabna', 'Hatibandha, Lalmonirhat', '01790224950', 1001, 102, 2250, '2022-12-10', 'rahatul_admin.png', 'Residential'),
(3, 'MEHEDI HASAN', 200632, 1065336, '123456', 2019, 'EECE', 509, 0, 'Abdul Halim', 'Rehena Begum', 'bappy@gmail.com', '1998-06-18', 'Pabna Sadar, Rajshahi', 'Veramara, Kushtia', '01790224950', 0, 0, 0, '2022-12-10', 'man2.png', 'Illegal'),
(4, 'MD NAYEEM', 190634, 1065337, '123456', 2019, 'ICE', 0, 0, 'Farhan', 'Khadija', 'nayeem@gmail.com', '2022-12-22', 'N/A', 'mymensingh', '01521539767', 0, 0, 0, '2022-12-10', 'man3.png', 'Nonresidential');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `ph_id` int(255) NOT NULL,
  `ph_name` text NOT NULL,
  `ph_roll` int(255) NOT NULL,
  `ph_reg` int(255) NOT NULL,
  `book_num` int(255) NOT NULL,
  `ph_receipt_num` int(255) NOT NULL,
  `ph_amount` int(255) NOT NULL,
  `ph_month` text NOT NULL,
  `ph_date` date NOT NULL,
  `ph_submitted` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`ph_id`, `ph_name`, `ph_roll`, `ph_reg`, `book_num`, `ph_receipt_num`, `ph_amount`, `ph_month`, `ph_date`, `ph_submitted`) VALUES
(1, 'MD RAHATUL RABBI', 190609, 1065334, 1001, 102, 2250, 'Admission Fee + </br>DEC (2022)', '2022-12-10', 'Dr. Md. Omar Faruk '),
(2, 'MD RAKIBUZZAMAN', 180226, 1065335, 1001, 105, 1250, 'Admission Fee + </br>DEC (2022)', '2022-12-10', 'Dr. Md. Omar Faruk '),
(3, 'MD RAKIBUZZAMAN', 180226, 1065335, 1001, 106, 500, 'JAN FEB  (2023)', '2022-12-11', 'Dr. Md. Omar Faruk '),
(4, 'MD RAKIBUZZAMAN', 180226, 1065335, 1001, 106, 500, 'JAN FEB  (2023)</br> Changed', '2022-12-11', 'Dr. Md. Omar Faruk ');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_info`
--

CREATE TABLE `receipt_info` (
  `receipt_id` int(255) NOT NULL,
  `book_num` int(255) NOT NULL,
  `receipt_num` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt_info`
--

INSERT INTO `receipt_info` (`receipt_id`, `book_num`, `receipt_num`) VALUES
(1, 1001, 111),
(3, 1001, 103),
(4, 1001, 104),
(7, 1001, 107),
(8, 1001, 108),
(9, 1001, 109),
(11, 1001, 106);

-- --------------------------------------------------------

--
-- Table structure for table `residential_info`
--

CREATE TABLE `residential_info` (
  `r_id` int(255) NOT NULL,
  `r_roll` int(255) NOT NULL,
  `r_reg` int(255) NOT NULL,
  `r_year` int(20) NOT NULL,
  `r_rm` int(255) NOT NULL,
  `r_jan` text NOT NULL,
  `r_feb` text NOT NULL,
  `r_mar` text NOT NULL,
  `r_apr` text NOT NULL,
  `r_may` text NOT NULL,
  `r_jun` text NOT NULL,
  `r_jul` text NOT NULL,
  `r_aug` text NOT NULL,
  `r_sep` text NOT NULL,
  `r_oct` text NOT NULL,
  `r_nov` text NOT NULL,
  `r_dec` text NOT NULL,
  `r_addmission_month` int(10) NOT NULL,
  `r_addminssion_year` int(10) NOT NULL,
  `r_start` int(255) NOT NULL,
  `r_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `residential_info`
--

INSERT INTO `residential_info` (`r_id`, `r_roll`, `r_reg`, `r_year`, `r_rm`, `r_jan`, `r_feb`, `r_mar`, `r_apr`, `r_may`, `r_jun`, `r_jul`, `r_aug`, `r_sep`, `r_oct`, `r_nov`, `r_dec`, `r_addmission_month`, `r_addminssion_year`, `r_start`, `r_status`) VALUES
(1, 190609, 1065334, 2019, 505, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 12, 2022, 2018, 1),
(2, 190609, 1065334, 2020, 505, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 12, 2022, 2018, 1),
(3, 190609, 1065334, 2021, 505, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 12, 2022, 2018, 1),
(4, 190609, 1065334, 2022, 505, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Paid', 12, 2022, 2018, 1),
(5, 190609, 1065334, 2023, 505, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 12, 2022, 2018, 1),
(6, 180226, 1065335, 2018, 0, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 12, 2022, 2017, 0),
(7, 180226, 1065335, 2019, 0, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 12, 2022, 2017, 0),
(8, 180226, 1065335, 2020, 0, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 12, 2022, 2017, 0),
(9, 180226, 1065335, 2021, 0, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 12, 2022, 2017, 0),
(10, 180226, 1065335, 2022, 0, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Paid', 12, 2022, 2017, 0),
(11, 180226, 1065335, 2023, 0, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 12, 2022, 2017, 0);

-- --------------------------------------------------------

--
-- Table structure for table `upload_notice`
--

CREATE TABLE `upload_notice` (
  `n_id` int(255) NOT NULL,
  `n_title` text NOT NULL,
  `n_file` varchar(100) NOT NULL,
  `n_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_notice`
--

INSERT INTO `upload_notice` (`n_id`, `n_title`, `n_file`, `n_date`) VALUES
(1, 'This is sample notice for hall students', 'screencapture-localhost-81-wordpress-2022-11-08-22_31_05.pdf', '20-November-2022 07:18am'),
(3, 'Today Hall admission notice', 'doc_3.pdf', '10-December-2022 07:10pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bdining_meal`
--
ALTER TABLE `bdining_meal`
  ADD PRIMARY KEY (`meal_id`);

--
-- Indexes for table `dining_manager`
--
ALTER TABLE `dining_manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `dining_meal`
--
ALTER TABLE `dining_meal`
  ADD PRIMARY KEY (`meal_id`);

--
-- Indexes for table `hall_id`
--
ALTER TABLE `hall_id`
  ADD PRIMARY KEY (`check_r_id`);

--
-- Indexes for table `message_info`
--
ALTER TABLE `message_info`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `nonresidential_info`
--
ALTER TABLE `nonresidential_info`
  ADD PRIMARY KEY (`non_r_id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `receipt_info`
--
ALTER TABLE `receipt_info`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `residential_info`
--
ALTER TABLE `residential_info`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `upload_notice`
--
ALTER TABLE `upload_notice`
  ADD PRIMARY KEY (`n_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bdining_meal`
--
ALTER TABLE `bdining_meal`
  MODIFY `meal_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dining_manager`
--
ALTER TABLE `dining_manager`
  MODIFY `manager_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dining_meal`
--
ALTER TABLE `dining_meal`
  MODIFY `meal_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hall_id`
--
ALTER TABLE `hall_id`
  MODIFY `check_r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message_info`
--
ALTER TABLE `message_info`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nonresidential_info`
--
ALTER TABLE `nonresidential_info`
  MODIFY `non_r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `ph_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipt_info`
--
ALTER TABLE `receipt_info`
  MODIFY `receipt_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `residential_info`
--
ALTER TABLE `residential_info`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `upload_notice`
--
ALTER TABLE `upload_notice`
  MODIFY `n_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
