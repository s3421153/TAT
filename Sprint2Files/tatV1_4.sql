-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2016 at 10:50 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tat`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`) VALUES
(1, 'Bachelor of Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ProjectID` int(11) NOT NULL,
  `ProjectName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `MinStudents` int(11) NOT NULL,
  `MaxStudents` int(11) NOT NULL,
  `ConsiderGender` tinyint(1) NOT NULL,
  `ConsiderGPA` tinyint(1) NOT NULL,
  `fkCourseID` int(11) NOT NULL,
  `fkSubjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectID`, `ProjectName`, `MinStudents`, `MaxStudents`, `ConsiderGender`, `ConsiderGPA`, `fkCourseID`, `fkSubjectID`) VALUES
(1, 'Team Allocation Tool Algorithm', 5, 6, 1, 1, 1, 1),
(7, 'Team Allocation Tool UI', 4, 6, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projectskill`
--

CREATE TABLE `projectskill` (
  `fkProjectID` int(11) NOT NULL,
  `fkSkillID` int(11) NOT NULL,
  `requiredSkillLevel` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projectstudent`
--

CREATE TABLE `projectstudent` (
  `fkProjectID` int(11) NOT NULL,
  `fkStudentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skillID` int(11) NOT NULL,
  `skillName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `studentName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `studentEmail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `studentGPA` float DEFAULT NULL,
  `studentGender` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentskill`
--

CREATE TABLE `studentskill` (
  `fkStudentID` int(11) NOT NULL,
  `fkSkillID` int(11) NOT NULL,
  `studentSkillLevel` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectID` int(11) NOT NULL,
  `SubjectName` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `SubjectName`) VALUES
(1, 'CPT331');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Permissions` enum('Admin','Lecturer','Student') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Permissions`) VALUES
(1, 'Morgan', 'Morgan', 'Lecturer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `fkCourseID` (`fkCourseID`) USING BTREE,
  ADD KEY `fkSubjectID` (`fkSubjectID`) USING BTREE;

--
-- Indexes for table `projectskill`
--
ALTER TABLE `projectskill`
  ADD KEY `fkSkillID` (`fkSkillID`),
  ADD KEY `fkProjectID` (`fkProjectID`);

--
-- Indexes for table `projectstudent`
--
ALTER TABLE `projectstudent`
  ADD KEY `projectID` (`fkProjectID`),
  ADD KEY `studentID` (`fkStudentID`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skillID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `studentskill`
--
ALTER TABLE `studentskill`
  ADD KEY `studentID` (`fkStudentID`),
  ADD KEY `skillID` (`fkSkillID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skillID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`fkCourseID`) REFERENCES `course` (`CourseID`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`fkSubjectID`) REFERENCES `subject` (`SubjectID`);

--
-- Constraints for table `projectskill`
--
ALTER TABLE `projectskill`
  ADD CONSTRAINT `projectskill_ibfk_1` FOREIGN KEY (`fkSkillID`) REFERENCES `skill` (`skillID`),
  ADD CONSTRAINT `projectskill_ibfk_2` FOREIGN KEY (`fkProjectID`) REFERENCES `project` (`ProjectID`);

--
-- Constraints for table `projectstudent`
--
ALTER TABLE `projectstudent`
  ADD CONSTRAINT `projectstudent_ibfk_1` FOREIGN KEY (`fkProjectID`) REFERENCES `project` (`ProjectID`),
  ADD CONSTRAINT `projectstudent_ibfk_2` FOREIGN KEY (`fkStudentID`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `studentskill`
--
ALTER TABLE `studentskill`
  ADD CONSTRAINT `studentskill_ibfk_1` FOREIGN KEY (`fkStudentID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `studentskill_ibfk_2` FOREIGN KEY (`fkSkillID`) REFERENCES `skill` (`skillID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
