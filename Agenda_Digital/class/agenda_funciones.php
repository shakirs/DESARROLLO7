<?php
//guardar los datos en la base de datos
require_once( 'modelo.php' );
//conectar a la base de datos

class Agenda extends modeloCredencialesBD {
    protected $categoria;
    protected $titulo;
    protected $descripcion;
    protected $correo;
    protected $ubicacion;
    protected $fecha;
    protected $repetir;
    protected $hora_inicio;
    protected $hora_fin;

    public function __construct() {
        parent::__construct();
    }

    public function insertar_tarea( $categoria, $titulo, $descripcion, $correo, $ubicacion, $fecha, $repetir, $hora_inicio, $hora_fin ) {

        $this->categoria = $categoria;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->correo = $correo;
        $this->ubicacion = $ubicacion;
        $this->fecha = $fecha;
        $this->repetir = $repetir;
        $this->hora_inicio = $hora_inicio;
        $this->hora_fin = $hora_fin;

        $instruccion = "CALL insertar_tarea('$this->categoria', '$this->titulo', '$this->descripcion', '$this->correo', '$this->ubicacion', '$this->fecha', '$this->repetir', '$this->hora_inicio', '$this->hora_fin')";
        $consulta = $this->_db->query( $instruccion );
        $resultado = $consulta->fetch_all( MYSQLI_ASSOC );
        if ( !$resultado ) {
            echo 'Fallo al insertar la tarea';
        } else {
            echo 'Tarea insertada correctamente';
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }

    }

    //Funcion para mostrar las tareas con la fecha actual

    public function mostrar_tareas_hoy() {
        //Obtener la fecha actual menos 1 dia
        $instruccion = "CALL mostrar_tareas_hoy2('".date( 'Y-m-d' ,strtotime("-1 day"))."')";
        $consulta = $this->_db->query( $instruccion );
        $resultado = $consulta->fetch_all( MYSQLI_ASSOC );
        if ( !$resultado ) {
            echo 'Fallo al mostrar las tareas';
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    //Funcion para mostrar las tareas

    public function mostrar_tareas() {
        $instruccion = 'CALL mostrar_tareas()';
        $consulta = $this->_db->query( $instruccion );
        $resultado = $consulta->fetch_all( MYSQLI_ASSOC );
        if ( !$resultado ) {
            echo ' FALLO AL MOSTRAR LAS TAREAS';
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    //Funcion para mostrar las tareas con filtro

    public function mostrar_tareas_filtro( $campos, $valor ) {
        $instruccion = "CALL filtrar_tareas('$campos', '$valor')";
        $consulta = $this->_db->query( $instruccion );
        $resultado = $consulta->fetch_all( MYSQLI_ASSOC );
        if ( !$resultado ) {
            echo 'Fallo al mostrar las tareas';
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    //Funcion para VISUALIZAR las tareas por id

    public function visualizar_tarea( $id ) {
        $this->id = $id;
        $instruccion = "CALL visualizar_tarea('$this->id')";
        $consulta = $this->_db->query( $instruccion );
        $resultado = $consulta->fetch_all( MYSQLI_ASSOC );
        if ( !$resultado ) {
            echo 'Fallo al visualizar la tarea';
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    //Funcion para ACTUALIZAR las tareas por id

    public function actualizar_tarea($id, $categoria, $titulo, $descripcion, $correo, $ubicacion, $fecha, $repeticion, $hora_inicio, $hora_fin) {
        $this->id = $id;
        $this->categoria = $categoria;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->correo = $correo;
        $this->ubicacion = $ubicacion;
        $this->fecha = $fecha;
        $this->repeticion = $repeticion;
        $this->hora_inicio = $hora_inicio;
        $this->hora_fin = $hora_fin;
        $instruccion = "CALL actualizar_tarea('$this->id', '$this->categoria', '$this->titulo', '$this->descripcion', '$this->correo', '$this->ubicacion', '$this->fecha', '$this->repeticion', '$this->hora_inicio', '$this->hora_fin')";
        $consulta = $this->_db->query( $instruccion );
        $resultado = $consulta->fetch_all( MYSQLI_ASSOC );
        //si hay un error capturarlo y mostrarlo
        if ( !$resultado ) {
            echo 'Fallo al actualizar la tarea';
            echo $this->_db->error;
        } else {
            echo 'Tarea actualizada correctamente';
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }

    }

    //Funcion para ELIMINAR las tareas por id

    public function eliminar_tarea( $id ) {
        $this->id = $id;
        $instruccion = "CALL eliminar_tarea('$this->id')";
        $consulta = $this->_db->query( $instruccion );
        $resultado = $consulta->fetch_all( MYSQLI_ASSOC );
        if ( !$resultado ) {
            echo 'Fallo al eliminar la tarea';
        } else {
            echo 'Tarea eliminada correctamente';
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

}
?>