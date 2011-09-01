<?php
/**
 * Se encarga de la parte de interfaz de altas en el catalogo de la biblioteca
 * @author Nunhez
 * @abstract Interfaz grafica alta catalogo 
 * 
 */
include "funciones.php";
controlSesion();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Baja Cat&aacute;logo</title>
    </head>
    <body>
        <?php
        $titulo = $_POST['titulo'];

        iniciaBD();

        $dewey = strtok($titulo, "-");
        $apellido3 = strtok("-");
        $titulo3 = strtok("-");
        
        // borramos los autores del libro
        $query = " delete FROM titulo_has_autor where titulo_dewey_categoria_dewey='$dewey' AND titulo_id_apellido='$apellido3' AND titulo_id_titulo ='$titulo3'";
        $resultado = mysql_query($query);
        if ($resultado)
            echo " Baja de los autores del libro correcta.";
        else
            die("Fallo al dar de baja el libro" . mysql_error());
        
        // borramos el libro
        $query2 = " delete FROM titulo where dewey_categoria_dewey='$dewey' AND id_apellido='$apellido3' AND id_titulo='$titulo3'";
        $resultado2 = mysql_query($query2);
        if ($resultado2)
            echo " Baja de libro correcta.";
        else
            die("Fallo al dar de baja el libro" . mysql_error());
        ?>
    </body>
</html>
