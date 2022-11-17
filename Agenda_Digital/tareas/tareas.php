<?php
class tareas{
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
    public function __construct($db){
        $this->conn = $db;
    }

    function insertar(){
        $query = "INSERT INTO " . $this->nombre_tabla . " SET categoria=:categoria, titulo=:titulo, descripcion=:descripcion, correo=:correo, ubicacion=:ubicacion, fecha=:fecha, repetir=:repetir, hora_inicio=:hora_inicio, hora_fin=:hora_fin";
        $stmt = $this->conn->prepare($query);
        $this->categoria=htmlspecialchars(strip_tags($this->categoria));
        $this->titulo=htmlspecialchars(strip_tags($this->titulo));
        $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
        $this->correo=htmlspecialchars(strip_tags($this->correo));
        $this->ubicacion=htmlspecialchars(strip_tags($this->ubicacion));
        $this->fecha=htmlspecialchars(strip_tags($this->fecha));
        $this->repetir=htmlspecialchars(strip_tags($this->repetir));
        $this->hora_inicio=htmlspecialchars(strip_tags($this->hora_inicio));
        $this->hora_fin=htmlspecialchars(strip_tags($this->hora_fin));
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":repetir", $this->repetir);
        $stmt->bindParam(":hora_inicio", $this->hora_inicio);
        $stmt->bindParam(":hora_fin", $this->hora_fin);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function leer(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " ORDER BY fecha DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function leerUno(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->categoria = $row['categoria'];
        $this->titulo = $row['titulo'];
        $this->descripcion = $row['descripcion'];
        $this->correo = $row['correo'];
        $this->ubicacion = $row['ubicacion'];
        $this->fecha = $row['fecha'];
        $this->repetir = $row['repetir'];
        $this->hora_inicio = $row['hora_inicio'];
        $this->hora_fin = $row['hora_fin'];
    }

    function actualizar(){
        $query = "UPDATE " . $this->nombre_tabla . " SET categoria=:categoria, titulo=:titulo, descripcion=:descripcion, correo=:correo, ubicacion=:ubicacion, fecha=:fecha, repetir=:repetir, hora_inicio=:hora_inicio, hora_fin=:hora_fin WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->categoria=htmlspecialchars(strip_tags($this->categoria));
        $this->titulo=htmlspecialchars(strip_tags($this->titulo));
        $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
        $this->correo=htmlspecialchars(strip_tags($this->correo));
        $this->ubicacion=htmlspecialchars(strip_tags($this->ubicacion));
        $this->fecha=htmlspecialchars(strip_tags($this->fecha));
        $this->repetir=htmlspecialchars(strip_tags($this->repetir));
        $this->hora_inicio=htmlspecialchars(strip_tags($this->hora_inicio));
        $this->hora_fin=htmlspecialchars(strip_tags($this->hora_fin));
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":ubicacion", $this->ubicacion);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":repetir", $this->repetir);
        $stmt->bindParam(":hora_inicio", $this->hora_inicio);
        $stmt->bindParam(":hora_fin", $this->hora_fin);
        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


    function borrar(){
        $query = "DELETE FROM " . $this->nombre_tabla . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function buscar($keywords){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE titulo LIKE ? OR descripcion LIKE ? OR ubicacion LIKE ? ORDER BY fecha DESC";
        $stmt = $this->conn->prepare($query);
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
        $stmt->execute();
        return $stmt;
    }

    function leerCategoria(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE categoria = ? ORDER BY fecha DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->categoria);
        $stmt->execute();
        return $stmt;
    }

    function leerFecha(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE fecha = ? ORDER BY fecha DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->fecha);
        $stmt->execute();
        return $stmt;
    }

    function leerFechaCategoria(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE fecha = ? AND categoria = ? ORDER BY fecha DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->fecha);
        $stmt->bindParam(2, $this->categoria);
        $stmt->execute();
        return $stmt;
    }

    function leerFechaCategoriaRepetir(){
        $query = "SELECT * FROM " . $this->nombre_tabla . " WHERE fecha = ? AND categoria = ? AND repetir = ? ORDER BY fecha DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->fecha);
        $stmt->bindParam(2, $this->categoria);
        $stmt->bindParam(3, $this->repetir);
        $stmt->execute();
        return $stmt;
    }
    
}


?>