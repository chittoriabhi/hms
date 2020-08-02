-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 08:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin@admin.com', 'admin', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `d_specilization` varchar(255) DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `d_specilization`, `d_id`, `p_id`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(3, 'Demo test', 7, 6, 600, '2019-06-29', '9:15 AM', '2019-06-23 18:31:28', 1, 0, '0000-00-00 00:00:00'),
(4, 'Ayurveda', 5, 5, 8050, '2019-11-08', '1:00 PM', '2019-11-05 10:28:54', 1, 1, '0000-00-00 00:00:00'),
(5, 'Dermatologist', 9, 7, 500, '2019-11-30', '5:30 PM', '2019-11-10 18:41:34', 1, 0, '2019-11-10 18:48:30'),
(6, 'General Physician', 3, 10, 1200, '2020-02-09', '10:45 AM', '2020-02-11 18:36:13', 1, 1, NULL),
(7, 'General Physician', 6, 12, 2500, '2020-02-13', '12:00 AM', '2020-02-13 07:56:18', 0, 1, '2020-02-13 09:33:56'),
(8, 'Ayurveda', 5, 12, 8050, '2020-11-14', '1:45 AM', '2020-02-13 09:35:35', 0, 1, '2020-02-13 09:36:44'),
(9, 'General Physician', 6, 20, 2500, '2020-03-05', '12:15 PM', '2020-02-13 20:09:31', 1, 1, NULL),
(10, 'Homeopath', 2, 21, 600, '2020-02-27', '12:30 PM', '2020-02-13 20:21:12', 0, 1, '2020-02-13 20:39:30'),
(11, 'Homeopath', 2, 22, 600, '2020-05-13', '1:15 AM', '2020-02-14 09:16:00', 0, 1, '2020-02-14 09:16:26'),
(12, 'Homeopath', 7, 6, 20000, '2020-02-29', '7:00 AM', '2020-02-15 14:48:12', 0, 1, '2020-02-15 14:48:32'),
(13, 'Homeopath', 7, 6, 20000, '2020-02-18', '7:15 AM', '2020-02-18 15:07:04', 1, 1, NULL),
(14, 'Homeopath', 7, 6, 20000, '2020-02-22', '7:15 AM', '2020-02-18 15:09:33', 1, 1, NULL),
(15, 'Homeopath', 7, 12, 20000, '2020-02-18', '12:00 PM', '2020-02-18 19:49:06', 1, 1, NULL),
(16, 'Bones Specialist demo', 12, 12, 3000, '2020-02-18', '12:00 PM', '2020-02-18 21:14:07', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `d_id` int(255) NOT NULL,
  `d_specilization` varchar(255) DEFAULT NULL,
  `d_name` varchar(255) DEFAULT NULL,
  `d_address` longtext DEFAULT NULL,
  `d_fees` varchar(255) DEFAULT NULL,
  `d_contact` bigint(11) DEFAULT NULL,
  `d_email` varchar(255) DEFAULT NULL,
  `d_password` varchar(255) DEFAULT NULL,
  `d_date` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `d_gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`d_id`, `d_specilization`, `d_name`, `d_address`, `d_fees`, `d_contact`, `d_email`, `d_password`, `d_date`, `updationDate`, `d_gender`) VALUES
(1, 'Dentist', 'Anuj', 'New Delhi', '500', 8285703354, 'anuj.lpu1@gmail.com', '123', '2016-12-29 06:25:37', '2020-02-12 20:26:57', ''),
(2, 'Homeopath', 'Sarita Pandey', 'Varanasi', '600', 2147483647, 'sarita@gmail.com', '123', '2016-12-29 06:51:51', '2020-02-12 20:28:09', ''),
(3, 'General Physician', 'Nitesh Kumar', 'Ghaziabad', '1200', 8523699999, 'nitesh@gmail.com', '123', '2017-01-07 07:43:35', '2020-02-12 20:27:57', ''),
(4, 'Homeopath', 'Vijay Verma', 'New Delhi', '700', 25668888, 'vijay@gmail.com', '123', '2017-01-07 07:45:09', '2020-02-12 20:27:47', ''),
(5, 'Ayurveda', 'Sanjeev', 'Gurugram', '8050', 442166644646, 'sanjeev@gmail.com', '123', '2017-01-07 07:47:07', '2020-02-12 20:27:34', ''),
(6, 'General Physician', 'Amrita', 'New Delhi India', '2500', 45497964, 'amrita@test.com', '123', '2017-01-07 07:52:50', '2020-02-12 20:27:26', ''),
(7, 'Homeopath', 'abcd', 'SNew Delhi India', '20000', 123540, 'test@demo.com', '123', '2017-01-07 08:08:58', '2020-02-14 18:59:29', ''),
(9, 'Dermatologist', 'Anuj kumar', 'New Delhi India 110001', '500', 1234567890, 'anujk@test.com', '123', '2019-11-10 18:37:47', '2020-02-12 20:27:03', ''),
(11, 'hello', 'hello', 'bubchbw', '3000', 65565262, 'ecwe cj we', '1', '2020-02-14 19:43:39', NULL, 'female'),
(12, 'Bones Specialist demo', 'Abhimanyu', 'VPO Shahpur kangra', '3000', 8219245053, 'admin@admin.com', '1', '2020-02-18 21:11:24', NULL, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `useremail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(26, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-02-18 12:17:12', '2020-02-19 23:47:16', 0),
(27, 0, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-02-20 07:43:58', NULL, 1),
(28, 0, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2020-02-20 07:47:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist/Obstetrician', '2016-12-28 06:37:25', '0000-00-00 00:00:00'),
(2, 'General Physician', '2016-12-28 06:38:12', '0000-00-00 00:00:00'),
(3, 'Dermatologist', '2016-12-28 06:38:48', '0000-00-00 00:00:00'),
(4, 'Homeopath', '2016-12-28 06:39:26', '0000-00-00 00:00:00'),
(5, 'Ayurveda', '2016-12-28 06:39:51', '0000-00-00 00:00:00'),
(6, 'Dentist', '2016-12-28 06:40:08', '0000-00-00 00:00:00'),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2016-12-28 06:41:18', '0000-00-00 00:00:00'),
(9, 'Demo test', '2016-12-28 07:37:39', '0000-00-00 00:00:00'),
(10, 'Bones Specialist demo', '2017-01-07 08:07:53', '0000-00-00 00:00:00'),
(11, 'Test', '2019-06-23 17:51:06', '2019-06-23 17:55:06'),
(12, 'Dermatologist', '2019-11-10 18:36:36', '2019-11-10 18:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_images`
--

CREATE TABLE `doctor_images` (
  `d_id` int(255) NOT NULL,
  `d_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_images`
--

INSERT INTO `doctor_images` (`d_id`, `d_image`) VALUES
(0, 'logo.jpg'),
(0, 'logo.jpg'),
(0, 'logo.jpg'),
(0, 'logo.jpg'),
(0, 'logo.jpg'),
(0, 'logo.jpg'),
(11, 'logo.jpg'),
(12, 'doctor4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_username` varchar(100) NOT NULL,
  `p_address` text NOT NULL,
  `p_contact` varchar(255) NOT NULL,
  `p_city` text NOT NULL,
  `p_gender` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_password` varchar(255) NOT NULL,
  `p_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`p_id`, `p_name`, `p_username`, `p_address`, `p_contact`, `p_city`, `p_gender`, `p_email`, `p_password`, `p_date`) VALUES
(2, 'Abhimanyu', 'abbhi', '', '', '', '0', '', '', '2020-02-11 13:30:42'),
(3, 'Abhimanyu', 'abbhi', 'VPO Shahpur kangra', '', '', '0', '', '', '2020-02-11 13:32:01'),
(4, 'Abhimanyu', 'abbhi', 'VPO Shahpur kangra', '656', 'Kangra', '0', '', '', '2020-02-11 13:33:11'),
(5, 'Abhimanyu', 'abbhi', 'VPO Shahpur kangra', '656', 'Kangra', '0', '', '', '2020-02-11 13:34:06'),
(6, 'Abhimanyu', 'abbhi', 'VPO Shahpur kangra', '656', 'Kangra', '0', 'asd', '1', '2020-02-15 14:45:27'),
(7, 'Test', 'tes', 'VPO Shahpur ', '656', 'Kangra', '0', 'test@gmail.com', '', '2020-02-11 13:40:09'),
(8, 'Test', 'tes', 'VPO Shahpur ', '656', 'Kangra', '0', 'test@gmail.com', '', '2020-02-11 13:41:11'),
(9, 'Test', 'tes', 'VPO Shahpur ', '656', 'Kangra', '0', 'test@gmail.com', 'test', '2020-02-11 13:42:18'),
(10, 'Test', 'tes', 'VPO Shahpur ', '656', 'Kangra', 'male', 'test@gmail.com', 'test', '2020-02-11 13:45:54'),
(11, 'Test', 'tes', 'VPO Shahpur ', '656', 'Kangra', 'male', 'test@gmail.com', 'test', '2020-02-11 13:49:06'),
(12, 'Rohit Mehta', 'rohit', 'NIT hamirpur', '8219245053', 'hamirpur', 'male', 'rohit@gmail.com', '1', '2020-02-13 06:09:41'),
(13, 'yogesh', 'yogi', 'nit', '452872', 'hamirpur', 'male', 'yogesh@gmail.com', 'yogi', '2020-02-11 18:00:49'),
(14, 'test ing', 'test', 'khikhd', '5615616', 'hjbbjb', 'female', 'test@gmail.com', '1', '2020-02-13 17:58:45'),
(15, 'test ing', 'test', 'khikhd', '5615616', 'hjbbjb', 'female', 'test@gmail.com', '1', '2020-02-13 18:01:51'),
(16, 'test ing', 'test', 'khikhd', '5615616', 'hjbbjb', 'female', 'test@gmail.com', '1', '2020-02-13 18:06:25'),
(17, 'Abhimanyu', '', 'VPO Shahpur kangra', '8219245050', 'Kangra1', 'male', 'abhi@123', '1', '2020-02-13 18:14:49'),
(18, 'asd', 'abc', 'VPO Shahpur kangra', '8219245053', 'Kangra', 'male', 'abc@123', '1', '2020-02-13 19:40:38'),
(19, 'asd we', '12', 'VPO Shahpur kangra', '8219245053', 'Kangra', 'female', 'qwqdsd', '1', '2020-02-13 19:43:31'),
(20, 'AbhimanyuS', 'abhimanyus', 'VPO Shahpur kangra', '5615616', 'Kangra', 'male', 'asdc@gmail.com', '1', '2020-02-13 19:45:17'),
(21, 'teste ing', 'hello', '123s', '26165161', 'Kangra', 'female', 'vyvchah@gmail.com', '1', '2020-02-13 20:17:28'),
(22, 'abhi', 'ABHI', 'bhi', '65161121', 'jijbdbkasn', 'female', 'vshs bjas@gmail', '1', '2020-02-14 09:15:28'),
(23, 'yogesh1', 'yoge', 'nit', '16662136', 'hamirpur', 'male', 'vhvdu@gmail.com', '123', '2020-02-24 12:12:27'),
(24, 'yogesh1', 'yo', 'nit', '35156161', 'hamirpur', 'male', 'jsuavchv@gmail.com', '123', '2020-02-24 12:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `patient_images`
--

CREATE TABLE `patient_images` (
  `p_id` int(100) NOT NULL,
  `p_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_images`
--

INSERT INTO `patient_images` (`p_id`, `p_image`) VALUES
(1, 'images/logo.jpg'),
(2, 'images/logo.jpg'),
(7, 'images/logo.jpg'),
(17, 'WIN_20200128_00_09_26_Pro.jpg'),
(18, 'logo.jpg'),
(19, 'logo.jpg'),
(20, 'WIN_20200205_23_18_06_Pro.jpg'),
(21, 'WIN_20200128_00_09_26_Pro.jpg'),
(22, 'WIN_20200205_23_18_06_Pro.jpg'),
(23, 'logo.jpg'),
(24, 'logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pmedicalhis`
--

CREATE TABLE `pmedicalhis` (
  `pmh_id` int(11) NOT NULL,
  `p_id` int(255) NOT NULL,
  `p_contact` varchar(255) NOT NULL,
  `p_diagnose` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `p_laboratory` text NOT NULL,
  `p_weight` int(255) NOT NULL,
  `p_temprature` int(255) NOT NULL,
  `p_bloodgroup` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmedicalhis`
--

INSERT INTO `pmedicalhis` (`pmh_id`, `p_id`, `p_contact`, `p_diagnose`, `date`, `p_laboratory`, `p_weight`, `p_temprature`, `p_bloodgroup`) VALUES
(2, 12, '8558903421', 'sugar type1', '2020-02-18 21:07:32', 'Dr.Lagpath Lab Test', 60, 90, 'AB+'),
(3, 6, '81561652', 'sugarn', '2020-02-18 19:28:58', 'Dr Hanspath Labs', 45, 12, 'AB+');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `useremail` varchar(255) NOT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `useremail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(39, 10, 'aschittoria1@hotmail.com', '', 0x3a3a3100000000000000000000000000, '2020-02-13 20:37:26', NULL, 1),
(40, NULL, NULL, '', 0x3a3a3100000000000000000000000000, '2020-02-20 07:10:49', NULL, NULL),
(44, 12, 'rohit', 'rohit@gmail.com', 0x3a3a3100000000000000000000000000, '2020-02-20 07:27:48', '2020-02-19 23:28:03', 0),
(45, 12, 'rohit', 'rohit@gmail.com', 0x3a3a3100000000000000000000000000, '2020-02-24 12:00:42', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `patient_images`
--
ALTER TABLE `patient_images`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pmedicalhis`
--
ALTER TABLE `pmedicalhis`
  ADD PRIMARY KEY (`pmh_id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `d_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `patient_images`
--
ALTER TABLE `patient_images`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pmedicalhis`
--
ALTER TABLE `pmedicalhis`
  MODIFY `pmh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
