<?php include_once __DIR__ . '/header.php'; ?>
  <?php if (count($proyectos) === 0): ?>
    <p class="no-proyectos">There isn't any project yet. <a href="/create-project">Create one</a></p>
  <?php else: ?>
    <ul class="listado-proyectos">
      <?php foreach ($proyectos as $proyecto): ?>
        <li class="proyecto">
          <a href="/project?url=<?php echo $proyecto->url; ?>"><?php echo $proyecto->project; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
<?php include_once __DIR__ . '/footer.php'; ?>