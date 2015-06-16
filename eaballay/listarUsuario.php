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

include 'pp3_db.php';
$query= 'SELECT * FROM user;';
$result = mysql_query($query,$link2);
session_start();
if (!isset($_SESSION['form'])){
	header('location:index.php');
};
$for = $_SESSION['form'];
$userType = $for['user_type'];
$nameUser = $for['name'];
$idEdit = $for['id'];
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
              <?php if ($userType == '1'){?>
              <li><a href="add_user_type.php">Agregar Tipo de usuario</a></li>
              <?php }?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
<?php 
      if ($userType == '1'){
	if (!$result) {
		echo 'No se pudo ejecutar la consulta: ' .mysql_error();
		exit;}?>
		<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>
    <?php 	
		while ($fila = mysql_fetch_array($result)){
		$id = $fila['id'];
		echo '<tr>';
		echo '<td>'.$fila['name'].'</td>';
		echo  '<td>'.$fila['email'].'</td>';
		echo  '<td class="text-center">'."<a class='btn btn-info btn-xs' href='users.php?id=$id'><span class='glyphicon glyphicon-edit'></span> Editar</a> <a href='delete_user_type.php.php?id=$id' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
		echo  '</tr>';
		
		}
	}
	else {?>
	    </table>
    </div>
</div>
			<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <?php 
    		if (!$result) {
			echo 'No se pudo ejecutar la consulta: ' .mysql_error();
			exit;}
		
			while ($fila = mysql_fetch_array($result)){
				$id = $fila['id'];

				if ($id == $idEdit){
					echo '<tr>';
					echo '<td>'.$fila['name'].'</td>';
					echo  '<td>'.$fila['email'].'</td>';
					echo  '<td class="text-center">'."<a class='btn btn-info btn-xs' href='users.php?id=$id'><span class='glyphicon glyphicon-edit'></span> Editar</a></td>";
					echo  '</tr>';
				/*	echo '<td> '.$fila['name'].' '."<a href='users.php?id=$id' >Editar </a>";
					*/
				}
				else{
				echo '<td>'.$fila['name'].'</td>';
				echo  '<td>'.$fila['email'].'</td>';
				echo  '</tr>';
				}
		
		
		   }	
	
		   }	


?>
	   	 </table>
    </div>
</div>
	
	</body>
</html>