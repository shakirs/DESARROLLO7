<?php

    class tareas {
        private $conn;
        private $nombre_tabla = 'tareas';
        public $id;
        public $categoria;
        public $titulo;
        public $descripcion;
        public $correo;
        public $ubicacion;
        public $fecha;
        public $repetir;
        public $hora_inicio;
        public $hora_fin;

        public function __construct( $db ) {
            $this->conn = $db;
        }

        function insertar_tarea ($categoria, $titulo, $descripcion, $correo, $ubicacion, $fecha, $repetir, $hora_inicio, $hora_fin) {
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
            $consulta = $this->conn->query($instruccion);
            if($consulta==0){
                echo "Fallo al insertar la tarea <hr>";
            }else{
                echo "Tarea insertada correctamente";
                $this->conn->close();
            }
        }

        function obtener_tareas () {
            $query = "CALL mostrar_tareas()";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
            }

    }

?>