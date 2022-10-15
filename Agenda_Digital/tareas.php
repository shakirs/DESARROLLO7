<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda Digital</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <!-- Mostrar cabezera con la fecha actual -->
    <header>
        <div class="contenedor">
            <h1>Tareas para</h1>
            <!-- Mostrar fecha actual menos 1 dia -->
            <h2><?php echo date("d-m-Y", strtotime("-1 day")); ?></h2>
        </div>

        <div class="contenedor">
        <nav class="menu">
            <ul>
                <li><a href="index.php">Agregar Tarea</a></li>
                <li><a href="tareas.php">Mostrar Tareas</a></li>
                <li><a href="mostrar_todo.php">Buscar Tarea</a></li>
            </ul>
        </nav>
    </div><br><br><br>
        </div>

    </header>

    <!-- tabla para mostrar las tareas -->
    <div class="contenedor">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
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

            
    
    <?php
    require_once ('class/agenda_funciones.php');
    error_reporting(0);
    // Mostrar taraeas para la fecha actual
    $agenda = new Agenda();
    //fedha actual del sistema menos 1 dia
    $fecha = date("d-m-Y", strtotime("-1 day"));
    $tareas = $agenda->mostrar_tareas_hoy($fecha);
    //si no hay tareas para la fecha actual entonces mostrar mensaje
    if (empty($tareas)) {
        echo "<tr><td colspan='11'>No hay tareas para hoy</td></tr>";
    } else {
        //si hay tareas para la fecha actual entonces mostrarlas
        foreach ($tareas as $tarea) {
            echo "<tr>";
            echo "<td>" . $tarea['id'] . "</td>";
            echo "<td>" . $tarea['categoria'] . "</td>";
            echo "<td>" . $tarea['titulo'] . "</td>";
            echo "<td>" . $tarea['descripcion'] . "</td>";
            echo "<td>" . $tarea['correo'] . "</td>";
            echo "<td>" . $tarea['ubicacion'] . "</td>";
            echo "<td>" . $tarea['fecha'] . "</td>";
            echo "<td>" . $tarea['repeticion'] . "</td>";
            echo "<td>" . $tarea['hora_inicio'] . "</td>";
            echo "<td>" . $tarea['hora_fin'] . "</td>";
            echo "<td><a href='editar.php?id=" . $tarea['id'] . "&categoria=" . $tarea['categoria'] . "&titulo=" . $tarea['titulo'] . "&descripcion=" . $tarea['descripcion'] . "&correo=" . $tarea['correo'] . "&ubicacion=" . $tarea['ubicacion'] . "&fecha=" . $tarea['fecha'] . "&repeticion=" . $tarea['repeticion'] . "&hora_inicio=" . $tarea['hora_inicio'] . "&hora_fin=" . $tarea['hora_fin'] . "'> Editar </a> | <a href='tareas.php?id=" . $tarea['id'] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
    }

    ?>

</body>
</html>