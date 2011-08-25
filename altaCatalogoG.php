<?php
include "funciones.php";
controlSesion();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Alta de Catalogo</title>
    </head>
    <body>
        <form action="altaCatalogoP.php" method="post">
            <?php
            echo selectorDewey();
            ?>
            <label>Nombre t&iacute;tulo</label><input name="nombre_titulo" type="text" size="20" maxlength="20" /><br />
            Autor <input name="autor" type="text" size="20" maxlength="20" /><br />
            ISBN <input name="isbn" type="text" size="20" maxlength="20" /><br />
            Fecha publicación <input name="fecha_publicacion" type="text" size="20" maxlength="20" /><br />
            Fecha adquisición <input name="fecha_adquisicion" type="text" size="20" maxlength="20" /><br />
            Sinopsis <input name="sinopsis" type="text" size="20" maxlength="20" /><br />
            Número de páginas<input name="num_paginas" type="text" size="20" maxlength="20" /><br />
            Edición <input name="edicion" type="text" size="20" maxlength="20" /><br />
            Editorial <input name="editorial" type="text" size="20" maxlength="20" /><br />
            Idioma<input name="idioma" type="text" size="20" maxlength="20" /><br />
            <input type="submit" value="Dar de alta">
            <input type="reset" value="Borrar campos">
        </form>


        <?php

        function selectorDewey() {
            iniciaBD();
            $query = "SELECT * FROM dewey";
            $resultado = mysql_query($query);
            echo "<select name='dewey' size='1' >";
            while ($dewey = mysql_fetch_array($resultado)) {
                    echo "<option  value='" . $dewey['categoria_dewey'] . "'>" . htmlentities($dewey['nombre_categoria_dewey']) . "</option>";              
            }
        }
        ?>
    </body>
</html>
