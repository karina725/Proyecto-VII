<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active"><?php echo $dic_inicio; ?></li>
	</ol>
</nav>

<h2>Bienvenido(a) al Sistema de Gestión de Estacionamientos</h2>

<h3>Correo: <?php echo $_SESSION['user_session']; ?></h3>
<h3>Usuario: <?php echo $_SESSION['user_nombre']; ?></h3>
<h3>Id: <?php echo $_SESSION['user_id']; ?></h3>
