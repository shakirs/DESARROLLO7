<?php
require_once('modelo.php');

//<!-- SHAKIRS FRANCO, ILS232, 8-911-1269 -->//
class factorial extends modeloCredencialesBD{

    protected $numero;
    //resultado array
    protected $resultado;
    //sumatoria array
    protected $sumatoria;

    public function __construct(){
        parent::__construct();
    }


    //MOSTRAR QUE NUMEROS SE SUMARON PARA OBTENER EL FACTORIAL

    // guardar factorial en base de datos
    public function guardar_factorial($numero, $resultado, $sumatoria){
        $instruccion = "CALL sp_guardar('".$numero."','".$resultado."','".$sumatoria."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al guardar el factorial";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    //consultar factorial de la base de datos - LISTO
    public function consultar_factorial(){
        $instruccion = "CALL sp_mostrar()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al consultar el factorial";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }


    //actualizar factorial de la base de datos
    public function actualizar_factorial($id, $numero, $resultado, $sumatoria){
        $instruccion = "CALL sp_actualizar_factorial('".$id."','".$numero."','".$resultado."','".$sumatoria."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al actualizar el factorial";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    //consultar registro por su id
    public function consultar_id($id){
        $instruccion = "CALL sp_consultar_id('".$id."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al consultar el factorial";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    

}

?>