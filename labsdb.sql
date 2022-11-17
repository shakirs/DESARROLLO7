-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2022 a las 05:38:26
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `labsdb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_noticia` (IN `p_id` INT)   BEGIN
DELETE FROM noticias WHERE id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_noticia` (IN `p_id` INT)   BEGIN
SELECT * FROM noticias WHERE id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_factorial` (IN `p_id` INT, IN `p_numero` INT, IN `p_factorial` INT, IN `p_sumatoria` INT)   BEGIN
UPDATE parcial_2 SET numero = p_numero, factorial = p_factorial, sumatoria = p_sumatoria WHERE id = p_id;
SELECT ROW_COUNT();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_votos` (IN `param_votos1` VARCHAR(255), IN `param_votos2` VARCHAR(255))   BEGIN
	
    SET @s = CONCAT ("UPDATE votos set votos1=", param_votos1, ", votos2=", param_votos2);
    
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_id` (IN `p_id` INT)   BEGIN
SELECT * FROM parcial_2 WHERE id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_guardar` (IN `p_numero` INT, IN `p_factorial` INT, IN `p_sumatoria` INT)   BEGIN
INSERT INTO parcial_2 (numero, factorial, sumatoria) VALUES (p_numero, p_factorial, p_sumatoria);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias` ()   BEGIN

	SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias_filtro` (IN `param_campo` VARCHAR(255), IN `param_valor` VARCHAR(255))   BEGIN
	
    SET @s = CONCAT("SELECT id, titulo, texto, categoria, fecha, imagen
                    FROM noticias WHERE ", param_campo ," LIKE CONCAT('%", param_valor ,"%')");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar` ()   BEGIN
SELECT * FROM parcial_2;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `categoria` enum('promociones','ofertas','costas') NOT NULL DEFAULT 'promociones',
  `fecha` date NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `categoria`, `fecha`, `imagen`) VALUES
(1, 'Nueva promocion en Ciudad Cristal', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL),
(2, 'Nueva promocion en Ciudad Cristal', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL),
(3, 'Apartamentos en el Puerto de San Martin', 'En la Playa del Sol, en primera linea de playa. Pisos reformados y completamente amueblados.', 'costas', '2019-02-06', 'apartamento8.jpg'),
(4, 'Casa reformada en el barrio de la Palmera', 'Dos plantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL),
(5, 'Promocion en Costa Mar', 'Con vistas al campo de golf, magnificas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg'),
(6, 'Apartamentos en el Puerto de San Martin', 'En la \r\nPlaya del Sol, en primera linea de playa. Pisos reformados y completamente \r\namueblados.', 'costas', '2019-02-06', 'apartamento8.jpg'),
(7, 'Apartamentos en el Puerto de San Martin', 'En la Playa del Sol, en primera linea de playa. Pisos reformados y completamente amueblados.', 'costas', '2019-02-06', 'apartamento8.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial_2`
--

CREATE TABLE `parcial_2` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `factorial` int(255) NOT NULL,
  `sumatoria` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parcial_2`
--

INSERT INTO `parcial_2` (`id`, `numero`, `factorial`, `sumatoria`) VALUES
(35, 4, 24, 30),
(36, 21, 2147483647, 3311),
(37, 11, 24, 506),
(38, 12, 479001600, 650),
(39, 10, 3628800, 385),
(40, 6, 720, 91),
(41, 31, 2147483647, 10416),
(42, 4, 24, 30),
(43, 1, 1, 1),
(44, 6, 720, 91),
(45, 11, 39916800, 506),
(46, 21, 2147483647, 3311),
(47, 21, 2147483647, 3311),
(48, 2, 2, 5),
(49, 7, 5040, 140),
(50, 9, 362880, 285),
(51, 7, 5040, 140),
(52, 8, 40320, 204),
(53, 21, 2147483647, 3311),
(54, 4, 24, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `votos1` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `votos2` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `votos1`, `votos2`) VALUES
(1, 49, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parcial_2`
--
ALTER TABLE `parcial_2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `parcial_2`
--
ALTER TABLE `parcial_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



