<?php include_once __DIR__ . '/header.php'; ?>

<div class="contenedor-sm">
  <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
  
  <form class="formulario" method="POST" action="/create-project">
    <?php include_once __DIR__ . '/project-form.php'; ?>
    <input type="submit" value="Create Project">
  </form>
</div>

<?php include_once __DIR__ . '/footer.php'; ?>