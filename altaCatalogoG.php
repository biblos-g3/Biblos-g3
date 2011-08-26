<?php
/**
* Se encarga de la parte de interfaz de altas en el catalogo de la biblioteca
* @author Nunhez
 * @abstract Resumen para lo que sirve esto
 * 
*/

include "funciones.php";
//controlSesion();
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
            cargardorLista2("autor", "id_autor","apellido1_autor", "nombre_autor",1);
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
        
        
/**
* Descripción breve (una línea)
*
* Descripción extensa. Todas las líneas que
* sean necesarias
* Todas las líneas comienzan con *
  <- Esta línea es ignorada
*
* Este DocBlock documenta la función suma()
 * @param string $nombreTabla Recibir el nombre de una tabla de base de datos
 * @param string $codCampo Recibe el nombre de la columna de BD con el id de la tabla
 * @return void
 * @author Nuñez
 * @version 1.0
 * @since 0,9
 * 
*/
        
        function cargardorLista2($nombreTabla, $codCampo, $valorCampo1, $valorCampo2, $visibles=1) {
            iniciaBD();
            $query = "SELECT * FROM $nombreTabla";
            $resultado = mysql_query($query);

            echo "<select name='dewey' size='$visibles'>";
            while ($salida = mysql_fetch_array($resultado)) {
                echo "<option  value='" . $salida[$codCampo]."-".strtoupper(substr($salida[$valorCampo1],0,3))."'>" .htmlentities($salida[$valorCampo1]). "," .htmlentities($salida[$valorCampo2]). "</option>";
            }
            echo "</select><br />";
        }
        ?>
    </body>
</html>
