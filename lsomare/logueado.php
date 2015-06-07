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
            echo '<h3>Bienvenido : ' . $_SESSION['name'] . ' ', $_SESSION['lastname'];
            ?>
        <center><h3> En este sitio usted podra agregar usuarios y listarlos</h3></center>
        </br>
        <center><h3> Seleccione la opcion de menu que desee</h3></center>
        <?php
    } else {
        echo 'No estas logueado';
    }
    ?>
    </br></br>
    <center><li><a href="login.php">Salir</a></center>
</body>
</html>
