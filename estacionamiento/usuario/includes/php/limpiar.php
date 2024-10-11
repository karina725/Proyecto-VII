<?php
#### //// Limpiar y Sanitizar Cadenas
function limpiar_cadena($cadena, $conexion = null)
{
	// Reemplazar comillas dobles y simples por sus entidades HTML
	$cadena = str_replace(['"', "'"], ['&quot;', '&#39;'], $cadena);

	// Usar mysqli_real_escape_string para evitar inyecciones SQL
	$cadena = mysqli_real_escape_string($conexion, $cadena);

	// Convertir caracteres especiales a entidades HTML
	$cadena = htmlspecialchars($cadena, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

	// Eliminar espacios en blanco al principio y al final de la cadena
	$cadena = trim($cadena);

	return $cadena;
}

function limpiar_cadena_html($cadena)
{
	// Reemplazar comillas dobles y simples por sus entidades HTML
	$cadena = str_replace(['"', "'"], ['&quot;', '&#39;'], $cadena);

	// Convertir caracteres especiales a entidades HTML
	$cadena = htmlspecialchars($cadena, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

	// Eliminar espacios en blanco al principio y al final de la cadena
	$cadena = trim($cadena);

	return $cadena;
}
#### //// Imprimir Cadenas en Diferentes Formatos

function imprimir_cadena($cadena)
{
	// Convertir y limpiar la cadena para ser visualizada en HTML
	return htmlspecialchars($cadena, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

#### //// Imprimir html
function imprimir_html($cadena)
{
	// Convertir saltos de línea a etiquetas <br> para visualización en HTML
	return nl2br(imprimir_cadena($cadena));
}

function imprimir_cadena_mayusculas($cadena)
{
	// Convertir a mayúsculas y sanitizar la cadena
	return mb_strtoupper(imprimir_cadena($cadena), 'UTF-8');
}

function imprimir_cadena_minusculas($cadena)
{
	// Convertir a minúsculas y sanitizar la cadena
	return mb_strtolower(imprimir_cadena($cadena), 'UTF-8');
}

function imprimir_cadena_corta($cadena, $limite = 200)
{
	// Imprimir una cadena con un límite de caracteres
	$cadena = imprimir_cadena($cadena);
	if (strlen($cadena) > $limite) {
		$cadena = substr($cadena, 0, $limite) . "...";
	}
	return $cadena;
}

#### //// Manejar Fechas y Horas
function imprimir_fecha($cadena, $formato = 'd-M-Y')
{
	// Convertir la cadena a objeto DateTime y luego a la fecha en el formato deseado
	$fecha = new DateTime($cadena);
	return $fecha->format($formato);
}

function imprimir_fecha_corta($cadena)
{
	// Formato corto para la fecha, como 'dd-MMM-YYYY'
	return imprimir_fecha($cadena, 'd-M-Y');
}

function imprimir_fecha_larga($cadena)
{
	// Formato largo con el nombre completo del mes
	return imprimir_fecha($cadena, 'd F Y');
}

function imprimir_hora($cadena)
{
	// Formatear la hora en formato 24h (HH:mm)
	return imprimir_fecha($cadena, 'H:i');
}

#### //// Imprimir y Convertir Acentos
function quitar_acentos($cadena)
{
	// Reemplazo de caracteres con acentos por sus equivalentes sin acentos
	$busqueda = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');
	$reemplazo = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', 'n', 'N');
	return str_replace($busqueda, $reemplazo, $cadena);
}


/**
 * Encripta una contraseña utilizando `password_hash` con el algoritmo BCRYPT.
 *
 * @param string $contraseña La contraseña a encriptar.
 * @return string El hash de la contraseña encriptada.
 */
function encriptar_contraseña($contraseña)
{
	return password_hash($contraseña, PASSWORD_BCRYPT);
}
