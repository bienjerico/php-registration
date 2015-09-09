-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2015 at 12:35 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vmoneydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `v_picture`
--

CREATE TABLE IF NOT EXISTS `v_picture` (
`picture_id` int(11) NOT NULL,
  `uniquename` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `directory` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `v_profile`
--

CREATE TABLE IF NOT EXISTS `v_profile` (
`profile_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `homeaddress` text NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `mobilenumber` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `v_users`
--

CREATE TABLE IF NOT EXISTS `v_users` (
`user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `v_picture`
--
ALTER TABLE `v_picture`
 ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `v_profile`
--
ALTER TABLE `v_profile`
 ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `v_users`
--
ALTER TABLE `v_users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `v_picture`
--
ALTER TABLE `v_picture`
MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `v_profile`
--
ALTER TABLE `v_profile`
MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `v_users`
--
ALTER TABLE `v_users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
