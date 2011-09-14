<?php
include "../recursos/funciones.php";
controlSesion();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php fijaPlantillaCSS();?>
        <title>Cpnsulta Espec&iacute;fica</title>
    </head>
    <body>
        <?php
        $campo_busqueda = $_POST['campo_busqueda'];
        $tipo_busqueda = $_POST['tipo_busqueda'];


        if (!$campo_busqueda) {
            echo "Debe rellenar la casilla de consulta.<br>"
            . "Por favor vuelve e inténtalo de nuevo.";
            exit;
        }


        iniciaBD();
        switch ($tipo_busqueda) {             
            case 0:// Caso nombre aproximado
                listarCatalogoXCampo("nombre_titulo",$campo_busqueda, FALSE);
                break;
            case 1:// Caso nombre exacto
                listarCatalogoXCampo("nombre_titulo",$campo_busqueda, TRUE);
                break;
            case 2:// caso Dewey

                $cat_dewey = substr($campo_busqueda, 0, 3);
                $id_apellido = substr($campo_busqueda, 3, 3);
                $id_titulo = substr($campo_busqueda, 6, 3);

                header("location:mostrarfichalibro.php?c1=$cat_dewey&c2=$id_apellido&c3=$id_titulo");
                break;
            case 3:// Caso numero de paginas
                listarCatalogoXCampo("num_paginas",$campo_busqueda, TRUE);
                break;
            default:
                die("Opcion de busqueda no valida");
        }
        ?>
        </br><a href="menuG.php">Volver al men&uacute;</a>
    </body>
</html>
