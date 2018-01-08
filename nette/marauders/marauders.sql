-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 08. led 2018, 13:48
-- Verze serveru: 5.6.24
-- Verze PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `marauders`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `favourite_location`
--

CREATE TABLE IF NOT EXISTS `favourite_location` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `latitude` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `longitude` varchar(200) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `favourite_location`
--

INSERT INTO `favourite_location` (`id`, `name`, `users_id`, `latitude`, `longitude`) VALUES
(1, 'random_misto', 9, '49.9553065229763', '17.921791076660156'),
(2, 'random_misto', 9, '49.880477638742555', '18.017578125'),
(3, 'Tonckovo+doup%C4%9B', 9, '49.85724271487658', '17.847633361816406');

-- --------------------------------------------------------

--
-- Struktura tabulky `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `Latitude` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `Longitude` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `isActive` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `position`
--

INSERT INTO `position` (`Latitude`, `Longitude`, `users_id`, `isActive`) VALUES
('49.940177999999996', '17.8987782', 9, 1),
('49.940177999999996', '16.8987782', 10, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `role` enum('guest','user','administrator') COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(9, 'admin', '$2y$10$LYOcPBYmTmHjsdlejqafAu0QO7A9jyqU6fwpEXKJ2N.HXMTDUejaC', 'admin@admin.cz', 'administrator'),
(10, 'kokot', '$2y$10$gtSh9iSTEr/R0h8nhxcmBOuuFPUT6.DIPhSMmP0lykGHzJivclhiK', 'kokot@admin.cz', 'guest');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `favourite_location`
--
ALTER TABLE `favourite_location`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_favourite_location_users1_idx` (`users_id`);

--
-- Klíče pro tabulku `position`
--
ALTER TABLE `position`
  ADD UNIQUE KEY `users_id` (`users_id`), ADD KEY `fk_position_users_idx` (`users_id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `favourite_location`
--
ALTER TABLE `favourite_location`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `favourite_location`
--
ALTER TABLE `favourite_location`
ADD CONSTRAINT `fk_favourite_location_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `position`
--
ALTER TABLE `position`
ADD CONSTRAINT `fk_position_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
