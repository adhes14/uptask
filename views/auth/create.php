<div class="contenedor crear">
  <?php include_once __DIR__ . '/../templates/site-name.php'; ?>
  
  <div class="contenedor-sm">
    <p class="descripcion-pagina">Create your account on UpTask</p>
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    <form action="/create" class="formulario" method="POST">
      <div class="campo">
        <label for="name">Name</label>
        <input type="text" id="name" placeholder="Your name" name="name" value="<?php echo $usuario->name; ?>">
      </div>
      <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Your email" name="email" value="<?php echo $usuario->email; ?>">
      </div>
      <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Your password" name="password">
      </div>
      <div class="campo">
        <label for="password2">Repeat Password</label>
        <input type="password" id="password2" placeholder="Repeat your password" name="password2">
      </div>
      <input type="submit" class="boton" value="Create">
    </form>

    <div class="acciones">
      <a href="/">Log in</a>
      <a href="/forgot">Recover your password</a>
    </div>
  </div>
</div>