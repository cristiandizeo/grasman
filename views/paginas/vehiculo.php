    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-banner.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2><?php echo $vehiculo->marca . " " . $vehiculo->modelo; ?></h2>
              <h4><strong class="text-white"><?php echo $vehiculo->year; ?></strong></h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div id="sync1" class="owl-carousel owl-theme">
              <?php foreach ($imagenes as $imagen) : ?>
                  <div class="item">
                    <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" class="img-fluid">
                  </div>
              <?php endforeach; ?>
            </div>
            <div class="row">

              <div id="sync2" class="owl-carousel owl-theme">
                <?php foreach ($imagenes as $imagen) : ?>
                    <div class="item">
                      <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" class="img-fluid">
                    </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="section-heading">
              <h2>Información</h2>
            </div>
            <form action="#" method="post" class="form">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="clearfix">
                    <span class="pull-left">Tipo</span>

                    <strong class="pull-right"><?php echo $vehiculo->tipo; ?></strong>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="clearfix">
                    <span class="pull-left">Estado</span>

                    <strong class="pull-right"><?php echo $vehiculo->estado; ?></strong>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="clearfix">
                    <span class="pull-left">Marca</span>

                    <strong class="pull-right"><?php echo $vehiculo->marca; ?></strong>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="clearfix">
                    <span class="pull-left">Modelo</span>

                    <strong class="pull-right"><?php echo $vehiculo->modelo; ?></strong>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="clearfix">
                    <span class="pull-left">Año</span>

                    <strong class="pull-right"><?php echo $vehiculo->year; ?></strong>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="clearfix">
                    <span class="pull-left">Combustible</span>

                    <strong class="pull-right"><?php echo $vehiculo->combustible; ?></strong>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="clearfix">
                    <span class="pull-left">Caja</span>

                    <strong class="pull-right"><?php echo $vehiculo->caja; ?></strong>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="clearfix">
                    <span class="pull-left">Kilometraje</span>

                    <strong class="pull-right"><?php echo number_format($vehiculo->km,0,null,'.'); ?> km</strong>
                  </div>
                </li>
              </ul>
            </form>
            <div class="section">
              <div class="container">
                <div class="row">
                  <div class="section-heading">
                    <h2>Descripcion</h2>
                  </div>

                  <div class="left-content">
                    <?php echo $vehiculo->descripcion; ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="section-heading">
            <h2>Consultanos por este vehículo</h2>
          </div>

          <div class="col-md-8">
            <div class="contact-form">
              <?php include __DIR__ . '/contact-form.php'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>