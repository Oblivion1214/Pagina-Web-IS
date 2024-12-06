DROP DATABASE PROYECTO;
CREATE DATABASE PROYECTO;
USE PROYECTO;


CREATE TABLE CATEGORIAS (
  CategoriaID INT AUTO_INCREMENT,
  Nombre VARCHAR(60),
  Descripcion VARCHAR(60),
  PRIMARY KEY (CategoriaID),
  KEY NN (Nombre, Descripcion)
);

CREATE TABLE PROVEEDOR (
  ProveedorID INT AUTO_INCREMENT,
  Nombre VARCHAR(60),
  ApellidoPaterno VARCHAR(60),
  ApellidoMaterno VARCHAR(60),
  Telefono VARCHAR(60),
  PRIMARY KEY (ProveedorID),
  KEY NN (Nombre, Telefono)
);
CREATE TABLE PRODUCTOS (
  ProductoID INT AUTO_INCREMENT,
  Nombre VARCHAR(60),
  Stock INT,
  PrecioProveedor DECIMAL(10, 2),
  PrecioCliente DECIMAL(10, 2),
  Descripcion VARCHAR(60),
  ProveedorID INT,
  CategoriaID INT,
  PRIMARY KEY (ProductoID),
  FOREIGN KEY (CategoriaID) REFERENCES CATEGORIAS(CategoriaID),
  KEY NN (Nombre, Stock, PrecioProveedor, PrecioCliente, Descripcion)
);

CREATE TABLE DireccionesCliente (
  DireccionID INT AUTO_INCREMENT,
  Estado VARCHAR(60),
  Municipio VARCHAR(60),
  Calle VARCHAR(60),
  Numero VARCHAR(60),
  ClienteID INT,
  PRIMARY KEY (DireccionID),
  KEY NN (Estado, Municipio, Calle, Numero)
);

CREATE TABLE Tarjetas (
  TarjetaID INT AUTO_INCREMENT,
  NumeroTarjeta VARCHAR(60),
  FechaCaducidad VARCHAR(60),
  CVV VARCHAR(60),
  ClienteID INT,
  PRIMARY KEY (TarjetaID),
  KEY NN (NumeroTarjeta, FechaCaducidad, CVV)
);


CREATE TABLE Pagos (
  PagoID INT AUTO_INCREMENT,
  Estado VARCHAR(60),
  TarjetaID INT,
  PRIMARY KEY (PagoID),
  KEY NN (Estado)
);

CREATE TABLE DireccionesProveedor (
  DireccionID INT AUTO_INCREMENT,
  Estado VARCHAR(60),
  Municipio VARCHAR(60),
  Calle VARCHAR(60),
  Numero VARCHAR(60),
  ProveedorID INT,
  PRIMARY KEY (DireccionID),
  KEY NN (Estado, Municipio, Calle, Numero)
);

CREATE TABLE USUARIO (
  UsuarioID INT AUTO_INCREMENT,
  Contraseña VARCHAR(60),
  CorreoElectronico VARCHAR(60),
  PRIMARY KEY (UsuarioID),
  KEY NN (Contraseña, CorreoElectronico)
);

CREATE TABLE CLIENTES (
  ClienteID INT AUTO_INCREMENT,
  Nombre VARCHAR(60),
  ApellidoPaterno VARCHAR(60),
  ApellidoMaterno VARCHAR(60),
  Telefono VARCHAR(60),
  UsuarioID INT,
  PRIMARY KEY (ClienteID),
  KEY NN (Nombre, ApellidoPaterno, ApellidoMaterno, Telefono)
);

CREATE TABLE CARRITO (
  CarritoID INT AUTO_INCREMENT,
  ProductoID INT,
  Cantidad INT,
  PrecioCliente DECIMAL(10, 2),
  ClienteID INT,
  Total DECIMAL(10, 2),
  Estado VARCHAR(18),
  PRIMARY KEY (CarritoID),
  KEY NN (ProductoID, Cantidad, PrecioCliente, ClienteID, Total)
);

