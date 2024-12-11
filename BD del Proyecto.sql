--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `CarritoID` int(11) NOT NULL,
  `ProductoID` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `PrecioCliente` decimal(10,2) DEFAULT NULL,
  `ClienteID` int(11) DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Estado` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `CategoriaID` int(11) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`CategoriaID`, `Nombre`, `Descripcion`) VALUES
(1, 'Celulares', 'Telefonos celulares'),
(2, 'Electronica', 'Componentes electronicos'),
(3, 'Laptops', 'Computadoras tipo laptop'),
(4, 'Tabletas', 'Dispositivos tipo tablet'),
(5, 'Accesorios', 'Accesorios para dispositivos electrónicos'),
(6, 'Audio', 'Audífonos y altavoces'),
(7, 'Cámaras', 'Cámaras fotográficas y de video'),
(8, 'Gaming', 'Consolas y accesorios para videojuegos'),
(9, 'Software', 'Programas y aplicaciones'),
(10, 'Televisores', 'Televisores y sistemas de entretenimiento'),
(11, 'Drones', 'Drones y accesorios relacionados'),
(12, 'Smart Home', 'Dispositivos inteligentes para el hogar'),
(13, 'Wearables', 'Dispositivos portátiles como smartwatches'),
(14, 'Impresoras', 'Impresoras y escáneres'),
(15, 'Componentes de PC', 'Partes y componentes para computadoras de escritorio');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ClienteID` int(11) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `ApellidoPaterno` varchar(60) DEFAULT NULL,
  `ApellidoMaterno` varchar(60) DEFAULT NULL,
  `Telefono` int(12) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedidos`
--

CREATE TABLE `detallepedidos` (
  `DetallePedidoID` int(11) NOT NULL,
  `TotalCompra` decimal(10,2) DEFAULT NULL,
  `PagoID` int(11) DEFAULT NULL,
  `CarritoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccionescliente`
--

CREATE TABLE `direccionescliente` (
  `DireccionID` int(11) NOT NULL,
  `Calle` varchar(60) DEFAULT NULL,
  `Numero` varchar(60) DEFAULT NULL,
  `CP` int(5) NOT NULL,
  `Estado` varchar(60) DEFAULT NULL,
  `Ciudad` varchar(60) DEFAULT NULL,
  `ClienteID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccionesproveedor`
--

CREATE TABLE `direccionesproveedor` (
  `DireccionID` int(11) NOT NULL,
  `Estado` varchar(60) DEFAULT NULL,
  `Municipio` varchar(60) DEFAULT NULL,
  `Calle` varchar(60) DEFAULT NULL,
  `Numero` varchar(60) DEFAULT NULL,
  `ProveedorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `direccionesproveedor`
--

INSERT INTO `direccionesproveedor` (`DireccionID`, `Estado`, `Municipio`, `Calle`, `Numero`, `ProveedorID`) VALUES
(1, 'Jalisco', 'Guadalajara', 'Avenida Vallarta', '123', 1),
(2, 'Jalisco', 'Guadalajara', 'Calle Juárez', '456', 2),
(3, 'Jalisco', 'Zapopan', 'Calle Reforma', '789', 3),
(4, 'Jalisco', 'Tlaquepaque', 'Avenida Chapultepec', '101', 4),
(5, 'Jalisco', 'Guadalajara', 'Calle Morelos', '555', 5),
(6, 'Jalisco', 'Zapopan', 'Avenida Américas', '222', 6),
(7, 'Jalisco', 'Guadalajara', 'Calle Colón', '333', 7),
(8, 'Jalisco', 'Zapopan', 'Avenida México', '777', 8),
(9, 'Jalisco', 'Tlaquepaque', 'Calle 5 de Mayo', '999', 9),
(10, 'Jalisco', 'Guadalajara', 'Avenida Niños Héroes', '888', 10),
(11, 'Jalisco', 'Zapopan', 'Calle Independencia', '777', 11),
(12, 'Jalisco', 'Guadalajara', 'Avenida Federalismo', '666', 12),
(13, 'Jalisco', 'Zapopan', 'Calle Madero', '555', 13),
(14, 'Jalisco', 'Guadalajara', 'Avenida Hidalgo', '444', 14),
(15, 'Jalisco', 'Tlaquepaque', 'Calle Zaragoza', '333', 15),
(16, 'Jalisco', 'Guadalajara', 'Avenida López Mateos', '222', 16),
(17, 'Jalisco', 'Zapopan', 'Calle 16 de Septiembre', '111', 17),
(18, 'Jalisco', 'Guadalajara', 'Avenida Revolución', '999', 18),
(19, 'Jalisco', 'Zapopan', 'Calle Constitución', '888', 19),
(20, 'Jalisco', 'Guadalajara', 'Avenida Lázaro Cárdenas', '777', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialpedidos`
--

CREATE TABLE `historialpedidos` (
  `HistorialPedidosID` int(11) NOT NULL,
  `PedidoID` int(11) DEFAULT NULL,
  `ClienteID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `PagoID` int(11) NOT NULL,
  `Estado` varchar(60) DEFAULT NULL,
  `TarjetaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `PedidoID` int(11) NOT NULL,
  `FechaCompra` varchar(60) DEFAULT NULL,
  `FechaEntrega` varchar(60) DEFAULT NULL,
  `Estado` varchar(60) DEFAULT NULL,
  `DetallePedidoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ProductoID` int(11) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Imagen` varchar(200) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `PrecioProveedor` decimal(10,2) DEFAULT NULL,
  `PrecioCliente` decimal(10,2) DEFAULT NULL,
  `Descripcion` varchar(60) DEFAULT NULL,
  `ProveedorID` int(11) DEFAULT NULL,
  `CategoriaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ProductoID`, `Nombre`, `Imagen`, `Stock`, `PrecioProveedor`, `PrecioCliente`, `Descripcion`, `ProveedorID`, `CategoriaID`) VALUES
