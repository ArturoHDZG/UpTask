<?php include_once __DIR__. '/header.php'; ?>

<div class="contenedor-sm">

  <?php include_once __DIR__. '/../templates/alerts.php'; ?>

  <a class="enlace" href="/password">Cambiar Contraseña</a>

  <form class="formulario" method="POST">

    <div class="campo">
      <label for="nombre">Nombre</label>
      <input name="nombre" type="text" value="<?php echo $usuario->nombre; ?>" placeholder="Ej. Juan Pérez">
    </div>
    <div class="campo">
      <label for="email">Email</label>
      <input name="email" type="email" value="<?php echo $usuario->email; ?>" placeholder="Ej. correo@dominio.com">
    </div>

    <input type="submit" value="Guardar Cambios">

  </form>
</div>

<?php include_once __DIR__. '/footer.php'; ?>
