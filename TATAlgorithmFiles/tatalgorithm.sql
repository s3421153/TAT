-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2016 at 01:03 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tatalgorithm`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`) VALUES
(1, 'Bachelor Information Technology'),
(2, 'Bachelor of Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

CREATE TABLE `passwords` (
  `PasswordId` int(30) UNSIGNED NOT NULL,
  `Password` varchar(255) NOT NULL DEFAULT '',
  `UserID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passwords`
--

INSERT INTO `passwords` (`PasswordId`, `Password`, `UserID`) VALUES
(1, '$2y$10$ClpVUKYWPP8eU48kOLKC6OkGMF3VVrZ6lzUuN7WUT58Y.qUqH/P12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ProjectID` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `StudentMax` int(11) DEFAULT NULL,
  `TakeGPAintoAccount` tinyint(1) DEFAULT NULL,
  `GenderBalance` tinyint(1) DEFAULT NULL,
  `StudentMin` int(11) DEFAULT NULL,
  `P_SubjectID` int(11) DEFAULT NULL,
  `GPALevel` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectID`, `Name`, `StudentMax`, `TakeGPAintoAccount`, `GenderBalance`, `StudentMin`, `P_SubjectID`, `GPALevel`) VALUES
(1, 'Team Allocation Tool - UI', 2, 1, 0, 2, 331, 3),
(2, 'Team Allocation Tool - Algorithm', 4, 1, 1, 4, 331, 0),
(3, 'Temporal Big Data Visualization', 6, 1, 1, 6, 330, 0),
(5, 'Spatio - News Stands', 6, 1, 0, 4, 330, 0),
(6, 'Converting Finger Movement/Gestures to English text with  Leap motion sensor', 5, 0, 1, 5, 331, 0),
(7, 'Image Evolver App', 6, 1, 0, 4, 378, 0),
(8, 'Cloud-based spatio-temporal real-time data collection for Embedded Systems', 6, 0, 1, 5, 378, 0),
(9, 'iNeedIT:  A web based B2C business website', 6, 1, 1, 4, 378, 0),
(10, 'Enhancing an Augmented Reality Prototype Game', 6, 1, 1, 3, 378, 0),
(11, 'Java 1', 6, 1, 1, 4, 329, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projectcounts`
--

CREATE TABLE `projectcounts` (
  `PC_ID` int(11) NOT NULL,
  `PC_ProjectID` int(11) NOT NULL,
  `PC_AllocatedCount` int(11) NOT NULL,
  `PC_MaleCount` int(11) NOT NULL,
  `PC_FemaleCount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projectcounts`
--

INSERT INTO `projectcounts` (`PC_ID`, `PC_ProjectID`, `PC_AllocatedCount`, `PC_MaleCount`, `PC_FemaleCount`) VALUES
(1, 1, 2, 0, 0),
(2, 2, 2, 0, 0),
(3, 6, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projectskill`
--

CREATE TABLE `projectskill` (
  `PS_ID` int(11) NOT NULL,
  `PS_ProjectID` int(11) DEFAULT NULL,
  `PS_SkillID` int(11) DEFAULT NULL,
  `PS_Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projectskill`
--

INSERT INTO `projectskill` (`PS_ID`, `PS_ProjectID`, `PS_SkillID`, `PS_Rating`) VALUES
(1030, 1, 1010, 0),
(1031, 2, 1011, 0),
(1032, 3, 1012, 0),
(1034, 1, 1011, 0);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `SkillID` int(11) NOT NULL,
  `Description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`SkillID`, `Description`) VALUES
(1010, 'PHP Programming'),
(1011, 'Java'),
(1012, 'Web Design'),
(1013, 'Security Essentials');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `StudentNo` int(11) DEFAULT NULL,
  `First_Name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `Email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Last_Name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gender` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StudentGPA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `StudentNo`, `First_Name`, `Email`, `Last_Name`, `Gender`, `StudentGPA`) VALUES
(1001128, 3289821, 'Craig', '328921@student.rmit.edu.au', 'Rodriguez', 'Male', 3.5),
(1005811, 3841135, 'Janice', '1005811@student.rmit.edu.au', 'Knight', 'Female', 0),
(1019983, 3131009, 'Kenneth', '1019983@student.rmit.edu.au', 'Grant', 'Male', 0),
(1059579, 3735411, 'Jeffrey', '1059579@student.rmit.edu.au', 'Black', 'Male', 0),
(1068795, 3060072, 'Bobby', '1068795@student.rmit.edu.au', 'Hanson', 'Male', 0),
(1074113, 3475410, 'Johnny', '1074113@student.rmit.edu.au', 'Price', 'Male', 0),
(1079431, 3291479, 'Terry', '1079431@student.rmit.edu.au', 'Murray', 'Male', 0),
(1107395, 3257309, 'Samuel', '1107395@student.rmit.edu.au', 'Murphy', 'Male', 0),
(1110493, 3196169, 'Cynthia', '1110493@student.rmit.edu.au', 'Rodriguez', 'Female', 0),
(1173856, 3933524, 'Deborah', '1173856@student.rmit.edu.au', 'Johnson', 'Female', 0),
(1184148, 3422996, 'Daniel', '1184148@student.rmit.edu.au', 'Fisher', 'Male', 0),
(1220790, 3824014, 'Thomas', '1220790@student.rmit.edu.au', 'Porter', 'Male', 0),
(1252232, 3125986, 'Rachel', '1252232@student.rmit.edu.au', 'Ortiz', 'Female', 0),
(1257532, 3414863, 'Patrick', '1257532@student.rmit.edu.au', 'Cunningham', 'Male', 0),
(1290599, 3054037, 'Deborah', '1290599@student.rmit.edu.au', 'Gilbert', 'Female', 0),
(1315223, 3092520, 'Debra', '3092520@student.rmit.edu.au', 'Harrison', 'Female', 0),
(1315758, 3520675, 'Alan', '3520675@student.rmit.edu.au', 'Dunn', 'Male', 0),
(1348482, 3158825, 'Amanda', '1348482@student.rmit.edu.au', 'Sanchez', 'Female', 0),
(1357903, 3993704, 'Justin', '3993704@student.rmit.edu.au', 'Graham', 'Male', 0),
(1390233, 3625579, 'Jerry', '1390233@student.rmit.edu.au', 'Wilson', 'Male', 0),
(1425159, 3909008, 'Cynthia', '3909008@student.rmit.edu.au', 'Bailey', 'Female', 0),
(1446559, 3087302, 'William', '1446559@student.rmit.edu.au', 'Myers', 'Male', 0),
(1490027, 3646480, 'Jennifer', '1490027@student.rmit.edu.au', 'Dixon', 'Female', 0),
(1510110, 3584966, 'Marilyn', '1510110@student.rmit.edu.au', 'Morrison', 'Female', 0),
(1538732, 3495674, 'Heather', '1538732@student.rmit.edu.au', 'Edwards', 'Female', 0),
(1559875, 3417065, 'Wayne', '1559875@student.rmit.edu.au', 'Sims', 'Male', 0),
(1576814, 3227613, 'Todd', '3227613@student.rmit.edu.au', 'Stephens', 'Male', 0),
(1581722, 3890350, 'Harry', '1581722@student.rmit.edu.au', 'Larson', 'Male', 0),
(1597238, 3876307, 'Eric', '1597238@student.rmit.edu.au', 'Lawrence', 'Male', 0),
(1627580, 3912623, 'Jacqueline', '1627580@student.rmit.edu.au', 'Anderson', 'Female', 0),
(1656698, 3314922, 'Andrew', '1656698@student.rmit.edu.au', 'Hicks', 'Male', 0),
(1658152, 3843899, 'Thomas', '1658152@student.rmit.edu.au', 'Romero', 'Male', 0),
(1687614, 3341826, 'Andrew', '3341826@student.rmit.edu.au', 'Little', 'Male', 0),
(1723170, 3841238, 'Dennis', '1723170@student.rmit.edu.au', 'Carpenter', 'Male', 0),
(1730061, 3780341, 'Larry', '1730061@student.rmit.edu.au', 'King', 'Male', 0),
(1734247, 3045675, 'Matthew', '1734247@student.rmit.edu.au', 'Greene', 'Male', 0),
(1735468, 3569799, 'Carolyn', '1735468@student.rmit.edu.au', 'Palmer', 'Female', 0),
(1740281, 3883369, 'Julie', '3883369@student.rmit.edu.au', 'Reynolds', 'Female', 0),
(1742075, 3846984, 'Robert', '1742075@student.rmit.edu.au', 'Simmons', 'Male', 0),
(1754556, 3253333, 'Phyllis', '1754556@student.rmit.edu.au', 'Henderson', 'Female', 0),
(1760477, 3172211, 'Phillip', '1760477@student.rmit.edu.au', 'Payne', 'Male', 0),
(1766316, 3551512, 'Amanda', '1766316@student.rmit.edu.au', 'Dean', 'Female', 0),
(1816320, 3873521, 'Patricia', '3873521@student.rmit.edu.au', 'Wells', 'Female', 0),
(1864333, 3050325, 'Ruth', '1864333@student.rmit.edu.au', 'Burke', 'Female', 0),
(1865593, 3266255, 'Susan', '1865593@student.rmit.edu.au', 'Campbell', 'Female', 0),
(1903820, 3989498, 'Jacqueline', '1903820@student.rmit.edu.au', 'Daniels', 'Female', 0),
(1949163, 3011596, 'Pamela', '1949163@student.rmit.edu.au', 'Washington', 'Female', 0),
(1951810, 3960931, 'Rachel', '3960931@student.rmit.edu.au', 'Knight', 'Female', 0),
(1970631, 3540674, 'Brian', '3540674@student.rmit.edu.au', 'Sullivan', 'Male', 0),
(1998652, 3008706, 'Steven', '1998652@student.rmit.edu.au', 'Cunningham', 'Male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentprojectpreference`
--

CREATE TABLE `studentprojectpreference` (
  `SPP_ID` int(11) NOT NULL,
  `SPP_Preference` int(11) DEFAULT NULL,
  `SPP_StudentID` int(11) DEFAULT NULL,
  `SPP_ProjectID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentprojectpreference`
--

INSERT INTO `studentprojectpreference` (`SPP_ID`, `SPP_Preference`, `SPP_StudentID`, `SPP_ProjectID`) VALUES
(1040, 1, 1315758, 1),
(1041, 2, 1970631, 2),
(1042, 3, 1315223, 3),
(1045, 3, 1001128, 3),
(1046, 2, 1576814, 2),
(1047, 1, 1687614, 1),
(1048, 3, 1425159, 3),
(1050, 1, 1425159, 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentskill`
--

CREATE TABLE `studentskill` (
  `SS_ID` int(11) NOT NULL,
  `SS_Rating` int(11) DEFAULT NULL,
  `SS_StudentID` int(11) DEFAULT NULL,
  `SS_SkillID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentskill`
--

INSERT INTO `studentskill` (`SS_ID`, `SS_Rating`, `SS_StudentID`, `SS_SkillID`) VALUES
(1020, 0, 1315758, 1010),
(1021, 0, 1970631, 1011),
(1022, 1, 1315223, 1011),
(1023, 0, 1951810, 1013),
(1024, 0, 1740281, 1013),
(1025, 0, 1001128, 1012),
(1026, 0, 1576814, 1010),
(1027, 0, 1687614, 1011),
(1028, 0, 1425159, 1010),
(1029, 0, 1816320, 1010),
(1030, 0, 1425159, 1011);

-- --------------------------------------------------------

--
-- Table structure for table `studentsubjectresult`
--

CREATE TABLE `studentsubjectresult` (
  `SSR_ID` int(11) NOT NULL,
  `SSR_Mark` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SSR_StudentID` int(11) DEFAULT NULL,
  `SSR_SubjectID` int(11) DEFAULT NULL,
  `SSR_Score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentsubjectresult`
--

INSERT INTO `studentsubjectresult` (`SSR_ID`, `SSR_Mark`, `SSR_StudentID`, `SSR_SubjectID`, `SSR_Score`) VALUES
(22, '', 1315758, 331, 0),
(24, 'D', 1315758, 378, 75),
(32, 'H0', 1315223, 331, 0),
(34, 'C', 1315223, 378, 65),
(38, 'HD', 1951810, 329, 90),
(41, 'HD', 1740281, 329, 90),
(43, 'D', 1740281, 378, 75),
(49, '', 1001128, 331, 0),
(55, 'C', 1576814, 378, 65),
(63, '', 1425159, 331, 0),
(69, 'HD', 1816320, 329, 90);

-- --------------------------------------------------------

--
-- Table structure for table `studentsuitability`
--

CREATE TABLE `studentsuitability` (
  `SSR_StudentID` int(11) DEFAULT NULL,
  `ProjectID` int(11) NOT NULL,
  `SuitabilityScore` int(1) NOT NULL DEFAULT '0',
  `SuitabilityID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectID` int(11) NOT NULL,
  `SubjectName` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreditPoints` int(11) DEFAULT NULL,
  `S_CourseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `SubjectName`, `CreditPoints`, `S_CourseID`) VALUES
(123, 'Algorithms and Analysis', 12, 2),
(329, 'Programming 1', 10, 1),
(330, 'SE Project Management', 10, 1),
(331, 'Programming Project', 12, 1),
(378, 'Web Programming', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teammember`
--

CREATE TABLE `teammember` (
  `TM_ID` int(11) NOT NULL,
  `TM_Number` int(11) DEFAULT NULL,
  `TM_StudentID` int(11) DEFAULT NULL,
  `TM_ProjectID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teammember`
--

INSERT INTO `teammember` (`TM_ID`, `TM_Number`, `TM_StudentID`, `TM_ProjectID`) VALUES
(221, 1, 1425159, 1),
(222, 1, 1315758, 1),
(223, 2, 1315223, 2),
(224, 2, 1001128, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(30) UNSIGNED NOT NULL,
  `Type` varchar(30) NOT NULL DEFAULT '',
  `Permissions` varchar(30) NOT NULL DEFAULT '',
  `Email` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Type`, `Permissions`, `Email`) VALUES
(1, 'admin', 'null', 'test@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`PasswordId`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `P_SubjectID_idx` (`P_SubjectID`);

--
-- Indexes for table `projectcounts`
--
ALTER TABLE `projectcounts`
  ADD PRIMARY KEY (`PC_ID`);

--
-- Indexes for table `projectskill`
--
ALTER TABLE `projectskill`
  ADD PRIMARY KEY (`PS_ID`),
  ADD UNIQUE KEY `PS_ID_UNIQUE` (`PS_ID`),
  ADD KEY `PS_ProjectID_idx` (`PS_ProjectID`),
  ADD KEY `PS_SkillID_idx` (`PS_SkillID`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`SkillID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `studentprojectpreference`
--
ALTER TABLE `studentprojectpreference`
  ADD PRIMARY KEY (`SPP_ID`),
  ADD KEY `SPP_StudentID_idx` (`SPP_StudentID`),
  ADD KEY `SPP_ProjectID_idx` (`SPP_ProjectID`);

--
-- Indexes for table `studentskill`
--
ALTER TABLE `studentskill`
  ADD PRIMARY KEY (`SS_ID`),
  ADD KEY `StudentID_idx` (`SS_StudentID`),
  ADD KEY `SkillID_idx` (`SS_SkillID`);

--
-- Indexes for table `studentsubjectresult`
--
ALTER TABLE `studentsubjectresult`
  ADD PRIMARY KEY (`SSR_ID`),
  ADD KEY `SubjectID_idx` (`SSR_SubjectID`),
  ADD KEY `StudentID_idx` (`SSR_StudentID`);

--
-- Indexes for table `studentsuitability`
--
ALTER TABLE `studentsuitability`
  ADD PRIMARY KEY (`SuitabilityID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectID`),
  ADD KEY `S_CourseID_idx` (`S_CourseID`);

--
-- Indexes for table `teammember`
--
ALTER TABLE `teammember`
  ADD PRIMARY KEY (`TM_ID`),
  ADD KEY `StudentID_idx` (`TM_StudentID`),
  ADD KEY `ProjectID_idx` (`TM_ProjectID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passwords`
--
ALTER TABLE `passwords`
  MODIFY `PasswordId` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projectcounts`
--
ALTER TABLE `projectcounts`
  MODIFY `PC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projectskill`
--
ALTER TABLE `projectskill`
  MODIFY `PS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1035;
--
-- AUTO_INCREMENT for table `studentprojectpreference`
--
ALTER TABLE `studentprojectpreference`
  MODIFY `SPP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1051;
--
-- AUTO_INCREMENT for table `studentskill`
--
ALTER TABLE `studentskill`
  MODIFY `SS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;
--
-- AUTO_INCREMENT for table `studentsuitability`
--
ALTER TABLE `studentsuitability`
  MODIFY `SuitabilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `teammember`
--
ALTER TABLE `teammember`
  MODIFY `TM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `P_SubjectID` FOREIGN KEY (`P_SubjectID`) REFERENCES `subject` (`SubjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectskill`
--
ALTER TABLE `projectskill`
  ADD CONSTRAINT `PS_ProjectID` FOREIGN KEY (`PS_ProjectID`) REFERENCES `project` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PS_SkillID` FOREIGN KEY (`PS_SkillID`) REFERENCES `skill` (`SkillID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentprojectpreference`
--
ALTER TABLE `studentprojectpreference`
  ADD CONSTRAINT `SPP_ProjectID` FOREIGN KEY (`SPP_ProjectID`) REFERENCES `project` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SPP_StudentID` FOREIGN KEY (`SPP_StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentskill`
--
ALTER TABLE `studentskill`
  ADD CONSTRAINT `SS_SkillID` FOREIGN KEY (`SS_SkillID`) REFERENCES `skill` (`SkillID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SS_StudentID` FOREIGN KEY (`SS_StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentsubjectresult`
--
ALTER TABLE `studentsubjectresult`
  ADD CONSTRAINT `SSR_StudentID` FOREIGN KEY (`SSR_StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SSR_SubjectID` FOREIGN KEY (`SSR_SubjectID`) REFERENCES `subject` (`SubjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `S_CourseID` FOREIGN KEY (`S_CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teammember`
--
ALTER TABLE `teammember`
  ADD CONSTRAINT `TM_ProjectID` FOREIGN KEY (`TM_ProjectID`) REFERENCES `project` (`ProjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TM_StudentID` FOREIGN KEY (`TM_StudentID`) REFERENCES `student` (`StudentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