(1, 'Echo Dot', 'https://crdms.images.consumerreports.org/f_auto,w_600/prod/products/cr/models/407823-smart-speakers-amazon-echo-dot-5th-gen-w-clock-10033746.png', 30, 500.00, 1100.00, 'Un dispositivo completo. Amazon Echo de 4 generación combina', 1, 3),
(2, 'Macbook Air M3', 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/mba13-spacegray-config-202402?wid=820&hei=498&fmt=jpeg&qlt=90&.v=1708371033138', 10, 15000.00, 20000.99, 'MacBook Air de 13 pulgadas. Superligera. Superchip M3. El ch', 2, 2),
(3, 'Samsung Galaxy S23', 'https://m.media-amazon.com/images/I/61IGmT5b35L._AC_UF894,1000_QL80_.jpg', 5, 10000.00, 15000.00, 'Galaxy S23 Ultra establece un nuevo estándar ÉPICO en cuanto', 3, 1),
(4, 'iPad Pro', 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/ipad-pro-12-select-202104?wid=470&hei=556&fmt=png-alpha&.v=1617067388000', 8, 12000.00, 15000.00, 'iPad Pro con pantalla Liquid Retina XDR de 12,9 pulgadas.', 2, 4),
(5, 'AirPods Pro', 'https://www.apple.com/v/airpods-pro/m/images/meta/og__eui2mpgzwyaa_overview.png', 50, 2000.00, 3500.00, 'Auriculares inalámbricos con cancelación de ruido activa.', 2, 5),
(6, 'Bose SoundLink Revolve', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7Vua8juivpEFfyXVZKrRqTcWLxMc1zPQViw&s', 15, 4000.00, 6000.00, 'Altavoz Bluetooth portátil con sonido envolvente de 360 grados.', 3, 6),
(7, 'Canon EOS R5', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfMfdgWdNG9ZAZyym4l4qZLIMERjMpdhFzfg&s', 3, 30000.00, 35000.00, 'Cámara sin espejo con sensor CMOS de 45 MP y grabación de vídeo 8K.', 4, 7),
(8, 'Nintendo Switch', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8ghgNGvHFhEJ9dkZetdrI5AKKiTk13vEHHQ&s', 20, 7000.00, 9000.00, 'Consola de videojuegos híbrida con controles Joy-Con.', 5, 8),
(9, 'Microsoft Office 365', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3wr6lXJVHlrlJNfws4shgK4O5vkBoUbe0wQ&s', 100, 500.00, 1000.00, 'Suite de aplicaciones de productividad y colaboración.', 6, 9),
(10, 'LG OLED CX', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjzGJFPMcDwbDMtFzUC2H17PK0ViYOske70A&s', 5, 20000.00, 25000.00, 'Televisor OLED de 55 pulgadas con AI ThinQ.', 7, 10),
(11, 'DJI Mavic Air 2', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzAZP2pBr6JsKaXSoGYu0O8q6hdjiUCWZfWA&s', 4, 15000.00, 18000.00, 'Drone compacto con cámara 4K y autonomía de vuelo de 34 minutos.', 8, 11),
(12, 'Google Nest Hub', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd7M-NHLVL_Im-j36OsOQkyMmXtMgOjQHeFA&s', 10, 2500.00, 4000.00, 'Pantalla inteligente con el Asistente de Google integrado.', 9, 12),
(13, 'Fitbit Charge 5', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTO3DzYXuMrmBfpCBGGjfwLCenTyoeD_JP2pA&s', 30, 1500.00, 2800.00, 'Pulsera de actividad física con GPS integrado y monitor de salud.', 10, 13),
(14, 'HP LaserJet Pro MFP', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUtXWl1e6qj8dye-wVJ-C_ZC61OmO3plvNyQ&s', 5, 5000.00, 7500.00, 'Impresora multifunción láser con capacidades de escaneo y copia.', 11, 14),
(15, 'NVIDIA GeForce RTX 3080', 'https://m.media-amazon.com/images/I/61juKdIql1L.jpg', 7, 25000.00, 30000.00, 'Tarjeta gráfica de alta gama para juegos y renderizado.', 12, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ProveedorID` int(11) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `ApellidoPaterno` varchar(60) DEFAULT NULL,
  `ApellidoMaterno` varchar(60) DEFAULT NULL,
  `Telefono` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE proveedor
ADD pass VARCHAR(10);

UPDATE proveedor
SET pass = '123456';
--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ProveedorID`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Telefono`, `pass`) VALUES
(1, 'Juan', 'Perez', 'Lopez', '5512345678','123'),
(2, 'Maria', 'Gonzalez', 'Martinez', '5523456789','123'),
(3, 'Carlos', 'Rodriguez', 'Garcia', '5534567890','123'),
(4, 'Ana', 'Fernandez', 'Gomez', '5545678901','123'),
(5, 'Pedro', 'Ruiz', 'Guerrero', '5556789012','123'),
(6, 'Carmen', 'Torres', 'Santos', '5567890123','123'),
(7, 'Ricardo', 'Ramirez', 'Reyes', '5578901234','123'),
(8, 'Isabel', 'Mendoza', 'Aguilar', '5589012345','123'),
(9, 'Luis', 'Castro', 'Romero', '5590123456','123'),
(10, 'Patricia', 'Vargas', 'Guerra', '5601234567','123'),
(11, 'Francisco', 'Ramos', 'Caballero', '5612345678','123'),
(12, 'Laura', 'Guerrero', 'Peña', '5623456789','123'),
(13, 'Javier', 'Morales', 'Cortes', '5634567890','123'),
(14, 'Teresa', 'Delgado', 'Rojas', '5645678901','123'),
(15, 'Jose Antonio', 'Paredes', 'Bautista', '5656789012','123'),
(16, 'Sofia', 'Campos', 'Navarro', '5667890123','123'),
(17, 'David', 'Cordero', 'Mendez', '5678901234','123'),
(18, 'Lucia', 'Aguirre', 'Barajas', '5689012345','123'),
(19, 'Daniel', 'Vega', 'Molina', '5690123456','123'),
(20, 'Rosa Maria', 'Rangel', 'Del Bosque', '5701234567','123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `TarjetaID` int(11) NOT NULL,
  `NumeroTarjeta` varchar(60) DEFAULT NULL,
  `FechaCaducidad` varchar(60) DEFAULT NULL,
  `CVV` varchar(60) DEFAULT NULL,
  `ClienteID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `UsuarioID` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `CorreoElectronico` varchar(60) DEFAULT NULL,
  `Contrasena` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`UsuarioID`, `Usuario`, `CorreoElectronico`, `Contrasena`) VALUES
(1, 'Saul', 'saul@gmail.com', '$2y$10$DLujJuTiN7MYdmyTWWj5HurxD8iPtDwmhBNn2igGyu6sloLI1xBO2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`CarritoID`),
  ADD KEY `NN` (`ProductoID`,`Cantidad`,`PrecioCliente`,`ClienteID`,`Total`),
  ADD KEY `FK_ClienteIDcarrito` (`ClienteID`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CategoriaID`),
  ADD KEY `NN` (`Nombre`,`Descripcion`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ClienteID`),
  ADD KEY `NN` (`Nombre`,`ApellidoPaterno`,`ApellidoMaterno`,`Telefono`),
  ADD KEY `FK_UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD PRIMARY KEY (`DetallePedidoID`),
  ADD KEY `NN` (`TotalCompra`),
  ADD KEY `FK_PagoID` (`PagoID`),
  ADD KEY `FK_CarritoID` (`CarritoID`);

--
-- Indices de la tabla `direccionescliente`
--
ALTER TABLE `direccionescliente`
  ADD PRIMARY KEY (`DireccionID`),
  ADD KEY `NN` (`Estado`,`Ciudad`,`Calle`,`Numero`),
  ADD KEY `FK_ClienteID` (`ClienteID`);

--
-- Indices de la tabla `direccionesproveedor`
--
ALTER TABLE `direccionesproveedor`
  ADD PRIMARY KEY (`DireccionID`),
  ADD KEY `NN` (`Estado`,`Municipio`,`Calle`,`Numero`),
  ADD KEY `FK_ProveedorIDAdress` (`ProveedorID`);

--
-- Indices de la tabla `historialpedidos`
--
ALTER TABLE `historialpedidos`
  ADD PRIMARY KEY (`HistorialPedidosID`),
  ADD KEY `FK_PedidoID` (`PedidoID`),
  ADD KEY `FK_ClienteIDHP` (`ClienteID`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`PagoID`),
  ADD KEY `NN` (`Estado`),
  ADD KEY `FK_TarjetaID` (`TarjetaID`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`PedidoID`),
  ADD KEY `NN` (`FechaCompra`,`FechaEntrega`,`Estado`),
  ADD KEY `FK_DetallePedidoID` (`DetallePedidoID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ProductoID`),
  ADD KEY `NN` (`Nombre`,`Stock`,`PrecioProveedor`,`PrecioCliente`,`Descripcion`),
  ADD KEY `FK_CategoriaID` (`CategoriaID`),
  ADD KEY `FK_ProveedorID` (`ProveedorID`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ProveedorID`),
  ADD KEY `NN` (`Nombre`,`Telefono`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`TarjetaID`),
  ADD KEY `NN` (`NumeroTarjeta`,`FechaCaducidad`,`CVV`),
  ADD KEY `FK_ClienteIDTarjeta` (`ClienteID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`UsuarioID`),
  ADD KEY `NN` (`Contrasena`,`CorreoElectronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `CarritoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ClienteID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  MODIFY `DetallePedidoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccionescliente`
--
ALTER TABLE `direccionescliente`
  MODIFY `DireccionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccionesproveedor`
--
ALTER TABLE `direccionesproveedor`
  MODIFY `DireccionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `historialpedidos`
--
ALTER TABLE `historialpedidos`
  MODIFY `HistorialPedidosID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `PagoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `PedidoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ProductoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `ProveedorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `TarjetaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `FK_ClienteIDcarrito` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`),
  ADD CONSTRAINT `FK_ProductoID` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ProductoID`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_UsuarioID` FOREIGN KEY (`UsuarioID`) REFERENCES `usuario` (`UsuarioID`);

--
-- Filtros para la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD CONSTRAINT `FK_CarritoID` FOREIGN KEY (`CarritoID`) REFERENCES `carrito` (`CarritoID`),
  ADD CONSTRAINT `FK_PagoID` FOREIGN KEY (`PagoID`) REFERENCES `pagos` (`PagoID`);

--
-- Filtros para la tabla `direccionescliente`
--
ALTER TABLE `direccionescliente`
  ADD CONSTRAINT `FK_ClienteID` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`);

--
-- Filtros para la tabla `direccionesproveedor`
--
ALTER TABLE `direccionesproveedor`
  ADD CONSTRAINT `FK_ProveedorIDAdress` FOREIGN KEY (`ProveedorID`) REFERENCES `proveedor` (`ProveedorID`);

--
-- Filtros para la tabla `historialpedidos`
--
ALTER TABLE `historialpedidos`
  ADD CONSTRAINT `FK_ClienteIDHP` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`),
  ADD CONSTRAINT `FK_PedidoID` FOREIGN KEY (`PedidoID`) REFERENCES `pedidos` (`PedidoID`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `FK_TarjetaID` FOREIGN KEY (`TarjetaID`) REFERENCES `tarjetas` (`TarjetaID`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_DetallePedidoID` FOREIGN KEY (`DetallePedidoID`) REFERENCES `detallepedidos` (`DetallePedidoID`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_CategoriaID` FOREIGN KEY (`CategoriaID`) REFERENCES `categorias` (`CategoriaID`),
  ADD CONSTRAINT `FK_ProveedorID` FOREIGN KEY (`ProveedorID`) REFERENCES `proveedor` (`ProveedorID`),
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`CategoriaID`) REFERENCES `categorias` (`CategoriaID`);

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD CONSTRAINT `FK_ClienteIDTarjeta` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`);
COMMIT;
