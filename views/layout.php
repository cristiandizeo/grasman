<?php
if (!isset($_SESSION)) {
  session_start();
}
$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
  $inicio = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/assets/images/logo.ico">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Grasman Automotores</title>

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/owl.css">

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <div class="row">
        <a class="navbar-brand" href="/" title="Grasman automotores">
          <img src="/assets/images/logo.png" alt="">

          <h2 class="d-flex align-items-center">Grasman <em>Automotores</em></h2>

        </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/index.php' ? 'active' : '' ?>">
              <a class="nav-link" href="/">Home</a>
            </li>

            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'active' : '' ?>"><a class="nav-link" href="/vehiculos">Vehiculos</a></li>

            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/index.php/nosotros' ? 'active' : '' ?>"><a class="nav-link" href="/nosotros">Nosotros</a></li>

            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/index.php/contacto' ? 'active' : '' ?>"><a class="nav-link" href="/contacto">Contacto</a></li>

          </ul>
        </div>
        <?php if($auth): ?>
          <div class="auth">
          <a href="/admin" title="Ir al panel" class="m-3"><i class="fas fa-car" style="color:#ced4da"></i></i></a>
          <a href="/logout" title="Cerrar sesión" class="m-3"><i class="fa-solid fa-right-from-bracket text-danger"></i></a>
        </div>
                      <?php endif; ?>
      </div>
    </nav>
  </header>

  <?php echo $contenido; ?>

<hr>
  <div class="container-fluid flex-grow-1 flex-shrink-0 bg-light" <?php switch($_SERVER['PHP_SELF']) {case '/index.php/admin': echo 'hidden';break;case '/index.php/vehiculos/actualizar': echo 'hidden';break;case '/index.php/vehiculos/crear': echo 'hidden';break;}?>>
  
  <div class="wsp-icon">
    <a href="https://api.whatsapp.com/send?phone=5492954369499&text=¡Hola%20Grasman%20Automotores!" target="blank">
  <figure>  
  <img src="\assets\images\wsp-icon.svg" alt="wa" title="¡Escribinos ahora!">
  </figure>
  </a>
</div>
  
  <div class="px-lg-5">
      <div class="row py-5">
        <div class="col-lg-12 mx-auto text-white text-center">
          <h1 class="display-4">¡GRACIAS POR TU VISITA!</h1>
          <p class="lead mb-0">No dudes en contactarnos</p>
          <p class="lead"><a href="https://api.whatsapp.com/send?phone=5492954369499&text=¡Hola%20Grasman%20Automotores!" class="text-primary" target="blank">
                        <u>Hacé click acá y escribinos</u> <i class="fa-brands fa-whatsapp"></i></a>
          </p>
        </div>
      </div>
    </div>
  </div>
  
<hr>
  <!-- End -->


  <!-- Footer -->
  <footer class="bg-white">
    <div class="container py-5">
      <div class="row py-4">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="/assets/images/logo.png" alt="" width="180" class="mb-3">
          <p class="font-italic text-muted">Seguinos en nuestras redes</p>
          <ul class="list-inline mt-4">
            <li class="list-inline-item"><a href="https://www.facebook.com/Grasman-Automotores-103164144977354" target="_blank" title="facebook"><i class="fa-brands fa-facebook"></i></i></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/grasmanautomotores/" target="_blank" title="instagram"><i class="fa-brands fa-instagram"></i></i></a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Secciones</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="/" class="text-muted">Home</a></li>
            <li class="mb-2"><a href="/nosotros" class="text-muted">Nosotros</a></li>
            <li class="mb-2"><a href="/vehiculos" class="text-muted">Vehiculos</a></li>
            <li class="mb-2"><a href="/contacto" class="text-muted">Contacto</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Newsletter</h6>
          <p class="text-muted mb-4">Dejanos tu correo para recibir nuestras novedades</p>
          
  <form id="form" class="form">
          <div class="p-1 rounded border">
            <div class="input-group">
              <input name="mail[email]" type="email" class="form-control" id="email" class="form-control border-0 shadow-0">
              <div class="input-group-append">
                <button id="form-submit" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
              </div> 
            </div>
          </div>
          </form>

<div class="alert alert-success text-center alert-dismissible fade show" id="msjEnviado" role="alert">
      <strong>¡Gracias por tu mensaje!</strong><br> Te responderemos en breve <i class="fa-solid fa-car-on"></i></i>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
    </div>
    <div class="alert alert-danger text-center alert-dismissible fade show" id="msjNoEnviado" role="alert">
      <strong>No se pudo enviar el mensaje <i class="fa-solid fa-car-burst"></i></strong><br> Por favor revisá el formulario o intentá en unos momentos.</i>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
    </div>
    <div class="alert alert-primary text-center alert-dismissible fade show" id="alertaEnviando" role="alert">
      <strong>Enviando mensaje <i class="fa-solid fa-paper-plane"></i></strong>
    </div>
        </div>
      </div>
    </div>

    <!-- Copyrights -->
    <div class="bg-light py-4">
      <div class="container text-center">
        <p class="text-muted mb-0 py-2">Desarrollado por Cristian Dizeo</p>
      </div>
    </div>
  </footer>
  <!-- End -->

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="/assets/js/custom.js"></script>
  <script src="/assets/js/owl.js"></script>
</body>
</html>