-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 04:02 AM
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
-- Database: `police_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `arrests`
--

CREATE TABLE `arrests` (
  `arrestee_ssn` varchar(11) NOT NULL,
  `officer_id` varchar(8) NOT NULL,
  `crime_description` text DEFAULT NULL,
  `court_case_num` varchar(12) DEFAULT NULL,
  `page_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arrests`
--

INSERT INTO `arrests` (`arrestee_ssn`, `officer_id`, `crime_description`, `court_case_num`, `page_link`) VALUES
('234-56-7890', '111-1111', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis consectetur massa, et fermentum sem.', '00001-000001', NULL),
('456-78-9012', '111-1112', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis consectetur massa, et fermentum sem.', '00001-000002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `case_id` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL COMMENT 'approximate',
  `victims` text NOT NULL,
  `offenders` text DEFAULT NULL,
  `evidence` text DEFAULT NULL,
  `witnesses` text DEFAULT NULL,
  `page_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `date`, `time`, `victims`, `offenders`, `evidence`, `witnesses`, `page_link`) VALUES
('00001-000001', '2022-06-14', '17:30:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in elit id lorem varius porttitor sed ut mauris.', 'Jeffrey Shaw', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in elit id lorem varius porttitor sed ut mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in elit id lorem varius porttitor sed ut mauris.', NULL),
('00001-000002', '2022-08-19', '22:45:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in elit id lorem varius porttitor sed ut mauris.', 'Peter West', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in elit id lorem varius porttitor sed ut mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in elit id lorem varius porttitor sed ut mauris.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offender`
--

CREATE TABLE `offender` (
  `ssn` varchar(11) NOT NULL,
  `name` text NOT NULL,
  `fingerprint_id` varchar(12) NOT NULL,
  `page_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offender`
--

INSERT INTO `offender` (`ssn`, `name`, `fingerprint_id`, `page_link`) VALUES
('123-45-6789', 'Paul Turner', '00000000001', NULL),
('234-56-7890', 'Jeffrey Shaw', '00000000002', NULL),
('345-67-8901', 'Edward Hudson', '00000000003', NULL),
('456-78-9012', 'Peter West', '00000000004', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `name` text NOT NULL,
  `officer_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='don''t add to site';

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`name`, `officer_id`) VALUES
('Hugh Riggs', '111-1111'),
('Sean Watts', '111-1112');

-- --------------------------------------------------------

--
-- Table structure for table `prosecutions`
--

CREATE TABLE `prosecutions` (
  `defender_ssn` varchar(11) NOT NULL,
  `defender_lawyer` text NOT NULL,
  `prosecutor_lawyer` text NOT NULL,
  `ruling` text NOT NULL,
  `case_id` varchar(12) NOT NULL,
  `court_case_num` varchar(12) NOT NULL,
  `page_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prosecutions`
--

INSERT INTO `prosecutions` (`defender_ssn`, `defender_lawyer`, `prosecutor_lawyer`, `ruling`, `case_id`, `court_case_num`, `page_link`) VALUES
('234-56-7890', 'Saul Goodman', 'Carmen Osborne', 'Guilty', '00001-000001', '00001-000001', NULL),
('456-78-9012', 'Saul Goodman', 'Evangeline Ponce', 'Guilty', '00001-000002', '00001-000002', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD UNIQUE KEY `case_id` (`case_id`);

--
-- Indexes for table `offender`
--
ALTER TABLE `offender`
  ADD UNIQUE KEY `ssn` (`ssn`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD UNIQUE KEY `officer_id` (`officer_id`);

--
-- Indexes for table `prosecutions`
--
ALTER TABLE `prosecutions`
  ADD UNIQUE KEY `court_case_num` (`court_case_num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
