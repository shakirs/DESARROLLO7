<?php
//Obtener id de la tarea desde editar.php
$id = $_GET[ 'id' ];
$categoria = $_GET[ 'categoria' ];
$titulo = $_GET[ 'titulo' ];
$descripcion = $_GET[ 'descripcion' ];
$correo = $_GET[ 'correo' ];
$ubicacion = $_GET[ 'ubicacion' ];
$fecha = $_GET[ 'fecha' ];
$repeticion = $_GET[ 'repeticion' ];
$hora_inicio = $_GET[ 'hora_inicio' ];
$hora_fin = $_GET[ 'hora_fin' ];
//Incluir la clase de base de datos
require_once 'class/agenda_funciones.php';
//Instanciar la clase de base de datos
$agenda = new Agenda();
//Ejecutar el método para actualizar
$agenda->actualizar_tarea( $id, $categoria, $titulo, $descripcion, $correo, $ubicacion, $fecha, $repeticion, $hora_inicio, $hora_fin );
//Hacer refresh a la página tareas.php
header( 'Location: tareas.php' );
