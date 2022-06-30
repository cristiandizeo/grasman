<?php foreach ($resultados as $resultado) : ?>
  <div class="<?php echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'col-md-6' : 'col-md-4' ?>">
    <div class="product-item">
      <a href="/vehiculo?id=<?php echo $resultado->id; ?>">
        <img loading="lazy" src="/imagenes/<?php echo $resultado->imagen; ?>" alt="anuncio">

        <div class="down-content">
          <h2><?php echo $resultado->marca . " " . $resultado->modelo; ?></h2>

          <p>&nbsp;/&nbsp; <?php echo $resultado->estado; ?> &nbsp;/&nbsp; <?php echo $resultado->year; ?> &nbsp;/&nbsp;</p>
          <p><?php echo $resultado->descripcion; ?></p>
          <smTodos>
            <strong title="Kms"><i class="fa fa-dashboard"></i> <?php echo $resultado->km; ?> km</strong> &nbsp;&nbsp;&nbsp;&nbsp;
            <strong title="Combustible"><i class="fa fa-cube"></i> <?php echo $resultado->combustible; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
            <strong title="Caja"><i class="fa fa-cog"></i> <?php echo $resultado->caja; ?></strong>
          </smTodos>
        </div>
      </a>
  </div>
  </div>

<?php endforeach; ?>