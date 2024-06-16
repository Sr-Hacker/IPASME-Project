-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2023 a las 17:31:15
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` bigint(20) NOT NULL,
  `apellidosynombres` varchar(150) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `rif` varchar(15) NOT NULL,
  `fechadenacimiento` date NOT NULL,
  `vivienda` varchar(50) NOT NULL,
  `automovil` varchar(2) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `estadocivil` varchar(20) NOT NULL,
  `tipodesangre` varchar(3) NOT NULL,
  `talladecamisa` varchar(10) NOT NULL,
  `talladezapato` varchar(10) NOT NULL,
  `talladepantalon` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `cargo` varchar(150) NOT NULL,
  `estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `apellidosynombres`, `cedula`, `rif`, `fechadenacimiento`, `vivienda`, `automovil`, `modelo`, `ano`, `telefono`, `celular`, `estadocivil`, `tipodesangre`, `talladecamisa`, `talladezapato`, `talladepantalon`, `correo`, `cargo`, `estatus`) VALUES
(1, 'JIMENEZ MENDOZA JUAN JOSE', '10846157', 'J-108461574', '1972-04-04', 'PROPIA', 'NO', '', '', '02512324433', '04145027987', 'DIVORCIADO', 'O+', 'L', '43', '34', 'JUANJJIMENEZM@GMAIL.COM', 'DOCENTE', 'ACTIVO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
