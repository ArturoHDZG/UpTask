<div class="contenedor olvide">
  <?php include_once __DIR__ . '/../templates/title.php' ?>

  <div class="contenedor-sm">
    <p class="desc-pagina">Escribe el Email con el que te Registraste</p>

    <?php include_once __DIR__ . '/../templates/alerts.php' ?>

    <form method="POST" action="/forget" class="formulario">
      <div class="campo">
        <label for="email">Email</label>
        <input
          id="email"
          name="email"
          type="email"
          placeholder="correo@dominio.com"
        >
      </div>

      <input class="boton" type="submit" value="Recuperar Contraseña">

    </form>
    <div class="acciones">
      <a href="/">Iniciar Sesión</a>
      <a href="/create">Crear Cuenta</a>
    </div>
  </div>
</div>
