Práctica de PHP
===============

Práctica de PHP de Lenguajes y estándares web.

##Crear las tablas de la base de datos##

	CREATE DATABASE IF NOT EXISTS `login`;
	
	CREATE TABLE IF NOT EXISTS `login`.`users` (
	  `user_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
	  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name',
	  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
	  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email',
	  PRIMARY KEY (`user_id`),
	  UNIQUE KEY `user_name` (`user_name`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=1 ;
