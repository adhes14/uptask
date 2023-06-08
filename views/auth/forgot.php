<div class="contenedor forgot">
  <?php include_once __DIR__ . '/../templates/site-name.php'; ?>

  <div class="contenedor-sm">
    <p class="descripcion-pagina">Recover your password</p>
    <form action="/" class="formulario" method="POST">
      <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Your email" name="email">
      </div>
      <input type="submit" class="boton" value="Recover">
    </form>

    <div class="acciones">
      <a href="/create">Create an account</a>
      <a href="/">Log in</a>
    </div>
  </div>
</div>