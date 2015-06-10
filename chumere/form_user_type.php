
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







<html>
    <head>

        <title>FORMULARIO DE REGISTRO</title>  

      <link href="css/signin.css" rel="stylesheet">
      
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="js/bootstrap-theme.min.css">
     
      <script src="js/bootstrap.min.js"></script> 
        <style type="text/css">
    .bs-example{
    	margin: 20px;
        }
      </style>
      
      
      
      
      
    </head> 

    <body>
        <h1>FORMULARIO DE REGISTRO</h1>
        <h5>los campos con (*)son requeridos</h5>

        <?php
        include("conexion.php");

        $consulta = "select * from user_type ";
        $resulta = mysql_query($consulta);
        ?>          


        <div class="bs-example">
            <form method="POST" action="reg.php">
                <div class="form-group">
                    <label for="inputEmail">Nombre</label>
                    <input type="name" name="nombre" class="form-control" id="inputEmail" placeholder="Nombre" required="autofocus">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Apellido</label>
                    <input type="name" name="apellido" class="form-control" id="inputEmail" placeholder="Apellido" required="autofocus">
                </div>
                
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required="autofocus">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password" required="autofocus">
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
             
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="reset" class="btn btn-primary">Restablecer</button>
            </form>
        </div>
        <form action="index.php"> 
        <button type="submit" class="btn btn-primary">volver</button>
        </form>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

