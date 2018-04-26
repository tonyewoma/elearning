-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2017 at 07:14 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` text NOT NULL,
  `admin_pass` text NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `reg_date`) VALUES
(1, 'Good', 'good@gmail.com', 'mypassword', '2016-12-23 03:11:24'),
(2, 'Anthony', 'mypassword@gmail.com', '34819d7beeabb9260a5c854bc85b3e44', '2016-12-23 05:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `datecreated` datetime NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `datecreated`, `admin_id`, `admin_name`) VALUES
(1, 'ND 1 Full Time', '2016-12-27 05:43:06', 2, 'Anthony'),
(2, 'ND 2 Full Time', '2016-12-27 05:45:52', 2, 'Anthony'),
(3, 'ND 1 Part Time', '2016-12-27 13:40:03', 2, 'Anthony'),
(4, 'ND 2 Part Time', '2016-12-27 13:40:20', 2, 'Anthony'),
(5, 'ND 3 Part Time', '2016-12-27 13:40:38', 2, 'Anthony'),
(6, 'HND 1 Full Time', '2016-12-27 13:41:03', 2, 'Anthony'),
(7, 'HND 2 Full Time', '2016-12-27 13:41:18', 2, 'Anthony'),
(8, 'HND 1 Part Time', '2016-12-27 13:41:42', 2, 'Anthony'),
(9, 'HND 2 Part Time', '2016-12-27 13:42:14', 2, 'Anthony'),
(10, 'HND 3 Part Time', '2016-12-27 13:49:28', 2, 'Anthony');

-- --------------------------------------------------------

--
-- Table structure for table `club_material`
--

CREATE TABLE `club_material` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `level` varchar(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club_material`
--

INSERT INTO `club_material` (`id`, `title`, `level`, `image`) VALUES
(1, '01-ITF-tutorial-review-questions', 'ND1PartTime', 0x75706c6f6164732f30312d4954462d7475746f7269616c2d7265766965772d7175657374696f6e732e706466);

-- --------------------------------------------------------

--
-- Table structure for table `groupname`
--

CREATE TABLE `groupname` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `datecreated` datetime NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `course` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `course`, `level`, `user_email`, `user_pass`) VALUES
(1, 'admin', 'Computer Science', 'ND2FullTime', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'mygood', 'Computer Technology', 'ND2PartTime', 'mygood@gmail.com', '34819d7beeabb9260a5c854bc85b3e44');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videoID` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `level` varchar(100) NOT NULL,
  `video` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videoID`, `title`, `level`, `video`) VALUES
(4, 'Android Application Development Tutorial - 39 - Starting an Activity for a Result', 'ND2FullTime', 0x766964656f732f416e64726f6964204170706c69636174696f6e20446576656c6f706d656e74205475746f7269616c202d203339202d205374617274696e6720616e20416374697669747920666f72206120526573756c742e666c76),
(14, 'Laravel Tutorial Part 2 - Migrations and Artisan', 'ND2PartTime', 0x766964656f732f4c61726176656c205475746f7269616c20506172742032202d204d6967726174696f6e7320616e64204172746973616e2e6d7034),
(13, 'Laravel Tutorial Part 1 - Installation and Configuration', 'ND2PartTime', 0x766964656f732f4c61726176656c205475746f7269616c20506172742031202d20496e7374616c6c6174696f6e20616e6420436f6e66696775726174696f6e2e6d7034),
(15, 'Laravel Tutorial Part 4 - Views, Blade, and Layouts', 'HND2PartTime', 0x766964656f732f4c61726176656c205475746f7269616c20506172742034202d2056696577732c20426c6164652c20616e64204c61796f7574732e6d7034);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_material`
--
ALTER TABLE `club_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupname`
--
ALTER TABLE `groupname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `club_material`
--
ALTER TABLE `club_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groupname`
--
ALTER TABLE `groupname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
