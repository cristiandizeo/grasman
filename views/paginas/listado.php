<?php // consulta trae el arr de los vehiculos 
foreach ($consulta as $vehiculo) : ?>
  <div class="<?php //depende la pagina mostrar cada clase
   echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'col-md-6' : 'col-md-4' ?>">
    <div class="product-item">
      <a href="/vehiculo?id=<?php echo $vehiculo->id; ?>">
        <?php foreach ($imagenes as $imagen) : ?>
          <?php if ($imagen->vehiculoId === $vehiculo->id) { ?>
            <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" alt="anuncio">
          <?php break;
          } ?>
        <?php endforeach; ?>
        <div class="down-content">
          <h2><?php echo $vehiculo->marca . " " . $vehiculo->modelo; ?></h2>

          <p>&nbsp;/&nbsp; <?php echo $vehiculo->estado; ?> &nbsp;/&nbsp; <?php echo $vehiculo->year; ?> &nbsp;/&nbsp;</p>
          <p><?php echo $vehiculo->descripcion; ?></p>
          <?php if ($vehiculo->tipo !== 'Bicicleta') { ?>
            <smTodos>
              <strong title="Kms"><i class="fa fa-dashboard"></i> <?php echo $vehiculo->km; ?> km</strong> &nbsp;&nbsp;&nbsp;&nbsp;
              <strong title="Combustible"><i class="fa fa-cube"></i> <?php echo $vehiculo->combustible; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
              <strong title="Caja"><i class="fa fa-cog"></i> <?php echo $vehiculo->caja; ?></strong>
            </smTodos>
          <?php } ?>
        </div>
      </a>
    </div>
  </div>
<?php endforeach; ?>