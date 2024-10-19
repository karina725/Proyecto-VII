<?php

$page = '';
if (isset($_GET['q']))
	$page = limpiar_cadena($_GET['q'], $mysqli);

switch ($user_privilegios_id) {
	case 1: // ADMINISTRADOR
		include_once('includes/php/main_100.php'); 
		break;

	case 2: // EMPLEADO
		include_once('includes/php/main_200.php'); 
		break;

	default: // Si no coincide con ningún rol
		echo "<div class='alert alert-danger'>Acceso denegado: no tienes permisos para acceder a esta sección.</div>";
		break;
}
