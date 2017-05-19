-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2017 a las 00:46:45
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `html`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `idArchivo` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idSupervisor` int(11) NOT NULL,
  `fechaSubida` date NOT NULL,
  `fechaDatos` date NOT NULL,
  `horaSubida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`idArchivo`, `idZona`, `idSupervisor`, `fechaSubida`, `fechaDatos`, `horaSubida`) VALUES
(9, 46, 22, '2017-05-18', '2017-05-18', '23:46:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(12) DEFAULT NULL,
  `empresa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `correo`, `password`, `empresa`) VALUES
(3, 'pavillanueva@ing.ucsc.cl', '123456', 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientesempresas`
--

CREATE TABLE `clientesempresas` (
  `idEmpresa` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `idDato` int(11) NOT NULL,
  `idArchivo` int(11) NOT NULL,
  `patente` varchar(50) NOT NULL,
  `hora` time NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `motorFuncionando` tinyint(1) NOT NULL,
  `rpm` float NOT NULL,
  `gradosPalaFrontal` float NOT NULL,
  `gradosPalaTrasera` float NOT NULL,
  `cambio` int(2) NOT NULL,
  `alturaPalaFrontal` float NOT NULL,
  `alturaPalaTrasera` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `estado` enum('activado','desactivado','otro') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`idEmpresa`, `rut`, `nombre`, `correo`, `telefono`, `estado`) VALUES
(50, '17286211-K', 'SERVICIOS BÍO BÍO', 'serviciosbiobio@contacto.cl', '995007812', 'activado'),
(51, '15331355-5', 'BESALCO MAQUINARIAS', 'besalcomaquinarias@contacto.cl', '991295057', 'activado'),
(52, '8280550-8', 'KOMATSU', 'komatsu@contacto.cl', '996998537', 'activado'),
(53, '8272362-5', 'ZAÑARTU MÁQUINAS', 'zañartu@contacto.cl', '950207039', 'activado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `idMaquina` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `patente` varchar(45) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `tara` float NOT NULL,
  `cargaMaxima` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`idMaquina`, `idZona`, `patente`, `fechaRegistro`, `tara`, `cargaMaxima`) VALUES
(1, 46, '46_01_METROPOLITANA_01', NULL, 0, 0),
(2, 46, '46_02_METROPOLITANA_02', NULL, 0, 0),
(23, 46, '46_03_METROPOLITANA_23', NULL, 0, 0),
(24, 46, '46_04_METROPOLITANA_24', NULL, 0, 0),
(25, 46, '46_05_METROPOLITANA_25', NULL, 0, 0),
(36, 50, '50_01_OCTAVA_36', NULL, 0, 0),
(39, 50, '50_04_OCTAVA_39', NULL, 0, 0),
(40, 50, '50_05_OCTAVA_40', NULL, 0, 0),
(41, 50, '50_06_OCTAVA_41', NULL, 0, 0),
(42, 50, '50_07_OCTAVA_42', NULL, 0, 0),
(43, 50, '50_08_OCTAVA_43', NULL, 0, 0),
(44, 51, '51_01_OCTAVA_44', NULL, 0, 0),
(45, 51, '51_02_OCTAVA_45', NULL, 0, 0),
(46, 51, '51_03_OCTAVA_47', NULL, 0, 0),
(47, 51, '51_04_OCTAVA_48', NULL, 0, 0),
(68, 52, '52_14_NOVENA_68', NULL, 0, 0),
(69, 52, '52_15_NOVENA_69', NULL, 0, 0),
(70, 52, '52_16_NOVENA_70', NULL, 0, 0),
(71, 52, '52_17_NOVENA_71', NULL, 0, 0),
(72, 52, '52_18_NOVENA_72', NULL, 0, 0),
(73, 53, '53_01_MAULE_73', NULL, 0, 0),
(74, 53, '53_02_MAULE_74', NULL, 0, 0),
(75, 53, '53_03_MAULE_75', NULL, 0, 0),
(76, 53, '53_04_MAULE_76', NULL, 0, 0),
(77, 53, '53_05_MAULE_77', NULL, 0, 0),
(84, 55, '55_07_MAULE_84', NULL, 0, 0),
(85, 55, '55_08_MAULE_85', NULL, 0, 0),
(86, 55, '55_09_MAULE_86', NULL, 0, 0),
(87, 55, '55_10_MAULE_87', NULL, 0, 0),
(88, 55, '55_11_MAULE_88', NULL, 0, 0),
(98, 47, '47_01_METROPOLITA_98', NULL, 0, 0),
(99, 47, '47_01_METROPOLITA_99', NULL, 0, 0),
(100, 47, '47_01_METROPOLITA_100', NULL, 0, 0),
(101, 47, '4701ME', NULL, 0, 0),
(102, 47, '47_01_METROPOLITA_102', NULL, 0, 0),
(103, 48, '48_01_METROPOLITA_103', NULL, 0, 0),
(104, 48, '48_02_METROPOLITA_104', NULL, 0, 0),
(105, 48, '48_03_METROPOLITA_105', NULL, 0, 0),
(106, 48, '48_04_METROPOLITA_106', NULL, 0, 0),
(107, 48, '48_05_METROPOLITA_107', NULL, 0, 0),
(108, 49, '49_01_OCTAVA_108', NULL, 0, 0),
(109, 49, '49_02_OCTAVA_109', NULL, 0, 0),
(110, 49, '49_03_OCTAVA_110', NULL, 0, 0),
(111, 49, '49_04_OCTAVA_111', NULL, 0, 0),
(112, 49, '49_05_OCTAVA_112', NULL, 0, 0),
(113, 54, '54_01_MAULE_113', NULL, 0, 0),
(114, 54, '54_02_MAULE_114', NULL, 0, 0),
(115, 54, '54_03_MAULE_115', NULL, 0, 0),
(116, 54, '54_04_MAULE_116', NULL, 0, 0),
(117, 54, '54_05_MAULE_117', NULL, 0, 0),
(120, 46, '4701ME', '2017-05-16', 1000, 1000),
(121, 46, '4701M', '2017-05-16', 1000, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisores`
--

CREATE TABLE `supervisores` (
  `idSupervisor` int(11) NOT NULL,
  `nombreSupervisor` varchar(50) NOT NULL,
  `correoSupervisor` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `celular` int(9) DEFAULT NULL,
  `status` enum('habilitado','desabilitado','eliminado') NOT NULL,
  `fechaMailEnviado` date DEFAULT NULL,
  `fechaMailConfirmado` date DEFAULT NULL,
  `horaMailEnviado` time DEFAULT NULL,
  `horaMailConfirmado` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `supervisores`
--

INSERT INTO `supervisores` (`idSupervisor`, `nombreSupervisor`, `correoSupervisor`, `password`, `celular`, `status`, `fechaMailEnviado`, `fechaMailConfirmado`, `horaMailEnviado`, `horaMailConfirmado`) VALUES
(13, 'BENJAMIN AVELLO ZAÑARTU', 'benjamin@septima.cl', NULL, NULL, 'desabilitado', '2017-03-22', NULL, '08:26:14', NULL),
(14, 'VICENTE GONZÁLEZ MUÑOZ', 'vicente@septima.cl', NULL, NULL, 'desabilitado', '2017-03-22', NULL, '08:27:34', NULL),
(15, 'MARTÍN ROJAS PÉREZ', 'martin@octava.cl', NULL, NULL, 'desabilitado', '2017-03-22', NULL, '08:28:31', NULL),
(16, 'MATIAS DÍAZ SOTO', 'matias@octava.cl', NULL, NULL, 'desabilitado', '2017-03-22', NULL, '08:29:22', NULL),
(17, 'JOAQUIN SILVA CONTRERAS', 'joaquin@octava.cl', NULL, NULL, 'desabilitado', '2017-03-22', NULL, '08:30:00', NULL),
(18, 'AGUSTÍN LÓPEZ RODRÍGUEZ', 'agustin@octava.cl', NULL, NULL, 'desabilitado', '2017-03-22', NULL, '08:31:02', NULL),
(19, 'CRISTOBAL MORALES MARTÍNEZ', 'cristobal@novena.cl', NULL, NULL, 'desabilitado', '2017-03-22', NULL, '08:32:58', NULL),
(20, 'MAXIMILIANO FUENTES VALENZUELA', 'maximiliano@novena.cl', NULL, NULL, 'desabilitado', '2017-03-22', NULL, '08:34:10', NULL),
(21, 'PABLO ARAYA SEPÚLVEDA', 'pablo@novena.cl', NULL, NULL, 'desabilitado', '2017-03-22', NULL, '08:35:14', NULL),
(22, 'JUAN PÉREZ VILLANUEVA', 'juan@metropolitana.cl', NULL, NULL, 'desabilitado', '2017-03-25', NULL, '06:58:55', NULL),
(23, 'ALEJANDRO PÉREZ ROSALEZ', 'alejandro@metropolitana.cl', NULL, NULL, 'desabilitado', '2017-03-25', NULL, '07:00:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisoreszonas`
--

CREATE TABLE `supervisoreszonas` (
  `id` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idSupervisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `supervisoreszonas`
--

INSERT INTO `supervisoreszonas` (`id`, `idZona`, `idSupervisor`) VALUES
(18, 54, 13),
(19, 55, 13),
(20, 55, 14),
(21, 49, 15),
(22, 50, 15),
(23, 51, 15),
(24, 51, 16),
(25, 51, 17),
(26, 49, 18),
(27, 50, 18),
(28, 52, 19),
(29, 52, 20),
(30, 52, 21),
(31, 53, 21),
(32, 46, 22),
(33, 47, 22),
(34, 48, 22),
(35, 47, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `idZona` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`idZona`, `idEmpresa`, `nombre`) VALUES
(46, 50, 'SANTIAGO'),
(47, 50, 'QUINTA NORMAL'),
(48, 50, 'MAIPÚ'),
(49, 51, 'CONCEPCIÓN'),
(50, 51, 'SAN PEDRO DE LA PAZ'),
(51, 51, 'HUALQUI'),
(52, 52, 'TEMUCO'),
(53, 52, 'MILIPEUCO'),
(54, 53, 'TALCA'),
(55, 53, 'CURICÓ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `idZona` (`idZona`),
  ADD KEY `idSupervisor` (`idSupervisor`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `idCliente_UNIQUE` (`idCliente`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

--
-- Indices de la tabla `clientesempresas`
--
ALTER TABLE `clientesempresas`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `fk_clientes_empresas_Clientes1_idx` (`idCliente`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`idDato`),
  ADD KEY `idArchivo` (`idArchivo`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `idEmpresa_UNIQUE` (`idEmpresa`),
  ADD UNIQUE KEY `rutEmpresa_UNIQUE` (`rut`),
  ADD UNIQUE KEY `nombreEmpresa_UNIQUE` (`nombre`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`idMaquina`),
  ADD UNIQUE KEY `idMaquina_UNIQUE` (`idMaquina`),
  ADD KEY `fk_Maquinas_Zonas1_idx` (`idZona`);

--
-- Indices de la tabla `supervisores`
--
ALTER TABLE `supervisores`
  ADD PRIMARY KEY (`idSupervisor`),
  ADD UNIQUE KEY `correoSupervisor_UNIQUE` (`correoSupervisor`),
  ADD UNIQUE KEY `idSupervisor_UNIQUE` (`idSupervisor`);

--
-- Indices de la tabla `supervisoreszonas`
--
ALTER TABLE `supervisoreszonas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_SupervisoresZonas_Zonas1_idx` (`idZona`),
  ADD KEY `fk_SupervisoresZonas_Supervisores1_idx` (`idSupervisor`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`idZona`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `idDato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8400;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `idMaquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT de la tabla `supervisores`
--
ALTER TABLE `supervisores`
  MODIFY `idSupervisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `supervisoreszonas`
--
ALTER TABLE `supervisoreszonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisores` (`idSupervisor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientesempresas`
--
ALTER TABLE `clientesempresas`
  ADD CONSTRAINT `fk_clientes_empresas_Clientes1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clientes_empresas_Empresas1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`idArchivo`) REFERENCES `archivos` (`idArchivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `supervisoreszonas`
--
ALTER TABLE `supervisoreszonas`
  ADD CONSTRAINT `fk_SupervisoresZonas_Supervisores1` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisores` (`idSupervisor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `supervisoreszonas_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `zonas_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
