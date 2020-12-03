-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 05:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `module_album`
--

-- --------------------------------------------------------

--
-- Table structure for table `nv4_md_album`
--

CREATE TABLE `nv4_md_album` (
  `id` int(11) NOT NULL,
  `name_album` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image_album` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `desc_album` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `id_user` int(11) NOT NULL DEFAULT 0,
  `create_at` int(11) NOT NULL DEFAULT 0,
  `update_at` int(11) NOT NULL DEFAULT 0,
  `active_album` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nv4_md_album`
--
ALTER TABLE `nv4_md_album`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nv4_md_album`
--
ALTER TABLE `nv4_md_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
