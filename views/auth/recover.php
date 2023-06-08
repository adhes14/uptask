<div class="contenedor recover">
  <?php include_once __DIR__ . '/../templates/site-name.php'; ?>

  <div class="contenedor-sm">
    <p class="descripcion-pagina">Create a new password</p>
    <form action="/" class="formulario" method="POST">
      <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Your password" name="password">
      </div>
      <div class="campo">
        <label for="password2">Repeat Password</label>
        <input type="password" id="password2" placeholder="Repeat your password" name="password2">
      </div>
      <input type="submit" class="boton" value="Create Password">
    </form>

    <div class="acciones">
      <a href="/">Log in</a>
      <a href="/create">Create an account</a>
    </div>
  </div>
</div>