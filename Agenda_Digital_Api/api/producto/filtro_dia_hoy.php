<?php

//encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// incluir archivos de conexion y objetos
include_once '../configuracion/conexion.php';
include_once '../objetos/tareas.php';

//Filtrar tareas por campo, valor
//Api para leer tareas

//instanciamos la base de datos
$database = new Conexion();
$db = $database->obtenerConexion();

//instanciamos el objeto tarea
$tarea = new tareas($db);

$data = json_decode(file_get_contents("php://input"));

//filtrar por fecha actual del sistema

$fecha = date("Y-m-d");

$stmt = $tarea->mostrar_tareas_hoy();

$num = $stmt->rowCount();

//verificamos si hay tareas
if($num>0){
    //arreglo de tareas
    $tareas_arr = array();
    $tareas_arr["tareas"] = array();

    //obtenemos los datos de las tareas
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $tarea_item = array(
            "id" => $id,
            "categoria" => $categoria,
            "titulo" => $titulo,
            "descripcion" => $descripcion,
            "correo" => $correo,
            "ubicacion" => $ubicacion,
            "fecha" => $fecha,
            "repeticion" => $repeticion,
            "hora_inicio" => $hora_inicio,
            "hora_fin" => $hora_fin
        );

        array_push($tareas_arr["tareas"], $tarea_item);
    }

    //Código de respuesta
    http_response_code(200);

    //Mostramos los datos en formato json
    echo json_encode($tareas_arr);
}else{
    //Código de respuesta
    http_response_code(404);

    //Mostramos los datos en formato json
    echo json_encode(
        array("mensaje" => "No se encontraron tareas")
    );
}




?>