-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 03:47 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitals`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `dateCreated`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2021-04-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `dia_id` int(11) NOT NULL,
  `dia_name` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`dia_id`, `dia_name`, `amount`) VALUES
(1, 'malaria test', '2000'),
(2, 'bloodTTest', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `doctorcategory`
--

CREATE TABLE `doctorcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorcategory`
--

INSERT INTO `doctorcategory` (`id`, `name`, `price`) VALUES
(1, 'Normal Doctor', '10000'),
(2, 'Specialist', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int(11) NOT NULL,
  `doc_catid` int(11) NOT NULL,
  `doc_firstname` varchar(100) NOT NULL,
  `doc_middlename` varchar(100) NOT NULL,
  `doc_lastname` varchar(100) NOT NULL,
  `doc_username` varchar(100) NOT NULL,
  `doc_password` varchar(100) NOT NULL,
  `doc_gender` enum('male','female') NOT NULL,
  `doc_DOB` date NOT NULL,
  `doc_phonenumber` varchar(100) NOT NULL,
  `doc_document` varchar(500) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `doc_catid`, `doc_firstname`, `doc_middlename`, `doc_lastname`, `doc_username`, `doc_password`, `doc_gender`, `doc_DOB`, `doc_phonenumber`, `doc_document`, `dateCreated`) VALUES
(1, 2, 'Kelvin', 'Aron', 'Msindai', 'kelvin_Msindai', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '1997-05-31', '0786543211', 'kjsajsaaakj', '2021-04-11 00:00:00'),
(2, 1, 'Fred', 'Helbart', 'Ibambilo', 'fred_ibambilo', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '1993-10-11', '0678543212', 'status', '2021-04-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorist`
--

