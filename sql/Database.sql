-- --------------------------------------------------------
-- Verkkotietokone:              127.0.0.1
-- Palvelinversio:               10.0.21-MariaDB-log - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Versio:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tzcrew
DROP DATABASE IF EXISTS 'tzcrew';
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
  `diamond` int(11) unsigned NOT NULL,
  `money` int(11) unsigned NOT NULL,
  `region` tinytext NOT NULL,
  `galaxy` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Only 1 main base';

-- Tietojen vientiä ei oltu valittu.

-- Dumping structure for taulu tzcrew.Fleet
DROP TABLE IF EXISTS `Fleet`;
CREATE TABLE IF NOT EXISTS `Fleet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fleet` varchar(45) NOT NULL,
  `ship` varchar(45) NOT NULL,
  `damage` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=634 DEFAULT CHARSET=latin1;

-- Tietojen vientiä ei oltu valittu.

-- Dumping structure for taulu tzcrew.Galaxy
DROP TABLE IF EXISTS `Galaxy`;
CREATE TABLE IF NOT EXISTS `Galaxy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Tietojen vientiä ei oltu valittu.

-- Dumping structure for taulu tzcrew.Region
DROP TABLE IF EXISTS `Region`;
CREATE TABLE IF NOT EXISTS `Region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` tinytext,
  `galaxy` tinytext,
  `asteroids` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Tietojen vientiä ei oltu valittu.

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
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Tietojen vientiä ei oltu valittu.

-- Dumping structure for taulu tzcrew.Ticker
DROP TABLE IF EXISTS `Ticker`;
CREATE TABLE IF NOT EXISTS `Ticker` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tick` int(11) unsigned DEFAULT NULL,
  `player` varchar(50) DEFAULT NULL,
  `building` varchar(50) DEFAULT NULL,
  `complete` int(11) DEFAULT NULL,
  `last_tick` int(11) DEFAULT NULL,
  `diffrence` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1 COMMENT='Tikittäjä. 5 min resoluutio';

-- Tietojen vientiä ei oltu valittu.

-- Dumping structure for tapahtuma tzcrew.Update test1_last_tick
DROP EVENT IF EXISTS `Update test1_last_tick`;
DELIMITER //
CREATE DEFINER=`tzcrew`@`127.0.0.1` EVENT `Update test1_last_tick` ON SCHEDULE EVERY 5 MINUTE STARTS '2017-08-23 12:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'Update test1 Ticker.last_tick' DO BEGIN
update tzcrew.Ticker Set Ticker.last_tick=UNIX_TIMESTAMP();
update tzcrew.Ticker Set Ticker.diffrence=Ticker.last_tick-Ticker.complete;
#where Ticker.id=1;
#if ticker > build time -> add ship to player.
#else just update ticker
END//
DELIMITER ;

-- Dumping database structure for tzcrew
CREATE DATABASE IF NOT EXISTS `tzcrew` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `tzcrew`;

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
  `prize_metal` int(10) unsigned NOT NULL DEFAULT 0 COMMENT 'hull * hull_rege + firepower/2 + shield/2 * shield_rege;',
  `prize_fuel` int(10) unsigned NOT NULL DEFAULT 0 COMMENT 'hull/2 *hull_rege + firepower + shield * shield_rege;',
  `prize_diamond` int(10) unsigned NOT NULL DEFAULT 0 COMMENT 'prize_diamond=(hull * shield) * ((hull_rege +shield_rege)/2) + firepower;',
  `prize_cash` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT 'prize_cash=(hull * hull_rege + firepower + shield * shield_rege) * prize_diamond; ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tzcrew.Ship: 43 rows
