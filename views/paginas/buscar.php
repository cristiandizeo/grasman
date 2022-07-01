
<label>Nuevo/usado:</label>
<select id="myselect" name="vehiculo[estado]" id="estado" class="form-control">
  <option value="">Todos</option>  
  <?php foreach($buscador as $keys) : ?>
  <?php foreach($keys as $data) : ?>
    <?php if($data->estado != ""){ ?>
    <option value="<?php echo s($data->estado); ?>" <?php if ($args != null) echo s($args['estado']) === s($data->estado) ? 'selected="selected"' : '' ?>><?php echo s($data->estado); ?></option>
  <?php } ?>
  <?php endforeach; ?>
  <?php endforeach; ?>
</select>

<label>Tipo vehiculo:</label>
<select id="myselect" name="vehiculo[tipo]" id="tipo" class="form-control">
  <option value="">Todos</option>
  <?php foreach($buscador as $keys) : ?>
  <?php foreach($keys as $data) : ?>
    <?php if($data->tipo != ""){ ?>
    <option value="<?php echo s($data->tipo); ?>" <?php if ($args != null) echo s($args['tipo']) === s($data->tipo) ? 'selected="selected"' : '' ?>><?php echo s($data->tipo); ?></option>
  <?php } ?>
  <?php endforeach; ?>
  <?php endforeach; ?>
</select>

<label>Marca:</label>
<select id="myselect" name="vehiculo[marca]" id="marca" class="form-control">
  <option value="">Todos</option>  
  <?php foreach($buscador as $keys) : ?>
  <?php foreach($keys as $data) : ?>
    <?php if($data->marca != ""){ ?>
    <option value="<?php echo s($data->marca); ?>" <?php if ($args != null) echo s($args['marca']) === s($data->marca) ? 'selected="selected"' : '' ?>><?php echo s($data->marca); ?></option>
  <?php } ?>
  <?php endforeach; ?>
  <?php endforeach; ?>
</select>

<label>Caja:</label>
<select id="myselect" name="vehiculo[caja]" id="caja" class="form-control">
  <option value="">Todos</option>  
  <?php foreach($buscador as $keys) : ?>
  <?php foreach($keys as $data) : ?>
    <?php if($data->caja != ""){ ?>
    <option value="<?php echo s($data->caja); ?>" <?php if ($args != null) echo s($args['caja']) === s($data->caja) ? 'selected="selected"' : '' ?>><?php echo s($data->caja); ?></option>
  <?php } ?>
  <?php endforeach; ?>
  <?php endforeach; ?>
</select>

<label>Combustible:</label>

<select id="myselect" name="vehiculo[combustible]" id="combustible" class="form-control">
  <option value="">Todos</option>  
  <?php foreach($buscador as $keys) : ?>
  <?php foreach($keys as $data) : ?>
    <?php if($data->combustible != ""){ ?>
    <option value="<?php echo s($data->combustible); ?>" <?php if ($args != null) echo s($args['combustible']) === s($data->combustible) ? 'selected="selected"' : '' ?>><?php echo s($data->combustible); ?></option>
  <?php } ?>
  <?php endforeach; ?>
  <?php endforeach; ?>
</select>