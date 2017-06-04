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
(1, 'pavillanueva@ing.ucsc.cl', '123456', 'mi empresa');

CREATE TABLE `clientes_empresas` (
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

INSERT INTO `empresas` (`idEmpresa`, `rut`, `nombre`, `correo`, `telefono`, `estado`) VALUES
(1, '96838800-2', 'Maquinarias ConcepciÃ³n', 'info@maquinariasconcepcion.cl', '978544761', 'activado'),
(2, '99581960-0', 'Intraser', 'msalazar@intraser.cl', '977905604', 'activado'),
(3, '70016330-K', 'JCB', 'jcb@contacto.cl', '960078610', 'activado'),
(4, '76045622-5', 'Chacay', 'mparis@chacay.cl', '943172708', 'activado'),
(5, '81675600-6', 'Isermaq', 'isermaq@contacto.cl', '987197628', 'activado'),
(6, '96955280-9', 'Maquinarias AraucanÃ­a', 'maraucania@contacto.cl', '942234301', 'activado'),
(7, '96947020-9', 'Maquiterra', 'administracion@maquiterra.com', '950207039', 'activado'),
(8, '96706320-7', 'Himce', 'empresas@himce.cl', '942277888', 'activado'),
(9, '79699520-3', 'Gam Rentals', 'gam@contacto.cl', '902733190', 'activado');

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

INSERT INTO `maquinas` (`idMaquina`, `idZona`, `identificador`, `patente`, `year`, `fechaRegistro`, `velocidadMaxima`, `tara`, `cargaMaxima`) VALUES
(1, 1, 1, 'ABCASD', 0000, '2017-03-05', 100, 500, 500);

CREATE TABLE `proyectos` (
  `idProyecto` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `proyectos` (`idProyecto`, `idEmpresa`, `nombre`) VALUES
(1, 5, 'Santiago'),
(2, 1, 'ConcepciÃ³n'),
(3, 5, 'Talca'),
(4, 2, 'Antofagasta'),
(5, 2, 'Temuco');

CREATE TABLE `supervisores` (
  `idSupervisor` int(11) NOT NULL,
  `nombreSupervisor` varchar(50) NOT NULL,
  `correoSupervisor` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `celular` int(9) DEFAULT NULL,
  `status` enum('habilitado','desabilitado','eliminado') NOT NULL,
  `fechaRegistro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `supervisores` (`idSupervisor`, `nombreSupervisor`, `correoSupervisor`, `password`, `celular`, `status`, `fechaRegistro`) VALUES
(1, 'Patricio AndrÃ©s Villanueva Fuentes', 'pavillanueva@ing.ucsc.cl', '123456', 995007812, 'habilitado', '2017-03-05'),
(2, 'Miguel Orlando Villanueva Fuentes', 'miguel3498@hotmail.com', NULL, NULL, 'desabilitado', NULL);

CREATE TABLE `supervisoreszonas` (
  `id` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idSupervisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `supervisoreszonas` (`id`, `idZona`, `idSupervisor`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 2);

CREATE TABLE `zonas` (
  `idZona` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `latitud` float(10,6) DEFAULT NULL,
  `longitud` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `zonas` (`idZona`, `idProyecto`, `nombre`, `latitud`, `longitud`) VALUES
(1, 1, 'Quinta Normal', NULL, NULL),
(2, 1, 'Providencia', NULL, NULL),
(3, 1, 'MaipÃº', NULL, NULL),
(4, 2, 'San Pedro de la Paz', NULL, NULL),
(5, 2, 'Chiguayante', NULL, NULL),
(6, 2, 'Hualqui', NULL, NULL),
(7, 2, 'TomÃ©', NULL, NULL),
(8, 2, 'Penco', NULL, NULL),
(9, 3, 'San Clemente', NULL, NULL),
(10, 3, 'Maule', NULL, NULL),
(11, 3, 'Curepto', NULL, NULL);


ALTER TABLE `archivos`
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `idSupervisor` (`idSupervisor`);

ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `idCliente_UNIQUE` (`idCliente`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

ALTER TABLE `clientes_empresas`
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

ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`idProyecto`),
  ADD UNIQUE KEY `idProyecto_UNIQUE` (`idProyecto`),
  ADD KEY `fk_Proyectos_Empresas_idx` (`idEmpresa`);

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
  ADD UNIQUE KEY `idZona_UNIQUE` (`idZona`),
  ADD KEY `fk_Zonas_Proyectos1_idx` (`idProyecto`);


ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `datos`
  MODIFY `idDato` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `maquinas`
  MODIFY `idMaquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `proyectos`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `supervisores`
  MODIFY `idSupervisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `supervisoreszonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `zonas`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisores` (`idSupervisor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `clientes_empresas`
  ADD CONSTRAINT `fk_clientes_empresas_Clientes1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clientes_empresas_Empresas1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`idArchivo`) REFERENCES `archivos` (`idArchivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `maquinas`
  ADD CONSTRAINT `fk_Maquinas_Zonas1` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_Proyectos_Empresas` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `supervisoreszonas`
  ADD CONSTRAINT `fk_SupervisoresZonas_Supervisores1` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisores` (`idSupervisor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SupervisoresZonas_Zonas1` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `zonas`
  ADD CONSTRAINT `fk_Zonas_Proyectos1` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
