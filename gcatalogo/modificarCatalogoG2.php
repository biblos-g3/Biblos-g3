<?php
/**
 * Se encarga de la parte de interfaz de modificacion en el catalogo de la biblioteca
 * @author Nunhez
 * @abstract Interfaz grafica modificacion de catalogo 
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
        <title> Modificar Cat&aacute;logo</title>
        <?php fijaPlantillaCSS();?>
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
        $titulo = $_POST['titulo'];
        //tokenizamos el titulo para separar el dewey, apellido y titulo del autor.
        $dewey = strtok($titulo, "-");
        $apellido3 = strtok("-");
        $titulo3 = strtok("-");
        // consultamos los datos del titulo seleccionado
        $query = "SELECT * FROM titulo where dewey_categoria_dewey='$dewey' AND id_titulo='$titulo3' AND id_apellido='$apellido3'";
        //echo "$query<br>";
        $resultado = mysql_query($query);

        while ($titulo = mysql_fetch_array($resultado)) {
            // Saco en variables el codigo completo del libro
            $isbn = $titulo['isbn'];

           // echo(date('d/m/Y', strtotime('2009-09-07 08:07:50')));
            $fecha_p = date('d/m/Y', strtotime($titulo['fecha_publicacion']));
            $fecha_a = date('d/m/Y', strtotime($titulo['fecha_adquisicion']));

            $num_paginas = $titulo['num_paginas'];
            $edicion = $titulo['edicion'];
            $sinopsis = $titulo['sinopsis'];
            $editorial = $titulo['editorial_id_editorial'];
            $idioma = $titulo['idioma_639_1_id_idioma_639_1'];
            $nombre_titulo = $titulo['nombre_titulo'];
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

        <form action="modificarCatalogoP.php" method="post"onSubmit="return Valida(this);">
            <fieldset>            
                <legend>Modificar Cat&aacute;logo</legend>   
                T&iacute;tulo para la modificacion:<?php echo " $nombre_titulo"; ?><br />
                <label>Codigo Dewey</label>
                <input name="cod-dewey" type="text" size="3" maxlength="3" readonly value="<?php echo $dewey; ?>" />
                <input name="cod-apellido" type="text" size="3" maxlength="3" readonly value="<?php echo $apellido3; ?>" />
                <input name="cod-titulo" type="text" size="3" maxlength="3" readonly value="<?php echo $titulo3; ?>"/><br />
                <label>ISBN</label>
                <input name="isbn" type="text" size="10" maxlength="10" value="<?php echo $isbn; ?>"/><br />
                <label>Fecha publicaci&oacute;n</label>
                <input name="fecha_publicacion" id="fecha_publicacion" type="text" size="20" maxlength="20" value="<?php echo $fecha_p; ?>"/>
                <input type="button" id="trigger" value="..." /><br />
                <label>Fecha adquisición</label>
                <input name="fecha_adquisicion" id="fecha_adquisicion" type="text" size="20" maxlength="20" value="<?php echo $fecha_a; ?>"/>
                <input type="button" id="trigger2" value="..." /><br />
                <label>Sinopsis</label><br />
                <textarea name="sinopsis" cols=40 rows=6><?php echo htmlentities($sinopsis); ?></textarea><br />
                <label>Número de páginas</label>
                <input name="num_paginas" type="text" size="5" maxlength="5" value="<?php echo $num_paginas; ?>" /><br />
                <label>Edición</label>
                <input name="edicion" type="text" size="5" maxlength="5" value="<?php echo $edicion; ?>" /><br />
                <label>Editorial</label>
                <?php cargardorLista_selected("editorial", "id_editorial", "nombre_editorial", $editorial); ?>
                <label>Idioma</label>
                <?php cargardorLista_selected("idioma_639_1", "id_idioma_639_1", "idioma_639_1", $idioma) ?>
                <br /><input type="submit" value="Modificar">
                <input type="reset" value="Borrar campos">
            </fieldset>
        </form>
        <br><a href="../usuario/menuG.php">Volver al men&uacute;</a>
    </body>
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
