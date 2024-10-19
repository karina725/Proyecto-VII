<?php
// includes/navbar.php
session_start();

$nivel_privilegios = isset($_SESSION['nivel_privilegios']) ? $_SESSION['nivel_privilegios'] : 'invitado';

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="dashboard.php"><?php echo APP_NAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="dashboard.php">Inicio</a></li>
            <!-- Menú para Usuarios Básicos -->
            <?php if ($nivel_privilegios == 'usuario') { ?>
                <li class="nav-item"><a class="nav-link" href="reservas.php">Mis Reservas</a></li>
            <?php } ?>

            <!-- Menú para Empleados -->
            <?php if ($nivel_privilegios == 'empleado' || $nivel_privilegios == 'admin') { ?>
                <li class="nav-item"><a class="nav-link" href="empleados.php">Gestión de Empleados</a></li>
                <li class="nav-item"><a class="nav-link" href="estacionamientos.php">Gestión de Estacionamientos</a></li>
            <?php } ?>

            <!-- Menú para Administradores -->
            <?php if ($nivel_privilegios == 'admin') { ?>
                <li class="nav-item"><a class="nav-link" href="usuarios.php">Gestión de Usuarios</a></li>
                <li class="nav-item"><a class="nav-link" href="liberacion.php">Liberación de Espacios</a></li>
            <?php } ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if ($nivel_privilegios == 'invitado') { ?>
                <li class="nav-item"><a class="nav-link" href="index.php">Iniciar Sesión</a></li>
                <li class="nav-item"><a class="nav-link" href="registro.php">Registrarse</a></li>
            <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="../scripts/logout.php">Cerrar Sesión</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>