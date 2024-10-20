<?php
$mensaje = 2;
$bandera = '0';
if (array_key_exists('bandera', $_POST)) {
	$bandera = limpiar_cadena($_POST['bandera'], $mysqli);
}

$pagina_anterior = 'inicio';
if ($bandera == '600-insertar-secciones' && $_SERVER['REQUEST_METHOD'] == 'POST') {
	if (array_key_exists('anterior', $_POST)) {
		$pagina_anterior = limpiar_cadena($_POST['anterior'], $mysqli);
	}
	$seccion_estacionamiento = '';
	if (array_key_exists('seccion_estacionamiento', $_POST)) {
		$seccion_estacionamiento = limpiar_cadena($_POST['seccion_estacionamiento'], $mysqli);
	}

	$seccion_estacionamiento_espacios = 0;
	if (array_key_exists('seccion_estacionamiento_espacios', $_POST)) {
		$seccion_estacionamiento_espacios = limpiar_cadena($_POST['seccion_estacionamiento_espacios'], $mysqli);
	}


	$seccion_estacionamiento_estatus = '2';
	if (array_key_exists('seccion_estacionamiento_estatus', $_POST)) {
		$seccion_estacionamiento_estatus = limpiar_cadena($_POST['seccion_estacionamiento_estatus'], $mysqli);
	}

	if ($cursos_estatus_nombre != '' || $cursos_estatus_nombre != NULL || $cursos_estatus_nombre != ' ' || $cursos_estatus_nombre != '  ') {
		$mysqli->query("INSERT INTO cat_seccion_estacionamiento(id_seccion_estacionamiento, seccion, espacios, id_status)  VALUES
			(NULL, '$seccion_estacionamiento', '$seccion_estacionamiento_espacios', '$seccion_estacionamiento_estatus')");
		$mensaje = 4;

		echo '<script type="text/javascript">
			document.location=("?q=' . $pagina_anterior . '&mensaje=' . $mensaje . '");
		</script>';
	} else {
		echo '<script type="text/javascript">
			document.location=("?q=' . $pagina_anterior . '&mensaje=' . $mensaje . '");
		</script>';
	}
} #### /// END if ($bandera == '600-insertar-secciones' && $_SERVER['REQUEST_METHOD'] == 'POST'){
else {
	echo '<script type="text/javascript">
		document.location=("?q=' . $pagina_anterior . '&mensaje=' . $mensaje . '");
	</script>';
}