CREATE TABLE HISTORIALPEDIDOS (
  HistorialPedidosID INT AUTO_INCREMENT,
  PedidoID INT,
  ClienteID INT,
  PRIMARY KEY (HistorialPedidosID)
);


CREATE TABLE DETALLEPEDIDOS (
  DetallePedidoID INT AUTO_INCREMENT,
  TotalCompra DECIMAL(10, 2),
  PagoID INT,
  CarritoID INT,
  PRIMARY KEY (DetallePedidoID),
  KEY NN (TotalCompra)
);



CREATE TABLE PEDIDOS (
  PedidoID INT AUTO_INCREMENT,
  FechaCompra VARCHAR(60),
  FechaEntrega VARCHAR(60),
  Estado VARCHAR(60),
  DetallePedidoID INT,
  PRIMARY KEY (PedidoID),
  KEY NN (FechaCompra, FechaEntrega, Estado)
);





-- RELATIONSHIPS


-- PRODUCTOS
ALTER TABLE PRODUCTOS
ADD CONSTRAINT FK_CategoriaID
FOREIGN KEY (CategoriaID)
REFERENCES CATEGORIAS(CategoriaID);

ALTER TABLE PRODUCTOS
ADD CONSTRAINT FK_ProveedorID
FOREIGN KEY (ProveedorID)
REFERENCES PROVEEDOR(ProveedorID);

--  DireccionesCliente
ALTER TABLE DireccionesCliente
ADD CONSTRAINT FK_ClienteID
FOREIGN KEY (ClienteID)
REFERENCES CLIENTES(ClienteID);

--  Tarjetas
ALTER TABLE Tarjetas
ADD CONSTRAINT FK_ClienteIDTarjeta
FOREIGN KEY (ClienteID)
REFERENCES CLIENTES(ClienteID);

-- Pagos
ALTER TABLE Pagos
ADD CONSTRAINT FK_TarjetaID
FOREIGN KEY (TarjetaID)
REFERENCES Tarjetas(TarjetaID);

--  DireccionesProveedor
ALTER TABLE DireccionesProveedor
ADD CONSTRAINT FK_ProveedorIDAdress
FOREIGN KEY (ProveedorID)
REFERENCES PROVEEDOR(ProveedorID);

--  CLIENTES
ALTER TABLE CLIENTES
ADD CONSTRAINT FK_UsuarioID
FOREIGN KEY (UsuarioID)
REFERENCES USUARIO(UsuarioID);

--  CARRITO
ALTER TABLE CARRITO
ADD CONSTRAINT FK_ProductoID
FOREIGN KEY (ProductoID)
REFERENCES PRODUCTOS(ProductoID);

ALTER TABLE CARRITO
ADD CONSTRAINT FK_ClienteIDcarrito
FOREIGN KEY (ClienteID)
REFERENCES CLIENTES(ClienteID);

-- HISTORIALPEDIDOS
ALTER TABLE HISTORIALPEDIDOS
ADD CONSTRAINT FK_PedidoID
FOREIGN KEY (PedidoID)
REFERENCES PEDIDOS(PedidoID);

ALTER TABLE HISTORIALPEDIDOS
ADD CONSTRAINT FK_ClienteIDHP
FOREIGN KEY (ClienteID)
REFERENCES CLIENTES(ClienteID);

--  DETALLEPEDIDOS
ALTER TABLE DETALLEPEDIDOS
ADD CONSTRAINT FK_PagoID
FOREIGN KEY (PagoID)
REFERENCES Pagos(PagoID);

ALTER TABLE DETALLEPEDIDOS
ADD CONSTRAINT FK_CarritoID
FOREIGN KEY (CarritoID)
REFERENCES CARRITO(CarritoID);

--  PEDIDOS
ALTER TABLE PEDIDOS
ADD CONSTRAINT FK_DetallePedidoID
FOREIGN KEY (DetallePedidoID)
REFERENCES DETALLEPEDIDOS(DetallePedidoID);


DESC HISTORIALPEDIDOS;




-- INSERT

