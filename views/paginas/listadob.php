<?php // consulta trae el arr de los bicicletas 
foreach ($consultas as $bicicleta) : ?>
  <div class="<?php //depende la pagina mostrar cada clase
   echo $_SERVER['PHP_SELF'] === '/index.php/bicicletas' ? 'col-md-6' : 'col-md-4' ?>">
    <div class="product-item">
    <a href="/bicicleta?id=<?php echo $bicicleta->id; ?>">
        <?php foreach ($imageness as $imagen) : ?>
          <?php if ($imagen->bicicletaId === $bicicleta->id) { ?>
            <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" alt="anuncio">
          <?php break;
          } ?>
        <?php endforeach; ?>
        <div class="down-content">
          <h2><?php echo $bicicleta->marca; ?></h2>
            <smTodos>
              <strong title="Rodado"><i class="fa-solid fa-person-biking"></i> Rodado <?php echo $bicicleta->rodado; ?></strong> &nbsp;&nbsp;
            </smTodos>
          <p><?php echo $bicicleta->descripcion; ?></p>
        </div>
      </a>
    </div>
  </div>
<?php endforeach; ?>