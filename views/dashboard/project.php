<?php include_once __DIR__. '/header.php'; ?>

<div class="contenedor-sm">
  <div class="contenedor-nueva-tarea">
    <button id="agregar-tarea" type="button" class="agregar-tarea">
      &#43 Nueva Tarea
    </button>
  </div>
</div>

<?php include_once __DIR__. '/footer.php'; ?>
<?php $script = '
  <script src="build/js/tareas.js"></script>
  <script src="build/js/app.js"></script>
'; ?>