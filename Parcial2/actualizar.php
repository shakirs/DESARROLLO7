<?php

require_once('class/factorial.php');

//Obtener id de la tarea desde la url con GET
$id = $_POST['id'];
$numero2 = $_POST['numero'];
$fact = $_POST['factorial'];
$sumatoria2 = $_POST['sumatoria'];

//Instanciar la clase tarea
$factorial = new factorial();

//recalcular el factorial y la sumatoria
$resultado2 = 1;
$sumatoria_factorial = 0;
for($i = 1; $i <= $numero2; $i++){
    $sumatoria_factorial = $sumatoria_factorial + (($i*$i)/$resultado2);
}

for($i = 1; $i <= $numero2; $i++){
    $resultado2 = $resultado2 * $i;
    $numeros[] = $i;
}

//guardar el resultado de la sumatoria en una variable
$sumatoria2 = $sumatoria_factorial;


//Actualizar la tarea
$factorial->actualizar_factorial($id, $numero2, $resultado2, $sumatoria2);

//Redireccionar a la pagina principal
header('Location: index.php');



?>