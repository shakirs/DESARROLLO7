<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda Digital</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
<h1>Filtro de tareas</h1>
<img src="css/AB.gif" alt="logo" class="logo">
<div class="contenedor">
        <nav class="menu">
            
            <ul>
                <li><a href="index.php">Agregar Tarea</a></li>
                <li><a href="tareas.php">Mostrar Tareas</a></li>
                <li><a href="mostrar_todo.php">Buscar Tarea</a></li>
            </ul>
        </nav>
    </div>
    <br><br><br>
    <div class="container" id="caja">
    <h2>Para el filtro de fecha utilizar el formato 2022-10-07</h2>
    <Form name="Formfiltro" method="post" action="mostrar_todo.php">
        <br/>
        Filtrar Por: 
        <SELECT name="campos">
            <OPTION value="categoria">Categoria
            <OPTION value="titulo">Titulo
            <OPTION value="descripcion" SELECTED>Descripcion
            <OPTION value="ubicacion">Ubicacion
            <OPTION value="fecha">Fecha
            <OPTION value="repeticion">Repeticion
                
            </OPTION>
        </SELECT>
       con el valor
        <input type="text" name="valor">
        <input name="ConsultarFiltro" value="Filtrar Datos" type="submit"/>
        <input name="ConsultarTodos" value="Ver Todos" type="submit"/>
    </Form>
    </div>
    <?php

    require_once('class/agenda_funciones.php');
    $obj_agenda = new Agenda();
    $agenda = $obj_agenda->mostrar_tareas();
    error_reporting(0);

    if(array_key_exists('ConsultarTodos', $_POST)){
        $obj_agenda = new Agenda();
        $agenda = $obj_agenda->mostrar_tareas();
    }

    if(array_key_exists('ConsultarFiltro', $_POST)){
        $obj_agenda = new Agenda();
        $agenda = $obj_agenda->mostrar_tareas_filtro($_REQUEST['campos'], $_REQUEST['valor']);
    }

    $nfilas=count($agenda);
    // si hay tareas mostrar mensaje
    if ($nfilas>0) {
        echo "<div class='contenedor'>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Categoria</th>";
        echo "<th>Titulo</th>";
        echo "<th>Descripcion</th>";
        echo "<th>Correo</th>";
        echo "<th>Ubicacion</th>";
        echo "<th>Fecha</th>";
        echo "<th>Repetir</th>";
        echo "<th>Hora inicio</th>";
        echo "<th>Hora fin</th>";
        echo "<th>Acciones</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($agenda as $tarea) {
            echo "<tr>";
            echo "<td>" . $tarea['categoria'] . "</td>";
            echo "<td>" . $tarea['titulo'] . "</td>";
            echo "<td>" . $tarea['descripcion'] . "</td>";
            echo "<td>" . $tarea['correo'] . "</td>";
            echo "<td>" . $tarea['ubicacion'] . "</td>";
            echo "<td>" . $tarea['fecha'] . "</td>";
            echo "<td>" . $tarea['repeticion'] . "</td>";
            echo "<td>" . $tarea['hora_inicio'] . "</td>";
            echo "<td>" . $tarea['hora_fin'] . "</td>";
            echo "<td>";
            echo "<a href='editar.php?id=" . $tarea['id'] . "'>Editar</a>";
            echo " | ";
            echo "<a href='mostrar_todo.php?id=" . $tarea['id'] . "'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='contenedor'>";
        echo "<h2>No hay tareas</h2>";
        echo "</div>";
    }

    //Eliminar tarea
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $obj_agenda = new Agenda();
        $obj_agenda->eliminar_tarea($id);
    }



    ?>

    
</body>
</html>