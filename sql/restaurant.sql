-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 12 mei 2014 om 20:30
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `restaurant`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblmenus`
--

CREATE TABLE IF NOT EXISTS `tblmenus` (
  `me_id` int(11) NOT NULL AUTO_INCREMENT,
  `me_type` varchar(255) NOT NULL,
  `me_naam` varchar(255) NOT NULL,
  `me_prijs` varchar(255) NOT NULL,
  `me_restaurant` varchar(255) NOT NULL,
  PRIMARY KEY (`me_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblmenus`
--

INSERT INTO `tblmenus` (`me_id`, `me_type`, `me_naam`, `me_prijs`, `me_restaurant`) VALUES
(93, 'voorgerecht', 'kip', '5', 'Waiwah'),
(94, 'voorgerecht', '', '', ''),
(95, 'voorgerecht', 'sdgsqdgf', '6', ''),
(96, 'voorgerecht', 'dfgsdfgsdfg', 'sdfgsdfg', ''),
(98, 'voorgerecht', 'sdfsdqfsdf', 'qsdfqsdf', ''),
(101, 'hoofdgerecht', 'qsdfqsdfqsdf', 'qsdfqsdfqsdf', 'Waiwah');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbloverzicht`
--

CREATE TABLE IF NOT EXISTS `tbloverzicht` (
  `ov_id` int(11) NOT NULL AUTO_INCREMENT,
  `ov_tafel2` int(255) NOT NULL,
  `ov_tafel4` int(255) NOT NULL,
  `ov_tafel6` int(255) NOT NULL,
  `ov_tafel8` int(255) NOT NULL,
  `ov_restaurant` varchar(255) NOT NULL,
  `ov_username` varchar(255) NOT NULL,
  `ov_datum` varchar(255) NOT NULL,
  PRIMARY KEY (`ov_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbloverzicht`
--

INSERT INTO `tbloverzicht` (`ov_id`, `ov_tafel2`, `ov_tafel4`, `ov_tafel6`, `ov_tafel8`, `ov_restaurant`, `ov_username`, `ov_datum`) VALUES
(50, 8, 8, 6, 6, 'xcvxcv', '', '2014-05-12'),
(51, 6, 6, 2, 2, 'Waiwah', '', '2014-05-12'),
(52, 8, 8, 4, 4, 'Chong San', '', '2014-05-12'),
(53, 6, 6, 2, 2, 'Waiwah', '', '2014-05-18'),
(54, 6, 6, 2, 2, 'Waiwah', '', '2014-11-12'),
(55, 6, 6, 2, 2, 'Waiwah', '', '2014-09-12'),
(56, 6, 6, 2, 2, 'Waiwah', '', '2014-02-12'),
(57, 6, 6, 2, 2, 'Waiwah', '', '2014-05-17'),
(58, 6, 6, 2, 2, 'Waiwah', '', '2014-05-16'),
(59, 0, 0, 0, 0, 'qsdfqsdf', '', '2014-05-12'),
(60, 4, 4, 2, 1, 'Hong Kong', '', '2014-05-12'),
(61, 8, 8, 4, 4, 'Chong San', '', '2014-05-17'),
(62, 6, 6, 2, 2, 'Waiwah', '', '2014-10-12'),
(63, 6, 6, 2, 2, 'Waiwah', '', '2014-12-12'),
(64, 6, 6, 2, 2, 'Waiwah', '', '2014-09-14');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblreservaties`
--

CREATE TABLE IF NOT EXISTS `tblreservaties` (
  `re_id` int(11) NOT NULL AUTO_INCREMENT,
  `re_tafel2` int(255) NOT NULL,
  `re_tafel4` int(255) NOT NULL,
  `re_tafel6` int(255) NOT NULL,
  `re_tafel8` int(255) NOT NULL,
  `re_restaurant` varchar(255) NOT NULL,
  `re_username` varchar(255) NOT NULL,
  `re_datum` varchar(255) NOT NULL,
  PRIMARY KEY (`re_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblreservaties`
--

INSERT INTO `tblreservaties` (`re_id`, `re_tafel2`, `re_tafel4`, `re_tafel6`, `re_tafel8`, `re_restaurant`, `re_username`, `re_datum`) VALUES
(99, 1, 0, 0, 0, 'Waiwah', 'sixys', '2014-05-12'),
(100, 1, 0, 0, 0, 'Waiwah', 'sixys', '2014-05-12'),
(101, 1, 0, 0, 0, 'Waiwah', 'sixys', '2014-05-17'),
(102, 0, 0, 1, 0, 'Waiwah', 'sixys', '2014-05-17'),
(103, 1, 0, 0, 0, 'Chong San', 'sixys', '2014-05-12'),
(104, 1, 0, 0, 0, 'Waiwah', 'munlau', '2014-05-12'),
(105, 1, 0, 0, 0, 'Chong San', 'munlau', '2014-05-17'),
(106, 1, 0, 0, 0, 'Waiwah', 'munlau', '2014-10-12');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblrestaurant`
--

CREATE TABLE IF NOT EXISTS `tblrestaurant` (
  `rest_id` int(11) NOT NULL AUTO_INCREMENT,
  `rest_naam` varchar(255) NOT NULL,
  `rest_straat` varchar(255) NOT NULL,
  `rest_stad` varchar(255) NOT NULL,
  `rest_telefoon` int(255) NOT NULL,
  `rest_openingsuren` text NOT NULL,
  `rest_usernaam` varchar(255) NOT NULL,
  PRIMARY KEY (`rest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblrestaurant`
--

INSERT INTO `tblrestaurant` (`rest_id`, `rest_naam`, `rest_straat`, `rest_stad`, `rest_telefoon`, `rest_openingsuren`, `rest_usernaam`) VALUES
(1, 'Waiwah', 'molenstraat117', 'Heist-op-den-Berg', 232423423, 'Maandag: gesloten\r\nDinsdag: 17u-23u\r\nWoensdag: 17u-23u\r\nDonderdag: 17u-23u\r\nVrijdag: 17u-23u\r\nZaterdag: 17u-23u\r\nZondag: 17u-23u', 'sixys'),
(3, 'Chong San', 'bergstraat 22', 'Heist-op-den-Berg', 12333333, 'Maandag', 'sixys'),
(5, 'Hong Kong', 'stationstraat 115', 'Heist-op-den-Berg', 15268895, 'Alle dagen open', 'sixys'),
(6, 'xcvxcv', 'xcvxcv', 'xcvxcv', 6504162, 'xcvxcv', 'sixys'),
(7, 'qsdfqsdf', 'qsdfqsdf', 'qsdfqsdf', 64654064, 'sfqsdfqsdfqsdf', 'jochemke');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbltafels`
--

CREATE TABLE IF NOT EXISTS `tbltafels` (
  `ta_id` int(11) NOT NULL AUTO_INCREMENT,
  `ta_tafel2` int(255) NOT NULL,
  `ta_tafel4` int(255) NOT NULL,
  `ta_tafel6` int(255) NOT NULL,
  `ta_tafel8` int(255) NOT NULL,
  `ta_restaurant` varchar(255) NOT NULL,
  PRIMARY KEY (`ta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbltafels`
--

INSERT INTO `tbltafels` (`ta_id`, `ta_tafel2`, `ta_tafel4`, `ta_tafel6`, `ta_tafel8`, `ta_restaurant`) VALUES
(2, 6, 6, 2, 2, 'Waiwah'),
(5, 8, 8, 4, 4, 'Chong San'),
(6, 4, 4, 2, 1, 'Hong Kong'),
(9, 8, 8, 6, 6, 'xcvxcv');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_username` varchar(255) NOT NULL,
  `us_voornaam` varchar(255) NOT NULL,
  `us_achternaam` varchar(255) NOT NULL,
  `us_telefoon` varchar(255) NOT NULL,
  `us_email` varchar(255) NOT NULL,
  `us_password` varchar(255) NOT NULL,
  `us_functie` varchar(255) NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=681706230 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblusers`
--

INSERT INTO `tblusers` (`us_id`, `us_username`, `us_voornaam`, `us_achternaam`, `us_telefoon`, `us_email`, `us_password`, `us_functie`) VALUES
(1, 'sixys', 'sixis', 'yau', '00000000', 'yau@mulau.be', '1d796c84d1aa6b7f3317174f894bfb98', 'houder'),
(2, 'munlau', 'munlau', 'yau', '645065406', 'munlauyau1@hotmail.com', '1d796c84d1aa6b7f3317174f894bfb98', 'klant'),
(681706229, 'Munlau Yau', 'Munlau', 'Yau', '', 'munlauyau1@hotmail.com', '', 'klant');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
