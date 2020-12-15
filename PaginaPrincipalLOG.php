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
  <script src="js/java.js" type="text/javascript"></script>
  
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
      <a class="navbar-brand" href="PaginaPreReserva.php">Reservar</a>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">Sobre</a></li>
        <li><a href="#services">Servicios</a></li>
        <li><a href="#pricing">Precios</a></li>
        <li><a href="#portfolio">Portafolio</a></li>
        <li><a href="#contact">Contacto</a></li>
        <li><a href="informacionUsuario.php">Informacion Usuario</a></li>
        <li><a href="PaginaPrincipal.php">Cerrar Sesion</a></li>
        
        
     <br>
        
      </ul>
    </div>
  </div>
</nav>
    
    
    
 
<script type="text/javascript">
  function actualizar(){location.reload(true);}
//Función para actualizar cada 4 segundos(4000 milisegundos)
  setInterval("actualizar()",10000);
</script>   

    
<div class="jumbotron text-center">
  <h1>D & J, Flys</h1> 
  <p>! Garantizamos la comodidad en tu proximo vuelo. !</p> 
 <input style="color:#000000" type="text" size="15" maxlength="30" value="Usuario : " name="usuario" disabled required/>
</div>

<!-- (Sobre Seccion) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Sobre nosotros</h2><br>
      <h4>Somos una Pagina Wep dedicada a la compra y venta de tiquetes aereos</h4><br>
      <p>Dada la situacion que ha enfrentado Costa Rica durante la pandemia muchos Costarricenes han pasado un buen tiempo sin el poder viajar, pero gracias a que la situacion esta mejorando, D & J, Flys quiere invitarte a disfrutar del poder viajar nuevamente  con excelentes precios !    .</p>
      
    </div>
      <img src="Imagenes/avion.jpg" class="w3-image w3-greyscale-min" style="width:25%">
    <div class="col-sm-4">
      
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Nuestras valores</h2><br>
      <h4><strong>Mision:</strong> Nuestra mision es el poder brindar a nuestros usuarios una excelente experiencia de compra y reserva de tiquetes aereos en nuestra pagina.</h4><br>
      <h4><strong>Vision:</strong>  Nuestra vision es la de Proveer la mejor experiencia del usuario cada día en nuestra pagina.</h4><br>
    </div>
  </div>
</div>

<img src="Imagenes/mosa.jpg" class="w3-image w3-greyscale-min" style="width:100%; padding: 20px 600px;">

<!-- (Seccion Servicios) -->
<div id="services" class="container-fluid text-center">
  <h2>Servicios</h2>
  <h4>Que ofrecemos?</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>Poder</h4>
      <p>Contamos con una excelente pagina wep.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>Confianza</h4>
      <p>La confianza con nuestros usuarios es siempre la prioridad.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>Facilidades</h4>
      <p>D & J, Flys te provee una forma facil de compra de tiquetes aereos.</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>Medio Ambiente</h4>
      <p>En D & J, Flys nos preocupamos por el medio ambiente.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>Certificado</h4>
      <p>En D & J, Flys contamos con estudiantes calificados por la UIA</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4 style="color:#303030;">Trabajo Duro</h4>
      <p>Trabajamos duro para poder ofrecerles siempre el mejor servicio.</p>
    </div>
  </div>
</div>

<br><br>

  <h2 align="center">Que dicen nuestros usuarios</h2>
 
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicadores -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Envoltorio para diapositivas -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"Una manera simple y facil de reservar vuelos"<br><span>Alberto Chicote del Olmo</span></h4>
      </div>
      <div class="item">
        <h4>"Gracias a D & J siempre puedo elegir mis asientos favoritos"<br><span>Christian Garita</span></h4>
      </div>
      <div class="item">
        <h4>"Una experiencia de vuelo inolvidable!"<br><span>George Lucas</span></h4>
      </div>
    </div>

    <!-- Controles flecha iz y der -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<br><br><br>

