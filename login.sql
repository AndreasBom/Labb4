-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 04 okt 2015 kl 21:40
-- Serverversion: 5.6.15-log
-- PHP-version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `loginapp`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `password` char(60) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=36 ;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(8, 'Admin', '$2y$10$ts3kDkq.fVwOEAgbTKeBLerzipwGKfsncHIlL79thS.uWCYhxHOYK'),
(9, 'Andreas', '$2y$10$yL79ScbLCDPTu2xb4M2VSesqH0WdSOBVpwqWkO0rG58rAN.MNz2Oe'),
(11, 'bbb', '$2y$10$1gljst8dMRGFxQMKDXxRnOOER/mID0LUZoUqUxdgMDfiid1ERnfci'),
(12, 'sea', '$2y$10$9ai2B0l9YwtKPDD2ZBGkrOf/Lwbt.8TD5O5m47JpW5dv7ObNtjHEC'),
(13, 'ddd', '$2y$10$w7P5h8jOa/LacoW4gHR45eQeWyKaY3l9UZTY4eYhoczRrpf4PLP7m'),
(14, 'ggg', '$2y$10$Sd.7LqhY6mFWsba68oJ0xuHXepD4YFCgNyzvMiOgBPNEbiQPWwxDK'),
(15, 'Mia', '$2y$10$PBw4F18biFXMbxKdY8d1puZdOqcxGQrEXAaKa6GHWQPjuWfOMdWlS'),
(16, 'MiaPia', '$2y$10$OlwZg.K6UzF.M7GqiUKiAO.4tYAn9RroauELKbUbeP28l.R7b2Fw2'),
(17, 'Katten', '$2y$10$yxEEngtd3yOoEvc7XrPBLul8oZfWu4YqPCqh1Um4bKUHHeT8mkxue'),
(18, 'KattenFnatten', '$2y$10$jOA4PUrdhMmXj682kaB/hOHRcK9VUO2jKOPx2fmiE1oeMTP9P4gQu'),
(19, 'abc', '$2y$10$JMPNcD72.QHOh4RweZtRr.R1fVGtwH6k19ezRAxOgQO2FGa7aO606'),
(20, 'abcd', '$2y$10$Bp0z2NWqYgJUGh8hp11Xwu.Gqgq31tqxsBkS5OWa.k0pVWWIs9bJO'),
(21, 'abcde', '$2y$10$N652vasa6wd0z7KfUpxmr.Gtfm/16g6KevZ0Qku2sI/n72mKfomJ.'),
(22, 'cba', '$2y$10$xUaPJpHqDrHipr2yBZ4rGuqHZwMd4kWmmig2YVSpSixd3NPXktPYO'),
(23, 'cbaba', '$2y$10$K3UCGLGAD5DbP.4ztHU64uzIlZL0UzrsaVsHEpa9x7LjuiWn8e9se'),
(24, 'yyqqww', '$2y$10$6T4BEXMh.Rbx9l4yg.jbNOeI/cCTr0cLVRxtIIzjchZozrBsTr3JG'),
(25, 'wandaa', '$2y$10$fSDmpaP3K0aBGpG0qRvUCecO5y3KO72YQwR2N3eXnlEZ2HQaSyWvy'),
(26, 'wandaaa', '$2y$10$zJlYRQ.3BlGHqz.Yo7XBD.rB9M8Y679lBE3jOIZEfixJp9WPudGFe'),
(27, 'wandaaaa', '$2y$10$InmGR/7APQPpXiZUd9ejiOPstesOOv.kaCIKzM3lT7IvafBvxeI9q'),
(28, 'wandaaaaa', '$2y$10$eNlR1umqlnIKUXt1REaf.Oa5LdIS/RQ0XlyrTph1He.r33kzKAuXu'),
(29, 'wandaaaaas', '$2y$10$NsOJiSZ2IxCx10bWIFZIzexJ25ChfX.raL0YgS4Roi2BdGk/bFfdS'),
(30, 'wandaaaaasa', '$2y$10$UJbpydnfPdU8hb8VIoDmr.E8Gsafm.drcBBf2GJV71KldjgMUxpBa'),
(31, 'wandaaaaasaq', '$2y$10$dA.gEkbChUuqE314W8khiuT/it.m.vWHHfTJ7R5fSuVmzCvXVXYZm'),
(32, 'wandaaaaasaqq', '$2y$10$4kS1KNEGR5oBSfgQ03Auk.jTCkyb.slghaOtUJ5ww.d343KW94zdu'),
(33, 'wandaaaaasaqqa', '$2y$10$TVljuJ4iyFpRZCGM29qBiOfZP9zYBseYIQWRW19XF91GY6IVXBhLq'),
(34, 'wandaaaaasaqqaq', '$2y$10$GoTUjfByyNbD1cunEVR7VeMNOi6z7Rppo3BtHMD7UQ/Lj1MjYTQKS'),
(35, 'wandaaaaasaqqaqq', '$2y$10$QpP07R0TcsJlkyGUALkyNe8BVJXNVRVPnc56Yx/DLeU.UdbewZQDa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
