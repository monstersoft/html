-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2017 a las 05:01:00
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `machinemonitors`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `password` varchar(12) NOT NULL,
  `empresa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_empresas`
--

CREATE TABLE `clientes_empresas` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `idDato` int(11) NOT NULL,
  `idArchivo` int(11) NOT NULL,
  `patente` varchar(6) NOT NULL,
  `hora` time NOT NULL,
  `latitud` float(10,6) NOT NULL,
  `longitud` float(10,6) NOT NULL,
  `motorFuncionando` int(1) NOT NULL,
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
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `idMaquina` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `patente` varchar(6) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `tara` int(11) NOT NULL,
  `cargaMaxima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `idResultado` int(11) NOT NULL,
  `idArchivo` int(11) NOT NULL,
  `patente` varchar(6) NOT NULL,
  `idMaquina` int(11) NOT NULL,
  `registrado` int(1) NOT NULL,
  `existeEnArchivo` int(1) NOT NULL,
  `fechaDatos` date NOT NULL,
  `pRpm` float NOT NULL,
  `pGpf` float NOT NULL,
  `pGpt` float NOT NULL,
  `pApf` float NOT NULL,
  `pApt` float NOT NULL,
  `tRecorridos` float NOT NULL,
  `mediciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisores`
--

CREATE TABLE `supervisores` (
  `idSupervisor` int(11) NOT NULL,
  `nombreSupervisor` varchar(45) NOT NULL,
  `correoSupervisor` varchar(60) NOT NULL,
  `password` varchar(12) NOT NULL,
  `celular` int(9) NOT NULL,
  `status` enum('habilitado','desabilitado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisores_zonas`
--

CREATE TABLE `supervisores_zonas` (
  `id` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idSupervisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `idZona` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `clientes_empresas`
--
ALTER TABLE `clientes_empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idEmpresa` (`idEmpresa`);

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
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`idMaquina`),
  ADD KEY `idZona` (`idZona`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`idResultado`),
  ADD KEY `idArchivo` (`idArchivo`);

--
-- Indices de la tabla `supervisores`
--
ALTER TABLE `supervisores`
  ADD PRIMARY KEY (`idSupervisor`);

--
-- Indices de la tabla `supervisores_zonas`
--
ALTER TABLE `supervisores_zonas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idZona` (`idZona`),
  ADD KEY `idSupervisor` (`idSupervisor`);

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
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes_empresas`
--
ALTER TABLE `clientes_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
