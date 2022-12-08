-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';

USE `mensa`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `menue`;
CREATE TABLE `menue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext CHARACTER SET utf8mb4 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `preis` float NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2019-11-27 16:24:42
