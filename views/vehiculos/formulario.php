<div class="container">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
            <div class="invalid-feedback">Example invalid feedback text</div>
        <div class="form-outline">
          <input type="text" id="patente" value="<?php echo s($vehiculo->patente)?>" name="vehiculo[patente]" class="form-control" />
          <label class="form-label" for="patente">Patente</label>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <select required class="form-control" id="tipo" value="<?php echo s($vehiculo->tipo)?>" name="vehiculo[tipo]">
            <option>Auto</option>
            <option>PickUp</option>
            <option>Moto</option>
          </select>
        </div>
        <label class="form-label" for="tipo">Tipo vehiculo</label>
        <div class="invalid-feedback">Example invalid feedback text</div>
      </div>
      <div class="col">
            <div class="invalid-feedback">Example invalid feedback text</div>
        <div class="form-outline">
          <input type="text" id="marca" value="<?php echo s($vehiculo->marca)?>" name="vehiculo[marca]" class="form-control" />
          <label class="form-label" for="marca">Marca</label>
        </div>
      </div>
      <div class="col">
            <div class="invalid-feedback">Example invalid feedback text</div>
        <div class="form-outline">
          <input type="text" id="modelo" value="<?php echo s($vehiculo->modelo)?>" name="vehiculo[modelo]" class="form-control" />
          <label class="form-label" for="modelo">Modelo</label>
        </div>
      </div>
      <div class="col">
            <div class="invalid-feedback">Example invalid feedback text</div>
        <div class="form-outline">
          <input type="text" id="year" value="<?php echo s($vehiculo->year)?>" name="vehiculo[year]" class="form-control" />
          <label class="form-label" for="year">Año</label>
        </div>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col">
            <div class="invalid-feedback">Example invalid feedback text</div>
        <div class="form-outline">
          <input type="text" id="precio" value="<?php echo s($vehiculo->precio)?>" name="vehiculo[precio]" class="form-control" />
          <label class="form-label" for="precio">Precio</label>
        </div>
      </div>
      <div class="col">
            <div class="invalid-feedback">Example invalid feedback text</div>
        <div class="form-outline">
          <input type="text" id="km" value="<?php echo s($vehiculo->km)?>" name="vehiculo[km]" class="form-control" />
          <label class="form-label" for="km">Kilometraje</label>
        </div>
      </div>
      <div class="col">
            <div class="invalid-feedback">Example invalid feedback text</div>
        <div class="form-outline">
          <select required class="form-control" id="combustible" value="<?php echo s($vehiculo->combustible)?>" name="vehiculo[combustible]">
            <option>Nafta</option>
            <option>GNC</option>
            <option>Gasoil</option>
          </select>
        </div>
        <label class="form-label" for="combustible">Combustible</label>
      </div>
      <div class="col">
            <div class="invalid-feedback">Example invalid feedback text</div>
        <div class="form-outline">
          <select required class="form-control" id="caja" value="<?php echo s($vehiculo->caja)?>" name="vehiculo[caja]">
            <option>Manual</option>
            <option>Automática</option>
          </select>
        </div>
        <label class="form-label" for="caja">Caja</label>
      </div>
    </div>

    <div class="row mb-8">
      <!-- Text input -->
      <div class="col">
            <div class="invalid-feedback">Example invalid feedback text</div>
        <div class="form-outline">
          <label class="form-label" for="descripcion">Descripcion</label>
          <textarea class="form-control" id="descripcion" value="<?php echo s($vehiculo->descripcion)?>" name="vehiculo[descripcion]" rows="3"></textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Text input -->
      <div class="col">
            <div class="invalid-feedback">Example invalid feedback text</div>
        <div class="form-outline mb-4">
          <div class="form-group">
            <label for="imagen">Imagenes</label>
            <input type="file" accept="image/jpeg, image/png" class="form-control-file" id="imagen" value="<?php echo s($vehiculo->imagen)?>" name="vehiculo[imagen]">
          </div>
        </div>
      </div>
    </div>
    <!-- Checkbox -->
    <div class="form-check d-flex mb-4">
      <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" value="<?php echo s($vehiculo->form6Example8)?>" name="vehiculo[form6Example8]" checked />
      <label class="form-check-label" for="form6Example8"> Mostrar en el sitio </label>
    </div>
</div>