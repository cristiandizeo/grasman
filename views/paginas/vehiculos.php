    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <h2>Cars</h2>
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
                <form action="#">
                     <label>Nuevo/usado:</label>
                     
                     <select class="form-control">
                          <option value="">Todos</option>
                          <option value="new">New vehicle</option>
                          <option value="used">Used vehicle</option>
                     </select>

                     <label>Tipo vehiculo:</label>
                     
                     <select class="form-control">
                          <option value="">Auto</option>
                          <option value="">Pick Up</option>
                          <option value="">Moto</option>
                     </select>

                     <label>Marca:</label>
                     
                     <select class="form-control">
                          <option value="">Fiat</option>
                          <option value="">Ford</option>
                          <option value="">Chevrolet</option>
                          <option value="">Jeep</option>
                          <option value="">BMW</option>
                     </select>

                     <label>Modelo:</label>
                     
                     <select class="form-control">
                          <option value="">Idea</option>
                          <option value="">Uno</option>
                          <option value="">Toro</option>
                     </select>

                     <label>Precio:</label>
                     
                     <select class="form-control">
                          <option value="">-- Todos --</option>
                          <option value="">-- Todos --</option>
                          <option value="">-- Todos --</option>
                          <option value="">-- Todos --</option>
                     </select>

                     <label>Kms:</label>
                     
                     <select class="form-control">
                          <option value="">Menos de 50.000</option>
                          <option value="">50.000 - 100.000</option>
                          <option value="">Mas de 100.000</option>
                     </select>

                     <label>Caja:</label>
                     
                     <select class="form-control">
                          <option value="">Manual</option>
                          <option value="">Automática</option>
                     </select>

                     <label>Combustible:</label>
                     
                     <select class="form-control">
                          <option value="">Nafta</option>
                          <option value="">GNC</option>
                          <option value="">Gasoil</option>
                          <option value="">Electrico</option>
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