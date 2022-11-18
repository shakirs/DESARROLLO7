<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda Digital</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <!-- Cabecera -->
    <header>
        <div class="contenedor">
            <h1>Agenda Digital</h1>
        </div>
    </header>

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
    
    <!-- Contenedor -->

    <div class="contenedor">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria ">
                    <option value="Trabajo">Trabajo</option>
                    <option value="Personal">Personal</option>
                    <option value="Estudio">Estudio</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo de la tarea" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion" placeholder="Descripcion de la tarea" required></textarea>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" id="correo" placeholder="Correo de la tarea">
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicacion</label>
                <input type="text" name="ubicacion" id="ubicacion" placeholder="Ubicacion de la tarea" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" required>
            </div>
            <div class="form-group">
                <label for="repetir">Repetir</label>
                <select name="repetir" id="repetir">
                    <option value="No repetir">No repetir</option>
                    <option value="Diario">Diario</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Mensual">Mensual</option>
                    <option value="Anual">Anual</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de inicio</label>
                <input type="time" name="hora_inicio" id="hora_inicio" required>
            </div>
            <div class="form-group">
                <label for="hora_fin">Hora de fin</label>
                <input type="time" name="hora_fin" id="hora_fin" required>
            </div>
            
            <input type="submit" value="Insertar Tarea" name="insertar">
        </form>
    </div>
    <?php
 require_once('class/agenda_funciones.php');
 error_reporting(0);
 $agenda = new Agenda();

 if(isset($_POST['insertar'])){
     $categoria = $_POST['categoria'];
     $titulo = $_POST['titulo'];
     $descripcion = $_POST['descripcion'];
     $correo = $_POST['correo'];
     $ubicacion = $_POST['ubicacion'];
     $fecha = $_POST['fecha'];
     $repetir = $_POST['repetir'];
     $hora_inicio = $_POST['hora_inicio'];
     $hora_fin = $_POST['hora_fin'];

     $resultado = $agenda->insertar_tarea($categoria, $titulo, $descripcion, $correo, $ubicacion, $fecha, $repetir, $hora_inicio, $hora_fin);
     if($resultado){
         echo "Tarea insertada correctamente";
     }else{
         echo "Error al insertar la tarea";
     }
 }
     

?>
    

</body>
</html>