<!--  (Seccion Precios) -->
<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>Precios de tiquetes</h2>
    <h4>En D & J, Flys contamos con diferentes categorias de vuelo para nuestros diferentes usuarios del dia a dia y que cumplan con sus necesidades. </h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Clase económica</h1>
        </div>
        <div class="panel-body">
          <p><strong>Equipaje de mano:</strong> 1 X 10 Kg / 22 Lbs + 1 artículo personal </p>
          <p><strong>Equipaje de bodega:</strong>Con costo extra </p>
          <p><strong>Selección de asiento:</strong> Con costo extra</p>
           <p><strong>Asiento reclinable:</strong> Costo extra / Normal</p>
          <p><strong>Cambios:</strong> No permitido</p>
          <p><strong>Reembolso*</strong> No permitido</p>
          <p><strong>Comida:</strong> Con costo extra</p>
          <p><strong>Vinos:</strong> No Incluido</p>
        </div>
        <div class="panel-footer">
          <h3>$99/$80</h3>
          <h4><strong>Costa Rica→Estados Unidos // Alajuela→Golfito</strong></h4>
         <a href="PaginaPreReserva.php">
            <button class="btn btn-lg">Reservar/Comprar</button>
          </a>
        </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Clase ejecutiva</h1>
        </div>
        <div class="panel-body">
          <p><strong>Equipaje de mano:</strong> 1 X 10 Kg / 22 Lbs + 1 artículo personal </p>
          <p><strong>Equipaje de bodega:</strong> 2 X 32 Kg / 70 Lbs </p>
          <p><strong>Selección de asiento:</strong> Incluido</p>
          <p><strong>Asiento reclinable:</strong> Costo extra / Mas grande</p>
          <p><strong>Cambios:</strong> Con costo extra</p>
          <p><strong>Reembolso*</strong> Con costo extra</p>
          <p><strong>Comida:</strong> Incluido</p>
          <p><strong>Vinos:</strong> Costo extra</p>
          
        </div>
        <div class="panel-footer">
          <h3>$199/140</h3>
          <h4><strong>Costa Rica→Estados Unidos // Alajuela→Golfito</strong></h4>
          <a href="PaginaPreReserva.php">
            <button class="btn btn-lg">Reservar/Comprar</button>
          </a>
        </div>
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Primera clase</h1>
        </div>
        <div class="panel-body">
          <p><strong>Equipaje de mano:</strong> 1 X 10 Kg / 22 Lbs + 1 artículo personal </p>
          <p><strong>Equipaje de bodega:</strong> 2 X 32 Kg / 70 Lbs </p>
          <p><strong>Selección de asiento:</strong> Incluido</p>
          <p><strong>Asiento reclinable:</strong> Incluido / VIP</p>
          <p><strong>Cambios:</strong> Incluido</p>
          <p><strong>Reembolso*</strong> Incluido</p>
          <p><strong>Comida:</strong> Incluido</p>
          <p><strong>Vinos:</strong> Incluido</p>
        </div>
        <div class="panel-footer">
          <h3>$299</h3>
           <h4><strong>Costa Rica→Estados Unidos</strong></h4>
          <a href="PaginaPreReserva.php">
            <button class="btn btn-lg">Reservar/Comprar</button>
          </a>
        </div>
      </div>      
    </div>    
  </div>
</div>

<!-- (Portfolio ) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Tipos de asientos</h2><br>
  <h4>Disponemos de las siguientes clases</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="Imagenes/economica.jpg" alt="Clase económica" width="400" height="300">
        <p><strong>Clase económica</strong></p>
        <p></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="Imagenes/ejecutiva.jpg" alt="Clase ejecutiva" width="400" height="300">
        <p><strong>Clase ejecutiva</strong></p>
        <p></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="Imagenes/primeraclase.jpg" alt="Primera clase" width="400" height="300">
        <p><strong>Primera clase</strong></p>
        <p></p>
      </div>
    </div>
  </div><br>







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
