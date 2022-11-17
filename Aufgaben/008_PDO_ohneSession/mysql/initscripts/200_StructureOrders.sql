-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,                    -- Die haben wir ja im Moment noch nicht, einfach faken
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `refmenue` int(11) NOT NULL,
  `status` tinyint NOT NULL,
  `dateorder` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `refmenue` (`refmenue`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`refmenue`) REFERENCES `menue` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2019-10-17 16:07:12