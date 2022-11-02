<div class="loginBox">
    <picture class="d-flex justify-content-center">
        <source type="image/webp" srcset="/assets/images/logo.webp?v=<?php echo(rand()); ?>">
        <img src="/assets/images/logo.png" alt="Logo Grasman Autos" loading="eager">
    </picture>
    <h3>Iniciar sesión</h3>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form method="POST">
        <div class="inputBox">
            <input id="email" type="email" name="email" placeholder="Email" required>
            <input id="password" type="password" name="password" placeholder="Password" required>
        </div>
        <input type="submit" name="" value="Ingresar">
    </form>
</div>