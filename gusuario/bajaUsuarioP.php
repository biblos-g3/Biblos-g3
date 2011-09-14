<?php
/**
 * Se encarga de la parte de interfaz de altas en el catalogo de la biblioteca
 * @author Nunhez
 * @abstract Interfaz grafica alta catalogo 
 * 
 */
include "../recursos/funciones.php";
controlSesion();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php fijaPlantillaCSS();?>
        <title>Baja Usuario</title>
    </head>
    <body>
        <?php
        $dni = $_POST['dni'];

        iniciaBD();
        
        // borramos los autores del libro
        $query = " delete FROM usuario where dni='$dni'";
        echo $quiery;
        
        $resultado = mysql_query($query);
        if ($resultado)
            echo " Baja del usuario $nombre, $apellido1_usuario correcto.";
        else
            die("Fallo al dar de baja el Usuario" . mysql_error());
        
        
        ?>
    </body>
</html>