INSERT INTO CATEGORIAS (Nombre, Descripcion) VALUES('Bebidas', 'Bebidas no alcohólicas y refrescos'), 
('Snacks', 'Aperitivos y snacks salados'), 
('Productos enlatados', 'Alimentos enlatados y conservas'), 
('Lácteos', 'Productos lácteos como leche y yogur'), 
('Panadería', 'Productos de panadería y repostería'), 
('Carnes', 'Carnes frescas y embutidos'), 
('Frutas y verduras', 'Frutas frescas y verduras'), 
('Limpieza', 'Productos de limpieza y cuidado del hogar'), 
('Cuidado personal', 'Productos de cuidado personal'), 
('Cigarrillos', 'Productos de tabaco y cigarrillos'), 
('Dulces', 'Dulces y chocolates'), 
('Condimentos', 'Condimentos y especias'), 
('Papel y suministros', 'Productos de papel y suministros de oficina'), 
('Bebidas alcohólicas', 'Bebidas alcohólicas y licores'), 
('Aceites y vinagres', 'Aceites de cocina y vinagres'), 
('Conservas', 'Conservas y alimentos enlatados'), 
('Artículos de hogar', 'Artículos para el hogar y utensilios de cocina'), 
('Higiene personal', 'Productos de higiene personal'), 
('Hortalizas', 'Hortalizas frescas y verduras'), 
('Productos de pan', 'Productos de panadería frescos');

INSERT INTO PROVEEDOR (Nombre, ApellidoPaterno, ApellidoMaterno, Telefono)
VALUES 
('Juan', 'Perez', 'Lopez', '5512345678'),
('Maria', 'Gonzalez', 'Martinez', '5523456789'),
('Carlos', 'Rodriguez', 'Garcia', '5534567890'),
('Ana', 'Fernandez', 'Gomez', '5545678901'),
('Pedro', 'Ruiz', 'Guerrero', '5556789012'),
('Carmen', 'Torres', 'Santos', '5567890123'),
('Ricardo', 'Ramirez', 'Reyes', '5578901234'),
('Isabel', 'Mendoza', 'Aguilar', '5589012345'),
('Luis', 'Castro', 'Romero', '5590123456'),
('Patricia', 'Vargas', 'Guerra', '5601234567'),
('Francisco', 'Ramos', 'Caballero', '5612345678'),
('Laura', 'Guerrero', 'Peña', '5623456789'),
('Javier', 'Morales', 'Cortes', '5634567890'),
('Teresa', 'Delgado', 'Rojas', '5645678901'),
('Jose Antonio','Paredes','Bautista','5656789012'),
('Sofia','Campos','Navarro','5667890123'),
('David','Cordero','Mendez','5678901234'),
('Lucia','Aguirre','Barajas','5689012345'),
('Daniel','Vega','Molina','5690123456'),
('Rosa Maria','Rangel','Del Bosque','5701234567');

INSERT INTO DireccionesProveedor (Estado, Municipio, Calle, Numero, ProveedorID) VALUES 

('Jalisco', 'Guadalajara', 'Avenida Vallarta', '123', 1), 

('Jalisco', 'Guadalajara', 'Calle Juárez', '456', 2), 

('Jalisco', 'Zapopan', 'Calle Reforma', '789', 3), 

('Jalisco', 'Tlaquepaque', 'Avenida Chapultepec', '101', 4), 

('Jalisco', 'Guadalajara', 'Calle Morelos', '555', 5),  

('Jalisco', 'Zapopan', 'Avenida Américas', '222', 6), 

('Jalisco', 'Guadalajara', 'Calle Colón', '333', 7), 

('Jalisco', 'Zapopan', 'Avenida México', '777', 8), 

('Jalisco', 'Tlaquepaque', 'Calle 5 de Mayo', '999', 9), 

('Jalisco', 'Guadalajara', 'Avenida Niños Héroes', '888', 10), 

('Jalisco', 'Zapopan', 'Calle Independencia', '777', 11), 

('Jalisco', 'Guadalajara', 'Avenida Federalismo', '666', 12), 

