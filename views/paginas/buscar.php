<label>Nuevo/usado:</label>

<select value="<?php echo s($vehiculo->estado); ?>" name="vehiculo[estado]" id="estado" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option><?php echo s($vehiculo->estado); ?></option>
  <?php endforeach; ?>
</select>

<label>Tipo vehiculo:</label>

<select value="<?php echo s($vehiculo->tipo); ?>" name="vehiculo[tipo]" id="tipo" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option><?php echo s($vehiculo->tipo); ?></option>
  <?php endforeach; ?>
</select>

<label>Marca:</label>

<select value="<?php echo s($vehiculo->marca); ?>" name="vehiculo[marca]" id="marca" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option><?php echo s($vehiculo->marca); ?></option>
  <?php endforeach; ?>
</select>

<label>Modelo:</label>

<select value="<?php echo s($vehiculo->modelo); ?>" name="vehiculo[modelo]" id="modelo" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option><?php echo s($vehiculo->modelo); ?></option>
  <?php endforeach; ?>
</select>

<label>Precio:</label>

<select value="<?php echo s($vehiculo->precio); ?>" name="vehiculo[precio]" id="precio" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option><?php echo s($vehiculo->precio); ?></option>
  <?php endforeach; ?>
</select>

<label>Kms:</label>

<select value="<?php echo s($vehiculo->km); ?>" name="vehiculo[km]" id="km" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option><?php echo s($vehiculo->km); ?></option>
  <?php endforeach; ?>
</select>

<label>Caja:</label>
<select value="<?php echo s($vehiculo->caja); ?>" name="vehiculo[caja]" id="caja" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option><?php echo s($vehiculo->caja); ?></option>
  <?php endforeach; ?>
</select>

<label>Combustible:</label>

<select value="<?php echo s($vehiculo->combustible); ?>" name="vehiculo[combustible]" id="combustible" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option><?php echo s($vehiculo->combustible); ?></option>
  <?php endforeach; ?>
</select>