-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Mai 2013 um 16:44
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

DROP TABLE IF EXISTS `abbau_gebiet`;
CREATE TABLE IF NOT EXISTS `abbau_gebiet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `gebiet` text COLLATE latin1_german2_ci NOT NULL,
  `dauer` int(11) NOT NULL,
  `grundwert` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abfall`
--

DROP TABLE IF EXISTS `abfall`;
CREATE TABLE IF NOT EXISTS `abfall` (
  `zeitpunkt` int(20) NOT NULL,
  `item` int(11) NOT NULL,
  `menge` int(11) NOT NULL,
  `spieler` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `char`
--

DROP TABLE IF EXISTS `char`;
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `char_exp`
--

DROP TABLE IF EXISTS `char_exp`;
CREATE TABLE IF NOT EXISTS `char_exp` (
  `level` int(11) NOT NULL,
  `exp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `char_quest`
--

DROP TABLE IF EXISTS `char_quest`;
CREATE TABLE IF NOT EXISTS `char_quest` (
  `cquest_userID` int(11) NOT NULL,
  `cquest_questID` int(11) NOT NULL,
  `cquest_gelesen` int(1) NOT NULL DEFAULT '0',
  `cquest_erledigt` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `char_skill`
--

DROP TABLE IF EXISTS `char_skill`;
CREATE TABLE IF NOT EXISTS `char_skill` (
  `userID` int(11) NOT NULL,
  `skillID` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  PRIMARY KEY (`userID`,`skillID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `crafting_rezepte`
--

DROP TABLE IF EXISTS `crafting_rezepte`;
CREATE TABLE IF NOT EXISTS `crafting_rezepte` (
  `item` int(11) NOT NULL,
  `menge` int(11) NOT NULL,
  `produkt` int(11) NOT NULL,
  `produkt_menge` int(11) NOT NULL,
  `skill_level` int(11) NOT NULL,
  PRIMARY KEY (`item`,`produkt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_chat`
--

DROP TABLE IF EXISTS `guild_chat`;
CREATE TABLE IF NOT EXISTS `guild_chat` (
  `guild_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `nachricht` text COLLATE latin1_german2_ci NOT NULL,
  `poster` int(50) NOT NULL,
  PRIMARY KEY (`msg_id`),
  UNIQUE KEY `msg_id` (`msg_id`),
  KEY `guild_id` (`guild_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_db`
--

DROP TABLE IF EXISTS `guild_db`;
CREATE TABLE IF NOT EXISTS `guild_db` (
  `guild_id` int(11) NOT NULL AUTO_INCREMENT,
  `guild_name` varchar(155) COLLATE latin1_german2_ci NOT NULL,
  `guild_kurz` varchar(6) COLLATE latin1_german2_ci NOT NULL,
  `guild_desc` text COLLATE latin1_german2_ci NOT NULL,
  `emblem` int(11) NOT NULL DEFAULT '0',
  `guild_master` varchar(155) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`guild_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_exp`
--

DROP TABLE IF EXISTS `guild_exp`;
CREATE TABLE IF NOT EXISTS `guild_exp` (
  `level` int(11) NOT NULL,
  `exp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_ranking`
--

DROP TABLE IF EXISTS `guild_ranking`;
CREATE TABLE IF NOT EXISTS `guild_ranking` (
  `guild_id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`guild_id`,`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_skill`
--

DROP TABLE IF EXISTS `guild_skill`;
CREATE TABLE IF NOT EXISTS `guild_skill` (
  `guild_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guild_skill_db`
--

DROP TABLE IF EXISTS `guild_skill_db`;
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

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `invID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `uniqID` int(11) NOT NULL,
  `menge` int(11) NOT NULL,
  PRIMARY KEY (`invID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=330 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_art`
--

DROP TABLE IF EXISTS `item_art`;
CREATE TABLE IF NOT EXISTS `item_art` (
  `art` int(11) NOT NULL,
  `beschreibung` varchar(30) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_chance_stats`
--

DROP TABLE IF EXISTS `item_chance_stats`;
CREATE TABLE IF NOT EXISTS `item_chance_stats` (
  `anzahl_stats` int(11) NOT NULL,
  `chance_stats` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_db`
--

DROP TABLE IF EXISTS `item_db`;
CREATE TABLE IF NOT EXISTS `item_db` (
  `Info` text COLLATE latin1_german2_ci NOT NULL,
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `min_lvl` int(11) NOT NULL,
  `max_lvl` int(11) NOT NULL,
  `art` int(11) NOT NULL,
  `stack` int(11) NOT NULL,
  `mindmg` int(11) NOT NULL,
  `maxdmg` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `hit` int(11) NOT NULL,
  `crit` float(11,2) NOT NULL,
  `refill` int(11) NOT NULL,
  `refillart` int(11) NOT NULL,
  `platz` int(11) NOT NULL,
  `munitonsart` int(11) NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=20001 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_list`
--

DROP TABLE IF EXISTS `item_list`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_quality`
--

DROP TABLE IF EXISTS `item_quality`;
CREATE TABLE IF NOT EXISTS `item_quality` (
  `quality` int(11) NOT NULL,
  `beschreibung` text NOT NULL,
  `chance` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item_sets`
--

DROP TABLE IF EXISTS `item_sets`;
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

DROP TABLE IF EXISTS `item_stats`;
CREATE TABLE IF NOT EXISTS `item_stats` (
  `stat` text NOT NULL,
  `min_quality` int(11) NOT NULL,
  `art` int(11) NOT NULL,
  `minwert` int(11) NOT NULL,
  `maxwert` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `loginName` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `passwort` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `registerDate` int(20) NOT NULL,
  `lastLogin` int(20) NOT NULL DEFAULT '0',
  `lastAktion` int(20) NOT NULL DEFAULT '0',
  `onlineTimer` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `map_gebiete`
--

DROP TABLE IF EXISTS `map_gebiete`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mob_db`
--

DROP TABLE IF EXISTS `mob_db`;
CREATE TABLE IF NOT EXISTS `mob_db` (
  `mob_id` int(11) NOT NULL AUTO_INCREMENT,
  `mob_name` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `min_schaden` int(11) NOT NULL,
  `max_schaden` int(11) NOT NULL,
  `mob_leben` int(11) NOT NULL,
  `mob_level` int(11) NOT NULL,
  `mob_exp` int(11) NOT NULL,
  `mob_drop` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`mob_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_ausgang`
--

DROP TABLE IF EXISTS `nachricht_ausgang`;
CREATE TABLE IF NOT EXISTS `nachricht_ausgang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `empfaenger` int(11) NOT NULL,
  `zeit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `betreff` text COLLATE latin1_german2_ci NOT NULL,
  `nachricht` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_eingang`
--

DROP TABLE IF EXISTS `nachricht_eingang`;
CREATE TABLE IF NOT EXISTS `nachricht_eingang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `empfaenger` int(11) NOT NULL,
  `zeit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `betreff` text COLLATE latin1_german2_ci NOT NULL,
  `nachricht` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `quest_db`
--

DROP TABLE IF EXISTS `quest_db`;
CREATE TABLE IF NOT EXISTS `quest_db` (
  `quest_id` int(11) NOT NULL,
  `quest_belohnung` text NOT NULL,
  `quest_vorraussetzung` text NOT NULL,
  `quest_isStory` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `skill_db`
--

DROP TABLE IF EXISTS `skill_db`;
CREATE TABLE IF NOT EXISTS `skill_db` (
  `skill_ID` int(11) NOT NULL AUTO_INCREMENT,
  `maxlvl` int(11) NOT NULL DEFAULT '10',
  `erlernbar` int(11) NOT NULL DEFAULT '1',
  `bonus` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`skill_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `texte`
--

DROP TABLE IF EXISTS `texte`;
CREATE TABLE IF NOT EXISTS `texte` (
  `kurz` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `id` int(10) NOT NULL DEFAULT '0',
  `deutsch` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`kurz`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
