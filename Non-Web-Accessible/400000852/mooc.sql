-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 10:57 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `course_description` text NOT NULL,
  `course_recommendation_count` mediumint(6) NOT NULL,
  `course_access_count` mediumint(9) NOT NULL,
  `course_image` varchar(20) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `course_recommendation_count`, `course_access_count`, `course_image`) VALUES
(1, 'Introduction to Data Structures', 'Computers can store and process vast amounts of data. Formal data structures enable a programmer to mentally structure large amounts of data into conceptually manageable relationships.', 25, 100, 'datastructures.jpg'),
(2, 'Compiler Theory', 'Compiler construction is an area of computer science that deals with the theory and practice of developing programming languages and their associated compilers.', 43, 543, 'compiler.png'),
(3, 'Software Engineering', 'Software engineering is the study and an application of engineering to the design, development, and maintenance of software.', 57, 435, 'software.jpg'),
(4, 'Molecular Biochemistry', 'The study of the molecular mechanisms by which genetic information encoded in DNA is able to result in the processes of life. ', 322, 356, 'molecular.jpg'),
(5, 'Introduction to Renewable Energy', 'Introduction to Renewable Energy (RE100) is an online course for those who wish to learn the basics of renewable energy – including where it is found, how we can harvest it for use in our homes, and how it can help ease pressures on the environment.', 876, 6334, 'renewable.jpg'),
(6, 'Marine Biology', 'The scientific study of organisms in the ocean or other marine or brackish bodies of water. Given that in biology many phyla, families and genera have some species that live in the sea and others that live on land, marine biology classifies species based on the environment rather than on taxonomy.', 42, 974, 'marine.jpg'),
(7, 'Introduction to Astronomy', 'Introduction to Astronomy provides a quantitative introduction to the physics of the solar system, stars, the interstellar medium, the galaxy, and the universe, as determined from a variety of astronomical observations and models.', 342, 6367, 'astronomy.jpg'),
(8, 'Robotics', 'Robotics is the branch of mechanical engineering, electrical engineering and computer science that deals with the design, construction, operation, and application of robots, as well as computer systems for their control, sensory feedback, and information processing.', 12, 342, 'robotics.jpg'),
(9, 'Artificial Intelligence', 'Artificial intelligence (AI) is the intelligence exhibited by machines or software. It is an academic field of study which studies the goal of creating intelligence. Major AI researchers and textbooks define this field as "the study and design of intelligent agents."', 32767, 312, 'ai.jpg'),
(10, 'Networks & Security', 'Network security consists of the provisions and policies adopted by a network administrator to prevent and monitor unauthorized access, misuse, modification, or denial of a computer network and network-accessible resources.', 73455, 244, 'networksecurity.jpg'),
(11, 'Biochemistry of Human Disease', 'Specifically designed for upper-division undergraduate or graduate students in life science or pre-medical majors including dentistry or pharmacology, who are required to take a biochemistry or medical biochemistry course.', 6980, 634, 'humandisease.jpg'),
(12, 'Introduction to Genetics', '', 45678, 324, 'genetics.jpg'),
(13, 'Basic Mathematics', 'Introduces basic algebraic, geometric, and two dimensional graphing techniques and applications. The course is designed primarily for students in specific vocational or technical programs.', 3452, 776, 'mathematics.jpg'),
(14, 'Introduction to Electronics', 'Getting started with basic electronics is easier than you might think. This course will demystify the basics of electronics so that anyone with an interest in building circuits can hit the ground running. ', 54334, 5443, 'electronics.jpg'),
(15, 'Object-Oriented Programming', 'Object-oriented programming (OOP) is a programming paradigm based on the concept of "objects", which are data structures that contain data, in the form of fields, often known as attributes; and code, in the form of procedures, often known as methods', 45443, 4657, 'oop.jpg'),
(16, 'Computational Physics', 'Computational physics is the study and implementation of numerical analysis to solve problems in physics for which a quantitative theory already exists.', 67664, 423, 'physics.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE IF NOT EXISTS `course_instructor` (
  `course_id` tinyint(4) NOT NULL,
  `instructor_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`course_id`,`instructor_id`),
  KEY `instructor_id` (`instructor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_instructor`
--

INSERT INTO `course_instructor` (`course_id`, `instructor_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_department`
--

CREATE TABLE IF NOT EXISTS `faculty_department` (
  `faculty_dept_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `faculty_dept_name` varchar(60) NOT NULL,
  PRIMARY KEY (`faculty_dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `faculty_department`
--

INSERT INTO `faculty_department` (`faculty_dept_id`, `faculty_dept_name`) VALUES
(1, 'Department of Computer Science'),
(2, 'Biology Department'),
(3, 'Department of Electronics'),
(4, 'Department of Mathematics'),
(5, 'Department of Physics'),
(6, 'Department of Chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_dept_courses`
--

CREATE TABLE IF NOT EXISTS `faculty_dept_courses` (
  `faculty_dept_id` tinyint(4) NOT NULL,
  `course_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`faculty_dept_id`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_dept_courses`
--

INSERT INTO `faculty_dept_courses` (`faculty_dept_id`, `course_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 8),
(1, 9),
(1, 10),
(1, 15),
(2, 6),
(2, 11),
(2, 12),
(3, 5),
(3, 7),
(3, 8),
(3, 14),
(4, 13),
(5, 16),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE IF NOT EXISTS `instructors` (
  `instructor_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `instructor_name` varchar(50) NOT NULL,
  PRIMARY KEY (`instructor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `instructor_name`) VALUES
(1, 'Findlay Roberts'),
(2, 'Tane Ray'),
(3, 'Curtis Gittens'),
(4, 'Mechelle Gittens'),
(5, 'Joseph Hoade'),
(6, 'Roberta Messands'),
(7, 'George Eina'),
(8, 'Wesley Ford'),
(9, 'Jussiiala Kiind'),
(10, 'Morgan Stanley'),
(11, 'Thomas Edward'),
(12, 'Margo Holder'),
(13, 'Hussein Thompson'),
(14, 'Dwaine Clarke'),
(15, 'John Charlery'),
(16, 'Jeffrey Elcock'),
(17, 'Carlos Hunte'),
(18, 'Peter Chami'),
(19, 'Bernd Sing'),
(20, 'Smail Mahdi'),
(21, 'Jonathan Funk'),
(22, 'Adrian Als'),
(23, 'Paul Walcott'),
(24, 'Tessa King-Inniss'),
(25, 'Upindranath Singh');

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE IF NOT EXISTS `streams` (
  `stream_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `stream_name` varchar(60) NOT NULL,
  `stream_image` varchar(50) NOT NULL,
  PRIMARY KEY (`stream_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`stream_id`, `stream_name`, `stream_image`) VALUES
(1, 'Data Scientist Stream', 'softwarearchitect.jpg'),
(2, 'Web Architect Stream', 'webarchitect.png'),
(3, 'Software Architect Stream', 'softwarearchitect.jpg'),
(4, 'Forensic Scientist Stream', 'forensicscience.jpg'),
(5, 'Software Quality Assurance Stream', 'softwarequalityassurance.jpg'),
(6, 'Astronomy Calculus Stream', 'astronomycalculus.jpg'),
(7, 'Multi-Agent Systems Stream', 'aistream.png'),
(8, 'Biological Statistics Stream', 'biostatistics.jpg'),
(9, 'Designing Renewable Energy Systems Stream', 'renewablestream.jpg'),
(10, 'Robots and Automation Stream', 'automation.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stream_instructor`
--

CREATE TABLE IF NOT EXISTS `stream_instructor` (
  `stream_id` smallint(4) NOT NULL,
  `instructor_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`stream_id`,`instructor_id`),
  KEY `instructor_id` (`instructor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stream_instructor`
--

INSERT INTO `stream_instructor` (`stream_id`, `instructor_id`) VALUES
(10, 1),
(1, 17),
(2, 18),
(3, 19),
(4, 20),
(5, 21),
(6, 22),
(7, 23),
(8, 24),
(9, 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE IF NOT EXISTS `user_courses` (
  `email` varchar(100) NOT NULL,
  `course_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`email`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD CONSTRAINT `course_instructor_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`),
  ADD CONSTRAINT `course_instructor_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `stream_instructor`
--
ALTER TABLE `stream_instructor`
  ADD CONSTRAINT `stream_instructor_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`),
  ADD CONSTRAINT `stream_instructor_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `streams` (`stream_id`);

--
-- Constraints for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `user_courses_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
