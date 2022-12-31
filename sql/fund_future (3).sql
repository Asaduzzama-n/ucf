-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 11:30 AM
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
  `user_id` varchar(20) NOT NULL,
  `camp_name` varchar(100) NOT NULL,
  `campaigner_email` varchar(50) NOT NULL,
  `campaigner_phn` varchar(15) NOT NULL,
  `camp_desc` varchar(800) NOT NULL,
  `target_amount` int(100) NOT NULL,
  `camp_img` varchar(100) NOT NULL,
  `camp_file` varchar(100) NOT NULL,
  `camp_date_s` date NOT NULL,
  `camp_date_f` date NOT NULL,
  `camp_status` int(10) NOT NULL DEFAULT 2 COMMENT '0=canceled,1=active,2=pending,3=finished\r\n\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`campaign_id`, `user_id`, `camp_name`, `campaigner_email`, `campaigner_phn`, `camp_desc`, `target_amount`, `camp_img`, `camp_file`, `camp_date_s`, `camp_date_f`, `camp_status`) VALUES
(12, '011193146', 'Campaign for tutuion fee', 'asad@gmail.com', '01889126591', 'I have already failed to pay my first installment this trimester due to some financial issues. Now I want to pay the full amount but I am short of 10000 tk.', 10000, '9115943996.PNG', '2108394341IBYRBZ.pdf', '0000-00-00', '0000-00-00', 3),
(17, '011193114', 'g', 'g@g.com', '324', 'g', 345345, '269430178AGE.png', '2125873543a.pdf', '0000-00-00', '0000-00-00', 1),
(18, '011193114', 'g', 'g@g.com', '324', 'g', 345345, '787898582AGE.png', '1473548146a.pdf', '0000-00-00', '0000-00-00', 2),
(20, '011193114', 'j', 'j@j.c', '4656', 'j', 5666666, '8427992717.PNG', '1070018396mathC.pdf', '0000-00-00', '0000-00-00', 0),
(21, '011193146', 'ASD', 'a@mail.com', '20984398274', 'dasdffsdasdf', 10000, '4644197037.PNG', '129259494CourseOutline .pdf', '0000-00-00', '0000-00-00', 3),
(22, '011193146', 'KISUNA', 'kashem@gmail.com', '017*******', 'KISUNA', 10000, '1156693713DSC_0280-01-01.jpeg', '898757745011193146.pdf', '0000-00-00', '0000-00-00', 3);

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

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `doner_id`, `amount`, `target_amount`, `payment_method`, `transaction_id`, `campaign_id`, `date`) VALUES
(25, 11193146, 334, 10000, 'Rocket', 'ASdzcxz', 12, '2022-12-18 04:55:20'),
(26, 11193146, 5, 10000, 'Bkash', 'asgzsdg', 12, '2022-12-18 04:56:10'),
(27, 11193146, 45, 10000, 'Rocket', 'ASd', 12, '2022-12-18 04:56:33'),
(28, 11193146, 4500, 10000, 'Rocket', 'RVcX4J', 12, '2022-12-18 06:12:27'),
(29, 11193146, 1000, 10000, 'Bkash', 'TcHS5', 12, '2022-12-18 06:35:53'),
(30, 11193146, 1000, 10000, 'Rocket', 'TJK69B', 12, '2022-12-18 06:36:10'),
(31, 11193146, 34, 345345, 'Bkash', 'fzg', 17, '2022-12-19 07:18:31'),
(32, 11193146, 345, 345345, 'Bkash', 'GHYCF', 17, '2022-12-20 12:22:33'),
(33, 11193146, 546456, 345345, 'Rocket', 'aaaaa', 18, '2022-12-20 12:25:48'),
(34, 11193146, 4353, 345345, 'Bkash', 'aDSada', 17, '2022-12-20 12:27:24'),
(35, 11193146, 333335, 345345, 'Bkash', 'aaaaaaaaa', 17, '2022-12-20 12:27:41'),
(36, 11193146, 345354, 10000, 'Rocket', 'dfghj', 12, '2022-12-20 04:07:02'),
(37, 11193146, 56456, 5666666, 'Rocket', 'asdf', 20, '2022-12-20 04:23:37'),
(38, 11193146, 122222, 5666666, 'Bkash', 'asdasda', 20, '2022-12-24 09:32:58'),
(39, 11193111, 1000, 5666666, 'Bkash', 'THJU8', 20, '2022-12-25 11:03:23'),
(40, 11193111, 40000, 5666666, 'Rocket', 'fdsgsdfgsdfg', 20, '2022-12-25 11:03:40'),
(41, 11193111, 546456, 5666666, 'Rocket', 'dsasfa', 20, '2022-12-25 11:03:58'),
(42, 11193111, 100000, 5666666, 'Rocket', 'sdfgsdf', 20, '2022-12-25 11:04:09'),
(43, 11193111, 2343, 10000, 'Bkash', 'adasdas', 21, '2022-12-25 11:06:36'),
(44, 11184111, 1000, 10000, 'Bkash', 'aaaaaa', 22, '2022-12-27 12:19:20'),
(45, 11193146, 56654, 345345, 'Bkash', 'sdsfd', 17, '2022-12-28 08:07:31');

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
  `u_profile` varchar(300) NOT NULL DEFAULT 'NULL',
  `u_image` varchar(200) DEFAULT NULL,
  `u_designation` varchar(50) NOT NULL,
  `u_status` int(10) NOT NULL DEFAULT 2 COMMENT '0=canceled,1=active,2=pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `password`, `f_name`, `l_name`, `u_department`, `u_phone`, `u_email`, `u_profile`, `u_image`, `u_designation`, `u_status`) VALUES
(9, '11193146', '3066ae72739e663244a565eebc7361', 'Asaduzzaman', 'Asad', 'CSE', '01889126591', 'asaduzzaman193146@gmail.com', 'NULL', '1618076359.PNG', 'Student', 1),
(22, '011193114', '03c7c0ace395d80182db07ae2c30f0', 'Huzzatul', 'Jannat', 'CSE', '017********', 'Huzzatul@gmail.com', 'NULL', '1095729545Untitled.svg', 'Student', 1),
(24, '011193146', '140b543013d988f4767277b6f45ba5', 'Asaduzzaman', 'Shanto', 'CSE', '01889126591', 'asad12345@gmail.com', '9499181551-messi-limited-edition-crystal-boots-adidas-min.jpg', '8397134696.PNG', 'Student', 1),
(25, '011193111', '140b543013d988f4767277b6f45ba5', 'Shanto', 'Asad', 'CSE', '01889126591', 'asadshanto310@gmail.com', '1152172429DSC_0143-01-01.jpeg', '174428250511.PNG', 'Student', 0),
(26, '011184545', 'b4e384c0a4c8bedd9dc3e2c33e748c', 'Bodi', 'Mia', 'CSE', '017*******', 'bodi@gmail.com', 'NULL', '1263191070Occupation.png', 'Student', 0),
(27, '011184111', '617eb9cdc5dee39804ff0b7ea0047a', 'Abul', 'Kashem', 'BBA', '017*******', 'kashem@gmail.com', '690858960DSC_0195.JPG', '32674139813.PNG', 'Faculty', 1);

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
  ADD PRIMARY KEY (`campaign_id`);

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
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `userIdConstraint` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`campaign_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
