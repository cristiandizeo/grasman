<div class="container">
  <div class="row mt-5">
    <div class="col-md-4">
      <a href="/vehiculos?tipo=auto">
      <div class="profile-card-2"><img src="assets/images/autos.jpg" class="img img-responsive">
        <div class="profile-name">AUTOS</div>
      </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="/vehiculos?tipo=pickup">
      <div class="profile-card-2"><img src="assets/images/pickups.jpeg" class="img img-responsive">
        <div class="profile-name">PICK UPs</div>
      </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="/vehiculos?tipo=bicicleta">
      <div class="profile-card-2"><img src="assets/images/bicicletas.jpg" class="img img-responsive">
        <div class="profile-name">BICICLETAS</div>
      </div>
      </a>
    </div>
  </div>
</div>


<a href="/quiero-vender">
  <div class="container-fluid bg-secondary text-center m-3 p-2 font-weight-bold display-4 text-light"><i class="fa-solid fa-car-on"></i> QUIERO VENDER MI VEHICULO <i class="fa-solid fa-comments-dollar"></i></div>
</a>

<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Últimos ingresos</h2>
          <a href="/vehiculos">Ver todo <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <?php require 'listado.php'; ?>
    </div>
  </div>
</div>

<div class="happy-clients">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Clientes felices</h2>
        </div>
      </div>

      <div class="col-md-12">
        <div class="owl-clients owl-carousel text-center">
          <?php foreach ($imgclientes as $imgcliente) : ?>
            <?php if ($imgcliente->seccion == 1) { ?>
              <div class="service-item">
                <img loading="lazy" src="/imagenes/<?php echo trim($imgcliente->name); ?>" class="img-fluid">
              </div>
            <?php } ?>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="services" style="background-image: url(assets/images/banner-agencia.png);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Nuestra agencia</h2>
          <a href="/nosotros">Ver más <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

    </div>
    <div class="col-md-12">
      <div class="owl-agencia owl-carousel text-center">
        <?php foreach ($imgclientes as $imgcliente) : ?>
          <?php if ($imgcliente->seccion == 2) { ?>
            <div class="service-item">
              <img loading="lazy" src="/imagenes/<?php echo trim($imgcliente->name); ?>" class="img-fluid">
            </div>
          <?php } ?>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>