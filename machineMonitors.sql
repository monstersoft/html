DROP DATABASE IF EXISTS machine_monitors;

CREATE DATABASE machine_monitors;

USE machine_monitors;

CREATE TABLE clientes (
    idCliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(60) DEFAULT NULL,
    password VARCHAR(12) DEFAULT NULL,
    empresa VARCHAR(45) DEFAULT NULL,
    cargo VARCHAR(45) DEFAULT NULL
);

CREATE TABLE empresas (
    idEmpresa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rut VARCHAR(10) DEFAULT NULL,
    nombre VARCHAR(45) DEFAULT NULL,
    correo VARCHAR(60) DEFAULT NULL,
    telefono INT(9) DEFAULT NULL
);

CREATE TABLE clientes_empresas (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idCliente INT NOT NULL,
    idEmpresa INT NOT NULL,
    FOREIGN KEY (idCliente) REFERENCES clientes(idCliente) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idEmpresa) REFERENCES empresas(idEmpresa) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE zonas (
    idZona INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idEmpresa INT NOT NULL,
    nombre VARCHAR(45),
    FOREIGN KEY (idEmpresa) REFERENCES empresas(idEmpresa) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE supervisores (
    idSupervisor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombreSupervisor VARCHAR(45) DEFAULT NULL,
    correoSupervisor VARCHAR(45) DEFAULT NULL,
    password VARCHAR(12) DEFAULT NULL,
    celular INT(9) DEFAULT NULL,
    status ENUM('habilitado','deshabilitado')
);

CREATE TABLE supervisores_zonas (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idZona INT NOT NULL,
    idSupervisor INT NOT NULL,
    FOREIGN KEY (idZona) REFERENCES zonas(idZona) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idSupervisor) REFERENCES supervisores(idSupervisor) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE maquinas (
    idMaquina INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idZona INT NOT NULL,
    patente VARCHAR(6) NOT NULL,
    fechaRegistro date NOT NULL,
    tara int(6) NOT NULL,
    cargaMaxima int(6) NOT NULL,
    FOREIGN KEY (idZona) REFERENCES zonas(idZona) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE archivos (
	idArchivo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idSupervisor INT DEFAULT NULL,
    idZona INT DEFAULT NULL,
    fechaSubida DATE DEFAULT NULL,
    fechaDatos DATE DEFAULT NULL,
    horaSubida TIME DEFAULT NULL,
    FOREIGN KEY (idSupervisor) REFERENCES supervisores(idSupervisor) ON DELETE SET NULL ON UPDATE SET NULL,
    FOREIGN KEY (idZona) REFERENCES zonas(idZona) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE datos (
    idDato INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idArchivo INT NOT NULL,
    patente VARCHAR(6) DEFAULT NULL,
    hora TIME DEFAULT NULL,
    latitud FLOAT(10,6) DEFAULT NULL,
    longitud FLOAT(10,6) DEFAULT NULL,
    motorFuncionando INT(1) DEFAULT NULL,
    rpm INT DEFAULT NULL,
    gradosPalaFrontal INT(3) DEFAULT NULL,
    gradosPalaTrasera INT(3) DEFAULT NULL,
    cambio INT(2) DEFAULT NULL,
    alturaPalaFrontal INT(3) DEFAULT NULL,
    alturaPalaTrasera INT(3) DEFAULT NULL,
    FOREIGN KEY (idArchivo) REFERENCES archivos(idArchivo) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE resultados (
    idResultado INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idArchivo INT NOT NULL,
    patente VARCHAR(6) DEFAULT NULL,
    idMaquina INT DEFAULT NULL,
    registrado INT(1) DEFAULT NULL,
    existeEnArchivo INT(1) DEFAULT NULL,
    fechaDatos DATE DEFAULT NULL,
    pRpm FLOAT DEFAULT NULL,
    pGpf FLOAT DEFAULT NULL,
    pGpt FLOAT DEFAULT NULL,
    pApf FLOAT DEFAULT NULL,
    pApt FLOAT DEFAULT NULL,
    tRecorridos FLOAT DEFAULT NULL,
    mediciones INT DEFAULT NULL,
    FOREIGN KEY (idArchivo) REFERENCES archivos(idArchivo) ON DELETE CASCADE ON UPDATE CASCADE
);

