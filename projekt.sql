-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Lis 2022, 15:02
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `score` varchar(20) DEFAULT NULL,
  `login` varchar(40) DEFAULT NULL,
  `datewhen` date DEFAULT NULL,
  `acc` varchar(4) DEFAULT NULL,
  `wpm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `scores`
--

INSERT INTO `scores` (`id`, `score`, `login`, `datewhen`, `acc`, `wpm`) VALUES
(1, '578823.53', '', '0000-00-00', '100', 58),
(2, '48776', '', '0000-00-00', '26.1', 19),
(3, '624000', 'Apapp', '0000-00-00', '100', 62),
(4, '634285.71', 'Apapp', '0000-00-00', '100', 63),
(5, '445876', 'Apapp', '2022-11-28', '98.7', 45),
(6, '', 'Apapp', '2022-11-28', '', 0),
(7, '420000', 'Apapp', '2022-11-29', '100', 42);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `nickname`, `email`, `age`, `password`) VALUES
(4, 'bolek', 'Lolek', 'asfjoiewajfo@apof.pl', 7, '$2y$10$tg1MUcdgHVNpHnYSqAvPhu0CUhBccqlHZ36lvNqtrvsM0gINkNn2e'),
(5, 'Apapp', 'Apappp', 'jacek222033@gmail.com', 19, '$2y$10$0YIWsAEaD/OU1VMk6OU3Mur9v6608LPJDGsKDNcr8uPn1KIJRb7ry');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
