<?php
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['usuario'])) 
{
  header('Location: login.php'); 
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Bienvenido <?php echo $_SESSION['usuario']; ?></title>


        <link href="css/bootstrap.min.css" rel="stylesheet">


        <link href="css/jumbotron.css" rel="stylesheet">


    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">


            </div>
        </nav>


        <div class="jumbotron">
            <div class="container">
                <h1>Hello,<?php echo $_SESSION['nombreusuario']; ?></h1>


                <p> <?php
                    if ($_SESSION['idtipousuario'] == 1) {
                        echo "usted es admin : puede editar y borrar";
                        echo "<p><a class='btn btn-primary btn-lg' href='list_usuarios.php' role='button'>Listar usuarios</a> </p>";
                        echo "<p><a class='btn btn-primary btn-lg' href='form_user_type.php'role='button'>Alta de nuevo usuario</a></p>";
                        echo "<p><a class='btn btn-primary btn-lg' href='form_user_tipos.php'role='button'>Alta de un tipo de usuario</a></p>";
                        echo "<p><a class='btn btn-primary btn-lg' href='list_user_type.php'role='button'>Listar tipos de Usuario </a></p>";
                    } else {
                        echo "<p><a class='btn btn-primary btn-lg' href='list_usuarios.php' role='button'>Listar usuarios</a> </p>";
                    }
                    ?></p>



            </div>
        </div>



        <hr>

        <footer>
            <p>php  2015</p>
        </footer>
    </div> ->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>


<a href="logout.php">Cerrar Sesión</a>
 