('Jalisco', 'Zapopan', 'Calle Madero', '555', 13), 

('Jalisco', 'Guadalajara', 'Avenida Hidalgo', '444', 14), 

('Jalisco', 'Tlaquepaque', 'Calle Zaragoza', '333', 15), 

('Jalisco', 'Guadalajara', 'Avenida López Mateos', '222', 16), 

('Jalisco', 'Zapopan', 'Calle 16 de Septiembre', '111', 17), 

('Jalisco', 'Guadalajara', 'Avenida Revolución', '999', 18), 

('Jalisco', 'Zapopan', 'Calle Constitución', '888', 19), 

('Jalisco', 'Guadalajara', 'Avenida Lázaro Cárdenas', '777', 20); 

  

INSERT INTO PRODUCTOS (Nombre, Stock, PrecioProveedor, PrecioCliente, Descripcion, ProveedorID, CategoriaID) VALUES 

('Arroz', 100, 2.99, 4.99, 'Arroz blanco de 1 kg', 1, 3), 

('Aceite de cocina', 50, 3.99, 5.99, 'Aceite de cocina vegetal', 2, 13), 

('Leche', 80, 1.99, 2.99, 'Leche entera de 1 litro', 3, 4), 

('Frijoles', 120, 1.49, 2.49, 'Frijoles negros de 500 g', 4, 3), 

('Pasta', 60, 1.29, 2.29, 'Pasta de espagueti de 500 g', 5, 3), 

('Pan', 70, 1.99, 3.49, 'Pan integral fresco', 6, 5), 

('Refrescos', 150, 0.99, 1.49, 'Refrescos variados', 7, 1), 

('Salsa de tomate', 40, 1.29, 2.29, 'Salsa de tomate de 500 g', 8, 12), 

('Jabón de lavandería', 100, 0.99, 1.49, 'Jabón de lavandería en barra', 9, 8), 

('Cepillos de dientes', 90, 0.75, 1.25, 'Cepillos de dientes suaves', 10, 9), 

('Cereal', 60, 2.49, 3.99, 'Cereal de maíz', 11, 7), 

('Papel higiénico', 120, 1.75, 2.99, 'Papel higiénico de 4 capas', 12, 13), 

('Galletas', 80, 1.49, 2.49, 'Galletas de chocolate', 13, 11), 

('Jugos', 100, 1.99, 2.99, 'Jugos de frutas naturales', 14, 7), 

('Café', 40, 3.99, 5.99, 'Café molido de 250 g', 15, 12), 

('Detergente líquido', 50, 4.99, 6.99, 'Detergente líquido concentrado', 16, 8), 

('Pañales', 70, 9.99, 12.99, 'Pañales para bebés', 17, 14), 

('Cerveza', 200, 1.49, 2.49, 'Cerveza en lata', 18, 1), 

('Chocolate', 60, 1.79, 2.99, 'Chocolate en barra', 19, 11), 

('Sopa', 80, 0.79, 1.29, 'Sopa instantánea', 20, 3),

('Sabritas', 15, 1.63, 2.99, 'Chocolate en barra', 13, 20), 

('Sniker', 10, 1.34, 1.50, 'Chocolate en barra', 11, 20), 

('Cacahuates', 23, 1.11, 3.99, 'Chocolate en barra', 10, 20), 

('Leche Deslactosada', 80, 1.99, 2.99, 'Leche entera de 1 litro', 3, 4); 


INSERT INTO USUARIO (Contraseña, CorreoElectronico)
VALUES 
('contraseña1', 'usuario1@example.com' ),
('contraseña2', 'usuario2@example.com' ),
('contraseña3', 'usuario3@example.com' ),
('contraseña4', 'usuario4@example.com' ),
('contraseña5', 'usuario5@example.com' ),
('contraseña6', 'usuario6@example.com' ),
('contraseña7', 'usuario7@example.com' ),
('contraseña8', 'usuario8@example.com'),
('contraseña9', 'usuario9@example.com' ),
('contraseña10', 'usuario10@example.com'),
('contraseña11', 'usuario11@example.com'),
('contraseña12', 'usuario12@example.com'),
('contraseña13', 'usuario13@example.com'),
('contraseña14', 'usuario14@example.com'),
('contraseña15', 'usuario15@example.com');


