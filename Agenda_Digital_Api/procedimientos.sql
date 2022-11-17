


-- CREAR PROCESO ALMACENADO PARA BUSCAR UN REGISTRO EN LA TABLA DE TAREAS POR SU TITULO
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_tarea`(IN `p_titulo` VARCHAR(100))
BEGIN
SELECT * FROM tareas WHERE titulo = p_titulo;
END

-- CREAR PROCESO ALMACENADO PARA ACTUALIZAR UN REGISTRO EN LA TABLA DE TAREAS AL BUSCARLO POR SU TITULO
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_tarea`(IN `p_titulo` VARCHAR(100), IN `p_descripcion` VARCHAR(100), IN `p_correo` VARCHAR(100), IN `p_ubicacion` VARCHAR(100), IN `p_fecha` DATE, IN `p_hora` TIME)
BEGIN
UPDATE tareas SET descripcion = p_descripcion, correo = p_correo, ubicacion = p_ubicacion, fecha = p_fecha, hora = p_hora WHERE titulo = p_titulo;
END

-- CREAR PROCESO ALMACENADO PARA ELIMINAR UN REGISTRO EN LA TABLA DE TAREAS POR SU ID
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_tarea`(IN `p_id` INT)
BEGIN
DELETE FROM tareas WHERE id = p_id;
END

-- CREAR PROCESO ALMACENADO PARA MOSTRAR TODOS LOS REGISTROS DE LA TABLA DE TAREAS
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tareas`()
BEGIN
SELECT * FROM tareas;
END

-- CREAR PROCESO ALMACENADO PARA MOSTRAR TODOS LOS REGISTROS DE LA TABLA DE TAREAS QUE TENGA LA FECHA ACTUAL DEL SISTEMA
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tareas_hoy2`(IN `p_fecha` DATE)
BEGIN
SELECT * FROM tareas WHERE fecha = p_fecha;
END



-- CREAR PROCESO ALMACENADO PARA VERIFICAR SI EXISTE UN REGISTRO EN LA TABLA DE TAREAS POR SU TITULO
CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_tarea`(IN `p_titulo` VARCHAR(100))
BEGIN
SELECT * FROM tareas WHERE titulo = p_titulo;
END

-- CREAR PROCEDIMIENTO ALMACENADO PARA NO PERMITIR QUE SE REPITA EL TITULO DE UNA TAREA
CREATE DEFINER=`root`@`localhost` PROCEDURE `validar_titulo`(IN `p_titulo` VARCHAR(100))
BEGIN
IF (SELECT COUNT(*) FROM tareas WHERE titulo = p_titulo) > 0 THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El titulo ya existe';
END IF;
END

-- CREAR PROCEDIMIENTO ALMACENADO PARA MOSTRAR LAS TAREAS POR FECHA ACTUAL
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tareas_fecha`(IN `p_fecha` DATE)
BEGIN
SELECT * FROM tareas WHERE fecha = p_fecha;
END

-- CREAR PROCEDIMIENTO ALMACENADO PARA MOSTRAR LAS TAREAS POR FECHA ACTUAL Y HORA ACTUAL
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tareas_fecha_hora`(IN `p_fecha` DATE, IN `p_hora` TIME)
BEGIN
SELECT * FROM tareas WHERE fecha = p_fecha AND hora = p_hora;
END


-- CREAR TABLA DE TAREAS EN LA BASE DE DATOS--
CREATE TABLE `tareas` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`categoria` varchar(100) NOT NULL,
`titulo` varchar(100) NOT NULL,
`descripcion` varchar(100) NOT NULL,
`correo` varchar(100) NOT NULL,
`ubicacion` varchar(100) NOT NULL,
`fecha` date NOT NULL,
`repeticion` varchar(100) NOT NULL,
`hora_inicio` time NOT NULL,
`hora_fin` time NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- CREAR PROCEDIEMIENTO ALMACENADO PARA FILTRAR LAS TAREAS POR CUALQUIER COLUMNA--
CREATE DEFINER=`root`@`localhost` PROCEDURE `filtrar_tareas`(
    IN `p_campo` VARCHAR(100), 
    IN `p_valor` VARCHAR(100)
    )
BEGIN
SET @s = CONCAT("SELECT id, categoria, titulo, descripcion, correo, ubicacion, fecha, repeticion, hora_inicio, hora_fin FROM tareas WHERE ", p_campo, " LIKE CONCAT('%", p_valor, "%')");
PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END

-- CREAR PROCEDIMIENTO ALMACENADO PARA MOSTRAR TODAS LAS TAREAS --
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tareas`()
BEGIN
SELECT * FROM tareas;
END

-- CREAR PROCEDIMIENTO ALMACENADO PARA ELIMINAR UNA TAREA POR SU ID --
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_tarea`(IN `p_id` INT)
BEGIN
DELETE FROM tareas WHERE id = p_id;
END


