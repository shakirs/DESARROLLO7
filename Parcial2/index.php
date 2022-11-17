<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sumatoria</title>
</head>
<body>
    <!-- Factorial -->
    <form action="index.php" method="post">
        <label for="numero">Ingrese un numero para calcular el factorial</label>
        <input type="number" name="numero" id="numero">
        <input type="submit" value="Calcular">
        <input type="submit" name="consultar" value="Consultar">
    </form>

    <?php

    include_once('class/factorial.php');
    error_reporting(0);
    $factorial = new factorial();

    //validar que el formulario no este vacio y que el numero sea mayor a 0
    if(!empty($_POST['numero']) && $_POST['numero'] > 0){
        //guardar el numero en una variable
        $numero = $_POST['numero'];
        //guardar el resultado del factorial en una variable
        //calcular el factorial
        $numeros = array();
        $resultado = 1;
        $sumatoria_factorial = 0;
        for($i = 1; $i <= $numero; $i++){
            $sumatoria_factorial = $sumatoria_factorial + (($i*$i)/$resultado);
        }
        
        for($i = 1; $i <= $numero; $i++){
            $resultado = $resultado * $i;
            $numeros[] = $i;
        }

        
        echo "<h2>Factorial de $numero</h2>";
        echo "<p>El factorial de $numero es: $resultado</p>";
        echo "<p>La sumatoria de $numero es: $sumatoria</p>";
        echo "<p>Los numeros son: ".implode(", ", $numeros)."</p>";
        //guardar el resultado de la sumatoria en una variable
        $sumatoria = $sumatoria_factorial;
        $factorial->guardar_factorial($numero, $resultado, $sumatoria);
        

    }else{
        echo "Ingrese un numero mayor a 0";
    }

    if(isset($_POST['consultar'])){
        //Mostrar el factorial de la base de datos
    $resultado = $factorial->consultar_factorial();

    //Mostrar mensaje con el factorial
    echo "<h2>Factorial de la base de datos</h2>";

    //Mostrar el factorial de la base de datos
    echo "<table border='1'>
    <tr>
    <th>id</th>
    <th>Numero</th>
    <th>Factorial</th>
    <th>Sumatoria</th>
    <th>Editar</th>
    </tr>";

    foreach($resultado as $fila){
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['numero'] . "</td>";
        echo "<td>" . $fila['factorial'] . "</td>";
        echo "<td>" . $fila['sumatoria'] . "</td>";
        echo "<td><a href='editar.php?id=".$fila['id']."'>Editar</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    }
    ?>

</body>
</html>