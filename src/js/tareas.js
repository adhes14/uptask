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

    document.querySelector('body').appendChild(modal);
  }
})();