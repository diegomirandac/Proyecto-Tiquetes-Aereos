<?php
 
include('config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">El nombre de usuario y la contraseña son incorrectos!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['ID'];
            echo '<p class="success">Enhorabuena, ha iniciado sesión!</p>';
            
        } else {
            echo '<p class="error">Enhorabuena, ha iniciado sesión</p>';
        }
    }
}
 
?>




<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="bootstrap Templates">
  
    <meta name="author" content="bootstrap">
    <meta name="keywords" content="bootstrap Templates">

    
    <title>Pagina Inicio Sesion</title>
      

    
    
    <script src="js/global.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

  



<body>
    
    
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Inicio Sesion</h2>
                    
                   
                     
                           <form method="post" action="" name="signin-form">
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nombre Usuario</label>
                                    <input class="input--style-4" type="txt" name="username" required />
                                </div>
                               
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Contraseña</label>
                                    <input class="input--style-4" type="text" name="password" required />
                                </div>
                            </div>
                        </div>
                        
                        <div  class="p-t-15">
                            
                            
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="login" value="login">Iniciar Sesion</button>
                          
                            
                            
                        </div>
                        
                    </form>
                    <br><a href="personasAdmin.php">
                            <button class="btn btn--radius-2 btn--blue">Volver</button>
                            </a>
                    <br>
                    
                    
                    
                    
                    
                    
                     <br><a href="PaginaPrincipal.php">
                            <button class="btn btn--radius-2 btn--blue">Pagina Principal</button>
                            </a>
                     
                     
                     
                    
                </div>
            </div>
        </div>
    </div>

  
   
<p align="center" class="mt-5 mb-3 text-muted">&copy; Diego Jose Miranda Chaves y Jason Arauz Guido</p>
<br>
    
  

</body>

</html>

<?php
session_start();
 

