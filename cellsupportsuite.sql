-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2024 a las 14:24:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cellsupportsuite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `nombre`) VALUES
(1, 'iPhone'),
(2, 'Samsung'),
(3, 'Motorola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `identificacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `correo`, `direccion`, `celular`, `identificacion`) VALUES
(1, 'Juan Pérez', 'juan.perez@example.com', 'Calle 1 #23-45', '3001234567', '12345678'),
(2, 'María López', 'maria.lopez@example.com', 'Calle 2 #12-34', '3109876543', '23456789'),
(3, 'Carlos García', 'carlos.garcia@example.com', 'Carrera 3 #56-78', '3204567890', '34567890'),
(4, 'Ana Martínez', 'ana.martinez@example.com', 'Avenida 4 #90-12', '3004567890', '45678901'),
(10, 'Laura Jiménez', 'laura.jimenez@example.com', 'Calle 10 #24-33', '3000123456', '01234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `fo_categorias` int(11) DEFAULT NULL,
  `fo_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `fo_categorias`, `fo_proveedor`) VALUES
(1, 'iPhone 14', 'Procesador A15 Bionic, 6GB de RAM, batería de 3279 mAh, cámara principal de 12MP y cámara frontal de 12MP.', 3500000.00, 50, 1, 1),
(2, 'iPhone 14 Pro', 'Procesador A16 Bionic, 6GB de RAM, batería de 3200 mAh, cámara triple de 48MP (principal), 12MP (ultrawide) y 12MP (teleobjetivo).', 4500000.00, 30, 1, 1),
(3, 'iPhone 13', 'Procesador A15 Bionic, 4GB de RAM, batería de 3240 mAh, cámara dual de 12MP (ancho y ultra ancho).', 3000000.00, 40, 1, 1),
(5, 'iPhone SE', 'Procesador A15 Bionic, 4GB de RAM, batería de 2018 mAh, cámara de 12MP.', 1500000.00, 70, 1, 1),
(9, 'iPhone 13 Pro', 'Procesador A15 Bionic, 6GB de RAM, batería de 3095 mAh, cámara triple de 12MP.', 5000000.00, 10, 1, 1),
(11, 'Motorola Moto G Power', 'Procesador MediaTek Helio G37, 4GB de RAM, batería de 5000 mAh, cámara principal de 50MP y cámara frontal de 8MP.', 1000000.00, 80, 2, 2),
(13, 'Motorola Edge 20', 'Procesador Snapdragon 778G, 8GB de RAM, batería de 4000 mAh, cámara triple de 108MP, 16MP y 8MP.', 2000000.00, 25, 2, 2),
(15, 'Motorola Edge 30', 'Procesador Snapdragon 778G+, 8GB de RAM, batería de 4400 mAh, cámara triple de 50MP.', 2200000.00, 20, 2, 2),
(17, 'Motorola G200', 'Procesador Snapdragon 888+, 8GB de RAM, batería de 5000 mAh, cámara triple de 108MP.', 2500000.00, 15, 2, 2),
(18, 'Motorola Moto E 2022', 'Procesador MediaTek Helio G37, 3GB de RAM, batería de 5000 mAh, cámara dual de 13MP.', 800000.00, 60, 2, 2),
(21, 'Samsung Galaxy S23', 'Procesador Snapdragon 8 Gen 2, 8GB de RAM, batería de 3900 mAh, cámara triple de 50MP.', 4000000.00, 20, 3, 3),
(22, 'Samsung Galaxy A54', 'Procesador Exynos 1380, 6GB de RAM, batería de 5000 mAh, cámara triple de 50MP.', 1800000.00, 50, 3, 3),
(25, 'Samsung Galaxy S22', 'Procesador Exynos 2200, 8GB de RAM, batería de 3700 mAh, cámara triple de 50MP.', 3800000.00, 15, 3, 3),
(26, 'Samsung Galaxy S21 FE', 'Procesador Snapdragon 888, 6GB de RAM, batería de 4500 mAh, cámara triple de 12MP.', 2900000.00, 25, 3, 3),
(27, 'Samsung Galaxy A13', 'Procesador Exynos 850, 4GB de RAM, batería de 5000 mAh, cámara cuádruple de 50MP.', 1000000.00, 75, 3, 3),
(75, 'celular', 'es un celular', 10000000.00, 2, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prov` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `nombre`) VALUES
(1, 'Apple'),
(2, 'Samsung Electronics'),
(3, 'Motorola Solutions'),
(4, 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `fo_cliente` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `producto` varchar(255) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `fo_cliente`, `fecha`, `producto`, `subtotal`, `total`) VALUES
(15, 3, '2024-10-28 00:00:00', 'a:1:{i:0;a:4:{i:0;s:13:\"iPhone 12 Pro\";i:1;i:4000000;i:2;i:2;i:3;i:8000000;}}', 8000000.00, 8000000.00),
(16, 1, '2024-10-29 00:00:00', 'a:1:{i:0;a:4:{i:0;s:13:\"iPhone 13 Pro\";i:1;i:5000000;i:2;i:2;i:3;i:10000000;}}', 10000000.00, 10000000.00),
(24, 2, '2024-10-29 00:00:00', 'a:2:{i:0;a:4:{i:0;s:18:\"Samsung Galaxy S22\";i:1;i:3800000;i:2;i:1;i:3;i:3800000;}i:1;a:4:{i:0;s:18:\"Samsung Galaxy A54\";i:1;i:1800000;i:2;i:2;i:3;i:3600000;}}', 7400000.00, 7400000.00),
(25, 4, '2024-10-29 00:00:00', 'a:3:{i:0;a:4:{i:0;s:13:\"Motorola G200\";i:1;i:2500000;i:2;i:2;i:3;i:5000000;}i:1;a:4:{i:0;s:18:\"Samsung Galaxy A13\";i:1;i:1000000;i:2;i:3;i:3;i:3000000;}i:2;a:4:{i:0;s:18:\"Samsung Galaxy S22\";i:1;i:3800000;i:2;i:4;i:3;i:15200000;}}', 23200000.00, 23200000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `Identificacion` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombreus` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `celular` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rol` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `clave` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Identificacion`, `nombreus`, `celular`, `email`, `rol`, `clave`) VALUES
(10, '00000000', 'Administrador', '3000000000', 'adm@administrador.com', 'administrador', '3e3c05d866425a9f1e9641566ed35943b301ed5c'),
(11, '12345679', 'Invitado', '3000000001', 'inv@invitado.com', 'invitado', '7daa8e47c99835a7f57ccaa61e469f5092040115');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fo_categorias` (`fo_categorias`),
  ADD KEY `fp_proveedor` (`fo_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `id_cliente` (`fo_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`fo_categorias`) REFERENCES `categorias` (`id_categorias`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`fo_proveedor`) REFERENCES `proveedor` (`id_prov`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`fo_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
