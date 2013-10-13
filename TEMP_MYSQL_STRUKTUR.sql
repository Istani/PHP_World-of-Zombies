-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Okt 2013 um 17:39
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `zodgame`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abbau_gebiet`
--

CREATE TABLE IF NOT EXISTS `abbau_gebiet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `gebiet` text COLLATE latin1_german2_ci NOT NULL,
  `dauer` int(11) NOT NULL,
  `grundwert` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `abbau_gebiet`
--

INSERT INTO `abbau_gebiet` (`ID`, `gebiet`, `dauer`, `grundwert`, `itemID`) VALUES
(1, 'wald', 3600, 10, 12000),
(2, 'schrottplatz', 3600, 10, 11000),
(3, 'wald', 3600, 5, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abfall`
--

CREATE TABLE IF NOT EXISTS `abfall` (
  `zeitpunkt` int(20) NOT NULL,
  `item` int(11) NOT NULL,
  `menge` int(11) NOT NULL,
  `spieler` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `abfall`
--

INSERT INTO `abfall` (`zeitpunkt`, `item`, `menge`, `spieler`) VALUES
(1370112222, 1000, 2, 23),
(1370112233, 5000, 1, 23),
(1370112304, 1003, 1, 2),
(1370112307, 1012, 1, 2),
(1370112308, 1000, 2, 2),
(1370112309, 1001, 1, 2),
(1370112311, 1002, 1, 2),
(1370112451, 1002, 2, 23),
(1370112453, 1001, 2, 23),
(1370112457, 1003, 2, 23),
(1370114786, 1016, 2, 23),
(1370114788, 1011, 1, 23),
(1370114791, 1000, 1, 23),
(1370114793, 1003, 1, 23),
(1370114794, 1012, 1, 23),
(1370114795, 1014, 1, 23),
(1370114796, 1018, 1, 23),
(1370114797, 10000, 3, 23),
(1370114799, 11000, 26, 23),
(1370114800, 20000, 14, 23),
(1370115126, 1023, 1, 23),
(1370115017, 1016, 1, 16),
(1370115019, 1018, 1, 16),
(1370115020, 1019, 1, 16),
(1370115022, 1022, 1, 16),
(1370115105, 1010, 1, 16),
(1370115108, 1013, 1, 16),
(1370115110, 1018, 1, 16),
(1370115112, 1025, 1, 16),
(1370115128, 1019, 1, 23),
(1370115130, 1018, 1, 23),
(1370115132, 1022, 2, 23),
(1370115134, 1021, 2, 23),
(1370115135, 1012, 2, 23),
(1370115137, 1010, 1, 23),
(1370115904, 1019, 1, 16),
(1370115908, 1020, 1, 16),
(1370115909, 1010, 1, 16),
(1370115913, 1021, 1, 16),
(1370115914, 1023, 1, 16),
(1370117001, 1000, 2, 16),
(1370119251, 1240, 2, 16),
(1370119256, 5000, 1, 16),
(1370119257, 1000, 3, 16),
(1370119723, 1360, 1, 16),
(1370119729, 1060, 3, 16),
(1370119903, 1000, 3, 16),
(1370119905, 1240, 1, 16),
(1370207431, 1240, 2, 2),
(1370207433, 1000, 1, 2),
(1370207435, 1360, 1, 2),
(1370207438, 5000, 2, 2),
(1370207439, 6010, 1, 2),
(1370207442, 10000, 10, 2),
(1370207443, 10010, 1, 2),
(1375136840, 1000, 1, 2),
(1375136844, 1002, 3, 2),
(1375136846, 1061, 1, 2),
(1375136847, 1122, 2, 2),
(1375136848, 1241, 1, 2),
(1375136849, 1361, 4, 2),
(1375136850, 5000, 1, 2),
(1375136851, 5002, 2, 2),
(1375136852, 5011, 3, 2),
(1375136853, 5012, 1, 2),
(1375136855, 6011, 2, 2),
(1375136856, 6012, 2, 2),
(1375136857, 7011, 3, 2),
(1375136858, 7012, 1, 2),
(1375136859, 8010, 1, 2),
(1375136859, 8011, 1, 2),
(1375136860, 8012, 2, 2),
(1375136861, 10010, 1, 2),
(1375136862, 10011, 5, 2),
(1375832486, 1000, 3, 26),
(1375832500, 1060, 1, 26),
(1375832507, 1180, 2, 26),
(1375833924, 1300, 2, 26),
(1375833959, 6010, 1, 26),
(1375833964, 1180, 1, 26),
(1375833969, 5000, 1, 26),
(1375833974, 10010, 1, 26),
(1375879246, 1180, 1, 26),
(1375879251, 10010, 1, 26),
(1375879255, 1360, 3, 26),
(1375994532, 1060, 2, 26),
(1375994540, 5010, 1, 26),
(1375994544, 6010, 1, 26),
(1375994548, 7010, 2, 26),
(1375997084, 8010, 2, 26),
(1375997087, 1000, 1, 26),
(1375997092, 5010, 1, 26),
(1375997096, 6010, 1, 26),
(1376144114, 8010, 1, 26),
(1376144119, 1060, 1, 26),
(1376144123, 1180, 1, 26),
(1376144128, 6010, 1, 26),
(1376144132, 5010, 1, 26),
(1376185633, 1240, 3, 26),
(1376185638, 1180, 1, 26),
(1376185644, 8010, 1, 26),
(1376185649, 9010, 1, 26),
(1376231181, 5010, 1, 26),
(1376231184, 10010, 1, 26),
(1376231190, 1240, 1, 26),
(1376250270, 1120, 3, 26),
(1376250273, 1360, 1, 26),
(1376250277, 8010, 1, 26),
(1376250280, 9010, 1, 26),
(1376250286, 1060, 1, 26);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `char`
--

CREATE TABLE IF NOT EXISTS `char` (
  `userID` int(11) NOT NULL,
  `klasse` int(11) NOT NULL,
  `stpoints` int(11) NOT NULL,
  `skpoints` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `exp` int(11) NOT NULL DEFAULT '0',
  `gesundheit` int(11) NOT NULL DEFAULT '5',
  `power` int(11) NOT NULL DEFAULT '5',
  `geschwindigkeit` int(11) NOT NULL DEFAULT '5',
  `glueck` int(11) NOT NULL DEFAULT '5',
  `wissen` int(11) NOT NULL DEFAULT '5',
  `treffchance` int(11) NOT NULL DEFAULT '5',
  `nahrung` int(11) NOT NULL DEFAULT '100',
  `wasser` int(11) NOT NULL DEFAULT '100',
  `nahkampf` int(11) NOT NULL DEFAULT '0',
  `nahkampf_uniq` int(11) NOT NULL DEFAULT '0',
  `schusswaffe` int(11) NOT NULL DEFAULT '0',
  `schusswaffe_uniq` int(11) NOT NULL DEFAULT '0',
  `rucksack` int(11) NOT NULL DEFAULT '0',
  `rucksack_uniq` int(11) NOT NULL DEFAULT '0',
  `goldklumpen` int(11) NOT NULL DEFAULT '0',
  `amulett` int(11) NOT NULL DEFAULT '0',
  `amulett_uniq` int(11) NOT NULL DEFAULT '0',
  `ring_L` int(11) NOT NULL DEFAULT '0',
  `ring_L_uniq` int(11) NOT NULL DEFAULT '0',
  `ring_R` int(11) NOT NULL DEFAULT '0',
  `ring_R_uniq` int(11) NOT NULL DEFAULT '0',
  `helm` int(11) NOT NULL DEFAULT '0',
  `helm_uniq` int(11) NOT NULL DEFAULT '0',
  `amor` int(11) NOT NULL DEFAULT '0',
  `amor_uniq` int(11) NOT NULL DEFAULT '0',
  `handschuhe` int(11) NOT NULL DEFAULT '0',
  `handschuhe_uniq` int(11) NOT NULL DEFAULT '0',
  `schuhe` int(11) NOT NULL DEFAULT '0',
  `schuhe_uniq` int(11) NOT NULL DEFAULT '0',
  `fahrzeug` int(11) NOT NULL DEFAULT '0',
  `fahrzeug_uniq` int(11) NOT NULL DEFAULT '0',
  `geld` int(10) NOT NULL DEFAULT '0',
  `gilde` varchar(155) COLLATE latin1_german2_ci NOT NULL,
  `last_map` varchar(255) COLLATE latin1_german2_ci NOT NULL DEFAULT 'trainingslager',
  `zombieslave` int(11) NOT NULL DEFAULT '0',
  `zombieslave_aktiv` int(11) NOT NULL DEFAULT '0',
  `zombieslave_gebiet` text COLLATE latin1_german2_ci NOT NULL,
  `Items_Abbau` int(11) NOT NULL DEFAULT '0',
  `Items_Crafting` int(11) NOT NULL DEFAULT '0',
  `Monster_Wins` int(11) NOT NULL,
  `aktion` text COLLATE latin1_german2_ci NOT NULL,
  `aktion_id` int(10) NOT NULL,
  `aktion_start` int(11) NOT NULL,
  `aktion_ende` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `char`
--

INSERT INTO `char` (`userID`, `klasse`, `stpoints`, `skpoints`, `level`, `exp`, `gesundheit`, `power`, `geschwindigkeit`, `glueck`, `wissen`, `treffchance`, `nahrung`, `wasser`, `nahkampf`, `nahkampf_uniq`, `schusswaffe`, `schusswaffe_uniq`, `rucksack`, `rucksack_uniq`, `goldklumpen`, `amulett`, `amulett_uniq`, `ring_L`, `ring_L_uniq`, `ring_R`, `ring_R_uniq`, `helm`, `helm_uniq`, `amor`, `amor_uniq`, `handschuhe`, `handschuhe_uniq`, `schuhe`, `schuhe_uniq`, `fahrzeug`, `fahrzeug_uniq`, `geld`, `gilde`, `last_map`, `zombieslave`, `zombieslave_aktiv`, `zombieslave_gebiet`, `Items_Abbau`, `Items_Crafting`, `Monster_Wins`, `aktion`, `aktion_id`, `aktion_start`, `aktion_ende`) VALUES
(13, 2, 0, 0, 1, 100, 5, 5, 5, 5, 5, 5, 50, 60, 0, 0, 0, 0, 5000, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 25, 4, 2, '', 0, 0, 0),
(14, 2, 0, 0, 1, 10, 5, 5, 5, 5, 5, 5, 100, 100, 0, 0, 0, 0, 5000, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 0, 0, 0, '', 0, 0, 0),
(24, 1, 0, 0, 1, 30, 5, 5, 5, 5, 5, 5, 21, 95, 1000, 52, 0, 0, 5000, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'weltkarte', 0, 0, '', 0, 0, 1, '', 0, 0, 0),
(4, 1, 0, 0, 1, 0, 5, 5, 5, 5, 5, 5, 100, 100, 1, 0, 0, 0, 5000, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, 'Zombies of Destruction', 'trainingslager', 1, 0, '', 0, 0, 0, '', 0, 0, 0),
(5, 2, 0, 0, 1, 0, 5, 5, 5, 5, 5, 5, 100, 100, 1, 0, 0, 0, 5000, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, '', 'weltkarte', 1, 0, '', 0, 0, 0, '', 0, 0, 0),
(10, 1, 0, 0, 1, 0, 5, 5, 5, 5, 5, 5, 100, 100, 1, 0, 0, 0, 5000, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, '', 'trainingslager', 1, 0, '', 0, 0, 0, '', 0, 0, 0),
(6, 1, 0, 0, 1, 10, 5, 5, 5, 5, 5, 5, 100, 100, 0, 0, 0, 0, 5000, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Zombies of Destruction', 'trainingslager', 0, 0, '', 0, 0, 0, 'ABBAUEN', 1, 1368351033, 1368354633),
(7, 3, 0, 0, 1, 0, 5, 5, 5, 5, 5, 5, 100, 100, 1, 0, 0, 0, 5000, 0, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, '', 'trainingslager', 1, 0, '', 10, 0, 0, '', 0, 0, 0),
(3, 1, 0, 0, 1, 0, 5, 5, 5, 5, 5, 5, 100, 100, 1, 0, 0, 0, 5000, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, '', 'weltkarte', 1, 0, '', 0, 0, 0, '', 0, 0, 0),
(8, 1, 0, 0, 1, 0, 5, 5, 5, 5, 5, 5, 100, 100, 1, 0, 0, 0, 5000, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, '', 'trainingslager', 1, 0, '', 30, 4, 0, 'KAMPF_MOB', 2, 1362565077, 1362565137),
(12, 1, 0, 0, 1, 0, 5, 5, 5, 5, 5, 5, 100, 100, 1, 0, 0, 0, 5000, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, 'Zombies of Destruction', 'trainingslager', 1, 0, '', 0, 0, 0, '', 0, 0, 0),
(25, 1, 0, 0, 1, 123, 5, 5, 5, 5, 5, 5, 73, 115, 1360, 69, 0, 0, 5000, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9010, 0, 10010, 0, 0, 0, 0, 'Smokebustertv', 'trainingslager', 0, 0, '', 30, 6, 2, '', 0, 0, 0),
(15, 3, 0, 0, 1, 10, 5, 5, 5, 5, 5, 5, 100, 100, 0, 0, 0, 0, 5000, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 0, 0, 0, '', 0, 0, 0),
(16, 1, 0, 1, 2, 205, 5, 5, 5, 5, 5, 5, 27, 25, 1360, 2, 0, 0, 5000, 0, 473, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 60, 4, 25, '', 0, 0, 0),
(18, 2, 0, 0, 1, 10, 5, 5, 5, 5, 5, 5, 100, 100, 0, 0, 0, 0, 5000, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 0, 0, 0, '', 0, 0, 0),
(19, 3, 0, 0, 1, 10, 5, 5, 5, 5, 5, 5, 100, 100, 0, 0, 0, 0, 5000, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 0, 0, 0, '', 0, 0, 0),
(20, 3, 0, 0, 1, 15, 5, 5, 5, 5, 5, 5, 100, 95, 0, 0, 0, 0, 5000, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 5, 0, 0, '', 0, 0, 0),
(21, 1, 0, 0, 1, 107, 5, 5, 5, 5, 5, 5, 4, 6, 1000, 57, 0, 0, 5000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Zombies of Destruction', 'trainingslager', 0, 0, '', 25, 4, 13, 'KAMPF_MOB', 4, 1369859835, 1369860015),
(22, 1, 0, 0, 1, 10, 5, 5, 5, 5, 5, 5, 100, 100, 0, 0, 0, 0, 5000, 0, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'weltkarte', 0, 0, '', 0, 0, 0, '', 0, 0, 0),
(23, 2, 0, 10, 11, 25, 20, 20, 5, 5, 5, 5, 1, 375, 1362, 24, 0, 0, 5002, 0, 967, 0, 0, 0, 0, 0, 0, 0, 0, 8012, 0, 9011, 0, 0, 0, 0, 0, 0, 'Zombies of Destruction', 'trainingslager', 0, 0, '', 40, 6, 24, '', 0, 0, 0),
(2, 2, 0, 12, 13, 241, 25, 25, 5, 5, 5, 5, 1, 460, 1362, 38, 0, 0, 5002, 0, 956, 0, 0, 0, 0, 0, 0, 0, 0, 8012, 0, 9011, 0, 10011, 0, 0, 0, 0, 'Zombies of Destruction', 'trainingslager', 0, 0, '', 60, 0, 30, '', 0, 0, 0),
(1, 1, 0, 0, 1, 10, 5, 5, 5, 5, 5, 5, 100, 100, 0, 0, 0, 0, 5000, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 0, 0, 0, '', 0, 0, 0),
(26, 2, 0, 4, 5, 2, 5, 5, 5, 5, 5, 5, 35, 70, 1361, 84, 0, 0, 5000, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 8011, 0, 9010, 0, 10010, 0, 0, 0, 0, 'Smokebustertv', 'trainingslager', 0, 0, '', 65, 2, 84, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `char_exp`
--

CREATE TABLE IF NOT EXISTS `char_exp` (
  `level` int(11) NOT NULL,
  `exp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `char_exp`
--

INSERT INTO `char_exp` (`level`, `exp`) VALUES
(1, 252),
(2, 406),
(3, 563),
(4, 723),
(5, 886),
(6, 1051),
(7, 1220),
(8, 1391),
(9, 1565),
(10, 1743),
(11, 1923),
(12, 2107),
(13, 2294),
(14, 2484),
(15, 2677),
(16, 2874),
(17, 3075),
(18, 3278),
(19, 3486),
(20, 3697),
(21, 3911),
(22, 4130),
(23, 4352),
(24, 4578),
(25, 4808),
(26, 5043),
(27, 5281),
(28, 5523),
(29, 5770),
(30, 6021),
(31, 6276),
(32, 6536),
(33, 6800),
(34, 7069),
(35, 7343),
(36, 7622),
(37, 7905),
(38, 8193),
(39, 8487),
(40, 8785),
(41, 9089),
(42, 9398),
(43, 9713),
(44, 10033),
(45, 10358),
(46, 10689),
(47, 11026),
(48, 11369),
(49, 11718),
(50, 12073),
(51, 12435),
(52, 12802),
(53, 13176),
(54, 13557),
(55, 13944),
(56, 14338),
(57, 14739),
(58, 15147),
(59, 15562),
(60, 15984),
(61, 16414),
(62, 16851),
(63, 17296),
(64, 17749),
(65, 18210),
(66, 18678),
(67, 19155),
(68, 19640),
(69, 20134),
(70, 20636),
(71, 21148),
(72, 21668),
(73, 22197),
(74, 22735),
(75, 23283),
(76, 23841),
(77, 24408),
(78, 24985),
(79, 25572),
(80, 26170),
(81, 26778),
(82, 27396),
(83, 28026),
(84, 28666),
(85, 29318),
(86, 29981),
(87, 30656),
(88, 31342),
(89, 32041),
(90, 32751),
(91, 33474),
(92, 34210),
(93, 34959),
(94, 35721),
(95, 36496),
(96, 37284),
(97, 38087),
(98, 38903),
(99, 39734),
(100, 40580),
(101, 41440),
(102, 42315),
(103, 43205),
(104, 44112),
(105, 45033),
(106, 45972),
(107, 46926),
(108, 47897),
(109, 48885),
(110, 49891),
(111, 50914),
(112, 51955),
(113, 53014),
(114, 54092),
(115, 55189),
(116, 56304),
(117, 57440),
(118, 58595),
(119, 59770),
(120, 60966),
(121, 62183),
(122, 63421),
(123, 64681),
(124, 65963),
(125, 67268),
(126, 68595),
(127, 69945),
(128, 71319),
(129, 72717),
(130, 74140),
(131, 75587),
(132, 77060),
(133, 78559),
(134, 80083),
(135, 81635),
(136, 83214),
(137, 84820),
(138, 86454),
(139, 88117),
(140, 89809),
(141, 91531),
(142, 93283),
(143, 95065),
(144, 96879),
(145, 98724),
(146, 100602),
(147, 102512),
(148, 104456),
(149, 106434),
(150, 108447),
(151, 110495),
(152, 112578),
(153, 114698),
(154, 116856),
(155, 119051),
(156, 121284),
(157, 123556),
(158, 125869),
(159, 128221),
(160, 130615),
(161, 133051),
(162, 135529),
(163, 138051),
(164, 140617),
(165, 143228),
(166, 145884),
(167, 148587),
(168, 151338),
(169, 154136),
(170, 156983),
(171, 159881),
(172, 162828),
(173, 165828),
(174, 168880),
(175, 171985),
(176, 175145),
(177, 178360),
(178, 181631),
(179, 184960),
(180, 188347),
(181, 191793),
(182, 195299),
(183, 198867),
(184, 202497),
(185, 206191),
(186, 209949),
(187, 213773),
(188, 217664),
(189, 221623),
(190, 225652),
(191, 229751),
(192, 233921),
(193, 238165),
(194, 242483),
(195, 246876),
(196, 251347),
(197, 255895),
(198, 260523),
(199, 265233),
(200, 270024);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `char_quest`
--

CREATE TABLE IF NOT EXISTS `char_quest` (
  `cquest_userID` int(11) NOT NULL,
  `cquest_questID` int(11) NOT NULL,
  `cquest_gelesen` int(1) NOT NULL DEFAULT '0',
  `cquest_erledigt` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `char_quest`
--

INSERT INTO `char_quest` (`cquest_userID`, `cquest_questID`, `cquest_gelesen`, `cquest_erledigt`) VALUES
(1, 2, 1, 0),
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `char_skill`
--

CREATE TABLE IF NOT EXISTS `char_skill` (
  `userID` int(11) NOT NULL,
  `skillID` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  PRIMARY KEY (`userID`,`skillID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `char_skill`
--

INSERT INTO `char_skill` (`userID`, `skillID`, `lvl`) VALUES
(1, 2, 1),
(2, 3, 1),
(7, 1, 1),
(12, 1, 1),
(6, 1, 1),
(10, 1, 1),
(8, 1, 1),
(1, 1, 1),
(2, 1, 1),
(13, 3, 1),
(13, 1, 1),
(14, 3, 1),
(14, 1, 1),
(15, 4, 1),
(15, 1, 1),
(16, 2, 1),
(16, 1, 1),
(6, 2, 1),
(18, 1, 1),
(18, 3, 1),
(19, 1, 1),
(19, 4, 1),
(20, 1, 1),
(20, 4, 1),
(21, 1, 1),
(21, 2, 1),
(22, 1, 1),
(22, 2, 1),
(23, 3, 1),
(23, 1, 1),
(24, 1, 1),
(24, 2, 1),
(25, 1, 1),
(25, 2, 1),
(26, 1, 1),
(26, 3, 1),
(1, 5, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `crafting_rezepte`
--

CREATE TABLE IF NOT EXISTS `crafting_rezepte` (
  `item` int(11) NOT NULL,
  `menge` int(11) NOT NULL,
  `produkt` int(11) NOT NULL,
  `produkt_menge` int(11) NOT NULL,
  `skill_level` int(11) NOT NULL,
  PRIMARY KEY (`item`,`produkt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `crafting_rezepte`
--

INSERT INTO `crafting_rezepte` (`item`, `menge`, `produkt`, `produkt_menge`, `skill_level`) VALUES
(12000, 3, 15000, 1, 1),
(11000, 3, 15000, 1, 1),
(15000, 1, 3, 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_chat`
--

CREATE TABLE IF NOT EXISTS `guild_chat` (
  `guild_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `nachricht` text COLLATE latin1_german2_ci NOT NULL,
  `poster` int(50) NOT NULL,
  PRIMARY KEY (`msg_id`),
  UNIQUE KEY `msg_id` (`msg_id`),
  KEY `guild_id` (`guild_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=30 ;

--
-- Daten für Tabelle `guild_chat`
--

INSERT INTO `guild_chat` (`guild_id`, `msg_id`, `time`, `nachricht`, `poster`) VALUES
(1, 15, 1358803529, 'Das ist mein Text!', 2),
(1, 16, 1358880271, 'Hahahahaha xDD', 6),
(1, 19, 1359323511, 'ZoDIstani ist der Gilde beigetreten!', 2),
(1, 13, 1358801856, 'Miau', 6),
(1, 14, 1358802021, 'Wuff', 1),
(1, 12, 1358715570, 'geiler scheiÃŸ', 4),
(1, 11, 1358715552, 'Yeah', 1),
(1, 10, 1358711331, 'Der Guild Chat funktioniert, genau so wie die Memberliste!!!^^', 2),
(1, 20, 1367678996, 'ZoDIkarus ist der Gilde beigetreten!', 2),
(1, 21, 1368293519, 'alex4it ist der Gilde beigetreten!', 2),
(1, 22, 1368364594, 'ZoDChrizzy ist der Gilde beigetreten!', 2),
(1, 23, 1369089185, 'Tarlorr1 ist der Gilde beigetreten!', 2),
(1, 24, 1370110445, 'ZoDTarlorr ist der Gilde beigetreten!', 2),
(1, 25, 1370289524, 'ZoDTarlorr ist der Gilde beigetreten!', 2),
(1, 26, 1370289568, 'ZoDIkarus ist der Gilde beigetreten!', 2),
(2, 27, 1370453029, 'ZoDIstani ist der Gilde beigetreten!', 1),
(3, 28, 1375831381, 'Nookie ist der Gilde beigetreten!', 26),
(3, 29, 1375873591, 'Hallo', 26);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_db`
--

CREATE TABLE IF NOT EXISTS `guild_db` (
  `guild_id` int(11) NOT NULL AUTO_INCREMENT,
  `guild_name` varchar(155) COLLATE latin1_german2_ci NOT NULL,
  `guild_kurz` varchar(6) COLLATE latin1_german2_ci NOT NULL,
  `guild_desc` text COLLATE latin1_german2_ci NOT NULL,
  `emblem` int(11) NOT NULL DEFAULT '0',
  `guild_master` varchar(155) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`guild_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `guild_db`
--

INSERT INTO `guild_db` (`guild_id`, `guild_name`, `guild_kurz`, `guild_desc`, `emblem`, `guild_master`) VALUES
(1, 'Zombies of Destruction', 'ZoD', '"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""\r\n~~~~~~~~~~~~~~~~~~~~ ZoD Gilde ~~~~~~~~~~~~~~~~~~~~~~\r\n~~~~~ Trettet der stÃ¤rksten Gilde auf dem Server bei der "ZoD Gilde2 ~~~~~\r\n~~~~~~~~~~~~~~~~~ www.zodclan-online.de ~~~~~~~~~~~~~~~~~\r\n\r\n"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""\r\n\r\nÃœber die Gilde:\r\n\r\nSkill 0 : lvl 1 xx Mitglieder\r\nSkill 1 : lvl 1 xx% bonus EXP\r\nSkill 2 : lvl 1 xx% bonus Geld\r\nSkill 3 : lvl 1 xx% bonus -ZEIT\r\n\r\nWas wir erwarten:\r\n\r\n-EXP Share fÃ¼r die Gilde, dass wir schnell das max-lvl erreichen. \r\n  Also muss jeder 10% seiner EXP abgeben!\r\n \r\n-Freundlicher Umgang mit anderen leuten aus der Gilde.\r\n\r\n~~~~~~~~~~~~~~~~~~~~ REGELN ~~~~~~~~~~~~~~~~~~~~~~~\r\n~~~~ Greif kein in der Gilde an. Keine AutoClick Programme oder Bots ~~~~~\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~', 0, '2'),
(2, 'Gnaaadenlos', 'A', 'TEST Istani', 0, '1'),
(3, 'Smokebustertv', 'SBtv', 'http://www.youtube.com/user/SmokebustersTV\r\nhttps://www.facebook.com/pages/Smokebusterstv/687196061294198', 0, '26');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_exp`
--

CREATE TABLE IF NOT EXISTS `guild_exp` (
  `level` int(11) NOT NULL,
  `exp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `guild_exp`
--

INSERT INTO `guild_exp` (`level`, `exp`) VALUES
(1, 304),
(2, 515),
(3, 734),
(4, 962),
(5, 1198),
(6, 1443),
(7, 1697),
(8, 1961),
(9, 2234),
(10, 2518),
(11, 2812),
(12, 3118),
(13, 3435),
(14, 3764),
(15, 4105),
(16, 4459),
(17, 4826),
(18, 5207),
(19, 5602),
(20, 6012),
(21, 6438),
(22, 6879),
(23, 7337),
(24, 7812),
(25, 8305),
(26, 8817),
(27, 9347),
(28, 9898),
(29, 10469),
(30, 11062),
(31, 11676),
(32, 12314),
(33, 12976),
(34, 13663),
(35, 14375),
(36, 15114),
(37, 15881),
(38, 16676),
(39, 17502),
(40, 18358),
(41, 19246),
(42, 20168),
(43, 21125),
(44, 22117),
(45, 23146),
(46, 24214),
(47, 25322),
(48, 26472),
(49, 27664),
(50, 28902),
(51, 30186),
(52, 31518),
(53, 32899),
(54, 34333),
(55, 35821),
(56, 37364),
(57, 38965),
(58, 40626),
(59, 42350),
(60, 44138),
(61, 45993),
(62, 47918),
(63, 49915),
(64, 51987),
(65, 54136),
(66, 56366),
(67, 58680),
(68, 61080),
(69, 63571),
(70, 66155),
(71, 68836),
(72, 71617),
(73, 74503),
(74, 77496),
(75, 80602),
(76, 83825),
(77, 87169),
(78, 90637),
(79, 94236),
(80, 97970),
(81, 101844),
(82, 105863),
(83, 110033),
(84, 114359),
(85, 118848),
(86, 123505),
(87, 128336),
(88, 133349),
(89, 138549),
(90, 143945),
(91, 149543),
(92, 155350),
(93, 161376),
(94, 167628),
(95, 174114),
(96, 180843),
(97, 187825),
(98, 195068),
(99, 202583),
(100, 210380),
(101, 218469),
(102, 226862),
(103, 235569),
(104, 244603),
(105, 253976),
(106, 263700),
(107, 273788),
(108, 284255),
(109, 295115),
(110, 306382),
(111, 318071),
(112, 330199),
(113, 342781),
(114, 355836),
(115, 369379),
(116, 383431),
(117, 398010),
(118, 413135),
(119, 428828),
(120, 445109),
(121, 462000),
(122, 479525),
(123, 497708),
(124, 516572),
(125, 536143),
(126, 556448),
(127, 577515),
(128, 599372),
(129, 622049),
(130, 645575),
(131, 669984),
(132, 695309),
(133, 721583),
(134, 748842),
(135, 777124),
(136, 806466),
(137, 836908),
(138, 868493),
(139, 901261),
(140, 935258),
(141, 970530),
(142, 1007125),
(143, 1045093),
(144, 1084484),
(145, 1125352),
(146, 1167752),
(147, 1211743),
(148, 1257383),
(149, 1304735),
(150, 1353863),
(151, 1404833),
(152, 1457714),
(153, 1512578),
(154, 1569500),
(155, 1628556),
(156, 1689827),
(157, 1753396),
(158, 1819348),
(159, 1887773),
(160, 1958765),
(161, 2032419),
(162, 2108834),
(163, 2188116),
(164, 2270370),
(165, 2355709),
(166, 2444248),
(167, 2536107),
(168, 2631411),
(169, 2730289),
(170, 2832875),
(171, 2939308),
(172, 3049732),
(173, 3164297),
(174, 3283158),
(175, 3406476),
(176, 3534419),
(177, 3667160),
(178, 3804878),
(179, 3947761),
(180, 4096002),
(181, 4249802),
(182, 4409370),
(183, 4574921),
(184, 4746681),
(185, 4924882),
(186, 5109765),
(187, 5301581),
(188, 5500590),
(189, 5707062),
(190, 5921277),
(191, 6143525),
(192, 6374107),
(193, 6613336),
(194, 6861536),
(195, 7119044),
(196, 7386208),
(197, 7663391),
(198, 7950968),
(199, 8249329),
(200, 8558879),
(201, 8880037),
(202, 9213238),
(203, 9558935),
(204, 9917595),
(205, 10289705),
(206, 10675769),
(207, 11076310),
(208, 11491872),
(209, 11923017),
(210, 12370330),
(211, 12834417),
(212, 13315908),
(213, 13815454),
(214, 14333734),
(215, 14871449),
(216, 15429328),
(217, 16008128),
(218, 16608633),
(219, 17231657),
(220, 17878044),
(221, 18548670),
(222, 19244446),
(223, 19966312),
(224, 20715249),
(225, 21492271),
(226, 22298431),
(227, 23134822),
(228, 24002578),
(229, 24902875),
(230, 25836932),
(231, 26806017),
(232, 27811443),
(233, 28854572),
(234, 29936819),
(235, 31059649),
(236, 32224586),
(237, 33433208),
(238, 34687153),
(239, 35988122),
(240, 37337876),
(241, 38738247),
(242, 40191131),
(243, 41698498),
(244, 43262392),
(245, 44884932),
(246, 46568317),
(247, 48314828),
(248, 50126835),
(249, 52006791),
(250, 53957245);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_ranking`
--

CREATE TABLE IF NOT EXISTS `guild_ranking` (
  `guild_id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`guild_id`,`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `guild_ranking`
--

INSERT INTO `guild_ranking` (`guild_id`, `title`, `userID`) VALUES
(1, 3, 2),
(1, 1, 6),
(1, 2, 4),
(1, 2, 12),
(1, 1, 1),
(1, 1, 13),
(2, 3, 1),
(1, 1, 21),
(1, 1, 23),
(3, 3, 26),
(3, 1, 25);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_skill`
--

CREATE TABLE IF NOT EXISTS `guild_skill` (
  `guild_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_skill_db`
--

CREATE TABLE IF NOT EXISTS `guild_skill_db` (
  `skill_ID` int(11) NOT NULL AUTO_INCREMENT,
  `max_lvl` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  PRIMARY KEY (`skill_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `invID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `uniqID` int(11) NOT NULL,
  `menge` int(11) NOT NULL,
  PRIMARY KEY (`invID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=714 ;

--
-- Daten für Tabelle `inventory`
--

INSERT INTO `inventory` (`invID`, `userID`, `itemID`, `uniqID`, `menge`) VALUES
(496, 23, 1120, 14, 1),
(585, 2, 1241, 41, 1),
(504, 23, 5011, 0, 1),
(613, 2, 9012, 0, 1),
(617, 24, 2, 0, 8),
(482, 23, 20000, 0, 9),
(491, 23, 3, 0, 1),
(492, 23, 3, 0, 1),
(483, 23, 3, 0, 1),
(485, 23, 3, 0, 1),
(476, 2, 11000, 0, 20),
(533, 23, 1241, 20, 1),
(593, 2, 1241, 44, 1),
(484, 23, 15000, 0, 4),
(584, 2, 1242, 40, 1),
(465, 2, 12000, 0, 70),
(464, 23, 11000, 0, 26),
(477, 23, 12000, 0, 5),
(503, 23, 6011, 0, 1),
(502, 23, 5001, 0, 1),
(462, 13, 3, 0, 1),
(520, 23, 1240, 16, 1),
(461, 13, 3, 0, 1),
(458, 13, 11000, 0, 14),
(583, 2, 7012, 0, 1),
(592, 2, 10012, 0, 1),
(460, 13, 3, 0, 1),
(604, 2, 5012, 0, 1),
(456, 13, 20000, 0, 3),
(455, 13, 1000, 7, 1),
(454, 13, 2, 0, 15),
(453, 13, 1, 0, 10),
(452, 23, 10000, 0, 10),
(518, 23, 6011, 0, 1),
(517, 23, 7011, 0, 1),
(516, 23, 5012, 0, 1),
(587, 2, 5002, 0, 1),
(450, 16, 1060, 6, 1),
(449, 16, 1060, 5, 1),
(609, 2, 6012, 0, 1),
(444, 16, 1000, 1, 1),
(442, 16, 11000, 0, 37),
(447, 16, 1240, 129, 1),
(451, 16, 1060, 3, 1),
(448, 16, 1000, 4, 1),
(589, 2, 1062, 43, 1),
(543, 23, 1361, 21, 1),
(441, 16, 3, 0, 1),
(526, 23, 5012, 0, 1),
(443, 16, 3, 0, 1),
(605, 2, 10011, 0, 1),
(525, 23, 1002, 22, 1),
(494, 23, 1000, 15, 1),
(416, 16, 2, 0, 15),
(410, 16, 20000, 0, 14),
(479, 23, 3, 0, 1),
(440, 16, 15000, 0, 2),
(603, 2, 5002, 0, 1),
(599, 2, 1362, 45, 1),
(590, 2, 5002, 0, 1),
(598, 2, 7011, 0, 1),
(553, 23, 10012, 0, 1),
(616, 24, 1, 0, 10),
(542, 23, 10012, 0, 1),
(506, 2, 20000, 0, 3),
(608, 2, 10012, 0, 1),
(615, 2, 1122, 51, 1),
(414, 16, 10000, 0, 34),
(540, 23, 6011, 0, 1),
(405, 16, 1, 0, 17),
(541, 23, 1062, 25, 1),
(403, 2, 2, 0, 42),
(402, 2, 1, 0, 13),
(401, 23, 2, 0, 24),
(400, 23, 1, 0, 10),
(596, 2, 8012, 0, 1),
(544, 23, 5012, 0, 1),
(545, 23, 1001, 26, 1),
(546, 23, 7011, 0, 1),
(552, 23, 1182, 29, 1),
(549, 23, 5012, 0, 1),
(550, 23, 1362, 27, 1),
(551, 23, 1302, 28, 1),
(555, 23, 5012, 0, 1),
(556, 23, 1302, 30, 1),
(557, 23, 1182, 31, 1),
(558, 23, 6011, 0, 1),
(607, 2, 1362, 49, 1),
(581, 2, 1002, 39, 1),
(597, 2, 10012, 0, 1),
(588, 2, 1182, 42, 1),
(602, 2, 7011, 0, 1),
(564, 14, 1, 0, 10),
(565, 14, 2, 0, 10),
(594, 2, 6012, 0, 1),
(612, 2, 1241, 50, 1),
(606, 2, 1002, 48, 1),
(614, 2, 7012, 0, 1),
(601, 2, 1241, 47, 1),
(586, 2, 9012, 0, 1),
(574, 15, 1, 0, 10),
(575, 15, 2, 0, 10),
(600, 2, 1182, 46, 1),
(610, 2, 9012, 0, 1),
(595, 2, 1242, 35, 1),
(619, 25, 1, 0, 10),
(620, 25, 2, 0, 15),
(621, 26, 1, 0, 8),
(703, 26, 7010, 0, 1),
(625, 25, 12000, 0, 11),
(626, 26, 12000, 0, 87),
(658, 26, 11000, 0, 17),
(628, 26, 20000, 0, 26),
(660, 25, 1000, 53, 1),
(709, 26, 1000, 87, 1),
(705, 26, 8011, 0, 1),
(706, 26, 1301, 86, 1),
(656, 25, 1060, 68, 1),
(676, 26, 5000, 0, 1),
(708, 26, 5000, 0, 1),
(704, 26, 1181, 85, 1),
(641, 25, 11000, 0, 11),
(669, 26, 2, 0, 13),
(707, 26, 5001, 0, 1),
(647, 25, 3, 0, 1),
(646, 25, 3, 0, 1),
(684, 26, 5000, 0, 1),
(713, 1, 2, 0, 10),
(712, 1, 1, 0, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_art`
--

CREATE TABLE IF NOT EXISTS `item_art` (
  `art` int(11) NOT NULL,
  `beschreibung` varchar(30) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `item_art`
--

INSERT INTO `item_art` (`art`, `beschreibung`) VALUES
(1, 'nahkampf'),
(2, 'schusswaffe'),
(3, 'useable_item'),
(4, 'rucksack'),
(5, 'amulett'),
(6, 'ring'),
(7, 'helm'),
(8, 'amor'),
(9, 'handschuhe'),
(10, 'schuhe'),
(11, 'fahrzeuge');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_chance_stats`
--

CREATE TABLE IF NOT EXISTS `item_chance_stats` (
  `anzahl_stats` int(11) NOT NULL,
  `chance_stats` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `item_chance_stats`
--

INSERT INTO `item_chance_stats` (`anzahl_stats`, `chance_stats`) VALUES
(1, 100),
(2, 95),
(3, 90),
(4, 30),
(5, 15),
(6, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_db`
--

CREATE TABLE IF NOT EXISTS `item_db` (
  `Info` text COLLATE latin1_german2_ci NOT NULL,
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `min_lvl` int(11) NOT NULL,
  `max_lvl` int(11) NOT NULL,
  `art` int(11) NOT NULL,
  `cat` int(11) NOT NULL DEFAULT '0',
  `stack` int(11) NOT NULL,
  `mindmg` int(11) NOT NULL,
  `maxdmg` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `mdef` int(11) NOT NULL,
  `hit` int(11) NOT NULL,
  `crit` float(11,2) NOT NULL,
  `refill` int(11) NOT NULL,
  `refillart` int(11) NOT NULL,
  `platz` int(11) NOT NULL,
  `munitonsart` int(11) NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=20003 ;

--
-- Daten für Tabelle `item_db`
--

INSERT INTO `item_db` (`Info`, `itemID`, `min_lvl`, `max_lvl`, `art`, `cat`, `stack`, `mindmg`, `maxdmg`, `def`, `mdef`, `hit`, `crit`, `refill`, `refillart`, `platz`, `munitonsart`) VALUES
('Taschen-Messer', 1000, 1, 5, 1, 0, 1, 1, 3, 0, 0, 100, 5.00, 0, 0, 0, 0),
('Kleiner Rucksack', 5000, 1, 10, 4, 0, 1, 0, 0, 0, 0, 0, 0.00, 0, 0, 14, 0),
('Holz', 12000, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, 0),
('Altmetall', 11000, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, 0),
('Wasserbecher', 1, 1, 5, 3, 0, 100, 0, 0, 0, 0, 0, 0.00, 10, 0, 0, 0),
('Apfel', 2, 1, 5, 3, 0, 100, 0, 0, 0, 0, 0, 0.00, 10, 1, 0, 0),
('leerer Holzeimer', 15000, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, 0),
('gefüllter Wassereimer', 3, 0, 0, 3, 0, 1, 0, 0, 0, 0, 0, 0.00, 20, 0, 0, 0),
('Zombiefleisch', 20000, 0, 99999, 0, 0, 100, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, 0),
('Ring', 6011, 5, 12, 6, 0, 1, 0, 0, 5, 10, 0, 0.00, 0, 0, 0, 0),
('Amulet', 5011, 5, 12, 5, 0, 1, 0, 0, 5, 10, 0, 0.00, 0, 0, 0, 0),
('Lederstiefel', 10010, 1, 5, 10, 0, 1, 0, 0, 2, 1, 0, 0.00, 0, 0, 0, 0),
('Lederhandschuhe', 9010, 1, 5, 9, 0, 1, 0, 0, 2, 1, 0, 0.00, 0, 0, 0, 0),
('LederrÃ¼stung', 8010, 1, 5, 8, 0, 1, 0, 0, 10, 10, 0, 0.00, 0, 0, 0, 0),
('lederhut', 7010, 1, 5, 7, 0, 1, 0, 0, 2, 1, 0, 0.00, 0, 0, 0, 0),
('Ring', 6010, 1, 5, 6, 0, 1, 0, 0, 2, 5, 0, 0.00, 0, 0, 0, 0),
('Amulet', 5010, 1, 5, 5, 0, 1, 0, 0, 2, 5, 0, 0.00, 0, 0, 0, 0),
('Faustdolch', 1241, 5, 13, 1, 0, 1, 5, 10, 0, 0, 0, 5.50, 0, 0, 0, 0),
('Doppelaxt', 1361, 5, 12, 1, 0, 1, 8, 15, 0, 0, 0, 1.43, 0, 0, 0, 0),
('Rostiger Dolch', 1002, 10, 14, 1, 0, 1, 6, 9, 0, 0, 0, 3.58, 0, 0, 0, 0),
('Rucksack', 5001, 5, 10, 4, 0, 1, 0, 0, 0, 0, 0, 0.00, 0, 0, 28, 0),
('Sporttasche', 5002, 10, 15, 4, 0, 1, 0, 0, 0, 0, 0, 0.00, 0, 0, 42, 0),
('Kurzschwert', 1060, 1, 4, 1, 0, 1, 2, 4, 0, 0, 0, 1.50, 0, 0, 0, 0),
('Handaxt', 1240, 1, 4, 1, 0, 1, 1, 4, 0, 0, 0, 5.00, 0, 0, 0, 0),
('BaseballschlÃ¤ger', 1360, 1, 4, 1, 0, 1, 1, 3, 0, 0, 0, 3.00, 0, 0, 0, 0),
('AnderthalbhÃ¤nder', 1061, 5, 9, 1, 0, 1, 5, 8, 0, 0, 0, 4.50, 0, 0, 0, 0),
('Eisenstange', 1181, 5, 9, 1, 0, 1, 6, 9, 0, 0, 0, 2.34, 0, 0, 0, 0),
('BihÃ¤nder', 1120, 1, 7, 1, 0, 1, 3, 8, 0, 0, 0, 6.75, 0, 0, 0, 0),
('Kurzes Nunchaku', 1182, 10, 19, 1, 0, 1, 5, 19, 0, 0, 0, 5.75, 0, 0, 0, 0),
('KÃ¼chenmesser', 1001, 5, 11, 1, 0, 1, 4, 6, 0, 0, 0, 2.34, 0, 0, 0, 0),
('Eisenhut', 7011, 5, 13, 7, 0, 1, 0, 0, 5, 3, 0, 0.00, 0, 0, 0, 0),
('EisenrÃ¼stung', 8011, 5, 14, 8, 0, 1, 0, 0, 15, 9, 0, 0.00, 0, 0, 0, 0),
('Eisenhandschuhe', 9011, 5, 11, 9, 0, 1, 0, 0, 5, 3, 0, 0.00, 0, 0, 0, 0),
('Eisenstiefel', 10011, 5, 13, 10, 0, 1, 0, 0, 5, 2, 0, 0.00, 0, 0, 0, 0),
('Amulet', 5012, 10, 18, 5, 0, 1, 0, 0, 9, 15, 0, 0.00, 0, 0, 0, 0),
('Ring', 6012, 10, 16, 6, 0, 1, 0, 0, 9, 15, 0, 0.00, 0, 0, 0, 0),
('Kampfhelm', 7012, 10, 17, 7, 0, 1, 0, 0, 10, 8, 0, 0.00, 0, 0, 0, 0),
('Kampfweste', 8012, 10, 19, 8, 0, 1, 0, 0, 25, 15, 0, 0.00, 0, 0, 0, 0),
('Kampfhandschuhe', 9012, 10, 16, 9, 0, 1, 0, 0, 10, 5, 0, 0.00, 0, 0, 0, 0),
('Kampfstiefel', 10012, 10, 17, 9, 0, 1, 0, 0, 10, 6, 0, 0.00, 0, 0, 0, 0),
('BaseballschlÃ¤ger', 1180, 1, 4, 1, 0, 1, 1, 4, 0, 0, 0, 1.50, 0, 0, 0, 0),
('Kralle', 1242, 10, 16, 1, 0, 1, 12, 20, 0, 0, 0, 3.80, 0, 0, 0, 0),
('Handaxt', 1300, 1, 4, 1, 0, 1, 1, 4, 0, 0, 0, 5.00, 0, 0, 0, 0),
('Steinaxt', 1301, 5, 9, 1, 0, 1, 8, 10, 0, 0, 0, 2.36, 0, 0, 0, 0),
('StoÃŸaxt', 1302, 10, 11, 1, 0, 1, 14, 23, 0, 0, 0, 5.86, 0, 0, 0, 0),
('AnderthalbhÃ¤nder', 1062, 10, 19, 1, 0, 1, 9, 18, 0, 0, 0, 9.86, 0, 0, 0, 0),
('Schwerer Gladius', 1121, 5, 9, 1, 0, 1, 8, 14, 0, 0, 0, 3.80, 0, 0, 0, 0),
('Zweihandlangschwert', 1122, 10, 16, 1, 0, 1, 16, 23, 0, 0, 0, 3.95, 0, 0, 0, 0),
('GroÃŸaxt', 1362, 10, 18, 1, 0, 1, 15, 25, 0, 0, 0, 6.75, 0, 0, 0, 0),
('Guter Einsenhelm ', 7013, 15, 22, 7, 0, 1, 0, 0, 15, 9, 0, 0.00, 0, 0, 0, 0),
('Gute EisenrÃ¼stung', 8013, 20, 25, 8, 0, 1, 0, 0, 30, 20, 0, 0.00, 0, 0, 0, 0),
('Gute Eisenhandschuhe', 9013, 20, 21, 9, 0, 1, 0, 0, 12, 9, 0, 0.00, 0, 0, 0, 0),
('Gute Eisenstiefel', 10013, 20, 24, 9, 0, 1, 0, 0, 13, 8, 0, 0.00, 0, 0, 0, 0),
('WÃ¼sten Tarnhelm', 7014, 25, 32, 9, 0, 1, 0, 0, 20, 11, 0, 0.00, 0, 0, 0, 0),
('WÃ¼sten Kampfweste', 8014, 25, 35, 8, 0, 1, 0, 0, 35, 25, 0, 0.00, 0, 0, 0, 0),
('WÃ¼st. kampfhandschuh', 9014, 25, 33, 9, 0, 1, 0, 0, 15, 12, 0, 0.00, 0, 0, 0, 0),
('WÃ¼sten Kampfstiefel', 10014, 25, 34, 9, 0, 1, 0, 0, 15, 11, 0, 0.00, 0, 0, 0, 0),
('Amulet', 5013, 20, 25, 5, 0, 1, 0, 0, 12, 20, 0, 0.00, 0, 0, 0, 0),
('Amulet', 5014, 25, 35, 5, 0, 1, 0, 0, 15, 30, 0, 0.00, 0, 0, 0, 0),
('Ring', 6013, 20, 30, 6, 0, 1, 0, 0, 12, 20, 0, 0.00, 0, 0, 0, 0),
('Ring', 6014, 25, 35, 6, 0, 1, 0, 0, 15, 30, 0, 0.00, 0, 0, 0, 0),
('Armeerucksack', 5003, 15, 20, 4, 0, 1, 0, 0, 0, 0, 0, 0.00, 0, 0, 56, 0),
('Armeerucksack', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0, 0, 0, 0),
('Goldener Helm', 7015, 30, 37, 7, 0, 1, 0, 0, 25, 15, 0, 0.00, 0, 0, 0, 0),
('Goldene RÃ¼stung', 8015, 30, 40, 8, 0, 1, 0, 0, 40, 30, 0, 0.00, 0, 0, 0, 0),
('Goldene Handschuhe', 9015, 30, 36, 9, 0, 1, 0, 0, 18, 15, 0, 0.00, 0, 0, 0, 0),
('Goldene Stiefel', 10015, 30, 36, 9, 0, 1, 0, 0, 19, 15, 0, 0.00, 0, 0, 0, 0),
('Krumeltee', 4, 5, 10, 3, 0, 0, 0, 0, 0, 0, 0, 0.00, 20, 1, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_list`
--

CREATE TABLE IF NOT EXISTS `item_list` (
  `uniqID` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `item_lvl` int(11) NOT NULL,
  `quality` int(11) NOT NULL,
  `bonus` text NOT NULL,
  `setID` int(11) NOT NULL,
  `setBonus` text NOT NULL,
  PRIMARY KEY (`uniqID`),
  UNIQUE KEY `uniqID` (`uniqID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Daten für Tabelle `item_list`
--

INSERT INTO `item_list` (`uniqID`, `item`, `item_lvl`, `quality`, `bonus`, `setID`, `setBonus`) VALUES
(1, 0, 6, 5, 'a:5:{s:16:"defense_decrease";i:37;s:7:"schaden";i:10;s:6:"chemie";i:77;s:15:"damage_decrease";i:55;s:8:"laehmung";i:28;}', 0, ''),
(2, 0, 4, 3, 'a:1:{s:7:"schaden";i:12;}', 0, ''),
(3, 0, 5, 5, 'a:4:{s:21:"attack_speed_decrease";i:71;s:15:"damage_decrease";i:100;s:6:"saeure";i:17;s:7:"schaden";i:7;}', 0, ''),
(4, 0, 4, 4, 'a:5:{s:12:"attack_speed";i:50;s:16:"defense_decrease";i:37;s:7:"schaden";i:6;s:6:"saeure";i:15;s:21:"attack_speed_decrease";i:56;}', 0, ''),
(5, 0, 4, 5, 'a:3:{s:6:"chemie";i:79;s:21:"attack_speed_decrease";i:45;s:15:"damage_decrease";i:46;}', 0, ''),
(6, 0, 6, 5, 'a:2:{s:16:"defense_decrease";i:83;s:6:"chemie";i:89;}', 0, ''),
(7, 0, 1, 5, 'a:4:{s:8:"aggro_up";i:6;s:16:"defense_decrease";i:16;s:7:"schaden";i:2;s:6:"chemie";i:18;}', 0, ''),
(8, 0, 4, 3, 'a:1:{s:7:"schaden";i:8;}', 0, ''),
(9, 0, 3, 4, 'a:3:{s:8:"laehmung";i:15;s:16:"defense_decrease";i:47;s:12:"attack_speed";i:23;}', 0, ''),
(10, 0, 3, 4, 'a:3:{s:6:"saeure";i:14;s:15:"damage_decrease";i:53;s:7:"schaden";i:4;}', 0, ''),
(11, 0, 4, 5, 'a:3:{s:16:"defense_decrease";i:46;s:8:"laehmung";i:11;s:6:"saeure";i:12;}', 0, ''),
(12, 0, 2, 3, 'a:1:{s:7:"schaden";i:2;}', 0, ''),
(13, 0, 6, 5, 'a:3:{s:8:"laehmung";i:12;s:8:"aggro_up";i:38;s:15:"damage_decrease";i:45;}', 0, ''),
(14, 0, 2, 3, 'a:1:{s:7:"schaden";i:2;}', 0, ''),
(15, 0, 3, 3, 'a:1:{s:7:"schaden";i:4;}', 0, ''),
(16, 0, 4, 5, 'a:4:{s:6:"saeure";i:13;s:16:"defense_decrease";i:25;s:21:"attack_speed_decrease";i:30;s:12:"attack_speed";i:42;}', 0, ''),
(17, 0, 6, 5, 'a:1:{s:21:"attack_speed_decrease";i:59;}', 0, ''),
(18, 0, 4, 3, 'a:1:{s:7:"schaden";i:9;}', 0, ''),
(19, 0, 4, 3, 'a:1:{s:7:"schaden";i:7;}', 0, ''),
(20, 0, 5, 5, 'a:3:{s:6:"saeure";i:23;s:8:"laehmung";i:13;s:15:"damage_decrease";i:42;}', 0, ''),
(21, 0, 5, 4, 'a:6:{s:6:"saeure";i:20;s:21:"attack_speed_decrease";i:67;s:7:"schaden";i:10;s:12:"attack_speed";i:57;s:16:"defense_decrease";i:41;s:8:"laehmung";i:18;}', 0, ''),
(22, 0, 4, 5, 'a:1:{s:6:"saeure";i:14;}', 0, ''),
(23, 0, 2, 3, 'a:1:{s:7:"schaden";i:2;}', 0, ''),
(24, 0, 5, 5, 'a:3:{s:6:"chemie";i:94;s:12:"attack_speed";i:28;s:8:"laehmung";i:17;}', 0, ''),
(25, 0, 4, 3, 'a:1:{s:7:"schaden";i:10;}', 0, ''),
(26, 0, 4, 3, 'a:1:{s:7:"schaden";i:5;}', 0, ''),
(27, 0, 4, 3, 'a:1:{s:7:"schaden";i:9;}', 0, ''),
(28, 0, 3, 3, 'a:1:{s:7:"schaden";i:9;}', 0, ''),
(29, 0, 2, 3, 'a:1:{s:7:"schaden";i:3;}', 0, ''),
(30, 0, 3, 2, 'a:1:{s:7:"schaden";i:5;}', 0, ''),
(31, 0, 3, 3, 'a:1:{s:7:"schaden";i:3;}', 0, ''),
(32, 0, 5, 4, 'a:1:{s:7:"schaden";i:14;}', 0, ''),
(33, 0, 3, 4, 'a:2:{s:8:"laehmung";i:10;s:15:"damage_decrease";i:6;}', 0, ''),
(34, 0, 4, 3, 'a:1:{s:7:"schaden";i:8;}', 0, ''),
(35, 0, 5, 5, 'a:4:{s:8:"aggro_up";i:39;s:8:"laehmung";i:18;s:21:"attack_speed_decrease";i:17;s:7:"schaden";i:10;}', 0, ''),
(36, 0, 3, 3, 'a:1:{s:7:"schaden";i:7;}', 0, ''),
(37, 0, 4, 5, 'a:3:{s:8:"laehmung";i:13;s:7:"schaden";i:6;s:6:"chemie";i:75;}', 0, ''),
(38, 0, 4, 3, 'a:1:{s:7:"schaden";i:11;}', 0, ''),
(39, 0, 5, 5, 'a:4:{s:21:"attack_speed_decrease";i:31;s:7:"schaden";i:7;s:16:"defense_decrease";i:38;s:6:"chemie";i:52;}', 0, ''),
(40, 0, 4, 3, 'a:1:{s:7:"schaden";i:6;}', 0, ''),
(41, 0, 6, 5, 'a:3:{s:8:"laehmung";i:19;s:7:"schaden";i:17;s:6:"saeure";i:26;}', 0, ''),
(42, 0, 4, 3, 'a:1:{s:7:"schaden";i:5;}', 0, ''),
(43, 0, 4, 3, 'a:1:{s:7:"schaden";i:11;}', 0, ''),
(44, 0, 2, 3, 'a:1:{s:7:"schaden";i:4;}', 0, ''),
(45, 0, 4, 3, 'a:1:{s:7:"schaden";i:5;}', 0, ''),
(46, 0, 4, 5, 'a:3:{s:8:"aggro_up";i:28;s:21:"attack_speed_decrease";i:15;s:15:"damage_decrease";i:76;}', 0, ''),
(47, 0, 4, 4, 'a:3:{s:7:"schaden";i:11;s:16:"defense_decrease";i:32;s:15:"damage_decrease";i:61;}', 0, ''),
(48, 0, 6, 5, 'a:3:{s:7:"schaden";i:13;s:8:"laehmung";i:13;s:15:"damage_decrease";i:115;}', 0, ''),
(49, 0, 6, 5, 'a:3:{s:21:"attack_speed_decrease";i:27;s:7:"schaden";i:6;s:15:"damage_decrease";i:86;}', 0, ''),
(50, 0, 3, 2, 'a:1:{s:7:"schaden";i:6;}', 0, ''),
(51, 0, 2, 3, 'a:1:{s:7:"schaden";i:4;}', 0, ''),
(52, 0, 1, 5, 'a:3:{s:8:"aggro_up";i:5;s:12:"attack_speed";i:15;s:15:"damage_decrease";i:15;}', 0, ''),
(53, 0, 1, 5, 'a:5:{s:8:"aggro_up";i:6;s:12:"attack_speed";i:12;s:6:"chemie";i:20;s:16:"defense_decrease";i:5;s:8:"laehmung";i:5;}', 0, ''),
(54, 0, 1, 4, 'a:3:{s:8:"laehmung";i:2;s:12:"attack_speed";i:14;s:21:"attack_speed_decrease";i:15;}', 0, ''),
(55, 0, 3, 4, 'a:3:{s:7:"schaden";i:3;s:16:"defense_decrease";i:45;s:12:"attack_speed";i:29;}', 0, ''),
(56, 0, 5, 5, 'a:3:{s:6:"saeure";i:25;s:21:"attack_speed_decrease";i:56;s:7:"schaden";i:13;}', 0, ''),
(57, 0, 5, 5, 'a:6:{s:16:"defense_decrease";i:50;s:15:"damage_decrease";i:24;s:12:"attack_speed";i:51;s:8:"laehmung";i:25;s:6:"chemie";i:97;s:21:"attack_speed_decrease";i:44;}', 0, ''),
(58, 0, 4, 5, 'a:3:{s:8:"laehmung";i:16;s:21:"attack_speed_decrease";i:49;s:6:"chemie";i:60;}', 0, ''),
(59, 0, 6, 5, 'a:5:{s:6:"saeure";i:29;s:6:"chemie";i:117;s:15:"damage_decrease";i:51;s:21:"attack_speed_decrease";i:26;s:8:"aggro_up";i:38;}', 0, ''),
(60, 0, 5, 5, 'a:5:{s:16:"defense_decrease";i:28;s:12:"attack_speed";i:72;s:8:"laehmung";i:23;s:6:"saeure";i:22;s:8:"aggro_up";i:26;}', 0, ''),
(61, 0, 2, 3, 'a:1:{s:7:"schaden";i:4;}', 0, ''),
(62, 0, 5, 5, 'a:3:{s:21:"attack_speed_decrease";i:51;s:6:"chemie";i:51;s:8:"laehmung";i:11;}', 0, ''),
(63, 0, 3, 4, 'a:4:{s:6:"saeure";i:12;s:16:"defense_decrease";i:46;s:21:"attack_speed_decrease";i:38;s:12:"attack_speed";i:23;}', 0, ''),
(64, 0, 3, 3, 'a:1:{s:7:"schaden";i:8;}', 0, ''),
(65, 0, 5, 5, 'a:4:{s:6:"chemie";i:80;s:16:"defense_decrease";i:32;s:7:"schaden";i:12;s:15:"damage_decrease";i:52;}', 0, ''),
(66, 0, 5, 5, 'a:3:{s:16:"defense_decrease";i:96;s:6:"chemie";i:93;s:7:"schaden";i:11;}', 0, ''),
(67, 0, 2, 2, 'a:1:{s:7:"schaden";i:6;}', 0, ''),
(68, 0, 4, 5, 'a:4:{s:6:"chemie";i:70;s:7:"schaden";i:5;s:6:"saeure";i:16;s:15:"damage_decrease";i:23;}', 0, ''),
(69, 0, 4, 3, 'a:1:{s:7:"schaden";i:12;}', 0, ''),
(70, 0, 6, 5, 'a:4:{s:15:"damage_decrease";i:103;s:7:"schaden";i:13;s:6:"chemie";i:71;s:16:"defense_decrease";i:59;}', 0, ''),
(71, 0, 2, 2, 'a:1:{s:7:"schaden";i:4;}', 0, ''),
(72, 0, 5, 4, 'a:2:{s:12:"attack_speed";i:69;s:21:"attack_speed_decrease";i:27;}', 0, ''),
(73, 0, 3, 4, 'a:4:{s:12:"attack_speed";i:17;s:6:"saeure";i:12;s:8:"laehmung";i:7;s:7:"schaden";i:3;}', 0, ''),
(74, 0, 6, 5, 'a:1:{s:12:"attack_speed";i:64;}', 0, ''),
(75, 0, 1, 1, 'a:1:{s:7:"schaden";i:1;}', 0, ''),
(76, 0, 3, 4, 'a:4:{s:8:"laehmung";i:15;s:15:"damage_decrease";i:34;s:21:"attack_speed_decrease";i:9;s:6:"saeure";i:10;}', 0, ''),
(77, 0, 5, 4, 'a:3:{s:16:"defense_decrease";i:51;s:7:"schaden";i:14;s:6:"saeure";i:23;}', 0, ''),
(78, 0, 4, 5, 'a:3:{s:6:"chemie";i:41;s:16:"defense_decrease";i:46;s:8:"aggro_up";i:24;}', 0, ''),
(79, 0, 3, 3, 'a:1:{s:7:"schaden";i:4;}', 0, ''),
(80, 0, 6, 5, 'a:6:{s:21:"attack_speed_decrease";i:25;s:7:"schaden";i:8;s:16:"defense_decrease";i:118;s:15:"damage_decrease";i:75;s:6:"saeure";i:28;s:8:"aggro_up";i:36;}', 0, ''),
(81, 0, 4, 4, 'a:3:{s:21:"attack_speed_decrease";i:13;s:15:"damage_decrease";i:34;s:12:"attack_speed";i:20;}', 0, ''),
(82, 0, 4, 4, 'a:3:{s:16:"defense_decrease";i:22;s:21:"attack_speed_decrease";i:31;s:8:"laehmung";i:19;}', 0, ''),
(83, 0, 6, 5, 'a:3:{s:15:"damage_decrease";i:50;s:7:"schaden";i:17;s:8:"aggro_up";i:45;}', 0, ''),
(84, 0, 4, 4, 'a:3:{s:8:"laehmung";i:10;s:21:"attack_speed_decrease";i:30;s:12:"attack_speed";i:38;}', 0, ''),
(85, 0, 2, 3, 'a:1:{s:7:"schaden";i:6;}', 0, ''),
(86, 0, 4, 3, 'a:1:{s:7:"schaden";i:11;}', 0, ''),
(87, 0, 5, 5, 'a:4:{s:15:"damage_decrease";i:26;s:7:"schaden";i:10;s:21:"attack_speed_decrease";i:40;s:16:"defense_decrease";i:69;}', 0, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_quality`
--

CREATE TABLE IF NOT EXISTS `item_quality` (
  `quality` int(11) NOT NULL,
  `beschreibung` text NOT NULL,
  `chance` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `item_quality`
--

INSERT INTO `item_quality` (`quality`, `beschreibung`, `chance`) VALUES
(1, 'schlecht', 100),
(2, 'normal', 95),
(3, 'gut', 90),
(4, 'magisch', 50),
(6, 'set', 16),
(7, 'legendär', 8),
(5, 'rare', 32);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_sets`
--

CREATE TABLE IF NOT EXISTS `item_sets` (
  `setID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `setBonus` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_stats`
--

CREATE TABLE IF NOT EXISTS `item_stats` (
  `stat` text NOT NULL,
  `min_quality` int(11) NOT NULL,
  `art` int(11) NOT NULL,
  `minwert` int(11) NOT NULL,
  `maxwert` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `item_stats`
--

INSERT INTO `item_stats` (`stat`, `min_quality`, `art`, `minwert`, `maxwert`) VALUES
('schaden', 0, 1, 1, 3),
('aggro_up', 5, 1, 4, 8),
('attack_speed', 4, 1, 5, 15),
('damage_decrease', 4, 1, 2, 20),
('defense_decrease', 4, 1, 5, 20),
('attack_speed_decrease', 4, 1, 3, 15),
('laehmung', 4, 1, 2, 5),
('saeure', 4, 1, 3, 5),
('chemie', 5, 1, 10, 20);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ks_main`
--

CREATE TABLE IF NOT EXISTS `ks_main` (
  `kampf_id` int(11) NOT NULL AUTO_INCREMENT,
  `kampf_next` int(20) NOT NULL,
  `kampf_ende` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kampf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `ks_main`
--

INSERT INTO `ks_main` (`kampf_id`, `kampf_next`, `kampf_ende`) VALUES
(1, 1381678680, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ks_member`
--

CREATE TABLE IF NOT EXISTS `ks_member` (
  `km_kampf_id` int(11) NOT NULL,
  `km_member_id` int(11) NOT NULL,
  `km_member_art` varchar(1) NOT NULL,
  `km_member_side` int(1) NOT NULL,
  `km_leben` int(11) NOT NULL,
  `km_maxleben` int(11) NOT NULL,
  `km_speed` int(11) NOT NULL,
  `km_pos_x` int(11) NOT NULL DEFAULT '0',
  `km_pos_y` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `ks_member`
--

INSERT INTO `ks_member` (`km_kampf_id`, `km_member_id`, `km_member_art`, `km_member_side`, `km_leben`, `km_maxleben`, `km_speed`, `km_pos_x`, `km_pos_y`) VALUES
(1, 1, 'P', 1, 100, 100, 0, 1000, 200),
(1, 2, 'P', 1, 100, 100, 15, 1050, 220),
(1, 3, 'P', 0, 100, 100, 5, 1010, 250),
(1, 1, 'M', 0, 100, 100, 10, 100, 200);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `rechte` int(11) NOT NULL,
  `loginName` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `passwort` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `registerDate` int(20) NOT NULL,
  `lastLogin` int(20) NOT NULL DEFAULT '0',
  `lastAktion` int(20) NOT NULL DEFAULT '0',
  `onlineTimer` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=27 ;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`userID`, `rechte`, `loginName`, `passwort`, `email`, `registerDate`, `lastLogin`, `lastAktion`, `onlineTimer`) VALUES
(1, 4, 'ZoDIstani', '3d710bbf04129ee7e4576f61abda206b', 'SUK_Master1988@hotmail.com', 1358373281, 1381671765, 1381671765, 28054),
(2, 4, 'ZoDIkarus', '6daeca4903af2175474638ebc0912961', 'RebornIkarus@gmail.com', 1358374733, 1377360744, 1377360744, 52826),
(3, 0, 'ZoDHaggis', '4771271c67fe620408045997bbd5172e', 'Just.for.play@gmx.de', 1358440833, 1359317048, 1359317048, 49),
(5, 0, 'Tunichtgut', '1ff1bd1fd0a377b0f619a83d5e21d98a', 'fabiosus@freenet.de', 1358688982, 1358696279, 0, 0),
(6, 0, 'ZoDChrizzy', 'df6acef4f83a295af5775ef043015ac3', 'zodbimbambule@gmail.com', 1358701312, 1368364032, 1368364032, 450),
(7, 0, 'ZoDNanotek', 'b2bba9cf8a67bce4018e7c14f7fa4c47', 'nanotek91@yahoo.de', 1358802980, 1359691793, 1359691793, 1651),
(8, 0, 'sowilo', 'e704ef8553aa53028de9b91dd8d961aa', 'dieandsmile@hotmail.de', 1358925410, 1362565079, 1362565079, 530),
(11, 0, 'DerTrisan', 'ce53036955cb192175fed0938a8eba15', 'tristanwarkentin@web.de', 1359132369, 0, 0, 0),
(10, 0, 'gantekiel69', '81dc9bdb52d04dc20036dbd8313ed055', 'ipad@struckmann.biz', 1358976677, 1367593202, 1367593202, 118),
(24, 0, 'BruceLee', 'e10adc3949ba59abbe56e057f20f883e', 'Bruce@bruce.de', 1375490561, 1375490774, 1375490774, 203),
(13, 0, 'alex4it', '68b62823ed173ad3bed0ce700d556b2a', 'alex_adler11@yahoo.de', 1368016765, 1370804703, 1370804703, 8404),
(14, 0, 'Schredderx', '10b43971a8295f3720f38fbcdd9d6ac6', 'schredderx@web.de', 1368155108, 1371198113, 1371198113, 3108),
(15, 0, 'Oneio', 'abc5d15a66ff196a075f648b211e1b51', 'Frederikschirrmeister@web.de', 1368155141, 1374587878, 1374587878, 903),
(16, 4, 'ZoDHaggis', 'c9f5b4780441827cff1be75e4de41889', 'Just.for.play@gmx.de', 1368336127, 1370360036, 1370360036, 11373),
(17, 0, 'ZoDChrizzy', 'df6acef4f83a295af5775ef043015ac3', 'ch.nadolsky@web.de', 1368350935, 1368364032, 0, 0),
(18, 0, 'ZoD_beatzz', '15a957eec81cff8df3172257b813e2d3', 'schlaudraff1@gmx.net', 1368443912, 1368444297, 1368444297, 370),
(19, 0, 'asdasd', '7815696ecbf1c96e6894b779456d330e', 'asdasd', 1368492077, 1368492147, 1368492147, 62),
(20, 0, 'failverine', 'fb3ff3f5edaef65d6dcea2d1aeb48979', 'piatr@gmx.de', 1368501221, 1368501352, 1368501352, 105),
(23, 4, 'ZoDTarlorr', '69c69f9eddbcdea9a60d9c11be74557c', 'jojo.schaefer@hotmail.de', 1370110039, 1372669553, 1372669553, 16041),
(22, 0, 'Himbeerchan', '925b1323babb9a8afd52be4e6f18f5b1', 'franziskaha@hotmail.de', 1369559922, 1369560451, 1369560451, 137),
(25, 0, 'Nookie', '7f1212e1b921e9a2736ff49f20a416f9', 'marcel-bunke@web.de', 1375828078, 1375906671, 1375906671, 1395),
(26, 0, 'DenniethePug', '73d4c9671c93bc84dad1f90ba1924bbd', 'Sean-Dennie.Amore@web.de', 1375828079, 1376436643, 1376436643, 24741);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `map_gebiete`
--

CREATE TABLE IF NOT EXISTS `map_gebiete` (
  `gebiet_id` int(11) NOT NULL AUTO_INCREMENT,
  `map_id` int(11) NOT NULL,
  `x_cord` int(11) NOT NULL,
  `y_cord` int(11) NOT NULL,
  `text_bez` varchar(255) NOT NULL,
  `text_id` int(11) NOT NULL,
  `need_quest` int(11) NOT NULL,
  `link_bez` varchar(255) NOT NULL,
  PRIMARY KEY (`gebiet_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `map_gebiete`
--

INSERT INTO `map_gebiete` (`gebiet_id`, `map_id`, `x_cord`, `y_cord`, `text_bez`, `text_id`, `need_quest`, `link_bez`) VALUES
(1, 1, 2, 1, 'gebiet', 1, 3, 'map=wald'),
(2, 1, 3, 1, 'ort', 1, 4, 'map=see'),
(3, 1, 5, 2, 'ort', 0, 3, 'map=werkstatt'),
(4, 1, 1, 3, 'ort', 2, 1, 'map=wohngebiet'),
(5, 1, 2, 3, 'ort', 4, 0, 'map=huette'),
(6, 1, 5, 3, 'ort', 3, 2, 'map=gabfall'),
(7, 1, 4, 4, 'gebiet', 2, 3, 'map=schrottplatz');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mob_db`
--

CREATE TABLE IF NOT EXISTS `mob_db` (
  `mob_id` int(11) NOT NULL AUTO_INCREMENT,
  `mob_art` int(11) NOT NULL DEFAULT '0',
  `mob_name` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `min_schaden` int(11) NOT NULL,
  `max_schaden` int(11) NOT NULL,
  `mob_leben` int(11) NOT NULL,
  `mob_level` int(11) NOT NULL,
  `mob_exp` int(11) NOT NULL,
  `mob_drop` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`mob_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=29 ;

--
-- Daten für Tabelle `mob_db`
--

INSERT INTO `mob_db` (`mob_id`, `mob_art`, `mob_name`, `min_schaden`, `max_schaden`, `mob_leben`, `mob_level`, `mob_exp`, `mob_drop`) VALUES
(1, 0, '', 1, 1, 25, 0, 5, ''),
(2, 0, '', 1, 2, 48, 1, 10, ''),
(3, 0, '', 1, 4, 60, 2, 20, ''),
(5, 0, 'Wasserleiche', 1, 2, 500, 6, 30, ''),
(4, 0, '', 1, 1, 2, 0, 1, ''),
(6, 0, '', 10, 100, 200, 30, 350, ''),
(7, 0, '', 3, 7, 75, 7, 35, ''),
(8, 0, '', 2, 14, 35, 5, 25, ''),
(9, 0, '', 1, 4, 16, 2, 15, ''),
(10, 0, '', 1, 15, 50, 6, 35, ''),
(11, 0, '', 3, 5, 12, 2, 15, ''),
(16, 0, '', 2, 7, 35, 5, 30, ''),
(15, 0, '', 2, 5, 25, 4, 25, ''),
(14, 0, '', 1, 3, 15, 3, 20, ''),
(17, 0, '', 5, 6, 86, 8, 40, ''),
(18, 0, '', 5, 9, 95, 9, 50, ''),
(19, 0, '', 7, 15, 100, 10, 100, ''),
(20, 0, '', 11, 15, 110, 11, 110, ''),
(21, 0, '', 12, 22, 120, 12, 120, ''),
(22, 0, '', 13, 20, 130, 13, 130, ''),
(23, 0, '', 14, 24, 140, 14, 140, ''),
(24, 0, '', 15, 25, 150, 15, 150, ''),
(25, 0, '', 16, 26, 160, 16, 160, ''),
(26, 0, '', 17, 27, 170, 17, 170, ''),
(27, 0, '', 18, 28, 180, 18, 180, ''),
(28, 0, '', 19, 29, 190, 19, 190, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_ausgang`
--

CREATE TABLE IF NOT EXISTS `nachricht_ausgang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `empfaenger` int(11) NOT NULL,
  `zeit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `betreff` text COLLATE latin1_german2_ci NOT NULL,
  `nachricht` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=31 ;

--
-- Daten für Tabelle `nachricht_ausgang`
--

INSERT INTO `nachricht_ausgang` (`id`, `sender`, `empfaenger`, `zeit`, `status`, `betreff`, `nachricht`) VALUES
(10, 2, 2, 1367678985, 0, 'Gilden Beitritt', 'ZoDIkarus m&ouml;chte der Gilde beitreten. <br />'),
(11, 2, 2, 1367678996, 0, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(12, 13, 2, 1368182221, 0, 'Gilden Beitritt', 'alex4it m&ouml;chte der Gilde beitreten. <br />'),
(13, 13, 2, 1368263827, 0, 'Gilden Beitritt', 'alex4it m&ouml;chte der Gilde beitreten. <br />'),
(14, 2, 13, 1368293519, 0, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(15, 2, 13, 1368322677, 0, 'bist net mehr #1', 'xD pwned!^^\r\n\r\nMachen morgen weiter!\r\nWenn du weiter Ideen hast sag an!^^'),
(16, 6, 2, 1368351186, 0, 'Gilden Beitritt', 'ZoDChrizzy m&ouml;chte der Gilde beitreten. <br />'),
(17, 2, 6, 1368364594, 0, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(18, 21, 2, 1368951951, 0, 'Gilden Beitritt', 'Tarlorr1 m&ouml;chte der Gilde beitreten. <br />'),
(29, 25, 26, 1375831335, 0, 'Gilden Beitritt', 'Nookie m&ouml;chte der Gilde beitreten. <br />'),
(30, 26, 25, 1375831381, 0, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(22, 2, 23, 1370110445, 0, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(24, 2, 23, 1370289524, 0, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(25, 2, 2, 1370289545, 0, 'Gilden Beitritt', 'ZoDIkarus m&ouml;chte der Gilde beitreten. <br />'),
(26, 2, 2, 1370289568, 0, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_eingang`
--

CREATE TABLE IF NOT EXISTS `nachricht_eingang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `empfaenger` int(11) NOT NULL,
  `zeit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `betreff` text COLLATE latin1_german2_ci NOT NULL,
  `nachricht` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=31 ;

--
-- Daten für Tabelle `nachricht_eingang`
--

INSERT INTO `nachricht_eingang` (`id`, `sender`, `empfaenger`, `zeit`, `status`, `betreff`, `nachricht`) VALUES
(10, 2, 2, 1367678985, 1, 'Gilden Beitritt', 'ZoDIkarus m&ouml;chte der Gilde beitreten. <br /><a href="site/join.php?erlauben=ja&gildenid=1&id=2&leader=2&name=ZoDIkarus">Zur Gilde hinzuf&uuml;gen</a> &nbsp; <a href="site/join.php?erlauben=nein&gildenid=1&id=2&leader=2&name=ZoDIkarus">Nicht hinzuf&uuml;gen</a>'),
(11, 2, 2, 1367678996, 1, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(12, 13, 2, 1368182221, 1, 'Gilden Beitritt', 'alex4it m&ouml;chte der Gilde beitreten. <br /><a href="site/join.php?erlauben=ja&gildenid=1&id=13&leader=2&name=alex4it">Zur Gilde hinzuf&uuml;gen</a> &nbsp; <a href="site/join.php?erlauben=nein&gildenid=1&id=13&leader=2&name=alex4it">Nicht hinzuf&uuml;gen</a>'),
(13, 13, 2, 1368263827, 1, 'Gilden Beitritt', 'alex4it m&ouml;chte der Gilde beitreten. <br /><a href="site/join.php?erlauben=ja&gildenid=1&id=13&leader=2&name=alex4it">Zur Gilde hinzuf&uuml;gen</a> &nbsp; <a href="site/join.php?erlauben=nein&gildenid=1&id=13&leader=2&name=alex4it">Nicht hinzuf&uuml;gen</a>'),
(14, 2, 13, 1368293519, 1, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(15, 2, 13, 1368322677, 1, 'bist net mehr #1', 'xD pwned!^^\r\n\r\nMachen morgen weiter!\r\nWenn du weiter Ideen hast sag an!^^'),
(16, 6, 2, 1368351186, 1, 'Gilden Beitritt', 'ZoDChrizzy m&ouml;chte der Gilde beitreten. <br /><a href="site/join.php?erlauben=ja&gildenid=1&id=6&leader=2&name=ZoDChrizzy">Zur Gilde hinzuf&uuml;gen</a> &nbsp; <a href="site/join.php?erlauben=nein&gildenid=1&id=6&leader=2&name=ZoDChrizzy">Nicht hinzuf&uuml;gen</a>'),
(17, 2, 6, 1368364594, 0, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(23, 23, 4, 1370210096, 0, 'grafik', 'hey digga .. schreib mir mal bitte wann du mal bissel zeit hast damit wir uns das bissel einteilen konnen und besser planen ... weil da sind paar sachen schief gelaufen was die item_id an geht bei den waffen \r\n\r\nansonsten sag mir ne zeit .. wann ich in ts kommen soll .. gruÃŸ jojo'),
(19, 2, 21, 1369089185, 1, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(20, 23, 2, 1370110396, 1, 'Gilden Beitritt', 'ZoDTarlorr m&ouml;chte der Gilde beitreten. <br /><a href="site/join.php?erlauben=ja&gildenid=1&id=23&leader=2&name=ZoDTarlorr">Zur Gilde hinzuf&uuml;gen</a> &nbsp; <a href="site/join.php?erlauben=nein&gildenid=1&id=23&leader=2&name=ZoDTarlorr">Nicht hinzuf&uuml;gen</a>'),
(21, 23, 2, 1370110418, 1, 'Gilden Beitritt', 'ZoDTarlorr m&ouml;chte der Gilde beitreten. <br /><a href="site/join.php?erlauben=ja&gildenid=1&id=23&leader=2&name=ZoDTarlorr">Zur Gilde hinzuf&uuml;gen</a> &nbsp; <a href="site/join.php?erlauben=nein&gildenid=1&id=23&leader=2&name=ZoDTarlorr">Nicht hinzuf&uuml;gen</a>'),
(25, 2, 2, 1370289545, 1, 'Gilden Beitritt', 'ZoDIkarus m&ouml;chte der Gilde beitreten. <br /><a href="site/join.php?erlauben=ja&gildenid=1&id=2&leader=2&name=ZoDIkarus">Zur Gilde hinzuf&uuml;gen</a> &nbsp; <a href="site/join.php?erlauben=nein&gildenid=1&id=2&leader=2&name=ZoDIkarus">Nicht hinzuf&uuml;gen</a>'),
(26, 2, 2, 1370289568, 1, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!'),
(29, 25, 26, 1375831335, 1, 'Gilden Beitritt', 'Nookie m&ouml;chte der Gilde beitreten. <br /><a href="site/join.php?erlauben=ja&gildenid=3&id=25&leader=26&name=Nookie">Zur Gilde hinzuf&uuml;gen</a> &nbsp; <a href="site/join.php?erlauben=nein&gildenid=3&id=25&leader=26&name=Nookie">Nicht hinzuf&uuml;gen</a>'),
(30, 26, 25, 1375831381, 1, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `quest_db`
--

CREATE TABLE IF NOT EXISTS `quest_db` (
  `quest_id` int(11) NOT NULL,
  `quest_belohnung` text NOT NULL,
  `quest_vorraussetzung` text NOT NULL,
  `quest_isStory` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `quest_db`
--

INSERT INTO `quest_db` (`quest_id`, `quest_belohnung`, `quest_vorraussetzung`, `quest_isStory`) VALUES
(1, 'a:3:{s:5:"quest";i:2;s:3:"exp";i:10;s:11:"goldklumpen";i:5;}', '', 1),
(2, 'a:5:{s:5:"quest";i:3;s:3:"exp";i:10;s:11:"goldklumpen";i:5;s:8:"get_item";b:1;s:4:"item";a:1:{i:1;a:4:{s:2:"id";i:1000;s:5:"menge";i:1;s:7:"quality";i:0;s:5:"level";i:1;}}}', '', 1),
(3, 'a:2:{s:5:"quest";i:4;s:3:"exp";i:10;}', '', 1),
(4, 'a:2:{s:5:"quest";i:5;s:3:"exp";i:10;}', '', 1),
(5, 'a:2:{s:5:"quest";i:6;s:3:"exp";i:10;}', '', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `skill_db`
--

CREATE TABLE IF NOT EXISTS `skill_db` (
  `skill_ID` int(11) NOT NULL AUTO_INCREMENT,
  `reihenfolge` int(11) NOT NULL DEFAULT '999',
  `maxlvl` int(11) NOT NULL DEFAULT '10',
  `im_kampf` int(11) NOT NULL DEFAULT '0',
  `erlernbar` int(11) NOT NULL DEFAULT '1',
  `bonus` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`skill_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `skill_db`
--

INSERT INTO `skill_db` (`skill_ID`, `reihenfolge`, `maxlvl`, `im_kampf`, `erlernbar`, `bonus`) VALUES
(1, 1, 10, 0, 1, '//Craftskill'),
(2, 999, 1, 0, 0, 'a:1:{s:6:"wasser";s:3:"25%";}'),
(3, 999, 1, 0, 0, 'a:1:{s:7:"nahrung";s:3:"25%";}'),
(4, 999, 1, 0, 0, 'a:1:{s:6:"schaden";s:3:"25%";}'),
(5, 0, 1, 1, 0, '// Angriff Skill');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `texte`
--

CREATE TABLE IF NOT EXISTS `texte` (
  `kurz` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `id` int(10) NOT NULL DEFAULT '0',
  `deutsch` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`kurz`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `texte`
--

INSERT INTO `texte` (`kurz`, `id`, `deutsch`) VALUES
('abbauen', 0, 'Folgende Materialen können hier abgebaut werden:'),
('abbauen', 1, 'Abbau starten'),
('abbauen', 2, 'Abbauort:'),
('abbauen', 3, 'abgebaut!'),
('char_headline', 1, 'Such dir eine verf&uuml;gbare Klasse aus:'),
('char_klasse', 0, 'Klasse:'),
('char_klasse', 1, 'Arbeiter'),
('char_klasse', 2, 'Boxer'),
('char_klasse', 3, 'Soldat'),
('char_status', 0, 'Wasser'),
('char_status', 1, 'Nahrung'),
('char_status', 2, 'Goldklumpen'),
('char_status', 3, 'Neue&nbsp;Nachrichten'),
('char_status', 4, 'Sklaven'),
('dauer', 0, 'Dauer'),
('einfuehrung', 0, 'Planet: Unbekannt\r\nKontinent: Unbekannt\r\nGenaueres Gebiet: Unbekannt\r\nOrganismus: Unbekannt\r\nDatum: Unbekannt\r\nEreignis: Vorfall Z23O432D\r\nDatum des Ereignisses: Unbekannt\r\nAuslöser: Virus UDT-1891\r\nVeränderung am Organismus nach Befall mit UDT-1891: Unbekannt\r\nAnzahl der Befallenen: Unbekannt\r\nChance zu Überleben: Unbekannt\r\nAnzahl der Rettungskolonien: Unbekannt\r\n\r\nZiel: Überleben\r\n\r\nUnsere Welt, wie wir sie kannten, gibt es nicht mehr. Unsere Waffen gegen das,  was da draußen auf uns wartet, sind verbraucht. Du bist einer der letzten Überlebenden und musst mit eigener Kraft überleben. Sammle Material für Ausrüstung und finde heraus, was genau hier passiert ist.'),
('gebiet', 1, 'Wald'),
('gebiet', 2, 'Schrottplatz'),
('gebiet_text', 1, 'Wald ist ein vernetztes Sozialgebilde und Wirkungsgefüge seiner sich gegenseitig beeinflussenden und oft voneinander abhängigen biologischen, physikalischen und chemischen Bestandteile, das praktisch von der obersten Krone bis hinunter zu den äußersten Wurzelspitzen reicht. Kennzeichnend ist die konkurrenzbedingte Vorherrschaft der Bäume. Dadurch entsteht auch ein Waldbinnenklima, das sich wesentlich von dem des Freilandes unterschiedet. Dieses kann sich nur bei einer Mindesthöhe, Mindestfläche und Mindestdichte der Bäume entwickeln.'),
('gebiet_text', 2, 'Auf dem Schrottplatz kann man alte Metallreste finden.'),
('item', 2, 'Apfel'),
('item', 3, 'gefüllter Wassereimer'),
('item_art', 0, 'Material'),
('item_art', 1, 'Ausrüstung-Nahkampfwaffe'),
('item_art', 4, 'Ausrüstung-Rucksack'),
('item', 1, 'Wasserbecher'),
('item_text', 1, 'Ein Bescher voller Wasser. Damit kann man gut seinen Durst stillen.'),
('item_text', 2, 'Ein Apfel. Wächst auf Bäumen. Kann man essen wenn man Hunger hat.'),
('item_text', 3, 'Hey ein Eimer voller Wasser... Nicht sehr handlich, aber immerhin kann man so Wasser transportieren.'),
('ladder', 1, 'Rangliste'),
('ladder', 2, 'Platz:'),
('ladder', 3, 'Username:'),
('ladder', 4, 'Klasse:'),
('ladder', 5, 'Stufe:'),
('ladder', 6, 'Erfahrung:'),
('login', 0, '- Login -'),
('login', 1, 'Hier kannst du dich einloggen!'),
('login', 2, 'Noch kein Account?'),
('login', 3, 'Hier registrieren'),
('map', 0, 'Weltkarte betreten'),
('map', 1, 'Trainingslager'),
('map', 2, 'Weltkarte'),
('navigation', 0, '- NAVIGATION -'),
('navigation', 1, 'Karte'),
('navigation', 2, 'Account'),
('navigation', 3, 'Nachrichten'),
('navigation', 4, 'Logout'),
('navigation', 5, 'Questlog'),
('navigation', 6, 'Leiter'),
('passwort', 0, 'passwort'),
('platz', 0, 'Lagerplatz'),
('schaden', 0, 'Angriffswert'),
('stack', 0, 'Stapelgröße'),
('unterwegs', 0, '- Unterwegs -'),
('unterwegs', 1, 'Du bist momentan unterwegs...'),
('username', 0, 'username'),
('willkommen', 0, 'Willkommen&nbsp;'),
('item_art', 3, 'Benutzbar'),
('quest_text_beendung', 2, 'Es ist still. Zu still....\r\n\r\nEin Stück von dir entfernt siehst du einen Menschen, du gehst auf ihn zu. Doch irgendwie sieht dieser Mensch merkwürdig aus.\r\n\r\nEin Stück weiter hinten siehst du noch jemanden gehockt, aber was macht er da? Er knabbert an eine LEICHE?!?! Plötzlich dreht er sich um und kommt auf die zugerannt...\r\n\r\nDu läufst weg und kannst nach einiger Zeit in einer kleinen Hütte entkommen. Du findest ein Messer...'),
('trefferchance', 0, 'trefferchance'),
('kritchance', 0, 'kritchance'),
('item', 1241, 'Faustdolch'),
('navigation', 7, 'Gilde'),
('item_cat', 0, 'item_cat'),
('ort', 0, 'Werkstatt'),
('ort', 1, 'See'),
('herstellen', 0, 'herstellen'),
('hergestellt', 0, 'hergestellt'),
('quest_text', 2, 'Du erinnerst dich was du gemacht hast, aber wo bist du?\r\n\r\nDu siehst in einiger Entfernung ein paar Häuser. Vielleicht findest du dort jemanden der dir helfen kann.'),
('quest', 2, 'Wo bin ich?'),
('kein_wasser', 0, 'kein_wasser'),
('ort_text', 1, 'Ein See ist ein Stillgewässer mit oder ohne Zu- und Abfluss durch Fließgewässer, das vollständig von einer Landfläche umgeben ist. Er stellt ein weitgehend geschlossenes Ökosystem dar'),
('nicht hergestellt', 0, 'nicht hergestellt'),
('ort', 2, 'Wohngebiet'),
('navigation', 8, 'Questlog'),
('ort_text', 2, 'Ein Wohngebiet ist ein Baugebiet, das dem Wohnen dient.'),
('fight', 0, 'Angreifen'),
('mob_low', 0, 'schwache Zombies (Level - 1)'),
('mob_mid', 0, 'Zombies (Level)'),
('mob_high', 0, 'starke Zombies (Level + 1)'),
('kampf', 0, 'Kampf!'),
('kampf_text', 0, 'Ein anstrengender Kampf ums überleben!'),
('navigation', 9, 'Charkater'),
('skill', 1, 'Handwerksskill'),
('erlernbar', 0, 'erlernbar'),
('skill_beschreibung', 1, 'Diese Fähigkeit gibt an wie gut du im herstellen von Objekten bist, um so höher der Skill um so bessere Objekte können hergestellt werden.'),
('ort', 3, 'Müllhalde'),
('muell', 0, 'Müllhalde'),
('muell_text', 0, 'Dies ist eine Müllhalde, mit glück kann man hier wahre Schätze entdecken...\r\n\r\nOder halt sein altes Zeug wegschmeißen...\r\n\r\n'),
('muell_sammeln_not', 0, 'Leider gibt es hier keinen Müll.'),
('wegwerfen', 0, 'wegwerfen'),
('muell_sammeln', 1, 'Müll durchsuchen'),
('sammel_mã¼ll', 0, 'Müllhalde'),
('sammel_mã¼ll_text', 0, 'Müll wird durchsucht'),
('muell_sammeln', 0, 'Müll wurde durchsucht'),
('muell_ok', 0, 'Müllsammeln erfolgreich!'),
('item_erhalten', 0, 'Du hast folgende Items gesammelt:'),
('quest', 1, 'Wer bin ich?'),
('quest_text', 1, 'Du wachst in einer kleinen Hütte auf. Du bist allein. Das einzigste was du finden kannst, ist ein kleiner Rücksack und ein paar Goldklumpen.\r\n\r\nAber was ist passiert? Wo bist du? Und vor allem WER bist du?\r\n\r\nDu versuchst dich zu erinnern was du früher einmal gemacht hast.'),
('char_klasse_text', 1, 'Du warst ein einfacher Arbeiter. Nicht besonders Kampf erprobt, aber immerhin konntest du doch einige Sachen erledigen die du brauchtest.'),
('char_klasse_text', 2, 'Du warst ein Boxer. Nicht gut im Umgang mit Waffen, aber immerhin konntest du einige Schläge aushalten.'),
('char_klasse_text', 3, 'Du warst ein Soldat. Immer schwer bepackt, deswegen nicht besonders beweglich, aber mit Waffen umgehen, das ist dir ein leichtes.'),
('skill', 2, 'Klassenskill: Arbeiter'),
('erlernbar', 1, 'Nicht&nbsp;erlernbar'),
('skill_beschreibung', 2, 'Schufften, Schufften Schufften. \r\nDer Klassenskill des Arbeiters gibt dir einen 25% Bonus auf deine Maximale Wasserreserve.'),
('refill_art', 0, 'refill_art'),
('abbauen_zombie', 0, 'abbauen_zombie'),
('ort_text', 0, 'ort_text'),
('item_text', 0, 'item_text'),
('item', 0, 'item'),
('skill', 3, 'skill'),
('skill_beschreibung', 3, 'skill_beschreibung'),
('skill', 4, 'skill'),
('skill_beschreibung', 4, 'skill_beschreibung'),
('item', 1000, 'Taschen-Messer'),
('item_text', 1000, 'Die ist ein Taschenmesser. Taschenmesser können im Nahkampf verwendet werden.'),
('item', 5000, 'Kleiner Rucksack'),
('item_text', 5000, 'Schnall dir den Rucksack auf den Rücken und transportiere Gegenstände.'),
('item', 10000, 'Holzbretter'),
('item_text', 10000, 'Das ist Holz. Holz ist ein toller Rohstoff. Er wird für viele Sachen benötigt. Wie zum Beispiel... Öhm... Baseball-Schläger...'),
('item', 11000, 'Altmetall'),
('item_text', 11000, 'Alte Metallreste, daraus kann man bestimmt etwas basteln.'),
('item', 15000, 'leerer Holzeimer'),
('item_text', 15000, 'Ein Leere Holzeimer... Man könnte ihn mit Wasser füllen, wenn den irgendwo etwas wie ein See wäre...'),
('item', 20000, 'Zombiehaut'),
('item_text', 20000, 'item_text'),
('not_abbauen', 0, 'not_abbauen'),
('quest', 3, 'Ist hier irgendetwas nützliches?'),
('quest_text', 3, 'Du schaust aus dem Fenster, alles ist ruhig... In einiger Entfernung siehst du eine Müllhalde, vielleicht findest du dort mehr nützliche Sachen... oder du stellst dich mit dem was du hast gegen diese Viecher...'),
('quest_text_beendung', 3, 'Leider ist heute nichts auf der Müllhalde zu finden... Aber du solltest wieder herkommen, vielleicht findet man hier ja noch tolle Schätze...\r\n'),
('quest', 4, 'Ausrüstung selber herstellen!'),
('quest_text', 4, 'Ganz in der Nähe befindet sich eine Werkstatt, aber um dort etwas herzustellen solltest du entweder am Schrottplatz nach Altmetal suchen oder vielleicht hinten im Wald nach Holz... Im Wald findest du mit etwas Glück auch Äpfel. dann hättest du schon einmal Nahrung'),
('quest_text_beendung', 4, 'Rohstoffe sind immer wichtig. Sammel einige und überleg was du damit machen kannst...'),
('quest', 5, 'Material Sinvoll nutzen!'),
('quest_text', 5, 'Wenn du genug Rohstoffe gesammelt hast solltest du dir in der Werkstatt einen Eimer herstellen und diesen dann am See mit Wasser füllen... \r\n\r\nIm Wald Nahrung, am See Wasser... Erstmal hast du alles überlebenswichtige...'),
('item_text', 1241, ''),
('mobdb_cat', 2, 'Miniboss Monster erstellen'),
('item', 1002, 'Rostiger Dolch'),
('item_text', 1002, ''),
('mobdb_cat', 3, 'Boss Monster erstellen'),
('item_text', 1361, ''),
('mobdb_text', 6, 'Maximal Schaden'),
('mobdb_info', 6, 'Der max. dmg den dir ein\r\nMonster zufügen kann.'),
('mobdb_text', 5, 'Minimal Schaden'),
('mobdb_info', 5, 'Der min. dmg den dir ein\r\nMonster zufügen kann.'),
('mobdb_text', 4, 'Leben'),
('mobdb_info', 4, 'So viel Leben hat das Monster'),
('item', 1361, 'Doppelaxt'),
('mobdb_text', 3, 'Level'),
('mobdb_info', 3, 'Das Level welches das Monster\r\nspäter hat.'),
('mobdb_info', 2, 'Der Text der beim Monster\r\nangezeigt wird'),
('mobdb_text', 2, 'Monster Text'),
('item_text', 1181, ''),
('item_text', 1180, ''),
('item', 1300, 'Handaxt'),
('item', 1240, 'Schlagring'),
('item_text', 1240, ''),
('item', 1180, 'BaseballschlÃ¤ger'),
('item', 1360, 'Holzfaelleraxt'),
('item', 1242, 'Kralle'),
('item_text', 1061, 'Ein Schwert, das gut in der Hand liegt<br />und scharf ist.'),
('item', 1061, 'Scharfes Kurzschwert'),
('item', 1181, 'Eisenstange'),
('item', 1081, 'Eisenstange'),
('item_text', 1360, ''),
('item_db_feld', 2, 'Hier könnt ihr Items für das Game erstellen'),
('item', 1120, 'Bihaender'),
('item_text', 1120, ''),
('item', 1182, 'Kurzes Nunchaku'),
('item_text', 1182, ''),
('item_text', 1001, ''),
('item', 1001, 'Kuechenmesser'),
('mob_db_hl', 1, 'Monster erstellen'),
('mob_db_feld', 1, 'Hier kannst du Monster für das Game erstellen'),
('mobdb_cat', 1, 'Normale Monster erstellen'),
('mobdb_text', 1, 'Monstername'),
('item_text', 1062, 'Ein Schwert, das gut in der Hand liegt<br />und scharf ist.'),
('item', 5001, 'Rucksack'),
('item_text', 5001, 'Ein Rucksack mir 2 t'),
('item', 5002, 'Sporttasche'),
('item_text', 5002, 'Ein Rucksack an dem sich 4 Taschen befinden'),
('admin', 0, 'Admin-Center'),
('admin', 1, 'Quests erstellen'),
('admin', 2, 'Items erstellen'),
('admin', 3, 'Items bearbeiten'),
('admin', 4, 'Monster erstellen'),
('admin', 5, 'admin'),
('admin', 6, 'admin'),
('ort', 4, 'Hütte'),
('item_db_hl', 1, 'Item Datenbank'),
('item_db_feld', 1, 'Hier könnt ihr Items hinzufügen.'),
('itemdb_text', 1, 'Itemname'),
('itemdb_text', 2, 'Item ID'),
('itemdb_text', 3, 'Monster Min.-lvl'),
('itemdb_text', 4, 'Monster Max.-lvl'),
('itemdb_text', 5, 'Art'),
('itemdb_text', 6, 'Stapelgröße'),
('itemdb_text', 7, 'Minmal Schaden'),
('itemdb_text', 8, 'Maximal Schaden'),
('itemdb_text', 9, 'Verteidigung'),
('itemdb_info', 1, 'Der Item Name'),
('itemdb_text', 10, 'Treffer Chance'),
('itemdb_text', 11, 'Kritische Treffer Chance'),
('itemdb_info', 2, 'Die ID des Item. \r\n(sollte die selbe sein wie Bildname)'),
('itemdb_info', 3, 'Das Minimale Level auf dem ein \r\nMonster das Item Droppen kann.'),
('itemdb_info', 4, 'Das Maximale Level auf dem ein \r\nMonster das Item Droppen kann.'),
('itemdb_info', 5, 'Das ist die Art des Items. s.u.\r\nArtentabelle'),
('itemdb_info', 6, 'Für Waffen,Rüstung.. usw immer 1 \r\nund für Useitem oder Sonstiges beliebige Anzahl.'),
('itemdb_info', 7, 'Minimaler Waffenschaden'),
('itemdb_info', 8, 'Maximaler Waffenschaden'),
('itemdb_info', 9, 'Verteidigung nur bei Helm,Rüstung...'),
('itemdb_info', 10, 'Die Treffer Chance beim Monster'),
('itemdb_info', 11, 'Kritische Treffer Chance'),
('itemdb_text', 12, 'Heilungswert'),
('itemdb_info', 12, 'Heilungswert z.b 50 Wasser,100 Nahrung'),
('itemdb_text', 13, 'Heilungsart'),
('itemdb_info', 13, 'Heilungsart z.b Wasser,Nahrung'),
('itemdb_text', 14, 'Inventar Plätze'),
('itemdb_info', 14, 'Deine Inventar größe mit dem\r\nRucksack.'),
('itemdb_text', 15, 'Munitonsart'),
('itemdb_info', 15, 'Munitonsart benötigt für fernkampf'),
('itemdb_text', 16, 'Itemtext'),
('itemdb_info', 16, 'Der Item Text. z.b. \r\nKleines Taschen-Messer'),
('item_db_error', 1, 'Die ItemID gibt es schon'),
('itemdb_text', 18, 'Bild'),
('itemdb_info', 18, 'Das Bild wie die itemID benennen.'),
('itemdb_cat', 1, 'Nahkampfwaffe adden'),
('itemdb_cat', 2, 'Fernkampfwaffe adden'),
('itemdb_text', 19, 'Heilungsart'),
('itemdb_info', 19, 'Heilungsart aussuchen'),
('itemdb_cat', 3, 'Use Item adden (Tränke, etc)'),
('itemdb_cat', 4, 'Taschen adden'),
('defense_decrease', 0, 'defense_decrease'),
('itemdb_cat', 5, 'Amulette adden'),
('itemdb_text', 20, 'Magische Vert.'),
('itemdb_info', 20, 'Magische Verteidigung'),
('itemdb_cat', 6, 'Ringe adden'),
('itemdb_cat', 7, 'Helm adden'),
('itemdb_cat', 8, 'Rüstung adden'),
('itemdb_cat', 9, 'Handschuhe adden'),
('itemdb_cat', 10, 'Schuhe adden'),
('itemdb_cat', 12, 'Etc adden'),
('huette', 0, 'huette'),
('huette_text', 0, 'huette_text'),
('schlafen', 0, 'schlafen'),
('seltenheit', 0, 'seltenheit'),
('seltenheit', 4, 'seltenheit'),
('bonuswerte', 0, 'bonuswerte'),
('seltenheit', 3, 'seltenheit'),
('seltenheit', 5, 'seltenheit'),
('laehmung', 0, 'laehmung'),
('saeure', 0, 'saeure'),
('attack_speed_decrease', 0, 'attack_speed_decrease'),
('chemie', 0, 'chemie'),
('aggro_up', 0, 'aggro_up'),
('seltenheit', 2, 'seltenheit'),
('damage_decrease', 0, 'damage_decrease'),
('attack_speed', 0, 'attack_speed'),
('seltenheit', 1, 'seltenheit'),
('schlafen_ok', 0, 'schlafen_ok'),
('mobdb_info', 1, 'Der Name des Monsters'),
('item_art', 5, 'Ausrüstung-Amulett'),
('item_text', 1242, ''),
('item_text', 1081, ''),
('mobname', 0, 'Streunender Hund'),
('mob_text', 0, 'Ein streunender Hund, er sieht sehr hungrig aus'),
('mobdb_text', 8, 'mobdb_text'),
('mobdb_info', 8, 'mobdb_info'),
('item', 5010, 'Amulet'),
('item', 6010, 'Ring'),
('item_art', 6, 'Ausrüstung-Ring'),
('item', 7010, 'lederhut'),
('item_text', 7010, ''),
('item_art', 7, 'Ausrüstung-Helm'),
('item', 8010, 'LederrÃ¼stung'),
('item_text', 8010, ''),
('item_art', 8, 'Ausrüstung-Rüstung'),
('item', 9010, 'Lederhandschuhe'),
('item_text', 9010, ''),
('item_art', 9, 'Ausrüstung-Handschuhe'),
('item', 12000, 'Holzbretter'),
('item_text', 12000, 'Das ist Holz. Holz ist ein toller Rohstoff. Er wird fÃ¼r viele Sachen benÃ¶tigt. Wie zum Beispiel... Ã–hm... Baseball-SchlÃ¤ger...'),
('item', 5011, 'Amulet'),
('item', 6011, 'Ring'),
('item', 9011, 'Rost.Eisenhandschuhe'),
('item', 5012, 'Amulet'),
('item_text', 6012, ''),
('item', 6012, 'Ring'),
('item', 7012, 'Kampfhelm'),
('item_text', 7012, ''),
('def', 0, 'def'),
('mdef', 0, 'mdef'),
('item_text', 10010, ''),
('item', 10010, 'Lederstiefel'),
('item_art', 10, 'Ausrüstung-Schuhe'),
('item', 10011, 'Rostige Eisenstiefel'),
('item', 8012, 'Kampfweste'),
('item_text', 8012, ''),
('item', 9012, 'Kampfhandschuhe'),
('item_text', 9012, ''),
('item', 10012, 'Kampfstiefel'),
('item_text', 10012, ''),
('item_text', 5010, ''),
('item_text', 5011, ''),
('item_text', 5012, ''),
('item_text', 6010, ''),
('item_text', 6011, ''),
('item', 1062, 'Anderthalbhaender'),
('item_text', 1300, ''),
('item', 1301, 'Steinaxt'),
('item_text', 1301, ''),
('item', 1302, 'StoÃŸaxt'),
('item_text', 1302, ''),
('item', 1060, 'Kurzschwert'),
('item_text', 1060, 'Ein Schwert, das gut in der Hand liegt'),
('item', 1121, 'Schwerer Gladius'),
('item_text', 1121, ''),
('item', 1122, 'Zweihandlangschwert'),
('item_text', 1122, ''),
('item', 1362, 'GroÃŸaxt'),
('item_text', 1362, ''),
('item_text', 7011, ''),
('item', 7011, 'Rostiger Eisenhut'),
('item_text', 10011, ''),
('item', 8011, 'Rost. EisenrÃ¼stung'),
('item_text', 9011, ''),
('item_text', 8011, ''),
('item', 7013, 'Guter Einsenhelm '),
('item_text', 7013, ''),
('item', 8013, 'Gute EisenrÃ¼stung'),
('item_text', 8013, ''),
('item', 9013, 'Gute Eisenhandschuhe'),
('item_text', 9013, ''),
('item', 10013, 'Gute Eisenstiefel'),
('item_text', 10013, ''),
('item', 7014, 'WÃ¼sten Tarnhelm'),
('item_text', 7014, ''),
('item', 8014, 'WÃ¼sten Kampfweste'),
('item_text', 8014, ''),
('item', 9014, 'WÃ¼st. kampfhandschuh'),
('item_text', 9014, ''),
('item', 10014, 'WÃ¼sten Kampfstiefel'),
('item_text', 10014, ''),
('item', 5013, 'Amulet'),
('item_text', 5013, ''),
('item', 5014, 'Amulet'),
('item_text', 5014, ''),
('item', 6013, 'Ring'),
('item_text', 6013, ''),
('item', 6014, 'Ring'),
('item_text', 6014, ''),
('item', 20001, 'item'),
('item_text', 20001, 'item_text'),
('item', 20002, 'item'),
('item_text', 20002, 'item_text'),
('item_text', 5003, 'von der U.S Armee'),
('item', 5003, 'Armee Rucksack'),
('item', 7015, 'Goldener Helm'),
('item_text', 7015, ''),
('item', 8015, 'Goldene RÃ¼stung'),
('item_text', 8015, ''),
('item', 9015, 'Goldene Handschuhe'),
('item_text', 9015, ''),
('item', 10015, 'Goldene Stiefel'),
('item_text', 10015, ''),
('item', 100, 'KrÃ¼meltee'),
('item_text', 100, ''),
('item_text', 4, ''),
('item', 4, 'KrÂƒÃ¼meltee'),
('char_gesundheit', 0, 'char_gesundheit'),
('char_wissen', 0, 'char_wissen'),
('char_power', 0, 'char_power'),
('char_geschwindigkeit', 0, 'char_geschwindigkeit'),
('char_treffchance', 0, 'char_treffchance'),
('char_glueck', 0, 'char_glueck'),
('char_stpoints', 0, 'char_stpoints'),
('char_skpoints', 0, 'char_skpoints'),
('skill_5', 5, 'skill'),
('skill_beschreibung_5', 5, 'skill_beschreibung');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
