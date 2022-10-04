<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Proyecto 1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Proyecto 1</h1>
    <p>Este es el proyecto 1</p>
    
<!-- Agenda de tareas con php, mysql y html-->

<!-- Formulario para añadir tareas con titulo, descripcion, fecha-->
    <form action="index.php" method="post">
        <input type="text" name="titulo" placeholder="Titulo">
        <input type="text" name="descripcion" placeholder="Descripcion">
        <input type="date" name="fecha">
        <input type="submit" name="enviar" value="Enviar">
    </form>

<!-- Formulario para eliminar tareas con titulo-->
    <form action="index.php" method="post">
        <input type="text" name="titulo" placeholder="Titulo">
        <input type="submit" name="eliminar" value="Eliminar">
    </form>

    <!-- boton para mostrar todas las tareas-->
    <form action="index.php" method="post">
        <input type="submit" name="mostrar" value="Mostrar">
    </form>

    <!-- Tabla para mostrar las tareas-->
    <table>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Eliminar</th>
        </tr>
        <?php
        include "clases/datos_agenda.php";
        //validar los datos del formulario no esten vacios
        if (isset($_POST['enviar'])) {
            if (!empty($_POST['titulo']) && !empty($_POST['descripcion']) && !empty($_POST['fecha'])) {
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $fecha = $_POST['fecha'];
                $datos = new insertar_tarea();
                $datos->insertar_tarea($titulo, $descripcion, $fecha);
            } else {
                echo "Los campos no pueden estar vacios";
            }
        }

        $tarea = new eliminar_tarea();

        //Que al darle al boton de eliminar se elimine la tarea y se muestre la tabla de tareas
        if (isset($_POST['eliminar'])) {
            $titulo = $_POST['titulo'];
            $tarea->eliminar_tarea($titulo);
        }
        $tarea = new mostrar_tareas();
        if (isset($_POST['mostrar'])) {
            $tarea->mostrar_tareas();
        }
        

?>

</body>
</html>
