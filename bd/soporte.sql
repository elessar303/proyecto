-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2016 a las 14:51:48
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  PRIMARY KEY (`id_departamento`),
  UNIQUE KEY `id` (`id`),
  KEY `id_departamento` (`id_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `id_departamento`, `descripcion`) VALUES
(1, '0', 'ADMINISTRADOR'),
(10, '10', 'CASA EQUIPADA'),
(11, '11', 'BIENES'),
(12, '12', 'AUDITORIA'),
(2, '2', 'SOPORTE'),
(3, '3', 'SISTEMAS'),
(4, '4', 'INFRAESTRUCTURA'),
(5, '5', 'SEGURIDAD DE DATOS'),
(6, '6', 'FINANZAS'),
(7, '7', 'ADMINISTRACION'),
(8, '8', 'COMPRAS'),
(9, '9', 'RRHH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_solicitud`
--

CREATE TABLE IF NOT EXISTS `descripcion_solicitud` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_solicitud` varchar(255) NOT NULL,
  `descripcion_solicitud` varchar(255) NOT NULL,
  PRIMARY KEY (`tipo_solicitud`),
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
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_estatus` varchar(10) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id_estatus`, `descripcion_estatus`) VALUES
(1, 'Normal'),
(2, 'Urgente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_solicitud` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `estatus` int(255) NOT NULL,
  `asignar_usuario` int(11) DEFAULT NULL,
  `estatus_tecnologia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `tipo_solicitud` (`tipo_solicitud`),
  KEY `departamento` (`departamento`),
  KEY `asignar_usuario` (`asignar_usuario`),
  KEY `estatus_tecnologia` (`estatus_tecnologia`),
  KEY `id_usuario` (`id_usuario`),
  KEY `estatus` (`estatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `tipo_solicitud`, `departamento`, `usuario`, `fecha`, `estatus`, `asignar_usuario`, `estatus_tecnologia`, `id_usuario`) VALUES
(3, '1', '2', 'prueba prueba', '2015-06-28', 1, 1, 1, 2),
(4, '1', '3', 'prueba prueba', '2015-06-28', 2, NULL, 0, 2),
(5, '3', '0', 'ADMINISTRADOR ', '2015-06-28', 2, 3, 2, 1),
(6, '1', '0', 'ADMINISTRADOR ', '2016-05-17', 2, 4, 0, 1),
(7, '2', '0', 'ADMINISTRADOR ', '2016-05-17', 2, 5, 0, 1),
(8, '3', '0', 'ADMINISTRADOR ', '2016-05-17', 2, NULL, 0, 1),
(9, '4', '0', 'ADMINISTRADOR ', '2016-05-17', 2, NULL, 0, 1),
(10, '1', '0', 'ADMINISTRADOR ', '2016-05-18', 1, NULL, 0, 1),
(11, '2', '0', 'ADMINISTRADOR ', '2016-05-18', 1, NULL, 0, 1),
(12, '3', '0', 'ADMINISTRADOR ', '2016-05-18', 1, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo_usuario`) VALUES
(1, 'Usuario'),
(2, 'Analista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `cedula` int(11) NOT NULL,
  `cod_dep` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `nombres`, `apellidos`, `cedula`, `cod_dep`, `clave`, `telefono`, `direccion`, `id_tipo`) VALUES
(1, 'admin', 'ADMINISTRADOR', '', 0, '0', '21232f297a57a5a743894a0e4a801fc3', '', '', 1),
(2, 'prueba', 'prueba', 'prueba', 17389814, '3', '202cb962ac59075b964b07152d234b70', '', '', 1),
(3, 'soulip', 'WALTER WILFREDO', 'JIMENEZ JAIMES', 17389814, '2', '202cb962ac59075b964b07152d234b70', '', '', 1),
(4, 'jayala', 'JUNIOR', 'AYALA', 19677879, '2', '202cb962ac59075b964b07152d234b70', '', '', 1),
(5, 'elessar', 'Junior Alexis', 'Ayala Rivas', 18677970, '8', 'e10adc3949ba59abbe56e057f20f883e', '04142305606', 'Monalban III', 1),
(6, 'YMCHIRINOS', 'user234', 'wer', 123467, '10', '7363a0d0604902af7b70b271a0b96480', '02124714490', 'montalban', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`tipo_solicitud`) REFERENCES `descripcion_solicitud` (`tipo_solicitud`),
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`id_departamento`),
  ADD CONSTRAINT `solicitudes_ibfk_3` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`),
  ADD CONSTRAINT `solicitudes_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `solicitudes_ibfk_5` FOREIGN KEY (`asignar_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
