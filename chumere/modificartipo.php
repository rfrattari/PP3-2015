<html>
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

    
    
    
    <head>

        <title>MODIFICAR TIPO USUARIO</title>  

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

    
    
    
    
    <?php 
    
    $ide=$_GET['id'];
    $tipos=$_GET['name'];
   
    
    ?>
    
    <body>
        <h1>MODIFICAR TIPO USUARIO</h1>
       

                 


        <div class="bs-example">
            <form method="POST" action="procesotipo.php">
                <div class="form-group">
                    <label for="inputtipo">Tipo</label>
                    <input type="hidden" name="id" class="form-control" id="inputtipo" value="<?php echo $ide; ?>">
                </div>
                
                
                
                <div class="form-group">
                    <label for="inputtipo">Tipo</label>
                    <input type="name" name="tipo_user" class="form-control" id="inputtipo" value="<?php echo $tipos; ?>">
                </div>
                
             
                <button type="submit" class="btn btn-primary">modificar</button>
               
            </form>
        </div>
        
        <form action="list_user_type.php"> 
        <button type="submit" class="btn btn-primary">volver</button>
        </form>