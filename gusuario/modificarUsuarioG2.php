<?php
/**
 * Se encarga de la parte de interfaz de modificacion de usuarios en el catalogo de la biblioteca
 * @author Nunhez
 * @abstract Interfaz grafica modificacion usuario
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
        <title> Modificar Cat&aacute;logo</title>
        <script type="text/javascript" src="./recursos/funciones.js"></script>
        <style type="text/css">@import url(../css/calendar.css);</style>  
        <script type="text/javascript" src="js/calendar.js"></script>
        <script type="text/javascript" src="js/calendar-es.js"></script>
        <script type="text/javascript" src="js/calendar-setup.js"></script>
        <script type="text/javascript" src="js/validaciones1.js"></script>
    </head>
    <body>
        <?php
        iniciaBD();
        $dni = $_POST['usuario'];

        // consultamos los datos del titulo seleccionado
        $query = "SELECT * FROM usuario where dni='$dni'";
        //echo "$query<br>";
        $resultado = mysql_query($query);

        while ($datosUsuario = mysql_fetch_array($resultado)) {
            // Saco en variables el codigo completo del libro
            $dni = $datosUsuario['dni'];
            $clave = $datosUsuario['clave'];
            $nombre = $datosUsuario['nombre_usuario'];
            $apellido1 = $datosUsuario['apellido1_usuario'];
            $apellido2 = $datosUsuario['apellido2_usuario'];
            $email = $datosUsuario['email'];
            $telefono = $datosUsuario['telefono'];
            $direccion = $datosUsuario['direccion'];
            $plantilla = $datosUsuario['plantilla_id_plantilla'];
            $tipoUsuario = $datosUsuario['tipo_id_tipo_usuario'];
        }
        //echo "$isbn <br>";
        //echo "$fecha_p <br>";
        //echo "$fecha_a <br>";
        //echo "$num_paginas <br>";
        //echo "$edicion <br>";
        //echo "$editorial <br>";
        //echo "$idioma <br>";
        //echo "$nombre_titulo <br>";
        ?>

        <form action="modificarUsuarioP.php" method="post"onSubmit="return Valida(this);">
            <fieldset>            
                <legend>Modificar Usuario</legend>   
                Usuario para la modificacion:<?php echo " $dni "; ?><br />
                <label>*D.N.I:</label>
                <input name="dni" type="text" size="8" maxlength="8" readonly value="<?php echo $dni; ?>"/><br />
                <label>*Clave:</label>
                <input name="clave" type="text" size="8" maxlength="8" value="<?php echo $clave; ?>"/><br />
                <label>*Nombre:</label>
                <input name="nombre" type="text" size="25" maxlength="25" value="<?php echo $nombre; ?>"/><br />
                <label>*Apellido 1:</label>
                <input name="apellido_1" type="text" size="25" maxlength="25" value="<?php echo $apellido1; ?>"/><br />
                <label>*Apellido 2:</label>
                <input name="apellido_2" type="text" size="25" maxlength="25" value="<?php echo $apellido2; ?>"/><br />
                <label>*Email</label>
                <input name="email" type="text" size="25" maxlength="25" value="<?php echo $email; ?>"/><br />
                <label>*Telefono</label>
                <input name="telefono" type="text" size="9" maxlength="9" value="<?php echo $telefono; ?>"/><br />
                <label>*Direccion</label>
                <input name="direccion" type="text" size="50" maxlength="50" value="<?php echo $direccion; ?>"/><br />
                <label>*Tipo Plantilla:</label>
                <?php cargardorLista_selected("plantilla", "id_plantilla", "nombre_plantilla", $plantilla); ?>
                <label>*Tipo de Usuario</label>   
                <?php cargardorLista_selected("tipo", "id_tipo_usuario", "tipo_usuario", $tipoUsuario) ?>
                <br /><input type="submit" value="Modificar">
                <input type="reset" value="Borrar campos">
            </fieldset>
        </form>
    </body>
    <br><a href="../usuario/menuG.php">Volver al men&uacute;</a>
</html>
<?php

function cargardorLista_selected($nombreTabla, $codCampo, $valorCampo, $valorSeleccionado, $visibles=1) {
    iniciaBD();
    $query = "SELECT * FROM $nombreTabla";
    $resultado = mysql_query($query);

    echo "<select name='$nombreTabla' size='$visibles'>";
    while ($salida = mysql_fetch_array($resultado)) {
        echo "<option ";
        if ($valorSeleccionado == $salida["$codCampo"]) {
            echo "selected";
        }
        echo " value='" . $salida[$codCampo] . "'>" . htmlentities($salida[$valorCampo]) . ' (' . $salida[$codCampo] . ") </option>\n";
    }
    echo "</select></br>";
}
?>
