<?
//Api para eliminar tareas
//encabezado requerido
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//incluimos el archivo de la base de datos y los objetos
include_once '../configuracion/conexion.php';
include_once '../objetos/tareas.php';

//obtenemos la conexion a la base de datos
$conexion = new Conexion();
$db = $conexion->obtenerConexion();

//instanciamos el objeto tareas
$tarea = new tareas($db);

//obtenemos los datos del producto a eliminar
$data = json_decode(file_get_contents("php://input"));

//verificamos que los datos no esten vacios

if(
!empty($data->id)
){

    //asignamos los valores a los atributos del objeto
    $tarea->id = $data->id;

    //eliminamos el producto
    if($tarea->eliminar()){
        //codigo de respuesta
        http_response_code(200);
        //mensaje de respuesta
        echo json_encode(array("mensaje" => "Tarea eliminada"));
    }else{
        //codigo de respuesta
        http_response_code(503);
        //mensaje de respuesta
        echo json_encode(array("mensaje" => "No se pudo eliminar la tarea"));
    }
}else{
    //codigo de respuesta
    http_response_code(400);
    //mensaje de respuesta
    echo json_encode(array("mensaje" => "No se pudo eliminar la tarea. Datos incompletos"));
}



?>