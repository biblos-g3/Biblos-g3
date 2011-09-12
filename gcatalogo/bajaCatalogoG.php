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
        <title>Baja Cat&aacute;logo</title>
    </head>
    <body>   
    
        <form action="bajaCatalogoP.php" method="post">
            <fieldset>            
                <legend>Baja Cat&aacute;logo</legend>
            <?php
            cargardorListaTitulos("titulo", "dewey_categoria_dewey","id_apellido", "id_titulo", "nombre_titulo",1);
            ?>
     			<input type="submit" value="Dar de baja">
            </fieldset>
        </form>        
    </body>
</html>
