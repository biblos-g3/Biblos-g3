<?php
/**
 * Se encarga de la parte de interfaz de modificacion en el catalogo de la biblioteca
 * @author Nunhez
 * @abstract Interfaz grafica modificacion de catalogo 
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
        <title> Modificar Usuario</title>
        <script type="text/javascript" src="./recursos/funciones.js"></script>
        <style type="text/css">@import url(../css/calendar.css);</style>  
        <!--<script type="text/javascript" src="js/calendar.js"></script>-->
        <!--<script type="text/javascript" src="js/calendar-es.js"></script>-->
        <!--<script type="text/javascript" src="js/calendar-setup.js"></script>-->
        <!--<script type="text/javascript" src="js/validaciones1.js"></script>-->
    </head>
    <body>
        <?php
       /* iniciaBD();
               
        $query = "SELECT * FROM usuario where din=$dni";
        //echo "$query<br>";
        $resultado = mysql_query($query);

        while ($titulo = mysql_fetch_array($resultado)) {
           
        $dni = $_POST['dni'];
        $clave = $_POST['clave'];
        $nombre_usuario = $_POST['nombre'];
        $apellido1_usuario = $_POST['apellido_1'];
        $apellido2_usuario = $_POST['apellido_2'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $plantilla_id_plantilla = $_POST['plantilla'];
        $tipo_id_tipo_usuario = $_POST['tipo_usuario'];
        }
        */
        ?>

        <form action="modificarUsuarioP.php" method="post"onSubmit="return Valida(this);">
            <fieldset>            
                <legend>Modificar Usuario</legend>   
                T&iacute;tulo para la modificacion:<?php echo " $nombre_titulo"; ?><br />
                    <label>*D.N.I:</label>
                    <?php
                    cargardorLista_selected("usuario", "dni", "nombre_usuario", 1, "Seleccione opci&oacute;n");
                    ?><br />
                    <label>*Clave:</label>
                    <?php
                    cargardorLista("usuario", "clave", "nombre_suario");
                    ?><br />
                    <label>*Nombre:</label>
                    <?php
                    cargardorLista("usuario", "nombre_usuario","dni", 1, "Seleccione opci&oacute;n");
                    ?><br />
                    <label>*Apellido 1:</label>
                    <?php
                    cargardorLista("usuario", "dni","apellido1_usuario", 1, "Seleccione opci&oacute;n");
                    ?><br />                   
                    <label>*Apellido 2:</label>
                    <?php
                    cargardorLista("usuario", "dni","apellido2_usuario", 1, "Seleccione opci&oacute;n");
                    ?><br />
                    <label>*Email</label>
                    <input name="email" type="text" size="25" maxlength="25" class="Obligado"/><br />
                    <label>*Telefono</label>
                    <input name="telefono" type="text" size="9" maxlength="9" class="Obligado" /><br />
                    <label>*Direccion</label>
                    <input name="direccion" type="text" size="50" maxlength="50" class="Obligado"/><br />
                    <label>*Tipo Plantilla:</label>
                    <?php
                    cargardorLista("plantilla", "id_plantilla","nombre_plantilla", 1, "Seleccione opci&oacute;n");
                    ?>
                    <label>*Tipo de Usuario</label>
                    <?php
                    cargardorLista("tipo_usuario", "id_tipo_usuario", "tipo_usuario", 1, "Seleccione opci&oacute;n");
                    ?>
                <br /><input type="submit" value="Modificar">
                <input type="reset" value="Borrar campos">
            </fieldset>
        </form>
    </body>
</html>
<?php

function cargardorLista_selected($nombreTabla, $codCampo, $valorCampo, $valorSeleccionado, $visibles=1) {
    iniciaBD();
    
    $query = "SELECT * FROM $nombreTabla";
    
    $resultado = mysql_query($query);

    echo "<select name='$nombreTabla' size='$visibles'>";
    while ($salida = mysql_fetch_array($resultado)) {
        echo "<option ";
        if ($valorSeleccionado == $salida["$codCampo"]) {
            echo "selected";
        }
        echo " value='" . $salida[$codCampo] . "'>" . htmlentities($salida[$valorCampo]) . ' (' . $salida[$codCampo] . ") </option>\n";
    }
    echo "</select></br>";
}
?>
