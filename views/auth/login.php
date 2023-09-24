<div class="contenedor login">
  <?php include_once __DIR__ . '/../templates/title.php' ?>

  <div class="contenedor-sm">
    <p class="desc-pagina">Iniciar Sesión</p>

    <?php include_once __DIR__ . '/../templates/alerts.php' ?>

    <form method="POST" action="/" class="formulario">
      <div class="campo">
        <label for="email">Email</label>
        <input
          id="email"
          name="email"
          type="email"
          placeholder="correo@dominio.com"
        >
      </div>
      <div class="campo">
        <label for="password">Contraseña</label>
        <input
          id="password"
          name="password"
          type="password"
          placeholder="Tu Contraseña"
        >
      </div>

      <input class="boton" type="submit" value="Iniciar Sesión">

    </form>
    <div class="acciones">
      <a href="/create">Crear Cuenta</a>
      <a href="/forget">Olvidé mi Contraseña</a>
    </div>
  </div>
</div>
