<main class="contenedor dashboard">
    <?php
    $mensaje = mostrarNotificacion(intval($resultado));
    if ($mensaje) { ?>
        <p class="alerta exito"><?php echo s($mensaje); ?></p>
    <?php }
    ?>
    <div class="m-5">
        <div class="text-center">
            <h2>Vehiculos</h2>
        </div>
        <hr>
        <a href="admin/vehiculos/crear" class="btn btn-lg btn-floating" title="Agregar vehículo">
            <i class="fa-solid fa-car"></i>
            <i class="fa-solid fa-circle-plus"></i>
        </a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Patente</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <!-- Mostrar los Resultados -->
                <?php foreach ($vehiculos as $vehiculo) : ?>
                    <tr class="justify-content-center">
                        <td scope="row"><?php echo $vehiculo->id; ?></td>
                        <td><?php echo $vehiculo->patente; ?></td>
                        <td> <?php echo $vehiculo->marca . " " . $vehiculo->modelo . " " . $vehiculo->year ?> </td>
                        <td>$ <?php echo $vehiculo->precio; ?></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="vehiculo?id=<?php echo $vehiculo->id; ?>" target="blank" class="mx-3" title="Ver página">
                                    <i class="fa-solid fa-eye"></i>
                                    </i>
                                </a>

                                <a href="admin/vehiculos/actualizar?id=<?php echo $vehiculo->id; ?>" class="mx-3" title="Modificar">
                                    <i class="fa-solid fa-pen-to-square">
                                    </i>
                                </a>

                                <form method="POST" onsubmit="return borrar()" action="admin/vehiculos/eliminar" class="w-100 mx-3" title="Eliminar">
                                    <input type="hidden" name="id" value="<?php echo $vehiculo->id; ?>">
                                    <button type="submit" id="btn-borrar">
                                        <i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>