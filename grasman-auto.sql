-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2022 a las 07:28:51
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
  `imagen` varchar(200) NOT NULL,
  `vehiculoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `imagen`, `vehiculoId`) VALUES
(1, ' 314b4d900137851f71a31a7a84d2364f.jpg', 0),
(2, ' 1a0e253f0b1fbb7e2b54f00e982a5fa3.jpg', 0),
(3, ' 45497dacefa3d0f147f92275ef860b13.jpg', 0),
(4, ' 163a348a7309de06da1fdcac4815020e.jpg', 0);

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
  `descripcion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `patente`, `tipo`, `estado`, `marca`, `modelo`, `year`, `combustible`, `caja`, `precio`, `km`, `descripcion`) VALUES
(4, ' ida123', 'Pickup', 'Usado', 'Chevrolet', 'Astra', 2005, 'GNC', 'Automática', 1000000, 665555, 'Listrisoasd ioajoijsad  asidj sdija oija osdj oai  jijojoij oijoasdñl{ña asd asñd{l {ñasl {ñl {l{l{asd assadasda '),
(5, ' poi123', 'Auto', 'Usado', 'Ford', 'Fiesta', 2005, 'GNC', 'Manual', 956500, 965000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem excepturi ducimus amet assumenda ab quo fuga obcaecati molestiae perferendis dicta alias, eligendi voluptas eveniet omnis natus? Rem perspiciatis dolorem earum. '),
(6, ' poivbn245', 'Pickup', 'Usado', 'Fiat', 'Toro', 2015, 'Nafta', 'Automática', 9500000, 70000, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.  '),
(31, ' asdzxc', 'Auto', 'Nuevo', 'asdzxc', '234', 213213, 'Nafta', 'Manual', 34324234, 32423423, '4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd4234dasd ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
