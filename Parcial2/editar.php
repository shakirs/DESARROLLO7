<!DOCTYPE html>
<html lang="en">
<head>
    <!-- SHAKIRS FRANCO, ILS232, 8-911-1269 -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Actualizar factorial</title>
</head>
<body>


    <?php
    require_once('class/factorial.php');
    $factorial = new factorial();
    $resultado = $factorial->consultar_id($_GET['id']);

    foreach($resultado as $fila){
        $id = $fila['id'];
        $numero = $fila['numero'];
        $fact = $fila['factorial'];
        $sumatoria = $fila['sumatoria'];
    }

    ?>

    <form class="editar" id="editar" action="actualizar.php" method="post">
    <td><input type="hidden" name="id" value="<?php echo $tarea['id']?>"></td>
    <tr>
        <label for="numero">Numero</label>
        <input type="number" name="numero" id="numero" value="<?php echo $numero; ?>">
        <label for="factorial" hidden="">Factorial</label>
        <input type="number" hidden="" name="factorial" id="factorial" value="<?php echo $fact; ?>">
        <label for="sumatoria" hidden="">Sumatoria</label>
        <input type="number"hidden="" name="sumatoria" id="sumatoria" value="<?php echo $sumatoria; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Actualizar">

    </form>

    
</body>
</html>