<?php // consulta trae el arr de los vehiculos 
foreach ($consulta as $vehiculo) : ?>
  <div class="<?php //depende la pagina mostrar cada clase
   echo $page === 'index' ? 'col-md-4' : 'col-md-6' ?>">
    <div class="product-item">
      <?php if($vehiculo->km == 0){?>
    <div class="d-inline-flex p-2 mb-2 bg-danger text-white font-weight-bold position-absolute"><i class="fa-solid fa-gift"></i>&nbsp;0 km</div>
    <?php } ?>
    
    <a href="/vehiculo?id=<?php echo $vehiculo->id; ?>">
    
      <?php if($vehiculo->precio > 0){?>
        <div class="p-2 mb-2 text-white bg-dark font-weight-bold position-absolute" style="top: 0;right: 15px;">$ <?php echo number_format($vehiculo->precio,0,null,'.'); ?></div>
        <?php } ?>

      <?php foreach ($imagenes as $imagen) : ?>
        <?php if ($vehiculo->id == $imagen->vehiculoId){?>
          <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" alt="anuncio">
          <?php } ?>
          <?php endforeach; ?>
          <div class="down-content">
            <h2><?php echo $vehiculo->marca . " " . $vehiculo->modelo; ?></h2>
            <smTodos>
              <strong title="Year"><i class="fa-solid fa-calendar-days"></i> <?php echo $vehiculo->year; ?></strong> &nbsp;&nbsp;
              <strong title="Kms"><i class="fa fa-dashboard"></i> <?php echo number_format($vehiculo->km,0,null,'.'); ?> km</strong> &nbsp;&nbsp;
              <strong title="Combustible"><i class="fa fa-cube"></i> <?php echo $vehiculo->combustible; ?></strong>&nbsp;&nbsp;
            </smTodos>
            <p><?php echo substr($vehiculo->descripcion,0,80); ?>...</p>
          </div>
        </a>
      </div>
    </div>
    <?php endforeach; ?>