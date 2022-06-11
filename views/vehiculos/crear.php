<main class="contenedor mt-5 p-3">
    <a href="/admin" class="btn btn-info">Volver</a>

    <h1>Crear Vehiculo</h1>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Crear Vendedor" class="boton boton-verde">
    </form>
</main>