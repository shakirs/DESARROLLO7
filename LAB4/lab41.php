
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1.2</title>
</head>
<body>

    <form action="lab41.php" method="GET">
        <label for="num1">Ingrese su nivel de satisfaccion del 1 al 10</label>
        <input type="number" name="num1" id="num1">
        <input type="submit" value="Enviar">
    </form>

    <!-- Mostrar una imagen según el nivel de satisfacción -->

    <?php
        $num1 = $_GET['num1'];
        if ($num1 >= 80) {
            echo "<p>Excelente</p>";
            echo "<img src='img/good.png'>";
        } elseif ($num1 >= 50 && $num1 <= 79) {
            echo "<p>Medio</p>";
            echo "<img src='img/medium.png'>";
        } elseif ($num1 < 50 && $num1 > 0) {
            echo "<p>Malo</p>";
            echo "<img src='img/bad.png'>";
        }
    ?>
</body>
</html>
</html>