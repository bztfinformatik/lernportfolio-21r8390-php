-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

TRUNCATE `menue`;
INSERT INTO `menue` (`id`, `title`, `description`, `preis`, `active`) VALUES
(1,	'Spaghetti Bolognese',	'Mit Hackfleisch aus der Schweiz, Käse inkl.',	10.5,	1),
(2,	'Spaghetti Carbonara',	'Mit Eier, Mehl - kann Gluten enthalten',	9.5,	1),
(3,	'Pizza Magherita',	'Marke Gummiadler',	7.5,	1),
(4,	'Classic Sashimi',	'(9. Stk), Lachs, Thunfisch, Hamachi',	30,	0),
(5,	'Umlaute Test äèö etc.',	'Nur ein Test',	100,	0);

-- 2019-11-27 16:25:11