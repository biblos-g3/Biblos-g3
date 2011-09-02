<?php
/**
 * Se encarga de la parte de interfaz de altas en el catalogo de la biblioteca
 * @author Nunhez
 * @abstract Interfaz grafica alta catalogo 
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
        <title> Modificar de Cat&aacute;logo</title>
        <script type="text/javascript" src="./recursos/funciones.js"></script>
        <style type="text/css">@import url(recursos/calendar.css);</style>  
        <script type="text/javascript" src="js/calendar.js"></script>
        <script type="text/javascript" src="js/calendar-es.js"></script>
        <script type="text/javascript" src="js/calendar-setup.js"></script>
        <script type="text/javascript" src="js/validaciones1.js"></script>
    </head>
    <body>
        <?php
        $titulo = $_POST['titulo'];

        iniciaBD();

        $dewey = strtok($titulo, "-");
        $apellido3 = strtok("-");
        $titulo3 = strtok("-");
        
        
          ?>
        
        <form action="modificarCatalogoP.php" method="post"onSubmit="return Valida(this);">
            <fieldset>            
                <legend>Alta Cat&aacute;logo</legend>
                <label>*Categoria Dewey</label><br />
                <?php
                cargardorLista("dewey", "categoria_dewey", "nombre_categoria_dewey", 10)
                ?>
                <label>*Nombre t&iacute;tulo</label><input name="nombre_titulo"  type="text" size="50" maxlength="50" /><br />
                <label>*Autor</label><br />
                <?php
                cargardorLista2("autor", "id_autor", "apellido1_autor", "nombre_autor", 5);
                ?>
                <label>ISBN</label>
                <input name="isbn" type="text" size="10" maxlength="10" /><br />
                <label>Fecha publicaci&oacute;n</label>
                <input name="fecha_publicacion" id="fecha_publicacion" type="text" size="10" maxlength="10" />
                <input type="button" id="trigger" value="..." /><br />
                <label>Fecha adquisición</label>
                <input name="fecha_adquisicion" id="fecha_adquisicion" type="text" size="10" maxlength="10" />
                <input type="button" id="trigger2" value="..." /><br />
                <label>Sinopsis</label><br />
                <textarea name="sinopsis" cols=40 rows=6></textarea><br />
                <label>Número de páginas</label>
                <input name="num_paginas" type="text" size="5" maxlength="5" /><br />
                <label>*Edición</label>
                <input name="edicion" type="text" size="5" maxlength="5" /><br />
                <label>*Editorial</label>
                <?php
                cargardorLista("editorial", "id_editorial", "nombre_editorial");
                ?>
                <label>*Idioma</label>
                <?php
                cargardorLista("idioma_639_1", "id_idioma_639_1", "idioma_639_1")
                ?>
                <br /><input type="submit" value="Modificar">
                <input type="reset" value="Borrar campos">
            </fieldset>
        </form>

    </body>
</html>
