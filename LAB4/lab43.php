<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4.3</title>
</head>

<body>
    <!-- creacion de aun arreglo y mostrar el mayor valor y donde se ubica -->
    <form action="lab43.php" method="post">
        <label for="numero">Ingrese un número: </label>
        <input type="number" name="numero" id="numero" required>
        <input type="submit" value="Calcular">
    </form>
    
    <?php 
        if (isset($_POST['numero'])) {
            $numero = $_POST['numero'];
            $arreglo = array();
            $mayor = 0;
            $posicion = 0;
            for ($i = 0; $i < $numero; $i++) {
                $arreglo[$i] = rand(1, 1000);
                if ($arreglo[$i] > $mayor) {
                    $mayor = $arreglo[$i];
                    $posicion = $i;
                }
            }
            echo "<p>El arreglo es: </p>";
            echo "<p>";
            for ($i = 0; $i < $numero; $i++) {
                echo "$arreglo[$i], ";
            }
            echo "</p>";
            echo "<p>El mayor valor es $mayor y se encuentra en la posición $posicion</p>";
        }
    ?>


</body>
</html>