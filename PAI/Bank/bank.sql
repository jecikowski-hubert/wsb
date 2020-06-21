-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Cze 2020, 10:01
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bank`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `number` text COLLATE utf8_polish_ci NOT NULL,
  `funds` double NOT NULL,
  `currency` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `account`
--

INSERT INTO `account` (`id`, `name`, `number`, `funds`, `currency`) VALUES
(1, 'Konto jakie chcę', '81209012341111111053453872', 70, 'PLN'),
(2, 'Konto jakie chciałem', '81209012341111111053451234', 322, 'PLN'),
(3, 'Testowe', '51109015871586021436989865', 1910, 'PLN'),
(4, 'Chlidonias leucopterus', '94101080445170860848600000', 9352, 'PLN'),
(5, 'Acrobates pygmaeus', '84102021412309421193400000', 3333, 'PLN'),
(6, 'Pelecanus conspicillatus', '69103061748394623978200000', 5950, 'PLN'),
(7, 'Upupa epops', '52105071945376581255600000', 4635, 'PLN'),
(8, 'Halcyon smyrnesis', '40106075857616563249000000', 7885, 'PLN'),
(9, 'Melursus ursinus', '88109010880682066244900000', 6173, 'PLN'),
(10, 'Isoodon obesulus', '95113012337915828682900000', 6296, 'PLN'),
(11, 'Buteo galapagoensis', '70114083675473679531500000', 4893, 'PLN'),
(12, 'Terathopius ecaudatus', '30116018128295940319000000', 7536, 'PLN'),
(13, 'Tiliqua scincoides', '43124077903802276001000000', 5112, 'PLN'),
(14, 'Eudyptula minor', '70128032535930988965400000', 1434, 'PLN'),
(15, 'unavailable', '84132013939122884695300000', 1289, 'PLN'),
(16, 'Choloepus hoffmani', '33154071511517421698500000', 3297, 'PLN'),
(17, 'Mustela nigripes', '37158043233476934143900000', 7148, 'PLN'),
(18, 'Herpestes javanicus', '11161028941159635003300000', 7366, 'PLN'),
(19, 'Mabuya spilogaster', '37168047284317782305800000', 1772, 'PLN'),
(20, 'Cereopsis novaehollandiae', '13184067567357786576400000', 3070, 'PLN'),
(21, 'Macaca radiata', '40187033095031325881400000', 4340, 'PLN'),
(22, 'Elephas maximus bengalensis', '37193023757493267918400000', 9086, 'PLN'),
(23, 'Zosterops pallidus', '94194057662662181239000000', 1347, 'PLN'),
(24, 'Milvago chimachima', '47195066547649055402000000', 7644, 'PLN');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `account_to_customer`
--

CREATE TABLE `account_to_customer` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `account_to_customer`
--

INSERT INTO `account_to_customer` (`id`, `id_account`, `id_customer`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11),
(12, 12, 12),
(13, 13, 13),
(14, 14, 14),
(15, 15, 15),
(16, 16, 16),
(17, 17, 17),
(18, 18, 18),
(19, 19, 19),
(20, 20, 20),
(21, 21, 21),
(22, 22, 22),
(23, 23, 23);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `number` text COLLATE utf8_polish_ci NOT NULL,
  `currency` text COLLATE utf8_polish_ci NOT NULL,
  `insurance` tinyint(1) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `card`
--

INSERT INTO `card` (`id`, `name`, `status`, `number`, `currency`, `insurance`, `account_id`) VALUES
(1, 'Karta MasterCard < 25', 1, '1111222233334445', 'PLN', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `surname` text COLLATE utf8_polish_ci NOT NULL,
  `username` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `customer`
--

INSERT INTO `customer` (`id`, `name`, `surname`, `username`, `email`, `password`, `last_login`) VALUES
(1, 'Krystian', 'Markowski', '1234567890', 'krystian@bank.pl', 'krystian6', '2020-06-19 18:33:06'),
(2, 'Hubert', 'Jecikowski', '0987654321', 'hubert@hubert.pl', 'krystian6', '2020-06-11 19:16:07'),
(3, 'Jacquette', 'Rixon', '6779075436', 'jrixon2@moonfruit.com', 'DlBTugka0l', '2020-05-12 14:54:24'),
(4, 'Cassius', 'Cuerdall', '2406655894', 'ccuerdall3@freewebs.com', 'o77PZ4W5aIo', '2020-05-07 16:39:13'),
(5, 'Dinah', 'Peacham', '2357149125', 'dpeacham4@istockphoto.com', 'YuxpO7n0', '2020-05-08 19:15:43'),
(6, 'Leonidas', 'Evers', '3847588149', 'levers5@nih.gov', 'KJ1OjFvCHU', '2020-06-02 16:51:40'),
(7, 'Zorah', 'MacCleay', '5964326592', 'zmaccleay6@fc2.com', 'W5T08cAc1L', '2020-05-10 07:54:15'),
(8, 'Jennette', 'Swyer-Sexey', '6996549402', 'jswyersexey7@japanpost.jp', '1MwWfs0xU', '2020-05-04 06:20:24'),
(9, 'Cassie', 'Powton', '6914024033', 'cpowton8@list-manage.com', 'dE02taJ9v3mI', '2020-05-27 20:03:02'),
(10, 'Bertrando', 'Moreside', '1359164764', 'bmoreside9@last.fm', 'bLqZVpAi', '2020-05-05 09:32:40'),
(11, 'Rosella', 'Melloi', '1505887930', 'rmelloia@amazon.com', 'IK7pmByQTzx', '2020-06-02 14:06:00'),
(12, 'Whit', 'Blonfield', '7794025314', 'wblonfieldb@fastcompany.com', 'bQQmfvb', '2020-05-10 18:29:22'),
(13, 'Berni', 'Renvoise', '2248471458', 'brenvoisec@bloglines.com', 'guwGcRrsaqs', '2020-05-08 14:56:13'),
(14, 'Dix', 'Teape', '4709125380', 'dteaped@naver.com', 'iDAhRTIsY', '2020-05-04 05:36:50'),
(15, 'Eleen', 'Tomasz', '7372117240', 'etomasze@nsw.gov.au', 'E8wzc5PHL9', '2020-05-28 00:39:39'),
(16, 'Carlota', 'Djurdjevic', '4752452818', 'cdjurdjevicf@chicagotribune.com', 'xGOVWqTZR3', '2020-05-26 00:15:25'),
(17, 'Bordy', 'Willans', '2960116391', 'bwillansg@jugem.jp', 'O1EIcjCf2du', '2020-05-10 19:23:29'),
(18, 'Terry', 'Pirelli', '4169262636', 'tpirellih@google.com.au', '88B61bM', '2020-05-27 08:02:34'),
(19, 'Cecilia', 'Cleugher', '3243992326', 'ccleugheri@com.com', 'XcIJnwlWh', '2020-05-08 04:33:05'),
(20, 'El', 'Buten', '6227459367', 'ebutenj@tripadvisor.com', 'kJK6VYtuyb', '2020-06-08 22:17:17'),
(21, 'Montague', 'Caulcott', '6575332711', 'mcaulcottk@vinaora.com', 'ZP52D5UeDG0', '2020-06-03 19:16:48'),
(22, 'Hervey', 'Larkby', '2865624764', 'hlarkbyl@google.com.br', 'jn5t5IVBarw8', '2020-05-21 01:36:36'),
(23, 'Gisele', 'Mangeon', '1521650927', 'gmangeonm@theguardian.com', 'VCNl0P', '2020-05-21 03:29:28');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_polish_ci NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `surname` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `user_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `employee`
--

