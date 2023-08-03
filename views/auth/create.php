<div class="contenedor crear">
  <?php include_once __DIR__ . '/../templates/title.php' ?>

  <div class="contenedor-sm">
    <p class="desc-pagina">Crea una Cuenta en UpTask</p>
    <form method="POST" action="/" class="formulario">
      <div class="campo">
        <label for="name">Nombre</label>
        <input
          id="name"
          name="name"
          type="text"
          placeholder="John Smith"
        >
      </div>
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
      <div class="campo">
        <label for="password-repeat">Repetir Contraseña</label>
        <input
          id="password-repeat"
          name="password-repeat"
          type="password"
          placeholder="Vuelve a Escribir la Contraseña"
        >
      </div>

      <input class="boton" type="submit" value="Iniciar Sesión">

    </form>
    <div class="acciones">
      <a href="/">Iniciar Sesión</a>
      <a href="/forget">Olvidé mi Contraseña</a>
    </div>
  </div>
</div>
