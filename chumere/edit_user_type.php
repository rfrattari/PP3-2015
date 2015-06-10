
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

<link href="css/signin.css" rel="stylesheet">
      
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="js/bootstrap-theme.min.css">
     
      <script src="js/bootstrap.min.js"></script> 
        <style type="text/css">
    .bs-example{
    	margin: 20px;
        }
      </style>





<?php
include ("conexion.php");
$consulta = "select * from user_type ";
        $resulta = mysql_query($consulta);


$id=$_GET['id'];
$nombre=$_GET['name'];
$apellido=$_GET['lastname'];
$email=$_GET['email'];
?>

   <form method="POST" action="modprocces.php">
       
                <div class="form-group">
                    <label for="inputid"></label>
                    <input type="hidden" name="id" class="form-control" id="inputEmail" value="<?php echo $id; ?>" required="autofocus">
                </div> 
                <div class="form-group">
                    <label for="inputEmail">Nombre</label>
                    <input type="name" name="nombre" class="form-control" id="inputEmail" value="<?php echo $nombre; ?>" required="autofocus" >
                </div> 
                <div class="form-group">
                    <label for="inputEmail">Apellido</label>
                    <input type="name" name="apellido" class="form-control" id="inputEmail" value="<?php echo $apellido; ?>" required="autofocus">
                </div>
                
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" value="<?php echo $email; ?>" required="autofocus" >
                </div>
                
                
                <div class="form-group">
                    <label for="inputPassword">Tipo de usuario</label>
                   <select name="user">
                            <option value="">seleccionar</option>
                            <?php
                            while ($fila = mysql_fetch_row($resulta))
                                echo "<option value='" . $fila['0'] . "'>" . $fila ['1'] . "</option>";
                            ?>
                        </select>
                </div>
             <button type="submit" class="btn btn-primary">Actualizar</button>
                
            </form>
        </div>
        <form action="list_usuarios.php"> 
        <button type="submit" class="btn btn-primary">volver</button>
        </form>    
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    