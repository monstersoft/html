SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `archivos` (
  `idArchivo` int(11) NOT NULL,
  `idSupervisor` int(11) NOT NULL,
  `fechaSubida` date NOT NULL,
  `horaSubida` time NOT NULL,
  `fechaArchivo` date NOT NULL,
  `peso` float NOT NULL,
  `cantidadRegistros` int(11) NOT NULL,
  `md5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(12) DEFAULT NULL,
  `empresa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `clientes` (`idCliente`, `correo`, `password`, `empresa`) VALUES
(2, 'pavillanueva@ing.ucsc.cl', '123456', 'Arauco');

CREATE TABLE `clientesempresas` (
  `idEmpresa` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `datos` (
  `idDato` int(11) NOT NULL,
  `idArchivo` int(11) NOT NULL,
  `identificador` int(11) NOT NULL,
  `patente` varchar(12) NOT NULL,
  `anguloPala` float NOT NULL,
  `anguloInclinacion` float NOT NULL,
  `alturaPala` float NOT NULL,
  `velocidad` float NOT NULL,
  `revoluciones` float NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `fechaDato` date NOT NULL,
  `horaDato` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `estado` enum('activado','desactivado','otro') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `maquinas` (
  `idMaquina` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `identificador` int(11) DEFAULT NULL,
  `patente` varchar(45) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `velocidadMaxima` float NOT NULL,
  `tara` float NOT NULL,
  `cargaMaxima` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `supervisores` (
  `idSupervisor` int(11) NOT NULL,
  `nombreSupervisor` varchar(50) NOT NULL,
  `correoSupervisor` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `celular` int(9) DEFAULT NULL,
  `status` enum('habilitado','desabilitado','eliminado') NOT NULL,
  `fechaRegistro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `supervisoreszonas` (
  `id` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idSupervisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `zonas` (
  `idZona` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `region` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `archivos`
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `idSupervisor` (`idSupervisor`);

ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `idCliente_UNIQUE` (`idCliente`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

ALTER TABLE `clientesempresas`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `fk_clientes_empresas_Clientes1_idx` (`idCliente`);

ALTER TABLE `datos`
  ADD PRIMARY KEY (`idDato`),
  ADD KEY `idArchivo` (`idArchivo`);

ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `idEmpresa_UNIQUE` (`idEmpresa`),
  ADD UNIQUE KEY `rutEmpresa_UNIQUE` (`rut`),
  ADD UNIQUE KEY `nombreEmpresa_UNIQUE` (`nombre`);

ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`idMaquina`),
  ADD UNIQUE KEY `idMaquina_UNIQUE` (`idMaquina`),
  ADD KEY `fk_Maquinas_Zonas1_idx` (`idZona`);

ALTER TABLE `supervisores`
  ADD PRIMARY KEY (`idSupervisor`),
  ADD UNIQUE KEY `correoSupervisor_UNIQUE` (`correoSupervisor`),
  ADD UNIQUE KEY `idSupervisor_UNIQUE` (`idSupervisor`);

ALTER TABLE `supervisoreszonas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_SupervisoresZonas_Zonas1_idx` (`idZona`),
  ADD KEY `fk_SupervisoresZonas_Supervisores1_idx` (`idSupervisor`);

ALTER TABLE `zonas`
  ADD PRIMARY KEY (`idZona`),
  ADD KEY `idEmpresa` (`idEmpresa`);


ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `datos`
  MODIFY `idDato` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
ALTER TABLE `maquinas`
  MODIFY `idMaquina` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `supervisores`
  MODIFY `idSupervisor` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `supervisoreszonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `zonas`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisores` (`idSupervisor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `clientesempresas`
  ADD CONSTRAINT `fk_clientes_empresas_Clientes1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clientes_empresas_Empresas1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`idArchivo`) REFERENCES `archivos` (`idArchivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES `supervisoreszonas` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `supervisoreszonas`
  ADD CONSTRAINT `fk_SupervisoresZonas_Supervisores1` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisores` (`idSupervisor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `supervisoreszonas_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `zonas`
  ADD CONSTRAINT `zonas_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
