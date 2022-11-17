CREATE TABLE `menue` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `title` tinytext NOT NULL,                    
  `description` varchar(255) NOT NULL,
  `preis` float NOT NULL,
  `active` tinyint NOT NULL                --  Ist das Menü bestellbar?
);