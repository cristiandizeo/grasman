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
            <div>
              <?php foreach ($imagenes as $imagen) : ?>
                <?php if ($imagen->vehiculoId === $vehiculo->id) { ?>
                  <img loading="lazy" src="/imagenes/<?php echo trim($imagen->imagen); ?>" class="img-fluid">
                <?php break;
                } ?>
              <?php endforeach; ?>
            </div>
            <br>
            <div class="row">
              <?php foreach ($imagenes as $imagen) : ?>
                <?php if ($imagen->vehiculoId === $vehiculo->id) { ?>
                  <div class="col-sm-4 col-6">
                    <div>
                      <img loading="lazy" src="/imagenes/<?php echo trim($imagen->imagen); ?>" class="img-fluid">
                    </div>
                    <br>
                  </div>

                <?php } ?>
              <?php endforeach; ?>

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

                    <strong class="pull-right"><?php echo $vehiculo->km; ?> km</strong>
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
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Tu nombre" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="Tu E-Mail" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="telefono" type="text" class="form-control" id="telefono" placeholder="Tu telefono" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Mensaje" required="">¡Hola! Quiero saber más información sobre <?php echo $vehiculo->marca . " " . $vehiculo->modelo . " " . $vehiculo->year; ?></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Enviar mensaje</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>