-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 06:05 AM
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
-- Database: `project_gcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `picture`) VALUES
(1, 'Rudal', 'ankushruzal@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'profilepic/images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_bin`
--

CREATE TABLE `assigned_bin` (
  `assign_id` int(11) NOT NULL,
  `complain_id` int(11) DEFAULT NULL,
  `assigned_driver` varchar(255) DEFAULT NULL,
  `assignment_date` date DEFAULT NULL,
  `assign_des` varchar(500) NOT NULL,
  `assign_status` varchar(100) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigned_bin`
--

INSERT INTO `assigned_bin` (`assign_id`, `complain_id`, `assigned_driver`, `assignment_date`, `assign_des`, `assign_status`) VALUES
(43, 43, 'Sohan Kafle', '2023-09-26', 'The driver is assigned for the complained bin.', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `collection_id` int(11) NOT NULL,
  `complain_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `collected_picture` varchar(500) DEFAULT NULL,
  `collection_des` varchar(255) NOT NULL,
  `collection_date` date DEFAULT NULL,
  `collection_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`collection_id`, `complain_id`, `assign_id`, `collected_picture`, `collection_des`, `collection_date`, `collection_status`) VALUES
(35, 43, 43, 'completedtask/garbagebin.jpg', 'collected sucessfully', '2023-09-26', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complain_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bin_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `bin_picture` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `complain_status` varchar(30) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complain_id`, `user_id`, `bin_id`, `description`, `bin_picture`, `timestamp`, `complain_status`) VALUES
(43, 4, 532, 'this bin is full', 'binpic/garbage bins.jpg', '2023-09-25 03:30:42', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `driver_picture` varchar(500) NOT NULL,
  `driver_status` varchar(30) DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_name`, `password`, `email`, `address`, `driver_picture`, `driver_status`) VALUES
(400, 'driver3', '3c9e9944fca5fec18378f39af8ead5d8', 'driver3@gmail.com', 'Gaidakot-1', '', 'Assigned'),
(1010, 'Sohan Kafle', 'bd68fa6f993d870dbb7971664129685f', 'sohankafle@gmail.com', 'Gaidakot-1', 'profilepic/327833714_1333739860742243_684661946263680325_n.jpg', 'Free');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `timestamp`, `status`) VALUES
(5, 'Aakash Kandel', 'aakash@gmail.com', 'hey i am aakash', '2023-09-22 11:52:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `garbagebins`
--

CREATE TABLE `garbagebins` (
  `bin_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `bin_status` varchar(30) NOT NULL DEFAULT 'use'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garbagebins`
--

INSERT INTO `garbagebins` (`bin_id`, `type`, `location`, `capacity`, `bin_status`) VALUES
(330, 'Inorganic', 'ghorkhali chowk,bharatpur', 100, 'use'),
(500, 'Organic', 'Kaligandaki chowk', 100, 'On Collection'),
(505, 'Organic', 'Bharatpur-16', 100, 'use'),
(532, 'Organic', 'Gaidakot-1', 100, 'use');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `from_id`, `to_id`, `message`, `time`, `status`) VALUES
(15, 1, 4, 'Your Complain Status is here.', '2023-08-18 10:36:13', 1),
(16, 1, 400, 'Your Assigned Work is here.', '2023-08-18 10:36:13', 0),
(21, 1010, 4, 'Your Comlain Report is here.[By Driver]', '2023-09-25 04:01:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `profilepic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `address`, `contact`, `profilepic`) VALUES
(4, 'Rudal Kunwar', 'rudalkunwar@gmail.com', '54600cd30d2ba61f88d5b1f105926db5', 'Bharatpur-15', '9877665544', 'profilepic/Screenshot 2023-04-28 224904.png'),
(5, 'Razz', 'razz@gmail.com', '472ccd35434e09cca8c867e3f25325dc', 'Bharatpur', '9877654212', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_bin`
--
ALTER TABLE `assigned_bin`
  ADD PRIMARY KEY (`assign_id`),
  ADD UNIQUE KEY `complain_id_2` (`complain_id`),
  ADD KEY `complain_id` (`complain_id`),
  ADD KEY `fk_driver_name` (`assigned_driver`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`collection_id`),
  ADD UNIQUE KEY `assign_id_2` (`assign_id`),
  ADD UNIQUE KEY `assign_id_3` (`assign_id`),
  ADD KEY `complain_id` (`complain_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complain_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `bin_id` (`bin_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`),
  ADD UNIQUE KEY `driver_name` (`driver_name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garbagebins`
--
ALTER TABLE `garbagebins`
  ADD PRIMARY KEY (`bin_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_bin`
--
ALTER TABLE `assigned_bin`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_bin`
--
ALTER TABLE `assigned_bin`
  ADD CONSTRAINT `assigned_bin_ibfk_1` FOREIGN KEY (`assigned_driver`) REFERENCES `drivers` (`driver_name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `assigned_bin_ibfk_2` FOREIGN KEY (`complain_id`) REFERENCES `complaints` (`complain_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_ibfk_2` FOREIGN KEY (`assign_id`) REFERENCES `assigned_bin` (`assign_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `collections_ibfk_3` FOREIGN KEY (`complain_id`) REFERENCES `complaints` (`complain_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`bin_id`) REFERENCES `garbagebins` (`bin_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
