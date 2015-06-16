<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
	session_start();
if (!isset($_SESSION['form'])){
	header('location:index.php');
};
$for = $_SESSION['form'];
$nameUser = $for['name'];
?>
      <nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" ><?=$nameUser ?> </a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="listarUsuario.php">Home</a></li>
              <li><a href="sessionDestroy.php">Desconectar</a></li>
              <li><a href="add_user_type.php">Agregar Tipo de usuario</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>

<form method="POST" action = 'insert_type.php' >
	<label for='name'>Nombre</label>
	<input name="name" type="text" placeholder="Escriba su nombre"  >
	<br>
	<input type="submit"  value="Enviar" />
</form>
</body>
</html>