<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4.2</title>
</head>
<body>
    <!-- Serie fibonacci -->
    <h1>Serie Fibonacci</h1>

    <form action="lab42.php" method="post">
        <label for="numero">Ingrese un número: </label>
        <input type="number" name="numero" id="numero" required>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if (isset($_POST['numero'])) {
            $numero = $_POST['numero'];
            $a = 0;
            $b = 1;
            $c = 0;
            echo "<p>La serie Fibonacci de $numero es: </p>";
            echo "<p>$a, $b, ";
            for ($i = 0; $i < $numero - 2; $i++) {
                $c = $a + $b;
                $a = $b;
                $b = $c;
                echo "$c, ";
            }
            echo "</p>";
        }
    ?>


</body>
</html>
</html>