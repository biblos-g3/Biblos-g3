<?php

function controlSesion() {
    session_start();
//include "altalibro_p.php";

    if (!$_SESSION['usuario'] || !isset($_SESSION['usuario'])) {
        header("location:indexG.php");
    }
    else
        $usuario = $_SESSION['usuario'];
}

function iniciaBD() {
    $sgbd = mysql_pconnect("localhost", "biblosa", "1234");
    if (!sgbd)
        die("Fallo en la conexion al SGBD");

    $db = mysql_select_db("biblos_g3");
    if (!db)
        die("Fallo en la conexion a la BD");
}

function obtenerAutores($cat_dewey, $id_apellido, $id_titulo) {
    iniciaBD();

    $query = "select nombre_autor,apellido1_autor, apellido2_autor from titulo_has_autor, autor where 
        titulo_dewey_categoria_dewey='$cat_dewey' and
    titulo_id_apellido='$id_apellido' and
    titulo_id_titulo='$id_titulo'
    and id_autor=autor_id_autor";

    //echo $query;
    //          (id,autor,editorial,nombre)
    // values ($id,'$autor','$editorial','$nombre')";
    $resultado = mysql_query($query);
    if ($resultado) {
        $i = 0;
        while ($autor = mysql_fetch_array($resultado)) {
            $autor_nombre = htmlentities($autor['nombre_autor']);
            $autor_apellido1 = htmlentities($autor['apellido1_autor']);
            $autor_apellido2 = htmlentities($autor['apellido2_autor']);


            $autores[$i] = $autor_apellido1 . " " . $autor_apellido2 . ", " . $autor_nombre;
            $i++;
        }
    }else
        $autores[0] = "Fallo en la consulta" . mysql_error();

    return $autores;
}

function obtenerEditorial($id_editorial) {
    iniciaBD();

    $query = "select nombre_editorial from editorial where 
        id_editorial='$id_editorial'";

    echo "-" . $query;

    $resultado = mysql_query($query);
    if ($resultado) {
        $fila = mysql_fetch_array($resultado);
        $editorial = $fila['nombre_editorial'];
    }else
        $editorial = "Sin editorial";

    return $editorial;
}

function listarCatalogo() {


    $query = "select * from titulo";

    //          (id,autor,editorial,nombre)
    // values ($id,'$autor','$editorial','$nombre')";
    $resultado = mysql_query($query);
    echo "Numero de títulos:" . mysql_num_rows($resultado) . "<p>";

    echo"<table border=1>";
    echo"<th>Codigo</th>
                        <th>Titulo</th>
                        <th>Autor</th>\n";
    if ($resultado) {
        while ($titulo = mysql_fetch_array($resultado)) {
            // Saco en variables el codigo completo del libro
            $cat_dewey = $titulo['dewey_categoria_dewey'];
            $id_apellido = $titulo['id_apellido'];
            $id_titulo = $titulo['id_titulo'];
            echo "<tr>";
            echo "<td><a href='mostrarfichalibro.php?c1=$cat_dewey&c2=$id_apellido&c3=$id_titulo'>" .
            $cat_dewey .
            "" . strtoupper($id_apellido) .
            "" . strtoupper($id_titulo) . "</a></td>";
            echo "<td>" . htmlentities($titulo['nombre_titulo']) . "</td>";

            $autores = obtenerAutores($cat_dewey, $id_apellido, $id_titulo);
            echo "<td><ul>";
            foreach ($autores as $autor) {
                echo "<li>" . $autor;
            }
            echo "</ul></td>";
            echo "<tr>\n";
        }
        echo"</table>";
    }

    else
        die("Fallo al listar") . mysql_error();
}

function listarCatalogoXCampo($campoBusqueda, $valorBusqueda, $isExact) {


    $query = "select * from titulo where $campoBusqueda ";
    if ($isExact == TRUE)
        $query = $query . "= '$valorBusqueda'";
    else
        $query = $query . "like '%$valorBusqueda%'";
    //          (id,autor,editorial,nombre)
    // values ($id,'$autor','$editorial','$nombre')";
    $resultado = mysql_query($query);
    $numTitulos = mysql_num_rows($resultado);

    if ($numTitulos == 0)
        echo "No hay titulos";
    else {
       
        echo"<table border=1>";
        echo"<th>Codigo</th>
                        <th>Titulo</th>
                        <th>Autor</th>\n";
        if ($resultado) {
            while ($titulo = mysql_fetch_array($resultado)) {
                // Saco en variables el codigo completo del libro
                $cat_dewey = $titulo['dewey_categoria_dewey'];
                $id_apellido = $titulo['id_apellido'];
                $id_titulo = $titulo['id_titulo'];
                echo "<tr>";
                echo "<td><a href='mostrarfichalibro.php?c1=$cat_dewey&c2=$id_apellido&c3=$id_titulo'>" .
                $cat_dewey .
                "" . strtoupper($id_apellido) .
                "" . strtoupper($id_titulo) . "</a></td>";
                echo "<td>" . htmlentities($titulo['nombre_titulo']) . "</td>";

                $autores = obtenerAutores($cat_dewey, $id_apellido, $id_titulo);
                echo "<td><ul>";
                foreach ($autores as $autor) {
                    echo "<li>" . $autor;
                }
                echo "</ul></td>";
                echo "<tr>\n";
                
            }
           // echo "<tr><td>Numero de titulos: $numTitulos</td></tr>";
             echo "<legend>Numero de titulos: $numTitulos</legend>";
            echo"</table>";
        }

        else
            die("Fallo al listar") . mysql_error();
    }
}

?>
