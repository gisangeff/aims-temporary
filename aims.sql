-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 09:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aims`
--

-- --------------------------------------------------------

--
-- Table structure for table `athlete`
--

CREATE TABLE `athlete` (
  `athlete_id` int(8) NOT NULL,
  `athlete_firstname` varchar(30) NOT NULL,
  `athlete_middlename` varchar(30) NOT NULL,
  `athlete_lastname` varchar(30) NOT NULL,
  `athlete_gender` varchar(6) NOT NULL,
  `athlete_birthdate` varchar(30) NOT NULL,
  `athlete_address` text NOT NULL,
  `sport_id` int(8) NOT NULL,
  `course_id` int(8) NOT NULL,
  `athlete_yearlevel` varchar(50) NOT NULL,
  `athlete_bloodtype` char(2) NOT NULL,
  `athlete_username` varchar(15) NOT NULL,
  `athlete_password` varchar(15) NOT NULL,
  `date_added` varchar(30) NOT NULL,
  `athlete_status` varchar(15) NOT NULL,
  `user_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `athlete`
--

INSERT INTO `athlete` (`athlete_id`, `athlete_firstname`, `athlete_middlename`, `athlete_lastname`, `athlete_gender`, `athlete_birthdate`, `athlete_address`, `sport_id`, `course_id`, `athlete_yearlevel`, `athlete_bloodtype`, `athlete_username`, `athlete_password`, `date_added`, `athlete_status`, `user_id`) VALUES
(1, 'Gisan Geff', 'Malupa', 'Raniego', 'Male', '18/01/2000', 'Block 1 Lot 4 Talomo Proper, Davao City', 2, 2, '2nd Year College', 'AB', 'gisangeff', 'nicegood321', 'March 13, 2020, 5:31 PM', 'active', 301),
(2, 'Alvin', 'Eba', 'Samontina', 'Male', '21/03/1995', 'Block 21 Lot 3 Maa, Davao City', 1, 1, '2nd Year College', 'O+', 'alvin', 'alvin123', 'March 14, 2020, 3:38 AM', 'Active', 300),
(3, 'Love Joy', 'Tejano', 'Dumadag', 'Male', '28/07/1998', 'Block 2 Lot 2 Toril, Davao City', 3, 4, '4th Year College', 'O', 'joy', 'joy123', 'March 14, 2020, 3:53 AM', 'Active', 300),
(4, 'Dianna Lou', 'Reyes', 'Sabasaje', 'Female', '27/04/2000', 'Block 12 Lot 12 Maa, Davao City', 4, 2, '1st Year College', 'AB', 'dianna', 'dian123', 'March 14, 2020, 3:54 AM', 'Active', 300),
(5, 'Harvey Neil', 'Navarro', 'Sinday', 'Male', '08/08/1998', 'Block 8 Lot 8 Ulas, Davao City', 3, 1, '5th Year College', 'A-', 'harvey_neil', 'sinday123', 'March 14, 2020, 3:56 AM', 'Active', 300),
(6, 'Joeval', 'Day', 'Teres', 'Male', '11/11/2000', 'Block 3 Lot 3 Mintal, Davao City', 2, 1, '1st Year College', 'A', 'teres', 'teres123', 'March 14, 2020, 3:57 AM', 'Active', 300),
(7, 'Mia', 'Day', 'Montederamos', 'Female', '12/12/2000', 'Block 19 Lot 17 Matina Aplaya, Davao City', 4, 2, '1st Year College', 'B', 'mia', 'mia123', 'March 14, 2020, 3:58 AM', 'Active', 300),
(8, 'Vin', 'Montederamos', 'Malupa', 'Female', '13/12/1997', 'Block 19 Lot 19 Ulas, Davao City', 2, 1, '5th Year College', 'AB', 'vin_mal', 'vin123', 'March 14, 2020, 3:59 AM', 'Active', 300),
(9, 'Mohadin Mark', 'Amino', 'Uday', 'Male', '11/11/1999', 'Block 12 Lot 21 Talomo, Davao City', 1, 3, '3rd Year College', 'AB', 'mohads', 'uday123', 'March 14, 2020, 4:00 AM', 'Active', 300),
(10, 'Carlos', 'Ambot', 'Echavez', 'Male', '12/12/2012', 'Buhangin, Davao City', 3, 2, '3rd Year College', 'O', 'tsabes', 'tsabes123', 'October 8, 2020, 3:32 AM', 'Active', 301);

-- --------------------------------------------------------

