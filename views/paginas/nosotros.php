    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-banner.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Nuestra agencia</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Una empresa familiar</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/el-team.jpeg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Queremos brindarte la mejor experiencia</h4>
              <p>Somos una empresa especializada en la comercializacion de vehiculos nuevos y usados, seleccionando cuidadosamente lo mejor del mercado, y ofreciendo al cliente
                la mejor opción a la hora de comprar o vender su vehículo. Nuestro desafío es mantener en alto la calidad de nuestro servicio y ser referentes en el rubro, ofreciendo un gran
                abanico de posibilidades.
              </p>
              <ul class="social-icons">
                <li><a href="https://www.facebook.com/profile.php?id=100047535112495" target="_blank" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="https://www.instagram.com/grasmanautos/" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://api.whatsapp.com/send?phone=5492954581527&text=¡Hola%20Grasman%20Automotores!" target="_blank" title="Whatsapp"><i class="fa-brands fa-whatsapp"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading text-center mt-4">
            <h2>La agencia</h2>
          </div>
        </div>
        </div>
        
    </div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    

    <div class="carousel-item active">
      
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


    <!-- Banner Starts Here -->
      <div class="owl-banner owl-carousel">
      <?php foreach ($imgclientes as $imgcliente) : ?>
          <?php if ($imgcliente->seccion == 2) { ?>
        <div class="banner-item">
          <div class="text-content">
          <img class="d-block w-100" src="/imagenes/<?php echo trim($imgcliente->name); ?>" alt="First slide">
          </div>
        </div>    
    <?php } ?>
          <?php endforeach; ?>
      </div>
    <!-- Banner Ends Here -->