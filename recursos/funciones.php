<?php
/**
 * 
 */
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

    //echo "-" . $query;

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
            echo "<td><a href='../recursos/mostrarfichalibro.php?c1=$cat_dewey&c2=$id_apellido&c3=$id_titulo'>" .
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

/**
 *
 * @param type $campoBusqueda
 * @param type $valorBusqueda
 * @param type $isExact 
 */
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
/**
 *
 * @param type $nombreTabla
 * @param type $codCampo
 * @param type $valorCampo
 * @param type $visibles 
 */
        function cargardorLista($nombreTabla, $codCampo, $valorCampo, $visibles=1, $opcionSeleccione=null) {
            iniciaBD();
            $query = "SELECT * FROM $nombreTabla";
            $resultado = mysql_query($query);
            $opcion0="";
            
            
            $select = "<select name='$nombreTabla' size='$visibles' ";
            if($opcionSeleccione){
                $select .= "class='Obligado'";
                 $opcion0 = "<option  value='' SELECTED>$opcionSeleccione";
            }
            
            $select .= ">";
            
           

            //echo "<select name='$nombreTabla' size='$visibles'value='$value'>";
            echo $select;
            echo $opcion0;
            while ($salida = mysql_fetch_array($resultado)) {
                echo "<option  value='" . $salida[$codCampo] . "'>". htmlentities($salida[$valorCampo]).' ('.$salida[$codCampo].") </option>";
            }
            echo "</select></br>";
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
        function cargardorLista2($nombreTabla, $codCampo, $valorCampo1, $valorCampo2, $visibles=1,$opcionSeleccione=null) {
            iniciaBD();
            $query = "SELECT * FROM $nombreTabla";
            $resultado = mysql_query($query);
            $opcion0="";
            
            
            $select = "<select multiple='multiple' name='".$nombreTabla."[]' size='$visibles' ";
            if($opcionSeleccione){
                $select .= "class='Obligado'";
                 $opcion0 = "<option  value='' SELECTED>$opcionSeleccione";
            }
            
            $select .= ">";
            // $select = $select .">";
            
            
            echo $select;
            echo $opcion0;
            
            while ($salida = mysql_fetch_array($resultado)) {
                echo "<option  value='" . $salida[$codCampo] . "-" . strtoupper(substr($salida[$valorCampo1], 0, 3)) . "'>" . htmlentities($salida[$valorCampo1]) . "," . htmlentities($salida[$valorCampo2]) . "</option>";
            }
            echo "</select></br>";
        }
        
        /**
         *
         * @param type $nombreTabla
         * @param type $cat_dewey
         * @param type $apellido_3
         * @param type $titulo_3
         * @param type $nombre_titulo
         * @param type $visibles 
         */
        function cargardorListaTitulos($nombreTabla, $cat_dewey, $apellido_3, $titulo_3, $nombre_titulo, $visibles=1) {
            iniciaBD();
            $query = "SELECT $cat_dewey, $apellido_3, $titulo_3, $nombre_titulo FROM $nombreTabla";
            $resultado = mysql_query($query);

            echo "<select name='$nombreTabla' size='$visibles'>";
            while ($salida = mysql_fetch_array($resultado)) {
                echo "<option  value='" .$salida[$cat_dewey]."-".$salida[$apellido_3]."-" .$salida[$titulo_3]."'>".$salida[$cat_dewey]."-".$salida[$apellido_3]."-" .$salida[$titulo_3]
              . " " . htmlentities($salida[$nombre_titulo]) . "</option>";
            }
            echo "</select>";
        }  
        /**
 * Aqui podemos elegir el tipo de plantilla que queremos
 * @author Biblos-g3
 * @version 1.0.1
 */
function fijaPlantillaCSS() {
    echo "<LINK href='../recursos/plantilla" . $_SESSION['tema'] . ".css' rel='stylesheet' type='text/css'>\n";
}
?>
