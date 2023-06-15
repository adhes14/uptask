<div class="contenedor login">
  <?php include_once __DIR__ . '/../templates/site-name.php'; ?>

  <div class="contenedor-sm">
    <p class="descripcion-pagina">Log In</p>
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    <form action="/" class="formulario" method="POST">
      <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Your email" name="email">
      </div>
      <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Your password" name="password">
      </div>
      <input type="submit" class="boton" value="Log In">
    </form>

    <div class="acciones">
      <a href="/create">Create an account</a>
      <a href="/forgot">Recover your password</a>
    </div>
  </div>
</div>