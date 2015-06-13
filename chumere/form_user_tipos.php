
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

        <title>FORMULARIO DE UN NUEVO TIPO DE USER</title>  

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
        <h1>FORMULARIO DE UN NUEVO TIPO DE USER</h1>
       

                 


        <div class="bs-example">
            <form method="POST" action="registrousertipo.php">
                <div class="form-group">
                    <label for="inputtipo">Tipo</label>
                    <input type="name" name="tipo" class="form-control" id="inputtipo" placeholder="tipo">
                </div>
                
             
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button type="reset" class="btn btn-primary">Restablecer</button>
               
            </form>
        </div>
        <form action="index.php"> 
        <button type="submit" class="btn btn-primary">volver</button>
        </form>