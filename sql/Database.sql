-- --------------------------------------------------------
-- Verkkotietokone:              185.52.3.33
-- Palvelinversio:               5.5.39-MariaDB-log - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Versio:              9.3.0.5104
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tzcrew
DROP DATABASE IF EXISTS `tzcrew`;
CREATE DATABASE IF NOT EXISTS `tzcrew` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tzcrew`;

-- Dumping structure for taulu tzcrew.Account
DROP TABLE IF EXISTS `Account`;
CREATE TABLE IF NOT EXISTS `Account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `pass` varchar(65) NOT NULL,
  `base` varchar(45) NOT NULL,
  `session` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ACCOUNT_UNIQUE` (`name`,`base`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COMMENT='User';

-- Tietojen vientiä ei oltu valittu.
-- Dumping structure for taulu tzcrew.Base
DROP TABLE IF EXISTS `Base`;
CREATE TABLE IF NOT EXISTS `Base` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `base` varchar(45) NOT NULL,
  `fleet` varchar(45) NOT NULL,
  `metal` int(10) unsigned NOT NULL,
  `fuel` int(10) unsigned NOT NULL,
  `region` tinytext NOT NULL,
  `galaxy` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COMMENT='Only 1 main base';

-- Tietojen vientiä ei oltu valittu.
-- Dumping structure for taulu tzcrew.Fleet
DROP TABLE IF EXISTS `Fleet`;
CREATE TABLE IF NOT EXISTS `Fleet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fleet` varchar(45) NOT NULL,
  `ship` varchar(45) NOT NULL,
  `damage` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Dumping structure for taulu tzcrew.Galaxy
DROP TABLE IF EXISTS `Galaxy`;
CREATE TABLE IF NOT EXISTS `Galaxy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Dumping data for table tzcrew.Galaxy: 5 rows
/*!40000 ALTER TABLE `Galaxy` DISABLE KEYS */;
INSERT INTO `Galaxy` (`id`, `name`) VALUES
	(1, 'Sol');
INSERT INTO `Galaxy` (`id`, `name`) VALUES
	(2, 'Instander');
INSERT INTO `Galaxy` (`id`, `name`) VALUES
	(3, 'Wusher');
INSERT INTO `Galaxy` (`id`, `name`) VALUES
	(4, 'Astrol');
INSERT INTO `Galaxy` (`id`, `name`) VALUES
	(5, 'Hundo');
/*!40000 ALTER TABLE `Galaxy` ENABLE KEYS */;

-- Dumping structure for taulu tzcrew.Region
DROP TABLE IF EXISTS `Region`;
CREATE TABLE IF NOT EXISTS `Region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` tinytext,
  `galaxy` tinytext,
  `asteroids` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Dumping data for table tzcrew.Region: 1 rows
/*!40000 ALTER TABLE `Region` DISABLE KEYS */;
INSERT INTO `Region` (`id`, `region`, `galaxy`, `asteroids`) VALUES
	(1, 'north_west', 'Sol', NULL);
/*!40000 ALTER TABLE `Region` ENABLE KEYS */;

-- Dumping structure for taulu tzcrew.Ship
DROP TABLE IF EXISTS `Ship`;
CREATE TABLE IF NOT EXISTS `Ship` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_id` varchar(45) NOT NULL,
  `firepower` smallint(5) unsigned NOT NULL,
  `shield` smallint(5) unsigned NOT NULL,
  `hull` smallint(5) unsigned NOT NULL,
  `shield_rege` smallint(5) unsigned NOT NULL,
  `hull_rege` smallint(5) unsigned NOT NULL,
  `prize_metal` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'hull * hull_rege + firepower/2 + shield/2 * shield_rege;',
  `prize_fuel` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'hull/2 *hull_rege + firepower + shield * shield_rege;',
  `prize_diamond` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'prize_diamond=(hull * shield) * ((hull_rege +shield_rege)/2) + firepower;',
  `prize_cash` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'prize_cash=(hull * hull_rege + firepower + shield * shield_rege) * prize_diamond; ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table tzcrew.Ship: 22 rows
/*!40000 ALTER TABLE `Ship` DISABLE KEYS */;
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(1, 'Aurus', 15, 20, 35, 1, 1, 53, 53, 715, 50050);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(2, 'Urannus', 20, 30, 40, 5, 2, 165, 210, 4220, 1055000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(3, 'Urior', 30, 10, 10, 2, 1, 35, 55, 180, 10800);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(4, 'Roarer', 60, 40, 60, 5, 5, 430, 410, 12060, 6753600);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(5, 'Theurus', 90, 60, 80, 5, 1, 275, 430, 14490, 6810300);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(6, 'Luthia', 120, 100, 30, 2, 2, 220, 350, 6120, 2325600);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(7, 'Mistrix', 360, 400, 560, 15, 5, 5980, 7760, 2240360, 20521697600);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(8, 'Inarsis', 220, 60, 120, 5, 1, 380, 580, 21820, 13964800);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(9, 'Karkir', 5, 5, 5, 1, 1, 10, 13, 30, 450);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(10, 'Dorion', 150, 100, 50, 3, 5, 475, 575, 20150, 14105000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(11, 'Galeca', 450, 200, 200, 4, 3, 1225, 1550, 140450, 259832500);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(12, 'Fury', 2, 2, 2, 5, 1, 8, 13, 14, 196);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(13, 'Wuthix', 160, 300, 50, 2, 5, 630, 885, 52660, 53186600);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(14, 'Listar', 50, 30, 40, 2, 1, 95, 130, 1850, 277500);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(15, 'Tok', 10, 100, 5, 5, 5, 280, 523, 2510, 1342850);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(16, 'Waspa', 50, 20, 50, 3, 1, 105, 135, 2050, 328000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(17, 'Jansko', 80, 120, 5, 1, 5, 125, 213, 1880, 423000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(18, 'Ziel', 400, 60, 80, 10, 3, 740, 1120, 31600, 39184000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(19, 'Argoh', 220, 150, 230, 8, 3, 1400, 1765, 189970, 400836700);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(20, 'Lastar', 150, 80, 60, 6, 5, 615, 780, 26550, 24691500);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(21, 'Neptia', 88, 45, 200, 3, 1, 312, 323, 18088, 7651224);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(22, 'Zyntex', 330, 480, 200, 2, 4, 1445, 1690, 288330, 602609700);
/*!40000 ALTER TABLE `Ship` ENABLE KEYS */;

-- Dumping structure for taulu tzcrew.Ticker
DROP TABLE IF EXISTS `Ticker`;
CREATE TABLE IF NOT EXISTS `Ticker` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tick` int(11) unsigned DEFAULT NULL,
  `player` mediumint(8) unsigned DEFAULT NULL,
  `building` mediumint(8) unsigned DEFAULT NULL,
  `complete` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tikittäjä. 5 min resoluutio';

-- Dumping data for table tzcrew.Ticker: 0 rows
/*!40000 ALTER TABLE `Ticker` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ticker` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;


