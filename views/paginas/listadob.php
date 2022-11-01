<?php // consulta trae el arr de los bicicletas 
foreach ($consultas as $bicicleta) : ?>
  <div class="<?php //depende la pagina mostrar cada clase
   echo $page === 'index' ? 'col-md-4' : 'col-md-6' ?>">
    <div class="product-item">
    <a href="/bicicleta?id=<?php echo $bicicleta->id; ?>">
    <?php if($bicicleta->precio > 0){?>
        <div class="p-2 mb-2 text-white bg-dark font-weight-bold position-absolute" style="top: 0;right: 15px;">$ <?php echo number_format($bicicleta->precio,0,null,'.'); ?></div>
        <?php } ?>
        <?php foreach ($imageness as $imagen) : ?>
          <?php if ($bicicleta->id == $imagen->bicicletaId){?>
            <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" alt="anuncio">
          <?php } ?>
            <?php endforeach; ?>
        <div class="down-content">
          <h2><?php echo $bicicleta->marca; ?></h2>
            <smTodos>
              <strong title="Rodado"><i class="fa-solid fa-person-biking"></i> Rodado <?php echo $bicicleta->rodado; ?></strong> &nbsp;&nbsp;
            </smTodos>
          <p><?php echo substr($bicicleta->descripcion,0,80); ?>...</p>
        </div>
      </a>
    </div>
  </div>
<?php endforeach; ?>