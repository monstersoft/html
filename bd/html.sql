-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2017 a las 01:03:13
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
(2, 'agonzalez@arauco.cl', 'agonzalez', 'Arauco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_empresas`
--

CREATE TABLE `clientes_empresas` (
  `idEmpresa` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL
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
  `telefono` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`idEmpresa`, `rut`, `nombre`, `correo`, `telefono`) VALUES
(1, '76245418-1', '45646', 'contacto@serviciosbiobio.cl', '123456789'),
(2, '76297828-8', 'JCB123', 'contacto@jcb.cl', '683214464'),
(3, '8272362-5', 'Holalalallala', 'ASDSD@SKJDHDJKASD.CL', '995007812'),
(4, '76749540-4', 'Besalco Maquinarias', 'contacto@besalco.cl', '25407400'),
(90, '17286211-k', 'Servicios bio biof', 'contacto@servisiosbiobio.cl', ''),
(92, '15331355-5', 'ALGO', 'contactso@servisiosbiobio.cl', '412424026');

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `idMaquina` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `patente` varchar(45) DEFAULT NULL,
  `fechaRegistro` date NOT NULL,
  `velocidadMaxima` float NOT NULL,
  `tara` float NOT NULL,
  `cargaMaxima` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`idMaquina`, `idZona`, `patente`, `fechaRegistro`, `velocidadMaxima`, `tara`, `cargaMaxima`) VALUES
