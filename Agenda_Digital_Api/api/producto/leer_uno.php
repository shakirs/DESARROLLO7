<?php
// encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
// incluir archivos de conexion y objetos
include_once '../configuracion/conexion.php';
include_once '../objetos/tareas.php';
// obtener conexion a la base de datos
$conex = new Conexion();
$db = $conex->obtenerConexion();
// preparar el objeto tareao
$tarea = new tareas($db);
// set ID property of record to read
$tarea->id = isset($_GET['id']) ? $_GET['id'] : die();
// leer los detalles del tarea a editar


$tarea->readOne();
if($tarea->nombre!=null){
 // creacion del arreglo
 $tarea_arr = array(
 "id" => $tarea->id,
 "categoria" => $tarea->categoria,
    "titulo" => $tarea->titulo,
    "descripcion" => $tarea->descripcion,
    "correo" => $tarea->correo,
    "ubicacion" => $tarea->ubicacion,
    "fecha" => $tarea->fecha,
    "repeticion" => $tarea->repeticion,
    "hora_inicio" => $tarea->hora_inicio,
    "hora_fin" => $tarea->hora_fin
 );
 // asignar codigo de respuesta - 200 OK
 http_response_code(200);
 // mostrarlo en formato json
 echo json_encode($tarea_arr);
}
?>