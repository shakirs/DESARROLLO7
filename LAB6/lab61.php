<?php
    class cliente{
        var $nombre;
        var $nuemro;
        var $peliculas_alquiladas;

        function __construct($nombre, $numero){
            $this->nombre = $nombre;
            $this->numero = $numero;
            $this->peliculas_alquiladas = array();
        }

        function __destruct()
        {
            echo "<br> destruido: ".$this->nombre;
        }

        function dame_numero(){
            return $this->numero;
        }

    }
    
        // instanciamos un par de objetps de la clase cliente
        $cliente1 = new cliente("Juan", 1);
        $cliente2 = new cliente("Pedro", 2);

        // mostramos el numero de cliente de cada objeto
        echo $cliente1->dame_numero();
        echo $cliente2->dame_numero();
        

?>