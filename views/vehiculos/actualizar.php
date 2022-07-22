<main class="contenedor mt-5 p-3">
    <a href="/admin" class="btn btn-info">Volver</a>

    <h1 class="text-center p-3">Modificar Vehiculo</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="needs-validation" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Modificar vehiculo" class="btn btn-primary m-3">
        <a href="/admin" class="btn btn-danger">Cancelar</a>
    </form>
</main>