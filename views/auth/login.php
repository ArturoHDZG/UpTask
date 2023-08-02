<div class="contenedor login">
  <h1 class="uptask">UpTask</h1>
  <p class="tagline">¡Crea y Administra tus Proyectos!</p>

  <div class="contenedor-sm">
    <p class="desc-pagina">Iniciar Sesión</p>
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
