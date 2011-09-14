<?php
include "../recursos/funciones.php";
controlSesion();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cpnsulta Espec&iacute;fica</title>
        <?php fijaPlantillaCSS();?>
    </head>
    <body>
        <form action="cespecificaP.php" method="post">
            <fieldset>
                <legend>Campos</legend>
                B&uacute;squeda
                <input name="campo_busqueda" type="text" size="30" maxlength="50" /><br />
                Tipo busqueda
                <select name="tipo_busqueda" size="1" >
                    <option name="tipo_busqueda" value="0">Nombre aproximado</option>
                    <option name="tipo_busqueda" value="1">Nombre exacto</option>
                    <option name="tipo_busqueda" value="2">Codigo Dewey</option>
                    <option name="tipo_busqueda" value="3">Numero paginas</option>
                </select>
                <input type="submit" value="Buscar">
            </fieldset>
        </form>
        <a href="menuG.php">Volver al men&uacute;</a>
    </body>
</html>
