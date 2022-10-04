<!DOCTYPE html>
<html lang="ES">
<head>
<title>Lab 10.1</title>

<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<?php
require_once("class/votos.php");

if(array_key_exists('enviar',$_POST)){
    echo ("<h1>Encuesta. Votos registrados</h1>\n");

   $obj_votos = new votos();
   $result_votos = $obj_votos->listar_votos();

   foreach($result_votos as $result_voto){
    $votos1 = $result_voto['votos1'];
    $votos2 = $result_voto['votos2'];
   }

   $voto = $_REQUEST['voto'];
    if($voto == "si"){
        $votos1 = $votos1 + 1;
    }else{
        $votos2 = $votos2 + 1;
    }

    $obj_votos = new votos();
    $result_votos = $obj_votos->actualizar_votos($votos1,$votos2);

    if($result_votos){
        echo ("<h2>Gracias por votar</h2>\n");
        echo ("<a href='lab102.php'> ver resultados</a>\n");
    }else{
        echo ("<a href='lab102.php'>Error al actualizar su voto</a>\n");
    }
}else{

?>

<h1>Encuesta. Votos</h1>
<form action="lab101.php" method="post">
    <input type="radio" name="voto" value="si" checked>Si
    <input type="radio" name="voto" value="no">No<br><br>
    <input type="submit" name="enviar" value="votar">
</form>

<a href="lab102.php">Ver resultados</a>

<?php
}
?>

</body>
</html>