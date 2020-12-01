<html lang="es">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="bootstrap Templates">
    <meta name="author" content="bootstrap">
    <meta name="keywords" content="bootstrap Templates">

    
    <title>Pagina Registro</title>
      
     <!-- common css. required for every page-->
        <link href="lib/bootstrap/dist/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/bootstrap/dist/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css"/>
        
        <script src="lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        
        <link href="lib/animate.css/animate.min.css" rel="stylesheet" type="text/css"/>
        
        
        
        <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
    
    
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="lib/jquery/dist/jquery.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/personasFunctions.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

  




<body>
    
    <div class="jumbotron text-center">
    <h1>D & J, Flys</h1> 
    <p>! Garantizamos la comodidad en tu proximo vuelo. !</p> 
    </div>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registro de nuevos usuarios</h2>
                    <form role="form" onsubmit="return false;" id="formPersonas">
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group" id="groupPK_cedula">
                                    <label for="txtPK_cedula">Cedula</label>
                                    <input class="input--style-4" type="text" id="txtPK_cedula"  placeholder="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group" id="groupnombre">
                                    <label for="txtPK_nombre">Nombre</label>
                                    <input class="input--style-4" type="text" id="txtnombre"  placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group" id="groupapellido1">
                                    <label class="label">apellido1</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="text" id="txtapellido1"  placeholder="">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group" id="groupapellido2">
                                    <label class="label">apellido2</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="text" id="txtapellido2"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group" id="groupfecNacimiento">
                                    <label class="label">fecNacimiento</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="text" id="txtfecNacimiento"  placeholder="">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group" id="groupsexo">
                                    <label class="label">sexo</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="text" id="txtsexo"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group" id="groupobservaciones">
                                    <label class="label">observaciones</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="text" id="txtobservaciones"  placeholder="">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group" id="grouptelefono">
                                    <label class="label">telefono</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="text" id="txttelefono"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button  class="btn btn--radius-2 btn--blue" type="submit" id="enviar">Guardar</button>
                            
                        </div>
                        
                    </form>
                    
                    <br><a href="InicioSesion.php">
                            <button class="btn btn--radius-2 btn--blue">Iniciar Sesion</button>
                            </a>
                    <br>
                    
                    <br><a href="PaginaPrincipal.php">
                            <button class="btn btn--radius-2 btn--blue">Volver</button>
                            </a>
                </div>
            </div>
        </div>
    </div>

  
   <p align="center" class="mt-5 mb-3 text-muted">&copy; Diego Jose Miranda Chaves y Jason Arauz Guido</p>
<br>

    
  

</body>

</html>

