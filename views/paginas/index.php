<div class="banner">
  <div class="box box1 location-listing">
    <a class="location-title" href="/vehiculos?tipo=Auto">
      AUTOS </a>
  </div>
  <div class="box box2 location-listing">
    <a class="location-title" href="/vehiculos?tipo=Pickup">
      PICK UP </a>
  </div>
  <div class="box box3 location-listing">
    <a class="location-title" href="/vehiculos?tipo=Bicicleta">
      BICICLETAS </a>
  </div>

</div>


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
    <div class="row">

      <?php foreach ($imgclientes as $imgcliente) : ?>
        <?php if ($imgcliente->seccion == 2) { ?>
          <div class="col">
            <img loading="lazy" src="/imagenes/<?php echo trim($imgcliente->name); ?>" class="img-fluid">
</div>
        <?php } ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>