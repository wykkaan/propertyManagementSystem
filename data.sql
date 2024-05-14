-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 10:37 AM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_status` varchar(50) NOT NULL DEFAULT 'Active',
  `user_profile` varchar(100) NOT NULL DEFAULT 'System Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `username`,  `password`,  `user_status`, `user_profile`) VALUES
(1, 'jean', 'jean', '123456', 'Active', 'System Admin'),
(2, 'John', 'John', '654321', 'Active', 'Real Estate Agent'),
(3, 'Jon', 'Jon', '142536', 'Active', 'Real Estate Agent'),
(4, 'greg', 'greg', '123456', 'Active', 'Seller'),
(5, 'Gelvin', 'Gelvin', '123456', 'Active', 'Seller'),
(6, 'Gregory', 'Gregory', '123qwer456', 'Active', 'Buyer'),
(7, 'Goodwill', 'Goodwill', '123qwer456', 'Active', 'Buyer'),
(8, 'Kaplan', 'Kaplan', '12345qwe6', 'Active', 'Buyer');



CREATE TABLE `profiles` (
  `userprofile_id` int(11) NOT NULL,
  `profilename` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`userprofile_id`, `profilename`, `status`) VALUES
(1, 'Real Estate Agent', 'Active'),
(2, 'Seller', 'Active'),
(3, 'System Admin', 'Active'),
(4, 'Buyer', 'Active');


-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`userprofile_id`);


-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `userprofile_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


CREATE TABLE `property` (
  `propertylisting_id` int(11) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `property_price` int(50) NOT NULL,
  `property_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `property` (`propertylisting_id`, `property_name`,`property_price`, `property_description`) VALUES
(1, 'Hougang',20,'abc'),
(2,'Sengkang',20,'abc'),
(3, 'Yishun',20,'abc'),
(4, 'Serangoon',20,'abc');

ALTER TABLE `property`
  ADD PRIMARY KEY (`propertylisting_id`);
  
  ALTER TABLE `property`
  MODIFY `propertylisting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
  
  CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(20) NOT NULL,
  `user_profile` varchar(100) NOT NULL,
  `review_rating` int(5) NOT NULL,
  PRIMARY KEY (`review_id`),
  FOREIGN KEY (`user_fullname`, `user_profile`) REFERENCES `users` (`user_fullname`, `user_profile`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
