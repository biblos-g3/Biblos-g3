<?php
session_start();
if (!$_SESSION['usuario'] || !isset($_SESSION['usuario']))
    die("logeate primero");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Salida</title>
    </head>
    <body>
        <h4>Logout.... Saliendo</h4>  
        <?php
        $_SESSION['usuario'] = "";
        session_destroy();
        ?>
        <br><a href="../index.php">Voler a loguearse</a>
    </body>
</html>
