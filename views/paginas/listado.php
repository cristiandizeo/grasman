<?php foreach($vehiculos as $vehiculo): ?>
              <div class="col-md-6">
                <div class="product-item">
                  <img loading="lazy" src="/imagenes/<?php echo $vehiculo->imagen; ?>" alt="anuncio">

                  <div class="down-content">
                    <a href="/vehiculo?id=<?php echo $vehiculo->id; ?>"><h4><?php echo $vehiculo->marca ." ". $vehiculo->modelo; ?></h4></a>

                    <h6><smTodos><del> $11199.00</del></smTodos> <?php echo $vehiculo->precio; ?></h6>

                    <p><?php echo $vehiculo->marca; ?> &nbsp;/&nbsp; <?php echo $vehiculo->modelo; ?> &nbsp;/&nbsp; <?php echo $vehiculo->year; ?> &nbsp;/&nbsp; <?php echo $vehiculo->tipo; ?></p>

                    <smTodos>
                      <strong title="Author"><i class="fa fa-dashboard"></i> <?php echo $vehiculo->km; ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Author"><i class="fa fa-cube"></i> <?php echo $vehiculo->combustible; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Views"><i class="fa fa-cog"></i> <?php echo $vehiculo->caja; ?></strong>
                    </smTodos>
                  </div>
                </div>
              </div>

              <?php endforeach; ?>