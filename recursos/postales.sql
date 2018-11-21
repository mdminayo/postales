-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2018 a las 22:11:32
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `postales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(2500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codigo`, `nombre`, `descripcion`) VALUES
(1, 'Amor y amistad', 'aqui se celebran las amistades'),
(2, 'Carnavales', 'carnavales'),
(3, 'Comida', 'comida'),
(4, 'Culturas indigenas', 'culturas'),
(5, 'Laguna', 'lagunas'),
(6, 'Municipios', 'municipios'),
(7, 'Playas', 'playas'),
(8, 'Sitios turisticos', 'sitios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `codigoCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`codigo`, `nombre`, `ruta`, `codigoCategoria`) VALUES
(1, 'imagen1', 'BtAlV9bLS7.jpg', 1),
(2, 'imagen2', 'Y73UdJEMBh.jpg', 1),
(3, 'imagen3', 'orHnQLGEe7.jpg', 1),
(4, 'imagen4', 'OdYyiGp1uH.jpg', 1),
(5, 'imagen5', 'tzy0pMUbGj.jpg', 1),
(6, 'imagen1', 'f7GJyClnUX.jpg', 2),
(7, 'imagen2', 'oyuXziWcR3.jpg', 2),
(8, 'imagen3', 'oe054dawr3.jpg', 2),
(9, 'imagen4', 'zwFqWaycOB.jpg', 2),
(10, 'imagen5', 'bD4UJwmNjn.jpg', 2),
(11, 'imagen1', 'aoZCFAcevV.jpg', 3),
(12, 'imagen2', 'USLJNke8tV.jpg', 3),
(13, 'imagen3', 'gmxDu4bLXv.jpg', 3),
(14, 'imagen4', 'RnTPDf92mg.jpg', 3),
(15, 'imagen5', '6JWhBq124M.jpg', 3),
(16, 'imagen1', 'JoZrgYuEVa.jpg', 4),
(17, 'imagen2', 'exyopOP37k.jpg', 4),
(18, 'imagen3', 'ZWX5aAhKvm.jpg', 4),
(19, 'imagen4', '81OmGyocqh.jpg', 4),
(20, 'imagen5', '4YxPAFlwhc.jpg', 4),
(21, 'imagen1', 'yoYXLcrdG8.jpg', 5),
(22, 'imagen2', 'b5Ntv0YP7h.jpg', 5),
(23, 'imagen3', 'Oxya4A98LH.jpg', 5),
(24, 'imagen4', 'Zlc9H8NSaq.jpg', 5),
(25, 'imagen5', 'HgSAekxGi7.jpg', 5),
(26, 'imagen1', 'vCPFdQzmDE.jpg', 6),
(27, 'imagen2', 'vsFViA7hMX.jpg', 6),
(28, 'imagen3', 'mvB6uI2UYx.jpg', 6),
(29, 'imagen4', 'B4y62qZJKx.jpg', 6),
(30, 'imagen5', 'n5LXpBgJfM.jpg', 6),
(31, 'imagen1', 'VAGQ2tSCJY.jpg', 7),
(32, 'imagen2', 'U7q4YEgWrp.jpg', 7),
(33, 'imagen3', 'k1HZA5P9mC.jpg', 7),
(34, 'imagen4', 'n8qYGg1c7S.jpg', 7),
(35, 'imagen5', 'AM6paSwRGc.jpg', 7),
(36, 'imagen1', 'nXpz9KDRG3.jpg', 8),
(37, 'imagen2', 'PIrdY2L1Zm.jpg', 8),
(38, 'imagen3', '2Sp9KOlF3M.jpg', 8),
(39, 'imagen4', 'RgN5L7HUCf.jpg', 8),
(40, 'imagen5', 'Bb6pd0ES9n.jpg', 8),
(42, 'bugs', 'y4ukwohGC6.PNG', 1),
(43, 'catdog', 'catdog.PNG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postal`
--

CREATE TABLE `postal` (
  `codigo` int(11) NOT NULL,
  `fechaEnvio` datetime NOT NULL,
  `nombreRemitente` varchar(100) NOT NULL,
  `emailRemitente` varchar(100) NOT NULL,
  `nombreDestinatario` varchar(100) NOT NULL,
  `emailDestinatario` varchar(100) NOT NULL,
  `mensaje` varchar(2500) NOT NULL,
  `codigoImagen` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `postal`
--

INSERT INTO `postal` (`codigo`, `fechaEnvio`, `nombreRemitente`, `emailRemitente`, `nombreDestinatario`, `emailDestinatario`, `mensaje`, `codigoImagen`, `usuario`) VALUES
(3, '2018-07-21 01:51:13', 'asda', 'asda', 'adsad', 'mdminayo@gmail.com', 'adsadsa', 1, ''),
(4, '2018-07-21 01:57:28', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'Imagen de la laguna', 25, ''),
(5, '2018-07-21 01:59:02', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'sds', 1, ''),
(6, '2018-07-21 02:00:51', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'sds', 1, 'RCJA024'),
(7, '2018-07-21 02:20:51', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'Hola amigo, te comparto una imagen del otro dÃ­a que fui a la laguna verde. espero te guste y te de envidia', 22, 'RCJA024'),
(8, '2018-07-21 02:36:43', 'Danilo Minayo', 'mdminayo@gmail.com', 'Jesus Romo', 'romojesus@hotmail.es', 'Hola amigo mio', 36, 'MDMINAYO'),
(9, '2018-07-21 02:38:44', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'asdsa', 33, 'RCJA024'),
(10, '2018-07-21 02:56:48', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'imagen carnaval', 6, 'RCJA024'),
(11, '2018-07-21 03:24:11', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'prueba', 26, 'RCJA024'),
(12, '2018-07-21 03:24:48', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'prueba', 26, 'RCJA024'),
(13, '2018-07-21 03:25:35', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'prueba', 26, 'RCJA024'),
(14, '2018-07-21 03:25:56', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'prueba', 26, 'RCJA024'),
(15, '2018-07-21 03:26:54', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'prueba', 26, 'RCJA024'),
(16, '2018-07-21 03:27:11', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'prueba', 26, 'RCJA024'),
(17, '2018-07-21 03:29:05', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'prueba', 26, 'RCJA024'),
(18, '2018-07-21 03:32:36', 'Danilo Minayo', 'mdminayo@gmail.com', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 1, 'RCJA024'),
(19, '2018-07-21 03:34:37', 'Danilo Minayo', 'mdminayo@gmail.com', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 1, 'RCJA024'),
(20, '2018-07-21 03:35:01', 'Danilo Minayo', 'mdminayo@gmail.com', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 1, 'RCJA024'),
(21, '2018-07-21 03:35:46', 'Danilo Minayo', 'mdminayo@gmail.com', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 1, 'RCJA024'),
(22, '2018-07-21 03:35:54', 'Danilo Minayo', 'mdminayo@gmail.com', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 1, 'RCJA024'),
(23, '2018-07-21 03:36:20', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 1, 'RCJA024'),
(24, '2018-07-21 03:36:50', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 1, 'RCJA024'),
(25, '2018-07-21 03:37:01', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 1, 'RCJA024'),
(26, '2018-07-21 03:38:06', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 1, 'RCJA024'),
(27, '2018-07-21 03:39:42', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 6, 'RCJA024'),
(28, '2018-07-21 03:40:20', 'Jesus Romo', 'romojesus@hotmail.es', 'Danilo Minayo', 'mdminayo@gmail.com', 'ok', 6, 'RCJA024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(33) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `clave`, `nombres`, `apellidos`, `email`, `fechaNacimiento`) VALUES
('lola', '202cb962ac59075b964b07152d234b70', 'Angelica', 'Tutalcha', 'vcolo75@yahoo.com', '2018-07-03'),
('MDMINAYO', '81dc9bdb52d04dc20036dbd8313ed055', 'MIGUEL DANILO', 'MINAYO BENAVIDES', 'mdminayo@gmail.com', '1980-01-25'),
('RCJA024', '81dc9bdb52d04dc20036dbd8313ed055', 'JESUS ALEXANDER', 'ROMO CHAMORRO', 'romojesus@hotmail.es', '0000-00-00'),
('root', '202cb962ac59075b964b07152d234b70', 'Danilo', 'Minayo', 'mdminayo@gmail.com', '2018-11-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `imagen_fk_categoria` (`codigoCategoria`);

--
-- Indices de la tabla `postal`
--
ALTER TABLE `postal`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `postal_fk_imagen` (`codigoImagen`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `postal`
--
ALTER TABLE `postal`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_fk_categoria` FOREIGN KEY (`codigoCategoria`) REFERENCES `categoria` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `postal`
--
ALTER TABLE `postal`
  ADD CONSTRAINT `postal_fk_imagen` FOREIGN KEY (`codigoImagen`) REFERENCES `imagen` (`codigo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
