   <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-banner.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Nuestros vehículos</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
             <div class="contact-form">
             <form action="/vehiculos" method="POST" id="formb">
                     <?php include __DIR__ . '/buscar.php'; ?>
                     <button type="submit" class="filled-button btn-block" id="buscar">Buscar</button>
                     <button class="filled-button btn-block bg-danger" id="limpiar">Limpiar</button>
                    </form>
                  </div>
          </div>

          <div class="col-md-9">
            <div class="row">
  <div <?php if ($vehiculos != null) echo 'hidden';?>>No se encontraron resultados</div>
    <?php require 'listado.php';?>
              <div class="col-md-12">
                <ul class="pages">
                  <?php for ($i=0; $i < $paginas; $i++) { ?>                    
                  
                  <li class="active"><a href="#"><?php echo ($i+1); ?></a></li>

                <?php }?>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
              </div>

              
            </div>
          </div>
        </div>
      </div>
    </div>