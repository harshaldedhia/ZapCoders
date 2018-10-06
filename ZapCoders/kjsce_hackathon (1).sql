-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2018 at 10:06 AM
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

--
-- Dumping data for table `applicant_certification`
--

INSERT INTO `applicant_certification` (`email`, `tech`, `domain`, `source`) VALUES
('atharvagole5@gmail.com', 'javascript', 'Front-End Development', 0.9),
('atharvagole5@gmail.com', 'python', 'machine-learning', 0.9),
('j@somaiya.edu', 'computer', 'front-end', 0.9);

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

--
-- Dumping data for table `applicant_details`
--

INSERT INTO `applicant_details` (`email`, `ssc_perc`, `hsc_diploma_perc`, `bachelor_degree`, `bachelor_cgpa`, `bachelor_college`, `masters_degree`, `masters_cgpa`, `masters_college`, `codechef_rating`, `codeforces_rating`) VALUES
('atharvagole5@gmail.com', 10, 1, 'computer', 10, 0.6, 'computer', 0, '0.6', 0, 0),
('j@somaiya.edu', 85, 98, 'computer', 8, 0.6, 'computer', 9, '0.6', 0, 0);

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

--
-- Dumping data for table `applicant_internships`
--

INSERT INTO `applicant_internships` (`email`, `company`, `duration`, `domain`, `company_rating`) VALUES
('atharvagole5@gmail.com', 'google', 2, 'machine-learning', 1),
('j@somaiya.edu', 'infosys', 5, 'front-end', 0.8);

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

--
-- Dumping data for table `applicant_projects`
--

INSERT INTO `applicant_projects` (`email`, `project_desc`, `github_link`, `domain`, `project_stars`) VALUES
('atharvagole5@gmail.com', 'Project1', '', 'machine-learning', 0),
('atharvagole5@gmail.com', 'Project2', '', 'front-end', 0),
('atharvagole5@gmail.com', 'Project3', '', 'back-end', 0),
('j@somaiya.edu', 'Project14423451', '', 'artificial-intelligence', 0),
('j@somaiya.edu', 'Project1443252516', '', 'game-theory', 0),
('j@somaiya.edu', 'Project14498', '', 'back-end', 0),
('j@somaiya.edu', 'Project1456', '', 'front-end', 0),
('j@somaiya.edu', 'Project34', '', 'deep-learning', 0);

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

--
-- Dumping data for table `applicant_skills`
--

INSERT INTO `applicant_skills` (`email`, `tech`, `domain`, `rating`) VALUES
('atharvagole5@gmail.com', 'computer', 'front-end', '0.8'),
('atharvagole5@gmail.com', 'python', 'machine-learning', '1'),
('j@somaiya.edu', 'python', 'machine-learning', '0.8');

-- --------------------------------------------------------

--
-- Table structure for table `internship_tech`
--

CREATE TABLE `internship_tech` (
  `email` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `tech` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship_tech`
--

INSERT INTO `internship_tech` (`email`, `company`, `tech`) VALUES
('atharvagole5@gmail.com', 'google', 'keras'),
('j@somaiya.edu', 'infosys', 'html');

-- --------------------------------------------------------

--
-- Table structure for table `project_tech`
--

CREATE TABLE `project_tech` (
  `email` varchar(100) NOT NULL,
  `project_desc` varchar(500) NOT NULL,
  `tech` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_tech`
--

INSERT INTO `project_tech` (`email`, `project_desc`, `tech`) VALUES
('atharvagole5@gmail.com', 'Project1', 'keras'),
('atharvagole5@gmail.com', 'Project2', 'html'),
('atharvagole5@gmail.com', 'Project3', 'php'),
('j@somaiya.edu', 'Project14423451', 'php'),
('j@somaiya.edu', 'Project1443252516', 'php'),
('j@somaiya.edu', 'Project14498', 'php'),
('j@somaiya.edu', 'Project1456', 'css'),
('j@somaiya.edu', 'Project34', 'keras');

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
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`email`, `password`, `user_type`, `name`) VALUES
('atharvagole5@gmail.com', '1234', 'applicant', 'Atharva Gole'),
('harshaldedhia11@gmail.com', '1234', 'organizer', 'harshal_dedhia'),
('j@somaiya.edu', '1234', 'applicant', 'abc');

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
