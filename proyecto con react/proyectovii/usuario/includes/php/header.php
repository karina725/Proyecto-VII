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
			<li><a href="?q=usuarios/"><?php echo $dic_usuarios;?></a></li>

			<li><a href="#" onclick="logout()">Salir</a></li>
		</ul>
	</div>

	<div class="container">
		<img src="images/<?php echo $imagen_banner; ?>" class="ocultar" alt="" style="width: 100%;">
	</div>
</header>
<hr />