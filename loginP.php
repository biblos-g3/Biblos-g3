<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
    </head>
    <body>
        <?php
        session_start();

        $dni = $_POST['dni'];
        $clave = $_POST['clave'];
        $tema = $_POST['tema'];
        if (!$dni || !$clave) {
            echo "No has introducido todos los detalles requeridos.<br>"
            . "Por favor vuelve e inténtalo de nuevo.";
            exit;
        }
        @ $sgdb = mysql_pconnect("localhost", "biblosa", "1234");
        if (!$sgdb) {
            echo "Error: No se puede conectar al servidor. Por favor inténtalo de nuevo.";
            exit;
        }
        $db = mysql_select_db("biblos_g3");
        if (!$db) {
            echo "Error: No se puede conectar al servidor. Por favor inténtalo de nuevo.";
            exit;
        } else {
            echo "Entramos a la bd ";
            // Usuario y contrasena ok?
            $sql = "SELECT * FROM usuario WHERE dni='$dni' AND clave='$clave'";
            $resultado = mysql_query($sql);
            if (mysql_affected_rows() == 1) {
                // Login correcto
                $usuario = mysql_fetch_array($resultado);
                echo "Hola " . $usuario['nombre_usuario'] . " (" . $usuario['tipo_id_tipo_usuario'] . ")<br>";
                echo "<a href='menuG.php'>Dentro</a>";

                // Apertura de sesion
                $_SESSION['usuario'] = $usuario;
            }
            else
                echo "Usuario / contraseña incorrectos";
        }
        ?>
    </body>
</html>
