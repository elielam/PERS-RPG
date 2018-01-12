CREATE TABLE IF NOT EXISTS `characters` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `life` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `degat` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `armor` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type` varchar(50) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;