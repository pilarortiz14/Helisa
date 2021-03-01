-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2021 a las 15:28:49
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `helisa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesores`
--

CREATE TABLE `asesores` (
  `Id` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Fecha_vinculacion` date NOT NULL,
  `Especialidad` varchar(45) NOT NULL,
  `Inicio_atencion` time NOT NULL,
  `Fin_atencion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesores`
--

INSERT INTO `asesores` (`Id`, `Id_Usuario`, `Fecha_vinculacion`, `Especialidad`, `Inicio_atencion`, `Fin_atencion`) VALUES
(2, 1022439079, '2016-02-16', 'Programador', '08:00:00', '17:00:00'),
(5, 1023456789, '2017-02-13', 'Prueba asesor', '08:00:00', '17:00:00'),
(6, 1098765432, '2016-02-16', 'Asesor de ventas', '08:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `Id` int(11) NOT NULL,
  `Id_cliente` int(11) NOT NULL,
  `Id_asesor` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Estado` set('Completada','En curso','Cancelada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`Id`, `Id_cliente`, `Id_asesor`, `Fecha`, `Hora`, `Estado`) VALUES
(1, 1014273674, 1022439079, '2021-02-28', '06:02:11', 'En curso'),
(2, 1014273674, 1023456789, '2021-02-01', '07:14:21', 'En curso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `Id` int(11) NOT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`Id`, `Ciudad`, `Id_pais`) VALUES
(1, 'Berlin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Id_ciudad` int(11) NOT NULL,
  `Id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id`, `Id_Usuario`, `Fecha_Creacion`, `Id_ciudad`, `Id_pais`) VALUES
(6, 1014273674, '2016-06-12', 1, 1),
(7, 1023456788, '2021-02-27', 1, 1),
(8, 1065478932, '2021-02-17', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `Id` int(11) NOT NULL,
  `Pais` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`Id`, `Pais`) VALUES
(1, 'Alemania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `Id` int(11) NOT NULL,
  `Tipo_documento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`Id`, `Tipo_documento`) VALUES
(1, 'Cédula de ciudadanía'),
(2, 'Registro cívil'),
(3, 'Cédula de extranjería'),
(4, 'Tarjeta de identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Documento` int(11) NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `Id_Tipo_Documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Documento`, `Nombres`, `Apellidos`, `Id_Tipo_Documento`) VALUES
(1014273674, 'Sebastian', 'Quintana', 1),
(1022439079, 'Maria del Pilar', 'Ortiz Moreno', 1),
(1023456788, 'Maria', 'Benavides', 1),
(1023456789, 'Prueba', 'Ortiz Moreno', 1),
(1054789632, 'Mario', 'Vasquez', 4),
(1065478932, 'Claudi', 'Perdomo', 3),
(1098765432, 'Juan', 'Perez', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesores`
--
ALTER TABLE `asesores`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_citas_clientes` (`Id_cliente`),
  ADD KEY `fk_citas_asesores` (`Id_asesor`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_ciudades_pais` (`Id_pais`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `fk_clientes_ciudades` (`Id_ciudad`),
  ADD KEY `fk_clientes_pais` (`Id_pais`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Documento`),
  ADD KEY `fk_usuarios_tipo_documento` (`Id_Tipo_Documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesores`
--
ALTER TABLE `asesores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesores`
--
ALTER TABLE `asesores`
  ADD CONSTRAINT `fk_asesores_usuarios` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Documento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_citas_asesores` FOREIGN KEY (`Id_asesor`) REFERENCES `asesores` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_citas_clientes` FOREIGN KEY (`Id_cliente`) REFERENCES `clientes` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `fk_ciudades_pais` FOREIGN KEY (`Id_pais`) REFERENCES `pais` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_ciudades` FOREIGN KEY (`Id_ciudad`) REFERENCES `ciudades` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_clientes_pais` FOREIGN KEY (`Id_pais`) REFERENCES `pais` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_clientes_usuarios` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Documento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_tipo_documento` FOREIGN KEY (`Id_Tipo_Documento`) REFERENCES `tipo_documento` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
