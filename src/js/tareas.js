'use strict';

(function () {
  const nuevaTareaBtn = document.querySelector('#agregar-tarea');
  nuevaTareaBtn.addEventListener('click', mostrarFormulario);

  function mostrarFormulario() {
    const modal = document.createElement('DIV');
    modal.classList.add('modal');
    modal.innerHTML = `
      <form class="formulario nueva-tarea">
        <legend>Añade una Nueva Tarea</legend>
        <div class="campo">
          <label>Tarea</label>
          <input id="tarea" name="tarea" type="text" placeholder="Añadir Tarea al Proyecto Actual">
        </div>
        <div class="opciones">
          <input type="submit" class="submit-nueva-tarea" value="Añadir Tarea">
          <button type="button" class="cerrar-modal">Cancelar</button>
        </div>
      <form>
    `;

    setTimeout(() => {
      const formulario = document.querySelector('.formulario');
      formulario.classList.add('animar');
    }, 0);

    modal.addEventListener('click', function (e) {
      e.preventDefault();

      if (e.target.classList.contains('cerrar-modal')) {
        const formulario = document.querySelector('.formulario');
        formulario.classList.add('cerrar');
        setTimeout(() => {
          modal.remove();
        }, 500);
      }

      if (e.target.classList.contains('submit-nueva-tarea')) {
        submitFormularioNuevaTarea();
      }
    });

    document.querySelector('.dashboard').appendChild(modal);
  }

  function submitFormularioNuevaTarea() {
    const tarea = document.querySelector('#tarea').value.trim();

    if (tarea === '') {
      mostrarAlerta('Nombre de Tarea Requerido', 'error', document.querySelector('.formulario legend'));
    }

    agregarTarea(tarea);
  }

  function mostrarAlerta(mensaje, tipo, referencia) {
    const alertaPrevia = document.querySelector('.alerta');

    if (alertaPrevia) {
      alertaPrevia.remove();
    }

    const alerta = document.createElement('DIV');
    alerta.classList.add('alerta', tipo);
    alerta.textContent = mensaje;
    referencia.parentElement.insertBefore(alerta, referencia.nextElementSibling);

    setTimeout(() => {
      alerta.remove();
    }, 5000);
  }

  async function agregarTarea(tarea) {
    const datos = new FormData();
    datos.append('nombre', tarea);
    datos.append('proyectoId', obtenerProyecto());

    try {
      const url = '/api/task'
      const respuesta = await fetch(url, {
        method: 'POST',
        body: datos
      });

      const resultado = await respuesta.json();
      console.log(resultado);

      mostrarAlerta(resultado.mensaje, resultado.tipo, document.querySelector('.formulario legend'));
    } catch (error) {
      console.log(error);
    }
  }

  function obtenerProyecto() {
    const proyectoParams = new URLSearchParams(window.location.search);
    const proyecto = Object.fromEntries(proyectoParams.entries());
    return proyecto.id;
  }
})();
