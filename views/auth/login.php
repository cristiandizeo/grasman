<div class="loginBox"> 
    <img class="user" src="assets/images/logo.png" height="100px" width="100px">
    <h3>Iniciar sesión</h3>
    <?php foreach($errores as $error): ?>
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