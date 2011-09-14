<?php
include "../recursos/funciones.php";
controlSesion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php fijaPlantillaCSS();?>
        <title>Consulta General</title>
    </head>
    <body>
        <h1>Listado general del catalogo.</h1>
        <?php
        iniciaBD();
        listarCatalogo();
        ?>
        <br><a href="menuG.php">Volver al men&uacute;</a>
    </body>
</html>
