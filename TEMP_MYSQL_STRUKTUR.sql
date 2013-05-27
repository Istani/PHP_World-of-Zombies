-- MySQL dump 10.13  Distrib 5.5.27, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: zodgame
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abbau_gebiet`
--

DROP TABLE IF EXISTS `abbau_gebiet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abbau_gebiet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `gebiet` text COLLATE latin1_german2_ci NOT NULL,
  `dauer` int(11) NOT NULL,
  `grundwert` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `abfall`
--

DROP TABLE IF EXISTS `abfall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abfall` (
  `zeitpunkt` int(20) NOT NULL,
  `item` int(11) NOT NULL,
  `menge` int(11) NOT NULL,
  `spieler` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `char`
--

DROP TABLE IF EXISTS `char`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `char` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `char_exp`
--

DROP TABLE IF EXISTS `char_exp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `char_exp` (
  `level` int(11) NOT NULL,
  `exp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `char_quest`
--

DROP TABLE IF EXISTS `char_quest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `char_quest` (
  `cquest_userID` int(11) NOT NULL,
  `cquest_questID` int(11) NOT NULL,
  `cquest_gelesen` int(1) NOT NULL DEFAULT '0',
  `cquest_erledigt` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `char_skill`
--

DROP TABLE IF EXISTS `char_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `char_skill` (
  `userID` int(11) NOT NULL,
  `skillID` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  PRIMARY KEY (`userID`,`skillID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `crafting_rezepte`
--

DROP TABLE IF EXISTS `crafting_rezepte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crafting_rezepte` (
  `item` int(11) NOT NULL,
  `menge` int(11) NOT NULL,
  `produkt` int(11) NOT NULL,
  `produkt_menge` int(11) NOT NULL,
  `skill_level` int(11) NOT NULL,
  PRIMARY KEY (`item`,`produkt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guild_chat`
--

DROP TABLE IF EXISTS `guild_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guild_chat` (
  `guild_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `nachricht` text COLLATE latin1_german2_ci NOT NULL,
  `poster` int(50) NOT NULL,
  PRIMARY KEY (`msg_id`),
  UNIQUE KEY `msg_id` (`msg_id`),
  KEY `guild_id` (`guild_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guild_db`
--

DROP TABLE IF EXISTS `guild_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guild_db` (
  `guild_id` int(11) NOT NULL AUTO_INCREMENT,
  `guild_name` varchar(155) COLLATE latin1_german2_ci NOT NULL,
  `guild_kurz` varchar(6) COLLATE latin1_german2_ci NOT NULL,
  `guild_desc` text COLLATE latin1_german2_ci NOT NULL,
  `emblem` int(11) NOT NULL DEFAULT '0',
  `guild_master` varchar(155) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`guild_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guild_exp`
--

DROP TABLE IF EXISTS `guild_exp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guild_exp` (
  `level` int(11) NOT NULL,
  `exp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guild_ranking`
--

DROP TABLE IF EXISTS `guild_ranking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guild_ranking` (
  `guild_id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`guild_id`,`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guild_skill`
--

DROP TABLE IF EXISTS `guild_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guild_skill` (
  `guild_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guild_skill_db`
--

DROP TABLE IF EXISTS `guild_skill_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guild_skill_db` (
  `skill_ID` int(11) NOT NULL AUTO_INCREMENT,
  `max_lvl` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  PRIMARY KEY (`skill_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `invID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `uniqID` int(11) NOT NULL,
  `menge` int(11) NOT NULL,
  PRIMARY KEY (`invID`)
) ENGINE=MyISAM AUTO_INCREMENT=371 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `item_art`
--

DROP TABLE IF EXISTS `item_art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_art` (
  `art` int(11) NOT NULL,
  `beschreibung` varchar(30) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `item_chance_stats`
--

DROP TABLE IF EXISTS `item_chance_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_chance_stats` (
  `anzahl_stats` int(11) NOT NULL,
  `chance_stats` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `item_db`
--

DROP TABLE IF EXISTS `item_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_db` (
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
) ENGINE=MyISAM AUTO_INCREMENT=20001 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `item_list`
--

DROP TABLE IF EXISTS `item_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_list` (
  `uniqID` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `item_lvl` int(11) NOT NULL,
  `quality` int(11) NOT NULL,
  `bonus` text NOT NULL,
  `setID` int(11) NOT NULL,
  `setBonus` text NOT NULL,
  PRIMARY KEY (`uniqID`),
  UNIQUE KEY `uniqID` (`uniqID`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `item_quality`
--

DROP TABLE IF EXISTS `item_quality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_quality` (
  `quality` int(11) NOT NULL,
  `beschreibung` text NOT NULL,
  `chance` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `item_sets`
--

DROP TABLE IF EXISTS `item_sets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_sets` (
  `setID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `setBonus` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `item_stats`
--

DROP TABLE IF EXISTS `item_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_stats` (
  `stat` text NOT NULL,
  `min_quality` int(11) NOT NULL,
  `art` int(11) NOT NULL,
  `minwert` int(11) NOT NULL,
  `maxwert` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `loginName` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `passwort` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `registerDate` int(20) NOT NULL,
  `lastLogin` int(20) NOT NULL DEFAULT '0',
  `lastAktion` int(20) NOT NULL DEFAULT '0',
  `onlineTimer` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `map_gebiete`
--

DROP TABLE IF EXISTS `map_gebiete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_gebiete` (
  `gebiet_id` int(11) NOT NULL AUTO_INCREMENT,
  `map_id` int(11) NOT NULL,
  `x_cord` int(11) NOT NULL,
  `y_cord` int(11) NOT NULL,
  `text_bez` varchar(255) NOT NULL,
  `text_id` int(11) NOT NULL,
  `need_quest` int(11) NOT NULL,
  `link_bez` varchar(255) NOT NULL,
  PRIMARY KEY (`gebiet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mob_db`
--

DROP TABLE IF EXISTS `mob_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mob_db` (
  `mob_id` int(11) NOT NULL AUTO_INCREMENT,
  `mob_name` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `min_schaden` int(11) NOT NULL,
  `max_schaden` int(11) NOT NULL,
  `mob_leben` int(11) NOT NULL,
  `mob_level` int(11) NOT NULL,
  `mob_exp` int(11) NOT NULL,
  `mob_drop` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`mob_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nachricht_ausgang`
--

DROP TABLE IF EXISTS `nachricht_ausgang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nachricht_ausgang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `empfaenger` int(11) NOT NULL,
  `zeit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `betreff` text COLLATE latin1_german2_ci NOT NULL,
  `nachricht` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nachricht_eingang`
--

DROP TABLE IF EXISTS `nachricht_eingang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nachricht_eingang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `empfaenger` int(11) NOT NULL,
  `zeit` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `betreff` text COLLATE latin1_german2_ci NOT NULL,
  `nachricht` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quest_db`
--

DROP TABLE IF EXISTS `quest_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quest_db` (
  `quest_id` int(11) NOT NULL,
  `quest_belohnung` text NOT NULL,
  `quest_vorraussetzung` text NOT NULL,
  `quest_isStory` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `skill_db`
--

DROP TABLE IF EXISTS `skill_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill_db` (
  `skill_ID` int(11) NOT NULL AUTO_INCREMENT,
  `maxlvl` int(11) NOT NULL DEFAULT '10',
  `erlernbar` int(11) NOT NULL DEFAULT '1',
  `bonus` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`skill_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `texte`
--

DROP TABLE IF EXISTS `texte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `texte` (
  `kurz` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `id` int(10) NOT NULL DEFAULT '0',
  `deutsch` text COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`kurz`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-27 22:22:57
