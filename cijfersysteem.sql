-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 dec 2022 om 12:50
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cijfersysteem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `resultaten`
--

CREATE TABLE `resultaten` (
  `id` int(9) NOT NULL,
  `leerling` varchar(255) NOT NULL,
  `vak` varchar(255) NOT NULL,
  `cijfer` float NOT NULL,
  `adres` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `resultaten`
--

INSERT INTO `resultaten` (`id`, `leerling`, `vak`, `cijfer`, `adres`, `telefoonnummer`) VALUES
(1, 'jan pietje', 'engels', 9, 'janstraat 2', '0631984617'),
(2, 'gerard huisman', 'nederlands', 8.6, 'herlaan 5', '0624893175'),
(3, 'leo paard', 'engels', 8.5, 'lomaplaan 34', '0614896572'),
(4, 'jan pietje zoon', 'nederlands', 7, 'huisenlaan 44', '0672594103');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `resultaten`
--
ALTER TABLE `resultaten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `resultaten`
--
ALTER TABLE `resultaten`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
