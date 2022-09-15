<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2.7</title>
</head>
<body>
    <?php
    $posicion = "arriba";

    switch ($posicion) {
        case "arriba":
            echo "La variable contine";
            echo "el valor de arriba";
            break;
        case "abajo":
            echo "La variable contine";
            echo "el valor de abajo";
            break;
        default:
            echo "La variable no contiene";
            echo "el valor de arriba ni de abajo";
    }
    ?>
</body>
</html>