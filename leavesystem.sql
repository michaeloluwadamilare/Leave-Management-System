-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 07:41 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leavesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(11) NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `department`) VALUES
(1, 'Computer science'),
(2, 'Information and communication science'),
(3, 'Library and information science'),
(4, 'Telecommunication science'),
(5, 'Mass communication'),
(6, 'Microbiology'),
(7, 'Zoology'),
(8, 'English'),
(9, 'Mathematics'),
(10, 'Physics'),
(11, 'Chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`) VALUES
(1, 'Communication and information science'),
(2, 'Physical Science'),
(3, 'Life science'),
(4, 'Art');

-- --------------------------------------------------------

--
-- Table structure for table `leaveapplicationdetails`
--

CREATE TABLE `leaveapplicationdetails` (
  `leaveApplicationId` int(11) NOT NULL,
  `staffName` text,
  `appliedStaffId` varchar(255) DEFAULT NULL,
  `appliedDate` date DEFAULT NULL,
  `leaveType` text,
  `leaveStart` date DEFAULT NULL,
  `leaveEnd` date DEFAULT NULL,
  `totalLeaveDays` int(11) DEFAULT NULL,
  `reasonDoc` varchar(255) DEFAULT NULL,
  `docSize` int(255) DEFAULT NULL,
  `standIn` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hodApproval` int(11) DEFAULT NULL,
  `deanApproval` int(11) DEFAULT NULL,
  `hrApproval` int(11) DEFAULT NULL,
  `department` text,
  `faculty` text,
  `TotalLeaveDaysRemain` int(11) NOT NULL,
  `seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaveapplicationdetails`
--

INSERT INTO `leaveapplicationdetails` (`leaveApplicationId`, `staffName`, `appliedStaffId`, `appliedDate`, `leaveType`, `leaveStart`, `leaveEnd`, `totalLeaveDays`, `reasonDoc`, `docSize`, `standIn`, `email`, `hodApproval`, `deanApproval`, `hrApproval`, `department`, `faculty`, `TotalLeaveDaysRemain`, `seen`) VALUES
(34, 'John Adebimpe', 'UNIL1111ORIN', '2019-05-13', '4', '2019-04-14', '2019-04-28', 14, 'REFERENCES.docx', 19172, 'UNIL12345ORIN', 'johnadebimpe@gmail.com', 1, 1, 1, 'Information and communication science', 'Communication and information science', 166, 1),
(44, 'Abdulbasit Ayodele', 'UNIL1357ORIN', '2019-06-29', '1', '2019-07-01', '2019-07-05', 4, 'REFERENCES.docx', 19172, 'UNIL12345ORIN', 'abdulbasit@gmail.com', 1, 1, 1, 'Information and communication science', 'Communication and information science', 20, 1),
(45, 'Daniel Adeyemi', 'UNIL3641ORIN', '2019-07-18', '3', '2019-07-19', '2019-07-26', 7, 'REFERENCES.docx', 19172, 'UNIL5673ORIN', 'danieladeyemi@gmail.com', 1, 1, 1, 'Computer science', 'Communication and information science', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `leaveTypeId` int(11) NOT NULL,
  `leaveName` text,
  `totalDays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`leaveTypeId`, `leaveName`, `totalDays`) VALUES
(1, 'Casual leave', 24),
(2, 'Annual leave', 12),
(3, 'Sick leave', 7),
(4, 'Maternity leave', 180),
(5, 'Sabbatical leave', 50);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(1, 'Lecturer 1'),
(2, 'Lecturer 2'),
(3, 'Cleaner'),
(4, 'Secretary'),
(5, 'Dean'),
(6, 'HOD'),
(7, 'Faculty officer'),
(8, 'Technician');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_leave_notification`
--

CREATE TABLE `rejected_leave_notification` (
  `rejectedLeaveId` int(11) NOT NULL,
  `staffName` text NOT NULL,
  `appliedStaffId` varchar(255) NOT NULL,
  `leaveType` text NOT NULL,
  `status` text NOT NULL,
  `notStatus` int(11) NOT NULL,
  `rejectDoc` varchar(255) DEFAULT NULL,
  `docSize` int(11) DEFAULT NULL,
  `reason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejected_leave_notification`
--

INSERT INTO `rejected_leave_notification` (`rejectedLeaveId`, `staffName`, `appliedStaffId`, `leaveType`, `status`, `notStatus`, `rejectDoc`, `docSize`, `reason`) VALUES
(15, 'Adebayo Afolayan', 'UNIL5673ORIN', '1', 'rejected', 1, 'REFERENCES.docx', 19172, ''),
(57, 'Adebayo Afolayan', 'UNIL5673ORIN', '1', 'rejected', 1, 'project1.docx', 902993, ''),
(74, 'John Adebimpe', 'UNIL1111ORIN', '1', 'rejected', 1, 'REFERENCES.docx', 19172, ''),
(75, 'Abdulbasit Ayodele', 'UNIL1357ORIN', '1', 'rejected', 0, NULL, NULL, 'You have exceeded your leave balance for this particular leave.'),
(76, 'Bello Tijani', 'UNIL8888ORIN', '3', 'rejected', 0, 'table.docx', 13140, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staffdetails`
--

CREATE TABLE `staffdetails` (
  `staff_detail_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `staff_type` text NOT NULL,
  `department` text NOT NULL,
  `faculty` text NOT NULL,
  `position` text NOT NULL,
  `level` int(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `leavestatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffdetails`
--

INSERT INTO `staffdetails` (`staff_detail_id`, `name`, `dob`, `gender`, `staff_id`, `staff_type`, `department`, `faculty`, `position`, `level`, `passport`, `phoneNo`, `email`, `address`, `password`, `leavestatus`) VALUES
(1, 'Michael Oluwadamilare', '2018-12-04', 'male', 'UNIL12345ORIN', 'Academic staff', 'Information and communication science', 'Communication and information science', 'Lecturer 1', 0, 'user1.jpeg', '08134603858', 'darefeix@gmail.com', 'Tanke', '123', 0),
(2, 'John Adebimpe', '1980-10-08', 'female', 'UNIL1111ORIN', 'Academic staff', 'Information and communication science', 'Communication and information science', 'Lecturer 2', 0, 'user1.jpeg', '07085442176', 'johnadebimpe@gmail.com', 'Ilesanmi street', '123', 0),
(3, 'Abdulbasit Ayodele', '1970-03-04', 'male', 'UNIL1357ORIN', 'Academic staff', 'Information and communication science', 'Communication and information science', 'HOD', 1, 'user2.png', '09034521362', 'abdulbasit@gmail.com', 'Ilesanmi', '123', 0),
(4, 'Jimoh Lawal', '1969-03-25', 'male', 'UNIL2345ORIN', 'Academic staff', 'Information and communication science', 'Communication and information science', 'Dean', 2, 'user2.png', '08124536782', 'jimohlawal@gmail.com', 'Sanrab', '0123', 0),
(8, 'Michael Oluwadamilare', '1993-11-08', 'male', 'UNIL9999ORIN', 'Non-Academic staff', 'Human resource', 'Admin', 'Registrar', 3, 'user1.jpeg', '08134603858', 'darefelix3858@gmail.com', 'Tanke', '123', 0),
(9, 'Osuolale Oluwatobiloba', '1988-04-10', 'male', 'UNIL45095880ORIN', 'Academic staff', 'Computer science', 'Communication and information science', 'HOD', 1, 'user2.png', '09034521361', 'osuolaletobi@gmail.com', 'Adewole', '123', 0),
(10, 'Adebayo Afolayan', '1990-02-08', 'female', 'UNIL5673ORIN', 'Non-Academic staff', 'Computer science', 'Communication and information science', 'Secretary', 0, 'user2.png', '090876543212', 'adebayoafolayan@gmail.com', 'Tanke Akata', 'adebayo', 0),
(11, 'Daniel Adeyemi', '1976-03-15', 'male', 'UNIL3641ORIN', 'Non-Academic staff', 'Computer science', 'Communication and information science', 'Secretary', 0, 'user3.png', '09034521361', 'danieladeyemi@gmail.com', 'Tipper garage', '123', 1),
(12, 'DR. Panam Ngandiya', '1990-02-11', 'male', 'UNIL3333ORIN', 'Academic staff', 'Computer science', 'Communication and information science', 'Lecturer 2', 0, 'user1.jpeg', '09034521362', 'panamngandiya@gmail.com', 'Post office road', '123', 0),
(13, 'Prof. Joseph Martins', '1974-10-10', 'male', 'UNIL4433ORIN', 'Academic staff', 'Computer science', 'Communication and information science', 'Lecturer 1', 0, 'user2.png', '08145362789', 'josephmartins@gmail.com', 'GRA', '123', 0),
(14, 'DR. Bola James', '1969-05-20', 'female', 'UNIL0942ORIN', 'Academic staff', 'Mass communication', 'Communication and information science', 'HOD', 1, 'user1.jpeg', '08145362787', 'bolajames@gmail.com', 'Adewole', '123', 0),
(15, 'Salamat Ayomiposi', '1974-05-21', 'female', 'UNIL3381ORIN', 'Academic staff', 'Mass communication', 'Communication and information science', 'Lecturer 1', 0, 'user3.png', '07082345678', 'salamatayomiposi@gmail.com', 'Oko Oba', '123', 0),
(16, 'Femi Adepoju', '1990-05-06', 'male', 'UNIL8831ORIN', 'Academic staff', 'Mass communication', 'Communication and information science', 'Lecturer 2', 0, 'user3.png', '07085447821', 'femiadepoju@gmail.com', 'Irewolede', '123', 0),
(17, 'Matthew Louis', '1991-04-30', 'male', 'UNIL0978ORIN', 'Non-Academic staff', 'Mass communication', 'Communication and information science', 'Secretary', 0, 'user2.png', '09093523674', 'matthewlouis@gmail.com', 'Amilegbe', '123', 0),
(18, 'Yusuf Daramola', '1986-07-02', 'male', 'UNIL5555ORIN', 'Academic staff', 'Information and communication science', 'Communication and information science', 'Lecturer 1', 0, 'user3.png', '09034521363', 'yusuf@gmail.com', 'Ajayi road', '123', 0),
(19, 'Bello Tijani', '1983-07-13', 'male', 'UNIL8888ORIN', 'Academic staff', 'Information and communication science', 'Communication and information science', 'Lecturer 1', 0, 'user2.png', '07082345610', 'bellotijani@gmail.com', 'Tipper garage', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE `staff_type` (
  `staff_type_id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`staff_type_id`, `type`) VALUES
(1, 'Academic staff'),
(2, 'Non-Academic staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `leaveapplicationdetails`
--
ALTER TABLE `leaveapplicationdetails`
  ADD PRIMARY KEY (`leaveApplicationId`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
  ADD PRIMARY KEY (`leaveTypeId`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `rejected_leave_notification`
--
ALTER TABLE `rejected_leave_notification`
  ADD PRIMARY KEY (`rejectedLeaveId`);

--
-- Indexes for table `staffdetails`
--
ALTER TABLE `staffdetails`
  ADD PRIMARY KEY (`staff_detail_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`staff_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `leaveapplicationdetails`
--
ALTER TABLE `leaveapplicationdetails`
  MODIFY `leaveApplicationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `leaveTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rejected_leave_notification`
--
ALTER TABLE `rejected_leave_notification`
  MODIFY `rejectedLeaveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `staffdetails`
--
ALTER TABLE `staffdetails`
  MODIFY `staff_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `staff_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
