-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 03:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(7) NOT NULL,
  `a_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `bank_info` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `a_name`, `email`, `password`, `phone_no`, `bank_info`) VALUES
(1, 'akib', 'akib@gmail.com', '1234', 1162538132, 1243513425),
(2, 'Rakib', 'rakib@gmail.com', '8903', 1926341231, 2015627112),
(3, 'Rohan', 'rohan@gmail.com', '23410', 1112431523, 1425631324),
(4, 'Hridi', 'hridita1831@gmail.com', 'check', 123456, 123456);

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `count` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `venue_id` int(10) NOT NULL,
  `planner_id` int(10) NOT NULL,
  `photo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photographer`
--

CREATE TABLE `photographer` (
  `p_id` int(7) NOT NULL,
  `p_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `bank_info` int(100) NOT NULL,
  `cost` int(200) NOT NULL,
  `package` text NOT NULL,
  `date` date NOT NULL,
  `time` time(3) NOT NULL,
  `booked` tinyint(1) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographer`
--

INSERT INTO `photographer` (`p_id`, `p_name`, `email`, `address`, `phone_no`, `bank_info`, `cost`, `package`, `date`, `time`, `booked`, `uid`) VALUES
(1, 'BD Photographers', 'bdphotographer@gmail.com', '146/1, Green Road (4th floor), Dhaka 1215', 1756437889, 91234, 50000, '200 pictures & 1 cinematography=30000tk\r\n\r\n300 pictures & 2 cinematography= 50000tk\r\n\r\n1 vipphotographer & 2 other photographer for 4hrs= 70000tk\r\n\r\n2cinematography & 500 picture=70000tk', '0000-00-00', '00:00:00.000', 0, 1),
(2, 'Bridal Heritage', 'bheritage@gmail.com', 'New Baily Rd, Dhaka 1205\r\n', 183762585, 74536, 70000, '100 pictures & 1 cinematography=25000tk\r\n\r\n350 pictures & 2 cinematography= 50000tk\r\n\r\n1 vip photographer & 1 other photographer for 4hrs= 70000tk\r\n\r\n2cinematography & 600 picture=90000tk', '0000-00-00', '00:00:00.000', 0, 2),
(3, 'Wedding Story Bangladesh', 'weddings34@gmail.com', 'House 155, Road No-4, Apt 501, Block A Niketon, Dhaka 1212\r\n', 1911999888, 87345, 65000, '1 photographer & 1vip photographer =65000tk\r\n\r\n1cinematography & 100 photos=55000tk\r\n\r\n250 photo & 2cinematography= 70000tk', '0000-00-00', '00:00:00.000', 0, 3),
(4, 'ArtLand Dhaka\r\n', 'artland@yahoo.com', 'youth club, niloy house 11, flat 501, road 108, gulshan 2 near gulshan, Dhaka 1213\r\n', 1931313232, 87653, 90000, '1 photographer & 1vip photographer =70000tk\r\n\r\n1cinematography & 300 photos=85000tk\r\n\r\n350 photo & 2cinematography= 100000tk', '0000-00-00', '00:00:00.000', 0, 4),
(5, 'Wedding Moments\r\n', 'weddingmom@yahoo.com', '3rd floor, House, 354 Rd No 27, Dhaka 1206\r\n', 1799445555, 87652, 65000, '1 vip photographer & 2 other photographer =900000tk\r\n\r\n1 cinematography & 400 photo= 67000tk\r\n\r\n2 cinematography & 350 photo= 85000tk', '0000-00-00', '00:00:00.000', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `planner`
--

CREATE TABLE `planner` (
  `pl_id` int(7) NOT NULL,
  `pl_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `bank_info` int(100) NOT NULL,
  `cost` int(200) NOT NULL,
  `package` text NOT NULL,
  `date` date NOT NULL,
  `time` time(3) NOT NULL,
  `booked` tinyint(1) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planner`
--

INSERT INTO `planner` (`pl_id`, `pl_name`, `email`, `address`, `phone_no`, `bank_info`, `cost`, `package`, `date`, `time`, `booked`, `uid`) VALUES
(1, 'Dhaka Event Planner and Event Management', 'Dplanner@yahoo.com', '16 Kemal Ataturk Avenue, Dhaka 1213\r\n', 1777044241, 46328, 200000, '1 stage,carpeting,photo booth,dinner table= 200000tk\r\n1 stage,carpeting,dinner table= 150000tk\r\n1 stage, chandelier, dinner table cloth,flowers, photo booth, carpet, =500000tk', '0000-00-00', '00:00:00.000', 0, 1),
(2, 'BD Event Management & Wedding Planners', 'BDMWP@gmail.com', '3rd Floor, House C -34, Block E, Zakir Hossain Road On The Way To Townhall To Lalmatia Women\'s Colle', 1719344312, 56743, 2000000, '1 stage,carpeting,photo booth,dinner table= 150000tk\r\n1 stage,carpeting,dinner table,lighting= 150000tk\r\n1 stage, chandelier, dinner table cloth,flowers, photo booth, carpet,lighting =5500000tk', '0000-00-00', '00:00:00.000', 0, 2),
(3, 'SYGMAZ Wedding Planner & Event Management\r\n', 'sygmazpla@yahoo.com', 'House 36, Apt. B2, Block J Road 18 Dhaka, 1213\r\n', 1973036060, 98762, 500000, '1 stage, lighting,carpeting,flower vase,table cloth=500000tk\r\n\r\n1 stage,lighting,carpeting,photo booth,chandelier,flower=600000tk\r\n\r\n1 stage,carpeting,table cloth=300000tk\r\n', '0000-00-00', '00:00:00.000', 0, 3),
(4, 'Shine Stream Wedding Planner & Event Management\r\n', 'shinesm87@yahoo.com', 'Suit:7/2 ;6th Floor ,Estern Plaza Commercial Complex, Hatirpool, Dhaka -1205 1205\r\n', 1914454535, 98224, 350000, '1 stage, flower vase,table cloth, carpeting=200000tk\r\n\r\n1 stage,flower vase,table cloth,chandelier=400000tk\r\n\r\n1 stage,flower vase,table cloth,chandelier, photo booth=600000tk', '0000-00-00', '00:00:00.000', 0, 4),
(6, 'Wedding Planner DH\r\n', 'wplannerdh@yahoo.com', 'Shop No: 1, University Market, Kataban, Dhaka 1000\r\n', 1815559703, 87634, 350000, '1 stage, flower vase,table cloth, carpeting,lighting=300000tk\r\n\r\n1 stage,flower vase,table cloth,chandelier=400000tk\r\n\r\n1 stage,flower vase,table cloth,chandelier, photo booth=500000tk', '0000-00-00', '00:00:00.000', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(7) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `bank_info` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `vb` tinyint(1) NOT NULL,
  `plb` tinyint(1) NOT NULL,
  `phb` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `address`, `phone_no`, `bank_info`, `password`, `vb`, `plb`, `phb`) VALUES
(0, 'Adit Al Razi', 'adit@gmail.com', 'Dhaka', 184658, 455, '123456', 0, 0, 0),
(1, 'Abdul Karim', 'abdul23@gamil.com', 'house-2,road-3,gulshan-1,Dhaka', 1976543232, 29093, 'abk345', 0, 0, 0),
(2, 'Hridita Tabasum', 'HRIDI67@gmail.com', '23,mogbazar,dhaka', 1761545384, 87623, 'hrd9823', 0, 0, 0),
(3, 'Gitanjoli Gosh', 'jitajolijosh@yahoo.com', '1/12, road-3, Niketon, Dhaka', 1987654367, 98765, 'jitijiti4', 0, 0, 0),
(4, 'Israt Jui', 'juitel24@yahoo.com', '12/61,road-12,Comilla', 183762585, 876523, 'juitel34', 0, 0, 0),
(5, 'Mutasimur', 'mutasimur@gmail.com', '9A,road-12A, Dhanmondi, Dhaka', 123456, 10244, 'm123', 0, 1, 0),
(6, 'Anik Rahman', 'anik09@yahoo.com', '12/4,beside brac university,Mohakhali,Dhaka', 181766543, 457793, 'lkjy1234', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `v_id` int(7) NOT NULL,
  `v_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `bank_info` int(100) NOT NULL,
  `cost` bigint(255) NOT NULL,
  `capacity` int(200) NOT NULL,
  `date` date NOT NULL,
  `vtime` time(3) NOT NULL,
  `booked` tinyint(1) NOT NULL,
  `uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`v_id`, `v_name`, `email`, `address`, `phone_no`, `bank_info`, `cost`, `capacity`, `date`, `vtime`, `booked`, `uid`) VALUES
(300004, 'Officer\'s Club', 'officersclub@gmail.com', 'Baily Road,Dhaka', 300000001, 123456789, 25000, 200, '2019-12-01', '15:07:00.000', 0, 1),
(300005, 'Celebration', 'celebration@gmail.com', 'Mogbazar,dhaka', 300000005, 123456790, 15000, 150, '2019-12-31', '12:00:00.000', 0, 16),
(3000001, 'Changpai Restaurant', 'chang@gmail.com', 'oarles,dhaka', 1839515240, 12109006, 0, 128, '2019-11-26', '20:53:00.000', 0, 18),
(3000007, 'Pan Pacific Sonargaon', 'damihotel@gmail.com', 'Karoan Bazar,Dhaka', 998998998, 212120987, 1520000, 20, '2019-11-26', '19:00:00.000', 0, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `bank_info` (`bank_info`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `photographer`
--
ALTER TABLE `photographer`
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `planner`
--
ALTER TABLE `planner`
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD UNIQUE KEY `count` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photographer`
--
ALTER TABLE `photographer`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `planner`
--
ALTER TABLE `planner`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
