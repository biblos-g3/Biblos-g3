<?php
include "recursos/funciones.php";
iniciaBD();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <link href="css/login.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div id="login">
            <H1>Login</H1>
            <h4>Bilioteca PAI</h4>
            <form action="usuario/loginP.php" method="post">
                DNI<br />
                <input name="dni" type="text" size="20" maxlength="20" /><br />
                Contraseña<br />
                <input name="clave" type="password" size="20" maxlength="20" /><br />
                Tema<br />
                <?php cargardorLista("plantilla", "id_plantilla", "nombre_plantilla", 1, "Seleccione");?>
                <input type="submit" value="Logearse">
                <input type="reset" value="limpiar">
            </form>
        </div>
    </body>
</html>
