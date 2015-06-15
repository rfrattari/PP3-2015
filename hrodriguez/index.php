<?php

session_start();
require('funcion.php');
?>
<!DOCTYPE html>
<html lang = es-AR>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <meta charset=UTF-8 >
        <title> Practico de usuarios </title>
    </head>
    <body>
        <div id="login">
            <fieldset class="login">
                <?php
                $link = conectarlocal();
                if (empty($_SESSION['usuario_email'])) { // compruebo que las variables de sesión estén vacías        
                    ?>
                    <form name="login" action="comprobar.php" method="post">
                        <center>
                            <H1>Login</H1>
                        </center>
                        <fieldset class="input"><label name="lblusuario_email">Usuario/Email </label><input class="cajas" type="text" placeholder="Ingrese su usuario" value="" name="usuario_email" size="20"></fieldset>
                        <br>
                        <fieldset class="input"><label name="lblusuario_clave">Contraseña </label><input class="cajas" type="password" placeholder="Ingrese su contraseña" value=""  name="usuario_clave" size="20"</label></fieldset>
                        <br>
                        <a href="recuperar_contrasena.php">Recuperar contraseña</a><br/>
                        <center>
                            <input class="botones" type="submit" name="enviar" value="Ingresar">
                        </center> 
                    </form> 
                    <?php
                } else {
                    header('Location: logout.php');
                }
                mysql_close($link);
                ?>
            </fieldset>
        </div>
    </body>
</html>