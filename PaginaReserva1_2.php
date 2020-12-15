<!DOCTYPE html>

<html lang="es">
<head>
  <!-- Proyecto tiquetes aereos por 
  Diego Jose Miranda Chaves
  Jason Araus Guido-->
  <title>D & J, Flys</title>
  <meta charset="utf-8">
  <link rel="stylesheet" media="only screen and (max-width: 768px)" href="estilos.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/estilos.css" />
  <link rel="stylesheet" type="text/css" href="css/estiloAsientos.css" />
  <script src="js/java.js" type="text/javascript"></script>
  <script src="js/main.js" type="text/javascript"></script>
  
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Inicio</a>
      <a class="navbar-brand" href="PaginaPreReserva.php">Volver</a>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="#contact">Contacto</a></li>
        <li><a href=PaginaPrincipal.php>Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>

    
<div class="jumbotron text-center">
  <h1>D & J, Flys</h1> 
  <p>! Garantizamos la comodidad en tu proximo vuelo. !</p> 
 
</div>

<!--  (codigoInicio) -->

 <title>Venta de Pasajes</title>
    </head>
    <body>
        <h1 align="center">Venta de Tiquetes</h1>
        <h2 align="center">Asientos Ejecutivos</h2>
        <h3 align="center">Cessna Model 120 </h3>
        <table border="10">
            <div class="triangulo-arriba"></div>
            <tr>
                <td></td>
                <td></td>
                <td align="center">Ventana</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="center">Puerta</td>
                <td align="center">Ventana</td>
                <td align="center">Ventana</td>
               
            </tr>
           
            
            <tr>
                <td></td>
                <td><button>A/1</button></td>
                <td><button>A/2</button></td>
                <td><button>A/3</button></td>
                <td><button>A/4</button></td>
                <td align="center">↕</td>
                <td><button style="background:green">A/5</button></td>
                <td><button style="background:green">A/6</button></td>
                <td><button style="background:green">A/7</button></td>
                <td align="center">↕</td>
                
                <td>✈Piloto✈</td>
            </tr>
            <tr>
                <td></td>
               <td><button>B/1</button></td>
                <td><button>B/2</button></td>
                <td><button>B/3</button></td>
                <td><button>B/4</button></td>
                <td align="center">↕</td>
                <td><button style="background:green">B/5</button></td>
                <td><button style="background:green">B/6</button></td>
                <td><button style="background:green">B/7</button></td>
                <td align="center">↕</td>
              
                <td>✈Pitolo✈</td>
            </tr>
            <tr>
               <td></td>
                <td></td>
                <td align="center">Ventana</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="center">Puerta</td>
                <td align="center">Ventana</td>
                <td align="center">Ventana</td>
                
             
             
                
            
            
        </table>
        <div class="triangulo-abajo"></div> 
        <br><br>
        <h2 align="center">Informacion de Asientos y Reserva</h2>
        <hr>
        <p align="center">Asiento: <input type="text" id="asiento" disabled required></p>
        <p align="center">Nombre: <input type="text" id="nombre" required></p>
        <p align="center">Fecha Reserva: <input type="date" id="apellido"required ></p>
        <p align="center">DNI: <input type="number" id="dni" required></p>
        <p align="center">
            <input align="center" type="button" value="Reservar" id="btnReservar">
            <input align="center" type="button" value="Cancelar" id="btnCancelar">
        </p>
        <hr>
        <h2 align="center">Pague Ahora</h2>
       <form align="center" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="sb-dj9n431483466@business.example.com">
            <input type="hidden" name="return" value="http://localhost/UIA-Progra03-Lab01/public_html/factura4.php">
            <input type="hidden" name="item_name" value="Clase Ejecutiva">
            <input type="hidden" name="item_name" value="Asiento /">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="amount" value="">
            <input type="image" width="200" height="100" src="Imagenes/paypal.png"
                   name="submit"
                   alt="Make payments with PayPal - it's fast, free and secure!">
        </form>
        
        
        <script src="js/main.js" type="text/javascript"></script>
        
        <br>
        

<!--  (Codigo Final) -->

<!--  (Seccion contacto) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">Contactanos!</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Te responderemos lo antes posible.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Costa Rica  Alajuela/San Jose</p>
      <p><span class="glyphicon glyphicon-phone"></span> +506 12345678</p>
      <p><span class="glyphicon glyphicon-envelope"></span> D&JFLYS@hotmail.com</p>
      
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Nombre" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Correo Electronico" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comentario" rows="5"></textarea><br>
      <form onsubmit="alert('Se ha enviado con exito'); return false;" id="form_datos method="POST">
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Enviar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Imagenes localizacion -->
<img src="Imagenes/costarica.jpg" class="w3-image w3-greyscale-min" style="width:100%; padding: 5px 600px;">

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
</footer>

<p align="center" class="mt-5 mb-3 text-muted">&copy; Diego Jose Miranda Chaves y Jason Arauz Guido</p>
<br>

</body>
</html>
