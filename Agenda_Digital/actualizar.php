<?php
//Obtener id de la tarea desde editar.php
$id = $_GET['id'];
$categoria = $_POST['categoria'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$correo = $_POST['correo'];
$ubicacion = $_POST['ubicacion'];
$fecha = $_POST['fecha'];
$repetir = $_POST['repetir'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];
//Incluir la clase de base de datos
require_once('class/agenda_funciones.php');
//Instanciar la clase de base de datos
$agenda = new Agenda();
//Ejecutar el método para actualizar
$agenda->actualizar_tarea($id, $categoria, $titulo, $descripcion, $correo, $ubicacion, $fecha, $repetir, $hora_inicio, $hora_fin);
//Redireccionar a la página principal
header('Location: index.php');
?>