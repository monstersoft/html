SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE archivos (
  `idArchivo` int(11) NOT NULL,
  `idSupervisor` int(11) NOT NULL,
  `fechaSubida` date NOT NULL,
  `horaSubida` time NOT NULL,
  `fechaArchivo` date NOT NULL,
  `peso` float NOT NULL,
  `cantidadRegistros` int(11) NOT NULL,
  `md5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE clientes (
  `idCliente` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(12) DEFAULT NULL,
  `empresa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO clientes (idCliente, correo, `password`, empresa) VALUES
(3, 'pavillanueva@ing.ucsc.cl', '123456', 'Estudiante');

CREATE TABLE clientesempresas (
  `idEmpresa` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE datos (
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

CREATE TABLE empresas (
  `idEmpresa` int(11) NOT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `estado` enum('activado','desactivado','otro') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO empresas (idEmpresa, rut, nombre, correo, telefono, estado) VALUES
(50, '17286211-K', 'SERVICIOS BÍO BÍO', 'serviciosbiobio@contacto.cl', '995007812', 'activado'),
(51, '15331355-5', 'BESALCO MAQUINARIAS', 'besalcomaquinarias@contacto.cl', '991295057', 'activado'),
(52, '8280550-8', 'KOMATSU', 'komatsu@contacto.cl', '996998537', 'activado'),
(53, '8272362-5', 'ZAÑARTU MÁQUINAS', 'zañartu@contacto.cl', '950207039', 'activado');

CREATE TABLE maquinas (
  `idMaquina` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `identificador` int(11) DEFAULT NULL,
  `patente` varchar(45) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `tara` float NOT NULL,
  `cargaMaxima` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO maquinas (idMaquina, idZona, identificador, patente, fechaRegistro, tara, cargaMaxima) VALUES
(1, 46, 1, '46_01_METROPOLITANA_01', NULL, 0, 0),
(2, 46, 2, '46_02_METROPOLITANA_02', NULL, 0, 0),
(23, 46, 3, '46_03_METROPOLITANA_23', NULL, 0, 0),
(24, 46, 4, '46_04_METROPOLITANA_24', NULL, 0, 0),
(25, 46, 5, '46_05_METROPOLITANA_25', NULL, 0, 0),
(36, 50, 1, '50_01_OCTAVA_36', NULL, 0, 0),
(39, 50, 4, '50_04_OCTAVA_39', NULL, 0, 0),
(40, 50, 5, '50_05_OCTAVA_40', NULL, 0, 0),
(41, 50, 6, '50_06_OCTAVA_41', NULL, 0, 0),
(42, 50, 7, '50_07_OCTAVA_42', NULL, 0, 0),
(43, 50, 8, '50_08_OCTAVA_43', NULL, 0, 0),
(44, 51, 1, '51_01_OCTAVA_44', NULL, 0, 0),
(45, 51, 2, '51_02_OCTAVA_45', NULL, 0, 0),
(46, 51, 3, '51_03_OCTAVA_47', NULL, 0, 0),
(47, 51, 4, '51_04_OCTAVA_48', NULL, 0, 0),
(68, 52, 14, '52_14_NOVENA_68', NULL, 0, 0),
(69, 52, 15, '52_15_NOVENA_69', NULL, 0, 0),
(70, 52, 16, '52_16_NOVENA_70', NULL, 0, 0),
(71, 52, 17, '52_17_NOVENA_71', NULL, 0, 0),
(72, 52, 18, '52_18_NOVENA_72', NULL, 0, 0),
(73, 53, 1, '53_01_MAULE_73', NULL, 0, 0),
(74, 53, 2, '53_02_MAULE_74', NULL, 0, 0),
(75, 53, 3, '53_03_MAULE_75', NULL, 0, 0),
(76, 53, 4, '53_04_MAULE_76', NULL, 0, 0),
(77, 53, 5, '53_05_MAULE_77', NULL, 0, 0),
(84, 55, 7, '55_07_MAULE_84', NULL, 0, 0),
(85, 55, 8, '55_08_MAULE_85', NULL, 0, 0),
(86, 55, 9, '55_09_MAULE_86', NULL, 0, 0),
(87, 55, 10, '55_10_MAULE_87', NULL, 0, 0),
(88, 55, 11, '55_11_MAULE_88', NULL, 0, 0),
(98, 47, 1, '47_01_METROPOLITA_98', NULL, 0, 0),
(99, 47, 2, '47_01_METROPOLITA_99', NULL, 0, 0),
(100, 47, 3, '47_01_METROPOLITA_100', NULL, 0, 0),
(101, 47, 4, '47_01_METROPOLITA_101', NULL, 0, 0),
(102, 47, 5, '47_01_METROPOLITA_102', NULL, 0, 0),
(103, 48, 1, '48_01_METROPOLITA_103', NULL, 0, 0),
(104, 48, 2, '48_02_METROPOLITA_104', NULL, 0, 0),
(105, 48, 3, '48_03_METROPOLITA_105', NULL, 0, 0),
(106, 48, 4, '48_04_METROPOLITA_106', NULL, 0, 0),
(107, 48, 5, '48_05_METROPOLITA_107', NULL, 0, 0),
(108, 49, 1, '49_01_OCTAVA_108', NULL, 0, 0),
(109, 49, 2, '49_02_OCTAVA_109', NULL, 0, 0),
(110, 49, 3, '49_03_OCTAVA_110', NULL, 0, 0),
(111, 49, 4, '49_04_OCTAVA_111', NULL, 0, 0),
(112, 49, 5, '49_05_OCTAVA_112', NULL, 0, 0),
(113, 54, 1, '54_01_MAULE_113', NULL, 0, 0),
(114, 54, 2, '54_02_MAULE_114', NULL, 0, 0),
(115, 54, 3, '54_03_MAULE_115', NULL, 0, 0),
(116, 54, 4, '54_04_MAULE_116', NULL, 0, 0),
(117, 54, 5, '54_05_MAULE_117', NULL, 0, 0);

CREATE TABLE supervisores (
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

INSERT INTO supervisores (idSupervisor, nombreSupervisor, correoSupervisor, `password`, celular, `status`, fechaMailEnviado, fechaMailConfirmado, horaMailEnviado, horaMailConfirmado) VALUES
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

CREATE TABLE supervisoreszonas (
  `id` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idSupervisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO supervisoreszonas (id, idZona, idSupervisor) VALUES
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

CREATE TABLE zonas (
  `idZona` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO zonas (idZona, idEmpresa, nombre) VALUES
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


ALTER TABLE archivos
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `idSupervisor` (`idSupervisor`);

ALTER TABLE clientes
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `idCliente_UNIQUE` (`idCliente`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

ALTER TABLE clientesempresas
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `fk_clientes_empresas_Clientes1_idx` (`idCliente`);

ALTER TABLE datos
  ADD PRIMARY KEY (`idDato`),
  ADD KEY `idArchivo` (`idArchivo`);

ALTER TABLE empresas
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `idEmpresa_UNIQUE` (`idEmpresa`),
  ADD UNIQUE KEY `rutEmpresa_UNIQUE` (`rut`),
  ADD UNIQUE KEY `nombreEmpresa_UNIQUE` (`nombre`);

ALTER TABLE maquinas
  ADD PRIMARY KEY (`idMaquina`),
  ADD UNIQUE KEY `idMaquina_UNIQUE` (`idMaquina`),
  ADD KEY `fk_Maquinas_Zonas1_idx` (`idZona`);

ALTER TABLE supervisores
  ADD PRIMARY KEY (`idSupervisor`),
  ADD UNIQUE KEY `correoSupervisor_UNIQUE` (`correoSupervisor`),
  ADD UNIQUE KEY `idSupervisor_UNIQUE` (`idSupervisor`);

ALTER TABLE supervisoreszonas
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_SupervisoresZonas_Zonas1_idx` (`idZona`),
  ADD KEY `fk_SupervisoresZonas_Supervisores1_idx` (`idSupervisor`);

ALTER TABLE zonas
  ADD PRIMARY KEY (`idZona`),
  ADD KEY `idEmpresa` (`idEmpresa`);


ALTER TABLE clientes
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE datos
  MODIFY `idDato` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE empresas
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
ALTER TABLE maquinas
  MODIFY `idMaquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
ALTER TABLE supervisores
  MODIFY `idSupervisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
ALTER TABLE supervisoreszonas
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
ALTER TABLE zonas
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

ALTER TABLE archivos
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`idSupervisor`) REFERENCES supervisores (`idSupervisor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE clientesempresas
  ADD CONSTRAINT `fk_clientes_empresas_Clientes1` FOREIGN KEY (`idCliente`) REFERENCES clientes (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clientes_empresas_Empresas1` FOREIGN KEY (`idEmpresa`) REFERENCES empresas (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE datos
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`idArchivo`) REFERENCES archivos (`idArchivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE maquinas
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES zonas (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE supervisoreszonas
  ADD CONSTRAINT `fk_SupervisoresZonas_Supervisores1` FOREIGN KEY (`idSupervisor`) REFERENCES supervisores (`idSupervisor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `supervisoreszonas_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES zonas (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE zonas
  ADD CONSTRAINT `zonas_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES empresas (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
