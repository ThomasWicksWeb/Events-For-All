-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 04:39 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EventsForAll`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attendees`
--

CREATE TABLE `Attendees` (
  `attendeeID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Attendees`
--

INSERT INTO `Attendees` (`attendeeID`, `eventID`, `userID`) VALUES
(1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `EventImgs`
--

CREATE TABLE `EventImgs` (
  `imageID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `EventImgs`
--

INSERT INTO `EventImgs` (`imageID`, `eventID`, `userID`, `imageName`) VALUES
(1, 9, 1, '5ea62a0f61fb52.63429654.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `EventID` int(11) NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL,
  `eventTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endDate` date DEFAULT NULL,
  `endTime` time NOT NULL,
  `street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `USstate` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `eventDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `genre` int(2) NOT NULL,
  `privacy` tinyint(1) NOT NULL DEFAULT '0',
  `maxNumAttendees` int(10) DEFAULT NULL,
  `eventStatus` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`EventID`, `userID`, `eventTitle`, `startDate`, `startTime`, `endDate`, `endTime`, `street`, `city`, `USstate`, `zip`, `eventDescription`, `genre`, `privacy`, `maxNumAttendees`, `eventStatus`) VALUES
(1, 1, 'Test Event 1', '2020-03-22', '12:00:00', '2020-03-22', '13:00:00', '720 Northern Blvd.', 'Brookville', 'NY', '11548', 'This is a test event.', 9, 0, NULL, 0),
(2, 1, 'Test Event 2', '2020-03-31', '12:00:00', '2020-03-31', '13:00:00', '746 Sheraton Drive', 'Virginia Beach', 'Va', '23452', 'This is a test event', 0, 0, NULL, 0),
(3, 37, 'Test Event 10', '2020-04-18', '12:00:00', '2020-04-18', '13:00:00', '20 Tester Drive', 'Wheatley heights', 'NY', '11798', 'This is another test event.', 2, 0, 20, 0),
(4, 1, 'Test Event 12', '2020-04-25', '12:00:00', '2020-04-25', '13:00:00', '250 Cricket Court', 'Wading River', 'NY', '12345', 'description of event.', 0, 0, 0, 0),
(5, 1, 'Test Event 11', '2020-04-30', '12:00:00', '2020-04-30', '13:00:00', '720 Northern Blvd.', 'Brookville', 'NY', '11548', 'Testing event image.', 2, 0, 20, 0),
(6, 1, 'Test Event 14', '2020-04-30', '12:00:00', '2020-04-30', '13:00:00', '746 Sheraton Drive', 'Virginia Beach', 'VA', '23452', 'Testing event creation.', 0, 0, 0, 0),
(7, 1, 'Test Event 21', '2020-04-30', '12:00:00', '2020-04-30', '13:00:00', '746 Sheraton Drive', 'Virginia Beach', 'Va', '23452', 'testing image upload', 2, 0, 0, 0),
(8, 1, 'Test Event 21', '2020-04-30', '12:00:00', '2020-05-01', '13:00:00', '746 Sheraton Drive', 'Virginia Beach', 'Va', '23452', 'testing image upload', 5, 0, 0, 0),
(9, 1, 'Test Event 10', '2020-05-29', '12:00:00', '2020-05-30', '13:00:00', '123 Shell Street', 'Centereach', 'NY', '11548', 'testing image upload.', 2, 0, 0, 0),
(10, 1, 'Test Private Event', '2020-04-30', '12:00:00', '2020-04-29', '13:00:00', '250 Cricket Court', 'Wading River', 'NY', '12345', 'Testing event privacy.', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Friendships`
--

CREATE TABLE `Friendships` (
  `friendshipID` int(11) NOT NULL,
  `friend1userID` int(11) NOT NULL,
  `friend2userID` int(11) NOT NULL,
  `relationshipAccepted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Friendships`
--

INSERT INTO `Friendships` (`friendshipID`, `friend1userID`, `friend2userID`, `relationshipAccepted`) VALUES
(1, 1, 2, 1),
(3, 1, 33, 1),
(4, 1, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Invitees`
--

CREATE TABLE `Invitees` (
  `inviteeID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `messageID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipientUserID` int(11) NOT NULL,
  `sent` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `UserImgs`
--

CREATE TABLE `UserImgs` (
  `imageID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UserImgs`
--

INSERT INTO `UserImgs` (`imageID`, `userID`, `imageName`) VALUES
(1, 1, '5e93d6bc509916.23514365.jpeg'),
(7, 33, '5e93fbcb1a8770.42322574.jpg'),
(8, 34, '5e9488a93d62d6.86983931.jpeg'),
(9, 34, '5e9488e1408d06.75726522.jpeg'),
(10, 1, '5e94891a294204.29163449.jpeg'),
(11, 35, '5e9a471f38c599.34064428.jpeg'),
(12, 37, '5e9a4d201b41a3.58310644.jpeg'),
(13, 37, ''),
(14, 37, '5e9a52c04843f4.81498421.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `UserProfile`
--

CREATE TABLE `UserProfile` (
  `profileID` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `profileImg` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `hobbies` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UserProfile`
--

INSERT INTO `UserProfile` (`profileID`, `userID`, `profileImg`, `bio`, `hobbies`) VALUES
(1, 1, '5e94891a294204.29163449.jpeg', 'About Jsmith - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit porro quod sed corrupti beatae optio aperiam iure ad alias, officiis ut placeat culpa natus expedita quos aliquam accusantium. Sed, nostrum magnam? Adipisci, iusto non consequuntur enim fugit tempora nisi maxime? Added test text again.', 'Tennis,Soccer,Baseball,Lacrosse,Cycling, Surfing'),
(2, 2, 'jsmithImg1.jpeg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit porro quod sed corrupti beatae optio aperiam iure ad alias, officiis ut placeat culpa natus expedita quos aliquam accusantium. Sed, nostrum magnam? Adipisci, iusto non consequuntur enim fugit tempora nisi maxime?', 'Golf, Hockey, Fishing, Hunting, Trap Shooting'),
(7, 33, '', NULL, NULL),
(8, 34, '5e9488e1408d06.75726522.jpeg', 'This is a test bio', 'Fishing, Hunting, Sailing'),
(9, 35, '5e9a471f38c599.34064428.jpeg', NULL, NULL),
(10, 37, '5e9a52c04843f4.81498421.jpeg', 'This is a test user profile.', 'Testing, Testing, Testing, Testing,');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `USstate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `phone` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `email`, `userName`, `userPassword`, `firstName`, `lastName`, `street`, `city`, `USstate`, `zip`, `phone`, `dateOfBirth`) VALUES
(1, 'JohnSmith@testMail.com', 'JsmithTestUser', 'testuser1', 'John', 'Smith', '720 Broadhollow Road', 'Farmingdale', 'NY', 11735, '1234567891', '2020-12-01'),
(2, 'testUser2@test.com', 'testUser2', 'testuser2', 'Gertrude', 'Prudence', '720 Northern Blvd.', 'Brookville', 'NY', 11548, NULL, '1980-01-02'),
(3, 'testuser3@test.com', 'testUser3', 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1980-01-02'),
(4, 'testingUser4@test.com', 'testUser4', 'tetuser4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1980-01-02'),
(33, 'wicktj@farmingdale.edu', 'Tjtester', 'testuing', 'Tjtester', 'Tester', '123 Shell Street', 'Centereach', 'NY', 11548, '6311234090', '2020-04-01'),
(34, 'steww@farmingdale.edu', 'wstew', 'testing', 'will', 'stewart', '720 Northern blvd', 'Brookville', 'NY', 11753, '1233333243', '1987-08-12'),
(35, 'testerCS@test.com', 'CStest', 'testing', 'CStest', 'Inglesby', '250 Cricket Court', 'Wading River', 'NY', 12345, '1112223333', '2020-04-01'),
(37, 'thoma@farmingdale.edu', 'ThomaTest', 'testing', 'Allen', 'Thomas', '555 Campus Lane', 'Farmingdale', 'NY', 11111, '1112223333', '2020-04-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attendees`
--
ALTER TABLE `Attendees`
  ADD PRIMARY KEY (`attendeeID`);

--
-- Indexes for table `EventImgs`
--
ALTER TABLE `EventImgs`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `Friendships`
--
ALTER TABLE `Friendships`
  ADD PRIMARY KEY (`friendshipID`);

--
-- Indexes for table `Invitees`
--
ALTER TABLE `Invitees`
  ADD PRIMARY KEY (`inviteeID`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`messageID`),
  ADD UNIQUE KEY `userID` (`userID`),
  ADD UNIQUE KEY `recipientUserID` (`recipientUserID`);

--
-- Indexes for table `UserImgs`
--
ALTER TABLE `UserImgs`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `UserProfile`
--
ALTER TABLE `UserProfile`
  ADD PRIMARY KEY (`profileID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attendees`
--
ALTER TABLE `Attendees`
  MODIFY `attendeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `EventImgs`
--
ALTER TABLE `EventImgs`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Friendships`
--
ALTER TABLE `Friendships`
  MODIFY `friendshipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Invitees`
--
ALTER TABLE `Invitees`
  MODIFY `inviteeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `UserImgs`
--
ALTER TABLE `UserImgs`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `UserProfile`
--
ALTER TABLE `UserProfile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
