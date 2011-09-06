<?php
/**
 * Se encarga de la parte de interfaz de altas en el catalogo de la biblioteca
 * @author Nunhez
 * @abstract Interfaz grafica alta catalogo 
 * 
 */
include "funciones.php";
//controlSesion();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $cat_dewey = $_POST['cod-dewey'];
        $titulo3 = $_POST['cod-titulo'];
        $apellido3 = $_POST['cod-apellido'];
        $isbn = $_POST['isbn'];
        $fecha_publicacion = "str_to_date('" . $_POST['fecha_publicacion'] . "','%d/%m/%Y')";
        $fecha_adquisicion = "str_to_date('" . $_POST['fecha_adquisicion'] . "','%d/%m/%Y')";
        //$fecha_publicacion = $_POST['fecha_publicacion'];
        //$fecha_adquisicion = $_POST['fecha_adquisicion'];
        $sinopsis = $_POST['sinopsis'];
        $num_paginas = $_POST['num_paginas'];
        $edicion = $_POST['edicion'];
        $editorial = $_POST['editorial'];
        $idioma = $_POST['idioma_639_1'];

        iniciaBD();

        $query = " UPDATE titulo SET  
                isbn='$isbn', fecha_publicacion=$fecha_publicacion, fecha_adquisicion=$fecha_adquisicion, sinopsis='$sinopsis', num_paginas='$num_paginas', edicion='$edicion', editorial_id_editorial='$editorial', idioma_639_1_id_idioma_639_1='$idioma' 
                       WHERE  dewey_categoria_dewey='$cat_dewey' AND id_apellido='$apellido3' AND id_titulo='$titulo3'";
        //echo $query;

        $resultado = mysql_query($query);
        if ($resultado)
            echo " Modificacion de libro correcta.";
        else
            die("Fallo al modificar libro" . mysql_error());
        ?>
    </body>
</html>
