<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Matriz</title>
</head>
<body>
<!-- Generar una matriz de tipo equis en una tabla, la diagonal e inversa contendran valores aleatorios entre 1 y 100, y 
los demas con 0, y la matriz debe ser NxN donde N es impar-->
<form action="Matriz.php" method="post">
    <label for="n">Ingrese el tamaño de la matriz</label>
    <input type="number" name="n" id="n">
    <input type="submit" value="Generar">
</form>
    <?php
    $suma = 0;
    if (isset($_POST['n'])) {
        $n = $_POST['n'];
        if ($n % 2 != 0) {
            $matriz = array();
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    if ($i == $j || $i + $j == $n - 1) {
                        $matriz[$i][$j] = rand(1, 100);
                    } else {
                        $matriz[$i][$j] = 0;
                    }
                }
            }
            echo "<table border='1'>";
            for ($i = 0; $i < $n; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $n; $j++) {
                    echo "<td>" . $matriz[$i][$j] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "El numero debe ser impar";
        }
        //Sumar los valores de la diagonal principal 
        $suma = 0;
        for ($i = 0; $i < $n; $i++) {
            $suma += $matriz[$i][$i];
        }
        echo "La suma de la diagonal principal es: " . $suma;
        //Sumar los valores de la diagonal inversa
        $suma = 0;
        for ($i = 0; $i < $n; $i++) {
            $suma += $matriz[$i][$n - 1 - $i];
        }
        echo "<br>La suma de la diagonal inversa es: " . $suma;
    }
    ?>
</body>
</html>