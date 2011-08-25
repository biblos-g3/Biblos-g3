<?php
include "funciones.php";
controlSesion();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Alta de Cat&aacute;logo</title>
    </head>
    <body>
        <form action="altaCatalogoP.php" method="post">
            <fieldset>            
                <legend>Alta Cat&aacute;logo</legend>
            <label>Categoria Dewey</label><br />
            <?php
            cargardorLista("dewey", "categoria_dewey ", "nombre_categoria_dewey", 10)
            ?>
            <label>Nombre t&iacute;tulo</label><input name="nombre_titulo" type="text" size="20" maxlength="20" /><br />
            <label>Autor</label>
            <?php
            cargardorLista("autor", "id_autor", "nombre_autor");
            ?>
            <label>ISBN</label>
            <input name="isbn" type="text" size="20" maxlength="20" /><br />
            <label>Fecha publicaci&oacute;n</label>
            <input name="fecha_publicacion" type="text" size="20" maxlength="20" /><br />
            <label>Fecha adquisición</label>
            <input name="fecha_adquisicion" type="text" size="20" maxlength="20" /><br />
            <label>Sinopsis</label><br />
            <textarea name="sinopsis" cols=40 rows=6></textarea><br />
            <label>Número de páginas</label>
            <input name="num_paginas" type="text" size="10" maxlength="10" /><br />
            <label>Edición</label>
            <input name="edicion" type="text" size="10" maxlength="10" /><br />
            <label>Editorial</label>
            <?php
            cargardorLista("editorial", "id_editorial", "nombre_editorial");
            ?>
            <label>Idioma</label>
            <?php
            cargardorLista("idioma_639_1", "id_idioma_639_1", "idioma_639_1")
            ?>
            <br /><input type="submit" value="Dar de alta">
            <input type="reset" value="Borrar campos">
            </fieldset>
        </form>

        <?php

        function cargardorLista($nombreTabla, $codCampo, $valorCampo, $visibles=1) {
            iniciaBD();
            $query = "SELECT * FROM $nombreTabla";
            $resultado = mysql_query($query);

            echo "<select name='dewey' size='$visibles'>";
            while ($salida = mysql_fetch_array($resultado)) {
                echo "<option  value='" . $salida[$codCampo] . "'>" . htmlentities($salida[$valorCampo]) . "</option>";
            }
            echo "</select><br />";
        }
        ?>
    </body>
</html>
