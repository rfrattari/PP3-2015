<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Inicio - Formularios</title>

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
  <?php 
    require 'functions.php';
    $link = conectardb('localhost','root','','formularios');
  ?>
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
            <?php 
              session_start();
              if (!isset($_SESSION['id'])){
                echo '<li><a href="account.php?rol=create">Registrarse</a></li>';
              }
             ?>
          </ul>

          <?php 
             if (!isset($_SESSION['name'])) { ?>
              <form class="navbar-form navbar-right" name="login" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
                <input type="hidden" name="code" value="login">
                <div class="form-group">
                  <input type="text" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Ingresar</button>
              </form>
            <?php
              } else { ?>
                  <form class="navbar-form navbar-right" name="login" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
                    <div class="form-group">
                      <label style="color: white">Bienvenido <?php echo ' '.$_SESSION['name'].' '.$_SESSION['lastname'] ?></label>
                    </div>
                    <input type="hidden" name="code" value="logout">
                    <button type="submit" class="btn btn-danger">Salir</button>
                  </form>
                </div>
                <?php
              }
            ?>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

    <?php
    if (isset($_POST['code'])){

      if ($_POST['code'] == "logout"){
        session_start();
        session_destroy();
        header('Location: index.php');
      }

      if ($_POST['code'] == "login"){
        $query = 'SELECT * FROM user WHERE email ="'.$_POST['email'].'" AND password ="'.md5($_POST['password']).'"';

        $result = mysql_query($query, $link);

        if (!$result){
          echo 'Error';
        } else {
          $row = mysql_fetch_array($result);
          if ($row['id'] == ""){
            ?>
            <br>
            <div class="alert alert-danger" role="alert">
              <strong>Algo anda mal!</strong> El usuario y/o contraseña es incorrecto.
            </div>
            <?php 
          } else {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['type'] = $row['user_type_id'];
            ?>
            <br>
            <div class="alert alert-success" role="alert">
              <strong>Bien hecho!</strong> Has logrado ingresar correctamente.
              <?php 
                header('Location: index.php');
              ?>
            </div>
            <?php 
          }
        }
      } ##### if ('code' == "login")
    } ##### If isset($_POST['code'])
    ?>

    <?php if (isset($_SESSION['id'])){ ?>
      <div class="col-md-12" style="margin-top: 20px">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Range</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if ($_SESSION['type'] == "1"){
                    $query = 'SELECT user.id, user.name, user.lastname, user.email, user.user_type_id, user_type.name AS "type" FROM user INNER JOIN user_type ON user.user_type_id = user_type.id';
                  } else {
                    $query = 'SELECT user.id, user.name, user.lastname, user.email, user.user_type_id, user_type.name AS "type" FROM user INNER JOIN user_type ON user.user_type_id = user_type.id WHERE user.id ='.$_SESSION['id'];  
                  }
                    
                  $result = mysql_query($query, $link);
                  if (!$result){
                    echo "Error!";
                  } else {
                    while ($row = mysql_fetch_array($result)){
                      echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['lastname']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['type']."</td>";
                        echo '<td><a href="account.php?rol=edit&value='.$row["id"].'" class="btn btn-sm btn-success">Edit</a></td>';
                        echo '<td><a href="account.php?rol=delete&value='.$row["id"].'" class="btn btn-sm btn-danger">Delete</a></td>';
                      echo "</tr>";
                    }
                  }
                  
                ?>
              </tbody>
            </table>
          </div>
        <?php } ?>



    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  

</body></html>