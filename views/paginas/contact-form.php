
  <form id="form" class="form">

  <div class="alert alert-success text-center alert-dismissible fade show" id="msjEnviado" role="alert">
        <strong>¡Gracias por tu mensaje!</strong><br> Te responderemos en breve <i class="fa-solid fa-car-on"></i></i>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
      </div>
      <div class="alert alert-danger text-center alert-dismissible fade show" id="msjNoEnviado" role="alert">
        <strong>No se pudo enviar el mensaje <i class="fa-solid fa-car-burst"></i></strong><br> Por favor revisá el formulario o intentá en unos momentos.</i>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
      </div>
      <div class="alert alert-primary text-center alert-dismissible fade show" id="alertaEnviando" role="alert">
        <strong>Enviando mensaje <i class="fa-solid fa-paper-plane"></i></strong>
      </div>

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
      <textarea name="mail[mensaje]" rows="6" class="form-control" id="mensaje" placeholder="Tu mensaje" required=""><?php if ($_SERVER['PHP_SELF'] === '/index.php/vehiculo'){ echo 'Hola, quería saber más información sobre ' . $vehiculo->marca . ' ' . $vehiculo->modelo . ' ' . $vehiculo->year;}?><?php echo s($mail->mensaje); ?></textarea>
    </fieldset>
  </div>
  <div class="col-lg-12">
    <fieldset>
      <button type="submit" id="form-submit" class="filled-button">Enviar mensaje</button>
    </fieldset>
  </div>
</div>

</form>