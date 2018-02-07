-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 feb 2018 om 20:20
-- Serverversie: 10.1.28-MariaDB
-- PHP-versie: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notesystem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Gegevens worden geëxporteerd voor tabel `notes`
--

INSERT INTO `notes` (`id`, `date`, `title`, `content`) VALUES
(25, '2018-02-07', 'blerge', '23'),
(26, '2018-02-07', 'fd', 'fs'),
(27, '2018-02-07', 'ff', 'ff');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pivots`
--

CREATE TABLE `pivots` (
  `note_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Gegevens worden geëxporteerd voor tabel `pivots`
--

INSERT INTO `pivots` (`note_id`, `tag_id`) VALUES
(0, 1),
(23, 1),
(24, 2),
(25, 2),
(27, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Gegevens worden geëxporteerd voor tabel `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'school'),
(2, 'portal'),
(3, 'home'),
(4, 'tox'),
(5, 'ao17');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexen voor tabel `pivots`
--
ALTER TABLE `pivots`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexen voor tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT voor een tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
