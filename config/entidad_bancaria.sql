-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 11-10-2020 a las 07:03:28
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `entidad_bancaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_adm_cuenta`
--

DROP TABLE IF EXISTS `tbl_adm_cuenta`;
CREATE TABLE IF NOT EXISTS `tbl_adm_cuenta` (
  `codigo_adm` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `cedula_cli` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_creacion_cta` date NOT NULL,
  PRIMARY KEY (`codigo_adm`),
  KEY `cedula_cli` (`cedula_cli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ciudad`
--

DROP TABLE IF EXISTS `tbl_ciudad`;
CREATE TABLE IF NOT EXISTS `tbl_ciudad` (
  `codigo_cda` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_cda` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codigo_cda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_ciudad`
--

INSERT INTO `tbl_ciudad` (`codigo_cda`, `nombre_cda`) VALUES
('1', 'Bogotá'),
('2', 'Barranquilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

DROP TABLE IF EXISTS `tbl_cliente`;
CREATE TABLE IF NOT EXISTS `tbl_cliente` (
  `cedula_cli` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_cli` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_cli` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono_cli` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion_cli` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cod_ciudad` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contrasenia` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cedula_cli`),
  KEY `cod_ciudad` (`cod_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`cedula_cli`, `nombre_cli`, `apellido_cli`, `telefono_cli`, `direccion_cli`, `cod_ciudad`, `contrasenia`) VALUES
('1000941668', 'Jaider', 'Velazco', '3123123', 'Gaitana', '1', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cuenta`
--

DROP TABLE IF EXISTS `tbl_cuenta`;
CREATE TABLE IF NOT EXISTS `tbl_cuenta` (
  `codigo_cta` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_cta` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codigo_cta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movimiento`
--

DROP TABLE IF EXISTS `tbl_movimiento`;
CREATE TABLE IF NOT EXISTS `tbl_movimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_cli` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_cta` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_mov` date NOT NULL,
  `tipo_mov` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `saldo` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cedula_cli` (`cedula_cli`),
  KEY `codigo_cta` (`codigo_cta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_adm_cuenta`
--
ALTER TABLE `tbl_adm_cuenta`
  ADD CONSTRAINT `tbl_adm_cuenta_ibfk_1` FOREIGN KEY (`cedula_cli`) REFERENCES `tbl_cliente` (`cedula_cli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_adm_cuenta_ibfk_2` FOREIGN KEY (`codigo_adm`) REFERENCES `tbl_cuenta` (`codigo_cta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD CONSTRAINT `tbl_cliente_ibfk_1` FOREIGN KEY (`cod_ciudad`) REFERENCES `tbl_ciudad` (`codigo_cda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_movimiento`
--
ALTER TABLE `tbl_movimiento`
  ADD CONSTRAINT `tbl_movimiento_ibfk_1` FOREIGN KEY (`cedula_cli`) REFERENCES `tbl_cliente` (`cedula_cli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_movimiento_ibfk_2` FOREIGN KEY (`codigo_cta`) REFERENCES `tbl_cuenta` (`codigo_cta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
