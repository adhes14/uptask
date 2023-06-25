(() => {
  let tasks = [];
  obtenerTareas();

  async function obtenerTareas() {
    const url = obtenerProyecto();
    const endpoint = `/api/tasks?url=${url}`;
  
    let result;
    try {
      const response = await fetch(endpoint);
      result = await response.json();
    } catch (error) {
      console.log(error);
    }

    tasks = result.tasks;
    mostrarTareas();
  }

  function mostrarTareas() {
    limpiarTareas();
    if (tasks.length === 0) {
      const contenedorTareas = document.querySelector('#listado-tareas');
      const textoNoTareas = document.createElement('LI');
      textoNoTareas.textContent = 'There is no tasks';
      textoNoTareas.classList.add('no-tareas');
  
      contenedorTareas.appendChild(textoNoTareas);
      return;
    }

    const estados = {
      0: 'Pending',
      1: 'Complete'
    };

    tasks.forEach(tarea => {
      const contenedorTarea = document.createElement('LI');
      contenedorTarea.dataset.tareaId = tarea.id;
      contenedorTarea.classList.add('tarea');

      const nombreTarea = document.createElement('P');
      nombreTarea.textContent = tarea.name;

      const opcionesDiv = document.createElement('DIV');
      opcionesDiv.classList.add('opciones');

      const btnEstadoTarea = document.createElement('BUTTON');
      btnEstadoTarea.classList.add('estado-tarea');
      btnEstadoTarea.classList.add(estados[tarea.estado].toLowerCase());
      btnEstadoTarea.dataset.estadoTarea = tarea.estado;
      btnEstadoTarea.textContent = estados[tarea.estado];

      const btnEliminarTarea = document.createElement('BUTTON');
      btnEliminarTarea.classList.add('eliminar-tarea');
      btnEliminarTarea.dataset.idTarea = tarea.id;
      btnEliminarTarea.textContent = 'Delete';

      opcionesDiv.appendChild(btnEstadoTarea);
      opcionesDiv.appendChild(btnEliminarTarea);

      contenedorTarea.appendChild(nombreTarea);
      contenedorTarea.appendChild(opcionesDiv);

      const listadoTareas = document.querySelector('#listado-tareas');
      listadoTareas.appendChild(contenedorTarea);
    });
  }

  const nuevaTareaBtn = document.querySelector('#agregar-tarea');
  nuevaTareaBtn.addEventListener('click', mostrarFormulario);

  function mostrarFormulario() {
    const modal = document.createElement('DIV');
    modal.classList.add('modal');
    modal.innerHTML = `
      <form class="formulario nueva-tarea">
        <legend>Add a new task</legend>
        <div class="campo">
          <label>Task</label>
          <input type="text" name="tarea" placeholder="Add a task to the project" id="tarea"/>
        </div>
        <div class="opciones">
          <input type="submit" class="submit-nueva-tarea" value="Add task"/>
          <button type="button" class="cerrar-modal">Cancel</button>
        </div>
      </form>
    `;

    setTimeout(() => {
      const formulario = document.querySelector('.formulario');
      formulario.classList.add('animar');
    }, 0);

    modal.addEventListener('click', (e) => {
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
      mostrarAlerta('error', 'Task name is mandatory', document.querySelector('.formulario legend'));
      return;
    }

    agreagarTarea(tarea);
  }

  function mostrarAlerta(tipo, mensaje, referencia) {
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

  async function agreagarTarea(tarea) {
    let resultado;
    const datos = new FormData();
    datos.append('name', tarea);
    datos.append('projectUrl', obtenerProyecto());

    const url = 'http://localhost:3000/api/task';
    try {
      const respuesta = await fetch(url, {
        method: 'POST',
        body: datos
      });
      resultado = await respuesta.json();
    } catch (error) {
      console.log(error);
    }

    mostrarAlerta(resultado.type, resultado.message, document.querySelector('.formulario legend'));

    if (resultado.type === 'exito') {
      const modal = document.querySelector('.modal');
      setTimeout(() => {
        modal.remove();
      }, 1000);

      // Add task object to global tasks
      const taskObj = {
        id: String(resultado.id),
        name: tarea,
        estado: '0',
        projectId: resultado.projectId
      }
      // tasks.push(taskObj);
      tasks = [...tasks, taskObj];
      mostrarTareas();
    }
  }

  function obtenerProyecto() {
    const proyectoParams = new URLSearchParams(window.location.search);
    const proyecto = Object.fromEntries(proyectoParams.entries());
    return proyecto.url;
  }

  function limpiarTareas() {
    const listadoTareas = document.querySelector('#listado-tareas');
    // listadoTareas.innerHTML = '';
    while (listadoTareas.firstChild) {
      listadoTareas.removeChild(listadoTareas.firstChild);
    }
  }
})();