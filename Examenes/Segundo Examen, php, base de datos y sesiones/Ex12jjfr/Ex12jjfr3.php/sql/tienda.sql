-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2015 a las 11:22:09
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE IF NOT EXISTS `envios` (
  `codigo` varchar(50) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`codigo`, `precio`) VALUES
('baleares', 4.5),
('canarias', 7),
('china', 25),
('eeuu', 24.95),
('españa', 5),
('europa', 15.55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `precio`, `categoria`, `imagen`) VALUES
(1, 'pluma1', 2, 'plumas', 'pluma1.jpg'),
(2, 'pluma2', 3.75, 'plumas', 'pluma2.jpg'),
(3, 'pluma3', 2.5, 'plumas', 'pluma3.jpg'),
(4, 'pluma4', 3.5, 'plumas', 'pluma4.jpg'),
(5, 'pluma5', 5.95, 'premium', 'pluma5.jpg'),
(6, 'pluma6', 6.95, 'premium', 'pluma6.jpg'),
(7, 'pluma7', 2.25, 'plumas', 'pluma7.jpg'),
(8, 'pluma8', 25, 'premium', 'pluma7.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
