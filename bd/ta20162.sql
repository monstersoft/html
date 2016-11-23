-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2016 a las 22:43:57
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ta20162`
--
CREATE DATABASE IF NOT EXISTS `ta20162` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ta20162`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `archivos`;
CREATE TABLE IF NOT EXISTS `archivos` (
  `ID_ARCHIVO` int(11) NOT NULL AUTO_INCREMENT,
  `CORREO_SUPERVISOR` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RUTA_ARCHIVO` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MD5_ARCHIVO` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA_SUBIDA` date NOT NULL,
  `HORA_SUBIDA` time NOT NULL,
  PRIMARY KEY (`ID_ARCHIVO`),
  KEY `CORREO_SUPERVISOR` (`CORREO_SUPERVISOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `archivos`:
--   `CORREO_SUPERVISOR`
--       `supervisores` -> `CORREO_SUPERVISOR`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--
-- Creación: 21-11-2016 a las 05:24:11
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `CORREO_CLIENTE` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASSWORD_CLIENTE` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CARGO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMPRESA` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`CORREO_CLIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `clientes`:
--

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`CORREO_CLIENTE`, `PASSWORD_CLIENTE`, `NOMBRE`, `CARGO`, `EMPRESA`) VALUES
('agonzalez@arauco.cl', 'agonzalez', 'Alberto Gonzalez', 'Gerente General', 'Arauco'),
('hperez@masisa.cl', 'hperez', 'Humberto Pérez', 'Jefe de Abastecimiento', 'Masisa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `conductores`;
CREATE TABLE IF NOT EXISTS `conductores` (
  `RUT_CONDUCTOR` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `CORREO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`RUT_CONDUCTOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `conductores`:
--   `RUT_CONDUCTOR`
--       `conductores_maquinas` -> `RUT_CONDUCTOR`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores_maquinas`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `conductores_maquinas`;
CREATE TABLE IF NOT EXISTS `conductores_maquinas` (
  `PATENTE` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RUT_CONDUCTOR` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL,
  KEY `PATENTE` (`PATENTE`),
  KEY `RUT_CONDUCTOR` (`RUT_CONDUCTOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `conductores_maquinas`:
--   `PATENTE`
--       `maquinas` -> `PATENTE`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `datos`;
CREATE TABLE IF NOT EXISTS `datos` (
  `ID_DATO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ARCHIVO` int(11) NOT NULL,
  `PATENTE` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANGULO_PALA` float NOT NULL,
  `ANGULO_INCLINACION` float NOT NULL,
  `ALTURA_PALA` float NOT NULL,
  `VELOCIDAD` float NOT NULL,
  `REVOLUCIONES` float NOT NULL,
  `LATITUD` float(10,6) NOT NULL,
  `LONGITUD` float(10,6) NOT NULL,
  `FECHA_DATO` date NOT NULL,
  `HORA_DATO` time NOT NULL,
  PRIMARY KEY (`ID_DATO`),
  KEY `ID_ARCHIVO` (`ID_ARCHIVO`),
  KEY `PATENTE` (`PATENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `datos`:
--   `ID_ARCHIVO`
--       `archivos` -> `ID_ARCHIVO`
--   `PATENTE`
--       `maquinas` -> `PATENTE`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibles_maquinas`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `disponibles_maquinas`;
CREATE TABLE IF NOT EXISTS `disponibles_maquinas` (
  `PATENTE` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL,
  KEY `PATENTE` (`PATENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `disponibles_maquinas`:
--   `PATENTE`
--       `maquinas` -> `PATENTE`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `RUT_EMPRESA` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CORREO_ROOT` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CORREO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GIRO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DIRECCION` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TELEFONO` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`RUT_EMPRESA`),
  KEY `CORREO_ROOT` (`CORREO_ROOT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `empresas`:
--   `CORREO_ROOT`
--       `root` -> `CORREO_ROOT`
--

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`RUT_EMPRESA`, `CORREO_ROOT`, `NOMBRE`, `CORREO`, `GIRO`, `DIRECCION`, `TELEFONO`) VALUES
('762454181', 'machmonitor@gmail.com', 'Servicios Bio Bio', 'contacto@serviciosbiobio.cl', 'Construcción', 'Américo Vespucio 477\r\nTalcahuano REGIÓN DEL BÍO-BÍO', '412424026'),
('762978288', 'machmonitor@gmail.com', 'JCB', 'contacto@jcb.cl', 'Arriendo de Maquinaria Pesada', 'Av. Américo Vespucio 1838 Quilicura, Santiago - Chile', '68321446'),
('767291809', 'machmonitor@gmail.com', 'Gam Rentals', 'mpfuentes@gamalquiler.com', 'Arriendo de Maquinaria Pesada', 'Los lirios 1359, San Pedro de la Paz, Concepción', '227731906'),
('767495404', 'machmonitor@gmail.com', 'Besalco Maquinarias', 'contacto@besalco.cl', 'Minería', 'Los acacios 1359, San Pedro de la Paz, Concepción', '25407400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas_clientes`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `empresas_clientes`;
CREATE TABLE IF NOT EXISTS `empresas_clientes` (
  `RUT_EMPRESA` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CORREO_CLIENTE` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  KEY `RUT_EMPRESA` (`RUT_EMPRESA`),
  KEY `CORREO_CLIENTE` (`CORREO_CLIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `empresas_clientes`:
--   `RUT_EMPRESA`
--       `empresas` -> `RUT_EMPRESA`
--   `CORREO_CLIENTE`
--       `clientes` -> `CORREO_CLIENTE`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--
-- Creación: 21-10-2016 a las 05:48:06
--

DROP TABLE IF EXISTS `maquinas`;
CREATE TABLE IF NOT EXISTS `maquinas` (
  `PATENTE` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_ZONA` int(11) NOT NULL,
  `MARCA` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MODELO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANHO` year(4) NOT NULL,
  `VELOCIDADMAX` float NOT NULL,
  `TARA` float NOT NULL,
  `TASA` float NOT NULL,
  `TAMA` float NOT NULL,
  `TONELAJE` float NOT NULL,
  `CARGA` float NOT NULL,
  `LAT` float(10,6) NOT NULL,
  `LON` float(10,6) NOT NULL,
  PRIMARY KEY (`PATENTE`),
  KEY `ID_ZONA` (`ID_ZONA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `maquinas`:
--   `ID_ZONA`
--       `zonas` -> `ID_ZONA`
--

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`PATENTE`, `ID_ZONA`, `MARCA`, `MODELO`, `ANHO`, `VELOCIDADMAX`, `TARA`, `TASA`, `TAMA`, `TONELAJE`, `CARGA`, `LAT`, `LON`) VALUES
('P31Z19UDEC01', 19, 'CAT', '100', 2016, 100, 100, 100, 100, 100, 100, -36.830318, -73.038963),
('P31Z19UDEC02', 19, 'CAT', '2016', 2016, 100, 100, 100, 100, 100, 100, -36.828690, -73.035179);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `no_disponibles_maquinas`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `no_disponibles_maquinas`;
CREATE TABLE IF NOT EXISTS `no_disponibles_maquinas` (
  `PATENTE` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL,
  KEY `PATENTE` (`PATENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `no_disponibles_maquinas`:
--   `PATENTE`
--       `maquinas` -> `PATENTE`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE IF NOT EXISTS `proyectos` (
  `ID_PROYECTO` int(11) NOT NULL AUTO_INCREMENT,
  `RUT_EMPRESA` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_PROYECTO`),
  KEY `RUT_EMPRESA` (`RUT_EMPRESA`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `proyectos`:
--   `RUT_EMPRESA`
--       `empresas` -> `RUT_EMPRESA`
--

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`ID_PROYECTO`, `RUT_EMPRESA`, `NOMBRE`) VALUES
(31, '762454181', 'Proyecto31'),
(32, '762454181', 'Proyecto32'),
(33, '767291809', 'Proyecto33'),
(34, '762978288', 'Proyecto34'),
(35, '762978288', 'Proyecto35'),
(36, '762978288', 'Proyecto36'),
(38, '767495404', 'Proyecto38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `root`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `root`;
CREATE TABLE IF NOT EXISTS `root` (
  `CORREO_ROOT` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASSWORD` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`CORREO_ROOT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `root`:
--

--
-- Volcado de datos para la tabla `root`
--

INSERT INTO `root` (`CORREO_ROOT`, `PASSWORD`) VALUES
('machmonitor@gmail.com', 'MachineMonitor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisores`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `supervisores`;
CREATE TABLE IF NOT EXISTS `supervisores` (
  `CORREO_SUPERVISOR` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASSWORD` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RUT` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  PRIMARY KEY (`CORREO_SUPERVISOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `supervisores`:
--   `CORREO_SUPERVISOR`
--       `supervisores_zonas` -> `CORREO_SUPERVISOR`
--

--
-- Volcado de datos para la tabla `supervisores`
--

INSERT INTO `supervisores` (`CORREO_SUPERVISOR`, `PASSWORD`, `RUT`, `TELEFONO`) VALUES
('acontreras@jcb.cl', 'acontreras', '68080541', 68080541),
('aflores@besalco.cl', 'aflores', '61368612', 61368612),
('asoto@gam.cl', 'asoto', '134179090', 134179090),
('bespinoza@besalco.cl', 'bespinoza', '142707535', 142707535),
('bmunoz@serviciosbiobio.cl', 'bmunoz', '59288113', 59288113),
('csilva@jcb.cl', 'csilva', '223776388', 223776388),
('drodriguez@jcb.cl', 'drodriguez', '131680597', 131680597),
('ftorres@jcb.cl', 'ftorres', '242874188', 242874188),
('gcastillo@besalco.cl', 'gcastillo', '188016642', 188016642),
('iramirez@besalco.cl', 'iramirez', '88917456', 88917456),
('jlopez@jcb.cl', 'jlopez', '188592422', 188592422),
('jperez@gam.cl', 'jperez', '109759287', 109759287),
('jvalenzuela@besalco.cl', 'jvalenzuela', '165249852', 165249852),
('laraya@jcb.cl', 'laraya', '64886215', 64886215),
('mdiaz@gam.cl', 'mdiaz', '122002276', 122002276),
('mmartinez@jcb.cl', 'mmartinez', '233415375', 233415375),
('mrojas@gam.cl', 'mrojas', '56237518', 56237518),
('nfuentes@jcb.cl', 'nfuentes', '232569417', 232569417),
('ssepulveda@jcb.cl', 'ssepulveda', '61410023', 61410023),
('tmorales@jcb.cl', 'tmorales', '87306259', 87306259),
('vgonzalez@serviciosbiobio.cl', 'vgonzalez', '197988673', 197988673);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisores_zonas`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `supervisores_zonas`;
CREATE TABLE IF NOT EXISTS `supervisores_zonas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ZONA` int(11) NOT NULL,
  `CORREO_SUPERVISOR` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_ZONA` (`ID_ZONA`),
  KEY `CORREO_SUPERVISOR` (`CORREO_SUPERVISOR`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `supervisores_zonas`:
--   `ID_ZONA`
--       `zonas` -> `ID_ZONA`
--

--
-- Volcado de datos para la tabla `supervisores_zonas`
--

INSERT INTO `supervisores_zonas` (`ID`, `ID_ZONA`, `CORREO_SUPERVISOR`) VALUES
(1, 19, 'bmunoz@serviciosbiobio.cl'),
(2, 20, 'vgonzalez@serviciosbiobio.cl'),
(3, 21, 'asoto@gam.cl'),
(4, 22, 'jperez@gam.cl'),
(5, 22, 'mdiaz@gam.cl'),
(6, 21, 'mrojas@gam.cl'),
(7, 21, 'jperez@gam.cl'),
(8, 25, 'acontreras@jcb.cl'),
(9, 26, 'csilva@jcb.cl'),
(10, 27, 'drodriguez@jcb.cl'),
(11, 28, 'ftorres@jcb.cl'),
(12, 25, 'jlopez@jcb.cl'),
(13, 25, 'laraya@jcb.cl'),
(14, 27, 'mmartinez@jcb.cl'),
(15, 28, 'nfuentes@jcb.cl'),
(16, 28, 'ssepulveda@jcb.cl'),
(17, 25, 'tmorales@jcb.cl'),
(18, 26, 'tmorales@jcb.cl'),
(19, 27, 'tmorales@jcb.cl'),
(20, 28, 'tmorales@jcb.cl'),
(21, 29, 'aflores@besalco.cl'),
(22, 30, 'bespinoza@besalco.cl'),
(23, 31, 'gcastillo@besalco.cl'),
(24, 31, 'iramirez@besalco.cl'),
(26, 29, 'jvalenzuela@besalco.cl'),
(27, 30, 'jvalenzuela@besalco.cl'),
(28, 31, 'jvalenzuela@besalco.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--
-- Creación: 21-10-2016 a las 05:43:46
--

DROP TABLE IF EXISTS `zonas`;
CREATE TABLE IF NOT EXISTS `zonas` (
  `ID_ZONA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROYECTO` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LATITUD` float(10,6) NOT NULL,
  `LONGITUD` float(10,6) NOT NULL,
  PRIMARY KEY (`ID_ZONA`),
  KEY `ID_PROYECTO` (`ID_PROYECTO`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `zonas`:
--   `ID_PROYECTO`
--       `proyectos` -> `ID_PROYECTO`
--

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`ID_ZONA`, `ID_PROYECTO`, `NOMBRE`, `LATITUD`, `LONGITUD`) VALUES
(19, 31, 'Udec', -36.829475, -73.036369),
(20, 32, 'Ucsc', -36.798553, -73.058105),
(21, 33, 'Usach', 33.451759, -70.688316),
(22, 33, 'Utfsm', -33.490192, -70.619392),
(25, 34, 'Uch', -33.443810, -70.652580),
(26, 34, 'Puc', -33.441128, -70.642982),
(27, 35, 'Uft', -33.437099, -70.610138),
(28, 36, 'Uai', -33.489426, -70.518852),
(29, 38, 'Inacap', -33.489403, -70.586708),
(30, 38, 'Duoc', -33.489365, -70.586708),
(31, 38, 'Los leones', -33.449383, -70.670280);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`CORREO_SUPERVISOR`) REFERENCES `supervisores` (`CORREO_SUPERVISOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD CONSTRAINT `conductores_ibfk_1` FOREIGN KEY (`RUT_CONDUCTOR`) REFERENCES `conductores_maquinas` (`RUT_CONDUCTOR`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `conductores_maquinas`
--
ALTER TABLE `conductores_maquinas`
  ADD CONSTRAINT `conductores_maquinas_ibfk_1` FOREIGN KEY (`PATENTE`) REFERENCES `maquinas` (`PATENTE`) ON DELETE CASCADE;

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_2` FOREIGN KEY (`ID_ARCHIVO`) REFERENCES `archivos` (`ID_ARCHIVO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `datos_ibfk_3` FOREIGN KEY (`PATENTE`) REFERENCES `maquinas` (`PATENTE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `disponibles_maquinas`
--
ALTER TABLE `disponibles_maquinas`
  ADD CONSTRAINT `disponibles_maquinas_ibfk_1` FOREIGN KEY (`PATENTE`) REFERENCES `maquinas` (`PATENTE`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_ibfk_1` FOREIGN KEY (`CORREO_ROOT`) REFERENCES `root` (`CORREO_ROOT`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresas_clientes`
--
ALTER TABLE `empresas_clientes`
  ADD CONSTRAINT `empresas_clientes_ibfk_1` FOREIGN KEY (`RUT_EMPRESA`) REFERENCES `empresas` (`RUT_EMPRESA`) ON UPDATE CASCADE,
  ADD CONSTRAINT `empresas_clientes_ibfk_2` FOREIGN KEY (`CORREO_CLIENTE`) REFERENCES `clientes` (`CORREO_CLIENTE`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`ID_ZONA`) REFERENCES `zonas` (`ID_ZONA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `no_disponibles_maquinas`
--
ALTER TABLE `no_disponibles_maquinas`
  ADD CONSTRAINT `no_disponibles_maquinas_ibfk_1` FOREIGN KEY (`PATENTE`) REFERENCES `maquinas` (`PATENTE`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`RUT_EMPRESA`) REFERENCES `empresas` (`RUT_EMPRESA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `supervisores`
--
ALTER TABLE `supervisores`
  ADD CONSTRAINT `supervisores_ibfk_1` FOREIGN KEY (`CORREO_SUPERVISOR`) REFERENCES `supervisores_zonas` (`CORREO_SUPERVISOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `supervisores_zonas`
--
ALTER TABLE `supervisores_zonas`
  ADD CONSTRAINT `supervisores_zonas_ibfk_1` FOREIGN KEY (`ID_ZONA`) REFERENCES `zonas` (`ID_ZONA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `zonas_ibfk_1` FOREIGN KEY (`ID_PROYECTO`) REFERENCES `proyectos` (`ID_PROYECTO`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;