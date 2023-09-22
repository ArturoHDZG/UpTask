<?php include_once __DIR__. '/header.php'; ?>

<div class="contenedor-sm">
  <div class="contenedor-nueva-tarea">
    <button id="agregar-tarea" type="button" class="agregar-tarea">
      &#43 Nueva Tarea
    </button>
  </div>
  <ul id="listado-tareas" class="listado-tareas"></ul>
</div>

<?php include_once __DIR__. '/footer.php'; ?>
<?php $script = '
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="build/js/tareas.js"></script>
'; ?>
