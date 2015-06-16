<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Account - Formularios</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script><style type="text/css"></style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Formularios</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Inicio</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

    <?php 
      require 'functions.php';
      $link = conectardb('localhost','root','','formularios');
     ?>

      <?php if (isset($_GET['rol']) && $_GET['rol'] == "create"){ ?>

        <form class="form-signin" name="register" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" >
          <input type="hidden" name="code" value="register">
        	<h2 class="form-signin-heading">Registro</h2>
          <label for="inputName" class="sr-only">Nombre</label>

          <input type="text" name="name" id="inputName" class="form-control" placeholder="Nombre" required="" autofocus="">
          <label for="inputLastName" class="sr-only">Apellido</label>

          <input type="text" name="lastname" id="inputLastName" class="form-control" placeholder="Apellido" required="" autofocus="">
          <label for="inputEmail" class="sr-only">Email</label>

          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Direccion de email" required="" autofocus="">
          <label for="inputPassword" class="sr-only">Contraseña</label>

          <input type="password" name="password1" id="inputPassword" class="form-control" placeholder="Contraseña" required="">
          <label for="inputPassword2" class="sr-only">Repetir contraseña</label>

          <input type="password" name="password2" id="inputPassword2" class="form-control" placeholder="Repetir contraseña" required="">
          <label for="inputType" class="sr-only">Tipo de usuario</label>

          <?php 
            $combo = cargarcombo($link, 'tipo', 'user_type', 'name');
           ?>
          
          <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>  
        </form>

      <?php } ?>

      <?php if (isset($_GET['rol']) && isset($_GET['value']) && $_GET['rol'] == "edit"){ ?>
        <?php 
          $query = 'SELECT user.id, user.name, user.lastname, user.email, user.user_type_id FROM user WHERE user.id ='.$_GET['value'];

          $result = mysql_query($query, $link); 
          if (!$result){
            echo "Error!";
          } else {
            $row = mysql_fetch_array($result);
          }
        ?>
        <form class="form-signin" name="register" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" >
          <input type="hidden" name="code" value="edit">
          <input type="hidden" name="id" value= <?php echo $_GET['value'];  ?> >
          <h2 class="form-signin-heading">Edicion de usuario</h2>
          <label for="inputName" class="sr-only">Nombre</label>

          <input type="text" name="name" id="inputName" value=<?php echo $row['name']; ?> class="form-control" placeholder="Nombre" required="" autofocus="">
          <label for="inputLastName" class="sr-only">Apellido</label>

          <input type="text" name="lastname" id="inputLastName" value=<?php echo $row['lastname']; ?> class="form-control" placeholder="Apellido" required="" autofocus="">
          <label for="inputEmail" class="sr-only">Email</label>

          <input type="email" name="email" id="inputEmail" value=<?php echo $row['email']; ?> class="form-control" placeholder="Direccion de email" required="" autofocus="">
          <label for="inputPassword" class="sr-only">Contraseña</label>

          <input type="password" name="password1" id="inputPassword" class="form-control" placeholder="Nueva contraseña" required="">
          <label for="inputPassword2" class="sr-only">Repetir contraseña</label>

          <input type="password" name="password2" id="inputPassword2" class="form-control" placeholder="Repetir nueva contraseña" required="">
          <label for="inputType" class="sr-only">Tipo de usuario</label>

          <?php 
            $combo = cargarcombo($link, 'tipo', 'user_type', 'name', $row['user_type_id']);
           ?>
          
          <button class="btn btn-lg btn-success btn-block" type="submit">Editar</button>  
        </form>

      <?php } ?>

      <?php if (isset($_GET['rol']) && isset($_GET['value']) && $_GET['rol'] == "delete"){ ?>
        <?php 
          $query = 'SELECT user.id, user.name, user.lastname, user.email, user.user_type_id FROM user WHERE user.id ='.$_GET['value'];

          $result = mysql_query($query, $link); 
          if (!$result){
            echo "Error!";
          } else {
            $row = mysql_fetch_array($result);
          }
        ?>
        <form class="form-signin" name="register" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" >
          <input type="hidden" name="code" value="delete">
          <input type="hidden" name="id" value= <?php echo $_GET['value'];  ?> >
          <h2 class="form-signin-heading">Eliminacion de usuario</h2>
          <label for="inputName" class="sr-only">Nombre</label>

          <input type="text" name="name" id="inputName" value=<?php echo $row['name']; ?> readonly class="form-control" placeholder="Nombre" required="" autofocus="">
          <label for="inputLastName" class="sr-only">Apellido</label>

          <input type="text" name="lastname" id="inputLastName" value=<?php echo $row['lastname']; ?> readonly class="form-control" placeholder="Apellido" required="" autofocus="">
          <label for="inputEmail" class="sr-only">Email</label>

          <input type="email" name="email" id="inputEmail" value=<?php echo $row['email']; ?> readonly class="form-control" placeholder="Direccion de email" required="" autofocus="">
          <label for="inputType" class="sr-only">Tipo de usuario</label>

          <?php 
            $combo = cargarcombo($link, 'tipo', 'user_type', 'name', $row['user_type_id'], null, true);
           ?>
          
          <button class="btn btn-lg btn-danger btn-block" type="submit">Eliminar</button>  
        </form>

      <?php } ?>







      <?php ############# functions
        if (isset($_POST['code']) && $_POST['code'] == "register" ){
          $query = 'INSERT INTO user (name, lastname, email, password, user_type_id) VALUES ("'.ucwords($_POST['name']).'", "'.ucwords($_POST['lastname']).'","'.$_POST['email'].'", "'.md5($_POST['password1']).'", '.$_POST['tipo'].')';
          
          $execute = mysql_query($query, $link);
          ?>
          <div class="alert alert-success" role="alert">
            <strong>Bien hecho!</strong> Has logrado registrarte satisfactoriamente.
            <a class="btn btn-success" href="index.php">Ingresar</a>  
          </div>
          <?php 
        }

        if (isset($_POST['code']) && $_POST['code'] == "edit" && isset($_POST['id']) ){
          if ($_POST['password1'] <> $_POST['password2']){
            ?>
            <div class="alert alert-danger" role="alert">
              <strong>Las contraseñas no coinciden!</strong> No has podido editar el usuario.
              <a class="btn btn-danger" href="index.php">Volver</a>  
            </div>
            <?php 
          } else {
            $query = 'UPDATE user SET name = "'.ucwords($_POST['name']).'", lastname = "'.ucwords($_POST['lastname']).'", email = "'.$_POST['email'].'", password = "'.md5($_POST['password1']).'", user_type_id = "'.$_POST['tipo'].'" WHERE user.id = "'.$_POST['id'].'" ';
            
            $execute = mysql_query($query, $link);
            ?>
            <div class="alert alert-success" role="alert">
              <strong>Bien hecho!</strong> Has logrado editar el usuario satisfactoriamente.
              <a class="btn btn-success" href="index.php">Volver</a>  
            </div>
            <?php
          } 
        }

        if (isset($_POST['code']) && $_POST['code'] == 'delete' && isset($_POST['id'])){
          $query = 'DELETE FROM user WHERE id = "'.$_POST['id'].'"';
          $result = mysql_query($query, $link);

          if (!$result){ ?>
            <div class="alert alert-danger" role="alert">
              <strong>Error!</strong> No has logrado eliminar el usuario satisfactoriamente.
              <a class="btn btn-success" href="index.php">Volver</a>  
            </div> <?php 
          } else {
            ?>
              <div class="alert alert-success" role="alert">
                <strong>Bien hecho!</strong> Has logrado eliminar el usuario satisfactoriamente.
                <a class="btn btn-success" href="index.php">Volver</a>  
              </div>
            <?php 
          }
        }


       ?>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  

</body></html>