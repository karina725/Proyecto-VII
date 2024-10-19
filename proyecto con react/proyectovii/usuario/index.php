<?php
session_start(); // Iniciar sesión al comienzo del archivo

// Incluir archivos necesarios
include_once("includes/php/conexion.php");
include_once("includes/php/limpiar.php");
include_once("includes/php/login.php");
include_once("includes/php/diccionario.php");


?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $nombre_sistema_completo; ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<!-- CSS personalizados para la plantilla -->
	<link href="includes/css/offcanvas.css" rel="stylesheet">
	<link href="includes/css/menu.css" rel="stylesheet">
	<link href="includes/css/styles.css" rel="stylesheet">

	<!-- Librerías CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<!-- Librerías JavaScript -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/31cc1d776d.js" crossorigin="anonymous"></script>
	<script src="includes/js/logout.js"></script>
	<script src="includes/js/42b8149369.js" crossorigin="anonymous"></script>

	<!-- Estilos adicionales específicos -->
	<style>
		.panel {
			width: 800px;
			height: 500px;
		}

		.resizable {
			overflow: hidden;
			resize: both;
		}

		.draggable {
			position: absolute;
			z-index: 100;
		}

		.draggable-handler {
			cursor: pointer;
		}

		.dragging {
			cursor: move;
			z-index: 200 !important;
		}

		.menu_2 {
			position: relative;
			margin-top: 0;
			z-index: 10000;
		}

		.menu_2.fixed {
			position: fixed;
			top: 0;
			right: 0;
		}

		.bc-icons-2 {
			position: relative;
			width: 100%;
			margin-top: 45px;
			z-index: 9999;
		}

		.bc-icons-2.fixed {
			position: fixed;
			top: 0;
			right: 0;
		}

		.sticky {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			z-index: 999;
		}
	</style>
</head>

<body>
	<?php include_once("includes/php/header.php"); ?>

	<div class="container">
		<?php
		include_once('includes/php/mensajes_forms.php');
		include_once("main.php");
		?>
	</div><!-- END div class="container" -->

	<?php include_once("includes/php/footer.php"); ?>
</body>

</html>