-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 11:58 AM
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
-- Database: `certificate`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificatelogo`
--

CREATE TABLE `certificatelogo` (
  `id` int(11) NOT NULL,
  `leftLogo` varchar(50) NOT NULL,
  `rightLogo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificatelogo`
--

INSERT INTO `certificatelogo` (`id`, `leftLogo`, `rightLogo`) VALUES
(1, 'images/89419578.PNG', 'images/92859941.PNG'),
(2, 'images/14866712.png', 'images/19976805.png'),
(3, 'images/26204674.PNG', 'images/14921920.PNG'),
(4, 'images/43617096.png', 'images/76627342.png');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `Name` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`Name`, `Title`, `Content`) VALUES
('Invited Talk', 'Certificate  of  Appreciation', 'Presented to %placeholder1%. %placeholder2%%placeholder3% in Department of %placeholder4% of %placeholder5% for his/her valuable participation as resource person in the %eventtype% on &quot;%eventname%&quot;, organized by Department of Computer Science at Deen Dayal Upadhyaya College from %startdate% to %enddate%. He/She delivered a talk on &quot;%placeholder6%&quot;.'),
('Merit', 'Certificate of Merit', 'This is to certify that %placeholder1%. %placeholder2% of %placeholder3% %placeholder4% year of %placeholder5% \r\n secured %placeholder6% position in %eventtype% on &quot;%eventname%&quot; organized under Debating Society at Deen Dayal Upadhyaya College on%startdate%.'),
('Participation', 'Certificate of Participation', 'This is to certify that %placeholder1% %placeholder2% of %placeholder3% %placeholder4% year of %placeholder5% participated in %eventtype% on &quot;%eventname%&quot; held on %startdate% under the Special Program for Learners at Deen Dayal Upadhyaya College .');

-- --------------------------------------------------------

--
-- Table structure for table `currentlogo`
--

CREATE TABLE `currentlogo` (
  `id` int(11) NOT NULL,
  `leftLogo` varchar(50) NOT NULL,
  `rightLogo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentlogo`
--

INSERT INTO `currentlogo` (`id`, `leftLogo`, `rightLogo`) VALUES
(1, 'images/14866712.png', 'images/19976805.png');

-- --------------------------------------------------------

--
-- Table structure for table `eventtypes`
--

CREATE TABLE `eventtypes` (
  `EventType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventtypes`
--

INSERT INTO `eventtypes` (`EventType`) VALUES
('Debate'),
('Technical Events'),
('Workshop');

-- --------------------------------------------------------

--
-- Table structure for table `generatedcertificate`
--

CREATE TABLE `generatedcertificate` (
  `id` int(11) NOT NULL,
  `FileName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificatelogo`
--
ALTER TABLE `certificatelogo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `currentlogo`
--
ALTER TABLE `currentlogo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventtypes`
--
ALTER TABLE `eventtypes`
  ADD PRIMARY KEY (`EventType`);

--
-- Indexes for table `generatedcertificate`
--
ALTER TABLE `generatedcertificate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificatelogo`
--
ALTER TABLE `certificatelogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currentlogo`
--
ALTER TABLE `currentlogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `generatedcertificate`
--
ALTER TABLE `generatedcertificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
