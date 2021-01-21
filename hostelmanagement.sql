-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 06:01 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `hostelmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'NOT NULL',
  `email` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `date`, `author`, `email`, `phone`, `text`) VALUES
(1200, '2018-03-16', 'kadir shaikh', 'kadir@gmail.com', '8600945599', 'helloo'),
(1201, '2018-03-16', 'kadir shaikh', 'kadir@gmail.com', '8600945599', 'helloo'),
(1202, '2018-03-25', 'isha', 'abc@gmail.com', '989000078', 'bbb'),
(1203, '2018-03-25', 'kadir', 'kair', '7896511277', 'kadir'),
(1204, '2018-03-25', 'ka', 'ksir@gmali.com', '7896541230', 'kadir');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `no_of_year` int(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `no_of_year`, `status`) VALUES
(1, 'bca', 2013, 'Enabled'),
(4, 'puc', 3, 'Enabled'),
(5, 'mca', 3, 'Enabled'),
(7, 'ba', 3, 'Enabled'),
(8, 'bcom', 3, 'Enabled'),
(9, 'bbm', 3, 'Enabled'),
(11, 'bsc', 2, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fbid` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `responce` text,
  `stid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fbid`, `feedback`, `responce`, `stid`) VALUES
(9000, 'kadir', 'sss', 47),
(9001, 'Please make sure to pesticide in room no 24', 'Ok i will make it done within 2 days', 48);

-- --------------------------------------------------------

--
-- Table structure for table `fees_structure`
--

CREATE TABLE `fees_structure` (
  `fee_str_id` int(10) NOT NULL,
  `stid` int(10) NOT NULL,
  `fee_type` varchar(25) NOT NULL,
  `cost` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_structure`
--

INSERT INTO `fees_structure` (`fee_str_id`, `stid`, `fee_type`, `cost`, `status`) VALUES
(2, 1, 'Mess bill', 5000.00, 'Enabled'),
(3, 7, 'Establishment Fee', 3000.00, 'Enabled'),
(4, 7, 'Light and Water Bill', 5000.00, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `forget_pass`
--

CREATE TABLE `forget_pass` (
  `fpid` int(11) NOT NULL,
  `question` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forget_pass`
--

INSERT INTO `forget_pass` (`fpid`, `question`) VALUES
(1, 'Which phone number do you remember most from your childhood?'),
(2, 'What was your favorite place to visit as a child?'),
(3, 'Who is your favorite actor, musician, or artist?'),
(4, 'What is the name of your favorite pet?'),
(5, 'In what city were you born?'),
(6, 'What is your favorite movie?');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `lid` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `stid` int(11) DEFAULT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`lid`, `sdate`, `edate`, `status`, `stid`, `reason`) VALUES
(4000, '2019-02-22', '2019-02-25', 'Accept', 47, 'Some reason'),
(4001, '2019-03-09', '2019-03-16', 'Accept', 48, 'Brother marrage');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `nid` int(11) NOT NULL,
  `notice` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`nid`, `notice`) VALUES
(1701, 'I will be on leave on today'),
(1702, 'hii this is a demo notice'),
(1703, 'This is a demo notic example.');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `pid` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `address` text,
  `cno` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `acard` varchar(20) DEFAULT NULL,
  `stid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`pid`, `name`, `address`, `cno`, `email`, `acard`, `stid`) VALUES
(1251, 'Abcc', 'Camp', '7896541230', 'Xyz@gmail.com', '859674589652', 3),
(1252, 'bashir', 'camp', '9665058889', 'bashir@gmail.com', '2002854689410', 45);

-- --------------------------------------------------------

--
-- Table structure for table `registered_stud`
--

CREATE TABLE `registered_stud` (
  `rsid` int(11) NOT NULL,
  `rno` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_stud`
--

