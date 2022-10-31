
<div class="containerbanner">
       <a href="/vehiculos?tipo=Auto"> <div class="box">
            <div class="imgBox">
            <picture>
              <source type="image/webp" srcset="/assets/images/autos.webp">
          <img srcset="assets/images/autos.jpg" class="img img-responsive" alt="Autos" loading="eager">
          </picture>            </div>
            <div class="content">
                <h2>Autos</br>
            </div>
        </div>
        </a>
       <a href="/vehiculos?tipo=Pickup"> <div class="box">
            <div class="imgBox">
            <picture>
              <source type="image/webp" srcset="/assets/images/pickups.webp">
          <img srcset="assets/images/pickups.jpg" class="img img-responsive" alt="Pickups" loading="eager">
          </picture>            </div>
            <div class="content">
                <h2>Pickups</br>
            </div>
        </div>
        </a>
       <a href="/bicicletas"> <div class="box">
            <div class="imgBox">
            <picture>
              <source type="image/webp" srcset="/assets/images/bicicletas.webp">
          <img srcset="assets/images/bicicletas.jpg" class="img img-responsive" alt="Bicicletas" loading="eager">
          </picture>            </div>
            <div class="content">
                <h2>Bicicletas</br>
            </div>
        </div>
        </a>
    </div>


<a href="/quiero-vender">
  <div class="container-fluid bg-secondary text-center m-3 p-2 font-weight-bold display-4 text-light"><i class="fa-solid fa-car-on"></i> QUIERO VENDER MI VEHICULO <i class="fa-solid fa-comments-dollar"></i></div>
</a>

<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Últimos ingresos autos y pickups</h2>
          <a href="/vehiculos">Ver todo <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <?php require 'listadov.php'; ?>
    </div>
  </div>
</div>

<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Últimos ingresos bicicletas</h2>
          <a href="/bicicletas">Ver todo <i class="fa fa-angle-right"></i></a>
        </div>
      </div>

      <?php require 'listadob.php'; ?>
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
              <div class="service-item">
                <picture>
                <img loading="lazy" src="/imagenes/<?php echo trim($imgcliente->name); ?>" class="img-fluid" alt="clientes">
                </picture>
              </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="services" style="background-image: url(assets/images/banner-agencia.webp);">
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
        <?php foreach ($imgagencias as $imgagencia) : ?>
            <div class="service-item">
              <img loading="lazy" src="/imagenes/<?php echo trim($imgagencia->name); ?>" class="img-fluid">
            </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>