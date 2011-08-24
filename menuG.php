<?php
include "funciones.php";
controlSesion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Men&uacute; principal</title>
        <link href="./recursos/menu.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <?php
        echo "Usuario:" . $usuario['nombre_usuario'];
        ?>
        <h3>Opciones</h3>
        <ul> 
            <li>Consultas</li>
            <ul>        
                <li><a href="consulta_general.php">Consulta general</a></li> 
                <li><a href="cespecificaG.php">Consulta especifica</a></li> 
            </ul>
            <?php
            if ($usuario['tipo_id_tipo_usuario'] == 0) {
                
                mostrarOpcionesAdministracion();
            }
            ?>
            
            <li><a href="salida.php">Log Out</a></li> 
        </ul> 
    </body>
</html>
<?php

    function mostrarOpcionesAdministracion(){
        echo "<li>Adminsitraci&oacute;n</li>
            <ul>        
                <li><a href=''>Cat&aacutelogo</a></li> 
                <li><a href=''>Usuarios</a></li> 
            </ul>
            ";
}
?>