INSERT INTO CLIENTES (Nombre, ApellidoPaterno, ApellidoMaterno, Telefono, UsuarioID) VALUES 

('Juan', 'González', 'López', '555-123-4567', 1), 

('María', 'Rodríguez', 'Martínez', '555-234-5678', 2), 

('Pedro', 'Pérez', 'Sánchez', '555-345-6789', 3), 

('Luis', 'Hernández', 'Ramírez', '555-456-7890', 4), 

('Ana', 'López', 'Gómez', '555-567-8901', 5), 

('Sofía', 'Martínez', 'Torres', '555-678-9012', 6), 

('Carlos', 'Sánchez', 'García', '555-789-0123', 7), 

('Elena', 'Ramírez', 'López', '555-890-1234', 8), 

('Javier', 'Gómez', 'Hernández', '555-901-2345', 9), 

('Laura', 'Torres', 'Pérez', '555-012-3456', 10), 

('Ricardo', 'García', 'Martínez', '555-123-4567', 11), 

('Isabel', 'López', 'González', '555-234-5678', 12), 

('Fernando', 'Pérez', 'Sánchez', '555-345-6789', 13), 

('Carmen', 'Ramírez', 'Hernández', '555-456-7890', 14), 

('Alejandro', 'Gómez', 'López', '555-567-8901', 15); 


INSERT INTO DireccionesCliente (Estado, Municipio, Calle, Numero, ClienteID) VALUES 

('Jalisco', 'Tomatlán', 'Calle 5 de Mayo', '123', 1), 

('Jalisco', 'Tomatlán', 'Avenida Juárez', '456', 2), 

('Jalisco', 'Tomatlán', 'Calle Reforma', '789', 3), 

('Jalisco', 'Tomatlán', 'Avenida Hidalgo', '101', 4), 

('Jalisco', 'Tomatlán', 'Calle Benito Juárez', '555',5), 

('Jalisco', 'Tomatlán', 'Avenida Zaragoza', '222',6), 

('Jalisco', 'Tomatlán', 'Calle Morelos', '333',7), 

('Jalisco', 'Tomatlán', 'Avenida Madero', '777',8), 

('Jalisco', 'Tomatlán', 'Calle Allende', '999',9), 

('Jalisco', 'Tomatlán', 'Avenida Constitución', '888',10);





INSERT INTO Tarjetas (NumeroTarjeta, FechaCaducidad, CVV, ClienteID)
VALUES 
('1234567812345678', '12/25', '123', 1),
('2345678923456789', '01/26', '234', 2),
('3456789034567890', '02/27', '345', 3),
('4567890145678901', '03/28', '456', 4),
('5678901256789012', '04/29', '567', 5),
('6789012367890123', '05/30', '678', 6),
('7890123478901234', '06/31', '789', 7),
('8901234589012345', '07/32', '890', 8),
('9012345690123456', '08/33', '901', 9),
('0123456701234567', '09/34', '012', 10),
('1234567812345678', '10/35', '123', 11),
('2345678923456789', '11/36', '234', 12),
('3456789034567890', '12/37', '345', 13),
('4567890145678901', '01/38', '456', 14);


INSERT INTO Pagos (Estado, TarjetaID) VALUES 

('Aprobado', 1), 

('Rechazado', 2), 

('Aprobado', 3), 

('Pendiente', 4), 

('Rechazado', 5), 

('Aprobado', 6), 

('Pendiente', 7), 

('Aprobado', 8), 

('Rechazado', 9), 

('Aprobado', 10);




-- Inserciones en la tabla CARRITO
INSERT INTO CARRITO (ProductoID, Cantidad, PrecioCliente, ClienteID, Total, Estado)
VALUES (2, 3, 15.99, 2, 47.97, 'En proceso');

