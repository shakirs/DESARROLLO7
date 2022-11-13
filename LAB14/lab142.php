<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Laboratorio 14</title>
</head>
<body>
    <H1>Consulta de noticias</H1>
<?php
if (isset($_SESSION["usuario_valido"])) {
    require_once('class/noticias.php');
    $obj_noticias = new noticias();
    $noticia = $obj_noticias->consultar_noticias();
    $nfilas=count($noticia);

    if ($nfilas > 0) {
        print("<TABLE>\n");
        print("<TR>\n");
        print("<TH>Titulo</TH>\n");
        print("<TH>Texto</TH>\n");
        print("<TH>Categoria</TH>\n");
        print("<TH>Fecha</TH>\n");
        print("<TH>Imagen</TH>\n");
        print("</TR\n");

        foreach ($noticia as $resultado) {
            print("<TR>\n");
            print("<TD>".$resultado['titulo']."</TD>\n");
            print("<TD>".$resultado['texto']."</TD>\n");
            print("<TD>".$resultado['categoria']."</TD>\n");
            print("<TD>".date("j/n/y", strtotime($resultado['fecha']))."</TD>\n");

            if ($resultado['imagen'] != "") {
                print("<TD><A TARGET='_blank' HREF='img/".$resultado['imagen']."'>
                <IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
            } else {
                print("<TD>&nbsp;</TD>\n");
            }
            print("</TR\n");
        }
        print("</TABLE>\n");
    } else {
        print("No hay noticias disponibles");
    }
    echo "<a href='login.php'.php'>Menu principal</a>";
}else{
    echo "No tiene permisos para ver esta pagina";
    echo "<a href='login.php'>Conectar</a>";
}

//MESAJE DE PRUEBA A VER SI ESTA SINCRONIZADO


?>
    
</body>
</html>