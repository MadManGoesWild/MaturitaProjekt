-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 10. pro 2017, 21:44
-- Verze serveru: 10.1.13-MariaDB
-- Verze PHP: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `marauders`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `position`
--

CREATE TABLE `position` (
  `Latitude` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `Longitude` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `isActive` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `position`
--

INSERT INTO `position` (`Latitude`, `Longitude`, `users_id`, `isActive`) VALUES
('49.7305327', '18.2332637', 8, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `role` enum('guest','user','administrator') COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(6, 'administrator', 'administrator', 'admin@admin.cz', 'administrator'),
(7, 'administrator', '$2y$10$ALkQabbacpOZGLyYrccjMOpl06Erj4M6rB/Ko3HHoyHGKh5OwXlzm', 'administrator@admin.cz', 'guest'),
(8, 'admin', '$2y$10$qLNTsvRb.Mt7O1Wt1pFk9evWRqgLAki/12KMqfNbIae5VGcRrkQVu', 'administrator@admin.cz', 'guest');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `position`
--
ALTER TABLE `position`
  ADD KEY `fk_position_users_idx` (`users_id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `fk_position_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
