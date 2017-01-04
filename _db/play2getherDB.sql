# ************************************************************
# PLAY2GETHER V2 DB
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Ad
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Ad`;

CREATE TABLE `Ad` (
  `id_ad` int(8) NOT NULL AUTO_INCREMENT,
  `creator_fk` int(8) NOT NULL,
  `sport_fk` int(8) NOT NULL,
  `status_fk` int(8) NOT NULL DEFAULT '2',
  `title` varchar(40) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `max_players` int(11) NOT NULL,
  `city_fk` int(8) unsigned NOT NULL,
  PRIMARY KEY (`id_ad`),
  KEY `ad_status_fk` (`status_fk`),
  KEY `ad_city_fk` (`city_fk`),
  KEY `ad_user_fk` (`creator_fk`),
  KEY `ad_sport_fk` (`sport_fk`),
  CONSTRAINT `ad_sport_fk` FOREIGN KEY (`sport_fk`) REFERENCES `Sport` (`id_sport`) ON UPDATE CASCADE,
  CONSTRAINT `ad_city_fk` FOREIGN KEY (`city_fk`) REFERENCES `City` (`id_city`) ON UPDATE CASCADE,
  CONSTRAINT `ad_status_fk` FOREIGN KEY (`status_fk`) REFERENCES `Status` (`id_status`) ON UPDATE CASCADE,
  CONSTRAINT `ad_user_fk` FOREIGN KEY (`creator_fk`) REFERENCES `User` (`id_user`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table City
# ------------------------------------------------------------

DROP TABLE IF EXISTS `City`;

CREATE TABLE `City` (
  `id_city` int(8) unsigned NOT NULL,
  `department_fk` varchar(3) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_city`),
  KEY `city_departement_fk` (`department_fk`),
  CONSTRAINT `city_departement_fk` FOREIGN KEY (`department_fk`) REFERENCES `Department` (`id_department`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Comment`;

CREATE TABLE `Comment` (
  `id_comment` int(8) NOT NULL AUTO_INCREMENT,
  `author_fk` int(8) NOT NULL,
  `ad_fk` int(11) NOT NULL,
  `content` text NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comment`),
  KEY `comment_user_fk` (`author_fk`),
  KEY `comment_ad_fk` (`ad_fk`),
  CONSTRAINT `comment_ad_fk` FOREIGN KEY (`ad_fk`) REFERENCES `Ad` (`id_ad`) ON UPDATE CASCADE,
  CONSTRAINT `comment_user_fk` FOREIGN KEY (`author_fk`) REFERENCES `User` (`id_user`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Department
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Department`;

CREATE TABLE `Department` (
  `id_department` varchar(3) NOT NULL DEFAULT '',
  `region_fk` varchar(2) DEFAULT '',
  `name` char(32) NOT NULL,
  PRIMARY KEY (`id_department`),
  KEY `department_region_fk` (`region_fk`),
  CONSTRAINT `department_region_fk` FOREIGN KEY (`region_fk`) REFERENCES `Region` (`id_region`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Region
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Region`;

CREATE TABLE `Region` (
  `id_region` varchar(2) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Sport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Sport`;

CREATE TABLE `Sport` (
  `id_sport` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_sport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Status`;

CREATE TABLE `Status` (
  `id_status` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table User
# ------------------------------------------------------------

DROP TABLE IF EXISTS `User`;

CREATE TABLE `User` (
  `id_user` int(8) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birth_date` date NOT NULL,
  `city_fk` int(8) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `date_joigned` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `number` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  KEY `user_city_fk` (`city_fk`),
  CONSTRAINT `user_city_fk` FOREIGN KEY (`city_fk`) REFERENCES `City` (`id_city`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table UserAd
# ------------------------------------------------------------

DROP TABLE IF EXISTS `UserAd`;

CREATE TABLE `UserAd` (
  `user_fk` int(8) NOT NULL,
  `ad_fk` int(8) NOT NULL,
  PRIMARY KEY (`user_fk`,`ad_fk`),
  KEY `userad_ad_fk` (`ad_fk`),
  CONSTRAINT `userad_ad_fk` FOREIGN KEY (`ad_fk`) REFERENCES `Ad` (`id_ad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `userad_user_fk` FOREIGN KEY (`user_fk`) REFERENCES `User` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table UserSport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `UserSport`;

CREATE TABLE `UserSport` (
  `sport_fk` int(8) NOT NULL,
  `user_fk` int(8) NOT NULL,
  PRIMARY KEY (`sport_fk`,`user_fk`),
  KEY `usersport_user_fk` (`user_fk`),
  CONSTRAINT `usersport_user_fk` FOREIGN KEY (`user_fk`) REFERENCES `User` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usersport_sport_fk` FOREIGN KEY (`sport_fk`) REFERENCES `Sport` (`id_sport`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# EVENTS
SET GLOBAL event_scheduler = ON;

DELIMITER |

CREATE EVENT update_status_ad
    ON SCHEDULE EVERY 1 DAY
    DO
      BEGIN
        UPDATE Ad SET status_fk=1 WHERE date < CURRENT_TIMESTAMP;
      END |

DELIMITER ;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;