    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-banner.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2><?php echo $bicicleta->marca; ?></h2>
              <h4><strong class="text-white">Rodado <?php echo $bicicleta->rodado; ?></strong></h4>
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
              <?php foreach ($imageness as $imagen) : ?>
                <?php if ($imagen->bicicletaId === $bicicleta->id) { ?>
                  <div class="item">
                    <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" class="img-fluid">
                  </div>
                <?php
                } ?>
              <?php endforeach; ?>
            </div>
            <div class="row">

              <div id="sync2" class="owl-carousel owl-theme">
                <?php foreach ($imageness as $imagen) : ?>
                  <?php if ($imagen->bicicletaId === $bicicleta->id) { ?>
                    <div class="item">
                      <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" class="img-fluid">
                    </div>
                  <?php
                  } ?>
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
                    <span class="pull-left">Marca</span>
                    
                    <strong class="pull-right"><?php echo $bicicleta->marca; ?></strong>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="clearfix">
                    <span class="pull-left">Rodado</span>

                    <strong class="pull-right"><?php echo $bicicleta->rodado; ?></strong>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="clearfix">
                    <span class="pull-left">Tipo</span>

                    <strong class="pull-right"><?php echo $bicicleta->tipo; ?></strong>
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
                    <?php echo $bicicleta->descripcion; ?></div>
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
            <h2>Consultanos por esta bicicleta</h2>
          </div>

          <div class="col-md-8">
            <div class="contact-form">
              <?php include __DIR__ . '/contact-form.php'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>