-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 11:41 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `block2-back_end`
--

-- --------------------------------------------------------

--
-- Table structure for table `astronaut`
--

CREATE TABLE `astronaut` (
  `astronaut_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `no_missions` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `astronaut`
--

INSERT INTO `astronaut` (`astronaut_id`, `name`, `no_missions`) VALUES
(1, 'Mollie', 10),
(2, 'Dillan', 7),
(3, 'Thema', 51),
(4, 'Amber', 4),
(5, 'Fernando', 9);

-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

CREATE TABLE `attends` (
  `mission_id` int(11) NOT NULL,
  `astronaut_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attends`
--

INSERT INTO `attends` (`mission_id`, `astronaut_id`) VALUES
(1, 1),
(1, 5),
(2, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `mission_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `destination` text NOT NULL,
  `launch_date` date NOT NULL,
  `type` text NOT NULL,
  `crew_size` int(11) NOT NULL,
  `target_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`mission_id`, `name`, `destination`, `launch_date`, `type`, `crew_size`, `target_id`) VALUES
(1, 'G-8', 'Pluto', '1996-08-21', 'Group', 15, 3),
(2, 'G-6', 'Mars', '1983-04-05', 'satellite', 10, 1),
(3, 'G-2', 'Moon', '1999-01-01', 'Group', 52, 4),
(4, 'G-23', 'Jupiter', '2021-03-13', 'Group', 48, 2);

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `target_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `first_mission` date NOT NULL,
  `type` text NOT NULL,
  `no_mission` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`target_id`, `name`, `first_mission`, `type`, `no_mission`) VALUES
(1, 'RedPlanet', '1996-01-02', 'Space', 2),
(2, 'Alack', '1992-06-13', 'Space', 3),
(3, 'TinyTarget', '1984-01-02', 'Space', 1),
(4, 'Luna', '1965-02-04', 'Space', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `astronaut`
--
ALTER TABLE `astronaut`
  ADD PRIMARY KEY (`astronaut_id`);

--
-- Indexes for table `attends`
--
ALTER TABLE `attends`
  ADD PRIMARY KEY (`mission_id`,`astronaut_id`),
  ADD KEY `attends_ibfk_2` (`astronaut_id`);

--
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`mission_id`),
  ADD KEY `mission_ibfk_1` (`target_id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`target_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `astronaut`
--
ALTER TABLE `astronaut`
  MODIFY `astronaut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `mission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `target_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attends`
--
ALTER TABLE `attends`
  ADD CONSTRAINT `attends_ibfk_1` FOREIGN KEY (`mission_id`) REFERENCES `mission` (`mission_id`),
  ADD CONSTRAINT `attends_ibfk_2` FOREIGN KEY (`astronaut_id`) REFERENCES `astronaut` (`astronaut_id`);

--
-- Constraints for table `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `mission_ibfk_1` FOREIGN KEY (`target_id`) REFERENCES `targets` (`target_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
