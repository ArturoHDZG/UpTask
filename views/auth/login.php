<div class="contenedor">
  <h1>UpTask</h1>
  <p>¡Crea y Administra tus Proyectos!</p>

  <div class="contenedor-sm">
    <p class="desc-pagina">Iniciar Sesión</p>
    <form method="POST" action="/" class="form">
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

      <input class="boton" type="submit" value="Iniciar Sesión">
      </div>
    </form>
    <div class="actions">
      <a href="/create">Crear Cuenta</a>
      <a href="/forget">Olvidé mi Contraseña</a>
    </div>
  </div>
</div>
