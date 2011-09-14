<?php
/**
 * Se encarga de la parte de interfaz de altas en el Catalogo del Usuario de la biblioteca
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
        <?php fijaPlantillaCSS();?>
        <title></title>
    </head>
    <body>
        <?php
        $dni = $_POST['dni'];
        $clave = $_POST['clave'];
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido_1'];
        $apellido2 = $_POST['apellido_2'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $id_plantilla = $_POST['plantilla'];
        $tipoUsuario = $_POST['tipo'];

        iniciaBD();
        $query = " UPDATE usuario 
                      SET clave='$clave', nombre_usuario='$nombre', apellido1_usuario='$apellido1', apellido2_usuario='$apellido2', email='$email', 
                          telefono='$telefono', direccion='$direccion', plantilla_id_plantilla='$id_plantilla', tipo_id_tipo_usuario='$tipoUsuario' 
                    WHERE dni='$dni'";
        echo $query;

        $resultado = mysql_query($query);
        if ($resultado)
            echo " Modificacion del Usuario $nombre, $apellido1 correcto.";
        else
            die("Fallo al modificar el usuario" . mysql_error());
        ?>
    </body>
</html>
