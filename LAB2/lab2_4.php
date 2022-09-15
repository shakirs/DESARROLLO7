<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2.4</title>
</head>
<body>
    <?php
    //creacion del arreglo array (clave => valor)
    $personas = array(
        "Juan" => "Panama",
        "Pedro" => "USA",
        "Maria" => "Colombia",
        "Jose" => "Mexico");
    // recorrido del arreglo
    foreach ($personas as $nombre => $pais) {
        echo "Nombre: " . $nombre . " Pais: " . $pais . "<br>";
    }

    // impresion especifica de un valor
    echo "<br>La nacionalidad de Pedro es: " . $personas["Pedro"];
    echo "<br>La nacionalidad de Maria es: " . $personas["Maria"];

    ?>
</body>
</html>