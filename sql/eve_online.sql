-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 25 feb 2017 om 16:28
-- Serverversie: 5.7.17-0ubuntu0.16.04.1
-- PHP-versie: 7.0.15-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Eve Online`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Data`
--

CREATE TABLE `Data` (
  `ID` int(11) NOT NULL,
  `HighSell` float NOT NULL,
  `AvgSell` float NOT NULL,
  `LowSell` float NOT NULL,
  `HighBuy` float NOT NULL,
  `AvgBuy` float NOT NULL,
  `LowBuy` float NOT NULL,
  `WeightedSell` float NOT NULL,
  `WeightedBuy` float NOT NULL,
  `QuantityBuy` float NOT NULL,
  `QuantitySell` float NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `typeID` int(20) NOT NULL,
  `regionID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `InventoryTypes`
--

CREATE TABLE `InventoryTypes` (
  `ID` int(11) NOT NULL,
  `href` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Regions`
--

CREATE TABLE `Regions` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `Regions`
--

INSERT INTO `Regions` (`ID`, `name`) VALUES
(10000002, 'Jita'),
(10000030, 'Heimatar'),
(10000032, 'Sinq Laison'),
(10000042, 'Metropolis'),
(10000043, 'Amarr');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Data`
--
ALTER TABLE `Data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `InventoryTypes`
--
ALTER TABLE `InventoryTypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Regions`
--
ALTER TABLE `Regions`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Data`
--
ALTER TABLE `Data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