--
-- Stand-in structure for view `athlete_info`
-- (See below for the actual view)
--
CREATE TABLE `athlete_info` (
`athlete_id` int(8)
,`athlete_firstname` varchar(30)
,`athlete_middlename` varchar(30)
,`athlete_lastname` varchar(30)
,`athlete_gender` varchar(6)
,`athlete_birthdate` varchar(30)
,`athlete_address` text
,`sport_id` int(8)
,`sport_title` varchar(30)
,`coach_id` int(8)
,`coach_firstname` varchar(30)
,`coach_lastname` varchar(30)
,`course_id` int(8)
,`course_title` varchar(30)
,`athlete_yearlevel` varchar(50)
,`athlete_bloodtype` char(2)
,`athlete_username` varchar(15)
,`athlete_password` varchar(15)
,`date_added` varchar(30)
,`athlete_status` varchar(15)
,`user_firstname` varchar(30)
,`user_lastname` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `coach_id` int(8) NOT NULL,
  `coach_firstname` varchar(30) NOT NULL,
  `coach_middlename` varchar(30) NOT NULL,
  `coach_lastname` varchar(30) NOT NULL,
  `coach_gender` varchar(6) NOT NULL,
  `coach_birthdate` varchar(30) NOT NULL,
  `coach_address` text NOT NULL,
  `date_added` varchar(30) NOT NULL,
  `coach_status` varchar(15) NOT NULL,
  `user_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coach_id`, `coach_firstname`, `coach_middlename`, `coach_lastname`, `coach_gender`, `coach_birthdate`, `coach_address`, `date_added`, `coach_status`, `user_id`) VALUES
(200, 'Gisan Dan', 'Malupa', 'Raniego', 'Male', '21/03/1995', 'Block 17 Lot 21 Agora, Cagayan De Oro City', 'March 13, 2020, 1:21 AM', 'Active', 300),
(201, 'harvey', 'Yama', 'Sinday', 'Male', '12/12/2000', 'Block 21, Lot 41 Mintal, Davao City', 'March 13, 2020, 1:22 AM', 'Active', 301),
(202, 'Cirehm', 'Ford', 'Padilla', 'Male', '21/12/1997', 'Block 12 Lot 12 Ulas, Davao City', 'March 13, 2020, 1:24 AM', 'Active', 302),
(203, 'Jason', 'Sprilika', 'Yama', 'Male', '04/02/1997', 'Block 7 Lot 7 Matina Aplaya, Davao City', 'March 13, 2020, 1:24 AM', 'Inactive', 302),
(204, 'Carlos', 'Gonde', 'Echavez', 'Male', '04/04/1998', 'Block 7 Lot 7 Maa, Davao City', 'March 13, 2020, 3:50 PM', 'Active', 300),
(205, 'Junnel', 'Dumadag', 'Puebla', 'Male', '21/06/2000', 'Purok 2-A San Vicente, Sibagat Agusan Del Sur', 'March 14, 2020, 3:51 AM', 'Active', 300),
(206, 'Dan', 'Hera', 'Wallker', 'Male', '04/11/1996', 'Block 7 Lot 5 Agdao, Davao City', 'March 14, 2020, 3:55 AM', 'Active', 300);

-- --------------------------------------------------------

--
-- Table structure for table `coachhistory`
--

