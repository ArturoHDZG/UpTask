<?php include_once __DIR__. '/header.php'; ?>

<div class="contenedor-sm">

  <?php include_once __DIR__. '/../templates/alerts.php'; ?>

  <a class="enlace" href="/profile">Volver</a>

  <form class="formulario" method="POST">

    <div class="campo">
      <label for="passActual">Contraseña Actual</label>
      <input name="passActual" type="password" placeholder="Contraseña Actual">
    </div>
    <div class="campo">
      <label for="passNuevo">Nueva Contraseña</label>
      <input name="passNuevo" type="password" placeholder="Nueva Contraseña">
    </div>

    <input type="submit" value="Guardar Cambios">

  </form>
</div>

<?php include_once __DIR__. '/footer.php'; ?>
