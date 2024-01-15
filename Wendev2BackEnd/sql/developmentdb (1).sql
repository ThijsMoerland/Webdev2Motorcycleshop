-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 15, 2024 at 04:59 PM
-- Server version: 11.1.2-MariaDB-1:11.1.2+maria~ubu2204
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `motorcycles`
--

CREATE TABLE `motorcycles` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `constructionYear` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `power` int(11) NOT NULL,
  `mass` int(11) NOT NULL,
  `engine` int(11) NOT NULL,
  `accessories` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) NOT NULL,
  `sold` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motorcycles`
--

INSERT INTO `motorcycles` (`id`, `brand`, `type`, `constructionYear`, `price`, `power`, `mass`, `engine`, `accessories`, `img_url`, `sold`) VALUES
(1, 'Honda', 'cb650fa', '2022-01-01', 12000, 150, 200, 1000, 'ABS', 'https://i0.wp.com/www.asphaltandrubber.com/wp-content/uploads/2014/04/2014-Honda-CB650F-review-14.jpg', 0),
(2, 'Yamaha', 'R1', '2023-01-01', 12000, 150, 200, 1000, 'ABS, LED Lights', 'https://www.goedhartmotoren.nl/media/catalog/product/cache/6cebcc324ef3e274e76c132017c1932e/0/0/00002441414141474F93a_229e.jpg', 1),
(3, 'Kawasaki', 'z300', '2022-04-31', 11000, 120, 180, 800, 'ABS', 'https://storage.kawasaki.eu/public/kawasaki.eu/en-EU/model/15ER300B_44SGRNDRF2CG_C_002.png', 0),
(4, 'Ducati', 'monster 696', '2023-01-01', 18000, 200, 220, 1100, 'ABS', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Ducati_Monster_696_2013.jpg/1200px-Ducati_Monster_696_2013.jpg', 0),
(5, 'Harley-Davidson', 'Nightster', '2021-12-23', 2500.95, 160, 300, 1500, 'ABS', 'https://mcn-images.bauersecure.com/wp-images/186078/harley-davidson-nightster-01.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motorcycles`
--
ALTER TABLE `motorcycles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motorcycles`
--
ALTER TABLE `motorcycles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
