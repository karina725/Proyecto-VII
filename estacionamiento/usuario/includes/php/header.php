<?php

$imagen_banner = 'banner.png';

?>

<header>

	<div class="container">
		<img src="images/<?php echo $imagen_banner; ?>" class="ocultar" alt="" style="width: 100%;">
	</div>

	<div class="menu_2">

		<span>MENU</span>
		<input type="checkbox" id="sub0">
		<label for="sub0"></label>

		<ul>

			<li><a href="?q=inicio">Inicio</a></li>

			<li><a href="?q=usuarios/"><?php echo $dic_usuarios;?></a></li>

			<li><a href="?q=estacionamientos/"><?php echo $dic_estacionamientos;?></a></li>

			<li><a href="?q=pensiones/"><?php echo $dic_pensiones;?></a></li>

			<li><a href="?q=lavados/"><?php echo $dic_lavados;?></a></li>
			
			<li><a href="?q=reservas_evento/"><?php echo $dic_reservas_evento;?></a></li> 


			<li><a href="#" onclick="logout()">Salir</a></li>

		</ul>

	</div>

</header>

<hr />