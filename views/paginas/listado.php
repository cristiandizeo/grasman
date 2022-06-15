<?php foreach($vehiculos as $vehiculo): ?>
              <div class="col-md-6">
                <div class="product-item">
                  <a href="/vehiculo?id=<?php echo $vehiculo->id; ?>">
                  <img loading="lazy" src="/imagenes/<?php echo $vehiculo->imagen; ?>" alt="anuncio">

                  <div class="down-content">
                    <h2><?php echo $vehiculo->marca ." ". $vehiculo->modelo;?></h2>

                    <p>&nbsp;/&nbsp; <?php echo $vehiculo->estado; ?> &nbsp;/&nbsp; <?php echo $vehiculo->year; ?> &nbsp;/&nbsp;</p>
                    <p><?php echo $vehiculo->descripcion; ?></p>
                    <smTodos>
                      <strong title="Author"><i class="fa fa-dashboard"></i> <?php echo $vehiculo->km; ?> km</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Author"><i class="fa fa-cube"></i> <?php echo $vehiculo->combustible; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
                      <strong title="Views"><i class="fa fa-cog"></i> <?php echo $vehiculo->caja; ?></strong>
                    </smTodos>
                    </a>
                  </div>
                </div>
              </div>

              <?php endforeach; ?>