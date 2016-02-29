-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-02-2016 a las 20:34:26
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `forololo`
--

-- --------------------------------------------------------
DROP DATABASE IF EXISTS `forololo`;
CREATE DATABASE IF NOT EXISTS `forololo`;
USE forololo;
--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(4) NOT NULL,
  `id_usuario` int(4) DEFAULT NULL,
  `id_post` int(4) NOT NULL,
  `texto_comen` varchar(1500) DEFAULT NULL,
  `fechahora_comen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `id_post`, `texto_comen`, `fechahora_comen`) VALUES
(12, 1, 6, 'niÃ±os ratas', '2016-02-26 23:10:00'),
(48, 30, 6, 'prueba modi comen', '2016-02-28 23:41:35'),
(49, 30, 6, '<p>hola amijo</p>', '2016-02-28 23:44:04'),
(50, 30, 6, '<p>nuevo comentario</p>', '2016-02-28 23:44:22'),
(51, 30, 6, '<p>nuevo comentario 2</p>', '2016-02-28 23:45:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id_foro` int(4) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `nombre_foro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id_foro`, `id_usuario`, `nombre_foro`) VALUES
(1, 1, 'Tecnologia'),
(7, 1, 'Movil'),
(8, 30, 'Informatica'),
(9, 30, 'Deportes'),
(10, 30, 'E-Sport'),
(11, 30, 'Juegos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id_post` int(4) NOT NULL,
  `id_tema` int(4) NOT NULL,
  `nombre_post` varchar(100) NOT NULL,
  `fechahora_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto_post` text NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id_post`, `id_tema`, `nombre_post`, `fechahora_creacion`, `texto_post`, `id_usuario`) VALUES
(5, 2, 'Counterstrike', '2016-02-25 19:38:17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc hendrerit neque turpis, non fermentum lectus venenatis eget. Sed sit amet dictum erat, quis varius orci. Proin at risus vehicula, volutpat tellus ut, semper nunc. Donec a ornare ante. Curabitur nibh magna, convallis vitae ipsum quis, feugiat lacinia lorem. Phasellus eu rutrum urna, eget semper diam. Mauris ultrices lorem eu eros vulputate, finibus egestas ex sollicitudin. Cras eleifend leo quis ante pellentesque consectetur. Nullam semper erat dictum ipsum rutrum suscipit. Maecenas pulvinar purus sit amet nunc finibus dapibus. Nunc ullamcorper elementum luctus. Ut aliquam metus justo, dapibus euismod est vestibulum eget. Praesent sagittis nulla quam, vel viverra nunc fermentum nec.\r\n\r\nInteger semper, lectus a interdum aliquam, erat turpis gravida magna, eu ultricies erat lorem ut ligula. In hac habitasse platea dictumst. Donec fermentum, urna eget placerat aliquam, metus eros aliquam ante, nec condimentum sem urna vitae diam. Fusce rutrum iaculis leo hendrerit ullamcorper. Nulla malesuada venenatis ante et varius. In rutrum eros vitae tellus molestie rutrum. Curabitur ut suscipit orci, ut cursus libero.\r\n\r\nSuspendisse laoreet egestas urna. Cras et turpis rhoncus, luctus risus eu, aliquam est. Suspendisse ultricies tellus eu dolor finibus, eget interdum diam dictum. Pellentesque fringilla nisl a urna tincidunt aliquam. Nulla quis finibus ante, sit amet facilisis orci. Nunc in sem a nisl iaculis commodo vel eu magna. Sed tincidunt neque a malesuada euismod. Vestibulum id lorem et urna accumsan gravida non et quam. In molestie finibus risus, eget pharetra massa scelerisque vel. Suspendisse efficitur purus malesuada arcu tincidunt, eget pharetra quam vehicula. Ut velit urna, rutrum a ex ac, blandit elementum nulla. Integer ut suscipit tortor. Sed et risus ex. Phasellus porta velit sed mi congue eleifend. Praesent scelerisque massa id elementum ultrices.\r\n\r\nVivamus venenatis lacinia neque, vel dapibus leo tincidunt eu. Nulla faucibus vehicula quam at pulvinar. Aliquam ultrices felis a leo convallis lacinia. Mauris in vulputate velit. Quisque tempor quis lectus sit amet mattis. Nunc nec ex quis nulla ultrices rhoncus. Vestibulum vel suscipit ante, non condimentum tortor. Phasellus at sodales velit. Maecenas sagittis volutpat justo, congue lacinia erat semper vel. Aenean ornare purus ac diam mollis pellentesque. Aliquam non scelerisque augue. Proin tempor, risus in finibus semper, nulla turpis pellentesque nulla, quis volutpat sapien arcu non ex. Sed eu ligula nec arcu ornare rutrum vel vitae lectus. Vivamus feugiat velit et metus ultrices lobortis. Duis tincidunt cursus lacus at malesuada.\r\n\r\nNunc euismod bibendum mauris eget scelerisque. Pellentesque nec ligula dictum, dignissim quam sit amet, vestibulum lorem. Praesent condimentum nisi id risus pellentesque, quis sagittis nisl placerat. Phasellus tincidunt ex cursus aliquam auctor. Nullam odio justo, efficitur id lobortis nec, gravida sit amet leo. Curabitur rhoncus neque est. Morbi suscipit mauris velit, ac tincidunt risus aliquam eu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce ullamcorper ex aliquam urna rhoncus, vel imperdiet justo efficitur. Sed auctor, turpis mattis malesuada mollis, orci leo porttitor ex, ullamcorper rhoncus turpis lacus vel leo. Nunc fermentum semper massa, vel pretium lorem vulputate ut. Nullam consequat malesuada elit, at consequat nisi vestibulum a. Quisque porta purus turpis, quis tristique metus placerat quis. Nunc vitae hendrerit libero. Etiam rhoncus eu tellus sed lacinia.\r\n\r\nInteger ullamcorper tellus nec congue varius. Aenean luctus semper sem, id accumsan velit congue eget. Praesent a erat sem. Mauris convallis nisi sed libero mollis cursus. Nulla tincidunt mollis lectus, eget dignissim massa ornare eget. Mauris vel quam nec ligula lacinia cursus vel at nibh. Aenean fermentum suscipit tortor sed fermentum. Pellentesque maximus odio non iaculis suscipit. Phasellus aliquam est ultricies est molestie ultrices. Phasellus bibendum metus lorem, a malesuada erat congue sit amet. Suspendisse maximus fermentum efficitur. Proin id tortor lorem. Proin volutpat tempus cursus. Sed ullamcorper mollis faucibus. Aenean ut vestibulum nibh. Aenean ullamcorper hendrerit nunc vitae pharetra.				', 31),
(6, 2, 'League of Legend', '2016-02-26 22:52:31', '	\r\n	League of Legend					', 30),
(42, 2, 'prueba ', '2016-02-29 17:34:42', '<p>prueba</p>', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_tema` int(4) NOT NULL,
  `id_foro` int(4) NOT NULL,
  `nombre_tema` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_tema`, `id_foro`, `nombre_tema`, `descripcion`) VALUES
(1, 1, 'Telefonía', 'Noticias sobre telefonía movil.'),
(2, 1, 'Videojuegos', 'Videojuegos'),
(3, 7, 'telefonia ip', 'telefonia ip'),
(4, 7, 'telefonia ip 2', 'telefonia ip 2'),
(5, 7, 'telefonia digital', 'telefonia digital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(64) NOT NULL,
  `foto` varchar(255) DEFAULT 'http://socooking.com/wp-content/uploads/2016/02/homemade-klondike-bars-1455852023n4gk8-250x250.png' COMMENT 'url de la imagen',
  `nickusuario` varchar(30) NOT NULL,
  `tipoacceso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `contrasena`, `foto`, `nickusuario`, `tipoacceso`) VALUES
(1, 'lolo', 'lopez', 'paco@paco.com', '123456', NULL, 'lolo', ''),
(28, 'asasas', 'asasass', 'asas@aaa', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'aaaaaasass', ''),
(30, 'manuel', 'lopez', 'manuel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://socooking.com/wp-content/uploads/2016/02/homemade-klondike-bars-1455852023n4gk8-250x250.png', 'manuel', 'admin'),
(31, 'perez', 'palotes', 'pepito@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://socooking.com/wp-content/uploads/2016/02/homemade-klondike-bars-1455852023n4gk8-250x250.png', 'pepito', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fkcomentarios` (`id_post`),
  ADD KEY `fkcomenuser` (`id_usuario`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id_foro`),
  ADD KEY `fkforo` (`id_usuario`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `fkpost` (`id_tema`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `fktemas` (`id_foro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nickusuario` (`nickusuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id_foro` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_tema` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fkcomentarios` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcomenuser` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `fkforo` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fkpost` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`);

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `fktemas` FOREIGN KEY (`id_foro`) REFERENCES `foro` (`id_foro`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
