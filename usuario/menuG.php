<?php
include "../recursos/funciones.php";
controlSesion();
$usuario = $_SESSION['usuario'];
$tema = $_SESSION['tema'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Men&uacute; principal</title>
        <?php fijaPlantillaCSS(); ?>
    </head>
    <body>
        <?php
        echo "Usuario: " . $usuario['nombre_usuario'];
        ?>
        
        <h3>Opciones</h3>
        <div class='contenedor'>
            <div class='consultas'>
        <ul> 
            
             <div class="head"><li>Consultas</li></div>
             <div class="box"> <ul>        
                <li><a href="consulta_general.php">Consulta general</a></li> 
                <li><a href="cespecificaG.php">Consulta especifica</a></li> 
            </ul></br>
            </div>
             </div>
            <?php
            if ($usuario['tipo_id_tipo_usuario'] == 0) {

                mostrarOpcionesAdministracion();
            }
            ?>
             </div>
            <li><a href="salida.php">Log Out &oacute; <a href="../index.php">Logeate</a></a></a></li> 
        </ul> 
    </body>
</html>
<?php

function mostrarOpcionesAdministracion() {
    echo "<div class='administracion'><div class='head'><li>Administraci&oacute;n</li></div>
            <div class='box'><ul>        
                <li>Cat&aacutelogo</li> </br>
                 <ul>
                    <li><a href='../gcatalogo/altaCatalogoG.php'>Alta</a></li> 
                    <li><a href='../gcatalogo/bajaCatalogoG.php'>Baja</a></li> 
                    <li><a href='../gcatalogo/modificarCatalogoG.php'>Modificar</a></li> 
                </ul></br>
                <li>Usuarios</li></br> 
                <ul>
                    <li><a href='../gusuario/altaUsuarioG.php'>Alta</a></li> 
                    <li><a href='../gusuario/bajaUsuarioG.php'>Baja</a></li> 
                    <li><a href='../gusuario/modificarUsuarioG.php'>Modificar</a></li> 
                </ul>
            </ul></br> </div></div>
            ";
}
?>