# Simple Quiz XSLT Solver

This app allows to solve Moodle quizs using XSLT, XML and PHP.

## Overview

La página dispone de un sistema de registro de usuarios. Para este sistema se utiliza una librería externa. El sistema de registro de usuarios realiza conexiones a una base de datos MySQL, donde los almacena.

Todos los archivos del proyecto utilizan el sistema de versiones GIT proporcionado por Github.

Para la apariencia de la página se utilizan las hojas de estilos y javascript del CDN de Bootstrap.

La validación de los archivos xml subidos (y del que ya se encuentra en el servidor) se realiza utilizando xslt y las funciones de procesado de XML para PHP. Se genera un formulario que es enviado a la página resolve-test.php y esta página es la encargada de procesar los resultados, mostrándolos y almacenando la puntuación obtenida, la fecha y el usuario.

## Localización

Para la localización de los textos del sitio se ha utilizado gettext() de PHP, pudiendo el usuario establecer el idioma que desee pulsando los botones que hay al pie de la página. Por otro lado, se establece el idioma por defecto basado en los idiomas establecidos en el navegador del visitante (por consentimiento). Este tipo de localización se realiza enviando una cookie con el idioma. Esta cookie se actualiza cuando el usuario pulsa uno de los botones del pie.

El archivo encargado de la localización es el /config/load-language.php.

Se han incluido traducciones en Español e Inglés en los archivos po y mo del directorio locale. De esta forma añadir nuevas traducciones supondrá poco esfuerzo.

## Base de datos

Los datos de los tests realizados por los usuarios se almacenan en la base de datos mySQL de la aplicación, así como los usuarios registrados en ella. Cada usuario puede acceder a sus tests desde la página "Mi Cuenta".

### Crear las tablas de la base de datos

	CREATE DATABASE IF NOT EXISTS `login`;
	
	CREATE TABLE IF NOT EXISTS `login`.`users` (
	  `user_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
	  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name',
	  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
	  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email',
	  PRIMARY KEY (`user_id`),
	  UNIQUE KEY `user_name` (`user_name`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=1 ;

## Otros

Se ha utilizado mod_rewrite de Apache para ocultar las extensiones de las páginas (php) y de esta manera ocultar al visitante el lenguaje en el que está programado el sitio para mejorar la seguridad.

Se ha incluido un archivo css reset para anular los estilos por defecto de los navegadores.
