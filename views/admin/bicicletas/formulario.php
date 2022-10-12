<div class="container">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">

    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="tipo">Tipo bicicleta</label>
        <select required class="form-control" id="tipo" name="bicicleta[tipo]">
          <option value=""></option>
          <option value="BMX" <?php if (s($bicicleta->tipo) == "BMX") echo 'selected="selected" '; ?>>BMX</option>
          <option value="Electricas" <?php if (s($bicicleta->tipo) == "Electricas") echo 'selected="selected" '; ?>>Electricas</option>
          <option value="Infantiles" <?php if (s($bicicleta->tipo) == "Infantiles") echo 'selected="selected" '; ?>>Infantiles</option>
          <option value="MTB" <?php if (s($bicicleta->tipo) == "MTB") echo 'selected="selected" '; ?>>MTB</option>
          <option value="Paseo" <?php if (s($bicicleta->tipo) == "Paseo") echo 'selected="selected" '; ?>>Paseo</option>
          <option value="Plegables" <?php if (s($bicicleta->tipo) == "Plegables") echo 'selected="selected" '; ?>>Plegables</option>
          <option value="Ruta" <?php if (s($bicicleta->tipo) == "Ruta") echo 'selected="selected" '; ?>>Ruta</option>
          <option value="Urbanas" <?php if (s($bicicleta->tipo) == "Urbanas") echo 'selected="selected" '; ?>>Urbanas</option>
        </select>
        <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>
        <div class="invalid-feedback">Seleccioná un tipo de bicicleta</div>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="marca">Marca</label>
        <input type="text" id="marca" value="<?php echo s($bicicleta->marca); ?>" name="bicicleta[marca]" class="form-control" required />
        <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>
        <div class="invalid-feedback">Agregá una marca</div>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="rodado">Rodado</label>
        <input type="number" id="rodado" value="<?php echo s($bicicleta->rodado); ?>" name="bicicleta[rodado]" class="form-control" required />
        <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>
        <div class="invalid-feedback">Agregá un año de fabricación</div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="precio">Precio</label>
        <input type="number" id="precio" value="<?php echo s($bicicleta->precio); ?>" name="bicicleta[precio]" class="form-control" />
      </div>
    </div>

  </div>

  <div class="row mb-8">
    <!-- Text input -->
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="descripcion">Descripcion</label>
        <textarea minlength="50" class="form-control" required id="descripcion" name="bicicleta[descripcion]" rows="3"><?php echo s($bicicleta->descripcion); ?></textarea>
        <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>
        <div class="invalid-feedback">Agregá una descripcion</div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Text input -->
    <div class="col">
      <div class="form-outline mb-4">
        <label for="imagen">Imagenes</label>
        <div class="form-group">
          <input type="file" accept="image/jpeg, image/png" class="form-control-file" id="imagen" name="imagenes[]" multiple="">
          <?php foreach ($imageness as $imagen) : ?>
            <?php if ($imagen->bicicletaId === $bicicleta->id) { ?>
              <div class="mini-img">
              <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" class="m-2"> <a type="submit" class="eliminarImg" data-id="<?php echo trim($imagen->id);?>"><i id="close-btn" class="fa-regular fa-circle-xmark"></i></a>  
              </div>
              <?php } ?>
          <?php endforeach; ?>
        </div>
        <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>
        <div class="invalid-feedback">Agregá imágenes</div>
      </div>
    </div>
  </div>
  <!-- Checkbox -->
  <div class="d-flex mb-4">
    <input class="form-check-input me-2" type="checkbox" id="visible" name="bicicleta[visible]" value="1" <?php if (s($bicicleta->visible) == "1") echo 'checked'; ?> />
    <label class="form-check-label" for="visible"> Mostrar en el sitio </label>
  </div>
</div>