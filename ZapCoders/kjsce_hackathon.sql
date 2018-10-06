-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 07:24 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kjsce_hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_certification`
--

CREATE TABLE `applicant_certification` (
  `email` varchar(100) NOT NULL,
  `tech` varchar(100) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `source` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_details`
--

CREATE TABLE `applicant_details` (
  `email` varchar(100) NOT NULL,
  `ssc_perc` double NOT NULL,
  `hsc_diploma_perc` double NOT NULL,
  `bachelor_degree` varchar(100) NOT NULL,
  `bachelor_cgpa` double NOT NULL,
  `bachelor_college` double NOT NULL,
  `masters_degree` varchar(100) DEFAULT NULL,
  `masters_cgpa` double DEFAULT NULL,
  `masters_college` varchar(100) DEFAULT NULL,
  `codechef_rating` int(11) DEFAULT NULL,
  `codeforces_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_internships`
--

CREATE TABLE `applicant_internships` (
  `email` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `company_rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_projects`
--

CREATE TABLE `applicant_projects` (
  `email` varchar(100) NOT NULL,
  `project_desc` varchar(500) NOT NULL,
  `github_link` varchar(100) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `project_stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_skills`
--

CREATE TABLE `applicant_skills` (
  `email` varchar(100) NOT NULL,
  `tech` varchar(100) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internship_tech`
--

CREATE TABLE `internship_tech` (
  `email` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `tech` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_tech`
--

CREATE TABLE `project_tech` (
  `email` varchar(100) NOT NULL,
  `project_desc` varchar(500) NOT NULL,
  `tech` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_certification`
--
ALTER TABLE `applicant_certification`
  ADD PRIMARY KEY (`email`,`tech`,`domain`,`source`);

--
-- Indexes for table `applicant_details`
--
ALTER TABLE `applicant_details`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `applicant_internships`
--
ALTER TABLE `applicant_internships`
  ADD PRIMARY KEY (`email`,`company`);

--
-- Indexes for table `applicant_projects`
--
ALTER TABLE `applicant_projects`
  ADD PRIMARY KEY (`email`,`project_desc`);

--
-- Indexes for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  ADD PRIMARY KEY (`email`,`tech`,`domain`,`rating`);

--
-- Indexes for table `internship_tech`
--
ALTER TABLE `internship_tech`
  ADD PRIMARY KEY (`email`,`company`,`tech`);

--
-- Indexes for table `project_tech`
--
ALTER TABLE `project_tech`
  ADD PRIMARY KEY (`email`,`project_desc`,`tech`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant_certification`
--
ALTER TABLE `applicant_certification`
  ADD CONSTRAINT `email_applicant_cert_fk` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant_details`
--
ALTER TABLE `applicant_details`
  ADD CONSTRAINT `email_applicant_details_fk` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant_internships`
--
ALTER TABLE `applicant_internships`
  ADD CONSTRAINT `email_application_internships_fk` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant_projects`
--
ALTER TABLE `applicant_projects`
  ADD CONSTRAINT `email_applicant_projects_fk` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  ADD CONSTRAINT `email_applicant_skills_fk` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `internship_tech`
--
ALTER TABLE `internship_tech`
  ADD CONSTRAINT `email_internship_tech_fk` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_tech`
--
ALTER TABLE `project_tech`
  ADD CONSTRAINT `email_project_tech_fk` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
