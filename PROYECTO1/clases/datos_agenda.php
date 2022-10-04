<?php
// guardar datos de tareas


class insertar_tarea
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli("localhost", "root", "", "proyecto1");
        if ($this->conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
        }
    }

    public function insertar_tarea($titulo, $descripcion, $fecha)
    {
        $sql = "INSERT INTO tareas (titulo, descripcion, fecha) VALUES ('$titulo', '$descripcion', '$fecha')";
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            echo "Tarea añadida correctamente";
        } else {
            echo "Error al añadir la tarea";
        }
    }
}

// eliminar datos de tareas pero mostrar los cambios en la tabla de tareas de la pagina index.php

class eliminar_tarea
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli("localhost", "root", "", "proyecto1");
        if ($this->conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
        }
    }

    public function eliminar_tarea($titulo)
    {
        $sql = "DELETE FROM tareas WHERE titulo = '$titulo'";
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            //Mensaje de tarea eliminada correctamente y mostrar la tabla de tareas
            echo "Tarea eliminada correctamente";
        } else {
            echo "Error al eliminar la tarea";
        }
}
    
}

//modificar tarea y mostrar datos de la tarea a modificar en el formulario

class modificar_tarea
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli("localhost", "root", "", "proyecto1");
        if ($this->conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
        }
    }


    public function modificar_tarea($titulo)
    {
        $sql = "SELECT * FROM tareas WHERE titulo = '$titulo'";
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            echo "<form action='index.php' method='post'>";
            echo "<input type='text' name='titulo' value='" . $fila['titulo'] . "'>";
            echo "<input type='text' name='descripcion' value='" . $fila['descripcion'] . "'>";
            echo "<input type='date' name='fecha' value='" . $fila['fecha'] . "'>";
            echo "<input type='submit' name='modificar' value='Modificar'>";
            echo "</form>";
        } else {
            echo "Error al mostrar la tarea";
        }
    }
}

class mostrar_tareas
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli("localhost", "root", "", "proyecto1");
        if ($this->conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
        }
    }

    public function mostrar_tareas()
    {
        $sql = "SELECT * FROM tareas";
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>" . $fila['titulo'] . "</td>";
                echo "<td>" . $fila['descripcion'] . "</td>";
                echo "<td>" . $fila['fecha'] . "</td>";
                //Boton para eliminar tarea
                echo "<td><form action='index.php' method='post'><input type='hidden' name='titulo' value='" . $fila['titulo'] . "'><input type='submit' name='eliminar' value='Eliminar'></form></td>";
               echo "</tr>";
            }
        } else {
            echo "Error al mostrar las tareas";
        }
    }
}

?>