INSERT INTO `registered_stud` (`rsid`, `rno`, `status`) VALUES
(1200, 101, 1),
(1201, 102, 1),
(1202, 103, 0),
(1203, 104, 1),
(1204, 105, 0),
(1205, 106, 0),
(1206, 107, 0),
(1207, 108, 0),
(1208, 109, 0),
(1209, 110, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(10) NOT NULL,
  `stid` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `stud_type` varchar(25) NOT NULL COMMENT 'hosteler, day scholar',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `food_type` varchar(25) NOT NULL,
  `beverage_type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `stid`, `room_id`, `stud_type`, `start_date`, `end_date`, `food_type`, `beverage_type`, `status`) VALUES
(4, 3, 2, 'Hosteler', '2014-02-13', '2014-03-02', 'Vegeterian', 'Milk', 'Enabled'),
(5, 3, 30, 'Hosteler', '2014-03-13', '2014-03-13', 'Non-vegeterian', 'Milk', 'Enabled'),
(6, 6, 29, 'Hosteler', '2014-03-05', '2014-03-26', 'Vegeterian', 'Milk', 'Enabled'),
(7, 9, 12, 'Hosteler', '2014-03-06', '2014-03-28', 'Vegeterian', 'Milk', 'Enabled'),
(10, 11, 13, 'Hosteler', '2014-03-07', '2014-11-13', 'Vegeterian', 'Coffee', 'Enabled'),
(11, 12, 29, 'Hosteler', '2014-03-14', '2014-05-05', 'Vegeterian', 'Coffee', 'Enabled'),
(12, 13, 32, 'Hosteler', '2014-03-20', '2014-03-20', 'Vegeterian', 'Coffee', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_no` int(10) NOT NULL,
  `no_of_beds` int(5) NOT NULL,
  `floor_no` int(11) NOT NULL,
  `washroom` int(11) NOT NULL,
  `description` text NOT NULL,
  `rtid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_no`, `no_of_beds`, `floor_no`, `washroom`, `description`, `rtid`) VALUES
