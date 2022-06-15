    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Nuestros vehículos</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
             <div class="contact-form">
                <form action="buscar" method="POST">
                     <label>Nuevo/usado:</label>
                     
                     <select value="<?php echo s($vehiculo->estado);?>" name="vehiculo[estado]" class="form-control">
                       <option value="">Todos</option>
                      <?php foreach ($vehiculos as $vehiculo):?>
                          <option><?php echo s($vehiculo->estado);?></option>
                          <?php endforeach;?>
                     </select>

                     <label>Tipo vehiculo:</label>
                     
                     <select value="<?php echo s($vehiculo->tipo);?>" name="vehiculo[estado]" class="form-control">
                       <option value="">Todos</option>
                      <?php foreach ($vehiculos as $vehiculo):?>
                          <option><?php echo s($vehiculo->tipo);?></option>
                          <?php endforeach;?>
                     </select>

                     <label>Marca:</label>
                     
                     <select value="<?php echo s($vehiculo->marca);?>" name="vehiculo[estado]" class="form-control">
                       <option value="">Todos</option>
                      <?php foreach ($vehiculos as $vehiculo):?>
                          <option><?php echo s($vehiculo->marca);?></option>
                          <?php endforeach;?>
                     </select>

                     <label>Modelo:</label>
                     
                     <select value="<?php echo s($vehiculo->modelo);?>" name="vehiculo[estado]" class="form-control">
                       <option value="">Todos</option>
                      <?php foreach ($vehiculos as $vehiculo):?>
                          <option><?php echo s($vehiculo->modelo);?></option>
                          <?php endforeach;?>
                     </select>

                     <label>Precio:</label>
                     
                     <select value="<?php echo s($vehiculo->precio);?>" name="vehiculo[estado]" class="form-control">
                       <option value="">Todos</option>
                      <?php foreach ($vehiculos as $vehiculo):?>
                          <option><?php echo s($vehiculo->precio);?></option>
                          <?php endforeach;?>
                     </select>

                     <label>Kms:</label>
                     
                     <select value="<?php echo s($vehiculo->km);?>" name="vehiculo[estado]" class="form-control">
                       <option value="">Todos</option>
                      <?php foreach ($vehiculos as $vehiculo):?>
                          <option><?php echo s($vehiculo->km);?></option>
                          <?php endforeach;?>
                     </select>

                     <label>Caja:</label>
                     <select value="<?php echo s($vehiculo->caja);?>" name="vehiculo[estado]" class="form-control">
                       <option value="">Todos</option>
                      <?php foreach ($vehiculos as $vehiculo):?>
                          <option><?php echo s($vehiculo->caja);?></option>
                          <?php endforeach;?>
                     </select>

                     <label>Combustible:</label>
                     
                     <select value="<?php echo s($vehiculo->combustible);?>" name="vehiculo[estado]" class="form-control">
                       <option value="">Todos</option>
                      <?php foreach ($vehiculos as $vehiculo):?>
                          <option><?php echo s($vehiculo->combustible);?></option>
                          <?php endforeach;?>
                     </select>

                     <button type="submit" class="filled-button btn-block">Buscar</button>
                </form>
             </div>
          </div>

          <div class="col-md-9">
            <div class="row">
              
<?php echo require 'listado.php';?>

              <div class="col-md-12">
                <ul class="pages">
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModTodosabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModTodosabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>