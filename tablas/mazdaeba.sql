-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 23:58:32
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mazdaeba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos_herramientas`
--

CREATE TABLE `prestamos_herramientas` (
  `id` int(11) NOT NULL,
  `nombre_empleado` varchar(100) NOT NULL,
  `numero_folio` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `herramienta` varchar(100) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos_herramientas`
--

INSERT INTO `prestamos_herramientas` (`id`, `nombre_empleado`, `numero_folio`, `fecha_prestamo`, `fecha_entrega`, `estado`, `sku`, `herramienta`, `cantidad`) VALUES
(4, 'jose ', 34, '2024-10-31', '2024-11-07', 'Entregado', 'herramienta', 'martillo', 2),
(9, 'Jose Roberto', 5, '2024-11-07', '2024-11-12', 'Entregado', 'Material', 'Guantes ', 10),
(10, 'Carlos', 13, '2024-11-06', '2024-11-13', 'Entregado', 'Herramienta', 'Taladro verde', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'Cassandra', '000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `prestamos_herramientas`
--
ALTER TABLE `prestamos_herramientas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prestamos_herramientas`
--
ALTER TABLE `prestamos_herramientas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
