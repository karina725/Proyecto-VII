function initializeFileInput(fileInput, dropAreaId, removeFileBtnId) {
    const dropArea = document.getElementById(dropAreaId);
    const removeFileBtn = document.getElementById(removeFileBtnId);
  
    // Evento para evitar la acción predeterminada del arrastre y soltar
    dropArea.addEventListener('dragover', function(e) {
      e.preventDefault();
    });
  
    // Evento para resaltar el área de arrastrar y soltar cuando se arrastra un archivo sobre ella
    dropArea.addEventListener('dragenter', function(e) {
      dropArea.classList.add('dragover');
    });
  
    // Evento para quitar el resaltado del área de arrastrar y soltar cuando se sale de ella
    dropArea.addEventListener('dragleave', function(e) {
      dropArea.classList.remove('dragover');
    });
  
    // Evento para manejar el archivo soltado en el área de arrastrar y soltar
    dropArea.addEventListener('drop', function(e) {
      e.preventDefault();
      dropArea.classList.remove('dragover');
          
      const file = e.dataTransfer.files[0];
      fileInput.files = e.dataTransfer.files;
      removeFileBtn.style.display = 'inline-block';
    });
  
    // Evento para eliminar el archivo adjunto
    removeFileBtn.addEventListener('click', function() {
      fileInput.value = null;
      removeFileBtn.style.display = 'none';
    });
  }
  
  // Obtener la referencia al elemento fileInput
 // const fileInput = document.getElementById('file_cursos_extracurriculares');
  
  // Llamar a la función de inicialización pasando el fileInput y los IDs correspondientes
  initializeFileInput(fileInput, 'drop-area', 'remove-file-btn');
  