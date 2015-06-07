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
        } else {
            echo 'No estas logueado';
        }
        ?>

        <?php
        include('funciones.php');



        $link = conectarse();
//consulto si existen y si no estan vacias las variables


        $name = $_POST['name'];
        $password = $_POST['password'];
        $lastname = $_POST['lastname'];
        $password_again = $_POST['password_again'];
        $tipo = $_POST['tipo'];
        $email = $_POST['email'];

        $sql = "SELECT id FROM user_type WHERE name='$tipo'";
        $result = mysql_query($sql) or die(mysql_error);


        while ($row = mysql_fetch_array($result))
            $id = $row[0];


        $query = "INSERT INTO user (name,lastname,password,password_again,user_type_id,email) VALUES ('" . $name . "','" . $lastname . "','" . $password . "','" . $password_again . "','" . $id . "','" . $email . "')";
        $result = mysql_query($query);

        echo 'Usuario agregado con exito!';
        ?>

    <center><h3><a href="form_user.php?accion=volver">Volver al formulario</a></h3> </center>
</html>