(1, 1, 'A1', '0000-00-00', 100, 150, 100),
(2, 1, 'A2', '0000-00-00', 50, 200, 100),
(3, 1, 'A3', '0000-00-00', 80, 300, 100),
(4, 1, 'A4', '0000-00-00', 20, 500, 80),
(5, 1, 'A5', '0000-00-00', 100, 600, 520),
(6, 2, 'B1', '0000-00-00', 100, 100, 550),
(7, 2, 'B2', '0000-00-00', 100, 100, 1000),
(8, 2, 'B3', '0000-00-00', 100, 100, 45),
(9, 2, 'B4', '0000-00-00', 100, 100, 1002),
(10, 2, 'B5', '0000-00-00', 100, 20, 46),
(11, 2, 'B6', '0000-00-00', 54, 45, 564),
(12, 2, 'B7', '0000-00-00', 45, 20, 6565),
(13, 2, 'B8', '0000-00-00', 150, 200, 45),
(14, 3, 'C1', '0000-00-00', 300, 500, 100),
(15, 3, 'C2', '0000-00-00', 500, 800, 560),
(16, 3, 'C3', '0000-00-00', 900, 100, 63),
(17, 3, 'C4', '0000-00-00', 100, 100, 6864),
(18, 3, 'C5', '0000-00-00', 80, 1560, 654),
(19, 3, 'C6', '0000-00-00', 90, 48, 61),
(20, 3, 'C7', '0000-00-00', 50, 56, 648),
(21, 4, 'D1', '0000-00-00', 78, 78, 212),
(22, 4, 'D2', '0000-00-00', 100, 63, 987),
(23, 4, 'D3', '0000-00-00', 100, 456, 654),
(24, 4, 'D4', '0000-00-00', 100, 78, 48),
(25, 4, 'D5', '0000-00-00', 100, 59, 456),
(26, 4, 'D6', '0000-00-00', 0, 0, 0),
(27, 4, 'D7', '0000-00-00', 0, 0, 0),
(28, 4, 'D8', '0000-00-00', 0, 0, 0),
(29, 5, 'E1', '0000-00-00', 0, 0, 0),
(30, 5, 'E2', '0000-00-00', 0, 0, 0),
(31, 5, 'E3', '0000-00-00', 0, 0, 0),
(32, 6, 'F1', '0000-00-00', 0, 0, 0),
(33, 6, 'F2', '0000-00-00', 0, 0, 0),
(34, 6, 'F3', '0000-00-00', 0, 0, 0),
(35, 6, 'F4', '0000-00-00', 0, 0, 0),
(36, 6, 'F5', '0000-00-00', 0, 0, 0),
(37, 7, 'F6', '0000-00-00', 0, 0, 0),
(38, 7, 'G1', '0000-00-00', 0, 0, 0),
(39, 7, 'G2', '0000-00-00', 0, 0, 0),
(40, 7, 'G3', '0000-00-00', 0, 0, 0),
(41, 7, 'G4', '0000-00-00', 0, 0, 0),
(42, 7, 'G5', '0000-00-00', 0, 0, 0),
(43, 7, 'G6', '0000-00-00', 0, 0, 0),
(44, 7, 'G7', '0000-00-00', 0, 0, 0),
(45, 7, 'G8', '0000-00-00', 0, 0, 0),
(46, 8, 'H1', '0000-00-00', 0, 0, 0),
(47, 8, 'H2', '0000-00-00', 0, 0, 0),
(48, 9, 'I1', '0000-00-00', 0, 0, 0),
(49, 9, 'I2', '0000-00-00', 0, 0, 0),
(50, 9, 'I3', '0000-00-00', 0, 0, 0),
(51, 9, 'I4', '0000-00-00', 0, 0, 0),
(52, 9, 'I5', '0000-00-00', 0, 0, 0),
(53, 9, 'I6', '0000-00-00', 0, 0, 0),
(54, 9, 'I7', '0000-00-00', 0, 0, 0),
(55, 10, 'J1', '0000-00-00', 0, 0, 0),
(56, 10, 'J2', '0000-00-00', 0, 0, 0),
(57, 10, 'J3', '0000-00-00', 0, 0, 0),
(58, 10, 'J4', '0000-00-00', 0, 0, 0),
(59, 10, 'J5', '0000-00-00', 0, 0, 0),
(60, 10, 'J6', '0000-00-00', 0, 0, 0),
(61, 10, 'J7', '0000-00-00', 0, 0, 0),
(62, 10, 'J8', '0000-00-00', 0, 0, 0),
(63, 11, 'K1', '0000-00-00', 0, 0, 0),
(64, 11, 'K2', '0000-00-00', 0, 0, 0),
(65, 11, 'K3', '0000-00-00', 0, 0, 0),
(66, 11, 'K4', '0000-00-00', 0, 0, 0),
(67, 11, 'K5', '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `idProyecto` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`idProyecto`, `idEmpresa`, `nombre`) VALUES
(1, 1, 'Proyecto1'),
(2, 1, 'Proyecto2'),
(3, 3, 'Proyecto3'),
(4, 2, 'Proyecto4'),
(5, 2, 'Proyecto5'),
(6, 2, 'Proyecto6'),
(7, 4, 'Proyecto7'),
(8, 1, 'Los Acaciones'),
(11, 1, 'Los peltres'),
(12, 1, 'Proyecto4');

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisores`
--

CREATE TABLE `supervisores` (
  `idSupervisor` int(11) NOT NULL,
  `nombreSupervisor` varchar(50) NOT NULL,
  `correoSupervisor` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `celular` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `supervisores`
--

INSERT INTO `supervisores` (`idSupervisor`, `nombreSupervisor`, `correoSupervisor`, `password`, `celular`) VALUES
(1, 'Angel Contreras', 'acontreras@jcb.cl', 'acontreras', 68080541),
(2, 'Adolfo Flores', 'aflores@besalco.cl', 'aflores', 61368612),
(3, 'Arturo Soto', 'asoto@gam.cl', 'asoto', 134179090),
(4, 'Bernardo Espinoza', 'bespinoza@besalco.cl', 'bespinoza', 142707535),
(5, 'Benjamin Muñoz', 'bmunoz@serviciosbiobio.cl', 'bmunoz', 59288113),
(6, 'Carlos Silva', 'csilva@jcb.cl', 'csilva', 223776388),
(7, 'Daniel Rodriguez', 'drodriguez@jcb.cl', 'drodriguez', 131680597),
(8, 'Felipe Torres', 'ftorres@jcb.cl', 'ftorres', 242874188),
(9, 'Gerson Castillo', 'gcastillo@besalco.cl', 'gcastillo', 188016642),
(10, 'Ignacio Ramirez', 'iramirez@besalco.cl', 'iramirez', 88917456),
(11, 'Juan López', 'jlopez@jcb.cl', 'jlopez', 188592422),
(12, 'Javier Pérez', 'jperez@gam.cl', 'jperez', 109759287),
(13, 'Jose Valenzuela', 'jvalenzuela@besalco.cl', 'jvalenzuela', 165249852),
(14, 'Leonardo Araya', 'laraya@jcb.cl', 'laraya', 64886215),
(15, 'Marcos Díaz', 'mdiaz@gam.cl', 'mdiaz', 122002276),
(16, 'Mauricio Martínez', 'mmartinez@jcb.cl', 'mmartinez', 233415375),
(17, 'Marcelo Rojas', 'mrojas@gam.cl', 'mrojas', 56237518),
(18, 'Nicanor Fuentes', 'nfuentes@jcb.cl', 'nfuentes', 232569417),
(19, 'Sebastian Sepúlveda', 'ssepulveda@jcb.cl', 'ssepulveda', 61410023),
(20, 'Tomas Morales', 'tmorales@jcb.cl', 'tmorales', 87306259),
(21, 'Victor González', 'vgonzalez@serviciosbiobio.cl', 'vgonzalez', 197988673);

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
(1, 1, 5),
(2, 2, 21),
(3, 3, 3),
(4, 4, 12),
(5, 4, 15),
(6, 3, 17),
(7, 3, 12),
(8, 5, 1),
(9, 6, 6),
(10, 7, 7),
(11, 8, 8),
(12, 5, 11),
(13, 5, 14),
(14, 7, 16),
(15, 8, 18),
(16, 8, 19),
(17, 5, 20),
(18, 6, 20),
(19, 7, 20),
(20, 8, 20),
(21, 9, 2),
(22, 10, 4),
(23, 11, 9),
(24, 11, 10),
(25, 9, 13),
(26, 10, 13),
(27, 11, 13);

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `idZona` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `latitud` float(10,6) DEFAULT NULL,
  `longitud` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`idZona`, `idProyecto`, `nombre`, `latitud`, `longitud`) VALUES
(1, 1, 'Udec', -36.829475, -73.036369),
(2, 2, 'Ucsc', -36.798553, -73.058105),
(3, 3, 'Usach', 33.451759, -70.688316),
(4, 3, 'Utfsm', -33.490192, -70.619392),
(5, 4, 'Uch', -33.443810, -70.652580),
(6, 4, 'Puc', -33.441128, -70.642982),
(7, 5, 'Uft', -33.437099, -70.610138),
(8, 6, 'Uai', -33.489426, -70.518852),
(9, 7, 'Inacap', -33.489403, -70.586708),
(10, 7, 'Duoc', -33.489365, -70.586708),
(11, 7, 'Los leones', -33.449383, -70.670280);

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Estructura para la vista `empresascliente`
--
DROP TABLE IF EXISTS `empresascliente`;
-- --------------------------------------------------------
-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `idCliente_UNIQUE` (`idCliente`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

--
-- Indices de la tabla `clientes_empresas`
--
ALTER TABLE `clientes_empresas`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `fk_clientes_empresas_Clientes1_idx` (`idCliente`);

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
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`idProyecto`),
  ADD UNIQUE KEY `idProyecto_UNIQUE` (`idProyecto`),
  ADD KEY `fk_Proyectos_Empresas_idx` (`idEmpresa`);

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
  ADD UNIQUE KEY `idZona_UNIQUE` (`idZona`),
  ADD KEY `fk_Zonas_Proyectos1_idx` (`idProyecto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `idMaquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `supervisores`
--
ALTER TABLE `supervisores`
  MODIFY `idSupervisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `supervisoreszonas`
--
ALTER TABLE `supervisoreszonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes_empresas`
--
ALTER TABLE `clientes_empresas`
  ADD CONSTRAINT `fk_clientes_empresas_Clientes1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clientes_empresas_Empresas1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `fk_Maquinas_Zonas1` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_Proyectos_Empresas` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `supervisoreszonas`
--
ALTER TABLE `supervisoreszonas`
  ADD CONSTRAINT `fk_SupervisoresZonas_Supervisores1` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisores` (`idSupervisor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SupervisoresZonas_Zonas1` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `fk_Zonas_Proyectos1` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
