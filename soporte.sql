-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-06-2015 a las 05:57:05
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `soporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_departamento` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `id_departamento`, `descripcion`) VALUES
(1, '0', 'administrador'),
(2, '2', 'TECNOLOGIA'),
(3, '3', 'FINANZAS'),
(4, '4', 'CONTABILIDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_solicitud`
--

CREATE TABLE IF NOT EXISTS `descripcion_solicitud` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_solicitud` varchar(255) NOT NULL,
  `descripcion_solicitud` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `descripcion_solicitud`
--

INSERT INTO `descripcion_solicitud` (`id`, `tipo_solicitud`, `descripcion_solicitud`) VALUES
(1, '1', 'IMPRESORA NO IMPRIME'),
(2, '2', 'PC NO PRENDE'),
(3, '3', 'PC MUY LENTA'),
(4, '4', 'SOLICITAR NUEVA PC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_solicitud` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `asignar_usuario` varchar(255) NOT NULL,
  `estatus_tecnologia` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `tipo_solicitud`, `departamento`, `usuario`, `fecha`, `estatus`, `asignar_usuario`, `estatus_tecnologia`) VALUES
(3, '1', '2', 'prueba prueba', '2015-06-28', '1', 'undefined', ''),
(4, '1', '3', 'prueba prueba', '2015-06-28', '2', '', ''),
(5, '3', '0', 'ADMINISTRADOR ', '2015-06-28', '2', '3', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `cedula` int(11) NOT NULL,
  `cod_dep` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `nombres`, `apellidos`, `cedula`, `cod_dep`, `clave`) VALUES
(1, 'admin', 'ADMINISTRADOR', '', 0, '0', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'prueba', 'prueba', 'prueba', 17389814, '3', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'soulip', 'WALTER WILFREDO', 'JIMENEZ JAIMES', 17389814, '2', '4cd711cd15e34b607808e4b54716588c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
