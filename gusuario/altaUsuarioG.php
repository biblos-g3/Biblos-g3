<?php
/**
 * Se encarga de la parte de interfaz de altas de usuarios de la biblioteca
 * @author Nunhez
 * @abstract Interfaz grafica alta catalogo 
 * 
 */
include "../recursos/funciones.php";
controlSesion();
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Alta de Usuario</title>
        <style type="text/css">@import url(../css/calendar.css);</style>  
        <?php fijaPlantillaCSS(); ?>
        <!--<link href="../recursos/" type="text/css" rel="stylesheet" /> -->
        <!--<script type="text/javascript" src="../js/calendar.js"></script>-->
        <!--<script type="text/javascript" src="../js/calendar-es.js"></script>-->
        <!--<script type="text/javascript" src="../js/calendar-setup.js"></script>-->
        <!--<script type="text/javascript" src="../js/validaciones1.js"></script>-->
    </head>
    <body>
        <form action="altaUsuarioP.php" method="post">
            <fieldset>            
                <legend>Alta Usuario</legend>
                <label>*D.N.I:</label>
                <input name="dni" type="text" size="8" maxlength="8" class="Obligado"/><br />
                <label>*Clave:</label>
                <input name="clave" type="text" size="8" maxlength="8" class="Obligado"/><br />
                <label>*Nombre:</label>
                <input name="nombre" type="text" size="25" maxlength="25" class="Obligado"/><br />
                <label>*Apellido 1:</label>
                <input name="apellido_1" type="text" size="25" maxlength="25" class="Obligado"/><br />
                <label>*Apellido 2:</label>
                <input name="apellido_2" type="text" size="25" maxlength="25" class="Obligado"/><br />
                <label>*Email</label>
                <input name="email" type="text" size="25" maxlength="25" class="Obligado"/><br />
                <label>*Telefono</label>
                <input name="telefono" type="text" size="9" maxlength="9" class="Obligado" /><br />
                <label>*Direccion</label>
                <input name="direccion" type="text" size="50" maxlength="50" class="Obligado"/><br />
                <label>*Tipo Plantilla:</label>
                <?php
                cargardorLista("plantilla", "id_plantilla", "nombre_plantilla", 1, "Seleccione opci&oacute;n");
                ?>
                <label>*Tipo de Usuario</label>
                <?php
                cargardorLista("tipo", "id_tipo_usuario", "tipo_usuario", 1, "Seleccione opci&oacute;n");
                ?>

                <br /><input type="submit" value="Dar de alta">
                <input type="reset" value="Borrar campos">
            </fieldset>
        </form>
        <br><a href="../usuario/menuG.php">Volver al men&uacute;</a>
    </body>
    <script type="text/javascript">

        Calendar.setup(
        {
            inputField  : "fecha_publicacion",
            ifFormat    : "%d/%m/%Y",
            button      : "trigger"          
        });
        
        Calendar.setup(
        {
            inputField  : "fecha_adquisicion",
            ifFormat    : "%d/%m/%Y",
            button      : "trigger2"          
        });   
    </script>  
</html>
