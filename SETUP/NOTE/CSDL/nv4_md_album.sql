-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 06:58 AM
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
-- Database: `test_nuke`
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
-- Dumping data for table `nv4_md_album`
--

INSERT INTO `nv4_md_album` (`id`, `name_album`, `image_album`, `desc_album`, `id_user`, `create_at`, `update_at`, `active_album`) VALUES
(7, 'Remedios Henry', 'img_0615_1.jpg', 'Dolorem qui corrupti', 0, 1606987777, 1607048991, 1),
(8, 'Mufutau Crosby', 'img_0602.jpg', 'Qui aperiam aut expe', 0, 1606987782, 0, 1),
(9, 'Hanae Kerr', 'img_0618_11.jpg', 'Quod molestias quasi', 0, 1606999920, 0, 1),
(10, 'Remedios Preston', 'img_0615.jpg', 'Sint hic sequi dolo', 0, 1607006826, 0, 2),
(11, 'Valentine Henderson', 'img_0636_82.jpg', 'Nisi unde ea volupta', 0, 1607006837, 0, 1),
(13, 'Wang Levine', 'img_0600_2.jpg', 'Id vero similique ex', 0, 1607052218, 0, 1),
(14, 'Wanda Ellison', 'img_0662.jpg', 'Soluta eum commodo u', 0, 1607060159, 0, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
