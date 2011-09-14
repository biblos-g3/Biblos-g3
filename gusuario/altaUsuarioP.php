<?php
/**
 * Se encarga de la parte de proceso de altas en el  de la biblioteca
 * @author Nunhez
 * @abstract Proceso de alta de un titulo
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
        <title>Alta de Cat&aacute;logo</title>
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

        $query = " INSERT INTO usuario (dni, clave, nombre_usuario, apellido1_usuario, apellido2_usuario, email, telefono, direccion, plantilla_id_plantilla, tipo_id_tipo_usuario) 
                               VALUES ('$dni', '$clave', '$nombre_usuario', '$apellido1_usuario', '$apellido2_usuario', '$email', '$telefono', '$direccion', '$plantilla_id_plantilla', '$tipo_id_tipo_usuario')";
        echo $query;
        
        $resultado = mysql_query($query);
        if ($resultado)
            echo "Alta de usuario $nombre_usuario correcta.";
        else
            die("Fallo al insertar usuario" . mysql_error());
        ?>
    </body>
    <br><a href="../usuario/menuG.php">Volver al men&uacute;</a>

</html>
