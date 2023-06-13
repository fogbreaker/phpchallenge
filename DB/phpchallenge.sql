-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Mrz 2023 um 09:27
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `phpchallenge`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buecher`
--

CREATE TABLE `buecher` (
  `id` int(10) UNSIGNED NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdated` timestamp NOT NULL DEFAULT current_timestamp(),
  `Aktiv` tinyint(1) NOT NULL DEFAULT 1,
  `Bezeichnung` varchar(100) NOT NULL,
  `Autor` varchar(40) NOT NULL DEFAULT '',
  `Typ` varchar(30) NOT NULL DEFAULT 'Buch',
  `Bewertung` int(11) NOT NULL DEFAULT 1,
  `Seitenanzahl` int(11) NOT NULL DEFAULT 1,
  `UserPid` int(11) NOT NULL DEFAULT -1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `buecher`
--

INSERT INTO `buecher` (`id`, `CreationDate`, `LastUpdated`, `Aktiv`, `Bezeichnung`, `Autor`, `Typ`, `Bewertung`, `Seitenanzahl`, `UserPid`) VALUES
(1, '2022-10-01 04:24:16', '2023-03-29 07:26:21', 1, 'Harry Potter und der Feuerkelch', 'J.K. Rowling', 'Buch', 0, 149, 153),
(3, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Der große Gatsby', 'F. Scott Fitzgerald', 'Buch', 5, 291, 154),
(4, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Stolz und Vorurteil', 'Jane Austen', 'Buch', 0, 105, 154),
(5, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Krieg und Frieden', 'Leo Tolstoi', 'Buch', 5, 355, 154),
(6, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'To Kill a Mockingbird', 'Harper Lee', 'Buch', 0, 158, 154),
(9, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Die Verwandlung', 'Franz Kafka', 'Buch', 5, 443, 154),
(10, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Der Prozess', 'Franz Kafka', 'Buch', 5, 217, 154),
(11, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Das Parfum', 'Patrick Süskind', 'Buch', 5, 457, 154),
(12, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Der Stechlin', 'Theodor Fontane', 'Buch', 5, 332, 154),
(13, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Effi Briest', 'Theodor Fontane', 'Buch', 0, 188, 154),
(14, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Faust', 'Johann Wolfgang von Goethe', 'Buch', 5, 245, 154),
(15, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Die Leiden des jungen Werthers', 'Johann Wolfgang von Goethe', 'Buch', 0, 163, 154),
(16, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Der Zauberberg', 'Thomas Mann', 'Buch', 5, 379, 154),
(17, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Die Buddenbrooks', 'Thomas Mann', 'Buch', 0, 103, 154),
(18, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Der kleine Prinz', 'Antoine de Saint-Exupéry', 'Buch', 5, 482, 154),
(19, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Tintenherz', 'Cornelia Funke', 'Buch', 5, 397, 154),
(20, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Harry Potter und der Stein der Weisen', 'J.K. Rowling', 'Buch', 5, 441, 153),
(21, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Der Hobbit', 'J.R.R. Tolkien', 'Buch', 0, 111, 154),
(22, '2023-03-27 17:26:24', '2023-03-29 07:26:21', 1, 'Der Herr der Ringe', 'J.R.R. Tolkien', 'Buch', 5, 335, 154);

-- --------------------------------------------------------


--
-- Indizes für die Tabelle `buecher`
--
ALTER TABLE `buecher`
  ADD UNIQUE KEY `id` (`id`);



--
-- AUTO_INCREMENT für Tabelle `buecher`
--
ALTER TABLE `buecher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
