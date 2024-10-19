-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2024 a las 22:20:32
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbs13342332`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `numero_empleado` varchar(10) NOT NULL,
  `nombre_completo` varchar(150) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `numero_empleado`, `nombre_completo`, `id_usuario`) VALUES
(1, '9886', 'karina barragan', 6),
(2, '2319', 'maria', 7),
(4, '123', 'Fulanito Perez', 10),
(5, '5014', 'Juan Perez', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamientos`
--

CREATE TABLE `estacionamientos` (
  `id_estacionamiento` int(11) NOT NULL,
  `numero_espacio` varchar(10) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `placa` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `seguro` enum('si','no') CHARACTER SET armscii8 NOT NULL,
  `estado` enum('DISPONIBLE','OCUPADO') DEFAULT 'DISPONIBLE',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estacionamientos`
--

INSERT INTO `estacionamientos` (`id_estacionamiento`, `numero_espacio`, `descripcion`, `placa`, `modelo`, `seguro`, `estado`, `fecha_creacion`) VALUES
(12, '10', 'kia', '0', '', 'si', 'OCUPADO', '2024-10-11 06:00:00'),
(13, '7', 'kia', '0', '', 'si', '', '2024-10-11 06:00:00'),
(14, '12', 'karina barragan ', 'jtv-503-m356', 'kia', 'si', 'OCUPADO', '2024-10-11 06:00:00'),
(15, '8', 'maria Alejandra Gonzalez', 'ksdhjkfad', 'ford', 'no', 'OCUPADO', '2024-10-11 06:00:00'),
(18, '23', 'para pension de juan perez auto kia', 'RGC-4567', 'kia rio', 'si', 'OCUPADO', '2024-10-19 19:37:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre_evento` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_evento` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre_evento`, `descripcion`, `fecha_evento`, `hora_inicio`, `hora_fin`, `estado`, `fecha_creacion`) VALUES
(2, 'Reunion ', 'Se realizara el evento para recaudar fondos ', '2024-10-15', '09:00:00', '17:26:00', 'Activo', '2024-10-14 21:29:53'),
(4, 'Evento caridad', 'Caridad para 1niños con cancer', '2024-10-22', '19:00:00', '22:35:00', 'Activo', '2024-10-14 21:34:25'),
(9, 'Reunion ', 'Reunion compra material ', '2024-10-15', '19:26:00', '22:26:00', 'Activo', '2024-10-14 22:28:37'),
(14, 'Reunion ', 'reunion de 20 anversario', '2024-10-15', '16:35:00', '19:35:00', 'Activo', '2024-10-14 22:35:57'),
(16, 'Junta con el Jefe', 'Revisar asuntos pendientes', '2024-11-12', '10:00:00', '12:00:00', 'Activo', '2024-10-17 23:06:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liberaciones`
--

CREATE TABLE `liberaciones` (
  `id_liberacion` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_estacionamiento` int(11) DEFAULT NULL,
  `fecha_liberacion` date NOT NULL,
  `hora_liberacion` time NOT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `accion` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensiones`
--

CREATE TABLE `pensiones` (
  `id_pension` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_estacionamiento` int(11) DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pensiones`
--

INSERT INTO `pensiones` (`id_pension`, `id_usuario`, `id_estacionamiento`, `fecha_reserva`, `fecha_fin`, `estado`, `fecha_creacion`) VALUES
(0, 12, 18, '2024-10-21', '2024-10-26', 'ACTIVO', '2024-10-19 13:37:41'),
(1, 6, 14, '2024-10-25', '2024-12-25', 'ACTIVO', '2024-10-18 17:40:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_estacionamiento` int(11) DEFAULT NULL,
  `fecha_reserva` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `estado` enum('ACTIVA','FINALIZADA') DEFAULT 'ACTIVA',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_evento`
--

CREATE TABLE `reservas_evento` (
  `id_reserva` int(11) NOT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas_evento`
--

INSERT INTO `reservas_evento` (`id_reserva`, `id_evento`, `id_usuario`, `fecha_reserva`, `hora_inicio`, `hora_fin`, `estado`, `fecha_creacion`) VALUES
(1, 16, 12, '2024-10-31', '16:00:00', '22:00:00', 'Activo', '2024-10-18 22:13:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `email`, `contraseña`, `id_rol`, `fecha_creacion`) VALUES
(6, 'karina', 'hola@gmail.com', '$2y$10$UEWcqvqtXg4sx8fHUZ9MpuArtsw.mS2NUMQMEgUMcr2XN9ejMy2iO', 1, '2024-09-30 16:52:29'),
(7, 'maria', 'maria@gmail.com', '$2y$10$pTzzcEZk135EqFRfEQ7THen6RlT2cZwdVBIJyLidPeUqwBuOsU0la', 1, '2024-09-30 17:39:45'),
(10, 'Fulanito', 'fulanito@correo.com', '$2y$10$dAnG8dEzism2Z7kPYL6lQuAzMsTyBip0MoVYTxHHaR3oIwOurbp5G', 1, '2024-10-18 06:46:39'),
(12, 'Juan', 'juan@correo.com', '$2y$10$lss6ORXWtM9pl2N5Ge1M3eDMkgLZbUFwxhYqaCBzV8OhCj6u4XTI6', 2, '2024-10-19 00:33:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `numero_empleado` (`numero_empleado`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `estacionamientos`
--
ALTER TABLE `estacionamientos`
  ADD PRIMARY KEY (`id_estacionamiento`),
  ADD UNIQUE KEY `numero_espacio` (`numero_espacio`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `liberaciones`
--
ALTER TABLE `liberaciones`
  ADD PRIMARY KEY (`id_liberacion`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_estacionamiento` (`id_estacionamiento`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pensiones`
--
ALTER TABLE `pensiones`
  ADD PRIMARY KEY (`id_pension`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_estacionamiento` (`id_estacionamiento`);

--
-- Indices de la tabla `reservas_evento`
--
ALTER TABLE `reservas_evento`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estacionamientos`
--
ALTER TABLE `estacionamientos`
  MODIFY `id_estacionamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `liberaciones`
--
ALTER TABLE `liberaciones`
  MODIFY `id_liberacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservas_evento`
--
ALTER TABLE `reservas_evento`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `liberaciones`
--
ALTER TABLE `liberaciones`
  ADD CONSTRAINT `liberaciones_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `liberaciones_ibfk_2` FOREIGN KEY (`id_estacionamiento`) REFERENCES `estacionamientos` (`id_estacionamiento`);

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_estacionamiento`) REFERENCES `estacionamientos` (`id_estacionamiento`);

--
-- Filtros para la tabla `reservas_evento`
--
ALTER TABLE `reservas_evento`
  ADD CONSTRAINT `reservas_evento_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
