<?php
$imagen_banner = 'banner.png';

?>
<header>
	<div class="page-header">
		<div id="bloque_logo">
			<a href="http://udg.mx" title="Universidad de Guadalajara"> <img src="images/logo_transparente.png" height="100" alt="Universidad de Guadalajara" /> </a>
		</div>
	</div>
	<div class="menu_2"><span>MENU</span><input type="checkbox" id="sub0"><label for="sub0"></label>
		<ul>
			<li><a href="?q=inicio">Inicio</a></li>
			<li><a href="?q=usuarios/"><?php echo $dic_usuarios; ?></a></li>
			<li><a href="?q=gestion-espacios/"><?php echo $dic_gestion_espacios; ?></a></li>
			<li><a href="?q=pensiones/"><?php echo $dic_pensiones; ?></a></li>
			<li><a href="?q=lavados/"><?php echo $dic_lavados; ?></a></li>
			<li class="has-sub"><a href="?q=catalogos/"><?php echo $dic_catalogos; ?></a><b aria-haspopup="true" aria-controls="p1"></b><input type="checkbox" id="sub1"><label for="sub1"></label>
				<ul id="p1">
					<li><a href="?q=catalogos/secciones-estacionamiento/"><?php echo $dic_seccion; ?></a></li>
					<li role="separator" class="divider"></li>
				</ul>
			</li>
			<li><a href="#" onclick="logout()">Salir</a></li>
		</ul>
	</div>

	<div class="container">
		<img src="images/<?php echo $imagen_banner; ?>" class="ocultar" alt="" style="width: 100%;">
	</div>
</header>
<hr />