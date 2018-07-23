-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-07-2018 a las 23:55:29
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simple_stock`
--
CREATE DATABASE IF NOT EXISTS `simple_stock` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `simple_stock`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `date_added`) VALUES
(1, 'Licores', 'Sección de bebidas alcoholicas', '2018-07-21'),
(2, 'Electrodomésticos', 'Sección de aparatos para uso doméstico', '2018-07-21'),
(3, 'Automóviles', 'Sección de productos para autos', '2018-07-21'),
(4, 'Jabones y Detergentes', 'Sección de limpieza', '2018-07-21'),
(5, 'Papeles', 'Sección de higiene personal', '2018-07-21'),
(6, 'Productos para mascotas', 'Sección de productos para mascotas', '2018-07-21'),
(7, 'Artículos escolares', 'Sección de artículos escolares', '2018-07-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE IF NOT EXISTS `historial` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` char(20) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_historial`),
  KEY `fk_HisPro` (`codigo_producto`),
  KEY `fk_HisUser` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `codigo_producto`, `user_id`, `fecha`, `hora`, `cantidad`) VALUES
(1, '67L12FV6', 'JoseFlores', '2018-07-22', '12:52:37', 18),
(2, '99A12YI5', 'Felipe', '2018-07-22', '10:56:25', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1532023888),
('m130524_201442_init', 1532023894);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `contenido_neto` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL,
  `precio_venta` float(8,2) NOT NULL,
  `costo` float(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`codigo_producto`),
  KEY `fk_ProCat` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`codigo_producto`, `nombre_producto`, `contenido_neto`, `date_added`, `precio_venta`, `costo`, `stock`, `image`, `id_categoria`) VALUES
('45K90CF8', 'Charmin UltraSoft', '6 pza', '2018-07-21 05:46:23', 45.60, 32.50, 10, 'uploads/Charmin UltraSoft.jpg', 5),
('55P78NM8', 'Casa para Perro Gracious Living Mediana Negro y Azul', '1 pza', '2018-07-21 05:51:48', 889.90, 723.60, 8, 'uploads/Casa para Perro Gracious Living Mediana Negro y Azul.png', 6),
('67L12FV6', 'Gato Mécanico', '1 pza', '2018-07-21 03:32:22', 645.00, 570.00, 12, 'uploads/Gato Mécanico.jpg', 3),
('76E45JH8', 'Whisky Blanco y Negro', '750 ml', '2018-07-21 01:53:38', 169.00, 100.00, 5, 'uploads/Whisky Blanco y Negro.jpg', 1),
('99A12YI5', 'Ariel Detergente en Polvo Aroma Original', '6 kg', '2018-07-21 05:56:15', 188.89, 99.90, 30, 'uploads/Ariel Detergente en Polvo Aroma Original.png', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `fecha` date NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `fecha`, `created_at`, `updated_at`) VALUES
(2, 'Jose Antonio', 'Flores Vargas', 'JoseFlores', 'kLdG_FWGM3ZFomuOUQPEyo8FAsGvnN6i', '$2y$13$MvfJPJTTVUiEoLyefFXaounsl.za7Wfx0IMS6klfW7aKk9PD.olMq', NULL, 'jose.antonio1994@outlook.com', 10, '2018-07-21', 1532226473, 1532226473),
(3, 'Felipe', 'Díaz Vazquez', 'Felipe', '8fr9JxGUGbJWOe_VYWpSjClbOzKJP0RY', '$2y$13$8ureiqViUsdETG1HY1H96utrLaQ1N3zQ3XSDnRHhsDzvPgagxQway', NULL, 'felipe@outlook.com', 10, '2018-07-21', 1532227232, 1532227232);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_HisPro` FOREIGN KEY (`codigo_producto`) REFERENCES `products` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_ProCat` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
