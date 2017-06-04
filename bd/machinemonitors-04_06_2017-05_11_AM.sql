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
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisores` (`idSupervisor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes_empresas`
--
ALTER TABLE `clientes_empresas`
  ADD CONSTRAINT `clientes_empresas_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clientes_empresas_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`idArchivo`) REFERENCES `archivos` (`idArchivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`idArchivo`) REFERENCES `archivos` (`idArchivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `supervisores`
--
ALTER TABLE `supervisores`
  ADD CONSTRAINT `supervisores_ibfk_1` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisores_zonas` (`idSupervisor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `supervisores_zonas`
--
ALTER TABLE `supervisores_zonas`
  ADD CONSTRAINT `supervisores_zonas_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `zonas_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
