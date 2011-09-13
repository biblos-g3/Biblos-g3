<?php
/**
 * Se encarga de la parte de interfaz de altas en el catalogo de la biblioteca
 * @author Nunhez
 * @abstract Interfaz grafica alta catalogo 
 * 
 */
include "../recursos/funciones.php";
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
        $dni = $_POST['dni'];
        $clave = $_POST['clave'];
        $nombre_usuario = $_POST['nombre'];
        $apellido1_usuario = $_POST['apellido_1'];
        $apellido2_usuario = $_POST['apellido_2'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $plantilla_id_plantilla = $_POST['plantilla'];
        $tipo_id_tipo_usuario = $_POST['tipo_usuario'];
        

        iniciaBD();

        $query = " UPDATE usuario
                      SET email='$email', telefono='$telefono', direccion='$direccion'  
                    WHERE dni='$dni'";
        echo $query;

        $resultado = mysql_query($query);
        if ($resultado)
            echo " Modificaci&oacute;n de usuario correcta.";
        else
            die("Fallo al modificar libro" . mysql_error());
        ?>
    </body>
</html>

