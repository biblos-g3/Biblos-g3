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
    
        <form action="bajaUsuarioP.php" method="post">
            <fieldset>            
                <legend>Baja Usuario</legend>
            <?php
                    cargardorLista("usuario", "dni","nombre_usuario", 1, "Seleccione opci&oacute;n");
                    ?>
     			<input type="submit" value="Dar de baja">
            </fieldset>
        </form> 
        <br><a href="../usuario/menuG.php">Volver al men&uacute;</a>
    </body>
</html>
