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
        <a class="navbar-brand" href="/">
          <img src="/assets/images/logo.png" alt="">

          <h2>Grasman <em>Automotores</em></h2>

        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/index.php' ? 'active' : '' ?>">
              <a class="nav-link" href="/">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'active' : '' ?>"><a class="nav-link" href="/vehiculos">Vehiculos</a></li>

            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/index.php/nosotros' ? 'active' : '' ?>"><a class="nav-link" href="/nosotros">Nosotros</a></li>

            <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/index.php/contacto' ? 'active' : '' ?>"><a class="nav-link" href="/contacto">Contacto</a></li>
            <?php if($auth): ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>



  <?php echo $contenido; ?>


<hr>
  <div class="container-fluid flex-grow-1 flex-shrink-0 bg-light" <?php echo $_SERVER['PHP_SELF'] === '/index.php/admin' || '/index.php/crear' || '/index.php/actualizar'? 'hidden' : '' ?>>
    <div class="px-lg-5">
      <div class="row py-5">
        <div class="col-lg-12 mx-auto text-white text-center">
          <h1 class="display-4">¡GRACIAS POR TU VISITA!</h1>
          <p class="lead mb-0">No dudes en contactarnos ante cualquier consulta</p>
          <p class="lead"><a href="https://bootstrapious.com/snippets" class="text-primary">
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
          <div class="p-1 rounded border">
            <div class="input-group">
              <input type="email" placeholder="Ingresá tu email" aria-describedby="button-addon1" class="form-control border-0 shadow-0">
              <div class="input-group-append">
                <button id="button-addon1" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
              </div>
            </div>
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
  <!-- <script src='/assets/js/buscador.js'></script> -->
</body>

</html>