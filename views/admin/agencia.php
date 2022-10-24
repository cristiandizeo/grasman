
    <main class="contenedor dashboard">
      <div class="m-5">
        <div class="text-center">
          <h2>Agencia</h2>
        </div>
        <hr>
        
        <!-- Text input -->
        <div class="col">
          <div class="form-outline mb-4">
        <form class="needs-validation" method="POST" enctype="multipart/form-data">
        <label for="imagen">Cargar o eliminar imagenes</label>
        <div class="form-group">
          <input type="file" accept="image/jpeg, image/png" class="form-control-file" id="imagen" name="imagenes[]" multiple="">
          <?php if ($imagenes < 1){ ?> 
            <div>No se encontraron resultados</div>
          <?php } ?>
          <div id="imageListId">
          <?php foreach ($imagenes as $imagen) : ?>
                <div class="listitemClass mini-img">
                  <input type="text" value="" hidden>
              <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" class="m-2"> 
              <a type="submit" class="eliminarImg" data-id="<?php echo trim($imagen->id);?>"><i id="close-btn" class="fa-regular fa-circle-xmark"></i></a>  
              </div>
              <?php endforeach; ?>
            </div>
        </div>
        <div id="outputDiv">
        <b>Output of ID's of images : </b>
        <input id="outputvalues" type="text" value="" />
    </div>
        <input type="submit" value="Subir imágenes" class="btn btn-primary m-3">
        </form>
      </div>
    </div>
  </div>
</main>
