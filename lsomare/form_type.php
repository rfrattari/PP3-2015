<html>
    <head>
        <title>Formulario de registro de tipos de usuarios</title>
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
        $tipo = $_POST['tipo'];

        if ($_SESSION['logueado']) {
            echo '<h3>Bienvenido : ' . $_SESSION['name'] . ' ', $_SESSION['lastname'] . '</br>';

            if ($_SESSION['tipo'] === 'admin') {
                ?>

                </br>
            </h3>


        <center><h2> Agregar un tipo de usuario </h2></center>
        <center><form class='alta' method="POST" action="process_form_type.php">

                <div><label for ="name">Name </label>
                    <input name="name" type="text" placeholder="Escriba nombre del tipo" required="autofocus"></div>


                <center><input type="submit" value="Agregar tipo" ></center>
                </br></br>

                <?php
            } else {
                echo 'Usted no esta autorizado para ingresar un nuevo usuario';
            }
        } else {
            echo ' No estas logueado';
        }
        ?>
    </form>

</body>
</head>
</html>
