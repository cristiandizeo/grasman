<main class="contenedor dashboard">
    <?php 
        $mensaje = mostrarNotificacion( intval( $resultado) );
        if($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje); ?></p>
        <?php } 
    ?>

    <h2>Vehiculos</h2>
    <hr>
    <a href="vehiculos/crear" class="btn btn-info m-1">Agregar nuevo</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Patente</th>
                <th scope="col">Imagen</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los Resultados -->
            <?php foreach( $vehiculos as $vehiculo ): ?>
            <tr>
                <td scope="row"><?php echo $vehiculo->id; ?></td>
                <td><?php echo $vehiculo->patente; ?></td>
                <td> <img src="/imagenes/<?php echo $vehiculo->imagen; ?>" class="img-fluid"> </td>
                <td>$ <?php echo $vehiculo->precio; ?></td>
                <td>
                <i class="fa-solid fa-trash-can">
                <form method="POST" onsubmit="return borrar()" action="vehiculos/eliminar" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $vehiculo->id; ?>">
                        <input type="hidden" name="tipo" value="vehiculo">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                </i>

                <a href="vehiculos/actualizar?id=<?php echo $vehiculo->id; ?>" class="boton-amarillo-block">
                <i class="fa-solid fa-pen-to-square">
                    </i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>