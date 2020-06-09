-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-06-2020 a las 02:05:19
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8 NOT NULL,
  `precio` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `categoria` enum('Torta','Tarta','Tematica','Promo') CHARACTER SET utf8 NOT NULL,
  `tama` enum('Mini','Mediano','Grande','') CHARACTER SET utf8 DEFAULT NULL,
  `foto1` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `foto2` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `foto3` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `foto4` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `foto5` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `foto6` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `nombre`, `precio`, `categoria`, `tama`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`) VALUES
(47, 'Batman', '666', 'Promo', '', 'luna.jpg', 'hagrid.jpg', '', '', '', ''),
(48, 'Batman', '12365', 'Torta', 'Mediano', 'hagrid.jpg', 'harry.jpg', '', 'harry.jpg', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
