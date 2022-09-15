<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2.10</title>
</head>
<body>
    <?php
    
    $persona = array(
        array (
        "nombre" => "Juan",
        "estatura" => "168",
        "sexo" => "F"),
    array(
        "nombre" => "Pedro",
        "estatura" => "178",
        "sexo" => "M"),
    array(
        "nombre" => "Maria",
        "estatura" => "158",
        "sexo" => "F"),
    array(
        "nombre" => "Jose",
        "estatura" => "188",
        "sexo" => "M"),
    );
    
        echo "<br> DATOS SOBRE EL PERSONAL <br> <br> <hr>";

        $numpersonas = count($persona);

        for ($i = 0; $i < $numpersonas; $i++) {
            echo "Nombre: " . $persona[$i]["nombre"] . "<br>";
            echo "Estatura: " . $persona[$i]["estatura"] . "<br>";
            echo "Sexo: " . $persona[$i]["sexo"] . "<br>";
            echo "<hr>";
        }

    
    ?>
</body>
</html>