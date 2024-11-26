<?php

$mensaje_bandera = 0;
$mensaje = '0';

if (array_key_exists('mensaje', $_GET)) {
  $mensaje = limpiar_cadena($_GET['mensaje'], $mysqli);
  $mensaje_bandera = 1;
}

switch ($mensaje) {

  case 2:
    $alert_class = 'warning';
    $mensaje_contenido = '  <strong>Ocurrio un error al actualizar.</strong> Si el problema persiste comuniquese con soporte.';
    break;

  case 10:
    $alert_class = 'success';
    $mensaje_contenido = 'Registro agregado correctamente.';
    break;

  case 20:
      $alert_class = 'success';
      $mensaje_contenido = 'Registro actualizado correctamente.';
      break;

  case 30:
      $alert_class = 'success';
      $mensaje_contenido = 'Registro eliminado correctamente.';
      break;

  case 11:
    $alert_class = 'danger';
    $mensaje_contenido = 'El número de empleado ya está en uso. Por favor, elige otro.';
    break;

  default:
    $mensaje_bandera = 0;

  $alert_class = 'danger';
  $mensaje_contenido = 'Ocurrio un error al actualizar.</strong> Si el problema persiste comuniquese con soporte.';
  break;
    
}

if ($mensaje_bandera == 1) {
  echo '<div class="alert alert-' . $alert_class . ' alert-dismissible fade show mensaje" role="alert" id="mensaje">
  ' . $mensaje_contenido . '
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

?>

<script type="text/javascript">

  $(document).ready(function() {
    setTimeout(function() {
      $(".mensaje").fadeOut(1500);
    }, 3000);

    setTimeout(function() {
      $(".content2").fadeIn(1500);
    }, 6000);
  });

</script>