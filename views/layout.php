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



  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Desarrollado por <a href="https://www.cristiandizeo.com/">Cristian Dizeo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="/assets/js/custom.js"></script>
  <script src="/assets/js/owl.js"></script>
  <script src='/assets/js/buscador.js'></script>
</body>

</html>