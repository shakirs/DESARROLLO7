<!DOCTYPE html>
<html lang="ES">
<head>
<title>Lab 10.2</title>

<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Encuesta. Resultados</h1>

<?php
require_once("class/votos.php");

$obj_votos = new votos();
$result_votos = $obj_votos->listar_votos();

foreach($result_votos as $result_voto){
    $votos1 = $result_voto['votos1'];
    $votos2 = $result_voto['votos2'];
}

$total = $votos1 + $votos2;

echo ("<table border='1'>\n");
echo ("<tr>\n");
echo ("<th>Respuestas</th>\n");
echo ("<th>Votos</th>\n");
echo ("<th>Porcentaje</th>\n");
echo ("<th>Representacion grafica</th>\n");
echo ("</tr>\n");

$porcentaje = round(($votos1/$total)*100,2);
echo ("<tr>\n");
echo ("<td class='izquierda'>Si</td>\n");
echo ("<td class='derecha'>$votos1</td>\n");
echo ("<td class='derecha'>$porcentaje%</td>\n");
echo ("<td class='izquierda'><img src='img/puntoamarillo.gif' width='$porcentaje' height='20'></td>\n");
//echo ("<td class = 'izquierda' width='400'> <img src='img/puntoamarillo.gif' height='10' width='".$porcentaje*4. "'></td>\n");
echo ("</tr>\n");

$porcentaje = round(($votos2/$total)*100,2);
echo ("<tr>\n");
echo ("<td class='izquierda'>No</td>\n");
echo ("<td class='derecha'>$votos2</td>\n");
echo ("<td class='derecha'>$porcentaje%</td>\n");
echo ("<td class='izquierda'><img src='img/puntoamarillo.gif' width='$porcentaje' height='20'></td>\n");
//echo ("<td class = 'izquierda' width='400'><img src='img/puntoamarillo.gif' height='10'width='".$porcentaje*4."'></td>\n");
echo ("</tr>\n");

echo ("</table>\n");
echo ("<p>Total de votos: $total</p>\n");
echo ("<a href='lab101.php'>Votar</a>\n");

?>
</body>
</html>
