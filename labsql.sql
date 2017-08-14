-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2017 a las 15:43:18
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `labsql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `idproblema` int(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `explicacion` text,
  `solucion` text,
  `explicsolucion` text,
  `solucionalternativa` text,
  `numpracticas` int(11) DEFAULT NULL COMMENT 'Define el numero de veces que se puede hacer practicas de la consulta antes de ejecutarla finalmente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `consulta`:
--   `idproblema`
--       `problema` -> `id`
--

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id`, `idproblema`, `descripcion`, `explicacion`, `solucion`, `explicsolucion`, `solucionalternativa`, `numpracticas`) VALUES
(1, 1, 'Cuales son los empleados registrados en el sistema', 'se requiere conocer cuales son los empleados que han sido registrados en el sistema', 'select * from empleado', 'se seleccionan todos los campos de la tabla empleado para asi conocer quienes son los registrados hasta el momento', 'select codigo,cedula,nombre from empleado', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `final`
--

CREATE TABLE `final` (
  `usuario` varchar(20) DEFAULT NULL,
  `idconsulta` int(11) DEFAULT NULL,
  `id` int(1) NOT NULL,
  `sql` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `resultado` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `final`:
--   `idconsulta`
--       `consulta` -> `id`
--   `usuario`
--       `usuario` -> `usuario`
--

--
-- Volcado de datos para la tabla `final`
--

INSERT INTO `final` (`usuario`, `idconsulta`, `id`, `sql`, `fecha`, `resultado`) VALUES
('1151224', 1, 1, 'select * from tercero', '2017-07-07 01:35:18', 'exito'),
('1151493', 1, 2, 'select * from liquidacion', '2017-07-17 16:40:26', 'exito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE `practica` (
  `usuario` varchar(20) DEFAULT NULL,
  `idconsulta` int(11) DEFAULT NULL,
  `id` int(1) NOT NULL,
  `sql` text,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `resultado` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `practica`:
--   `idconsulta`
--       `consulta` -> `id`
--   `usuario`
--       `usuario` -> `usuario`
--

--
-- Volcado de datos para la tabla `practica`
--

INSERT INTO `practica` (`usuario`, `idconsulta`, `id`, `sql`, `fecha`, `resultado`) VALUES
('1151267', 1, 1, 'select * from empleado', '2017-07-05 20:36:41', 'exito'),
('1151267', 1, 2, 'select * from proceso p inner join liquidacion  l on  (l.numproceso = p.id) inner join concepto c on (l.codconcepto=c.codconcepto)', '2017-07-08 22:35:10', 'exito'),
('1151493', 1, 3, 'select * from empleado', '2017-07-17 16:39:52', 'exito'),
('1151493', 1, 4, 'select * from tercero', '2017-07-17 16:40:08', 'exito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problema`
--

CREATE TABLE `problema` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `docente` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `nombrebase` varchar(50) DEFAULT NULL COMMENT 'Almacena el nombre en la base de datos de MySQL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `problema`:
--

--
-- Volcado de datos para la tabla `problema`
--

INSERT INTO `problema` (`id`, `nombre`, `descripcion`, `docente`, `estado`, `nombrebase`) VALUES
(1, 'Nomina', 'Ejercicio de la nomina de la UFPS de los estudiantes del 2016-1', 'Carlos Rene Angarita', 1, 'nomina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE `tabla` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `idproblema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena la informaci?n de las tablas, el diccionario de datos de informaci?n de las mismas';

--
-- RELACIONES PARA LA TABLA `tabla`:
--   `idproblema`
--       `problema` -> `id`
--

--
-- Volcado de datos para la tabla `tabla`
--

INSERT INTO `tabla` (`id`, `nombre`, `descripcion`, `idproblema`) VALUES
(1, 'concepto', 'nombre de todos los conceptos junto con su descripción', 1),
(2, 'empleado', 'información de todos los empleados que se poseen en la nomina', 1),
(3, 'liquidacion', 'información de cada proceso de liquidación que se ha realizado en la empresa', 1),
(4, 'proceso', 'explicación de cuando se realizo algun movimiento de nomina', 1),
(5, 'tercero', 'datos de los terceros involucrados con la empresa', 1),
(6, 'tipoconcepto', 'tipos de conceptos existentes en la empresa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(20) NOT NULL COMMENT 'Guarda informaci?n del usuario con el cual accede al sistema',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Almacena informaci?n del nombre del usuario',
  `clave` varchar(50) DEFAULT NULL COMMENT 'Almacena la clave del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena informaci?n de los usuarios que pueden utilizar el sistema';

--
-- RELACIONES PARA LA TABLA `usuario`:
--

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `nombre`, `clave`) VALUES
('1151224', 'Jeferson Manuel Murillo Ariza', 'jeferson'),
('1151267', 'Daniel Jose Caballero Sanchez', 'daniel'),
('1151493', 'Obando Abril Camilo Andres', 'camilo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IXFK_consulta_problema` (`idproblema`);

--
-- Indices de la tabla `final`
--
ALTER TABLE `final`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IXFK_final_consulta` (`idconsulta`),
  ADD KEY `IXFK_final_usuario` (`usuario`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IXFK_practica_consulta` (`idconsulta`),
  ADD KEY `IXFK_practica_usuario` (`usuario`);

--
-- Indices de la tabla `problema`
--
ALTER TABLE `problema`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla`
--
ALTER TABLE `tabla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IXFK_tabla_problema` (`idproblema`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `final`
--
ALTER TABLE `final`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `practica`
--
ALTER TABLE `practica`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `problema`
--
ALTER TABLE `problema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tabla`
--
ALTER TABLE `tabla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `FK_consulta_problema` FOREIGN KEY (`idproblema`) REFERENCES `problema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `final`
--
ALTER TABLE `final`
  ADD CONSTRAINT `FK_final_consulta` FOREIGN KEY (`idconsulta`) REFERENCES `consulta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_final_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `practica`
--
ALTER TABLE `practica`
  ADD CONSTRAINT `FK_practica_consulta` FOREIGN KEY (`idconsulta`) REFERENCES `consulta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_practica_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tabla`
--
ALTER TABLE `tabla`
  ADD CONSTRAINT `FK_tabla_problema` FOREIGN KEY (`idproblema`) REFERENCES `problema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
