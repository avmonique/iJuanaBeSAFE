-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 10:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ijuanabesafe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `analyticsID` int(11) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `violenceType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `violenceType` varchar(255) NOT NULL,
  `violence` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture_path` varchar(255) NOT NULL,
  `dateReported` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportID`, `email`, `location`, `violenceType`, `violence`, `description`, `picture_path`, `dateReported`) VALUES
(1, 'avemonica0@gmail.com', 'on', 'asd', '', 'asd', 'image', '2023-12-11 10:49:01'),
(2, 'avemonica0@gmail.com', 'Inside Campus', 'gumana ka', '', 'pleasseee', 'image', '2023-12-11 10:54:01'),
(3, 'avemonica0@gmail.com', 'Outside Campus', 'bullying', '', 'binully ako ni sir', 'image', '2023-12-11 10:58:12'),
(4, 'avemonica0@gmail.com', 'Inside Campus', 'harassment', '', '', 'image', '2023-12-11 11:15:20'),
(14, 'avemonica0@gmail.com', 'Inside Campus', 'Physical Violence', 'pleaseeee', 'gumana ka naaaaa', 'images/Venelope.jpg', '2023-12-11 13:06:41'),
(15, 'avemonica0@gmail.com', 'Outside Campus', 'Physical Violence', 'sdfsdf', 'dgdfgdfg', 'images/Venelope.jpg', '2023-12-11 13:08:40'),
(16, 'avemonica0@gmail.com', 'Inside Campus', 'Physical Violence', 'sdfsdf', 'sdfsdf', '', '2023-12-11 13:15:06'),
(17, 'avemonica0@gmail.com', 'Inside Campus', 'Physical Violence', 'asd', 'dfgdfg', 'images/Screenshot 2023-09-19 171933.png', '2023-12-11 13:15:19'),
(18, 'avemonica0@gmail.com', 'Outside Campus', 'Physical Violence', 'asdasd', 'asd', '', '2023-12-11 13:22:13'),
(19, 'avemonica0@gmail.com', 'Outside Campus', 'Physical Violence', 'wewe', 'dfgdfg', '', '2023-12-11 13:42:41'),
(20, 'avemonica0@gmail.com', 'Outside Campus', 'Physical Violence', 'gfhgfh', 'fgh', 'images/logowoname.png', '2023-12-11 13:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `campus`, `username`, `email`, `password`) VALUES
('Monica', 'Ave', 'Urdaneta', 'movica', 'avemonica0@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
('Coordinator', '1', 'Urdaneta', 'coordinator1', 'c@email.com', '123123'),
('Mina', 'Myoui', 'Infanta', 'minari', 'mina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`analyticsID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `fk1` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `analyticsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
