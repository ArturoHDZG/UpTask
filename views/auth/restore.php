<div class="contenedor restablecer">
  <?php include_once __DIR__ . '/../templates/title.php' ?>

  <div class="contenedor-sm">
    <p class="desc-pagina">Introduce una Nueva Contraseña</p>

    <?php include_once __DIR__ . '/../templates/alerts.php' ?>
    <?php if($mostrar): ?>

    <form method="POST" class="formulario">
      <div class="campo">
        <label for="password">Contraseña</label>
        <input
          id="password"
          name="password"
          type="password"
          placeholder="Tu Contraseña"
        >
      </div>

      <input class="boton" type="submit" value="Guardar Contraseña">
    </form>

    <?php endif; ?>

    <div class="acciones">
      <a href="/create">Crear Cuenta</a>
      <a href="/forget">Olvidé mi Contraseña</a>
    </div>

  </div>
</div>
