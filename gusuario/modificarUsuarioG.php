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
        <?php fijaPlantillaCSS(); ?>
        <title>Modificar Usuario</title>
    </head>
    <body>   

        <form action="modificarUsuarioG2.php" method="post">
            <fieldset>            
                <legend>Modificar Usuario</legend>
                <?php
                cargardorLista3("usuario", "dni", "apellido1_usuario", "apellido2_usuario", "nombre_usuario", 1);
                ?>
                <input type="submit" value="Modificar datos">
            </fieldset>
        </form>

        <?php

        /**
         *
         * @param type $nombreTabla
         * @param type $dni
         * @param type $apellido_3
         * @param type $titulo_3
         * @param type $nombre_titulo
         * @param type $visibles 
         */
        function cargardorLista3($nombreTabla, $dni, $apellido_3, $titulo_3, $nombre_titulo, $visibles=1) {
            iniciaBD();
            $query = "SELECT $dni, $apellido_3, $titulo_3, $nombre_titulo FROM $nombreTabla";
            $resultado = mysql_query($query);

            echo "<select name='$nombreTabla' size='$visibles'>";
            while ($salida = mysql_fetch_array($resultado)) {
                echo "<option  value='" . $salida[$dni] . "'>" . $salida[$dni] . " - " . $salida[$apellido_3] . " " . $salida[$titulo_3]
                . ", " . htmlentities($salida[$nombre_titulo]) . "</option>";
            }
            echo "</select>";
        }
        ?>
        <br><a href="../usuario/menuG.php">Volver al men&uacute;</a>
    </body>
</html>
