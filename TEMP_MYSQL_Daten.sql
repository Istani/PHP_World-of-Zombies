-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: wp388.webpack.hosteurope.de
-- Erstellungszeit: 17. Mai 2013 um 18:31
-- Server Version: 5.5.30
-- PHP-Version: 5.3.3-7+squeeze14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `db11106940-game`
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
(1, 'wald', 3600, 10, 10000),
(2, 'schrottplatz', 3600, 20, 11000),
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
  `gesundheit` int(11) NOT NULL DEFAULT '100',
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
  `hanschuhe_uniq` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `char` (`userID`, `klasse`, `stpoints`, `skpoints`, `level`, `exp`, `gesundheit`, `nahrung`, `wasser`, `nahkampf`, `nahkampf_uniq`, `schusswaffe`, `schusswaffe_uniq`, `rucksack`, `rucksack_uniq`, `goldklumpen`, `amulett`, `amulett_uniq`, `ring_L`, `ring_L_uniq`, `ring_R`, `ring_R_uniq`, `helm`, `helm_uniq`, `amor`, `amor_uniq`, `handschuhe`, `hanschuhe_uniq`, `schuhe`, `schuhe_uniq`, `fahrzeug`, `fahrzeug_uniq`, `geld`, `gilde`, `last_map`, `zombieslave`, `zombieslave_aktiv`, `zombieslave_gebiet`, `Items_Abbau`, `Items_Crafting`, `Monster_Wins`, `aktion`, `aktion_id`, `aktion_start`, `aktion_ende`) VALUES
