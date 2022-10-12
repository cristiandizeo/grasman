<main class="contenedor dashboard">
    <?php
    $mensaje = mostrarNotificacion(intval($resultado));
    if ($mensaje) { ?>
        <p class="alerta exito"><?php echo s($mensaje); ?></p>
    <?php }
    ?>
    <div class="m-5">
        <div class="text-center">
            <h2>Bicicletas</h2>
        </div>
        <hr>
        <a href="bicicletas/crear" class="btn btn-lg btn-floating" title="Agregar bicicleta">
            <i class="fa-solid fa-bicycle"></i>
            <i class="fa-solid fa-circle-plus"></i>
        </a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bicicleta</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <!-- Mostrar los Resultados -->
                <?php foreach ($bicicletas as $bicicleta) : ?>
                    <tr class="justify-content-center">
                        <td scope="row"><?php echo $bicicleta->id; ?></td>
                        <td> <?php echo $bicicleta->marca . " " . $bicicleta->rodado ?> </td>
                        <td><?php echo $bicicleta->tipo; ?></td>
                        <td>$ <?php echo $bicicleta->precio; ?></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="bicicleta?id=<?php echo $bicicleta->id; ?>" target="blank" class="mx-3" title="Ver página">
                                    <i class="fa-solid fa-eye"></i>
                                    </i>
                                </a>

                                <a href="/admin/bicicletas/actualizar?id=<?php echo $bicicleta->id; ?>" class="mx-3" title="Modificar">
                                    <i class="fa-solid fa-pen-to-square">
                                    </i>
                                </a>

                                <form method="POST" onsubmit="return borrar()" action="/admin/bicicletas/eliminar" class="w-100 mx-3" title="Eliminar">
                                    <input type="hidden" name="id" value="<?php echo $bicicleta->id; ?>">
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