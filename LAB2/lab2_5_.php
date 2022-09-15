<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2.5</title>
</head>
<body>
    <?php
    $figuras = array ('cuadrado', 'triangulo', 'circulo');
    $figuras[1] = 'rectangulo';

    array_push($figuras, 'pentagono');
    mostrar_figuras($figuras, "Adicción de pentagono al final");
    array_unshift($figuras, 'hexagono');
    mostrar_figuras($figuras, "Adicción de hexagono al inicio");
    array_pop($figuras);
    mostrar_figuras($figuras, "Eliminación de pentagono al final");
    array_shift($figuras);
    mostrar_figuras($figuras, "Eliminación de hexagono al inicio");

    function mostrar_figuras ($figuras, $mensaje) {
        echo "<br> Arreglo despues de $mensaje <br>";
        foreach ($figuras as $figura) {
            echo $figura . "<br>";
        }
    }

    ?>
</body>
</html>