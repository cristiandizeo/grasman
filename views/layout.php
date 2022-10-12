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

  <title>Grasman Autos</title>

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
      <div class="container p-0">
        <div class="row">
          <a class="navbar-brand" href="/" title="Grasman Autos">
            <img src="/assets/images/logo.png" alt="">

            <h2 class="d-flex align-items-center">Grasman <em>Autos</em></h2>

          </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="/">Home</a>
            </li>

            <li class="nav-item"><a class="nav-link" href="/vehiculos">Vehiculos</a></li>

            <li class="nav-item"><a class="nav-link" href="/bicicletas">Bicicletas</a></li>

            <li class="nav-item"><a class="nav-link" href="/nosotros">Nosotros</a></li>

            <li class="nav-item"><a class="nav-link" href="/contacto">Contacto</a></li>

          </ul>
        </div>
        <?php if ($auth) : ?>
         
          <div class="icon-bar">
            <a href="/admin" title="Vehiculos"><i class="fa-solid fa-car"></i></a> 
            <a href="/admin/bicicletas" title="Bicicletas"><i class="fa-solid fa-bicycle"></i></a> 
            <a href="/admin/clientes-felices" title="Clientes felices"><i class="fa-solid fa-users"></i></a> 
            <a href="/admin/agencia" title="Agencia"><i class="fa-solid fa-house-flag"></i></a>
            <a href="/logout" title="Cerrar sesión"><i class="fa-solid fa-right-from-bracket text-danger"></i></a>
</div>
        <?php endif; ?>
      </div>
    </nav>
  </header>

  <?php echo $contenido; ?>

  <hr>
  <div class="container-fluid flex-grow-1 flex-shrink-0 bg-light" <?php if($auth){
                                                                      echo 'hidden';
                                                                    }?>>

    <div class="wsp-icon">
      <a href="https://api.whatsapp.com/send?phone=5492954581527&text=¡Hola%20Grasman%20Autos!" target="blank">
        <figure>
          <img src="\assets\images\wsp-icon.svg" alt="wa" title="¡Escribinos ahora!">
        </figure>
      </a>
    </div>

    <div class="px-lg-5 bg-dark">
      <div class="row py-5">
        <div class="col-lg-12 mx-auto text-center">
          <h1 class="text-light display-4">¡GRACIAS POR TU VISITA!</h1>
          <p class="text-light lead mb-0">No dudes en contactarnos</p>
          <p class="text-light lead"><a href="https://api.whatsapp.com/send?phone=5492954581527&text=¡Hola%20Grasman%20Autos!" class="text-primary" target="blank">
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
          <p class="lead"><strong>Grasman Autos</strong></p>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Secciones</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="/" class="text-muted">Home</a></li>
            <li class="mb-2"><a href="/nosotros" class="text-muted">Nosotros</a></li>
            <li class="mb-2"><a href="/vehiculos" class="text-muted">Vehiculos</a></li>
            <li class="mb-2"><a href="/vehiculos?tipo=Bicicleta" class="text-muted">Bicicletas</a></li>
            <li class="mb-2"><a href="/contacto" class="text-muted">Contacto</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 mb-lg-0">
          <p class="font-italic text-muted">Seguinos en nuestras redes</p>
          <ul class="list-inline mt-4 display-4">
            <li class="list-inline-item"><a href="https://www.facebook.com/Grasman-Autos-103164144977354" target="_blank" title="facebook"><i class="fa-brands fa-facebook"></i></i></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/grasmanautos/" target="_blank" title="instagram"><i class="fa-brands fa-instagram"></i></i></a></li>
          </ul>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js" integrity="sha512-oHBLR38hkpOtf4dW75gdfO7VhEKg2fsitvHZYHZjObc4BPKou2PGenyxA5ZJ8CCqWytBx5wpiSqwVEBy84b7tw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>