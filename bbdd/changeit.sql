-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2019 a las 17:57:10
-- Versión del servidor: 10.3.14-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id9442298_changeit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buscadorpalabra`
--

CREATE TABLE `buscadorpalabra` (
  `ID_BUSCADOR` int(5) NOT NULL,
  `buscar_palabra` varchar(25) NOT NULL,
  `ID_usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `buscadorpalabra`
--

INSERT INTO `buscadorpalabra` (`ID_BUSCADOR`, `buscar_palabra`, `ID_usuario`) VALUES
(5, 'chancletas', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasproducto`
--

CREATE TABLE `categoriasproducto` (
  `ID_CAT_PROD` int(10) UNSIGNED NOT NULL,
  `tema` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoriasproducto`
--

INSERT INTO `categoriasproducto` (`ID_CAT_PROD`, `tema`) VALUES
(1, 'Vehículos'),
(2, 'Inmobiliaria'),
(3, 'Hogar'),
(4, 'Moda y belleza'),
(5, 'Para niños y bebes'),
(6, 'Telefonía'),
(7, 'Ocio y deportes'),
(8, 'Mascotas y animales'),
(9, 'Trabajo y formación'),
(10, 'Negocios y servicios'),
(11, 'Imagen y sonido'),
(12, 'Juegos'),
(13, 'Electronica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasservicio`
--

CREATE TABLE `categoriasservicio` (
  `ID_CAT_SERV` int(10) UNSIGNED NOT NULL,
  `tema` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoriasservicio`
--

INSERT INTO `categoriasservicio` (`ID_CAT_SERV`, `tema`) VALUES
(1, 'Traducciones'),
(2, 'Reformas'),
(3, 'Transporte'),
(4, 'Mudanzas'),
(5, 'Electricistas'),
(6, 'Abogados'),
(7, 'Traspasos'),
(8, 'Prestamos'),
(9, 'Secretario/a'),
(10, 'Cocineros/camareros'),
(11, 'Arquitectos'),
(12, 'Administrativos'),
(13, 'Ingenieros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatproducto`
--

CREATE TABLE `chatproducto` (
  `ID_CHAT_PROD` int(5) NOT NULL,
  `ID_producto` int(5) NOT NULL,
  `ID_usuario1` int(5) NOT NULL,
  `ID_usuario2` int(5) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatservicio`
--

CREATE TABLE `chatservicio` (
  `ID_CHAT_SERV` int(5) NOT NULL,
  `ID_servicio` int(5) NOT NULL,
  `ID_usuario1` int(5) NOT NULL,
  `ID_usuario2` int(5) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritosproducto`
--

CREATE TABLE `favoritosproducto` (
  `ID_FAV_PROD` int(5) NOT NULL,
  `ID_producto` int(5) NOT NULL,
  `ID_usuario` int(5) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritosservicio`
--

CREATE TABLE `favoritosservicio` (
  `ID_FAV_SERV` int(5) NOT NULL,
  `ID_servicio` int(5) NOT NULL,
  `ID_usuario` int(5) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicousuario`
--

CREATE TABLE `historicousuario` (
  `ID_HISTORICO` int(5) NOT NULL,
  `ID_usuario` int(5) NOT NULL,
  `inicio_sesion` datetime NOT NULL,
  `final_sesion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historicousuario`
--

INSERT INTO `historicousuario` (`ID_HISTORICO`, `ID_usuario`, `inicio_sesion`, `final_sesion`) VALUES
(62, 26, '2019-05-26 17:06:35', '2019-05-26 17:06:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenproducto`
--

CREATE TABLE `imagenproducto` (
  `ID_IMAGEN_PRODUCTO` int(11) NOT NULL,
  `ID_imagen` int(11) NOT NULL,
  `ID_producto` int(11) NOT NULL,
  `url_producto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenservicio`
--

CREATE TABLE `imagenservicio` (
  `ID_IMAGEN_SERVICIO` int(11) NOT NULL,
  `ID_imagen` int(11) NOT NULL,
  `ID_servicio` int(11) NOT NULL,
  `url_servicio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeproducto`
--

CREATE TABLE `mensajeproducto` (
  `ID_MENSAJE_PROD` int(5) NOT NULL,
  `ID_chat_producto` int(5) NOT NULL,
  `ID_producto` int(5) NOT NULL,
  `ID_usuario` int(5) NOT NULL,
  `mensaje` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeservicio`
--

CREATE TABLE `mensajeservicio` (
  `ID_MENSAJE_SERV` int(5) NOT NULL,
  `ID_chat_servicio` int(5) NOT NULL,
  `ID_servicio` int(5) NOT NULL,
  `ID_usuario` int(5) NOT NULL,
  `mensaje` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` mediumint(9) DEFAULT NULL,
  `tema` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `pendiente_valoracion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `ID_SERVICIO` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` mediumint(9) DEFAULT NULL,
  `tema` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `pendiente_valoracion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(4) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenya` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `imagen` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `confirmacion` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `valoraciones` int(5) DEFAULT NULL,
  `compras` int(5) DEFAULT NULL,
  `ventas` int(5) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `nombre`, `apellidos`, `contrasenya`, `correo`, `ciudad`, `telefono`, `imagen`, `confirmacion`, `activo`, `valoraciones`, `compras`, `ventas`, `fecha`) VALUES
(0, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00'),
(26, 'Javier', 'Martin Balaguer', '4d186321c1a7f0f354b297e8914ab240', '16java16@gmail.com', 'Barcelona', 626851663, '26_250px-Yo_como_profe.png', 5642, 1, NULL, NULL, NULL, '2019-04-07'),
(27, 'Tienda informatica', 'Informatica S.A', '4d186321c1a7f0f354b297e8914ab240', 'informatica@gmail.com', 'Burgos', 54764564, '27_Logo_CS_jpg_alta_calidad.jpg', 4637, 1, NULL, NULL, NULL, '2019-04-07'),
(28, 'Electricistas Montur', 'Electricistas/Transporte', '4d186321c1a7f0f354b297e8914ab240', 'electricistas@gmail.com', 'Murcia', 565434535, '28_maxresdefault.jpg', 8742, 1, NULL, NULL, NULL, '2019-04-07'),
(29, 'Abogados Pepito', 'Abogados/Secretarios', '4d186321c1a7f0f354b297e8914ab240', 'abogados@gmail.com', 'Asturias', 634264561, '29_diseno-logo-abogado1.jpg', 552, 1, NULL, NULL, NULL, '2019-04-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracionproducto`
--

CREATE TABLE `valoracionproducto` (
  `ID_VALORACION_PROD` int(5) NOT NULL,
  `ID_producto` int(5) NOT NULL,
  `ID_usuario_compra` int(5) DEFAULT NULL,
  `ID_usuario_vende` int(5) NOT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracionservicio`
--

CREATE TABLE `valoracionservicio` (
  `ID_VALORACION_SERV` int(5) NOT NULL,
  `ID_servicio` int(5) NOT NULL,
  `ID_usuario_compra` int(5) DEFAULT NULL,
  `ID_usuario_vende` int(5) NOT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `ID_WISHLIST` int(5) NOT NULL,
  `deseo` varchar(30) NOT NULL,
  `ID_usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wishlist`
--

INSERT INTO `wishlist` (`ID_WISHLIST`, `deseo`, `ID_usuario`) VALUES
(15, 'chanclas', 26);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `buscadorpalabra`
--
ALTER TABLE `buscadorpalabra`
  ADD PRIMARY KEY (`ID_BUSCADOR`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `categoriasproducto`
--
ALTER TABLE `categoriasproducto`
  ADD PRIMARY KEY (`ID_CAT_PROD`),
  ADD KEY `ID_CAT_PROD` (`ID_CAT_PROD`);

--
-- Indices de la tabla `categoriasservicio`
--
ALTER TABLE `categoriasservicio`
  ADD PRIMARY KEY (`ID_CAT_SERV`);

--
-- Indices de la tabla `chatproducto`
--
ALTER TABLE `chatproducto`
  ADD PRIMARY KEY (`ID_CHAT_PROD`),
  ADD KEY `ID_producto` (`ID_producto`),
  ADD KEY `ID_usuario1` (`ID_usuario1`),
  ADD KEY `ID_usuario2` (`ID_usuario2`);

--
-- Indices de la tabla `chatservicio`
--
ALTER TABLE `chatservicio`
  ADD PRIMARY KEY (`ID_CHAT_SERV`),
  ADD KEY `ID_servicio` (`ID_servicio`),
  ADD KEY `ID_usuario1` (`ID_usuario1`),
  ADD KEY `ID_usuario2` (`ID_usuario2`);

--
-- Indices de la tabla `favoritosproducto`
--
ALTER TABLE `favoritosproducto`
  ADD PRIMARY KEY (`ID_FAV_PROD`),
  ADD KEY `ID_producto` (`ID_producto`,`ID_usuario`),
  ADD KEY `favoritosproducto_ibfk_2` (`ID_usuario`);

--
-- Indices de la tabla `favoritosservicio`
--
ALTER TABLE `favoritosservicio`
  ADD PRIMARY KEY (`ID_FAV_SERV`),
  ADD KEY `ID_servicio` (`ID_servicio`,`ID_usuario`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `historicousuario`
--
ALTER TABLE `historicousuario`
  ADD PRIMARY KEY (`ID_HISTORICO`),
  ADD KEY `historicousuario_ibfk_1` (`ID_usuario`);

--
-- Indices de la tabla `imagenproducto`
--
ALTER TABLE `imagenproducto`
  ADD PRIMARY KEY (`ID_IMAGEN_PRODUCTO`),
  ADD KEY `ID_producto` (`ID_producto`);

--
-- Indices de la tabla `imagenservicio`
--
ALTER TABLE `imagenservicio`
  ADD PRIMARY KEY (`ID_IMAGEN_SERVICIO`),
  ADD KEY `ID_servicio` (`ID_servicio`);

--
-- Indices de la tabla `mensajeproducto`
--
ALTER TABLE `mensajeproducto`
  ADD PRIMARY KEY (`ID_MENSAJE_PROD`),
  ADD KEY `ID_chat_producto` (`ID_chat_producto`,`ID_producto`,`ID_usuario`),
  ADD KEY `ID_producto` (`ID_producto`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `mensajeservicio`
--
ALTER TABLE `mensajeservicio`
  ADD PRIMARY KEY (`ID_MENSAJE_SERV`),
  ADD KEY `ID_servicio` (`ID_servicio`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `mensaje` (`mensaje`),
  ADD KEY `ID_chat` (`ID_chat_servicio`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `tema` (`tema`),
  ADD KEY `tema_2` (`tema`),
  ADD KEY `tema_3` (`tema`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`ID_SERVICIO`),
  ADD KEY `tema` (`tema`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- Indices de la tabla `valoracionproducto`
--
ALTER TABLE `valoracionproducto`
  ADD PRIMARY KEY (`ID_VALORACION_PROD`),
  ADD KEY `ID_producto` (`ID_producto`,`ID_usuario_compra`,`ID_usuario_vende`),
  ADD KEY `ID_usuario_compra` (`ID_usuario_compra`),
  ADD KEY `ID_usuario_vende` (`ID_usuario_vende`);

--
-- Indices de la tabla `valoracionservicio`
--
ALTER TABLE `valoracionservicio`
  ADD PRIMARY KEY (`ID_VALORACION_SERV`),
  ADD KEY `ID_servicio` (`ID_servicio`,`ID_usuario_compra`,`ID_usuario_vende`),
  ADD KEY `ID_usuario_compra` (`ID_usuario_compra`),
  ADD KEY `ID_usuario_vende` (`ID_usuario_vende`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID_WISHLIST`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `buscadorpalabra`
--
ALTER TABLE `buscadorpalabra`
  MODIFY `ID_BUSCADOR` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `chatproducto`
--
ALTER TABLE `chatproducto`
  MODIFY `ID_CHAT_PROD` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `chatservicio`
--
ALTER TABLE `chatservicio`
  MODIFY `ID_CHAT_SERV` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `favoritosproducto`
--
ALTER TABLE `favoritosproducto`
  MODIFY `ID_FAV_PROD` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `favoritosservicio`
--
ALTER TABLE `favoritosservicio`
  MODIFY `ID_FAV_SERV` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historicousuario`
--
ALTER TABLE `historicousuario`
  MODIFY `ID_HISTORICO` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `imagenproducto`
--
ALTER TABLE `imagenproducto`
  MODIFY `ID_IMAGEN_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT de la tabla `imagenservicio`
--
ALTER TABLE `imagenservicio`
  MODIFY `ID_IMAGEN_SERVICIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `mensajeproducto`
--
ALTER TABLE `mensajeproducto`
  MODIFY `ID_MENSAJE_PROD` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `mensajeservicio`
--
ALTER TABLE `mensajeservicio`
  MODIFY `ID_MENSAJE_SERV` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `ID_SERVICIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `valoracionproducto`
--
ALTER TABLE `valoracionproducto`
  MODIFY `ID_VALORACION_PROD` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `valoracionservicio`
--
ALTER TABLE `valoracionservicio`
  MODIFY `ID_VALORACION_SERV` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID_WISHLIST` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `buscadorpalabra`
--
ALTER TABLE `buscadorpalabra`
  ADD CONSTRAINT `buscadorpalabra_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `chatproducto`
--
ALTER TABLE `chatproducto`
  ADD CONSTRAINT `chatproducto_ibfk_1` FOREIGN KEY (`ID_producto`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE CASCADE,
  ADD CONSTRAINT `chatproducto_ibfk_2` FOREIGN KEY (`ID_usuario1`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE,
  ADD CONSTRAINT `chatproducto_ibfk_3` FOREIGN KEY (`ID_usuario2`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `chatservicio`
--
ALTER TABLE `chatservicio`
  ADD CONSTRAINT `chatservicio_ibfk_1` FOREIGN KEY (`ID_servicio`) REFERENCES `servicio` (`ID_SERVICIO`) ON DELETE CASCADE,
  ADD CONSTRAINT `chatservicio_ibfk_2` FOREIGN KEY (`ID_usuario1`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE,
  ADD CONSTRAINT `chatservicio_ibfk_3` FOREIGN KEY (`ID_usuario2`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `favoritosproducto`
--
ALTER TABLE `favoritosproducto`
  ADD CONSTRAINT `favoritosproducto_ibfk_1` FOREIGN KEY (`ID_producto`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoritosproducto_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `favoritosservicio`
--
ALTER TABLE `favoritosservicio`
  ADD CONSTRAINT `favoritosservicio_ibfk_1` FOREIGN KEY (`ID_servicio`) REFERENCES `servicio` (`ID_SERVICIO`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoritosservicio_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historicousuario`
--
ALTER TABLE `historicousuario`
  ADD CONSTRAINT `historicousuario_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenproducto`
--
ALTER TABLE `imagenproducto`
  ADD CONSTRAINT `imagenproducto_ibfk_1` FOREIGN KEY (`ID_producto`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenservicio`
--
ALTER TABLE `imagenservicio`
  ADD CONSTRAINT `imagenservicio_ibfk_1` FOREIGN KEY (`ID_servicio`) REFERENCES `servicio` (`ID_SERVICIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mensajeproducto`
--
ALTER TABLE `mensajeproducto`
  ADD CONSTRAINT `mensajeproducto_ibfk_1` FOREIGN KEY (`ID_producto`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `mensajeproducto_ibfk_2` FOREIGN KEY (`ID_chat_producto`) REFERENCES `chatproducto` (`ID_CHAT_PROD`) ON DELETE CASCADE,
  ADD CONSTRAINT `mensajeproducto_ibfk_3` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `mensajeservicio`
--
ALTER TABLE `mensajeservicio`
  ADD CONSTRAINT `mensajeservicio_ibfk_1` FOREIGN KEY (`ID_servicio`) REFERENCES `servicio` (`ID_SERVICIO`),
  ADD CONSTRAINT `mensajeservicio_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `mensajeservicio_ibfk_3` FOREIGN KEY (`ID_chat_servicio`) REFERENCES `chatservicio` (`ID_CHAT_SERV`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`tema`) REFERENCES `categoriasproducto` (`ID_CAT_PROD`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`tema`) REFERENCES `categoriasservicio` (`ID_CAT_SERV`),
  ADD CONSTRAINT `servicio_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `valoracionproducto`
--
ALTER TABLE `valoracionproducto`
  ADD CONSTRAINT `valoracionproducto_ibfk_1` FOREIGN KEY (`ID_producto`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE CASCADE,
  ADD CONSTRAINT `valoracionproducto_ibfk_2` FOREIGN KEY (`ID_usuario_compra`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE,
  ADD CONSTRAINT `valoracionproducto_ibfk_3` FOREIGN KEY (`ID_usuario_vende`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `valoracionservicio`
--
ALTER TABLE `valoracionservicio`
  ADD CONSTRAINT `valoracionservicio_ibfk_1` FOREIGN KEY (`ID_servicio`) REFERENCES `servicio` (`ID_SERVICIO`) ON DELETE CASCADE,
  ADD CONSTRAINT `valoracionservicio_ibfk_2` FOREIGN KEY (`ID_usuario_compra`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE,
  ADD CONSTRAINT `valoracionservicio_ibfk_3` FOREIGN KEY (`ID_usuario_vende`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
