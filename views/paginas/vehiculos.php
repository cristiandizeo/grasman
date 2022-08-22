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
             <form action="/vehiculos" method="GET" id="formb">
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
                  <?php if ($pagina > 1) { ?>
                    <li><a href="<?php echo "?pagina=". $pagina - 1;?>"><i class="fa fa-angle-double-left"></i></a></li>
                    <?php } ?>
                    <?php for ($i=1; $i <= $paginas; $i++) { ?>                    
                      
                      <li class="<?php if ($i == $pagina) echo 'active'; ?>"><a href="<?php echo "?pagina=". $i;?>"><?php echo $i; ?></a></li>
                      
                      <?php }?>
                      <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                      <?php if ($pagina < $paginas) { ?>
                        <li>
                          <a href="<?php echo "?pagina=". $pagina + 1;?>">
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                        <?php } ?>
                        <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                      </ul>
              </div>

              
            </div>
          </div>
        </div>
      </div>
    </div>