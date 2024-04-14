-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 14 apr 2024 om 20:02
-- Serverversie: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP-versie: 8.2.15

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
-- Tabelstructuur voor tabel `motorcycles`
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
-- Gegevens worden geëxporteerd voor tabel `motorcycles`
--

INSERT INTO `motorcycles` (`id`, `brand`, `type`, `constructionYear`, `price`, `power`, `mass`, `engine`, `accessories`, `img_url`, `sold`) VALUES
(1, 'Honda', 'cb650fa', '2022-01-01', 12000, 150, 200, 1000, 'ABS', 'https://i0.wp.com/www.asphaltandrubber.com/wp-content/uploads/2014/04/2014-Honda-CB650F-review-14.jpg', 0),
(2, 'Yamaha', 'R1', '2023-01-02', 12000, 150, 200, 1000, 'ABS, LED Lights', 'https://www.goedhartmotoren.nl/media/catalog/product/cache/6cebcc324ef3e274e76c132017c1932e/0/0/00002441414141474F93a_229e.jpg', 0),
(3, 'Kawasaki', 'z300', '2022-04-31', 11000, 120, 180, 300, 'ABS', 'https://storage.kawasaki.eu/public/kawasaki.eu/en-EU/model/15ER300B_44SGRNDRF2CG_C_002.png', 0),
(4, 'Ducati', 'monster 696', '2023-01-01', 18000, 200, 220, 1100, 'ABS', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Ducati_Monster_696_2013.jpg/1200px-Ducati_Monster_696_2013.jpg', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'root', '$2y$10$Scvhg6AIvnY8piqr8ChFFuMCekrEX86N/gx8y32oLxAwr52mmncbi', 'root@root.root', 'root');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `motorcycles`
--
ALTER TABLE `motorcycles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `motorcycles`
--
ALTER TABLE `motorcycles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
