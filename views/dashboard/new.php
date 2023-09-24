<?php include_once __DIR__. '/header.php'; ?>

  <div class="contenedor-sm">

    <?php include_once __DIR__ . '/../templates/alerts.php'; ?>

    <form class="formulario" method="POST" action="/new">

      <?php include_once __DIR__ . '/form.php'; ?>

      <input type="submit" value="Crear Proyecto">
    </form>
  </div>

<?php include_once __DIR__. '/footer.php'; ?>