(13, 3, 0, 1, 2, 68, 100, 1, 70, 0, 0, 0, 0, 5000, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Zombies of Destruction', 'trainingslager', 0, 0, '', 215, 18, 3, 'ABBAUEN', 1, 1368779371, 1368782971),
(14, 1, 0, 0, 1, 85, 100, 100, 115, 0, 0, 0, 0, 5000, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 110, 2, 0, 'ABBAUEN', 1, 1368623639, 1368627239),
(4, 1, 0, 0, 1, 0, 100, 100, 100, 1, 0, 0, 0, 5000, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, 'Zombies of Destruction', 'trainingslager', 1, 0, '', 0, 0, 0, '', 0, 0, 0),
(5, 2, 0, 0, 1, 0, 125, 100, 100, 1, 0, 0, 0, 5000, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, '', 'weltkarte', 1, 0, '', 0, 0, 0, '', 0, 0, 0),
(10, 1, 0, 0, 1, 0, 100, 100, 100, 1, 0, 0, 0, 5000, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, '', 'trainingslager', 1, 0, '', 0, 0, 0, '', 0, 0, 0),
(6, 1, 0, 0, 1, 10, 100, 100, 100, 0, 0, 0, 0, 5000, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Zombies of Destruction', 'trainingslager', 0, 0, '', 0, 0, 0, 'ABBAUEN', 1, 1368351033, 1368354633),
(7, 3, 0, 0, 1, 0, 150, 100, 100, 1, 0, 0, 0, 5000, 0, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, '', 'trainingslager', 1, 0, '', 10, 0, 0, '', 0, 0, 0),
(3, 1, 0, 0, 1, 0, 100, 100, 100, 1, 0, 0, 0, 5000, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, '', 'weltkarte', 1, 0, '', 0, 0, 0, '', 0, 0, 0),
(8, 1, 0, 0, 1, 0, 100, 100, 100, 1, 0, 0, 0, 5000, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, '', 'trainingslager', 1, 0, '', 30, 4, 0, 'KAMPF_MOB', 2, 1362565077, 1362565137),
(12, 1, 0, 0, 1, 0, 100, 100, 100, 1, 0, 0, 0, 5000, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, 'Zombies of Destruction', 'trainingslager', 1, 0, '', 0, 0, 0, '', 0, 0, 0),
(2, 2, 0, 1, 2, 213, 100, 1, 60, 0, 0, 0, 0, 5000, 0, 75, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Zombies of Destruction', 'trainingslager', 0, 0, '', 185, 20, 6, '', 0, 0, 0),
(1, 1, 0, 2, 3, 92, 100, 1, 0, 0, 0, 0, 0, 5000, 0, 982, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Gnaaadenlos', 'trainingslager', 0, 0, '', 150, 38, 3, '', 0, 0, 0),
(15, 3, 0, 0, 1, 90, 100, 100, 75, 0, 0, 0, 0, 5000, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 40, 4, 0, 'KAMPF_MOB', 1, 1368304715, 1368304895),
(16, 1, 0, 0, 1, 60, 100, 45, 75, 0, 0, 0, 0, 5000, 0, 48, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 40, 2, 1, '', 0, 0, 0),
(18, 2, 0, 0, 1, 10, 100, 100, 100, 0, 0, 0, 0, 5000, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 0, 0, 0, '', 0, 0, 0),
(19, 3, 0, 0, 1, 10, 100, 100, 100, 0, 0, 0, 0, 5000, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 0, 0, 0, '', 0, 0, 0),
(20, 3, 0, 0, 1, 15, 100, 100, 95, 0, 0, 0, 0, 5000, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'trainingslager', 0, 0, '', 5, 0, 0, '', 0, 0, 0);

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
(1, 1, 1, 1),
(2, 1, 1, 1),
(2, 2, 1, 0),
(13, 1, 1, 1),
(13, 2, 1, 0),
(14, 1, 1, 1),
(14, 2, 1, 0),
(15, 1, 1, 1),
(15, 2, 0, 0),
(16, 1, 1, 1),
(16, 2, 1, 0),
(6, 1, 1, 1),
(6, 2, 1, 0),
(18, 1, 1, 1),
(18, 2, 1, 0),
(19, 1, 1, 1),
(19, 2, 1, 0),
(20, 1, 1, 1),
(20, 2, 1, 0);

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
(1, 1, 1),
(2, 1, 1),
(7, 1, 1),
(12, 1, 1),
(6, 1, 1),
(10, 1, 1),
(8, 1, 1),
(1, 2, 1),
(2, 3, 1),
(13, 1, 1),
(13, 4, 1),
(14, 1, 1),
(14, 2, 1),
(15, 1, 1),
(15, 4, 1),
(16, 1, 1),
(16, 2, 1),
(6, 2, 1),
(18, 1, 1),
(18, 3, 1),
(19, 1, 1),
(19, 4, 1),
(20, 1, 1),
(20, 4, 1);

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
(10000, 5, 15000, 1, 1),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=23 ;

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
(1, 22, 1368364594, 'ZoDChrizzy ist der Gilde beigetreten!', 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `guild_db`
--

INSERT INTO `guild_db` (`guild_id`, `guild_name`, `guild_kurz`, `guild_desc`, `emblem`, `guild_master`) VALUES
(1, 'Zombies of Destruction', 'ZoD', '"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""\r\n~~~~~~~~~~~~~~~~~~~~ ZoD Gilde ~~~~~~~~~~~~~~~~~~~~~~\r\n~~~~~ Trettet der stÃ¤rksten Gilde auf dem Server bei der "ZoD Gilde2 ~~~~~\r\n~~~~~~~~~~~~~~~~~ www.zodclan-online.de ~~~~~~~~~~~~~~~~~\r\n\r\n"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""\r\n\r\nÃœber die Gilde:\r\n\r\nSkill 0 : lvl 1 xx Mitglieder\r\nSkill 1 : lvl 1 xx% bonus EXP\r\nSkill 2 : lvl 1 xx% bonus Geld\r\nSkill 3 : lvl 1 xx% bonus -ZEIT\r\n\r\nWas wir erwarten:\r\n\r\n-EXP Share fÃ¼r die Gilde, dass wir schnell das max-lvl erreichen. \r\n  Also muss jeder 10% seiner EXP abgeben!\r\n \r\n-Freundlicher Umgang mit anderen leuten aus der Gilde.\r\n\r\n~~~~~~~~~~~~~~~~~~~~ REGELN ~~~~~~~~~~~~~~~~~~~~~~~\r\n~~~~ Greif kein in der Gilde an. Keine AutoClick Programme oder Bots ~~~~~\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~', 0, '2'),
(2, 'Gnaaadenlos', 'A', 'TEST Istani', 0, '1');

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
(2, 3, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_skill`
--

CREATE TABLE IF NOT EXISTS `guild_skill` (
  `guild_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `guild_skill`
--


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

--
-- Daten für Tabelle `guild_skill_db`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=194 ;

--
-- Daten für Tabelle `inventory`
--

INSERT INTO `inventory` (`invID`, `userID`, `itemID`, `uniqID`, `menge`) VALUES
(159, 14, 2, 0, 10),
(95, 2, 3, 0, 2),
(6, 4, 3, 0, 5),
(150, 16, 20000, 0, 2),
(161, 18, 2, 0, 10),
(147, 6, 1, 0, 10),
(15, 6, 3, 0, 5),
(47, 10, 3, 0, 5),
(51, 12, 3, 0, 5),
(20, 7, 3, 0, 5),
(157, 13, 11000, 0, 60),
(156, 13, 2, 0, 15),
(188, 1, 3, 0, 1),
(132, 2, 10000, 0, 85),
(145, 16, 10000, 0, 15),
(187, 1, 3, 0, 1),
(148, 6, 2, 0, 10),
(149, 1, 20000, 0, 4),
(106, 13, 3, 0, 4),
(160, 18, 1, 0, 10),
(158, 14, 10000, 0, 20),
(144, 16, 2, 0, 8),
(143, 16, 1, 0, 9),
(117, 14, 3, 0, 3),
(151, 1, 2, 0, 40),
(155, 13, 10000, 0, 30),
(154, 14, 11000, 0, 20),
(130, 2, 11000, 0, 17),
(136, 2, 15000, 0, 5),
(163, 2, 20000, 0, 2),
(164, 19, 1, 0, 10),
(165, 19, 2, 0, 10),
(166, 20, 1, 0, 10),
(167, 20, 2, 0, 15),
(168, 20, 10000, 0, 10),
(169, 1, 11000, 0, 8),
(186, 1, 3, 0, 1),
(189, 1, 3, 0, 1),
(184, 1, 15000, 0, 5),
(183, 1, 15000, 0, 5),
(185, 1, 3, 0, 1),
(191, 16, 11000, 0, 17),
(193, 16, 3, 0, 1);

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
(3, 80),
(4, 50),
(5, 25),
(6, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_db`
--

CREATE TABLE IF NOT EXISTS `item_db` (
  `Info` text COLLATE latin1_german2_ci NOT NULL,
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `min_lvl` int(11) NOT NULL,
  `maxLlvl` int(11) NOT NULL,
  `art` int(11) NOT NULL,
  `stack` int(11) NOT NULL,
  `mindmg` int(11) NOT NULL,
  `maxdmg` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `hit` int(11) NOT NULL,
  `crit` int(11) NOT NULL,
  `refill` int(11) NOT NULL,
  `refillart` int(11) NOT NULL,
  `platz` int(11) NOT NULL,
  `munitonsart` int(11) NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=20001 ;

--
-- Daten für Tabelle `item_db`
--

INSERT INTO `item_db` (`Info`, `itemID`, `min_lvl`, `maxLlvl`, `art`, `stack`, `mindmg`, `maxdmg`, `def`, `hit`, `crit`, `refill`, `refillart`, `platz`, `munitonsart`) VALUES
('Taschen-Messer', 1000, 1, 5, 1, 1, 1, 3, 0, 100, 5, 0, 0, 0, 0),
('Kleiner Rucksack', 5000, 0, 0, 4, 1, 0, 0, 0, 0, 0, 0, 0, 10, 0),
('Holz', 10000, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Altmetall', 11000, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Wasserbecher', 1, 0, 0, 3, 100, 0, 0, 0, 0, 0, 10, 0, 0, 0),
('Apfel', 2, 0, 0, 3, 100, 0, 0, 0, 0, 0, 10, 1, 0, 0),
('leerer Holzeimer', 15000, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('gefüllter Wassereimer', 3, 0, 0, 3, 1, 0, 0, 0, 0, 0, 20, 0, 0, 0),
('Zombiefleisch', 20000, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('stumpfes Messer', 1001, 1, 3, 1, 1, 0, 3, 0, 100, 3, 0, 0, 0, 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `item_list`
--


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
(3, 'gut', 80),
(4, 'magisch', 50),
(6, 'set', 8),
(7, 'legendär', 4),
(5, 'rare', 30);

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

--
-- Daten für Tabelle `item_sets`
--


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
('schaden', 0, 1, 1, 10),
('aggro_up', 5, 1, 4, 8),
('attack_speed', 4, 1, 5, 15),
('damage_decrease', 4, 1, 2, 20),
('defense_decrease', 4, 1, 5, 20),
('attack_speed_decrease', 4, 1, 3, 15);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mob_db`
--

CREATE TABLE IF NOT EXISTS `mob_db` (
  `mob_id` int(11) NOT NULL AUTO_INCREMENT,
  `min_schaden` int(11) NOT NULL,
  `max_schaden` int(11) NOT NULL,
  `mob_leben` int(11) NOT NULL,
  `mob_level` int(11) NOT NULL,
  `mob_exp` int(11) NOT NULL,
  PRIMARY KEY (`mob_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `mob_db`
--

INSERT INTO `mob_db` (`mob_id`, `min_schaden`, `max_schaden`, `mob_leben`, `mob_level`, `mob_exp`) VALUES
(1, 1, 1, 25, 0, 5),
(2, 1, 2, 48, 1, 10),
(3, 1, 4, 60, 2, 20),
(5, 1, 2, 500, 6, 30),
(4, 1, 1, 2, 0, 1),
(6, 10, 100, 200, 30, 350),
(7, 3, 7, 75, 7, 35),
(8, 2, 14, 35, 5, 25),
(9, 1, 4, 16, 2, 15),
(10, 1, 15, 50, 6, 35),
(11, 3, 5, 12, 2, 15);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=18 ;

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
(17, 2, 6, 1368364594, 0, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=18 ;

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
(17, 2, 6, 1368364594, 0, 'RE: Gilden Beitritt', 'Okay du bist dabei! Klick auf Gilde in der Navigation!');

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
(2, '', '', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `skill_db`
--

CREATE TABLE IF NOT EXISTS `skill_db` (
  `skill_ID` int(11) NOT NULL AUTO_INCREMENT,
  `maxlvl` int(11) NOT NULL DEFAULT '10',
  `erlernbar` int(11) NOT NULL DEFAULT '1',
  `bonus` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`skill_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `skill_db`
--

INSERT INTO `skill_db` (`skill_ID`, `maxlvl`, `erlernbar`, `bonus`) VALUES
(1, 10, 1, '//Craftskill'),
(2, 1, 0, 'a:1:{s:6:"wasser";s:3:"25%";}'),
(3, 1, 0, 'a:1:{s:7:"nahrung";s:3:"25%";}'),
(4, 1, 0, 'a:1:{s:6:"schaden";s:3:"25%";}');

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
('item', 1, 'Wasserbecher'),
('item', 2, 'Apfel'),
('item', 3, 'gefüllter Wassereimer'),
('item_art', 0, 'Material'),
('item_art', 1, 'Ausrüstung-Nahkampfwaffe'),
('item_art', 4, 'Ausrüstung-Rucksack'),
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
('trefferchance', 0, 'trefferchance'),
('kritchance', 0, 'kritchance'),
('item_text', 1001, 'item_text'),
('navigation', 7, 'Gilde'),
('item', 1001, 'item'),
('ort', 0, 'Werkstatt'),
('ort', 1, 'See'),
('herstellen', 0, 'herstellen'),
('hergestellt', 0, 'hergestellt'),
('quest', 2, 'quest'),
('quest_text', 2, 'quest_text'),
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
('item', 0, 'item'),
('item_text', 0, 'item_text'),
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
('not_abbauen', 0, 'not_abbauen');
