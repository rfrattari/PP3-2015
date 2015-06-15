<?php

session_start();
require('funcion.php');
?>
<!DOCTYPE html>
<html lang = es-AR>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <meta charset=UTF-8 >
        <title> Agregar usuario </title>
    </head>
    <body>
        <div class="grid"> 
            <?php
            if (!isset($_SESSION['usuario_nombre'])) {
                header('Location: index.php');
            } else {
                ?>
                <div class='usuario'> 
                    <?php
                    echo("<H4>Bienvenido, " . $_SESSION['usuario_nombre'] . "</H4>");
                    ?>
                    <form action="menu.php"><input type="submit" value="Menu" /></form>
                    <form action="logout.php"><input type="submit" value="Cerrar sesion" /></form>
                </div> 
                <?php
                $link = conectarlocal();
                ?>
                <div class='grid'>
                    <form name="cargarusuario" action="save_data.php" method="post" >
                        <h3>Agregar usuario </h3>
                        <label name="txtusuario">Nombre </label><input  type="text" name="txtusuario" size="20">
                        <br>
                        <label name="txtapellido">Apellido </label><input  type="text" name="txtapellido" size="20">
                        <br>
                        <label name="txtpassword">Contraseña </label><input  type="password" name="txtpassword" size="20">
                        <br>
                        <label>Confirmar Contraseña:</label><input type="password" name="txtpassword_conf" maxlength="15" />
                        <br />
                        <label>Email:</label><input type="text" name="usuario_email" maxlength="50" />
                        <br />
                        <label name="txttypeuser">Tipo de usuario </label>
                        <?php
                        $namecombo = "boxtype_user";
                        combobox("$namecombo", "user_type", "name");
                        ?>
                        <br>
                        <input class="botones" type="submit"  name="btnagregar" value="Agregar">
                    </form>
                </div>
                <?php
                mysql_close($link);
            }
            ?>
    </body>
</html>