INSERT INTO CARRITO (ProductoID, Cantidad, PrecioCliente, ClienteID, Total, Estado)
VALUES (3, 1, 29.99, 2, 29.99, 'En proceso');

INSERT INTO CARRITO (ProductoID, Cantidad, PrecioCliente, ClienteID, Total, Estado)
VALUES (1, 1, 4.99, 3, 4.99, 'En proceso');

INSERT INTO CARRITO (ProductoID, Cantidad, PrecioCliente, ClienteID, Total, Estado)
VALUES (5, 1, 2.29, 3, 2.29 , 'En proceso');


-- Inserciones en la tabla DETALLEPEDIDOS
INSERT INTO DETALLEPEDIDOS (TotalCompra, PagoID, CarritoID)
VALUES (47.97, 2, 1);

INSERT INTO DETALLEPEDIDOS (TotalCompra, PagoID, CarritoID)
VALUES (29.99, 3, 2);

INSERT INTO DETALLEPEDIDOS (TotalCompra, PagoID, CarritoID)
VALUES (6.58, 3, 3);

INSERT INTO DETALLEPEDIDOS (TotalCompra, PagoID, CarritoID)
VALUES (6.58, 3, 4);

-- Inserciones en la tabla PEDIDOS
INSERT INTO PEDIDOS (FechaCompra, FechaEntrega, Estado, DetallePedidoID)
VALUES ('2023-10-15', '2023-10-22', 'En proceso', 1);

INSERT INTO PEDIDOS (FechaCompra, FechaEntrega, Estado, DetallePedidoID)
VALUES ('2023-10-10', '2023-10-16', 'En proceso', 2);

INSERT INTO PEDIDOS (FechaCompra, FechaEntrega, Estado, DetallePedidoID)
VALUES ('2023-10-10', '2023-10-18', 'En proceso', 3);

INSERT INTO PEDIDOS (FechaCompra, FechaEntrega, Estado, DetallePedidoID)
VALUES ('2023-10-10', '2023-10-18', 'En proceso', 4);

-- Inserciones en la tabla HISTORIALPEDIDOS
INSERT INTO HISTORIALPEDIDOS (PedidoID, ClienteID)
VALUES (1, 2);

INSERT INTO HISTORIALPEDIDOS (PedidoID, ClienteID)
VALUES (2, 3);

INSERT INTO HISTORIALPEDIDOS (PedidoID, ClienteID)
VALUES (3, 3);

INSERT INTO HISTORIALPEDIDOS (PedidoID, ClienteID)
VALUES (4, 3);



-- Seleccionar todos los registros de la tabla CATEGORIAS
SELECT * FROM CATEGORIAS;

-- Seleccionar todos los registros de la tabla PRODUCTOS
SELECT * FROM PRODUCTOS;

-- Seleccionar todos los registros de la tabla DireccionesCliente
SELECT * FROM DireccionesCliente;

-- Seleccionar todos los registros de la tabla Pagos
SELECT * FROM Pagos;

-- Seleccionar todos los registros de la tabla DireccionesProveedor
SELECT * FROM DireccionesProveedor;

-- Seleccionar todos los registros de la tabla CLIENTES
SELECT * FROM CLIENTES;

-- Seleccionar todos los registros de la tabla CARRITO
SELECT * FROM CARRITO;

-- Seleccionar todos los registros de la tabla Tarjetas
SELECT * FROM Tarjetas;

-- Seleccionar todos los registros de la tabla USUARIO
SELECT * FROM USUARIO;

-- Seleccionar todos los registros de la tabla PROVEEDOR
SELECT * FROM PROVEEDOR;

-- Seleccionar todos los registros de la tabla DETALLEPEDIDOS
SELECT * FROM DETALLEPEDIDOS;

-- Seleccionar todos los registros de la tabla HISTORIALPEDIDOS
SELECT * FROM HISTORIALPEDIDOS;

-- Seleccionar todos los registros de la tabla PEDIDOS
SELECT * FROM PEDIDOS;