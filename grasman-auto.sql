-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2022 a las 09:29:27
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grasman-auto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `vehiculoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `name`, `vehiculoId`) VALUES
(46, ' f7cf7ed037613b2987abd73358fbd5bf.jpg', 46),
(47, ' 192149180c090cfef71c79920c88c3ed.jpg', 46),
(48, ' b07f95b93ffad51bec37fb71ff55abd3.jpg', 46),
(49, ' dc3b8b2552e0720b30a7d1309e0435c7.jpg', 47),
(50, ' a1dab44a30734686fea363573b73d4da.jpg', 47),
(51, ' 3a768a804c583c64be9d1545b426f181.jpg', 47),
(73, ' 71514dfef46baf7da746f62cebbafaaf.jpg', 55),
(74, ' 6c8dbd3e8562d72fc61165a223586711.jpg', 55),
(75, ' cfea1980a85d0fa3e1c5b9dd41568655.jpg', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `confirmado` tinyint(1) NOT NULL,
  `token` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `confirmado`, `token`) VALUES
(1, 'Administrador', 'admin@correo.com', '$2y$10$teDYsrPQcdHOrWB5q2mKpO9MA3jFzAoEKa7UeGxsOtztlZfYd5mOK', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `patente` varchar(10) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `year` int(15) NOT NULL,
  `combustible` varchar(30) NOT NULL,
  `caja` varchar(30) NOT NULL,
  `precio` int(15) NOT NULL,
  `km` int(30) NOT NULL,
  `descripcion` longtext NOT NULL,
  `visible` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `patente`, `tipo`, `estado`, `marca`, `modelo`, `year`, `combustible`, `caja`, `precio`, `km`, `descripcion`, `visible`) VALUES
(46, ' asd123', 'Auto', 'Nuevo', 'Ford', 'Fiesta', 1235, 'Nafta', 'Manual', 7895465, 788966541, 'sal asd dlkjlakjslkdjkas a sdlakjdlkjadljas a d sadsadñksalññaskd ', '1'),
(47, ' asdasdas', 'Pickup', 'Nuevo', 'asdasd', 'asdad', 34242, 'Gasoil', 'Manual', 42343242, 3242423, 'asdad sad asdasdsadasdas d dsa as  sadad sa adas d', '1'),
(55, ' asdasdas', 'Pickup', 'Nuevo', 'asdasd', 'asdad', 34242, 'Gasoil', 'Manual', 42343242, 3242423, 'asdad sad asdasdsadasdas d dsa as  sadad sa adas d', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculoId` (`vehiculoId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`vehiculoId`) REFERENCES `vehiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