-- CREAR PROCEDIMIENTO ALMACENADO PARA INSERTAR UNA TAREA TODA EN MAYUSCULAS --
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tarea`(IN `p_categoria` VARCHAR(100), IN `p_titulo` VARCHAR(100), IN `p_descripcion` VARCHAR(100), IN `p_correo` VARCHAR(100), IN `p_ubicacion` VARCHAR(100), IN `p_fecha` DATE, IN `p_repeticion` VARCHAR(100), IN `p_hora_inicio` TIME, IN `p_hora_fin` TIME)
BEGIN
INSERT INTO `tareas` (`categoria`, `titulo`, `descripcion`, `correo`, `ubicacion`, `fecha`, `repeticion`, `hora_inicio`, `hora_fin`) VALUES (p_categoria, UPPER(p_titulo), UPPER(p_descripcion), UPPER(p_correo), UPPER(p_ubicacion), p_fecha, p_repeticion, p_hora_inicio, p_hora_fin);
END

-- CREAR PROCESO ALMACENADO PARA INSERTAR UN NUEVO REGISTRO EN LA TABLA DE TAREAS
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tarea` (IN `p_categoria` VARCHAR(100), IN `p_titulo` VARCHAR(100), IN `p_descripcion` VARCHAR(100), IN `p_correo` VARCHAR(100), IN `p_ubicacion` VARCHAR(100), IN `p_fecha` DATE, `p_repeticion` VARCHAR(100), IN `p_hora_inicio` TIME, IN `p_hora_fin` TIME)
BEGIN
INSERT INTO `tareas` (`categoria`, `titulo`, `descripcion`, `correo`, `ubicacion`, `fecha`, `repeticion`, `hora_inicio`, `hora_fin`) VALUES (p_categoria, p_titulo, p_descripcion, p_correo, p_ubicacion, p_fecha, p_repeticion, p_hora_inicio, p_hora_fin);
END

-- CREAR PROCESO ALMACENADO PARA INSERTAR UN NUEVO REGISTRO EN LA TABLA DE TAREAS
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tarea` (IN `p_categoria` VARCHAR(100), IN `p_titulo` VARCHAR(100), IN `p_descripcion` VARCHAR(100), IN `p_correo` VARCHAR(100), IN `p_ubicacion` VARCHAR(100), IN `p_fecha` DATE, `p_repeticion` VARCHAR(100), IN `p_hora_inicio` TIME, IN `p_hora_fin` TIME)
BEGIN
INSERT INTO `tareas` (`categoria`, `titulo`, `descripcion`, `correo`, `ubicacion`, `fecha`, `repeticion`, `hora_inicio`, `hora_fin`) VALUES (p_categoria, p_titulo, p_descripcion, p_correo, p_ubicacion, p_fecha, p_repeticion, p_hora_inicio, p_hora_fin);
END


-- CREAR PROCEDIMIENTO ALMACENADO PARA ACTUALIZAR UNA TAREA POR SU ID --
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_tarea`(IN `p_id` INT, IN `p_categoria` VARCHAR(100), IN `p_titulo` VARCHAR(100), IN `p_descripcion` VARCHAR(100), IN `p_correo` VARCHAR(100), IN `p_ubicacion` VARCHAR(100), IN `p_fecha` DATE, IN `p_repeticion` VARCHAR(100), IN `p_hora_inicio` TIME, IN `p_hora_fin` TIME)
BEGIN
UPDATE tareas SET categoria = p_categoria, titulo = p_titulo, descripcion = p_descripcion, correo = p_correo, ubicacion = p_ubicacion, fecha = p_fecha, repeticion = p_repeticion, hora_inicio = p_hora_inicio, hora_fin = p_hora_fin WHERE id = p_id;
END

-- CREAR PROCEDIMIENTO ALMACENADO PARA VISUALIZAR UNA TAREA POR SU ID --
CREATE DEFINER=`root`@`localhost` PROCEDURE `visualizar_tarea`(IN `p_id` INT)
BEGIN
SELECT * FROM tareas WHERE id = p_id;
END


-- CREAR PROCEDIMIENTO ALMACENADO PARA ACTUALIZAR UNA TAREA POR SU ID --
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_tarea`(IN `p_id` INT, IN `p_categoria` VARCHAR(100), IN `p_titulo` VARCHAR(100), IN `p_descripcion` VARCHAR(100), IN `p_correo` VARCHAR(100), IN `p_ubicacion` VARCHAR(100), IN `p_fecha` DATE, IN `p_repeticion` VARCHAR(100), IN `p_hora_inicio` TIME, IN `p_hora_fin` TIME)
BEGIN
UPDATE tareas SET categoria = p_categoria, titulo = p_titulo, descripcion = p_descripcion, correo = p_correo, ubicacion = p_ubicacion, fecha = p_fecha, repeticion = p_repeticion, hora_inicio = p_hora_inicio, hora_fin = p_hora_fin WHERE id = p_id;
END

-- CREAR PROCEDIMIENTO ALMACENADO PARA ELIMINAR UNA TAREA POR SU ID --
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_tarea`(IN `p_id` INT)
BEGIN
DELETE FROM tareas WHERE id = p_id;
END






