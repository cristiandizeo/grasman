
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <fieldset>
          <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Tu nombre" required="" value="mail[nombre]">
        </fieldset>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <fieldset>
          <input name="email" type="email" class="form-control" id="email" placeholder="Tu E-Mail" required="" value="mail[email]">
        </fieldset>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <fieldset>
          <input name="telefono" type="number" class="form-control" id="telefono" placeholder="Telefono" required="" value="mail[telefono]">
        </fieldset>
      </div>
      <?php if($_SERVER['PHP_SELF'] === '/index.php/quiero-vender'){ ?>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <fieldset>
          <label for="imagen">Fotos del vehículo (máximo 5)</label>
          <input type="file" accept="image/jpeg, image/png" class="form-control-file" id="imagen" name="imagenes[]" multiple="" value="mail[imagen]">
        </fieldset>
      </div>
      <?php } ?>
      <div class="col-lg-12">
        <fieldset>
          <textarea name="mensaje" rows="6" class="form-control" id="mensaje" placeholder="Mensaje" required=""><?php echo $_SERVER['PHP_SELF'] === '/index.php/vehiculo' ? 'Hola, quería saber más información sobre ' . $vehiculo->marca . ' ' . $vehiculo->modelo . ' ' . $vehiculo->year : '' ?> <?php echo 'mail[mensaje]'; ?></textarea>
        </fieldset>
      </div>
      <div class="col-lg-12">
        <fieldset>
          <button type="submit" id="form-submit" class="filled-button">Enviar mensaje</button>
        </fieldset>
      </div>
    </div>
