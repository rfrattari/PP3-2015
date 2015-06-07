<html>
    <head>
        <title>Formulario de registro</title>

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


        <center><h2> Agregar un usuario </h2></center>
        <center><form class ='alta' method="POST" action="process_form_user.php">

                <div><label for ="name">Name </label>
                    <input name="name" type="text" placeholder="Escriba su nombre" required="autofocus"></div>

                <div><label for ="lastname">Lastname </label>
                    <input name="lastname" type="text" placeholder="Escriba su apellido" required="autofocus"></div>

                <div><label for ="password">Password </label></div>
                <div><input name="password" type="password" placeholder="Escriba su password" required="autofocus"></div>

                <div><label for ="password_again">Password </label>
                    <input name="password_again" type="password" placeholder="Repita su password" required="autofocus"></div>

                <div><label for ="email">Email </label>
                    <input name="email" type="text" placeholder="Escriba su email" required="autofocus"></div>

                <div><label> Tipo de Usuario 
                        <select name="tipo"   >

                            <?php
                            require_once 'funciones.php';
                            $link = conectarse();
                            $campo = "name";
                            $tabla = "user_type";
                            cargarcombo($campo, $tabla);
                            ?>

                        </select></div>
                </label>

                <center><input type="submit" value="Agregar" ></center>
                </br>
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