(6, 115, 3, 3, 2, 'sdcjgb', 1),
(17, 121, 1, 1, 1, 'sdcjgb', 2),
(20, 251, 3, 3, 2, 'sdcjgb', 3),
(21, 152, 5, 4, 2, 'sdcjgb', 1),
(22, 123, 5, 4, 2, 'sdcjgb', 2),
(25, 126, 3, 3, 2, 'sdcjgb', 3),
(32, 500, 1, 1, 1, 'this is standard room', 1),
(34, 125, 1, 1, 1, 'test', 2),
(45, 100001, 3, 3, 2, 'info', 3),
(47, 1001, 2, 3, 3, 'Some info', 2),
(48, 1100, 1, 3, 3, 'Some info', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_req`
--

CREATE TABLE `room_req` (
  `rrid` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `stid` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_req`
--

INSERT INTO `room_req` (`rrid`, `type`, `stid`, `status`) VALUES
(18, 'platinum', 45, 'Pending'),
(19, 'Silver', 45, 'Pending'),
(20, 'Gold', 48, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `rtid` int(11) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `room_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`rtid`, `room_type`, `room_price`) VALUES
(1, 'Gold', 10000),
(2, 'Silver', 7000),
(3, 'Bronze', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stid` int(10) NOT NULL,
  `courseid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rollno` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `nat` varchar(50) DEFAULT NULL,
  `contact_no` varchar(15) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `nservice` int(11) NOT NULL DEFAULT '0',
  `mservice` int(11) NOT NULL DEFAULT '0',
  `lservice` int(11) NOT NULL DEFAULT '0',
  `wifi` int(11) NOT NULL DEFAULT '0',
  `vault` int(11) NOT NULL DEFAULT '0',
  `parking` int(11) NOT NULL DEFAULT '0',
  `qid` int(11) DEFAULT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stid`, `courseid`, `name`, `rollno`, `dob`, `gender`, `address`, `city`, `state`, `country`, `nat`, `contact_no`, `blood_group`, `status`, `email`, `password`, `room_id`, `nservice`, `mservice`, `lservice`, `wifi`, `vault`, `parking`, `qid`, `ans`) VALUES
(3, 1, 'Rajj', '111', '2014-01-09', 'Male', 'mangalore', NULL, NULL, NULL, NULL, '789456', 'Ab', 'Enabled', 'aaa@gmail.com', 'abc', 6, 1, 1, 1, 0, 0, 0, 1, 'abc'),
(45, 1, 'kadir', '101', '2001-02-14', 'Female', 'camp', 'pune', 'Maharashtra', 'India', 'Indian', '8547125963', 'AB-', 'Enabled', 'kadir@gmail.com', 'kadir', 20, 0, 1, 1, 1, 1, 0, 2, 'goa'),
(47, 1, 'abc', '102', '2019-02-13', 'Female', 'camp', 'pune', 'Maharashtra', 'India', 'Indian', '7485963210', 'AB', 'Enabled', 'aaa@gmail.com', 'aaa', NULL, 0, 0, 0, 0, 0, 0, 1, 'aaa'),
(48, 1, 'sachin', '104', '2012-05-23', 'Male', 'station', 'pune', 'Maharashtra', 'India', 'Indian', '789641035', 'A+', 'Enabled', 'sachin@gmail.com', 'sachin', 34, 1, 1, 1, 1, 1, 1, 2, 'goa');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `visitorid` int(10) NOT NULL,
  `stid` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `comments` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`visitorid`, `stid`, `name`, `type`, `username`, `password`, `contactno`, `comments`, `status`) VALUES
(4, 3, 'abc', 'Parents', 'visitor', '12345', '7894561', 'test', 'Enabled'),
(5, 3, 'abc', 'Parents', 'aaa@gmail.com', 'aaa', '7894561230', 'test', 'Enabled'),
(7, 6, 'peter', 'Parents', 'peter', '123456', '9874563210', 'test visitor', 'Enabled'),
(9, 12, 'fghd', 'Parents', 'abcdtest', '45645645', 'ghfdgfd', '', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `vistor_req`
--

CREATE TABLE `vistor_req` (
  `vrid` int(11) NOT NULL,
  `dat` date DEFAULT NULL,
  `time` tinyint(4) DEFAULT NULL,
  `vname` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `email` varchar(30) NOT NULL,
  `rel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vistor_req`
--

INSERT INTO `vistor_req` (`vrid`, `dat`, `time`, `vname`, `status`, `email`, `rel`) VALUES
(1, '2019-03-07', 15, 'Laxman', 'Pending', 'sachin@gmail.com', 'Father');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fbid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `fees_structure`
--
ALTER TABLE `fees_structure`
  ADD PRIMARY KEY (`fee_str_id`);

--
-- Indexes for table `forget_pass`
--
ALTER TABLE `forget_pass`
  ADD PRIMARY KEY (`fpid`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `stid` (`stid`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `sdid` (`stid`);

--
-- Indexes for table `registered_stud`
--
ALTER TABLE `registered_stud`
  ADD PRIMARY KEY (`rsid`),
  ADD UNIQUE KEY `rno` (`rno`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_no` (`room_no`),
  ADD KEY `rtid` (`rtid`);

--
-- Indexes for table `room_req`
--
ALTER TABLE `room_req`
  ADD PRIMARY KEY (`rrid`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`rtid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stid`),
  ADD UNIQUE KEY `rollno` (`rollno`),
  ADD KEY `stud_ibfk_1` (`room_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitorid`);

--
-- Indexes for table `vistor_req`
--
ALTER TABLE `vistor_req`
  ADD PRIMARY KEY (`vrid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1205;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9002;
--
-- AUTO_INCREMENT for table `fees_structure`
--
ALTER TABLE `fees_structure`
  MODIFY `fee_str_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forget_pass`
--
ALTER TABLE `forget_pass`
  MODIFY `fpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4002;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1704;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1253;
--
-- AUTO_INCREMENT for table `registered_stud`
--
ALTER TABLE `registered_stud`
  MODIFY `rsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1210;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `room_req`
--
ALTER TABLE `room_req`
  MODIFY `rrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `rtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitorid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `vistor_req`
--
ALTER TABLE `vistor_req`
  MODIFY `vrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`);

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `leave_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`stid`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`rtid`) REFERENCES `room_type` (`rtid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `stud_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
