<?php include_once __DIR__. '/header.php'; ?>

<div class="contenedor-sm">
  <div class="contenedor-nueva-tarea">
    <button id="agregar-tarea" type="button" class="agregar-tarea">
      &#43 Nueva Tarea
    </button>
  </div>

  <div id="filtros" class="filtros">
    <div class="filtros-inputs">
      <h2>Filtros:</h2>
      <div class="campo">
        <label for="todas">Todas</label>
        <input id="todas" name="filtro" type="radio" value="" checked>
      </div>
      <div class="campo">
        <label for="completadas">Completadas</label>
        <input id="completadas" name="filtro" type="radio" value="1">
      </div>
      <div class="campo">
        <label for="pendientes">Pendientes</label>
        <input id="pendientes" name="filtro" type="radio" value="0">
      </div>
    </div>
  </div>

  <ul id="listado-tareas" class="listado-tareas"></ul>
</div>

<?php include_once __DIR__. '/footer.php'; ?>
<?php $script = '
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="build/js/tareas.js"></script>
'; ?>
