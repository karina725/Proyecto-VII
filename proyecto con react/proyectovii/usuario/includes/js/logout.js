// logout.js

// Función para confirmar y redireccionar al salir del sistema
function logout() {
    // Pregunta al usuario si desea salir del sistema
    if (confirm("¿Estás seguro de que deseas salir del Sistema?")) {
      window.location.href = 'exit.php'; // Redirecciona al archivo exit.php
    }
  }
  