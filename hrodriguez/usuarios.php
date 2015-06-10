<!DOCTYPE html>
    <html lang = es-AR>
        <head>
            <link rel="stylesheet" type="text/css" href="css/styles.css">
            <meta charset=UTF-8 >
            <title> Usuarios </title>
        </head>
    <body>
    <div class="grid">
    <?php
    session_start();
    if (!isset($_SESSION['usuario_nombre'])){
        header('Location: index.php');
        } else {?>
        <div class='usuario'> 
        <?php
        echo("<H4>Bienvenido, ".$_SESSION['usuario_nombre']."</H4>");
        ?>
        <form action="menu.php"><input type="submit" value="Menu" /></form>
        <form action="logout.php"><input type="submit" value="Cerrar sesion" /></form>
        </div> 
        <?php
        require 'funcion.php';
        $link = conectarlocal();
        $consulta ="SELECT user.id, user.name as username, user.email, type_user.name  as typename FROM user inner join type_user on user.type_user_id = type_user.id";
        $datos = mysql_query($consulta);
        $fieldarray = array("id","Nombre","Email","Usuario");
        if ($_SESSION['type']=='root'){
            $type="submit";
            $view="";
            }
        else{
            $type="hidden";
            $view="display:none";
            }
        lista($consulta,$fieldarray,$view);
        ?>
        <br>
        <form action="cargarusuario.php">
        <input class="botones" type="<?php echo $type; ?>" value="Alta/Nuevo" /></form>
    <?php
        mysql_close($link);
    }
    ?>
    </div>
    </body>
    </html>