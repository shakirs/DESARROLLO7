<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1.6</title>
</head>
<body>
    <?php
    //mostrar una tabla de 4 por 4 que muestre las primeras 4 potencias de los números del uno 1 al 4 (hacer una función que las calcule invocando la función pow).

    define("TAM", 4);
    function potencia($base, $exponente) {
    
        return pow($base, $exponente);
    }

    echo "<table border='1'>";
    for ($i = 1; $i <= TAM; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= TAM; $j++) {
            echo "<td>" . potencia($i, $j) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>