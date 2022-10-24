-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2022 a las 01:06:12
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
-- Base de datos: `agenda`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_tarea` (IN `p_id` INT, IN `p_categoria` VARCHAR(100), IN `p_titulo` VARCHAR(100), IN `p_descripcion` VARCHAR(100), IN `p_correo` VARCHAR(100), IN `p_ubicacion` VARCHAR(100), IN `p_fecha` DATE, IN `p_repeticion` VARCHAR(100), IN `p_hora_inicio` TIME, IN `p_hora_fin` TIME)   BEGIN
UPDATE tareas SET categoria = p_categoria, titulo = p_titulo, descripcion = p_descripcion, correo = p_correo, ubicacion = p_ubicacion, fecha = p_fecha, repeticion = p_repeticion, hora_inicio = p_hora_inicio, hora_fin = p_hora_fin WHERE id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_tarea` (IN `p_id` INT)   BEGIN
DELETE FROM tareas WHERE id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtrar_tareas` (IN `p_campo` VARCHAR(100), IN `p_valor` VARCHAR(100))   BEGIN
SET @s = CONCAT("SELECT id, categoria, titulo, descripcion, correo, ubicacion, fecha, repeticion, hora_inicio, hora_fin FROM tareas WHERE ", p_campo, " LIKE CONCAT('%", p_valor, "%')");
PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tarea` (IN `p_categoria` VARCHAR(100), IN `p_titulo` VARCHAR(100), IN `p_descripcion` VARCHAR(100), IN `p_correo` VARCHAR(100), IN `p_ubicacion` VARCHAR(100), IN `p_fecha` DATE, IN `p_repeticion` VARCHAR(100), IN `p_hora_inicio` TIME, IN `p_hora_fin` TIME)   BEGIN
INSERT INTO `tareas` (`categoria`, `titulo`, `descripcion`, `correo`, `ubicacion`, `fecha`, `repeticion`, `hora_inicio`, `hora_fin`) VALUES (p_categoria, UPPER(p_titulo), UPPER(p_descripcion), UPPER(p_correo), UPPER(p_ubicacion), p_fecha, p_repeticion, p_hora_inicio, p_hora_fin);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tareas` ()   BEGIN
SELECT * FROM tareas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tareas_hoy` ()   BEGIN
SELECT * FROM tareas WHERE fecha = CURDATE();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tareas_hoy2` (IN `p_fecha` DATE)   BEGIN
SELECT * FROM tareas WHERE fecha = p_fecha;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `visualizar_tarea` (IN `p_id` INT)   BEGIN
SELECT * FROM tareas WHERE id = p_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `repeticion` varchar(100) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
