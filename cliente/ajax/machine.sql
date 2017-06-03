DROP DATABASE IF EXISTS machine;
CREATE DATABASE machine;
USE machine;
CREATE TABLE tiposProductos(
    idTipoProducto int AUTO_INCREMENT,
    nombreTipo varchar(38),
    PRIMARY KEY(idTipoProducto)
);
CREATE TABLE productos(
    codigoProducto varchar(10) PRIMARY KEY,
    descripcion varchar(255),
    precioCompra float,
    precioVenta float,
    idTipoProducto int,
    FOREIGN KEY(idTipoProducto) REFERENCES tiposProductos(idTipoProducto)
);
CREATE TABLE tiposEmpleados(
    idTipoEmpleado int AUTO_INCREMENT,
    nombreTipo varchar(30),
    PRIMARY KEY (idTipoEmpleado)
);
CREATE TABLE personas(
    idPersona int AUTO_INCREMENT,
    rut varchar(10),
    nombre varchar(45),
    correo varchar(55)
);
CREATE TABLE empleados(
    idPersona int PRIMARY KEY,
    idTipoEmpleado int   
);
CREATE TABLE ventas(
    codigoVenta varchar(45) PRIMARY KEY,
    fecha dateTime,
    idEmpleado int,
    idCliente int,
    FOREIGN KEY (idEmpleado) REFERENCES empleados(idPersona),
    FOREIGN KEY (idCliente) REFERENCES clientes(idPersona)
);
CREATE TABLE detalleVentas(
    codigoVenta varchar(45),
    codigoProducto varchar(10),
    cantidad int,
    FOREIGN KEY (codigoVenta) REFERENCES ventas(codigoVenta),
    FOREIGN KEY (codigoProducto) REFERENCES productos(codigoProducto),
    PRIMARY KEY (codigoVenta,codigoProducto)
);