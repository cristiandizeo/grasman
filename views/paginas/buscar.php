<label>Nuevo/usado:</label>
<select id="myselect" name="estado" id="estado" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($buscador as $keys) : ?>
    <?php foreach ($keys as $data) : ?>
      <?php if ($data->estado != "") { ?>
        <option value="<?php echo s($data->estado); ?>" <?php if ($args != null  && isset($args['estado'])) echo s($args['estado']) === s($data->estado) ? 'selected="selected"' : '' ?>><?php echo s($data->estado); ?></option>
      <?php } ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</select>

<label>Tipo vehiculo:</label>
<select id="myselect" name="tipo" id="tipo" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($buscador as $keys) : ?>
    <?php foreach ($keys as $data) : ?>
      <?php if ($data->tipo != "") { ?>
        <option value="<?php echo s($data->tipo); ?>" <?php if ($args != null  && isset($args['tipo'])) echo s($args['tipo']) === s($data->tipo) ? 'selected="selected"' : '' ?>><?php echo s($data->tipo); ?></option>
      <?php } ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</select>

<label>Marca:</label>
<select id="myselect" name="marca" id="marca" class="form-control">
  <option value="">Todos</option>
  <?php foreach ($buscador as $keys) : ?>
    <?php foreach ($keys as $data) : ?>
      <?php if ($data->marca != "") { ?>
        <option value="<?php echo s($data->marca); ?>" <?php if ($args != null  && isset($args['marca'])) echo s($args['marca']) === s($data->marca) ? 'selected="selected"' : '' ?>><?php echo s($data->marca); ?></option>
      <?php } ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</select>