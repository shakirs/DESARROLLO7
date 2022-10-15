<?php
require_once('class/agenda_funciones.php');

$agenda = new Agenda();
error_reporting(0);
//refrescar la pagina para que no se repita el proceso de eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $agenda->eliminar_tarea($id);
    header("Refresh:0");
}

?>