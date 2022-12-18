-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 08:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fund_future`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `camp_name` varchar(100) NOT NULL,
  `campaigner_email` varchar(50) NOT NULL,
  `campaigner_phn` varchar(15) NOT NULL,
  `camp_desc` varchar(800) NOT NULL,
  `target_amount` int(100) NOT NULL,
  `camp_img` varchar(100) NOT NULL,
  `camp_file` varchar(100) NOT NULL,
  `camp_date_s` date NOT NULL,
  `camp_date_f` date NOT NULL,
  `camp_status` int(10) NOT NULL DEFAULT 2 COMMENT '0=canceled,1=approved,2=pending,3=finished,4=active\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(10) NOT NULL,
  `doner_id` int(50) NOT NULL,
  `amount` int(20) NOT NULL,
  `target_amount` int(60) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `campaign_id` int(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `u_department` varchar(50) NOT NULL,
  `u_phone` varchar(15) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_image` varchar(200) NOT NULL,
  `u_designation` varchar(50) NOT NULL,
  `u_status` int(10) NOT NULL DEFAULT 2 COMMENT '0=canceled,1=active,2=pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `password`, `f_name`, `l_name`, `u_department`, `u_phone`, `u_email`, `u_image`, `u_designation`, `u_status`) VALUES
(9, '11193146', '3066ae72739e663244a565eebc7361', 'Asaduzzaman', 'Asad', '1', '01889126591', 'asaduzzaman193146@gmail.com', '1618076359.PNG', '1', 2),
(22, '011193114', '03c7c0ace395d80182db07ae2c30f0', 'Huzzatul', 'Jannat', '1', '017********', 'Huzzatul@gmail.com', '1095729545Untitled.svg', '1', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaign_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`campaign_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
