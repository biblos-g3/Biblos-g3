<?php
include "funciones.php";
controlSesion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Ficha completa de libro</h1>
        <?php
        $cod_dewey = $_GET['c1'];
        $id_apellido = $_GET['c2'];
        $id_titulo = $_GET['c3'];

        iniciaBD(); // Paso 1 y 2 de BD

        $sql = "select * from titulo where 
                dewey_categoria_dewey='$cod_dewey'
                AND id_apellido='$id_apellido'
                AND id_titulo='$id_titulo'";

        //echo $sql;

        $resultado = mysql_query($sql);
        if ($resultado) {
            if (mysql_num_rows($resultado) > 0) {
                echo"<table border=1>";
                echo"<th>Codigo</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Edción</th>
                        <th>ISBN</th>
                        <th>Editorial</th>
                        <th>Pags</th>
                        <th>FPublicación</th>
                        <th>FAdquisición</th>                      
                        \n";

                $titulo = mysql_fetch_array($resultado);
                // Saco en variables el codigo completo del libro
                $cat_dewey = $titulo['dewey_categoria_dewey'];
                $id_apellido = $titulo['id_apellido'];
                $id_titulo = $titulo['id_titulo'];
                echo "<tr>";
                echo "<td>" .
                $cat_dewey .
                "" . strtoupper($id_apellido) .
                "" . strtoupper($id_titulo) . "</td>";
                echo "<td>" . htmlentities($titulo['nombre_titulo']) . "</td>";

                $autores = obtenerAutores($cat_dewey, $id_apellido, $id_titulo);
                echo "<td><ul>";
                foreach ($autores as $autor) {
                    echo "<li>" . $autor;
                }
                echo "</ul></td>";

                echo "<td>" . $titulo['edicion'] . "</td>";
                echo "<td>" . htmlentities($titulo['isbn']) . "</td>";
                $id_editorial = $titulo['editorial_id_editorial'];
                $nombre_editorial = obtenerEditorial($id_editorial);
                echo "<td>" . htmlentities($nombre_editorial) . "</td>";
                echo "<td>" . htmlentities($titulo['num_paginas']) . "</td>";
                echo "<td>" . $titulo['fecha_publicacion'] . "</td>";
                echo "<td>" . $titulo['fecha_adquisicion'] . "</td>";



                echo "<tr>\n";

                echo"</table>";
            }// Fin si hay libro
            else echo "No hay libro con codigo $cod_dewey-$id_apellido-$id_titulo";
        }
        else
            echo "Fallo consulta:" . mysql_error();
        ?>
    </body>
</html>
