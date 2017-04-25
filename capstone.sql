-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 07:50 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `caps`
--

CREATE TABLE `caps` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caps`
--

INSERT INTO `caps` (`id`, `username`, `password`, `email`, `phone`) VALUES
(3, 'thafel', '$2y$10$yapjrdEIkN7qCsFbJutlWOsRHD0wFY5UFqmRF2SqXJXuMvNv0rLhO', 'thafel@dunwoody.edu', '7632326940'),
(4, 'user1', '$2y$10$0tp9AG1RZB5c/fB8Dy9PBeneL1BDMKCMj9XI.9EmqHombUYp2CL1G', 'thafel@dunwoody.edu', '123456789'),
(5, 'zy', '$2y$10$ZNEyBXi2Q.JhZvZtsHM3mO80tQ9vj7Tm5IG2D5/TEOSaBEVO3hgQK', 'fjkdlsa;@fjdksla.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `ProjectName` varchar(25) NOT NULL,
  `Indate` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `ProjectName`, `Indate`, `comment`) VALUES
(1, 'thafel', 'MyFirstProject', '2017-04-24', 'This is my First Project. '),
(2, 'user1', '2ndProject', '2017-04-24', 'This is my Second Project.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caps`
--
ALTER TABLE `caps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caps`
--
ALTER TABLE `caps`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
