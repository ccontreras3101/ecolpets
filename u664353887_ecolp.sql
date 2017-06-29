-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2017 a las 03:51:06
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecolpets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE `comision` (
  `comision_id` int(2) NOT NULL,
  `comision_tipo` varchar(50) NOT NULL,
  `comision_porc` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Comisiones';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `devolucion_id` int(2) NOT NULL,
  `devolucion_nombre` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`devolucion_id`, `devolucion_nombre`) VALUES
(1, 'Si'),
(2, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `mascotas_id` int(7) NOT NULL,
  `mascotas_nombre` varchar(50) NOT NULL,
  `mascotas_peso` float(6,3) DEFAULT NULL,
  `id_tipo` int(2) NOT NULL,
  `mascotas_raza` varchar(55) DEFAULT NULL,
  `mascotas_fdef` varchar(11) NOT NULL,
  `mascotas_edad` int(3) DEFAULT NULL,
  `propietarios_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabla de Mascotas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `planes_id` int(1) NOT NULL,
  `planes_nombre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Planes de servicios';

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`planes_id`, `planes_nombre`) VALUES
(1, 'INDIVIDUAL'),
(2, 'INDIVIDUAL PRESENCIAL'),
(3, 'COLECTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `procesos_id` int(7) NOT NULL,
  `planes_id` int(1) NOT NULL,
  `mascotas_id` int(7) NOT NULL,
  `propietarios_id` int(11) NOT NULL,
  `referidos_id` int(7) NOT NULL,
  `fecha_ing` varchar(11) NOT NULL,
  `fecha_serv` varchar(11) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `procesos_libro` int(5) NOT NULL,
  `procesos_pagina` int(5) NOT NULL,
  `procesos_linea` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='procesos realizados';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `propietarios_id` int(11) NOT NULL,
  `propietarios_nombre` varchar(50) DEFAULT NULL,
  `propietarios_apellido` varchar(50) DEFAULT NULL,
  `propietarios_telf` varchar(20) DEFAULT NULL,
  `propietarios_email` varchar(55) DEFAULT NULL,
  `propietarios_cel` varchar(20) NOT NULL,
  `propietarios_dir` varchar(250) NOT NULL,
  `propietarios_doc` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabla de propietarios';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion`
--

CREATE TABLE `recepcion` (
  `recepcion_id` int(7) NOT NULL,
  `procesos_id` int(7) NOT NULL,
  `referidos_id` int(7) NOT NULL,
  `propietarios_id` int(7) NOT NULL,
  `mascotas_id` int(7) DEFAULT NULL,
  `devolucion_id` int(2) DEFAULT NULL,
  `planes_id` int(2) NOT NULL,
  `urna_id` int(4) DEFAULT NULL,
  `id_tipo` int(2) NOT NULL,
  `recepcion_fecha` varchar(11) DEFAULT NULL,
  `fecha_programada` varchar(11) DEFAULT NULL,
  `hora_programada` varchar(10) NOT NULL,
  `cod_registro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Recepcion de Mascotas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referidos`
--

CREATE TABLE `referidos` (
  `referidos_id` int(7) NOT NULL,
  `cod_registro` varchar(20) NOT NULL,
  `referidos_nombre` varchar(50) NOT NULL,
  `referidos_telf` varchar(20) NOT NULL,
  `referidos_email` varchar(50) NOT NULL,
  `referidos_dir` varchar(250) NOT NULL,
  `referidos_nit` varchar(20) NOT NULL,
  `referidos_rep` varchar(50) NOT NULL,
  `referidos_ced` varchar(20) NOT NULL,
  `comision_id` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Personas o instituciones que refieren la mascota';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `select`
--

CREATE TABLE `select` (
  `select_id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `select`
--

INSERT INTO `select` (`select_id`, `tipo`) VALUES
(1, 'Empresas'),
(2, 'Particulares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id_tipo` int(5) NOT NULL,
  `tipo_mascota` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `tipo_mascota`) VALUES
(1, 'Canino'),
(2, 'Felino'),
(5, 'Roedor'),
(6, 'Reptil'),
(11, 'Aves'),
(14, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urnas`
--

CREATE TABLE `urnas` (
  `urna_id` int(4) NOT NULL,
  `urna_nombre` varchar(50) NOT NULL,
  `urna_descript` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tipos de Urnas';

--
-- Volcado de datos para la tabla `urnas`
--

INSERT INTO `urnas` (`urna_id`, `urna_nombre`, `urna_descript`) VALUES
(1, 'BASICA', 'CARTON'),
(2, 'MADERA', 'MADERA'),
(3, 'METAL', 'LATON'),
(4, 'CERAMICA', 'COCIDA'),
(5, 'MARMOL', 'SUPER LUJO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comision`
--
ALTER TABLE `comision`
  ADD PRIMARY KEY (`comision_id`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`devolucion_id`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`mascotas_id`),
  ADD KEY `propietarios_id` (`propietarios_id`),
  ADD KEY `mascotas_tipo` (`id_tipo`,`mascotas_raza`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`planes_id`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`procesos_id`),
  ADD KEY `planes_id` (`planes_id`,`mascotas_id`,`propietarios_id`,`referidos_id`),
  ADD KEY `propietarios_id` (`propietarios_id`),
  ADD KEY `mascotas_id` (`mascotas_id`),
  ADD KEY `referidos_id` (`referidos_id`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`propietarios_id`);

--
-- Indices de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  ADD PRIMARY KEY (`recepcion_id`),
  ADD UNIQUE KEY `procesos_id` (`procesos_id`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `urna_id` (`urna_id`),
  ADD KEY `planes_id` (`planes_id`),
  ADD KEY `devolucion_id` (`devolucion_id`),
  ADD KEY `mascotas_id` (`mascotas_id`),
  ADD KEY `propietarios_id` (`propietarios_id`),
  ADD KEY `referidos_id` (`referidos_id`);

--
-- Indices de la tabla `referidos`
--
ALTER TABLE `referidos`
  ADD PRIMARY KEY (`referidos_id`);

--
-- Indices de la tabla `select`
--
ALTER TABLE `select`
  ADD PRIMARY KEY (`select_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `urnas`
--
ALTER TABLE `urnas`
  ADD PRIMARY KEY (`urna_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comision`
--
ALTER TABLE `comision`
  MODIFY `comision_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `devolucion_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `mascotas_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `planes_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `procesos_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `propietarios_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  MODIFY `recepcion_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `referidos`
--
ALTER TABLE `referidos`
  MODIFY `referidos_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `select`
--
ALTER TABLE `select`
  MODIFY `select_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `urnas`
--
ALTER TABLE `urnas`
  MODIFY `urna_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
