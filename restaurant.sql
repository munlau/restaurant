-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 08 mei 2014 om 13:18
-- Serverversie: 5.6.14
-- PHP-versie: 5.5.6

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
-- Tabelstructuur voor tabel `tblreservaties`
--

CREATE TABLE IF NOT EXISTS `tblreservaties` (
  `re_id` int(11) NOT NULL AUTO_INCREMENT,
  `re_tafel2` int(255) NOT NULL,
  `re_tafel4` int(255) NOT NULL,
  `re_tafel6` int(255) NOT NULL,
  `re_tafel8` int(255) NOT NULL,
  `re_restaurant` varchar(255) NOT NULL,
  PRIMARY KEY (`re_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblrestaurant`
--

INSERT INTO `tblrestaurant` (`rest_id`, `rest_naam`, `rest_straat`, `rest_stad`, `rest_telefoon`, `rest_openingsuren`, `rest_usernaam`) VALUES
(1, 'Waiwah', 'molenstraat117', 'Heist-op-den-Berg', 232423423, 'Maandag', 'sixys'),
(3, 'Chong San', 'bergstraat 22', 'Heist-op-den-Berg', 12333333, 'Maandag', 'sixys');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbltafels`
--

INSERT INTO `tbltafels` (`ta_id`, `ta_tafel2`, `ta_tafel4`, `ta_tafel6`, `ta_tafel8`, `ta_restaurant`) VALUES
(2, 6, 6, 2, 2, 'Waiwah');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_username` varchar(255) NOT NULL,
  `us_voornaam` varchar(255) NOT NULL,
  `us_achternaam` varchar(255) NOT NULL,
  `us_telefoon` int(255) NOT NULL,
  `us_email` varchar(255) NOT NULL,
  `us_password` varchar(255) NOT NULL,
  `us_functie` varchar(255) NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblusers`
--

INSERT INTO `tblusers` (`us_id`, `us_username`, `us_voornaam`, `us_achternaam`, `us_telefoon`, `us_email`, `us_password`, `us_functie`) VALUES
(5, 'sixys', 'munlau', 'yau', 479232683, 'munlau_work@hotmail.com', '1d796c84d1aa6b7f3317174f894bfb98', 'houder'),
(6, 'munlau', 'munlau', 'yau', 479232683, 'munlauyau1@hotmail.com', '1d796c84d1aa6b7f3317174f894bfb98', 'klant'),
(7, 'jochemke', 'jochem', 'gorris', 456786544, 'jochemke@hotmail.com', '1d796c84d1aa6b7f3317174f894bfb98', 'houder');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
