<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda Digital</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <!-- colocar titulo al centro -->
    <div class="contenedor">
        <h1>Modificar Tarea</h1>
    </div>
    <br>
    <!-- Menu con opciones Agregar, Mostrar y Buscar -->
    <div class="contenedor">
        <nav class="menu">
            <ul>
                <li><a href="index.php">Agregar Tarea</a></li>
                <li><a href="tareas.php">Mostrar Tareas</a></li>
                <li><a href="mostrar_todo.php">Buscar Tarea</a></li>
            </ul>
        </nav>
    </div><br>


    <!-- tabla para mostrar las tareas -->
    <div class="contenedor">
        <table>
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Correo</th>
                    <th>Ubicacion</th>
                    <th>Fecha</th>
                    <th>Repetir</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>

</body>


<?php

require_once('class/agenda_funciones.php');
$agenda = new Agenda();
$tareas = $agenda->visualizar_tarea($_GET['id']);

foreach ($tareas as $tarea) {
    
    //input para id
    echo "<td><input type='hidden' name='id' value='" . $tarea['id'] . "'></td>";
    echo "<tr>";
    //input para la categoria
    echo "<td><input type='text' name='categoria' value='" . $tarea['categoria'] . "'></td>";
    //input para el titulo
    echo "<td><input type='text' name='titulo' value='" . $tarea['titulo'] . "'></td>";
    //input para la descripcion
    echo "<td><input type='text' name='descripcion' value='" . $tarea['descripcion'] . "'></td>";
    //input para el correo
    echo "<td><input type='text' name='correo' value='" . $tarea['correo'] . "'></td>";
    //input para la ubicacion
    echo "<td><input type='text' name='ubicacion' value='" . $tarea['ubicacion'] . "'></td>";
    //input para la fecha
    echo "<td><input type='text' name='fecha' value='" . $tarea['fecha'] . "'></td>";
    //input para la repetir
    echo "<td><input type='text' name='repetir' value='" . $tarea['repeticion'] . "'></td>";
    //input para la hora inicio
    echo "<td><input type='text' name='hora_inicio' value='" . $tarea['hora_inicio'] . "'></td>";
    //input para la hora fin
    echo "<td><input type='text' name='hora_fin' value='" . $tarea['hora_fin'] . "'></td>";

    echo "<td><a href='actualizar.php?id=" . $tarea['id'] . "'>Actualizar</a></td>";
    echo "</tr>";
}




?>

</html>