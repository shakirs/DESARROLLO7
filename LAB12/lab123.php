<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org//1999/xhtml" xml:lang="es" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Laboratorio 12</title>
</head>
<body>
    <h1>Manejo de sesiones</h1>
    <h2> Paso 3: la variable ya ha sido destruida y su valor se ha perdido</h2> 
    
    <?php
if (isset($_SESSION['var1'])) {
    $var1 = $_SESSION['var1'];
}else{
    $var1 = "";
}
    echo "La variable de sesion es: $var1 \n";
    session_destroy();
    ?>
    <a href="lab121.php"> Volver al paso 1</a>


</body>
</html>