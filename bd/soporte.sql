-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2016 at 12:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soporte`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
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
-- Dumping data for table `departamentos`
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
-- Table structure for table `descripcion_solicitud`
--

CREATE TABLE IF NOT EXISTS `descripcion_solicitud` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_solicitud` varchar(255) NOT NULL,
  `descripcion_solicitud` varchar(255) NOT NULL,
  PRIMARY KEY (`tipo_solicitud`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `descripcion_solicitud`
--

INSERT INTO `descripcion_solicitud` (`id`, `tipo_solicitud`, `descripcion_solicitud`) VALUES
(1, '1', 'IMPRESORA NO IMPRIME'),
(2, '2', 'PC NO PRENDE'),
(3, '3', 'PC MUY LENTA'),
(4, '4', 'SOLICITAR NUEVA PC');

-- --------------------------------------------------------

--
-- Table structure for table `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_estatus` varchar(10) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `estatus`
--

INSERT INTO `estatus` (`id_estatus`, `descripcion_estatus`) VALUES
(1, 'Normal'),
(2, 'Urgente');

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes`
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
-- Dumping data for table `solicitudes`
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
-- Table structure for table `usuarios`
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `nombres`, `apellidos`, `cedula`, `cod_dep`, `clave`, `telefono`, `direccion`) VALUES
(1, 'admin', 'ADMINISTRADOR', '', 0, '0', '21232f297a57a5a743894a0e4a801fc3', '', ''),
(2, 'prueba', 'prueba', 'prueba', 17389814, '3', '202cb962ac59075b964b07152d234b70', '', ''),
(3, 'soulip', 'WALTER WILFREDO', 'JIMENEZ JAIMES', 17389814, '2', '202cb962ac59075b964b07152d234b70', '', ''),
(4, 'jayala', 'JUNIOR', 'AYALA', 19677879, '2', '202cb962ac59075b964b07152d234b70', '', ''),
(5, 'user12', 'elessar', 'wer', 123467, '8', 'd9b1d7db4cd6e70935368a1efb10e377', '0212-4714490', 'montalban');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_5` FOREIGN KEY (`asignar_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`tipo_solicitud`) REFERENCES `descripcion_solicitud` (`tipo_solicitud`),
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`id_departamento`),
  ADD CONSTRAINT `solicitudes_ibfk_3` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id_estatus`),
  ADD CONSTRAINT `solicitudes_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
