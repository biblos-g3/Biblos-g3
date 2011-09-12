<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
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
        
    <?php
        function cargardorListaTitulos($nombreTabla, $cat_dewey, $apellido_3, $titulo_3, $nombre_titulo, $visibles=1) {
            iniciaBD();
            $query = "SELECT $cat_dewey, $apellido_3, $titulo_3, $nombre_titulo FROM $nombreTabla";
            $resultado = mysql_query($query);

            echo "<select name='$nombreTabla' size='$visibles'>";
            while ($salida = mysql_fetch_array($resultado)) {
                echo "<option  value='" .$salida[$cat_dewey]."-".$salida[$apellido_3]."-" .$salida[$titulo_3]."'>"
                . htmlentities($salida[$nombre_titulo]) . "</option>";
            }
            echo "</select></br>";
        }          
        ?>
        
    </body>
</html>