CREATE TABLE `laboratorist` (
  `lab_id` int(11) NOT NULL,
  `lab_firstname` varchar(200) NOT NULL,
  `lab_middlename` varchar(200) NOT NULL,
  `lab_lastname` varchar(200) NOT NULL,
  `lab_username` varchar(200) NOT NULL,
  `lab_password` varchar(200) NOT NULL,
  `lab_gender` enum('male','female') NOT NULL,
  `DOB` date NOT NULL,
  `lab_phonenumber` varchar(100) NOT NULL,
  `lab_document` varchar(500) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorist`
--

INSERT INTO `laboratorist` (`lab_id`, `lab_firstname`, `lab_middlename`, `lab_lastname`, `lab_username`, `lab_password`, `lab_gender`, `DOB`, `lab_phonenumber`, `lab_document`, `dateCreated`) VALUES
(1, 'Mustapha', 'H', 'Mbwana', 'mustapha_mbwana', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '1994-04-11', '0763222222', 'status', '2021-04-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorytest`
--

CREATE TABLE `laboratorytest` (
  `lab_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `dia_id` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `labresult`
--

CREATE TABLE `labresult` (
  `labResult_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nur_id` int(11) NOT NULL,
  `nur_firstname` varchar(100) NOT NULL,
  `nur_middlename` varchar(100) NOT NULL,
  `nur_lastname` varchar(100) NOT NULL,
  `nur_username` varchar(100) NOT NULL,
  `nur_gender` enum('male','female') NOT NULL,
  `nur_phonenumber` varchar(100) NOT NULL,
  `nur_password` varchar(100) NOT NULL,
  `nur_document` varchar(100) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nur_id`, `nur_firstname`, `nur_middlename`, `nur_lastname`, `nur_username`, `nur_gender`, `nur_phonenumber`, `nur_password`, `nur_document`, `dateCreated`) VALUES
(1, 'Fatuma ', 'Athumani', 'Kondo', 'Fatuma_Kondo', 'female', '0768564321', '827ccb0eea8a706c4c34a16891f84e7b', '', '2021-04-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patientid` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `insuarance_type` enum('NHIF','SHIB','AAR','CHF') NOT NULL,
  `insuarance_number` varchar(100) NOT NULL,
  `cash` decimal(10,0) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patientid`, `doctor_id`, `regno`, `rec_id`, `firstname`, `middlename`, `lastname`, `phonenumber`, `address`, `city`, `DOB`, `gender`, `insuarance_type`, `insuarance_number`, `cash`, `dateCreated`) VALUES
(1, 1, 'PAT/HOSP/598114 ', 1, 'Coin', 'Ron', 'Masai', '0867234512', 'kigamboni', 'Dar es salaam', '2005-12-12', 'male', 'NHIF', '1010102346765643', '0', '2021-04-12 02:06:02'),
(2, 2, 'PAT/HOSP/479394 ', 1, 'Milka', 'Shabani', 'Kibwe', '0867234512', 'Kisiwani', 'Dar es salaam', '2021-12-12', 'female', 'AAR', '1010102346765642', '0', '2021-04-12 08:12:05'),
(3, 2, 'PAT/HOSP/365887 ', 1, 'Onlyson', 'Kassim', 'Kizomo', '0784563214', 'kigamboni', 'Dar es salaam', '2015-11-11', 'male', 'NHIF', '10342189231212782', '0', '2021-04-13 02:22:38'),
(4, 2, 'PAT/HOSP/396626 ', 1, 'Sara', 'Cristian', 'Pascali', '0768543212', 'kigamboni', 'Dar es salaam', '2017-12-12', 'female', 'NHIF', '1010102346765643', '0', '2021-04-14 13:31:22'),
(5, 1, 'PAT/HOSP/393655 ', 1, 'Sala', 'Chales', 'William', '0872781245', 'Kisiwani', 'Dar es salaam', '2016-12-12', 'female', 'AAR', '1010102346765643', '0', '2021-04-16 11:39:43'),
(6, 2, 'PAT/HOSP/206421 ', 1, 'Abela', 'Cristian', 'Michaeli', '0867234512', 'kimara', 'Dar es salaam', '1999-12-12', 'female', 'NHIF', '1010102346765643', '0', '2021-04-17 02:03:38'),
(7, 1, 'PAT/HOSP/233920 ', 1, 'Caren', 'Kelvin', 'Msindai', '0867234512', 'Kisiwani', 'Dar es salaam', '2019-11-11', 'female', 'NHIF', '1010102346765643', '0', '2021-04-19 01:02:50'),
(8, 1, 'PAT/HOSP/326463 ', 1, 'Colin', 'Kelvin', 'Msindai', '0768543212', 'Kisiwani', 'Dar es salaam', '2017-05-05', 'male', 'NHIF', '1010102346765643', '0', '2021-04-19 01:03:51'),
(9, 1, 'PAT/HOSP/535680 ', 1, 'Onlyson', 'Cristian', 'Chales', '0786543212', 'Kisiwani', 'Dar es salaam', '2005-04-05', 'male', 'NHIF', '1010102346765643', '0', '2021-04-21 14:34:03'),
(10, 2, 'PAT/HOSP/365058 ', 1, 'Cristina', 'M', 'Cristian', '0768543212', 'Kisiwani', 'Dar es salaam', '2000-04-24', 'male', 'NHIF', '1010102346765643', '0', '2021-04-24 14:18:34'),
(11, 1, 'PAT/HOSP/882972 ', 1, 'Anna', 'M', 'Mende', '0867234512', 'kigamboni', 'Dar es salaam', '2005-04-23', 'male', 'NHIF', '1010102346765643', '0', '2021-04-24 15:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `phamacist`
--

CREATE TABLE `phamacist` (
  `pha_id` int(11) NOT NULL,
  `pha_firstname` varchar(100) NOT NULL,
  `pha_middlename` varchar(100) NOT NULL,
  `pha_lastname` varchar(100) NOT NULL,
  `pha_username` varchar(200) NOT NULL,
  `pha_password` varchar(100) NOT NULL,
  `pha_gender` enum('male','female') NOT NULL,
  `pha_DOB` date NOT NULL,
  `pha_phonenumber` varchar(100) NOT NULL,
  `pha_document` varchar(500) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phamacist`
--

INSERT INTO `phamacist` (`pha_id`, `pha_firstname`, `pha_middlename`, `pha_lastname`, `pha_username`, `pha_password`, `pha_gender`, `pha_DOB`, `pha_phonenumber`, `pha_document`, `dateCreated`) VALUES
(1, 'Happy', 'Ernest', 'Jitto', 'happy_jitto', '827ccb0eea8a706c4c34a16891f84e7b', 'female', '1995-04-01', '0756234521', 'status', '2021-04-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `radiology`
--

CREATE TABLE `radiology` (
  `rad_id` int(11) NOT NULL,
  `rad_firstname` varchar(100) NOT NULL,
  `rad_middlename` varchar(100) NOT NULL,
  `rad_lastname` varchar(100) NOT NULL,
  `rad_username` varchar(100) NOT NULL,
  `rad_password` varchar(100) NOT NULL,
  `rad_gender` enum('male','female') NOT NULL,
  `rad_DOB` date NOT NULL,
  `rad_phonenumber` varchar(100) NOT NULL,
  `rad_document` varchar(500) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radiology`
--

INSERT INTO `radiology` (`rad_id`, `rad_firstname`, `rad_middlename`, `rad_lastname`, `rad_username`, `rad_password`, `rad_gender`, `rad_DOB`, `rad_phonenumber`, `rad_document`, `dateCreated`) VALUES
(1, 'Goodluck', 'Emmanueli', 'Leole', 'goodluck_leole', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '1987-04-04', '0786564321', 'Status', '2021-04-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `radiologydiagnosis`
--

CREATE TABLE `radiologydiagnosis` (
  `rad_id` int(11) NOT NULL,
  `rad_name` varchar(100) NOT NULL,
  `rad_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radiologydiagnosis`
--

INSERT INTO `radiologydiagnosis` (`rad_id`, `rad_name`, `rad_amount`) VALUES
(1, 'malaria Test', '2000'),
(2, 'Typhod', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `radiologyresult`
--

CREATE TABLE `radiologyresult` (
  `radResult_id` int(11) NOT NULL,
  `comparison` varchar(100) NOT NULL,
  `findings` varchar(100) NOT NULL,
  `impression` varchar(100) NOT NULL,
  `recommendation` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `radiologytest`
--

CREATE TABLE `radiologytest` (
  `radTest_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `radDia_id` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

CREATE TABLE `reception` (
  `rec_id` int(11) NOT NULL,
  `rec_firstname` varchar(100) NOT NULL,
  `rec_middlename` varchar(100) NOT NULL,
  `rec_lastname` varchar(100) NOT NULL,
  `rec_username` varchar(100) NOT NULL,
  `rec_password` varchar(100) NOT NULL,
  `rec_gender` enum('male','female') NOT NULL,
  `rec_DOB` date NOT NULL,
  `rec_phonenumber` varchar(100) NOT NULL,
  `rec_document` varchar(500) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reception`
--

INSERT INTO `reception` (`rec_id`, `rec_firstname`, `rec_middlename`, `rec_lastname`, `rec_username`, `rec_password`, `rec_gender`, `rec_DOB`, `rec_phonenumber`, `rec_document`, `dateCreated`) VALUES
(1, 'Alen', 'Masanja', 'Mboje', 'alen_mboje', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '1990-07-12', '0656453212', 'status', '2021-04-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `virtualsign`
--

CREATE TABLE `virtualsign` (
  `sig_id` int(11) NOT NULL,
  `pat_id` int(11) NOT NULL,
  `nur_id` int(11) NOT NULL,
  `pat_weight` varchar(100) NOT NULL,
  `pat_templature` varchar(100) NOT NULL,
  `pat_pulse` varchar(100) NOT NULL,
  `pat_blood_pressure` varchar(100) NOT NULL,
  `pat_respiration` varchar(100) NOT NULL,
  `pat_saturation` varchar(100) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `virtualsign`
--

INSERT INTO `virtualsign` (`sig_id`, `pat_id`, `nur_id`, `pat_weight`, `pat_templature`, `pat_pulse`, `pat_blood_pressure`, `pat_respiration`, `pat_saturation`, `dateCreated`) VALUES
(1, 3, 1, '72', '23c', '123', '7.8', '123', '100', '2021-04-13 03:06:43'),
(2, 5, 1, '34kg', '77', '112', '122', '234', '100', '2021-04-16 11:40:32'),
(3, 6, 1, '45kg', '12', '120', '102', '234', '100', '2021-04-17 02:04:35'),
(4, 7, 1, '45kg', '27c', '123', '117', '123', '23', '2021-04-19 18:21:21'),
(5, 9, 1, '40kg', '27c', '100', '7.8', '6', '100', '2021-04-21 14:36:06'),
(6, 10, 1, '40kg', '23c', '21', '100', '23', '23', '2021-04-24 14:19:33'),
(7, 11, 1, '50kg', '27c', '100', '100', '100', '100', '2021-04-24 15:02:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`dia_id`);

--
-- Indexes for table `doctorcategory`
--
ALTER TABLE `doctorcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `laboratorist`
--
ALTER TABLE `laboratorist`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `laboratorytest`
--
ALTER TABLE `laboratorytest`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `labresult`
--
ALTER TABLE `labresult`
  ADD PRIMARY KEY (`labResult_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nur_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patientid`);

--
-- Indexes for table `phamacist`
--
ALTER TABLE `phamacist`
  ADD PRIMARY KEY (`pha_id`);

--
-- Indexes for table `radiology`
--
ALTER TABLE `radiology`
  ADD PRIMARY KEY (`rad_id`);

--
-- Indexes for table `radiologydiagnosis`
--
ALTER TABLE `radiologydiagnosis`
  ADD PRIMARY KEY (`rad_id`);

--
-- Indexes for table `radiologyresult`
--
ALTER TABLE `radiologyresult`
  ADD PRIMARY KEY (`radResult_id`);

--
-- Indexes for table `radiologytest`
--
ALTER TABLE `radiologytest`
  ADD PRIMARY KEY (`radTest_id`);

--
-- Indexes for table `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `virtualsign`
--
ALTER TABLE `virtualsign`
  ADD PRIMARY KEY (`sig_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `dia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctorcategory`
--
ALTER TABLE `doctorcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laboratorist`
--
ALTER TABLE `laboratorist`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laboratorytest`
--
ALTER TABLE `laboratorytest`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labresult`
--
ALTER TABLE `labresult`
  MODIFY `labResult_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `phamacist`
--
ALTER TABLE `phamacist`
  MODIFY `pha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `radiology`
--
ALTER TABLE `radiology`
  MODIFY `rad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `radiologydiagnosis`
--
ALTER TABLE `radiologydiagnosis`
  MODIFY `rad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `radiologyresult`
--
ALTER TABLE `radiologyresult`
  MODIFY `radResult_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radiologytest`
--
ALTER TABLE `radiologytest`
  MODIFY `radTest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reception`
--
ALTER TABLE `reception`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `virtualsign`
--
ALTER TABLE `virtualsign`
  MODIFY `sig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