DELETE FROM `Ship`;
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
	(7, 'Mistrix', 220, 400, 560, 15, 5, 5910, 7620, 2240220, 20206784400);
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
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(23, 'Lusta', 50, 50, 50, 2, 2, 175, 200, 5050, 1262500);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(24, 'Snier', 320, 220, 500, 4, 1, 1100, 1450, 275320, 468044000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(25, 'Wielder', 500, 550, 900, 2, 1, 1700, 2050, 743000, 1857500000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(26, 'Canodal', 750, 200, 400, 1, 4, 2075, 1750, 200750, 511912500);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(27, 'Purkis', 7, 2, 5, 1, 1, 10, 12, 17, 238);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(28, 'Lestier', 85, 30, 60, 3, 4, 328, 295, 6385, 2649775);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(29, 'Brutax', 15, 2, 50, 1, 1, 59, 42, 115, 7705);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(30, 'Rakarar', 1, 1, 1, 1, 1, 2, 3, 2, 6);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(31, 'Vurthum', 950, 30, 100, 5, 1, 650, 1150, 9950, 11940000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(32, 'Lisp', 100, 100, 100, 1, 1, 200, 250, 10100, 3030000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(33, 'Dragonah', 750, 220, 450, 1, 15, 7235, 4345, 792750, 6120030000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(34, 'Tuskier', 220, 550, 550, 5, 5, 4235, 4345, 1512720, 8652758400);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(35, 'Jurak', 320, 180, 850, 2, 3, 2890, 1955, 382820, 1236508600);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(36, 'Metanix', 720, 60, 700, 1, 5, 3890, 2530, 126720, 542361600);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(37, 'Nostair', 25, 5, 5, 2, 3, 33, 43, 88, 4375);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(38, 'Orakor', 55, 20, 800, 15, 15, 12178, 6355, 240055, 2965879525);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(39, 'Suntonux', 250, 78, 350, 5, 3, 1370, 1165, 109450, 184970500);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(40, 'Urukaaah', 50, 25, 1000, 1, 30, 30038, 15075, 387550, 11655566250);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(41, 'Umakg', 15, 22, 6, 3, 2, 53, 87, 345, 32085);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(42, 'Vieltor', 50, 10, 10, 10, 5, 125, 175, 800, 160000);
INSERT INTO `Ship` (`id`, `name_id`, `firepower`, `shield`, `hull`, `shield_rege`, `hull_rege`, `prize_metal`, `prize_fuel`, `prize_diamond`, `prize_cash`) VALUES
	(43, 'Vielter', 10, 50, 10, 15, 1, 390, 765, 4010, 3087700);

-- Dumping structure for näkymä tzcrew.z_Build_ship_view_bases
DROP VIEW IF EXISTS `z_Build_ship_view_bases`;
-- Luodaan tilapäinen taulu VIEW-riippuvuusvirheiden voittamiseksi
CREATE TABLE `z_Build_ship_view_bases` (
	`Ships_to_build` VARCHAR(45) NOT NULL COLLATE 'latin1_swedish_ci',
	`Base` VARCHAR(45) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for näkymä tzcrew.z_show_bigger_complete_vs_complete
DROP VIEW IF EXISTS `z_show_bigger_complete_vs_complete`;
-- Luodaan tilapäinen taulu VIEW-riippuvuusvirheiden voittamiseksi
CREATE TABLE `z_show_bigger_complete_vs_complete` (
	`id` INT(11) UNSIGNED NOT NULL,
	`tick` INT(11) UNSIGNED NULL,
	`player` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`building` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`complete` INT(11) NULL,
	`last_tick` INT(11) NULL,
	`diffrence` BIGINT(12) NULL
) ENGINE=MyISAM;

-- Dumping structure for näkymä tzcrew.z_Show_smaller_complete_vs_las_tick
DROP VIEW IF EXISTS `z_Show_smaller_complete_vs_las_tick`;
-- Luodaan tilapäinen taulu VIEW-riippuvuusvirheiden voittamiseksi
CREATE TABLE `z_Show_smaller_complete_vs_las_tick` (
	`id` INT(11) UNSIGNED NOT NULL,
	`tick` INT(11) UNSIGNED NULL,
	`player` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`building` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`complete` INT(11) NULL,
	`last_tick` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for näkymä tzcrew.z_Build_ship_view_bases
DROP VIEW IF EXISTS `z_Build_ship_view_bases`;
-- Poistetaan tilapäinen taulu ja luodaan lopullinen VIEW-rakenne
DROP TABLE IF EXISTS `z_Build_ship_view_bases`;
CREATE ALGORITHM=UNDEFINED DEFINER=`tzcrew`@`127.0.0.1` SQL SECURITY DEFINER VIEW `tzcrew`.`z_Build_ship_view_bases` AS select `tzcrew`.`Ship`.`name_id` AS `Ships_to_build`,`tzcrew`.`Account`.`base` AS `Base` from ((`tzcrew`.`Ship` join `tzcrew`.`Base`) join `tzcrew`.`Account`) where ((`tzcrew`.`Account`.`base` = `tzcrew`.`Base`.`base`) and (`tzcrew`.`Base`.`metal` >= `tzcrew`.`Ship`.`prize_metal`) and (`tzcrew`.`Base`.`diamond` >= `tzcrew`.`Ship`.`prize_diamond`) and (`tzcrew`.`Base`.`fuel` >= `tzcrew`.`Ship`.`prize_fuel`)) order by `tzcrew`.`Account`.`base`;

-- Dumping structure for näkymä tzcrew.z_show_bigger_complete_vs_complete
DROP VIEW IF EXISTS `z_show_bigger_complete_vs_complete`;
-- Poistetaan tilapäinen taulu ja luodaan lopullinen VIEW-rakenne
DROP TABLE IF EXISTS `z_show_bigger_complete_vs_complete`;
CREATE ALGORITHM=TEMPTABLE DEFINER=`tzcrew`@`127.0.0.1` SQL SECURITY DEFINER VIEW `tzcrew`.`z_show_bigger_complete_vs_complete` AS select `tzcrew`.`Ticker`.`id` AS `id`,`tzcrew`.`Ticker`.`tick` AS `tick`,`tzcrew`.`Ticker`.`player` AS `player`,`tzcrew`.`Ticker`.`building` AS `building`,`tzcrew`.`Ticker`.`complete` AS `complete`,`tzcrew`.`Ticker`.`last_tick` AS `last_tick`,(`tzcrew`.`Ticker`.`last_tick` - `tzcrew`.`Ticker`.`complete`) AS `diffrence` from `tzcrew`.`Ticker` where (`tzcrew`.`Ticker`.`complete` > `tzcrew`.`Ticker`.`last_tick`);

-- Dumping structure for näkymä tzcrew.z_Show_smaller_complete_vs_las_tick
DROP VIEW IF EXISTS `z_Show_smaller_complete_vs_las_tick`;
-- Poistetaan tilapäinen taulu ja luodaan lopullinen VIEW-rakenne
DROP TABLE IF EXISTS `z_Show_smaller_complete_vs_las_tick`;
CREATE ALGORITHM=TEMPTABLE DEFINER=`tzcrew`@`127.0.0.1` SQL SECURITY DEFINER VIEW `tzcrew`.`z_Show_smaller_complete_vs_las_tick` AS select `tzcrew`.`Ticker`.`id` AS `id`,`tzcrew`.`Ticker`.`tick` AS `tick`,`tzcrew`.`Ticker`.`player` AS `player`,`tzcrew`.`Ticker`.`building` AS `building`,`tzcrew`.`Ticker`.`complete` AS `complete`,`tzcrew`.`Ticker`.`last_tick` AS `last_tick` from `tzcrew`.`Ticker` where (`tzcrew`.`Ticker`.`complete` < `tzcrew`.`Ticker`.`last_tick`);

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
