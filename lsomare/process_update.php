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
        echo 'Bienvenido : ' . $_SESSION['name'];
    } else {
        echo 'No estas logueado';
    }
    ?>
    
    <?php
    include 'funciones.php';
    $link = conectarse();

    session_start();
    ob_start();

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $password_again = $_POST['password_again'];
    $tipo = $_POST['tipo']; //el nombre
    $email = $_POST['email'];

    //encriptar password
    //$password = md5($password);
    //$password_again = md5($pass);

    if ((strlen($password) > '7') and ( strlen($password_again) > '7') and ( $password == $password_again)) {

            //obtener el ID a partir del nombre
        $sql = "SELECT id FROM user_type WHERE name='$tipo'";
        $result = mysql_query($sql) or die(mysql_error);


        while ($row = mysql_fetch_array($result))
            $id = $row[0];

    }

    $query = "UPDATE user SET name='" . $name . "', lastname='" . $lastname . "', password='" . $password . "',password_again='" . $password_again . "',user_type_id='" . $id . "',email='" . $email . "'  WHERE id=" . $_SESSION['idmodificar'] . ";";
    $result = mysql_query($query) or die('error' . mysql_error());

//echo "exito";
    header('location: listar_usuario.php');

    mysql_close($link);
    ?>

</body>
</html>





