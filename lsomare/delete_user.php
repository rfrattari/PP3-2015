<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">


    </head>

    <body>
        <ul class="navbar">
            <li><a href="form_user.php">Nuevo usuario</a>
            <li><a href="form_type.php"> Nuevo tipo de usuario</a>
            <li><a href="listar_usuario.php">Listado de usuario</a>
            <li><a href="list_type.php">Listado de tipos</a>
            <li><a href="sesion.php">Salir</a>
        </ul>

        <?php
        session_start();

        if ($_SESSION['logueado']) {
            echo '<h3>Bienvenido : ' . $_SESSION['name'] . ' ', $_SESSION['lastname'] . '</br>';
        } else {
            echo 'No estas logueado';
        }
        ?>


        <?php
        include("funciones.php");

        $link = conectarse();
        $id = $_GET["id"];
        //guardar el id a eliminar
        session_start();
        ob_start();
        $_SESSION['ideliminar'] = $id;

        $query = mysql_query("SELECT * FROM user WHERE id=" . $id, $link) or die(mysql_error());

        if ($consulta = mysql_fetch_array($query)) {
            $query = mysql_query("DELETE FROM user WHERE id=" . $id, $link) or die(mysql_error());

            ECHO 'Datos eliminados correctamente';
        } else {
            echo ' Los datos no han sido eliminados';
        }
        ?>
        </br></br>
    <center><li><a href="listar_usuario.php">Volver</a></center>
</body>
</head>
</html>
