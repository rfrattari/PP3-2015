<?php

require('funcion.php');
?>
<!doctype html>
<html lang = es-AR>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <meta charset=UTF-8 >
        <title>Recuperar contraseña</title>
    </head>
    <body>
        <?php
        $link = conectarlocal();
        if (isset($_POST['enviar'])) { // compruebo que se han enviado los datos del formulario
            if (empty($_POST['usuario_email'])) {
                $mensaje = "No ha ingresado el usuario.";
                print "<script>alert('$mensaje')</script>";
                print("<script>window.location.replace('recuperar_contrasena.php');</script>");
            } elseif (!valida_email($_POST['usuario_email'])) { // verifico que el email ingresado sea correcto
                $mensaje = "El email ingresado no es válido.";
                print "<script>alert('$mensaje')</script>";
                print("<script>window.location.replace('recuperar_contrasena.php');</script>");
            } else {
                $usuario_email = $_POST['usuario_email'];
                $usuario_email = trim($usuario_email);
                $sql = mysql_query("SELECT name, lastname, password, email FROM user WHERE email='" . $usuario_email . "'");
                if (mysql_num_rows($sql)) {
                    $row = mysql_fetch_assoc($sql);
                    $num_caracteres = "10"; // asigno el número de caracteres que va a tener la nueva contraseña
                    $nueva_clave = substr(md5(rand()), 0, $num_caracteres); // genero una nueva contraseña de forma aleatoria
                    $usuario_nombre = $row['name'];
                    $usuario_apellido = $row['lastname'];
                    $usuario_clave = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario
                    $usuario_clave2 = md5($usuario_clave); // encripto la nueva contraseña para guardarla en la BD
                    $usuario_email = $row['email'];
                    // actualizo los datos (contraseña) del usuario que solicitó su contraseña
                    mysql_query("UPDATE user SET password='" . $usuario_clave2 . "' WHERE email='" . $usuario_email . "'");
                    // Envio por email la nueva contraseña
                    $remite_nombre = "horacio";
                    $remite_email = "horaciobajo@yahoo.com.ar";
                    $asunto = "Recuperación de contraseña";
                    $mensaje = "Se ha generado una nueva contraseña para el usuario <strong>" . $usuario_nombre . "</strong>. La nueva contraseña es: <strong>" . $usuario_clave . "</strong>.";
                    $cabeceras = "From: " . $remite_nombre . " <" . $remite_email . ">\r\n";
                    $cabeceras = $cabeceras . "Mime-Version: 1.0\n";
                    $cabeceras = $cabeceras . "Content-Type: text/html";
                    $enviar_email = mail($usuario_email, $asunto, $mensaje, $cabeceras);
                    if ($enviar_email) {
                        $mensaje = "La nueva contraseña ha sido enviada al email asociado al usuario " . $usuario_nombre . ".";
                        print "<script>alert('$mensaje')</script>";
                        print("<script>window.location.replace('index.php');</script>");
                    } else {
                        $mensaje = "No se ha podido enviar el email.";
                        print "<script>alert('$mensaje')</script>";
                        print("<script>window.location.replace('index.php');</script>");
                    }
                } else {
                    $mensaje = "El usuario <strong>" . $usuario_nombre . "</strong> no está registrado.";
                    print "<script>alert('$mensaje')</script>";
                    print("<script>window.location.replace('index.php');</script>");
                }
            }
        } else {
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <center>
                    <H1>Recuperar contraseña</H1>
                </center>
                <label>Usuario/Email:</label><br />
                <input type="text" name="usuario_email" /><br />
                <input type="submit" name="enviar" value="Enviar" />
            </form>
            <?php
        }
        mysql_close($link);
        ?> 
    </body>
</html>