<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="vehiculo[titulo]" placeholder="Titulo Vehiculo" value="<?php echo s( $vehiculo->titulo ); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="vehiculo[precio]" placeholder="Precio Vehiculo" value="<?php echo s($vehiculo->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="vehiculo[imagen]">

    <?php if($vehiculo->imagen) { ?>
        <img src="/imagenes/<?php echo $vehiculo->imagen ?>" class="imagen-small">
    <?php } ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="vehiculo[descripcion]"><?php echo s($vehiculo->descripcion); ?></textarea>

</fieldset>

<fieldset>
    <legend>Información Vehiculo</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input 
        type="number" 
        id="habitaciones" 
        name="vehiculo[habitaciones]" 
        placeholder="Ej: 3" 
        min="1" 
        max="9" 
        value="<?php echo s($vehiculo->habitaciones); ?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="vehiculo[wc]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($vehiculo->wc); ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" name="vehiculo[estacionamiento]" placeholder="Ej: 3" min="1" max="9" 
        value="<?php echo s($vehiculo->estacionamiento); ?>">

</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <select name="vehiculo[vendedorId]" id="nombre_vendedor">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($vendedores as $vendedor) { ?>
            <option <?php echo $vehiculo->vendedorId === $vendedor->id ? 'selected' : '' ?> value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
        <?php  } ?>
    </select>

</fieldset>