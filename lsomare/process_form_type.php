<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        session_start();

        if ($_SESSION['logueado']) {
            echo '<h3>Bienvenido : ' . $_SESSION['name'] . ' ', $_SESSION['lastname'];
        } else {
            echo 'No estas logueado';
        }
        ?>
        <?php
        include('funciones.php');

        $name = $_POST['name'];

        $funciones = mysql_connect('localhost', 'root', 'nutrifood')or die('problemas al conectar');
        mysql_select_db('pp3_db', $funciones)or die('problemas de conexion');


        mysql_query("INSERT INTO user_type (name) VALUES ('$name')", $funciones);
        echo 'Registro agregado';
        ?>
    <center><h3><a href="form_type.php?accion=volver">Volver al formulario</a></h3> </center>
    </br></br>
    <center><li><a href="login.php">Salir</a></center>
</body>
</html>
