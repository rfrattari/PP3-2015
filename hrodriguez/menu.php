<?php

session_start();
require('funcion.php');
?>
<!DOCTYPE html>
<html lang = es-AR>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <meta charset=UTF-8 >
        <title> Menu </title>
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
                    <form action="logout.php"><input type="submit" value="Cerrar sesion" /></form>
                </div>
                <?php
                $link = conectarlocal();
                if ($_SESSION['type'] == 'root') {
                    $type = "submit";
                } else {
                    $type = "hidden";
                }
                ?>
                <br>
                <form action="usuarios.php">
                    <input class="botones" type="submit" value="Usuarios" /></form>
                    <?php
                    mysql_close($link);
                }
                ?>
        </div>
    </body>
</html>