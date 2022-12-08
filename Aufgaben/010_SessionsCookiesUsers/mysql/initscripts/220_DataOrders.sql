-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

TRUNCATE `orders`;
INSERT INTO `orders` (`id`, `userid`, `username`, `email`, `comment`, `refmenue`, `status`, `dateorder`) VALUES
(1,	12,	'TestBestellung1',	'TestBestellung1@bztf.ch',	'Mein Kommentar',	1,	0,	'2019-11-26 20:12:38'),
(2,	79,	'TestBestellung2',	'TestBestellung2@bztf.ch',	'Mein Kommentar',	2,	0,	'2019-11-26 20:12:38'),
(3,	12,	'TestBestellung3',	'TestBestellung3@bztf.ch',	'Mein Kommentar',	3,	0,	'2019-11-26 20:12:38'),
(4,	79,	'TestBestellung4',	'TestBestellung4@bztf.ch',	'Mein Kommentar',	4,	0,	'2019-11-26 20:12:38'),
(5,	12,	'TestBestellung5',	'TestBestellung5@bztf.ch',	'Mein Kommentar',	1,	0,	'2019-11-26 20:12:38'),
(6,	79,	'TestBestellung6',	'TestBestellung6@bztf.ch',	'Mein Kommentar',	2,	2,	'2019-11-26 20:13:13');

-- 2019-11-27 16:25:30