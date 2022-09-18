<!-- Subir un archivo al una carpeta nueva-->
<?php
// Solo aceptar archivo menores o igual a 1MB y que sean de tipo imagen jpg,jpeg, gif o png
if ($_FILES["archivo_cliente"]["size"] < 1000000 && ($_FILES["archivo_cliente"]["type"] == "image/jpeg" || $_FILES["archivo_cliente"]["type"] == "image/gif" 
|| $_FILES["archivo_cliente"]["type"] == "image/png" || $_FILES["archivo_cliente"]["type"] == "image/jpg")) {
    // Verificar si el archivo existe
    if (file_exists("archivos/" . $_FILES["archivo_cliente"]["name"])) {
        echo $_FILES["archivo"]["name"] . " ya existe. ";
    } else {
        // Guardar el archivo en la carpeta upload
        move_uploaded_file($_FILES["archivo_cliente"]["tmp_name"], "archivos/" . $_FILES["archivo_cliente"]["name"]);
        echo "archivo_cliente guardado en " . "archivos/" . $_FILES["archivo_cliente"]["name"];
    }
} else {
    echo "Archivo inválido";
}
?>


