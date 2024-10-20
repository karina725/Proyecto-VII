<?php
$mensaje = 2;
$bandera = '0';
if (array_key_exists('bandera', $_POST)) {
	$bandera = imprimir_cadena($_POST['bandera'], $mysqli);
}

$pagina_anterior = 'inicio';

if ($bandera == '600-editar-secciones' && $_SERVER['REQUEST_METHOD'] == 'POST') {
	if (array_key_exists('anterior', $_POST)) {
		$pagina_anterior = imprimir_cadena($_POST['anterior'], $mysqli);
	}

	$seccion_estacionamiento_id = '0';
	if (array_key_exists('seccion_estacionamiento', $_POST)) {
		$seccion_estacionamiento_id = imprimir_cadena($_POST['seccion_estacionamiento'], $mysqli);
	}

	$sql_seccion_estacionamiento = $mysqli->query("SELECT * FROM cat_seccion_estacionamiento WHERE id_seccion_estacionamiento = '$seccion_estacionamiento_id' LIMIT 1");
	$cnt_seccion_estacionamiento = $sql_seccion_estacionamiento->num_rows;

	if ($cnt_seccion_estacionamiento == 1) {
		$res_seccion_estacionamiento = $sql_seccion_estacionamiento->fetch_object();
		$seccion_estacionamiento_id = imprimir_cadena($res_seccion_estacionamiento->id_seccion_estacionamiento, $mysqli);


		$seccion_estacionamiento_nombre = imprimir_cadena($res_seccion_estacionamiento->seccion, $mysqli);
		if (array_key_exists('seccion_estacionamiento_nombre', $_POST)) {
			$seccion_estacionamiento_nombre = limpiar_cadena($_POST['seccion_estacionamiento_nombre'], $mysqli);
		}

		$seccion_estacionamiento_espacios = imprimir_cadena($res_seccion_estacionamiento->espacios, $mysqli);
		if (array_key_exists('seccion_estacionamiento_espacios', $_POST)) {
			$seccion_estacionamiento_espacios = limpiar_cadena($_POST['seccion_estacionamiento_espacios'], $mysqli);
		}

		$seccion_estacionamiento_id_status = imprimir_cadena($res_seccion_estacionamiento->id_status, $mysqli);
		if (array_key_exists('seccion_estacionamiento_estatus', $_POST)) {
			$seccion_estacionamiento_id_status = limpiar_cadena($_POST['seccion_estacionamiento_estatus'], $mysqli);
		}

		$mysqli->query("UPDATE cat_seccion_estacionamiento SET
			seccion = '$seccion_estacionamiento_nombre',
			espacios = '$seccion_estacionamiento_espacios',
			id_status = '$seccion_estacionamiento_id_status'
			WHERE id_seccion_estacionamiento = '$seccion_estacionamiento_id' LIMIT 1");

		$mensaje = 1;
	} #### //// END if ($cnt_terminos == '1')
	echo '<script type="text/javascript">
		document.location=("?q=' . $pagina_anterior . '&seccion_estacionamiento=' . $seccion_estacionamiento_id . '&mensaje=' . $mensaje . '");
	</script>';
} #### /// END if ($bandera == '100-editar-arbolado')
else {
	echo '<script type="text/javascript">
		document.location=("?q=' . $pagina_anterior . '&mensaje=' . $mensaje . '");
	</script>';
}