INSERT INTO `employee` (`id`, `username`, `name`, `surname`, `email`, `password`, `user_type`) VALUES
(1, 'kmarkowski', 'Kryst', 'Marko', 'kryst.marko@bank.pl', 'krystian6', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transfers`
--

CREATE TABLE `transfers` (
  `id_transfer` int(11) NOT NULL,
  `send_account_id` int(11) NOT NULL,
  `receive_account_id` int(11) NOT NULL,
  `value` int(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `transfers`
--

INSERT INTO `transfers` (`id_transfer`, `send_account_id`, `receive_account_id`, `value`, `datetime`) VALUES
(1, 1, 2, 50, '2020-06-11 16:39:25'),
(2, 1, 2, 10, '2020-06-11 16:50:52'),
(3, 2, 1, 10, '2020-06-11 16:54:54'),
(4, 2, 1, 51, '2020-06-11 16:58:07'),
(5, 1, 2, 1, '2020-06-11 16:58:29'),
(6, 1, 2, 100, '2020-06-11 16:59:31'),
(7, 2, 1, 1, '2020-06-11 16:59:43'),
(8, 2, 1, 209, '2020-06-11 16:59:57'),
(9, 1, 2, 1, '2020-06-11 17:00:06'),
(10, 0, 1, 2, '2020-06-11 17:12:51'),
(11, 1, 1, 1, '2020-06-11 17:13:16'),
(12, 3, 0, 50, '2020-06-11 19:54:34'),
(13, 3, 0, 50, '2020-06-11 19:55:22'),
(14, 3, 0, 100, '2020-06-11 19:56:37'),
(15, 1, 3, 100, '2020-06-11 19:59:49'),
(16, 1, 2, 11, '2020-06-12 16:59:43'),
(17, 1, 3, 10, '2020-06-12 17:00:17'),
(18, 1, 2, 8, '2020-06-15 19:27:49'),
(19, 1, 2, 12, '2020-06-19 20:22:37');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `account_to_customer`
--
ALTER TABLE `account_to_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id_transfer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT dla tabeli `account_to_customer`
--
ALTER TABLE `account_to_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT dla tabeli `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT dla tabeli `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
