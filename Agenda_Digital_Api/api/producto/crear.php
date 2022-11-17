<?php
//Encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//Incluimos la base de datos y los objetos
include_once '../configuracion/conexion.php';
include_once '../objetos/tareas.php';

//Instanciamos la base de datos
$database = new Conexion();
$db = $database->obtenerConexion();

//Instanciamos el objeto tarea
$tarea = new tareas($db);

//Obtenemos los datos enviados
$data = json_decode(file_get_contents("php://input"));

//vemos si los datos no estan vacios

if(!empty($data->categoria) && !empty($data->titulo) && !empty($data->descripcion) && !empty($data->ubicacion) && !empty($data->fecha)){
    //Asignamos los valores a los atributos del objeto
    $tarea->categoria = $data->categoria;
    $tarea->titulo = $data->titulo;
    $tarea->descripcion = $data->descripcion;
    $tarea->correo = $data->correo;
    $tarea->ubicacion = $data->ubicacion;
    $tarea->fecha = $data->fecha;

    //Creamos la tarea
    if($tarea->insertar_tarea($categoria, $titulo, $descripcion, $correo, $ubicacion, $fecha, $repetir, $hora_inicio, $hora_fin)){
        //Código de respuesta
        http_response_code(201);

        //Mensaje de respuesta
        echo json_encode(array("mensaje" => "Tarea creada correctamente"));
    }else{
        //Código de respuesta
        http_response_code(503);

        //Mensaje de respuesta
        echo json_encode(array("mensaje" => "No se pudo crear la tarea"));
    }
}else{
    //Código de respuesta
    http_response_code(400);

    //Mensaje de respuesta
    echo json_encode(array("mensaje" => "No se pudo crear la tarea. Datos incompletos"));
}


?>