<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active"><?php echo $dic_inicio; ?></li>
	</ol>
</nav>

<style>
	.titulo-principal {
		color: white;
	}
	.informacion-usuario {
		color: white;
	}
</style>

<h2 class="titulo-principal">Bienvenido(a) al Sistema de Gestión de Estacionamientos</h2>

<h3 class="informacion-usuario">Correo: <?php echo $_SESSION['user_session']; ?></h3>
<h3 class="informacion-usuario">Usuario: <?php echo $_SESSION['user_nombre']; ?></h3>
<h3 class="informacion-usuario">Id: <?php echo $_SESSION['user_id']; ?></h3>
