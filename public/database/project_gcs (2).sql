-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 11:15 AM
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
(33, 30, 'driver1', '2023-08-04', 'your complain is assigned to driver', 'Completed'),
(36, 35, 'driver3', '2023-08-05', 'collect', 'Rejected'),
(37, 36, 'driver3', '2023-08-10', 'collect this soon', 'Completed'),
(40, 40, 'driver3', '2023-08-10', 'yed', 'Completed');

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
(29, 30, 33, 'completedtask/images.jpg', 'The bin is collected.', '2023-09-09', 'Completed'),
(31, 35, 36, NULL, 'rejected', NULL, 'Rejected by Driver'),
(32, 36, 37, 'completedtask/erdiagram.png', 'sucessfully collected', '2023-08-10', 'Completed'),
(33, 40, 40, 'completedtask/echofriend2.png', 'collected successfully', '2023-08-10', 'Completed');

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
(30, 4, 212, 'This bin is full collect this soon please', 'binpic/6f050e39-windows_10_logoblue.svg-copy_windows.jpg', '2023-08-03 15:50:43', 'Completed'),
(35, 4, 212, 'c', 'binpic/gausselimination.png', '2023-08-04 03:51:29', 'Rejected by Driver.'),
(36, 5, 305, 'This bin is full collect this soon.', 'binpic/dfd.png', '2023-08-07 06:14:36', 'Completed'),
(40, 4, 212, 'this is full', 'binpic/erdiagram.png', '2023-08-08 07:16:01', 'Completed');

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
(400, 'driver3', '3c9e9944fca5fec18378f39af8ead5d8', 'driver3@gmail.com', 'Gaidakot-1', '', 'Free'),
(1010, 'sohan kafle', '827ccb0eea8a706c4c34a16891f84e7b', 'ankushruzal@gmail.com', 'Gaidakot-1', '', 'Free'),
(2233, 'driver1', 'b85aef08608180db9d4ddad38ae40545', 'driver1@gmail.com', 'Gaidakot-3', 'profilepic/Screenshot 2023-04-28 224213.png', 'Free');

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
(1, 'admin', 'driver1@gmail.com', 'this website is great and amazing', '2023-06-16 13:05:25', 0),
(2, 'ruzal', 'aakash@gmail.com', 'this jfaoij jdfkjl dfjkljdlkajdfdfjlfkjlajkldfj djlkajfl kajakjdlakjdfjl afjaf ljkdfjakjfljalkdfj a sajdfjlkjakdfjakldfj asdf lkjsjkdfjljafljalkdjaaklafjd adjdfjlakdfjlakdfjla jfdfjlasjfldajslfj aflsjalfkjal fjdlajdfa klfjasldfj alsjdfjlkajfd akldfj lkasjdffklasj dfljaslkdfj alfjdlkajfdkjadfkdjaslsdf lajafjd klaasjdf;dkasj fkjal fslafj lkfj kasasj dfdkjalfjd la  afjljafd l;adfjl;kajdfj skdfj lsfjd kljas fljasas;fj k aj fdjadfk al;dfjlak jflkaj', '2023-06-16 13:35:14', 1);

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
(212, 'Metallic', 'Bharatpur parbatipur', 100, 'use'),
(305, 'Organic', 'Bharatpur- Bishnu chow', 100, 'use'),
(330, 'Inorganic', 'ghorkhali chowk,bharatpur', 100, 'On Collection'),
(500, 'Organic', 'Kaligandaki chowk', 100, 'use'),
(505, 'Organic', 'Bharatpur-16', 100, 'use'),
(532, 'Organic', 'Gaidakot-1', 100, 'use'),
(5920, 'Metallic', 'Bharatpur devi chowk', 120, 'use');

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
(4, 'Rudal Kunwar', 'rudalkunwar@gmail.com', '240adebad8e35ddcfe05b24cc062b242', 'Bharatpur-15', '9877665544', ''),
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
  ADD UNIQUE KEY `complain_id` (`complain_id`),
  ADD KEY `assign_id` (`assign_id`);

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
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `assigned_bin_ibfk_2` FOREIGN KEY (`complain_id`) REFERENCES `complaints` (`complain_id`);

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_ibfk_1` FOREIGN KEY (`assign_id`) REFERENCES `assigned_bin` (`assign_id`),
  ADD CONSTRAINT `collections_ibfk_2` FOREIGN KEY (`complain_id`) REFERENCES `complaints` (`complain_id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`bin_id`) REFERENCES `garbagebins` (`bin_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
