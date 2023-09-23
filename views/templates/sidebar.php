<aside class="sidebar">
  <div class="contenedor-sidebar">
    <h2>UpTask</h2>
    <div class="cerrar-menu">
      <img id="cerrar-menu" src="build/img/cerrar.svg" alt="Cerrar Menú">
    </div>
  </div>

  <nav class="sidebar-nav">
    <a class="<?php echo ($title === 'Proyectos') ? 'activo' : ''; ?>" href="/dashboard">Proyectos</a>
    <a class="<?php echo ($title === 'Nuevo Proyecto') ? 'activo' : ''; ?>" href="/new">Nuevo Proyecto</a>
    <a class="<?php echo ($title === 'Perfil') ? 'activo' : ''; ?>" href="/profile">Perfil</a>
  </nav>

  <div class="cerrar-ses-mob">
    <a class="cerrar-ses" href="/logout">Cerrar Sesión</a>
  </div>
</aside>
