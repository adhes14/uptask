(() => {
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

  function agreagarTarea(tarea) {
    
  }
})();