CREATE TABLE `coachhistory` (
  `coachhistory_id` int(8) NOT NULL,
  `coach_id` int(8) NOT NULL,
  `sport_id` int(8) NOT NULL,
  `date_coached` varchar(30) NOT NULL,
  `date_resigned` varchar(30) NOT NULL,
  `coachhistory_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coachhistory`
--

INSERT INTO `coachhistory` (`coachhistory_id`, `coach_id`, `sport_id`, `date_coached`, `date_resigned`, `coachhistory_status`) VALUES
(1, 204, 1, 'March 13, 2020, 4:14 PM', 'March 13, 2020, 4:15 PM', 'Inactive'),
(2, 202, 1, 'March 13, 2020, 4:15 PM', 'March 13, 2020, 4:16 PM', 'Inactive'),
(3, 204, 2, 'March 13, 2020, 4:15 PM', 'March 13, 2020, 4:15 PM', 'Inactive'),
(4, 200, 2, 'March 13, 2020, 4:15 PM', '', 'Active'),
(5, 204, 1, 'March 13, 2020, 4:16 PM', '', 'Active'),
(6, 203, 3, 'March 14, 2020, 3:38 AM', '', 'Active'),
(7, 201, 4, 'March 14, 2020, 3:40 AM', '', 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `coachhistory_info`
-- (See below for the actual view)
--
CREATE TABLE `coachhistory_info` (
`coachhistory_id` int(8)
,`coach_id` int(8)
,`coach_firstname` varchar(30)
,`coach_middlename` varchar(30)
,`coach_lastname` varchar(30)
,`sport_id` int(8)
,`sport_title` varchar(30)
,`date_coached` varchar(30)
,`date_resigned` varchar(30)
,`coachhistory_status` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `coach_info`
-- (See below for the actual view)
--
CREATE TABLE `coach_info` (
`coach_id` int(8)
,`coach_firstname` varchar(30)
,`coach_middlename` varchar(30)
,`coach_lastname` varchar(30)
,`coach_gender` varchar(6)
,`coach_birthdate` varchar(30)
,`coach_address` text
,`date_added` varchar(30)
,`coach_status` varchar(15)
,`user_id` int(8)
,`user_firstname` varchar(30)
,`user_lastname` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(8) NOT NULL,
  `course_title` varchar(30) NOT NULL,
  `course_description` text NOT NULL,
  `dept_code` int(8) NOT NULL,
  `course_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_description`, `dept_code`, `course_status`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology', 1, 'Active'),
(2, 'BSCS', 'Bachelor of Science in Computer Science', 2, 'Active'),
(3, 'BSIS', 'Bachelor of Science in Information System', 1, 'Active'),
(4, 'BSEMC Major in GD', 'Bachelor of Science in Entertainment & Multimedia Basta (Game Development)', 1, 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `course_info`
-- (See below for the actual view)
--
CREATE TABLE `course_info` (
`course_id` int(8)
,`course_title` varchar(30)
,`course_description` text
,`dept_code` int(8)
,`dept_title` varchar(30)
,`course_status` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_code` int(8) NOT NULL,
  `dept_title` varchar(30) NOT NULL,
  `dept_description` text NOT NULL,
  `dept_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_code`, `dept_title`, `dept_description`, `dept_status`) VALUES
(1, 'CCE', 'College of Computing Education', 'Active'),
(2, 'CAE', 'College of Accounting Education', 'Active'),
(3, 'CEE', 'College of Engineering Education', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(8) NOT NULL,
  `sport_title` varchar(30) NOT NULL,
  `coach_id` int(8) NOT NULL,
  `sport_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_id`, `sport_title`, `coach_id`, `sport_status`) VALUES
(1, 'Sepak Takraw', 204, 'Active'),
(2, 'Badminton', 200, 'Active'),
(3, 'Basketball', 203, 'Active'),
(4, 'Volleyball', 201, 'Active'),
(10, 'Sepak Takraw', 204, 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sport_info`
-- (See below for the actual view)
--
CREATE TABLE `sport_info` (
`sport_id` int(8)
,`sport_title` varchar(30)
,`coach_id` int(8)
,`coach_firstname` varchar(30)
,`coach_lastname` varchar(30)
,`sport_status` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(8) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_middlename` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_gender` varchar(6) NOT NULL,
  `user_birthdate` varchar(30) NOT NULL,
  `user_address` text NOT NULL,
  `user_username` varchar(15) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `date_added` varchar(30) NOT NULL,
  `user_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_firstname`, `user_middlename`, `user_lastname`, `user_gender`, `user_birthdate`, `user_address`, `user_username`, `user_password`, `date_added`, `user_status`) VALUES
(300, 'Alaenah', 'Orilla', 'Reyes', 'Female', '18/04/2000', 'Block 1 Lot 2 Toril, Davao City', 'user', 'user123', 'March 01, 2020, 1:25 AM', 'Active'),
(301, 'Jervey', 'Yama', 'Pamad', 'Male', '11/11/1997', 'Block 12 Lot 8 Maa, Davao City', 'admin', 'admin123', 'March 13, 2020, 1:19 AM', 'Active'),
(302, 'Dexter', 'Palmera', 'Eba', 'Male', '09/09/1999', 'Block 9 Lot 1 Toril, Davao City', 'eba', 'eba123', 'March 13, 2020, 1:20 AM', 'Active'),
(303, 'Jhonry', 'Puebla', 'Magparoc', 'Male', '11/01/2000', 'Purok 8-B Mahayahay, SIbagat Agusan Del Sur', 'jhon', 'jhon123', 'March 14, 2020, 3:50 AM', 'Active');

-- --------------------------------------------------------

--
-- Structure for view `athlete_info`
--
DROP TABLE IF EXISTS `athlete_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `athlete_info`  AS  select `a`.`athlete_id` AS `athlete_id`,`a`.`athlete_firstname` AS `athlete_firstname`,`a`.`athlete_middlename` AS `athlete_middlename`,`a`.`athlete_lastname` AS `athlete_lastname`,`a`.`athlete_gender` AS `athlete_gender`,`a`.`athlete_birthdate` AS `athlete_birthdate`,`a`.`athlete_address` AS `athlete_address`,`sport`.`sport_id` AS `sport_id`,`sport`.`sport_title` AS `sport_title`,`coach`.`coach_id` AS `coach_id`,`coach`.`coach_firstname` AS `coach_firstname`,`coach`.`coach_lastname` AS `coach_lastname`,`course`.`course_id` AS `course_id`,`course`.`course_title` AS `course_title`,`a`.`athlete_yearlevel` AS `athlete_yearlevel`,`a`.`athlete_bloodtype` AS `athlete_bloodtype`,`a`.`athlete_username` AS `athlete_username`,`a`.`athlete_password` AS `athlete_password`,`a`.`date_added` AS `date_added`,`a`.`athlete_status` AS `athlete_status`,`user`.`user_firstname` AS `user_firstname`,`user`.`user_lastname` AS `user_lastname` from ((((`athlete` `a` join `sport` on(`a`.`sport_id` = `sport`.`sport_id`)) join `coach` on(`sport`.`coach_id` = `coach`.`coach_id`)) join `course` on(`a`.`course_id` = `course`.`course_id`)) join `user` on(`user`.`user_id` = `a`.`user_id`)) order by `a`.`athlete_id` ;

-- --------------------------------------------------------

--
-- Structure for view `coachhistory_info`
--
DROP TABLE IF EXISTS `coachhistory_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `coachhistory_info`  AS  select `ch`.`coachhistory_id` AS `coachhistory_id`,`c`.`coach_id` AS `coach_id`,`c`.`coach_firstname` AS `coach_firstname`,`c`.`coach_middlename` AS `coach_middlename`,`c`.`coach_lastname` AS `coach_lastname`,`s`.`sport_id` AS `sport_id`,`s`.`sport_title` AS `sport_title`,`ch`.`date_coached` AS `date_coached`,`ch`.`date_resigned` AS `date_resigned`,`ch`.`coachhistory_status` AS `coachhistory_status` from ((`coachhistory` `ch` join `coach` `c` on(`ch`.`coach_id` = `c`.`coach_id`)) join `sport` `s` on(`ch`.`sport_id` = `s`.`sport_id`)) order by `c`.`coach_id` ;

-- --------------------------------------------------------

--
-- Structure for view `coach_info`
--
DROP TABLE IF EXISTS `coach_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `coach_info`  AS  select `c`.`coach_id` AS `coach_id`,`c`.`coach_firstname` AS `coach_firstname`,`c`.`coach_middlename` AS `coach_middlename`,`c`.`coach_lastname` AS `coach_lastname`,`c`.`coach_gender` AS `coach_gender`,`c`.`coach_birthdate` AS `coach_birthdate`,`c`.`coach_address` AS `coach_address`,`c`.`date_added` AS `date_added`,`c`.`coach_status` AS `coach_status`,`u`.`user_id` AS `user_id`,`u`.`user_firstname` AS `user_firstname`,`u`.`user_lastname` AS `user_lastname` from (`coach` `c` join `user` `u` on(`c`.`user_id` = `u`.`user_id`)) order by `c`.`coach_id` ;

-- --------------------------------------------------------

--
-- Structure for view `course_info`
--
DROP TABLE IF EXISTS `course_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_info`  AS  select `c`.`course_id` AS `course_id`,`c`.`course_title` AS `course_title`,`c`.`course_description` AS `course_description`,`dept`.`dept_code` AS `dept_code`,`dept`.`dept_title` AS `dept_title`,`c`.`course_status` AS `course_status` from (`course` `c` join `department` `dept` on(`c`.`dept_code` = `dept`.`dept_code`)) order by `c`.`course_id` ;

-- --------------------------------------------------------

--
-- Structure for view `sport_info`
--
DROP TABLE IF EXISTS `sport_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sport_info`  AS  select `s`.`sport_id` AS `sport_id`,`s`.`sport_title` AS `sport_title`,`c`.`coach_id` AS `coach_id`,`c`.`coach_firstname` AS `coach_firstname`,`c`.`coach_lastname` AS `coach_lastname`,`s`.`sport_status` AS `sport_status` from (`sport` `s` join `coach` `c` on(`s`.`coach_id` = `c`.`coach_id`)) order by `s`.`sport_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athlete`
--
ALTER TABLE `athlete`
  ADD PRIMARY KEY (`athlete_id`),
  ADD KEY `sport_id` (`sport_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coach_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `coachhistory`
--
ALTER TABLE `coachhistory`
  ADD PRIMARY KEY (`coachhistory_id`),
  ADD KEY `coach_id` (`coach_id`),
  ADD KEY `sport_id` (`sport_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_title` (`course_title`),
  ADD KEY `dept_code` (`dept_code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_code`),
  ADD UNIQUE KEY `dept_title` (`dept_title`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `athlete`
--
ALTER TABLE `athlete`
  ADD CONSTRAINT `athlete_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`sport_id`),
  ADD CONSTRAINT `athlete_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `athlete_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `coachhistory`
--
ALTER TABLE `coachhistory`
  ADD CONSTRAINT `coachhistory_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`),
  ADD CONSTRAINT `coachhistory_ibfk_2` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`sport_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_code`) REFERENCES `department` (`dept_code`);

--
-- Constraints for table `sport`
--
ALTER TABLE `sport`
  ADD CONSTRAINT `sport_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
