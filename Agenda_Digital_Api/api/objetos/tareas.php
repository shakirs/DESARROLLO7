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
        public $repeticion;
        public $hora_inicio;
        public $hora_fin;

        public function __construct( $db ) {
            $this->conn = $db;
        }

        function insertar_tarea (){
            $query = "CALL insertar_tarea(?,?,?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->categoria);
            $stmt->bindParam(2, $this->titulo);
            $stmt->bindParam(3, $this->descripcion);
            $stmt->bindParam(4, $this->correo);
            $stmt->bindParam(5, $this->ubicacion);
            $stmt->bindParam(6, $this->fecha);
            $stmt->bindParam(7, $this->repeticion);
            $stmt->bindParam(8, $this->hora_inicio);
            $stmt->bindParam(9, $this->hora_fin);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        function obtener_tareas () {
            $query = "CALL mostrar_tareas()";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
            }
            
        function readOne(){
            $query = "CALL mostrar_tareas_hoy2('".date('Y-m-d')."')";
            $stmt = $this->conn->prepare($query);
            //por fecha del dia
            $stmt->bindParam(1, $this->fecha);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->categoria = $row['categoria'];
            $this->titulo = $row['titulo'];
            $this->descripcion = $row['descripcion'];
            $this->correo = $row['correo'];
            $this->ubicacion = $row['ubicacion'];
            $this->fecha = $row['fecha'];
            $this->repeticion = $row['repeticion'];
            $this->hora_inicio = $row['hora_inicio'];
            $this->hora_fin = $row['hora_fin'];

        }

        //actualizar tarea
        function actualizar_tarea(){
            $query = "CALL actualizar_tarea(?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->bindParam(2, $this->categoria);
            $stmt->bindParam(3, $this->titulo);
            $stmt->bindParam(4, $this->descripcion);
            $stmt->bindParam(5, $this->correo);
            $stmt->bindParam(6, $this->ubicacion);
            $stmt->bindParam(7, $this->fecha);
            $stmt->bindParam(8, $this->repeticion);
            $stmt->bindParam(9, $this->hora_inicio);
            $stmt->bindParam(10, $this->hora_fin);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        function eliminar() {
            // query para eliminar
            $query = "CALL eliminar_tarea(?)";
            // sentencia para preparar query
            $stmt = $this->conn->prepare( $query );
            // limpiar
            $this->id = htmlspecialchars( strip_tags( $this->id ) );
            // vincular id del producto a eliminar
            $stmt->bindParam( 1, $this->id );
            // ejecutar query
            if ( $stmt->execute() ) {
                return true;
            }
            return false;
        }
    
    }


?>