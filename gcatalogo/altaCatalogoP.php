<?php
/**
 * Se encarga de la parte de proceso de altas en el catalogo de la biblioteca
 * @author Nunhez
 * @abstract Proceso de alta de un titulo
 * 
 */
include "../recursos/funciones.php";
//controlSesion();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Alta de Cat&aacute;logo</title>
    </head>
    <body>
        <?php
        $cat_dewey = $_POST['dewey'];
        $nombre_titulo = $_POST['nombre_titulo'];
        $autores = $_POST['autor'];
        $isbn = $_POST['isbn'];
        $fecha_publicacion = "str_to_date('".$_POST['fecha_publicacion']."','%d/%m/%Y')";
        $fecha_adquisicion = "str_to_date('".$_POST['fecha_adquisicion']."','%d/%m/%Y')";
        $sinopsis = $_POST['sinopsis'];
        $num_paginas = $_POST['num_paginas'];
        $edicion = $_POST['edicion'];
        $editorial = $_POST['editorial'];
        $idioma = $_POST['idioma_639_1'];
        //Sacamos las 3 letras de titulo para el codigo Dewey
        $titulo3 = strtoupper(substr($nombre_titulo, 0, 3));

        iniciaBD();


        // Inserto el titulo

        $autor1 = $autores[0];
        $codAutor_1 = strtok($autor1, "-");
        $apellido3_1 = strtok("-");

        $query = " INSERT INTO titulo 
                       (dewey_categoria_dewey, id_apellido, id_titulo, nombre_titulo, isbn, fecha_publicacion, fecha_adquisicion, sinopsis, num_paginas, edicion, editorial_id_editorial, idioma_639_1_id_idioma_639_1) 
                       VALUES('$cat_dewey', '$apellido3_1', '$titulo3', '$nombre_titulo', '$isbn', $fecha_publicacion, $fecha_adquisicion, '$sinopsis', '$num_paginas', '$edicion' , '$editorial', '$idioma')";

        $resultado = mysql_query($query);
        if ($resultado)
            echo " Alta de libro correcta.";
        else
            die("Fallo al insertar libro" . mysql_error());


        // Sacamos el codigo del autor y el codigo del apellido tokenizando el value del formulario
    
        if ($autores) {
            foreach ($autores as $autor) {
                // Inserto los autores
                echo 'You selected ', $autor, '<br />';
                $codAutor = strtok($autor, "-");
                $apellido3 = strtok("-");

                echo"<br>";

                $query = " INSERT INTO titulo_has_autor 
                       (titulo_dewey_categoria_dewey, titulo_id_apellido, titulo_id_titulo, autor_id_autor) 
                       VALUES('$cat_dewey', '$apellido3_1', '$titulo3', '$codAutor')";
               

                $resultado = mysql_query($query);
                if ($resultado)
                    echo " Alta de autor correcta ($codAutor)<br>";
                else
                    die("Fallo al insertar autor" . mysql_error());
            }
        }
        ?>
    </body>

</html>
