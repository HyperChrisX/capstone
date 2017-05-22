-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2017 at 04:52 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saltness_capstone_userbase`
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
  `phone` varchar(40) NOT NULL,
  `role` varchar(4) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caps`
--

INSERT INTO `caps` (`id`, `username`, `password`, `email`, `phone`, `role`) VALUES
(3, 'thafel', '$2y$10$yapjrdEIkN7qCsFbJutlWOsRHD0wFY5UFqmRF2SqXJXuMvNv0rLhO', 'thafel@dunwoody.edu', '7632326940', 'User'),
(4, 'user1', '$2y$10$0tp9AG1RZB5c/fB8Dy9PBeneL1BDMKCMj9XI.9EmqHombUYp2CL1G', 'thafel@dunwoody.edu', '123456789', 'User'),
(5, 'zy', '$2y$10$ZNEyBXi2Q.JhZvZtsHM3mO80tQ9vj7Tm5IG2D5/TEOSaBEVO3hgQK', 'fjkdlsa;@fjdksla.com', '123456789', 'User'),
(6, 'hyper', '$2y$10$UehcKHHnE7CUa.Dspyo9FeZzfxp.LpbbVediOMYQ8CFHZzSSAjYaS', 'cj55448@gmail.com', '6122279794', 'User'),
(7, 'admin', '$2y$10$cs9YQQokdm1m67R1q8DhHOiA49E4EtYSgU0J8S1qaZHAncUslUJzq', 'admin@admin.com', '6122279794', 'Admn'),
(8, 'user3', '$2y$10$kLc1ElQ.aswsrs.g1OvpXeXoUh0l92/rcGD3fe7qU9DvKLWalLJMC', 'thafel@dunwoody.edu', '123456789', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `ProjID` int(30) NOT NULL,
  `ProjectName` varchar(25) NOT NULL,
  `Indate` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `ProjID`, `ProjectName`, `Indate`, `comment`) VALUES
(2, 'user1', 2, '2ndProject', '2017-04-24', 'This is my Second Project.'),
(123458, 'hyper', -1, 'My -1th Project', '2016-11-09', 'Random description text');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123462;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
