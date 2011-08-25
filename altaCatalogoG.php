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
            Categoria Dewey <input name="dewey" type="text" size="20" maxlength="20" /><br />
            Nombre título<input name="nombre_titulo" type="text" size="20" maxlength="20" /><br />
            ISBN <input name="isbn" type="text" size="20" maxlength="20" /><br />
            Fecha publicación <input name="fecha_publicacion" type="text" size="20" maxlength="20" /><br />
            Fecha adquisición <input name="fecha_adquisicion" type="text" size="20" maxlength="20" /><br />
            Sinopsis <input name="sinopsis" type="text" size="20" maxlength="20" /><br />
            Número de páginas<input name="num_paginas" type="text" size="20" maxlength="20" /><br />
            Edición <input name="edicion" type="text" size="20" maxlength="20" /><br />
            Idioma<input name="idioma" type="text" size="20" maxlength="20" /><br />
            <input type="submit" value="Dar de alta">
            <input type="reset" value="Borrar campos">
        </form>

        <?php
        ?>
    </body>
</html>
