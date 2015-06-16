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

$name = '';
$lastname = '';
$email = '';
$FAccion = '';
$id 	= '';
include 'pp3_db.php';
if(isset($_GET['id'])){
	$idEdit = $_GET['id'];	
}

if (isset($idEdit)){
	session_start();
	$for = $_SESSION['form'];	
	
}

if (isset($_SESSION['form'])){

$query= "SELECT * FROM users where id = '".$idEdit."'";
$result = mysql_query($query,$link2);
$editar = mysql_fetch_array($result);

$name = $editar['name'];
$lastname = $editar['lastname'];
$email = $editar['email'];
$FAccion = $for['FAccion'];
$id 	= $for['id'];
}
?>


<form class="form-horizontal" method="POST" action = 'insertORupdate.php' >
	<div class="form-group">
		<label class="control-label col-xs-3">Nombre:</label>
		<div class="col-xs-9">
			<input class="form-control"  name="name" type="text" placeholder="Escriba su nombre" value ="<?=$name ?>"   >
		</div>
    </div>
    <div class="form-group">
		<label class="control-label col-xs-3">Apellido:</label>
		<div class="col-xs-9">
		<input class="form-control"  name="lastname" type="text" placeholder="Escriba su apellido"  value ="<?=$lastname ?>" >
		</div>
    </div>
    <div class="form-group">
		<label class="control-label col-xs-3">Email:</label>
		<div class="col-xs-9">
			<input class="form-control" name="email" type="email" placeholder="Escriba su email" value ="<?=$email ?>" required>
		</div>
    </div>
    <div class="form-group">
		<label class="control-label col-xs-3">Tipo de usuario:</label>
		<div class="col-xs-9">
			<?php cargarcombo($link2,$id,'nameCombo');?>
		</div>
    </div>
    <div class="form-group">
		<label class="control-label col-xs-3">Password:</label>
		<div class="col-xs-9">
			<input class="form-control" name="pass" type="password" placeholder="Escriba su contraseña" required>
		</div>
    </div>
    <div class="form-group">
     <div class="col-xs-offset-3 col-xs-9">
	<input class="btn btn-primary"  type="submit"  value="Enviar" />		
		</div>
    </div>
	</form>
<?php 
include_once 'pp3_db.php';
function cargarcombo ($link2, $idCombo,$name){
	$qry = "select * from user_type";
	$resp =  mysql_query($qry, $link2) or die ('error'.  mysql_error());?>
	<select  class="form-control" name='<?php echo $name ?>'>
	<?php 
		while ($fila = mysql_fetch_array($resp)){
		if ($fila['id']==$idcombo){
		?>
		<option value=" <?php echo $fila['id']; ?>" selected="selected"><?php echo $fila['name'];?></option>
	<?php
		}
		else { ?>
		<option value=" <?php echo $fila['id']; ?>"><?php echo $fila['name'];?></option>
		<?php	}
		}
	?>
	</select>
<?php 
}

?>
</body>
</html>
