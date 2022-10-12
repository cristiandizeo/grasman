<?php // consulta trae el arr de los vehiculos 
foreach ($consulta as $vehiculo) : ?>
  <div class="<?php //depende la pagina mostrar cada clase
   echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'col-md-6' : 'col-md-4' ?>">
    <div class="product-item">
      <?php if($vehiculo->km == 0){?>
    <div class="d-inline-flex p-2 mb-2 bg-danger text-white font-weight-bold position-absolute"><i class="fa-solid fa-gift"></i>&nbsp;0 km</div>
    <?php } ?>
    <a href="/vehiculo?id=<?php echo $vehiculo->id; ?>">
        <?php foreach ($imagenes as $imagen) : ?>
          <?php if ($imagen->vehiculoId === $vehiculo->id) { ?>
            <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" alt="anuncio">
          <?php break;
          } ?>
        <?php endforeach; ?>
        <div class="down-content">
          <h2><?php echo $vehiculo->marca . " " . $vehiculo->modelo; ?></h2>
          <?php if ($vehiculo->tipo !== 'Bicicleta') { ?>
            <smTodos>
              <strong title="Year"><i class="fa-solid fa-calendar-days"></i> <?php echo $vehiculo->year; ?></strong> &nbsp;&nbsp;
              <strong title="Kms"><i class="fa fa-dashboard"></i> <?php echo $vehiculo->km; ?> km</strong> &nbsp;&nbsp;
              <strong title="Combustible"><i class="fa fa-cube"></i> <?php echo $vehiculo->combustible; ?></strong>&nbsp;&nbsp;
            </smTodos>
          <?php } ?>
          <p><?php echo $vehiculo->descripcion; ?></p>
        </div>
      </a>
    </div>
  </div>
<?php endforeach; ?>