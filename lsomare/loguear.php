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

    require_once 'funciones.php';
    $link = conectarse();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];


    $query = "SELECT user.name AS name ,user.lastname AS lastname,user_type.name AS tipo FROM user INNER JOIN user_type ON user.user_type_id=user_type.id  WHERE user.email='" . $email . "' AND password='" . $password . "'";

    $consulta = mysql_query($query, $link);
    $resul = mysql_fetch_assoc($consulta);

    if (isset($resul)) {
        $_SESSION['logueado'] = true;
        $_SESSION['tipo'] = $resul['tipo'];
        $_SESSION['name'] = $resul['name'];
        $_SESSION['lastname'] = $resul['lastname'];


        header('location: logueado.php');
    } else {
        echo 'error al iniciar sesion';
    }
    ?>
    </br></br>
<center><li><a href="login.php">Salir</a></center>
</body>
</html>
