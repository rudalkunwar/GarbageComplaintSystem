-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 01:49 PM
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
(1, 'Rudal', 'ankushruzal@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'profilepic/Screenshot 2023-05-22 175424.png');

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
(7, 13, 'driver1', '2023-06-10', 'collect befor', 'completed'),
(8, 14, 'aakash', '2023-06-17', 'This will be collected soon.', 'Completed'),
(9, 15, 'sohan kafle', '2023-06-20', 'assigned', 'none'),
(10, 17, 'aakash', '2023-06-22', 'assigned', 'none');

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
(13, 13, 7, 'completedtask/images.jpg', 'collected', '2023-06-10', 'Completed'),
(14, 14, 8, 'completedtask/server-room-datacenter-room-equipped-data-servers-modern-network-telecommunication-technology-computer-concept-led-76688877 (1).jpg', 'This is collected sucessfully.', '2023-06-16', 'Completed');

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
(13, 2, 5920, 'this bin is full', 'binpic/echofriend2.png', '2023-06-09 08:33:53', 'Accepted'),
(14, 1, 500, 'please collect this bin ', 'binpic/userregister.png', '2023-06-16 14:01:13', 'Accepted'),
(15, 3, 5920, 'This bin is full please collect this soon.', 'binpic/BG1.png', '2023-06-17 03:10:37', 'Accepted'),
(16, 3, 5920, 'hi this bin is full please collect this soon', 'binpic/contactus.png', '2023-06-17 03:19:44', 'Rejected'),
(17, 2, 500, 'complain', 'binpic/ubuntu [Running] - Oracle VM VirtualBox 6_18_2023 11_14_34 PM.png', '2023-06-21 16:20:44', 'Accepted');

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
(400, 'driver3', 'e44435627359f4c3de71b538cdefdc14', 'driver3@gmail.com', 'Gaidakot-1', '', 'Free'),
(1010, 'sohan kafle', '827ccb0eea8a706c4c34a16891f84e7b', 'ankushruzal@gmail.com', 'Gaidakot-1', '', 'Assigned'),
(2233, 'driver1', 'b85aef08608180db9d4ddad38ae40545', 'driver1@gmail.com', 'Gaidakot-3', 'profilepic/WIN_20230525_14_31_21_Pro.jpg', 'Free');

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
(330, 'Inorganic', 'ghorkhali chowk,bharatpur', 100, 'use'),
(500, 'Organic', 'Kaligandaki chowk', 100, 'use'),
(532, 'Organic', 'Gaidakot-1', 100, 'use'),
(5920, 'Metallic', 'Bharatpur devi chowk', 120, 'use');

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
(1, 'pratik', 'parajuli@gmail.com', '0cb2b62754dfd12b6ed0161d4b447df7', 'Gaidakot-1', '9870273227', 'profilepic/Screenshot 2023-04-28 224213.png'),
(2, 'user1', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', 'Gaidakot-1', '9870273227', ''),
(3, 'kuns', 'ankushruzal@gmail.com', '20773778556ec5fc792a3ed102bca507', 'Gaidakot-1', '9870273227', '');

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
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_ibfk_1` FOREIGN KEY (`assign_id`) REFERENCES `assigned_bin` (`assign_id`);

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
