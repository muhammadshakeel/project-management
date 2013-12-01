-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2013 at 02:37 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE IF NOT EXISTS `batches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `batch` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `batch`) VALUES
(1, '2001-2002'),
(2, '2002-2003');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Category 1'),
(2, 'Oil & Gas'),
(3, 'Computers');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
(1, 'Test company'),
(2, 'SSGC (Pvt) Ltd.'),
(3, 'KESC');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `batch_id` int(10) unsigned NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `CompanyFK_idx` (`company_id`),
  KEY `CategoryFK_idx` (`category_id`),
  KEY `BacthFK_idx` (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `code`, `location`, `company_id`, `category_id`, `batch_id`, `created_on`, `modified_on`) VALUES
(3, 'testing manymnay', '3', '', 1, 1, 1, NULL, NULL),
(4, 'Project 2 id shoudl be 4', '123', '', 1, 1, 1, NULL, NULL),
(5, 'new project', '', '', 1, 1, 2, NULL, NULL),
(6, 'new project', '', '', 1, 1, 2, NULL, NULL),
(7, 'new project', '', '', 1, 1, 2, NULL, NULL),
(8, 'test', '', '', 1, 1, 2, NULL, NULL),
(9, 'Test project with all data', '123', 'test location', 1, 1, 1, NULL, NULL),
(10, 'Test project with all data', '123', 'test location', 1, 1, 1, NULL, NULL),
(11, 'My new project with all data', '123456', 'Karachi', 1, 1, 1, NULL, NULL),
(12, 'New project with students detail', '123', 'Karachi', 2, 2, 1, NULL, NULL),
(28, 'Test Project', '123', 'Karachi', 2, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_advisors`
--

CREATE TABLE IF NOT EXISTS `project_advisors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `type` varchar(2) NOT NULL COMMENT '1=Internal & 2=External',
  PRIMARY KEY (`id`),
  KEY `AdvisorFK_idx` (`teacher_id`),
  KEY `ProjectFK_idx` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `project_advisors`
--

INSERT INTO `project_advisors` (`id`, `project_id`, `teacher_id`, `type`) VALUES
(1, 7, 1, ''),
(2, 8, 3, ''),
(3, 8, 4, ''),
(4, 9, 3, ''),
(5, 10, 3, ''),
(6, 10, 3, '1'),
(7, 10, 2, '2'),
(8, 11, 1, '1'),
(9, 11, 2, '1'),
(10, 11, 3, '2'),
(11, 11, 4, '2'),
(12, 12, 2, '1'),
(13, 12, 4, '1'),
(14, 12, 1, '2'),
(15, 28, 2, '1'),
(16, 28, 3, '2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `batch_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `full_name`, `roll_no`, `batch_id`) VALUES
(1, 'Muhammad', 'Student 1', 'Student 1', 'BCIT-100', 1),
(2, 'Muhammad', 'Student 2', 'Muhammad Student 2', 'BCIT-100', 1),
(3, 'Test', 'Student 3', 'Student 3', 'BCIT-55', 1),
(4, 'batch 2', 'student', 'batch 2 student', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_project_groups`
--

CREATE TABLE IF NOT EXISTS `student_project_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `marks` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `StudentFK_idx` (`student_id`),
  KEY `StudentProjectGroup_Project_FK_idx` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `student_project_groups`
--

INSERT INTO `student_project_groups` (`id`, `student_id`, `project_id`, `marks`) VALUES
(2, 1, 3, '0.00'),
(3, 2, 3, '0.00'),
(5, 1, 4, '0.00'),
(6, 2, 4, '0.00'),
(7, 3, 8, '2.00'),
(8, 1, 8, '5.00'),
(9, 3, 9, '55.30'),
(10, 1, 9, '44.10'),
(11, 2, 9, '33.20'),
(12, 3, 9, '333.00'),
(13, 3, 10, '55.30'),
(14, 1, 10, '44.10'),
(15, 2, 10, '33.20'),
(16, 3, 10, '333.00'),
(17, 2, 11, '55.00'),
(18, 1, 11, '87.00'),
(19, 3, 11, '67.50'),
(20, 2, 11, '99.99'),
(21, 2, 12, '55.00'),
(22, 3, 12, '67.00'),
(23, 2, 12, '58.00'),
(24, 1, 12, '76.00'),
(70, 1, 28, '34.00'),
(71, 2, 28, '77.00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `title`, `first_name`, `last_name`, `full_name`) VALUES
(1, 'Mr.', 'Teacher first', 'last', 'Mr. Teacher first last'),
(2, 'Mr.', 'Teacher', '1', 'Teacher 1'),
(3, 'Mr.', 'Teacher', '2', 'Teacher 2'),
(4, 'Mr.', 'Teacher', '3', 'Teacher 3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `BacthFK` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CategoryFK` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CompanyFK` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project_advisors`
--
ALTER TABLE `project_advisors`
  ADD CONSTRAINT `AdvisorFK` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ProjectFK` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_project_groups`
--
ALTER TABLE `student_project_groups`
  ADD CONSTRAINT `StudentProjectGroup_Project_FK` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `StudentProjectGroup_Student_FK` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
