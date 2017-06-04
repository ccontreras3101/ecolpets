
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2017 a las 17:46:34
-- Versión del servidor: 10.0.28-MariaDB-wsrep
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u664353887_ecolp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE IF NOT EXISTS `mascotas` (
  `mascotas_id` int(7) NOT NULL AUTO_INCREMENT,
  `mascotas_nombre` varchar(50) NOT NULL,
  `mascotas_peso` int(11) NOT NULL,
  `mascotas_tipo` varchar(55) NOT NULL,
  `mascotas_raza` varchar(55) NOT NULL,
  `propietarios_id` int(11) NOT NULL,
  PRIMARY KEY (`mascotas_id`),
  KEY `propietarios_id` (`propietarios_id`),
  KEY `mascotas_tipo` (`mascotas_tipo`,`mascotas_raza`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Tabla de Mascotas' AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`mascotas_id`, `mascotas_nombre`, `mascotas_peso`, `mascotas_tipo`, `mascotas_raza`, `propietarios_id`) VALUES
(1, 'katira 2.0', 8, 'Canino', 'Criollo', 1),
(2, 'scully', 35, 'Canino', 'Bull Terrier', 2),
(19, 'Katana', 80, 'Canino', 'Beagle', 1),
(20, 'nueva', 25, 'Felino', 'Domestico', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
  `planes_id` int(1) NOT NULL AUTO_INCREMENT,
  `planes_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`planes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Planes de servicios' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`planes_id`, `planes_nombre`) VALUES
(1, 'INDIVIDUAL'),
(2, 'COLECTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE IF NOT EXISTS `procesos` (
  `procesos_id` int(7) NOT NULL AUTO_INCREMENT,
  `planes_id` int(1) NOT NULL,
  `mascotas_id` int(7) NOT NULL,
  `propietarios_id` int(11) NOT NULL,
  `referidos_id` int(7) NOT NULL,
  `fecha_ing` date NOT NULL,
  `fecha_serv` date NOT NULL,
  `obs` varchar(255) NOT NULL,
  `procesos_libro` int(5) NOT NULL,
  `procesos_pagina` int(5) NOT NULL,
  `procesos_linea` int(5) NOT NULL,
  PRIMARY KEY (`procesos_id`),
  KEY `planes_id` (`planes_id`,`mascotas_id`,`propietarios_id`,`referidos_id`),
  KEY `propietarios_id` (`propietarios_id`),
  KEY `mascotas_id` (`mascotas_id`),
  KEY `referidos_id` (`referidos_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='procesos realizados' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`procesos_id`, `planes_id`, `mascotas_id`, `propietarios_id`, `referidos_id`, `fecha_ing`, `fecha_serv`, `obs`, `procesos_libro`, `procesos_pagina`, `procesos_linea`) VALUES
(1, 2, 1, 2, 8, '2017-01-16', '2017-01-17', 'poliza colectiva 2.0', 1, 10, 8),
(2, 1, 20, 24, 29, '2017-02-05', '2017-02-05', 'nuevo registro de prueba', 1, 5, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE IF NOT EXISTS `propietarios` (
  `propietarios_id` int(11) NOT NULL AUTO_INCREMENT,
  `propietarios_doc` int(11) NOT NULL,
  `propietarios_nombre` varchar(50) NOT NULL,
  `propietarios_apellido` varchar(50) NOT NULL,
  `propietarios_telf` varchar(20) NOT NULL,
  `propietarios_email` varchar(55) NOT NULL,
  PRIMARY KEY (`propietarios_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Tabla de propietarios' AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`propietarios_id`, `propietarios_doc`, `propietarios_nombre`, `propietarios_apellido`, `propietarios_telf`, `propietarios_email`) VALUES
(1, 6326095, 'MIREYA', 'ARELLANO DE CONTRERAS', '2147483647', 'mireyarellanodc@hotmail.com'),
(2, 9412468, 'CAMILO', 'CONTRERAS', '2147483647', 'contreras.camilo@gmail.com'),
(21, 2147483647, 'Fernando', 'Zapata', '+541234567887', 'fer@gmail.com'),
(22, 19153540, 'Aaron', 'contreras Arellano', '+584124685244', 'k'),
(23, 9412468, 'CAMILO', 'CONTRERAS', '2147483647', 'contreras.camilo@gmail.com'),
(24, 6326095, 'MIREYA', 'ARELLANO DE CONTRERAS', '2147483647', 'mireyarellanodc@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referidos`
--

CREATE TABLE IF NOT EXISTS `referidos` (
  `referidos_id` int(7) NOT NULL AUTO_INCREMENT,
  `referidos_nombre` varchar(50) NOT NULL,
  `referidos_telf` varchar(20) NOT NULL,
  `referidos_email` varchar(50) NOT NULL,
  PRIMARY KEY (`referidos_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Personas o instituciones que refieren la mascota' AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `referidos`
--

INSERT INTO `referidos` (`referidos_id`, `referidos_nombre`, `referidos_telf`, `referidos_email`) VALUES
(8, 'Mireya', '+584141266763', 'pielcuidada@gmail.com'),
(12, 'Camilo Contreras', '8762727070', 'contreras.camilo@gmail.com'),
(29, 'Nuevo referente', '+123456789', 'asdf@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id_tipo` int(5) NOT NULL AUTO_INCREMENT,
  `tipo_mascota` varchar(55) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `tipo_mascota`) VALUES
(1, 'Canino'),
(2, 'Felino'),
(5, 'Roedor'),
(6, 'Reptil'),
(10, 'Otros');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
