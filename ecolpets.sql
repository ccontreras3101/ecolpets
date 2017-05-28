-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2017 a las 04:36:15
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
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `mascotas_id` int(7) NOT NULL,
  `mascotas_nombre` varchar(50) NOT NULL,
  `mascotas_peso` int(11) NOT NULL,
  `mascotas_tipo` varchar(55) NOT NULL,
  `mascotas_raza` varchar(55) NOT NULL,
  `propietarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Mascotas';

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

CREATE TABLE `planes` (
  `planes_id` int(1) NOT NULL,
  `planes_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Planes de servicios';

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

CREATE TABLE `procesos` (
  `procesos_id` int(7) NOT NULL,
  `planes_id` int(1) NOT NULL,
  `mascotas_id` int(7) NOT NULL,
  `propietarios_id` int(11) NOT NULL,
  `referidos_id` int(7) NOT NULL,
  `fecha_ing` date NOT NULL,
  `fecha_serv` date NOT NULL,
  `obs` varchar(255) NOT NULL,
  `procesos_libro` int(5) NOT NULL,
  `procesos_pagina` int(5) NOT NULL,
  `procesos_linea` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='procesos realizados';

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

CREATE TABLE `propietarios` (
  `propietarios_id` int(11) NOT NULL,
  `propietarios_doc` int(11) NOT NULL,
  `propietarios_nombre` varchar(50) NOT NULL,
  `propietarios_apellido` varchar(50) NOT NULL,
  `propietarios_telf` varchar(20) NOT NULL,
  `propietarios_email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de propietarios';

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

CREATE TABLE `referidos` (
  `referidos_id` int(7) NOT NULL,
  `referidos_nombre` varchar(50) NOT NULL,
  `referidos_telf` varchar(20) NOT NULL,
  `referidos_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Personas o instituciones que refieren la mascota';

--
-- Volcado de datos para la tabla `referidos`
--

INSERT INTO `referidos` (`referidos_id`, `referidos_nombre`, `referidos_telf`, `referidos_email`) VALUES
(8, 'Mireya', '+584141266763', 'pielcuidada@gmail.com'),
(12, 'Camilo Contreras', '8762727070', 'contreras.camilo@gmail.com'),
(28, 'su mama', '+584141266763', 'mireyarellanodc@hotmail.com'),
(29, 'Nuevo referente', '+123456789', 'asdf@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id_tipo` int(5) NOT NULL,
  `tipo_mascota` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `tipo_mascota`) VALUES
(1, 'Canino'),
(2, 'Felino'),
(5, 'Roedor'),
(6, 'Reptil'),
(10, 'Otros');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`mascotas_id`),
  ADD KEY `propietarios_id` (`propietarios_id`),
  ADD KEY `mascotas_tipo` (`mascotas_tipo`,`mascotas_raza`);

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
-- Indices de la tabla `referidos`
--
ALTER TABLE `referidos`
  ADD PRIMARY KEY (`referidos_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `mascotas_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `planes_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `procesos_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `propietarios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `referidos`
--
ALTER TABLE `referidos`
  MODIFY `referidos_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD CONSTRAINT `procesos_ibfk_1` FOREIGN KEY (`propietarios_id`) REFERENCES `propietarios` (`propietarios_id`),
  ADD CONSTRAINT `procesos_ibfk_2` FOREIGN KEY (`mascotas_id`) REFERENCES `mascotas` (`mascotas_id`),
  ADD CONSTRAINT `procesos_ibfk_3` FOREIGN KEY (`referidos_id`) REFERENCES `referidos` (`referidos_id`),
  ADD CONSTRAINT `procesos_ibfk_4` FOREIGN KEY (`planes_id`) REFERENCES `planes` (`planes_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
