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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='User';

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
