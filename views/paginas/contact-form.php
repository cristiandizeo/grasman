<?php foreach ($errores as $error) : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong><?php echo $error; ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endforeach; ?>
<?php if ($resultado) { ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>¡Gracias por escribirnos!</strong> Te responderemos en breve.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php } ?>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <fieldset>
      <input value="<?php echo s($mail->nombre); ?>" name="mail[nombre]" type="text" class="form-control" id="nombre" placeholder="Tu nombre" required="">
    </fieldset>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12">
    <fieldset>
      <input value="<?php echo s($mail->email); ?>" name="mail[email]" type="email" class="form-control" id="email" placeholder="Tu E-Mail" required="">
    </fieldset>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12">
    <fieldset>
      <input value="<?php echo s($mail->telefono); ?>" name="mail[telefono]" type="number" class="form-control" id="telefono" placeholder="Telefono" required="">
    </fieldset>
  </div>
  <?php if ($_SERVER['PHP_SELF'] === '/index.php/quiero-vender') { ?>
    <div class="col-lg-12 col-md-12 col-sm-12">
      <fieldset>
        <label for="imagen">Fotos del vehículo (máximo 5)</label>
        <input type="file" accept="image/jpeg, image/png" class="form-control-file" id="imagen" name="imagenes[]" multiple="">
      </fieldset>
    </div>
  <?php } ?>
  <div class="col-lg-12">
    <fieldset>
      <textarea name="mail[mensaje]" rows="6" class="form-control" id="mensaje" placeholder="Tu mensaje" required=""><?php if ($_SERVER['PHP_SELF'] === '/index.php/vehiculo'){ echo 'Hola, quería saber más información sobre ' . $vehiculo->marca . ' ' . $vehiculo->modelo . ' ' . $vehiculo->year;}?></textarea>
    </fieldset>
  </div>
  <div class="col-lg-12">
    <fieldset>
      <button type="submit" id="form-submit" class="filled-button">Enviar mensaje</button>
    </fieldset>
  </div>
</div>
<script>
  //Evita reenviar form
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>