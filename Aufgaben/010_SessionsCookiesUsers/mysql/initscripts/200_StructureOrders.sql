-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';

USE `mensa`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `refmenue` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `dateorder` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `refmenue` (`refmenue`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`refmenue`) REFERENCES `menue` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2019-11-27 16:24:13