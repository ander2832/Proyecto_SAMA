-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-08-2018 a las 19:00:05
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectosama`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcargo`
--

DROP TABLE IF EXISTS `tblcargo`;
CREATE TABLE IF NOT EXISTS `tblcargo` (
  `codcargo` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codcargo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblcargo`
--

INSERT INTO `tblcargo` (`codcargo`, `nombre`) VALUES
('1', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldestino`
--

DROP TABLE IF EXISTS `tbldestino`;
CREATE TABLE IF NOT EXISTS `tbldestino` (
  `coddestino` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`coddestino`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbldestino`
--

INSERT INTO `tbldestino` (`coddestino`, `nombre`) VALUES
('1', 'Cornare'),
('2', 'Alcaldia'),
('3', 'Policia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldireccion`
--

DROP TABLE IF EXISTS `tbldireccion`;
CREATE TABLE IF NOT EXISTS `tbldireccion` (
  `coddireccion` varchar(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`coddireccion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbldireccion`
--

INSERT INTO `tbldireccion` (`coddireccion`, `nombre`) VALUES
('1', 'Zona Urbana'),
('4', 'Alto Bonito'),
('3', 'Agualinda'),
('2', 'Agua Bonita'),
('5', 'Balcones'),
('6', 'Buenos Aires'),
('7', 'Campo Alegre'),
('8', 'Caracoli'),
('9', 'Cebaderos'),
('10', 'Cruces'),
('11', 'El Alto de la Virgen'),
('12', 'El Choco'),
('13', 'El Cipres'),
('14', 'El Coco'),
('15', 'El Cocuyo'),
('16', 'El Entablado'),
('17', 'El Estio'),
('18', 'El Higueron'),
('19', 'El Jordan'),
('20', 'El Molino'),
('21', 'El Palmar'),
('22', 'El Porvenir'),
('23', 'El Recreo'),
('24', 'El Retiro'),
('25', 'El Roblal'),
('26', 'El Salado'),
('27', 'El Sinai'),
('28', 'El Suspiro'),
('29', 'El Tesoro'),
('30', 'El Viadal'),
('31', 'El Viaho'),
('32', 'Guayabal'),
('33', 'La Aurora'),
('34', 'La Chorrera'),
('35', 'La Cima'),
('36', 'La Cuchilla del Rejo'),
('37', 'La Florida'),
('38', 'La Granja'),
('39', 'La Inmaculada'),
('40', 'La Milagrosa'),
('41', 'La Paila'),
('42', 'La Palma'),
('43', 'la Pena'),
('44', 'La Pinuela'),
('45', 'La Placeta'),
('46', 'La Quiebra'),
('47', 'La Secreta'),
('48', 'La Solita'),
('49', 'La Tolda'),
('50', 'La Trinidad'),
('51', 'La Vega'),
('52', 'La Veta'),
('53', 'Las Mercedes'),
('54', 'Las Playas'),
('55', 'Los Cedros'),
('56', 'Los Limones'),
('57', 'Los Mangos'),
('58', 'Los Potreros'),
('59', 'Majagual'),
('60', 'Mazotes'),
('61', 'Media Cuesta'),
('62', 'Montanita'),
('63', 'Morritos'),
('64', 'Pailania'),
('65', 'Palmirita'),
('66', 'Primavera '),
('67', 'San Antonio'),
('68', 'San Jose'),
('69', 'San Juan'),
('70', 'San Lorenzo'),
('71', 'San Martin'),
('72', 'San Miguel'),
('73', 'San Vicente'),
('74', 'Santa Barbara'),
('75', 'Santa Cruz'),
('76', 'Santa Rita'),
('77', 'Santo Domingo'),
('78', 'Villa Hermosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestadopqrs`
--

DROP TABLE IF EXISTS `tblestadopqrs`;
CREATE TABLE IF NOT EXISTS `tblestadopqrs` (
  `codestadopqrs` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codestadopqrs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblestadopqrs`
--

INSERT INTO `tblestadopqrs` (`codestadopqrs`, `nombre`) VALUES
('1', 'Pendiente'),
('2', 'En proceso'),
('3', 'Cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfuncionario`
--

DROP TABLE IF EXISTS `tblfuncionario`;
CREATE TABLE IF NOT EXISTS `tblfuncionario` (
  `docidentidad` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telfijo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telmovil` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`docidentidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tblfuncionario`
--

INSERT INTO `tblfuncionario` (`docidentidad`, `nombres`, `apellidos`, `email`, `telfijo`, `telmovil`, `cargo`, `contrasena`, `estado`) VALUES
('1036', '', '', '', '', '', '', '1234', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpqrs`
--

DROP TABLE IF EXISTS `tblpqrs`;
CREATE TABLE IF NOT EXISTS `tblpqrs` (
  `codpqrs` int(8) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codpqrs`),
  KEY `usuario` (`usuario`,`tipo`,`estado`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipopqrs`
--

DROP TABLE IF EXISTS `tbltipopqrs`;
CREATE TABLE IF NOT EXISTS `tbltipopqrs` (
  `codtipopqrs` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codtipopqrs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbltipopqrs`
--

INSERT INTO `tbltipopqrs` (`codtipopqrs`, `nombre`) VALUES
('1', 'Peticion'),
('2', 'Queja'),
('3', 'Reclamo'),
('4', 'Solicitud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltratamiento`
--

DROP TABLE IF EXISTS `tbltratamiento`;
CREATE TABLE IF NOT EXISTS `tbltratamiento` (
  `codigo` int(8) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `codpqrs` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `funcionario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `destino` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

DROP TABLE IF EXISTS `tblusuario`;
CREATE TABLE IF NOT EXISTS `tblusuario` (
  `docidentidad` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telfijo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telmovil` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`docidentidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
