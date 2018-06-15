-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2018 a las 10:05:50
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `erpstudioprincess`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `fecharegistro`) VALUES
(1, 'camisas', 'Camisas para caballeros', '2018-06-13'),
(2, 'zapatos', 'Zapatos unixes', '2018-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `tipocliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombres`, `apellidos`, `documento`, `direccion`, `telefono`, `correo`, `tipocliente`) VALUES
(1, 'Jhonatan Jose', 'Mede', '109377899', 'Barrio 2a # 3 - 29', '312131321', 'jhon@gmail.com', 2),
(2, 'Cofee  Daniel', 'Manriqu', '103636498', 'AV 12 ', '3235464', 'cofee@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `preciototal` int(11) NOT NULL,
  `fecharegistro` date NOT NULL,
  `cliente` int(11) NOT NULL,
  `empleado` int(11) NOT NULL,
  `modopago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactoproveedor`
--

CREATE TABLE `contactoproveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `fecharegistro` date NOT NULL,
  `empleado` int(11) NOT NULL,
  `tipocontrato` int(11) NOT NULL,
  `usuarioregistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecharegistro` date NOT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `producto_id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `lugarnacimiento` varchar(45) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `tipodocumento` int(11) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `expediciondocumento` varchar(45) NOT NULL,
  `nacionalidad` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  `eps` int(11) DEFAULT NULL,
  `pension` int(11) DEFAULT NULL,
  `fecharegistro` date NOT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombres`, `apellidos`, `lugarnacimiento`, `fechanacimiento`, `tipodocumento`, `documento`, `expediciondocumento`, `nacionalidad`, `direccion`, `correo`, `usuario`, `eps`, `pension`, `fecharegistro`, `estado`) VALUES
(4, 'Nelson  Andres ', 'Sepulveda Vega', 'Cucuta', '2003-03-06', 1, '1095981919', 'Cucuta', 'colombiana', 'Av 6a # 44 -3r', 'andres@email.com', 1, NULL, NULL, '2018-06-02', 0),
(5, 'Wilson Alexander', 'Rodriguez', 'Cucuta', '0000-00-00', 1, '1094555111', 'Cucuta', 'colombiana', 'Calle 0 # 12 - 78', 'wilson@email.com', 2, NULL, NULL, '2018-06-08', 0),
(6, 'Julio Duban', 'Danes', 'Cucuta', '2000-03-08', 1, '1093773094', 'Cucuta', 'colombiana', 'Calle 34 # 44 - 6', 'duban@gmail.com', 3, NULL, NULL, '2018-06-11', 0),
(7, 'Jhon Marlon', 'Marlon', 'OcaÃ±a', '2011-02-08', 1, '789544564654', 'Los patios', 'rusa', 'Calle 12 # 4 -3 ', 'marlon@gmail.com', 4, NULL, NULL, '2018-06-15', 0),
(8, 'Luis Anatano', 'Antnio', 'Cucuta', '2009-03-11', 1, '7984654', 'Cucuta', 'venezolana', 'Av 33 El llano', 'luis@empresa.com', 5, NULL, NULL, '2018-06-15', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eps`
--

CREATE TABLE `eps` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id` int(11) NOT NULL,
  `instituto` varchar(45) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `añosalida` int(11) NOT NULL,
  `empleado` int(11) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `entidadmedica` varchar(45) NOT NULL,
  `dictamen` varchar(200) NOT NULL,
  `fecharealizacion` date NOT NULL,
  `observacion` varchar(150) DEFAULT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `empleado` int(11) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `id` int(11) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  `cargoocupado` varchar(45) NOT NULL,
  `duracion` int(11) NOT NULL,
  `añosalida` int(11) NOT NULL,
  `empleado` int(11) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meta_empleado`
--

CREATE TABLE `meta_empleado` (
  `id` int(11) NOT NULL,
  `src` varchar(200) DEFAULT NULL,
  `default` varchar(200) DEFAULT NULL,
  `empleado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `meta_empleado`
--

INSERT INTO `meta_empleado` (`id`, `src`, `default`, `empleado_id`) VALUES
(2, 'C:/xampp/htdocs/modelo/ERP-Studio/img/upload/awad.jpg', NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meta_producto`
--

CREATE TABLE `meta_producto` (
  `id` int(11) NOT NULL,
  `src` varchar(200) DEFAULT NULL,
  `default` varchar(200) DEFAULT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `meta_producto`
--

INSERT INTO `meta_producto` (`id`, `src`, `default`, `producto_id`) VALUES
(1, 'C:/xampp/htdocs/modelo/ERP-Studio/img/upload_producto/1353.png', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modopago`
--

CREATE TABLE `modopago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modopago`
--

INSERT INTO `modopago` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Efectivo', 'Modo de pago efectivo'),
(2, 'Tarjeta Credito', 'Modo de pago tarjeta de credito'),
(3, 'Tarjeta Debito', 'Modo de pago tarjeta debito'),
(4, 'Cheque', 'Modo de pago cheque');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pension`
--

CREATE TABLE `pension` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  `fecharegistro` date NOT NULL,
  `tipomaterial` int(11) NOT NULL,
  `tipoarticulo` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `precio` float NOT NULL,
  `talla` varchar(10) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `referencia`, `color`, `fecharegistro`, `tipomaterial`, `tipoarticulo`, `categoria`, `proveedor`, `precio`, `talla`, `stock`, `cantidad`) VALUES
(1, 'Zaptos', '32465', 'Rosa', '2018-06-14', 1, 1, 2, 1, 35000, '33', 1, 49),
(2, 'Calzado', '875465', 'Rojo', '2018-06-14', 3, 1, 2, 2, 35000, '40', 1, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correoempresa` varchar(45) NOT NULL,
  `nit` varchar(45) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `empresa`, `direccion`, `telefono`, `correoempresa`, `nit`, `fecharegistro`) VALUES
(1, 'Provee SAS', 'Calle 12 # 11 - 11 ', '121459879', 'empresa@email.com', '987465231', '2018-06-02'),
(2, 'Empresa S.A.S', 'Av 4 # 22 - 989 ', '32351648498', 'empresa@gmail.com', '123889746', '2018-06-10'),
(3, 'Proveedor 2.0', 'Calle 12 # 11 - 11 ', '321518498', 'provee@rovee.com', '7895621516', '2018-06-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoarticulo`
--

CREATE TABLE `tipoarticulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoarticulo`
--

INSERT INTO `tipoarticulo` (`id`, `nombre`, `descripcion`, `fecharegistro`) VALUES
(1, 'Material 3 para jean', 'Material para jeans de todo tipo', '2018-06-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocliente`
--

CREATE TABLE `tipocliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipocliente`
--

INSERT INTO `tipocliente` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Online', 'Cliente de tipo online'),
(2, 'Presencial', 'Cliente de tipo presencial'),
(3, 'Virutla', 'Cliente de tipo virutla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontrato`
--

CREATE TABLE `tipocontrato` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `sueldo` varchar(45) NOT NULL,
  `numerohoras` int(11) NOT NULL,
  `fecharegistro` date NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomaterial`
--

CREATE TABLE `tipomaterial` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipomaterial`
--

INSERT INTO `tipomaterial` (`id`, `nombre`, `descripcion`, `fecharegistro`) VALUES
(1, 'Tela Dril', 'Tela dril para cualquier ropa', '2018-06-02'),
(2, 'Material 2 para faldas', 'material para faldas de todo tipo', '2018-06-02'),
(3, 'Tella Dril Mangas', 'Tela para dril y sus diversas', '2018-06-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `rol`, `user`, `pass`, `estado`, `fecharegistro`) VALUES
(1, 'vendedor', 'andres@email.com', '1095981919', 0, '2018-06-02'),
(2, 'admin', 'wilson@email.com', '1094555111', 0, '2018-06-08'),
(3, 'contador', 'duban@gmail.com', '1093773094', 0, '2018-06-11'),
(4, 'contador', 'marlon@gmail.com', '789544564654', 0, '2018-06-15'),
(5, 'vendedor', 'luis@empresa.com', '7984654', 0, '2018-06-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente_tipocliente1_idx` (`tipocliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compra_cliente1_idx` (`cliente`),
  ADD KEY `fk_compra_empleado1_idx` (`empleado`),
  ADD KEY `fk_compra_modopago1_idx` (`modopago`);

--
-- Indices de la tabla `contactoproveedor`
--
ALTER TABLE `contactoproveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contactoproveedor_proveedor1_idx` (`proveedor_id`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contrato_empleado1_idx` (`empleado`),
  ADD KEY `fk_contrato_tipocontrato1_idx` (`tipocontrato`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_producto1_idx` (`producto_id`),
  ADD KEY `fk_detalle_compra1_idx` (`compra_id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empleado_usuario_idx` (`usuario`),
  ADD KEY `fk_empleado_eps1_idx` (`eps`),
  ADD KEY `fk_empleado_pension1_idx` (`pension`);

--
-- Indices de la tabla `eps`
--
ALTER TABLE `eps`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estudios_empleado1_idx` (`empleado`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_examenes_empleado1_idx` (`empleado`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_experiencia_empleado1_idx` (`empleado`);

--
-- Indices de la tabla `meta_empleado`
--
ALTER TABLE `meta_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_meta_empleado_empleado1_idx` (`empleado_id`);

--
-- Indices de la tabla `meta_producto`
--
ALTER TABLE `meta_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_meta_producto_producto1_idx` (`producto_id`);

--
-- Indices de la tabla `modopago`
--
ALTER TABLE `modopago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pension`
--
ALTER TABLE `pension`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_tipotela1_idx` (`tipomaterial`),
  ADD KEY `fk_producto_tipoarticulo1_idx` (`tipoarticulo`),
  ADD KEY `fk_producto_categoria1_idx` (`categoria`),
  ADD KEY `fk_producto_proveedor1_idx` (`proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoarticulo`
--
ALTER TABLE `tipoarticulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipocliente`
--
ALTER TABLE `tipocliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipocontrato`
--
ALTER TABLE `tipocontrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipomaterial`
--
ALTER TABLE `tipomaterial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactoproveedor`
--
ALTER TABLE `contactoproveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `eps`
--
ALTER TABLE `eps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `meta_empleado`
--
ALTER TABLE `meta_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `meta_producto`
--
ALTER TABLE `meta_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modopago`
--
ALTER TABLE `modopago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pension`
--
ALTER TABLE `pension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipoarticulo`
--
ALTER TABLE `tipoarticulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipocliente`
--
ALTER TABLE `tipocliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipocontrato`
--
ALTER TABLE `tipocontrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipomaterial`
--
ALTER TABLE `tipomaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_tipocliente1` FOREIGN KEY (`tipocliente`) REFERENCES `tipocliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_cliente1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_empleado1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_modopago1` FOREIGN KEY (`modopago`) REFERENCES `modopago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contactoproveedor`
--
ALTER TABLE `contactoproveedor`
  ADD CONSTRAINT `fk_contactoproveedor_proveedor1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_contrato_empleado1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contrato_tipocontrato1` FOREIGN KEY (`tipocontrato`) REFERENCES `tipocontrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `fk_detalle_compra1` FOREIGN KEY (`compra_id`) REFERENCES `compra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_eps1` FOREIGN KEY (`eps`) REFERENCES `eps` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_pension1` FOREIGN KEY (`pension`) REFERENCES `pension` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD CONSTRAINT `fk_estudios_empleado1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `fk_examenes_empleado1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD CONSTRAINT `fk_experiencia_empleado1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `meta_empleado`
--
ALTER TABLE `meta_empleado`
  ADD CONSTRAINT `fk_meta_empleado_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `meta_producto`
--
ALTER TABLE `meta_producto`
  ADD CONSTRAINT `fk_meta_producto_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_proveedor1` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_tipoarticulo1` FOREIGN KEY (`tipoarticulo`) REFERENCES `tipoarticulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_tipotela1` FOREIGN KEY (`tipomaterial`) REFERENCES `tipomaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
