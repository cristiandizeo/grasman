<?php $resultado = isset($_POST['resultados']) ? $_POST['resultados'] : false; ?>
<label>Nuevo/usado:</label>

<select name="vehiculo[estado]" id="estado" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option <?php echo s($vehiculo->estado) === s($resultado->estado) ? 'selected' : '' ?> value="<?php echo s($vehiculo->estado); ?>"><?php echo s($vehiculo->estado); ?></option>
  <?php endforeach; ?>
</select>

<label>Tipo vehiculo:</label>

<select name="vehiculo[tipo]" id="tipo" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option <?php echo $_POST['tipo'] === s($vehiculo->tipo) ? 'selected' : '' ?> value="<?php echo s($vehiculo->tipo); ?>"><?php echo s($vehiculo->tipo); ?></option>
  <?php endforeach; ?>
</select>

<label>Marca:</label>

<select name="vehiculo[marca]" id="marca" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option <?php echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'active' : '' ?> value="<?php echo s($vehiculo->marca); ?>"><?php echo s($vehiculo->marca); ?></option>
  <?php endforeach; ?>
</select>

<label>Modelo:</label>

<select name="vehiculo[modelo]" id="modelo" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option <?php echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'active' : '' ?> value="<?php echo s($vehiculo->modelo); ?>"><?php echo s($vehiculo->modelo); ?></option>
  <?php endforeach; ?>
</select>

<label>Precio:</label>

<select name="vehiculo[precio]" id="precio" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option <?php echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'active' : '' ?> value="<?php echo s($vehiculo->precio); ?>"><?php echo s($vehiculo->precio); ?></option>
  <?php endforeach; ?>
</select>

<label>Kms:</label>

<select name="vehiculo[km]" id="km" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option <?php echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'active' : '' ?> value="<?php echo s($vehiculo->km); ?>"><?php echo s($vehiculo->km); ?></option>
  <?php endforeach; ?>
</select>

<label>Caja:</label>
<select name="vehiculo[caja]" id="caja" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option <?php echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'active' : '' ?> value="<?php echo s($vehiculo->caja); ?>"><?php echo s($vehiculo->caja); ?></option>
  <?php endforeach; ?>
</select>

<label>Combustible:</label>

<select name="vehiculo[combustible]" id="combustible" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($vehiculos as $vehiculo) : ?>
    <option <?php echo $_SERVER['PHP_SELF'] === '/index.php/vehiculos' ? 'active' : '' ?> value="<?php echo s($vehiculo->combustible); ?>"><?php echo s($vehiculo->combustible); ?></option>
  <?php endforeach; ?>
</select>