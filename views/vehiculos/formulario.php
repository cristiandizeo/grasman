<div class="container">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="patente">Patente</label>
          <input type="text" id="patente" value="<?php echo s($vehiculo->patente);?>" name="vehiculo[patente]" class="form-control" />
          <div class="invalid-feedback">Agregá una patente</div>
          <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>  
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="tipo">Tipo vehiculo</label>
        <select required class="form-control" id="tipo" name="vehiculo[tipo]">
        <option value=""></option>
        <option value="Auto" <?php if (s($vehiculo->tipo) == "Auto") echo 'selected="selected" ';?>>Auto</option>
            <option value="Pickup" <?php if (s($vehiculo->tipo) == "Pickup") echo 'selected="selected" ';?>>Pickup</option>
            <option value="Moto" <?php if (s($vehiculo->tipo) == "Moto") echo 'selected="selected" ';?>>Moto</option>
            <option value="Bicicleta" <?php if (s($vehiculo->tipo) == "Bicicleta") echo 'selected="selected" ';?>>Bicicleta</option>
          </select>
          <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>
          <div class="invalid-feedback">Seleccioná un tipo de vehiculo</div>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="marca">Marca</label>
          <input type="text" id="marca" value="<?php echo s($vehiculo->marca);?>" name="vehiculo[marca]" class="form-control" required />
          <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>      
          <div class="invalid-feedback">Agregá una marca</div>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="modelo">Modelo</label>
          <input type="text" id="modelo" value="<?php echo s($vehiculo->modelo);?>" name="vehiculo[modelo]" class="form-control" />
          <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>      
          <div class="invalid-feedback">Agregá un modelo</div>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="year">Año</label>
          <input type="number" id="year" value="<?php echo s($vehiculo->year);?>" name="vehiculo[year]" class="form-control" required />
          <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>      
          <div class="invalid-feedback">Agregá un año de fabricación</div>
        </div>
      </div>
    </div>

    <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="estado">Estado</label>
        <select required class="form-control" id="estado" name="vehiculo[estado]">
        <option value=""></option>
          <option value="Nuevo" <?php if (s($vehiculo->estado) == "Nuevo") echo 'selected="selected" ';?>>Nuevo</option>
          <option value="Usado" <?php if (s($vehiculo->estado) == "Usado") echo 'selected="selected" ';?>>Usado</option>
        </select>
        <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>        
        <div class="invalid-feedback">Seleccioná el estado del vehículo</div>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="precio">Precio</label>
          <input type="number" id="precio" value="<?php echo s($vehiculo->precio);?>" name="vehiculo[precio]" class="form-control" />
          <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>      
          <div class="invalid-feedback">Agregá un precio</div>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="km">Kilometraje</label>
          <input type="number" id="km" value="<?php echo s($vehiculo->km);?>" name="vehiculo[km]" class="form-control" />
          <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>      
        <div class="invalid-feedback">Agregá el kilometraje</div>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="combustible">Combustible</label>
          <select class="form-control" id="combustible" name="vehiculo[combustible]">
          <option value=""></option>
          <option value="Nafta" <?php if (s($vehiculo->combustible) == "Nafta") echo 'selected="selected" ';?>>Nafta</option>
            <option value="GNC" <?php if (s($vehiculo->combustible) == "GNC") echo 'selected="selected" ';?>>GNC</option>
            <option value="Gasoil" <?php if (s($vehiculo->combustible) == "Gasoil") echo 'selected="selected" ';?>>Gasoil</option>
          </select>
          <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>      
          <div class="invalid-feedback">Agregá el tipo de combustible</div>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="caja">Caja</label>
          <select required class="form-control" id="caja" name="vehiculo[caja]">
          <option value=""></option>
          <option value="Manual" <?php if (s($vehiculo->caja) == "Manual") echo 'selected="selected" ';?>>Manual</option>
            <option value="Automática" <?php if (s($vehiculo->caja) == "Automática") echo 'selected="selected" ';?>>Automática</option>
          </select>
          <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>      
          <div class="invalid-feedback">Agregá el tipo de caja </div>
        </div>
      </div>
    </div>
    
    <div class="row mb-8">
      <!-- Text input -->
      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="descripcion">Descripcion</label>
          <textarea class="form-control" required id="descripcion" name="vehiculo[descripcion]" rows="3"><?php echo s($vehiculo->descripcion);?></textarea>
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
            <input type="file" accept="image/jpeg, image/png" class="form-control-file" id="imagen" name="imagenes[]" multiple="" required>
            <?php foreach($imagenes as $imagen) : ?>
            <?php if ($imagen->vehiculoId === $vehiculo->id){?>
        <img loading="lazy" src="/imagenes/<?php echo trim($imagen->name); ?>" class="mini-img m-2">
<?php }?>
<?php endforeach; ?>
            </div>
            <div class="valid-feedback"><i class="fa-solid fa-check"></i></div>      
            <div class="invalid-feedback">Agregá imágenes</div>
          </div>
        </div>
      </div>
      <!-- Checkbox -->
      <div class="d-flex mb-4">
      <input class="form-check-input me-2" type="checkbox" id="visible" name="vehiculo[visible]" value="1" <?php if (s($vehiculo->visible) == "1") echo 'checked';?> />
      <label class="form-check-label" for="visible"> Mostrar en el sitio </label>
    </div>
</div>